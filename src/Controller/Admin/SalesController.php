<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Table\SalespecsTable;

class SalesController extends AppController
{
    public function index($_pid = null)
    {
        $_sale = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // Find client by name
        if (!empty($_sale)) {
            $data = $this->Sales
                ->find('all')
                ->select(['value' => 'id']);

            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
            die();
        }

        if ($this->request->is('post')) {
            $this->autoRender = false;

            $dt = json_decode(file_get_contents('php://input'), true);
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
            $exactFields = ['client_priority', 'sale_current_stage', 'category_id'];
            $otherCtrl = ['source_id'];


            $data = [];
            $conditions = [];

            // if (isset($_pid)) {
            //     $conditions['Sales.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Sales.' . $_col] = $_k;
            }

            // Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['Sales.' . $col] = $val;
                    } elseif (in_array($col, $otherCtrl)) {
                        $conditions['Clients.' . $col] = $val;
                    } elseif ($col == 'sale_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['Sales.sale_tags LIKE ' => '%"' . $tag['value'] . '"%'];
                        }
                    } elseif ($col == $betweenFields) {
                        dd(1);
                        $conditions['sales. BETWEEN ? AND ?'][] = [in_array($col, $betweenFields)];
                    } else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }


                }
            }

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Sales->get($_id, [
                    'contain' => [
                        // 'Reports',
                        "Categories",
                        "Reports.TypeCategories",
                        "Books",
                        "TagCategories",
                        "SaleSpecs",
                        "SaleSpecs.Currency",
                        "SaleSpecs.Persona",
                        "SaleSpecs.Style",
                        "Reservations",
                        "Reservations.Payment",
                        "Reservations.Currency",
                        "Actions",
                        "Actions.Action",
                    ],
                ])->toArray();
                // dd($dt);


                // $data["name"] = [
                //     [
                //         "text" => $data['client']['client_name'],
                //         "value" => $data['client_id']
                //     ]
                // ];
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Sales, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "contain" => [
                        // "Reports",
                        // "Categories",
                        'Reports.TypeCategories',
                        'SaleSpecs.Currency',
                        // 'Reports.Text',
                        // "Books",
                        // "TagCategories",
                        // "Offers",
                        // "UserSale",
                        // "SaleSpecs",
                        // "SaleSpecs.Currency",
                        // "Reminders",

                    ],
                ]);
            }

            
            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Sales']
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


            $rec = $this->Sales->get($dt['id'], [
                'contain' => [
                    'Actions',
                    'Reports',
                    'SaleSpecs',
                    'UserSale',
                    'Books',
                    'Categories',
                    'Reports.TypeCategories'
                ]
            ]);


            // if (isset($dt['sale_tags']['value'])) {
            //         $rec->sale_tags = $dt['sale_tags']['value'];
            //     }
            $dt['sale_tags'] = json_encode($dt['sale_tags']);

            $saleSpecs = $dt['sale_specs'];

            foreach ($saleSpecs as &$saleSpec) {
                if (isset($saleSpec['salespec_propertytype'])) {
                    $saleSpec['salespec_propertytype'] = json_encode($saleSpec['salespec_propertytype']);
                }
                if (isset($saleSpec['salespec_beds'])) {
                    $saleSpec['salespec_beds'] = json_encode($saleSpec['salespec_beds']);
                }
            }

            $dt['sale_specs'] = $saleSpecs;

            // if (isset($dt['sale_tags'][0]['value'])) {
            //     $rec->client_id = $dt['sale_tags'][0]['value'];
            // }

            // $dt['actions'] = $dt['actions'][0];
            // // dd( $dt['actions']);
            // $dt['actions']['user_id'] = $this->authUser['id'];
            // $dt['actions']['stat_created'] = date('Y-m-d H:i:s');


            // $rec->actions = $this->Sales->Actions->newEntities([$dt['actions']]);            
            

            $rec = $this->Sales->patchEntity($rec, $dt);

            if ($rec->sale_current_stage == 4 && $rec->rec_state == 2) {
                $rec->sale_current_stage = 3;
                $rec->rec_state = 1;
            }
            
            // $newRec = $this->Sales->save($rec);


        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['tar_tbl'] = $this->Do->get('targetTables')[$this->request->getParam('controller')];
            $dt['sale_current_stage'] = 2;

            $dt['sale_tags'] = json_encode($dt['sale_tags']);

            $saleSpecs = $dt['sale_specs'];

            foreach ($saleSpecs as &$saleSpec) {
                if (isset($saleSpec['salespec_propertytype'])) {
                    $saleSpec['salespec_propertytype'] = json_encode($saleSpec['salespec_propertytype']);
                }
                if (isset($saleSpec['salespec_beds'])) {
                    $saleSpec['salespec_beds'] = json_encode($saleSpec['salespec_beds']);
                }
            }
            $dt['sale_specs'] = $saleSpecs;
            $saleSpecsTable = new SalespecsTable();
            $newSaleSpecsEntity = $saleSpecsTable->newEntity($dt['sale_specs']);

            $rec = $newSaleSpecsEntity;

            $rec = $this->Sales->newEntity($dt);



            // if (isset($dt['name'][0]['value'])) {
            //     $rec->client_id = $dt['name'][0]['value'];
            // }


        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            // unset($rec['source']);
            // unset($rec['report']);
            // unset($rec['client']);
            // unset($rec['reminders']);

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
