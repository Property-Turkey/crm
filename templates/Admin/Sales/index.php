

<?php
    $pid = !isset($this->request->getParam('pass')[0]) ? null : $this->request->getParam('pass')[0];
?>

<div class="right_col" role="main" ng-init="
        doGet('/admin/sales/index/<?=$pid?>?list=1', 'list', 'sales');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6 side_div1">
                <h3><?=__('sales_list')?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href ng-click="
                            newEntity('sales');
                            openModal('#addEditSale_mdl');
                            doGet('/admin/sales?id='+itm.id, 'rec', 'sales');
                        " class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_sale')?></span>
                    </a>
                </span>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href  data-toggle="modal" data-target="#search_mdl" data-dismiss="modal"  class="btn btn-info">
                        <span class="fa fa-search"></span> <span class="hideMob"><?=__('search')?></span>
                    </a>
                </span>
            </div>
           

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12">
                <div class="x_panel">

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div><?=__('please_wait')?></div>
                    </div>
                    
                    <div class="x_title">
                        <h2><b><?=__('sales_list')?></b><br> 
                            <span> <?=__('show').' '.__('from')?> 
                                {{ paging.start  }} <?=__('to')?> 
                                {{ paging.end }} <?=__('of')?> {{ paging.count }} </span></h2>
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu  <?= $currlang!='ar' ? 'dropdown-menu-right' : ''?>">
                                    <a href ng-click="multiHandle('/admin/sales/enable/1')" class="dropdown-item">
                                        <i class="fa fa-check"></i> <?=__('enable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/sales/enable/0')" class="dropdown-item">
                                        <i class="fa fa-times"></i> <?=__('disable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/sales/delete')" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?=__('delete_selected')?>
                                    </a>
                                </div>
                            </li>
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li>-->
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="grid ">

                            <div class="grid_header row">

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'id'])?>
                                    <label class="mycheckbox">
                                        <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                        <span></span> 
                                        <?=__('id')?> 
                                    </label> 
                                </div>
                                <div class="col-sm-1 col" >
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'client_id' ])?> 
                                    <?=__('client_name')?> 
                                </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'source_id' ])?> 
                                    <?=__('source_id')?> </div>

                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'category_id' ])?> 
                                    <?=__('category_id')?> </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'pool_id' ])?> 
                                    <?=__('pool_id')?> </div>

                            
                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'' ])?> 
                                    <?=__('sales_info')?> </div>
                                 
                                    <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'sale_budget' ])?> 
                                    <?=__('budget')?> </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'rec_state' ])?> 
                                    <?=__('rec_state')?> </div>

                                
                                <div class="col-sm-1 col hideMob"><span
                                        class="nobr"><?=__('action')?></span>
                                </div>
                            </div>
                            
                            <div class="grid_row row" ng-repeat="itm in lists.sales">
                                
                                <div class="col-sm-1 hideMobSm grid_header">
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span> {{ itm.id }}
                                    </label>
                                </div>
                                <div class="col-4 hideWeb grid_header">
                                    <?=__('id')?> 
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>

                                <div class="col-4 hideWeb grid_header"><?=__('client_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a  href="<?=$app_folder?>/admin/clients/index/{{itm.client.client_name}}">{{ itm.client.client_name }}</a>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('source_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.source.category_id}}">{{ itm.source.category_name }}</a><br>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('category_id')?></div>
                                <div class="col-md-2 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.category.parent_id}}">{{ itm.category.category_name }}</a><br>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('pool_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.pool.parent_id}}">{{ itm.pool.category_name }}</a><br>
                                </div>
                

                                <div class="col-4 hideWeb grid_header"><?=__('sales')?></div>
                                <div class="col-md-2 col-8">
                                    <b>Sale Priority:</b> {{DtSetter('sale_priorities', itm.sale_priority)}}/<br>
                                    <b>Sale  Current Stage:</b> {{DtSetter('sale_current_stage', itm.sale_current_stage)}}/<br>
                                    <b>Sale Tag:</b> 
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.tag.parent_id}}" ng-repeat="tag in itm.sale_tags" ng-if="!$last">
                                        {{ tag.text }},
                                    </a>
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.tag.parent_id}}" ng-repeat="tag in itm.sale_tags" ng-if="$last">
                                        {{ tag.text }}
                                    </a>
                                </div>

                            
                                <div class="col-4 hideWeb grid_header"><?=__('sale_budget')?></div>
                                <div class="col-md-2 col-8">
                                    {{ itm.sale_budget }}
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('rec_state')?></div>
                                <div class="col-md-1 col-8">{{DtSetter('rec_stateSale', itm.sale_current_stage, itm.rec_state)}}</div>


                                <div class="col-4 hideWeb grid_header"><?=__('actions')?></div>
                                <div class="col-md-1 col-8 action">
                                    <a href ng-click="
                                        doGet('/admin/sales?id='+itm.id, 'rec', 'sale');
                                        openModal('#viewSale_mdl');
                                        "  class="inline-btn"><i class="fa fa-eye"></i> <?=__('view')?></a>
                                    <a href ng-click=" 
                                        doGet('/admin/sales?id='+itm.id, 'rec', 'sale'); 
                                        openModal('#addEditSale_mdl');
                                        "   class="inline-btn">
                                        <i class="fa fa-pencil"></i> <?=__('edit')?>
                                    </a>
                                    
                                    
                                </div>
                            </div>

                        </div>
                        <?php echo $this->element('paginator-ng')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('Modals/search')?>
<?php echo $this->element('Modals/addEditSale')?>
<?php echo $this->element('Modals/viewSale')?>
<?php echo $this->element('Modals/addEditReport')?>
<?php echo $this->element('Modals/viewReport')?>
<?php echo $this->element('Modals/viewBook')?>