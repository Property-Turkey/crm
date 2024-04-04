<?php
$_pid = !isset ($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
$actionType = !isset ($this->request->getParam('action_type')[0]) ? 0 : $this->request->getParam('action_type')[0];

// dd($_pid);
?>

<div id="indxPg" class="right_col" role="main" ng-init="
        doGet('/admin/clients/index/<?= $_pid ?>?action_type=<?= $actionType?>?list=1', 'list', 'clients');
        doGet('/admin/clients/pool', 'rec', 'pool');
        doGet('/admin/clients/notifications', 'rec', 'notification');">


    <main>
        <section class=" container-fluid">
            <h2 class="client-num">
                <?= __('clients') ?> ({{paging.count}})
            </h2>
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
                    <label class="relative">
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

                        <span ng-click="doSearch()" class="fa fa-search doSearch"></span>

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
                            'empty' => __('please_select'),
                            'ng-model' => 'rec.search.source_id',
                            'ng-change' => 'doSearch()',
                        ]) ?>
                    </label>

                    <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset ($authUser['user_original_role'])) { ?>

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
                                'empty' => __('please_select'),
                                'ng-model' => 'rec.search.pool_id',
                                'ng-change' => 'doSearch()',
                            ]) ?>
                        </label>
                    <?php } ?>

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
                            'empty' => __('please_select'),
                            'ng-model' => 'rec.search.client_priority',
                            'ng-change' => 'doSearch()',
                        ]) ?>
                    </label>


                    <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset ($authUser['user_original_role'])) { ?>

                        <label class="">
                            <span class="sm-txt">
                                <?= __('pool_id') ?>
                            </span>
                            <select class="wb-ele-select col-12" ng-model="rec.search.pool_id" ng-change="doSearch()">
                                <option value="Select" empty="true">
                                    <?= __('please_select') ?>
                                </option>
                                <option ng-repeat="category in rec.pool.categories" value="{{category.id}}">
                                    {{category.category_name}}
                                </option>
                            </select>
                        </label>
                    <?php } ?>

                </div>


                <div class="flex-gap-10 mt-3">
                    <?php if (!in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>

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


                    <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.field', 'admin.cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
                        <button class="btn btn-warning" ng-click="multiHandle('/admin/clients/delete')">
                            Delete
                        </button>
                    <?php } ?>

                    <!-- <select class="wb-ele-select" style="width: auto;height: 37px;padding: 8px 6px;">
                            <option value="Select" empty="true">Select</option>
                            <option ng-click="multiHandle('/admin/clients/enable/1')">Enable</option>
                            <option ng-click="multiHandle('/admin/clients/enable/0')">Disable</option>
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
                            <!-- <?php if (!in_array($authUser['user_role'], ['admin.cc', 'cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
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

                            <?php if (in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
                                <!-- <div class="checkbox">
                                    <input type="checkbox" class="all-clients" name="client-checkbox"
                                        ng-click="checkAll(this)" />
                                </div> -->
                                <div class="col-11 hideMob row">
                                    <div class="col-md-3 p-0 title">
                                        <?= __('sales_content') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title mr-24">
                                        <?= __('sales_info') ?>
                                    </div>
                                    <div class="col-md-2 p-0 title mr-24">
                                        <?= __('notes_offers') ?>
                                    </div>

                                    <div class="col-md-2 p-0 title mr-24">
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
                    <?php if (in_array($authUser['user_role'], ['aftersale']) || isset ($authUser['user_original_role'])) { ?>
                        <div class="client" ng-repeat="itm in lists.clients track by $index" ng-if="itm.rec_state == 13">
                            <!-- Client row Start -->

                            <div class="client-row">
                                <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/admin/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                                <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/admin/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                                <div class="row m-1">
                                    <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
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
                                                    ng-click="doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                    class="btn-link">
                                                    {{ itm.client_name }} </a>
                                                <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                                <p><i class="fas-phone"></i>
                                                    <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                    {{itm.client_mobile }}
                                                </p>
                                                <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>
                                                <p><i class="fas-home"></i> {{
                                                    itm.category.category_name }}</p>
                                                <p>
                                                    <i class="fas-asterisk"></i> Source:
                                                    <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-12 info">
                                            <div class="col-4 title hideWeb">Lead info</div>
                                            <div class="col-6 p-0 col-lg-12">

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
                                                        itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[0] }}
                                                    </div>
                                                </div>

                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                    <div class="line-height-10">
                                                        <span class="sm-txt">Next Call Time</span> {{
                                                        itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[1] }}
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
                                                    {{itm.user_client[itm.user_client.length - 1].user.user_fullname}}
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
                    <?php if (in_array($authUser['user_role'], ['accountant']) || isset ($authUser['user_original_role'])) { ?>
                        <div class="client" ng-repeat="itm in lists.clients track by $index">
                            <!-- Client row Start -->

                            <div class="client-row">
                                <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/admin/clients/index?list=1', 'list', 'clients');">
                        </button>
                                <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/admin/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                                <div class="row m-1">
                                    <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
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
                                                    ng-click="doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                    class="btn-link">
                                                    {{ itm.client_name }} </a>
                                                <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                                <p><i class="fas-phone"></i>
                                                    <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                    {{itm.client_mobile }}
                                                </p>
                                                <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>
                                                <p><i class="fas-home"></i> {{
                                                    itm.category.category_name }}</p>
                                                <p>
                                                    <i class="fas-asterisk"></i> Source:
                                                    <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-12 info">
                                            <div class="col-4 title hideWeb">Lead info</div>
                                            <div class="col-6 p-0 col-lg-12">

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
                                                        itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[0] }}
                                                    </div>
                                                </div>

                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                    <div class="line-height-10">
                                                        <span class="sm-txt">Next Call Time</span> {{
                                                        itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[1] }}
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
                                                    {{itm.user_client[itm.user_client.length - 1].user.user_fullname}}
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
                    <?php if (!in_array($authUser['user_role'], ['aftersale', 'accountant']) || isset ($authUser['user_original_role'])) { ?>
                        <div class="client" ng-repeat="itm in lists.clients track by $index">
                            <!-- Client row Start -->

                            <div class="client-row">
                                <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/admin/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                                <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/admin/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                                <div class="row m-1">
                                    <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset ($authUser['user_original_role'])) { ?>
                                        <div class="checkbox col-1">
                                            <input type="checkbox" ng-model="selected[itm.id]" id="client-1"
                                                name="client-checkbox" />
                                        </div>
                                    <?php } ?>


                                    <div class="col-lg-11 col-12 row">

                                        <div class="previewToggle col-lg-3 col-12 row">
                                            <div class="col-4 title hideWeb">
                                                <?= __('sales_content') ?>
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">
                                                <div class="note-flex-start">
                                                    <div class="priority">

                                                        <div ng-class="{
                                                            'gray': itm.client_priority == null || itm.client_priority == 0,
                                                            'low': itm.client_priority == 1,
                                                            'med': itm.client_priority == 2,
                                                            'high': itm.client_priority == 3
                                                        }"></div> {{ itm.id }}

                                                    </div>
                                                    <div class="mx-2" type="button"
                                                        my-tooltip="<?= __('set_the_priorty') ?>"
                                                        ng-repeat="notify in rec.notification.clientsWithoutPriorty"
                                                        ng-if="notify.id == itm.id">
                                                        <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                            <small class="note-font">
                                                                <?= __('set_the_priorty') ?>
                                                            </small>
                                                        </i>
                                                    </div>
                                                </div>

                                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewClient_mdl"
                                                    ng-click="doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                    class="btn-link">
                                                    {{ itm.client_name }} </a>
                                                <p><i class="fas-mail"></i> {{ itm.client_email }}</p>
                                                <p><i class="fas-phone"></i>
                                                    <!-- <?= $this->Html->image('/img/phone.svg', ['' => '']) ?> -->
                                                    {{itm.client_mobile }}
                                                </p>
                                                <p><i class="fas-flag"></i> {{ itm.client_nationality }}</p>

                                                <p>
                                                    <i class="fas-asterisk"></i> Source:
                                                    <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-12 info mr-24">
                                            <div class="col-4 title hideWeb">
                                                <?= __('sales_info') ?>
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">

                                                <span class="sm-txt">
                                                    <?= __('category_id') ?>
                                                </span>
                                                <button ng-click="setZIndex();
                                                updateModalElement('Lead Information');
                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                openModal('#subModal');
                                                inlineElement('#elementsContainer', 1, 'info')"
                                                    class="wb-ele sm-txt-indx" type="button">
                                                    <p>
                                                        {{itm.category.category_name}}
                                                    </p>
                                                </button>
                                                <div class="note-flex">

                                                    <span class="sm-txt">
                                                        <?= __('budget') ?>
                                                    </span>

                                                    <div class="mx-2" type="button" my-tooltip="<?= __('set_the_budget') ?>"
                                                        ng-repeat="notify in rec.notification.clientsWithoutBudget"
                                                        ng-if="notify.id == itm.id">
                                                        <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                            <small class="note-font">
                                                                <?= __('set_the_budget') ?>
                                                            </small>
                                                        </i>
                                                    </div>

                                                </div>

                                                <button ng-click="setZIndex();
                                                updateModalElement('Lead Information');
                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                openModal('#subModal');
                                                inlineElement('#elementsContainer', 1, 'info')"
                                                    class="wb-ele sm-txt-indx" type="button">
                                                    <p ng-if="!(itm.client_budget == 2000001)">
                                                        Up to {{nFormat( itm.client_budget,
                                                        DtSetter('currencies_icons',2))}}
                                                    </p>
                                                    <p ng-if="itm.client_budget == 2000001 && itm.client_budget != null">
                                                        {{nFormat( itm.client_budget,
                                                        DtSetter('currencies_icons',2))}} +
                                                    </p>
                                                    <p ng-if="itm.client_budget == null">
                                                        -
                                                    </p>
                                                </button>




                                                <div class="note-flex">
                                                    <span class="sm-txt">
                                                        <?= __('rec_state') ?>
                                                    </span>
                                                    <div class="mx-2" type="button" my-tooltip="<?= __('not_proccesing') ?>"
                                                        ng-repeat="notify in rec.notification.clientsWithoutStatus"
                                                        ng-if="notify.id == itm.id">
                                                        <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                            <small class="note-font">
                                                                <?= __('set_the_status') ?>
                                                            </small>
                                                        </i>
                                                    </div>
                                                </div>

                                                <button ng-click="setZIndex();
                                                updateModalElement('Lead Information');
                                                
                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                openModal('#subModal');
                                                inlineElement('#elementsContainer', 1, 'info')"
                                                    class="wb-ele sm-txt-indx" type="button">
                                                    <p>
                                                        {{ DtSetter('rec_stateSale',
                                                        3, itm.rec_state)
                                                        }}
                                                    </p>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="col-lg-2 col-12 info mr-24">
                                            <div class="col-4 title hideWeb">
                                                <?= __('notes_offers') ?>
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">


                                                <div class="note-flex">
                                                    <span class="sm-txt">
                                                        <?= __('notes') ?>
                                                    </span>
                                                    <!-- <a href="#"
                                                        ng-click="
                                                        openModal('#subModal');
                                                        inlineElement('#elementsContainer', 1, 'finance');
                                                        rec.report.tar_id = itm.id;
                                                        doGet('/admin/clients?id='+itm.id, 'rec', 'client');
                                                        doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');"
                                                        class="btn-link">
                                                        <?= __('view_allNotes') ?>
                                                    </a> -->


                                                </div>
                                                <button class="wb-ele sm-txt-indx" type="button" ng-click="
                                                        updateModalElement('Notes');
                                                        openModal('#subModal');
                                                        inlineElement('#elementsContainer', 1, 'finance');
                                                        rec.report.tar_id = itm.id;
                                                        doGet('/admin/clients?id='+itm.id, 'rec', 'client');
                                                        doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');">
                                                    <p ng-if="itm.reports.length > 0">
                                                        {{ itm.reports[itm.reports.length - 1].report_text }}
                                                    </p>
                                                    <p ng-if="itm.reports == 0">
                                                        -
                                                    </p>
                                                </button>

                                                <div class="note-flex">
                                                    <span class="sm-txt">
                                                        <?= __('offers') ?>
                                                    </span>
                                                    <!-- <a href="#" 
                                                        ng-click="
                                                        openModal('#subModal');
                                                        inlineElement('#elementsContainer', 1, 'viewOffer');
                                                        doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                        class="btn-link">
                                                        <?= __('view_allOffers') ?>
                                                    </a> -->


                                                </div>

                                                <button class="wb-ele sm-txt-indx" type="button" ng-click="
                                                        setZIndex();
                                                        updateModalElement('Offers');
                                                        newEntity('offer'); 
                                                        openModal('#subModal'); 
                                                        doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                        inlineElement('#elementsContainer', 1, 'viewOffer')">
                                                    <p ng-if="itm.offers.length > 0">
                                                        Sent {{ itm.offers.length }} Offers
                                                    </p>
                                                    <p ng-if="itm.offers == 0">
                                                        -
                                                    </p>

                                                </button>


                                                <div class="note-flex">
                                                    <span class="sm-txt">
                                                        <?= __('deals_properties') ?>
                                                    </span>
                                                    <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#viewReservation_mdl"
                                                        ng-click="doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                        class="btn-link">
                                                        <?= __('view_allProperties') ?>
                                                    </a> -->


                                                </div>

                                                <button class="wb-ele sm-txt-indx" type="button"  ng-click="
                                                    setZIndex();
                                                    openModal('#subModal'); 
                                                    updateModalElement('Deals');
                                                    doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                    doGet('/admin/reservations?id=' + itm.reservations[itm.reservations.length - 1].id, 'rec', 'reservation');
                                                    inlineElement('#elementsContainer', 1, 'indexreser')">
                                                    <p ng-if="itm.reservations.length > 0">
                                                        Sent {{ itm.reservations.length }} Properties
                                                    </p>
                                                    <p ng-if="itm.offers == 0">
                                                        -
                                                    </p>

                                                </button>

                                            </div>


                                        </div>

                                        <div class="col-lg-2 col-12 mr-24 info">
                                            <div class="col-4 title hideWeb">Reminders</div>
                                            <div class="col-6 p-0 col-lg-12">
                                                <span class="sm-txt">
                                                    <?= __('next_call_date') ?>
                                                </span>
                                                <button class="wb-ele sm-txt-indx" type="button" ng-click="setZIndex();
                                            newEntity('reminder'); 
                                            openModal('#subModal'); 
                                            doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                            inlineElement('#elementsContainer', 1, 'reminders')">
                                                    <p ng-if="itm.reminders.length > 0">
                                                        {{ itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[0] }}
                                                    </p>

                                                </button>
                                                <span class="sm-txt">
                                                    <?= __('next_call_time') ?>
                                                </span>
                                                <button class="wb-ele sm-txt-indx" type="button" ng-click="setZIndex();
                                            newEntity('reminder'); 
                                            openModal('#subModal'); 
                                            doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                            inlineElement('#elementsContainer', 1, 'reminders')">
                                                    <p ng-if="itm.reminders.length > 0">
                                                        {{ itm.reminders[itm.reminders.length - 1].reminder_nextcall.split(' ')[1] }}
                                                    </p>
                                                </button>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 mb-2">
                                                                <div class="btn darkRedBg mt-1" type="button" ng-click="setZIndex();
                                                                newEntity('reminder'); 
                                                                openModal('#subModal'); 
                                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                                inlineElement('#elementsContainer', 1, 'reminders')">
                                                                    <?= __('snooze') ?>
                                                                </div>

                                                            </div>
                                                            <!--<div class="col-6">
                                                                <div class="flex-center text-center">
                                                                    <label class="switch">


                                                                        <input
                                                                            ng-model="itm.actions[itm.actions.length - 1].action_type"
                                                                            ng-true-value="75" type="checkbox" />
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    <label for="finance-client3">
                                                                        <?= __('called') ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="flex-center text-center">
                                                                    <label class="switch">
                                                                        <input
                                                                            ng-model="itm.actions[itm.actions.length - 1].action_type"
                                                                            ng-click="
                                                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                                                rec.action.client_id = itm.id;
                                                                                actionSave(itm.id, 76);"
                                                                            ng-true-value="76" name="invoice"
                                                                            id="finance-client4" type="checkbox" />
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                    <label for="finance-client4">
                                                                        <?= __('spoken') ?>
                                                                    </label>
                                                                </div>
                                                            </div> -->


                                                            <!-- <div class="note-flex">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="flex-center text-center"
                                                                            ng-repeat="act in itm.actions">
                                                                            <label class="switch"
                                                                                ng-if="$last && act.action_type == 75">
                                                                                <input ng-model="act.called"
                                                                                    ng-change="actionSave(act.client_id, 75)"
                                                                                    ng-checked="act.action_type == 75"
                                                                                    ng-disabled="checkDate(act.stat_created)"
                                                                                    name="invoice" id="finance-client3"
                                                                                    type="checkbox" />
                                                                                <span class="slider round"></span>
                                                                            </label>
                                                                            <label for="finance-client3"
                                                                                ng-if="$last && act.action_type == 75">
                                                                                <?= __('called') ?>
                                                                            </label>

                                                                            <label class="switch"
                                                                                ng-if="$last && act.action_type == 76">
                                                                                <input ng-model="act.spoken"
                                                                                    ng-change="actionSave(act.client_id, 76)"
                                                                                    ng-checked="act.action_type == 76"
                                                                                    ng-disabled="checkDate(act.stat_created)"
                                                                                    name="invoice4" id="finance-client4"
                                                                                    type="checkbox" />
                                                                                <span class="slider round"></span>
                                                                            </label>
                                                                            <label for="finance-client4"
                                                                                ng-if="$last && act.action_type == 76">
                                                                                <?= __('spoken') ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <!-- {{rec.pool.lastActionType76}}
                                                            {{rec.pool.lastActionType75}} -->
                                                            <!-- {{rec.pool.clientAction76[itm.id]}}
                                                             {{rec.pool.clientAction75[itm.id][0]}}
                                                            {{rec.pool.clientAction75[itm.id].stat_created}}-->

                                                            <div class="note-flex">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="flex-center text-center">
                                                                            <label class="switch">
                                                                                <input
                                                                                    ng-model="rec.pool.clientAction75[itm.id]"
                                                                                    ng-change="actionSave(itm.id, 75)"
                                                                                    ng-checked="checkDate(rec.pool.clientAction75[itm.id][1])"
                                                                                    ng-disabled="checkDate(rec.pool.clientAction75[itm.id][1])"
                                                                                    name="invoice4" id="finance-client4"
                                                                                    type="checkbox" />
                                                                                <span
                                                                                    ng-class="{ 'slider': true, 'round': true, 'disabled': checkDate(rec.pool.clientAction75[itm.id][1]) }"></span>
                                                                            </label>
                                                                            <label for="finance-client3">
                                                                                <?= __('called') ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="flex-center text-center">
                                                                            <label class="switch">
                                                                                <input
                                                                                    ng-model="rec.pool.clientAction76[itm.id]"
                                                                                    ng-change="actionSave(itm.id, 76)"
                                                                                    ng-checked="checkDate(rec.pool.clientAction76[itm.id][1])"
                                                                                    ng-disabled="checkDate(rec.pool.clientAction76[itm.id][1])"
                                                                                    name="invoice4" id="finance-client4"
                                                                                    type="checkbox" />
                                                                                <span
                                                                                    ng-class="{ 'slider': true, 'round': true, 'disabled': checkDate(rec.pool.clientAction76[itm.id][1]) }"></span>
                                                                            </label>
                                                                            <label for="finance-client4">
                                                                                <?= __('spoken') ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-12  info">
                                            <div class="col-4 title hideWeb">
                                                <?= __('client_current_stage') ?>
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">
                                                <div class="note-flex">

                                                    <span class="sm-txt">
                                                        <?= __('client_current_stage') ?>
                                                    </span>

                                                    <div class="mx-2" type="button"
                                                        my-tooltip="<?= __('require_reallocation') ?>"
                                                        ng-repeat="notify in itm.user_client">


                                                    </div>

                                                </div>

                                                <div class="wb-ele" type="button" ng-click="setZIndex();
                                                    updateModalElement('Assign');
                                                    newEntity('user_client'); 
                                                    openModal('#subModal'); 
                                                    doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                    inlineElement('#elementsContainer', 1, 'assign')">
                                                    <div ng-repeat="notify in itm.user_client track by $index">
                                                        {{notify.user.user_fullname}}
                                                        <small>
                                                            <i my-tooltip="<?= __('require_reallocation') ?>"
                                                                ng-if="notify.rec_state == 2"
                                                                class="fa fa-exclamation-circle redColor"
                                                                aria-hidden="true"></i>
                                                        </small>{{$index < (itm.user_client.length - 1) ? ',' : '' }} </div>
                                                    </div>
                                                    <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset ($authUser['user_original_role'])) { ?>
                                                        <div class="row" ng-repeat="reallocate in itm.user_client">
                                                            <div ng-if="rec.notification.user_id == reallocate.user_id;">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12 mb-2">
                                                                            <button class="btn mt-1" type="button"
                                                                                ng-click="confirmAndReallocation(itm.id)"
                                                                                ng-disabled="reallocate.rec_state == 2"
                                                                                ng-class="{'greenBg': reallocate.rec_state == 1}">
                                                                                <?= __('request_reallocation') ?>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>


                                                    <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset ($authUser['user_original_role'])) { ?>
                                                        <div class="row">
                                                            <div>
                                                                <div class="col-12" data-bs-toggle="modal"
                                                                    data-bs-target="#viewReallocate_mdl"
                                                                    ng-click="
                                                                    newEntity('user_client');
                                                                    doGet('/admin/clients?id=' + itm.id, 'rec', 'client');">
                                                                    <div class="row">
                                                                        <div class="col-12 mb-2">
                                                                            <div class="btn darkRedBg mt-1" type="button">

                                                                                <?= __('settings_reallocation') ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    <?php } ?>


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
<?php echo $this->element('Modals/viewReport') ?>
<?php echo $this->element('Modals/viewOffer') ?>
<?php echo $this->element('Modals/viewReservation') ?>
<?php echo $this->element('Modals/viewReallocate') ?>