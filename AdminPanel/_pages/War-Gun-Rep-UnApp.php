<?php
//Approve a warranty request
if ( isset( $_GET['WarCardNum'] ) )
{
	$check = $conn->prepare("SELECT * FROM warranty_gun WHERE war_cardnum = ? AND approved = 0");
	$check->execute( array( $_GET['WarCardNum'] ) );
	
	if ( $check->rowCount( ) != 0 )
	{
	
		$remove = $conn->prepare("UPDATE warranty_gun SET approved = 1 WHERE war_cardnum = ?");
		$remove->execute( array( $_GET['WarCardNum'] ) );
	
		$type = "alert-success";
		$msg = "کارت گارانتی <b>' ". $_GET['WarCardNum'] . " '</b> با موفقییت تایید گردید ! <br /> برای مشاهده لیست گارانتی های تایید شده ، از منوی سمت راست عبارت <b>گارانتی های تایید شده </b> را انتخاب نمایید ." ;
		$faicon = "fa-check-circle";	
	}
}

//Remove a warranty request
if ( isset( $_GET['remove_id'] ) )
{

	$check = $conn->prepare("SELECT * FROM warranty_gun WHERE war_id = ?");
	$check->execute( array( $_GET['remove_id'] ) );
	
	if ( $check->rowCount( ) != 0 )
	{
	
		$remove = $conn->prepare("DELETE FROM warranty_gun WHERE war_id = ?");
		$remove->execute( array( $_GET['remove_id'] ) );
	
		$type = "alert-success";
		$msg = "درخواست موردنظر با موفقیت حذف گردید !";
		$faicon = "fa-check-circle";	
	}
}
?>
<head>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
</head>
    <!-- END HEAD -->
	
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
                <span><i class="fa fa-user"></i> گارانتی های تایید نشده</span>
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
	$msg = "لیست گارانتی های تایید نشده به شرح زیر می باشد .";
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
	$SqlSelWar = "SELECT w.*, g.gun_name, pr.*, c.cat_name FROM warranty_gun as w INNER JOIN gun_profile as g ON g.gun_id = w.war_gun_id INNER JOIN pay_info p ON p.pay_id = w.war_cardnum INNER JOIN reseller_profile pr ON pr.rs_id = w.war_rs_id INNER JOIN category_profile as c ON g.cat_id = c.cat_id WHERE p.result = 1 AND w.approved = 0 ORDER BY w.war_id DESC";
	$SqlSelWar = $conn->query($SqlSelWar);

	$SqlSelWar->setFetchMode(PDO::FETCH_ASSOC);

?>

								<!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list"></i>گارانتی های تایید نشده</div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                            <thead>
                                                <tr>
                                                    <th>عملیات</th>
                                                    <th>شماره کارت گارانتی</th>
                                                    <th>مشخصات نماینده</th>
                                                    <th>نام دسته بندی</th>
                                                    <th>نام کالا</th>
                                                    <th>شماره سریال</th>
                                                    <th class="sorting_desc">تاریخ شروع</th>                                                    
                                                    <th>نام مشتری</th>
                                                    <th>هزینه گارانتی</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

											<?php
                                                while( $RowWar = $SqlSelWar->fetch() )
												{
                                            ?>
												<tr class="odd gradeX">
                                                    <td>
													<a href="./index.php?Page=War-Gun-Rep-UnApp&WarCardNum=<?php echo $RowWar['war_cardnum']; ?>" class="btn btn-outline btn-sm purple">
                                                    <i class="fa fa-pencil"></i> تایید کارت گارانتی</a><br />
                                                    <a href="./index.php?Page=War-Gun-Edit&WarCardNum=<?php echo $RowWar['war_cardnum']; ?>" class="btn btn-outline btn-sm purple">
                                                    <i class="fa fa-pencil"></i> ویرایش کارت گارانتی</a><br />
													<a href="./index.php?Page=War-Gun-Rep-UnApp&remove_id=<?php echo $RowWar['war_id']; ?>" class="btn btn-outline red btn-sm black">
                                                    <i class="fa fa-trash"></i> حذف درخواست </a>
                                                    </td>
                                                    <td><?php echo $RowWar['war_cardnum']; ?></td>
                                                    <td><?php echo "نام نماینده : " . $RowWar['rs_fname']. " " . $RowWar['rs_lname'] . "<br />" .  "نام فروشگاه : " .$RowWar['rs_shop']. "<br />" . "نشانی : " .$RowWar['rs_add'] ?></td>
                                                    <td><?php echo $RowWar['cat_name']; ?></td>
                                                    <td><?php echo $RowWar['gun_name']; ?></td>
                                                    <td><?php echo $RowWar['war_gun_sn']; ?></td>
                                                    <td><?php echo $RowWar['war_sdate']; ?></td>                                                    
                                                    <td><?php echo $RowWar['us_name']; ?></td>
                                                    <td><?php echo $RowWar['gun_wprice']; ?></td>
                                                </tr>
											<?php
												}
											?>

											<?php

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

                
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>