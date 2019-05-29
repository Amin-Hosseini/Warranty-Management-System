<?php
// Edit Product
if(isset($_POST['GunEdit']) and $_POST['GunEdit']=="Edit"){

	$catname = $_POST['catname'];

	$prd = $conn->prepare("SELECT * FROM category_profile WHERE cat_id = ?");
	$prd->execute( array( $_GET['id'] ) );

	if ( $prd->rowCount( ) != 0 )
	{
		$prd = $conn->prepare("UPDATE category_profile SET cat_name= ? WHERE cat_id = ?");
		$prd->execute( array( $catname, $_GET['id'] ) );
		
		$type = "alert-success";
		$msg = "دسته بندی موردنظر با موفقیت ویرایش گردید !";
		$faicon = "fa-check-circle";
	}
}

//Get this product info
$prd = $conn->prepare("SELECT * FROM category_profile WHERE cat_id = ?");
$prd->execute( array( $_GET['id'] ) );

if ( $prd->rowCount( ) == 0 )
	header( "Location: ./index.php?Page=Gun-Rep-Cat" );
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
                    <span><i class="fa fa-barcode"></i> ویرایش اطلاعات دسته بندی</span>
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
                            <i class="fa fa-barcode"></i>ویرایش اطلاعات دسته بندی</div>
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
                                            <label for="catname" class="control-label col-md-3">نام دسته بندی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="catname" id="catname" class="form-control" value="<?php if(isset($Row['cat_name'])){ echo $Row['cat_name']; } ?>" placeholder="نام دسته بندی"> 
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