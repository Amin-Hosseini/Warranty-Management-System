<?php
ini_set( 'display_errors', 0 );
if ( !isset($_SESSION) ) { session_start(); }
ob_start();
include ('../_inc/jdf.php');
require_once("../_inc/os_config.php");
require_once("../_inc/connect.php"); 
?>
<?php
if(isset($_GET['Page']))
	{
	$Page = $_GET['Page'];
	switch($Page){

		case "Main";
			$TitleIndex = "صفحه نخست";
			$URL = "Main.php";
			break;

		case "War-Gun-Reg";
			$TitleIndex = "ثبت گارانتی محصول";
			$URL = "War-Gun-Reg.php";
			break;

		case "War-Gun-Rep-UnApp";
			$TitleIndex = "گارانتی های پرداخت نشده";
			$URL = "War-Gun-Rep-UnApp.php";
			break;

			case "War-Gun-Rep-App";
			$TitleIndex = "گارانتی های پرداخت شده";
			$URL = "War-Gun-Rep-App.php";
			break;			

		case "Gun-Rep";
			$TitleIndex = "ویرایش اطلاعات محصول";
			$URL = "Gun-Rep.php";
			break;
			
		case "War-Gun-Status";
			$TitleIndex = "ویرایش اطلاعات محصول";
			$URL = "War-Gun-Status.php";
			break;
			
		case "Money-Reports";
			$TitleIndex = "گزارشات مالی";
			$URL = "Money-Reports.php";
			break;

		case "War-Payment";
			$TitleIndex = "پرداخت";
			$URL = "War-Payment.php";
			break;			

		case "Callback";
			$TitleIndex = "وضعیت پرداخت";
			$URL = "Callback.php";
			break;				
		
		case "Logout";
			unset($_SESSION['ResID']);
			$_SESSION['ResStatus'] = "Logout";
			session_destroy();
			header('Location: index.php?Page=Main');
			break;
	}
} else {
	$URL = "Main.php";
	$TitleIndex = "صفحه نخست";
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
    <meta charset="utf-8">
    <title><?php echo $TitleIndex." | ".$Title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin RTL Theme #1 for form layouts" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components-rounded-rtl.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins-rtl.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout/css/layout-rtl.css" rel="stylesheet" type="text/css" />
    <link href="../assets/layouts/layout/css/themes/darkblue-rtl.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../assets/layouts/layout/css/custom-rtl.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="favicon.ico" />
<?php
if( isset($_GET['Page']) )
	{
	if ( $_GET['Page']== 'War-Gun-Reg' or $_GET['Page']== 'War-Gun-Rep' )
		{
?>
<link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<?php
		}
} 
?>
</head>
<!-- END HEAD -->
<?php
if( !isset($_SESSION['ResID']) ){
	require_once("_pages/Login.php");
} else {
?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a class="logo-default" href="index.php?Page=Main">فروشگاه کوهسار</a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- END TODO DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php //<img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" /> ?>
                                <span class="username username-hide-on-mobile"> <?php echo $_SESSION['Res_FirstName'] . " " . $_SESSION['Res_LastName'] ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="./index.php?Page=Logout">
                                            <i class="icon-key"></i> خروج از سامانه </a>
                                    </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <!-- END SIDEBAR TOGGLER BUTTON -->

                        <li class="nav-item <?php if( isset($_GET['Page'])) { if ( strstr($_GET['Page'], 'War-Gun-' )) { ?>start active open<?php } } ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">گارانتی</span>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if( isset($_GET['Page']) and $_GET['Page']== 'War-Gun-Reg' ) { ?>active<?php } ?> ">
                                    <a href="index.php?Page=War-Gun-Reg" class="nav-link">
                                        <span class="title">درخواست گارانتی محصول</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if( isset($_GET['Page']) and $_GET['Page']== 'War-Gun-Rep-UnApp' ) { ?>active<?php } ?> ">
                                    <a href="index.php?Page=War-Gun-Rep-UnApp" class="nav-link ">
                                        <span class="title">گارانتی های پرداخت نشده</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if( isset($_GET['Page']) and $_GET['Page']== 'War-Gun-Rep-App' ) { ?>active<?php } ?>  ">
                                    <a href="index.php?Page=War-Gun-Rep-App" class="nav-link ">
                                        <span class="title">گارانتی های پرداخت شده</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

						<li class="nav-item <?php if( isset($_GET['Page'])) { if ( strstr( $_GET['Page'], '-Reports' ) ) { ?>start active open<?php } } ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-money"></i>
                                <span class="title">گزارشات</span>
                                <span class="selected"></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php if( isset($_GET['Page']) and $_GET['Page']== 'Money-Reports' ) { ?>active<?php } ?> ">
                                    <a href="index.php?Page=Money-Reports" class="nav-link">
                                        <span class="title">مشاهده گزارشات مالی</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
					</ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <?php
            require_once("_pages/".$URL);
            ?>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> تست فونت
                <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>

</body>

<?php
}
?>

    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--    <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> -->
<!--    <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> -->
<!--    <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> -->
<!--    <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> -->
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--    <script src="../assets/pages/scripts/form-samples.min.js" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<!--    <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script> -->
<!--    <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script> -->
<!--    <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script> -->
    <!-- END THEME LAYOUT SCRIPTS -->

<?php
/*if( isset($_GET['Page']) )
	{
	if ( $_GET['Page']== 'War-Gun-Reg' or $_GET['Page']== 'War-Gun-Rep' )
		{*/
?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<?php
		/*}
} */
?>
</html>