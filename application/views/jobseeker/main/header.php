<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?=$page_title?> | Job Seeker </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />

    <meta content="" name="author" />

    <!-- ======== CSS STYLE ======== -->
    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/simple-line-icons.min.css">

    <!-- Plugins @ Vendor -->
    <!-- Note : all plugin folder in JS folder . so it need to redirect there -->
    <!-- # Social Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/socicon/socicon.css">
    <!-- # Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/datatables/plugins/bootstrap/datatables.bootstrap.css">
    <!-- # Forms -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-select/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css">
    <!-- # Data / Time -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/clockface/css/clockface.css">
    <!-- # Calendar -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/fullcalendar/fullcalendar.min.css">
    <!-- # Text Editor -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-summernote/summernote.css">
    <!-- # Image Crop -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/jcrop/css/jquery.Jcrop.min.css">
    <!-- # Chart -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/morris/morris.css">
    <!-- # Notification -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-sweetalert/sweetalert.css">
    <!-- # Map -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/jqvmap/jqvmap/jqvmap.css">
    <!-- # Portfolio @ Light Gallery -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/cubeportfolio/css/cubeportfolio.css">

    <!-- GLOBAL -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.css" id="style_components">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/plugins.css">

    <!-- APPS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>apps/inbox.min.css">

    <!-- PAGE -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/pricing.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/image-crop.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/portfolio.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/invoice-2.min.css"> -->

    <!-- PAGE LAYOUT -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/themes/blue.css" id="style_color" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/custom.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/Croppic/croppic/assets/css/croppic.css">
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115543574-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-115543574-1');

    </script>

