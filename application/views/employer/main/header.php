<!DOCTYPE html>
<!-- saved from url=(0073)https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html -->
<html lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title><?=$page_title?> | Employer</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description">

    <meta content="" name="author">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
	<!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />
	
    <link href="<?php echo CSS_EMPLOYER; ?>css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo CSS_EMPLOYER; ?>datatables.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>datatables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>socicon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-select.css" rel="stylesheet" type="text/css">

    <link href="<?php echo CSS_EMPLOYER; ?>daterangepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>clockface.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-fileinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>jquery.Jcrop.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>morris.css" rel="stylesheet" type="text/css">
	<link href="<?php echo CSS_EMPLOYER; ?>bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_EMPLOYER; ?>bootstrap-markdown.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>jqvmap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>pricing.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/inbox.min.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo CSS_EMPLOYER; ?>components-rounded.css" rel="stylesheet" id="style_components" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>plugins.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->
    <link href="<?php echo CSS_EMPLOYER; ?>image-crop.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>portfolio.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_EMPLOYER; ?>plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css">
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo CSS_EMPLOYER; ?>layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_EMPLOYER; ?>blue.min.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="<?php echo CSS_EMPLOYER; ?>custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
	<!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico">

</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">

    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <!-- <a href="index.html" class="text-logo font-40-xs md-white-text mt-2 letter-space-md font-weight-400"> -->
                <!-- <img src="../assets/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> -->
                <!-- X<small>REMO</small>  -->
                <!-- </a> -->
                <a href="<?php echo base_url(); ?>home/">
                    <img src="<?php echo IMG_EMPLOYER; ?>xremo-logo-white.svg" alt="logo" class="logo-default mt-height-70-xs mx-4 my-4">
                </a>
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
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

                        <!--<li class="">
                            <a href="<?=base_url()?>job/search" class="my-3 font-weight-700 md-orange-text text-darken-1 text-uppercase pull-left" target="_blank">Search Job</a>
                        </li>-->

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
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="avatar avatar-xtramini avatar-circle" src="<?php echo !empty($user_profile['img']) ?  IMG_EMPLOYERS.$user_profile['img'] : IMG_EMPLOYER.'xremo/xremo-logo-blue.png'?>">
								
								<span class="username username-hide-on-mobile"> <?php echo ucfirst($user_profile['name']); ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
							
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/dashboard/">
                                        <i class="icon-home"></i> Dashboard </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/profile/">
                                        <i class="icon-user"></i> Edit Profile </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" target="_blank">
                                        <i class="icon-book-open"></i> View My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/calendar/">
                                        <i class="icon-calendar"></i> My Calendar </a>
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
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!--<li class="dropdown dropdown-extended quick-sidebar-toggler">
                            <a href="<?php echo base_url(); ?>site/user/logout" style="padding: 0px 15px;">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>                                
                            </a>
                        </li>-->
                        <!-- END QUICK SIDEBAR TOGGLER -->
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
                    <li class="nav-item start px-2 py-4 ">
                        <div class="nav-link">
                            <div class="m-grid mb-2 mt-4">
                                <div class="m-grid-row md-white-text font-20-xs">
                                    <div class="m-grid-col m-grid-col-xs-10 m-grid-col-left">Profile Completion</div>
                                    <div class="m-grid-col m-grid-col-xs-2 m-grid-col-right"><?= ProfileCompletion($user_profile); ?>%</div>
                                </div>
                            </div>
                            <div class="progress progress-lg ">
                                <span class="sr-only"> <?= ProfileCompletion($user_profile); ?>% Complete (warning) </span>
                                <div class="progress-bar bar-md-amber " role="progressbar" aria-valuenow="<?= ProfileCompletion($user_profile); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= ProfileCompletion($user_profile); ?>%">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/dashboard/" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
							<span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item  <?php if ($this->uri->segment(2) == 'profile'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>employer/profile/" class="nav-link nav-toggle ">
                            <i class="icon-diamond"></i>
                            <span class="title">Company Profile</span>
							<span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'job_board'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/job_board/" class="nav-link ">
                            <i class="icon-briefcase"></i>
                            <span class="title">Job Board</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'calendar'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/calendar/" class="nav-link ">
                            <i class="icon-calendar"></i>
                            <span class="title">Calendar</span>
							<span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'inbox' || $this->uri->segment(2) == 'sent' || $this->uri->segment(2) == 'trash'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/inbox/" class="nav-link ">
                            <i class="icon-envelope"></i>
                            <span class="title">Inbox</span>
							<?php 
								$data_message = getDataMessage("general");
								if($data_message['new'] > 0){
							?>
								<span class="badge badge-md-cyan"><?=$data_message['new']?></span>
							<?php }?>
							<span class="selected"></span>
                        </a>
                    </li>
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
                            <span class="title">Settings</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END SIDEBAR -->
