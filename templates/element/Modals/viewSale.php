<div class="modal fade" id="viewSale_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
       
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view_sale') ?>
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                            <div class="grid_row row">
                                <h4 class="col-12 pt-3 pb-2">
                                    <i class="fa {{itm.sale_configs.icon||'fa-tag'}}"></i> {{ rec.sale.client[0].text }}'s Sale
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_name')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.client[0].text }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('source_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.source.category_name }}</div>
                            </div>
 
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('category_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.category.category_name }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('pool_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.pool.category_name  }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('sale_current_stage')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter('sale_current_stage', rec.sale.sale_current_stage)}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('lead_priority')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter('sale_priorities', rec.sale.sale_priority)}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter( 'rec_stateSale', rec.sale.rec_state )}}</div>
                            </div>

                            <!-- <div class="grid_row row" ng-repeat="item in rec.sale_specs">
                                <div class="col-md-3 grid_header2">{{item}}</div>
                            </div> -->

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_current_location')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_propertytype }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_beds')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_beds }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_loction_target')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_loction_target }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_isowner')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_isowner == 1 ? 'Yes' : 'No' }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_isready')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_isready == 1 ? 'Yes' : 'No' }}</div>
                            </div>

                            
                           

                            <div class="col-md-4 col-sm-12 form-group has-feedback d-flex justify-content-center pt-2"  id="buton">
                                <button type="submit" class="btn btn-info" ><span></span> 
                                <i class="fa" ng-class="isDivReportFormOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('add_report')?></button>
                            </div>
                                    
                            <div class="col-md-4 col-sm-12 form-group has-feedback d-flex justify-content-center pt-2"  id="butonBook">
                                <button type="submit" class="btn btn-info"><span></span> 
                                <i class="fa" ng-class="isDivBookOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('add_book')?></button>
                            </div>
                            <div class="col-md-4 col-sm-12 form-group has-feedback d-flex justify-content-center pt-2"  id="butonshowReport">
                                <button type="submit" class="btn btn-info"><span></span> 
                                <i class="fa" ng-class="isDivOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('show_report')?></button>
                            </div>
                            

                           
                            

                            
                </div>
                   

                </div>
            </div>
        </div>
    </div>
    
   

</div>


<script>
$(document).ready(function(){
    // İkinci Modal'ı Açma
    $("#buton").click(function(){
        $("#addEditReport_mdl").modal();
    });
    $("#butonBook").click(function(){
        $("#viewBook_mdl").modal();
    });
    $("#butonshowReport").click(function(){
        $("#viewReport_mdl").modal();
    });
});
</script>