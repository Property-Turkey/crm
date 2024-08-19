<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
?>

<div id="indxPg" class="right_col" role="main" ng-init="
        doGet('/admin/clients/index/<?= $_pid ?>?list=1', 'list', 'clients');
        doGet('/admin/clients/getTeamMembers', 'rec', 'getTeamMember');">


    <main>

        <section class=" container-fluid">
            <h2 class="client-num">
                <?= __('clients') ?> ({{paging.count}})
            </h2>
            <form class="dropdowns">

                <div class="flex-gap-10 flex-wrap">
                    <button name="menu-toggle" id="filterClose" ng-click="toggleFilter()" class=" btn btn-gray">
                        Filters <i class="fa fa-filter" id="filterClose"></i>
                    </button>
                    <div class="filter">
                        <div class="btn-exit">
                            <button ng-click="toggleFilter()"><i class="fas-left"></i>Back </button>
                        </div>

                        <div class="m-2">


                            <label class="mt-3">
                                <!-- <span class="sm-txt">
                                    <?= __('Call Lists') ?>
                                </span> -->

                                <!-- Previous Call List Button -->
                                <button class="drpbtn" ng-click="rec.search.prevId = 'prevId'; doSearch();">
                                    <i class="fa fa-history "></i> <?= __('prev_callList') ?>
                                </button>


                                <!-- Future Call List Button -->
                                <button class="drpbtn " ng-click="rec.search.futureId = 'futureId'; doSearch();">
                                    <i class="fa fa-clock-o"></i> <?= __('future_callList') ?>
                                </button>

                                <!-- Recent Clients Button -->
                                <button class="drpbtn " ng-click="rec.search.recentId = 'recentId'; doSearch();">
                                    <i class="fa fa-user-plus "></i> <?= __('fresh_clients') ?>
                                </button>
                            </label>


                            <label class="relative">
                                <span class="sm-txt">
                                    <?= __('client_tags') ?>
                                </span>

                                <tags-input style="padding: 0px;padding-left: 10px;" class="wb-txt-inp"
                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    ng-model="rec.search.client_tags" add-from-autocomplete-only="true" max-tags="1"
                                    placeholder="<?= __('client_tags') ?>" display-property="text" key-property="value">
                                    <auto-complete min-length="1" highlightMatchedText="true"
                                        source="loadTags($query, 'pmscategories', 8)"></auto-complete>
                                </tags-input>

                                <span ng-click="doSearch()" class="fa fa-search doSearch"></span>

                            </label>

                            <label class="relative">
                                <span class="sm-txt">
                                    <?= __('adrs_country') ?>
                                </span>

                                <tags-input style="padding: 0px;padding-left: 10px;" class="wb-txt-inp"
                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    ng-model="rec.search.adrs_country" add-from-autocomplete-only="true" max-tags="1"
                                    placeholder="<?= __('adrs_country') ?>" display-property="text"
                                    key-property="value">
                                    <auto-complete min-length="1" highlightMatchedText="true"
                                        source="loadTags($query, 'pmscategories', 7)"></auto-complete>
                                </tags-input>

                                <span ng-click="doSearch();" class="fa fa-search doSearch"></span>
                            </label>



                            <label for="" class="" ng-if="rec.search.adrs_country">
                                <span class="sm-txt">
                                    <?= __('Phones') ?>
                                </span>
                                <button class="btn btn-danger">

                                    <span ng-repeat="tag in rec.search.adrs_country track by $index" ng-click="
                                    setZIndex();
                                    updateModalElement('phones'); 
                                    openModal('#subModal'); 
                                    doGet('/admin/clients/getTeamMembers?adrs_country='+tag.value, 'rec', 'client');
                                    inlineElement('#elementsContainer', 1, 'view-phones')">
                                        {{ tag.text }}{{ $index < (rec.search.adrs_country.length - 1) ? ',' : '' }}
                                    </span>
                                    Phones
                                </button>
                            </label>


                            <label for="" class="">
                                <span class="sm-txt">
                                    <?= __('source_id') ?>
                                </span>
                                <?= $this->Form->control('status_id', [
                                    'class' => 'wb-ele-select col-12',
                                    'label' => false,
                                    'type' => 'select',
                                    'options' => $this->Do->cat(33),
                                    'empty' => __('please_select'),
                                    'ng-model' => 'rec.search.source_id',
                                    'ng-change' => 'doSearch()',
                                ]) ?>

                            </label>

                            <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>

                                <label class="">
                                    <span class="sm-txt">
                                        <?= __('rec_state') ?>
                                    </span>

                                    <select class="wb-ele-select col-12" ng-model="rec.search.rec_state"
                                        ng-change="doSearch()">
                                        <option value="" selected><?= __('please_select') ?></option>
                                        <option
                                            ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                            value="{{ recStateId }}">
                                            {{ recStateName }}
                                        </option>
                                    </select>
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

                            <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>

                                <label class="">
                                    <span class="sm-txt">
                                        <?= __('pool_id') ?>
                                    </span>
                                    <select class="wb-ele-select col-12" ng-model="rec.search.pool_id"
                                        ng-change="doSearch()">
                                        <option value="Select" empty="true">
                                            <?= __('please_select') ?>
                                        </option>
                                        <option ng-repeat="category in rec.pool.categories" value="{{category.id}}">
                                            {{category.category_name}}
                                        </option>
                                    </select>
                                </label>
                            <?php } ?>

                            <?php if (in_array($authUser['user_role'], ['admin.teamleader']) || isset($authUser['user_original_role'])) { ?>
                                <label class="">
                                    <span class="sm-txt">
                                        <?= __('my_members') ?>
                                    </span>
                                    <select class="wb-ele-select col-12" ng-model="rec.search.selectedMember"
                                        ng-change="doSearch()">
                                        <option value="" empty="true">
                                            <?= __('please_select') ?>
                                        </option>
                                        <option ng-repeat="member in rec.getTeamMember" value="{{member.id}}">
                                            {{member.user_fullname}}
                                        </option>
                                    </select>
                                    {{rec.search.selectedMember}}
                                </label>
                            <?php } ?>


                        </div>
                    </div>

                    <div class="filter-bg">
                        <div>
                            <button class="hideIt" ng-click="toggleFilter()"></button>
                        </div>
                    </div>

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


                    <!-- <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                        <button class="btn btn-warning" ng-click="multiHandle('/admin/clients/delete')">
                            Delete
                        </button>
                    <?php } ?> -->

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
                        <form class="search-leads-form">
                            <i class="fas-search"></i>
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.client_mobile"
                                placeholder="Search Clients Mobile" />
                        </form>
                        <form class="search-leads-form">
                            <i class="fas-search"></i>
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.client_email"
                                placeholder="Search Clients Email" />
                        </form>
                        <form class="search-leads-form">
                            <i class="fas-search"></i>
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.id"
                                placeholder="Search Clients ID" />
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
                        <div class="row m-1">

                            <?php if (in_array($authUser['user_role'], ['admin.callcenter', 'admin.admin', 'admin.root', 'admin.portfolio', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                <div class="checkbox">

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


                    <?php if (in_array($authUser['user_role'], ['aftersale']) || isset($authUser['user_original_role'])) { ?>
                        <div class="client" ng-repeat="itm in lists.clients track by $index" ng-if="itm.rec_state == 13">
                            <!-- Client row Start -->

                            <div class="client-row">

                                <div class="row m-1">
                                    <?php if (!in_array($authUser['user_role'], ['admin.callcenter', 'admin.admin', 'admin.root', 'admin.portfolio', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                        <div class="checkbox col-1">

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

                                            </div>
                                        </div>



                                        <div class="col-lg-2 col-12 budget">
                                            <div class="col-4 title hideWeb">Budget</div>
                                            <div class="col-6 p-0 col-lg-12">

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

                                                    {{itm.user_client[itm.user_client.length - 1].user.user_fullname}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Client row End -->

                        </div>
                    <?php } ?>







                    <?php if (!in_array($authUser['user_role'], ['aftersale']) || isset($authUser['user_original_role'])) { ?>
                        <div class="client accordion-item" ng-repeat="itm in lists.clients track by $index">
                            <!-- Client row Start -->

                            <div class="client-row">

                                <div class="row m-1">
                                    <?php if (!in_array($authUser['user_role'], ['admin.callcenter', 'admin.admin', 'admin.portfolio', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
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
                                                        ng-if="itm.client_priority == null;">
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

                                                    {{itm.client_mobile }}
                                                </p>
                                                <!-- <p><i class="fas-phone"></i> {{ itm.client_mobile | phoneFormat }}</p> -->

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

                                                <p class="">
                                                    <?= $this->Form->text('category_id', [
                                                        'type' => 'select',
                                                        'options' => $this->Do->cat(37),
                                                        'class' => 'wb-ele sm-txt-indx col-12' . (in_array($authUser['user_role'], ['field', 'accountant']) ? ' disabled-select' : ''),
                                                        'ng-model' => 'itm.category_id',
                                                        'ng-change' => "saveFromindexCategory(itm)",
                                                        'disabled' => in_array($authUser['user_role'], ['field', 'accountant']) ? 'disabled' : false
                                                    ]) ?>
                                                </p>


                                                <span class="sm-txt">
                                                    <?= __('budget') ?>
                                                </span>

                                                <p>
                                               
                                                <div class="mx-2" type="button"
                                                    my-tooltip="<?= __('set_the_budget') ?>"
                                                    ng-if="itm.client_budget == null;">
                                                    <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                        <small class="note-font">
                                                            <?= __('set_the_budget') ?>
                                                        </small>
                                                    </i>
                                                </div>

                                                <?= $this->Form->select(
                                                    'client.client_budget',
                                                    [
                                                        '' => 'Select One',
                                                        '50000' => 'Up to Dolar 50k',
                                                        '100000' => 'Up to Dolar 100k',
                                                        '150000' => 'Up to Dolar 150k',
                                                        '200000' => 'Up to Dolar 200k',
                                                        '300000' => 'Up to Dolar 300k',
                                                        '400000' => 'Up to Dolar 400k',
                                                        '500000' => 'Up to Dolar 500k',
                                                        '750000' => 'Up to Dolar 750k',
                                                        '1000000' => 'Up to Dolar 1m',
                                                        '1500000' => 'Up to Dolar 1.5m',
                                                        '2000000' => 'Up to Dolar 2m',
                                                        '2000001' => 'Dolar 2m +',
                                                    ],
                                                    [
                                                        'class' => 'wb-ele sm-txt-indx col-12' . (in_array($authUser['user_role'], ['field', 'accountant']) ? ' disabled-select' : ''),
                                                        'label' => false,
                                                        'ng-model' => 'itm.client_budget',
                                                        'ng-change' => "saveFromindexBudget(itm)",
                                                        'disabled' => ($authUser['user_role'] === 'field') ? 'disabled' : false
                                                    ]
                                                ) ?>
                                                </p>

                                                <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'field']) || isset($authUser['user_original_role'])) { ?>
                                                    <p class="sm-txt">
                                                        <?= __('rec_state') ?>
                                                    </p>
                                                    <p>
                                                        <select
                                                            class="wb-ele sm-txt-indx col-12 <?= ($authUser['user_role'] === 'field') ? 'disabled-select' : '' ?>"
                                                            ng-model="itm.rec_state" ng-change="saveFromindexStatus(itm)"
                                                            <?= ($authUser['user_role'] === 'field') ? 'disabled' : '' ?>>
                                                            <option ng-click="handleButtonClick(recStateId);"
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                                                value="{{ recStateId }}"
                                                                ng-selected="recStateId === itm.rec_state">
                                                                {{ recStateName }}
                                                            </option>
                                                        </select>
                                                    </p>
                                                <?php } ?>

                                                <?php if (!in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'field']) || isset($authUser['user_original_role'])) { ?>
                                                    <p class="sm-txt">
                                                        <?= __('rec_state') ?>
                                                    </p>
                                                    <p>
                                                        <select
                                                            class="wb-ele sm-txt-indx col-12 <?= (in_array($authUser['user_role'], ['field', 'accountant'])) ? 'disabled-select' : '' ?>"
                                                            ng-model="itm.rec_state" ng-change="saveFromindexStatus(itm)"
                                                            <?= ($authUser['user_role'] === 'field') ? 'disabled' : '' ?>>
                                                            <option ng-click="handleButtonClick(recStateId);"
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                                                value="{{ recStateId }}"
                                                                ng-selected="recStateId === itm.rec_state"
                                                                ng-if="recStateId != 13 && recStateId != 11 && recStateId != 16 && recStateId != 17">
                                                                {{ recStateName }}
                                                            </option>
                                                        </select>
                                                    </p>
                                                <?php } ?>
                                            </div>
                                        </div>



                                        <div class="col-lg-2 col-12 info mr-24">
                                            <div class="col-4 title hideWeb">
                                                <?= __('notes_offers') ?>
                                            </div>
                                            <div class="col-6 p-0 col-lg-12">



                                                <span class="sm-txt">
                                                    <?= __('notes') ?>
                                                </span>


                                                <div class="<?= (in_array($authUser['user_role'], ['accountant']) ? 'disabled-accoridon' : 'accordion-button') ?>"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#{{itm.id}}"
                                                    aria-expanded="true" aria-controls="{{itm.id}}">
                                                    <p ng-if="itm.reports.length > 0"
                                                        class="wb-ele sm-txt-indx <?= (in_array($authUser['user_role'], ['accountant']) ? 'disabled-input' : '') ?>">
                                                        {{ itm.reports[itm.reports.length - 1].report_text }}
                                                    </p>
                                                    <p ng-if="itm.reports == 0"
                                                        class="wb-ele sm-txt-indx <?= (in_array($authUser['user_role'], ['accountant']) ? 'disabled-input' : '') ?>">
                                                        -
                                                    </p>
                                                </div>



                                                <span class="sm-txt">
                                                    <?= __('offers') ?>
                                                </span>




                                                <p ng-if="itm.offers.length > 0" class="wb-ele sm-txt-indx">
                                                    Sent {{ itm.offers.length }} Offers
                                                </p>
                                                <p ng-if="itm.offers == 0" class="wb-ele sm-txt-indx">
                                                    -
                                                </p>




                                                <span class="sm-txt">
                                                    <?= __('deals_properties') ?>
                                                </span>




                                                <p ng-if="itm.reservations.length > 0" class="wb-ele sm-txt-indx">
                                                    Sent {{ itm.reservations.length }} Properties
                                                </p>
                                                <p ng-if="itm.reservations == 0" class="wb-ele sm-txt-indx">
                                                    -
                                                </p>


                                            </div>


                                        </div>



                                        <div class="col-lg-2 col-12 mr-24 info">
                                            <div class="col-4 title hideWeb">Reminders</div>
                                            <div class="col-6 p-0 col-lg-12">



                                                <span class="sm-txt">
                                                    <?= __('next_call') ?>
                                                </span>


                                                <input ng-change="saveFromindexNextcall(itm);"
                                                    ng-model="itm.reminders[itm.reminders.length - 1].reminder_nextcall"
                                                    date-format type="datetime-local"
                                                    class="wb-ele sm-txt-indx <?= (in_array($authUser['user_role'], ['field', 'accountant']) ? 'disabled-input' : '') ?>"
                                                    name="" id="" <?= ($authUser['user_role'] === 'field') ? 'disabled' : '' ?> />


                                                <?php if (in_array($authUser['user_role'], ['admin.callcenter', 'callcenter', 'admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
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
                                                    </div><?php } ?>
                                            </div>
                                        </div>



                                        <!-- <div class="col-lg-2 col-12  info">
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


                                                <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                    <div class="wb-ele">

                                                        <div ng-repeat="notify in itm.user_client track by $index">
                                                            {{notify.user.user_fullname}}
                                                            <small>
                                                                <i my-tooltip="<?= __('require_reallocation') ?>"
                                                                    ng-if="notify.rec_state == 2"
                                                                    class="fa fa-exclamation-circle redColor"
                                                                    aria-hidden="true"></i>
                                                            </small>{{$index < (itm.user_client.length - 1) ? ',' : '' }} </div>
                                                        </div>

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
                                                    </div>
                                                <?php } ?>






                                                <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                    <div class="wb-ele" type="button" ng-click="
                                                setZIndex();
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



                                                        


                                                        <div class="row"
                                                            ng-repeat="(recStateId, recStateName) in itm.user_client track by (recStateName.id + recStateName.user.user_fullname)">

                                                        



                                                            <div class="heading mb-2" ng-if="recStateName.rec_state == 2">
                                                                <div class="title" style="color: #7d7d7d;">
                                                                    {{recStateName.user.user_fullname}}</div>
                                                            </div>

                                                            <div class="row" ng-if="recStateName.rec_state == 2"
                                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                                <div class="col-6" style="flex: 0 0 45%; margin: 0 5%;">
                                                                    <div class="btn btn-gray mt-1" type="button" ng-click="
            rec.user_client.accept = 2;
            rec.user_client.client_id = recStateName.client_id;
            rec.user_client.user_id = recStateName.user.id;
            doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
            doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                                        Accept
                                                                    </div>
                                                                </div>
                                                                <div class="col-6" style="flex: 0 0 45%; margin: 0 5%;">
                                                                    <div class="btn btn-gray mt-1" type="button" ng-click="
            rec.user_client.reject = 2;
            rec.user_client.client_id = recStateName.client_id;
            rec.user_client.user_id = recStateName.user.id;
            doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
            doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                                        Reject
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <form class="row col-12 inlineElement"
                                                                ng-if="recStateName.rec_state == 2"
                                                                ng-submit="
                                                                    rec.user_client.client_id = recStateName.client_id;
                                                                    rec.user_client.reallocate = 2;
                                                                    rec.user_client.userclient_id = recStateName.id;

                                                                    doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');">

                                                                <label for="" class="col-6 col-sm-12">
                                                                    <span class="sm-txt">
                                                                        <?= __('client_current_stage') ?>
                                                                    </span>
                                                                    <tags-input style="padding: 0px;padding-left: 10px;"
                                                                        ng-model="rec.user_client.user"
                                                                        add-from-autocomplete-only="true"
                                                                        placeholder="Select <?= __('client_current_stage') ?>"
                                                                        display-property="text" key-property="value"
                                                                        class="wb-txt-inp"
                                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                                        <auto-complete min-length="0" load-on-focus="true"
                                                                            load-on-empty="true" max-results-to-show="30"
                                                                            source="loadTags($query, 'users', '', 'admin.callcenter')">
                                                                        </auto-complete>
                                                                    </tags-input>
                                                                </label>

                                                                <div class="down-btns mt-1 d-flex justify-content-start">
                                                                    <div class="flex-gap-10 ">
                                                                        <button class="btn btn-danger" id="userclient_preloader"
                                                                            type="submit" style="white-space: nowrap;">
                                                                            <?= __('change_advisor') ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                            <form class="row col-12 inlineElement"
                                                                ng-if="recStateName.rec_state == 2" id="client_form"
                                                                ng-submit="
                                                                rec.client.client_id = recStateName.client_id;
                                                                rec.client.user_id = recStateName.user_id;
                                                                doSave(rec.client, 'client', 'clients', '#client_btn', '#userpool_preloader');">

                                                                <label class="col-md-6 col-12 col-lg-12">
                                                                    <span class="sm-txt">
                                                                        <?= __('pool_name') ?>
                                                                    </span>
                                                                    <tags-input placeholder="Add This Client to Pool"
                                                                        style="padding: 0px;padding-left: 10px;"
                                                                        ng-model="rec.client.pool" class="wb-txt-inp"
                                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                                        <auto-complete min-length="0" load-on-focus="true"
                                                                            load-on-empty="true" max-results-to-show="30"
                                                                            source="loadTags($query, 'categories', 28)">
                                                                        </auto-complete>
                                                                    </tags-input>
                                                                </label>

                                                                <div class="down-btns mt-1 d-flex justify-content-start">
                                                                    <div class="flex-gap-10 ">
                                                                        <button type="submit" class="btn btn-danger"
                                                                            id="userpool_preloader">
                                                                            <?= __('change_pool') ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>


                                    </div>

                                </div> -->


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
                                                        ng-repeat="itm.user_client.rec_state == 2">


                                                    </div>

                                                </div>


                                                <?php if (!in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                    <div class="wb-ele">

                                                        <div ng-repeat="notify in itm.user_client track by $index">
                                                            {{notify.user.user_fullname}}
                                                            <small>
                                                                <i my-tooltip="<?= __('require_reallocation') ?>"
                                                                    ng-if="notify.rec_state == 2"
                                                                    class="fa fa-exclamation-circle redColor"
                                                                    aria-hidden="true"></i>
                                                            </small>{{$index < (itm.user_client.length - 1) ? ',' : '' }}
                                                        </div>
                                                    </div>
                                                    <?php if (in_array($authUser['user_role'], ['admin.callcenter']) || isset($authUser['user_original_role'])) { ?>
                                                        <div class="row" ng-repeat="reallocate in itm.user_client">
                                                            <div>
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
                                            </div>
                                        <?php } ?>






                                        <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                            <div class="wb-ele" type="button" ng-click="
                                                    setZIndex();
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
                                                    </small>{{$index < (itm.user_client.length - 1) ? ',' : '' }}
                                                </div>
                                            </div>



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
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>


                            </div>

                        </div>


                        <div id="{{itm.id}}" class="accordion-collapse collapse "
                            style="background-color: #f7f0e2;">
                            <div class="mx-4 py-5">

                                <div class="accordion" id="accordionNotesForm">
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseForm{{itm.id}}" aria-expanded="false"
                                                aria-controls="collapseForm{{itm.id}}">
                                                <?= __('add_notes') ?>
                                            </button>
                                        </h2>





                                        <div id="collapseForm{{itm.id}}" class="accordion-collapse collapse p-3"
                                            aria-labelledby="headingTwo">

                                            <form class="row inlineElement"
                                                ng-submit="
                                                                rec.report.tar_tbl = 'Clients'; 
                                                                rec.report.tar_id = itm.id;  
                                                                doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');">
                                                <div class="row">
                                                    <label class="col-md-6 col-12 col-lg-3">
                                                        <span class="sm-txt"><?= __('report_type') ?></span>
                                                        <?= $this->Form->control('report_type', [
                                                            'type' => 'select',
                                                            'label' => false,
                                                            'options' => $this->Do->cat(53),
                                                            'class' => 'wb-ele-select-modal col-12',
                                                            'ng-model' => 'rec.report.report_type'
                                                        ]) ?>
                                                    </label>
                                                    <label class="col-md-6 col-12 col-lg-3"
                                                        style="position: relative;">
                                                        <span class="sm-txt"> <?= __('property_id') ?> </span>
                                                        <tags-input style="padding: 0px;padding-left: 10px;"
                                                            class="wb-txt-inp"
                                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                            ng-model="rec.report.property"
                                                            add-from-autocomplete-only="true" max-tags="1"
                                                            placeholder="<?= __('property_id') ?>"
                                                            display-property="text" key-property="value"
                                                            ng-disabled="rec.report.property"
                                                            ng-style="{'background-color': rec.report.property ? '#eeeeee' : 'initial'}">
                                                            <auto-complete min-length="0" load-on-focus="true"
                                                                load-on-empty="true" max-results-to-show="30"
                                                                source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                                        </tags-input>
                                                        <span ng-if="rec.report.property_id"
                                                            ng-click="rec.report.property = ''; rec.report.property_id = '';"
                                                            class="fa fa-times"
                                                            style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>
                                                    </label>
                                                    <label for="" class="col-12">
                                                        <span class="sm-txt"> Note </span>
                                                        <textarea ng-model="rec.report.report_text"
                                                            class="wb-txt-inp" name="" id="" cols="30" rows="3"
                                                            placeholder="The Note"></textarea>
                                                    </label>
                                                </div>
                                                <div class="down-btns mt-4 d-flex justify-content-end">
                                                    <div class="flex-gap-10">
                                                        <button class="btn btn-danger" id="report_preloader"
                                                            type="submit"><?= __('save_changes') ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <div class="accordion" id="accordionNotes">
                                    <div class="accordion-item mb-2">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{itm.id}}2" aria-expanded="false"
                                                aria-controls="{{itm.id}}2">
                                                <?= __('view_allNotes') ?>
                                            </button>
                                        </h2>
                                        <!-- <div class=" indexNotes box-heading d-flex ">
                                                    <div class="col-lg-2 text-nowrap">
                                                        <i class="fas-sticky-note"></i> {{
                                                        clsale.type_category.category_name }}
                                                        {{DtSetter('rec_stateSale', clsale.client_current_stage,
                                                        clsale.report_type)}},
                                                        <b>by {{ clsale.user.user_fullname }}</b>
                                                        <p>
                                                            <i class="fas-home"></i>
                                                            {{ clsale.property.property_ref}}
                                                        </p>
                                                    </div>


                                                    <div class="col-lg-8 text p-2">
                                                        <p>
                                                            {{ clsale.report_text }}
                                                        </p>
                                                    </div>


                                                    <div class="flex-center flex-gap-10">
                                                        <b> {{ clsale.stat_created.split(' ')[1] }} </b>
                                                        <?php if (in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                                            <div class="dropdown">
                                                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="fas-ellipsis"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    
                                                                    <li id="delete_preloader">
                                                                        <a class="dropdown-item delete-btn" ng-click="
                                                                    updateModalElement('Notes');
                                                                    openModal('#subModal'); 
                                                                    setZIndex();

                                                                    doGet('/admin/reports?id=' + clsale.id, 'rec', 'report');
                                                                    inlineElement('#elementsContainer', 1, 'notes');"
                                                                            href="#">
                                                                            <?= __('edit') ?>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        <?php } ?>


                                                    </div>
                                                </div> -->
                                        <div class="indexNotes">
                                            <div id="{{itm.id}}2" ng-repeat="clsale in itm.reports track by $index"
                                                class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne">

                                                <div ng-click="fillReportForm(clsale)">

                                                    <div class="grid">
                                                        <div class="heading">
                                                            <div class="title"></div>
                                                        </div>
                                                        <div class="noData" ng-if="itm.reports == ''">
                                                            <?= __('no_data') ?>
                                                        </div>
                                                        <div class="note index-note">
                                                            <div class="box-heading d-flex">
                                                                <div class="col-lg-2 text-nowrap">
                                                                    <i class="fas-sticky-note"></i>
                                                                    {{ clsale.type_category.category_name }}
                                                                    {{DtSetter('rec_stateSale',
                                                                            clsale.client_current_stage,
                                                                            clsale.report_type)}}
                                                                    ,<b> {{ clsale.user.user_fullname }}</b>
                                                                    <p>
                                                                        <i class="fas-home"></i>
                                                                        {{ clsale.property.property_ref}}
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-8 text p-2">
                                                                    <p>{{ clsale.report_text }}</p>
                                                                </div>
                                                                <div class="flex-center flex-gap-10">
                                                                    <b> {{ clsale.stat_created.split(' ')[1]}} </b>

                                                                    <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                                        <div class="dropdown">
                                                                            <button class="btn" type="button"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="fas-ellipsis"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <!-- <li id="delete_preloader">
                                                                                    <a class="dropdown-item delete-btn"
                                                                                        ng-click="doDelete('/admin/reports/delete/' + clsale.id);
                                                                                        doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');"
                                                                                        href="#">Delete</a>
                                                                                </li> -->
                                                                                <li id="delete_preloader">
                                                                                    <a class="dropdown-item delete-btn"
                                                                                        ng-click="
                                                                                        updateModalElement('Notes');
                                                                                        openModal('#subModal'); 
                                                                                        setZIndex();

                                                                                        doGet('/admin/reports?id=' + clsale.id, 'rec', 'report');
                                                                                        inlineElement('#elementsContainer', 1, 'notes');"
                                                                                        href="#">
                                                                                        <?= __('edit') ?>
                                                                                    </a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    <?php } ?>
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