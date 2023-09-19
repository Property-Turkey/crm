 <!-- Header Start -->
 <nav class="navbar navbar-expand-lg">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">
     <img src="\crm\webroot\img\pt-header-logo.svg" alt="logo of website" />
    </a>
    <button name="menu-toggle" ng-click="toggleSidebar()" class="menu hideWeb">
     <img src="\crm\webroot\img\burger-menu.svg" alt="menu toggle" />
    </button>

    <div class="sidebar">
     <div class="btn-exit">
      <button ng-click="toggleSidebar()"><i class="fas-left"></i> Back</button>
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
       <img src="\crm\webroot\img\user.png" alt="" />
      </a>
     </div>
     <ul class="side-list">
      <li class="item">
       <a class="nav-link" aria-current="page" href="#">Dashboard</a>
      </li>
      <li class="item">
       <a class="nav-link active" href="#">Clients</a>
      </li>
      <li class="item">
       <a class="nav-link" href="#">Field</a>
      </li>
     </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      <a href="#" class="profile">
       <img src="\crm\webroot\img\user.png" alt="" />
      </a>
     </div>
    </div>
   </div>
  </nav>
 <!-- Header Ends -->