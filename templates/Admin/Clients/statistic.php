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
<div class=" col-12 col-sm-6 col-12  side_div1">
<h3>
<?= __('general_stat') ?>
</h3>
</div>
<div class=" col-12 col-sm-6 col-12 side_div2">
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
    doGet('/admin/clients/saleByfield', 'rec', 'saleByfield');">


    <!-- {{rec.doughnut.sourceDoughnutData}} -->

    <?php
    // <!-- Contact Settings -->
    ?>


    <div class="container">
        <!-- Tab Buttons -->
        <div class="tab-buttons">
            <button ng-click="changeTab(1)"><?= __('book_sale_report') ?></button>
            <button ng-click="changeTab(2)"><?= __('adviserfield_detail') ?></button>
            <button ng-click="changeTab(3)"><?= __('payment_details') ?></button>

        </div>

        <!-- Tab Content -->
        <div class="tab-content">


            <!-- PT Booking & Sales report Tab -->
            <div ng-if="currentTab == 1">
                <div class="container">
                    <div class="heading ">
                        <div class="title" style="font-size: 16px;"><?= __('book_sale_report') ?></div>
                    </div>
                    <div class="panel panel-default mb-3" ng-class="{ 'custom-style': showFilters }">


                        <div class="filter-row">

                             <!-- Start Date Input -->
                             <label for="" class="filter-label">
                                <span class="sm-txt" for="starterDate">
                                    <?= __('start_date') ?>:
                                </span>
                                <input date-format class="wb-ele-dashboard py-1" type="date" id="starterDate"
                                    ng-model="rec.statistic.starterDate"
                                    ng-init="rec.statistic.starterDate = rec.statistic.starterDate || currentDate">
                            </label>

                            <!-- End Date Input -->
                            <label for="" class="filter-label">
                                <span class="sm-txt" for="endDate">
                                    <?= __('end_date') ?>:
                                </span>
                                <input date-format class="wb-ele-dashboard py-1" type="date" id="endDate"
                                    ng-model="rec.statistic.endDate" ng-change="getClientsByDateRange()">
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

                    <div class="row">
                        <div class="col-12">


                            <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('booking') ?>
                                                </div>
                                            </div>

                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.clientBookCounts">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('conversation_rate') ?>
                                                </div>

                                            </div>
                                            <div class="heading my-1">
                                                <div class="title">
                                                    {{rec.saleByfield.percentageRate}}%
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('total_clients_sold') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalsoldCount">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('sold_online') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalonlineCount">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('cancelled') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalcancelCount">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('sold_units') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.downpaymentCount">

                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('price_usd') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalUSDPrice">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-1 mb-3 d-flex">


                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('commission_usd') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalUSDcommission">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">
                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('sale_byfield') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:500px; min-width:800px">
                                                    <canvas chart-directive chart-type="bar"
                                                        data="rec.saleByfield.data">
                                                    </canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">
                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('sale_byclientadvsior') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:500px; min-width:800px">
                                                    <canvas chart-directive chart-type="bar"
                                                        data="rec.saleByfield.data2">
                                                    </canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">
                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('sale_byregion') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:500px; min-width:800px">
                                                    <canvas chart-directive chart-type="bar"
                                                        data="rec.saleByfield.data4">
                                                    </canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">

                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('booking_by') ?>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:500px; min-width:800px">
                                                    <canvas chart-directive chart-type="bar"
                                                        data="rec.saleByfield.data3"></canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


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
                                                    data="rec.saleByfield.sourceDoughnutData"></canvas>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">
                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('sold_from') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:500px; min-width:800px">
                                                    <canvas chart-directive chart-type="bar"
                                                        data="rec.saleByfield.data6"></canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                            <div class="row col-md-3">
                                                <div class="heading my-1 dashboard-h">
                                                    <div class="title-d">
                                                        <?= __('property_type') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="chart-container"
                                                    style="position: relative; height:450px; min-width:600px">
                                                    <canvas chart-directive chart-type="pie"
                                                        data="rec.saleByfield.propertyPieData"></canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3"
                                            style="overflow-x: auto !important;">
                                            <table  class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <?= __('dev_name') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="developerTotal in rec.saleByfield.developerTotals"
                                                        ng-if="developerTotal.developer_name !== null && developerTotal.developer_name !== 0">
                                                        
                                                        <td class="index-cell"
                                                            ng-if="developerTotal.developer_name !== null && developerTotal.developer_name !== 0">
                                                            <div class="centered-content">{{ developerTotal.developer_name }}</div>
                                                        </td>
                                                        <td class="index-cell"
                                                            ng-if="developerTotal.developer_name !== null && developerTotal.developer_name !== 0">
                                                            <div class="centered-content">{{ nFormat(developerTotal.totalPrice,
                                                            DtSetter('currencies_icons','$')) }}</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3"
                                            style="overflow-x: auto !important;">
                                            <table  class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <?= __('project_name') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sold_clients') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="projectTotal in rec.saleByfield.projectTotals"
                                                        ng-if="projectTotal.project_title !== null && projectTotal.project_title !== 0">
                                                        <td class="index-cell"
                                                            ng-if="projectTotal.project_title !== null && projectTotal.project_title !== 0">
                                                            <div class="centered-content">{{ projectTotal.project_title }}</div></td>
                                                        <td class="index-cell"
                                                            ng-if="projectTotal.project_title !== null && projectTotal.project_title !== 0">
                                                            <div class="centered-content">{{ projectTotal.client_count }}</div></td>
                                                        <td class="index-cell"
                                                            ng-if="projectTotal.project_title !== null && projectTotal.project_title !== 0">
                                                            <div class="centered-content">{{ nFormat(projectTotal.total_usdprice,
                                                            DtSetter('currencies_icons','$')) }}</div></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                </div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Client Advisor and Field Detail Tab -->
            <div ng-if="currentTab == 2">
                <div class="container">
                    <div class="heading ">
                        <div class="title" style="font-size: 16px;"><?= __('adviserfield_detail') ?></div>
                    </div>
                    <div class="panel panel-default mb-3" ng-class="{ 'custom-style': showFilters }">


                        <div class="filter-row">

                            <!-- Start Date Input -->
                            <label for="" class="filter-label">
                                <span class="sm-txt" for="starterDate">
                                    <?= __('start_date') ?>:
                                </span>
                                <input date-format class="wb-ele-dashboard py-1" type="date" id="starterDate"
                                    ng-model="rec.statistic.starterDate"
                                    ng-init="rec.statistic.starterDate = rec.statistic.starterDate || currentDate">
                            </label>

                            <!-- End Date Input -->
                            <label for="" class="filter-label">
                                <span class="sm-txt" for="endDate">
                                    <?= __('end_date') ?>:
                                </span>
                                <input date-format class="wb-ele-dashboard py-1" type="date" id="endDate"
                                    ng-model="rec.statistic.endDate" ng-change="getClientsByDateRange()">
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

                    <div class="row">
                        <div class="col-12">


                            <div class="white-box-dashboard mb-3" style="overflow-x: auto !important; ">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('booking') ?>
                                                </div>
                                            </div>

                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.clientBookCounts">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('conversation_rate') ?>
                                                </div>

                                            </div>
                                            <div class="heading my-1">
                                                <div class="title">
                                                    {{rec.saleByfield.percentageRate}}%
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('total_clients_sold') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalsoldCount">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('sold_online') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalonlineCount">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('cancelled') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalcancelCount">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('sold_units') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.downpaymentCount">

                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-md-1 mb-3 d-flex">

                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('price_usd') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalUSDPrice">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-1 mb-3 d-flex">


                                        <div class="row col-md-3">
                                            <div class="heading my-1 dashboard-h">
                                                <div class="title-d">
                                                    <?= __('commission_usd') ?>
                                                </div>
                                            </div>
                                            <div class="heading my-1">
                                                <div class="title" format-currency="rec.saleByfield.totalUSDcommission">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row">

                                    <!-- İlk tablo: Client Advisor​ Detail Selected Period of time -->
                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3 custom-table"
                                            style="overflow-x: auto !important;">
                                            <div class="heading">
                                                <div class="title" style="font-size: 16px;"> <?= __('adviser_detail_period') ?></div>
                                            </div>
                                            <table class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>

                                                        </th>
                                                        <th>
                                                            <?= __('client_advisor') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('booked') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('conversation_rate') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sold_units') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale_volume') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="cc in rec.saleByfield.ccUsers">
                                                        <td>
                                                            <div>
                                                                {{$index + 1}}.
                                                            </div>
                                                        </td>

                                                        <td class="custom-table">{{ cc.user_fullname }}</td>
                                                        <td>{{ calculateccWidth(cc.id) | number:1 }}%
                                                            <div class="progress">
                                                                <div id="dynamic" class="progress-bar"
                                                                    role="progressbar"
                                                                    ng-style="{width: calculateccWidth(cc.id) + '%'}">

                                                                    <div class="centered-content">
                                                                        {{ rec.saleByfield.userBookCounts[cc.id] }} 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="index-cell">
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationsaleCounts[cc.id] }}
                                                            </div>
                                                        </td>
                                                        <td class="index-ratecell">
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationSaleRatios[cc.id] }}%
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationCounts[cc.id] }}
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                ${{nFormat(rec.saleByfield.userTotalUSDPriceCounts[cc.id],DtSetter('currencies_icons',deals.reservation_currency))}}
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <!-- İkinci tablo: Field Detail Selected Period of time -->
                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3 custom-table"
                                            style="overflow-x: auto !important;">
                                            <div class="heading">
                                                <div class="title" style="font-size: 16px;"><?= __('field_detail_period') ?></div>
                                            </div>
                                            <table class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>

                                                        </th>
                                                        <th>
                                                            <?= __('field_advisor') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('booked') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('conversation_rate') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sold_units') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale_volume') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="field in rec.saleByfield.fieldUsers">
                                                        <td>
                                                            <div>
                                                                {{$index + 1}}.
                                                            </div>
                                                        </td>
                                                        <td class="custom-table">{{ field.user_fullname }}</td>
                                                        <td>{{  calculatefieldWidth(field.id) | number:1 }}%
                                                            <div class="progress">
                                                                <div id="dynamic" class="progress-bar"
                                                                    role="progressbar"
                                                                    ng-style="{width: calculatefieldWidth(field.id) + '%'}">
                                                                    <div class="centered-content">
                                                                        {{ rec.saleByfield.userfieldBookCounts[field.id]
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="index-cell">
                                                            <div class="centered-content">
                                                                {{
                                                                rec.saleByfield.userfieldReservationsaleCounts[field.id]
                                                                }}
                                                            </div>
                                                        </td>
                                                        <td class="index-ratecell">
                                                            <div class="centered-content">
                                                                {{
                                                                rec.saleByfield.userfieldReservationSaleRatios[field.id]
                                                                }}%
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userfieldReservationCounts[field.id]
                                                                }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                ${{nFormat(rec.saleByfield.userfieldTotalUSDPriceCounts[field.id],DtSetter('currencies_icons',deals.reservation_currency))}}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
<!-- 
                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3 custom-table"
                                            style="overflow-x: auto !important;">
                                            <div class="heading">
                                                <div class="title" style="font-size: 16px;">Client Advisor​ Detail all
                                                    time</div>
                                            </div>
                                            <table class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>

                                                        </th>
                                                        <th>
                                                            <?= __('client_advisor') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('booked') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('conversation_rate') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sold_units') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale_volume') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="cc in rec.saleByfield.ccUsers">
                                                        <td>
                                                            <div>
                                                                {{$index + 1}}.
                                                            </div>
                                                        </td>
                                                        <td class="custom-table">{{ cc.user_fullname }}</td>
                                                        <td>{{ calculateccWidth(cc.id) | number:1 }}%
                                                            <div class="progress">
                                                                <div id="dynamic" class="progress-bar"
                                                                    role="progressbar"
                                                                    ng-style="{width: calculateccWidth(cc.id) + '%'}">

                                                                    <div class="centered-content">
                                                                        {{ rec.saleByfield.userBookCounts[cc.id] }} 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="index-cell">
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationsaleCounts[cc.id] }}
                                                            </div>
                                                        </td>
                                                        <td class="index-ratecell">
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationSaleRatios[cc.id] }}%
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userReservationCounts[cc.id] }}
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                ${{nFormat(rec.saleByfield.userTotalUSDPriceCounts[cc.id],DtSetter('currencies_icons',deals.reservation_currency))}}
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 d-flex">
                                        <div class="white-box-dashboard mb-3 custom-table"
                                            style="overflow-x: auto !important;">
                                            <div class="heading">
                                                <div class="title" style="font-size: 16px;">Field Detail All time
                                                </div>
                                            </div>
                                            <table class="table table-bordered custom-table"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th>

                                                        </th>
                                                        <th>
                                                            <?= __('field_advisor') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('booked') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('conversation_rate') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sold_units') ?>
                                                        </th>
                                                        <th>
                                                            <?= __('sale_volume') ?>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="field in rec.saleByfield.fieldUsers">
                                                        <td>
                                                            <div>
                                                                {{$index + 1}}.
                                                            </div>
                                                        </td>
                                                        <td class="custom-table">{{ field.user_fullname }}</td>
                                                        <td>{{  calculatefieldWidth(field.id) | number:1 }}%
                                                            <div class="progress">
                                                                <div id="dynamic" class="progress-bar"
                                                                    role="progressbar"
                                                                    ng-style="{width: calculatefieldWidth(field.id) + '%'}">
                                                                    <div class="centered-content">
                                                                        {{ rec.saleByfield.userfieldBookCounts[field.id]
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="index-cell">
                                                            <div class="centered-content">
                                                                {{
                                                                rec.saleByfield.userfieldReservationsaleCounts[field.id]
                                                                }}
                                                            </div>
                                                        </td>
                                                        <td class="index-ratecell">
                                                            <div class="centered-content">
                                                                {{
                                                                rec.saleByfield.userfieldReservationSaleRatios[field.id]
                                                                }}%
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                {{ rec.saleByfield.userfieldReservationCounts[field.id]
                                                                }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="centered-content">
                                                                ${{nFormat(rec.saleByfield.userfieldTotalUSDPriceCounts[field.id],DtSetter('currencies_icons',deals.reservation_currency))}}
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->

                                </div>



                            </div>



                        </div>

                    </div>

                </div>


            </div>

            <!-- Payment Details Tab -->
            <div ng-if="currentTab == 3">
                <div class="heading">
                    <div class="title dashoardFont"><?= __('payment_details') ?></div>
                </div>


            </div>

        </div>



    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>