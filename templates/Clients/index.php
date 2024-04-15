<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
$actionType = !isset($this->request->getParam('query')['action_type']) ? 0 : $this->request->getParam('query')['action_type'];

// dd($_pid);
?>

<div class="container-fluid">

</div>

<div id="indxPg" class="right_col" role="main" ng-init="
doGet('/admin/users/index/<?= $_pid ?>?action_type=<?=$actionType?>?list=1', 'list', 'users');

    ">


    <main>
        <section class="container-fluid">
            <h2 class="client-num">Clients ({{paging.count}})</h2>
            
            <form class="dropdowns">

                <div class="flex-gap-10 flex-wrap">

                    <!-- <select class="wb-ele">
                        <option value="All Sales">All Sales</option>
                        <option value="option">Option</option>
                        <option value="option">Option</option>
                    </select>

                    <select class="wb-ele">
                        <option value="Date">Date</option>
                        <option value="option">Option</option>
                        <option value="option">Option</option>
                    </select> -->

                    <!-- <label for="" class="">
                        <span class="sm-txt">
                            <?= __('client_tags') ?>
                        </span>
                        <tags-input class="wb-ele-tag" ng-change="doSearch()" ng-model="rec.search.client_tags"
                            add-from-autocomplete-only="true" display-property="text">
                            <auto-complete min-length="1" highlightMatchedText="true"
                                source="loadTags($query, 'categories', 40)"></auto-complete>
                        </tags-input>
                    </label> -->
                    <label class="" style="position: relative;">
                        <span class="sm-txt">
                            <?= __('client_tags') ?>
                        </span>

                        <tags-input style="padding: 0px;padding-left: 10px;width:161px;" class="wb-txt-inp"
                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}" ng-model="rec.search.client_tags"
                            add-from-autocomplete-only="true" max-tags="1" placeholder="<?= __('client_tags') ?>"
                            display-property="text" key-property="value">
                            <auto-complete min-length="1" highlightMatchedText="true"
                                source="loadTags($query, 'categories', 40)"></auto-complete>
                        </tags-input>

                        <span ng-click="doSearch()" class="fa fa-search"
                            style="cursor: pointer; position: absolute; top: 60%; right: 10px; transform: translateY(-50%);"></span>

                    </label>

                    <!-- <button class="wb-ele"ng-submit="doSearch()"type="submit">Search</button> -->

                    <label for="" class="">
                        <span class="sm-txt">
                            <?= __('source_id') ?>
                        </span>
                        <?= $this->Form->control('status_id', [
                            'class' => 'wb-ele-select',
                            'label' => false,
                            'type' => 'select',
                            'options' => $this->Do->cat(33),
                            'empty' => 'Please Select',
                            'ng-model' => 'rec.search.source_id',
                            'ng-change' => 'doSearch()',
                        ]) ?>
                    </label>

                    <label class="">
                        <span class="sm-txt">
                            <?= __('pool_id') ?>
                        </span>
                        <?= $this->Form->control('pool_id', [
                            'class' => 'wb-ele-select col-12',
                            'label' => false,
                            'type' => 'select',
                            'options' => $this->Do->cat(28),
                            'escape' => false,
                            'empty' => 'Please Select',
                            'ng-model' => 'rec.search.pool_id',
                            'ng-change' => 'doSearch()',
                        ]) ?>
                    </label>

                    <label class="">
                        <span class="sm-txt">
                            <?= __('client_priority') ?>
                        </span>
                        <?= $this->Form->control('client_priority', [
                            'class' => 'wb-ele-select col-12',
                            'label' => false,
                            'type' => 'select',
                            'options' => $this->Do->lcl($this->Do->get('client_priorities')),
                            'escape' => false,
                            'empty' => 'Please Select',
                            'ng-model' => 'rec.search.client_priority',
                            'ng-change' => 'doSearch()',
                        ]) ?>
                    </label>




                </div>


                <div class="flex-gap-10 mt-3">
                    <?php if (!in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>

                        <button class="btn btn-danger" ng-click="
                            newEntity('client');
                            openModal('#subModal'); 
                            inlineElement('#elementsContainer', 1, 'add-sale');
                        "><i class="fas-plus"></i>
                            <span class="hideMob">

                                <?= __('add') ?>
                            </span>
                        </button>

                    <?php } ?>


                    <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.field', 'admin.root', 'admin.cc', 'field', 'accountant', 'aftersale', 'cc']) || isset($authUser['user_original_role'])) { ?>
                        <button class="btn btn-warning" ng-click="multiHandle('/clients/delete')">
                            Delete
                        </button>
                    <?php } ?>

                    <!-- <select class="wb-ele-select" style="width: auto;height: 37px;padding: 8px 6px;">
                            <option value="Select" empty="true">Select</option>
                            <option ng-click="multiHandle('/clients/enable/1')">Enable</option>
                            <option ng-click="multiHandle('/clients/enable/0')">Disable</option>
                        </select>-->
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
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.client_name"
                                placeholder="Search Clients" />
                        </form>
                        <!-- <div class="small-btns">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <a href="#">Filter 1</a>
                                </div>
                                <div class="col-8">
                                    <a href="#">Long Filter Name</a>
                                </div>
                                <div class="col-4">
                                    <a href="#">Filter 2</a>
                                </div>
                                <div class="col-8">
                                    <a href="#">Pool Pool Name</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="dash-nav">
                        <?php echo $this->element('paginator-ng') ?>
                        <!-- <button>
                            <i class="fas-angle-double-left"></i>
                        </button>
                        <button>
                            <i class="fas-angle-left"></i>
                        </button>
                        <span> {{ paging.start }} </span>
                        <button>
                            <i class="fas-angle-right"></i>
                        </button>
                        <span> {{ paging.end }}
                            <?= __('of') ?> {{ paging.count }}
                        </span>
                        <button>
                            <i class="fas-angle-double-right"></i>
                        </button> -->
                    </div>
                </div>
                <!-- Dashboard Header End -->
                <!-- Dashboard Content Start -->
                <div class="dash-content">
                    <div class="columns-titles">
                        <div class="row m-1">
                            <!-- <?php if (!in_array($authUser['user_role'], ['admin.cc', 'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                <div class="checkbox">
                                    <input type="checkbox" class="all-clients" name="client-checkbox"
                                        ng-click="checkAll(this)" />
                                </div>
                                <div class="col-11 hideMob row">
                                    <div class="col-md-2 p-0 title">
                                        <?= __('sales_content') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('sales_info') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('rec_state') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('budget') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('reminders') ?>
                                    </div>
                                    <div class="col-md-1 p-0 title">
                                        <?= __('client_current_stage') ?>
                                    </div>
                                </div>
                            <?php } ?> -->

                            <?php if (in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field',  'cc', 'field', 'accountant', 'aftersale', 'cc']) || isset($authUser['user_original_role'])) { ?>
                                <div class="col-11 hideMob row">
                                    <div class="col-md-2 p-0 title">
                                        <?= __('sales_content') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('sales_info') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('rec_state') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('budget') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title">
                                        <?= __('reminders') ?>
                                    </div>
                                    <div class="col-md-1 p-0 title">
                                        <?= __('client_current_stage') ?>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                    <!--  -->
                    <?php if (in_array($authUser['user_role'], ['aftersale']) || isset($authUser['user_original_role'])) { ?>
                    <div class="client" ng-repeat="itm in lists.clients track by $index" ng-if="itm.rec_state == 13">
                        <!-- Client row Start -->
                        
                                <div class="client-row">
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                            <div class="row m-1">
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field',  'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                    <div class="checkbox col-1">
                                        <input type="checkbox" ng-model="selected[itm.id]" id="client-1"
                                            name="client-checkbox" />
                                    </div>
                                <?php } ?>


                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-2 col-12 row">
                                        <div class="col-4 title hideWeb">Lead content</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="priority">
                                                <div ng-class="{
                                                            'low': itm.client_priority >= 1 && itm.client_priority <= 3,
                                                            'med': itm.client_priority > 3 && itm.client_priority <= 6,
                                                            'high': itm.client_priority > 6 && itm.client_priority <= 10
                                                        }"></div> {{ itm.id }}
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewClient_mdl"
                                                ng-click="doGet('/clients?id='+itm.id, 'rec', 'client');"
                                                class="btn-link">
                                                {{ itm.client_name }} </a>
                                            <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                            <p><i class="fas-phone"></i>
                                                <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                {{itm.client_mobile }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">Lead info</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>
                                            <p><i class="fas-home"></i> {{
                                                itm.category.category_name }}</p>
                                            <p>
                                                <i class="fas-asterisk"></i> Source:
                                                <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 status">
                                        <div class="col-4 title hideWeb">Status</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p class="new m-1 col-12">
                                                {{ DtSetter('rec_stateSale', 3,
                                                itm.rec_state) }}
                                            </p>
                                            <!-- <p class="col-6 col-lg-12 truncate" style="font-size: 13px;"
                                                ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                                Notes: <i ng-click="
                                                updateModalElement('Notes');
                                                openModal('#subModal'); 
                                                doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                                inlineElement('#elementsContainer', 1, 'notes');"
                                                    class="fa fa-pencil m-1 "></i>
                                                {{ itm.reports[itm.reports.length - 1].report_text }}

                                                </p> -->
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-2 col-12 notes">
                                        <div class="col-4 title hideWeb">Notes</div>
                                        <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                            class="fa fa-plus m-1"></i> 
                                        <div class="col-6 p-0 col-lg-12 truncate"
                                            ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                            <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal'); 
                                            doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                                class="fa fa-pencil m-1 "></i>
                                            {{ itm.reports[itm.reports.length - 1].report_text }}

                                        </div>
                                    </div> -->

                                    <div class="col-lg-2 col-12 budget">
                                        <div class="col-4 title hideWeb">Budget</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <!-- {{clsale.sale_specs.clientspec_currency}} -->
                                            <span>
                                                {{nFormat( itm.client_budget
                                                ,DtSetter('currencies_icons',itm.client_specs[0].clientspec_currency))}}

                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <div class="col-4 title hideWeb">Reminders</div>
                                        <div class="col-6 p-0 col-lg-12">

                                            <div class="wb-ele">
                                                <?= $this->Html->image(
                                                    '/img/datepicker.png',
                                                    [
                                                        '' => '',

                                                    ]
                                                ) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Date</span>{{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[0] }}
                                                </div>
                                            </div>

                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Time</span> {{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[1] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pe-2 ps-2 col-lg-2 col-12  mt-5 mt-lg-0">
                                        <div class="col-4 title hideWeb">
                                            <?= __('client_current_stage') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="wb-ele">
                                                <!-- {{DtSetter('client_current_stageSale', itm.client_current_stage)}} -->
                                                {{itm.user_sale[itm.user_sale.length - 1].user.user_fullname}}
                                                <!-- assign.user.user_fullname -->
                                                <!-- {{itm}} -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Client row End -->

                    </div>
                    <?php } ?>
                    <?php if (in_array($authUser['user_role'], ['accountant']) || isset($authUser['user_original_role'])) { ?>
                    <div class="client" ng-repeat="itm in lists.clients track by $index" ng-if="itm.rec_state == 12">
                        <!-- Client row Start -->
                        
                                <div class="client-row">
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                            <div class="row m-1">
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field',  'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                    <div class="checkbox col-1">
                                        <input type="checkbox" ng-model="selected[itm.id]" id="client-1"
                                            name="client-checkbox" />
                                    </div>
                                <?php } ?>


                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-2 col-12 row">
                                        <div class="col-4 title hideWeb">Lead content</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="priority">
                                                <div ng-class="{
                                                            'low': itm.client_priority >= 1 && itm.client_priority <= 3,
                                                            'med': itm.client_priority > 3 && itm.client_priority <= 6,
                                                            'high': itm.client_priority > 6 && itm.client_priority <= 10
                                                        }"></div> {{ itm.id }}
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewClient_mdl"
                                                ng-click="doGet('/clients?id='+itm.id, 'rec', 'client');"
                                                class="btn-link">
                                                {{ itm.client_name }} </a>
                                            <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                            <p><i class="fas-phone"></i>
                                                <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                {{itm.client_mobile }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">Lead info</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>
                                            <p><i class="fas-home"></i> {{
                                                itm.category.category_name }}</p>
                                            <p>
                                                <i class="fas-asterisk"></i> Source:
                                                <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 status">
                                        <div class="col-4 title hideWeb">Status</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p class="new m-1 col-12">
                                                {{ DtSetter('rec_stateSale', 3,
                                                itm.rec_state) }}
                                            </p>
                                            <!-- <p class="col-6 col-lg-12 truncate" style="font-size: 13px;"
                                                ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                                Notes: <i ng-click="
                                                updateModalElement('Notes');
                                                openModal('#subModal'); 
                                                doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                                inlineElement('#elementsContainer', 1, 'notes');"
                                                    class="fa fa-pencil m-1 "></i>
                                                {{ itm.reports[itm.reports.length - 1].report_text }}

                                                </p> -->
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-2 col-12 notes">
                                        <div class="col-4 title hideWeb">Notes</div>
                                        <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                            class="fa fa-plus m-1"></i> 
                                        <div class="col-6 p-0 col-lg-12 truncate"
                                            ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                            <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal'); 
                                            doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                                class="fa fa-pencil m-1 "></i>
                                            {{ itm.reports[itm.reports.length - 1].report_text }}

                                        </div>
                                    </div> -->

                                    <div class="col-lg-2 col-12 budget">
                                        <div class="col-4 title hideWeb">Budget</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <!-- {{clsale.sale_specs.clientspec_currency}} -->
                                            <span>
                                                {{nFormat( itm.client_budget
                                                ,DtSetter('currencies_icons',itm.client_specs[0].clientspec_currency))}}

                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <div class="col-4 title hideWeb">Reminders</div>
                                        <div class="col-6 p-0 col-lg-12">

                                            <div class="wb-ele">
                                                <?= $this->Html->image(
                                                    '/img/datepicker.png',
                                                    [
                                                        '' => '',

                                                    ]
                                                ) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Date</span>{{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[0] }}
                                                </div>
                                            </div>

                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Time</span> {{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[1] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pe-2 ps-2 col-lg-2 col-12  mt-5 mt-lg-0">
                                        <div class="col-4 title hideWeb">
                                            <?= __('client_current_stage') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="wb-ele">
                                                <!-- {{DtSetter('client_current_stageSale', itm.client_current_stage)}} -->
                                                {{itm.user_sale[itm.user_sale.length - 1].user.user_fullname}}
                                                <!-- assign.user.user_fullname -->
                                                <!-- {{itm}} -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Client row End -->

                    </div>
                    <?php } ?>
                    <?php if (in_array($authUser['user_role'], ['cc']) || isset($authUser['user_original_role'])) { ?>
                    <div class="client" ng-repeat="itm in lists.clients track by $index">
                        <!-- Client row Start -->
                        
                                <div class="client-row">
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                            <div class="row m-1">
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.field',  'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                    <div class="checkbox col-1">
                                        <input type="checkbox" ng-model="selected[itm.id]" id="client-1"
                                            name="client-checkbox" />
                                    </div>
                                <?php } ?>


                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-2 col-12 row">
                                        <div class="col-4 title hideWeb">Lead content</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="priority">
                                                <div ng-class="{
                                                            'low': itm.client_priority >= 1 && itm.client_priority <= 3,
                                                            'med': itm.client_priority > 3 && itm.client_priority <= 6,
                                                            'high': itm.client_priority > 6 && itm.client_priority <= 10
                                                        }"></div> {{ itm.id }}
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewClient_mdl"
                                                ng-click="doGet('/clients?id='+itm.id, 'rec', 'client');"
                                                class="btn-link">
                                                {{ itm.client_name }} </a>
                                            <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                            <p><i class="fas-phone"></i>
                                                <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                {{itm.client_mobile }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-12 pr-5 mr-5 info">
                                        <div class="col-4 title hideWeb">Lead info</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>
                                            <p><i class="fas-home"></i> {{
                                                itm.category.category_name }}</p>
                                            <p>
                                                <i class="fas-asterisk"></i> Source:
                                                <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 status">
                                        <div class="col-4 title hideWeb">Status</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <p class="new m-1 col-12">
                                                {{ DtSetter('rec_stateSale', 3,
                                                itm.rec_state) }}
                                            </p>
                                            <!-- <p class="col-6 col-lg-12 truncate" style="font-size: 13px;"
                                                ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                                Notes: <i ng-click="
                                                updateModalElement('Notes');
                                                openModal('#subModal'); 
                                                doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                                inlineElement('#elementsContainer', 1, 'notes');"
                                                    class="fa fa-pencil m-1 "></i>
                                                {{ itm.reports[itm.reports.length - 1].report_text }}

                                                </p> -->
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-2 col-12 notes">
                                        <div class="col-4 title hideWeb">Notes</div>
                                        <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                            class="fa fa-plus m-1"></i> 
                                        <div class="col-6 p-0 col-lg-12 truncate"
                                            ng-if="!(itm.report_type === '201' || itm.report_type === '202' || itm.report_type === '203' || itm.report_type === '204')">
                                            <i ng-click="
                                            updateModalElement('Notes');
                                            openModal('#subModal'); 
                                            doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                            inlineElement('#elementsContainer', 1, 'notes');"
                                                class="fa fa-pencil m-1 "></i>
                                            {{ itm.reports[itm.reports.length - 1].report_text }}

                                        </div>
                                    </div> -->

                                    <div class="col-lg-2 col-12 budget">
                                        <div class="col-4 title hideWeb">Budget</div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <!-- {{clsale.sale_specs.clientspec_currency}} -->
                                            <span>
                                                {{nFormat( itm.client_budget
                                                ,DtSetter('currencies_icons',itm.client_specs[0].clientspec_currency))}}

                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12">
                                        <div class="col-4 title hideWeb">Reminders</div>
                                        <div class="col-6 p-0 col-lg-12">

                                            <div class="wb-ele">
                                                <?= $this->Html->image(
                                                    '/img/datepicker.png',
                                                    [
                                                        '' => '',

                                                    ]
                                                ) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Date</span>{{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[0] }}
                                                </div>
                                            </div>

                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                <div class="line-height-10">
                                                    <span class="sm-txt">Next Call Time</span> {{
                                                    itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[1] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pe-2 ps-2 col-lg-2 col-12  mt-5 mt-lg-0">
                                        <div class="col-4 title hideWeb">
                                            <?= __('client_current_stage') ?>
                                        </div>
                                        <div class="col-6 p-0 col-lg-12">
                                            <div class="wb-ele">
                                                <!-- {{DtSetter('client_current_stageSale', itm.client_current_stage)}} -->
                                                {{itm.user_sale[itm.user_sale.length - 1].user.user_fullname}}
                                                <!-- assign.user.user_fullname -->
                                                <!-- {{itm}} -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Client row End -->

                    </div>
                    <?php } ?>
                </div>
                <!-- Dashboard Content End -->
                <!-- Dashboard Nav Start -->
                <div class="dash-nav flex-center p-2">
                    <?php echo $this->element('paginator-ng') ?>
                    <!-- <button>
                        <i class="fas-angle-double-left"></i>
                    </button>
                    <button>
                        <i class="fas-angle-left"></i>
                    </button>
                    <span> {{ paging.start }} </span>
                    <button>
                        <i class="fas-angle-right"></i>
                    </button>
                    <span> {{ paging.end }}
                        <?= __('of') ?> {{ paging.count }}
                    </span>
                    <button>
                        <i class="fas-angle-double-right"></i>
                    </button> -->
                </div>
                <!-- Dashboard Nav End -->
            </div>
        </section>
        <!-- Dashboard End -->
    </main>

</div>

<?php echo $this->element('Modals/viewClient') ?>