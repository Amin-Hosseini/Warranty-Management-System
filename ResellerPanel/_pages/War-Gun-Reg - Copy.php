<?php
// Reg Product Info
if(isset($_POST['WarGunReg']) and $_POST['WarGunReg']=="Insert"){

	$resid = $_SESSION['ResID'];	
	
	$gunid = $_POST['gunid'];	
	$wcardn = $_POST['wcardn'];		
	$gunsn = $_POST['gunsn'];	
	$wsdate = $_POST['wsdate'];				

	$uname = $_POST['uname'];		
	$umob = $_POST['umob'];			
	$umcode = $_POST['umcode'];			
	$ubdate = $_POST['ubdate'];			
	$ucity = $_POST['ucity'];				

	// Check Empty 
	if ( empty($wcardn) or empty($gunsn) or empty($wsdate) or empty($uname) or empty($umob) or empty($umcode) or empty($ubdate) or empty($ucity) ){
		$type = "alert-danger";
		$msg = "لطفا موارد ستاره دار را تکمیل نمائید .";
		$faicon = "fa-asterisk";
	}
	else {
		// Check Product Name
		$checkwcnum = $conn->query("SELECT war_cardnum FROM warranty_gun WHERE war_cardnum = '$wcardn'");
	
		if ($checkwcnum->rowCount() != 0 ) {
			$type = "alert-danger";
			$msg = "محصولی با شماره کارت گارانتی مشابه قبلا ثبت گردیده است .";
			$faicon = "fa-asterisk";
		}
	
		else {

		try {
			// set the PDO error mode to exception
			$SqlInsWar = "INSERT INTO warranty_gun ( war_cardnum , war_sdate , war_rs_id , war_gun_id , war_gun_sn , us_name , us_bdate , us_mcode , us_city , us_mobile )
			VALUES ( '$wcardn' , '$wsdate' , '$resid' , '$uid' , '$gunsn' , '$uname' , '$ubdate' , '$umcode' , '$ucity' , '$umob' )";

			// use exec() because no results are returned
			$conn->exec($SqlInsWar);
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
                <span><i class="fa fa-user"></i> ثبت گارانتی سلاح</span>
            </li>
        </ul>
        
    </div>
    <!-- END PAGE BAR -->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">


<?php

$today_g = date("Y-m-d");
$dates = explode('-', $today_g);
$today_j = gregorian_to_jalali($dates[0] , $dates[1] ,$dates[2] ,'-');

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


<?php

try 
{
	// Define and perform the SQL SELECT query
	$SqlSelGun = "SELECT * FROM gun_profile";
	$ResSelGun = $conn->query($SqlSelGun);

	$ResSelGun->setFetchMode(PDO::FETCH_ASSOC);

?>

								<!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list"></i>انتخاب سلاح</div>
                                    </div>
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="post">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                            <thead>
                                                <tr>
                                                    <th>انتخاب</th>
                                                    <th>شماره</th>
                                                    <th>نام سلاح</th>
                                                    <th>کالیبر</th>
                                                    <th>انرژی ساچمه</th>                                                    
                                                    <th>کشور سازنده</th>
                                                    <th>هزینه گارانتی</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

											<?php
                                                while( $RowGun = $ResSelGun->fetch() )
												{
                                            ?>
												<tr class="odd gradeX">
                                                    <td>
														<input type="radio" id="gunid" name="gunid" value="<?php echo $RowGun['gun_id']; ?>" />
                                                    </td>
                                                    <td><?php echo $RowGun['gun_id']; ?></td>
                                                    <td><?php echo $RowGun['gun_name']; ?></td>
                                                    <td><?php echo $RowGun['gun_caliber']; ?></td>
                                                    <td><?php echo $RowGun['gun_power']; ?></td>                                                    
                                                    <td><?php echo $RowGun['gun_mc']; ?></td>
                                                    <td><?php echo $RowGun['gun_wprice']; ?></td>
                                                </tr>
											<?php
												}
											?>

											<?php
                                            $conn = null;        // Disconnect
                                            }
                                            catch(PDOException $e) {
                                                echo $e->getMessage();
                                            }
                                            
                                            ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->



                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-barcode"></i>ثبت گارانتی سلاح</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات سلاح</h3>
                                <div class="row">


									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunname" class="control-label col-md-3">شماره کارت گارانتی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="wcardn" id="wcardn" class="form-control" value="<?php if(isset($_POST['wcardn'])){ echo $_POST['wcardn']; } ?>" placeholder="شماره کارت گارانتی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="caliber" class="control-label col-md-3">شماره سریال سلاح : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="gunsn" id="gunsn" class="form-control" value="<?php if(isset($_POST['gunsn'])){ echo $_POST['gunsn']; } ?>" placeholder="شماره سریال سلاح"> 
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
                                            <label for="gunmc" class="control-label col-md-3">تاریخ شروع : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="wsdate" id="wsdate" class="form-control" value="<?php echo $today_j; ?>" placeholder="تاریخ شروع"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--/row-->
                                <h3 class="form-section">اطلاعات مشتری</h3>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunmc" class="control-label col-md-3">نام و نام خانوادگی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="uname" id="uname" class="form-control" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname']; } ?>" placeholder="نام و نام خانوادگی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunnp" class="control-label col-md-3">موبایل : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="umob" id="umob" class="form-control" value="<?php if(isset($_POST['umob'])){ echo $_POST['umob']; } ?>" placeholder="موبایل"> 
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
                                            <label for="gunmc" class="control-label col-md-3">کد ملی : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="umcode" id="umcode" class="form-control" value="<?php if(isset($_POST['umcode'])){ echo $_POST['umcode']; } ?>" placeholder="کد ملی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gunnp" class="control-label col-md-3">تاریخ تولد : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="ubdate" id="ubdate" class="form-control" value="<?php if(isset($_POST['ubdate'])){ echo $_POST['ubdate']; } ?>" placeholder="تاریخ تولد"> 
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
                                            <label for="gunmc" class="control-label col-md-3">شهر : <i class="fa fa-asterisk"></i></label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-pencil"></i>
                                                    <input type="text" name="ucity" id="ucity" class="form-control" value="<?php if(isset($_POST['ucity'])){ echo $_POST['ucity']; } ?>" placeholder="شهر"> 
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
                            
                                                <input type="hidden" name="WarGunReg" value="Insert" />
                                                
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