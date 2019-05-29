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
                <span><i class="fa fa-user"></i> ویرایش اطلاعات سلاح</span>
            </li>
        </ul>
        
    </div>
    <!-- END PAGE BAR -->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">


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
                                            <i class="fa fa-list"></i>محصول : سلاح</div>
                                        <div class="actions">
                                            <a href="index.php?Page=Gun-Reg" class="btn btn-default btn-sm" target="_blank">
                                                <i class="fa fa-plus"></i> افزودن محصول </a>
                                            <a href="#" class="btn btn-default btn-sm">
                                                <i class="fa fa-print"></i> چاپ </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                                            <thead>
                                                <tr>
                                                    <th>تنظمیات</th>
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
                                                while( $Row = $ResSelGun->fetch() )
												{
                                            ?>

												<tr class="odd gradeX">
                                                    <td>
													<a href="" class="btn btn-outline btn-sm purple">
                                                    <i class="fa fa-pencil"></i> ویرایش </a>
	
													<a href="" class="btn btn-outline red btn-sm black">
                                                    <i class="fa fa-trash"></i> حذف </a>
                                                                                                                                                                                    
                                                    </td>
                                                    <td><?php echo $Row['gun_id']; ?></td>
                                                    <td><?php echo $Row['gun_name']; ?></td>
                                                    <td><?php echo $Row['gun_caliber']; ?></td>
                                                    <td><?php echo $Row['gun_power']; ?></td>                                                    
                                                    <td><?php echo $Row['gun_mc']; ?></td>
                                                    <td><?php echo $Row['gun_wprice']; ?></td>
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

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>









