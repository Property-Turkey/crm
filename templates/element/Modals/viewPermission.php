<div class="modal fade" id="viewPermission_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>Permission Preview
                    </button>
                </div>

                <button type="button" id="user_btn" class="hideIt" ng-click="
                        doGet('/admin/permissions?id='+rec.user.id, 'rec', 'permissions');
                        doGet('/admin/permissions/index?list=1', 'list', 'permissions'); 
                        closeModal('#subModal');
                                        ">
                    </button>
                <div class="m-3">
                    <div class="heading">
                        <div class="title">Permission Information</div>
                        <div class="flex-gap-10">
                            
                        </div>
                    </div>
                    
                    <div class="white-box mt-2">
                        <div class="row">
                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('user_role') ?>
                                </span>
                                <div class="wb-ele">{{ rec.permission.permission_role }} </div>
                            </div>

            
                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('user_module') ?>
                                </span>
                                <div class="wb-ele">{{ rec.permission.permission_module }}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('permission_c') ?>
                                </span>
                                <div class="wb-ele">{{rec.permission.permission_c}}
                                </div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('permission_r') ?>
                                </span>
                                <div class="wb-ele">
                                    {{rec.permission.permission_r}}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('permission_u') ?>
                                </span>
                                <div class="wb-ele">{{rec.permission.permission_u}}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('permission_d') ?>
                                </span>
                                <div class="wb-ele">{{rec.permission.permission_d}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>