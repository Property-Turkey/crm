                        <div class="grid" 
                        ng-repeat="itm in rec.sale.reports">

                            <div class="grid_row row">
                                <h4 class="col-12">
                                    {{rec.book.book_name}}
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('sale_id')?></div>
                                <div class="col-md-9 notwrapped">{{rec.book.sale_id}}</div>
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


                <button type="button" id="book_btn" class="hideIt" ng-click="doGet('/admin/<?= (($this->request->getParam('controller') === 'Sales') ? 'sale' : '') ?>?id='+rec.client.id, 'client', 'rec')"></button>

                <!-- Book form -->
                <form class="row" id="book_form" ng-submit="
                    doSave(rec.book, 'book', 'books', '#book_btn', '#book_preloader');">

                    <!-- Existing form fields ... -->
                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label set-required><?= __('sale_id') ?></label>
                        <div class="div">
                            <!-- Client select input -->
                            <select class="form-control has-feedback-left"
                                    ng-model="rec.book.sale_id"
                                    ng-change="onClientSelectionChange()"
                                    >
                                <option value="">Select Sale</option>
                                <option value="add_client">Add Sale</option>
                                <option ng-repeat="(saleId, saleName) in DtSetter('salesList', 'list')" value="{{saleId}}">{{saleName}}</option>
                            </select>
                            <span class="fa fa-sale form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label set-required><?=__('book_arrivedate')?></label>
                        <div class="div">
                            <!-- Sadece tarih input alanı -->
                            <input type="date" class="form-control has-feedback-left"
                                ng-model="rec.book.book_arrivedate"
                                placeholder="<?=__('book_arrivedate')?>">
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label set-required><?=__('book_current_stay')?></label>
                        <div class="div">
                            <?=$this->Form->control('book_current_stay', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'tel',
                                'ng-model'=>'rec.book.book_current_stay',
                                'placeholder'=>__('book_current_stay'),
                            ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label><?=__('book_meetdate ')?></label>
                        <div class="div">
                            <?=$this->Form->control('book_meetdate ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.book.book_meetdate ',
                                'placeholder'=>__('book_meetdate '),
                            ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label ><?=__('book_meetperiod ')?></label>
                        <div class="div">
                            <?=$this->Form->control('book_meetperiod ', [
                                'class'=>'form-control has-feedback-left',
                                'label'=>false,
                                'type'=>'text',
                                'ng-model'=>'rec.book.book_meetperiod ',
                                'placeholder'=>__('book_meetperiod '),
                            ])?>
                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

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