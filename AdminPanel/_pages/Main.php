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
                                    <i class="fa fa-home fa-lg"></i>
                                    <a href="index.html">صفحه نخست</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->

                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <?php
                                                $q = $conn->query("SELECT * FROM gun_profile WHERE 1");
                                                $pCount = $q->rowCount();
                                            ?>
                                            <span data-counter="counterup" data-value="1349"><?php echo $pCount ?> عدد</span>
                                        </div>
                                        <div class="desc"> تعداد محصولات </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <?php
                                                $q = $conn->query("SELECT * FROM reseller_profile WHERE 1");
                                                $rCount = $q->rowCount();
                                            ?>
                                            <span data-counter="counterup" data-value="12,5"><?php echo $rCount ?> نفر</div>
                                        <div class="desc">تعداد نمایندگان</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <?php
                                                $q = $conn->query("SELECT * FROM pay_info WHERE result = 1");
                                                $wCount = $q->rowCount();
                                            ?>
                                            <span data-counter="counterup" data-value="549"><?php echo $wCount ?> عدد</span>
                                        </div>
                                        <div class="desc"> تعداد گارانتی های پرداخت شده </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> +
                                            <span data-counter="counterup" data-value="89">50</div>
                                        <div class="desc"> تعداد بازدیدها </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->

                    </div>
                    <!-- END CONTENT BODY -->
</div>