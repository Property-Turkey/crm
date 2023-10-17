 <!-- Header Start -->
 <nav class="navbar navbar-expand-lg">
   <div class="container-fluid m-2">
    <a class="navbar-brand" href="#">
     <img src="\img\pt-header-logo.svg" alt="logo of website" />
    </a>
    <button name="menu-toggle" ng-click="toggleSidebar()" class="menu">
     <img src="\img\burger-menu.svg" alt="menu toggle" />
    </button>

    <div class="sidebar">
     <div class="btn-exit">
      <button ng-click="toggleSidebar()">Back<i class="fas-right"></i> </button>
     </div>
     <div class="nav-btns justify-content-center">
      <a href="#" class="search">
       <i class="fas-search"></i>
      </a>
      <a href="#" class="settings">
       <i class="fas-cog"></i>
      </a>
      <a href="#" class="notifications">
       <i class="fas-bell-alt"></i>
      </a>
      <a href="#" class="profile">
      <img src="\img\user.png" alt="" />
      </a>
     </div>
     <ul class="side-list">
      <li class="item pt-3">
       <a class="nav-link" aria-current="page" href="#">Dashboard</a>
      </li>
      <li class="item pt-3">
       <a class="nav-link active" href="#">Sales</a>
      </li>
      
     </ul>
    </div>
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto">
      <li class="nav-item">
       <a class="nav-link" aria-current="page" href="#">Dashboard</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Clients</a>
      </li>
      <li class="nav-item">
       <a class="nav-link active" href="#">Sales</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Books</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Reports</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">UserSale</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Users</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Permmisions</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Logs</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Categories</a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="#">Configs</a>
      </li>

     </ul>
     <div class="nav-btns">
      <a href="#" class="search">
       <i class="fas-search"></i>
      </a>
      <a href="#" class="settings">
       <i class="fas-cog"></i>
      </a>
      <a href="#" class="notifications">
       <i class="fas-bell-alt"></i>
      </a>
      <a href="#" class="profile" >
       <img src="\crm\webroot\img\user.png" alt="" />
      </a>
     </div> 
    </div>-->
   </div>
  </nav>
 <!-- Header Ends -->