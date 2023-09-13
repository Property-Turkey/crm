<?php
$ctrl = $this->request->getParam('controller') == 'Properties' ? 'property' : 'project';
$prefix = $this->request->getParam('controller') == 'Properties' ? 'PROP' : 'PROJ';
?>

<div class="modal fade modal-right" id="searchUser_mdl" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <form method="post" novalidate="novalidate" id="searchUser_form" class="row" 
                            ng-submit=" rec.search.page = 1; doSearch(); ">

                                <?php // GENERAL SEARCH 
                                ?>
                                <div class="col-sm-12">
                                    <h5 data-toggle="collapse" data-target="#searchUser_sec" class="sec_header"> <?= __('general_search') ?> </h5>
                                </div>
                                <div id="searchUser_sec" class="collapse show col-12" data-parent="#searchUser_form">
                                    <div class="row">

                                        

                                        <div class="mb-2  col-12">
                                            <label><?= __('user_fullname') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('user_fullname', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'text', 
                                                    'placeholder' => __('user_fullname'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.user_fullname',
                                    
                                                ]) ?>
                                                <span class="fa fa-address-card form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-2 col-12">
                                            <label><?= __('user_role') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('user_role', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'tel',
                                                    'placeholder' => __('user_role'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.user_role',
                                                ]) ?>

                                                <span class="fa fa-{{DtSetter('currencies', '<?=$currCurrency?>').toLowerCase()}} form-control-feedback left"></span>
                                                <button ng-click="doClick('#submit_btn')" class="onfly_btn"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>

                                        <div class="mb-2 col-12">
                                            <label><?= __('email') ?></label>
                                            <div class="div">
                                                <?= $this->Form->control('email', [
                                                    'class' => 'form-control has-feedback-left', 'label' => false,
                                                    'type' => 'tel',
                                                    'placeholder' => __('email'),
                                                    'ng-change'=>'doSearch()',
                                                    'ng-model' => 'rec.search.email',
                                                ]) ?>

                                                <span class="fa fa-{{DtSetter('currencies', '<?=$currCurrency?>').toLowerCase()}} form-control-feedback left"></span>
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