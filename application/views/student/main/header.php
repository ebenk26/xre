<!DOCTYPE html>
<!-- saved from url=(0073)https://xremo.github.io/XremoFrontEnd/custom_pages/student-dashboard.html -->
<html lang="en"><!-- BEGIN HEAD --><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Student | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo CSS_STUDENTS; ?>main-font-css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo CSS_STUDENTS; ?>daterangepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>morris.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo CSS_STUDENTS; ?>components.css" rel="stylesheet" id="style_components" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>components-md.css" rel="stylesheet" id="style_components" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>plugins.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo CSS_STUDENTS; ?>layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS_STUDENTS; ?>default.min.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="<?php echo CSS_STUDENTS; ?>custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">

    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo base_url();?>site/home/">
                    <img src="<?php echo IMG_STUDENTS; ?>xremo-logo-white.svg" alt="logo" class="logo-default mt-height-70-xs my-4">
                </a>
            </div>
            <!-- END LOGO -->

            <!-- RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

            <!-- BEGIN PAGE TOP -->
            <div class="page-top">

                <!-- BEGIN HEADER SEARCH BOX -->
                <form class="search-form" action="<?php echo base_url(); ?>student/search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
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
                        <li class="separator hide"> </li>
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        <li class="dropdown dropdown-extended dropdown-notification dropdown-hoverable" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <!-- <span class="badge badge-success"> 7 </span> -->
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                    <a href="#">view all</a>
                                </li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        <!-- <li>
                                            <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                            </a>
                                        </li> -->
                                    </ul><div class="slimScrollBar"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <li class="separator hide"> </li>
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark dropdown-hoverable" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-danger"> 1 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">1 New</span> Messages</h3>
                                    <a href="<?php echo base_url().'student/inbox/'; ?>">view all</a>
                                </li>
                                <li>
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="<?php echo IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Xremo Team </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Welcome to xremo </span>
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <li class="separator hide"> </li>
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <!-- <span class="badge badge-primary"> 3 </span> -->
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/student-dashboard.html?p=page_todo_2">view all</a>
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
                        </li>
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('name'); ?> </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                <img alt="" class="img-circle" src="<?php echo !empty($user_profile['image']['name']) ?  IMG_STUDENTS.$user_profile['image']['name'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>"> </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_profile_1.html">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/app_calendar.html">
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
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/page_user_login_1.html">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
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
                <ul class="page-sidebar-menu my-0 md-shadow-z-2 pb-4" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item mt-element-card-v2">
                        <div class="mt-card-item ">
                            <div class="mt-card-avatar text-center">
                                <img src="<?php echo !empty($user_profile['image']['name']) ?  IMG_STUDENTS.$user_profile['image']['name'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar-circle avatar-small">
                            </div>
                            <div class="mt-card-content ">
                                <h3 class="mt-card-name font-24-xs mt-3"><?php echo ucfirst($this->session->userdata('name'));?></h3>
                                <p class="mt-card-desc md-grey-text text-darken-1">Student</p>
                                <div class="mt-progress mb-5">
                                
                                    <div class="progress">
                                        <span style="width: <?php echo $percent; ?>%;" class="progress-bar progress-bar bar-md-orange darken-1">
                                                <span class="sr-only"><?php echo $percent; ?> progress</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title">Profile Completion</div>
                                        <div class="status-number "><?php echo $percent; ?>%</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>

                    <!-- Sidebar Menu : Dashboard -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'dashboard'): echo 'active'; endif?>">
                        <a href="<?php echo base_url();?>student/dashboard/" class="nav-link">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Profile-->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'profile'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>student/profile/" class="nav-link nav-toggle">
                            <i class="icon-user"></i>
                            <span class="title">Profile</span>
                            <!-- <span class="selected"></span> -->
                        </a>
                    </li>
                    <!-- Sidebar Menu Job Apllication History -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'application_history'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>student/applications_history/" class="nav-link">
                            <i class="icon-notebook"></i>
                            <span class="title">Application History</span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Inbox -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'inbox'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>student/inbox/" class="nav-link">
                            <i class="icon-envelope"></i>
                            <span class="title">Inbox</span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Calendar  -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'calendar'): echo 'active'; endif?>">
                        <a href="<?php echo base_url(); ?>student/calendar/" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span class="title">Calendar</span>
                            <span class="badge  badge-md-orange">3</span>
                        </a>
                    </li>
                    <!-- Sidebar Menu : Wishlist-->
                    <!-- <li class="nav-item">
                        <a href="javascript:;" class="nav-link">
                            <i class="icon-heart"></i>
                            <span class="title">Wish List</span>
                        </a>
                    </li> -->

                    <!-- Sidebar Menu : Settings -->
                    <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'settings'): echo 'active'; endif?>">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">Settings</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item ">
                                <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/index.html" class="nav-link ">
                                    <!-- <i class="icon-bar-chart"></i> -->
                                    <!-- <span class="title">Account</span>
                                </a>
                            </li>
                        </ul> -->
                    <!-- </li> -->

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
