<?php
$ctrl = $this->request->getParam('controller') == 'Properties' ? 'property' : 'project';
$prefix = $this->request->getParam('controller') == 'Properties' ? 'PROP' : 'PROJ';
?>

<div class="modal fade modal-right" id="searchClient_mdl" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <form method="post" novalidate="novalidate" id="searchClient_form" class="row" 
                            ng-submit=" rec.search.page = 1; doSearch(); ">

                                <?php // GENERAL SEARCH 
                                ?>
                                <div class="col-sm-12">
                                    <h5 data-toggle="collapse" data-target="#searchClient_sec" class="sec_header"> <?= __('general_search') ?> </h5>
                                </div>
                                <div id="searchClient_sec" class="collapse show col-12" data-parent="#searchClient_form">
                                    <div class="row">

                                        

                                        <div class="mb-2  col-12">
                                            <label><?= __('client_name') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_name', [
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
                                        
                                        <div class="mb-2 col-12">
                                            <label><?= __('client_phone') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_phone', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'tel',
                                                    'placeholder' => __('client_phone'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.client_phone',
                                                ]) ?>

                                                <span class="fa fa-{{DtSetter('currencies', '<?=$currCurrency?>').toLowerCase()}} form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2 col-12">
                                            <label><?= __('client_mobile') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_mobile', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'tel',
                                                    'placeholder' => __('client_mobile'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.client_mobile',
                                                ]) ?>

                                                <span class="fa fa-{{DtSetter('currencies', '<?=$currCurrency?>').toLowerCase()}} form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-12">
                                            <label><?= __('client_email') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_email', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type'=>'text',
                                                    'placeholder' => __('client_email'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.client_email',
                                    
                                                ]) ?>
                                                <span class="fa fa-address-card form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-12">
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

                                        <div class="mb-2  col-12">
                                            <label><?= __('client_nationality') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_nationality', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('client_nationality'),
                                                    'ng-change'=>'doSearch()',
                                                    // 'options'=>$optionsType,
                                                    'empty'=>'Select Sale client_nationality',
                                                    'ng-model' => 'rec.search.client_nationality',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        

                                        <div class="mb-2  col-12">
                                            <label><?= __('adrs_country') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('adrs_country', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('adrs_country'),
                                                    'ng-change'=>'doSearch()',
                                                    // 'options'=>$optionsType,
                                                    'empty'=>'Select Sale Category Type',
                                                    'ng-model' => 'rec.search.adrs_country',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-12">
                                            <label><?= __('adrs_city') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('adrs_city', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select',
                                                    'placeholder' => __('adrs_city'),
                                                    'ng-change' => 'doSearch()',
                                                    'ng-model' => 'rec.search.adrs_city',
                                                    'options' => '',
                                                ]) ?>
                                                <span class="fa fa-address-card form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2  col-12">
                                            <label><?= __('adrs_region') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('adrs_region', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('adrs_region'),
                                                    'ng-change'=>'doSearch()',
                                                    // 'options'=>$optionsPool,
                                                    'empty'=>'Select adrs_region',
                                                    'ng-model' => 'rec.search.adrs_region',
                                                ]) ?>
                                                <span class="fa fa-level-up form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        

                                        <div class="mb-2  col-12">
                                            <label><?= __('client_address') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('client_address', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'select', 
                                                    'placeholder' => __('client_address'),
                                                    'ng-change'=>'doSearch()',
                                                    'options'=>'',
                                                    'empty'=>'Select Sale Current Stage',
                                                    'ng-model' => 'rec.search.client_address',
                                                ]) ?>
                                                <span class="fa fa-flash form-control-feedback left" aria-hidden="true"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-6 form-group has-feedback center d-flex justify-content-center">
                                            
                                            <button ng-click="clearSearchFields()" class="btn btn-danger"> Clear All<i class="fa fa-clear"></i></button>

                                        </div>

                            
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