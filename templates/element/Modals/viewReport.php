<div class="modal fade mt-5 pt-5" id="viewReport_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">
                    <?= __('view') ?>
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                        <div  ng-repeat="itm in rec.<?= ($this->request->getParam('controller') === 'Clients') ? 'client' : (($this->request->getParam('controller') === 'Sales') ? 'sale' : '')  ?>.reports.slice(-2)">
                               

                                
                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('status_id')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.status.category_name }}</div>
                               </div>

                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('report_type')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.type.category_name }}</div>
                               </div>

                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('report_text')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.report_text }}</div>
                               </div>
                               
                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                   <div class="col-md-9 notwrapped">{{itm.stat_created}}</div>
                               </div>
                               
                               <div class="grid_row row mb-3">
                                   <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                   <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', itm.rec_state )"></div>
                               </div>

                               
                           </div>

                               <div class="col-md-12 col-sm-12 form-group has-feedback d-flex justify-content-end pt-2"  ng-click ="toggleDivReport()">
                                   <button id="toggleReportButton" type="submit" class="btn btn-info">
                                       <span></span> 
                                       <i class="fa" ng-class="isDivReportOpen ? 'fa-minus' : 'fa-plus'"></i>{{ isDivReportOpen ? __('show_less') : __('show_more') }}
                                   </button>
                               </div>



                               
                           <div ng-show="isDivReportOpen" ng-repeat="itm in rec.<?= ($this->request->getParam('controller') === 'Clients') ? 'client' : (($this->request->getParam('controller') === 'Sales') ? 'sale' : '')  ?>.reports">
                              
                                <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('status_id')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.status.category_name }}</div>
                               </div>

                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('report_type')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.type.category_name }}</div>
                               </div>

                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('report_text')?></div>
                                   <div class="col-md-9 notwrapped">{{ itm.report_text }}</div>
                               </div>
                               
                               <div class="grid_row row">
                                   <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                   <div class="col-md-9 notwrapped">{{itm.stat_created}}</div>
                               </div>
                               
                               <div class="grid_row row mb-3">
                                   <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                   <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', itm.rec_state )"></div>
                               </div>
                               
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>