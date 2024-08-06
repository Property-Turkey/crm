

<div class="right_col  p-lg-5 m-lg-5 p-3" role="main" 
     ng-init="
        doGet('/admin/users?id=<?=$authUser['id']?>', 'rec', 'user');
    ">

<button type="button" id="user_btn" class="hideIt" ng-click="
    filesInfo.user_photos=[];
    doGet('/admin/users?id=<?=$authUser['id']?>', 'rec', 'user');
    "></button>
 
    <h2 class="client-num">Edit User</h2>

    <form class="row  inlineElement"  id="user_form" ng-submit="
        doSave(rec.user, 'user', 'users', '#user_btn', '#user_preloader');">

        <label class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> <?= __('user') ?> </span>
            <?= $this->Form->text('user', [
                'class' => 'wb-txt-inp',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.user.user_fullname',
                'placeholder' => __('user_fullname'),
            ]) ?>
        </label>

        <label class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> <?= __('email') ?> </span>
            <?= $this->Form->text('email ', [
                'class' => 'wb-txt-inp',
                'label' => false,
                'type' => 'email',
                'ng-model' => 'rec.user.email',
                'placeholder' => __('email'),
            ]) ?>
        </label>
        
        <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
            <span class="sm-txt"> <?= __('password') ?> </span>

            <!-- Add a button with a cross icon to toggle the input state -->
            <div ng-click="togglePasswordInput()"  style="display: flex;justify-content: center;">
                <span ng-show="isPasswordInputDisabled" style="cursor: pointer; position: absolute; top: 60%; z-index: 1; transform: translateY(-50%);"class="fa fa-key"> Change Password&nbsp;&nbsp;</span>
            </div>
            <div ng-click="deletePasswordInput()"  >
                <span ng-show="!isPasswordInputDisabled" style="cursor: pointer; position: absolute; top: 60%;right: 20px; z-index: 1; transform: translateY(-50%);"class="fa fa-times"></span>
            </div>

            <!-- Use ng-disabled to conditionally disable the input -->
            <?= $this->Form->text('password ', [
                'class' => 'wb-txt-inp',
                'label' => false,
                'type' => 'password',
                'ng-model' => 'rec.user.password',
                'ng-disabled' => 'isPasswordInputDisabled',
                'ng-style' => "{'background-color': isPasswordInputDisabled ? '#eeeeee' : 'initial'}",
            ]) ?>

        </label>

        <label class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> <?= __('mobile') ?> </span>
            <?= $this->Form->text('mobile', [
                'class' => 'wb-txt-inp',
                'label' => false,
                'type' => 'tel',
                'ng-model' => 'rec.user.user_configs.mobile',
                'placeholder' => __('mobile'),
            ]) ?>
        </label>

        <label class="col-md-6 col-12 col-lg-3">
            <span class="sm-txt"> <?= __('adrs') ?> </span>
            <?= $this->Form->text('adrs', [
                'class' => 'wb-txt-inp',
                'label' => false,
                'type' => 'tel',
                'ng-model' => 'rec.user.user_configs.address',
                'placeholder' => __('adrs'),
            ]) ?>
        </label>

        <div class="down-btns mt-4 d-flex justify-content-end">
            <div class="flex-gap-10 ">
            <button class="btn btn-gray" type="submit" ng-click="rec.user.activate = 1;"><?=__('send_activation')?></button>
                <button type="submit" class="btn btn-danger" id="user_preloader"> <?= __('save_changes') ?> 
                </button>

            </div>
        </div>


    </form>
</div>
