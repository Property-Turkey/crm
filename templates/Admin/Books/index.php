
<div class="right_col" role="main" ng-init="
        doGet('/admin/books/index?list=1', 'list', 'books');
    ">

    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6 side_div1">
                <h3><?=__('books_list')?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href ng-click="
                            newEntity('book');
                            openModal('#addEditBook_mdl');
                        " class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_sale')?></span>
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
                        <h2><b><?=__('books_list')?></b> 
                            <span> <?=__('show').' '.__('from')?> 
                                {{ paging.start  }} <?=__('to')?> 
                                {{ paging.end }} <?=__('of')?> {{ paging.count }} </span></h2>
                        
                        <?php if(in_array($authUser['user_role'], ['admin.root', 'admin.admin'])){?>
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu  <?= $currlang!='ar' ? 'dropdown-menu-right' : ''?>">
                                    <a href ng-click="multiHandle('/admin/books/enable/1')" class="dropdown-item">
                                        <i class="fa fa-check"></i> <?=__('enable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/books/enable/0')" class="dropdown-item">
                                        <i class="fa fa-times"></i> <?=__('disable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/books/delete')" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?=__('delete_selected')?>
                                    </a>
                                </div>
                            </li>
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li>-->
                        </ul>
                        <?php }?>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        
                        <div class="grid ">

                            <div class="grid_header row">

                                <?php if(in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])){?>
                                <div class="">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'id'])?>
                                    <label class="mycheckbox">
                                        <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                        <span></span> 
                                        <?=__('id')?> 
                                    </label> 
                                </div>
                                <?php }?>
                                

                                <div class="">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'sale_id' ])?> 
                                    <?=__('sale_id')?> 
                                </div>

                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'book_arrivedate'])?> 
                                    <?=__('book_arrivedate')?> 
                                </div>

                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'book_current_stay'])?> 
                                    <?=__('book_current_stay')?> 
                                </div>

                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'book_meetdate'])?> 
                                    <?=__('book_meetdate')?> 
                                </div>

                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'book_meetperiod'])?> 
                                    <?=__('book_meetperiod')?> 
                                </div>

                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'book_meetplace'])?> 
                                    <?=__('book_meetplace')?> 
                                </div>


                                <div class="col column-title">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'stat_created'])?> 
                                    <?=__('stat_created')?> 
                                </div>
                                
                                <div class="col">
                                    <?=$this->element('colActions', ['url'=>'books/index/', 'col'=>'rec_state'])?> 
                                    <?=__('rec_state')?> 
                                </div>

                                <div class="col hideMob">
                                    <span class="nobr"><?=__('action')?></span>
                                </div>
                            </div>
                            
                            <div class="grid_row row" ng-repeat="itm in lists.books">

                                <?php if(in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])){?>
                                <div class="hideMobSm grid_header pr-4">
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span> {{ itm.id }}
                                    </label>
                                </div>

                                <div class=" hideWeb grid_header">
                                    <?=__('id')?> 
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>
                                <?php }?>

                                <div class="col-4 hideWeb grid_header"><?=__('sale_id')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.sale_id }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_arrivedate')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_arrivedate }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_current_stay')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_current_stay }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_meetdate')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_meetdate }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_meetperiod')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_meetperiod }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_meetplace')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_meetplace }}
                                </div>
                                <div class="col-4 hideWeb grid_header"><?=__('book_nationality')?></div>
                                <div class=" col">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', itm.user_role)}}" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[itm.user_role]}}.svg" />
                                    </a>
                                    {{ itm.book_nationality }}
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('stat_created')?></div>
                                <div class=" col">{{ itm.stat_created }} </div>

                                
                                <div class="col-4 hideWeb grid_header"><?=__('rec_state')?></div>
                                <div class=" col" ng-bind-html="DtSetter('bool2', itm.rec_state)"></div>

                                <div class="col-4 hideWeb grid_header"><?=__('actions')?></div>
                                <div class=" col action">
                                    <a href="javascript:void(0);" 
                                        data-toggle="modal" data-target="#viewBook_mdl"  class="inline-btn"
                                        ng-click="doGet('/admin/books?id='+itm.id, 'rec', 'book');">
                                        <i class="fa fa-eye"></i> <?=__('view')?>
                                    </a> &nbsp; 
                                    <a href="javascript:void(0);" 
                                        data-toggle="modal" data-target="#addEditBook_mdl"
                                        ng-click="doGet('/admin/books?id='+itm.id, 'rec', 'book'); "  class="inline-btn">
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



<?php echo $this->element('Modals/addEditBook')?>

<?= $this->element('Modals/viewBook') ?>

