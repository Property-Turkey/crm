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
    
    	<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addEditSale_mdl" 
        ng-click="
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
            <a href="#" 
                data-bs-toggle="modal" 
                data-bs-target="#viewSale_mdl" 
                ng-click="doGet('/admin/sales?id='+itm.id, 'rec', 'sale');" class="btn-link"> 
                {{ itm.client.client_name }} </a>
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
             <a href="#" class="btn-link"> {{ itm.source.category_name }}</a>
            </p>
           </div>
          </div>
          <div class="col-lg-1 col-12 status">
           <div class="col-4 title hideWeb">Status</div>
           <div class="col-6 p-0 col-lg-12">
            <span class="new">New{{ DtSetter('rec_stateSale', itm.sale_current_stage, itm.rec_state) }}</span>
           </div>
          </div>
          <div class="col-lg-2 col-12 notes">
           <div class="col-4 title hideWeb">Notes</div>
           <div class="col-6 p-0 col-lg-12">
           {{ itm.reports[0].report_text }}
           </div>
          </div>
          <div class="col-lg-1 col-12 budget">
           <div class="col-4 title hideWeb">Budget</div>
           <div class="col-6 p-0 col-lg-12">$ {{ itm.sale_budget }}</div>
          </div>
          <div class="col-lg-2 col-12">
           <div class="col-4 title hideWeb">Booking</div>
           <div class="col-6 p-0 col-lg-12">
            
            <div class="wb-ele">
             <i class="fa fa-calendar-o"></i>
             <div class="line-height-10">
              <span class="sm-txt">Next Call Date</span> {{ itm.books[0].stat_created.split(' ')[0] }}
             </div>
            </div>
            <div class="wb-ele">
             <i class="fas-clock"></i>
             <div class="line-height-10">
              <span class="sm-txt">Next Call Time</span> {{ itm.books[0].stat_created.split(' ')[1] }}
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
  
  <!-- CRM Page End -->
  <div class="overlay"></div>
  
</div>
<?php echo $this->element('Modals/viewSale')?>
<?php echo $this->element('Modals/search')?>
<?php echo $this->element('Modals/addEditSale')?>

