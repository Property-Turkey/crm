<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class ActionsController extends AppController
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
            $actions = $this->paginate($this->Actions);

            // if (isset($_pid)) {
            //     $conditions['Actions.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Actions.' . $_col] = $_k;
            }

            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Actions->get($_id)->toArray();
                dd($dt);

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
                $data = $this->paginate($this->Actions, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions
                ]);
            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Actions']
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
            $rec = $this->Actions->get($dt['id']);


            $rec = $this->Actions->patchEntity($rec, $dt);
        }

        // Add mode    
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = \Cake\I18n\FrozenTime::now();
            $dt['user_id'] = $this->authUser['id'];

            $rec = $this->Actions->newEntity($dt);
            $rec->client_id = $dt['client_id'];


            // Check if a similar record exists
            $lastRecord = $this->Actions->find()
                ->where([
                    'client_id' => $rec->client_id,
                    'action_type' => $rec->action_type
                ])
                ->order(['stat_created' => 'DESC'])
                ->first();

            // If a similar record exists and its stat_created is less than 24 hours ago, don't add a new record
            if ($lastRecord && $lastRecord->stat_created->wasWithinLast('24 hours')) {
                echo json_encode(["status" => "ERROR", "msg" => __("Cannot add a new record within 24 hours.")]);
                die();
            }

            // Add the new record
            if ($this->Actions->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "msg" => __("Record added successfully.")]);
                die();
            } else {
                echo json_encode(["status" => "ERROR", "msg" => __("Failed to add a new record.")]);
                die();
            }
        }



        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;

            if ($newRec = $this->Actions->save($rec)) {
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

        $delRec = $this->Actions->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->Actions->newEmptyEntity();
            $dt["id"] = $rec;
            if (!$this->Actions->save($dt)) {
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
