
<style>
    .mail-seccess {
    text-align: center;
	background: #fff;
}
.mail-seccess .success-inner {
	display: inline-block;
}
.mail-seccess .success-inner h1 {
	font-size: 100px;
	text-shadow: 3px 5px 2px #b930068a;
	color: #b93006;
	font-weight: 700;
}
.mail-seccess .success-inner h1 span {
	display: block;
	font-size: 25px;
	color: #333;
	font-weight: 600;
	text-shadow: none;
	margin-top: 20px;
}
.mail-seccess .success-inner p {
	padding: 20px 15px;
}
.mail-seccess .success-inner .btn{
	color:white;
    border: 1px solid #b93006;
    background-color: #b93006;
}
</style>

<div class="right_col" style="margin-top: 190px;" role="main" 
     ng-init="
        doGet('/admin/users?id=<?=$authUser['id']?>', 'rec', 'user');
    ">

<button type="button" id="user_btn" class="hideIt" ng-click="
    filesInfo.user_photos=[];
    doGet('/admin/users?id=<?=$authUser['id']?>', 'rec', 'user');
    "></button>
 
    <div class="">
        

        <section class="mail-seccess section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        
                        <div class="success-inner">
                            <h1><i class="fa fa-envelope"></i><span>Your Activation Has Been Successful!</span></h1>
                            <p>Aenean eget sollicitudin lorem, et pretium felis. Nullam euismod diam libero, sed dapibus leo laoreet ut. Suspendisse potenti. Phasellus urna lacus</p>
                            <a href="<?=$app_folder?>/admin/reports/index/{{itm.tar_id}}" class="btn btn-primary btn-lg">Dashboard</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
