<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\AppController;
use DateTime;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

use function PHPUnit\Framework\isEmpty;

class ClientsController extends AppController
{
    // COMMON FUNC
    private function getClientIdsAndUser()
    {
        $userId = $this->authUser['id'];
        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';

        $userData = TableRegistry::getTableLocator()->get('Users');
        $users = $this->Clients->Users->find()
            ->select(['id', 'user_fullname'])
            ->toArray();

        $clientIds = [];
        if ($isAdmin) {
            $clientIds = $this->Clients->find()->select(['id']);
        } else {
            $userSaleData = $this->Clients->UserClient->find()
                ->select(['client_id'])
                ->where(['UserClient.user_id' => $userId])
                ->toArray();

            foreach ($userSaleData as $userSale) {
                $clientIds[] = $userSale->client_id;
            }
        }

        return compact('userId', 'users', 'clientIds');
    }

    private function getUserSaleData($userClient)
    {
        return $this->Clients->UserClient->find()
            ->select(['client_id'])
            ->where(['UserClient.user_id' => $userClient->id])
            ->toArray();
    }

    private function getTotalReservationCount($userSaleData)
    {
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

        return $totalReservationCount;
    }

    private function getTotalPrice($userSaleData)
    {
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

        return $totalPrice;
    }

    private function getTotalBooksCount($userSaleData)
    {
        $totalBooksCount = 0;

        foreach ($userSaleData as $userSale) {
            $booksCount = $this->Clients->Books->find()
                ->where(['client_id' => $userSale->client_id])
                ->count();

            $totalBooksCount += $booksCount;
        }

        return $totalBooksCount;
    }

    private function getTotalComission($userSaleData)
    {
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

        return $totalComission;
    }

    private function getClientCount($userSaleData)
    {
        return count($userSaleData);
    }

    private function getDateUserSaleData($userClient, $starterDate, $endDate)
    {
        return $this->Clients->UserClient->find()
            ->select(['client_id'])
            ->where([
                'UserClient.user_id' => $userClient->id,
                'stat_created >=' => $starterDate,
                'stat_created <=' => $endDate
            ])
            ->toArray();
    }


    // public function getPerformanceData()
    // {

    //     $user = $this->request->getParam('_pid');
    //     $action_type = $this->request->getQuery('action_type');
    //     $date = $this->request->getQuery('date') ? $this->request->getQuery('date') : 0;

    //     if ($user && $action_type && $date) {
    //         $ActionsTable = $this->getTableLocator()->get('Actions');
    //         $actionResults = $ActionsTable->find()
    //             ->select(['client_id'])
    //             ->where([
    //                 'user_id' => $user,
    //                 'action_type' => $action_type,
    //                 'DATE(stat_created)' => $date
    //             ])
    //             ->toArray();

    //         dd($actionResults);

    //         $clientIds = [];
    //         foreach ($actionResults as $action) {
    //             $clientIds[] = $action->client_id;
    //         }

    //         // if (!empty($clientIds)) {
    //         //     $query->where(['Clients.id IN' => $clientIds]);
    //         // }

    //         echo json_encode([
    //             'status' => 'SUCCESS',
    //             'data' => $clientIds,
    //             '_serialize' => ['status', 'data']
    //         ]);
    //         die();
    //     } else {

    //         echo json_encode([
    //             'status' => 'SUCCESS',
    //             'data' => [],
    //             '_serialize' => ['status', 'data']
    //         ]);
    //         die();
    //     }


    // }


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

            $adrs_country = $this->request->getQuery('adrs_country');

            $noneSearchable = ['page', 'keyword'];
            $likeFields = ['page', 'keyword'];
            $betweenFields = ['budget_min', 'budget_max', 'keyword', 'page'];
            $exactFields = ['rec_state', 'source_id', 'client_nationality', 'pool_id', 'adrs_city', 'adrs_region', 'client_address', 'id'];
            $otherCtrl = ['client_priority', 'client_current_stage', 'category_id'];


