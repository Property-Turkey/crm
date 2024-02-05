<div class="container" ng-init="
    doGet('/admin/clients/kbidata', 'rec', 'kbidata');">
    <div class="heading ">
        <div class="title" style="font-size: 16px;">KBI</div>
    </div>


    <div class="row">
        <div class="col-12">


            <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">


                <div class="row">

                    <div class="col-md-12 mb-3 d-flex">
                        <div class="white-box-dashboard mb-3 custom-table"
                            style="overflow-x: auto !important; max-height: 400px;">
                            <div class="heading">
                                <div class="title" style="font-size: 16px;">KBI</div>
                            </div>
                            <table class="table table-bordered custom-table" >
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
                                    <tr ng-repeat="cc in rec.kbidata.ccUsers">
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
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                {{}}
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

    </div>