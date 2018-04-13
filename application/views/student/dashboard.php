<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <h1 class="page-title"> Welcome back ,
            <?php echo ucfirst($this->session->userdata('name'));?>!
            <small>last login on
                <?php echo !empty($last_logged_in[count($last_logged_in)-2]['user_history']) ? date('d F Y H:i:m', strtotime($last_logged_in[count($last_logged_in)-2]['user_history'])) : date('d F Y H:i:m'); ?> </small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url().'student/dashboard'; ?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>

        <!-- END PAGE HEADER-->
        <!-- Widget-Dashboard -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 p-4 ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="<?=$users['overview']['number_of_seen'] != null?$users['overview']['number_of_seen']:0?>">0</span>
                            </h3>
                            <small class="text-uppercase">Profile Seen</small>
                        </div>
                        <div class="icon">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="dashboard-stat2 p-4 ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="<?=$rate?>"></span>
                            </h3>
                            <small class="text-uppercase">Your Profile Rate</small>
                        </div>
                        <div class="icon">
                            <i class="icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php $new_job = 0;foreach ($job_positions_new as $key => $value) {$new_job++;}?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 p-4">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="<?=$upcoming_interview['upcoming_interview_number']?>"></span>
                            </h3>
                            <small class="text-uppercase">Upcoming Interview</small>
                        </div>
                        <div class="icon">
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="dashboard-stat2 p-4">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="<?=$new_job?>"></span>
                            </h3>
                            <small class="text-uppercase">New Job Vacancy</small>
                        </div>
                        <div class="icon">
                            <i class="icon-briefcase"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="portlet light mt-height-300-xs">
                    <div class="col-md-8">
                        <h2>Interested in video resume</h2>
                        <h5>Check it out more by click play button</h5>
                    </div>
                    <div class="col-md-4">
                        <i class="icon-control-play font-26"></i>
                    </div>
                    <!-- <div class="embed-responsive mt-height-250-xs mt-2">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xbmAA6eslqU"></iframe>
                    </div> -->
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
                            <span class="caption-subject font-dark bold uppercase">Informations</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab"> New Join </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab"> Upcoming Interview </a>
                            </li>
                            <li>
                                <a href="#portlet_tab3" data-toggle="tab"> Recent Activities </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- TAB BEGIN : Review , Rate , Endorse  -->
                            <div class="tab-pane active" id="portlet_tab1">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <div class="mt-comments-v2">
                                        <?php $shown_new = 0;foreach($new_join as $row){$shown_new++;?>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <?php if($row->profile_photo != ""){?>
                                                <img src="<?=IMG_STUDENTS.$row->profile_photo;?>" style="height:35px;margin-right:10px;" />
                                                <?php }?>
                                            </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">
                                                            <?=$row->fullname?>
                                                        </span>
                                                    </a>
                                                    <!-- <span class="mt-comment-action"> -->
                                                    <!--<a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">View Profile</a>-->
                                                    <a class="btn btn-xs btn-outline-md-indigo btn-circle ml-2" href="<?=base_url()?>profile/user/<?=rtrim(base64_encode($row->id), '=');?>"
                                                        target="_blank">View Profile</a>
                                                    <!-- </span> -->
                                                    <span class="mt-comment-date">
                                                        <?=date('j M Y H:i A', strtotime($row->created_at))?>
                                                    </span>
                                                </div>
                                                <div class="mt-comment-text">
                                                    <?=$row->quote != ""?$row->quote:""?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php }?>

                                        <?php if($shown_new == 0){?>
                                        <!-- @IF empty / No Info -->
                                        <div class="portlet light md-shadow-none">
                                            <div class="portlet-body p-2">
                                                <h3 class="text-center font-weight-500 md-indigo-text"> No new join student.</h3>
                                                <h5 class="text-center font-grey-cascade mt-4">New registered student since your last logged in</h5>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- TAB END : Review , Rate , Endorse  -->

                            <!-- TAB BEGIN : Interview Session -->
                            <div class="tab-pane " id="portlet_tab2">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <div class="general-item-list">
                                        <?php $shown_interview = 0;foreach($upcoming_interview['upcoming_interview'] as $row){ $shown_interview++;?>
                                        <div class="item">
                                            <div class="item-head">
                                                <div class="item-details">
                                                    <img class="item-pic rounded" src="<?=$row->profile_photo != "
                                                        "?IMG_EMPLOYERS.$row->profile_photo:IMG_STUDENTS.'xremo-logo-blue.png'; ?>">
                                                    <a href="<?=base_url()?>profile/company/<?=rtrim(base64_encode($row->employer_id),'=') ?>" target="_blank" class="item-name primary-link">
                                                        <?=$row->company_name?>
                                                    </a>
                                                    <span class="item-label">
                                                        <?=date('j F Y H:i A', strtotime($row->start_date))?>
                                                    </span>
                                                </div>
                                                <span class="item-status">
                                                    <!--<span class="badge badge-empty badge-success mr-2"></span>Ongoing
																<span class="badge badge-empty badge-warning mr-2"></span>Pending</span>
																<span class="badge badge-empty badge-primary mr-2"></span>Closed</span>-->
                                                    <span class="badge badge-empty badge-danger mr-2"></span>Upcoming</span>
                                                </span>
                                            </div>
                                            <div class="item-body">
                                                <a href="<?=base_url()?>job/details/<?=rtrim(base64_encode($row->job_id),'=') ?>" target="_blank" class="item-name primary-link">
                                                    <b>[
                                                        <?=$row->position?>]</b>
                                                </a>
                                                <?=$row->description?>
                                            </div>
                                        </div>
                                        <?php }?>

                                        <?php if($shown_interview == 0){?>
                                        <!-- @IF empty / No Info -->
                                        <div class="portlet light md-shadow-none">
                                            <div class="portlet-body p-2">
                                                <h3 class="text-center font-weight-500 md-indigo-text"> You have no Interview invitation yet.</h3>
                                                <h5 class="text-center font-grey-cascade mt-4">Search job that suitable to built your career ! If not , update your profile</h5>
                                                <div class="col-xs-offset-4 col-xs-4 mt-4">
                                                    <a href="<?=base_url()?>student/profile" class="btn btn-outline-md-indigo">Update Profile ! </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- TAB END : Interview Session -->

                            <!-- TAB BEGIN : System -->
                            <div class="tab-pane " id="portlet_tab3">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <ul class="feeds">
                                        <?php foreach($recent_activities as $row){?>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-<?=$row->label?>">
                                                            <i class="fa <?=$row->icon?>"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            <?=$row->activity?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    <?=time_elapsed_string($row->created_at)?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php }?>
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
                            We found
                            <?=$new_job == 0?"no":""?> new job for you !
                                <div class="pull-right">
                                    <span class="label label-success ml-3">
                                        <?=$new_job?>
                                    </span>
                                </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                            <?php $no_new = 0;foreach ($job_positions_new as $key => $value) { if($no_new == 5){break;} $no_new++;?>
                            <div class="widget-media">
                                <div class="widget-media-elements text-center">
                                    <!--<img class="widget-media-avatar img-responsive" src="<?php echo IMG_STUDENTS ?>xremo-logo-blue.png" alt="">-->

                                    <img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_STUDENTS.'xremo-logo-white.svg'; ?>"
                                        alt="" class="widget-media-avatar img-responsive">

                                    <!-- <a class="btn btn-outline-md-indigo btn-xs mt-3" href="#">View</a> -->
                                </div>
                                <div class="pull-right">
                                    <!-- <a class="btn btn-xs btn-md-red ">View</a> -->
                                    <!-- <small class="md-grey-text font-weight-600">2 days ago</small> -->
                                    <a class="btn btn-outline-md-indigo btn-sm mt-1 mt-display-block-xs" href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['job_id']), '=');?>"
                                        target="_blank">View Job</a>
                                    <!--<a class="btn btn-outline blue-ebonyclay btn-sm mt-1 mt-display-block-xs apply" id="<?php echo $value['job_id'] ?>" href="#">Apply</a>-->
                                    <!-- <a class="btn btn-md-red btn-sm mt-1 mt-display-block-xs" href="#"><i class="icon-pin"></i></a> -->
                                </div>
                                <!-- <i class="fa fa-chevron-right pull-right font-40-xs my-5"></i> -->
                                <div class="widget-media-body">
                                    <h4 class="widget-media-body-title font-blue-ebonyclay mb-0">
                                        <?php echo $value['job_post'] ?>
                                        <small class="md-grey-text font-weight-600 ml-2">
                                            <?php echo time_elapsed_string($value['job_created_time']); ?>
                                        </small>
                                    </h4>
                                    <p class="widget-media-body-subtitle my-2">
                                        <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($value['user_id']), '=');?>" target="_blank">
                                            <?php echo $value['company_name'] ?>
                                        </a>
                                    </p>
                                    <?php if (!empty($value['state_name'])) {?>
                                    <a href="" class="badge badge-primary badge-roundless">
                                        <?php echo $value['state_name'] ?>
                                    </a>
                                    <?php } ?>
                                    <a href="" class="badge badge-md-green badge-roundless">
                                        <?php echo $this->session->userdata('forex') ?>
                                        <?php echo $value['min_budget']; ?> -
                                        <?php echo $this->session->userdata('forex') ?>
                                        <?php echo $value['max_budget']; ?>
                                    </a>
                                    <a href="" class="badge badge-md-deep-orange badge-roundless">
                                        <?php echo $value['employment_name'] ;?>
                                    </a>
                                    <?php if (!empty($value['position_name'])) {?>
                                    <a href="" class="badge badge-blue-ebonyclay badge-roundless">
                                        <?php echo $value['position_name'] ?>
                                    </a>
                                    <?php } ?>
                                    <?php if (!empty($value['industry_name'])) {?>
                                    <a href="" class="badge badge-md-purple badge-roundless">
                                        <?php echo $value['industry_name'] ?>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- more -->
                            <div class="widget-media mb-0">
                                <div class="widget-media-body text-center">
                                    <!-- <img class="widget-media-avatar img-responsive" src="../HTML/img/Xremo/all/xremo-logo-blue.png" alt=""> -->
                                    <!--<a class="md-grey-text text-darken-1 " href="<?=base_url()?>job/search" target="_blank">View Job Dashboard </a>-->

                                    <a href="<?=base_url()?>job/search" target="_blank" class="btn  btn-md-orange m-4 letter-space-xs">View All Job Dashboard</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

    <div class="page-content">

        <h1 class="page-title"> Welcome back , Jennifer Lawrence!
            <small>last login on 23/07/2017 , 20:08 </small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>

        <!-- Section: Widget -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 p-4">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 p-4">
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="portlet light mt-height-300-xs">
                    <div class="embed-responsive mt-height-250-xs mt-2">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xbmAA6eslqU"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section : Feed &  Article-->
        <div class="row">
            <!-- Article -->
            <div class="col-md-6">
                <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators carousel-indicators-red">
                        <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <!-- BEGIN WIDGET BLOG -->
                            <div class="widget-blog text-center margin-bottom-20 clearfix" style="height: 442px; padding-top: 120px; background-image: url(../../assets/layouts/layout7/img/07.jpg">
                                <div class="widget-blog-heading text-uppercase">
                                    <h3 class="widget-blog-title">San Francisco</h3>
                                    <span class="widget-blog-subtitle">At dawn</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                                    ut laoreet dolore magna aliquam erat volutpat commodo consequat.
                                </p>
                                <br>
                                <a class="btn btn-danger text-uppercase" href="#">Read More</a>
                            </div>
                            <!-- END WIDGET BLOG -->
                        </div>
                        <div class="item">
                            <!-- BEGIN WIDGET BLOG -->
                            <div class="widget-blog text-center margin-bottom-20 clearfix" style="height: 442px; padding-top: 120px; background-image: url(../../assets/layouts/layout7/img/06.jpg">
                                <div class="widget-blog-heading text-uppercase">
                                    <h3 class="widget-blog-title md-white-text">San Francisco</h3>
                                    <span class="widget-blog-subtitle md-white-text">At dawn</span>
                                </div>
                                <p class="md-white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                                    ut laoreet dolore magna aliquam erat volutpat commodo consequat.
                                </p>
                                <br>
                                <a class="btn btn-danger text-uppercase" href="#">Read More</a>
                            </div>
                            <!-- END WIDGET BLOG -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feed  -->
            <div class="col-md-6">
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

                                    <!-- @IF empty / No Info -->
                                    <div class="portlet light md-shadow-none">
                                        <div class="portlet-body p-2">
                                            <h3 class="text-center font-weight-500 md-indigo-text"> Nobody reviewed you yet.</h3>
                                            <h5 class="text-center  font-grey-cascade mt-4">Get your friends to review, endorse and rate about your profile. </h5>
                                            <div class="col-xs-offset-4 col-xs-4 mt-4">
                                                <a href="student-profile-v3.html" class="btn btn-outline-md-indigo">Update Profile ! </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- @ ELSE -->
                                    <div class="mt-comments-v2" hidden>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <!-- <span class="mt-comment-action"> -->
                                                    <a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">Follow</a>
                                                    <!-- <a class="btn btn-xs btn-outline-md-indigo btn-circle" href="#">View</a> -->
                                                    <!-- </span> -->
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text">Rate
                                                    <strong>University ABCDE</strong>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    </a>

                                                    <a class="btn btn-xs blue-ebonyclay btn-circle mt-comment-action" href="#">Followed</a>
                                                    <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a class="" href="#">
                                                        <span class="mt-comment-author">Natasha Kim</span>
                                                    </a>
                                                    <a class="btn btn-xs btn-outline blue-ebonyclay btn-circle mt-comment-action" href="#">Follow</a>
                                                    <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <!-- <span class="mt-comment-action"> -->
                                                    <a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">Follow</a>
                                                    <!-- <a class="btn btn-xs btn-outline-md-indigo btn-circle" href="#">View</a> -->
                                                    <!-- </span> -->
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text">Rate
                                                    <strong>University ABCDE</strong>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    </a>

                                                    <a class="btn btn-xs blue-ebonyclay btn-circle mt-comment-action" href="#">Followed</a>
                                                    <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                </div>
                                                <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../../assets/pages/media/users/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a class="" href="#">
                                                        <span class="mt-comment-author">Natasha Kim</span>
                                                    </a>
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

                                    <!-- @IF empty / No Info -->
                                    <div class="portlet light md-shadow-none">
                                        <div class="portlet-body p-2">
                                            <h3 class="text-center font-weight-500 md-indigo-text"> You have not got any job Interview invitation yet.</h3>
                                            <h5 class="text-center font-grey-cascade mt-4">Search job that suitable job to built your career ! If not , update your profile</h5>
                                            <div class="col-xs-offset-4 col-xs-4 mt-4">
                                                <a href="student-profile-v3.html" class="btn btn-outline-md-indigo">Update Profile ! </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- @ELSE -->
                                    <div class="general-item-list">
                                        <!-- Example : Ongoing Interview Session -->
                                        <div class="item">
                                            <div class="item-head">
                                                <div class="item-details">
                                                    <img class="item-pic rounded" src="../../assets/pages/media/users/avatar4.jpg">
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
                                                    <img class="item-pic rounded" src="../../assets/pages/media/users/avatar3.jpg">
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
                                                    <img class="item-pic rounded" src="../../assets/pages/media/users/avatar6.jpg">
                                                    <a href="" class="item-name primary-link">IBM</a>
                                                    <span class="item-label">22 days ago</span>
                                                </div>
                                                <span class="item-status">
                                                    <span class="badge badge-empty badge-primary mr-2"></span>Closed</span>
                                            </div>
                                            <div class="item-body">Interview session for job position Project Manager has finished . Please wait
                                                for another reply from your interview session.</div>
                                        </div>
                                        <!-- Example : Cancel Interview Session -->
                                        <div class="item">
                                            <div class="item-head">
                                                <div class="item-details">
                                                    <img class="item-pic" src="../../HTML/img/Xremo/all/xremo-logo-blue.png">
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
                                                            <span class="label label-sm label-default"> Overdue </span>
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
            </div>
        </div>

        <!-- Section: Find Job-->
        <div class="portlet md-shadow-none">
            <!-- TITLE  -->
            <div class="media">
                <div class="media-body">
                    <h2>What we just found for you!
                        <span class="font-24-xs label label-md-indigo mx-3">30 new job</span>
                    </h2>
                </div>
                <div class="media-right media-middle">
                    <a href="student-settings.html" class="btn btn-outline-md-indigo mt-4">
                        <i class="icon-settings"></i>Job Preferences</a>
                </div>

            </div>

            <hr class="border-mdo-darkblue-slight mt-3 mb-4">

            <!-- CONTENT -->
            <!-- NOTE :  Only extract latest 1 week job have been posted and based user preferences or put limit only latest 10 job been posted will be show-->
            <!-- @IF empty / No Info -->
            <div class="portlet mt-height-500-xs  md-shadow-none">
                <div class="portlet-body px-18 py-10">
                    <h2 class="text-center font-weight-500 md-indigo-text"> Set up your job preferences! </h2>
                    <h5 class="text-center font-26-xs font-grey-cascade mt-4">Tired for waiting your job preference? Why not set up your job preferences by click
                        <b> '
                            <i class="icon-settings mr-2"></i>Job Preferences ' </b> and we will search and automatically notify your preferences!!</h5>
                </div>
            </div>
            <!-- @ ELSE IF CONTENT less than and equal to 6  : button load do not have to appear -->
            <div class="row " hidden>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portlet light">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 font-26-xs">Job Position Title </h4>
                                <h5>
                                    <a href="company-description">Company Name</a>
                                </h5>
                                <small class="font-grey-salsa">
                                    <i class="icon-clock mr-2"></i>2 hr ago</small>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/xremo-logo-blue.png" alt="" class="avatar avatar-tiny">
                            </div>
                        </div>
                        <hr class="my-2">
                        <p class="multiline-truncate">Description with multitrucate ... Lorem import moduleName from ' kkaskkhdjahsj sdahjsjhnas asdjash'ksdsjdsjjd;
                        </p>
                        <div class="media">
                            <div class="media-body"></div>
                            <div class="media-right">
                                <a href="job-description.html" class="btn btn-outline-md-indigo btn-sm"> View </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- @elseif content more than 6 : button load more will be appear -->
            <div class="row ">
                <div class="col-md-offset-4 col-md-4">
                    <a href="" class="btn btn-outline-md-grey btn-block">Load More</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END CONTENT -->
