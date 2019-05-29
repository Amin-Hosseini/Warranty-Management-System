<?php
// Reg Product Info
if(isset($_POST['GunReg']) and $_POST['GunReg']=="Insert"){

	$cat_name = $_POST['cat_name'];	
	
	$cat_name = sanitize($cat_name);


	// Check Product Name
	$check = $conn->query("SELECT cat_name FROM category_profile WHERE cat_name = '$cat_name'");
	
	// Check Empty 
	if ( empty($cat_name) ){
		$type = "alert-danger";
		$msg = "لطفا موارد ستاره دار را تکمیل نمائید .";
		$faicon = "fa-asterisk";
	}
	
	// Check Product Name
	elseif ($check->rowCount() != 0 ) {
		$type = "alert-danger";
		$msg = "دسته بندیی با نام مشابه قبلا ثبت گردیده است .";
		$faicon = "fa-asterisk";
	}

	else {

		try {
			// set the PDO error mode to exception
			$SqlInsGun = "INSERT INTO category_profile ( cat_name  )
			VALUES ( '$cat_name' )";

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
                    <span><i class="fa fa-barcode"></i> ثبت اطلاعات دسته بندی</span>
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
                            <i class="fa fa-barcode"></i>ثبت اطلاعات دسته بندی</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات دسته بندی</h3>
                                <div class="row">


									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cat_name" class="control-label col-md-3">نام دسته بندی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="cat_name" id="cat_name" class="form-control" value="<?php if(isset($_POST['cat_name'])){ echo $_POST['cat_name']; } ?>" placeholder="نام دسته بندی"> 
                                                </div>
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