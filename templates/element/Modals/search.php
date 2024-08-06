<?php
$ctrl = $this->request->getParam('controller') == 'Properties' ? 'property' : 'project';
$prefix = $this->request->getParam('controller') == 'Properties' ? 'PROP' : 'PROJ';
?>

<div class="modal fade modal-right" id="search_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg aside-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">
                    <?= __('search_and_filter') ?>
                </h2>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" novalidate="novalidate" id="searchSale_form" class="row" 
                            ng-submit=" rec.search.page = 1; doSearch(); ">

                                <?php // GENERAL SEARCH 
                                ?>
                                <div class="col-sm-12">
                                    <h5 data-toggle="collapse" data-target="#searchSale_sec" class="sec_header"> <?= __('general_search') ?> </h5>
                                </div>
                                <div id="searchSale_sec" class="collapse show col-12" data-parent="#searchSale_form">
                                    <div class="row">

                                        <div class="mb-2 col-sm-8">
                                            <label><?= __('Budget') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('budget', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'text',
                                                    'placeholder' => __('budget'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.sale_budget.budget_min',
                                                ]) ?>

                                                <?= $this->Form->control('budget', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'text',
                                                    'placeholder' => __('budget'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.sale_budget.budget_max',
                                                ]) ?>
                                                <span class="fa fa-{{DtSetter('currencies', '<?=$currCurrency?>').toLowerCase()}} form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('client_name') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_id', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'text', 
                                                    'placeholder' => __('client_name'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.client_name',
                                    
                                                ]) ?>
                                                <span class="fa fa-address-card form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('source_id') ?></label>
                                            <div class="row">
                                                <?php foreach ($optionsSource as $key => $value): ?>
                                                    <div class="col d-flex align-items-center">
                                                        <label>
                                                            <input type="radio" name="source_id" value="<?= $key ?>" 
                                                                ng-change="doSearch()" ng-model="rec.search.source_id" />
                                                            <?= $value ?>
                                                        </label>
                                                    </div><br>
                                                    
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('client_priority') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_priority', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('client_priority'),
                                                    'ng-change'=>'doSearch()',
                                                    'options'=>$this->Do->lcl( $this->Do->get('sale_priorities') ),
                                                    'empty'=>'Select Sale Priority',
                                                    'ng-model' => 'rec.search.client_priority',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('category_id') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('category_id', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('category_id'),
                                                    'ng-change'=>'doSearch()',
                                                    'options'=>$optionsType,
                                                    'empty'=>'Select Sale Category Type',
                                                    'ng-model' => 'rec.search.category_id',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('category_id') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('category_id', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select',
                                                    'placeholder' => __('category_id'),
                                                    'ng-change' => 'doSearch()',
                                                    'ng-model' => 'rec.search.category_id',
                                                    'options' => '',
                                                ]) ?>
                                                <span class="fa fa-address-card form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('pool_id') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('pool_id', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('pool_id'),
                                                    'ng-change'=>'doSearch()',
                                                    'options'=>$optionsPool,
                                                    'empty'=>'Select Sale Pool',
                                                    'ng-model' => 'rec.search.pool_id',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        

                                        <div class="mb-2  col-sm-8">
                                            <label><?= __('sale_current_stage') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('sale_current_stage', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('sale_current_stage'),
                                                    'ng-change'=>'doSearch()',
                                                    'options'=>$this->Do->lcl( $this->Do->get('sale_current_stage') ),
                                                    'empty'=>'Select Sale Current Stage',
                                                    'ng-model' => 'rec.search.sale_current_stage',
                                                ]) ?>
                                                <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 form-group has-feedback">
                                            <label><?= __('sale_tags') ?></label>
                                            <div class="div">
                                                
                                                <tags-input ng-model="rec.search.sale_tags" ng-change="doSearch()" add-from-autocomplete-only="true" display-property="text" >
                                                    <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'categories')"></auto-complete>
                                                </tags-input>

                                                <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-group has-feedback center d-flex justify-content-center">
                                            
                                            <button ng-click="clearSearchFields()" class="btn btn-danger"> Clear All<i class="fa fa-clear"></i></button>

                                        </div>

                            
                                    </div>
                                </div>


                                <!-- <?php // ADDRESS 
                                ?>
                                <div class="col-sm-12">
                                    <h5 data-toggle="collapse" data-target="#address_sec" class="sec_header"> <?= __('address') ?></h5>
                                </div>
                                <div id="address_sec" class="collapse col-12" data-parent="#search_form">
                                    <div class="row mb-2">
                                        <div class=" col-sm-4">
                                            <label><?= __('adrs_city') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control("adrs_city", [
                                                    "class" => "form-control has-feedback-left", "type" => "text",
                                                    "empty" => __("select_language"), "label" => false,
                                                    "ng-model" => "rec.search.adrs_city", "placeholder" => __("adrs_city"),
                                                    'ng-change' => "findAddress('adrs_city')",
                                                    'ng-focus' => "findAddress('adrs_city')",
                                                    "name" => false, "autocomplete" => "off",
                                                ]) ?>
                                                <span class="fa fa-map-marker form-control-feedback left"></span>
                                            </div>
                                            <div class="onfly_menu" click-outside="lists.addresses['adrs_city']=[];">
                                                <a href ng-repeat="itm in lists.addresses['adrs_city']" ng-click="
                                                        rec.search.adrs_city = itm.adrs_city; 
                                                        doClick('#submit_btn');
                                                        lists.addresses['adrs_city']=[];
                                                        ">{{itm.adrs_city}}</a>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <label><?= __('adrs_region') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control("adrs_region", [
                                                    "class" => "form-control has-feedback-left", "type" => "text",
                                                    "empty" => __("select_language"), "label" => false,
                                                    "ng-model" => "rec.search.adrs_region", "placeholder" => __("adrs_region"),
                                                    'ng-change' => "findAddress('adrs_region')",
                                                    'ng-focus' => "findAddress('adrs_region')",
                                                    "name" => false, "autocomplete" => "off",
                                                ]) ?>
                                                <span class="fa fa-map-marker form-control-feedback left"></span>
                                            </div>
                                            <div class="onfly_menu" click-outside="lists.addresses['adrs_region']=[];">
                                                <a href ng-repeat="itm in lists.addresses['adrs_region']" ng-click="
                                                        rec.search.adrs_region = itm.adrs_region; 
                                                        doClick('#submit_btn');
                                                        lists.addresses['adrs_region']=[];
                                                        ">{{itm.adrs_region}}</a>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                            </form>
                        </div>

                        <div class="col-sm-12 mb-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>