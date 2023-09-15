<div class="modal fade mt-5 pt-5" id="viewBook_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
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

                         <div ng-repeat="itm in rec.sale.book">

                            <div class="grid_row row">
                                <h4 class="col-12 pt-2">
                                    Books
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <h5 class="col-12">
                                    {{itm.book_name}}
                                </h5>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('sale_id')?></div>
                                <div class="col-md-9 notwrapped">{{itm.book.sale_id}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('book_arrivedate')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.book_arrivedate}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('book_current_stay')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.book_current_stay}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('book_meetdate')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.book_meetdate}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('book_meetperiod')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.book_meetperiod}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('book_meetplace')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.book_meetplace}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.stat_created}}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.book.rec_state )"></div>
                            </div>

                            <div class="grid_row row">
                                <h5 class="col-12 pt-2">
                                <?=__('Reports')?>
                                </h5>
                            </div>

                        </div> 


                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="book_btn"
                        ng-click="doGet('/admin/books?id='+rec.sale.id, 'book', 'rec')"></button>


                        <!-- Book form -->
                        <form class="row" id="book_form" ng-submit="
                        rec.book.sale_id = rec.sale.id;
                        doSave(rec.book, 'book', 'books', '#book_btn', '#book_preloader');">



                        <!-- <div class="col-md-6 col-sm-6 form-group has-feedback">
                            <label set-required><?=__('book_arrivedate')?></label>
                                <div class="div">
                                 Sadece tarih input alanı 
                                <input type="date" class="form-control has-feedback-left"
                                ng-model="rec.book.book_arrivedate"
                                placeholder="<?=__('book_arrivedate')?>">
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div> -->



                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label set-required><?=__('book_current_stay')?></label>
                                <div class="div">
                                <?=$this->Form->control('book_current_stay', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.book.book_current_stay',
                                'placeholder'=>__('book_current_stay'),
                                ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
<!-- 
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label><?=__('book_meetdate ')?></label>
                                <div class="div">
                                <?=$this->Form->control('book_meetdate', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'time',
                                'ng-model'=>'rec.book.book_meetdate ',
                                'placeholder'=>__('book_meetdate '),
                                'ng-change' => 'setDate(rec.book.book_meetdate)'
                                ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div> -->

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label ><?=__('book_meetperiod ')?></label>
                                <div class="div">
                                <?=$this->Form->control('book_meetperiod ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'number',
                                'ng-model'=>'rec.book.book_meetperiod ',
                                'placeholder'=>__('book_meetperiod '),
                                'max'=>'99',
                                'min'=>'1'
                                ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                        <date-input date="{{date}}" timezone="[[timezone]]"></date-input>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label set-required><?=__('book_meetplace ')?></label>
                                <div class="div">
                                <?=$this->Form->control('book_meetplace ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.book.book_meetplace ',
                                'placeholder'=>__('book_meetplace '),
                                ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <button type="submit" class="btn btn-info" id="book_preloader"><span></span> 
                        <i class="fa fa-save"></i> <?=__('save')?></button>
                        </div>

                    </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>