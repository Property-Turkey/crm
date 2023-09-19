

<?php
    $pid = !isset($this->request->getParam('pass')[0]) ? null : $this->request->getParam('pass')[0];
?>

<div class="right_col" role="main" ng-init="
        doGet('/admin/sales/index/<?=$pid?>?list=1', 'list', 'sales');
    ">

    <main>
   <section class="container-fluid">
    <h2 class="client-num">Sales ({{paging.count}})</h2>
    <form class="dropdowns">
     <div class="flex-gap-10 flex-wrap">
      <select class="wb-ele">
       <option value="All Sales">All Sales</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <select class="wb-ele">
       <option value="All Sales">All Sales</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <select class="wb-ele">
       <option value="Date">Date</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <select class="wb-ele">
       <option value="Adviser">Adviser</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <button class="wb-ele">
       <img src="\crm\webroot\img\two-circles-outline_icon-icons.com_74232.png" alt="" />
       Pools
      </button>
      <button class="wb-ele">
       <img src="\crm\webroot\img\filter.png" alt="" /> Filters
      </button>
     </div>
     <div class="flex-gap-10">
      <select class="wb-ele">
       <option disabled selected hidden>Sort By</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
    
    	<button class="btn btn-danger" ng-click="
				newEntity('sales');
				openModal('#addEditSale_mdl');
				doGet('/admin/sales?id='+itm.id, 'rec', 'sales');
			"><i class="fas-plus"></i> 			
			<span class="hideMob"><?=__('add_sale')?></span>
    	</button>
     </div>
    </form>
   </section>
   <!-- Dashboard Start -->
   <section class="container-fluid">
    <div class="dashboard">
     <!-- Dashboard Header Start -->
     <div class="dash-head">
      <div class="flex-gap-10">
       <form class="search-leads-form">
        <i class="fas-search"></i>
        <input type="text" placeholder="Search Leads" />
       </form>
       <div class="small-btns">
        <div class="row no-gutters">
         <div class="col-4">
          <a href="#">Filter 1</a>
         </div>
         <div class="col-8">
          <a href="#">Long Filter Name</a>
         </div>
         <div class="col-4">
          <a href="#">Filter 2</a>
         </div>
         <div class="col-8">
          <a href="#">Pool Pool Name</a>
         </div>
        </div>
       </div>
      </div>
      <div class="dash-nav">
     
       <button>
        <i class="fas-angle-double-left"></i>
       </button>
       <button>
        <i class="fas-angle-left"></i>
       </button>
       <span> {{ paging.start  }} </span>
       <button>
        <i class="fas-angle-right"></i>
       </button>
       <span> {{ paging.end }} <?=__('of')?> {{ paging.count }} </span>
       <button>
        <i class="fas-angle-double-right"></i>
       </button>
      </div>
     </div>
     <!-- Dashboard Header End -->
     <!-- Dashboard Content Start -->
     <div class="dash-content">
      <div class="columns-titles">
       <div class="row">
        <div class="checkbox">
         <input
          type="checkbox"
          class="all-clients"
          name="client-checkbox"
          ng-click="checkAll(this)"
         />
        </div>
        <div class="col-11 hideMob row">
			<div class="col-md-2 p-0 title"><?=__('sales_content')?></div>
			<div class="col-md-2 p-0 title"> <?=__('sales_info')?></div>
			<div class="col-md-1 p-0 title"> <?=__('rec_state')?></div>
			<div class="col-md-2 p-0 title"><?=__('notes')?></div>
			<div class="col-md-1 p-0 title"><?=__('budget')?> </div>
			<div class="col-md-2 p-0 title"><?=__('booking')?></div>
			<div class="col-md-1 p-0 title"><?=__('sale_current_stage')?></div>
        </div>
       </div>
      </div>
      <!--  -->
      <div class="client" ng-repeat="itm in lists.sales">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-1" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="low"></em> {{ itm.id }}</div>
            <a href="#" ng-click="
				openModal('#viewSale_mdl');
				doGet('/admin/sales?id='+itm.id, 'rec', 'sales');
			" class="btn-link"> {{ itm.client.client_name }} </a>
            <p><i class="fas-mail"></i> {{ itm.client.client_email }}</p>
            <p><img src="\crm\webroot\img\phone.svg" alt="" /> {{ itm.client.client_mobile }}</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> {{ itm.client.client_nationality }}</p>
            <p><i class="fas-home"></i> {{ itm.category.category_name }}</p>
            <p><i class="fas-clock"></i> Inquire Today @ 13:00</p>
            <p>
             <i class="fas-asterisk"></i> Source:
             <a href="#" class="btn-link"> Link</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="new">{{ DtSetter('rec_stateSale', itm.sale_current_stage, itm.rec_state) }}</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
           {{ itm.report.report_text }}
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">{{ itm.sale_budget }}</div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Booking</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="inp-with-desc">
             <span class="sm-txt"> Next Call Date</span>
             <input type="date" class="wb-ele" />
            </div>
            <div class="wb-ele">
             <i class="fas-clock"></i>
             <div class="line-height-10">
              <span class="sm-txt">Next Call Time</span> 12:30
             </div>
            </div>
           </div>
          </div>
          <div class="pe-2 ps-2 col-lg-2 col-12">
           <div class="col-4 title hideWeb">Adviser</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="wb-ele">{{DtSetter('sale_current_stage', itm.sale_current_stage)}}</div>
           </div>
          </div>
         </div>
        </div>
       </div>
       <!-- Client row End -->
       <!-- Client Preview Start -->
       <div class="lead-preview">
        <div class="modal-header">
         <button class="btn-exit">
          <img src="\crm\webroot\img\export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client1">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client1-collapseOne"
            aria-expanded="true"
            aria-controls="client1-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client1-collapseOne"
           class="accordion-collapse collapse show"
          >
           <div class="accordion-body">
            <div class="heading">
             <div class="title">Contact Setting</div>
             <div class="flex-center flex-gap-5">
              <button
               class="btn"
               data-ng-click="inlineElement('#elementsContainer', 1, 'contact-setting')"
               data-bs-toggle="modal"
               data-bs-target="#exampleModal"
              >
               <i class="fas-plus"></i> Add assigned
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
               <button
                class="sm-btn"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
               >
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
               <span class="sm-txt"> ID </span>
               <div class="wb-ele">145682</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Name </span>
               <div class="wb-ele">Muhammed Ghali</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Phone </span>
               <div class="wb-ele">(908) 556-01897</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Email </span>
               <div class="wb-ele">example</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Country </span>
               <div class="wb-ele">Lebanon</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Inquiry </span>
               <div class="wb-ele">Today @ 10:00</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Source </span>
               <div class="wb-ele">
                <a href="#" class="btn-link">Link</a>
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
              <button
               class="btn"
               data-ng-click="inlineElement('#elementsContainer', 1, 'assign')"
               data-bs-toggle="modal"
               data-bs-target="#exampleModal"
              >
               <i class="fas-plus"></i> Add assigned
              </button>
              <button class="btn">
               View all assigned <i class="fas-right-open"></i>
              </button>
             </div>
            </div>
            <div class="white-box">
             <div class="row">
              <div class="col-12 col-sm-3">
               <span class="sm-txt"> Advisor </span>
               <div class="wb-ele">Noor Hasan</div>
              </div>
              <div class="col-12 col-sm-3">
               <span class="sm-txt"> Priority </span>
               <div class="wb-ele">
                <div class="priority"><em class="low"></em> Low</div>
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
            </div>
            <div class="white-box">
             <form class="row">
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Segment </span>
               <select class="wb-ele">
                <option value="option">Second Home Buyer</option>
                <option value="option">Option</option>
                <option value="option">Option</option>
               </select>
              </label>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Budget </span>
               <div class="input-group">
                <button
                 class="btn btn-outline-secondary dropdown-toggle"
                 type="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false"
                >
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
                <input class="form-control" value="400k" type="text" />
               </div>
              </div>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Tags </span>
               <tags-input
                class="wb-txt-inp"
                data-ng-model="tags"
                tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
               >
                <auto-complete source="loadTags($query)"></auto-complete>
               </tags-input>
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Place of stay </span>
               <input type="text" class="wb-txt-inp" placeholder="Enter" />
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Date of arrival </span>
               <input type="text" class="wb-txt-inp" placeholder="Enter" />
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Date of departure </span>
               <input type="text" class="wb-txt-inp" placeholder="Enter" />
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Property Type </span>
               <select class="wb-ele">
                <option value="please select" disabled selected hidden>
                 Please Select
                </option>
                <option value="option">Option</option>
                <option value="option">Option</option>
               </select>
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Minimum of beds </span>
               <input type="text" class="wb-txt-inp" value="1+1" />
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Region </span>
               <input type="text" class="wb-txt-inp" placeholder="Enter" />
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Requirements </span>
               <select class="wb-ele">
                <option value="please select" disabled selected hidden>
                 Please Select
                </option>
                <option value="option">Option</option>
                <option value="option">Option</option>
               </select>
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Buyer Profile </span>
               <select class="wb-ele">
                <option value="please select" disabled selected hidden>
                 Please Select
                </option>
                <option value="option">Option</option>
                <option value="option">Option</option>
               </select>
              </label>
              <label class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Social Style Model </span>
               <select class="wb-ele">
                <option value="please select" disabled selected hidden>
                 Please Select
                </option>
                <option value="option">Option</option>
                <option value="option">Option</option>
               </select>
              </label>
             </form>
            </div>
            <div class="heading">
             <div class="title">Empathy Mapping</div>
             <div class="flex-gap-10">
              <button
               class="btn"
               data-ng-click="inlineElement('#elementsContainer', 1, 'empathy')"
               data-bs-toggle="modal"
               data-bs-target="#exampleModal"
              >
               <i class="fas-plus"></i> Add assigned
              </button>
              <button class="btn">
               View all assigned <i class="fas-right-open"></i>
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
            <div class="heading">
             <div class="title">Notes</div>
             <div class="flex-gap-10">
              <button
               class="btn"
               data-ng-click="inlineElement('#elementsContainer', 1, 'notes')"
               data-bs-toggle="modal"
               data-bs-target="#exampleModal"
              >
               <i class="fas-plus"></i> Add Note
              </button>
              <button class="btn">
               View all (4) notes <i class="fas-right-open"></i>
              </button>
             </div>
            </div>
            <div class="note">
             <div class="box-heading">
              <h5>
               <i class="fas-sticky-note"></i> Note (Update) by
               <b>Noor Hasan</b>
              </h5>
              <div class="flex-center flex-gap-10">
               <b> Today 12:00 </b>
               <div class="dropdown">
                <button
                 class="btn"
                 type="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false"
                >
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
              <p>
               She is coming 15.07 to istanbul and want see options on 18.07.
               She is looking for lifesyle ready to move property to buy during
               few month and move in and start to live in.
              </p>
             </div>
            </div>
            <div class="note">
             <div class="box-heading">
              <h5>
               <i class="fas-sticky-note"></i> Profile by
               <b>Noor Hasan</b>
              </h5>
              <div class="flex-center flex-gap-10">
               <b> Today 12:00 </b>
               <div class="dropdown">
                <button
                 class="btn"
                 type="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false"
                >
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
             <div class="text">
              <p>
               she is now in montenegro. she is ukrainian. her daugther living
               in my home maslak. she want also live there. she want 1+1
               apartment for lifestyle in good compound in maslak.she said you
               can’t sell me something overpriced like 500k usd. she said its
               too expensive we know...
              </p>
              <p>
               She said she was not in a hurry to buy an apartment in Maslak.
               She said she wanted to explore different options and compare
               prices
              </p>
              <a class="view-more" ng-click="toggleText($event)" href="#"
               >View More</a
              >
             </div>
            </div>
            <div class="heading">
             <div class="title">Booking</div>
             <div class="flex-gap-10">
              <button
               class="btn"
               data-ng-click="inlineElement('#elementsContainer', 1, 'booking')"
               data-bs-toggle="modal"
               data-bs-target="#exampleModal"
              >
               <i class="fas-plus"></i> Add booking
              </button>
              <button class="btn">
               View all bookings (0) <i class="fas-right-open"></i>
              </button>
             </div>
            </div>
            <div class="white-box">
             <div class="row">
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Date </span>
               <div class="wb-ele">
                <img src="\crm\webroot\img\datepicker.png" alt="" />
                2023/9/1
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
              <div class="dropdown">
               <button
                class="sm-btn float"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
               >
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
              <button class="btn"><i class="fas-plus"></i> Add Offer</button>
              <button class="btn">
               View all (4) Offers <i class="fas-right-open"></i>
              </button>
             </div>
            </div>
            <div class="white-box">
             <form class="row">
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="finance-client1" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client1"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client1" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client1"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client1" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client1"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client1" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client1"> Decision maker is present </label>
               </div>
              </div>
             </form>
            </div>
            <div class="heading">
             <div class="title">Offers</div>
             <div class="flex-gap-10">
              <button class="btn"><i class="fas-plus"></i> Add Offer</button>
              <button class="btn">
               View all (4) offers <i class="fas-right-open"></i>
              </button>
             </div>
            </div>
            <div class="white-box">
             <div>
              <span class="sm-txt"> Property shared with client </span>
              <div class="white-box flex-between">
               <a href="#" class="btn-link"> PTFS1234 </a>
               <div class="d-flex">
                <div class="h-line hideMob"></div>
                <label class="switch">
                 <input id="interested-client1" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client1"
                 class="ps-md-5 ps-3 pe-3 pe-md-5"
                >
                 Interested
                </label>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
          <div class="flex-gap-10 flex-gap-10 flex-center">
           <div class="wb-ele text-light bg-green">
            <i class="fas-check"></i> Raised
           </div>
           <div class="wb-ele"><i class="fas-check"></i> Reservation</div>
          </div>
          <div class="accordion-item">
           <h2 class="accordion-header">
            <button
             class="accordion-button"
             type="button"
             data-bs-toggle="collapse"
             data-bs-target="#client1-collapseTwo"
             aria-expanded="true"
             aria-controls="client1-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client1-collapseTwo"
            class="accordion-collapse collapse show"
           >
            <div class="accordion-body">
             <div class="heading">
              <div class="title">Deal 1</div>
              <div class="flex-gap-10">
               <button
                class="btn"
                data-ng-click="inlineElement('#elementsContainer', 1, 'deal1')"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
               >
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
                 <img src="\crm\webroot\img\datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="\crm\webroot\img\icons_60284.svg" alt="" />
                 <div class="line-height-10">
                  <span class="sm-txt">Next Call Time</span>
                  12:30
                 </div>
                </div>
               </div>
              </div>
             </div>
             <div class="heading">
              <div class="title">Region</div>
              <div class="flex-gap-10">
               <button
                class="btn"
                data-ng-click="inlineElement('#elementsContainer', 1, 'region')"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
               >
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
              <div class="title">Report</div>
              <div class="flex-gap-10">
               <button class="btn"><i class="fas-plus"></i> Add Update</button>
               <button class="btn">
                View all assigned <i class="fas-right-open"></i>
               </button>
              </div>
             </div>
             <div class="white-box">
              <div class="nothing">Nothing Yet</div>
             </div>
             <div class="heading">
              <div class="title">Reservation</div>
             </div>
             <div class="white-box">
              <form class="row">
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Reservation </span>
                <div class="input-group">
                 <button
                  class="btn btn-outline-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                 >
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
                 <input
                  type="text"
                  class="form-control"
                  aria-label="Text input with dropdown button"
                 />
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Sale Price </span>
                <div class="input-group">
                 <button
                  class="btn btn-outline-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                 >
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
                 <input
                  type="text"
                  class="form-control"
                  aria-label="Text input with dropdown button"
                 />
                </div>
               </div>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Payment Type </span>
                <input
                 type="text"
                 class="wb-txt-inp"
                 placeholder="Please specify"
                />
               </label>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Project </span>
                <input
                 type="text"
                 class="wb-txt-inp"
                 placeholder="Project name"
                />
               </label>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Developer Name </span>
                <input type="text" class="wb-txt-inp" placeholder="Enter" />
               </label>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Unit Type </span>
                <input
                 type="text"
                 class="wb-txt-inp"
                 placeholder="Please specify"
                />
               </label>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Unit Information </span>
                <input
                 type="text"
                 class="wb-txt-inp"
                 placeholder="Please specify"
                />
               </label>
               <label class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Commission </span>
                <input
                 type="text"
                 class="wb-txt-inp"
                 placeholder="% Please specify"
                />
               </label>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Down Payment </span>
                <div class="input-group">
                 <button
                  class="btn btn-outline-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                 >
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
                 <input
                  type="text"
                  class="form-control"
                  aria-label="Text input with dropdown button"
                 />
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Installments </span>
                <div class="input-group">
                 <button
                  class="btn btn-outline-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                 >
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
                 <input
                  type="text"
                  class="form-control"
                  aria-label="Text input with dropdown button"
                 />
                </div>
               </div>
              </form>
             </div>
             <div class="down-btns">
              <div class="flex-gap-10">
               <button class="btn btn-danger" type="button">
                Save Changes
               </button>
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
       <!-- Client Preview end -->
      </div>
      
     </div>
     <!-- Dashboard Content End -->
     <!-- Dashboard Nav Start -->
     <div class="dash-nav flex-center p-2">
     <button>
        <i class="fas-angle-double-left"></i>
       </button>
       <button>
        <i class="fas-angle-left"></i>
       </button>
       <span> {{ paging.start  }} </span>
       <button>
        <i class="fas-angle-right"></i>
       </button>
       <span> {{ paging.end }} <?=__('of')?> {{ paging.count }} </span>
       <button>
        <i class="fas-angle-double-right"></i>
       </button>
     </div>
     <!-- Dashboard Nav End -->
    </div>
   </section>
   <!-- Dashboard End -->
  </main>
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6 side_div1">
                <h3><?=__('sales_list')?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href ng-click="
                            newEntity('sales');
                            openModal('#addEditSale_mdl');
                            doGet('/admin/sales?id='+itm.id, 'rec', 'sales');
                        " class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_sale')?></span>
                    </a>
                </span>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn">
                    <a href  data-toggle="modal" data-target="#search_mdl" data-dismiss="modal"  class="btn btn-info">
                        <span class="fa fa-search"></span> <span class="hideMob"><?=__('search')?></span>
                    </a>
                </span>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12">
                <div class="x_panel">

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div><?=__('please_wait')?></div>
                    </div>
                    
                    <div class="x_title">
                        <h2><b><?=__('sales_list')?></b><br> 
                            <span> <?=__('show').' '.__('from')?> 
                                {{ paging.start  }} <?=__('to')?> 
                                {{ paging.end }} <?=__('of')?> {{ paging.count }} </span></h2>
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu  <?= $currlang!='ar' ? 'dropdown-menu-right' : ''?>">
                                    <a href ng-click="multiHandle('/admin/sales/enable/1')" class="dropdown-item">
                                        <i class="fa fa-check"></i> <?=__('enable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/sales/enable/0')" class="dropdown-item">
                                        <i class="fa fa-times"></i> <?=__('disable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/sales/delete')" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?=__('delete_selected')?>
                                    </a>
                                </div>
                            </li>
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li>-->
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="grid ">

                            <div class="grid_header row">

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'id'])?>
                                    <label class="mycheckbox">
                                        <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                        <span></span> 
                                        <?=__('id')?> 
                                    </label> 
                                </div>
                                <div class="col-sm-1 col" >
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'client_id' ])?> 
                                    <?=__('client_name')?> 
                                </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'source_id' ])?> 
                                    <?=__('source_id')?> </div>

                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'category_id' ])?> 
                                    <?=__('category_id')?> </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'pool_id' ])?> 
                                    <?=__('pool_id')?> </div>

                            
                                <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'' ])?> 
                                    <?=__('sales_info')?> </div>
                                 
                                    <div class="col-sm-2 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'sale_budget' ])?> 
                                    <?=__('budget')?> </div>

                                <div class="col-sm-1 col">
                                    <?=$this->element('colActions', ['url'=>'sales/index/', 'col'=>'rec_state' ])?> 
                                    <?=__('rec_state')?> </div>

                                
                                <div class="col-sm-1 col hideMob"><span
                                        class="nobr"><?=__('action')?></span>
                                </div>
                            </div>
                            
                            <div class="grid_row row" ng-repeat="itm in lists.sales">
                                
                            
                                <div class="col-sm-1 hideMobSm grid_header">
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span> {{ itm.id }}
                                    </label>
                                </div>
                                <div class="col-4 hideWeb grid_header">
                                    <?=__('id')?> 
                                    <label class="mycheckbox chkb">
                                        <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>

                                <div class="col-4 hideWeb grid_header"><?=__('client_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a  href="<?=$app_folder?>/admin/clients/index/{{itm.client.client_name}}">{{ itm.client.client_name }}</a>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('source_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.source.category_id}}">{{ itm.source.category_name }}</a><br>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('category_id')?></div>
                                <div class="col-md-2 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.category.parent_id}}">{{ itm.category.category_name }}</a><br>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('pool_id')?></div>
                                <div class="col-md-1 col-8">
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.pool.parent_id}}">{{ itm.pool.category_name }}</a><br>
                                </div>
                

                                <div class="col-4 hideWeb grid_header"><?=__('sales')?></div>
                                <div class="col-md-2 col-8">
                                    <b>Sale Priority:</b> {{DtSetter('sale_priorities', itm.sale_priority)}}/<br>
                                    <b>Sale  Current Stage:</b> {{DtSetter('sale_current_stage', itm.sale_current_stage)}}/<br>
                                    <b>Sale Tag:</b> 
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.tag.parent_id}}" ng-repeat="tag in itm.sale_tags" ng-if="!$last">
                                        {{ tag.text }},
                                    </a>
                                    <a href="<?=$app_folder?>/admin/categories/index/{{itm.tag.parent_id}}" ng-repeat="tag in itm.sale_tags" ng-if="$last">
                                        {{ tag.text }}
                                    </a>
                                </div>

                            
                                <div class="col-4 hideWeb grid_header"><?=__('sale_budget')?></div>
                                <div class="col-md-2 col-8">
                                    {{ itm.sale_budget }}
                                </div>

                                <div class="col-4 hideWeb grid_header">{{'rec_state'}}</div>
                                <!-- <div class="col-md-1 col-8" ng-repeat="state in DtSetter('rec_stateSale', itm.sale_current_stage)">
                                    {{state}}
                                </div> -->


                                <div class="col-4 hideWeb grid_header"><?=__('actions')?></div>
                                <div class="col-md-1 col-8 action">
                                    <a href ng-click="
                                        doGet('/admin/sales?id='+itm.id, 'rec', 'sale');
                                        openModal('#viewSale_mdl');
                                        "  class="inline-btn"><i class="fa fa-eye"></i> <?=__('view')?></a>
                                    <a href ng-click=" 
                                        doGet('/admin/sales?id='+itm.id, 'rec', 'sale'); 
                                        openModal('#addEditSale_mdl');
                                        "   class="inline-btn">
                                        <i class="fa fa-pencil"></i> <?=__('edit')?>
                                    </a>
                                    
                                    
                                </div>
                            </div>

                        </div>
                        <?php echo $this->element('paginator-ng')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('Modals/search')?>
<?php echo $this->element('Modals/addEditBook')?>
<?php echo $this->element('Modals/addEditSale')?>
<?php echo $this->element('Modals/viewSale')?>
<?php echo $this->element('Modals/addEditReport')?>
<?php echo $this->element('Modals/viewReport')?>
<?php echo $this->element('Modals/addEditUsersale')?>
<?php echo $this->element('modals')?>
