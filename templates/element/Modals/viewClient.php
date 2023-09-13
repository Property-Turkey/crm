


<div class="modal fade" id="viewClient_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view') ?>
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                            <div class="grid_row row">
                                <h4 class="col-12">
                                    {{rec.client.client_name}}
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('source_id')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.source.category_name}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_phone')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.client_phone}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_mobile')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.client_mobile}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_email')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.client_email}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_address')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.client_address}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_nationality')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.client_nationality}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('adrs_country')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.adrs_country}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('adrs_city')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.adrs_city}}</div>
                            </div>
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('adrs_region')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.adrs_region}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.stat_created}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.client.rec_state )"></div>
                            </div>

                            <div class="col-md-12 col-sm-12 form-group has-feedback d-flex justify-content-end pt-2"  ng-click ="toggleDiv()">
                                <button type="submit" class="btn btn-info"><span></span> 
                                <i class="fa" ng-class="isDivOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('add_report')?></button>
                            </div>

                            <div class="col-md-12 col-sm-12 form-group has-feedback d-flex justify-content-end pt-2"  ng-click ="toggleDivBook()">
                                <button type="submit" class="btn btn-info"><span></span> 
                                <i class="fa" ng-class="isDivBookOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('add_book')?></button>
                            </div>

                            
                            <div ng-show="isDivOpen">
                                
                                <div class="grid_row row">
                                    <h4 class="col-12 pt-4 pb-3">
                                        Reports
                                    </h4>
                                </div>

                                <?php echo $this->element('Modals/viewReport')?>

                            </div>
                            

                            <div ng-show="isDivBookOpen" >
                                <div class="grid_row row">
                                    <h4 class="col-12 pt-4 pb-3">
                                        Books
                                    </h4>
                                </div>

                                <?php echo $this->element('Modals/viewBook')?>
                                
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>