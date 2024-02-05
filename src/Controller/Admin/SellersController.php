<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class SellersController extends AppController
{

    public function index($_pid = null)
    {

        $_seller = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find client by name
        if (!empty($_seller)) {
            $sellerCondition = [
                'seller_name LIKE' => '%' . $_keyword . '%'
            ];
            $data = $this->Sellers
                ->find('all')
                ->select(['text' => 'seller_name', 'value' => 'id'])
                ->where($sellerCondition);

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
            $sellers = $this->paginate($this->Sellers);

            

            $data = [];
            $conditions = [];


            // if(!empty( $dt )){
            //     foreach($dt as $key=>$itm){
            //         if(in_array($key, $noneSearchable)){ continue; }
            //         $conditions[$key] = $itm;
            //     }
            // }

            // if (isset($_pid)) {
            //     $conditions['Sellers.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Sellers.' . $_col] = $_k; // note = $col condition is not correct 
            }



            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Sellers->get($_id, [
                    'contain' => []
                ])->toArray();

                //dd( $data);
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Sellers, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "limit" => 12,
                    'contain' => [
                        'Seller' => ['fields' => ['seller_name']]
                    ]
                ]);


            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Sellers']


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
            $rec = $this->Sellers->get($dt['id']);

            $rec = $this->Sellers->patchEntity($rec, $dt);
        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');

            $rec = $this->Sellers->newEntity($dt);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;

            if ($newRec = $this->Sellers->save($rec)) {
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

        $delRec = $this->Sellers->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->Sellers->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            if (!$this->Sellers->save($dt)) {
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
