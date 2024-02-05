<div class="modal fade" id="viewCategory_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.client.sales[0]}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button type="button" class="btn-exit" data-bs-dismiss="modal">
                        <?= $this->Html->image('/img/export-svgrepo-com.svg', ['' => '', 'width' => 30]) ?>Category Preview
                    </button>
                </div>




                    <button type="button" id="client_btn" class="hideIt" ng-click="
                        doGet('/admin/categories?id='+rec.categories.id, 'rec', 'category');
                        doGet('/admin/categories/index?list=1', 'list', 'categories'); 
                        closeModal('#subModal');
                                        ">
                    </button>
                    <div class="m-3">
                        <div class="heading">
                            <div class="title">Category Information</div>
                            <div class="flex-gap-10">
                                
                            </div>
                        </div>
                        <div class="white-box mt-2">
                            <div class="row">
                                <div class="col-md-6 col-12 col-lg-3">
                                    <span class="sm-txt">
                                        <?= __('category_name') ?>
                                    </span>
                                    <div class="wb-ele">{{ rec.category.category_name }}</div>
                                </div>

                                <div class="col-md-6 col-12 col-lg-3">
                                    <span class="sm-txt">
                                        <?= __('parent_id') ?>
                                    </span>
                                    <div class="wb-ele">{{ rec.category.parent_category.category_name }}</div>
                                </div>

                                <div class="col-md-6 col-12 col-lg-3">
                                    <span class="sm-txt">
                                        <?= __('language_id') ?>
                                    </span>
                                    <div class="wb-ele">{{ DtSetter('langs', rec.category.language_id) }}</div>
                                </div>

                                <div class="col-md-6 col-12 col-lg-3">
                                    <span class="sm-txt">
                                        <?= __('rec_state') ?>
                                    </span>
                                    <div class="wb-ele">{{ DtSetter('bool2', rec.category.rec_state) }}</div>
                                </div>
                                

                            </div>
                        </div>
                    </div>


                <div class="down-btns m-3">
                    <div class="flex-gap-10">
                        <button class="btn btn-gray" type="button">View History</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>