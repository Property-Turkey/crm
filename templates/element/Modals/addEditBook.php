<div class="modal fade mt-5 pt-5" id="addEditBook_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">
                    <?= __('add_book') ?>
                </h2>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">


                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="book_btn"
                                ng-click="doGet('/admin/books/index?list=1', 'list', 'books');"></button>


                            <form class="row" id="book_form" ng-submit="
                                rec.book.sale_id = rec.sale.id; 
                                doSave(rec.book, 'book', 'books', '#book_btn', '#book_preloader');
                                rec.sale.sale_current_stage = 4; ">


                                <!-- <div class="col-12  form-group has-feedback">
                                    <label set-required>
                                        <?= __('book_meetdate') ?>
                                    </label>
                                    <div class="div">
                                        <input type="date" 
                                            ng-model="rec.book.book_arrivedate"
                                            ng-value="'yyyy-MM-dd'"
                                            />
                                        <span class="fa fa-period form-control-feedback left" aria-hidden="true"></span>
                                    </div>{{rec.book.book_arrivedate}}
                                </div> -->

                                <div class="col-12 form-group has-feedback">
                                    <label set-required><?=__('book_meetdate')?></label>
                                    <div class="div">
                                        <input type="date" 
                                            ng-model="rec.book.book_arrivedate" 
                                            class="form-control has-feedback-left" 
                                            aria-hidden="true" 
                                            ng-change="updateDate()">
                                        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                {{rec.book.book_arrivedate}}

                                <div class="col-12  form-group has-feedback">
                                    <label set-required>
                                        <?= __('book_meetperiod') ?>
                                    </label>
                                    <div class="div">
                                        <?= $this->Form->control('book_meetperiod', [
                                            'class' => 'form-control has-feedback-left',
                                            'label' => false,
                                            'type' => 'number',
                                            'max' => 99,
                                            'min' => 1,
                                            'ng-model' => 'rec.book.book_meetperiod',
                                            'placeholder' => __('book_meetperiod'),
                                        ]) ?>
                                        <span class="fa fa-period form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-12  form-group has-feedback">
                                    <label set-required>
                                        <?= __('book_current_stay') ?>
                                    </label>
                                    <div class="div">
                                        <?= $this->Form->control('book_current_stay', [
                                            'class' => 'form-control has-feedback-left',
                                            'label' => false,
                                            'type' => 'textarea',
                                            'ng-model' => 'rec.book.book_current_stay',
                                            'placeholder' => __('book_current_stay'),
                                        ]) ?>
                                        <span class="fa fa-period form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-12  form-group has-feedback">
                                    <label set-required>
                                        <?= __('book_meetplace') ?>
                                    </label>
                                    <div class="div">
                                        <?= $this->Form->control('book_meetplace', [
                                            'class' => 'form-control has-feedback-left',
                                            'label' => false,
                                            'type' => 'textarea',
                                            'ng-model' => 'rec.book.book_meetplace',
                                            'placeholder' => __('book_meetplace'),
                                        ]) ?>
                                        <span class="fa fa-period form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 form-group has-feedback">
                                    <button type="submit" class="btn btn-info" id="book_preloader"><span></span>
                                        <i class="fa fa-save"></i>
                                        <?= __('save') ?>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>