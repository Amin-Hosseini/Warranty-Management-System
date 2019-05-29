<?php
// Login
if(isset($_POST['LoginBtn']) and $_POST['LoginBtn']=="Insert"){
	$email = $_POST['email'];
	$pass = sha1($_POST['pass']);	
	$email = sanitize($email);	
	// Check Empty 
	if ( empty($email) or empty($pass) ){
		$type = "alert-danger";
		$msg = "لطفا موارد درخواستی را تکمیل نمائید .";
		$faicon = "fa-asterisk";
	} else {
		$SqlSelRes = "SELECT * FROM admin_profile WHERE email = ?" ;
		$SqlSelRes = $conn->prepare($SqlSelRes);
		$SqlSelRes->execute( array( $email ) );
		
		$SqlSelRes->setFetchMode(PDO::FETCH_ASSOC);
		$RowRes = $SqlSelRes->fetch();	

		// Check Email Res
		if ( $SqlSelRes->rowCount() == 1 ) {
			if ( $pass == $RowRes['password'] )
			{
				if ( !isset($_SESSION) ) { session_start(); }
				$_SESSION['AdminID'] = $RowRes['id'];
				$_SESSION['Admin_FirstName'] = $RowRes['fname'];
				$_SESSION['Admin_LastName'] = $RowRes['lname'];
				$_SESSION['AdminStatus'] = "Login";
				header('Location: ./index.php?Page=Main');
				exit();
				$type = "alert-success";
				$msg = "شما با موفقیت وارد شدید . لطفا کمی صبر نمائید .";
				$faicon = "fa-check-circle";		
			}
			else
			{
				$type = "alert-danger";
				$msg = "اطلاعات وارد شده صحیح نیست .";
				$faicon = "fa-asterisk";
			}
		}
		else
		{
			$type = "alert-danger";
			$msg = "اطلاعات وارد شده صحیح نیست .";
			$faicon = "fa-asterisk";
		}
		$conn = null;
	}
}
?>
<head>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/pages/css/login-rtl.css" rel="stylesheet" type="text/css" />  
    <!-- END PAGE LEVEL PLUGINS -->
</head>
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.php?Page=Main"><?php echo $Title ?></a>
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
            <h3 class="form-title font-green">ورود به پنل مدیریت</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> لطفا ایمیل و کلمه عبور را وارد نمائید </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">ایمیل</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="ایمیل" name="email" id="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">کلمه عبور</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="کلمه عبور" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass']; } ?>" /> </div>
            <div class="form-actions">
                <button type="submit" class="btn green">ورود</button>

				<input type="hidden" name="LoginBtn" value="Insert" />                
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
</body>