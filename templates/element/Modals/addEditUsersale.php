
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

              <!-- Assign to User_sale form -->
              <button  type="button" 
                            class="close" data-dismiss="modal" 
                            aria-hidden="true" id="usersale_btn"
                            ng-click="doGet('/admin/sales/index?list=1', 'list', 'sales');   rec.sales = {};
                            "></button>
                        
                        
                            <form  ng-if="rec.sale.id" class="row" id="usersale_form" ng-submit="
                                rec.usersale.sale_id = rec.sale.id; 
                                doSave(rec.usersale, 'usersale', 'usersale', '#usersale_btn', '#usersale_preloader');">

                                <!-- Existing form fields ... -->
                                <h2 class="col-12"><?=__('assign_sale')?></h2>
                               
                            <div class="col-md-6 col-sm-6 form-group has-feedback">
                                <label><?= __('user_id') ?></label>
                                <div class="div">
                                    <tags-input 
                                        ng-model="rec.usersale.user" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('user_id') ?>" 
                                        display-property="text"
                                        key-property="value"
                                    >
                                        <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'users')"></auto-complete>
                                    </tags-input>

                                </div>
                            </div>
                             <div class="col-md-12 col-sm-12 form-group has-feedback" ng-click="updateSaleCurrentStage()">
                                    <button type="submit" class="btn btn-info" id="usersale_preloader"><span></span> 
                                    <i class="fa fa-save"></i> <?=__('assign')?></button>
                                </div>
                            
                  
                    
                </form>
            </div>
        </div>
    </div>
</div>
