<?php
// Edit Product
if(isset($_POST['GunEdit']) and $_POST['GunEdit']=="Edit"){
    $cat_id = $_POST['cat_id'];
	$gunname = $_POST['gunname'];
	$attr = $_POST['attr'];
	$wprice = $_POST['wprice'];

	$prd = $conn->prepare("SELECT * FROM gun_profile WHERE gun_id = ?");
	$prd->execute( array( $_GET['id'] ) );

	if ( $prd->rowCount( ) != 0 )
	{
		$prd = $conn->prepare("UPDATE gun_profile SET gun_name = ? , attr = ? , cat_id = ? , gun_wprice = ? WHERE gun_id = ?");
		$prd->execute( array( $gunname, $attr, $cat_id, $wprice, $_GET['id'] ) );
		
		$type = "alert-success";
		$msg = "محصول موردنظر با موفقیت ویرایش گردید !";
		$faicon = "fa-check-circle";
	}
}

//Get this product info
$prd = $conn->prepare("SELECT * FROM gun_profile WHERE gun_id = ?");
$prd->execute( array( $_GET['id'] ) );

if ( $prd->rowCount( ) == 0 )
	header( "Location: ./index.php?Page=Gun-Rep" );
else
	$Row = $prd->fetch();
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
                    <span><i class="fa fa-barcode"></i> ویرایش اطلاعات محصول</span>
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
								<?php
					// Define and perform the SQL SELECT query
	$SqlSelGun = "SELECT * FROM category_profile";
	$ResSelGun = $conn->query($SqlSelGun);

	$ResSelGun->setFetchMode(PDO::FETCH_ASSOC);
	?>
	
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-barcode"></i>ویرایش اطلاعات محصول</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات محصول</h3>
                                <div class="row">

									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-4">انتخاب دسته بندی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <select name="cat_id" class="form-control">
                                            <?php
                                                while( $Row1 = $ResSelGun->fetch() )
												{
                                            ?>
                                                        <option value="<?php echo $Row1['cat_id'] ?>" <?php echo $Row['cat_id'] == $Row1['cat_id'] ? 'selected' : '' ?>><?php echo $Row1['cat_name'] ?></option>
                                                <?php
												}
												?>
                                                    </select>
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
                                            <label for="gunname" class="control-label col-md-4">نام محصول : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="gunname" id="gunname" class="form-control" value="<?php if(isset($Row['gun_name'])){ echo $Row['gun_name']; } ?>" placeholder="نام محصول"> 
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
                                            <label for="attr" class="control-label col-md-4">ویژگی های محصول :<i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    
                                                    <textarea type="text" name="attr" id="attr" class="form-control"><?php if(isset($Row['attr'])){ echo $Row['attr']; } ?></textarea>
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
                                                    <input type="text" name="wprice" id="wprice" class="form-control" value="<?php if(isset($Row['gun_wprice'])){ echo $Row['gun_wprice']; } ?>" placeholder="هزینه گارانتی"> 
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
                                                    <i class="fa fa-save"></i> ویرایش اطلاعات</span>
                                                </button>
    
                                                <button type="reset" class="btn btn-default">
                                                    <i class="fa fa-refresh"></i> بازنویسی</span>
                                                </button>    
                            
                                                <input type="hidden" name="GunEdit" value="Edit" />
                                                
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