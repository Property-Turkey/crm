<div class="modal fade" id="viewSale_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg modal-dialog-centered">
        <!-- {{rec.sale}} -->
        <div class="modal-content">
            <div class="lead-preview">
                <div class="modal-header">
                    <button class="btn-exit">
                        <img src="\crm\webroot\img\export-svgrepo-com.svg" alt="" width="30" /> Lead Preview </button>
                </div>
                <div class="green-btns">
                    <div class="green-btn">
                        <i class="fas-check"></i> New
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
                </div>
                <div class="accordion accordion-flush" id="client1">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#client1-collapseOne" aria-expanded="true" aria-controls="client1-collapseOne">
                                <span class="title">Contact</span>
                            </button>
                        </h2>
                        <div id="client1-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="heading">
                                    <div class="title">Contact Setting</div>
                                    <div class="flex-center flex-gap-5">
                                        <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'contact-setting')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas-plus"></i> Edit assigned </button>
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
                                            <button class="sm-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                            <div class="wb-ele">{{rec.sale.client.adrs_country}}</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Inquiry </span>
                                            <div class="wb-ele">Today @ 10:00</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Source </span>
                                            <div class="wb-ele">
                                                <a href="#" class="btn-link">{{ rec.sale.source.category_name }}</a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Last Activity </span>
                                            <div class="wb-ele">Today @ 12:00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading">
                                    <div class="title">Assign</div>
                                    <div class="flex-gap-10">
                                        <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'assign')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas-plus"></i> Add assigned </button>
                                        <button class="btn"> View all assigned <i class="fas-right-open"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-12 col-sm-3">
                                            <span class="sm-txt"> <?=__('sale_current_stage')?> </span>
                                            <div class="wb-ele">{{DtSetter('sale_current_stage', rec.sale.sale_current_stage)}}</div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <span class="sm-txt"> Priority </span>
                                            <div class="wb-ele">
                                                <div class="priority">
                                                    <em class="low"></em>{{DtSetter('sale_priorities', rec.sale.sale_priority)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-1"></div>
                                        <div class="col-12 col-sm-5">
                                            <div class="flex-gap-10 justify-content-end align-items-center">
                                                <label class="switch">
                                                    <input disabled checked type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label> Snoose </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading">
                                    <div class="title">Info</div>
                                    <div class="flex-gap-10">
                                        <button class="btn"data-ng-click="inlineElement('#elementsContainer', 1, 'info')" data-bs-toggle="modal" data-bs-target="#exampleModal" id="icModalAcBtn" >
                                            <i class="fas-plus"></i> Edit assigned </button>
                                        <button class="btn"> View all assigned <i class="fas-right-open"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">

                                <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('category_id')?> </span>
                                            <div class="wb-txt-inp">{{ rec.sale.category.category_name }}</div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('sale_tags')?> </span>
                                            <tags-input ng-model="rec.sale.sale_tags"
                                                        class="wb-txt-inp"
                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                        ng-disabled="true"
                                                        ng-style="{'background-color': '#eeeeee'}">
                                                <auto-complete min-length="1" source="loadTags($query, 'categories', 40)"></auto-complete>
                                            </tags-input>

                                        </div>
                                        
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('salespec_properytype')?> </span>
                                            <tags-input ng-model="rec.sale.sale_specs[0].salespec_propertytype"
                                                        class="wb-txt-inp"
                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                        ng-disabled="true"
                                                        ng-style="{'background-color': '#eeeeee'}">
                                                <auto-complete min-length="1" source="loadTags($query, 'categories', 40)"></auto-complete>
                                            </tags-input>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('salespec_beds')?> </span>
                                            <tags-input ng-model="rec.sale.sale_specs[0].salespec_beds"
                                                        class="wb-txt-inp"
                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                        ng-disabled="true"
                                                        ng-style="{'background-color': '#eeeeee'}">
                                                <auto-complete min-length="1" source="loadTags($query, 'categories', 40)"></auto-complete>
                                            </tags-input>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('sale_budget')?> </span>
                                            <div class="input-group">
                                                <button class="btn btn-outline-secondary" 
                                                    ng-disabled="true"
                                                    ng-style="{'border-color': '#c7c7c7'}">
                                                    <i class="{{rec.sale.sale_specs[0].currency.category_name}}"></i>
                                                </button>
                                                <input ng-disabled="true" ng-style="{'background-color': '#ffffff'}" ng-model="rec.sale.sale_budget" class="form-control" value="400k" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('current_location')?> </span>
                                            <div class="row" >
                                                <div class="col-6 place_1 ">
                                                    <div class="wb-txt-inp">{{}}</div>
                                                </div>
                                                <div class="col-6 place_2">
                                                    <div class="wb-txt-inp">{{}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('date_of_arrival')?> </span>
                                            <div class="wb-txt-inp"></div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('target_location')?> </span>
                                            <div class="wb-txt-inp">{{rec.sale.sale_specs[0].salespec_loction_target}}</div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('buyer_persona')?> </span>
                                            <div class="wb-txt-inp">{{ rec.sale.sale_specs[0].persona.category_name }}</div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?=__('social_style_model')?> </span>
                                            <div class="wb-txt-inp">{{ rec.sale.sale_specs[0].style.category_name }}</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="heading">
                                    <div class="title">Empathy Mapping</div>
                                    <div class="flex-gap-10">
                                        <button class="btn" 
                                        data-ng-click="inlineElement('#elementsContainer', 1, 'empathy')" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal">
                                            <i class="fas-plus"></i> Add assigned </button>
                                        <button class="btn"> View all assigned <i class="fas-right-open"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Verbal Expressions </span>
                                            <div class="wb-ele">What The Client Says</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Inner Thoughts </span>
                                            <div class="wb-ele">What the client thinks</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Observable Actions </span>
                                            <div class="wb-ele">What the client does</div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Emotional Responses </span>
                                            <div class="wb-ele">What the client feels</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button m-2 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#client1-collapseFour" aria-expanded="true" aria-controls="client1-collapseFour">
                                            <span class="title">Notes</span>
                                        </button>
                                    </h2>
                                    <div id="client1-collapseFour" class="accordion-collapse collapse show">
                                        <div class="accordion-body p-0">
                                            <div class="heading">
                                            <div class="title"></div>
                                            <div class="flex-gap-10">
                                                <button class="btn" ng-click="
                                                doGet('/admin/sales?id='+rec.sale.id, 'rec', 'sale'); 
                                                inlineElement('#elementsContainer', 1, 'notes');" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fas-plus"></i> Add Note </button>
                                                <button class="btn"> View all (4) notes <i class="fas-right-open"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="note" ng-repeat="itm in rec.sale.reports track by $index">
                                            <div class="box-heading">
                                                <h5>
                                                    <i class="fas-sticky-note"></i> {{itm.type.category_name}} <b> {{itm.user.user_fullname}}</b>
                                                </h5>
                                                <div class="flex-center flex-gap-10">
                                                    <b> {{itm.stat_created.split(' ')[1]}} </b>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                            <span class="spoken">Spoken Today @ 11:45</span>
                                            <div class="text">
                                                <p>{{itm.report_text}}</p>
                                            </div>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="heading">
                                    <div class="title">Booking</div>
                                    <div class="flex-gap-10">
                                        <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'booking')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas-plus"></i> Add booking </button>
                                        <button class="btn"> View all bookings (0) <i class="fas-right-open"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Booking Date </span>
                                            <div class="wb-ele">
                                                <img src="\crm\webroot\img\datepicker.png" alt="" />
                                                {{ rec.sale.books[0].stat_created.split(' ')[0] }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Booking Time </span>
                                            <div class="wb-ele">
                                                <img src="\crm\webroot\img\icons_60284.svg" alt="" />
                                                <div class="line-height-10">
                                                {{ rec.sale.books[0].stat_created.split(' ')[1] }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Booking Meet Place </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-map-o"></i>
                                                <div class="line-height-10">
                                                {{ rec.sale.books[0].book_meetplace }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Booking Meet Period </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-bookmark"></i>
                                                <div class="line-height-10">
                                                {{ rec.sale.books[0].book_meetperiod }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt">Client Current Stay </span>
                                            <div class="wb-ele">
                                                <i class="fa fa-home "></i>
                                            
                                                <div class="line-height-10">
                                                {{ rec.sale.books[0].book_current_stay }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="sm-btn float" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <div class="heading">
                                    <div class="title">Finances</div>
                                    <div class="flex-gap-10">
                                        <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'finance')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas-plus"></i> Edit Finances </button>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box">
                                    <form class="row">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-disabled="true"
                                                    ng-model="rec.sale.sale_finance"
                                                    ng-value="'187'" 
                                                    name="finance" 
                                                    id="finance-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="finance-client1"> Finances in Place </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-disabled="true"
                                                    ng-value="'188'" 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    id="payment-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="payment-client1"> All cash payment </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-disabled="true"
                                                    ng-value="'189'" 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    id="Ready-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="Ready-client1"> Ready to buy now </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-disabled="true"
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    ng-value="'190'" 
                                                    id="present-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="present-client1"> Decision maker is present </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button m-2 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#client1-collapseThree" aria-expanded="true" aria-controls="client1-collapseThree">
                                            <span class="title">Offers</span>
                                        </button>
                                    </h2>
                                    <div id="client1-collapseThree" class="accordion-collapse collapse show">
                                        <div class="accordion-body p-0">
                                            <div class="heading">
                                    <div class="title"></div>
                                    <div class="flex-gap-10">
                                        <button class="btn">
                                            <i class="fas-plus"></i> Add Offer </button>
                                        <button class="btn"> View all (4) offers <i class="fas-right-open"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="white-box mb-2" ng-repeat="itm in rec.sale.offers">
                                    <div>
                                        <span class="sm-txt"> Property shared with client </span>
                                        <div class="white-box flex-between mb-2">
                                            <a href="#" class="btn-link"> {{ itm.property_id }}</a>
                                            <div class="d-flex">
                                                <div class="h-line hideMob"></div>
                                                <label class="switch">
                                                    <input id="interested-client1" type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5"> Interested </label>
                                            </div>
                                        </div>
                                        <div class="white-box flex-between">
                                            <div> {{ itm.offer_desc }}</div>
                                        </div>
                                    </div>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#client1-collapseTwo" aria-expanded="true" aria-controls="client1-collapseTwo">
                                    <span class="title">Deals</span>
                                </button>
                            </h2>
                            <div id="client1-collapseTwo" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="heading">
                                        <div class="title">Deal 1</div>
                                        <div class="flex-gap-10">
                                            <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'deal1')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fas-plus"></i> Add assigned 
                                            </button>
                                            <button class="btn">
                                                <i class="fas-plus"></i> Create new deal 
                                            </button>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Field Consultant </span>
                                                <div class="wb-ele">Some Text</div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Booking Date </span>
                                                <div class="wb-ele">
                                                    <img src="\crm\webroot\img\datepicker.png" alt="" /> 2023/9/1
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Booking Time </span>
                                                <div class="wb-ele">
                                                    <img src="\crm\webroot\img\icons_60284.svg" alt="" />
                                                    <div class="line-height-10">
                                                        <span class="sm-txt">Next Call Time</span> 12:30
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="heading">
                                        <div class="title">Region</div>
                                        <div class="flex-gap-10">
                                            <button class="btn" data-ng-click="inlineElement('#elementsContainer', 1, 'region')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fas-plus"></i> Add assigned </button>
                                            <button class="btn">
                                                <i class="fas-plus"></i> Create new deal </button>
                                        </div>
                                    </div>
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Region </span>
                                                <div class="wb-ele">Marmara Region</div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Address </span>
                                                <div class="wb-ele">Esenyurt Erdoğanlar</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="heading">
                                        <div class="title">Reservation</div>
                                    </div>
                                    <div class="white-box">
                                        <form class="row">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Reservation </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Sale Price </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Payment Type </span>
                                                <input type="text" class="wb-txt-inp" placeholder="Please specify" />
                                            </label>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Project </span>
                                                <input type="text" class="wb-txt-inp" placeholder="Project name" />
                                            </label>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Developer Name </span>
                                                <input type="text" class="wb-txt-inp" placeholder="Enter" />
                                            </label>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Type </span>
                                                <input type="text" class="wb-txt-inp" placeholder="Please specify" />
                                            </label>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <input type="text" class="wb-txt-inp" placeholder="Please specify" />
                                            </label>
                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <input type="text" class="wb-txt-inp" placeholder="% Please specify" />
                                            </label>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Down Payment </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Installments </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="down-btns">
                                        <div class="flex-gap-10">
                                            <button class="btn btn-danger" type="button"> Save Changes </button>
                                            <button class="btn btn-gray" type="button">View History</button>
                                        </div>
                                        <button class="btn btn-danger" type="button">Create deal</button>
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
