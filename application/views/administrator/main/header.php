<!DOCTYPE html>
<!-- saved from url=(0073)https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html -->
<html lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title><?=$page_title?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description">

    <meta content="" name="author">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&amp;subset=all">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!--<link href="<?php echo CSS_EMPLOYER; ?>css" rel="stylesheet" type="text/css">-->
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
    <link href="<?php echo JS; ?>plugins/autocomplete.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/inbox.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
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
                <a href="<?=base_url()?>administrator/job_seeker">
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
                <!--<form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>-->
                <!-- END HEADER SEARCH BOX -->

                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">

                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

						<!-- === NOTIFICATION, UNCOMMENT THIS === -->
                        <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                            </ul>
                        </li>-->
						
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
						<!-- === NOTIFICATION, UNCOMMENT THIS === -->
						<!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default"> 4 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        <li>
                                            <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_EMPLOYER; ?>avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_EMPLOYER; ?>avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_EMPLOYER; ?>avatar1.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_EMPLOYER; ?>avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-jobboard.html#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_EMPLOYER; ?>avatar3.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
                                                </span>
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                            </ul>
                        </li>-->
						
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
						<!-- === NOTIFICATION, UNCOMMENT THIS === -->
						<!--<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-default"> 3 </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/app_todo.html">view all</a>
                                </li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                                <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                            </ul>
                        </li>-->
						
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo IMG_EMPLOYER; ?>avatar3_small.jpg">
                                <span class="username username-hide-on-mobile"> <?=$this->session->userdata('name')?> </span>
                                <!--<i class="fa fa-angle-down"></i>-->
                            </a>
                            <!--<ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/profile/">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>employer/calendar/">
                                        <i class="icon-calendar"></i> My Calendar </a>
                                </li>
                                <li>
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
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_lock_1.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>site/user/logout/">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>-->
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended quick-sidebar-toggler">
                            <a href="<?php echo base_url(); ?>site/user/logout" style="padding: 0px 15px;">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>                                
                            </a>
                        </li>
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
                    <!--<li class="nav-item start px-2 py-4 ">
                        <div class="nav-link">
                            <div class="m-grid mb-2 mt-4">
                                <div class="m-grid-row md-white-text font-20-xs">
                                    <div class="m-grid-col m-grid-col-xs-10 m-grid-col-left">Profile Completion</div>
                                    <div class="m-grid-col m-grid-col-xs-2 m-grid-col-right">76%</div>
                                </div>
                            </div>
                            <div class="progress progress-lg ">
                                <span class="sr-only"> 60% Complete (warning) </span>
                                <div class="progress-bar bar-md-amber " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                </div>
                            </div>
                        </div>
                    </li>-->
					<li class="nav-item <?php if ($this->uri->segment(2) == 'student' || $this->uri->segment(2) == 'dashboard'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/student" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Student</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'job_seeker'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/job_seeker" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Job Seeker</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'employer'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/employer" class="nav-link ">
                            <i class="icon-moustache"></i>
                            <span class="title">Employer</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'job_board'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/job_board" class="nav-link ">
                            <i class="icon-briefcase"></i>
                            <span class="title">Job List</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'package'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/package" class="nav-link ">
                            <i class="icon-wallet"></i>
                            <span class="title">Package</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'service_item'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/service_item" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Service Item</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'industry'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/industry" class="nav-link ">
                            <i class="icon-diamond"></i>
                            <span class="title">Industry</span>
							<span class="selected"></span>
                        </a>
					</li>
					<!--<li class="nav-item <?php if ($this->uri->segment(2) == 'speciaization'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/speciaization" class="nav-link ">
                            <i class="icon-magic-wand"></i>
                            <span class="title">Specialization</span>
                        </a>
					</li>-->
					<li class="nav-item <?php if ($this->uri->segment(2) == 'article'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/article" class="nav-link ">
                            <i class="icon-feed"></i>
                            <span class="title">Article</span>
							<span class="selected"></span>
                        </a>
					</li>
					<li class="nav-item <?php if ($this->uri->segment(2) == 'pages'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/pages" class="nav-link ">
                            <i class="icon-note"></i>
                            <span class="title">Pages</span>
							<span class="selected"></span>
                        </a>
					</li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'translation'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>administrator/translation" class="nav-link ">
                            <i class="icon-note"></i>
                            <span class="title">Translation</span>
                            <span class="selected"></span>
                        </a>
                    </li>
					<!-- Sidebar Menu : Sales -->
                    <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'sales' || $this->uri->segment(2) == 'sales'): echo 'active'; endif?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title">Sales</span>
                            <span class="arrow open"></span>
                            <span class="selected"></span>
                        </a>

                        <ul class="sub-menu">
                            <li class="nav-item start <?php if ($this->uri->segment(2) == 'search_candidate'): echo 'active'; endif?>">
                                <a href="<?php echo base_url(); ?>employer/search_candidate/" class="nav-link">
                                    <i class="icon-magnifier"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>administrator/sales/shortlist" class="nav-link">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Shortlist Target</span>
                                </a>
                            </li>

                        </ul>
                    </li> -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'ticketing' || $this->uri->segment(2) == 'ticketing'): echo 'active'; endif?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title">Tracking</span>
                            <span class="arrow open"></span>
                            <span class="selected"></span>
                        </a>

                        <ul class="sub-menu">
                            <li class="nav-item start <?php if ($this->uri->segment(2) == 'tracking'): echo 'active'; endif?>">
                                <a href="<?php echo base_url(); ?>administrator/tracking/" class="nav-link">
                                    <i class="icon-magnifier"></i>
                                    <span class="title">Tracking Voucher</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>administrator/tracking/user" class="nav-link">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Tracking User</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!--<li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/dashboard/" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link  nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Company Profile</span>
                            <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'profile'): echo 'active'; endif?> start ">
                                <a href="<?php echo base_url(); ?>employer/profile/" class="nav-link <?php if ($this->uri->segment(3) == 'profile'): echo 'active'; endif?>">
                                    <span class="title">Overview</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="nav-item start <?php if ($this->uri->segment(2) == 'gallery'): echo 'active'; endif?> ">
                                <a href="<?php echo base_url(); ?>employer/gallery/" class="nav-link ">
                                    <span class="title">Gallery</span>
                                </a>
                            </li>

                        </ul>
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
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'inbox'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/inbox/" class="nav-link ">
                            <i class="icon-envelope"></i>
                            <span class="title">Inbox</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'purchase_package'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/purchase_package/" class="nav-link ">
                            <i class="icon-wallet"></i>
                            <span class="title">Purchase Package</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'my_package'): echo 'active'; endif?> ">
                        <a href="<?php echo base_url(); ?>employer/my_package/" class="nav-link ">
                            <i class="icon-present"></i>
                            <span class="title">My Package</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">Settings</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start ">
                                <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-settings-account.html" class="nav-link ">
                                    <i class="icon-list"></i>
                                    <span class="title">Account</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/employer-settings-payment.html" class="nav-link ">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Payment</span>
                                </a>
                            </li>

                        </ul>
                    </li>
					-->
                </ul>
            </div>
        </div>
        <!-- END SIDEBAR -->
