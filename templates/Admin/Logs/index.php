




<div id="indxPg" class="right_col" role="main" ng-init="
doGet('/admin/logs/index?list=1', 'list', 'logs');
    ">


    <main>
        <section class="container-fluid">
            <h2 class="client-num">Logs ({{paging.count}})</h2>
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

                    <button class="btn btn-warning" ng-click="multiHandle('/admin/logs/delete')">
                        Delete
                    </button>

                    <select class="wb-ele-select"
                        style="width: auto;height: 37px;padding: 8px 6px;  border-radius: 6px;">
                        <option value="Select" empty="true">Select</option>
                        <option ng-click="multiHandle('/admin/logs/enable/1')">Enable</option>
                        <option ng-click="multiHandle('/admin/logs/enable/0')">Disable</option>
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
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.log_changes"
                                placeholder="Search Logs" />
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
                                <div class="col-md-5 p-0 title">
                                    <?= __('user_fullname') ?>
                                </div>
                                <div class="col-md-5 p-0 title">
                                    <?= __('log_url') ?>
                                </div>
                               
                                <div class="col-md-2 p-0 title">
                                    <?= __('action') ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="client" ng-repeat="itm in lists.logs track by $index">
                        <!-- Client row Start -->
                        <div class="client-row">
                            <div class="row">
                                <div class="checkbox col-1">
                                    <input type="checkbox" ng-model="selected[itm.id]" class="mb-3" id="client-1"
                                        name="client-checkbox" />
                                </div>

                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-5 col-12 row">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_fullname') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="priority">
                                                <div ng-class="{'low': itm.rec_state == 1, 'high': itm.rec_state == 0}">
                                                </div>{{itm.id}}
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">
                                                <p>
                                                {{ itm.user.user_fullname }}
                                                </p>
                                                
                                            </div>
                                            

                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">
                                            <?= __('log_url') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p><i class="fa fa-circle"></i>
                                                {{ itm.log_url[5] }}
                                            </p>
                                            <p>
                                                <i class="fa fa-circle-o"></i>
                                                {{ DtSetter('actionsName', itm.log_url[6]) }}
                                            </p>
                                        </div>
                                    </div>
                                    


                                    <!-- <div class="col-lg-4 col-12 pr-5 mr-5 info" ng-repeat="change in itm.log_changes" 
                                        ng-show="(!(itm.log_changes.length > 1) || itm.log_changes.length == 0)">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_info') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p ng-repeat="(key, value) in change">
                                                {{ key }}: {{ value }}
                                            </p>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-lg-4 col-12 pr-5 mr-5 info" ng-show="itm.log_changes.length > 1">
                                        <div class="col-4 title hideWeb">
                                            <?= __('user_info') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12 row">
                                            <div class="col-6">
                                                <b> <?= __('before') ?></b>
                                                <p ng-repeat="(key, value) in itm.log_changes[0]">
                                                {{ key }}: {{ value }}
                                                </p>
                                            </div>

                                            <div class="col-6">
                                                <b> <?= __('after') ?></b>
                                                <p  ng-repeat="(key, value) in itm.log_changes[1]">
                                                    {{ key }}: {{ value }}
                                                </p>
                                            </div>

                                        </div>
                                    </div> -->



                                    <div class="col-lg-2 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">
                                            <?= __('action') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <button data-bs-toggle="modal" data-bs-target="#viewLog_mdl"
                                                ng-click="doGet('/admin/logs?id='+itm.id, 'rec', 'log');"
                                                    style="font-size: 13px;" class="btn btn-modal">
                                                <i class="fa fa-eye"></i>
                                                <?= __('view') ?>
                                            </button>
                                            <button id="recovery" 
                                                ng-click="doGet('/admin/logs/recover/'+itm.id, 'rec', 'log'); 
                                                        " 
                                                ng-show="itm.log_changes.length > 1"
                                                    style="font-size: 13px;" class="btn btn-modal">
                                                <i class="fa fa-refresh"></i>
                                                <?= __('recovery') ?>
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

<?php echo $this->element('Modals/viewLog') ?>

