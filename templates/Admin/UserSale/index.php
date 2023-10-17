

<?php
    $pid = !isset($this->request->getParam('pass')[0]) ? null : $this->request->getParam('pass')[0];
?>

<div class="right_col" role="main" ng-init="
        doGet('/admin/usersale/index/<?=$pid?>?list=1', 'list', 'usersale');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6 side_div1">
                <h3><?=__('usersale_list')?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href ng-click="
                            newEntity('usersale');
                            openModal('#addEditUsersale_mdl');
                        " class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_usersale')?></span>
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
                        <h2><b><?=__('usersale_list')?></b> <br>
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
                                    <a href ng-click="multiHandle('/admin/usersale/enable/1')" class="dropdown-item">
                                        <i class="fa fa-check"></i> <?=__('enable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/usersale/enable/0')" class="dropdown-item">
                                        <i class="fa fa-times"></i> <?=__('disable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/usersale/delete')" class="dropdown-item">
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

                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'usersale/index/', 'col'=>'id'])?>
                                    <label class="mycheckbox">
                                        <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                        <span></span> 
                                        <?=__('id')?> 
                                    </label> 
                                </div>
                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'usersale/index/', 'col'=>'user_id' ])?> 
                                    <?=__('user_id')?> 
                                </div>

                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'usersale/index/', 'col'=>'lead_id' ])?> 
                                    <?=__('lead_id')?> </div>

                                
                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'usersale/index/', 'col'=>'stat_created' ])?> 
                                    <?=__('stat_created')?> </div>
                                    
                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'usersale/index/', 'col'=>'rec_state' ])?> 
                                    <?=__('rec_state')?> </div>

                    
                                <div class="col-sm-2 col hideMob"><span
                                        class="nobr"><?=__('action')?></span>
                                </div>
                            </div>
                            
                            <div class="grid_row row" ng-repeat="itm in lists.usersale">
                                
                                <div class="col-sm-2 hideMobSm grid_header">
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
                                <div class="col-md-2 col-8 hideWeb">{{ itm.id }}</div>

                                <div class="col-4 hideWeb grid_header"><?=__('user_id')?></div>
                                <div class="col-md-2 col-8">
                                    <a href="<?=$app_folder?>/admin/usersale/index/{{itm.user_id}}">[{{ itm.user.user_fullname }}]</a></div>

                                
                                <div class="col-4 hideWeb grid_header"><?=__('lead_id')?></div>
                                <div class="col-md-2 col-8">
                                    <a href="<?=$app_folder?>/admin/sales/index/{{itm.sale.id}}">[{{ itm.sale_id }}]</a></div>

                                
                                <div class="col-4 hideWeb grid_header"><?=__('stat_created')?></div>
                                <div class="col-md-2 col-8">
                                    <a href>{{ itm.stat_created }}</a></div>

                                <div class="col-4 hideWeb grid_header"><?=__('rec_state')?></div>
                                <div class=" col-md-2 col-8" ng-bind-html="DtSetter('bool2', itm.rec_state)"></div>

                                
                                <div class="col-4 hideWeb grid_header"><?=__('actions')?></div>
                                <div class="col-md-2 col-8 action">
                                    <a href ng-click="
                                        rec.usersale = itm;
                                        doGet('/admin/usersale?id='+itm.id, 'rec', 'usersale');
                                        openModal('#viewUsersale_mdl');
                                        "  class="inline-btn"><i class="fa fa-eye"></i> <?=__('view')?></a>
                                    <a href ng-click=" 
                                        rec.usersale = itm; 
                                        doGet('/admin/usersale?id='+itm.id, 'rec', 'usersale');
                                        openModal('#addEditUsersale_mdl');
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

<?php echo $this->element('Modals/addEditUsersale')?>
<?php echo $this->element('Modals/viewUsersale')?>