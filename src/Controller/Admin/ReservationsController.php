<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReservationsController extends AppController
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
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;

            $reservations = $this->paginate($this->Reservations);

            $noneSearchable = ['page'];
            $likeFields = ['page'];
            $exactFields = ['source_id', 'reservation_nationality', 'adrs_country', 'adrs_city', 'adrs_region', 'reservation_address'];

            $data = [];

            if (!empty($dt)) {
                foreach ($dt as $key => $itm) {
                    if (in_array($key, $noneSearchable)) {
                        continue;
                    }
                    $conditions[$key] = $itm;
                }
            }

            if (isset($_pid)) {
                $conditions['Reservations.source_id'] = $_pid;
            }
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

            $conditions = [];

            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue;
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['reservations.' . $col] = $val;
                    } elseif ($col == 'reservation_mobile') {
                        $conditions[$col . ' LIKE '] = $val . '%';
                    } else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                }
            }

            if (!empty($_id)) {
                $data = $this->Reservations->get($_id)->toArray();
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();
            }

            if (!empty($_list)) {
                $data = $this->paginate($this->Reservations, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "limit" => 12,
                ]);
            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Reservations'],
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }
    }

    public function view($id = null)
    {
        $rec = $this->Reservations->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('rec'));
    }

    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);
       
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Reservations->get($dt['id']);
            $rec = $this->Reservations->patchEntity($rec, $dt);
        }

        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $rec = $this->Reservations->newEntity($dt);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            if ($newRec = $this->Reservations->save($rec)) {
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

        $delRec = $this->Reservations->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->Reservations->newEmptyEntity();
            $dt["id"] = $rec;
            if (!$this->Reservations->save($dt)) {
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
