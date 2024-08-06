<div class="modal fade" id="viewLog_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>Log Preview
                    </button>
                </div>

                <button type="button" id="log_btn" class="hideIt" ng-click="
                        doGet('/admin/logs?id='+rec.log.id, 'rec', 'logs');
                        doGet('/admin/logs/index?list=1', 'list', 'logs'); 
                        closeModal('#subModal');
                                        ">
                </button>
                <div class="m-3">
                    <div class="heading">
                        <div class="title">Log Information</div>
                        <div class="flex-gap-10">

                        </div>
                    </div>

                    <div class="white-box mt-2">
                        <div class="row">
                            <div class="col-md-6 col-12 col-lg-3">
                                <span class="sm-txt mt-3" style="font-size: 14px;">
                                    <b>
                                        <?= __('user_fullname') ?>:
                                    </b>
                                </span>
                                <div class=""><b style="font-size: 14px;">{{ rec.log.user.user_fullname }} </b></div>
                                <span class="sm-txt mt-3" style="font-size: 14px;">
                                    <b>
                                        <?= __('model') ?>:
                                    </b>
                                </span>
                                <div class=""><b style="font-size: 14px;">{{ rec.log.log_url[5] }}</b></div>
                                <span class="sm-txt mt-3" style="font-size: 14px;">
                                    <b>
                                        <?= __('action') ?>:
                                    </b>
                                </span>
                                <div class=""><b style="font-size: 14px;">{{ DtSetter('actionsName', rec.log.log_url[6])
                                        }}</b></div>
                                <span class="sm-txt mt-3" style="font-size: 14px;">
                                    <b>
                                        <?= __('stat_created') ?>:
                                    </b>
                                </span>
                                <div class=""><b style="font-size: 14px;">{{rec.log.stat_created}}</b>
                                </div>
                                <span class="sm-txt mt-3" style="font-size: 14px;" ng-if="rec.log.log_changes.length > 1">
                                    <b>
                                        <?= __('before') ?>:
                                    </b>
                                </span>
                                <div class=" mb-1"  ng-if="rec.log.log_changes.length > 1" ng-repeat="(k, v) in rec.log.log_changes[1]">
                                    <b style="font-size: 14px;">{{k}}</b>:
                                    <span ng-if="isArray(v)" style="font-size: 14px;">
                                        <div ng-repeat="(subKey, subValue) in v">
                                            <div ng-if="isArray(subValue)">
                                                <div ng-repeat="(subSubKey, subSubValue) in subValue">
                                                    <p>{{subSubKey}}: {{subSubValue}}
                                                </div>
                                            </div>
                                            <div ng-if="!isArray(subValue)">
                                                {{subKey}}: {{subValue}}
                                            </div>
                                        </div>
                                    </span>
                                    <span ng-if="!isArray(v)" style="font-size: 14px;">
                                        {{v}}
                                    </span>
                                </div>
                                <span class="sm-txt mt-3"  ng-if="rec.log.log_changes.length > 1" style="font-size: 14px;">
                                    <b>
                                        <?= __('after') ?>:
                                    </b>
                                </span>
                                <div class=" mb-1"  ng-if="rec.log.log_changes.length > 1" ng-repeat="(k, v) in rec.log.log_changes[0]">

                                    <b style="font-size: 14px;">{{k}}</b>:
                                    <span ng-if="isArray(v)" style="font-size: 14px;">
                                        <div ng-repeat="(subKey, subValue) in v">
                                            <div ng-if="isArray(subValue)">
                                                <div ng-repeat="(subSubKey, subSubValue) in subValue">
                                                    <p>{{subSubKey}}: {{subSubValue}}
                                                </div>
                                            </div>
                                            <div ng-if="!isArray(subValue)">
                                                {{subKey}}: {{subValue}}
                                            </div>
                                        </div>
                                    </span>
                                    <span ng-if="!isArray(v)" style="font-size: 14px;">
                                        {{v}}
                                    </span>
                                </div>
                            </div>

                            <!-- <div ng-repeat="(k, v) in rec.log.log_changes[1]" value-checker="v"></div>
<div ng-repeat="(k, v) in rec.log.log_changes[0]" value-checker="v"></div> -->

                                <div class="col-md-6 col-12 col-lg-3" ng-if="!(rec.log.log_changes.length > 1)">
                                    <span class="sm-txt mt-3">
                                        <?= __('log_changes') ?>:
                                    </span>
                                    <div class=" mb-1" ng-repeat="(k, v) in rec.log.log_changes[0]">
                                        <b>{{k}}</b>: {{v}}
                                    </div>
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