<?php
$starterDate = !isset($_GET['startDate']) ? date('Y-m-d', strtotime('first day of this month')) : $_GET['startDate'];
$endDate = !isset($_GET['endDate']) ? date('Y-m-d') : $_GET['endDate'];
?>


<div class="container-fluid px-4" ng-init="
    doGet('/admin/clients/numbers', 'rec', 'numbers');
    doGet('/admin/clients/bar', 'rec', 'bar');
    doGet('/admin/clients/doughnut', 'rec', 'doughnut');
    doGet('/admin/clients/notifications', 'rec', 'notification');">


    <!-- {{rec.doughnut.sourceDoughnutData}} -->

    <?php
    // <!-- Contact Settings -->
    ?>

    <div class="heading ">
        <div class="title dashoardFont">Dashboard</div>
    </div>





    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default mb-3" ng-class="{ 'custom-style': showFilters }">


                <div class="filter-row">
                    <!-- Date Period Select -->
                    <label for="" class="filter-label">
                        <span class="sm-txt">
                            <?= __('date_period') ?>
                        </span>
                        <select name="category_id" class="wb-ele-dashboard py-1" ng-model="rec.dashboard.dateFilter"
                            ng-change="updateCharts()">
                            <option value="" selected="selected">Select Time</option>
                            <option value="0">All</option>
                            <option value="{{ dateId }}" ng-repeat="(dateId, dateName) in rec.numbers.dateFilter">{{
                                dateName }}</option>
                        </select>
                    </label>


                    <!-- Start Date Input -->
                    <label for="" class="filter-label">
                        <span class="sm-txt" for="starterDate">
                            <?= __('start_date') ?>:
                        </span>
                        <input date-format class="wb-ele-dashboard py-1" type="date" id="starterDate"
                            ng-model="rec.dashboard.starterDate"
                            ng-init="rec.dashboard.starterDate = rec.dashboard.starterDate || currentDate">
                    </label>

                    <!-- End Date Input -->
                    <label for="" class="filter-label">
                        <span class="sm-txt" for="endDate">
                            <?= __('end_date') ?>:
                        </span>
                        <input date-format class="wb-ele-dashboard py-1" type="date" id="endDate"
                            ng-model="rec.dashboard.endDate" ng-change="getDashClientsByDateRange()">
                    </label>


                    <!-- Search Button -->

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div>
                            <?= __('please_wait') ?>
                        </div>
                    </div>
                </div>

            </div>





            <?php if (in_array($authUser['user_role'], ['cc']) || isset($authUser['user_original_role'])) { ?>
                <div class="notifications-boxes">

                    <div class="colored-box badge greenBg" ng-if="rec.notification.newAssignCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newAssignCount"></span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Assigns
                        </div>
                    </div>

                    <div class="colored-box badge redBg" ng-if="rec.notification.newReminderCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newReminderCount"></span>
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Reminders</div>
                    </div>

                </div>
            <?php } ?>

            <?php if (in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field']) || isset($authUser['user_original_role'])) { ?>
                <div class="notifications-boxes">

                    <div class="col-1 colored-box badge" ng-if="rec.notification.newClientsCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newClientsCount"></span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Sold Online
                        </div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newBookedCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newBookedCount"></span>
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Booked</div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newSoldCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newSoldCount"></span>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Sold</div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newCancelledCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newCancelledCount"></span>
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Cancelled</div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newDownPaymentCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newDownPaymentCount"></span>
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Down Payment</div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newReservedCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newReservedCount"></span>
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Reserved</div>
                    </div>
                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.newSoldOnlineCount != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newSoldOnlineCount"></span>
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Sold Online</div>
                    </div>
                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.invoiceSend != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.invoiceSend"></span>
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Invoice Not Sent</div>
                    </div>

                    <div class="col-1 colored-box badge redBg" ng-if="rec.notification.commissionCollacted != 0"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.commissionCollacted"></span>
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">Commission Collacted</div>
                    </div>


                </div>
            <?php } ?>


            <div class="white-box-dashboard mb-3 sales_funnelDashboard">
                <div class="row col-md-2">
                    <div class="heading my-1 dashboard-h">
                        <div class="title-d">
                            <?= __('sales_funnel') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="chart-container">
                        <canvas chart-directive chart-type="bar" data="rec.bar.data"></canvas>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3 d-flex">
                    <div class="white-box-dashboard mb-3">

                        <div class="row col-md-3">
                            <div class="heading my-1 dashboard-h">
                                <div class="title-d">
                                    <?= __('lead_sources') ?>
                                </div>
                            </div>
                        </div>

                        <div class="chart-container">
                            <canvas chart-directive chart-type="doughnut"
                                data="rec.doughnut.sourceDoughnutData"></canvas>
                        </div>

                    </div>
                </div>


                <div class="col-md-6 mb-3 d-flex">
                    <div class="white-box-dashboard mb-3">


                        <div class="row">
                            <div class="heading my-1 dashboard-h">
                                <div class="title-d">
                                    <?= __('conversation_rate') ?>
                                </div>
                            </div>

                            <label for="" class="col-md-4">

                                <select name="category_id" class="wb-ele-dashboard py-1"
                                    ng-model="rec.dashboard.recstate" ng-change="updateStateCharts()">
                                    <option value="" selected="selected">Select State</option>
                                    <option value="{{ dateId }}"
                                        ng-repeat="(dateId, dateName) in rec.numbers.recStateList">Leads - {{
                                        dateName }}</option>
                                </select>

                            </label>

                        </div>
                        <div class="flex-center  flex-gap-5">
                            <div class="heading my-0 dashboard-h">
                                <div class="title" style="font-size: 35px;color:black;">
                                    {{rec.numbers.recStateRatio}} %
                                </div>
                            </div>
                        </div>
                        <div class="flex-center mt-4">

                            <i class="fa fa-arrow-right" aria-hidden="true"
                                style="font-size: 36px;margin-top: 40px;"></i>
                            <i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 36px;"></i>
                        </div>



                        <div class="grid-container">
                            <div class="custom-icon">
                                <i class="fa fa-user" aria-hidden="true"
                                    style="width: 39px;height: 39px;text-align:center;"></i>
                                <div class="triangle"></div>
                                <div class="text-content">
                                    <p><b>
                                            <?= __('leads') ?>
                                        </b></p>
                                    <p>
                                        {{rec.numbers.clientCount}}
                                    </p>

                                </div>
                            </div>
                            <div class="vl"></div>
                            <div class="custom-icon">
                                <i class="fa fa-area-chart" aria-hidden="true" style="width: 39px;height: 39px;"></i>
                                <div class="triangle"></div>
                                <div class="text-content">
                                    <p ng-if="rec.numbers.selectedRecStateName">
                                        <b>
                                            {{rec.numbers.selectedRecStateName}}
                                        </b>
                                    </p>
                                    <p ng-if="!rec.numbers.selectedRecStateName">
                                        <b>
                                            Select State
                                        </b>
                                    </p>
                                    <p>
                                        {{ rec.numbers.stateCount }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6 mb-3 d-flex">
                    <div class="white-box-dashboard mb-3" style="max-height: 400px;">
                        <div class="row m-1">
                            <div class="col-12">
                                <div class="row">
                                    <div class="heading my-1 dashboard-h">
                                        <div class="title-d">
                                            <?= __('leads_bycountry') ?>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12">
                                <div ng-repeat="(id, data) in rec.numbers.groupedData"
                                    class="mt-3 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img ng-src="" class="img-fluid rounded-circle"
                                            style="width: 70px; height: 70px;" />
                                        <span class="ms-2">
                                            {{ data.count }}<br>
                                            <span style="font-size:12px;">{{ data.adrs_name }}</span>
                                        </span>
                                    </div>
                                    <div class="text-center text-success">
                                        {{ (data.count / rec.numbers.clientCount * 100).toFixed(2) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3 d-flex">
                    <div class="white-box-dashboard mb-3" style="max-height: 400pxmd-;">

                        <div class="row m-1">

                            <div class="col-12">
                                <div class="row">
                                    <div class="heading my-1 dashboard-h">
                                        <div class="title-d">Calls by Country</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div ng-repeat="data in rec.numbers.addressData"
                                    class="mt-3 d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <!-- <img ng-src="{{ '/img/' + data.adrs_name + '.jpg' }}"
                                            class="img-fluid rounded-circle" style="width: 50px; height: 50px;" />
                                        <span class="ms-2">
                                            {{ data.count }}<br>
                                            <span style="font-size:12px;">{{ data.adrs_name }}</span>
                                        </span> -->
                                    </div>
                                    <div class="text-center text-success">
                                        <!-- {{ (data.count / 409) * 100 | number:1 }}% -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            <?php if (in_array($authUser['user_role'], ['admin.admin', 'admin.root']) || isset($authUser['user_original_role'])) { ?>
                <div class="panel panel-default mb-3" ng-class="{ 'custom-style': showFilters }">
                    <div class="filter-row">
                        <!-- Advisor Select -->
                        <label for="" class="filter-label">
                            <span class="sm-txt">
                                <?= __('client_current_stage') ?>
                            </span>
                            <select name="category_id" class="wb-ele-dashboard py-1" ng-model="rec.dashboard.user_id"
                                ng-change="updateCharts()">
                                <option value="" selected="selected">Select User</option>
                                <option value="0">All</option>
                                <option value="{{ userId }}" ng-repeat="(userId, userName) in rec.numbers.users">{{ userName
                                    }}</option>
                            </select>
                        </label>
                    </div>
                </div>
            <?php } ?>


            
            <div class="notifications-boxes">
                <div class=" colored-box badge redBg" ng-if="rec.notification.recStateOneRecords != 0"
                >
                    <span class="notification-badge" format-currency="rec.notification.recStateOneRecords"></span>
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                    <div class="m-1 d-none d-lg-block">Reallocate Clients</div>
                </div>
            </div>

            <div class="white-box-dashboard mb-3">
                <div class="row m-1">
                    <div class="col-4">
                        <div class="custom-box leads_countBg">
                            <i class="fa fa-user icon" aria-hidden="true"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('leads_count') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title leads_countFont">
                                {{rec.numbers.clientCount}}
                            </div>
                        </div>
                    </div>





                </div>
            </div>



            <div class="white-box-dashboard mb-3">
                <div class="row m-1">
                    <div class="col-7">
                        <div class="custom-box calls_listBg">
                            <i class="fa fa-phone icon" aria-hidden="true"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('calls_list') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title calls_listFont">
                                {{rec.numbers.reminderCount}}
                            </div>
                        </div>
                    </div>
                    <div class="col-5">

                    </div>
                </div>


            </div>
            <div class="white-box-dashboard mb-3">


                <div class="row m-1">
                    <div class="col-7">
                        <div class="custom-box call_logBg">
                            <i class="fa fa-phone icon" aria-hidden="true"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('call_log') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title call_logFont">
                                {{rec.numbers.actionCount}} <span>Out of
                                    {{rec.numbers.AllactionCount}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">

                    </div>
                </div>


            </div>
            <div class="white-box-dashboard mb-3">


                <div class="row m-1">
                    <div class="col-7">
                        <div class="custom-box bookingsBg">
                            <svg xmlns="http://www.w3.org/2000/svg" height="22" width="24" viewBox="0 0 576 512">
                                <path fill="#d036a0"
                                    d="M542.2 32.1c-54.8 3.1-163.7 14.4-231 55.6-4.6 2.8-7.3 7.9-7.3 13.2v363.9c0 11.6 12.6 18.9 23.3 13.5 69.2-34.8 169.2-44.3 218.7-46.9 16.9-.9 30-14.4 30-30.7V62.8c0-17.7-15.4-31.7-33.8-30.7zM264.7 87.6C197.5 46.5 88.6 35.2 33.8 32.1 15.4 31 0 45 0 62.8V400.6c0 16.2 13.1 29.8 30 30.7 49.5 2.6 149.6 12.1 218.8 47 10.6 5.4 23.2-1.9 23.2-13.5V100.6c0-5.3-2.6-10.1-7.3-13z" />
                            </svg>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('bookings') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h bookingsFont">
                            <div class="title">
                                {{rec.numbers.booksCount}}
                            </div>
                        </div>
                    </div>
                    <div class="col-5">

                    </div>
                </div>


            </div>
            <div class="white-box-dashboard mb-3">


                <div class="row m-1">
                    <div class="col-7">
                        <div class="custom-box pursebg">
                            <i class="fa fa-check icon pursecolor" aria-hidden="true"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('pursue') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h pursecolorFont">
                            <div class="title">
                                {{rec.numbers.pursueCount}}
                            </div>
                        </div>
                    </div>
                    <div class="col-5">

                    </div>
                </div>


            </div>



        </div>
    </div>
    <?php echo $this->element('Modals/viewReallocate') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

    