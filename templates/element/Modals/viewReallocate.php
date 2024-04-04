<div class="modal fade mt-5 pt-5" id="viewReallocate_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="title">
                    <?= __('settings_reallocation') ?>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal"
                    aria-label="Close"></button>

            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid lead-preview m-4">
                            <div class="noData mt-3" ng-if="rec.client.user_client == ''">
                                <?= __('no_data') ?>
                            </div>
                            <div class="row"
                                ng-repeat="(recStateId, recStateName) in rec.client.user_client track by (recStateName.id + recStateName.user.user_fullname)">

                                <div class="noData mt-3" ng-if=" recStateName.rec_state != 2">
                                    <?= __('no_request') ?> for {{recStateName.user.user_fullname}}
                                    
                                  
                                </div>
  

                                <div class="heading mb-2" ng-if="recStateName.rec_state == 2">
                                    <div class="title" style="color: #7d7d7d;">{{recStateName.user.user_fullname}}</div>
                                </div>

                                <div class="row" ng-if="recStateName.rec_state == 2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="col-6 mb-2">
                                                    <div class="btn btn-gray mt-1" type="button"
                                                        ng-click="
                                                        rec.user_client.accept = 2;
                                                        rec.user_client.client_id = recStateName.client_id;
                                                        rec.user_client.user_id = recStateName.user.id;

                                                        doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
                                                        doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                        <?= __('accept') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="col-6 mb-2">
                                                    <div class="btn btn-gray mt-1" type="button"
                                                        ng-click="
                                                            rec.user_client.reject = 2;
                                                            rec.user_client.client_id = recStateName.client_id;
                                                            rec.user_client.user_id = recStateName.user.id;

                                                            doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
                                                            doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                        <?= __('reject') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <form class="row col-6 inlineElement" ng-if="recStateName.rec_state == 2"
                                    ng-submit="
                                    rec.user_client.client_id = recStateName.client_id;
                                    rec.user_client.reallocate = 2;
                                    rec.user_client.userclient_id = recStateName.id;

                                    doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');">

                                    <label for="" class="col-6 col-sm-12">
                                        <span class="sm-txt">
                                            <!-- {{recStateName.user.id}} -->
                                            <?= __('client_current_stage') ?>
                                        </span>
                                        <tags-input style="padding: 0px;padding-left: 10px;"
                                            ng-model="rec.user_client.user" add-from-autocomplete-only="true"
                                            placeholder="Select <?= __('client_current_stage') ?>"
                                            display-property="text" key-property="value" class="wb-txt-inp"
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                            <auto-complete min-length="0" load-on-focus="true" load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'users', '', '')">
                                            </auto-complete>
                                        </tags-input>
                                    </label>

                                    <div class="down-btns mt-1 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button class="btn btn-danger" id="userclient_preloader" type="submit">
                                                <?= __('change_advisor') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form class="row col-6 inlineElement" ng-if="recStateName.rec_state == 2"
                                    id="client_form" ng-submit="
                                    rec.client.client_id = recStateName.client_id;
                                    rec.client.user_id = recStateName.user_id;
                                    doSave(rec.client, 'client', 'clients', '#client_btn', '#userpool_preloader');">

                                    <label class="col-md-6 col-12 col-lg-12">
                                        <span class="sm-txt">
                                            <?= __('pool_name') ?>
                                        </span>
                                        <tags-input placeholder="Add This Client to Pool"
                                            style="padding: 0px;padding-left: 10px;" ng-model="rec.client.pool"
                                            class="wb-txt-inp"
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                            <auto-complete min-length="0" load-on-focus="true" load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'categories', 28)">
                                            </auto-complete>
                                        </tags-input>
                                    </label>

                                    <div class="down-btns mt-1 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="userpool_preloader">
                                                <?= __('change_pool') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>