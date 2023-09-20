<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

use function React\Promise\all;

class SalesController extends AppController
{

    public function index($_pid = null)
    {

        
        $_sale = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find client by name
        if (!empty($_sale)) {
            // $saleCondition = [
            //     'client_name LIKE' => '%' . $_keyword . '%'
            // ];
            $data = $this->Sales
                ->find('all')
                ->select(['value'=>'id']);

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
            $_clientsList = $this->request->getQuery('clientsList');
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;
            $sales = $this->paginate($this->Sales); 

            $noneSearchable = ['page', 'keyword'];
            $betweenFields = ['budget_min', 'budget_max', 'keyword', 'page'];
            $likeFields = ['page', 'keyword'];
            $exactFields = ['source_id', 'sale_priority', 'sale_current_stage', 'category_id', 'pool_id' ];

            $data = [];
            $conditions = [];

            if (isset($_pid)) {
                $conditions['Sales.source_id'] = $_pid;
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
                        $conditions['sales.' . $col] = $val;  
                    } 
                    elseif ($col == 'sale_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['Sales.sale_tags LIKE ' => '%"'.$tag['value'].'"%']; 
                        }
                    } 
                    elseif ($col == $betweenFields) {
                        dd(1);
                        $conditions['sales. BETWEEN ? AND ?'][] = [in_array($col, $betweenFields)];
                    
                    } 
                    else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Sales->get($_id, [
                    'contain' => [
                        'Reports',
                        "Clients",
                        "Categories",
                        "Sources",
                        'Reports.Status',
                        'Reports.Type',
                        "Books",
                        "Pools",
                        "Tags",
                        "SaleSpecs",
                    ],
                ])->toArray();
                
                
                // dd($data["SaleSpecs"]);


                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Sales, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "contain" => [
                        "Reports",
                        "Clients",
                        "Categories",
                        "Sources",
                        'Reports.Status',
                        'Reports.Type',
                        'Reports.Text',
                        "Books",
                        "Pools",
                        "Tags",
                        
                    ],
                    
                ]);
                // $data = $this->Sales->find('all', [
                //     "order" => [$_col => $_dir],
                //     "conditions" => $conditions,
                //     "contain" => [
                //         "Clients",
                //         "Categories",
                //         "Sources",
                //         'Reports.Status',
                //         'Reports.Type',
                //         "Books",
                //         "Pools",
                //         "Tags",
                //     ],
                // ]);

            }

            // // CLIENTS LIST
            // if (!empty($_clientsList)) {
            //     $clientListCond = [];
            //     if (!empty($_clientsList)) {
            //         $clientListCond = ["client_name LIKE" => '%' . $_clientsList . '%'];
            //     }
            //     $clients = $this->Clients->find('list', ["order" => ["client_name" => "ASC"], "conditions" => $clientListCond]);
            //     echo json_encode(
            //         ["status" => "SUCCESS", "data" => $this->Do->convertJson($clients)],
            //         JSON_UNESCAPED_UNICODE
            //     );
            //     die();
            // }
            
            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->Paginator->getPagingParams()["Sales"]
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }

        //list for category
        $parentTypeIds = [37]; //when another category named segments is added, to add it here as well.
        $categoriesType = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentTypeIds])
            ->toArray();

        $optionsType = [];
        foreach ($categoriesType as $category) {
            $optionsType[$category->id] = $category->category_name;
        }

        //list for sources
        $parentSourceIds = [33];
        $categoriesSource = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentSourceIds])
            ->toArray();

        $optionsSource = [];
        foreach ($categoriesSource as $category) {
            $optionsSource[$category->id] = $category->category_name;
        }

        //list for pools
        $parentPoolIds = [28];
        $categoriesPool = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentPoolIds])
            ->toArray();

        $optionsPool = [];
        foreach ($categoriesPool as $category) {
            $optionsPool[$category->id] = $category->category_name;
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

        //list for noSale Type(for Report)
        $parentnoSaleIds = [163];
        $categoriesnoSale = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentnoSaleIds])
            ->toArray();

        $optionsnoSale = [];
        foreach ($categoriesnoSale as $category) {
            $optionsnoSale[$category->id] = $category->category_name;
        }

        //list for noSale Type(for Report)
        $parentpropertyTypeIds = [159];
        $categoriespropertyType = $this->getTableLocator()->get('Categories')->find('all')
            ->where(['parent_id IN' => $parentpropertyTypeIds])
            ->toArray();

        $optionspropertyType = [];
        foreach ($categoriespropertyType as $category) {
            $optionspropertyType[$category->id] = $category->category_name;
        }


       

        $this->set(compact('optionsType', 'optionsSource', 'optionsPool', 'optionsStatus', 'optionsReport','optionsnoSale','optionspropertyType'));


    }



    public function view($id = null)
    {
        $rec = $this->Sales->get($id, [
            'contain' => ['Reports'],
        ]);

        $this->set(compact('rec'));


    }

    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            
            $rec = $this->Sales->get($dt['id'], ['contain'=>['Sources','Reports','SaleSpecs','Usersale','Books']]);
            $dt['sale_tags'] = json_encode( $dt['sale_tags'] );
            if(isset($dt['client'][0]['value'])){
                $rec->client_id = $dt['client'][0]['value'];
            }
            $rec = $this->Sales->patchEntity($rec, $dt); 
           
            // $rec->sale_tags = json_encode($dt['sale_tags']);
            
        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['tar_tbl'] = $this->Do->get('targetTables')[$this->request->getParam('controller')];
            $dt['sale_current_stage'] = 2;
            $dt['sale_tags'] = json_encode( $dt['sale_tags'] );
            $rec = $this->Sales->newEntity($dt,[
                'contain' => ['SaleSpecs','Usersale']
            ]);
            if(isset($dt['client'][0]['value'])){
                $rec->client_id = $dt['client'][0]['value'];
            }
            
            
            // $rec->sale_tags = json_encode($dt['sale_tags']);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            unset($rec['category']);
            unset($rec['pool']);
            unset($rec['source']);
            unset($rec['tag']);
            unset($rec['report']);
            unset($rec['book']);

            if ($newRec = $this->Sales->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec)]);
                die();
            }


            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        }

    }


    public function delete($id = null)
    {
        if (!$id) {
            echo json_encode(["status" => "FAIL", "msg" => __("is-selected-empty-msg"), "data" => []]);
            die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;

        if (!$this->_isAuthorized(true)) {
            echo json_encode(["status" => "FAIL", "msg" => __("no-auth"), "data" => []]);
            die();
        }

        $delRec = $this->Sales->deleteAll(['id IN ' => explode(",", $id)]);

        if ($delRec) {
            $res = ["status" => "SUCCESS", "data" => $delRec];
        } else {
            $res = ["status" => "FAIL", "data" => $delRec->getErrors()];
        }
        echo json_encode($res);
        die();

    }

    public function enable($ids = null)
    {
        if (!$ids) {
            echo json_encode(["status" => "FAIL", "msg" => __("is-selected-empty-msg"), "data" => []]);
            die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;
        if (!$this->_isAuthorized(true)) {
            echo json_encode(["status" => "FAIL", "msg" => __("no-auth"), "data" => []]);
            die();
        }
        $records = json_decode(file_get_contents('php://input'), true);
        $errors = [];
        foreach ($records as $rec) {
            if (!is_numeric($rec)) {
                continue;
            }
            $dt = $this->Sales->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            if (!$this->Sales->save($dt)) {
                $errors[] = $dt->getErrors();
            }
        }

        if (empty($errors)) {
            $res = ["status" => "SUCCESS", "data" => $dt];
        } else {
            $res = ["status" => "FAIL", "data" => $dt->getErrors()];
        }
        echo json_encode($res);
        die();

    }


}