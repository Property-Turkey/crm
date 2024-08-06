<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class EnquiresController extends AppController
{
    
    public function index($_pid=null)
    {
        $_enquiry = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find enquiry by name
        if (!empty($_enquiry)) {
            $enquiryCondition = [
                'enquiry_name LIKE' => '%' . $_keyword . '%'
            ];
            $data = $this->Enquires
                ->find('all')
                ->select(['text' => 'enquiry_name',  'value'=>'id'])
                ->where($enquiryCondition);

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
            $enquires = $this->paginate($this->Enquires); 

            $noneSearchable = ['page', 'keyword'];
            $likeFields = ['page', 'keyword'];
            $betweenFields = ['budget_min', 'budget_max', 'keyword', 'page'];
            $exactFields = ['source_id', 'enquiry_nationality', 'adrs_country', 'adrs_city', 'adrs_region', 'enquiry_address'];
            $otherCtrl = ['client_priority', 'sale_current_stage', 'category_id', 'pool_id'];


            $data = [];
            $conditions = [];


            // if(!empty( $dt )){
            //     foreach($dt as $key=>$itm){
            //         if(in_array($key, $noneSearchable)){ continue; }
            //         $conditions[$key] = $itm;
            //     }
            // }
            
            // if (isset($_pid)) {
            //     $conditions['Enquires.source_id'] = $_pid;
            // }
            if (strlen($_k.'') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Enquires.' . $_col] = $_k; // note = $col condition is not correct 
            }

            
            // //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue; 
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['Enquires.' . $col] = $val;  
                    } 
                    elseif (in_array($col, $otherCtrl)) {
                        $conditions['Sales.' . $col] = $val;
                    } 
                    elseif($col == 'enquiry_mobile'){
                        $conditions[$col . ' LIKE '] = $val . '%';
                    }
                    elseif ($col == 'sale_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['Sales.sale_tags LIKE ' => '%"'.$tag['value'].'"%'];
                        }
                    }
                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }


            // Search
            // if (!empty($dt['search'])) {
            //     foreach ($dt['search'] as $col => $val) {
            //         if (empty($val)) {
            //             continue; // Skip this column if input is empty
            //         }
            //         if (in_array($col, $noneSearchable)) {
            //             continue;
            //         }
            //         if (in_array($col, $exactFields)) {
            //             $conditions['Enquires.' . $col] = $val;
            //         }elseif (in_array($col, $otherCtrl)) {
            //             $conditions['Sales.' . $col] = $val;
            //         }  elseif ($col == 'sale_tags') {
            //             foreach ($val as $tag) {
            //                 $conditions['AND'][] = ['Sales.sale_tags LIKE ' => '%"'.$tag['value'].'"%'];
            //             }
            //         }elseif ($col == $betweenFields) {
            //             dd(1);
            //             $conditions['sales. BETWEEN ? AND ?'][] = [in_array($col, $betweenFields)];
            //         } else {
            //             $conditions[$col . ' LIKE '] = '%' . $val . '%';
            //         }
                    
                    
            //     }
            // }
            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Enquires-> get( $_id, [
                    'contain' => [
                        "Country",
                        "Sources",

                    ]])->toArray();

                //dd( $data);
                echo json_encode(["status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], JSON_UNESCAPED_UNICODE); die();
                
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Enquires, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                    "limit"=>12,
                    'contain' => [
                        "Sources",
                        "Country",
                    ]]);
                    

            }
             
            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data), 
                "paging" => $this->request->getAttribute('paging')['Enquires']

            
            ], 
                JSON_UNESCAPED_UNICODE); die();
        }

     


    }
    

    
    public function save($id = -1) 
    {
        $dt = json_decode(file_get_contents('php://input'), true);
        
        // Edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Enquires->get($dt['id']);
    
            if (isset($dt['property'][0]['value'])) {
                $rec->property_id = $dt['property'][0]['value'];
            }
            $rec = $this->Enquires->patchEntity($rec, $dt);
        }
    
        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
    
            if (isset($dt['property'][0]['value'])) {
                $rec->property_id = $dt['property'][0]['value'];
            }
            $rec = $this->Enquires->newEntity($dt);
        }
    
        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            
            if ($newRec = $this->Enquires->save($rec)) {
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

        $delRec = $this->Enquires->deleteAll(['id IN ' => explode(",", $id)]);
        
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
            $dt= $this->Enquires->newEmptyEntity();;
            $dt["id"] = $rec;
            if(!$this->Enquires->save($dt)){
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
