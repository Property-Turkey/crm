<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class AddressCategoriesController extends AppController
{
    
    public function index($_pid=null)
    {   
        
        
        $_tags = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
        $_parent = isset($_GET['parent']) ? $_GET['parent'] : false;


        // TAGS search result for tags
        if (!empty($_tags)) {
            $tagsCondition = [
                'parent_id' => $_parent,
                'category_name LIKE' => '%' . $_keyword . '%' 
            ];
            
            $data = $this->AddressCategories
                ->find('all')
                ->select(['text' => 'category_name', 'value'=>'id'])
                ->where($tagsCondition);

            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
            die();
        }


        if ($this->request->is('post')) {

            $this->autoRender  = false;

            $dt = json_decode(file_get_contents('php://input'), true);

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';

            // $dt = json_decode(file_get_contents('php://input'), true);
            
        
        
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = isset($_GET['k']) ? $_GET['k'] : '';

            $noneSearchable = ['page'];

            $conditions=[];


            if(isset($_pid)){
                $conditions['AddressCategories.parent_id'] = $_pid;
            }
            if(strlen($_k) > 0){
                if( $_method == 'like'){
                    $conditions[$_col.' LIKE '] = '%'.$_k.'%';
                }else{
                    $conditions[$_col] = is_numeric( $_k ) ? $_k*1 : $_k;
                }
            }
            
            
            //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue;
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue; 
                    }
                    // if (is_numeric($val)) {
                    //     $conditions[$col] = $val;
                    // }
                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }


            $this->paginate = [ 
                'order'=>[ $_col => $_dir ],
                'conditions' => $conditions,
                'contain' => ['ParentAddressCategories'=>['fields'=>['category_name']]]
            ];

            $categories = $this->paginate($this->AddressCategories);
            
            echo json_encode([
                    "status"=>"SUCCESS", 
                    "data"=>$this->Do->convertJson($categories), 
                    "paging"=>$this->Paginator->getPagingParams()["AddressCategories"]
                ], JSON_UNESCAPED_UNICODE);  die();
            
        }

    }
    
    public function view($id = null)
    {
        $rec = $this->AddressCategories->get($id, [
            'contain' => [],
        ]);

        $this->set('rec', $rec);
    }
    

    
   
    
    public function save($id = -1) 
    {
        $this->request->allowMethod(['post', 'put', 'patch']);
        
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);

        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->AddressCategories->get($dt['id']);
        }

        if ($this->request->is(['post'])) {
            $rec = $this->AddressCategories->newEmptyEntity();
            $dt['id'] = null;
        }


        $dt['category_configs'] = json_encode( !empty($dt['category_configs']) ? $dt['category_configs'] : ['icon'=>'', 'isProtected'=>''] );
        
        $rec = $this->AddressCategories->patchEntity($rec, $dt);
		
        if ($newRec = $this->AddressCategories->save($rec)) {
            echo json_encode(["status"=>"SUCCESS", "data"=>$newRec]); die();
        }
        echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
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
        $delRec = $this->AddressCategories->deleteAll(['id IN ' => explode(",", $id)]);
        
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
            $dt= $this->AddressCategories->newEmptyEntity();;
            $dt["id"] = $rec;
            $dt["rec_state"] = $val;
            if(!$this->AddressCategories->save($dt)){
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
