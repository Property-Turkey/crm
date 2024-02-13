<?php
$from = !isset($_GET['from']) ? date('Y-m-d', strtotime('first day of this month')) : $_GET['from'];
$to = !isset($_GET['to']) ? date('Y-m-d') : $_GET['to'];
?>

<?php /*
<!-- doGet('/admin/configs/statistics', 'rec', 'stats');
doGetDelay('/admin/configs/notifications', 'rec', 'notifications'); -->
<!--<div class="right_col" role="main" ng-init="
doGet('/admin/users/dashboard', 'rec', 'dashboard');
">
<div class="" ng-init="rec.role = '<?= $authUser['user_role'] ?>'">
<div class="page-title" style="padding: 10px;">
<div class=" col-12 col-sm-6 col-md-6  side_div1">
<h3>
<?= __('general_stat') ?>
</h3>
</div>
<div class=" col-12 col-sm-6 col-md-6 side_div2">
<span class="icn">
<?= $this->element('datePicker', ['from' => $from, 'to' => $to]) ?>
</span>
<?php if (in_array($authUser['user_role'], ['admin.root']) || isset($authUser['user_original_role'])) { ?>
<span class="icn">
<?= $this->Form->control('role', [
'type' => 'select',
'options' => $this->Do->lcl($this->Do->get('AdminRoles'), false, false),
'label' => false,
'class' => 'form-control',
'ng-model' => 'rec.role',
'ng-change' => "doGet('/admin/configs/switch-role/'+rec.role)"
]) ?>
</span>
<?php } ?>
</div>
</div>

<div class="clearfix"></div>

<div class="row">

<div id="main_preloader" class="preloader col-12">
<div>
<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
</div>
<div>
<?= __('please_wait') ?>
</div>
</div>

<?php // NUMBERS   
?>
<div class="col-12">
<div class="row">
<?php //Properties 
?>
<div class=" col-md-4 col-sm-6 col-12  tile_div">

<div class="notifications_div">
<a href="<?= $app_folder ?>/admin/clients<?= $authUser['user_role'] == 'admin.content' ? '' : '?from=' . $authUser['stat_lastlogin'] ?>"
ng-if="rec.dashboard.notifications.new_properties>0" class="badge badge-success noteItm">
<i class="fa fa-bell"></i> {{rec.dashboard.notifications.new_properties}}
<?= __('new') ?>
</a>
<a href="<?= $app_folder ?>/admin/clients?stat_updated=0"
ng-if="rec.dashboard.notifications.new_outdated_properties>0"
class="badge badge-danger noteItm">
<i class="fa fa-retweet"></i> {{rec.dashboard.notifications.new_outdated_properties}}
<?= __('outdated') ?>
</a>
</div>

<a href="<?= $app_folder ?>/admin/clients" class="tile_div_content">
<span class="count_top"><i class="fa fa-home"></i>
<?= __('clients') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_active_properties}}</ii>/<small
class="grayText">{{rec.dashboard.stats.numbers.total_inactive_properties}}</small>,
<ii class="greenText">{{rec.dashboard.stats.numbers.total_outdated_properties}}/<small
class="redText">{{rec.dashboard.stats.numbers.total_updated_properties}}</small>
</div>
<span class="greenText">
<?= __('updated') ?>
</span> /
<span class="redText">
<?= __('outdated') ?>
</span>
</span>
</a>

</div>

<?php //Offices 
if (in_array($authUser['user_role'], ['admin.admin', 'admin.root'])) {
?>
<div class=" col-md-4 col-sm-6 col-6 tile_div">
<a href="<?= $app_folder ?>/admin/offices" class="tile_div_content">
<span class="count_top"><i class="fa fa-briefcase"></i>
<?= __('offices') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_offices}}</ii>
</div>
<span class="count_bottom">
<?= __('total') ?>
</span>
</a>
</div>
<?php } ?>

<?php //Sellers 
if (in_array($authUser['user_role'], ['admin.admin', 'admin.root', 'admin.supervisor'])) {
?>
<div class=" col-md-4 col-sm-6 col-6 tile_div">
<a href="<?= $app_folder ?>/admin/sellers" class="tile_div_content">
<span class="count_top"><i class="fa fa-handshake-o"></i>
<?= __('sellers') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_sellers}}</ii>
</div>
<span class="count_bottom">
<?= __('total') ?>
</span>
</a>
</div>
<?php } ?>

<?php //Projects 
?>
<div class=" col-md-4 col-sm-6 col-6 tile_div">

<div class="notifications_div">
<a href="<?= $app_folder ?>/admin/projects<?= $authUser['user_role'] == 'admin.content' ? '' : '?from=' . $authUser['stat_lastlogin'] ?>"
ng-if="rec.dashboard.notifications.new_projects>0" class="badge badge-success noteItm">
<i class="fa fa-bell"></i> {{rec.dashboard.notifications.new_projects}}
<?= __('new') ?>
</a>
</div>

<a href="<?= $app_folder ?>/admin/projects" class="tile_div_content">
<span class="count_top"><i class="fa fa-building"></i>
<?= __('projects') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_active_projects}}</ii>/
<small class="grayText">{{rec.dashboard.stats.numbers.total_inactive_projects}}</small>
</div>
<span class="count_bottom">
<?= __('active') ?>/
<span class="grayText">
<?= __('inactive') ?>
</span>
</span>
</a>
</div>

<?php //Developers 
if (in_array($authUser['user_role'], ['admin.admin', 'admin.root', 'admin.portfolio', 'admin.supervisor'])) {
?>
<div class=" col-md-4 col-sm-6 col-6 tile_div">
<a href="<?= $app_folder ?>/admin/developers" class="tile_div_content">
<span class="count_top"><i class="fa fa-cubes"></i>
<?= __('developers') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_developers}}</ii>
</div>
<span class="count_bottom">
<?= __('total') ?>
</span>
</a>
</div>
<?php } ?>

<?php //Users 
if (in_array($authUser['user_role'], ['admin.admin', 'admin.root'])) {
?>
<div class=" col-md-4 col-sm-6 col-6 tile_div">
<a href="<?= $app_folder ?>/admin/users" class="tile_div_content">
<span class="count_top"><i class="fa fa-user"></i>
<?= __('users') ?>
</span>
<div class="count">
<ii>{{rec.dashboard.stats.numbers.total_enabled_users}}</ii>/
<small class="grayText">{{rec.dashboard.stats.numbers.total_disabled_users}}</small>
</div>
<span class="count_bottom">
<?= __('active') ?>/
<span class="grayText">
<?= __('inactive') ?>
</span>
</span>
</a>
</div>
<?php } ?>

</div>
</div>
</div>



</div>
</div> 

<div>-->
<!-- <canvas id="branches_canvas"></canvas> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- <script>

var branches_canvas = document.getElementById('branches_canvas').getContext('2d');
var branches = new Chart(branches_canvas, {
type: 'bar',
data: {
labels: ['Org1', 'Org2', 'Org3', 'Org4', 'Org5'],
datasets: [
{
label: 'Packed',
data: [12, 55, 77, 32, 45],
backgroundColor: [
'#94E3EF',
],
hoverOffset: 4
},
{
label: 'Unpacked',
data: [56, 88, 22, 88, 40],
backgroundColor: [
'#FFA8A8',
],
}
],

},
options: {
plugins: {
tooltip: {
callbacks: {
label: function (context) {
var label = context.dataset.label || '';
if (label) {
label += ': ';
}
if (context.parsed.y !== null) {
label += context.parsed.y;
}
return label;
},
afterBody: (ttItem) => (`Sum: ${ttItem.reduce((acc, val) => (acc + val.raw), 0)}`)
}
},
},
scales: {
x: {
stacked: true,
},
y: {
stacked: true
}
},
}
});

</script> -->
*/?>

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
        <div class="title" style="font-size: 16px;">Dashboard</div>
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
                <div class="col-8 " style="display: flex;  gap: 10px;top: 21px;position: relative;z-index: 1;">

                    <div class="colored-box" ng-if="rec.notification.newAssignCount != 0" style="background-color:indianred"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge"
                            format-currency="rec.notification.newAssignCount"></span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Assign
                        </div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newReminderCount != 0"
                        style="background-color:cadetblue" onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newReminderCount"></span>
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Reminder</div>
                    </div>

                </div>
            <?php } ?>

            <?php if (in_array($authUser['user_role'], ['admin.cc', 'admin.admin', 'admin.root', 'admin.field']) || isset($authUser['user_original_role'])) { ?>
                <div class="col-8 " style="display: flex;  gap: 10px;top: 21px;position: relative;z-index: 1;">

                    <div class="colored-box" ng-if="rec.notification.newClientsCount != 0"
                        style="background-color:indianred" onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newClientsCount"></span>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Sold Online
                        </div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newBookedCount != 0" style="background-color:cadetblue"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newBookedCount"></span>
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Booked</div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newSoldCount != 0" style="background-color:#ffddf4"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newSoldCount"></span>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Sold</div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newCancelledCount != 0"
                        style="background-color:#f1e2ff" onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newCancelledCount"></span>
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Cancelled</div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newDownPaymentCount != 0"
                        style="background-color:beige" onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newDownPaymentCount"></span>
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Down Payment</div>
                    </div>

                    <div class="colored-box" ng-if="rec.notification.newReservedCount != 0" style="background-color:bisque"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newReservedCount"></span>
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Reserved</div>
                    </div>
                    <div class="colored-box" ng-if="rec.notification.newSoldOnlineCount != 0" style="background-color:brown"
                        onclick="location.href='/en/admin/clients/index';">
                        <span class="notification-badge" format-currency="rec.notification.newSoldOnlineCount"></span>
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <div class="m-1 d-none d-lg-block">New Sold Online</div>
                    </div>


                </div>
            <?php } ?>


            <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                <div class="row col-md-2">
                    <div class="heading my-1 dashboard-h">
                        <div class="title-d">
                            <?= __('sales_funnel') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="chart-container" style="position: relative; height:500px; min-width:800px">
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
                                        <img ng-src="{{ '/webroot/img/' + data.adrs_name + '.jpg' }}"
                                            class="img-fluid rounded-circle" style="width: 70px; height: 70px;" />
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
                                        <img ng-src="{{ '/img/' + data.adrs_name + '.jpg' }}"
                                            class="img-fluid rounded-circle" style="width: 50px; height: 50px;" />
                                        <span class="ms-2">
                                            {{ data.count }}<br>
                                            <span style="font-size:12px;">{{ data.adrs_name }}</span>
                                        </span>
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




            <div class="white-box-dashboard mb-3">
                <div class="row m-1">
                    <div class="col-4">
                        <div class="custom-box" style="background-color: #f9edd3;">
                            <i class="fa fa-user icon" aria-hidden="true" style="color: #ffb400;"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('leads_count') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title" style="font-size: 25px;">
                                {{rec.numbers.clientCount}}
                            </div>
                        </div>
                    </div>



                    <!-- <div class="col-8">
                        <div class="row-container">
                            <div class="colored-box"
                                
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Leads ({{rec.notification.unseenLeadsCount}})</div>
                            </div>

                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenBookedCount === 0 ? '#6b6868' : '#FF8A65'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Booked ({{rec.notification.unseenBookedCount}})</div>
                            </div>

                        </div>

                        <div class="row-container">
                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenSoldCount === 0 ? '#6b6868' : '#FFD54F'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Sold ({{rec.notification.unseenSoldCount}})</div>
                            </div>

                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenCancelledCount === 0 ? '#6b6868' : '#4DB6AC'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Cancelled ({{rec.notification.unseenCancelledCount}})</div>
                            </div>

                        </div>

                        <div class="row-container">
                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenDownPaymentCount === 0 ? '#6b6868' : '#FF7043'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Down Payment ({{rec.notification.unseenDownPaymentCount}})</div>
                            </div>


                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenReservedCount === 0 ? '#6b6868' : '#90CAF9'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Reserved ({{rec.notification.unseenReservedCount}})</div>
                            </div>

                        </div>

                        <div class="row-container">
                            <div class="colored-box"
                                ng-style="{'background-color': rec.notification.unseenReservedCount === 0 ? '#6b6868' : '#90CAF9'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Reserved ({{rec.notification.unseenReservedCount}})</div>
                            </div>

                            <div class="colored-box "
                                ng-style="{'background-color': rec.notification.unseenSoldOnlineCount === 0 ? '#6b6868' : '#7986CB'}"
                                onclick="location.href='/en/admin/clients/index';">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <div class="m-1">New Sold Online ({{rec.notification.unseenSoldOnlineCount}})</div>
                            </div>

                        </div>


                    </div> -->


                </div>
            </div>



            <div class="white-box-dashboard mb-3">
                <div class="row m-1">
                    <div class="col-7">
                        <div class="custom-box" style="background-color: #e6e5fa;">
                            <i class="fa fa-phone icon" aria-hidden="true" style="color: #5652a2;"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('calls_list') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title" style="font-size: 25px;">
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
                        <div class="custom-box" style="background-color: #e3f5e8;">
                            <i class="fa fa-phone icon" aria-hidden="true" style="color: #3ea358;"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('call_log') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title" style="font-size: 25px;">
                                {{rec.numbers.actionCount}} <span style="font-size: 14px;">Out of
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
                        <div class="custom-box" style="background-color:#ffddf4;">
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
                        <div class="heading my-0 dashboard-h">
                            <div class="title" style="font-size: 25px;">
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
                        <div class="custom-box" style="background-color:#f1e2ff;">
                            <i class="fa fa-check icon" aria-hidden="true" style="color:#5e298d"></i>
                        </div>
                        <div class="heading mt-1 dashboard-h">
                            <div class="title-d">
                                <?= __('pursue') ?>
                            </div>
                        </div>
                        <div class="heading my-0 dashboard-h">
                            <div class="title" style="font-size: 25px;">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>