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
                $data = $this->Reservations->get($_id, [
                    'contain' => [
                        "Property" => ['fields' => ['param_ownertype', 'property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
                        "Project" => ['fields' => ['project_title', 'project_ref', 'id']],
                        "Seller" => ['fields' => ['seller_name', 'id']],
                        "Developer" => ['fields' => ['dev_name', 'id']],
                        "Pmscategory" => ['fields' => ['category_name', 'id']],

                    ]
                ])->toArray();

                if (!empty($data['property'])) {

                    $data["property"] = [
                        [
                            "text" => $data["property"]["property_ref"],
                            "value" => $data["property"]['id']
                        ]
                    ];
                }

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

    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        $this->autoRender = false;
        $client_id = $dt['client_id'];

        // edit mode
        if ($this->request->is(['patch', 'put'])) {

            $rec = $this->Reservations->get($dt['id']);

            if (empty($dt['reservation_currency'])) {
                $dt['reservation_currency'] = 2;
            }


            $curCurrency = $this->Do->get('currencies')[$dt['reservation_currency']];
            $dt['reservation_usdprice'] = $this->Do->currencyConverter($curCurrency, "USD", $dt['reservation_price']);
            $dt['reservation_usdcomission'] = $this->Do->currencyConverter($curCurrency, "USD", $dt['reservation_comission']);



            $ddrec = $this->Reservations->Clients->get($dt['client_id']);
            if (isset($dt['reservation_downpayment']) || !empty($dt['reservation_downpayment'])) {
                $ddrec->rec_state = 13;
            }


            $rec = $this->Reservations->patchEntity($rec, $dt);



            $propertyId = (int) $dt['property'][0]['value'];

            $property = $this->Reservations->Property->get($propertyId, ['fields' => ['param_ownertype', 'category_id', 'developer_id', 'seller_id', 'project_id',]]);

            if ($property) {
                $rec->developer_id = $property->developer_id;
                $rec->seller_id = $property->seller_id;
                $rec->project_id = $property->project_id;
                $rec->type_id = $property->category_id;
                $rec->sellertype_id = $property->param_ownertype;            }


        
            // Eğer reservations tablosundaki rec_state 13, 14 veya 15 ise
            if (in_array($rec->rec_state, [13, 14, 15])) {
                $ddrec->rec_state = $rec->rec_state;
            } elseif (isset($dt['reservation_downpayment']) && !empty($dt['reservation_downpayment'])) {
                $ddrec->rec_state = 13;
            }
            else {
                $ddrec->rec_state = 12;
            }
           
        }

        // add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['rec_state'] = 1;

            if (empty($dt['reservation_currency'])) {
                $dt['reservation_currency'] = 2;
            }

            $curCurrency = $this->Do->get('currencies')[$dt['reservation_currency']];
            $dt['reservation_usdprice'] = $this->Do->currencyConverter($curCurrency, "USD", $dt['reservation_price']);
            $dt['reservation_usdcomission'] = $this->Do->currencyConverter($curCurrency, "USD", $dt['reservation_comission']);



            $rec = $this->Reservations->newEntity($dt);
           
            $propertyId = (int) $dt['property'][0]['value'];

            $property = $this->Reservations->Property->get($propertyId, ['fields' => ['param_ownertype', 'category_id', 'developer_id', 'seller_id', 'project_id',]]);

            if ($property) {
                $rec->developer_id = $property->developer_id;
                $rec->seller_id = $property->seller_id;
                $rec->project_id = $property->project_id;
                $rec->type_id = $property->category_id;
                $rec->sellertype_id = $property->param_ownertype; 
            }

            if (isset($dt['property'][0]['value'])) {
                $rec->property_id = (int) $dt['property'][0]['value'];
            }

            $newRec = $this->Reservations->save($rec);
            $ddrec = $this->Reservations->Clients->get($dt['client_id']);

            
            if (isset($dt['reservation_downpayment']) && !empty($dt['reservation_downpayment'])) {
                $ddrec->rec_state = 13;
                $newRec->rec_state = 13;
            }
            else {
                $ddrec->rec_state = 12;
            }
                
            

            

        }

        if ($this->request->is(['post', 'patch', 'put'])) {


            if ($newddRec = $this->Reservations->Clients->save($ddrec) && $newRec = $this->Reservations->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec, $newddRec)]);
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
