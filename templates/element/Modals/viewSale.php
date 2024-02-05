<div class="modal fade" id="viewSale_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.sale.user}} -->

        <div class="modal-content">
            <div class="lead-preview" >
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>Lead Preview
                    </button>
                </div>
                

                <!-- <div class="green-btns">
                    <div class="green-btn">
                        <i class="fas-check"></i> 
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Assigned
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Intrested
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Raised
                    </div>
                </div> -->

                <div id="container" class="container mt-5">
                    <div class="horizontal-scroll">
                        <div class="controls d-flex justify-content-between">
                            <div class="fas-check button green-btn"
                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', rec.sale.sale_current_stage)"
                                ng-class="{ 'green-btnStatus': recStateName === DtSetter('rec_stateSale', rec.sale.sale_current_stage, rec.sale.rec_state) }">
                                {{ recStateName }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush" id="client1">
                    <?php
                    // <!-- Contact Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseOne" aria-expanded="true"
                                aria-controls="client1-collapseOne">
                                <span class="title">Contact</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <?php
                                // <!-- Contact Settings -->
                                ?>
                                <div class="heading">
                                    <div class="title">Contact Setting</div>
                                    <div class="flex-center flex-gap-5">

                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="
                                                doGet('/admin/clients?id='+rec.sale.client.id, 'rec', 'client');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'contact-setting')">
                                            <i class="fas-plus"></i>
                                            <?= __('edit_contact') ?>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-plus"></i>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-phone"></i>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-mail"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="sm-btn" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Name </span>
                                            <div class="wb-ele">{{rec.sale.client.client_name}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Phone </span>
                                            <div class="wb-ele">{{rec.sale.client.client_mobile}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Email </span>
                                            <div class="wb-ele">{{rec.sale.client.client_email}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Country </span>
                                            <div class="wb-ele">{{ rec.sale.client.country.adrs_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{ rec.sale.client.source.category_name
                                                    }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // <!-- Info Section -->
                                ?>
                                <div class="heading">
                                    <div class="title">Info</div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="doGet('/admin/sales?id=' + rec.client.sales[0].id, 'rec', 'client'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'info')">
                                            <i class="fas-plus"></i>
                                            <?= __('edit_info') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.category.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('pool_id') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.pool.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.sale.sale_tags track by $index">{{$index >
                                                    0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_propertytype') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.sale.sale_specs[0].salespec_propertytype track by $index">{{$index
                                                    > 0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_beds') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.sale.sale_specs[0].salespec_beds track by $index">{{$index
                                                    > 0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('sale_budget') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].currency.category_name }} {{
                                                rec.sale.sale_spec[0].salespec_currency }} {{ rec.sale.sale_budget }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_location') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].salespec_loction_target }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('buyer_persona') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].persona.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('social_style_model') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].style.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('lead_priority') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <div class="priority">
                                                    <em ng-class="{
                                                            'low': rec.sale.client_priority >= 1 && rec.sale.client_priority <= 3,
                                                            'med': rec.sale.client_priority > 3 && rec.sale.client_priority <= 6,
                                                            'high': rec.sale.client_priority > 6 && rec.sale.client_priority <= 10
                                                        }"></em>{{ DtSetter('sale_priorities',
                                                    rec.sale.client_priority) }}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('rec_state') ?>
                                            </span>
                                            <div class="wb-ele">{{ DtSetter('rec_stateSale', rec.sale.sale_current_stage, rec.sale.rec_state) }}</div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('action_type') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.actions[0].action.category_name }}</div>
                                        </div>

                                    </div>
                                </div>

                                <!-- 
                                    <?php
                                    // <!-- Finance Section -->
                                    ?>
                                    <div class="heading">
                                        <div class="title">Finances</div>
                                        <div class="flex-gap-10">
                                            <button class="btn btn-modal" id="modalBtn" ng-click="doGet('/admin/sales?id=' + rec.sale.id, 'rec', 'sale');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'finance')">
                                                <i class="fas-plus"></i> Edit Finances
                                            </button>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <form class="row">
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Finances in Place</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '187'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '187'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>All cash payment</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '188'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '188'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Ready to buy now</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '189'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '189'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Decision maker is present</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '190'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '190'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                -->

                                <!-- <?php
                                // <!-- Status Settings -->
                                ?>
                                <div class="heading">
                                    <div class="title">Status</div>
                                </div>
                                <div class="white-box">
                                    <button class="text-nowrap btn col-lg-2 col-12 m-1"
                                        ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', rec.sale.sale_current_stage)"
                                        ng-click="handleButtonClick(recStateId);"
                                        ng-class="{ 'btn-success': recStateName === DtSetter('rec_stateSale', rec.sale.sale_current_stage, rec.sale.rec_state),
                                                    'btn-light': recStateName !== DtSetter('rec_stateSale', rec.sale.sale_current_stage, rec.sale.rec_state) }">
                                        {{ recStateName }}
                                    </button>
                                </div> -->

                                <!-- <?php
                                // <!-- Action Settings -->
                                ?>
                                <div class="heading" ng-if="rec.sale.sale_current_stage == 3 " >
                                    <div class="title">Actions</div>
                                </div>
                                <div class="white-box" ng-if="rec.sale.sale_current_stage == 3 " >


                                    <form ng-submit="
                                        rec.action.sale_id = rec.sale.id; 
                                        doSave(rec.action, 'action', 'actions', '#action_btn', '#action_preloader');">
                                        
                                        
                                        <button 
                                            ng-click="newEntity('actions'); rec.action.action_type = '75'" 
                                            class="btn btn-modal btn-danger action-is-btn col-lg-2 col-12 m-1" 
                                            type="submit">
                                            {{ 'Is Called ?' }}
                                        </button>

                                        <button 
                                            ng-click="newEntity('action'); rec.action.action_type = '76'" 
                                            class="btn btn-modal btn-danger action-is-btn col-lg-2 col-12 m-1"
                                            type="submit">
                                            {{ 'Is Spoken ?' }}
                                        </button>

                                    </form> 

                                </div>-->

                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Notes and Empahty Section (Reports) -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseNote" aria-expanded="true"
                                aria-controls="client1-collapseNote">
                                <span class="title">Empahty Mapping and Notes</span>
                            </button>
                        </h2>
                        <div id="client1-collapseNote" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <?php
                                // <!-- Empahty Section -->
                                ?>
                                <div class="heading">
                                    <div class="title">Empathy Mapping</div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn">
                                            <div class="d-flex justify-content-between" ng-if="rec.sale.reports"
                                                ng-click="doGet('/admin/reports?report_type=empathy&id=' + rec.sale.id, 'rec', 'report'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'empathy')">
                                                <i class="fas-plus"></i>
                                                <?= __('edit_empathy') ?> /
                                                <?= __('add_empathy') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3"
                                            ng-repeat="report in rec.sale.reports track by $index"
                                            ng-if="(report.report_type == '201' || report.report_type == '202' || report.report_type == '203' || report.report_type == '204')">
                                            <div class="d-flex justify-content-between">
                                                <div class="sm-txt d-flex align-items-end mb-2"> Vebal
                                                </div>
                                            </div>
                                            <div class="wb-ele-empahty">{{ report.report_text }}</div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // <!-- Report Notes Section -->
                                ?>
                                <div class="heading">
                                    <div class="title">Notes</div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal"
                                            ng-click="openModal('#subModal'); doGet('/admin/reports?id=' + rec.client.sales[0].reports.id, 'rec', 'report'); inlineElement('#elementsContainer', 1, 'notes');">
                                            <i class="fas-plus"></i>
                                            <?= __('add_notes') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="note" ng-repeat="itm in rec.sale.reports track by $index"
                                    ng-if="!(itm.report_type == '201' || itm.report_type == '202' || itm.report_type == '203' || itm.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">
                                    
                                    <div class="box-heading d-flex">
                                        <div class="col-lg-2 text-nowrap">
                                            <i class="fas-sticky-note"></i> {{ itm.type.category_name }} {{DtSetter('rec_stateSale', rec.sale.sale_current_stage, itm.report_type)}}
                                            <b>{{ rec.sale.user.user_fullname }}</b>
                                            
                                        </div>

                                        
                                        <div class="col-lg-8 text truncate">
                                            <p>
                                                {{ itm.report_text }}
                                            </p>
                                        </div>


                                        <div class="flex-center flex-gap-10">
                                            <b> {{ itm.stat_created.split(' ')[1] }} </b>
                                            <div class="dropdown">
                                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item delete-btn"
                                                            ng-click="doDelete('/admin/reports/delete/' + itm.id)"
                                                            href="#">Delete</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" ng-click="openModal('#subModal'); 
                                                            doGet('/admin/reports?id=' + itm.id, 'rec', 'report'); 
                                                            inlineElement('#elementsContainer', 1, 'showNotes');"
                                                            href="#">Show</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <span class="spoken"></span>
                                    <div class="text">
                                        <p>{{ itm.report_text }}</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    

                    <!-- <?php
                    // Assign to Stage (for admin, supervisior...) Section 
                    ?>
                    <div class="accordion-item" ng-if="rec.sale.sale_current_stage == 2 || rec.sale.sale_current_stage == 4">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseAssignStage" aria-expanded="true"
                                aria-controls="client1-collapseAssignStage">
                                <span class="title">Assign to Stage</span>
                            </button>
                        </h2>
                        <div id="client1-collapseAssignStage" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="doGet('/admin/sales?id=' + rec.sale.id, 'rec', 'sale');
                                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'stageAssign')">
                                            <i class="fas-plus"></i>
                                            <?= __('add_assign') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-3">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-sm-6">
                                                <span class="sm-txt">
                                                    Advisor
                                                </span>
                                                <div class="wb-ele ng-binding">{{DtSetter('client_current_stageSale',
                                                    rec.sale.sale_current_stage)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->


                    <?php
                    // <!-- Assign Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseAssign" aria-expanded="true"
                                aria-controls="client1-collapseAssign">
                                <span class="title">Assign</span>
                            </button>
                        </h2>
                        <div id="client1-collapseAssign" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" ng-if="!(rec.sale.sale_current_stage == 2 || rec.sale.sale_current_stage == 4)" class="btn btn-modal"
                                            ng-click="doGet('/admin/usersale?lead_id=' + rec.sale.id, 'rec', 'user_sale');
                                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'assign')">
                                            <i class="fas-plus"></i>
                                            <?= __('add_assign') ?>
                                        </button>

                                        <button id="modalBtn" ng-if="rec.sale.sale_current_stage == 2" class="btn btn-modal"
                                            ng-click="doGet('/admin/usersale?lead_id=' + rec.sale.id, 'rec', 'user_sale');
                                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'assign')">
                                            <i class="fas-plus"></i>
                                            <?= __('cc_assign') ?>
                                        </button>

                                        <button id="modalBtn" ng-if="rec.sale.sale_current_stage == 4" class="btn btn-modal"
                                            ng-click="doGet('/admin/usersale?lead_id=' + rec.sale.id, 'rec', 'user_sale');
                                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'assign')">
                                            <i class="fas-plus"></i>
                                            <?= __('field_assign') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-3" ng-repeat="assign in rec.sale.user_sale track by $index">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-sm-6">
                                                <span class="sm-txt">
                                                    Advisor
                                                </span>
                                                <div class="wb-ele ng-binding">{{assign.user.user_fullname}}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12 col-sm-6">
                                                            <div class="flex-gap-10 justify-content-end align-items-center">
                                                                <label class="switch">
                                                                    <input disabled="" checked="" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <label> Snoose </label>
                                                            </div>
                                                        </div> -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <?php
                    // <!-- Booking Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseBooking" aria-expanded="true"
                                aria-controls="client1-collapseBooking">
                                <span class="title">Booking</span>
                            </button>
                        </h2>
                        <div id="client1-collapseBooking" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn"
                                            ng-click="doGet('/admin/books?id=' +rec.sale.book.id, 'rec', 'book'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'booking')">
                                            <i class="fas-plus"></i> Add /
                                            <?= __('edit_book') ?>
                                        </button>
                                    </div>
                                </div>

                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('booking_date') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                {{ rec.sale.book.book_arrivedate }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('booking_time') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/icons_60284.svg', ['' => '']) ?>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetdate }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-map-o"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetplace }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-bookmark"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetperiod }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-home"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_current_stay }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="dropdown">
                                            <button class="sm-btn float" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Offers Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseOffer" aria-expanded="true"
                                aria-controls="client1-collapseOffer">
                                <span class="title">Offers</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOffer" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal"
                                            ng-click="doGet('/admin/offers?sale_id=' + rec.sale.id, 'rec', 'offers'); newEntity('offers'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'offers')">
                                            <i class="fas-plus"></i>
                                            <?= __('add_offer') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-2" ng-repeat="itm in rec.sale.offers track by $index">
                                    <div>
                                        <span class="sm-txt">
                                            <?= __('shared_property') ?>
                                        </span>
                                        <div class="white-box flex-between mb-2">
                                            <a href="#" class="btn-link"> {{ itm.property_id }} </a>
                                            <div class="d-flex">
                                                <div class="h-line hideMob"></div>
                                                <label class="switch">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="interested-client1" ng-model="itm.isinterested"
                                                        ng-checked="itm.isinterested == 1">
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                    <?= __('interest_property') ?>
                                                </label>
                                            </div>
                                        </div>
                                        <span class="sm-txt">
                                            <?= __('desc_property') ?>
                                        </span>
                                        <div class="white-box flex-between">
                                            <div> {{ itm.offer_desc }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Deals Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseTwo" aria-expanded="true"
                                aria-controls="client1-collapseTwo">
                                <span class="title">Deals</span>
                            </button>
                        </h2>
                        <div id="client1-collapseTwo" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn" ng-click="
                                                doGet('/admin/reservations?id='+rec.sale.reservations[0].id, 'rec', 'reservation');  
                                                openModal('#subModal'); 
                                                inlineElement('#elementsContainer', 1, 'reservation')">
                                            <i class="fas-plus"></i> Edit Reservation </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <form class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Commission </span>
                                            <div class="input-group">

                                                <div class="wb-ele form-control">
                                                    {{rec.sale.reservations[0].currency.category_name}}
                                                    {{rec.sale.reservations[0].reservation_amount}}
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('usdcommission') ?>
                                            </span>
                                            <div type="text" ng-model="rec.reservations.reservation_usdcomission"
                                                class="wb-ele form-control" placeholder="% Please specify"></div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Sale Price </span>
                                            <div class="input-group">
                                                <div class="wb-ele form-control">
                                                    {{rec.sale.reservations[0].currency.category_name}}
                                                    {{rec.sale.reservations[0].reservation_price}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('usdprice') ?>
                                            </span>
                                            <div type="text" ng-model="rec.reservations.reservation_usdprice"
                                                class="wb-ele form-control" placeholder="% Please specify"></div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Payment Type </span>
                                            <div class="wb-ele form-control">
                                                {{rec.sale.reservations[0].payment.category_name}}</div>
                                        </div>

                                        <!-- <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Developer Name </span>
                                                <div class="wb-ele"></div>

                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Type </span>
                                                <div class="wb-ele"></div>

                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <div class="wb-ele"></div>

                                            </div> -->

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Commission </span>
                                            <div class="wb-ele">{{rec.sale.reservations[0].reservation_comission}}</div>


                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Down Payment </span>
                                            <div class="wb-ele">{{rec.sale.reservations[0].currency.category_name}}
                                                {{rec.sale.reservations[0].reservation_downpayment}}</div>


                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Downpaymnet Date </span>
                                            <div class="wb-ele">
                                                <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                <div>
                                                    {{rec.sale.reservations[0].reservation_downpayment_date.split('
                                                    ')[0]}}</div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="down-btns m-3">
                    <div class="flex-gap-10">
                        <button class="btn btn-gray" type="button">View History</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
// <!-- For subModal z-indexing -->
?>
<script>
    $(document).ready(function () {

        function setZIndex() {
            var viewSaleModal = $("#viewSale_mdl");
            viewSaleModal.css("z-index", 9);
        }

        $(".btn-modal").on("click", function () {
            setZIndex();
        });

    });
</script>


