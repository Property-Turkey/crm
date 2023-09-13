

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

            <div class="modal-body">

                

                <button type="button" id="sale_btn" class="hideIt" ng-click=
                    "doGet('/admin/sales/index?list=1', 'list', 'sales');   rec.sale = {}; doClick('.close');
                     newEntity('category');">
                </button>

                <!-- Sale form -->
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
                            
                            <tags-input ng-model="rec.sale.sale_tags" add-from-autocomplete-only="true" display-property="text" >
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

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('sale_current_stage')?></label>
                        <div class="div">
                            <?=$this->Form->control('sale_current_stage', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'select',
                                'ng-model'=>'rec.sale.sale_current_stage',
                                'options'=>$this->Do->lcl( $this->Do->get('sale_current_stage') ),
                                // 'ng-change'=>''
                                'empty'=>'Select Sale Cuurent Stage',
                            ])?>
                            <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" ng-if="rec.sale.id">
                        <label set-required><?= __('rec_state') ?></label>
                        <div class="div">
                            <!-- Client select input -->
                            <select class="form-control has-feedback-left"
                                    ng-model="rec.sale.rec_state"
                                    ng-change="onClientSelectionChange()"
                                    >
                                <option value="">Select rec_state</option>
                                <option ng-repeat="(stateId, stateName) in DtSetter('rec_stateSale', rec.sale.sale_current_stage)" value="{{stateId}}">{{stateName}}</option>
                            </select>
                            <span class="fa fa-address-book form-control-feedback left" aria-hidden="true"></span>
                        </div>
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

                    <div class="col-md-6 col-sm-12 form-group has-feedback" ng-if="rec.sale.id">
                        <button type="submit" class="btn btn-info" id="" ng-click="updateSaleCurrentStage()"><span></span> 
                        <i class="fa fa-book"></i> <?=__('assign to another stage')?></button>
                    </div>
                    
                    <div class="col-md-6 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="sale_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>

                    <div class="ROW" ng-if="rec.sale.id">
                        <div class="col-md-6 col-sm-12 form-group has-feedback" ng-if="rec.sale.id">
                            <button type="submit" class="btn btn-info" id="" ng-click="updateSaleCurrentStage()"><span></span> 
                            <i class="fa fa-book"></i> <?=__('assign this sale to another person(s)')?></button>
                        </div>

                        <div class="col-md-6 col-sm-6 form-group has-feedback">
                            <label><?= __('user_id') ?></label>
                            <div class="div">
                                <tags-input 
                                    ng-model="rec.usersale.user" 
                                    add-from-autocomplete-only="true" 
                                    placeholder="<?= __('user_id') ?>" 
                                    display-property="text"
                                    key-property="value"
                                >
                                    <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'users')"></auto-complete>
                                </tags-input>

                            </div>
                        </div>
                    </div>
                   
                </form>


                <!-- Client form -->
                 <button type="button" id="client_btn" class="hideIt" ng-click="
                doGet('/admin/clients/index?list=1', 'list', 'clients');   rec.client = {};
                doClick('.close');"></button>

                <!-- Client form -->
                <form class="row" id="client_form"  ng-show="showAddClientForm" ng-submit="
                    doSave(rec.client, 'client', 'clients', '#client_btn', '#client_preloader');">

                    <!-- Existing form fields ... -->
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('source_id') ?></label>
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
                        <label set-required><?=__('client_phone')?></label>
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
                        <label set-required><?=__('client_email ')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_email ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'email',
                                'ng-model'=>'rec.client.client_email ',
                                'placeholder'=>__('client_email '),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('client_address ')?></label>
                        <div class="div">
                            <?=$this->Form->control('client_address ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.client.client_address ',
                                'placeholder'=>__('client_address '),
                            ])?>
                            <span class="fa fa-client form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('client_nationality')?></label>
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
                            <?= $this->Form->control('adrs_country', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                // 'options' => $optionsSource, 
                                'empty' => 'Select adrs_country', 
                                'ng-model' => 'rec.client.adrs_country',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('adrs_city') ?></label>
                        <div class="div">
                            <?= $this->Form->control('adrs_city', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                // 'options' => $optionsSource, 
                                'empty' => 'Select adrs_city', 
                                'ng-model' => 'rec.client.adrs_city',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('adrs_region ') ?></label>
                        <div class="div">
                            <?= $this->Form->control('adrs_region ', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                // 'options' => $optionsSource, 
                                'empty' => 'Select adrs_region ', 
                                'ng-model' => 'rec.client.adrs_region ',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="sale_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>
                    
                </form>

                

            </div>
        </div>
    </div>
</div>

