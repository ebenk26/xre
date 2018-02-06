<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Hey ! Welcome back <?php echo ucfirst($this->session->userdata('name'));?>
                    <small>Here latest feeds regarding your Company account</small>
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?php echo base_url().'employer/dashboard'; ?>">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Dashboard</span>
                        </li>
                    </ul>

                </div>
                <!-- END PAGE HEADER-->

                <div class="row widget-row ">
                    <div class="col-md-3">

                        <!-- BEGIN WIDGET THUMB  : Job Post (Active)-->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Active</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="10"></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB  : Job Post (Active)-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Profile Seen -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3">
                            <h4 class="widget-thumb-heading">Profile </h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red icon-eye"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Seen</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="300">300</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Profile Seen-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Upcoming Interview-->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3">
                            <h4 class="widget-thumb-heading"> Interview</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-purple icon-calendar"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Upcoming </span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="3">3</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Upcoming Interview-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Inbox-->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3">
                            <h4 class="widget-thumb-heading">Inbox</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue icon-envelope"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Unread Message</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="46">46</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Inbox-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light tasks-widget">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-share font-dark"></i>
                                    <span class="caption-subject font-dark bold uppercase">Recent Job Post </span>
                                </div>
                            </div>
                            <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr class="uppercase ">
                                                    <th> # </th>
                                                    <th class="col-sm-7"> Job </th>
                                                    <!-- <th> Last Update</th> -->
                                                    <th class="col-sm-2"> Status </th>
                                                    <th class="col-sm-2"> Candidate</th>
                                                    <th class="col-sm-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; foreach ($job_post as $key => $value) { if($i == 6){break;}?>
                                                    <tr>
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php echo $value['name'] ?> </td>
                                                        <td>
                                                            <?php if(strtotime(date('Y-m-d')) >= strtotime($value['expiry_date'])){?>
																<span class="label label-sm label-danger"> Expired </span>
															<?php }else{?>
																<span class="label label-sm label-<?php if($value['status'] == 'post') {echo 'md-green';}else if($value['status'] == 'draft'){echo 'warning';}else if($value['status'] == 'expired'){echo 'danger';}?>"> <?php echo ucfirst($value['status'] == 'post'?"Active":$value['status']) ?> </span>
															<?php }?>															
                                                        </td>
                                                        <td>
                                                            <i class="icon-users"></i> <?=$value['number_of_candidate']?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']),'='); ?>" target="_blank" class="btn btn-md-indigo btn-sm  btn-circle">View</a>
                                                        </td>
                                                    </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
										<br><a href="<?=base_url()?>employer/job_board" class="btn btn-danger text-uppercase pull-right">View All</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>

                    <!-- Article -->
                    <div class="col-md-4">
                        <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-red">
                                <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                                <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
								<li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
								<?php $i = 1;foreach ($article as $row) { ?>
									<div class="item <?=$i == 1?"active":""?>">
										<!-- BEGIN WIDGET BLOG -->
										<div class="widget-blog text-center margin-bottom-20 clearfix" style="height: 442px; padding-top: 50px; background-image: url(<?php echo IMG_STUDENTS; ?>'07.jpg'">
											<div class="widget-blog-heading text-uppercase">
												<h3 class="widget-blog-title"><?=$row->title?></h3>
												<span class="widget-blog-subtitle"><?=date('j F Y', strtotime($row->created_at))?></span>
											</div>
											<p><?=$row->excerpt?>
											</p>
											<br/>
											<a class="btn btn-danger text-uppercase" href="<?=base_url()?>article/<?=$row->slug?>" target="_blank">Read More</a>
										</div>
										<!-- END WIDGET BLOG -->
									</div>
								<?php $i++;}?>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="row">

                    <div class="col-lg-6 col-sm-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md font-blue">
                                    <i class="icon-share font-blue"></i>
                                    <span class="caption-subject theme-font bold uppercase">Recent Activities</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                            <label>
                                                <input type="checkbox" /> Finance</label>
                                            <label>
                                                <input type="checkbox" checked="" /> Membership</label>
                                            <label>
                                                <input type="checkbox" /> Customer Support</label>
                                            <label>
                                                <input type="checkbox" checked="" /> HR</label>
                                            <label>
                                                <input type="checkbox" /> System</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller mt-height-850-xs" data-always-visible="1" data-rail-visible="0">
                                    <ul class="feeds">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 4 pending tasks.
                                                            <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> Just now </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> New order received with
                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 30 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                            <span class="label label-sm label-default "> Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 2 hours </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-success">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-default">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 4 pending tasks.
                                                            <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> Just now </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-danger">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> New order received with
                                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 30 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 24 mins </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Web server hardware needs to be upgraded.
                                                            <span class="label label-sm label-default "> Overdue </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 2 hours </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">
                                                            <div class="label label-sm label-info">
                                                                <i class="fa fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <div class="cont-col2">
                                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col2">
                                                    <div class="date"> 20 mins </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="scroller-footer">
                                    <div class="btn-arrow-link pull-right">
                                        <a href="#" class="">See All Records</a>
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Ads -->
                    <div class="col-lg-6 col-sm-12">
                        <!-- <div class="widget-blog text-center margin-bottom-20 clearfix" style="height: 442px; padding-top: 120px; background-image: url(../assets/layouts/layout7/img/07.jpg">
                            <div class="widget-blog-heading text-uppercase">
                                <h3 class="widget-blog-title">San Francisco</h3>
                                <span class="widget-blog-subtitle">At dawn</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat commodo consequat.
                            </p>
                            <br/>
                            <a class="btn btn-danger text-uppercase" href="#">Read More</a>
                        </div> -->
                        <div class="portlet light calendar bordered">
                            <div class="portlet-title ">
                                <div class="caption">
                                    <i class="icon-calendar font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="calendar"> </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->