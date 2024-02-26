<div class="container" ng-init="
    doGet('/admin/users/performancedata', 'rec', 'performancedata');">
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
                                    <tr ng-repeat="cc in rec.performancedata.ccUsers">
                                        <td>
                                            <div>
                                                {{$index + 1}}.
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{cc.user_fullname}}


                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <div ng-if="cc.actions_today_called.length > 0"
                                                    ng-repeat="action in cc.actions_today_called">
                                                    {{ action.COUNT }}
                                                </div>
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
                                            <div>
                                                <div ng-if="cc.actions_yesterday_called.length > 0"
                                                    ng-repeat="action in cc.actions_yesterday_called">
                                                    {{ action.COUNT }}
                                                </div>
                                                <div ng-if="cc.actions_yesterday_called.length === 0">
                                                    0
                                                </div>
                                            </div>
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