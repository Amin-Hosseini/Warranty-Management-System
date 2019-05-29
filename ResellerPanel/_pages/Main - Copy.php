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
                    <span><i class="fa fa-user"></i> ثبت اطلاعات نماینده</span>
                </li>
            </ul>
            
        </div>
        <!-- END PAGE BAR -->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">

				<?php
                if( isset($msg) and isset($type) ){
                ?>
                    <div class="custom-alerts alert <?php echo $type; ?> fade in">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                        <i class="fa <?php echo $faicon; ?> fa-lg"></i>
                        <span><?php echo $msg; ?></span>
                    </div>
                <?php
                } else {
                ?> 
                <div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times-circle fa-lg"></i></button>
                    <i class="fa fa-info-circle fa-lg"></i>
                    <span>جهت ثبت اطلاعات محصول لطفا موارد درخواستی را تکمیل و بر روی ثبت کلیلک نمائید .</span>
                </div>
        
                <?php
                }
                ?>		
				
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user-plus"></i>ثبت اطلاعات نماینده</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="form-section">اطلاعات فردی</h3>
                                <div class="row">


									<div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><i class="fa fa-asterisk"></i> نام خانوادگی :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder="نام خانوادگی"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">نام :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder="نام"> 
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
                                            <label class="control-label col-md-3">تلفن همراه :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-phone"></i>
                                                    <input type="text" class="form-control" placeholder="تلفن همراه"> 
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
                                            <label class="control-label col-md-3">نام فروشگاه :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-building"></i>
                                                    <input type="text" class="form-control" placeholder="نام فروشگاه"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">تلفن :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-phone"></i>
                                                    <input type="text" class="form-control" placeholder="تلفن"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">استان :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" class="form-control" placeholder="استان"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">شهر :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" class="form-control" placeholder="شهر"> 
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
                                            <label class="control-label col-md-3">آدرس :</label>
                                            <div class="col-md-9">
                                                <div class="input-icon right">
                                                    <i class="fa fa-map-marker"></i>
                                                    <input type="text" class="form-control" placeholder="آدرس"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">

                                                    <button type="submit" class="btn blue">
                                                    	<i class="fa fa-save"></i> ثبت اطلاعات</span>
                                                    </button>

                                                    <button type="reset" class="btn red">
                                                    	<i class="fa fa-refresh"></i> بازنویسی</span>
                                                    </button>                                                    
                                                
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