<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

class ReportsController extends AppController
{

    public function index()
    {

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $conditions = [];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            $report_type = isset($_GET['report_type']) ? $_GET['report_type'] : '';

            if (!empty($_from)) {
                $conditions['Reports.stat_updated > '] = $_from;
            }
            if (!empty($_to)) {
                $conditions['Reports.stat_updated < '] = $_to;
            }
            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Reports.' . $_col] = $_k;
            }

            $data = [];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            // ONE RECORD
            if (!empty($_id)) {

               
                // if ($report_type == 'empathy') {
                //     $empathy_reports = $this->Reports->Clients->find()
                //         ->contain([
                //             'EmpathyReports' => function ($q) {
                //                 return $q->where(['EmpathyReports.report_type IN' => [201, 202, 203, 204]]);
                //             }
                //         ])
                //         ->where(['Clients.id' => $_id])
                //         ->first();

                //     $empath_data = [];
                //     foreach ((array) $empathy_reports['empathy_reports'] as $itm) {
                //         $empath_data[$itm['report_type']] = $itm;
                //     }


                //     // $tar_id = isset($_GET['id']) ? $_GET['id'] : '';

                //     // debug($tar_id);

                //     echo json_encode(["status" => "SUCCESS", "data" => ['empathy' => $this->Do->convertJson($empath_data)]], JSON_UNESCAPED_UNICODE);
                //     die();
                // } else {
                //     $data = $this->Reports->get($_id, [
                //         'contain' => [
                //             "TypeCategories"
                //         ]
                //     ])->toArray();
    
                  
                
                //     echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                //     die();
                // }

                
                $data = $this->Reports->get($_id, [
                    'contain' => [
                        "TypeCategories",
                        "User",
                        "Property" => ['fields' => ['param_ownertype', 'property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
                    ]
                ])->toArray();

                if (!empty ($data['property'])) {

                    $data["property"] = [
                        [
                            "text" => $data["property"]["property_ref"],
                            "value" => $data["property"]['id']
                        ]
                    ];
                }
            // dd($data['property_id']);
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
                
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Reports, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    'contain' => [
                        "TypeCategories",
                        "User",
                        "Property" => ['fields' => ['param_ownertype', 'property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],

                    ]
                ]);
              
                $data = $this->Do->convertJson($data);
            }


            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Reports']
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();

          
        }

        // $tar_id = isset($_GET['id']) ? $_GET['id'] : '';

        // dd($tar_id);
    }



    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);
        $this->autoRender = false; // Disable auto rendering
    
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Reports->get($dt['id']);
            
            if (isset($dt['property'][0]['value'])) {
                $rec->property_id = (int)$dt['property'][0]['value'];
            }
            
            $dt = $this->Reports->patchEntity($rec, $dt);
            // $operationType = 'edit';
        } elseif ($this->request->is('post')) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['user_id'] = $this->authUser['id'];
    
            // dd( $dt['tar_id']);
            $rec = $this->Reports->newEntity($dt);
            
            if (isset($dt['property'][0]['value'])) {
                $rec->property_id = (int)$dt['property'][0]['value'];
            }
            
            // $rec->tar_id = (int)$dt['tar_id'];
        } else {
            echo json_encode(["status" => "ERROR", "message" => "Invalid request type"]);
            die();
        }
    
        if ($this->Reports->save($rec)) {
            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($rec)]);
        } else {
            $errors = $rec->getErrors();
            echo json_encode(["status" => "ERROR", "message" => "Failed to save the record", "errors" => $errors]);
        }
        die();
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
        $delRec = $this->Reports->deleteAll(['id IN ' => explode(",", $id)]);

        if ($delRec) {
            $res = ["status" => "SUCCESS", "data" => $delRec];
        } else {
            $res = ["status" => "FAIL", "data" => $delRec->getErrors()];
        }
        echo json_encode($res);
        die();

    }

    public function enable($val = 1, $ids = null)
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
            $dt = $this->Reports->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            $dt["rec_state"] = $val;
            if (!$this->Reports->save($dt)) {
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
