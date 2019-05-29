<?php
// Reg Product Info
if(isset($_POST['GunReg']) and $_POST['GunReg']=="Insert"){

	$gunname = $_POST['gunname'];	
	$caliber = $_POST['caliber'];		
	$gunmc = $_POST['gunmc'];	
	$gunnp = $_POST['gunnp'];				
	$wprice = $_POST['wprice'];		

	$gunname = sanitize($gunname);
	$caliber = sanitize($caliber);
	$gunmc = sanitize($gunmc);
	$gunnp = sanitize($gunnp);
	$wprice = sanitize($wprice);				

	// Check Product Name
	$check = $conn->query("SELECT gun_name FROM gun_profile WHERE gun_name = '$gunname'");
	
	// Check Empty 
	if ( empty($gunname) or empty($caliber) or empty($gunmc) or empty($gunnp)  or empty($wprice) ){
		$type = "alert-danger";
		$msg = "لطفا موارد ستاره دار را تکمیل نمائید .";
		$faicon = "fa-asterisk";
	}
	
	// Check Product Name
	elseif ($check->rowCount() != 0 ) {
		$type = "alert-danger";
		$msg = "محصولی با نام مشابه قبلا ثبت گردیده است .";
		$faicon = "fa-asterisk";
	}

	else {

		try {
			// set the PDO error mode to exception
			$SqlInsGun = "INSERT INTO gun_profile ( gun_name , gun_caliber , gun_mc , gun_power , gun_wprice )
			VALUES ( '$gunname' , '$caliber' , '$gunmc' , '$gunnp' , '$wprice' )";

			// use exec() because no results are returned
			$conn->exec($SqlInsGun);
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
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.php?Page=Main"><i class="fa fa-home fa-lg"></i> صفحه نخست</a>
                    <i class="fa fa-circle fa-lg"></i>
                </li>
                <li>
                    <span><i class="fa fa-barcode"></i> ثبت اطلاعات محصول</span>
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
                            <i class="fa fa-barcode"></i>ثبت اطلاعات محصول</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات سلاح</h3>
                                <div class="row">


									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">نام سلاح : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="gunname" id="gunname" class="form-control" value="<?php if(isset($_POST['gunname'])){ echo $_POST['gunname']; } ?>" placeholder="نام سلاح"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caliber" class="control-label col-md-3">کالیبر : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="caliber" id="caliber" class="form-control" value="<?php if(isset($_POST['caliber'])){ echo $_POST['caliber']; } ?>" placeholder="کالیبر"> 
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
                                            <label for="gunmc" class="control-label col-md-3">کشور سازنده : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="gunmc" id="gunmc" class="form-control" value="<?php if(isset($_POST['gunmc'])){ echo $_POST['gunmc']; } ?>" placeholder="کشور سازنده"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunnp" class="control-label col-md-3">انرژی ساچمه : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="gunnp" id="gunnp" class="form-control" value="<?php if(isset($_POST['gunnp'])){ echo $_POST['gunnp']; } ?>" placeholder="انرژی ساچمه"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                
                                <!--/row-->
                                <h3 class="form-section">اطلاعات گارانتی</h3>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wprice" class="control-label col-md-3">هزینه گارانتی :  <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-dollar"></i>
                                                    <input type="text" name="wprice" id="wprice" class="form-control" value="<?php if(isset($_POST['wprice'])){ echo $_POST['wprice']; } ?>" placeholder="هزینه گارانتی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wprice" class="control-label col-md-3">ریال</i></label>
                                        </div>
                                    </div>                                    
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
                            
                                                <input type="hidden" name="GunReg" value="Insert" />
                                                
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