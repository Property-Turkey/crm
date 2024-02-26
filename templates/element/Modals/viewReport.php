<div class="modal fade mt-5 pt-5" id="viewReport_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">

            
            <div class="modal-header">
            <h4 class="title">Notes</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>

            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid lead-preview">

                          


                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <?php if (!in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                            <button class="btn btn-modal" ng-click="
                                            newEntity('report');
                                            setZIndex();
                                            updateModalElement('Notes');
                                            openModal('#subModal');
                                            inlineElement('#elementsContainer', 1, 'notes');">
                                                <i class="fas-plus"></i>
                                                <?= __('add_notes') ?>
                                            </button>
                                        <?php } ?>

                                    </div>
                                </div>

                                <div class="noData" ng-if="rec.client.reports == ''  ">

                                    <?= __('no_data') ?>

                                </div>
                                <div ng-repeat="clsale in rec.client.reports track by $index">
                                    <div class="note"
                                        ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">

                                        <div class="box-heading d-flex">
                                            <div class="col-lg-2 text-nowrap">
                                                <i class="fas-sticky-note"></i> {{ clsale.type_category.category_name }}
                                                {{DtSetter('rec_stateSale', clsale.client_current_stage,
                                                clsale.report_type)}}
                                                <b>{{ rec.clsale.user.user_fullname }}</b>

                                            </div>


                                            <div class="col-lg-8 text p-2">
                                                <p>
                                                    {{ clsale.report_text }}
                                                </p>
                                            </div>


                                            <div class="flex-center flex-gap-10">
                                                <b> {{ clsale.stat_created.split(' ')[1] }} </b>
                                                 


                                            </div>
                                        </div>
                                        <!-- <span class="spoken"></span>
                                    <div class="text">
                                        <p>{{ itm.report_text }}</p>
                                    </div> -->
                                    </div>
                                </div>


                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>