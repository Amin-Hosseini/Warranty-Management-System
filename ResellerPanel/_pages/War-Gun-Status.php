<?php
if( !isset($msg) and !isset($type) ){
	$type = "alert-info";
	$faicon = "fa-info-circle";
	$msg = "جهت ثبت اطلاعات لطفا موارد درخواستی را تکمیل و بر روی ثبت کلیلک نمائید .";
}
?>

<?php
if( isset($_REQUEST['WarCardNum'])){
$wcardn = $_REQUEST['WarCardNum'];
}

$SqlSelWar = "SELECT * FROM warranty_gun WHERE war_cardnum = '$wcardn'" ;
$SqlSelWar = $conn->query($SqlSelWar);

$SqlSelWar->setFetchMode(PDO::FETCH_ASSOC);
$RowWar = $SqlSelWar->fetch();	

// Check War Cad Number Res
if ( $SqlSelWar->rowCount() == 0 ) {
	$type = "alert-danger";
	$msg = "شماره کارت گارانتی صحیح نمی باشد .";
	$faicon = "fa-asterisk";
	header( "Location: " . $_SERVER['HTTP_REFFER'] );
	exit();
} else {
	$type = "alert-info";
	$faicon = "fa-info-circle";
	$msg = "در صورت تائید اطلاعات گارانتی محصول لطفا نسبت به پرداخت هزینه اقدام نمائید .";

	$gunid = $RowWar['war_gun_id'];
	$SqlSelGun = "SELECT * FROM gun_profile WHERE gun_id = '$gunid'" ;
	$SqlSelGun = $conn->query($SqlSelGun);
	
	$SqlSelGun->setFetchMode(PDO::FETCH_ASSOC);
	$RowGun = $SqlSelGun->fetch();	
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
                    <span><i class="fa fa-barcode"></i> اطلاعات گارانتی محصول</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">

                <div class="custom-alerts alert <?php echo $type; ?> fade in">
                    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle fa-lg"></i></button>
                    <i class="fa <?php echo $faicon; ?> fa-lg"></i>
                    <span><?php echo $msg; ?></span>
                </div>
				
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-barcode"></i>اطلاعات گارانتی محصول</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
<!--                    <form class="form-horizontal" action="_pages/War-Payment.php" method="post">     -->
                        <form class="form-horizontal" action="index.php?Page=War-Payment" method="post">                        
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات محصول</h3>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">نام محصول :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo $RowGun['gun_name']; ?></label>                                            
                                        </div>
                                    </div>  
                                    <!--/span-->
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">سریال محصول :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo $RowWar['war_gun_sn']; ?></label>                                            
                                        </div>
                                    </div> 								                                                                      
                                    <!--/span-->
                                </div>
                                <h3 class="form-section">اطلاعات گارانتی</h3>
                                <!--/row-->
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">شماره کارت گارانتی :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo str_repeat("X", strlen($RowWar['war_cardnum'])); ?></label>                                            
                                            <label for="gunname" class="control-label col-md-9">( شماره کارت گارانتی بعد از پرداخت صادر خواهد شد . )</label>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">نام مشتری :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo $RowWar['us_name']; ?></label>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
								<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">تاریخ شروع گارانتی :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo $RowWar['war_sdate']; ?></label>                                            
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">هزینه گارانتی :</label>
                                            <label for="gunname" class="control-label col-md-9"><?php echo $RowWar['gun_wprice']; ?> ریال</label>                                            
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

                                                <input type="hidden" name="Price" value="<?php echo $RowWar['gun_wprice']; ?>" />
                                                <input type="hidden" name="OrderId" value="<?php echo $RowWar['war_cardnum']; ?>" />                                                

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-credit-card"></i> پرداخت آنلاین</span>
                                                </button>
                                                
                                                <!--button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i> ثبت فیش بانکی</span>
                                                </button-->                                                
    
                                                <a type="reset" class="btn btn-default" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">
                                                    <i class="fa fa-refresh"></i> انصراف</span>
                                                </a>    
                                                
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