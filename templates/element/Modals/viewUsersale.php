


<div class="modal fade" id="viewUsersale_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view') ?>{{rec.user_sale}}
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                            

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('source_id')?></div>
                                <div class="col-md-9 notwrapped">{{rec.usersale.user_id}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('source_id')?></div>
                                <div class="col-md-9 notwrapped">{{rec.usersale.lead_id}}</div>
                            </div>

                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.client.stat_created}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.client.rec_state )"></div>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>