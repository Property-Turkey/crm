<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
// dd($_pid);
?>

<div id="indxPg" class="right_col" role="main" ng-init="
        doGet('/admin/categories/index/<?= $_pid ?>?list=1', 'list', 'categories');
    ">

<!-- {{<?= $_pid ?>}} -->
    <main>
        <section class="container-fluid">
            <h2 class="client-num">
                <?= __('categories_list') ?> ({{paging.count}})
            </h2>
            <p ng-repeat="itm in lists.categories track by $index" ng-if="$index === 0">
                <b>{{itm.parent_category.category_name}}</b>
            </p>

            <form class="dropdowns">


                <div class="flex-gap-10 flex-wrap" style="align-items: end;">

                    <div class="priority">
                        <div class="low"></div>
                        Enable
                    </div>

                    <div class="priority">
                        <div class="high"></div>
                        Disable
                    </div>

                </div>

                <div class="flex-gap-10 mt-3">
                    <button class="btn btn-danger" ng-click="
                            newEntity('category');
                            openModal('#subModal'); 
                            rec.category.parent_id = <?= $_pid ?>; 
                            rec.category.parent_name = itm.category_name; 
                            inlineElement('#elementsContainer', 1, 'add-category');
                        "><i class="fas-plus"></i>
                        <span class="hideMob">

                            <?= __('add') ?>
                        </span>
                    </button>

                    <button class="btn btn-warning" ng-click="multiHandle('/admin/categories/delete')">
                        Delete
                    </button>

                    <select class="wb-ele-select" style="width: auto;height: 37px;padding: 8px 6px;">
                        <option value="Select" empty="true">Select</option>
                        <option ng-click="multiHandle('/admin/categories/enable/1')">Enable</option>
                        <option ng-click="multiHandle('/admin/categories/enable/0')">Disable</option>
                    </select>
                </div>
            </form>
        </section>
        <!-- Dashboard Start -->
        <section class="container-fluid">
            <div class="dashboard">
                <button type="button" id="category_btn" class="hideIt" ng-click="
                doGet('/admin/categories/index/<?= $_pid ?>?list=1', 'list', 'categories');">
                </button>

                <!-- Dashboard Header Start -->
                <div class="dash-head">
                    <div class="flex-gap-10">
                        <form class="search-leads-form">
                            <i class="fas-search"></i>
                            <input type="text" ng-change="doSearch()" ng-model="rec.search.category_name"
                                placeholder="Search Categories" />
                        </form>
                    </div>
                    <div class="dash-nav">
                    <?php echo $this->element('paginator-ng') ?>
                        <!-- <button>
                            <i class="fas-angle-double-left"></i>
                        </button>
                        <button>
                            <i class="fas-angle-left"></i>
                        </button>
                        <span> {{ paging.start }} </span>
                        <button>
                            <i class="fas-angle-right"></i>
                        </button>
                        <span> {{ paging.end }}
                            <?= __('of') ?> {{ paging.count }}
                        </span>
                        <button>
                            <i class="fas-angle-double-right"></i>
                        </button> -->
                    </div>
                </div>
                <!-- Dashboard Header End -->
                <!-- Dashboard Content Start -->
                <div class="dash-content">
                    <div class="columns-titles">
                        <div class="row">
                            <div class="checkbox">
                                <input type="checkbox" class="all-clients" name="client-checkbox"
                                    ng-click="checkAll(this)" />
                            </div>
                            <div class="col-11 hideMob row">
                                <div class="col-md-1 p-0 title">
                                    <?= __('id') ?>
                                </div>
                                <div class="col-md-10 p-0 title">
                                    <?= __('category_name') ?>
                                </div>
                                <div class="col-md-1 p-0 title">
                                    <?= __('action') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="client" ng-repeat="itm in lists.categories track by $index">
                        <!-- Category row Start -->
                        
                        <div class="client-row">
                            <div class="row">
                                <div class="checkbox col-1">
                                    <input type="checkbox" ng-model="selected[itm.id]" class="mb-3" id="client-1"
                                        name="client-checkbox" />
                                </div>

                                <div class="col-lg-11 col-12 row">

                                    <div class="previewToggle col-lg-1 col-12 row">
                                        <div class="col-4 title hideWeb">
                                            <?= __('id') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            <div class="priority">
                                                <div ng-class="{'low': itm.rec_state == 1, 'high': itm.rec_state == 0}">
                                                </div>{{itm.id}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-10 col-12 budget">
                                        <div class="col-4 title hideWeb">
                                            <?= __('category_name') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                        <i class="fa {{itm.category_configs.icon||'fa-tag'}} m-1"></i>{{itm.category_name }}

                                        </div>
                                    </div>

                                    <div class="col-lg-1 col-12 budget">
                                        <div class="col-4 title hideWeb">
                                            <?= __('actions') ?>
                                        </div>
                                        <div class="col-6 col-lg-12">
                                            
                                            <a href ng-click=" 
                                        rec.category = itm; 
                                        openModal('#subModal');
                                        rec.category.id = itm.id; 
                                        doGet('/admin/categories?id=' + itm.id, 'rec', 'category');
                                        inlineElement('#elementsContainer', 1, 'edit-child');
                                        " class="inline-btn">
                                                <i class="fa fa-pencil"></i>
                                                <?= __('edit') ?>
                                            </a>
                                            

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Category row End -->

                    </div>

                </div>
                <!-- Dashboard Content End -->
                <!-- Dashboard Nav Start -->
                <div class="dash-nav flex-center p-2">
                    <?php echo $this->element('paginator-ng') ?>
                </div>
                <!-- Dashboard Nav End -->
            </div>
        </section>
        <!-- Dashboard End -->
    </main>

</div>