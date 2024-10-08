<div class="modal fade" id="viewClient_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
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

                            <!-- <p class="">
                            Lead {{ $index + 1 }} Status - {{ clsale.stat_created.split(' ')[0] }} 
                            </p> -->
                            <!-- <div class="fas-check button"
                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                ng-class="{ 'green-btnStatus': recStateName === DtSetter('rec_stateSale', 3, rec.client.rec_state) }">
                                {{ recStateName }}
                            </div> -->

                            <!-- <div class="fas-check button green-btn"
                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                ng-class="{
                                    'green-btnStatus': $index+1 == rec.client.rec_state,
                                    '': $index+1 < rec.client.rec_state,
                                    'gray-btnStatus': $index >= rec.client.rec_state
                                }">
                                {{ recStateName}}
                            </div> -->

                            <div class="fas-check button green-btn"
                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index"
                                ng-class="{
                                    'green-btnStatus': $index+1 == rec.client.rec_state,
                                    'blue-btnStatus': rec.client.rec_state >= 13 && rec.client.rec_state <= 15 && $index < rec.client.rec_state,
                                    'gray-btnStatus': $index >= rec.client.rec_state
                                }">
                                {{ recStateName}}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush" id="client1">
                    <button type="button" id="client_btn" class="hideIt" ng-click="
                        doGet('/admin/clients?id='+rec.client.id, 'rec', 'client');
                        doGet('/admin/clients/index?list=1', 'list', 'clients'); ">
                    </button>


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
                                    <div class="title">Lead</div>
                                    <div class="flex-center flex-gap-5">
                                        <?php if (!in_array($authUser['user_role'], ['admin.callcenter', 'admin.portfolio', 'admin.teamleader', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                            <button id="modalBtn" class="btn btn-modal"
                                                ng-click="setZIndex();
                                                    updateModalElement('Lead');
                                                    doGet('/admin/clients?id='+rec.client.id, 'rec', 'client');
                                                    openModal('#subModal'); inlineElement('#elementsContainer', 1, 'contact-setting')">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('edit_contact') ?>
                                            </button>
                                        <?php } ?>

                                        <!-- <button class="sm-btn">
                                            <i class="fas-plus"></i>
                                        </button> -->
                                        <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>

                                            <button class="sm-btn">
                                                <a class="fas-phone" href="tel:{{rec.client.client_mobile}}"></a>
                                            </button>
                                            <button class="sm-btn">
                                                <a class="fas-mail" href="mailto:{{rec.client.client_email}}"></a>
                                            </button>
                                        <?php } ?>

                                        <!-- <div class="dropdown">
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
                                        </div> -->
                                    </div>
                                </div>

                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_name') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.client.client_name}}</div>

                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_phone') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.client.client_phone}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_mobile') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.client.client_mobile}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_email') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.client.client_email}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('adrs_country') ?>
                                            </span>

                                            <div class="wb-ele">
                                                {{ rec.client.country.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_address') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.client.client_address }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_nationality') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.client.client_nationality }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{ rec.client.source.category_name
                                                    }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('pool_id') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.client.pool_category.category_name }}</div>
                                        </div>
                                    </div>
                                    <div class="heading pb-0 mb-0 mt-3">
                                        <div class="title leadFont">Lead Information</div>
                                        <div class="flex-gap-10">
                                            <?php if (!in_array($authUser['user_role'], ['admin.accountant', 'aftersale', 'admin.portfolio']) || isset($authUser['user_original_role'])) { ?>
                                                <button id="modalBtn" class="leadFont btn btn-modal" ng-click="setZIndex();
                                                updateModalElement('Lead Information');
                                                doGet('/admin/clients?id=' + rec.client.id, 'rec', 'client');
                                                openModal('#subModal');
                                                inlineElement('#elementsContainer', 1, 'info')">
                                                    <span style="display: flex;">
                                                        <i class="fas-plus"></i>Add
                                                    </span>/
                                                    <span style="display: flex;width: max-content;">
                                                        <i class="fa fa-pencil" style="margin: 3px;"></i>
                                                        <?= __('edit_info') ?>
                                                    </span>
                                                </button>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <hr style="margin: 10px;">


                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.client.category.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('client_tags') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.client.client_tags track by $index">
                                                    {{ tag.text }}{{$index < (rec.client.client_tags.length - 1) ? ','
                                                        : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('clientspec_propertytype') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_propertytype track by $index">
                                                    {{ tag.text }}{{$index <
                                                        (rec.client.client_specs[0].clientspec_propertytype.length - 1)
                                                        ? ',' : '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('clientspec_beds') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_beds track by $index">
                                                    {{ tag.text }}{{$index <
                                                        (rec.client.client_specs[0].clientspec_beds.length - 1) ? ','
                                                        : '' }} </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3"
                                            ng-if="!(rec.client.client_budget == 2000001)">
                                            <span class="sm-txt">
                                                <?= __('client_budget') ?>
                                            </span>
                                            <div class="wb-ele">

                                                Up to {{nFormat( rec.client.client_budget
                                                ,DtSetter('currencies_icons',2))}}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3"
                                            ng-if="rec.client.client_budget == 2000001">
                                            <span class="sm-txt">
                                                <?= __('client_budget') ?>
                                            </span>
                                            <div class="wb-ele">

                                                {{nFormat( rec.client.client_budget
                                                ,DtSetter('currencies_icons',2))}} +
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_location') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_loction_target track by $index">
                                                    {{ tag.text }}{{$index < (
                                                        rec.client.client_specs[0].clientspec_loction_target.length - 1)
                                                        ? ',' : '' }}
                                                </span>
                                            </div>
                                        </div> -->

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_country') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_target_country track by $index">
                                                    {{ tag.text }}{{$index < (
                                                        rec.client.client_specs[0].clientspec_target_country.length - 1)
                                                        ? ',' : '' }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_city') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_target_city track by $index">
                                                    {{ tag.text }}{{$index < (
                                                        rec.client.client_specs[0].clientspec_target_city.length - 1)
                                                        ? ',' : '' }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_region') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.client.client_specs[0].clientspec_target_region track by $index">
                                                    {{ tag.text }}{{$index < (
                                                        rec.client.client_specs[0].clientspec_target_region.length - 1)
                                                        ? ',' : '' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('buyer_persona') ?>
                                            </span>
                                            <div class="wb-ele">{{
                                                rec.client.client_specs[0].persona.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('social_style_model') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.client.client_specs[0].style.category_name
                                                }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('lead_priority') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <div class="priority">
                                                    <div ng-class="{
                                                            'gray': rec.client.client_priority == null || rec.client.client_priority == 0,
                                                            'low': rec.client.client_priority == 1,
                                                            'med': rec.client.client_priority == 2,
                                                            'high': rec.client.client_priority == 3
                                                        }"></div>{{ DtSetter('client_priorities',
                                                    rec.client.client_priority) }}
                                                </div>

                                                <div class="mx-1"
                                                    ng-repeat="notify in rec.client.notification.clientsWithoutPriorty"
                                                    ng-if="notify.id == itm.id">
                                                    <i class="fa fa-exclamation-circle redColor" aria-hidden="true">
                                                        <small>Set the priorty</small>
                                                    </i>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('rec_state') ?>
                                            </span>
                                            <div class="wb-ele">{{ DtSetter('rec_stateSale',
                                                3, rec.client.rec_state)
                                                }}</div>
                                        </div>

                                        <?php if (in_array($authUser['user_role'], ['admin.callcenter', 'admin.callcenter', 'admin.admin', 'admin.root', 'admin.teamleader']) || isset($authUser['user_original_role'])) { ?>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('actions') ?>
                                                </span>

                                                <div class="note-flex">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="flex-center text-center">
                                                                <label class="switch">
                                                                    <input ng-model="rec.pool.clientAction75[rec.client.id]"
                                                                        ng-change="actionSave(rec.client.id, 75)"
                                                                        ng-checked="checkDate(rec.pool.clientAction75[rec.client.id][1])"
                                                                        ng-disabled="checkDate(rec.pool.clientAction75[rec.client.id][1])"
                                                                        name="invoice4" id="finance-client4"
                                                                        type="checkbox" />
                                                                    <span
                                                                        ng-class="{ 'slider': true, 'round': true, 'disabled': checkDate(rec.pool.clientAction75[rec.client.id][1]) }"></span>
                                                                </label>
                                                                <label for="finance-client3">
                                                                    <?= __('called') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="flex-center text-center">
                                                                <label class="switch">
                                                                    <input ng-model="rec.pool.clientAction76[rec.client.id]"
                                                                        ng-change="actionSave(rec.client.id, 76)"
                                                                        ng-checked="checkDate(rec.pool.clientAction76[rec.client.id][1])"
                                                                        ng-disabled="checkDate(rec.pool.clientAction76[rec.client.id][1])"
                                                                        name="invoice4" id="finance-client4"
                                                                        type="checkbox" />
                                                                    <span
                                                                        ng-class="{ 'slider': true, 'round': true, 'disabled': checkDate(rec.pool.clientAction76[rec.client.id][1]) }"></span>
                                                                </label>
                                                                <label for="finance-client4">
                                                                    <?= __('spoken') ?>
                                                                </label>
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


                    <?php
                    // <!-- Enquires Section (Reports) -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseEnq" aria-expanded="true"
                                aria-controls="client1-collapseEnq">
                                <span class="title">Enquires</span>
                            </button>
                        </h2>

                        <div id="client1-collapseEnq" class="accordion-collapse collapse ">
                            <div class="accordion-body">
                                <div class="noData" ng-if="rec.client.enquires == ''  ">

                                    <?= __('no_data') ?>

                                </div>
                                <div class="white-box mt-2" ng-repeat="enq in rec.client.enquires track by $index">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Name </span>
                                            <div class="wb-ele">{{enq.enquiry_name}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Phone </span>
                                            <div class="wb-ele">{{enq.enquiry_phone}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Email </span>
                                            <div class="wb-ele">{{enq.enquiry_email}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Country </span>
                                            <div class="wb-ele">{{enq.enquiry_country.adrs_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{enq.enquiry_source.category_name}}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Messages </span>
                                            <div class="wb-ele">{{enq.enquiry_message}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Property Ref </span>
                                            <div class="wb-ele">{{enq.property_id }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>




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
                        <div id="client1-collapseAssign" class="accordion-collapse collapse ">
                            <div class="accordion-body">
                                <div>
                                    <div class="heading">
                                        <div class="title"></div>
                                        <div class="flex-gap-10">

                                            <?php if (in_array($authUser['user_role'], ['admin.supervisorcc', 'admin.admin', 'admin.root', 'admin.supervisorfield']) || isset($authUser['user_original_role'])) { ?>
                                                <button class="btn btn-modal" id="modalBtn" ng-click="setZIndex();
                                                updateModalElement('Assign');
                                                newEntity('newTag');
                                                tagList = [];
                                                openModal('#subModal'); 
                                                inlineElement('#elementsContainer', 1, 'fieldassign')">
                                                    <i class="fas-plus"></i>
                                                    <?= __('field_assign') ?>
                                                </button>
                                            <?php } ?>
                                            <?php if (in_array($authUser['user_role'], ['admin.supervisorcc', 'admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                <button class="btn btn-modal" id="modalBtn" ng-click="setZIndex();
                                                updateModalElement('Assign');
                                                newEntity('newTag');
                                                tagList = [];
                                                openModal('#subModal'); 
                                                inlineElement('#elementsContainer', 1, 'ccassign')">
                                                    <i class="fas-plus"></i>
                                                    <?= __('cc_assign') ?>
                                                </button>
                                            <?php } ?>

                                            <?php if (in_array($authUser['user_role'], ['admin.supervisorcc', 'admin.callcenter']) || isset($authUser['user_original_role'])) { ?>
                                            <button ng-if="rec.search.pool_id" class="btn btn-modal" id="modalBtn"
                                                ng-click="
                                                    rec.user_client.selfassign = 1;
                                                    rec.user_client.client_id = rec.client.id;
                                                    doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');">
                                                <i class="fas-plus"></i>
                                                <?= __('self_assign') ?>
                                            </button>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="noData" ng-if="rec.client.user_client == ''">

                                            <?= __('no_data') ?>

                                        </div>
                                        <div class="white-box mb-3"
                                            ng-repeat="assign in rec.client.user_client track by $index">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col m-1" style="white-space: nowrap;">
                                                            <div class="note-flex">
                                                                <span class="sm-txt">
                                                                    Advisor
                                                                </span>
                                                                <i ng-if="assign.rec_state == 2"
                                                                    class="fa fa-exclamation-circle redColor"
                                                                    aria-hidden="true">
                                                                    <small class="note-font">
                                                                        <?= __('require_reallocation') ?>
                                                                    </small>
                                                                </i>
                                                            </div>

                                                            <div class="wb-ele ng-binding">{{assign.user.user_fullname}}
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


                    <?php
                    // <!-- Notes and Empahty Section (Reports) -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseNote" aria-expanded="true"
                                aria-controls="client1-collapseNote">
                                <span class="title">
                                    <?= __('notes') ?>
                                </span>
                            </button>
                        </h2>


                        <div id="client1-collapseNote" class="accordion-collapse collapse ">
                            <div class="accordion-body">
                                <?php
                                // <!-- Empahty Section -->
                                ?>
                                <!-- <div class="heading">
                                    <div class="title">Empathy Mapping</div>
                                    <div class="flex-gap-10">
                                        
                                        <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                            <button id="modalBtn" class="btn btn-modal" ng-click="
                                                    setZIndex();
                                                    updateModalElement('Empathy Mapping');
                                                    doGet('/admin/reports?report_type=empathy&tar_id=' + rec.client.id, 'rec', 'report'); 
                                                    openModal('#subModal'); 
                                                    inlineElement('#elementsContainer', 1, 'empathy')">
                                                <span style="display: flex;">
                                                    <i class="fas-plus"></i>Add
                                                </span>/
                                                <span style="display: flex;width: max-content;">
                                                    <i class="fa fa-pencil" style="margin: 3px;"></i>
                                                    <?= __('edit_empathy') ?>
                                                </span>
                                            </button>
                                        <?php } ?>

                                    </div>
                                    
                                </div>

                                <div class="white-box">
                                    <div class="row">

                                        <div class="col-md-6 col-12 col-lg-3"
                                            ng-repeat="report in rec.client.reports track by $index"
                                            ng-if="(report.report_type == '201' || report.report_type == '202' || report.report_type == '203' || report.report_type == '204')">
                                            
                                            <div ng-if="!report.report_text">
                                                <?= __('no_data') ?>
                                            </div>
                                            <span class="sm-txt">
                                                {{report.type_category.category_name}}
                                            </span>
                                            
                                            <div ng-if="report.report_text">
                                                <div class="wb-ele-empahty">{{ report.report_text }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                <?php
                                // <!-- Report Notes Section -->
                                ?>
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <?php if (!in_array($authUser['user_role'], ['aftersale', 'admin.accountant']) || isset($authUser['user_original_role'])) { ?>
                                            <button class="btn btn-modal" ng-click="
                                            newEntity('report');
                                            setZIndex();
                                            updateModalElement('Notes');
                                            openModal('#subModal');
                                            inlineElement('#elementsContainer', 1, 'notes');">
                                                <i class="fas-plus"></i>
                                                <?= __('add_notes') ?>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="noData" ng-if="rec.client.reports == ''  ">

                                    <?= __('no_data') ?>

                                </div>
                                <div ng-repeat="clsale in rec.client.reports track by $index">
                                    <div class="note"
                                        ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">

                                        <div class="box-heading d-flex">
                                            <div class="col-lg-2 text-nowrap">
                                                <i class="fas-sticky-note"></i> {{ clsale.type_category.category_name }}
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
                                                <?php if (in_array($authUser['user_role'], ['admin.admin' , 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown"
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
                                        </div>
                                        <!-- <span class="spoken"></span>
                                    <div class="text">
                                        <p>{{ itm.report_text }}</p>
                                    </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Reminders Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseRem" aria-expanded="true"
                                aria-controls="client1-collapseRem">
                                <span class="title">Reminders</span>
                            </button>
                        </h2>
                        <div id="client1-collapseRem" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                            <button class="btn btn-modal" ng-click="setZIndex();
                                            newEntity('reminder'); 
                                            updateModalElement('Reminders');
                                            openModal('#subModal'); 
                                            inlineElement('#elementsContainer', 1, 'reminders')">
                                                <i class="fas-plus"></i>
                                                <?= __('add_reminder') ?>
                                            </button>
                                        <?php } ?>

                                    </div>
                                </div>
                                <?php
                                // <!-- Reminders Section -->
                                ?>
                                <div class="noData" ng-if="rec.client.reminders == ''  ">

                                    <?= __('no_data') ?>

                                </div>
                                <div ng-repeat="clrem in rec.client.reminders track by $index">
                                    <div class="heading">
                                        <div class="title"></div>
                                        <div class="flex-gap-10">
                                            <!-- <button id="modalBtn" class="btn btn-modal" ng-click="
                                                doGet('/admin/reminders?id=' +  itm.reminders[itm.reminders.length - 1].id, 'rec', 'reminder');
                                                openModal('#subModal');
                                                updateModalElement('Reminder');
                                                itm.id = rec.client.id;
                                                inlineElement('#elementsContainer', 1, 'reminders')">
                                                <i class="fas-plus"></i>
                                                <?= __('edit_reminder') ?>
                                            </button> -->
                                        </div>
                                    </div>
                                    <div class="white-box mt-2">
                                        <div class="row">

                                            <div class="reminderCols">
                                                <span class="sm-txt">
                                                    <?= __('next_call_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image(
                                                        '/img/datepicker.png'
                                                    ) ?>
                                                    <div class="line-height-10">
                                                        <!-- <span class="sm-txt">Next Call Date</span> -->
                                                        {{ clrem.reminder_nextcall.split(' ')[0] }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="reminderCols">
                                                <span class="sm-txt">
                                                    <?= __('next_call_time') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/clock_regular.svg', ['' => '']) ?>
                                                    <div class="line-height-10">
                                                        <!-- <span class="sm-txt">Next Call Time</span> -->
                                                        {{ clrem.reminder_nextcall.split(' ')[1] }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="reminderCols">
                                                <span class="sm-txt">
                                                    <?= __('Description') ?>
                                                </span>
                                                <div class="wb-ele">

                                                    {{ clrem.reminder_desc }}

                                                </div>

                                            </div>
                                            <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                                <div class="dropdown col-1 reminderDrop">
                                                    <button class="btn" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fas-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li id="delete_preloader">
                                                            <a class="dropdown-item delete-btn" ng-click="
                                                                doDelete('/admin/reminders/delete/' +clrem.id);"
                                                                href="#">Delete</a>
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
                        <div id="client1-collapseOffer" class="accordion-collapse collapse ">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>

                                            <button class="btn btn-modal" ng-click="
                                            setZIndex();
                                            newEntity('offer'); 
                                            openModal('#subModal'); 
                                            updateModalElement('Offers');
                                            inlineElement('#elementsContainer', 1, 'offers')">
                                                <i class="fas-plus"></i>
                                                <?= __('add_offer') ?>
                                            </button>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="noData" ng-if="rec.client.offers == ''">

                                    <?= __('no_data') ?>

                                </div>
                                <div class="white-box mb-2" ng-repeat="itm in rec.client.offers track by $index">
                                    <div>
                                        <span class="sm-txt">
                                            <?= __('shared_property') ?>
                                        </span>
                                        <div class="flex-between mb-2">
                                            <a href="#"> <span class="btn-link">{{ itm.property_ref.property_title }},
                                                    {{ itm.property_ref.property_ref }}</span> <br><span
                                                    class="text-dark">{{ itm.offer_desc }}</span></a>



                                            <div class="d-flex">
                                                <div class="h-line hideMob"></div>
                                                <!-- <label class="switch">
                                                    <span disabled class="slider round" ng-model="itm.isinterested"
                                                        ng-class="{'green-background': itm.isinterested == 1}">
                                                    </span>
                                                </label> -->
                                                <div class="wb-ele" ng-if="itm.isinterested == 1">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="wb-ele" ng-if="itm.isinterested != 1">
                                                    <i class="fa fa-times-circle-o redText" ></i>
                                                </div>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                    <?= __('interest_property') ?>
                                                </label>
                                                
                                            </div>

                                            


                                        </div>
                                        <!-- <span class="sm-txt">
                                            <?= __('desc_property') ?>
                                        </span> -->
                                        <!-- <div class="flex-between">
                                            <div> {{ itm.offer_desc }}</div>
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
                        <div id="client1-collapseBooking" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                            <button class="btn btn-modal" id="modalBtn"
                                                ng-click="setZIndex();updateModalElement('Books');newEntity('book'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'booking')">
                                                <i class="fas-plus"></i> Add
                                            </button>

                                        <?php } ?>


                                    </div>
                                </div>

                                <div class="noData" ng-if="rec.client.books == ''">
                                    <?= __('no_data') ?>

                                </div>

                                <div ng-repeat="clbook in rec.client.books track by $index">

                                <?php if (!in_array($authUser['user_role'], ['admin.portfolio', 'admin.accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                    <div class="heading">
                                        <div class="title"></div>
                                        <div class="flex-gap-10">
                                            <button class="btn btn-modal" id="modalBtn btn-Booking" ng-click="
                                                    setZIndex();
                                                    updateModalElement('Book');
                                                    doGet('/admin/books?id='+ clbook.id, 'rec', 'book');
                                                    openModal('#subModal'); 
                                                    inlineElement('#elementsContainer', 1, 'booking')">
                                                <i class="fas-plus"></i>
                                                <?= __('edit_book') ?>
                                            </button>
                                        </div>

                                    </div>
                                    <?php } ?>
                                    <div class="white-box mb-2" ng-if="!rec.client.books == ''">


                                        <div class="row">
                                            <div class="col-md-6 col-12 col-lg-3" ng-if="!(rec.book.in_turkey == 1)">
                                                <span class="sm-txt">
                                                    <?= __('booking_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    {{ clbook.book_arrivedate.split(' ')[0] }}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('booking_departuredate') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    {{ clbook.book_departuredate.split(' ')[0] }}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('booking_time') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/icons_60284.svg', ['' => '']) ?>
                                                    <div class="line-height-10">
                                                        <!-- {{ clbook.book_meetdate }} -->
                                                        {{ clbook.book_meetdate.split(' ')[0] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('current_location') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <i class="fa fa-map-o"></i>
                                                    <div class="line-height-10">
                                                        {{ clbook.book_meetplace }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('meet_period') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <i class="fa fa-calendar-times-o"></i>
                                                    <div class="line-height-10">
                                                        {{ clbook.book_meetperiod }} day
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('meet_place') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <i class="fa fa-home"></i>
                                                    <div class="line-height-10">
                                                        {{ clbook.book_current_stay }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3" ng-if="clbook.in_turkey == 1">
                                                <span class="sm-txt">
                                                    <?= __('in_turkey') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="clbook.in_turkey == 0 || clbook.in_turkey == null">
                                                <span class="sm-txt">
                                                    <?= __('in_turkey') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <i class="fa fa-times-circle-o redText"></i>
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

                        <div id="client1-collapseTwo" class="accordion-collapse collapse ">
                            <div class="accordion-body">
                                <?php if (in_array($authUser['user_role'], ['admin.portfolio', 'admin.supervisorfield']) || isset($authUser['user_original_role'])) { ?>

                                    <div class="heading ">
                                        <div class="title"></div>
                                        <div class="flex-gap-10">
                                            <button class="btn btn-modal" id="modalBtn" ng-click="
                                        setZIndex();
                                        newEntity('reservation');
                                        openModal('#subModal'); 
                                        updateModalElement('Deals');
                                        inlineElement('#elementsContainer', 1, 'reservation')">
                                                <i class="fas-plus"></i>
                                                <?= __('add_deal') ?>
                                            </button>

                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="noData" ng-if="rec.client.reservations == ''">

                                    <?= __('no_data') ?>

                                </div>
                                <div>

                                    <div ng-repeat="deals in rec.client.reservations">
                                        <?php if (in_array($authUser['user_role'], ['admin.supervisorfield', 'admin.portfolio', 'admin.callcenter', 'admin.accountant']) || isset($authUser['user_original_role'])) { ?>
                                            <div class="heading">
                                                <div class="title"></div>
                                                <div class="flex-gap-10">
                                                    <button class="btn btn-modal" id="modalBtn btn-Booking" ng-click="
                                                    setZIndex();
                                                    updateModalElement('Deals');
                                                    doGet('/admin/reservations?id='+deals.id, 'rec', 'reservation');
                                                    openModal('#subModal'); 
                                                    inlineElement('#elementsContainer', 1, 'reservation')">
                                                        <i class="fas-plus"></i>
                                                        <?= __('edit_deal') ?>
                                                    </button>
                                                </div>

                                            </div>
                                        <?php } ?>

                                        <div class="white-box">
                                            <form class="row">
                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('reservation_amount') ?>
                                                    </span>
                                                    <div class="input-group">

                                                        <div class="wb-ele form-control">
                                                            {{nFormat( deals.reservation_amount
                                                            ,DtSetter('currencies_icons',deals.reservation_currency))}}
                                                        </div>

                                                    </div>
                                                </div>



                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('reservation_price') ?>
                                                    </span>
                                                    <div class="input-group">
                                                        <div class="wb-ele form-control">
                                                            <!-- {{deals.currency.category_name}}
                                                        {{deals.reservation_price}} -->

                                                            {{nFormat( deals.reservation_price
                                                            ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('usdprice') ?>
                                                    </span>
                                                    <div type="text"
                                                        ng-model="rec.reservations.reservation_usdcomission"
                                                        class="wb-ele form-control" placeholder="% Please specify">
                                                        {{nFormat( deals.reservation_usdprice
                                                        ,DtSetter('currencies_icons','$'))}}

                                                        <!-- --{{deals.reservation_currency}}--
                                                --{{deals.reservation_price}}-- -->
                                                        <!-- {{DtSetter('currencies_icons', 2)}}
                                                        {{currencyConverter(
                                                        DtSetter('currencies', deals.reservation_currency),
                                                        'USD',
                                                        deals.reservation_price )}} -->
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> Payment Type </span>
                                                    <div class="wb-ele form-control">
                                                        {{deals.payment.category_name}}</div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> Down Payment </span>
                                                    <div class="wb-ele">
                                                        <!-- {{deals.currency.category_name}}
                                                    {{deals.reservation_downpayment}} -->
                                                        {{nFormat( deals.reservation_downpayment
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> Downpaymnet Date </span>
                                                    <div class="wb-ele">
                                                        <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                        <div>
                                                            {{deals.reservation_downpayment_date.split(' ')[0]}}</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> Commission </span>
                                                    <div class="wb-ele">
                                                        {{nFormat( deals.reservation_comission
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('usdcommission') ?>
                                                    </span>
                                                    <div type="text" class="wb-ele form-control"
                                                        placeholder="Please specify">

                                                        {{nFormat(
                                                        deals.reservation_usdcomission,DtSetter('currencies_icons','$'))}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('invoice_date') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                        <div>
                                                            {{deals.reservation_invoice_date.split(' ')[0]}}</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('property_id') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        {{deals.property.property_ref}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('clientspec_propertytype') ?>
                                                    </span>

                                                    <div class="wb-ele">
                                                        {{deals.pmscategory.category_name}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('project_id') ?>
                                                    </span>

                                                    <div class="wb-ele">
                                                        {{deals.project.project_ref}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('seller_name') ?>
                                                    </span>

                                                    <div class="wb-ele">
                                                        {{deals.seller.seller_name}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('sold_from') ?>
                                                    </span>

                                                    <div class="wb-ele">
                                                        {{deals.Property.seller_name}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('dev_name') ?>
                                                    </span>

                                                    <div class="wb-ele">
                                                        {{deals.developer.dev_name}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> Unit Information </span>
                                                    <div class="wb-ele">{{deals.reservation_details}}</div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('reservation_date') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                        <div>
                                                            {{deals.stat_created.split(' ')[0]}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt">
                                                        <?= __('rec_state') ?>
                                                    </span>
                                                    <div class="wb-ele">{{ DtSetter('rec_stateSale',
                                                        3, deals.rec_state)
                                                        }}</div>
                                                </div>



                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.reservation_isinvoice_sent == 1">
                                                    <span class="sm-txt">
                                                        <?= __('is_invoice_sent') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-check-circle-o greenText"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.reservation_isinvoice_sent == 0 || deals.reservation_isinvoice_sent == null">
                                                    <span class="sm-txt">
                                                        <?= __('is_invoice_sent') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-times-circle-o redText"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.is_commision_collacted == 1">
                                                    <span class="sm-txt">
                                                        <?= __('is_commision_collacted') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-check-circle-o greenText"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.is_commision_collacted == 0 || deals.is_commision_collacted == null">
                                                    <span class="sm-txt">
                                                        <?= __('is_commision_collacted') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-times-circle-o redText"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.downpayment_paid == 1">
                                                    <span class="sm-txt">
                                                        <?= __('downpayment_paid') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-check-circle-o greenText"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3"
                                                    ng-if="deals.downpayment_paid == 0 || deals.downpayment_paid == null">
                                                    <span class="sm-txt">
                                                        <?= __('downpayment_paid') ?>
                                                    </span>
                                                    <div class="wb-ele">
                                                        <i class="fa fa-times-circle-o redText"></i>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">

                        <div class="down-btns m-3 accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#client1-collapseHistory" aria-expanded="true"
                            aria-controls="client1-collapseHistory">
                            <div class="flex-gap-10">
                                <!-- <button class="btn btn-gray" type="button">View History</button> -->
                            </div>
                        </div>
                    </h2>
                    <div id="client1-collapseHistory" class="accordion-collapse collapse m-3">
                        <div class="accordion-body">
                            <div class="heading">
                                <div class="title">History</div>
                                <div class="flex-gap-10">


                                </div>
                            </div>
                            <?php
                            // <!-- Reminders Section -->
                            ?>
                            <div class="noData" ng-if="rec.getClientChange == ''  ">

                                <?= __('no_data') ?>

                            </div>
                            <div ng-repeat="clrem in rec.getClientChange.notifications track by $index"
                                ng-if="clrem.client_id == rec.client.id">

                                {{}}
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">

                                    </div>
                                </div>
                                <div class="white-box mt-2">
                                    <div class="row">

                                        <div class="col">
                                            <span class="sm-txt">
                                                <?= __('history') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fas-clock"></i>
                                                <div class="line-height-10" ng-bind="clrem.changes[0]">

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

</div>
</div>



<?php
// <!-- For subModal z-indexing -->
?>
<script>
    $(document).ready(function () {
        // Tüm bölümleri kapalı yap
        $(".accordion-button").addClass("collapsed");
        $(".accordion-button").attr("aria-expanded", "false");



    });
</script>