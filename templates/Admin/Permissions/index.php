

<?php
    $pid = !isset($this->request->getParam('pass')[0]) ? null : $this->request->getParam('pass')[0];
?>


<div id="indxPg" class="right_col" role="main" ng-init="
doGet('/admin/permissions/index?list=1', 'list', 'permissions');
    ">


    <main>
        <section class="container-fluid">
            <h2 class="client-num">Permissions ({{paging.count}})</h2>
            <form class="dropdowns">

                <div class="flex-gap-10 flex-wrap">
                </div>


                <div class="flex-gap-10 mt-3">

                    <button class="btn btn-danger" ng-click="
                            newEntity('Permissions');
                            openModal('#subModal'); 
                            inlineElement('#elementsContainer', 1, 'edit-permission');
                        "><i class="fas-plus"></i>
                        <span class="hideMob">

                            <?= __('add') ?>
                        </span>
                    </button>

                    <button class="btn btn-warning" ng-click="multiHandle('/admin/permissions/delete')">
                        Delete
                    </button>

                
                </div>
            </form>
        </section>
        <!-- Dashboard Start -->
        <section class="container-fluid">
            <div class="dashboard">
                <!-- Dashboard Header Start -->
                <div class="dash-head">
                    <div class="flex-gap-10">
                        <form class="search-leads-form">
                            <i class="fas-search"></i>
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.user_role"
                                placeholder="Search User Role" />
                        </form>

                    </div>
                    <div class="dash-nav">
                        <?php echo $this->element('paginator-ng') ?>
                    </div>
                </div>
                <!-- Dashboard Header End -->
                <!-- Dashboard Content Start -->
                <div class="dash-content">
                    <div class="columns-titles">
                        <div class="row">
                            <div class="checkbox">
                                <input type="checkbox" class="all-clients" name="client-checkbox"
                                    ng-click="checkAll(this)" />
                            </div>

                            <div class="col-11 hideMob row">
                                <div class="col-md-3 p-0 title">
                                    <?= __('user_role') ?>
                                </div>
                                <div class="col-md-3 p-0 title">
                                    <?= __('user_module') ?>
                                </div>

                                <div class="col-md-1 p-0 title">
                                    <?= __('permission_c') ?>
                                </div>
                                <div class="col-md-1 p-0 title">
                                    <?= __('permission_r') ?>
                                </div>
                                <div class="col-md-1 p-0 title">
                                    <?= __('permission_u') ?>
                                </div>
                                <div class="col-md-2 p-0 title">
                                    <?= __('permission_d') ?>
                                </div>

                                <div class="col-md-1 p-0 title">
                                    <?= __('action') ?>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="client" ng-repeat="itm in lists.permissions track by $index">
                        <!-- Client row Start -->
                        <div class="client-row">
                            <button type="button" id="permission_btn" class="hideIt" ng-click="
                            doGet('/admin/permissions/index?list=1', 'list', 'permissions');">
                        </button>
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/admin/clients/index?list=1', 'list', 'clients');">
                            </button> -->



                            <div class="row">
                                <div class="checkbox col-1">
                                    <input type="checkbox" ng-model="selected[itm.id]" class="mb-3" id="client-1"
                                        name="client-checkbox" />
                                </div>

                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-3 col-12 ms-0 mt-1 row">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_role') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="priority">
                                            {{itm.id}}
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewPermission_mdl"
                                                ng-click="doGet('/admin/permissions?id='+itm.id, 'rec', 'permission');"
                                                class="btn-link">
                                                {{ itm.permission_role }} 
                                            </a>
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-12 d-flex   info">
                                        <div class="col-4 title hideWeb"><?= __('user_module') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-user"></i>
                                                {{ itm.permission_module }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-12  info">
                                        <div class="col-4 title hideWeb"><?= __('permission_c') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-cogs"></i>
                                                {{ itm.permission_c }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-12  info">
                                        <div class="col-4 title hideWeb"><?= __('permission_r') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-cogs"></i>
                                                {{ itm.permission_r }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-12  info">
                                        <div class="col-4 title hideWeb"><?= __('permission_u') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-cogs"></i>
                                                {{ itm.permission_u }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-12  info">
                                        <div class="col-4 title hideWeb"><?= __('permission_d') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-cogs"></i>
                                                {{ itm.permission_d }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-12  ps-0 info">
                                        <div class="col-4 title hideWeb"><?= __('actions') ?></div>
                                        <div class="col-6 p-0 col-lg-12">
                                        <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                            ng-click="setZIndex();
                                                updateModalElement('Permissions');
                                                doGet('/admin/permissions?id='+itm.id, 'rec', 'permission');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'edit-permission')">
                                            <i class="fa fa-pencil"></i>
                                            <?= __('edit') ?>
                                        </button>
                                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Client row End -->

                    </div>

                </div>
                <!-- Dashboard Content End -->
                <!-- Dashboard Nav Start -->
                <div class="dash-nav flex-center p-2">
                    <?php echo $this->element('paginator-ng') ?>
                </div>
                <!-- Dashboard Nav End -->
            </div>
        </section>
        <!-- Dashboard End -->
    </main>

</div>

<?php echo $this->element('Modals/viewPermission') ?>