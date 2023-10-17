<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class UserSaleController extends AppController
{
    public function index($_pid = null)
    {
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
            
            $data = [];
            $conditions = [];

            if (isset($_pid)) {
                $conditions['UserSale.source_id'] = $_pid;
            }
            if (strlen($_k.'') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['UserSale.' . $_col] = $_k; 
            }

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->UserSale->get($_id, [
                    'contain' => [],
                ])->toArray();
                
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->UserSale, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "contain" => [],
                ]); 
            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['UserSale']
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }
    }

    public function view($id = null)
    {
        $rec = $this->UserSale->get($id, [
            'contain' => ['Reports'],
        ]);

        $this->set(compact('rec'));
    }

    public function save($id = -1){
    $dt = json_decode(file_get_contents('php://input'), true);
    $UserSaleTable =  $this->getTableLocator()->get('UserSale');

    // add mode
    if ($this->request->is(['post'])) {
        $dt['stat_created'] = date('Y-m-d H:i:s');
        $user_id = $dt['user'][0]['value'];
        
        // Kontrol etmek istediğiniz kullanıcının user_id'sini alın
        // Eğer aynı user_id'ye sahip başka kayıtlar varsa, eklemeyin
        if (!$this->isUserAlreadyExists($user_id)) {
            $dt['user_id'] = $user_id;
            unset($dt['user']);
            unset($dt['id']);
            $rec = $UserSaleTable->newEntity($dt);

            if ($newRec = $UserSaleTable->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec)]);
                die();
            }
            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        } else {
            echo json_encode(["status" => "FAIL", "msg" => "This user has been assigned before.", "data" => []]);
            die();
        }
    }
}

private function isUserAlreadyExists($user_id)
{
    $UserSaleTable =  $this->getTableLocator()->get('UserSale');
    // Daha önce aynı user_id ile kaydedilmiş başka kayıtları kontrol edin
    $existingRecord = $UserSaleTable->find('all', [
        'conditions' => ['user_id' => $user_id],
    ])->first();
    
    // Eğer böyle bir kayıt varsa, kullanıcı zaten kayıtlı demektir
    return !empty($existingRecord);
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

        $delRec = $this->UserSale->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->UserSale->newEmptyEntity();
            $dt["id"] = $rec;
            if (!$this->UserSale->save($dt)) {
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
