<div class="modal fade" id="viewSale_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
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
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view_sale') ?>
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                            <div class="grid_row row">
                                <h4 class="col-12 pt-3 pb-2">
                                    <i class="fa {{itm.sale_configs.icon||'fa-tag'}}"></i> {{ rec.sale.client[0].text }}'s Sale
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('client_name')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.client[0].text }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('source_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.source.category_name }}</div>
                            </div>
 
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('category_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.category.category_name }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('pool_id')?></div>
                                <div class="col-md-9 notwrapped">{{ rec.sale.pool.category_name  }}</div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('sale_current_stage')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter('sale_current_stage', rec.sale.sale_current_stage)}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('lead_priority')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter('sale_priorities', rec.sale.sale_priority)}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter( 'rec_stateSale', rec.sale.rec_state )}}</div>
                            </div>

                             <div class="grid_row row" ng-repeat="item in rec.sale_specs">
                                <div class="col-md-3 grid_header2">{{item}}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_current_location')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_propertytype }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_beds')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_beds }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_loction_target')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_loction_target }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_isowner')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_isowner == 1 ? 'Yes' : 'No' }}</div>
                            </div>

                            <div class="grid_row row" ng-repeat="item in rec.sale.sale_specs">
                                <div class="col-md-3 grid_header2"><?=__('salespec_isready')?></div>
                                <div class="col-md-9 notwrapped">{{ item.salespec_isready == 1 ? 'Yes' : 'No' }}</div>
                            </div>

                            
                           

                            <div class="col-md-4 col-sm-12 form-group has-feedback d-flex justify-content-center pt-2"  id="buton">
                                <button type="submit" class="btn btn-info" ><span></span> 
                                <i class="fa" ng-class="isDivReportFormOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('add_report')?></button>
                            </div>
                                    
                            <div class="col-md-4 col-sm-12 form-group has-feedback d-flex justify-content-center pt-2"  id="butonshowReport">
                                <button type="submit" class="btn btn-info"><span></span> 
                                <i class="fa" ng-class="isDivOpen ? 'fa-minus' : 'fa-plus'"></i> <?=__('show_report')?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    
    </div>

</div>


<script>
$(document).ready(function(){
    // İkinci Modal'ı Açma
    $("#buton").click(function(){
        $("#addEditReport_mdl").modal();
    });
    $("#butonshowReport").click(function(){
        $("#viewReport_mdl").modal();
    });
});
</script>