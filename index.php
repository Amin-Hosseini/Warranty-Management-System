<?php

include ('./_inc/jdf.php');
require_once("./_inc/os_config.php");
require_once("./_inc/connect.php"); 

if ( isset($_POST['Check']) )
{

        $SqlSelRes = "SELECT * FROM warranty_gun WHERE war_cardnum = ? AND approved = 1" ;
		$SqlSelRes = $conn->prepare($SqlSelRes);
		$SqlSelRes->execute( array( $_POST['card'] ) );
		
		$SqlSelRes->setFetchMode(PDO::FETCH_ASSOC);
		$RowRes = $SqlSelRes->fetch();	
		
		if ( $SqlSelRes->rowCount() == 1 )
		{
			$today_g = $RowRes['war_sdate'];
			$dates = explode('-', $today_g);
			$today_j = gregorian_to_jalali($dates[0]+1 , $dates[1] ,$dates[2] ,'/');
			
		        	$type = "alert-success";
				$msg = "<b>".$RowRes['us_name']  . "</b> عزیز ، مشخصات کارت گارانتی به شرح زیر می باشد . <br />" .
				"اعتبار کارت گارانتی شما تا تاریخ <b>" . $today_j . "</b> می باشد .";
				$faicon = "fa-check-circle";
		}
		else
		{
				$type = "alert-danger";
				$msg = "شماره کارت گارانتی وارد شده صحیح نمی باشد !";
				$faicon = "fa-asterisk";
		}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>اعتبار سنجی  کارت گارانتی | فروشگاه کوهسار</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #1 for form layouts" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rounded-rtl.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-rtl.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout-rtl.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue-rtl.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom-rtl.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
	</head>
    <!-- END HEAD -->
<head>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/pages/css/login-rtl.css" rel="stylesheet" type="text/css" />  
    <!-- END PAGE LEVEL PLUGINS -->
</head>
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="http://rifle.ir/">.::. پرتال فروشگاه کوهسار .::.</a>
    </div>
    <!-- END LOGO -->
    				<?php
                if( isset($msg) and isset($type) ){
				?>
				<div class="col-md-2">
                </div>
                <div class="col-md-8">
                <div class="custom-alerts alert <?php echo $type; ?> fade in">
                    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle fa-lg"></i></button>
                    <i class="fa <?php echo $faicon; ?> fa-lg"></i>
                    <span><?php echo $msg; ?></span>
                </div>
                </div>
				<div class="col-md-2">
                </div>
                <?php
				}
                ?>
				    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" method="post">
            <h3 class="form-title font-green">پیگیری کارت گارانتی</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> لطفا ایمیل و کلمه عبور را وارد نمائید </span>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">شماره کارت گارانتی</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="شماره کارت گارانتی" name="card" id="card" value="" /> </div>
            <div class="form-actions">
                <button type="submit" name="Check" class="btn green">بررسی</button>

				<!--
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
				-->
            </div>
            <div class="login-options">
				<!--	
                <h4>پرتال ثبت و مدیریت گارانتی محصولات</h4>
                -->
            </div>
            <div class="create-account"  style="display:none">
                <p>
                    <a href="#" id="register-btn" class="uppercase">درخواست نمایندگی</a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> تمامی حقوق برای این سایت محفوظ می باشد . </div>
</body>        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->

        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> -->
<!--    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> -->
<!--    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> -->
<!--    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> -->
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
		<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--    <script src="assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<!--    <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script> -->
<!--    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script> -->
<!--    <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script> -->
        <!-- END THEME LAYOUT SCRIPTS -->


		
		

	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
	<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
	<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->




</html>