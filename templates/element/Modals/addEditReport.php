
<div class="modal fade mt-5 pt-5" id="addEditReport_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
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
                            

                            <button type="button" 
                            class="close" data-dismiss="modal" 
                            aria-hidden="true" id="report_btn"
                            ng-click="doGet('/admin/<?= ($this->request->getParam('controller') === 'Clients') ? 'clients' : (($this->request->getParam('controller') === 'Sales') ? 'sales' : '') ?>?id='+rec.<?= ($this->request->getParam('controller') === 'Clients') ? 'client' : (($this->request->getParam('controller') === 'Sales') ? 'sale' : '') ?>.id, '<?= ($this->request->getParam('controller') === 'Clients') ? 'client' : (($this->request->getParam('controller') === 'Sales') ? 'sale' : '') ?>', 'rec')"></button>
                        
                        
                            <form  class="row" id="report_form" ng-submit="
                                rec.report.tar_id = rec.<?= ($this->request->getParam('controller') === 'Clients') ? 'client' : (($this->request->getParam('controller') === 'Sales') ? 'sale' : '') ?>.id; 
                                rec.report.tar_tbl = '<?=$this->request->getParam('controller')?>'; 
                                doSave(rec.report, 'report', 'reports', '#report_btn', '#report_preloader');">

                                <!-- Existing form fields ... -->
                                <h2 class="col-12"><?=__('add_report')?></h2>
                                
                                <div class="col-md-6 col-6  form-group has-feedback">
                                    <label><?= __('status_id') ?></label>
                                    <div class="div">
                                        <?= $this->Form->text('status_id', [
                                            'type' => 'select',
                                            'options'=> $optionsStatus,
                                            'empty' => 'Select Status',
                                            'class' => 'form-control has-feedback-left',
                                            'ng-model' => 'rec.report.status_id',
                                        ]) ?>
                                        <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-6  form-group has-feedback">
                                    <label><?= __('report_type') ?></label>
                                    <div class="div">
                                        <?= $this->Form->text('report_type', [
                                            'type' => 'select',
                                            'options'=> $optionsReport,
                                            'empty' => 'Select report_type',
                                            'class' => 'form-control has-feedback-left',
                                            'ng-model' => 'rec.report.report_type',
                                        ]) ?>
                                        <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-12  form-group has-feedback">
                                    <label set-required><?=__('report_text')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('report_text', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'textarea',
                                            'ng-model'=>'rec.report.report_text',
                                            'placeholder'=>__('report_text'),
                                        ])?>
                                        <span class="fa fa-report form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 form-group has-feedback">
                                    <button type="submit" class="btn btn-info" id="report_preloader"><span></span> 
                                    <i class="fa fa-save"></i> <?=__('save')?></button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>