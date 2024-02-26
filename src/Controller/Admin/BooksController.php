<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use DateTime;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

class BooksController extends AppController
{
    public $uses = array('Books');
    public $actsAs = array('Containable');

    public function index()
    {
        $allData = $this->Books->find(
            'all'
        )->toArray();

        $this->set('allData', $allData);


        if ($this->request->is('post')) {




            $filter = $this->request->getData('filter');
            $this->autoRender = false;

            $dt = json_decode(file_get_contents('php://input'), true);

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;

            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';

            $noneSearchable = ['page'];

            $conditions = [];
            if (!empty($dt)) {
                foreach ($dt as $key => $itm) {
                    if (in_array($key, $noneSearchable)) {
                        continue;
                    }
                    $conditions[$key] = $itm;
                }
            }

            if (!empty($_from)) {
                $conditions['Books.stat_created > '] = $_from;
            }
            if (!empty($_to)) {
                $conditions['Books.stat_created < '] = $_to;
            }
            if ($_k !== false) {

                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Books.' . $_col] = $_k;  // note = $col condition is not correct 

            }

            $data = [];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');


            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Books->get($_id, ['contain' => []])->toArray();

                // $data['book_meetperiod'] = (int)$data['book_meetperiod'];
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Books, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "limit" => 12,
                ]);
            }

            // dd($this->Do->convertJson( $data ));
            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Books']
                ],
                JSON_UNESCAPED_UNICODE
            );
            die();
        }

        $clients = $this->getTableLocator()->get('Clients')->find('list')->toArray();
        $this->set(compact('clients'));


    }


    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        $this->autoRender = false;
        $client_id = $dt['client_id'];

        // edit mode
        if ($this->request->is(['patch', 'put'])) {

            $rec = $this->Books->get($dt['id']);

            $ddrec = $this->Books->Clients->get($dt['client_id']);
            $ddrec->rec_state = 11;

            // if($ddrec->client_current_stage == 3){

            //     $ddrec->client_current_stage = 4;
            //     $ddrec->rec_state = 1;

            // }


            $rec = $this->Books->patchEntity($rec, $dt);

        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $client_id = $dt['client_id'];

            $rec = $this->Books->newEntity($dt);
            $newRec = $this->Books->save($rec);

            $ddrec = $this->Books->Clients->get($dt['client_id']);


            $ddrec->rec_state = 11;


            // $rec->client_tags = json_encode($dt['client_tags']);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {


            if ($newddRec = $this->Books->Clients->save($ddrec) && $newRec = $this->Books->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec, $newddRec)]);
                die();
            }


            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        }

    }

    public function delimage()
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender = false;
        $dt = json_decode(file_get_contents('php://input'), true);


        if ($this->Images->deleteFile('img/' . strtolower($ctrl) . '_photos', $dt['image'])) {
            $rec = $this->$ctrl->get($dt['id']);

            $imgsArray = explode(",", $rec->book_photos);
            $key = array_search($dt['image'], $imgsArray);
            unset($imgsArray[$key]);
            $update = ["id" => $dt['id'], "book_photos" => implode(",", $imgsArray)];
            $updated_rec = $this->$ctrl->patchEntity($rec, $update);
            $saved = $this->$ctrl->save($updated_rec);
            echo json_encode(["status" => "SUCCESS", "data" => $saved]);
            die();
        } else {
            echo json_encode(["status" => "FAIL", "data" => $dt]);
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

        $delRec = [];
        foreach (explode(",", $id) as $k => $rec_id) {
            $rec = $this->Books->get($rec_id, ['contain' => []]);
            // debug($rec); // veya var_dump($rec);
            $delRec[$k] = $this->Books->delete($rec);
        }

        $res = (!empty(array_filter($delRec))) ? ["status" => "SUCCESS", "data" => $delRec] : ["status" => "FAIL", "data" => $delRec];

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

        $updateRec = [];
        foreach (explode(',', $ids) as $k => $id) {
            $rec = $this->Books->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Books->save($rec);
        }

        $res = (!empty(array_filter($updateRec))) ? ["status" => "SUCCESS", "data" => $updateRec] : ["status" => "FAIL", "data" => $updateRec];

        echo json_encode($res);
        die();
    }

    function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        if ($this->request->is(['post', 'patch', 'put', 'delete'])) {
            if (!$this->_isAuthorized(true, 'read')) {
                echo json_encode(["status" => "FAIL", "redirect" => $this->app_folder . '/?login=1']);
                die();
            }
        }
    }

}
