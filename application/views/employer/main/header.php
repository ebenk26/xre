<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Employer" name="description">
    <meta content="" name="author">

    <!-- TITLE -->
    <title>
        <?=$page_title?> | Employer</title>

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
    <!-- # Animation -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/animate/animate.css" >

    <!-- GLOBAL -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.min.css" id="style_components">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/plugins.min.css">

    <!-- APPS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>apps/inbox.min.css">

    <!-- PAGE -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/pricing.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/image-crop.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/portfolio.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/invoice-2.min.css">

    <!-- PAGE LAYOUT -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/themes/blue.css" id="style_color" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout2/custom.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/alertify.min.css">

    <!-- FAVICON -->
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
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo IMG; ?>/site/xremo-logo-white.svg" alt="logo" class="logo-default logo-custom">
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
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <!-- <form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form> -->
                <!-- END HEADER SEARCH BOX -->

                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">

                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="count_notif">
                                <i class="icon-bell"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3 id="count_notif_in">
                                        <span class="bold">There are no pending</span> notifications
                                    </h3>
                                    <!-- <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_profile_1.html">view all</a> -->
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" id="notif_msg" data-handle-color="#637283" data-initialized="1"></ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->

                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="<?php echo ucfirst($user_profile['name']); ?> " class="avatar avatar-xtramini avatar-circle" src="<?php echo !empty($user_profile['img']) ?  IMG_EMPLOYERS.$user_profile['img'] : IMG.'site/profile-pic.png'?>">
                                <span class="username username-hide-on-mobile">
                                    <?php echo ucfirst($user_profile['name']); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/dashboard/">
                                        <i class="icon-home"></i> <?= !empty($language)? $language->site_dashboard : 'Dashboard'; ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/profile/">
                                        <i class="icon-user"></i><?= !empty($language)? $language->site_edit_profile : 'Edit Profile'; ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" target="_blank">
                                        <i class="icon-book-open"></i> <?= !empty($language)? $language->site_view_my_profile : 'View My Profile'; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/calendar/">
                                        <i class="icon-calendar"></i><?= !empty($language)? $language->site_my_calendar : 'My Calendar'; ?>  </a>
                                </li>
                                <!--<li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/app_inbox.html">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/app_todo_2.html">
                                        <i class="icon-rocket"></i> My Tasks
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                                </li>-->
                                <li class="divider"> </li>
                                <!--<li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_lock_1.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>-->
                                <li>
                                    <a href="<?php echo base_url(); ?>site/user/logout/">
                                        <i class="icon-key"></i> <?= !empty($language->site_logout) ? $language->site_logout : 'Logout'; ?> </a>
                                </li>
                            </ul>
                        </li>
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
            <div class="page-sidebar navbar-collapse collapse ">
                <ul class="page-sidebar-menu  page-header-fixed  page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!-- PROFILE COMPLETION -->
                    <li class="nav-progress">
                        <div class="progress-info">
                            <div class="status">
                                <div class="status-title"> <?= !empty($language->site_profile_completion) ? $language->site_profile_completion : "Profile Completion"  ?> </div>
                                <div class="status-number">
                                    <?= ProfileCompletion($user_profile); ?>%</div>
                            </div>
                            <div class="progress">
                                <span style="width:<?= ProfileCompletion($user_profile); ?>%;" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">
                                        <?= ProfileCompletion($user_profile); ?>% Complete</span>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- DASHBOARD -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/dashboard/" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title"><?= !empty($language->site_dashboard) ? $language->site_dashboard : "Dashboard"  ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- COMPANY PROFILE  -->
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'profile'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>employer/profile/" class="nav-link nav-toggle ">
                            <i class="icon-diamond"></i>
                            <span class="title"><?= !empty($language->site_company_profile) ? $language->site_company_profile : "Company Profile"  ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- JOB BOARD -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'job_board'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/job_board/" class="nav-link ">
                            <i class="icon-briefcase"></i>
                            <span class="title"><?= !empty($language->site_job_board) ? $language->site_job_board : "Job board"  ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Search Talent -->
                    <!--<li class="nav-item <?php if ($this->uri->segment(2) == 'search_candidate'): echo 'active'; endif?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title"><?= !empty($language->site_talent_search) ? $language->site_talent_search : 'Talent Search'?></span>
                            <span class="arrow open"></span>
                            <span class="selected"></span>
                        </a>

                        <ul class="sub-menu">
                            <li class="nav-item start <?php if ($this->uri->segment(2) == 'search_candidate'): echo 'active'; endif?>">
                                <a href="<?php echo base_url(); ?>employer/search_candidate/" class="nav-link">
                                    <i class="icon-magnifier"></i>
                                    <span class="title"><?= !empty($language->site_candidate_search) ? $language->site_candidate_search : 'Search Candidate'?></span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url(); ?>employer/candidates_bookmark" class="nav-link">
                                    <i class="icon-user-following"></i>
                                    <span class="title"><?= !empty($language->site_candidate_bookmark) ? $language->site_candidate_bookmark : 'Candidate Bookmark'?></span>
                                </a>
                            </li>

                        </ul>
                    </li>-->
                    <!-- CALENDAR -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'calendar'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/calendar/" class="nav-link ">
                            <i class="icon-calendar"></i>
                            <span class="title"><?= !empty($language->site_calendar) ? $language->site_calendar : "calendar"  ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- INBOX -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'inbox' || $this->uri->segment(2) == 'sent' || $this->uri->segment(2) == 'trash'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/inbox/" class="nav-link ">
                            <i class="icon-envelope"></i>
                            <span class="title"><?= !empty($language->site_inbox) ? $language->site_inbox : "inbox"  ?></span>
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
                    <!-- PURCHASE PACKAGE -->
                    <!--<li class="nav-item <?php if ($this->uri->segment(2) == 'purchase_package'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/purchase_package/" class="nav-link ">
                            <i class="icon-wallet"></i>
                            <span class="title">Purchase Package</span>
							<span class="selected"></span>
                        </a>
                    </li>-->
                    <!-- My Package -->
                    <!--<li class="nav-item <?php if ($this->uri->segment(2) == 'my_package'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/my_package/" class="nav-link ">
                            <i class="icon-present"></i>
                            <span class="title">My Package</span>
                            <span class="selected"></span>
                        </a>
                    </li>-->
                    <!-- Settings -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'settings'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/settings/" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title"><?= !empty($language->site_settings) ? $language->site_settings : "Settings"  ?></span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END SIDEBAR -->
