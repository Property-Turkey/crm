<div class="modal fade mt-5 pt-5" id="viewReservation_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="title">Deals</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal"
                    aria-label="Close"></button>

            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid lead-preview">




                            <div class="heading">
                                <div class="title"></div>
                                <!-- <div class="flex-gap-10">
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

                                    </div> -->
                            </div>

                            

                            <div class="noData" ng-if="rec.client.reservations == ''">

                                    <?= __('no_data') ?>

                                </div>
                            <div>

                                <div ng-repeat="deals in rec.client.reservations track by $index">
                                    <div class="heading">
                                        <div class="title">{{$index+1}}. Deal</div>
                                        <!-- <div class="flex-gap-10">
                                            <?php if (!in_array($authUser['user_role'], ['cc', 'field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                                <button class="btn btn-modal" id="modalBtn btn-Booking" ng-click="
                                                setZIndex();
                                                doGet('/admin/reservations?id='+deals.id, 'rec', 'reservation');
                                                openModal('#subModal'); 
                                                inlineElement('#elementsContainer', 1, 'reservation')">
                                                    <i class="fas-plus"></i>
                                                    <?= __('edit_deal') ?>
                                                </button>
                                            </div> -->
                                        <?php } ?>

                                    </div>


                                    <div class="white-box">
                                        <form class="row">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_amount') ?>
                                                </span>
                                                <div class="input-group">

                                                    <div class="wb-ele form-control">
                                                        <!-- {{deals.currency.category_name}}
                                                    {{deals.reservation_amount}} -->

                                                        {{nFormat( deals.reservation_amount
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>

                                                </div>
                                            </div>



                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_price') ?>
                                                </span>
                                                <div class="input-group">
                                                    <div class="wb-ele form-control">
                                                        <!-- {{deals.currency.category_name}}
                                                    {{deals.reservation_price}} -->

                                                        {{nFormat( deals.reservation_price
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('usdprice') ?>
                                                </span>
                                                <div type="text"
                                                    ng-model="rec.reservations.reservation_usdcomission"
                                                    class="wb-ele form-control" placeholder="% Please specify">
                                                    {{nFormat( deals.reservation_usdprice
                                                    ,DtSetter('currencies_icons','$'))}}

                                                    <!-- --{{deals.reservation_currency}}--
                                            --{{deals.reservation_price}}-- -->
                                                    <!-- {{DtSetter('currencies_icons', 2)}}
                                                    {{currencyConverter(
                                                    DtSetter('currencies', deals.reservation_currency),
                                                    'USD',
                                                    deals.reservation_price )}} -->
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Payment Type </span>
                                                <div class="wb-ele form-control">
                                                    {{deals.payment.category_name}}</div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Down Payment </span>
                                                <div class="wb-ele">
                                                    <!-- {{deals.currency.category_name}}
                                                {{deals.reservation_downpayment}} -->
                                                    {{nFormat( deals.reservation_downpayment
                                                    ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Downpaymnet Date </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.reservation_downpayment_date.split(' ')[0]}}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <div class="wb-ele">
                                                    {{nFormat( deals.reservation_comission
                                                    ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('usdcommission') ?>
                                                </span>
                                                <div type="text" class="wb-ele form-control"
                                                    placeholder="Please specify">

                                                    {{nFormat(
                                                    deals.reservation_usdcomission,DtSetter('currencies_icons','$'))}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('invoice_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.reservation_invoice_date.split(' ')[0]}}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('property_id') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    {{deals.property.property_ref}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('clientspec_propertytype') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.pmscategory.category_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('project_id') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.project.project_ref}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('seller_name') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.seller.seller_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('sold_from') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.Property.seller_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('dev_name') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.developer.dev_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <div class="wb-ele">{{deals.reservation_details}}</div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.stat_created.split(' ')[0]}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('rec_state') ?>
                                                </span>
                                                <div class="wb-ele">{{ DtSetter('rec_stateSale',
                                                    3, deals.rec_state)
                                                    }}</div>
                                            </div>


                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.reservation_isinvoice_sent == 1">
                                                <span class="sm-txt">
                                                    <?= __('is_invoice_sent') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.reservation_isinvoice_sent == 0 || deals.reservation_isinvoice_sent == null">
                                                <span class="sm-txt">
                                                    <?= __('is_invoice_sent') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.is_commision_collacted == 1">
                                                <span class="sm-txt">
                                                    <?= __('is_commision_collacted') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.is_commision_collacted == 0 || deals.is_commision_collacted == null">
                                                <span class="sm-txt">
                                                    <?= __('is_commision_collacted') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>




                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.downpayment_paid == 1">
                                                <span class="sm-txt">
                                                    <?= __('downpayment_paid') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.downpayment_paid == 0 || deals.downpayment_paid == null">
                                                <span class="sm-txt">
                                                    <?= __('downpayment_paid') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>



                                            <!-- {{deals.reservation_isinvoice_sent}}
                                    <div class="pl-5 col-md-1 col-8">
                                        <i ng-if="deals.reservation_isinvoice_sent == 1"
                                            class="fa fa-check-circle-o greenText"></i>
                                    </div>
                                    <div class="pl-5 col-md-1 col-8">
                                        <i ng-if="deals.reservation_isinvoice_sent != 0"
                                            class="fa fa-check-circle-o redText"></i>
                                    </div> -->

                                        </form>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>