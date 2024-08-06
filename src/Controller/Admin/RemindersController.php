<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

class RemindersController extends AppController
{
    
    public function index()
    {

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $conditions = [ ];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k'])>0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            // $reminder_type = isset($_GET['reminder_type']) ? $_GET['reminder_type'] : '';
            
            if( !empty($_from) ){ $conditions['Reminders.stat_updated > '] = $_from; }
            if( !empty($_to) ){ $conditions['Reminders.stat_updated < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Reminders.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Reminders->get( $_id, [
                    'contain' => []
                ])->toArray();
              
                $data = $this->Do->convertJson($data);
                echo json_encode( [ "status"=>"SUCCESS",  "data"=>$data],  JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Reminders, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                    'contain' => [
                        'Clients'
                    ]
                ]);
                $data = $this->Do->convertJson($data);
            }


            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data),
                 "paging" => $this->request->getAttribute('paging')['Reminders']
                ], 
                JSON_UNESCAPED_UNICODE); die();

        }



    }
    
    public function save($id = -1) 
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Reminders->get($dt['id']);
        
            $rec = $this->Reminders->patchEntity($rec, $dt);
        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['user_id'] = $this->authUser['id'];
            

            $rec = $this->Reminders->newEntity($dt);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {

            $this->autoRender = false;

            if ($newRec = $this->Reminders->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec)]);
                die();
            }

            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        }
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
        $delRec = $this->Reminders->deleteAll(['id IN ' => explode(",", $id)]);
        
        if ($delRec) {
            $res = ["status"=>"SUCCESS", "data"=>$delRec];
        }else{
            $res = ["status"=>"FAIL", "data"=>$delRec->getErrors()];
        }
        echo json_encode($res);die();

    }
    
    public function enable($val=1, $ids=null)
    {
        if(!$ids){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;
        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }
        $records = json_decode( file_get_contents('php://input'), true);
        $errors = [];
        foreach($records as $rec){
            if(!is_numeric($rec)){continue;}
            $dt= $this->Reminders->newEmptyEntity();;
            $dt["id"] = $rec;
            $dt["rec_state"] = $val;
            if(!$this->Reminders->save($dt)){
                $errors[] = $dt->getErrors();
            }
        }
        
        if (empty($errors)) {
            $res = ["status"=>"SUCCESS", "data"=>$dt];
        }else{
            $res = ["status"=>"FAIL", "data"=>$dt->getErrors()];
        }
        echo json_encode($res);die();

    }
    
}