</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo IMG; ?>site/xremo-logo-white.svg" alt="logo" class="logo-default logo-custom" />
                </a>
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>
            <!-- END LOGO -->

            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN PAGE TOP -->
            <div class="page-top">

                <!-- BEGIN HEADER SEARCH BOX -->

                <form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Job...." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->

                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        <!-- 						
						<li class="">
                            <a href="<?=base_url()?>job/search" class="my-3 font-weight-700 md-orange-text text-darken-1 text-uppercase pull-left" target="_blank">Search Job</a>
                        </li> -->

                        <!-- DISINI NOTIFICATION PRIMARY. SILAHKAN DI UPDATE NANTI -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="count_notif">
                                <i class="icon-bell"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3 id="count_notif_in">
                                        <span class="bold">There are no pending</span> notifications
                                    </h3>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" id="notif_msg" data-handle-color="#637283" data-initialized="1"></ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->

                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="avatar avatar-xtramini avatar-circle" src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.png'; ?>" />
                                <span class="username username-hide-on-mobile">
                                    <?php
                                        $fullname = $this->session->userdata('name');
                                        $arr = explode(' ',trim($fullname));
                                        $fullname_short = $arr[0];
                                    ?>
                                        <?php echo $user_profile['overview']['preference_name'] != ""?$user_profile['overview']['preference_name']:$fullname_short; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url().'jobseeker/dashboard/'; ?>">
                                        <i class="icon-home"></i> <?= !empty($language->site_dashboard) ? $language->site_dashboard : 'Dashboard'?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'jobseeker/profile/'; ?>">
                                        <i class="icon-user"></i> <?= !empty($language->site_edit_profile) ? $language->site_edit_profile : 'Edit Profile'?> </a>
                                </li>
                                <li>
                                    <a href="<?php
                                    $id = $this->session->userdata('id');
                                    $id_encoded = rtrim(base64_encode($id), '=');
									echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank">
                                        <i class="icon-book-open"></i> <?= !empty($language->site_view_my_profile) ? $language->site_view_my_profile : 'View My Profile'?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'jobseeker/calendar/'; ?>">
                                        <i class="icon-calendar"></i> <?= !empty($language->site_my_calendar) ? $language->site_my_calendar : 'My Calendar'?> </a>
                                </li>
                                <!--<li>
                                    <a href="<?php echo base_url().'jobseeker/inbox/'; ?>">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 1 </span>
                                    </a>
                                </li>-->
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>site/user/logout">
                                        <i class="icon-key"></i> <?= !empty($language->site_logout) ? $language->site_logout : 'Logout'?> </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->

    <!-- BEGIN CONTAINER -->
    <div class="page-container">

        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                    <!-- Profile Progress -->
                    <!-- <li class="nav-item px-2 py-4 hidden-sm">
                        <div class="m-grid mb-2 mt-4">
                            <div class="m-grid-row md-white-text font-20-xs">
                                <div class="m-grid-col m-grid-col-xs-10 m-grid-col-left">Profile Completion</div>
                                <div class="m-grid-col m-grid-col-xs-2 m-grid-col-right"></div>
                            </div>
                        </div>
                        <div class="progress progress-lg ">
                            <div class="progress-bar progress-bar-warning " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>%">
                                <span class="sr-only"> <?php echo $percent; ?>% Complete (warning) </span>
                            </div>
                        </div>
                    </li> -->

                    <li class="nav-progress">
                        <div class="progress-info">
                            <div class="status">
                                <?php if ($percent==100){?>                                
                                <div class="status-title"> <?= !empty($language->site_profile_completion) ? $language->site_profile_completion : 'Profile Completion'?> </div>
                                <div class="status-number ">
                                    <?php echo $percent; ?>%                                     
                                </div>
                                <?php }else{?>
                                <div class="status-title md-orange-text"> <?= !empty($language->site_profile_completion) ? $language->site_profile_completion : 'Profile Completion'?> </div>
                                <div class="status-number md-orange-text">
                                    <?php echo $percent; ?>%</div>
                                <?php }?>
                            </div>
                            <div class="progress">
                                <span style="width:<?php echo $percent; ?>%;" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">
                                        <?php echo $percent; ?>% Complete</span>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- Sidebar Menu : Dashboard -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url();?>jobseeker/dashboard/" class="nav-link">
                            <i class="icon-home"></i>
                            <span class="title"><?= !empty($language->site_dashboard) ? $language->site_dashboard : 'Dashboard'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Profile-->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'profile'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/profile/" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title"><?= !empty($language->profile) ? ucfirst($language->profile) : 'Profile'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu Gallery -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'gallery'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/gallery/" class="nav-link">
                            <i class="icon-picture"></i>
                            <span class="title"><?= !empty($language->site_gallery) ? $language->site_gallery : 'Gallery'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu Job Application History -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'applications_history'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/applications_history/" class="nav-link">
                            <i class="icon-notebook"></i>
                            <span class="title"><?= !empty($language->site_application_history) ? $language->site_application_history : 'Application History'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Inbox -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'inbox' || $this->uri->segment(2) == 'sent' || $this->uri->segment(2) == 'trash'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/inbox/" class="nav-link">
                            <i class="icon-envelope"></i>
                            <span class="title"><?= !empty($language->site_inbox) ? ucfirst($language->site_inbox) : 'Inbox'?></span>
                            <?php 
								$data_message = getDataMessage("general");
								if($data_message['new'] > 0){
							?>
                            <span class="badge badge-md-cyan">
                                <?=$data_message['new']?>
                            </span>
                            <?php }?>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Calendar  -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'calendar'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/calendar/" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span class="title"><?= !empty($language->site_calendar) ? $language->site_calendar : 'Calendar'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Wishlist-->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'wishlist'): echo 'active'; endif?>">
                        <a href="<?= base_url(); ?>jobseeker/wishlist" class="nav-link">
                            <i class="icon-heart"></i>
                            <span class="title"><?= !empty($language->site_wishlist) ? $language->site_wishlist : 'Wishlist'?></span>
                        </a>
                    </li>

                    <!-- Sidebar Menu : Settings -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'settings'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>jobseeker/settings/" class="nav-link">
                            <i class="icon-settings"></i>
                            <span class="title"><?= !empty($language->site_settings) ? ucfirst($language->site_settings) : 'Settings'?></span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
