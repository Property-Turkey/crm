
<!-- addEditClient_mdl modal -->
<div class="modal fade" id="addEditClient_mdl" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header and title -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div ng-if="!rec.client.id"><?=__('add')?></div>
                    <div ng-if="rec.client.id"><?=__('edit')?></div>
                </h4>
            </div>
            <!-- ... (existing code) ... -->

            <div class="modal-body">

            <button type="button" id="sale_btn" class="hideIt" ng-click=
                "doGet('/admin/sales/index?list=1', 'list', 'sales');   rec.sales = {}; doClick('.close');"></button>




                <button type="button" id="client_btn" class="hideIt" ng-click="
                doGet('/admin/clients/index?list=1', 'list', 'clients');   rec.client = {};
                doClick('.close');"></button>

                <!-- Client form -->
                <form class="row" id="client_form" ng-submit="
                    doSave(rec.client, 'client', 'clients', '#client_btn', '#client_preloader');">

                    <!-- Existing form fields ... -->
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
                            <?= $this->Form->control('adrs_country', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                // 'options' => $optionsSource, 
                                'empty' => 'Select Country', 
                                'ng-model' => 'rec.client.adrs_country',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('adrs_country') ?></label>
                        <div class="div">
                            <tags-input 
                                ng-model="rec.client.adrs_country" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('adrs_country') ?>" 
                                display-property="text"
                                key-property="value"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'crmcountries')"></auto-complete>
                            </tags-input>

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
                                'empty' => 'Select City', 
                                'ng-model' => 'rec.client.adrs_city',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('adrs_region') ?></label>
                        <div class="div">
                            <?= $this->Form->control('adrs_region', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select', 
                                // 'options' => $optionsSource, 
                                'empty' => 'Select  Region ', 
                                'ng-model' => 'rec.client.adrs_region ',
                            ]) ?>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="client_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
