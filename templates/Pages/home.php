<div class="container mt-5">

<div class="container">
   <form method="post" novalidate="novalidate" ng-submit="doLogin(userdt);" id="login_form" class="login">
    <h1>Welcome to CRM</h1>
    <label>
     Email address*
     <?= $this->Form->control("email", [
                                "class" => "my-inp",
                                "type" => "email", 
                                "ng-model" => "userdt.email",
                                "placeholder" => __("John@gmail.com"), "label" => false,
                                "templates" => [ "inputContainer" => "{{content}}"]
                            ]) ?>
    </label>
    <label>
     Password*
     <?= $this->Form->control("password", [
                                "class" => "my-inp",
                                "type" => "password", "ng-model" => "userdt.password",
                                "placeholder" => __("Enter your password"), "label" => false,
                                "templates" => [ "inputContainer" => "{{content}}"]
                            ]) ?>
    </label>
    <div class="btn-container">
        <button class="btn btn-danger" id="login_btn">
                                <span><i class="icon-login"></i></span> <?= __('login') ?>
                            </button>
    </div>
    
   </form>
  </div>