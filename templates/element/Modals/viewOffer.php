<div class="modal fade mt-5 pt-5" id="viewOffer_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-xl">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="title">Offers</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal"
                    aria-label="Close"></button>

            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="p-3">
                            <form class="row inlineElement" ng-submit="
                                rec.offer.client_id = rec.client.id;
                                doSave(rec.offer, 'offer', 'offers', '#client_btn', 
                                '#offers_preloader');">


                                <div class="white-box mb-2">
                                    <div>
                                        <span class="sm-txt">
                                            <?= __('shared_property') ?>
                                        </span>
                                        <div class="white-box flex-between mb-2">

                                            <label class="col-lg-7 col-6" style="position: relative;">
                                                <tags-input
                                                    style="padding: 0px;padding-left: 10px;border: 0px solid #000;"
                                                    class="wb-txt-inp"
                                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                    ng-model="rec.offer.property" add-from-autocomplete-only="true"
                                                    max-tags="1" placeholder="<?= __('shared_property') ?>"
                                                    display-property="text" key-property="value"
                                                    ng-disabled="rec.offer.property_id "
                                                    ng-style="{'background-color': rec.offer.property_id ? '#eeeeee' : 'initial'}">
                                                    <auto-complete min-length="0" load-on-focus="true"
                                                        load-on-empty="true" max-results-to-show="30"
                                                        source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                                </tags-input>

                                                <span ng-if="rec.offer.property_id"
                                                    ng-click="rec.offer.property_id = '';" class="fa fa-times"
                                                    style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>

                                            </label>
                                            <div class="d-flex m-2 ">
                                                <div class="h-line hideMob"></div>
                                                <label class="switch">
                                                    <input ng-model="rec.offer.isinterested" ng-true-value="'1'"
                                                        ng-false-value="'0'" id="present-client1" type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                    <?= __('interest_property') ?>
                                                </label>

                                            </div>
                                        </div>

                                        <span class="sm-txt">
                                            <?= __('desc_property') ?>
                                        </span>
                                        <div class="white-box flex-between">
                                            <input style="border: 0px solid #000;" type="text"
                                                ng-model="rec.offer.offer_desc" class="wb-txt-inp" id=""
                                                placeholder="Enter" />
                                        </div>
                                    </div>
                                </div>
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="offers_preloader" type="submit">
                                            <?= __('save_changes') ?>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="accordion mt-5" id="accordionNotes">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <?= __('view_allOffers') ?>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="grid lead-preview">

                                            <div class="noData" ng-if="rec.client.offers == ''  ">

                                                <?= __('no_data') ?>

                                            </div>
                                            <div ng-repeat="clsale in rec.client.offers track by $index">
                                                <div class="heading">
                                                    <div class="title">{{$index+1}}. Offer</div>
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
                                                <div class="note"
                                                    ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || clsale.report_type == '75' || itm.report_type == '76' )">

                                                    <div>
                                                        <span class="sm-txt">
                                                            <?= __('shared_property') ?>
                                                        </span>
                                                        <div class="flex-between mb-2">
                                                            <a href="#"> <span class="btn-link">{{
                                                                    clsale.property_ref.property_title
                                                                    }},
                                                                    {{ clsale.property_ref.property_ref }}</span>
                                                                <br><span class="text-dark">{{ clsale.offer_desc
                                                                    }}</span></a>



                                                            <div class="d-flex">
                                                                <div class="h-line hideMob"></div>
                                                                <label class="switch">
                                                                    <span disabled class="slider round"
                                                                        ng-model="clsale.isinterested"
                                                                        ng-class="{'green-background': clsale.isinterested == 1}">
                                                                    </span>
                                                                </label>
                                                                <label for="interested-client1"
                                                                    class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                                    <?= __('interest_property') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!-- <span class="sm-txt">
                                                                <?= __('desc_property') ?>
                                                            </span> -->
                                                        <!-- <div class="flex-between">
                                                                <div> {{ clsale.offer_desc }}</div>
                                                            </div> -->
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
            </div>
        </div>
    </div>
</div>