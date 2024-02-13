<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class ClientsController extends AppController
{
    // COMMON FUNC
    private function getClientIdsAndUser()
    {
        $userId = $this->authUser['id'];
        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';

        $userData = TableRegistry::getTableLocator()->get('Users');
        $users = $userData->find()
            ->select(['id', 'user_fullname'])
            ->toArray();

        $clientIds = [];
        if ($isAdmin) {
            $clientIds = $this->Clients->find()->select(['id']);
        } else {
            $userSaleData = $this->Clients->UserSale->find()
                ->select(['client_id'])
                ->where(['UserSale.user_id' => $userId])
                ->toArray();

            foreach ($userSaleData as $userSale) {
                $clientIds[] = $userSale->client_id;
            }
        }

        return compact('userId', 'users', 'clientIds');
    }

    public function index($_pid = null)
    {

        $_client = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;

        // find client by name
        if (!empty($_client)) {
            $clientCondition = [
                'client_name LIKE' => '%' . $_keyword . '%'
            ];
            $data = $this->Clients
                ->find('all')
                ->select(['text' => 'client_name', 'value' => 'id'])
                ->where($clientCondition);

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
            $clients = $this->paginate($this->Clients);

            $noneSearchable = ['page', 'keyword'];
            $likeFields = ['page', 'keyword'];
            $betweenFields = ['budget_min', 'budget_max', 'keyword', 'page'];
            $exactFields = ['source_id', 'client_nationality', 'adrs_country', 'pool_id', 'adrs_city', 'adrs_region', 'client_address'];
            $otherCtrl = ['client_priority', 'client_current_stage', 'category_id'];


            $data = [];
            $conditions = [];


            // if(!empty( $dt )){
            //     foreach($dt as $key=>$itm){
            //         if(in_array($key, $noneSearchable)){ continue; }
            //         $conditions[$key] = $itm;
            //     }
            // }

            // if (isset($_pid)) {
            //     $conditions['Clients.source_id'] = $_pid;
            // }
            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            if ($_k !== false) {
                $_method == 'like' ? $conditions[$_col . ' LIKE '] = '%' . $_k . '%' : $conditions['Clients.' . $_col] = $_k; // note = $col condition is not correct 
            }


            // //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue; // Skip this column if input is empty
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['Clients.' . $col] = $val;
                    } elseif (in_array($col, $otherCtrl)) {
                        $conditions['' . $col] = $val;
                    } elseif ($col == 'client_mobile') {
                        $conditions[$col . ' LIKE '] = $val . '%';
                    } elseif ($col == 'client_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['client_tags LIKE ' => '%"' . $tag['value'] . '"%'];
                        }
                    } else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                    // dd($dt['search']);
                }
            }


            // Search
            // if (!empty($dt['search'])) {
            //     foreach ($dt['search'] as $col => $val) {
            //         if (empty($val)) {
            //             continue; // Skip this column if input is empty
            //         }
            //         if (in_array($col, $noneSearchable)) {
            //             continue;
            //         }
            //         if (in_array($col, $exactFields)) {
            //             $conditions['Clients.' . $col] = $val;
            //         }elseif (in_array($col, $otherCtrl)) {
            //             $conditions['' . $col] = $val;
            //         }  elseif ($col == 'client_tags') {
            //             foreach ($val as $tag) {
            //                 $conditions['AND'][] = ['client_tags LIKE ' => '%"'.$tag['value'].'"%'];
            //             }
            //         }elseif ($col == $betweenFields) {
            //             dd(1);
            //             $conditions[' BETWEEN ? AND ?'][] = [in_array($col, $betweenFields)];
            //         } else {
            //             $conditions[$col . ' LIKE '] = '%' . $val . '%';
            //         }


            //     }
            // }
            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Clients->get($_id, [
                    'contain' => [
                        'Reports',
                        "Reports.TypeCategories",
                        "Sources",
                        'Adrscountry' => ['fields' => ['adrs_name', 'id']],
                        "Categories",
                        'Books',
                        "PoolCategories",
                        "TagCategories",
                        "ClientSpecs",
                        "ClientSpecs.Currency",
                        "ClientSpecs.Persona",
                        "ClientSpecs.Style",
                        "Offers",
                        "Offers.PropertyRef" => ['fields' => ['property_title', 'property_ref', 'id']],
                        "Reservations",
                        "Reservations.Property" => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
                        "Reservations.Project" => ['fields' => ['project_ref', 'id']],
                        "Reservations.Seller" => ['fields' => ['seller_name', 'id']],
                        "Reservations.Developer" => ['fields' => ['dev_name', 'id']],
                        "Reservations.Pmscategory" => ['fields' => ['category_name', 'id']],
                        "Reservations.Payment",
                        "Reservations.Currency",
                        "UserSale.Users",
                        "Users",
                        "Actions",
                        "Actions.Action",
                        "Enquires",
                        'Reminders',

                    ]
                ])->toArray();


                $reservations = [];
                foreach ($data["reservations"] as $reservation) {
                    // Eğer rezervasyonun içinde "property" bilgisi varsa
                    if (isset($reservation['property'])) {
                        $property = $reservation['property'];

                        // Eğer property'nin içinde "project_id" ve "project_id" 0'dan farklı bir değerse
                        if (isset($property['project_id']) && $property['project_id'] != 0) {
                            $projectId = $property['project_id'];
                            // Eğer projeyi bulabilirsek
                            $project = $this->Clients->Reservations->Project->find()
                                ->where(['id' => $projectId])
                                ->first();

                            // Eğer proje bulunursa, projenin referansını "project_ref" olarak ayarla
                            if ($project) {
                                $reservation['property']['project_ref'] = $project->project_ref;
                            }
                        }

                        // Eğer property'nin içinde "developer_id" ve "developer_id" 0'dan farklı bir değerse
                        if (isset($property['developer_id']) && $property['developer_id'] != 0) {
                            $developerId = $property['developer_id'];
                            // Eğer geliştiriciyi bulabilirsek
                            $developer = $this->Clients->Reservations->Developer->find()
                                ->where(['id' => $developerId])
                                ->first();

                            // Eğer geliştirici bulunursa, geliştiricinin adını "developer_name" olarak ayarla
                            if ($developer) {
                                $reservation['property']['developer_name'] = $developer->dev_name;
                            }
                        }

                        // Eğer property'nin içinde "seller_id" ve "seller_id" 0'dan farklı bir değerse
                        if (isset($property['seller_id']) && $property['seller_id'] != 0) {
                            $sellerId = $property['seller_id'];
                            // Eğer satıcıyı bulabilirsek
                            $seller = $this->Clients->Reservations->Seller->find()
                                ->where(['id' => $sellerId])
                                ->first();

                            // Eğer satıcı bulunursa, satıcının adını "seller_name" olarak ayarla
                            if ($seller) {
                                $reservation['property']['seller_name'] = $seller->seller_name;
                            }
                        }
                    }

                    $reservations[] = $reservation;
                }

                $data["reservations"] = $reservations;

                // dd($data["reservations"]);

                if (isset($data['adrscountry']) && $data['adrscountry'] != 0) {
                    $data["adrscountry"] = [
                        [
                            "text" => $data['adrscountry']['adrs_name'],
                            "value" => $data['adrscountry']['id']
                        ]
                    ];
                }

                // debug($data['adrscountry']);

                // $latestAction = end($data["actions"]); // dizinin son elemanını alır

                // $latestActionType = $latestAction ? $latestAction['action_type'] : null;



                // $this->set(compact('latestActionType'));


                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {

                $userRole = $this->authUser['user_role'];
                $q = $this->Clients->find()
                    ->order(['Clients.' . $_col => $_dir])
                    ->where([$conditions])
                    ->limit(12)
                    // ->leftJoinWith('Sales')

                    ->contain([
                        "ClientSpecs",
                        'PoolCategories',
                        "Reports.TypeCategories",
                        'TagCategories',
                        'ClientSpecs',
                        'Categories',
                        'ClientSpecs.Currency',
                        'Reminders',
                        'Reports',
                        'Sources',
                        'Reports.Text',
                        'Users',
                        "UserSale.Users",
                        "UserSale",
                        "Books",
                        "Actions",

                    ])
                    ->group('Clients.id');

                if ($userRole == 'admin.root' || $userRole == 'admin.admin' || $userRole == 'admin.cc') {
                    // Admin kullanıcısı her şeyi görebilir
                } else {
                    $userId = $this->authUser['id'];
                    $q->matching('UserSale', function ($q) use ($userId) {
                        return $q->where(['user_id' => $userId]);
                    });
                }

                $data = $this->paginate($q);

            }

            echo json_encode(
                [
                    "status" => "SUCCESS",
                    "data" => $this->Do->convertJson($data),
                    "paging" => $this->request->getAttribute('paging')['Clients']


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
            $rec = $this->Clients->get($dt['id'], [
                'contain' => ['ClientSpecs']
            ]);
            // debug($dt['adrscountry'][0]['value']);

            $saleSpecs = $dt['client_specs'];
            // debug($dt['adrscountry'][0]['value']);
            foreach ($saleSpecs as &$saleSpec) {
                if (isset($saleSpec['clientspec_propertytype'])) {
                    $saleSpec['clientspec_propertytype'] = json_encode($saleSpec['clientspec_propertytype']);
                }
                if (isset($saleSpec['clientspec_beds'])) {
                    $saleSpec['clientspec_beds'] = json_encode($saleSpec['clientspec_beds']);
                }
            }

            // debug($dt['adrscountry'][0]['value']);
            $dt['client_specs'] = $saleSpecs;
            // debug($dt['adrscountry'][0]['value']);
            //Remove spaces and symbols from the number
            if (isset($dt['client_mobile'])) {
                $clientMobile = preg_replace("/[^0-9]/", "", $dt['client_mobile']);
                $dt['client_mobile'] = $clientMobile;
            }

            // debug($dt['adrscountry'][0]['value']);
            if (isset($dt['client_phone'])) {
                $clientPhone = preg_replace("/[^0-9]/", "", $dt['client_phone']);
                $dt['client_phone'] = $clientPhone;
            }

            // debug($dt['adrscountry'][0]['value']);
            if (isset($dt['client_tags'])) {
                $dt['client_tags'] = json_encode($dt['client_tags']);
            }

            // debug($dt['adrscountry'][0]['value']);
            // $dt['adrs_country'] = $dt['adrscountry'][0]['value'];
            $rec = $this->Clients->patchEntity($rec, $dt);

            // debug($dt['adrscountry'][0]['value']);
            if (isset($dt['adrscountry'])) {
                $rec->adrs_country = $dt['adrscountry'][0]['value'];
            }

            // debug($dt['adrscountry'][0]['value']);
            // debug($rec['adrscountry']);
        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['client_current_stage'] = 2;

            // //Remove spaces and symbols from the number
            if (isset($dt['client_mobile'])) {
                $clientMobile = preg_replace("/[^0-9]/", "", $dt['client_mobile']);
                $dt['client_mobile'] = $clientMobile;
            }

            if (isset($dt['client_phone'])) {
                $clientPhone = preg_replace("/[^0-9]/", "", $dt['client_phone']);
                $dt['client_phone'] = $clientPhone;
            }

            $existingClient = $this->Clients->find()
                ->where(['client_email' => $dt['client_email']])
                ->first();

            if ($existingClient) {
                echo json_encode(["status" => "EMAIL_EXISTS", "client_id" => $existingClient->id]);
                die();
            }


            // if (isset($dt['enquires'][0]['property'][0]['value'])) {
            //     $rec->property_id = $dt['enquires'][0]['property'][0]['value'];
            // }


            // dd($dt['enquires'][0]['property'][0]['value']);

            $rec = $this->Clients->newEntity($dt);
            if (isset($dt['adrscountry'])) {
                $rec->adrs_country = $dt['adrscountry'][0]['value'];
            }
            // dd($rec);
            // debug($dt['adrscountry']);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            // unset($rec['source']);
            // debug($rec);
            unset($rec['reports']);
            unset($rec['category']);
            unset($rec['reminders']);
            unset($rec['pool_category']);
            unset($rec['tag_category']);
            unset($rec['book']);
            unset($rec['source']);
            unset($rec['offers']);
            unset($rec['user_sale']);
            unset($dt['adrscountry']);

            // dd($rec['adrscountry']);
            // $rec['books'] = $rec['book'];


            // if ($newRec = $this->Clients->Sales->Books->save($rec['book'])) {
            if ($newRec = $this->Clients->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec)]);
                die();
            }

            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        }
    }

    public function dashboard()
    {



    }

    public function statistic()
    {


    }

    public function bar($clientIds = null)
    {
        $this->autoRender = false;

        extract($this->getClientIdsAndUser());
        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';



        if (!$isAdmin) {

            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }


                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;
            }



            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }

        } else {
            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();

                }

                $clientIds = $filteredClientIds;

            }





            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }

        }



        $labels = $this->Do->lcl($this->Do->get('rec_stateSale.3'));

        $recStates = $this->Clients->find()->select(['rec_state'])->distinct()->toArray();

        $data = ['labels' => array_values($labels), 'datasets' => []];

        $labelColors = [
            '#78211f',
            '#f09f1f',
            '#1924b9',
            '#1f5d78',
            '#5e298d',
            '#399f32',
            '#3c68e5',
            '#e8534f',
            '#3fbfba',
            '#d036a0',
            '#dbf2f2',
            '#3ea358',
            '#ffddf4',
            '#f1e2ff',
            '#cd1420',
            '#89050b'
        ];

        foreach ($recStates as $recState) {
            $recStateValue = $recState->rec_state;

            $dataset = [
                'label' => $this->getRecStateLabel($recStateValue),
                'data' => [],
                'backgroundColor' => [],
                'borderColor' => [],
                'borderWidth' => 0,
                'borderRadius' => 13,
                'barThickness' => 5,
                'maxBarThickness' => 12
            ];

            // $recStateData = $this->Clients->find()
            //     ->select(['rec_state', 'count' => 'COUNT(*)'])
            //     ->where(['rec_state' => $recStateValue, 'id IN' => $clientIds]) //IN KULLANMA BİR SÜRÜ OLACAK
            //     ->group(['rec_state'])
            //     ->toArray();


            $recStateData = $this->Clients->find()
                ->select(['rec_state', 'count' => 'COUNT(*)'])
                ->where(function ($exp) use ($clientIds, $recStateValue) {
                    return $exp->in('id', $clientIds)
                        ->eq('rec_state', $recStateValue);
                })
                ->group(['rec_state'])
                ->toArray();


            foreach ($labels as $labelKey => $labelValue) {
                $count = 0;
                foreach ($recStateData as $dataPoint) {
                    if ($dataPoint->rec_state == $labelKey) {
                        $count = $dataPoint->count;
                        break;
                    }
                }

                $dataset['data'][] = $count;

                if ($count > 0 && isset($labelColors[$labelKey - 1])) {
                    $dataset['backgroundColor'][] = $labelColors[$labelKey - 1];
                    $dataset['borderColor'][] = $labelColors[$labelKey - 1];
                }
            }

            $dataset['label'] .= ' (' . array_sum($dataset['data']) . ')';

            $data['datasets'][] = $dataset;
        }


        // $jsonData = json_encode($data);
        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'data' => $data,
            ]
        ]);
        die();

    }

    public function saleByfield($clientIds = null)
    {
        $this->autoRender = false;


        $starterDate = isset($_GET['starterDate']) ? $_GET['starterDate'] : null;
        $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;




        $userData = TableRegistry::getTableLocator()->get('Users');
        $userField = $userData->find()
            ->select(['id', 'user_fullname'])
            ->distinct(['user_fullname'])
            ->where(['user_role' => 'field'])
            ->toArray();

        $labels = [];
        foreach ($userField as $userRole) {
            $labels[$userRole->id] = $userRole->user_fullname;
        }

        $data = ['labels' => array_values($labels), 'datasets' => []];

        //sale by Field chart
        $barDataset = [
            'label' => 'Sale',
            'type' => 'bar',
            'data' => [],
            'backgroundColor' => '#1565c0',
            'borderWidth' => 0,
            'borderRadius' => 8,
            'barThickness' => 5,
            'maxBarThickness' => 15
        ];

        $barDataset1 = [
            'label' => 'Commission (USD)',
            'type' => 'bar',
            'data' => [],
            'backgroundColor' => '#d036a0',
            'borderWidth' => 0,
            'borderRadius' => 8,
            'barThickness' => 5,
            'maxBarThickness' => 15
        ];

        $pointDataset1 = [
            'label' => 'Sold Units',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#f09f1f',
            'yAxisID' => 'y-axis-2',
        ];

        $pointDataset2 = [
            'label' => 'Clients',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#1924b9',
            'yAxisID' => 'y-axis-2',
        ];

        $pointDataset3 = [
            'label' => 'Booked',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#ffddf4',
            'yAxisID' => 'y-axis-2',
        ];
        if ($starterDate && $endDate) {

            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $clientCount = count($userSaleData);

                $pointDataset2['data'][] = $clientCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalReservationCount = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationCount = $this->Clients->Reservations->find()
                        ->where([
                            'client_id' => $userSale->client_id,
                            'reservation_downpayment IS NOT NULL'
                        ])
                        ->count();

                    $totalReservationCount += $reservationCount;
                }
                $pointDataset1['data'][] = $totalReservationCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalPrice = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdprice'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalPrice += $reservation->reservation_usdprice;
                    }
                }
                $barDataset['data'][] = $totalPrice;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }
                $pointDataset3['data'][] = $totalBooksCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalComission = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdcomission'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalComission += $reservation->reservation_usdcomission;
                    }
                }

                $barDataset1['data'][] = $totalComission;
            }
        } else {
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                    ])
                    ->toArray();

                $clientCount = count($userSaleData);

                $pointDataset2['data'][] = $clientCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalReservationCount = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationCount = $this->Clients->Reservations->find()
                        ->where([
                            'client_id' => $userSale->client_id,
                            'reservation_downpayment IS NOT NULL'
                        ])
                        ->count();

                    $totalReservationCount += $reservationCount;
                }
                $pointDataset1['data'][] = $totalReservationCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalPrice = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdprice'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalPrice += $reservation->reservation_usdprice;
                    }
                }
                $barDataset['data'][] = $totalPrice;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }
                $pointDataset3['data'][] = $totalBooksCount;
            }
            foreach ($userField as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalComission = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdcomission'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalComission += $reservation->reservation_usdcomission;
                    }
                }

                $barDataset1['data'][] = $totalComission;
            }
        }

        $options = [
            'scales' => [
                'yAxes' => [
                    [
                        'id' => 'y-axis-1',
                        'type' => 'linear',
                        'position' => 'left',
                    ],
                    [
                        'id' => 'y-axis-2',
                        'type' => 'linear',
                        'position' => 'right',
                    ],
                ],
            ],
        ];

        $data['options'] = $options;
        $data['datasets'] = [
            $barDataset,
            $barDataset1,
            $pointDataset1,
            $pointDataset2,
            $pointDataset3,
        ];

        // Veri setlerini birleştir
        $combinedData = array_combine($data['labels'], $data['datasets'][0]['data']);

        // Veri setlerini sırala
        asort($combinedData);

        // Sıralanmış veri setlerini ve etiketleri ayır
        $sortedDatasets = array_values($combinedData);
        $sortedLabels = array_keys($combinedData);

        // Yeniden oluşturulmuş veri setini güncelle
        $data['datasets'][0]['data'] = $sortedDatasets;
        $data['labels'] = $sortedLabels;
        // "Sold Units" veri seti için sıralama
        $combinedDataSoldUnits = array_combine($data['labels'], $data['datasets'][2]['data']);
        asort($combinedDataSoldUnits);
        $data['datasets'][2]['data'] = array_values($combinedDataSoldUnits);

        // "Clients" veri seti için sıralama
        $combinedDataClients = array_combine($data['labels'], $data['datasets'][3]['data']);
        asort($combinedDataClients);
        $data['datasets'][3]['data'] = array_values($combinedDataClients);

        // "Booked" veri seti için sıralama
        $combinedDataBooked = array_combine($data['labels'], $data['datasets'][4]['data']);
        asort($combinedDataBooked);
        $data['datasets'][4]['data'] = array_values($combinedDataBooked);

        // "Commission (USD)" veri seti için sıralama
        $combinedDataCommissionUSD = array_combine($data['labels'], $data['datasets'][1]['data']);
        asort($combinedDataCommissionUSD);
        $data['datasets'][1]['data'] = array_values($combinedDataCommissionUSD);





        //Sale by client advisor chart-------------------
        $userCC = $userData->find()
            ->select(['id', 'user_fullname'])
            ->distinct(['user_fullname'])
            ->where(['user_role' => 'cc'])
            ->toArray();

        // cc olan user_role'larından sadece user_role'ları al
        $labels = [];
        foreach ($userCC as $userRole) {
            $labels[$userRole->id] = $userRole->user_fullname;
        }

        $data2 = ['labels' => array_values($labels), 'datasets' => []];

        $barDataset = [
            'label' => 'Sale',
            'type' => 'bar',
            'data' => [],
            'backgroundColor' => '#1565c0',
            'borderWidth' => 0,
            'borderRadius' => 8,
            'barThickness' => 5,
            'maxBarThickness' => 15
        ];

        $barDataset1 = [
            'label' => 'Commision (USD)',
            'type' => 'bar',
            'data' => [],
            'backgroundColor' => '#d036a0',
            'borderWidth' => 0,
            'borderRadius' => 8,
            'barThickness' => 5,
            'maxBarThickness' => 15
        ];

        $pointDataset1 = [
            'label' => 'Sold Units',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#f09f1f',
            'yAxisID' => 'y-axis-2',
        ];

        $pointDataset2 = [
            'label' => 'Clients',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#1924b9',
            'yAxisID' => 'y-axis-2',
        ];

        $pointDataset3 = [
            'label' => 'Booked',
            'type' => 'line',
            'data' => [],
            'fill' => false,
            'borderColor' => '#ffddf4',
            'yAxisID' => 'y-axis-2',
        ];
        if ($starterDate && $endDate) {
            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $clientCount = count($userSaleData);

                $pointDataset2['data'][] = $clientCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalReservationCount = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationCount = $this->Clients->Reservations->find()
                        ->where([
                            'client_id' => $userSale->client_id,
                            'reservation_downpayment IS NOT NULL' // reservation_downpayment değeri var olanları filtrele
                        ])
                        ->count();

                    $totalReservationCount += $reservationCount;
                }
                $pointDataset1['data'][] = $totalReservationCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalPrice = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdprice'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalPrice += $reservation->reservation_usdprice;
                    }
                }
                $barDataset['data'][] = $totalPrice;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }
                $pointDataset3['data'][] = $totalBooksCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalComission = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdcomission'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalComission += $reservation->reservation_usdcomission;
                    }
                }
                $barDataset1['data'][] = $totalComission;
            }
        } else {
            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $clientCount = count($userSaleData);

                $pointDataset2['data'][] = $clientCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalReservationCount = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationCount = $this->Clients->Reservations->find()
                        ->where([
                            'client_id' => $userSale->client_id,
                            'reservation_downpayment IS NOT NULL' // reservation_downpayment değeri var olanları filtrele
                        ])
                        ->count();

                    $totalReservationCount += $reservationCount;
                }
                $pointDataset1['data'][] = $totalReservationCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalPrice = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdprice'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalPrice += $reservation->reservation_usdprice;
                    }
                }
                $barDataset['data'][] = $totalPrice;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }
                $pointDataset3['data'][] = $totalBooksCount;
            }

            foreach ($userCC as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalComission = 0;

                foreach ($userSaleData as $userSale) {
                    $reservationsData = $this->Clients->Reservations->find()
                        ->select(['reservation_usdcomission'])
                        ->where(['client_id' => $userSale->client_id])
                        ->toArray();

                    foreach ($reservationsData as $reservation) {
                        $totalComission += $reservation->reservation_usdcomission;
                    }
                }
                $barDataset1['data'][] = $totalComission;
            }
        }


        $options = [
            'scales' => [
                'yAxes' => [
                    [
                        'id' => 'y-axis-1',
                        'type' => 'linear',
                        'position' => 'left',
                    ],
                    [
                        'id' => 'y-axis-2',
                        'type' => 'linear',
                        'position' => 'right',
                    ],
                ],
            ],
        ];

        $data2['options'] = $options;

        $data2['datasets'] = [
            $barDataset,
            $barDataset1,
            $pointDataset1,
            $pointDataset2,
            $pointDataset3,
        ];

        // Veri setlerini birleştir
        $combinedData = array_combine($data2['labels'], $data2['datasets'][0]['data']);

        // Veri setlerini sırala
        asort($combinedData);

        // Sıralanmış veri setlerini ve etiketleri ayır
        $sortedDatasets = array_values($combinedData);
        $sortedLabels = array_keys($combinedData);

        // Yeniden oluşturulmuş veri setini güncelle
        $data2['datasets'][0]['data'] = $sortedDatasets;
        $data2['labels'] = $sortedLabels;
        // "Sold Units" veri seti için sıralama
        $combinedDataSoldUnits = array_combine($data2['labels'], $data2['datasets'][2]['data']);
        asort($combinedDataSoldUnits);
        $data2['datasets'][2]['data'] = array_values($combinedDataSoldUnits);

        // "Clients" veri seti için sıralama
        $combinedDataClients = array_combine($data2['labels'], $data2['datasets'][3]['data']);
        asort($combinedDataClients);
        $data2['datasets'][3]['data'] = array_values($combinedDataClients);

        // "Booked" veri seti için sıralama
        $combinedDataBooked = array_combine($data2['labels'], $data2['datasets'][4]['data']);
        asort($combinedDataBooked);
        $data2['datasets'][4]['data'] = array_values($combinedDataBooked);

        // "Commission (USD)" veri seti için sıralama
        $combinedDataCommissionUSD = array_combine($data2['labels'], $data2['datasets'][1]['data']);
        asort($combinedDataCommissionUSD);
        $data2['datasets'][1]['data'] = array_values($combinedDataCommissionUSD);





        //Booking by role chart-------------------
        // $user_role = $this->request->getData('user_role');
        // $user_role = $user_role ?? '';




        $user_roles = ['cc', 'field'];
        $userBookrole = $userData->find()
            ->select(['id', 'user_fullname', 'user_role'])
            ->distinct(['user_fullname'])
            ->where(['user_role IN' => $user_roles])
            ->toArray();

        $labels = [];
        foreach ($userBookrole as $userRole) {
            $labels[$userRole->id] = $userRole->user_fullname;
        }

        $data3 = ['labels' => array_values($labels), 'datasets' => []];

        $barDataset = [
            'datasets' => [
                [
                    'label' => 'CC Booked',
                    'type' => 'bar',
                    'data' => [],
                    'backgroundColor' => [],
                    'borderWidth' => 0,
                    'borderRadius' => 8,
                    'maxBarThickness' => 15
                ],
                [
                    'label' => 'Field Booked',
                    'type' => 'bar',
                    'data' => [],
                    'backgroundColor' => [],
                    'borderWidth' => 0,
                    'borderRadius' => 8,
                    'maxBarThickness' => 15
                ],
            ],
        ];

        if ($starterDate && $endDate) {
            foreach ($userBookrole as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'UserSale.user_id' => $userClient->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }

                // Kullanıcının user_role bilgisine göre renk belirle
                $datasetIndex = ($userClient->user_role == 'cc') ? 0 : 1;
                $barDataset['datasets'][$datasetIndex]['backgroundColor'][] = ($userClient->user_role == 'cc') ? '#1565c0' : '#e8534f';

                $barDataset['datasets'][$datasetIndex]['data'][] = $totalBooksCount;
            }
        } else {
            foreach ($userBookrole as $userClient) {
                $userSaleData = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['UserSale.user_id' => $userClient->id])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }

                // Kullanıcının user_role bilgisine göre renk belirle
                $datasetIndex = ($userClient->user_role == 'cc') ? 0 : 1;
                $barDataset['datasets'][$datasetIndex]['backgroundColor'][] = ($userClient->user_role == 'cc') ? '#1565c0' : '#e8534f';

                $barDataset['datasets'][$datasetIndex]['data'][] = $totalBooksCount;
            }
        }

        $data3['datasets'] = $barDataset['datasets'];








        //SOURCE chart-------------------
        $sourceData = $this->Clients->find()
            ->select(['source_id', 'count' => 'COUNT(*)'])
            ->where(['source_id'])
            ->group(['source_id'])
            ->toArray();

        $labels = [];
        $dataPoints = [];
        $catTable = TableRegistry::getTableLocator()->get('Categories');
        $reservationTable = TableRegistry::getTableLocator()->get('Reservations');

        foreach ($sourceData as $source) {
            $categoryId = $source->source_id;

            if ($categoryId !== null) {
                $category = $catTable->get($categoryId, ['fields' => ['id', 'category_name']]);

                $labels[] = $category->category_name;

                // Karşılık gelen client_id'lerin reservations tablosundaki reservation_usdprice toplamını al
                $totalPrice = $reservationTable->find()
                    ->select(['totalPrice' => 'SUM(reservation_usdprice)'])
                    ->where([
                        'client_id IN' => $this->Clients->find()
                            ->select(['id'])
                            ->where(['source_id' => $categoryId])
                    ])
                    ->first();

                $dataPoints[] = $totalPrice->totalPrice ?? 0;
            } else {
                $labels[] = 'Unknown';

                // Boş source_id durumu için tüm client'ların reservations tablosundaki reservation_usdprice toplamını al
                $totalPrice = $reservationTable->find()
                    ->select(['totalPrice' => 'SUM(reservation_usdprice)'])
                    ->first();

                $dataPoints[] = $totalPrice->totalPrice ?? 0;
            }
        }

        // Toplam reservation_usdprice'ın yüzdeliğini hesapla
        $totalSum = array_sum($dataPoints);
        $percentageArray = array_map(function ($value) use ($totalSum) {
            return '(' . number_format(($value / $totalSum) * 100, 2) . '%)';
        }, $dataPoints);

        // Parantez içinde yüzdelikleri ekle
        $labels = array_map(function ($label, $percentage) {
            return $label . ' ' . $percentage;
        }, $labels, $percentageArray);

        $sourceDoughnutData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $dataPoints,
                    'backgroundColor' => [
                        '#78211f',
                        '#f09f1f',
                        '#1924b9',
                        '#1f5d78',
                        '#5e298d',
                        '#399f32',
                        '#3c68e5',
                        '#e8534f',
                        '#3fbfba',
                        '#d036a0'
                    ],
                    'hoverBackgroundColor' => [
                        '#78211f55',
                        '#f09f1f55',
                        '#1924b955',
                        '#1f5d7855',
                        '#5e298d55',
                        '#399f3255',
                        '#3c68e555',
                        '#e8534f55',
                        '#3fbfba55',
                        '#d036a055'
                    ],
                    'hoverOffset' => 12
                ]
            ]
        ];

        if ($starterDate && $endDate) {
            $sellertypeData = $this->Clients->Reservations->find()
                ->select(['id', 'sellertype_id', 'count' => 'COUNT(*)'])
                ->where([
                    'sellertype_id IS NOT NULL',
                    'stat_created IS NOT NULL', // stat_created alanının null olup olmadığını kontrol et
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->group(['sellertype_id'])
                ->toArray();

            $pmscategoriesTable = $this->getTableLocator()->get('Pmscategories');
            $pmsCategory = $this->Do->lcl(
                $pmscategoriesTable
                    ->find('list')
                    ->where(['id IN' => array_values(array_column($sellertypeData, 'sellertype_id'))])
                    ->toArray()
            );

            $datasets = [];

            foreach ($sellertypeData as $sellertype) {
                // Her sellertype için bir veri seti oluştur
                $datasets[] = [
                    'label' => $pmsCategory[$sellertype->sellertype_id],
                    'type' => 'bar',
                    'data' => [$sellertype->count],
                    'borderRadius' => 8,
                    'barPercentage' => 0.1,
                    'maxBarThickness' => 13
                ];
            }

            $data6 = [
                'labels' => [''],
                'datasets' => $datasets,
            ];
        } else {
            $sellertypeData = $this->Clients->Reservations->find()
                ->select(['id', 'sellertype_id', 'count' => 'COUNT(*)'])
                ->where([
                    'sellertype_id IS NOT NULL',
                ])
                ->group(['sellertype_id'])
                ->toArray();

            $pmscategoriesTable = $this->getTableLocator()->get('Pmscategories');
            $pmsCategory = $this->Do->lcl(
                $pmscategoriesTable
                    ->find('list')
                    ->where(['id IN' => array_values(array_column($sellertypeData, 'sellertype_id'))])
                    ->toArray()
            );

            $datasets = [];

            foreach ($sellertypeData as $sellertype) {
                $datasets[] = [
                    'label' => $pmsCategory[$sellertype->sellertype_id],
                    'type' => 'bar',
                    'data' => [$sellertype->count],
                    'borderRadius' => 8,
                    'barPercentage' => 0.1,
                    'maxBarThickness' => 13
                ];
              
            }

            $data6 = [
                'labels' => [''],
                'datasets' => $datasets,
            ];
        }




        //property type chart
        if ($starterDate && $endDate) {
            $propertyData = $this->Clients->Reservations->find()
                ->select(['type_id', 'count' => 'COUNT(*)'])
                ->where([
                    'type_id IS NOT NULL',
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->group(['type_id'])
                ->toArray();

            $pmscategoriesTable = $this->getTableLocator()->get('Pmscategories');

            // Get localized category names
            $propertytypeCategory = $this->Do->lcl(
                $pmscategoriesTable
                    ->find('list')
                    ->where(['id IN ' => array_values(array_column($propertyData, 'type_id'))])
                    ->toArray()
            );

            $labels = [];
            $dataPoints = [];

            foreach ($propertyData as $property) {
                $propertyId = $property->type_id;

                if ($propertyId !== null) {

                    $labels[] = $propertytypeCategory[$property->type_id];
                    $dataPoints[] = $property->count;
                } else {
                    $labels[] = 'Unknown';
                    $dataPoints[] = $property->count;
                }
            }

            $propertyPieData = [
                'labels' => $labels,
                'datasets' => [
                    [
                        'data' => $dataPoints,
                        'backgroundColor' => [
                            '#78211f',
                            '#f09f1f',
                            '#1924b9',
                            '#1f5d78',
                            '#5e298d',
                            '#399f32',
                            '#3c68e5',
                            '#e8534f',
                            '#3fbfba',
                            '#d036a0'
                        ],
                        'hoverBackgroundColor' => [
                            '#78211f55',
                            '#f09f1f55',
                            '#1924b955',
                            '#1f5d7855',
                            '#5e298d55',
                            '#399f3255',
                            '#3c68e555',
                            '#e8534f55',
                            '#3fbfba55',
                            '#d036a055'
                        ],
                        'barThickness' => 10,
                        'maxBarThickness' => 15
                    ]
                ]
            ];
        } else {
            $propertyData = $this->Clients->Reservations->find()
                ->select(['type_id', 'count' => 'COUNT(*)'])
                ->where([
                    'type_id IS NOT NULL',
                ])
                ->group(['type_id'])
                ->toArray();

            $pmscategoriesTable = $this->getTableLocator()->get('Pmscategories');

            // Get localized category names
            $propertytypeCategory = $this->Do->lcl(
                $pmscategoriesTable
                    ->find('list')
                    ->where(['id IN ' => array_values(array_column($propertyData, 'type_id'))])
                    ->toArray()
            );

            $labels = [];
            $dataPoints = [];

            foreach ($propertyData as $property) {
                $propertyId = $property->type_id;

                if ($propertyId !== null) {

                    $labels[] = $propertytypeCategory[$property->type_id];
                    $dataPoints[] = $property->count;
                } else {
                    $labels[] = 'Unknown';
                    $dataPoints[] = $property->count;
                }
            }

            $propertyPieData = [
                'labels' => $labels,
                'datasets' => [
                    [
                        'data' => $dataPoints,
                        'backgroundColor' => [
                            '#78211f',
                            '#f09f1f',
                            '#1924b9',
                            '#1f5d78',
                            '#5e298d',
                            '#399f32',
                            '#3c68e5',
                            '#e8534f',
                            '#3fbfba',
                            '#d036a0'
                        ],
                        'hoverBackgroundColor' => [
                            '#78211f55',
                            '#f09f1f55',
                            '#1924b955',
                            '#1f5d7855',
                            '#5e298d55',
                            '#399f3255',
                            '#3c68e555',
                            '#e8534f55',
                            '#3fbfba55',
                            '#d036a055'
                        ],
                        'barThickness' => 10,
                        'maxBarThickness' => 15
                    ]
                ]
            ];
        }



        $reservationTable = TableRegistry::getTableLocator()->get('Reservations');

        if ($starterDate && $endDate) {
            $developerTotals = $this->Clients->Reservations->find()
                ->select(['developer_id', 'developer_name' => 'Developer.dev_name', 'totalPrice' => 'SUM(reservation_usdprice)'])
                ->where([
                    'Reservations.stat_created >=' => $starterDate,
                    'Reservations.stat_created <=' => $endDate
                ])
                ->contain(['Developer'])
                ->group(['developer_id', 'Developer.dev_name'])
                ->toArray();

        } else {
            $developerTotals = $this->Clients->Reservations->find()
                ->select(['developer_id', 'developer_name' => 'Developer.dev_name', 'totalPrice' => 'SUM(reservation_usdprice)'])

                ->contain(['Developer'])
                ->group(['developer_id', 'Developer.dev_name'])
                ->toArray();

        }


        if ($starterDate && $endDate) {
            $projectTotals = $this->Clients->Reservations->find()
                ->select([
                    'project_id',
                    'project_title' => 'Project.project_title',
                    'total_usdprice' => 'SUM(reservation_usdprice)',
                    'client_count' => 'COUNT(DISTINCT client_id)',
                ])
                ->where([
                    'Reservations.stat_created >=' => $starterDate,
                    'Reservations.stat_created <=' => $endDate
                ])
                ->contain(['Project'])
                ->group(['project_id', 'Project.project_title'])
                ->toArray();

        } else {
            $projectTotals = $this->Clients->Reservations->find()
                ->select([
                    'project_id',
                    'project_title' => 'Project.project_title',
                    'total_usdprice' => 'SUM(reservation_usdprice)',
                    'client_count' => 'COUNT(DISTINCT client_id)',
                ])
                ->contain(['Project'])
                ->group(['project_id', 'Project.project_title'])
                ->toArray();

        }



        if ($starterDate && $endDate) {
            $clientCount = $this->Clients->find()->where([
                'stat_created >=' => $starterDate,
                'stat_created <=' => $endDate
            ])->count();
            $totalClients = $this->Clients->find()
                ->where([
                    'rec_state IN' => [13, 14, 15],
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->toArray();
            $totalsoldCount = count($totalClients);


            $clientBookCounts = $this->Clients->Books->find()->count();
            if ($clientBookCounts != 0) {
                $percentageRate = round(($totalsoldCount / $clientBookCounts) * 100, 1);
            } else {
                $percentageRate = 0;
            }


            $clientBookCounts = $this->Clients->Books->find()->where([
                'stat_created >=' => $starterDate,
                'stat_created <=' => $endDate
            ])->count();

            $totalonlineClients = $this->Clients->find()
                ->where([
                    'rec_state IN' => [14],
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->toArray();
            $totalonlineCount = count($totalonlineClients);

            $totalcancelClients = $this->Clients->find()
                ->where([
                    'rec_state IN' => [16],
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->toArray();
            $totalcancelCount = count($totalcancelClients);

            $totalUSDPrice = $this->Clients->Reservations->find()
                ->select(['total_usdprice' => 'SUM(reservation_usdprice)'])
                ->where([
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->first()
                ->total_usdprice;


            $totalUSDcommission = $this->Clients->Reservations->find()
                ->select(['total_usdcommission' => 'SUM(reservation_usdcomission)'])
                ->where([
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->first()
                ->total_usdcommission;

            $downpaymentCount = $this->Clients->Reservations->find()
                ->where([
                    'Reservations.rec_state IN' => [13, 14],
                    'stat_created >=' => $starterDate,
                    'stat_created <=' => $endDate
                ])
                ->count();


        } else {
            $clientCount = $this->Clients->find()->count();
            $totalClients = $this->Clients->find()
                ->where(['rec_state IN' => [13, 14, 15]])
                ->toArray();
            $totalsoldCount = count($totalClients);
            $clientBookCounts = $this->Clients->Books->find()->count();
            if ($clientBookCounts != 0) {
                $percentageRate = round(($totalsoldCount / $clientBookCounts) * 100, 1);
            } else {
                $percentageRate = 0;
            }

            $clientBookCounts = $this->Clients->Books->find()->count();

            $totalonlineClients = $this->Clients->find()
                ->where(['rec_state IN' => [14]])
                ->toArray();
            $totalonlineCount = count($totalonlineClients);

            $totalcancelClients = $this->Clients->find()
                ->where(['rec_state IN' => [16]])
                ->toArray();
            $totalcancelCount = count($totalcancelClients);

            $totalUSDPrice = $this->Clients->Reservations->find()
                ->select(['total_usdprice' => 'SUM(reservation_usdprice)'])
                ->first()
                ->total_usdprice;


            $totalUSDcommission = $this->Clients->Reservations->find()
                ->select(['total_usdcommission' => 'SUM(reservation_usdcomission)'])
                ->first()
                ->total_usdcommission;

            $downpaymentCount = $this->Clients->Reservations->find()
                ->where([
                    'Reservations.rec_state IN' => [13, 14],
                ])
                ->count();



        }


       
            if ($starterDate && $endDate) {
                $clientResIds = $this->Clients->Reservations->find()
                    ->select(['client_id'])
                    ->where([
                        'rec_state IN' => [13, 14, 15],
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                // $clientResIds bir dizi içinde client_id'leri içeriyor
                $clientIds = array_column($clientResIds, 'client_id');
                $recStateClients = $this->Clients->find()
                    ->select(['adrs_country', 'count' => 'COUNT(*)'])
                    ->contain(['Adrscountry'])
                    ->where(['Clients.id IN' => $clientIds])
                    ->group(['Adrscountry.adrs_name'])
                    ->toArray();

                $data4 = ['labels' => [], 'datasets' => []];

                $addressesTable = $this->getTableLocator()->get('Addresses');

                // Get localized category names
                $pmsaddress = $this->Do->lcl(
                    $addressesTable
                        ->find('list', ['keyField' => 'id', 'valueField' => 'adrs_name'])
                        ->where(['id IN' => array_values(array_column($recStateClients, 'adrs_country'))])
                        ->toArray()
                );

                foreach ($recStateClients as $recStateClient) {
                    $adrsCountry = $recStateClient->adrs_country;
                    $adrsCountry = $adrsCountry ?? 'Unknown';
                    $adrsName = $pmsaddress[$adrsCountry];

                    // Boş değeri kontrol et ve gerekirse 0 olarak ayarla
                    $count = $recStateClient->count ?: 0;

                    $datasetsrec[] = [
                        'label' => $adrsName,
                        'type' => 'bar',
                        'data' => [$count],
                        'borderRadius' => 8,
                        'barPercentage' => 0.1,
                        'maxBarThickness' => 13
                    ];
                }

                $data4 = [
                    'labels' => [''],  // Initialize labels as an empty array
                    'datasets' => $datasetsrec,
                ];
            } else {
                $clientResIds = $this->Clients->Reservations->find()
                    ->select(['client_id'])
                    ->where([
                        'rec_state IN' => [13, 14, 15]
                    ])
                    ->toArray();

                // $clientResIds bir dizi içinde client_id'leri içeriyor
                $clientIds = array_column($clientResIds, 'client_id');

                $recStateClients = $this->Clients->find()
                    ->select(['adrs_country', 'count' => 'COUNT(*)'])
                    ->contain(['Adrscountry'])
                    ->where(['Clients.id IN' => $clientIds])
                    ->group(['Adrscountry.adrs_name'])
                    ->toArray();

                $data4 = ['labels' => [], 'datasets' => []];

                $addressesTable = $this->getTableLocator()->get('Addresses');

                // Get localized category names
                $pmsaddress = $this->Do->lcl(
                    $addressesTable
                        ->find('list', ['keyField' => 'id', 'valueField' => 'adrs_name'])
                        ->where(['id IN' => array_values(array_column($recStateClients, 'adrs_country'))])
                        ->toArray()
                );

                foreach ($recStateClients as $recStateClient) {
                    $adrsCountry = $recStateClient->adrs_country;
                    $adrsCountry = $adrsCountry ?? 'Unknown';
                    $adrsName = $pmsaddress[$adrsCountry];

                    // Boş değeri kontrol et ve gerekirse 0 olarak ayarla
                    $count = $recStateClient->count ?: 0;

                    $datasetsrec[] = [
                        'label' => $adrsName,
                        'type' => 'bar',
                        'data' => [$count],
                        'borderRadius' => 8,
                        'barPercentage' => 0.1,
                        'maxBarThickness' => 13
                    ];
                }

                $data4 = [
                    'labels' => [''],  // Initialize labels as an empty array
                    'datasets' => $datasetsrec,
                ];
            }
        




        //client advisor table
        $ccUsers = $userData->find()
            ->where(['user_role' => 'cc'])
            ->toArray();

        $userBookCounts = [];
        $userReservationCounts = [];
        $userReservationsaleCounts = [];
        $userTotalUSDPriceCounts = [];
        $userReservationSaleRatios = [];

        foreach ($ccUsers as $user) {
            if ($starterDate && $endDate) {
                $userSales = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'user_id' => $user->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

            } else {
                $userSales = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['user_id' => $user->id])
                    ->toArray();

            }

            $totalBooksCount = 0;
            $totalReservationsCount = 0;
            $totalReservationssaleCount = 0;
            $totalUSDPriceCount = 0;

            foreach ($userSales as $userSale) {
                // Kitap sayısı
                $booksCount = $this->Clients->Books->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->count();
                $totalBooksCount += $booksCount;

                // Rezervasyon sayısı
                $reservationsCount = $this->Clients->Reservations->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->count();
                $totalReservationsCount += $reservationsCount;

                // Belirli koşulları sağlayan rezervasyon sayısı
                $reservationssaleCount = $this->Clients->Reservations->find()
                    ->where([
                        'client_id' => $userSale->client_id,
                        'rec_state IN' => [13, 14, 15],
                    ])
                    ->count();
                $reservationssaleCount = $this->Clients->Reservations->find()
                    ->where([
                        'client_id' => $userSale->client_id,
                        'reservation_downpayment IS NOT NULL',
                    ])
                    ->count();
                $totalReservationssaleCount += $reservationssaleCount;

                // USD Price toplamı
                $totalUSDPrice = $this->Clients->Reservations->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->all()
                    ->sumOf('reservation_usdprice');
                $totalUSDPriceCount += $totalUSDPrice;

            }

            $userReservationCounts[$user->id] = $totalReservationsCount;
            $userReservationsaleCounts[$user->id] = $totalReservationssaleCount;
            $userBookCounts[$user->id] = $totalBooksCount;
            $userTotalUSDPriceCounts[$user->id] = $totalUSDPriceCount;

            if ($userBookCounts[$user->id] != 0) {
                $ratio = ($userReservationsaleCounts[$user->id] / $userBookCounts[$user->id]) * 100;
                $formattedRatio = number_format($ratio, 1);
                $userReservationSaleRatios[$user->id] = $formattedRatio;
            } else {
                $userReservationSaleRatios[$user->id] = 0;
            }
        }
        //field advisor table
        $fieldUsers = $userData->find()
            ->where(['user_role' => 'field'])
            ->toArray();

        $userfieldBookCounts = [];
        $userfieldReservationCounts = [];
        $userfieldReservationsaleCounts = [];
        $userfieldTotalUSDPriceCounts = [];
        $userfieldReservationSaleRatios = [];

        foreach ($fieldUsers as $user) {
            if ($starterDate && $endDate) {
                $userSales = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'user_id' => $user->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

            } else {
                $userSales = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where(['user_id' => $user->id])
                    ->toArray();

            }

            $totalfieldBooksCount = 0;
            $totalfieldReservationsCount = 0;
            $totalfieldReservationssaleCount = 0;
            $totalfieldUSDPriceCount = 0;

            foreach ($userSales as $userSale) {
                // Kitap sayısı
                $booksfieldCount = $this->Clients->Books->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->count();
                $totalfieldBooksCount += $booksfieldCount;

                // Rezervasyon sayısı
                $reservationsfieldCount = $this->Clients->Reservations->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->count();
                $totalfieldReservationsCount += $reservationsfieldCount;

                // Belirli koşulları sağlayan rezervasyon sayısı
                $reservationssalefieldCount = $this->Clients->Reservations->find()
                    ->where([
                        'client_id' => $userSale->client_id,
                        'rec_state IN' => [13, 14, 15],
                    ])
                    ->count();
                $reservationssalefieldCount = $this->Clients->Reservations->find()
                    ->where([
                        'client_id' => $userSale->client_id,
                        'reservation_downpayment IS NOT NULL',
                    ])
                    ->count();
                $totalfieldReservationssaleCount += $reservationssalefieldCount;

                // USD Price toplamı
                $totalfieldUSDPrice = $this->Clients->Reservations->find()
                    ->where(['client_id' => $userSale->client_id])
                    ->all()
                    ->sumOf('reservation_usdprice');
                $totalfieldUSDPriceCount += $totalfieldUSDPrice;



            }
            $userfieldReservationCounts[$user->id] = $totalfieldReservationsCount;
            $userfieldReservationsaleCounts[$user->id] = $totalfieldReservationssaleCount;
            $userfieldBookCounts[$user->id] = $totalfieldBooksCount;
            $userfieldTotalUSDPriceCounts[$user->id] = $totalfieldUSDPriceCount;

            if ($userfieldBookCounts[$user->id] != 0) {
                $ratio = ($userfieldReservationsaleCounts[$user->id] / $userfieldBookCounts[$user->id]) * 100;
                $formattedRatio = number_format($ratio, 1); // 1, 2 veya istediğiniz basamak sayısı olabilir
                $userfieldReservationSaleRatios[$user->id] = $formattedRatio;
            } else {
                // Eğer $userfieldBookCounts[$user->id] sıfırsa oranı sıfır yap
                $userfieldReservationSaleRatios[$user->id] = 0;
            }
        }
        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'data4' => $data4,
                'sourceDoughnutData' => $sourceDoughnutData,
                'data6' => $data6,
                'propertyPieData' => $propertyPieData,
                'developerTotals' => $developerTotals,
                'projectTotals' => $projectTotals,
                'clientBookCounts' => $clientBookCounts,
                'totalsoldCount' => $totalsoldCount,
                'totalonlineCount' => $totalonlineCount,
                'totalcancelCount' => $totalcancelCount,
                'totalUSDPrice' => $totalUSDPrice,
                'totalUSDcommission' => $totalUSDcommission,
                'downpaymentCount' => $downpaymentCount,
                'percentageRate' => $percentageRate,
                'ccUsers' => $ccUsers,
                'userBookCounts' => $userBookCounts,
                'userReservationCounts' => $userReservationCounts,
                'userReservationsaleCounts' => $userReservationsaleCounts,
                'userTotalUSDPriceCounts' => $userTotalUSDPriceCounts,
                'fieldUsers' => $fieldUsers,
                'userfieldBookCounts' => $userfieldBookCounts,
                'userfieldReservationCounts' => $userfieldReservationCounts,
                'userfieldReservationsaleCounts' => $userfieldReservationsaleCounts,
                'userfieldTotalUSDPriceCounts' => $userfieldTotalUSDPriceCounts,
                'userReservationSaleRatios' => $userReservationSaleRatios,
                'userfieldReservationSaleRatios' => $userfieldReservationSaleRatios,

            ]
        ]);
        die();
    }

    public function doughnut($clientIds = null)
    {

        $this->autoRender = false;

        extract($this->getClientIdsAndUser());


        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';



        if (!$isAdmin) {

            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }


                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;
            }



            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }

        } else {
            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();

                }

                $clientIds = $filteredClientIds;

            }






            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }



        }


        $sourceData = $this->Clients->find()
            ->select(['source_id', 'count' => 'COUNT(*)'])
            ->where(function ($exp, $q) use ($clientIds) {
                return $exp->in('id', $clientIds);
            })
            ->group(['source_id'])
            ->toArray();


        $labels = [];
        $dataPoints = [];
        $catTable = TableRegistry::getTableLocator()->get('Categories');

        foreach ($sourceData as $source) {
            $categoryId = $source->source_id;


            if ($categoryId !== null) {
                $category = $catTable->get($categoryId, ['fields' => ['id', 'category_name']]);

                $labels[] = $category->category_name;
                $dataPoints[] = $source->count;
            } else {

                $labels[] = 'Unknown';
                $dataPoints[] = $source->count;
            }

        }


        $sourceDoughnutData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $dataPoints,
                    'backgroundColor' => [
                        '#78211f',
                        '#f09f1f',
                        '#1924b9',
                        '#1f5d78',
                        '#5e298d',
                        '#399f32',
                        '#3c68e5',
                        '#e8534f',
                        '#3fbfba',
                        '#d036a0'
                    ],
                    'hoverBackgroundColor' => [
                        '#78211f55',
                        '#f09f1f55',
                        '#1924b955',
                        '#1f5d7855',
                        '#5e298d55',
                        '#399f3255',
                        '#3c68e555',
                        '#e8534f55',
                        '#3fbfba55',
                        '#d036a055'
                    ],
                    'spacing' => 3,
                    'hoverOffset' => 12
                ]
            ]
        ];
        // dd($sourceDoughnutData);

        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'sourceDoughnutData' => $sourceDoughnutData,
                'users' => $users

            ]
        ]);
        die();

    }

    public function numbers($clientIds = null)
    {
        $this->autoRender = false;


        $userId = $this->authUser['id'];
        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';


        $userData = TableRegistry::getTableLocator()->get('Users');
        $users = $userData->find()
            ->select(['id', 'user_fullname'])
            ->toArray();

        $filterUserData = $this->request->getData('user_id');

        $filterUserData = $filterUserData ?? '';


        if ($isAdmin && $filterUserData) {
            $userSaleData = $this->Clients->UserSale->find()
                ->select(['client_id'])
                ->where(['UserSale.user_id' => $filterUserData])
                ->toArray();

            $clientIds = [];
            foreach ($userSaleData as $userSale) {
                $clientIds[] = $userSale->client_id;
            }


        } elseif ($isAdmin) {
            $clientIds = $this->Clients->find()->select(['id']);
        } else {

            $userSaleData = $this->Clients->UserSale->find()
                ->select(['client_id'])
                ->where(['UserSale.user_id' => $userId])
                ->toArray();

            $clientIds = [];
            foreach ($userSaleData as $userSale) {
                $clientIds[] = $userSale->client_id;
            }
        }


        if (!$isAdmin) {

            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }


                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;
            }



            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->UserSale->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserSale.user_id' => $userId
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->client_id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }

        } else {
            $firstDate = $this->request->getData('firstDate');
            $finishDate = $this->request->getData('finishDate');

            if ($firstDate && $finishDate) {
                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();

                }

                $clientIds = $filteredClientIds;

            }





            $starterDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
            $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->find()
                    ->select(['id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

                $filteredClientIds = [];
                foreach ($clientQuery as $clientId) {
                    $filteredClientIds[] = $clientId->id;
                }

                if (empty($filteredClientIds)) {
                    echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;


            }

        }





        $clientCount = $this->Clients->find()->where(['id IN' => $clientIds])->count();
        $reminderCount = $this->Clients->Reminders->find()->where(['client_id IN' => $clientIds])->count();
        $AllactionCount = $this->Clients->Actions->find()
            ->where(['client_id IN' => $clientIds])
            ->count();
        $actionCount = $this->Clients->Actions->find()
            ->where(['action_type' => 76, 'client_id IN' => $clientIds])
            ->count();
        $booksCount = $this->Clients->Books->find()->where(['client_id IN' => $clientIds])->count();
        $pursueCount = $this->Clients->find()->where(['rec_state' => 7, 'id IN' => $clientIds])->count();



        $recState = isset($_GET['recstate']) ? $_GET['recstate'] : '';
        $stateCount = $this->Clients->find()->where(['rec_state' => $recState, 'id IN' => $clientIds])->count();

        // Sıfıra bölme kontrolü
        if ($clientCount != 0) {
            $recStateClientsCount = $this->Clients->find()
                ->where(['rec_state' => $recState, 'id IN' => $clientIds])
                ->count();

            $recStateRatio = number_format(($recStateClientsCount / $clientCount) * 100);
        } else {
            // $clientCount sıfır olduğunda sıfıra bölme hatası oluşmaması için
            $recStateRatio = 0; // veya başka bir değer
        }


        $recStateList = $this->Do->lcl($this->Do->get('rec_stateSale.3'));

        $selectedRecStateName = isset($recStateList[$recState]) ? $recStateList[$recState] : '';




        $addressesTable = TableRegistry::getTableLocator()->get('Addresses');

        $groupedAddresses = $addressesTable->find()
            ->select(['id', 'adrs_name'])
            ->where(['parent_id' => 0])
            ->toArray();

        $clientCountries = $this->Clients->find()
            ->select(['adrs_country'])
            ->where(['id IN' => $clientIds])
            ->toArray();

        $groupedData = [];

        foreach ($groupedAddresses as $address) {
            $id = $address['id'];
            $groupedData[$id]['adrs_name'] = $address['adrs_name'];
            $groupedData[$id]['count'] = 0;

            foreach ($clientCountries as $client) {
                $countries = is_array($client['adrs_country']) ? $client['adrs_country'] : [$client['adrs_country']];

                if (in_array($id, $countries, true)) {
                    $groupedData[$id]['count']++;
                }
            }
        }


        $actionsTable = TableRegistry::getTableLocator()->get('Actions');
        $actionsData = $actionsTable->find()
            ->select(['client_id'])
            ->where(['client_id IN' => $clientIds])
            ->toArray();

        $clientCountriesCount = [];


        foreach ($actionsData as $action) {

            $clientId = $action['client_id'];

            $clientExists = $this->Clients->exists(['id' => $clientId]);

            if ($clientExists) {

                $client = $this->Clients->get($clientId, ['fields' => ['adrs_country']]);

                $clientCountry = is_array($client->adrs_country) ? $client->adrs_country[0] : $client->adrs_country;

                if (!isset($clientCountriesCount[$clientCountry])) {
                    $clientCountriesCount[$clientCountry] = 0;
                }

                $clientCountriesCount[$clientCountry]++;
            }

        }

        $addressData = [];
        foreach ($clientCountriesCount as $country => $count) {
            $address = TableRegistry::getTableLocator()->get('Addresses')->find()->select(['id', 'adrs_name'])->where(['id' => $country])->first();

            if ($address && $address->adrs_name) {
                $addressData[] = [
                    'adrs_country' => $country,
                    'adrs_name' => $address->adrs_name,
                    'id' => $address->id,
                    'count' => $count,
                ];
            }
        }

        $users = $this->Clients->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'user_fullname'
        ])->toArray();

        $dateFilter = [
            1 => 'Today',
            2 => 'Weekly',
            3 => 'Monthly',
            4 => 'Yearly'
        ];


        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'booksCount' => $booksCount,
                'pursueCount' => $pursueCount,
                'actionCount' => $actionCount,
                'AllactionCount' => $AllactionCount,
                'reminderCount' => $reminderCount,
                'clientCount' => $clientCount,
                'dateFilter' => $dateFilter,
                'addressData' => $addressData,
                'groupedData' => $groupedData,
                'users' => $users,
                'filterUserData' => $filterUserData,
                'recStateList' => $recStateList,
                'recStateRatio' => $recStateRatio,
                'stateCount' => $stateCount,
                'selectedRecStateName' => $selectedRecStateName,

            ]
        ]);
        die();
    }

    public function notifications()
    {

        $userId = $this->authUser['id'];
        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';

        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $assignTable = TableRegistry::getTableLocator()->get('UserSale');

        $user = $usersTable->get($userId);
        $lastLoginDate = $user->stat_lastlogin;






        if ($isAdmin) {

            $newClientsCount = $this->Clients
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();
            $newAssignCount = $assignTable
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();
            $booksTable = TableRegistry::getTableLocator()->get('Books');
            $newBookedCount = $booksTable
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $reservationTable = TableRegistry::getTableLocator()->get('Reservations');
            $newSoldCount = $reservationTable
                ->find()
                ->where([
                    'rec_state' => 14,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newCancelledCount = $reservationTable
                ->find()
                ->where([
                    'rec_state' => 17,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newCancelledCount = $reservationTable
                ->find()
                ->where([
                    'rec_state' => 17,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newDownPaymentCount = $reservationTable
                ->find()
                ->where([
                    'rec_state' => 13,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReservedCount = $this->Clients
                ->find()
                ->where([
                    'rec_state' => 12,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldOnlineCount = $reservationTable
                ->find()
                ->where([
                    'rec_state' => 15,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $reminderTable = TableRegistry::getTableLocator()->get('Reminders');
            $newReminderCount = $reminderTable
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

        } else {
            $userSaleTable = TableRegistry::getTableLocator()->get('UserSale');
            $clientIds = $userSaleTable
                ->find()
                ->where([
                    'user_id' => $userId
                ])
                ->extract('client_id')
                ->toArray();

            $booksTable = TableRegistry::getTableLocator()->get('Books');
            $reservationTable = TableRegistry::getTableLocator()->get('Reservations');
            $clientsTable = TableRegistry::getTableLocator()->get('Clients');
            $reminderTable = TableRegistry::getTableLocator()->get('Reminders');

            $newClientsCount = $userSaleTable
                ->find()
                ->where([
                    'user_id' => $userId,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newAssignCount = $newClientsCount;

            $newBookedCount = $booksTable
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldCount = $reservationTable
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 14,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newCancelledCount = $reservationTable
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 17,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newDownPaymentCount = $reservationTable
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 13,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReservedCount = $clientsTable
                ->find()
                ->where([
                    'id IN' => $clientIds,
                    'rec_state' => 12,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldOnlineCount = $reservationTable
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 15,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReminderCount = $reminderTable
                ->find()
                ->where([
                    'user_id' => $userId,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

        }

        echo json_encode([
            'status' => 'SUCCESS',
            'msg' => __('success'),
            'data' => [
                'newClientsCount' => $newClientsCount,
                'newBookedCount' => $newBookedCount,
                'newSoldCount' => $newSoldCount,
                'newCancelledCount' => $newCancelledCount,
                'newDownPaymentCount' => $newDownPaymentCount,
                'newReservedCount' => $newReservedCount,
                'newSoldOnlineCount' => $newSoldOnlineCount,
                'newAssignCount' => $newAssignCount,
                'newReminderCount' => $newReminderCount,
            ],
        ]);
        die();
    }

    private function getRecStateLabel($recState)
    {
        $labels = $this->Do->lcl($this->Do->get('rec_stateSale.3'));

        return isset($labels[$recState]) ? $labels[$recState] : 'Unknown';
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
            $rec = $this->Clients->get($rec_id, [
                'contain' => [
                    "ClientSpecs",
                    "Enquires",
                    "Actions",
                    "Reservations",
                    "Reports",
                    "Books",
                    "Offers",
                ]
            ]);
            $delRec[$k] = $this->Clients->delete($rec);
        }

        $res = (!empty(array_filter($delRec))) ? ["status" => "SUCCESS", "data" => $delRec] : ["status" => "FAIL", "data" => $delRec];

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
            $dt = $this->Clients->newEmptyEntity();

            $dt["id"] = $rec;
            if (!$this->Clients->save($dt)) {
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
