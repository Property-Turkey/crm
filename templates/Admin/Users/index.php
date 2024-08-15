<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
// dd($_pid);
?>

<div id="indxPg" class="right_col" role="main" ng-init="
    doGet('/admin/users/index/<?= $_pid ?>?list=1', 'list', 'users');">


    <main>
        <section class="container-fluid">
            <h2 class="client-num">Users ({{paging.count}})</h2>
            <form class="dropdowns">

                <div class="flex-gap-10 flex-wrap">
                </div>


                <div class="flex-gap-10 mt-3">

                    <button class="btn btn-danger" ng-click="
                            newEntity('user');
                            openModal('#subModal'); 
                            inlineElement('#elementsContainer', 1, 'add-user');
                        "><i class="fas-plus"></i>
                        <span class="hideMob">

                            <?= __('add') ?>
                        </span>
                    </button>

                    <button class="btn btn-warning" ng-click="multiHandle('/admin/users/delete')">
                        Delete
                    </button>

                    <select class="wb-ele-select"
                        style="width: auto;height: 37px;padding: 8px 6px;  border-radius: 6px;">
                        <option value="Select" empty="true">Select</option>
                        <option ng-click="multiHandle('/admin/users/enable/1')">Enable</option>
                        <option ng-click="multiHandle('/admin/users/enable/0')">Disable</option>
                    </select>
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
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.user_fullname"
                                placeholder="Search Users" />
                        </form>
                        <div class="priority">
                            <div class="low">
                            </div><?= __('active_user') ?>
                        </div>
                        <div class="priority">
                            <div class="high">
                            </div><?= __('inactive_user') ?>
                        </div>
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
                                <div class="col-md-2 p-0 title">
                                    <?= __('user') ?>
                                </div>
                                <div class="col-md-4 p-0 title">
                                    <?= __('user_info') ?>
                                </div>
                                <div class="col-md-6 p-0 title">
                                    <?= __('action') ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="client" ng-repeat="itm in lists.users track by $index">
                        <!-- Client row Start -->
                        <div class="client-row">
                            <div class="row">
                                <div class="checkbox col-1">
                                    <input type="checkbox" ng-model="selected[itm.id]" class="mb-3" id="client-1"
                                        name="client-checkbox" />
                                </div>

                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-2 col-12 row">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <!-- <div class="mx-2" type="button" my-tooltip="<?= __('set_the_priorty') ?>"
                                                ng-repeat="notify in rec.notification.clientsWithoutPriorty"
                                                ng-if="notify.id == itm.id">
                                                <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                    <small class="note-font">
                                                        <?= __('set_the_priorty') ?>
                                                    </small>
                                                </i>
                                            </div> -->
                                            <div class="priority">

                                                <div ng-if="itm.rec_state == 1" class="low" my-tooltip="<?=__('active_user')?>"></div>
                                                <div ng-if="itm.rec_state == 0" class="high" my-tooltip="<?=__('inactive_user')?>">
                                                </div>{{itm.id}}
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewUser_mdl"
                                                ng-click="doGet('/admin/users?id='+itm.id, 'rec', 'user');"
                                                class="btn-link">
                                                {{ itm.user_fullname }}
                                            </a>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_info') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p>
                                                <i class="fa fa-user"></i>
                                                {{ itm.user_role }}
                                            </p>
                                            <p><i class="fa fa-envelope"></i>
                                                {{itm.email }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_info') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                                ng-click="setZIndex();
                                                updateModalElement('User');
                                                doGet('/admin/users?id='+itm.id, 'rec', 'user');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'edit-user')">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('edit_user') ?>
                                            </button>

                                            <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                                ng-click="setZIndex();
                                                newEntity('category');
                                                openModal('#subModal'); 
                                                rec.category.parent_id = 28; 
                                                rec.category.parent_name = itm.category_name;
                                                doGet('/admin/users?id='+itm.id, 'rec', 'user'); 
                                                inlineElement('#elementsContainer', 1, 'add-poolcategory');
                                            ">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('move_user_to_own_pool') ?>
                                            </button>
                                            <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                                ng-click="setZIndex();
                                                updateModalElement('Categories');
                                                doGet('/admin/users?id='+itm.id, 'rec', 'user');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'add-pool')">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('allow_user_access_this_pool') ?>
                                            </button>
                                            <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                                ng-click="setZIndex();
                                                updateModalElement('Make Team Member');
                                                doGet('/admin/users?id='+itm.id, 'rec', 'user');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'add-team-or-memeber')">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('make_team_member') ?>
                                            </button>

                                            <!-- <button id="modalBtn" style="font-size: 13px;" class="btn btn-modal"
                                                ng-click="
                                                    rec.user.team = 0;
                                                    rec.user.id = itm.id;
                                                    rec.user.email = itm.email;
                                                    rec.user.parent_id = 0;

                                                    doSave(rec.user, 'user', 'users', '#user_btn', '#user_preloader');">
                                                <?= __('make_team_leader') ?>
                                            </button> -->
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

<?php echo $this->element('Modals/viewUser') ?>