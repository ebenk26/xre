<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Welcome back , <?php echo ucfirst($this->session->userdata('name'));?>!
                    <small>last login on <?php echo !empty($last_logged_in[count($last_logged_in)-2]['user_history']) ? $last_logged_in[count($last_logged_in)-2]['user_history'] : date('d F Y H:i:m'); ?> </small>
                </h1>
                <!-- END PAGE HEADER-->
                <!-- Widget-Dashboard -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4 ">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="60">60</span>
                                    </h3>
                                    <small class="text-uppercase">Profile Seen</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4 ">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="3.5" data-></span>
                                    </h3>
                                    <small class="text-uppercase">Your Profile Rate</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-blue-sharp">
                                        <span data-counter="counterup" data-value="4"></span>
                                    </h3>
                                    <small class="text-uppercase">Upcoming Interview</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-purple-soft">
                                        <span data-counter="counterup" data-value="76"></span>
                                    </h3>
                                    <small class="text-uppercase">New Job Vacancy</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Widget : Feed & Job Find -->
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light tasks-widget">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-share font-dark"></i>
                                    <span class="caption-subject font-dark bold uppercase">Portlet Tabs</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#portlet_tab1" data-toggle="tab"> Profile </a>
                                    </li>
                                    <li>
                                        <a href="#portlet_tab2" data-toggle="tab"> Interview </a>
                                    </li>
                                    <li>
                                        <a href="#portlet_tab3" data-toggle="tab"> Systems </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- TAB BEGIN : Review , Rate , Endorse  -->
                                    <div class="tab-pane active" id="portlet_tab1">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="mt-comments-v2">
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar1.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a><span class="mt-comment-author">Michael Baker</span></a>
                                                            <!-- <span class="mt-comment-action"> -->
                                                            <a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">Follow</a>
                                                            <!-- <a class="btn btn-xs btn-outline-md-indigo btn-circle" href="#">View</a> -->
                                                            <!-- </span> -->
                                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text">Rate <strong>University ABCDE</strong>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar6.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a><span class="mt-comment-author">Larisa Maskalyova</span></a>

                                                            <a class="btn btn-xs blue-ebonyclay btn-circle mt-comment-action" href="#">Followed</a>
                                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar8.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a class="" href="#"><span class="mt-comment-author">Natasha Kim</span></a>
                                                            <a class="btn btn-xs btn-outline blue-ebonyclay btn-circle mt-comment-action" href="#">Follow</a>
                                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic.
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar1.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a><span class="mt-comment-author">Michael Baker</span></a>
                                                            <!-- <span class="mt-comment-action"> -->
                                                            <a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">Follow</a>
                                                            <!-- <a class="btn btn-xs btn-outline-md-indigo btn-circle" href="#">View</a> -->
                                                            <!-- </span> -->
                                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text">Rate <strong>University ABCDE</strong>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar6.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a><span class="mt-comment-author">Larisa Maskalyova</span></a>

                                                            <a class="btn btn-xs blue-ebonyclay btn-circle mt-comment-action" href="#">Followed</a>
                                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                                    </div>
                                                </div>
                                                <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                        <img src="<?php echo IMG_STUDENTS; ?>avatar8.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                            <a class="" href="#"><span class="mt-comment-author">Natasha Kim</span></a>
                                                            <a class="btn btn-xs btn-outline blue-ebonyclay btn-circle mt-comment-action" href="#">Follow</a>
                                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic.
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB END : Review , Rate , Endorse  -->

                                    <!-- TAB BEGIN : Interview Session -->
                                    <div class="tab-pane " id="portlet_tab2">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="general-item-list">
                                                <!-- Example : Ongoing Interview Session -->
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="<?php echo IMG_STUDENTS; ?>avatar4.jpg">
                                                            <a href="" class="item-name primary-link">Xremo Sdn Bhd</a>
                                                            <span class="item-label">16/10/2017</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success mr-2"></span>Ongoing
                                                        </span>
                                                    </div>
                                                    <div class="item-body"> Ongoing interview session for job position Marketing Executive.
                                                    </div>
                                                </div>
                                                <!-- Example : Pending Interview Session -->
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="<?php echo IMG_STUDENTS; ?>avatar3.jpg">
                                                            <a href="" class="item-name primary-link">Time dot com</a>
                                                            <span class="item-label">5 hrs ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning mr-2"></span>Pending</span>
                                                    </div>
                                                    <div class="item-body"> Request confirmation to go interview for job position IT Support </div>
                                                </div>
                                                <!-- Example : Closed Interview Session -->
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="<?php echo IMG_STUDENTS; ?>avatar6.jpg">
                                                            <a href="" class="item-name primary-link">IBM</a>
                                                            <span class="item-label">22 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-primary mr-2"></span>Closed</span>
                                                    </div>
                                                    <div class="item-body">Interview session for job position Project Manager has finished . Please wait for another reply from your interview session.</div>
                                                </div>
                                                <!-- Example : Cancel Interview Session -->
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic" src="../HTML/img/Xremo/all/xremo-logo-blue.png">
                                                            <a href="" class="item-name primary-link">Intel Sdn Bhd</a>
                                                            <span class="item-label">2 days ago</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-danger mr-2"></span>Cancel</span>
                                                    </div>
                                                    <div class="item-body"> You already cancel for this interview session for job position Hardware Engineering.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB END : Interview Session -->

                                    <!-- TAB BEGIN : System -->
                                    <div class="tab-pane " id="portlet_tab3">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <ul class="feeds">
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> You have 4 pending tasks.
                                                                    <span class="label label-sm label-info"> Take action
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
                                                    <a href="javascript:;">
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New version v1.4 just lunched! </div>
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
                                                                    <i class="fa fa-bolt"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
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
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
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
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 40 mins </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-warning">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 1.5 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
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
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 3 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-warning">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 5 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 18 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- TAB END : System -->
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="portlet box task-widget">
                            <div class="portlet-title bg-blue-ebonyclay py-4">
                                <div class="caption">
                                    We found new job for you !
                                    <div class="pull-right">
                                        <span class="label label-success ml-3">76</span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <?php foreach ($job_positions as $key => $value) {?>
                                        <div class="widget-media">
                                            <div class="widget-media-elements text-center">
                                                <img class="widget-media-avatar img-responsive" src="<?php echo IMG_STUDENTS ?>xremo-logo-blue.png" alt="">
                                                <!-- <a class="btn btn-outline-md-indigo btn-xs mt-3" href="#">View</a> -->
                                            </div>
                                            <div class="pull-right">
                                                <!-- <a class="btn btn-xs btn-md-red ">View</a> -->
                                                <!-- <small class="md-grey-text font-weight-600">2 days ago</small> -->
                                                <a class="btn btn-outline-md-indigo btn-sm mt-1 mt-display-block-xs" href="#">View Job</a>
                                                <a class="btn btn-outline blue-ebonyclay btn-sm mt-1 mt-display-block-xs apply" id="<?php echo $value['job_id'] ?>" href="#">Apply</a>
                                                <!-- <a class="btn btn-md-red btn-sm mt-1 mt-display-block-xs" href="#"><i class="icon-pin"></i></a> -->
                                            </div>
                                            <!-- <i class="fa fa-chevron-right pull-right font-40-xs my-5"></i> -->
                                            <div class="widget-media-body">
                                                <h4 class="widget-media-body-title font-blue-ebonyclay mb-0"> <?php echo $value['job_post'] ?> <small class="md-grey-text font-weight-600 ml-2"> <?php echo time_elapsed_string($value['job_created_time']); ?></small>
                                                </h4>
                                                <p class="widget-media-body-subtitle my-2"><a> <?php echo $value['company_name'] ?>
                                                    </a></p>
                                                <?php if (!empty($value['state_name'])) {?>
                                                <a href="" class="badge badge-primary badge-roundless"> <?php echo $value['state_name'] ?></a>
                                                <?php } ?>
                                                <a href="" class="badge badge-md-green badge-roundless"> RM 2001 - RM 2600</a>
                                                <a href="" class="badge badge-md-deep-orange badge-roundless"> Full time</a>
                                                <?php if (!empty($value['position_name'])) {?>
                                                    <a href="" class="badge badge-blue-ebonyclay badge-roundless"> <?php echo $value['position_name'] ?></a>
                                                <?php } ?>
                                                <?php if (!empty($value['industry_name'])) {?>
                                                <a href="" class="badge badge-md-purple badge-roundless"> <?php echo $value['industry_name'] ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- more -->
                                    <div class="widget-media mb-0">
                                        <div class="widget-media-body text-center">
                                            <!-- <img class="widget-media-avatar img-responsive" src="../HTML/img/Xremo/all/xremo-logo-blue.png" alt=""> -->
                                            <a class="md-grey-text text-darken-1 " href="#">View All </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->