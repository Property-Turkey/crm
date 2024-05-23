<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

class LogsController extends AppController
{
    
    public function index( )
    {

       
        if ($this->request->is('post')) {
            $dt = json_decode(file_get_contents('php://input'), true);

            $this->autoRender = false;

            $conditions = [ ];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k'])>0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
    
            
            if( !empty($_from) ){ $conditions['Logs.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Logs.stat_created < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Logs.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            $noneSearchable = ['page'];
            $likeFields = ['log_url[6]'];
            

             
            // Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }
                    if ($col == 'log_changes') {
                        if(is_array($val)){
                            foreach ($val as $tag) {
                                $conditions['AND'][] = ['log_changes LIKE ' => '%"' . $tag['value'] . '"%'];
                            } 
                        }
                    } 
                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                }
            }



            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Logs->get( $_id , [
                    'contain'=>['Users'=>['fields'=>['user_fullname']]]
                ])->toArray();
                $data = $this->Do->convertJson($data);
                echo json_encode( 
                    [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], 
                    JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Logs, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                    "contain"=>["Users"=>["fields"=>["user_fullname", "user_role"]]],
                ]);
                $data = $this->Do->convertJson($data);
                // foreach($data as &$itm){
                //     $itm['log_url'] = explode("/", str_replace($this->app_folder, "", $itm['log_url']));
                // }
            }

            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$data, 
                "paging" => $this->request->getAttribute('paging')['Logs']], 
                JSON_UNESCAPED_UNICODE); die();
        }

    }


    public function recover($id = null)
    {
        $log = $this->Logs->get($id);


        $this->autoRender = false;
        if ($log) {
            $logChanges = json_decode($log->log_changes, true);
            $logurl = json_decode($log->log_url, true);


            if (!empty($logChanges) && is_array($logChanges)) {

                if($logurl[6] == "update"){
                    
                    $aaa = $this->Do->adder($logChanges[1], $logurl[5]); 
                }else{
                    $aaa = $this->Do->adder($logChanges[0], $logurl[5], true);
                }

                
            } else {

                dd('2');
            }
        } else {
            $this->Flash->error('Log not found.');
        }

    }

    public function getClientEmailOrPhoneChanges()
    {
        $logs = $this->Logs->find('all')
            ->where([
                'log_url LIKE' => '%"Clients","update"%',
            ])
            ->order(['stat_created' => 'DESC'])
            ->toArray();

        $notificationsemailPhone = [];

        foreach ($logs as $log) {
            $logChanges = json_decode($log->log_changes, true);

            $emailChanged = isset($logChanges['before']['client_email']) && isset($logChanges['after']['client_email']) && $logChanges['before']['client_email'] !== $logChanges['after']['client_email'];
            $phoneChanged = isset($logChanges['before']['client_phone']) && isset($logChanges['after']['client_phone']) && $logChanges['before']['client_phone'] !== $logChanges['after']['client_phone'];

            if ($emailChanged || $phoneChanged) {
                $notification = [
                    'log_id' => $log->id,
                    'client_id' => $log->log_url[3],
                    'changes' => []
                ];

                if ($emailChanged) {
                    $notification['changes'][] = "Email changed from {$logChanges['before']['client_email']} to {$logChanges['after']['client_email']}";
                }
                if ($phoneChanged) {
                    $notification['changes'][] = "Phone changed from {$logChanges['before']['client_phone']} to {$logChanges['after']['client_phone']}";
                }

                $notificationsemailPhone[] = $notification;
            }
        }

        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'notificationsemailPhone' => $notificationsemailPhone,
               

            ]
        ]);
        die();
    }
    
    public function view($id = null)
    {
        $rec = $this->Logs->get( $id, [
            'contain'=>['Users'=>['fields'=>['user_fullname']]]
        ] );
        // debug($rec->toArray());
        $rec->log_url = json_decode( $rec->log_url, true );
        $rec->log_changes = json_decode( trim(preg_replace('/\s\s+/', ' ', $rec->log_changes)), true );
        $this->set(compact('rec'));
    }

    public function delete($id = null)
    {
        if(!$id){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }
        $delRec = $this->Logs->deleteAll(['id IN ' => explode(",", $id)]);
        
        if ($delRec) {
            $res = ["status"=>"SUCCESS", "data"=>$delRec];
        }else{
            $res = ["status"=>"FAIL", "data"=>$delRec->getErrors()];
        }
        echo json_encode($res);die();

    }
    
    function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        
        if ($this->request->is(['post', 'patch', 'put', 'delete'])) {
            if(!$this->_isAuthorized(true, 'read')){
                echo json_encode(["status" => "FAIL", "redirect" => $this->app_folder.'/admin/clients']); die();
            }
        }
    }
}