<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class OffersController extends AppController
{
    
    public function index($_pid=null)
    {
        $_offer = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find offer by name
        if (!empty($_offer)) {
            $offerCondition = [
                'offer_name LIKE' => '%' . $_keyword . '%'
            ];
            $data = $this->Offers
                ->find('all')
                ->select(['text' => 'offer_name',  'value'=>'id'])
                ->where($offerCondition);

            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
            die();
        }

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
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;
            $offers = $this->paginate($this->Offers); 

            $noneSearchable = ['page'];
            $likeFields = ['page'];
            $exactFields = ['source_id', 'offer_nationality', 'adrs_country', 'adrs_city', 'adrs_region', 'offer_address'];


            $data = [];
            

            if(!empty( $dt )){
                foreach($dt as $key=>$itm){
                    if(in_array($key, $noneSearchable)){ continue; }
                    $conditions[$key] = $itm;
                }
            }
            
            if (isset($_pid)) {
                $conditions['Offers.source_id'] = $_pid;
            }
            if (strlen($_k.'') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Sales.' . $_col] = $_k; // note = $col condition is not correct 
            }

            $conditions = [];

            //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue; 
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['offers.' . $col] = $val;  
                    } 
                    elseif($col == 'offer_mobile'){
                        $conditions[$col . ' LIKE '] = $val . '%';
                    }
                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Offers-> get( $_id, [
                    'contain' => [
                ]])->toArray();

                //dd( $data);
                echo json_encode(["status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], JSON_UNESCAPED_UNICODE); die();
                
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Offers, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                    "limit"=>12,
                    'contain' => [
                        
                    ]]);
                    

            }
             
            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data), 
                "paging" => $this->request->getAttribute('paging')['Offers']
            ], 
                JSON_UNESCAPED_UNICODE); die();
        }

       
    }
    
    public function view($id = null)
    {
        $rec = $this->Offers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('rec'));
        
        
        
       
    }

    
    public function save($id = -1) 
    {


        $dt = json_decode(file_get_contents('php://input'), true);
        
        // edit mode
        if ($this->request->is(['patch', 'put'])) {

            $rec = $this->Offers->get($dt['id']);
            
            $rec = $this->Offers->patchEntity($rec, $dt);


        }


        
        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            
            $rec = $this->Offers->newEntity($dt);
            
        }



        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            if ($newRec = $this->Offers->save($rec)) {
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

        $delRec = $this->Offers->deleteAll(['id IN ' => explode(",", $id)]);
        
        if ($delRec) {
            $res = ["status"=>"SUCCESS", "data"=>$delRec];
        }else{
            $res = ["status"=>"FAIL", "data"=>$delRec->getErrors()];
        }
        echo json_encode($res);die();

    }
    
    public function enable($ids=null)
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
            $dt= $this->Offers->newEmptyEntity();;
            $dt["id"] = $rec;
            if(!$this->Offers->save($dt)){
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
