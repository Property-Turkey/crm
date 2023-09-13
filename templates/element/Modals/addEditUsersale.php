
<!-- addEditClient_mdl modal -->
<div class="modal fade" id="addEditUsersale_mdl" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal header and title -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div ng-if="!rec.usersale.id"><?=__('add')?></div>
                    <div ng-if="rec.usersale.id"><?=__('edit')?></div>
                </h4>
            </div>
            <!-- ... (existing code) ... -->

            <div class="modal-body">

            <button type="button" id="sale_btn" class="hideIt" ng-click=
                "doGet('/admin/sales/index?list=1', 'list', 'sales');   rec.sales = {}; doClick('.close');"></button>


               
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('user_id') ?></label>
                        <div class="div">
                            <tags-input 
                                ng-model="rec.usersale.user" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('user_id') ?>" 
                                display-property="text"
                                key-property="value"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'users')"></auto-complete>
                            </tags-input>

                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label><?= __('lead_id') ?></label>
                        <div class="div">
                            <tags-input 
                                ng-model="rec.usersale.lead" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('lead_id') ?>" 
                                display-property="value"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'sales')"></auto-complete>
                            </tags-input>

                        </div>
                    </div>


                <button type="button" id="usersale_btn" class="hideIt" ng-click="
                doGet('/admin/usersale/index?list=1', 'list', 'usersale');   rec.usersale = {};
                doClick('.close');"></button>

                <!-- Client form -->
                <form class="row" id="usersale" ng-submit="
                    doSave(rec.usersale, 'usersale', 'usersale', '#usersale_btn', '#usersale_preloader');">

                   
                    
                   
                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="usersale_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
