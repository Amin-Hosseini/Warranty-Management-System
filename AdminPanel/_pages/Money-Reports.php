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
                <span><i class="fa fa-user"></i> گزارشات مالی</span>
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
	$msg = "لیست فاکتورهای ایجاد شده به شرح زیر می باشد .";
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
	$SqlSelWar = "SELECT * FROM pay_info WHERE result = 1 ORDER BY id DESC";
	$SqlSelWar = $conn->query($SqlSelWar);

	$SqlSelWar->setFetchMode(PDO::FETCH_ASSOC);

?>

								<!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list"></i>گزارشات مالی</div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                            <thead>
                                                <tr>
                                                    <?php //<th>عملیات</th> ?>
                                                    <th>#</th>                                             
                                                    <th>شماره کارت گارانتی</th>                                             
                                                    <th>مبلغ فاکتور</th>                                             
                                                    <th>شناسه مرجع</th>                                             
                                                    <th>شناسه فروش مرجع</th>                                             
                                                    <th>وضعیت</th>                                                    
                                                    <th>تاریخ پرداخت</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

											<?php
											$i = 0;
                                                while( $RowWar = $SqlSelWar->fetch() )
												{
                                            ?>
												<tr class="odd gradeX">
                                                    <?php /*<td>
													<a href="" class="btn btn-outline btn-sm purple">
                                                    <i class="fa fa-pencil"></i> پرداخت گارانتی </a>
	
													<!--<a href="" class="btn btn-outline red btn-sm black">
                                                    <i class="fa fa-trash"></i> حذف درخواست </a>-->

                                                    </td>*/ ?>
                                                    <td><?php echo ++$i; ?></td>
                                                    <td><?php echo $RowWar['pay_id']; ?></td>
                                                    <td><?php echo $RowWar['amount']; ?> ریال</td>
                                                    <td><?php echo $RowWar['refid']; ?></td>
                                                    <td><?php echo $RowWar['salerefid']; ?></td>
                                                    <td><span class='label label-sm label-success'> پرداخت شده </span></td>
                                                    <td><?php echo jdate("Y/m/d", $RowWar['date']); ?><br /><?php echo jdate("H:m:i", $RowWar['date']); ?></td>
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