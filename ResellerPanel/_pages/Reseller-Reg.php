<?php
// Reg Product Info
if(isset($_POST['ResReg']) and $_POST['ResReg']=="Insert"){

	$lname = $_POST['lname'];	
	$fname = $_POST['fname'];		
	$mobile = $_POST['mobile'];	
	$shop = $_POST['shop'];				
	$phone = $_POST['phone'];		
	$state = $_POST['state'];			
	$city = $_POST['city'];		
	$add = $_POST['add'];
	
	$email = $_POST['email'];
	$pass = sha1($_POST['pass']);	
	
	$lname = sanitize($lname);
	$fname = sanitize($fname);
	$mobile = sanitize($mobile);
	$shop = sanitize($shop);
	$phone = sanitize($phone);
	$state = sanitize($state);
	$city = sanitize($city);
	$add = sanitize($add);
	$email = sanitize($email);	
	

	// Check Product Name
//	$check = $conn->query("SELECT gun_name FROM gun_profile WHERE gun_name = '$gunname'");
	
	// Check Empty 
	if ( empty($lname) or empty($shop) ){
		$type = "alert-danger";
		$msg = "لطفا موارد ستاره دار را تکمیل نمائید .";
		$faicon = "fa-asterisk";
	}
	
	// Check Product Name
//	elseif ($check->rowCount() != 0 ) {
//		$type = "alert-danger";
//		$msg = "محصولی با نام مشابه قبلا ثبت گردیده است .";
//		$faicon = "fa-asterisk";
//	}

	else {

		try {
			// set the PDO error mode to exception
			$sql = "INSERT INTO reseller_profile ( rs_lname ,rs_fname , rs_mobile , rs_shop , rs_phone , rs_state , rs_city , rs_add , rs_email , rs_pass )
			VALUES ( '$lname' , '$fname' , '$mobile' , '$shop' , '$phone' , '$state' , '$city' , '$add' , '$email' , '$pass' )";

			// use exec() because no results are returned
			$conn->exec($sql);
			// echo "New record created successfully";
			}
		catch(PDOException $e)
			{
			// echo $sql . "<br>" . $e->getMessage();
				$type = "alert-danger";
				$msg = "اشکال در ثبت اطلاعات .";
				$faicon = "fa-asterisk";
			}

			if($conn){
				$_POST = NULL;
				$type = "alert-success";
				$msg = "ثبت اطلاعات با موفقیت انجام گردید .";
				$faicon = "fa-check-circle";		
			} else {
				$type = "alert-danger";
				$msg = "اشکال در ثبت اطلاعات .";
				$faicon = "fa-asterisk";
			}

		$conn = null;
	
	}
}
?>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php?Page=Main"><i class="fa fa-home fa-lg"></i> صفحه نخست</a>
                    <i class="fa fa-circle fa-lg"></i>
                </li>
                <li>
                    <span><i class="fa fa-user"></i> ثبت اطلاعات نماینده</span>
                </li>
            </ul>
            
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">

				<?php
                if( !isset($msg) and !isset($type) ){
					$type = "alert-info";
					$faicon = "fa-info-circle";
					$msg = "جهت ثبت اطلاعات لطفا موارد درخواستی را تکمیل و بر روی ثبت کلیلک نمائید .";
				}
                ?>
                <div class="custom-alerts alert <?php echo $type; ?> fade in">
                    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle fa-lg"></i></button>
                    <i class="fa <?php echo $faicon; ?> fa-lg"></i>
                    <span><?php echo $msg; ?></span>
                </div>
			
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user-plus"></i>ثبت اطلاعات نماینده</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات فردی</h3>
                                <div class="row">


									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname" class="control-label col-md-3">نام خانوادگی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" name="lname" id="lname" class="form-control" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname']; } ?>" placeholder="نام خانوادگی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname" class="control-label col-md-3">نام :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" name="fname" id="fname" class="form-control" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname']; } ?>" placeholder="نام"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile" class="control-label col-md-3">تلفن همراه :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-phone"></i>
                                                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php if(isset($_POST['mobile'])){ echo $_POST['mobile']; } ?>" placeholder="تلفن همراه"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <h3 class="form-section">اطلاعات فروشگاه</h3>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shop" class="control-label col-md-3">نام فروشگاه :  <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-building"></i>
                                                    <input type="text" name="shop" id="shop" class="form-control" value="<?php if(isset($_POST['shop'])){ echo $_POST['shop']; } ?>" placeholder="نام فروشگاه"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="control-label col-md-3">تلفن :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-phone"></i>
                                                    <input type="text" name="phone" id="phone" class="form-control" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } ?>" placeholder="تلفن"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" class="control-label col-md-3">استان :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" name="state" id="state" class="form-control" value="<?php if(isset($_POST['state'])){ echo $_POST['state']; } ?>" placeholder="استان"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city" class="control-label col-md-3">شهر :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" name="city" id="city" class="form-control" value="<?php if(isset($_POST['city'])){ echo $_POST['city']; } ?>" placeholder="شهر"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="add" class="control-label col-md-3">آدرس :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" name="add" id="add" class="form-control" value="<?php if(isset($_POST['add'])){ echo $_POST['add']; } ?>" placeholder="آدرس"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                
                                
                                <!--/row-->
                                <h3 class="form-section">اطلاعات کاربری</h3>
                                <!--/row-->
								<div class="row">
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label col-md-3">ایمیل : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-envelope"></i>
                                                    <input type="text" name="email" id="email" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" placeholder="ایمیل"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pass" class="control-label col-md-3">کلمه عبور : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-lock"></i>
                                                    <input type="text" name="pass" id="pass" class="form-control" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass']; } ?>" placeholder="کلمه عبور"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <!--/span-->
                                </div>                                

                                
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i> ثبت اطلاعات</span>
                                                </button>
    
                                                <button type="reset" class="btn btn-default">
                                                    <i class="fa fa-refresh"></i> بازنویسی</span>
                                                </button>    
                            
                                                <input type="hidden" name="ResReg" value="Insert" />
													
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>