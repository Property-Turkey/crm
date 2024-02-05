<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

use function React\Promise\all;

class SaleSpecsController extends AppController
{

    public function index($_pid = null)
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
            $_clientsList = $this->request->getQuery('clientsList');
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;
            $saleSpecs = $this->paginate($this->SaleSpecs); 

            $data = [];
            $conditions = [];

            // if (isset($_pid)) {
            //     $conditions['SaleSpecs.source_id'] = $_pid;
            // }
            if (strlen($_k.'') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['SaleSpecs.' . $_col] = $_k; // note = $col condition is not correct 
            }

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->SaleSpecs->get($_id, [
                    'contain' => [
                        "Currency",
                    ],
                ])->toArray();
               
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->SaleSpecs, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,   
                ]);
             
            }
            
            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['SaleSpecs']
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }


    }



    public function view($id = null)
    {
        $rec = $this->SaleSpecs->get($id);
        $this->set(compact('rec'));
    }

    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->SaleSpecs->get($dt['id']);
            $dt['salespec_propertytype'] = json_encode( $dt['salespec_propertytype'] );
            $dt['salespec_beds'] = json_encode( $dt['salespec_beds'] );
            $rec = $this->SaleSpecs->patchEntity($rec, $dt); 
            dd('adsasdas');
        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['salespec_propertytype'] = json_encode( $dt['salespec_propertytype'] );
            $dt['salespec_beds'] = json_encode( $dt['salespec_beds'] );
            $rec = $this->SaleSpecs->newEntity($dt);
            // dd($rec);
            
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
           
            if ($newRec = $this->SaleSpecs->save($rec)) {
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

        $delRec = $this->SaleSpecs->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->SaleSpecs->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            if (!$this->SaleSpecs->save($dt)) {
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