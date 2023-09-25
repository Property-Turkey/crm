  <!-- CRM Page -->
  <main>
   <section class="container-fluid">
    <h2 class="client-num">Clients (123,456)</h2>
    <form class="dropdowns">
     <div class="flex-gap-10 flex-wrap">
      <select class="wb-ele">
       <option value="All Clients">All Clients</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <select class="wb-ele">
       <option value="All Clients">All Clients</option>
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
       <img src="img/two-circles-outline_icon-icons.com_74232.png" alt="" />
       Pools
      </button>
      <button class="wb-ele">
       <img src="img/filter.png" alt="" /> Filters
      </button>
     </div>
     <div class="flex-gap-10">
      <select class="wb-ele">
       <option disabled selected hidden>Sort By</option>
       <option value="option">Option</option>
       <option value="option">Option</option>
      </select>
      <button class="btn btn-danger"><i class="fas-plus"></i> Add</button>
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
       <span> 1 </span>
       <button>
        <i class="fas-angle-right"></i>
       </button>
       <span> of 43 </span>
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
         <div class="col-md-2 p-0 title">Lead content</div>
         <div class="col-md-2 p-0 title">Lead info</div>
         <div class="col-md-1 p-0 title">Status</div>
         <div class="col-md-2 p-0 title">Notes</div>
         <div class="col-md-1 p-0 title">Budget</div>
         <div class="col-md-2 p-0 title">Booking</div>
         <div class="col-md-1 p-0 title">Adviser</div>
        </div>
       </div>
      </div>
      <!--  -->
      <div class="client">
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
            <div class="priority"><em class="low"></em> 145678</div>
            <a href="#" class="btn-link"> Muhammed Ghali </a>
            <p><i class="fas-mail"></i> Muhammed@eample.com</p>
            <p><img src="img/phone.svg" alt="" /> (123) 556-01768</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> Lebanon</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
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
            <span class="new">New</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$400k</div>
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
            <div class="wb-ele">Unassigned</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <!--  -->
      <div class="client">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-2" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row  ">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="high"></em> 153624</div>
            <a href="#" class="btn-link"> Xi Fu Shi </a>
            <p><i class="fas-mail"></i> Xi.72974@example.com</p>
            <p><img src="img/phone.svg" alt="" /> (409) 570-72549</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> China</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
            <p><i class="fas-clock"></i> Inquired 15/05/2023 @ 13:00</p>
            <p>
             <i class="fas-asterisk"></i> Source:
             <a href="#" class="btn-link"> Link</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="open">Open</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$50k</div>
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
            <div class="wb-ele">Chang Kai</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client2">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client2-collapseOne"
            aria-expanded="true"
            aria-controls="client2-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client2-collapseOne"
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
               <div class="wb-ele">153624</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Name </span>
               <div class="wb-ele">Xi Fu Shi</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Phone </span>
               <div class="wb-ele">(409) 570-72549</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Email </span>
               <div class="wb-ele">example</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Country </span>
               <div class="wb-ele">China</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Inquiry </span>
               <div class="wb-ele">15/05/2023 @ 13:00</div>
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
                <div class="priority"><em class="high"></em> High</div>
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <input id="finance-client2" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client2"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client2" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client2"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client2" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client2"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client2" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client2"> Decision maker is present </label>
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
                 <input id="interested-client2" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client2"
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
             data-bs-target="#client2-collapseTwo"
             aria-expanded="true"
             aria-controls="client2-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client2-collapseTwo"
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <!--  -->
      <div class="client">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-3" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="med"></em> 162538</div>
            <a href="#" class="btn-link"> Linda Roberts </a>
            <p><i class="fas-mail"></i> Linda@example.com</p>
            <p><img src="img/phone.svg" alt="" /> (840) 570-72549</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> UK</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
            <p><i class="fas-clock"></i> Inquire 15/05/2023 @ 13:00</p>
            <p>
             <i class="fas-asterisk"></i> Source:
             <a href="#" class="btn-link"> Link</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="in-progress">In Progress</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$100k</div>
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
            <div class="wb-ele">Maya Smith</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client3">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client3-collapseOne"
            aria-expanded="true"
            aria-controls="client3-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client3-collapseOne"
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
               <div class="wb-ele">162538</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Name </span>
               <div class="wb-ele">Linda Roberts</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Phone </span>
               <div class="wb-ele">(840) 570-72549</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Email </span>
               <div class="wb-ele">example</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Country </span>
               <div class="wb-ele">UK</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Inquiry </span>
               <div class="wb-ele">15/05/2023 @ 13:00</div>
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
                <div class="priority"><em class="med"></em> Medium</div>
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <input id="finance-client3" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client3"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client3" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client3"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client3" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client3"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client3" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client3"> Decision maker is present </label>
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
                 <input id="interested-client3" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client3"
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
             data-bs-target="#client3-collapseTwo"
             aria-expanded="true"
             aria-controls="client3-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client3-collapseTwo"
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <!--  -->
      <div class="client">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-4" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="low"></em> 145678</div>
            <a href="#" class="btn-link"> Muhammed Ghali </a>
            <p><i class="fas-mail"></i> Muhammed@eample.com</p>
            <p><img src="img/phone.svg" alt="" /> (123) 556-01768</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> Lebanon</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
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
            <span class="new">New</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$400k</div>
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
            <div class="wb-ele">Unassigned</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client4">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client4-collapseOne"
            aria-expanded="true"
            aria-controls="client4-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client4-collapseOne"
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <input id="finance-client4" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client4"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client4" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client4"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client4" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client4"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client4" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client4"> Decision maker is present </label>
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
                 <input id="interested-client4" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client4"
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
           <div class="rounded-2 p-2 bg-green">
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
             data-bs-target="#client4-collapseTwo"
             aria-expanded="true"
             aria-controls="client4-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client4-collapseTwo"
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <!--  -->
      <div class="client">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-5" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row ">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="high"></em> 153624</div>
            <a href="#" class="btn-link"> Xi Fu Shi </a>
            <p><i class="fas-mail"></i> Xi.72974@example.com</p>
            <p><img src="img/phone.svg" alt="" /> (409) 570-72549</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> China</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
            <p><i class="fas-clock"></i> Inquired 15/05/2023 @ 13:00</p>
            <p>
             <i class="fas-asterisk"></i> Source:
             <a href="#" class="btn-link"> Link</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="open">Open</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$50k</div>
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
            <div class="wb-ele">Chang Kai</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client5">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client5-collapseOne"
            aria-expanded="true"
            aria-controls="client5-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client5-collapseOne"
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
               <div class="wb-ele">153624</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Name </span>
               <div class="wb-ele">Xi Fu Shi</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Phone </span>
               <div class="wb-ele">(409) 570-72549</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Email </span>
               <div class="wb-ele">example</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Country </span>
               <div class="wb-ele">China</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Inquiry </span>
               <div class="wb-ele">15/05/2023 @ 13:00</div>
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
                <div class="priority"><em class="high"></em> High</div>
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <input id="finance-client5" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client5"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client5" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client5"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client5" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client5"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client5" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client5"> Decision maker is present </label>
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
                 <input id="interested-client5" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client5"
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
             data-bs-target="#client5-collapseTwo"
             aria-expanded="true"
             aria-controls="client5-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client5-collapseTwo"
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <!--  -->
      <div class="client">
       <!-- Client row Start -->
       <div class="client-row">
        <div class="row">
         <div class="checkbox col-1">
          <input type="checkbox" id="client-6" name="client-checkbox" />
         </div>
         <div class="col-lg-11 col-12 row">
          <div class="previewToggle col-lg-2 col-12 row">
           <div class="col-4 title hideWeb">Lead content</div>
           <div class="col-6 p-0 col-lg-12">
            <div class="priority"><em class="med"></em> 162538</div>
            <a href="#" class="btn-link"> Linda Roberts </a>
            <p><i class="fas-mail"></i> Linda@example.com</p>
            <p><img src="img/phone.svg" alt="" /> (840) 570-72549</p>
           </div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Lead info</div>
           <div class="col-6 p-0 col-lg-12">
            <p><i class="fas-flag"></i> UK</p>
            <p><i class="fas-home"></i> Second Home Buyer</p>
            <p><i class="fas-clock"></i> Inquire 15/05/2023 @ 13:00</p>
            <p>
             <i class="fas-asterisk"></i> Source:
             <a href="#" class="btn-link"> Link</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="in-progress">In Progress</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, adipiscing
            eiusmod…
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$100k</div>
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
            <div class="wb-ele">Maya Smith</div>
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
          <img src="img/export-svgrepo-com.svg" alt="" width="30" />
          Lead Preview
         </button>
        </div>
        <div class="green-btns">
         <div class="green-btn"><i class="fas-check"></i> New</div>
         <div class="green-btn"><i class="fas-check"></i> Assigned</div>
         <div class="green-btn"><i class="fas-check"></i> Intrested</div>
         <div class="green-btn"><i class="fas-check"></i> Raised</div>
        </div>
        <div class="accordion accordion-flush" id="client6">
         <div class="accordion-item">
          <h2 class="accordion-header">
           <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#client6-collapseOne"
            aria-expanded="true"
            aria-controls="client6-collapseOne"
           >
            <span class="title">Contact</span>
           </button>
          </h2>
          <div
           id="client6-collapseOne"
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
               <div class="wb-ele">162538</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Name </span>
               <div class="wb-ele">Linda Roberts</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Phone </span>
               <div class="wb-ele">(840) 570-72549</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Email </span>
               <div class="wb-ele">example</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Country </span>
               <div class="wb-ele">UK</div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Inquiry </span>
               <div class="wb-ele">15/05/2023 @ 13:00</div>
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
                <div class="priority"><em class="med"></em> Medium</div>
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
                <img src="img/datepicker.png" alt="" />
                2023/9/1
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <span class="sm-txt"> Booking Time </span>
               <div class="wb-ele">
                <img src="img/icons_60284.svg" alt="" />
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
                 <input id="finance-client6" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="finance-client6"> Finances in Place </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="payment-client6" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="payment-client6"> All cash payment </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center">
                <label class="switch">
                 <input id="Ready-client6" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="Ready-client6"> Ready to buy now </label>
               </div>
              </div>
              <div class="col-md-6 col-12 col-lg-3">
               <div class="flex-center text-center">
                <label class="switch">
                 <input id="present-client6" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label for="present-client6"> Decision maker is present </label>
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
                 <input id="interested-client6" type="checkbox" />
                 <span class="slider round"></span>
                </label>
                <label
                 for="interested-client6"
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
             data-bs-target="#client6-collapseTwo"
             aria-expanded="true"
             aria-controls="client6-collapseTwo"
            >
             <span class="title">Deals</span>
            </button>
           </h2>
           <div
            id="client6-collapseTwo"
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
                 <img src="img/datepicker.png" alt="" />
                 2023/9/1
                </div>
               </div>
               <div class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Booking Time </span>
                <div class="wb-ele">
                 <img src="img/icons_60284.svg" alt="" />
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
      <span> 1 </span>
      <button>
       <i class="fas-angle-right"></i>
      </button>
      <span> of 43 </span>
      <button>
       <i class="fas-angle-double-right"></i>
      </button>
     </div>
     <!-- Dashboard Nav End -->
    </div>
   </section>
   <!-- Dashboard End -->
  </main>
  <!-- CRM Page End -->
  <div class="overlay"></div>
