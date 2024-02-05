// ANGULARJS CODE
angular
    .module("myApp", ["ngTagsInput"])
    .controller("MyCtrl", function ($scope, $http, $compile) {
        // Toggle Mobile Sidebar
        $scope.toggleSidebar = function () {
            document.querySelector(".sidebar").classList.toggle("active");
        };

        // TAG INPUT
        $scope.tags = ["Investment"];
        $scope.loadTags = function (query) {
            return $http.get("/tags?query=" + query);
        };
        $scope.loadAdvisors = function (query) {
            return $http.get("/advisors?query=" + query);
        };

        // This function creates or removes Elements based on stat, element, and tar
        $scope.inlineElement = function (tar, stat, element) {
            $(".inlineElement").parent().html("");
            if (stat === 1) {
                let elementsCreated = "";
                if (element === "empathy") {
                    elementsCreated = $compile(`
          <form action="" class="row inlineElement">
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Verbal Expressions </span>
            <textarea
              class="wb-txt-inp"
              name=""
              id=""
              cols="30"
              rows="3"
              placeholder=" What The Client Says "
            ></textarea>
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Inner Thoughts </span>
            <textarea
              class="wb-txt-inp"
              name=""
              id=""
              cols="30"
              rows="3"
              placeholder="What the client thinks"
            ></textarea>
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Observable Actions </span>
            <textarea
              class="wb-txt-inp"
              name=""
              id=""
              cols="30"
              rows="3"
              placeholder="What the client does"
            ></textarea>
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Emotional Responses </span>
            <textarea
              class="wb-txt-inp"
              name=""
              id=""
              cols="30"
              rows="3"
              placeholder="What the client feels"
            ></textarea>
          </label>
     
 
            </form>
            `)($scope);
                } else if (element === "contact-setting") {
                    elementsCreated = $compile(`
          
          <form action="" class="row  inlineElement">
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> ID </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Name </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Phone </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Email </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Country </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
          <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Inquiry </span>
            <input type="text" class="wb-txt-inp" name="" id=""  />
          </label>
              <label for="" class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Source </span>
                <input type="text" class="wb-txt-inp" name="" id=""  />
              </label>
              <label for="" class="col-md-6 col-12 col-lg-3">
                <span class="sm-txt"> Last Activity </span>
                <input type="text" class="wb-txt-inp" name="" id=""  />
              </label>
            </form>
            `)($scope);
                } else if (element === "assign") {
                    elementsCreated = $compile(`
          <form action="" class="row  inlineElement">
          <label for="" class="col-12 col-sm-3">
            <span class="sm-txt"> Advisor </span>
            <!-- <select class="wb-ele" id=""><option value="option">Noor Hassan</option><option value="option">Option</option><option value="option">Option</option></select> -->
            <tags-input
            class="wb-txt-inp"
              ng-model="advisors"
              tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
            >
              <auto-complete
                source="loadAdvisors($query)"
              ></auto-complete>
            </tags-input>
          </label>
          <label for="" class="col-12 col-sm-3">
            <span class="sm-txt"> Priority </span>
            <select class="wb-ele" id="">
              <option value="option">
                <div class="priority">
                  <em class="high"></em> High
                </div>
              </option>
              <option value="option">
                <div class="priority">
                  <em class="low"></em> Low
                </div>
              </option>
              <option value="option">
                <div class="priority">
                  <em class="med"></em> Medium
                </div>
              </option>
            </select>
          </label>
          <div class="col-12 col-sm-1"></div>
          <div class="col-12 col-sm-5">
            <div
              class="flex-gap-10 justify-content-end align-items-center"
            >
              <label class="switch">
                <input id="snoose1" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <label for="snoose1"> Snoose </label>
            </div>
          </div>
   
            </form>
            `)($scope);
                } else if (element === "notes") {
                    elementsCreated = $compile(`
          <form action="" class="   inlineElement note">
          <div class='row'>
          <label for="" class=" col-md-3 col-12 ">
          <span class="sm-txt"> Name </span>
          <input
            class="wb-txt-inp"
            type='text'
            placeholder="Name"
          / >
        </label>
          <label for="" class=" col-md-3 col-12 ">
          <span class="sm-txt"> Type </span>
          <select class="wb-ele" id="">
          <option value="" disabled selected hidden>
            Please Select
          </option>
          <option value="option">Note</option>
          <option value="option">Profile</option>
        </select>
        </label>
          <label for="" class=" col-md-3 col-12 ">
          <span class="sm-txt"> Time </span>
          <input
            class="wb-txt-inp pt-1"
            type='time'
          / >
        </label>
          <label for="" class=" col-md-3 col-12 ">
          <span class="sm-txt"> Date </span>
          <input
            class="wb-txt-inp"
            type='date'
          / >
        </label>

          <label for="" class=" col-12 ">
          <span class="sm-txt"> Note </span>
          <textarea
            class="wb-txt-inp"
            name=""
            id=""
            cols="30"
            rows="3"
            placeholder="The Note"
          ></textarea>
        </label>
 
          </div>

            </form>
            `)($scope);
                } else if (element === "booking") {
                    elementsCreated = $compile(`

                 <form action="" class="row inlineElement">
          <label for="" class="col-md-6 col-12 col-lg-3">
          <span class="sm-txt"> Booking Date </span>
            <input type="date" class="wb-ele p-2 ps-3" id="" />
        </label>
        <label for="" class="col-md-6 col-12 col-lg-3">
        <span class="sm-txt"> Booking Date </span>
          <input type="time" class="wb-ele" id="" />
      </label>
 
            </form>
            `)($scope);
                } else if (element === "deal1") {
                    elementsCreated = $compile(`
            <form action="" class="row   inlineElement">

            <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Field Consultant </span>
            <select class="wb-ele" id="">
              <option  disabled selected hidden> Please Select </option>
              <option value="option">Option</option>
              <option value="option">Option</option>
              </select>
              </label>
              <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Booking Date </span>
            <input type="date" class="wb-ele" name="" id="" />
            </label>
            <label for="" class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> Booking Time </span>
            <input type="time" class="wb-ele" name="" id="" />
            </label>
            <div class='mt-2' >
         
            
            </div>
            </form>
            `)($scope);
                } else if (element === "region") {
                    elementsCreated = $compile(`
          <form action="" class="row inlineElement">
          <label  class="col-md-6 col-12 col-lg-3">
           <span class="sm-txt"> Region </span>
           <input type="text" class="wb-txt-inp" id="" placeholder="Enter" />
          </label>
          <label  class="col-md-6 col-12 col-lg-3">
           <span class="sm-txt"> Address </span>
           <input type="text" class="wb-txt-inp" id="" placeholder="Enter" />
          </label>
    
         </form>
            `)($scope);
                } else {
                    console.log("object");
                }
                $(tar).append(elementsCreated);
            } else {
                $(tar).html("");
            }
        };

        // View More / View Less Function
        $scope.toggleText = function (event) {
            event.preventDefault();
            let text = event.target.parentElement;
            if (text.classList.contains("show-text")) {
                text.classList.remove("show-text");
                text.classList.add("hide-text");
                event.target.innerHTML = "View More";
            } else {
                text.classList.remove("hide-text");
                text.classList.add("show-text");
                event.target.innerHTML = "View Less";
            }
        };

        // Check / Uncheck Client Checkboxes
        $scope.checkAll = function () {
            let checkboxes = document.getElementsByName("client-checkbox");
            let checkboxAll = checkboxes[0];
            if (checkboxAll.checked == true) {
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = true;
                });
            } else {
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            }
        };

        // Toggle Lead Preview Modal
        let overlay = $(".overlay");
        $(".previewToggle").on("click", function () {
            let leadPreviewModal = $(this)
                .parents()
                .eq(3)
                .find(".lead-preview");
            leadPreviewModal.toggleClass("active");
            overlay.toggleClass("active");

            // scroll to the top of the page
            $(window).scrollTop(0);
        });

        // Lead Preview Exit Button
        $(".lead-preview .btn-exit, .overlay").on("click", function () {
            $(".lead-preview").removeClass("active");
            $(".overlay").removeClass("active");
        });
    });


    function menuToggle() {
      const toggleMenu = document.querySelector(".menu");
      toggleMenu.classList.toggle("active");
    }