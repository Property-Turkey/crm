<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class ProjectsController extends AppController
{

    public function index($_pid = null)
    {

        $_project = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find project by name
        if (!empty($_project) && !empty($_keyword)) {
            $projectCondition = [
                'OR' => [
                    'project_ref LIKE' => '%' . $_keyword . '%',
                    'project_title LIKE' => '%' . $_keyword . '%',
                ]
            ];

            $selectField = ($_project == 'project_ref') ? 'project_ref' : 'project_title';
            
            $data = $this->Projects
                ->find('all')
                ->select(['text' => $selectField, 'value' => 'id'])
                ->where($projectCondition);

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
            $projects = $this->paginate($this->Projects);

            

            $data = [];
            $conditions = [];


            // if(!empty( $dt )){
            //     foreach($dt as $key=>$itm){
            //         if(in_array($key, $noneSearchable)){ continue; }
            //         $conditions[$key] = $itm;
            //     }
            // }

            // if (isset($_pid)) {
            //     $conditions['Projects.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Projects.' . $_col] = $_k; // note = $col condition is not correct 
            }



            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Projects->get($_id, [
                    'contain' => []
                ])->toArray();

                //dd( $data);
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Projects, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "limit" => 12,
                    'contain' => [
                        'Project' => ['fields' => ['project_ref']]
                    ]
                ]);


            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Projects']


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
            $rec = $this->Projects->get($dt['id']);

            $rec = $this->Projects->patchEntity($rec, $dt);
        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');

            $rec = $this->Projects->newEntity($dt);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;

            if ($newRec = $this->Projects->save($rec)) {
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

        $delRec = $this->Projects->deleteAll(['id IN ' => explode(",", $id)]);

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
            $dt = $this->Projects->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            if (!$this->Projects->save($dt)) {
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
