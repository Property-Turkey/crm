<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersaleController extends AppController
{
    
    public function index($_pid=null)
    {   
    

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $dt = json_decode(file_get_contents('php://input'), true);
            // dd($dt);
            $_method = !empty($_GET['method']) ? $_GET['method'] : '';

            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_tags = isset($_GET['tags']) ? $_GET['tags'] : false;
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;
            $usersale = $this->paginate($this->Usersale); 

            $data = [];
            $conditions = [];

            // if (isset($_pid)) {
            //     $conditions['Usersale.source_id'] = $_pid;
            // }
            if (strlen($_k.'') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Usersale.' . $_col] = $_k; // note = $col condition is not correct 
            }

            

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Usersale->get($_id, [
                    'contain' => ['Users'],
                    
                ])->toArray();
                dd($data);
                $data["lead"] = [
                    [
                    "text"=>$data['lead']['id'],
                    "value"=>$data['id']
                    ]
                ];
                $data["user"] = [
                    [
                    "text"=>$data['user']['user_fullname'],
                    "value"=>$data['user_id']
                    ]
                ];
                


                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Usersale, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "contain" => ['Users'],
                ]);
                

            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->Paginator->getPagingParams()["Usersale"]
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }

       

    }
    


    
    public function view($id = null)
    {
        $rec = $this->Usersale->get($id, [
            'contain' => [],
        ]);

        $this->set('rec', $rec);
    }
    

    
    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            
            $rec = $this->Usersale->get($dt['id']);
            $rec = $this->Usersale->patchEntity($rec, $dt); 
            if(isset($dt['lead'][0]['value'])){
                $rec->lead_id = $dt['lead'][0]['value'];
            }
            if(isset($dt['user'][0]['value'])){
                $rec->user_id = $dt['user'][0]['value'];
            }
        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $rec = $this->Usersale->newEntity($dt);
            if(isset($dt['lead'][0]['value'])){
                $rec->lead_id = $dt['lead'][0]['value'];
            }
            if(isset($dt['user'][0]['value'])){
                $rec->user_id = $dt['user'][0]['value'];
            }
            // dd($dt);
            
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            unset($rec['user']);
            unset($rec['lead']);
            if ($newRec = $this->Usersale->save($rec)) {
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
        $delRec = $this->Usersale->deleteAll(['id IN ' => explode(",", $id)]);
        
        if ($delRec) {
            $res = ["status"=>"SUCCESS", "data"=>$delRec];
        }else{
            $res = ["status"=>"FAIL", "data"=>$delRec->getErrors()];
        }
        echo json_encode($res);die();

        return $this->redirect(['action' => 'index']);
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
            $dt= $this->Usersale->newEmptyEntity();;
            $dt["id"] = $rec;
            $dt["rec_state"] = $val;
            if(!$this->Usersale->save($dt)){
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
