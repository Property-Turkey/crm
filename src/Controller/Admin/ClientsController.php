<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class ClientsController extends AppController
{
    
    public function index($_pid=null)
    {
        $_client = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find client by name
        if (!empty($_client)) {
            $clientCondition = [
                'client_name LIKE' => '%' . $_keyword . '%'
            ];
            $data = $this->Clients
                ->find('all')
                ->select(['text' => 'client_name',  'value'=>'id'])
                ->where($clientCondition);

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
            $clients = $this->paginate($this->Clients); 

            $noneSearchable = ['page'];
            $likeFields = ['page'];
            $exactFields = ['source_id', 'client_nationality', 'adrs_country', 'adrs_city', 'adrs_region', 'client_address'];


            $data = [];
            

            if(!empty( $dt )){
                foreach($dt as $key=>$itm){
                    if(in_array($key, $noneSearchable)){ continue; }
                    $conditions[$key] = $itm;
                }
            }
            
            if (isset($_pid)) {
                $conditions['Clients.source_id'] = $_pid;
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
                        $conditions['clients.' . $col] = $val;  
                    } 
                    elseif($col == 'client_mobile'){
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
                $data = $this->Clients-> get( $_id, [
                    'contain' => [
                        'Reports.Status',
                        'Reports.Type',
                        "Sources",
                ]])->toArray();

                //dd( $data);
                echo json_encode(["status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], JSON_UNESCAPED_UNICODE); die();
                
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Clients, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                    "limit"=>12,
                    'contain' => [
                        'Reports.Status',
                        'Reports.Type',
                        "Sources",
                        
                    ]]);
                    

            }
             
            echo json_encode( 
                [ "status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data), 
                "paging"=>$this->Paginator->getPagingParams()["Clients"]], 
                JSON_UNESCAPED_UNICODE); die();
        }

       
        //for list sources
        $parentSourceIds = [33];
        $categoriesSource = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentSourceIds])
            ->toArray();
        
        $optionsSource = [];
        foreach ($categoriesSource as $category) {
            $optionsSource[$category->id] = $category->category_name;
        }
     
        //list for Status(for Report)
        $parentStatusIds = [73];
        $categoriesStatus = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentStatusIds])
            ->toArray();

        $optionsStatus = [];
        foreach ($categoriesStatus as $category) {
            $optionsStatus[$category->id] = $category->category_name;
        }

        //list for Report Type(for Report)
        $parentReportIds = [53];
        $categoriesReport = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentReportIds])
            ->toArray();

        $optionsReport = [];
        foreach ($categoriesReport as $category) {
            $optionsReport[$category->id] = $category->category_name;
        }

        $this->set(compact('optionsSource','optionsStatus','optionsReport'));


    }
    
    public function view($id = null)
    {
        $rec = $this->Clients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('rec'));
        
        
        
       
    }

    
    public function save($id = -1) 
    {


        $dt = json_decode(file_get_contents('php://input'), true);
        
        // edit mode
        if ($this->request->is(['patch', 'put'])) {

            $rec = $this->Clients->get($dt['id'], ['contain'=>['Sources','Reports']]);
            // if(isset($dt['city'][0]['value'])){
            //     $rec->adrs_city = $dt['city'][0]['value'];
            // }
            // if(isset($dt['country'][0]['value'])){
            //     $rec->adrs_city = $dt['country'][0]['value'];
            // }
            // if(isset($dt['region'][0]['value'])){
            //     $rec->adrs_city = $dt['region'][0]['value'];
            // }
            $rec = $this->Clients->patchEntity($rec, $dt);
 

        }
        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            
            $rec = $this->Clients->newEntity($dt);
            
            if(isset($dt['city'][0]['value'])){
                $rec->adrs_city = $dt['city'][0]['value'];
            }
            if(isset($dt['country'][0]['value'])){
                $rec->adrs_city = $dt['country'][0]['value'];
            }
            if(isset($dt['region'][0]['value'])){
                $rec->adrs_city = $dt['region'][0]['value'];
            }
        }
        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            if ($newRec = $this->Clients->save($rec)) {
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

        $delRec = $this->Clients->deleteAll(['id IN ' => explode(",", $id)]);
        
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
            $dt= $this->Clients->newEmptyEntity();;
            $dt["id"] = $rec;
            if(!$this->Clients->save($dt)){
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
