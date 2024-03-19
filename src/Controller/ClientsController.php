
<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class ClientsController extends AppController
{

    public function index($_pid = null)
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
                ->select(['text' => 'client_name', 'value' => 'id'])
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

            $noneSearchable = ['page', 'keyword'];
            $likeFields = ['page', 'keyword'];
            $betweenFields = ['budget_min', 'budget_max', 'keyword', 'page'];
            $exactFields = ['source_id', 'client_nationality', 'adrs_country','pool_id', 'adrs_city', 'adrs_region', 'client_address'];
            $otherCtrl = ['client_priority', 'client_current_stage', 'category_id'];


            $data = [];
            $conditions = [];


            // if(!empty( $dt )){
            //     foreach($dt as $key=>$itm){
            //         if(in_array($key, $noneSearchable)){ continue; }
            //         $conditions[$key] = $itm;
            //     }
            // }

            // if (isset($_pid)) {
            //     $conditions['Clients.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Clients.' . $_col] = $_k; // note = $col condition is not correct 
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
                        $conditions['Clients.' . $col] = $val;
                    } elseif (in_array($col, $otherCtrl)) {
                        $conditions['' . $col] = $val;
                    } elseif ($col == 'client_mobile') {
                        $conditions[$col . ' LIKE '] = $val . '%';
                    } elseif ($col == 'client_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['client_tags LIKE ' => '%"' . $tag['value'] . '"%'];
                        }
                    } else {
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
            //             $conditions['Clients.' . $col] = $val;
            //         }elseif (in_array($col, $otherCtrl)) {
            //             $conditions['' . $col] = $val;
            //         }  elseif ($col == 'client_tags') {
            //             foreach ($val as $tag) {
            //                 $conditions['AND'][] = ['client_tags LIKE ' => '%"'.$tag['value'].'"%'];
            //             }
            //         }elseif ($col == $betweenFields) {
            //             dd(1);
            //             $conditions[' BETWEEN ? AND ?'][] = [in_array($col, $betweenFields)];
            //         } else {
            //             $conditions[$col . ' LIKE '] = '%' . $val . '%';
            //         }


            //     }
            // }
            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Clients->get($_id, [
                    'contain' => [
                        'Reports',
                        "Reports.TypeCategories",
                        "Sources",
                        'Adrscountry'=>['fields'=>['adrs_name', 'id']],
                        "Categories",
                        'Books',
                        "PoolCategories",
                        "TagCategories",
                        "ClientSpecs",
                        "ClientSpecs.Currency",
                        "ClientSpecs.Persona",
                        "ClientSpecs.Style",
                        "Offers",
                        "Offers.PropertyRef"=>['fields'=>['property_title', 'property_ref', 'id']],
                        "Reservations",
                        "Reservations.Payment",
                        "Reservations.Currency",
                        "UserSale.Users",
                        "Users",
                        "Actions",
                        "Actions.Action",
                        "Enquires",
                        'Reminders',
                        
                    ]
                ])->toArray();

                
                $data["adrscountry"] = [
                    [
                        "text" => $data['adrscountry']['adrs_name'],
                        "value" => $data['id']
                    ]
                ];
                
                // $data["cc"] = $data['adrscountry']['adrs_name'];
                // $data["property"] = [
                //     [
                //         "text" => $data['property']['property_ref'],
                //         "value" => $data['id']
                //     ]
                // ];

                // dd( $data["country"]);
                // debug($data['adrscountry']);

                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {

                $userRole = $this->Auth->user('user_role');
                $q = $this->Clients->find()
                ->order(['Clients.'.$_col => $_dir])
                ->where([$conditions])
                ->limit(12)
                // ->leftJoinWith('Sales')

                ->contain([
                    "ClientSpecs",
                    'PoolCategories',
                    "Reports.TypeCategories",
                    'TagCategories',
                    'ClientSpecs',
                    'Categories',
                    'ClientSpecs.Currency',
                    'Reminders',
                    'Reports',
                    'Sources',
                    'Reports.Text',
                    'Users',
                    "UserSale.Users",
                    "UserSale"
                    
                ])
                ->group('Clients.id');

                if ($userRole == 'admin.root' || $userRole == 'admin.admin' || $userRole == 'admin.cc') {
                    // Admin kullanıcısı her şeyi görebilir
                } else {
                    $userId = $this->Auth->user('id');
                    $q->matching('UserSale', function ($q) use ($userId) {
                        return $q->where(['user_id' => $userId]);
                    });
                }
                
                
                $data = $this->paginate($q);
           

        }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Clients']


                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }


    }

 
    


    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // Edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Clients->get($dt['id'], ['contain'=> 'ClientSpecs', 'Categories', 'Report']);

            
            $saleSpecs = $dt['client_specs'];

            foreach ($saleSpecs as &$saleSpec) {
                if (isset($saleSpec['clientspec_propertytype'])) {
                    $saleSpec['clientspec_propertytype'] = json_encode($saleSpec['clientspec_propertytype']);
                }
                if (isset($saleSpec['clientspec_beds'])) {
                    $saleSpec['clientspec_beds'] = json_encode($saleSpec['clientspec_beds']);
                }
            }
            $dt['client_specs'] = $saleSpecs;

            //Remove spaces and symbols from the number
            if (isset($dt['client_mobile'])) {
                $clientMobile = preg_replace("/[^0-9]/", "", $dt['client_mobile']);
                $dt['client_mobile'] = $clientMobile;
            }
            if (isset($dt['client_phone'])) {
                $clientPhone = preg_replace("/[^0-9]/", "", $dt['client_phone']);
                $dt['client_phone'] = $clientPhone;
            }
            if (isset($dt['client_tags'])) {
                $dt['client_tags'] = json_encode($dt['client_tags']);
            }
            
            if (isset($dt['adrscountry'][0]['value'])) {
                $aaa = (int)$dt['adrscountry'][0]['value'];
            }
            $rec = $this->Clients->patchEntity($rec, $dt);
            $rec->adrs_country = $aaa;
            

            // if ($rec->client_current_stage == 4 && $rec->rec_state == 2) {
            //     $rec->client_current_stage = 3;
            //     $rec->rec_state = 1;
            // }
        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['client_current_stage'] = 2;

            // //Remove spaces and symbols from the number
            if (isset($dt['client_mobile'])) {
                $clientMobile = preg_replace("/[^0-9]/", "", $dt['client_mobile']);
                $dt['client_mobile'] = $clientMobile;
            }

            if (isset($dt['client_phone'])) {
                $clientPhone = preg_replace("/[^0-9]/", "", $dt['client_phone']);
                $dt['client_phone'] = $clientPhone;
            }

        
            

            $existingClient = $this->Clients->find()
                ->where(['client_email' => $dt['client_email']])
                ->first();

            if ($existingClient) {
                echo json_encode(["status" => "EMAIL_EXISTS", "client_id" => $existingClient->id]);
                die();
            }
            if (isset($dt['enquires'][0]['property'][0]['value'])) {
                $rec->property_id = $dt['enquires'][0]['property'][0]['value'];
            }

            if (isset($dt['adrscountry'][0]['value'])) {
                $rec->adrs_country = $dt['adrscountry'][0]['value'];
            }
            // dd($dt['enquires'][0]['property'][0]['value']);

            $rec = $this->Clients->newEntity($dt);
            
// dd($rec);
// debug($dt['adrscountry']);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            // unset($rec['source']);
            unset($rec['reports']);
            unset($rec['category']);
            unset($rec['reminders']);
            unset($rec['pool_category']);
            unset($rec['tag_category']);
            unset($rec['book']);
            unset($rec['source']);
            unset($rec['offers']);
            unset($rec['user_sale']);
            unset($rec['adrscountry']);

            // dd($rec['adrscountry']);
            // $rec['books'] = $rec['book'];


            // if ($newRec = $this->Clients->Sales->Books->save($rec['book'])) {
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

        $delRec = $this->Clients->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->Clients->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            if (!$this->Clients->save($dt)) {
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
