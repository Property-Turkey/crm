<div class="container-fluid">

</div>

<div id="indxPg" class="right_col" role="main" ng-init="
        doGet('/admin/clients/index?list=1', 'list', 'clients');
        doGet('/admin/clients/pool', 'rec', 'pool');
        doGet('/admin/clients/notifications', 'rec', 'notification');" ">


    <main>
        <section class=" container-fluid">
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

            <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>

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
                    'empty' => 'Please Select',
                    'ng-model' => 'rec.search.client_priority',
                    'ng-change' => 'doSearch()',
                ]) ?>
            </label>


            <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>

                <label class="">
                    <span class="sm-txt">
                        <?= __('pool_id') ?>
                    </span>
                    <select class="wb-ele-select col-12" ng-model="rec.search.pool_id" ng-change="doSearch()">
                        <option value="Select" empty="true">Please Select</option>
                        <option ng-repeat="category in rec.pool.categories" value="{{category.id}}">
                            {{category.category_name}}
                        </option>
                    </select>
                </label>
            <?php } ?>

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


            <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.field', 'admin.cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
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

                        <?php if (in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                            <div class="checkbox">
                                <input type="checkbox" class="all-clients" name="client-checkbox"
                                    ng-click="checkAll(this)" />
                            </div>
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
                <?php if (in_array($authUser['user_role'], ['aftersale']) || isset($authUser['user_original_role'])) { ?>
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
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
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
                <?php if (in_array($authUser['user_role'], ['accountant']) || isset($authUser['user_original_role'])) { ?>
                    <div class="client" ng-repeat="itm in lists.clients track by $index" ng-if="itm.rec_state == 12">
                        <!-- Client row Start -->

                        <div class="client-row">
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                            doGet('/admin/clients/index?list=1', 'list', 'clients');">
                        </button> -->
                            <!-- <button type="button" id="client_btn" class="hideIt" ng-click="
                                doGet('/admin/clients/index?list=1', 'list', 'clients');">
                            </button> -->

                            <div class="row m-1">
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
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
                <?php if (!in_array($authUser['user_role'], ['aftersale', 'accountant']) || isset($authUser['user_original_role'])) { ?>
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
                                <?php if (!in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.field', 'cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
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
                                                <div class="mx-2"   type="button"   data-toggle="tooltip" data-placement="top" title="<?= __('set_the_priorty') ?>"
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
                                            <div class="note-flex">

                                                <span class="sm-txt">
                                                    <?= __('budget') ?>
                                                </span>

                                                <div class="mx-2"   type="button"  data-toggle="tooltip" data-placement="top" title="<?= __('set_the_budget') ?>"
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
                                                    <?= __('rec_state') ?>
                                                </span>
                                                <div class="mx-2"  type="button" data-toggle="tooltip" data-placement="top" title="<?= __('set_the_status') ?>"
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
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#viewReport_mdl"
                                                    ng-click="doGet('/admin/clients?id='+itm.id, 'rec', 'client');"
                                                    class="btn-link">
                                                    <?= __('view_allNotes') ?>
                                                </a>


                                            </div>
                                            <button class="wb-ele sm-txt-indx" type="button" ng-click="
                                                        updateModalElement('Notes');
                                                        openModal('#subModal');
                                                        rec.report.tar_id = itm.id;
                                                        doGet('/admin/reports?id=' + itm.reports[itm.reports.length - 1].id, 'rec', 'report');
                                                        inlineElement('#elementsContainer', 1, 'notesindex');">
                                                <p ng-if="itm.reports.length > 0">
                                                    {{ itm.reports[itm.reports.length - 1].report_text }}
                                                </p>
                                                <p ng-if="itm.reports == 0">
                                                    -
                                                </p>
                                            </button>


                                            <span class="sm-txt">
                                                <?= __('offers') ?>
                                            </span>
                                            <button class="wb-ele sm-txt-indx" type="button" ng-click="
                                                        setZIndex();
                                                        newEntity('offer'); 
                                                        openModal('#subModal'); 
                                                        doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                        inlineElement('#elementsContainer', 1, 'offers')">
                                                <p ng-if="itm.offers.length > 0">
                                                    Sent {{ itm.offers.length }} Offers
                                                </p>
                                                <p ng-if="itm.offers == 0">
                                                    -
                                                </p>

                                            </button>


                                            <span class="sm-txt">
                                                <?= __('deals_properties') ?>
                                            </span>
                                            <button class="wb-ele sm-txt-indx" type="button" ng-click="
                                                    setZIndex();
                                                    openModal('#subModal'); 
                                                    doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                    inlineElement('#elementsContainer', 1, 'reservation')">
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
                                                    {{ itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[0] }}
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
                                                    {{ itm.reminders[itm.reminders.length - 1].reminder_nextcall.split('
                                                    ')[1] }}
                                                </p>
                                            </button>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mb-2">
                                                            <div class="btn btn-gray mt-1" type="button" ng-click="setZIndex();
                                                                newEntity('reminder'); 
                                                                openModal('#subModal'); 
                                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                                inlineElement('#elementsContainer', 1, 'reminders')">
                                                                <?= __('snooze') ?>
                                                            </div>

                                                        </div>
                                                        <div class="col-6">
                                                            <div class="flex-center text-center">
                                                                <label class="switch">
                                                                    <input ng-model="rec.client.action.action_type"
                                                                        ng-change="actionSave(itm.id, 75)"
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
                                                                    <input ng-model="rec.client.action.action_type"
                                                                        ng-click="doGet('/admin/clients?id=' + itm.id, 'rec', 'client');rec.action.client_id = itm.id;
                                                                        actionSave(itm.id, 76);" ng-true-value="76"
                                                                        name="invoice" id="finance-client4"
                                                                        type="checkbox" />
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <label for="finance-client4">
                                                                    <?= __('spoken') ?>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-md-6 col-12 ">
                                                            <div class="flex-center text-center">
                                                                <label class="switch">
                                                                    <input ng-model="rec.client.action.action_type"
                                                                        ng-change="
                                                                            rec.client.action.client_id = rec.client.id;
                                                                            actionSave();" ng-true-value="75" type="checkbox" />
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <label for="finance-client3">
                                                                    <?= __('called') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 ">
                                                            <div class="flex-center text-center">
                                                                <label class="switch">
                                                                    <input ng-model="rec.client.action.action_type"
                                                                        ng-change="
                                                                            rec.client.action.client_id = rec.client.id;
                                                                            actionSave();" ng-true-value="76" name="invoice"
                                                                        id="finance-client4" type="checkbox" />
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <label for="finance-client3">
                                                                    <?= __('spoken') ?>
                                                                </label>
                                                            </div>
                                                        </div> -->





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
                                            <span class="sm-txt">
                                                <?= __('client_current_stage') ?>
                                            </span>
                                            <div class="wb-ele" type="button" ng-click="setZIndex();
                                                updateModalElement('Assign');
                                                newEntity('book'); 
                                                openModal('#subModal'); 
                                                doGet('/admin/clients?id=' + itm.id, 'rec', 'client');
                                                inlineElement('#elementsContainer', 1, 'assign')">
                                                <!-- {{DtSetter('client_current_stageSale', itm.client_current_stage)}} -->
                                                {{itm.user_client[itm.user_client.length - 1].user.user_fullname}}
                                                <!-- assign.user.user_fullname -->
                                                <!-- {{itm}} -->
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mb-2">
                                                            <div class="btn btn-gray mt-1" type="button" ng-click="
                                                                rec.user_client.recState = 2;
                                                                rec.user_client.client_id = itm.id;
                                                                doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                                                                doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');
                                                                ">
                                                                <?= __('request_reallocation') ?>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
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
<?php echo $this->element('Modals/viewReport') ?>