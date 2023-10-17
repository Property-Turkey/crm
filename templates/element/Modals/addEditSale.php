

<!-- addEditSale_mdl modal -->
<div class="modal fade" id="addEditSale_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header and title -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div ng-if="!rec.sale.id"><?=__('add')?></div>
                    <div ng-if="rec.sale.id"><?=__('edit')?></div>
                </h4>
                
            </div>
            <!-- ... (existing code) ... -->

            <!-- <div class="modal-body">
                
            <div class="lead-preview">
                <div class="modal-header">
                    <button class="btn-exit">
                        <img src="\crm\webroot\img\export-svgrepo-com.svg" alt="" width="30" /> Add Lead </button>
                </div>
                
                <div class="accordion accordion-flush" id="client1">
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
                                <div class="heading">
                                    <div class="title">Contact Setting</div>
                                    <div class="flex-center flex-gap-5">
                                    
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="
                                            doGet('/admin/clients?id='+rec.sale.client.id, 'rec', 'client');
                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'contact-setting')">
                                            <i class="fas-plus"></i> <?= __('edit_contact') ?> </button>
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
                                            <div class="wb-ele">{{rec.sale.client.adrs_country}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{ rec.client.source.category_name }}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Inquiry </span>
                                            <div class="wb-ele"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading">
                                    <div class="title">Assign</div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="
                                            newEntity('usersale');
                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'assign')">
                                            <i class="fas-plus"></i> <?= __('add_assign') ?></button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-12 col-sm-3">
                                            <span class="sm-txt">
                                                <?= __('sale_current_stage') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.sale.usersale[0].user}}</div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <span class="sm-txt"> <?=__('lead_priority')?> </span>
                                            <div class="wb-ele">
                                                <div class="priority">
                                                    <em class="low"></em>{{DtSetter('sale_priorities',
                                                    rec.sale.sale_priority)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-1"></div>
                                        <div class="col-12 col-sm-5">
                                            <div class="flex-gap-10 justify-content-end align-items-center">
                                                <label class="switch">
                                                    <input disabled checked type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label> Snoose </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading">
                                    <div class="title">Info</div>
                                    <div class="flex-gap-10">
                                    
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="
                                            doGet('/admin/sales?id='+rec.sale.id, 'rec', 'sale'); 
                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'info')">
                                            <i class="fas-plus"></i> <?= __('edit_info') ?> </button>
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
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.sale.sale_tags track by tag.text">{{$index > 0 ? ', ' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_propertytype') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.sale.sale_specs[0].salespec_propertytype track by tag.text">{{$index > 0 ? ', ' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_beds') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.sale.sale_specs[0].salespec_beds track by tag.text">{{$index > 0 ? ', ' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>

                                  

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('sale_budget') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.sale.sale_spec[0].salespec_currency}} {{ rec.sale.sale_budget }}</div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('current_location') ?>
                                            </span>
                                            <div class="row">
                                                <div class="col-6 place_1 ">
                                                    <div class="wb-ele">{{}}</div>
                                                </div>
                                                <div class="col-6 place_2">
                                                    <div class="wb-ele">{{}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_location') ?>
                                            </span>
                                            <div class="wb-ele">{{rec.sale.sale_specs[0].salespec_loction_target}}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('buyer_persona') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].persona.category_name }}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('social_style_model') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].style.category_name }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="heading">
                                    <div class="title">Empathy Mapping</div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn"
                                            ng-click="doGet('/admin/reports?id='+rec.sale.reports.id, 'rec', 'reports');
                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'empathy')">
                                            <i class="fas-plus"></i> <?= __('edit_empathy') ?> </button>
                                    </div>
                                </div>

                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3" ng-repeat="report in rec.sale.reports" ng-if="(report.report_type == '201' || report.report_type == '202' || report.report_type == '203' || report.report_type == '204')">
                                            <span class="sm-txt"> BAŞLIK </span>
                                            <div class="wb-ele">{{report.report_text}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item mt-3">                   
                                    <button class="accordion-button p-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#client1-collapseFour" aria-expanded="true"
                                        aria-controls="client1-collapseFour">
                                        <div class="heading">
                                            <div class="title">Notes</div>
                                        </div> 
                                    </button>

                                    <div id="client1-collapseFour" class="accordion-collapse collapse show">
                                        <div class="accordion-body p-0">
                                            <div class="heading">
                                            <div class="title"></div>
                                                <div class="flex-gap-10">
                                                    <button class="btn btn-modal" ng-click="
                                                openModal('#subModal'); 
                                                doGet('/admin/reports?id='+rec.sale.reports.id, 'rec', 'reports');
                                                inlineElement('#elementsContainer', 1, 'notes');">
                                                        <i class="fas-plus"></i> <?=__('add_report')?> </button>
                                                    
                                                </div>
                                            </div>
                                            <div class="note" ng-repeat="itm in rec.sale.reports track by $index" ng-if="!(itm.report_type == '201' || itm.report_type == '202' || itm.report_type == '203' || itm.report_type == '204')">
                                                <div class="box-heading">
                                                    <h5>
                                                        <i class="fas-sticky-note"></i> {{itm.type.category_name}} <b>
                                                            {{itm.user.user_fullname}}</b>
                                                    </h5>
                                                    <div class="flex-center flex-gap-10">
                                                        <b> {{itm.stat_created.split(' ')[1]}} </b>
                                                        <div class="dropdown">
                                                            <button class="btn" type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fas-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="spoken"></span>
                                                <div class="text">
                                                    <p>{{itm.report_text}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="heading">
                                    <div class="title">Finances</div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn"
                                            ng-click="
                                            doGet('/admin/sales?id='+rec.sale.id, 'rec', 'sale');
                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'finance')">
                                            <i class="fas-plus"></i> Edit Finances </button>
                                        
                                    </div>
                                </div>
                                <div class="white-box">
                                    <form class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input ng-disabled="true" ng-model="rec.sale.sale_finance"
                                                        ng-value="'187'" name="finance" id="finance-client1"
                                                        type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="finance-client1"> Finances in Place </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input ng-disabled="true" ng-value="'188'"
                                                        ng-model="rec.sale.sale_finance" name="finance"
                                                        id="payment-client1" type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="payment-client1"> All cash payment </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input ng-disabled="true" ng-value="'189'"
                                                        ng-model="rec.sale.sale_finance" name="finance"
                                                        id="Ready-client1" type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="Ready-client1"> Ready to buy now </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input ng-disabled="true" ng-model="rec.sale.sale_finance"
                                                        name="finance" ng-value="'190'" id="present-client1"
                                                        type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="present-client1"> Decision maker is present </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="accordion-item mt-3">                   
                                    <button class="accordion-button p-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#client1-collapseThree" aria-expanded="true"
                                        aria-controls="client1-collapseThree">
                                        <div class="heading">
                                            <div class="title">Offers</div>
                                        </div> 
                                    </button>
                                    <div id="client1-collapseThree" class="accordion-collapse collapse show">
                                        <div class="accordion-body p-0">
                                            <div class="heading">
                                                <div class="title"></div>
                                                <div class="flex-gap-10">
                                                    <button class="btn btn-modal" 
                                                    ng-click="
                                                    doGet('/admin/offers?sale_id='+rec.sale.id, 'rec', 'offers');  
                                                    newEntity('offers');   
                                                                                                   
                                                    openModal('#subModal'); inlineElement('#elementsContainer', 1, 'offers')">
                                                        <i class="fas-plus"></i> <?=__('add_offer')?> 
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                            <div class="white-box mb-2" ng-repeat="itm in rec.sale.offers">
                                                <div>
                                                    <span class="sm-txt"> <?=__('shared_property')?> </span>
                                                    <div class="white-box flex-between mb-2">
                                                        <a href="#" class="btn-link"> {{ itm.property_id }}</a>
                                                        <div class="d-flex">
                                                            <div class="h-line hideMob"></div>
                                                            <label class="switch">
                                                                <?= $this->Form->checkbox('isinterested', [
                                                                    'id' =>'interested-client1',
                                                                    'type' => 'checkbox',
                                                                    'class' => 'form-check-input',
                                                                    'ng-model' => 'itm.isinterested',
                                                                    'ng-value' => "'1'" ]) ?>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <label for="interested-client1"
                                                                class="ps-md-5 ps-3 pe-3 pe-md-5"> <?=__('interest_property')?> </label>
                                                        </div>
                                                    </div>
                                                    <span class="sm-txt"> <?=__('desc_property')?> </span>
                                                    <div class="white-box flex-between">
                                                        <div> {{ itm.offer_desc }}</div>
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
                

                <button type="button" id="sale_btn" class="hideIt" ng-click=
                    "doGet('/admin/sales/index?list=1', 'list', 'sales');   rec.sale = {}; doClick('.close');
                    newEntity('category');">
                </button>

                <form class="row" id="sale_form" ng-submit="
                rec.sale.sale_specs.sale_id = rec.sale.id;
            
                    doSave(rec.sale, 'sale', 'sales', '#sale_btn', 
                    '#sale_preloader');">
                


                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('client_id') ?></label>
                        <div class="div" style="position: relative;">
                            <tags-input 
                                ng-model="rec.sale.client" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('client_id') ?>" 
                                display-property="text"
                                key-property="value"
                                ng-disabled="rec.sale.client || rec.sale.id"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'clients')"></auto-complete>
                            </tags-input>

                            
                            <span ng-if="rec.sale.client || rec.sale.id" ng-click="rec.sale.client = ''; rec.sale.id = undefined;" class="fa fa-times" style="cursor: pointer; position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></span>
                            
                        </div>
                        <button type="button" id="openClientFormBtn" class="btn btn-primary" ng-click="toggleAddClientForm()">
                            <?=__('add_client')?>
                        </button>
                    </div>


                    

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label set-required><?= __('source_id') ?></label>
                        <div class="div">
                            <?= $this->Form->control('source_id', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                'options' => $optionsSource, 
                                'empty' => 'Select source_id', 
                                'ng-model' => 'rec.sale.source_id',
                            ]) ?>
                            <span class="fa fa-code-fork form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('category_id') ?></label>
                        <div class="div">
                            <?= $this->Form->control('category_id', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                'options' => $optionsType,
                                'empty' => 'Select Category Type', 
                                'ng-model' => 'rec.sale.category_id',
                            ]) ?>
                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('pool_id') ?></label>
                        <div class="div">
                            <?= $this->Form->control('pool_id', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                'options' => $optionsPool,
                                'empty' => 'Select pool_id',
                                'ng-model' => 'rec.sale.pool_id',
                            ]) ?>
                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('sale_tags') ?></label>
                        <div class="div">
                            
                            <tags-input ng-model="rec.sale.sale_tags" 
                            add-from-autocomplete-only="true" 
                            display-property="text" >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'categories')"></auto-complete>
                            </tags-input>

                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label ><?=__('sale_priority')?></label>
                        <div class="div">
                            <?=$this->Form->control('sale_priority', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'select',
                                'ng-model'=>'rec.sale.sale_priority',
                                'options'=>$this->Do->lcl( $this->Do->get('sale_priorities') ),
                                'empty'=>'Sale Priority',
                            ])?>
                            <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-sm-12 form-group has-feedback" ng-if="rec.sale.id && rec.sale.sale_current_stage >= 2">
                        <label><?=__('rec_state')?> : </label> 
                        <button  ng-if="rec.sale.sale_current_stage == 3"  data-toggle="modal" data-target="#addEditBook_mdl" data-dismiss="modal" class="btn btn-success"><span></span>
                            <?=__('add_book')?>
                        </button>
                        
                        <button ng-if="rec.sale.sale_current_stage == 4" ng-click="updateToFix()" class="btn btn-success"><span></span>
                            <?=__('to_fix')?>
                        </button>
                        
                        <button id="reserv_report" ng-if="rec.sale.sale_current_stage == 5" data-toggle="modal" data-target="#addEditReport_mdl" data-dismiss="modal" class="btn btn-success" ng-click="rec.report.report_type = '162'">
                            <span></span>
                            <?=__('reservation')?>
                        </button>

                        <button ng-if="rec.sale.sale_current_stage == 5" ng-click="updateCommision()" class="btn btn-success"><span></span>
                            <?=__('commision_collected')?>
                        </button>
                        <button class="btn btn-success"  data-toggle="modal" data-target="#addEditUsersale_mdl" data-dismiss="modal" ng-if="rec.sale.sale_current_stage == 2 || rec.sale.sale_current_stage == 4">
                            <span></span>
                            <?=__('assign')?>
                        </button>
                        <button class="btn btn-warning"  data-toggle="modal" data-target="#addEditReport_mdl" data-dismiss="modal"  ng-click="updateRecState()"><span></span>
                            <?=__('no_sale')?>
                        </button>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('sale_budget')?></label>
                        <div class="div">
                            <?=$this->Form->control('sale_budget', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.sale.sale_budget',
                                'placeholder'=>__('sale_budget'),
                            ])?>
                            <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-12 mb-3 ml-2">
                        <div class="col-md-3 col-sm-6 form-group has-feedback">
                            <label>salespec_isowner</label>
                            <div class="div">
                                <input type="checkbox" class="form-check-input ng-valid ng-dirty ng-valid-parse ng-empty ng-touched" ng-model="rec.sale.sale_specs.salespec_isowner" style="">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 form-group has-feedback">
                            <label>salespec_isready</label>
                            <div class="div">
                                <input type="checkbox" class="form-check-input ng-valid ng-dirty ng-valid-parse ng-touched ng-empty" ng-model="rec.sale.sale_specs.salespec_isready" style="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('salespec_current_location') ?></label>
                        <div class="div">
                            <input type="text" class="form-control has-feedback-left" 
                            ng-model="rec.sale.sale_specs.salespec_current_location" 
                            placeholder="<?= __('salespec_current_location') ?>">
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label ><?=__('salespec_propertytype')?></label>
                        <div class="div">
                            <?=$this->Form->control('salespec_propertytype', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'select',
                                'ng-model'=>'rec.sale.sale_specs.salespec_propertytype',
                                // 'options'=>,
                                'empty'=>'Sale Priority',
                            ])?>
                            <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('salespec_beds') ?></label>
                        <div class="div">
                            <input type="number" class="form-control has-feedback-left" ng-model="rec.sale.sale_specs.salespec_beds" placeholder="<?= __('salespec_beds') ?>">
                            <span class="fa fa-bed form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('salespec_loction_target') ?></label>
                        <div class="div">
                            <input type="text" class="form-control has-feedback-left" ng-model="rec.sale.sale_specs.salespec_loction_target" placeholder="<?= __('salespec_loction_target') ?>">
                            <span class="fa fa-map form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                   
                    
                    <div class="col-md-6 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="sale_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>

                </form>

              
              
                

                <!-- Permission form -->
                <form class="row" id="client_form" ng-show="showAddClientForm" ng-submit="
                 
                doSave(rec.client, 'client', 'clients', '#client_btn', 
                '#client_preloader');">


                <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label set-required><?= __('source_id') ?></label>
                        <div class="div">
                            <?= $this->Form->control('source_id', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                'options' => $optionsSource, 
                                'empty' => 'Select source_id', 
                                'ng-model' => 'rec.client.source_id',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('client_name')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_name', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.client.client_name',
                                'placeholder'=>__('client_name'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('client_phone')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_phone', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'tel',
                                'ng-model'=>'rec.client.client_phone',
                                'placeholder'=>__('client_phone'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('client_mobile')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_mobile', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'tel',
                                'ng-model'=>'rec.client.client_mobile',
                                'placeholder'=>__('client_mobile'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('client_email')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_email ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'email',
                                'ng-model'=>'rec.client.client_email ',
                                'placeholder'=>__('client_email'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('client_address')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_address ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.client.client_address ',
                                'placeholder'=>__('client_address'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('client_nationality')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_nationality', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.client.client_nationality',
                                'placeholder'=>__('client_nationality'),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('adrs_country') ?></label>
                        <div class="div">
                            <tags-input 
                                ng-model="rec.client.country" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('country') ?>" 
                                display-property="text"
                                key-property="value"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'countries')"></auto-complete>
                            </tags-input>

                        </div>
                    </div>

                   
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                                <label><?= __('adrs_city') ?></label>
                                <div class="div">
                                    <tags-input 
                                        ng-model="rec.client.city" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('city') ?>" 
                                        display-property="text"
                                        key-property="value"
                                    >
                                        <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'cities')"></auto-complete>
                                    </tags-input>

                                </div>
                            </div>

                 
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                                <label><?= __('adrs_region') ?></label>
                                <div class="div">
                                    <tags-input 
                                        ng-model="rec.client.region" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('region') ?>" 
                                        display-property="text"
                                        key-property="value"
                                    >
                                        <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'regions')"></auto-complete>
                                    </tags-input>

                                </div>
                            </div>



                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" ng-click="toggleAddClientForm()" id="client_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>
                </form>

                

            </div> -->
        </div>
    </div>
</div>

