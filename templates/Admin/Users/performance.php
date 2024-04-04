<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
$actionType = !isset ($this->request->getParam('action_type')[0]) ? 0 : $this->request->getParam('action_type')[0];

// dd($_pid);
?>

<div class="container" ng-init="
    doGet('/admin/users/index/<?= $_pid ?>?list=1', 'list', 'users');
    doGet('/admin/clients/index/<?= $_pid ?>?list=1', 'list', 'clients');">
    <div class="heading ">
        <div class="title" style="font-size: 16px;"></div>
    </div>


    <div class="row">
        <div class="col-12">

            <div class="row">

                <div class="col-md-12 mb-3 d-flex">
                    <div class="white-box-dashboard mb-3 custom-table">
                        <div class="heading">
                            <div class="title" style="font-size: 16px;">KBI</div>
                        </div>
                        <table class="table table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th>
                                        <?= __('sale_id') ?>
                                    </th>
                                    <th>
                                        <?= __('sale_name') ?>
                                    </th>
                                    <th>
                                        <?= __('current_call') ?>
                                    </th>
                                    <th>
                                        <?= __('current_spoken') ?>
                                    </th>
                                    <th>
                                        <?= __('yesterday_call') ?>
                                    </th>
                                    <th>
                                        <?= __('yesterday_spoken') ?>
                                    </th>
                                    <th>
                                        <?= __('beforeyesterday_call') ?>
                                    </th>
                                    <th>
                                        <?= __('beforeyesterday_spoken') ?>
                                    </th>
                                    <th>
                                        <?= __('2xbeforeyesterday_call') ?>
                                    </th>
                                    <th>
                                        <?= __('2xbeforeyesterday_spoken') ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                <!-- {{rec.kbidata.ccUsers}} -->
                                <tr ng-repeat="cc in lists.users track by $index" ng-if="cc.user_role == 'cc'">
                              
                                    <td>
                                    {{cc.actions_today_called}}
                                        <div>
                                            {{$index + 1}}.
                                        </div>
                                    </td>

                                    <td>
                                        <a ng-click="redirectTo(cc.id)">
                                            {{cc.user_fullname}}
                                        </a>
                                    </td>

                                    <td>
                                        <div>
                                            <a ng-if="cc.actions_today_called.length > 0"
                                                ng-click="redirectTo(cc.id, 75)">
                                                    {{cc.actions_today_called.length}}
                                            </a>
                                            <div ng-if="cc.actions_today_called.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_today_spoken.length > 0"
                                                ng-repeat="action in cc.actions_today_spoken">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_today_spoken.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <a>
                                            
                                            <a ng-if="cc.actions_yesterday_called.length > 0"
                                                ng-click="redirectToActions(cc.id)" ng-model="rec.search.cc.id">
                                                {{ cc.actions_yesterday_called.length }}
                                            </a>

                                            <div ng-if="cc.actions_yesterday_called.length === 0">
                                                0
                                            </div>
                                        </a>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_yesterday_spoken.length > 0"
                                                ng-repeat="action in cc.actions_yesterday_spoken">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_yesterday_spoken.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_bef_yesterday_called.length > 0"
                                                ng-repeat="action in cc.actions_bef_yesterday_called">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_bef_yesterday_called.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_bef_yesterday_spoken.length > 0"
                                                ng-repeat="action in cc.actions_bef_yesterday_spoken">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_bef_yesterday_spoken.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_befbef_yesterday_called.length > 0"
                                                ng-repeat="action in cc.actions_befbef_yesterday_called">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_befbef_yesterday_called.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <div ng-if="cc.actions_befbef_yesterday_spoken.length > 0"
                                                ng-repeat="action in cc.actions_befbef_yesterday_spoken">
                                                {{ action.COUNT }}
                                            </div>
                                            <div ng-if="cc.actions_befbef_yesterday_spoken.length === 0">
                                                0
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>





            </div>

        </div>

    </div>