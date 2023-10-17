<div class="modal fade" id="viewSale_mdl" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: index;">
    <div class="listing-modal-1 modal-dialog modal-xl modal-dialog-centered view">
        <!-- {{rec.sale.user_sale}} -->

        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button class="btn-exit">
                        <img src="\img\export-svgrepo-com.svg" alt="" width="30" /> Lead Preview </button>
                </div>
                <!-- <div class="green-btns">
                    <div class="green-btn">
                        <i class="fas-check"></i> 
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Assigned
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Intrested
                    </div>
                    <div class="green-btn">
                        <i class="fas-check"></i> Raised
                    </div>
                </div> -->

                <div id="container" class="container mt-5">
                    
                    <div class="horizontal-scroll">
                        <div class="controls d-flex justify-content-between  ">
                            <div class="fas-check button green-btn">New</div>
                            <div class="fas-check button green-btn">Attempt to call</div>
                            <div class="fas-check button green-btn">No Response 1</div>
                            <div class="fas-check button green-btn">No Response 2</div>
                            <div class="fas-check button green-btn">No Response 3</div>
                            <div class="fas-check button green-btn">Not Qualified</div>
                            <div class="fas-check button green-btn">Pursue</div>
                            <div class="fas-check button green-btn">Positive Matching</div>
                            <div class="fas-check button green-btn">Negotiation</div>
                            <div class="fas-check button green-btn">Offer Accepted</div>
                            <div class="fas-check button green-btn">Booked</div>
                            </div>
                        </div>
                </div>

                <div class="accordion accordion-flush" id="client1">
                    <?php
                    // <!-- Contact Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseOne" aria-expanded="true"
                                aria-controls="client1-collapseOne">
                                <span class="title">Contact</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <?php
                                // <!-- Contact Settings -->
                                ?>
                                <div class="heading">
                                    <div class="title">Contact Setting</div>
                                    <div class="flex-center flex-gap-5">

                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="
                                                doGet('/admin/clients?id='+rec.sale.client.id, 'rec', 'client');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'contact-setting')">
                                            <i class="fas-plus"></i>
                                            <?= __('edit_contact') ?>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-plus"></i>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-phone"></i>
                                        </button>
                                        <button class="sm-btn">
                                            <i class="fas-mail"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="sm-btn" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Name </span>
                                            <div class="wb-ele">{{rec.sale.client.client_name}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Phone </span>
                                            <div class="wb-ele">{{rec.sale.client.client_mobile}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Email </span>
                                            <div class="wb-ele">{{rec.sale.client.client_email}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Country </span>
                                            <div class="wb-ele">{{ rec.sale.client.adrscountry.adrs_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{ rec.sale.client.source.category_name
                                                    }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // <!-- Info Section -->
                                ?>
                                <div class="heading">
                                    <div class="title">Info</div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="doGet('/admin/sales?id=' + rec.sale.id, 'rec', 'sale'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'info')">
                                            <i class="fas-plus"></i>
                                            <?= __('edit_info') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.category.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('category_id') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span ng-repeat="tag in rec.sale.sale_tags track by $index">{{$index >
                                                    0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_propertytype') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.sale.sale_specs[0].salespec_propertytype track by $index">{{$index
                                                    > 0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('salespec_beds') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <span
                                                    ng-repeat="tag in rec.sale.sale_specs[0].salespec_beds track by $index">{{$index
                                                    > 0 ? ',' : ''}}{{ tag.text }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('sale_budget') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].currency.category_name }} {{
                                                rec.sale.sale_spec[0].salespec_currency }} {{ rec.sale.sale_budget }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('target_location') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].salespec_loction_target }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('buyer_persona') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].persona.category_name }}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('social_style_model') ?>
                                            </span>
                                            <div class="wb-ele">{{ rec.sale.sale_specs[0].style.category_name }}</div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <span class="sm-txt">
                                                <?= __('lead_priority') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <div class="priority">
                                                    <em ng-class="{
                                                            'low': rec.sale.sale_priority >= 1 && rec.sale.sale_priority <= 3,
                                                            'med': rec.sale.sale_priority > 3 && rec.sale.sale_priority <= 6,
                                                            'high': rec.sale.sale_priority > 6 && rec.sale.sale_priority <= 10
                                                        }"></em>{{ DtSetter('sale_priorities',
                                                    rec.sale.sale_priority) }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- 
                                    <?php
                                    // <!-- Finance Section -->
                                    ?>
                                    <div class="heading">
                                        <div class="title">Finances</div>
                                        <div class="flex-gap-10">
                                            <button class="btn btn-modal" id="modalBtn" ng-click="doGet('/admin/sales?id=' + rec.sale.id, 'rec', 'sale');
                                                openModal('#subModal'); inlineElement('#elementsContainer', 1, 'finance')">
                                                <i class="fas-plus"></i> Edit Finances
                                            </button>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <form class="row">
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Finances in Place</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '187'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '187'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>All cash payment</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '188'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '188'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Ready to buy now</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '189'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '189'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3 d-flex justify-content-around">
                                                <span>Decision maker is present</span>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance == '190'">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                                <div class="pl-5 col-md-1 col-8" ng-if="rec.sale.sale_finance !== '190'">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->

                                <?php
                                // <!-- Action Settings -->
                                ?>
                                <div class="heading">
                                    <div class="title">Actions</div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="doGet('/admin/sales?id=' + rec.sale.id, 'rec', 'sale'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'info')">
                                            <i class="fas-plus"></i>
                                            <?= __('edit_info') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="button-container">
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Attempt to call') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('No Response 1') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('No Response 2') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('No Response 3') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Not Qualified') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Pursue') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Positive Matching') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Negotiation') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Offer Accepted') ?>
                                            </button>
                                        
                                        
                                            <button class="btn btn-light action-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Booked') ?>
                                            </button>

                                            <button id="isCalled"

                                            ng-click="
                                            rec.sale.reports[0].status_id = '75'; doGet('/admin/reports?status_id=isspoken&id=' + rec.sale.reports.id, 'rec', 'report'); openModal('#subModal'); newEntity('reports'); inlineElement('#elementsContainer', 1, 'notes');"
                                            class="btn btn-modal btn-danger action-is-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Is Called ?') ?>
                                            </button>
                                        
                                        
                                            <button id="isSpoken"
                                            ng-click="
                                            rec.report.status_id = '76';
                                            openModal('#subModal'); doGet('/admin/reports?status_id=isspoken&id=' + rec.sale.reports.id, 'rec', 'report'); newEntity('reports'); inlineElement('#elementsContainer', 1, 'notes');"
                                            class="btn btn-modal btn-danger action-is-btn col-2 m-1" id="reservations_preloader" type="submit">
                                                <?= __('Is Spoken ?') ?>
                                            </button>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Notes and Empahty Section (Reports) -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseNote" aria-expanded="true"
                                aria-controls="client1-collapseNote">
                                <span class="title">Notes</span>
                            </button>
                        </h2>
                        <div id="client1-collapseNote" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <?php
                                // <!-- Empahty Section -->
                                ?>
                                <div class="heading">
                                    <div class="title">Empathy Mapping</div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn">
                                            <div class="d-flex justify-content-between"
                                                ng-click="doGet('/admin/reports?report_type=empathy&id=' + rec.sale.id, 'rec', 'report'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'empathy')">
                                                <i class="fas-plus"></i>
                                                <?= __('edit_empathy') ?> /
                                                <?= __('add_empathy') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3" 
                                        ng-repeat="report in rec.sale.reports track by $index"
                                            ng-if="(report.report_type == '201' || report.report_type == '202' || report.report_type == '203' || report.report_type == '204')">
                                            <div class="d-flex justify-content-between">
                                                <div class="sm-txt d-flex align-items-end mb-2"> Vebal
                                                </div>
                                            </div>
                                            <div class="wb-ele">{{ report.report_text }}</div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // <!-- Notes Section -->
                                ?>
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal"
                                            ng-click="openModal('#subModal'); doGet('/admin/reports?id=' + rec.sale.reports.id, 'rec', 'report'); inlineElement('#elementsContainer', 1, 'notes');">
                                            <i class="fas-plus"></i>
                                            <?= __('add_report') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="note" 
                                ng-repeat="itm in rec.sale.reports track by $index" 
                                ng-if="!(itm.report_type == '201' || itm.report_type == '202' || itm.report_type == '203' || itm.report_type == '204')">
                                    <div class="box-heading">
                                        <h5>
                                            <i class="fas-sticky-note"></i> {{ itm.status.category_name }}
                                            <b>{{ rec.sale.user.user_fullname }}</b>
                                        </h5>
                                        <div class="flex-center flex-gap-10">
                                            <b> {{ itm.stat_created.split(' ')[1] }} </b>
                                            <div class="dropdown">
                                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" ng-click="doDelete('/admin/reports/delete/' + itm.id)" href="#">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="spoken"></span>
                                    <div class="text">
                                        <p>{{ itm.report_text }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php
                    // <!-- Assign Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseAssign" aria-expanded="true"
                                aria-controls="client1-collapseAssign">
                                <span class="title">Assign</span>
                            </button>
                        </h2>
                        <div id="client1-collapseAssign" class="accordion-collapse collapse show">
                            <div class="accordion-body">

                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button id="modalBtn" class="btn btn-modal"
                                            ng-click="doGet('/admin/usersale?lead_id=' + rec.sale.id, 'rec', 'user_sale');
                                                            openModal('#subModal'); inlineElement('#elementsContainer', 1, 'assign')">
                                            <i class="fas-plus"></i>
                                            <?= __('add_assign') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-3" ng-repeat="assign in rec.sale.user_sale track by $index">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-sm-6">
                                                <span class="sm-txt">
                                                    Advisor
                                                </span>
                                                <div class="wb-ele ng-binding">{{assign.user.user_fullname}}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12 col-sm-6">
                                                            <div class="flex-gap-10 justify-content-end align-items-center">
                                                                <label class="switch">
                                                                    <input disabled="" checked="" type="checkbox">
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <label> Snoose </label>
                                                            </div>
                                                        </div> -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                    <?php
                    // <!-- Booking Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseBooking" aria-expanded="true"
                                aria-controls="client1-collapseBooking">
                                <span class="title">Booking</span>
                            </button>
                        </h2>
                        <div id="client1-collapseBooking" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal" id="modalBtn"
                                            ng-click="doGet('/admin/books?id=' +rec.sale.book.id, 'rec', 'book'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'booking')">
                                            <i class="fas-plus"></i> Add /
                                            <?= __('edit_book') ?>
                                        </button>
                                    </div>
                                </div>

                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('booking_date') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <img src="/img/datepicker.png" alt="" />
                                                {{ rec.sale.book.book_arrivedate }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('booking_time') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <img src="/img/icons_60284.svg" alt="" />
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetdate }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-map-o"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetplace }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-bookmark"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_meetperiod }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">
                                                <?= __('add_book') ?>
                                            </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-home"></i>
                                                <div class="line-height-10">
                                                    {{ rec.sale.book.book_current_stay }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="sm-btn float" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Offers Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseOffer" aria-expanded="true"
                                aria-controls="client1-collapseOffer">
                                <span class="title">Offers</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOffer" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn btn-modal"
                                            ng-click="doGet('/admin/offers?sale_id=' + rec.sale.id, 'rec', 'offers'); newEntity('offers'); openModal('#subModal'); inlineElement('#elementsContainer', 1, 'offers')">
                                            <i class="fas-plus"></i>
                                            <?= __('add_offer') ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-2" ng-repeat="itm in rec.sale.offers track by $index">
                                    <div>
                                        <span class="sm-txt">
                                            <?= __('shared_property') ?>
                                        </span>
                                        <div class="white-box flex-between mb-2">
                                            <a href="#" class="btn-link"> {{ itm.property_id }} </a>
                                            <div class="d-flex">
                                                <div class="h-line hideMob"></div>
                                                <label class="switch">
                                                    <input type="checkbox"
                                                        class="form-check-input"
                                                        id="interested-client1"
                                                        ng-model="itm.isinterested"
                                                        ng-checked="itm.isinterested == 1"
                                                        >
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
                                            <div> {{ itm.offer_desc }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // <!-- Deals Section -->
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#client1-collapseTwo" aria-expanded="true"
                                aria-controls="client1-collapseTwo">
                                <span class="title">Deals</span>
                            </button>
                        </h2>
                        <div id="client1-collapseTwo" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                            <div class="heading">
                                        <div class="title"></div>
                                        <div class="flex-gap-10">
                                            <button class="btn btn-modal" id="modalBtn"
                                                ng-click="
                                                doGet('/admin/reservations?id='+rec.sale.reservations[0].id, 'rec', 'reservations');  
                                                openModal('#subModal'); 
                                                inlineElement('#elementsContainer', 1, 'reservation')">
                                                <i class="fas-plus"></i> Edit Reservation </button>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <form class="row">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <div class="input-group">
                                                    
                                                    <div class="wb-ele form-control">
                                                        {{rec.sale.reservations[0].currency.category_name}} {{rec.sale.reservations[0].reservation_amount}}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Sale Price </span>
                                                <div class="input-group">
                                                    <div class="wb-ele form-control">
                                                    {{rec.sale.reservations[0].currency.category_name}} {{rec.sale.reservations[0].reservation_price}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Payment Type </span>
                                                <div class="wb-ele form-control">{{rec.sale.reservations[0].payment.category_name}}</div>
                                            </div>

                                            <!-- <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Developer Name </span>
                                                <div class="wb-ele"></div>

                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Type </span>
                                                <div class="wb-ele"></div>

                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <div class="wb-ele"></div>

                                            </div> -->

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <div class="wb-ele">{{rec.sale.reservations[0].reservation_comission}}</div>

                                                
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Down Payment </span>
                                                <div class="wb-ele">{{rec.sale.reservations[0].currency.category_name}} {{rec.sale.reservations[0].reservation_downpayment}}</div>

                                                
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Downpaymnet Date </span>
                                                <div class="wb-ele">
                                                    <img src="\crm\webroot\img\datepicker.png" alt="" />
                                                    <div>
                                                        {{rec.sale.reservations[0].reservation_downpayment_date.split('
                                                        ')[0]}}</div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>

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



<?php
    // <!-- For subModal z-indexing -->
?>
<script>
    $(document).ready(function () {

        function setZIndex() {
            var viewSaleModal = $("#viewSale_mdl");
            viewSaleModal.css("z-index", 9);

        }

        $(".btn-modal").on("click", function () {
            setZIndex();
        });

    });
</script>