            $data = [];
            $conditions = [];


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
                        continue;
                    }
                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }
                    if (in_array($col, $exactFields)) {
                        $conditions['Clients.' . $col] = $val;
                    } elseif ($col == 'selectedMember') {

                        $col = 'id';
                        // Ensure the UserClient table is joined properly
                        $query = $this->Clients->find()
                            ->contain(['UserClient'])
                            ->matching('UserClient', function ($q) use ($val) {
                                return $q->where(['UserClient.user_id IN' => $val]);
                            });

                        // Get the IDs from the query
                        $val = $query->select(['Clients.id'])->extract('id')->toArray();
                        $conditions['Clients.id IN'] = $val;

                    } elseif ($col == 'futureId') {

                        $userId = $this->authUser['id'];
                        $twelveHoursLater = (new DateTime())->modify('+12 hours')->format('Y-m-d H:i:s');
                        // future call list
                        $query = $this->Clients->Reminders->find()
                            ->select(['client_id'])
                            ->where([
                                'user_id' => $userId,
                                'reminder_nextcall >' => $twelveHoursLater
                            ]);

                        $results = $query->all();
                        $clientIds = [];

                        foreach ($results as $result) {
                            $clientIds[] = $result->client_id;
                        }

                        if (!empty($clientIds)) {
                            $clientQuery = $this->Clients->find()
                                ->select(['id'])
                                ->where(['Clients.id IN' => $clientIds]);


                            $val = $clientQuery->extract('id')->toArray();
                        }

                        if (!empty($val)) {
                            $conditions['Clients.id IN'] = (array) $val;
                        }

                    } elseif ($col == 'prevId') {

                        $userId = $this->authUser['id'];
                        $twelveHoursAgo = (new DateTime())->modify('-12 hours')->format('Y-m-d H:i:s');

                        // Previous call list
                        $query = $this->Clients->Reminders->find()
                            ->select(['client_id'])
                            ->where([
                                'user_id' => $userId,
                                'reminder_nextcall <' => $twelveHoursAgo
                            ]);

                        $results = $query->all();
                        $clientIds = [];

                        foreach ($results as $result) {
                            $clientIds[] = $result->client_id;
                        }

                        if (!empty($clientIds)) {
                            $clientQuery = $this->Clients->find()
                                ->select(['id'])
                                ->where(['Clients.id IN' => $clientIds]);


                            $val = $clientQuery->extract('id')->toArray();
                        }

                        if (!empty($val)) {
                            $conditions['Clients.id IN'] = $val;
                        }
                    } elseif ($col == 'recentId') {

                        // $twoDaysAgo = (new DateTime())->modify('-2 days')->format('Y-m-d H:i:s');
                        $fiveHoursLater = (new DateTime())->modify('-5 hours')->format('Y-m-d H:i:s');
                        $query = $this->Clients->find()
                            ->select(['id'])
                            ->where([
                                'stat_created >' => $fiveHoursLater
                            ])
                            ->order(['stat_created' => 'DESC']);

                        $results = $query->all();

                        $clientIds = [];
                        foreach ($results as $result) {
                            $clientIds[] = (int) $result->id;
                        }

                        if (!empty($clientIds)) {
                            $clientQuery = $this->Clients->find()
                                ->select(['id'])
                                ->where(['Clients.id IN' => $clientIds]);

                            $val = $clientQuery->extract('id')->toArray();
                        }

                        if (!empty($val)) {

                            if (!is_array($val)) {
                                $val = [$val];
                            }


                            $conditions['Clients.id IN'] = array_map('intval', $val);
                        }
                    } elseif (in_array($col, $otherCtrl)) {

                        $conditions['' . $col] = $val;
                    } elseif ($col == 'client_mobile') {
                        $conditions[$col . ' LIKE '] = $val . '%';
                    } elseif ($col == 'client_tags') {
                        foreach ($val as $tag) {
                            $conditions['AND'][] = ['client_tags LIKE ' => '%"' . $tag['value'] . '"%'];
                        }
                    } elseif ($col == 'user_id') {
                        // Fetch users with the role 'admin.callcenter'
                        $callcenterUsers = $this->Clients->Users->find()
                            ->select(['id'])
                            ->where(['user_role' => 'admin.callcenter'])
                            ->toArray();

                        dd($callcenterUsers);
                        // Extract user IDs
                        $callcenterUserIds = [];
                        foreach ($callcenterUsers as $user) {
                            $callcenterUserIds[] = $user->id;
                        }

                        // Include users with role 'admin.callcenter'
                        if (!empty($callcenterUserIds)) {
                            $conditions['AND'][] = ['Clients.user_id IN' => $callcenterUserIds];
                        }
                    } elseif ($col == 'adrs_country') {
                        $countryIds = array_map(function ($tag) {
                            return (int) $tag['value'];
                        }, $val);

                        if (!empty($countryIds)) {
                            $conditions['adrs_country IN'] = $countryIds;
                        }
                    } else {
                        $conditions[$col . ' LIKE '] = '%' . $val . '%';
                    }
                }
            }


            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Clients->get($_id, [
                    'contain' => [
                        "Country" => ['fields' => ['category_name', 'id']],
                        'Reports',
                        "Reports.User",
                        "Reports.TypeCategories",
                        "Reports.Property" => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
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
                        "UserClient.Users" => ['fields' => ['user_fullname', 'id']],
                        "UserClient",
                        "Users",
                        "Actions",
                        "Actions.Action",
                        "Enquires",
                        'Reminders',

                    ]
                ])->toArray();

                if (!empty($data['property'])) {

                    $data['property'][] = [
                        [
                            "text" => $data["property"]["property_ref"],
                            "value" => $data["property"]['id']
                        ]
                    ];

                }

                $reservations = [];
                foreach ($data["reservations"] as $reservation) {
                    if (isset($reservation['property'])) {
                        $property = $reservation['property'];

                        if (isset($property['project_id']) && $property['project_id'] != 0) {
                            $projectId = $property['project_id'];
                            $project = $this->Clients->Reservations->Project->find()
                                ->where(['id' => $projectId])
                                ->first();

                            if ($project) {
                                $reservation['property']['project_ref'] = $project->project_ref;
                            }
                        }

                        if (isset($property['developer_id']) && $property['developer_id'] != 0) {
                            $developerId = $property['developer_id'];
                            $developer = $this->Clients->Reservations->Developer->find()
                                ->where(['id' => $developerId])
                                ->first();

                            if ($developer) {
                                $reservation['property']['developer_name'] = $developer->dev_name;
                            }
                        }

                        if (isset($property['seller_id']) && $property['seller_id'] != 0) {
                            $sellerId = $property['seller_id'];
                            $seller = $this->Clients->Reservations->Seller->find()
                                ->where(['id' => $sellerId])
                                ->first();

                            if ($seller) {
                                $reservation['property']['seller_name'] = $seller->seller_name;
                            }
                        }
                    }

                    $reservations[] = $reservation;
                }

                $data["reservations"] = $reservations;

                // dd($data["reservations"]);

                if (isset($data['country']) && $data['country'] != 0) {
                    $data["adrscountry"] = [
                        [
                            "text" => $data['country']['category_name'],
                            "value" => $data['country']['id']
                        ]
                    ];

                }




                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }


            // // LIST
            // if (!empty($_list)) {
            //     $userRole = $this->authUser['user_role'];

            //     $query = $this->Clients->find()
            //         ->contain([
            //             "ClientSpecs",
            //             'PoolCategories',
            //             'Reports' => [
            //                 'TypeCategories',
            //                 'User',
            //                 'Property' => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']]
            //             ],
            //             'TagCategories',
            //             'Categories',
            //             'Offers',
            //             'ClientSpecs.Currency',
            //             'Reminders',
            //             'Sources',
            //             'Users',
            //             "UserClient.Users" => ['fields' => ['user_fullname', 'id']],
            //             "UserClient",
            //             "Books",
            //             "Offers" => [
            //                 'PropertyRef' => ['fields' => ['property_title', 'property_ref', 'id']]
            //             ],
            //             "Actions",
            //             "Reservations" => [
            //                 'Property' => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
            //                 'Project' => ['fields' => ['project_ref', 'id']],
            //                 'Seller' => ['fields' => ['seller_name', 'id']],
            //                 'Developer' => ['fields' => ['dev_name', 'id']],
            //                 'Pmscategory' => ['fields' => ['category_name', 'id']],
            //                 'Payment',
            //                 'Currency'
            //             ]
            //         ])
            //         ->leftJoinWith('Reminders')
            //         ->leftJoinWith('Reports')
            //         // ->leftJoinWith('UserClient')
            //         ->order([
            //             'Reminders.reminder_nextcall' => 'ASC',  // today call list
            //             'Clients.client_priority' => 'DESC',      // priority
            //             'Clients.client_budget' => 'DESC',   // budget
            //             'Clients.stat_created' => 'DESC',        // created
            //             'Reports.stat_created' => 'DESC'         // last note date
            //         ])
            //         ->where([$conditions])
            //         ->group('Clients.id');

            //     $lastLoginDate = $this->authUser['stat_lastlogin'];
            //     function getClientIds($query)
            //     {
            //         $results = $query->toArray();
            //         $clientIds = [];
            //         foreach ($results as $result) {
            //             $clientIds[] = $result->client_id ?? $result->id;
            //         }
            //         return $clientIds;
            //     }

            //     if ($userRole != 'admin.root' && $userRole != 'admin.admin') {
            //         $userId = $this->authUser['id'];

            //         // Initialize the querygit push
            //         $query = $this->Clients->find()
            //             ->order(['Clients.' . $_col => $_dir])
            //             ->where([$conditions])
            //             ->contain([
            //                 // Add necessary associations if needed
            //             ])
            //             ->group('Clients.id');

            //         // Filter by pool_id if provided
            //         if (!empty($dt['search']['pool_id'])) {
            //             $selectedPoolId = $dt['search']['pool_id'];
            //             $query->matching('PoolCategories', function ($query) use ($selectedPoolId) {
            //                 return $query->where(['PoolCategories.id' => $selectedPoolId]);
            //             });
            //         }



            //         // if ($userRole === 'teamleader') {

            //         //     $teamleaderId = $this->authUser['id'];
            //         //     $teamleaderClientIds = $this->Clients->UserClient->find()
            //         //         ->select(['client_id'])
            //         //         ->where(['user_id' => $teamleaderId])
            //         //         ->extract('client_id')
            //         //         ->toArray();

            //         //     // If selectedMember is provided, get their client IDs
            //         //     if (isset($dt['search']['selectedMember']) && !empty($dt['search']['selectedMember'])) {
            //         //         $selectedMemberId = $dt['search']['selectedMember'];
            //         //         $selectedMemberClientIds = $this->Clients->UserClient->find()
            //         //             ->select(['client_id'])
            //         //             ->where(['user_id' => $selectedMemberId])
            //         //             ->extract('client_id')
            //         //             ->toArray();

            //         //         // Use client IDs of selectedMember if provided
            //         //         $clientIds = $selectedMemberClientIds;
            //         //     } else {
            //         //         // Use teamleader's client IDs
            //         //         $clientIds = $teamleaderClientIds;
            //         //     }

            //         //     // Ensure $clientIds is not empty before applying the condition
            //         //     if (!empty($clientIds)) {
            //         //         $query->where(['Clients.id IN' => $clientIds]);
            //         //     } else {
            //         //         // Handle the case where there are no client IDs
            //         //         $query->where(['Clients.id' => null]); // This will return no results
            //         //     }
            //         // }
            //         elseif ($userRole === 'accountant') {
            //             $query->matching('Reservations', function ($query) {
            //                 return $query
            //                     ->where(['Reservations.downpayment_paid' => 1])
            //                     ->where(['Reservations.rec_state <>' => 17])
            //                     ->where(function (QueryExpression $exp, Query $q) {
            //                         return $exp->equalFields('Reservations.client_id', 'Clients.id');
            //                     });
            //             });
            //         } elseif ($userRole === 'aftersale') {
            //             $query->matching('Clients', function ($query) {
            //                 return $query
            //                     ->where(['Clients.downpayment_paid' => 14])
            //                     ->where(['Reservations.rec_state <>' => 17])
            //                     ->where(['Reservations.client_id = Clients.id']);
            //             });

            //             $query->where(function ($exp, $query) {
            //                 return $exp->in('rec_state', [14, 15]);
            //             });
            //         }

            //     }








            // LIST
            if (!empty($_list)) {
                $userRole = $this->authUser['user_role'];

                $query = $this->Clients->find()
                    ->contain([
                        "ClientSpecs",
                        'PoolCategories',
                        'Reports' => [
                            'TypeCategories',
                            'User',
                            'Property' => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']]
                        ],
                        'TagCategories',
                        'Categories',
                        'Offers',
                        'ClientSpecs.Currency',
                        'Reminders',
                        'Sources',
                        'Users',
                        'Users',
                        'Users',
                        'Users',
                        "UserClient.Users" => ['fields' => ['user_fullname', 'id']],
                        "UserClient",
                        "Books",
                        "Offers" => [
                                'PropertyRef' => ['fields' => ['property_title', 'property_ref', 'id']]
                            ],
                        "Actions",
                        "Reservations" => [
                            'Property' => ['fields' => ['property_title', 'property_ref', 'developer_id', 'seller_id', 'project_id', 'id']],
                            'Project' => ['fields' => ['project_ref', 'id']],
                            'Seller' => ['fields' => ['seller_name', 'id']],
                            'Developer' => ['fields' => ['dev_name', 'id']],
                            'Pmscategory' => ['fields' => ['category_name', 'id']],
                            'Payment',
                            'Currency'
                        ]
                    ])
                    ->leftJoinWith('Reminders')
                    ->leftJoinWith('Reports')
                    ->order([
                        // 'Reminders.reminder_nextcall' => 'ASC',  // today call list
                        'Clients.client_priority' => 'DESC',      // priority
                        'Clients.client_budget' => 'DESC',   // budget
                        'Clients.stat_created' => 'DESC',        // created
                        'Reports.stat_created' => 'DESC'         // last note date
                    ])
                    ->where([$conditions])
                    ->group('Clients.id');

                $lastLoginDate = $this->authUser['stat_lastlogin'];

                function getClientIds($query)
                {
                    $results = $query->toArray();
                    $clientIds = [];
                    foreach ($results as $result) {
                        $clientIds[] = $result->client_id ?? $result->id;
                    }
                    return $clientIds;
                }

                if ($userRole != 'admin.root' && $userRole != 'admin.admin') {
                    $userId = $this->authUser['id'];

                    // Filter by pool_id if provided
                    if (!empty($dt['search']['pool_id'])) {


                        $selectedPoolId = $dt['search']['pool_id'];
                        // dd($selectedPoolId);
                        $selectedPoolIds = $this->Clients->find()
                            ->select(['id'])
                            ->where(['pool_id' => $selectedPoolId])
                            ->extract('id')
                            ->toArray();

                        // dd($selectedPoolIds);
                        // Use client IDs of selectedMember if provided
                        $query->where(['Clients.id IN' => $selectedPoolIds]);
                    }


                    // If selectedMember is provided, get their client IDs
                    elseif (isset($dt['search']['selectedMember']) && !empty($dt['search']['selectedMember'])) {
                        $selectedMemberId = $dt['search']['selectedMember'];
                        $selectedMemberClientIds = $this->Clients->UserClient->find()
                            ->select(['client_id'])
                            ->where(['user_id' => $selectedMemberId])
                            ->extract('client_id')
                            ->toArray();

                        // Use client IDs of selectedMember if provided
                        $query->where(['Clients.id IN' => $selectedMemberClientIds]);
                    } elseif ($userRole === 'admin.accountant') {
                        $query->matching('Reservations', function ($query) {
                            return $query
                                ->where(['Reservations.downpayment_paid' => 1])
                                ->where(['Reservations.rec_state <>' => 17])
                                ->where(function (QueryExpression $exp, Query $q) {
                                    return $exp->equalFields('Reservations.client_id', 'Clients.id');
                                });
                        });
                    } elseif ($userRole === 'admin.aftersale') {
                        $query->matching('Clients', function ($query) {
                            return $query
                                ->where(['Clients.downpayment_paid' => 14])
                                ->where(['Reservations.rec_state <>' => 17])
                                ->where(['Reservations.client_id = Clients.id']);
                        });

                        $query->where(function ($exp, $query) {
                            return $exp->in('rec_state', [14, 15]);
                        });
                    } else {

                        $clientIdsQuery = $this->Clients->UserClient->find()
                            ->select(['client_id'])
                            ->where(['user_id' => $userId])
                            ->extract('client_id')
                            ->toArray();

                        if (!empty($clientIdsQuery)) {
                            $query->where(['Clients.id IN' => $clientIdsQuery]);
                        } else {
                            // Handle case where there are no client IDs
                            $query->where(['Clients.id' => null]); // This will return no results
                        }
                    }

                }


                if ($_pid == 'invoice-not-send') {
                    $thresholdDate = date('Y-m-d H:i:s', strtotime('-15 days'));
                    $query->where(function ($exp, $q) use ($thresholdDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->select(['client_id'])
                                ->where([
                                    'Clients.id = Reservations.client_id',
                                    'stat_created <' => $thresholdDate,
                                    'reservation_isinvoice_sent' => 0,
                                ])
                        );
                    });
                } elseif (in_array($_pid, ['new-sold', 'new-reserved'])) {
                    $recState = ($_pid == 'new-sold') ? 15 : 12;
                    $query->where(function ($exp, $q) use ($recState, $lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->select(['client_id'])
                                ->where([
                                    'rec_state' => $recState,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Reservations.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'reallocate') {
                    $query->where(function ($exp, $q) {
                        return $exp->exists(
                            $this->Clients->UserClient->find()
                                ->select(['client_id'])
                                ->where([
                                    'rec_state' => 2,
                                    'Clients.id = UserClient.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'assign') {
                    $query->where(function ($exp, $q) use ($userId, $lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->UserClient->find()
                                ->select(['client_id'])
                                ->where([
                                    'user_id' => $userId,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = UserClient.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'downpayment') {
                    $query->where(function ($exp, $q) use ($lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->where([
                                    'rec_state' => 13,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Reservations.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'cancelled') {
                    $query->where(function ($exp, $q) use ($lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->where([
                                    'rec_state' => 17,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Reservations.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'newsold') {
                    $query->where(function ($exp, $q) use ($lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->where([
                                    'rec_state' => 14,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Reservations.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'comission') {
                    $query->where(function ($exp, $q) use ($lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Reservations->find()
                                ->where([
                                    'is_commision_collacted' => 1,
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Reservations.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'booked') {
                    $query->where(function ($exp, $q) use ($lastLoginDate) {
                        return $exp->exists(
                            $this->Clients->Books->find()
                                ->where([
                                    'stat_created >' => $lastLoginDate,
                                    'Clients.id = Books.client_id'
                                ])
                        );
                    });
                } elseif ($_pid == 'edit') {
                    $LogsTable = $this->getTableLocator()->get('Logs');
                    $logs = $LogsTable
                        ->find()
                        ->where([
                            'log_url LIKE' => '%"Clients","update"%',
                            'stat_created >' => $lastLoginDate,
                        ])
                        ->order(['stat_created' => 'DESC'])
                        ->toArray();

                    $clientsIds = [];

                    foreach ($logs as $log) {
                        $logChanges = json_decode($log->log_changes, true);
                        $emailChanged = isset($logChanges['before']['client_email']) && isset($logChanges['after']['client_email']) && $logChanges['before']['client_email'] !== $logChanges['after']['client_email'];
                        $phoneChanged = isset($logChanges['before']['client_phone']) && isset($logChanges['after']['client_phone']) && $logChanges['before']['client_phone'] !== $logChanges['after']['client_phone'];

                        $logArray = json_decode($log->log_url, true);

                        if ($emailChanged || $phoneChanged) {
                            $clientsIds[] = isset($logArray[7]) ? $logArray[7] : '';
                        }

                    }

                    $query->where(['Clients.id IN' => $clientsIds]);

                } elseif (is_numeric($_pid) && $_pid > 0) {

                    $query = $this->Clients
                        ->find()
                        ->where([
                            'rec_state' => 1
                        ]);

                } elseif (is_numeric($_pid) && $_pid > 17) {
                    $query->where(function ($exp, $q) use ($_pid) {
                        return $exp->exists(
                            $this->Clients->Actions->find()
                                ->where([
                                    'user_id' => $_pid,
                                    'client_id = Clients.id'
                                ])
                        );
                    });
                }





                $data = $this->paginate($query, ['limit' => 50]);


                $categoryOptions = $this->Clients->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category_name'])->toArray();




                echo json_encode(
                    [
                        "status" => "SUCCESS",
                        "data" => $this->Do->convertJson($data),
                        "paging" => $this->request->getAttribute('paging')['Clients'],
                        "categories" => $categoryOptions
                    ],
                    JSON_UNESCAPED_UNICODE
                );
                die();
            }

        }
    }
    public function getClientEmailOrPhoneChanges()
    {


        $lastLoginDate = $this->authUser['stat_lastlogin'];

        $LogsTable = $this->getTableLocator()->get('Logs');
        $logs = $LogsTable
            ->find()
            ->where([
                'log_url LIKE' => '%"Clients","update"%',
                'stat_created >' => $lastLoginDate,
            ])
            ->order(['stat_created' => 'DESC'])
            ->toArray();


        $notificationsemailPhone = [];
        $notificationsemailPhoneCount = 0;

        foreach ($logs as $log) {


            $logChanges = json_decode($log->log_changes, true);




            $emailChanged = isset($logChanges['before']['client_email']) && isset($logChanges['after']['client_email']) && $logChanges['before']['client_email'] !== $logChanges['after']['client_email'];
            $phoneChanged = isset($logChanges['before']['client_phone']) && isset($logChanges['after']['client_phone']) && $logChanges['before']['client_phone'] !== $logChanges['after']['client_phone'];

            if ($emailChanged || $phoneChanged) {
                $notification = [
                    'log_id' => $log->id,
                    'client_id' => json_decode($log->log_url)[3],
                    'stat_created' => $log->stat_created,
                    'changes' => []
                ];

                if ($emailChanged) {
                    $notification['changes'][] = "Email changed from {$logChanges['before']['client_email']} to {$logChanges['after']['client_email']}";
                }
                if ($phoneChanged) {
                    $notification['changes'][] = "Phone changed from {$logChanges['before']['client_phone']} to {$logChanges['after']['client_phone']}";
                }

                $notificationsemailPhone[] = $notification;
                $notificationsemailPhoneCount++;
            }
        }

        echo json_encode([
            "status" => "SUCCESS",
            "msg" => __("success"),
            "data" => [
                'notificationsemailPhone' => $notificationsemailPhone,
                'notificationsemailPhoneCount' => $notificationsemailPhoneCount
            ]
        ]);
        die();
    }

    // public function getClientChanges()
    // {
    //     $LogsTable = $this->getTableLocator()->get('Logs');
    //     $logs = $LogsTable
    //         ->find()
    //         ->where([
    //             'log_url LIKE' => '%"Clients"%',
    //         ])
    //         ->order(['stat_created' => 'DESC'])
    //         ->toArray();

    //     $notifications = [];

    //     foreach ($logs as $log) {
    //         $logChanges = json_decode($log->log_changes, true);

    //         if (!is_array($logChanges) || !isset($logChanges['before']) || !isset($logChanges['after'])) {
    //             continue;
    //         }

    //         $changes = [];

    //         foreach ($logChanges['before'] as $field => $beforeValue) {
    //             if (isset($logChanges['after'][$field]) && $logChanges['after'][$field] !== $beforeValue) {
    //                 // Check if $field is a string before calling ucfirst
    //                 if (is_string($field)) {
    //                     $changes[] = ucfirst($field) . " changed from {$beforeValue} to {$logChanges['after'][$field]}";
    //                 } else {
    //                     // Handle non-string $field appropriately if needed
    //                     $changes[] = "Field {$field} changed from {$beforeValue} to {$logChanges['after'][$field]}";
    //                 }
    //             }
    //         }

    //         if (!empty($changes)) {
    //             $logArray = json_decode($log->log_url, true);

    //             $notification = [
    //                 'log_id' => $log->id,
    //                 'client_id' => isset($logArray[7]) ? $logArray[7] : '',
    //                 'stat_created' => $log->stat_created,
    //                 'changes' => $changes
    //             ];

    //             $notifications[] = $notification;
    //         }
    //     }

    //     echo json_encode([
    //         "status" => "SUCCESS",
    //         "msg" => __("success"),
    //         "data" => [
    //             'notifications' => $notifications,
    //         ]
    //     ]);
    //     die();
    // } this is for later, this is for getting client history


    public function view($id = null)
    {


        $rec = $this->Clients->get($id);


        // $rec = $this->Clients->find('list', ['keyField' => 'id'])->where(['rec_state' => $id])->toArray();
        // dd($ids);
        // dd($rec);



        $this->set(compact('rec'));
    }

    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);

        // Edit mode
        if ($this->request->is(['patch', 'put'])) {


            $rec = $this->Clients->get($dt['id'], [
                'contain' => ['ClientSpecs']
            ]);
            // dd($dt['client_specs']);
            // debug($dt['adrscountry'][0]['value']);
            if (isset($dt['client_specs'])) {
                $saleSpecs = $dt['client_specs'];

               
                // debug($dt['adrscountry'][0]['value']);
                foreach ($saleSpecs as &$saleSpec) {
                    if (isset($saleSpec['clientspec_propertytype'])) {
                        $saleSpec['clientspec_propertytype'] = json_encode($saleSpec['clientspec_propertytype']);
                    }
                    if (isset($saleSpec['clientspec_beds'])) {
                        $saleSpec['clientspec_beds'] = json_encode($saleSpec['clientspec_beds']);
                    }
                    // if (isset($saleSpec['clientspec_loction_target'])) {
                    //     $saleSpec['clientspec_loction_target'] = json_encode($saleSpec['clientspec_loction_target']);
                    // }

                    // debug($saleSpecs);
                    if (isset($saleSpec['clientspec_target_city'])) {
                        $saleSpec['clientspec_target_city'] = json_encode($saleSpec['clientspec_target_city']);
                    } 
                    
                    // dd($saleSpec['clientspec_target_country']);
                    if (isset($saleSpec['clientspec_target_country'])) {
                        $saleSpec['clientspec_target_country'] = json_encode($saleSpec['clientspec_target_country']);
                    }
                    if (isset($saleSpec['clientspec_target_region'])) {
                        $saleSpec['clientspec_target_region'] = json_encode($saleSpec['clientspec_target_region']);
                    }
                    // targetCountry


                }

                // debug($dt['adrscountry'][0]['value']);
                $dt['client_specs'] = $saleSpecs;

                // dd($dt['client_specs'] );
            }


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
            unset($dt['country']);
            $rec = $this->Clients->patchEntity($rec, $dt);

            // debug($dt['adrscountry'][0]['value']);
            if (isset($dt['adrscountry'])) {


                $rec->adrs_country = $dt['adrscountry'][0]['value'];

            }


            if (isset($dt['pool'])) {
                $rec->pool_id = $dt['pool'][0]['value'];
            }

            if (isset($dt['pool'])) {

                $UserClientTable = $this->getTableLocator()->get('UserClient');

                $deleteConditions = ['client_id' => $dt['client_id'], 'user_id' => $dt['user_id']];

                $UserClientTable->deleteAll($deleteConditions);

            }

            if (empty($dt['rec_state'])) {
                $rec->rec_state = 1;
            }

        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['client_current_stage'] = 2;
            $dt['client_priority'] = 1;
            if (!(isset($dt['category_id']))) {
                $dt['category_id'] = 279;
            }

            // Remove spaces and symbols from the number
            if (isset($dt['client_mobile'])) {
                $clientMobile = preg_replace("/[^0-9]/", "", $dt['client_mobile']);
                $dt['client_mobile'] = $clientMobile;
            }

            if (isset($dt['client_phone'])) {
                $clientPhone = preg_replace("/[^0-9]/", "", $dt['client_phone']);
                $dt['client_phone'] = $clientPhone;
            }

            unset($dt['country']);
            $rec = $this->Clients->newEntity($dt);
            if (isset($dt['adrscountry'])) {
                $rec->adrs_country = $dt['adrscountry'][0]['value'];
            }

            $existingClient = $this->Clients->find()
                ->where(['client_email' => $dt['client_email']])
                ->first();


            if ($existingClient) {
                $EnquiresTable = $this->getTableLocator()->get('Enquires');
                $enquireData = [
                    'client_id' => $existingClient->id,
                    'enquiry_name' => $existingClient->client_name,
                    'enquiry_email' => $existingClient->client_email,
                    'enquiry_phone' => $existingClient->client_mobile,
                    'enquiry_country' => $rec->adrs_country,
                    'enquiry_ipaddress' => $this->request->clientIp(),
                    'stat_created' => date('Y-m-d H:i:s')
                ];

                $enquireEntity = $EnquiresTable->newEntity($enquireData);



                if ($EnquiresTable->save($enquireEntity)) {
                    echo json_encode(["status" => "EMAIL_EXISTS", "enquire_id" => $enquireEntity->id]);
                    die();
                } else {
                    echo json_encode(["status" => "FAIL", "data" => $enquireEntity->getErrors()]);
                    die();
                }
            }


        }


        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->autoRender = false;
            // unset($rec['source']);
            // debug($rec);
            unset($dt['country']);
            unset($dt['slug']);
            unset($rec['reports']);
            unset($rec['category']);
            unset($rec['reminders']);
            unset($rec['pool_category']);
            unset($rec['tag_category']);
            unset($rec['book']);
            unset($rec['source']);
            unset($rec['offers']);
            unset($rec['user_sale']);
            unset($rec['enquires']);
            unset($rec['actions']);
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

    public function getTeamMembers()
    {

        $userId = $this->authUser['id'];



        if (isset($userId)) {

            $teamMembers = $this->Clients->Users->find()
                ->select(['id', 'user_fullname'])
                ->where(['parent_id' => $userId])
                ->toArray();

            echo json_encode([
                'status' => 'SUCCESS',
                'data' => $teamMembers,
                '_serialize' => ['status', 'data']
            ]);
            die();
        } else {

            echo json_encode([
                'status' => 'ERROR',
                'data' => [],
                '_serialize' => ['status', 'data']
            ]);
            die();
        }
    }

    public function pools()
    {
        $this->autoRender = false; // Disable automatic rendering

        $userId = $this->authUser['id'];
        $poolData = TableRegistry::getTableLocator()->get('UserPool');

        // Fetch pool ids
        $poolIds = $poolData->find()
            ->select(['pool_id'])
            ->where(['user_id' => $userId])
            ->toArray();

        $categories = [];
        foreach ($poolIds as $poolId) {
            $category = $this->Clients->Categories->find()
                ->select(['category_name', 'id'])
                ->where(['id' => $poolId->pool_id])
                ->first();

            if ($category) {
                $categories[] = [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                ];
            }
        }


        $latestActions75 = $this->Clients->Actions->find()
            ->select(['client_id', 'action_type', 'stat_created'])
            ->where(['action_type' => 75])
            ->order(['id' => 'DESC'])
            ->toArray();

        $clientAction75 = [];
        foreach ($latestActions75 as $action) {
            $clientAction75[$action->client_id][] = $action->action_type;
            $clientAction75[$action->client_id][] = $action->stat_created;
        }

        $latestActions76 = $this->Clients->Actions->find()
            ->select(['client_id', 'action_type', 'stat_created', 'id'])
            ->where(['action_type' => 76])
            ->order(['id' => 'DESC'])
            ->toArray();

        $clientAction76 = [];
        foreach ($latestActions76 as $action) {
            $clientAction76[$action->client_id][] = $action->action_type;
            $clientAction76[$action->client_id][] = $action->stat_created;
            $clientAction76[$action->client_id][] = $action->id;
        }

        // Previous call list
        $prevclientResults = [];
        $lastLoginDate = $this->authUser['stat_lastlogin'];

        $query = $this->Clients->Reminders->find()
            ->select(['client_id'])
            ->where([
                'user_id' => $userId,
                'reminder_nextcall <' => $lastLoginDate
            ])
            ->order(['reminder_nextcall' => 'DESC']);

        $results = $query->all();
        $clientIds = [];
        foreach ($results as $result) {
            $clientIds[] = $result->client_id;
        }

        if (!empty($clientIds)) {
            $clientQuery = $this->Clients->find()
                ->select(['id', 'client_name'])
                ->where(['Clients.id IN' => $clientIds]);

            $prevclientResults = $clientQuery->all();
        }

        // Future call list
        $futureclientResults = [];
        $query = $this->Clients->Reminders->find()
            ->select(['client_id'])
            ->where([
                'user_id' => $userId,
                'reminder_nextcall >' => $lastLoginDate
            ])
            ->order(['reminder_nextcall' => 'DESC']);

        $results = $query->all();
        $clientIds = [];
        foreach ($results as $result) {
            $clientIds[] = $result->client_id;
        }

        if (!empty($clientIds)) {
            $clientQuery = $this->Clients->find()
                ->select(['id', 'client_name'])
                ->where(['Clients.id IN' => $clientIds]);

            $futureclientResults = $clientQuery->all();
        }

        // $twoDaysAgo = (new DateTime())->modify('-2 days')->format('Y-m-d H:i:s');
        $lastLoginDate = $this->authUser['stat_lastlogin'];

        // Recent clients created in the last two days
        $recentClientsQuery = $this->Clients->find()
            ->select(['id', 'client_name', 'stat_created'])
            ->where(['stat_created >' => $lastLoginDate]);

        $recentClients = $recentClientsQuery->all();

        // Create and return the response
        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode([
                'status' => 'SUCCESS',
                'msg' => __('success'),
                'data' => [
                    'categories' => $categories,
                    'latestActions75' => $latestActions75,
                    'clientAction75' => $clientAction75,
                    'clientAction76' => $clientAction76,
                    'prevclientResults' => $prevclientResults,
                    'futureclientResults' => $futureclientResults,
                    'recentClients' => $recentClients,
                ],
            ]));

        return $response;
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
                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserClient.user_id' => $userId
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

            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';

            if ($starterDate && $endDate) {
                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserClient.user_id' => $userId
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

                // dd($filteredClientIds);

                if (empty($filteredClientIds)) {
                    $filteredClientIds[] = 0;
                    // echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
                    die();
                }

                $clientIds = $filteredClientIds;
            }

            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';

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

        // If $clientIds empty return 0
        if (empty($clientIds)) {
            echo json_encode(["status" => "ERROR", "msg" => __("No clients found in the specified date range")]);
            die();
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


        $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
        $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';

        // $userData = TableRegistry::getTableLocator()->get('Users');
        $userField = $this->Clients->Users->find()
            ->select(['id', 'user_fullname'])
            ->distinct(['user_fullname'])
            ->where(['user_role' => 'admin.callcenter'])
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
        // dd($starterDate);
        if ($endDate) {


            foreach ($userField as $userClient) {

                $userSaleData = $this->getDateUserSaleData($userClient, $starterDate, $endDate);

                $pointDataset2['data'][] = $this->getClientCount($userSaleData);

                $pointDataset1['data'][] = $this->getTotalReservationCount($userSaleData);

                $barDataset['data'][] = $this->getTotalPrice($userSaleData);

                $pointDataset3['data'][] = $this->getTotalBooksCount($userSaleData);

                $barDataset1['data'][] = $this->getTotalComission($userSaleData);

            }
        } else {
            foreach ($userField as $userClient) {
                $userSaleData = $this->getUserSaleData($userClient);

                $pointDataset1['data'][] = $this->getTotalReservationCount($userSaleData);

                $pointDataset2['data'][] = count($userSaleData);

                $barDataset['data'][] = $this->getTotalPrice($userSaleData);

                $pointDataset3['data'][] = $this->getTotalBooksCount($userSaleData);

                $barDataset1['data'][] = $this->getTotalComission($userSaleData);
                // dd($barDataset1['data']);
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





        // //Sale by client advisor chart-------------------
        $userCC = $this->Clients->Users->find()
            ->select(['id', 'user_fullname'])
            ->distinct(['user_fullname'])
            ->where(['user_role' => 'admin.callcenter'])
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
        if ($endDate) {


            foreach ($userField as $userClient) {

                $userSaleData = $this->getDateUserSaleData($userClient, $starterDate, $endDate);

                $pointDataset2['data2'][] = $this->getClientCount($userSaleData);

                $pointDataset1['data2'][] = $this->getTotalReservationCount($userSaleData);

                $barDataset['data2'][] = $this->getTotalPrice($userSaleData);

                $pointDataset3['data2'][] = $this->getTotalBooksCount($userSaleData);

                $barDataset1['data2'][] = $this->getTotalComission($userSaleData);

            }
        } else {
            foreach ($userField as $userClient) {
                $userSaleData = $this->getUserSaleData($userClient);

                $pointDataset1['data2'][] = $this->getTotalReservationCount($userSaleData);

                $pointDataset2['data2'][] = count($userSaleData);

                $barDataset['data2'][] = $this->getTotalPrice($userSaleData);

                $pointDataset3['data2'][] = $this->getTotalBooksCount($userSaleData);

                $barDataset1['data2'][] = $this->getTotalComission($userSaleData);
                // dd($barDataset1['data']);
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
        // dd($data2['datasets'][0]);
        // Veri setlerini birleştir
        $combinedData = array_combine($data2['labels'], $data2['datasets'][0]['data2']);

        // Veri setlerini sırala
        asort($combinedData);

        // Sıralanmış veri setlerini ve etiketleri ayır
        $sortedDatasets = array_values($combinedData);
        $sortedLabels = array_keys($combinedData);

        // Yeniden oluşturulmuş veri setini güncelle
        $data2['datasets'][0]['data'] = $sortedDatasets;
        $data2['labels'] = $sortedLabels;
        // "Sold Units" veri seti için sıralama
        $combinedDataSoldUnits = array_combine($data2['labels'], $data2['datasets'][2]['data2']);
        asort($combinedDataSoldUnits);
        $data2['datasets'][2]['data'] = array_values($combinedDataSoldUnits);

        // "Clients" veri seti için sıralama
        $combinedDataClients = array_combine($data2['labels'], $data2['datasets'][3]['data2']);
        asort($combinedDataClients);
        $data2['datasets'][3]['data'] = array_values($combinedDataClients);

        // "Booked" veri seti için sıralama
        $combinedDataBooked = array_combine($data2['labels'], $data2['datasets'][4]['data2']);
        asort($combinedDataBooked);
        $data2['datasets'][4]['data'] = array_values($combinedDataBooked);

        // "Commission (USD)" veri seti için sıralama
        $combinedDataCommissionUSD = array_combine($data2['labels'], $data2['datasets'][1]['data2']);
        asort($combinedDataCommissionUSD);
        $data2['datasets'][1]['data'] = array_values($combinedDataCommissionUSD);





        //Booking by role chart-------------------
        $user_role = $this->request->getData('user_role');
        $user_role = $user_role ?? '';




        $user_roles = ['admin.callcenter'];
        $userBookrole = $this->Clients->Users->find()
            ->select(['id', 'user_fullname', 'user_role'])
            ->distinct(['user_fullname'])
            ->where(['user_role IN' => $user_roles])
            ->toArray();

        // dd($userBookrole);
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
                $userSaleData = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'UserClient.user_id' => $userClient->id,
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
                $datasetIndex = ($userClient->user_role == 'admin.callcenter') ? 0 : 1;
                $barDataset['datasets'][$datasetIndex]['backgroundColor'][] = ($userClient->user_role == 'admin.callcenter') ? '#1565c0' : '#e8534f';

                $barDataset['datasets'][$datasetIndex]['data'][] = $totalBooksCount;
            }
        } else {
            foreach ($userBookrole as $userClient) {
                $userSaleData = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where(['UserClient.user_id' => $userClient->id])
                    ->toArray();

                $totalBooksCount = 0;

                foreach ($userSaleData as $userSale) {
                    $booksCount = $this->Clients->Books->find()
                        ->where(['client_id' => $userSale->client_id])
                        ->count();

                    $totalBooksCount += $booksCount;
                }

                // Kullanıcının user_role bilgisine göre renk belirle
                $datasetIndex = ($userClient->user_role == 'admin.callcenter') ? 0 : 1;
                $barDataset['datasets'][$datasetIndex]['backgroundColor'][] = ($userClient->user_role == 'admin.callcenter') ? '#1565c0' : '#e8534f';

                $barDataset['datasets'][$datasetIndex]['data'][] = $totalBooksCount;
            }
        }

        $data3['datasets'] = $barDataset['datasets'];



        // //SOURCE chart-------------------
        $sourceData = $this->Clients->find()
            ->select(['source_id', 'count' => 'COUNT(*)'])
            ->where(['source_id'])
            ->group(['source_id'])
            ->toArray();

        // dd($sourceData);
        $labels = [];
        $dataPoints = [];
        $catTable = TableRegistry::getTableLocator()->get('Categories');
        // $this->Clients->Reservation

        foreach ($sourceData as $source) {
            $categoryId = $source->source_id;




            if ($categoryId !== null) {
                $category = $catTable->get($categoryId, ['fields' => ['id', 'category_name']]);

                $labels[] = $category->category_name;

                // Karşılık gelen client_id'lerin reservations tablosundaki reservation_usdprice toplamını al
                $totalPrice = $this->Clients->Reservations->find()
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
                $totalPrice = $this->Clients->Reservations->find()
                    ->select(['totalPrice' => 'SUM(reservation_usdprice)'])
                    ->first();

                $dataPoints[] = $totalPrice->totalPrice ?? 0;
            }
        }

        // Toplam reservation_usdprice'ın yüzdeliğini hesapla
        if (!empty($dataPoints)) {
            $totalSum = array_sum($dataPoints);
            if ($totalSum != 0) {
                $percentageArray = array_map(function ($value) use ($totalSum) {
                    return '(' . number_format(($value / $totalSum) * 100, 2) . '%)';
                }, $dataPoints);


            } else {
                // dd(1);
            }
        } else {
            // $dataPoints dizisi boş olduğunda yapılacak işlem
        }

        // Parantez içinde yüzdelikleri ekle
        if (!is_null($percentageArray)) {
            $labels = array_map(function ($label, $percentage) {
                return $label . ' ' . $percentage;
            }, $labels, $percentageArray);


        } else {
            // $percentageArray dizisi boş veya null ise, buna göre bir işlem yapılabilir.
        }
        // dd($dataPoints);
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




        // //property type chart
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
            // dd(array_values(array_column($recStateClients, 'adrs_country')));
            // Get localized category names
            $pmsaddress = $this->Do->lcl(
                $this->Clients->Adrscountry->find('list', ['keyField' => 'id', 'valueField' => 'adrs_name'])
                    ->where(['id IN' => array_values(array_column($recStateClients, 'adrs_country'))])
                    ->toArray()
            );

            foreach ($recStateClients as $recStateClient) {
                $adrsCountry = $recStateClient->adrs_country;
                $adrsCountry = $adrsCountry ?? 'Unknown';
                $adrsName = isset($pmsaddress[$adrsCountry]) ? $pmsaddress[$adrsCountry] : 'Unknown';

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


        // //client advisor table
        $ccUsers = $this->Clients->Users->find()
            ->where(['user_role' => 'admin.callcenter'])
            ->toArray();

        $userBookCounts = [];
        $userReservationCounts = [];
        $userReservationsaleCounts = [];
        $userTotalUSDPriceCounts = [];
        $userReservationSaleRatios = [];

        foreach ($ccUsers as $user) {
            if ($starterDate && $endDate) {
                $userSales = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'user_id' => $user->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

            } else {
                $userSales = $this->Clients->UserClient->find()
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
        // //admin.portfolio advisor table
        $fieldUsers = $this->Clients->Users->find()
            ->where(['user_role' => 'admin.portfolio'])
            ->toArray();

        $userfieldBookCounts = [];
        $userfieldReservationCounts = [];
        $userfieldReservationsaleCounts = [];
        $userfieldTotalUSDPriceCounts = [];
        $userfieldReservationSaleRatios = [];

        foreach ($fieldUsers as $user) {
            if ($starterDate && $endDate) {
                $userSales = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'user_id' => $user->id,
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate
                    ])
                    ->toArray();

            } else {
                $userSales = $this->Clients->UserClient->find()
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
        // dd($data3);


        $keysToCheck = [
            'data',
            'data2',
            'data3',
            'data4',
            'sourceDoughnutData',
            'data6',
            'propertyPieData',
            'developerTotals',
            'projectTotals',
            'clientBookCounts',
            'totalsoldCount',
            'totalonlineCount',
            'totalcancelCount',
            'totalUSDPrice',
            'totalUSDcommission',
            'downpaymentCount',
            'percentageRate',
            'ccUsers',
            'userBookCounts',
            'userReservationCounts',
            'userReservationsaleCounts',
            'userTotalUSDPriceCounts',
            'fieldUsers',
            'userfieldBookCounts',
            'userfieldReservationCounts',
            'userfieldReservationsaleCounts',
            'userfieldTotalUSDPriceCounts',
            'userReservationSaleRatios',
            'userfieldReservationSaleRatios',
        ];

        foreach ($keysToCheck as $key) {
            if (empty($$key) || $$key === 'Unknown') {
                $$key = 0;
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
                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserClient.user_id' => $userId
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



            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';


            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserClient.user_id' => $userId
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






            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';


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
        $users = $this->Clients->Users->find()
            ->select(['id', 'user_fullname'])
            ->toArray();

        $userDataFilter = $this->request->getData('user_id');

 


        if ($isAdmin && $userDataFilter) {
            // dd($userDataFilter);
            $filterUserData =  $userDataFilter[0]['value'];
            // dd($filterUserData[0]['value']);
            // $filterUserData = $filterUserData ?? '';

            // dd($filterUserData[0]['value']);
            $userSaleData = $this->Clients->UserClient->find()
                ->select(['client_id'])
                ->where(['UserClient.user_id' => $filterUserData])
                ->toArray();

            $clientIds = [];
            foreach ($userSaleData as $userSale) {
                $clientIds[] = $userSale->client_id;
            }


        } elseif ($isAdmin) {
            $clientIds = $this->Clients->find()->select(['id']);
        } else {

            $userSaleData = $this->Clients->UserClient->find()
                ->select(['client_id'])
                ->where(['UserClient.user_id' => $userId])
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
                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $firstDate,
                        'stat_created <=' => $finishDate,
                        'UserClient.user_id' => $userId
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



            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';


            if ($starterDate && $endDate) {

                $clientQuery = $this->Clients->UserClient->find()
                    ->select(['client_id'])
                    ->where([
                        'stat_created >=' => $starterDate,
                        'stat_created <=' => $endDate,
                        'UserClient.user_id' => $userId
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





            $starterDate = !empty($_GET['startDate']) ? $_GET['startDate'] : '';
            $endDate = !empty($_GET['endDate']) ? $_GET['endDate'] : '';


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


        if ($clientCount != 0) {
            $recStateClientsCount = $this->Clients->find()
                ->where(['rec_state' => $recState, 'id IN' => $clientIds])
                ->count();

            $recStateRatio = number_format(($recStateClientsCount / $clientCount) * 100);
        } else {

            $recStateRatio = 0;
        }


        $recStateList = $this->Do->lcl($this->Do->get('rec_stateSale.3'));

        $selectedRecStateName = isset($recStateList[$recState]) ? $recStateList[$recState] : '';




        $addressesTable = TableRegistry::getTableLocator()->get('Pmscategories');

        $groupedAddresses = $addressesTable->find()
            ->select(['id', 'category_name'])
            ->where(['parent_id' => 7])
            ->toArray();

        $clientCountries = $this->Clients->find()
            ->select(['adrs_country'])
            ->where(['id IN' => $clientIds])
            ->toArray();

        $groupedData = [];

        foreach ($groupedAddresses as $address) {
            $id = $address['id'];
            $groupedData[$id]['category_name'] = $address['category_name'];
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

                $client = $this->Clients->get($clientId, ['admin.portfolios' => ['adrs_country']]);

                $clientCountry = is_array($client->adrs_country) ? $client->adrs_country[0] : $client->adrs_country;

                if (!isset($clientCountriesCount[$clientCountry])) {
                    $clientCountriesCount[$clientCountry] = 0;
                }

                $clientCountriesCount[$clientCountry]++;
            }

        }

        $addressData = [];
        foreach ($clientCountriesCount as $country => $count) {
            $address = TableRegistry::getTableLocator()->get('Pmscategories')->find()->select(['id', 'category_name'])->where(['id' => $country])->first();

            if ($address && $address->category_name) {
                $addressData[] = [
                    'adrs_country' => $country,
                    'category_name' => $address->category_name,
                    'id' => $address->id,
                    'count' => $count,
                ];
            }
        }

        $usersCC = $this->Clients->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'user_fullname'
        ])->where(['user_role' => 'admin.callcenter'])->toArray();


        $dateFilter = [
            0 => 'All Time',
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
                'usersCC' => $usersCC,
                'filterUserData' => $userDataFilter,
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

        $this->autoRender = false;


        $isAdmin = $this->authUser['user_role'] === 'admin.admin' || $this->authUser['user_role'] === 'admin.root';
        $userId = $this->authUser['id'];

        $lastLoginDate = $this->authUser['stat_lastlogin'];


        if ($isAdmin) {

            $newClientsCount = $this->Clients
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();
            $newAssignCount = $this->Clients->UserClient
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newEnquiresCount = $this->Clients->Enquires
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newBookedCount = $this->Clients->Books
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'rec_state' => 14,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newCancelledCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'rec_state' => 17,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();


            $newDownPaymentCount = $this->Clients->Reservations
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

            $newSoldOnlineCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'rec_state' => 15,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReminderCount = $this->Clients->Reminders
                ->find()
                ->where([
                    'stat_created >' => $lastLoginDate
                ])
                ->count();


            $thresholdDate = date('Y-m-d H:i:s', strtotime('-15 days'));

            $invoiceSend = $this->Clients->Reservations->find()
                ->where([
                    'stat_created <' => $thresholdDate,
                    'stat_created >' => $lastLoginDate,
                    'reservation_isinvoice_sent' => 0,
                ])
                ->count();

            $commissionCollacted = $this->Clients->Reservations
                ->find()
                ->where([
                    'is_commision_collacted' => 1,
                    'stat_created >' => $lastLoginDate,

                ])
                ->count();


            $previousDateTime = date('Y-m-d H:i:s', strtotime('-24 hours'));


            // $clientsWithoutBudget = $this->Clients->find()
            //     ->select(['id', 'client_name'])
            //     ->where([
            //         'stat_created <=' => $previousDateTime,
            //         'client_budget IS NULL',
            //     ])
            //     ->toArray();

            // $clientsWithoutPriorty = $this->Clients->find()
            //     ->select(['id', 'client_name'])
            //     ->where([
            //         'stat_created <=' => $previousDateTime,
            //         'client_priority IS NULL',
            //     ])
            //     ->toArray();

            $clientsWithoutStatus = $this->Clients->find()
                ->select(['id', 'client_name'])
                ->where([
                    'stat_created <=' => $previousDateTime,
                    'rec_state = 1',
                ])
                ->toArray();

            $notProccesing = count($clientsWithoutStatus);

            $reallocationRecords = $this->Clients->UserClient
                ->find()
                ->where(['rec_state' => 2])
                ->count();


        } else {

            $userId = $this->authUser['id'];
            $clientIdsQuery = $this->Clients->UserClient
                ->find()
                ->where([
                    'user_id' => $userId
                ]);

            $clientIds = $clientIdsQuery->all()->extract('client_id')->toArray();

            $newClientsCount = $this->Clients->UserClient
                ->find()
                ->where([
                    'user_id' => $userId,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newAssignCount = $newClientsCount;

            $newEnquiresCount = $this->Clients->Enquires
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newBookedCount = $this->Clients->Books
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 14,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newCancelledCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 17,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newDownPaymentCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 13,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReservedCount = $this->Clients
                ->find()
                ->where([
                    'id IN' => $clientIds,
                    'rec_state' => 12,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newSoldOnlineCount = $this->Clients->Reservations
                ->find()
                ->where([
                    'client_id IN' => $clientIds,
                    'rec_state' => 15,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $newReminderCount = $this->Clients->Reminders
                ->find()
                ->where([
                    'user_id' => $userId,
                    'stat_created >' => $lastLoginDate
                ])
                ->count();

            $thresholdDate = date('Y-m-d H:i:s', strtotime('-15 days'));

            $invoiceSend = $this->Clients->Reservations
                ->find()
                ->where([
                    'stat_created <' => $thresholdDate,
                    'stat_created >' => $lastLoginDate,
                    'reservation_isinvoice_sent' => 0,
                ])
                ->count();

            // Sorguyu oluştur
            $commissionCollacted = $this->Clients->Reservations
                ->find()
                ->where([
                    'is_commision_collacted' => 1,
                    'stat_created >' => $lastLoginDate,

                ])
                ->count();

            $previousDateTime = date('Y-m-d H:i:s', strtotime('-24 hours'));

            // Clients tablosundaki verileri kontrol et
            // $clientsWithoutBudget = $this->Clients->find()
            //     ->select(['id', 'client_name'])
            //     ->where([
            //         'stat_created <=' => $previousDateTime,
            //         'client_budget IS NULL',
            //     ])
            //     ->toArray();


            // $clientsWithoutPriorty = $this->Clients->find()
            //     ->select(['id', 'client_name'])
            //     ->where([
            //         'stat_created <=' => $previousDateTime,
            //         'client_priority IS NULL',
            //     ])
            //     ->toArray();

            $clientsWithoutStatus = $this->Clients->find()
                ->select(['id', 'client_name'])
                ->where([
                    'stat_created <=' => $previousDateTime,
                    'rec_state = 1',
                ])
                ->toArray();

            $notProccesing = count($clientsWithoutStatus);

            $reallocationRecords = $this->Clients->UserClient
                ->find()
                ->where(['rec_state' => 2])
                ->count();
        }





        $newClientsCount = $newClientsCount ?? 0;
        $newAssignCount = $newAssignCount ?? 0;
        $newBookedCount = $newBookedCount ?? 0;
        $newSoldCount = $newSoldCount ?? 0;
        $newCancelledCount = $newCancelledCount ?? 0;
        $newDownPaymentCount = $newDownPaymentCount ?? 0;
        $newReservedCount = $newReservedCount ?? 0;
        $newSoldOnlineCount = $newSoldOnlineCount ?? 0;
        $newReminderCount = $newReminderCount ?? 0;
        $invoiceSend = $invoiceSend ?? 0;
        $commissionCollacted = $commissionCollacted ?? 0;
        $newEnquiresCount = $newEnquiresCount ?? 0;
        // $notProccesing = count($clientsWithoutStatus) ?? 0;
        $reallocationRecords = $reallocationRecords ?? 0;

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
                'invoiceSend' => $invoiceSend,
                'commissionCollacted' => $commissionCollacted,
                // 'clientsWithoutBudget' => $clientsWithoutBudget,
                // 'clientsWithoutPriorty' => $clientsWithoutPriorty,
                // 'clientsWithoutStatus' => $clientsWithoutStatus,
                'reallocationRecords' => $reallocationRecords,
                'user_id' => $userId,
                'newEnquiresCount' => $newEnquiresCount,
                'notProccesing' => $notProccesing,
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
