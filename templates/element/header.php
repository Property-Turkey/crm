<?php
$admin_menu = [
    [
        "name" => "Categories",
        "icon" => "list",
        "roles" => ["admin.root", "admin.admin", "admin.content"],
        "active" => "/categories/index,/categories/save,/categories/view",
        "sub" => [
            ["name" => "Source", "icon" => "sitemap", "url" => ["Categories", "index", "33"]],
            ["name" => "Categories Type", "icon" => "home", "url" => ["Categories", "index", "37"]],
            ["name" => "Report Type", "icon" => "sticky-note-o", "url" => ["Categories", "index", "53"]],
            ["name" => "Pools", "icon" => "folder-open-o", "url" => ["Categories", "index", "28"]],
            ["name" => "Tags", "icon" => "tag", "url" => ["Categories", "index", "40"]],
            ["name" => "Property Type", "icon" => "building-o", "url" => ["Categories", "index", "159"]],
            ["name" => "Payment Type", "icon" => "bank", "url" => ["Categories", "index", "198"]],
            ["name" => "Currency", "icon" => "dollar", "url" => ["Categories", "index", "186"]],
            ["name" => "Beds", "icon" => "bed", "url" => ["Categories", "index", "183"]],
            ["name" => "Social Style Model", "icon" => "list", "url" => ["Categories", "index", "178"]],
            ["name" => "Buyer Persona", "icon" => "list", "url" => ["Categories", "index", "170"]],
            ["name" => "Actions ", "icon" => "mobile-phone", "url" => ["Categories", "index", "73"]],
            ["name" => " Emphaty ", "icon" => "sticky-note", "url" => ["Categories", "index", "61"]],
        ]
    ],
    [
        "name" => "dashboard",
        "icon" => "tachometer",
        "roles" => ["admin.root", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content", "admin.cc", "cc", "field", "accountant", "aftersale", "admin.field"],
        "active" => "/clients/dashboard",
        "sub" => [
            ["name" => "all", "url" => ["clients", "dashboard", ""]],
        ],

    ],
    [
        "name" => "statistic",
        "icon" => "tachometer",
        "roles" => ["admin.root", "admin.admin"],
        "active" => "/clients/statistic",
        "sub" => [
            ["name" => "all", "url" => ["clients", "statistic", ""]],
        ],

    ],
    [
        "name" => "users",
        "icon" => "users",
        "roles" => ["admin.root", "admin.admin"],
        "active" => "/users/index,/users/save,/users/view",
        "sub" => [
            ["name" => "all", "url" => ["Users", "index", ""]],
        ]
    ],
    [
        "name" => "configs",
        "icon" => "cogs",
        "roles" => ["admin.root", "admin.admin"],
        "active" => "/configs/index,/configs/save,/configs/view",
        "sub" => [
            ["name" => "all", "url" => ["Configs", "index", ""]],
        ]
    ],
    [
        "name" => "logs",
        "icon" => "user-secret",
        "roles" => ["admin.root"],
        "active" => "/logs/index,/logs/save,/logs/view",
        "sub" => [
            ["name" => "all", "url" => ["Logs", "index", ""]],
        ]
    ],
    [
        "name" => "permissions",
        "icon" => "user-secret",
        "roles" => ["admin.root", "admin.admin"],
        "active" => "/permissions/index,/permissions/save,/permissions/view",
        "sub" => [
            ["name" => "all", "url" => ["permissions", "index", ""]],
        ]
    ],
    [
        "name" => "clients",
        "icon" => "user",
        "roles" => ["admin.root", "admin.portfolio", "teamleader", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content", "admin.cc", "cc", "field", "accountant", "aftersale", "admin.field"],
        "active" => "/clients/index,/clients/save,/clients/view",
        "sub" => [
            ["name" => "all", "url" => ["clients", "index", ""]],
        ],

    ],

];

$non_admin_menu = [
    [
        "name" => "my_account",
        "icon" => "user",
        "roles" => ["admin.root", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content", "admin.cc", "cc", "field", "accountant", "aftersale", "admin.field"],
        "active" => "/users/index,/users/save,/users/view",
        "sub" => [
            ["name" => "all", "url" => ["users", "myaccount", ""]],
        ]
    ],


];


$urlparse = explode("/", str_replace('/' . $currlang, '', str_replace($app_folder, '', $_SERVER['REQUEST_URI'])));
$urlparse[2] = empty($urlparse[2]) ? '' : $urlparse[2];
$urlparse[3] = empty($urlparse[3]) ? '' : $urlparse[3];
$urlparse[4] = empty($urlparse[4]) ? '' : $urlparse[4];
// debug($urlparse);
?>



<!-- Header Start -->
<style>
    .notification-container {
        position: relative;
        display: inline-block;
    }

    .notifications-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        min-width: 200px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .notifications-dropdown a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
        font-size: 12px !important;
        border-bottom: 1px solid #ddd;
    }

    .notifications-dropdown a:last-child {
        border-bottom: none;
        /* Son elemanın altındaki çizgiyi kaldır */
    }

    .notification-container:hover .notifications-dropdown {
        display: block;
    }

    .notification-icon {
        cursor: pointer;
    }
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid m-2">
        <a class="navbar-brand" href="#">
            <?= $this->Html->image('/img/pt-header-logo.svg', ['' => '']) ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            $currentController = $this->request->getParam('controller');
            $currentAction = $this->request->getParam('action');
            ?>

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('clients'),
                        ['controller' => 'Clients', 'action' => 'index'],
                        ['escape' => false, 'class' => 'nav-link' . ($currentController == 'Clients' && $currentAction == 'index' ? ' active' : '')]
                    ) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        __('dashboard'),
                        ['controller' => 'Clients', 'action' => 'dashboard'],
                        ['escape' => false, 'class' => 'nav-link' . ($currentController == 'Clients' && $currentAction == 'dashboard' ? ' active' : '')]
                    ) ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>


            <div class="nav-btns">

                <div class="notification-container">
                    <a href="#">
                        <div class="notification-icon"><i class="fa fa-bell"></i></div>
                    </a>

                    <div class="notifications-dropdown">
                        <a ng-if="rec.notification != null" href="#">New Leads
                            ({{rec.notification.newClientsCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Booked
                            ({{rec.notification.newBookedCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Sold ({{rec.notification.newSoldCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Cancelled
                            ({{rec.notification.newCancelledCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Down Payment
                            ({{rec.notification.newDownPaymentCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Reserved
                            ({{rec.notification.newReservedCount}})</a>
                        <a ng-if="rec.notification != null" href="#">New Sold Online
                            ({{rec.notification.newSoldOnlineCount}})</a>
                        <a ng-if="rec.notification != null" href="#"><?= __('not_proccesing') ?>
                            ({{rec.notification.notProccesing}})</a>

                    </div>
                </div>
                <?php
                foreach ($non_admin_menu as $itm) {
                    $isCategories = $urlparse[2] === 'categories';
                    $isActive = '';

                    if (!in_array($authUser["user_role"], $itm["roles"])) {
                        continue;
                    }

                    if (in_array($urlparse[3], ['dashboard', 'statistic'])) {
                        // dd($itm['name']);
                        $isActive = ($urlparse[3] === 'dashboard') ? 'active' : '';
                    } else {

                        if ($isCategories) {
                            $isActive = 'active';
                        } else {
                            if ((strpos($itm["active"], '/' . $urlparse[2] . '/' . $urlparse[3])) || (strpos($itm["active"], '/' . $urlparse[2] . '/' . $urlparse[3] . '' . $urlparse[4])) !== false) {
                                $isActive = 'active';
                            }
                        }
                    }

                    if (count($itm['sub']) == 1) {
                        ?>
                        <?php
                        $isSubcActive = $urlparse[2] === $itm['name'];
                        $subItemcClass = $isSubcActive ? 'active' : '';
                        ?>


                        <div class="dropdown">
                            <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="userDropdown">
                                <li class="item w-100 <?= $subItemcClass ?>">
                                    <?= $this->Html->link(
                                        '<i class="fa fa-user"></i> ' . __('my_account'),
                                        ['controller' => 'Users', 'action' => 'myaccount'],
                                        ['escape' => false, 'class' => 'dropdown-item']
                                    ) ?>
                                </li>
                                <li class="item w-100 <?= $subItemcClass ?>">
                                    <?= $this->Html->link(
                                        '<i class="fa fa-power-off"></i> ' . __('logout'),
                                        ['controller' => 'Users', 'action' => 'logout'],
                                        ['escape' => false, 'class' => 'dropdown-item']
                                    ) ?>
                                </li>


                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>

            </div>
        </div>
        <button name="menu-toggle" id="sideClose" ng-click="toggleSidebar()" class="menu">
            <?= $this->Html->image('/img/burger-menu.svg', ['alt' => 'menu toggle', 'id' => 'sideClose']) ?>
        </button>

        <div class="sidebar">
            <div class="btn-exit">
                <button ng-click="toggleSidebar()">Back<i class="fas-right"></i> </button>
            </div>

            <div class="nav-btns justify-content-center">
                <!--<a href="#" class="search">
                    {{client}}
                    <i class="fas-bell-alt"></i>
                </a>
                 <a href="#" class="settings">
                    <i class="fas-cog"></i>
                </a>
                <a href="#" class="notifications">
                    <i class="fas-bell-alt"></i>
                </a>
                <a href="#" class="profile">
                    <?= $this->Html->image('/img/user.png', ["alt" => "..."]) ?>
                </a> -->

            </div>
            <ul class="side-list nav side-menu">
                <?php
                foreach ($admin_menu as $itm) {
                    $isCategories = $urlparse[2] === 'categories';
                    $isActive = '';

                    if (!in_array($authUser["user_role"], $itm["roles"])) {
                        continue;
                    }

                    if ($isCategories) {
                        $isActive = 'active';
                    } else {
                        if ((strpos($itm["active"], '/' . $urlparse[2] . '/' . $urlparse[3])) || (strpos($itm["active"], '/' . $urlparse[2] . '/' . $urlparse[3] . '' . $urlparse[4])) !== false) {
                            $isActive = 'active';
                        }
                    }

                    if (count($itm['sub']) == 1) {
                        ?>
                        <?php
                        $isSubcActive = ($itm['name'] === 'dashboard') ? ($urlparse[3] === $itm['name']) : ($urlparse[2] === $itm['name']);

                        $subItemcClass = $isSubcActive ? 'active' : '';
                        ?>

                        <li class="item w-100 <?= $subItemcClass ?>">
                            <?= $this->Html->link(
                                '<i class="fa fa-' . $itm['icon'] . '"></i> ' . ucfirst(__($itm['name'])),
                                ['lang' => $currlang, 'controller' => $itm['sub'][0]["url"][0], 'action' => $itm['sub'][0]["url"][1], $itm['sub'][0]["url"][2]],
                                ["escape" => false]
                            ) ?>
                        </li>

                    <?php } else { ?>

                        <li class="item w-100 ">
                            <a type="button" data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#<?= $itm['name'] ?>-collapseRem"
                                aria-expanded="<?= $isCategories ? 'true' : 'false' ?>"
                                aria-controls="<?= $itm['name'] ?>-collapseRem">
                                <i class="fa fa-<?= $itm['icon'] ?>"></i>
                                <?= __($itm['name']) ?> <span class="m-1 fa fa-chevron-down"></span>
                            </a>
                        </li>


                        <div class="accordion-item">
                            <div id="<?= $itm['name'] ?>-collapseRem"
                                class="accordion-collapse <?= $isCategories ? 'show' : 'collapse' ?>">
                                <div class="accordion-body">
                                    <li class="<?= $isActive ?> w-100">
                                        <ul class="nav child_menu" style="<?= $isCategories ? 'display: block' : '' ?>;">
                                            <?php foreach ($itm['sub'] as $subitm) { ?>
                                                <?php
                                                $isSubActive = intval($urlparse[4]) === intval($subitm['url'][2]);
                                                $subItemClass = $isSubActive ? 'text-danger' : 'text-dark';
                                                ?>
                                                <li class="w-100  p-3 pt-0 pb-1 ">
                                                    <i class="<?= $subItemClass ?> fa fa-<?= $subitm['icon'] ?>"></i>
                                                    <?= $this->Html->link(
                                                        __($subitm['name']),
                                                        ['lang' => $currlang, 'controller' => $subitm["url"][0], 'action' => $subitm["url"][1], $subitm["url"][2]],
                                                        ["class" => "$subItemClass"]
                                                    )
                                                        ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                <?php } ?>

                <li class="item w-100 ">
                    <?= $this->Html->link(
                        '<i class="fa fa-user"></i> ' . __('my_account'),
                        ['controller' => 'Users', 'action' => 'myaccount'],
                        ['escape' => false, 'class' => 'dropdown-item']
                    ) ?>
                </li>
                <li class="item w-100 ">
                    <?= $this->Html->link(
                        '<i class="fa fa-power-off"></i> ' . __('logout'),
                        ['controller' => 'Users', 'action' => 'logout'],
                        ['escape' => false, 'class' => 'smallBtn']
                    ) ?>
                </li>
            </ul>
        </div>

        <div class="sidebar-bg">
            <div>
                <button class="hideIt" ng-click="toggleSidebar()"></button>
            </div>
        </div>

        
    </div>
</nav>
<!-- Header Ends -->