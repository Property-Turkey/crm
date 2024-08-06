<div class="modal fade" id="viewUser_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>User Preview
                    </button>
                </div>

                <button type="button" id="user_btn" class="hideIt" ng-click="
                        doGet('/admin/users?id='+rec.user.id, 'rec', 'users');
                        doGet('/admin/users/index?list=1', 'list', 'users'); 
                        closeModal('#subModal');
                                        ">
                    </button>
                <div class="m-3">
                    <div class="heading">
                        <div class="title">User Information</div>
                        <div class="flex-gap-10">
                            
                        </div>
                    </div>
                    
                    <div class="white-box mt-2">
                        <div class="row">
                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('user') ?>
                                </span>
                                <div class="wb-ele">{{ rec.user.user_fullname }} </div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('email') ?>
                                </span>
                                <div class="wb-ele">{{ rec.user.email }}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('user_role') ?>
                                </span>
                                <div class="wb-ele">{{ rec.user.user_role }}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('mobile') ?>
                                </span>
                                <div class="wb-ele"><i class="fa fa-mobile w20px"></i> {{rec.user.user_configs.mobile}}
                                </div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('adrs') ?>
                                </span>
                                <div class="wb-ele"><i class="fa fa-map-marker w20px"></i>
                                    {{rec.user.user_configs.address}}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('stat_lastlogin') ?>
                                </span>
                                <div class="wb-ele">{{rec.user.stat_lastlogin}}</div>
                            </div>

                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('stat_created') ?>
                                </span>
                                <div class="wb-ele">{{rec.user.stat_created}}</div>
                            </div>


                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt">
                                    <?= __('rec_state') ?>
                                </span>
                                <div class="wb-ele" ng-bind-html="DtSetter( 'bool2', rec.user.rec_state )"></div>
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