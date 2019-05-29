<?php
// Edit reseller
if(isset($_POST['ResEdit']) and $_POST['ResEdit']=="Edit"){

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
	
	$resl = $conn->prepare("SELECT rs_pass FROM reseller_profile WHERE rs_id = ?");
	$resl->execute( array( $_GET['id'] ) );
	$Row = $resl->fetch();
	
	if ( $resl->rowCount( ) != 0 )
	{
		$resUp = $conn->prepare("UPDATE reseller_profile SET rs_lname = ? , rs_fname = ? , rs_mobile = ? , rs_shop = ? , rs_phone = ? , rs_state = ? , rs_city = ? , rs_add = ? , rs_email = ? , rs_pass = ? WHERE rs_id = ?");
		$resUp->execute( array( $lname, $fname, $mobile, $shop, $phone,$state,$city,$add,$email , ( empty( $_POST['pass'] ) ? $Row['rs_pass'] : sha1( $_POST['pass'] ) ), $_GET['id'] ) );
		
		$type = "alert-success";
		$msg = "با موفقیت ویرایش گردید !";
		$faicon = "fa-check-circle";
	}
}

//Get this reseller info
$resl = $conn->prepare("SELECT * FROM reseller_profile WHERE rs_id = ?");
$resl->execute( array( $_GET['id'] ) );

if ( $resl->rowCount( ) == 0 )
	header( "Location: ./index.php?Page=Reseller-Rep" );
else
	$Row = $resl->fetch();
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
                    <span><i class="fa fa-user"></i> ویرایش اطلاعات نماینده</span>
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
					$msg = "جهت ویرایش اطلاعات لطفا موارد درخواستی را تکمیل و بر روی ویرایش اطلاعات کلیک نمائید .";
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
                            <i class="fa fa-user-plus"></i>ویرایش اطلاعات نماینده</div>
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
                                                    <input type="text" name="lname" id="lname" class="form-control" value="<?php if(isset($Row['rs_lname'])){ echo $Row['rs_lname']; } ?>" placeholder="نام خانوادگی"> 
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
                                                    <input type="text" name="fname" id="fname" class="form-control" value="<?php if(isset($Row['rs_fname'])){ echo $Row['rs_fname']; } ?>" placeholder="نام"> 
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
                                                    <input type="text" name="mobile" id="mobile" class="form-control" value="<?php if(isset($Row['rs_mobile'])){ echo $Row['rs_mobile']; } ?>" placeholder="تلفن همراه"> 
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
                                                    <input type="text" name="shop" id="shop" class="form-control" value="<?php if(isset($Row['rs_shop'])){ echo $Row['rs_shop']; } ?>" placeholder="نام فروشگاه"> 
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
                                                    <input type="text" name="phone" id="phone" class="form-control" value="<?php if(isset($Row['rs_phone'])){ echo $Row['rs_phone']; } ?>" placeholder="تلفن"> 
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
                                                    <input type="text" name="state" id="state" class="form-control" value="<?php if(isset($Row['rs_state'])){ echo $Row['rs_state']; } ?>" placeholder="استان"> 
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
                                                    <input type="text" name="city" id="city" class="form-control" value="<?php if(isset($Row['rs_city'])){ echo $Row['rs_city']; } ?>" placeholder="شهر"> 
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
                                                    <input type="text" name="add" id="add" class="form-control" value="<?php if(isset($Row['rs_add'])){ echo $Row['rs_add']; } ?>" placeholder="آدرس"> 
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
                                                    <input type="text" name="email" id="email" class="form-control" value="<?php if(isset($Row['rs_email'])){ echo $Row['rs_email']; } ?>" placeholder="ایمیل"> 
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
                                                    <input type="text" name="pass" id="pass" class="form-control" value="" placeholder="کلمه عبور"> 
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
                                                    <i class="fa fa-save"></i> ویرایش اطلاعات</span>
                                                </button>
    
                                                <button type="reset" class="btn btn-default">
                                                    <i class="fa fa-refresh"></i> بازنویسی</span>
                                                </button>    
                            
                                                <input type="hidden" name="ResEdit" value="Edit" />
													
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