<?php 
    $header_image = end($header_photo); 
	$profile_image = end($profile_photo);
	$company_location = json_decode($detail['address']);
    $login = $this->session->userdata('id');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Company | Description</title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Vendor Styles -->
    <link href="<?php echo ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/themify/themify.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <!-- Metronic -->
    <link href="<?php echo ASSETS; ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/rateit/rateit.css" rel="stylesheet" type="text/css" />

    <!-- Megakit Styles -->
    <!-- Metronic Styles -->
    <link href="<?php echo ASSETS; ?>css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo ASSETS; ?>css/portfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/contact.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body class="g-bg-color-sky-light">
    <!--========== HEADER  ==========-->
    <header class="navbar-fixed-top s-header js-header-sticky js-header-overlay">
        <!-- Navbar -->
        <nav class="s-header-v2-navbar">
            <div class="container g-display-table-lg">
                <!-- Navbar Row -->
                <div class="s-header-v2-navbar-row">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="s-header-v2-navbar-col">
                        <button type="button" class="collapsed s-header-v2-toggle" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                            <span class="s-header-v2-toggle-icon-bar"></span>
                        </button>
                    </div>

                    <!-- Logo -->
                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-width-180">
                        <div class="s-header-v2-logo ">
                            <a href="<?php echo base_url(); ?>" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" alt="Dublin Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Dublin Logo">
                            </a>
                        </div>
                    </div>
                    <!-- End Logo -->

                    <!-- Content -->
                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <!-- guest -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav">
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>job/search" class="s-header-v2-nav-link ">Search Job</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>contacts" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <?php if (!empty($login)): ?>
                                    <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                        <a href="<?php echo base_url(); ?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <img src="../assets/pages/img/avatars/team10.jpg" class="avatar avatar-xtramini avatar-circle" alt="">
                                            <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right">
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/dashboard" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-home mr-3"></i>Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/profile" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-note mr-3"></i>Edit Profile</a>
                                            </li>
                                            <li>
                                                <a href="student-view-profile.html" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>My Resume</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/calendar" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-calendar mr-3"></i>My Calendar</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-key mr-3"></i>Log Out</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="s-header-v2-nav-item">
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <!--logged user -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav hidden">
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>job_search" class="s-header-v2-nav-link">Search Job</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>contacts" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>

                                <?php if (!empty($login)): ?>
                                    <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                        <a href="<?php echo base_url(); ?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <img src="../assets/pages/img/avatars/team10.jpg" class="avatar avatar-xtramini avatar-circle" alt="">
                                            <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right">
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/dashboard" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-home mr-3"></i>Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/profile" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-note mr-3"></i>Edit Profile</a>
                                            </li>
                                            <li>
                                                <a href="student-view-profile.html" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>My Resume</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>student/calendar" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-calendar mr-3"></i>My Calendar</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-key mr-3"></i>Log Out</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="s-header-v2-nav-item">
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <!-- End Nav Menu -->
                    </div>
                </div>
                <!-- End Navbar Row -->
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
    <!--========== END HEADER ==========-->

    <!--========== PROMO : VIEW JOB TITLE==========-->
    <div class="s-promo-block-v2 g-bg-gradient-darkblue-strong mt-height-300-xs" style="background: url(<?php echo IMG_EMPLOYERS; ?><?php echo $header_image['name']; ?>) no-repeat fixed; z-index: -1;">
    </div>
    <div class="container mt-margin-t-o-120-xs ">
        <div class="row mx-0">
            <div class="s-mockup-v3 md-transparent ">
                <div class="media py-4 ">
                    <div class="pull-left mr-3">
                        <img src="<?php echo IMG_EMPLOYERS; ?><?php echo $profile_image['name']; ?>" alt="" class="avatar avatar-large avatar-border-sm  p-2 md-white border-mdo-bluegrey-slight g-box-shadow-dark-lightest-v3">
                    </div>
                    <div class="media-body ">
                        <h1 class="roboto-font mt-2 font-weight-500 md-white-text "><?php echo $detail['company_name']; ?></h1>
                        <h6 class="mb-1 roboto-font mdo-white-strong-text font-weight-300">
                            <i class="fa fa-building-o mr-2 hidden"></i> <?php echo $detail['industry'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--========== END PROMO : VIEW JOB TITLE==========-->

    <!--========== CONTENT ==========-->

    <div class="container ">
        <div class="row  mx-0 mt-2">
            <!-- About Company / Job Post -->
            <div class="col-md-9 mt-height-100-percent-xs ">
                <div class="portlet light  ">
                    <div class="portlet-title tabbable-line tab-border-md-orange">
                        <ul class="nav nav-tabs pull-left">
                            <li class="active">
                                <a href="#tab_about_info" data-toggle="tab" class="font-14-xs roboto-font">
                                    <i class="icon-notebook mr-2"></i>About Company</a>
                            </li>
                            <li>
                                <a href="#tab_job_info" data-toggle="tab" class="font-14-xs roboto-font">
                                    <i class="icon-briefcase mr-2"></i>Job Post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_about_info">
                                <!-- About Company -->
                                <div class="row mt-3 mb-5 mx-0">
                                    <h5 class="font-weight-600 md-grey-text text-darken-3 primary-font font-20-xs text-uppercase letter-space-xs">About <?php echo $detail['company_name']; ?></h5>
                                    <hr class="g-hor-border-1-solid-md-orange my-2 mt-width-60-xs">
                                    <p class="roboto-font font-grey-gallery "><?php echo $detail['company_description']; ?>
                                    </p>
                                </div>

                                <!-- Location -->
                                <div class="row mb-5 mx-0">
                                    <h5 class="font-weight-600 md-grey-text text-darken-3 roboto-font  font-17-xs text-uppercase letter-space-xs">Location</h5>
                                    <hr class="g-hor-border-1-solid-md-orange my-2 mt-width-60-xs">
                                    <div id="gmapbg" class="s-google-map mt-height-auto-xs mt-height-300-xs my-4"></div>
                                    <ul class="list-unstyled">
                                    	<?php foreach ($company_location as $key => $value) {
                                    		?>
                                    		<li>
	                                            <h5 class="font-weight-600 md-grey-text text-darken-3 roboto-font  font-15-xs text-uppercase letter-space-xs"><?php echo $value->optionsRadios == 'HQ' ? 'Headquarter' : $value->optionsRadios; ?></h5>
	                                            <h6 class=" roboto-font  font-14-xs mb-1">
	                                                <i class="icon-pointer mr-2"></i><?php echo $value->building_address; ?> </h6>
	                                            <ul class="list-inline list-unstyled mx-0">
	                                                <li>
	                                                    <h6 class=" roboto-font  font-14-xs ">
	                                                        <i class="fa fa-phone mr-2"></i><?php echo $value->building_phone; ?> </h6>
	                                                </li>
	                                                <li>
	                                                    <h6 class=" roboto-font  font-14-xs ">
	                                                        <i class="fa fa-fax mr-2"></i><?php echo $value->building_fax; ?> </h6>
	                                                </li>
	                                            </ul>
	                                        </li>
                                    	<?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_job_info">

                                <ul class="list-group list-border pt-0">
                                    <!-- Content -->
                                    <?php foreach ($job as $key => $value) {?>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-right ">
                                                    <a href="job-description.html" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                                </div>
                                                <div class="media-body ">
                                                    <h6 class="my-1 font-weight-700 roboto-font">
                                                        <a><?php echo !empty($value['name']) ? $value['name'] :'' ; ?> </a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <p class="my-1 roboto-font">
                                                <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                                <span class="label label-md-red label-sm">Location</span>
                                                <span class="label label-md-blue label-sm">Job Type</span>
                                                <span class="label label-md-purple label-sm">Position Level</span>
                                            </p>
                                            <p class="multiline-truncate roboto-font font-weight-300 mb-3"><?php echo !empty($value['job_description']) ? $value['job_description'] : ''; ?>
                                            </p>
                                        </li>
                                    <?php } ?>
                                    <!-- Pagination -->
                                    <li class="list-group-item px-0 ">
                                        <ul class="pagination pagination-lg">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 1 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 2 </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;"> 3 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 4 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 5 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> 6 </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <!-- Company Short Info -->
                <div class="row mb-5   mx-0 ">
                    <ul class="list-unstyled ">
                        <!-- Company Industry -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-industry mr-1"></i>Industry</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['industry']; ?>
                            </p>
                        </li>

                        <!-- Company Size -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-building-o mr-1"></i>Company Size</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['total_staff']; ?> People
                            </p>
                        </li>

                        <!-- Working Hour -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="icon-clock mr-1"></i>Working Hour</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['working_hours']; ?>
                            </p>
                        </li>

                        <!-- Dress Code -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="icon-users mr-1"></i>Dress Code </h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['dress_code']; ?>
                            </p>
                        </li>

                        <!-- Website -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="icon-screen-desktop mr-1"></i>Website </h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <a href="https://www.xremo.com"><?php echo $detail['url']; ?></a>
                            </p>
                        </li>

                        <!-- Spoken Language -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-language mr-1"></i>Spoken Language </h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['spoken_language']; ?>
                            </p>
                        </li>

                        <!-- Benefit -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-diamond mr-1"></i>Benefit </h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['benefits'] ?>
                            </p>
                        </li>
                    </ul>
                </div>

                <!-- Follow Me Social Icons -->
                <div class="row mb-5 mx-0 ">
                    <h5 class="font-weight-600 md-orange-text roboto-font mb-2 font-15-xs text-uppercase letter-space-xs">Follow Me </h5>
                    <ul class="social-icons social-icons-color">
                    	<?php foreach ($social as $key => $value) { 
                            switch ($value['name']) {
                                case 'facebook':
                                    ?>
                                <li>
		                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Facebook" class="facebook"> </a>
		                        </li>
                            <?php break;
                                case 'twitter': ?>
                                <li>
                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Twitter"  class="twitter"></a>
                                </li>        
                            <?php break;
                                case 'linkedin': ?>
                                <li>
                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Linked In"  class="linkedin"></a>
                                </li>        
                            <?php break;
                                case 'gplus': ?>
                                <li>
                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="googleplus" data-original-title="Google Plus"></a>
                                </li>
                            <?php break; default:?>
                                <li>
                                    
                                </li>
                            <?php break; } ?>
                            
                        <?php } ?>
                    </ul>
                </div>
                <!-- Ad -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-orange-text roboto-font mb-2 font-15-xs text-uppercase letter-space-xs">Recent view
                        <!-- <a href="" class="md-orange-text">Company #1</a> -->
                    </h5>
                    <!-- <div class="g-fullheight-xs md-yellow col-md-12">
                        Here is Advertisement o r whatsover
                    </div> -->
                    <ul class="list-unstyled">
                        <li>
                            <a href="">Petronas</a>
                        </li>
                        <li>
                            <a href="">Company #2</a>
                        </li>
                        <li>
                            <a href="">Company #3</a>
                        </li>
                        <li>
                            <a href="">Company #3</a>
                        </li>
                        <li>
                            <a href="">Company #3</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <!-- Modal Job Apply-->
        <div class="modal fade modal-open-noscroll " id="modal_job_apply" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="roboto-font mb-0">Short Description About Yourself</h5>
                        <!-- <div class="media ">
                            <div class="pull-left">
                                <img src="../assets//pages//img/avatars/team10.jpg" alt="" class="avatar avatar-tiny avatar-circle">
                            </div>
                            <div class="media-body">
                                <h5 class="mt-3 mb-1">Nick Jonas</h5>
                                <p class="roboto-font">Student </p  >
                            </div>
                        </div> -->
                    </div>
                    <form action="" class="form form-horizontal">
                        <div class="modal-body  ">
                            <div class="scroller mt-height-250-xs" data-always-visible="1" data-rail-visible1="1">
                                <div class="media ">
                                    <div class="pull-left">
                                        <img src="../assets//pages//img/avatars/team10.jpg" alt="" class="avatar avatar-mini avatar-circle">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-1 mb-1 md-orange-text font-weight-500 roboto-font">Nick Jonas
                                            <small class="">
                                                <i class="icon-pointer"></i> Kuala Lumpur</small>
                                        </h6>
                                        <p class="roboto-font text-none">Applied for job
                                            <strong class="text-capitallize">Web Developer</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group text-left mx-0 mb-2">
                                    <textarea name="" id="" class="form-control " rows="7" placeholder="Tell me more about yourself and sell out your creativity in here to this company! Not more than 300 words"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer md-grey lighten-4">
                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-md-orange ">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!--========== END CONTENT ==========-->

    <!--========== FOOTER ==========-->
    <footer class="g-bg-color-dark">
        <!-- Links -->
        <div class="g-hor-divider-dashed-white-opacity-lightest">
            <div class="container g-padding-y-40-xs">
                <div class="row">
                    <div class="col-sm-3 g-margin-b-20-xs g-margin-b-0-md">
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs">
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="<?php echo base_url() ?>home">Home</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="<?php echo base_url() ?>about">About</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="<?php echo base_url(); ?>services">Service</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="<?php echo base_url(); ?>contacts">Contacts</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="<?php echo base_url(); ?>article">Article</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 g-margin-b-40-xs g-margin-b-0-md">
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs">
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="terms-use.html">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1  g-padding-y-50-xs g-padding-y-0-md">
                        <h3 class="g-font-size-18-xs g-color-white">Xremo </h3>
                        <p class="g-color-white-opacity">We offers you an online career building experience, as Xciting as online dating.</p>
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs list-inline">
                            <li>
                                <a class="fa fa-youtube-play fa-lg social-yt" href="https://www.youtube.com/channel/UCMFZ8a2QlaWHhPrPf2CURSw"></a>
                            </li>
                            <li>
                                <a class=" social-tw fa-lg fa fa-twitter" href="https://twitter.com/xremomy"></a>
                            </li>
                            <li>
                                <a class=" fa fa-facebook social-fb fa-lg" href="https://www.prod.facebook.com/xremomy/"></a>
                            </li>
                            <li>
                                <a class=" fa fa-linkedin social-li fa-lg" href="https://www.linkedin.com/company/6382421/"></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Links -->

        <!-- Copyright -->
        <div class="container g-padding-y-20-xs">
            <div class="row">
                <div class="col-xs-6">
                    <a href="<?php echo base_url(); ?>">
                        <img class="g-height-40-xs" src="<?php echo IMG; ?>/site/xremo.png" alt=" Xremo Logo">
                    </a>
                </div>
                <div class="col-xs-6 g-text-right-xs">
                    <p class="g-font-size-14-xs g-margin-b-0-xs g-color-white-opacity-light my-3">
                        <i class="fa fa-copyright fa-fw"></i><?php echo date('Y') ?> Copyright Xremo.com
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copyright -->
    </footer>
    <!--========== END FOOTER =======s===-->

    <a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>
    <!-- Back To Top -->

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Megakit -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

    <!-- General Components and Settings -->

    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false" ></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script> -->
    <!-- <script type="text/javascript" src="https://www.google.com/maps/embed/v1/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U" type="text/javascript"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U"></script> -->
    <!-- <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/gmaps/gmaps.min.js"></script> -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/clipboardjs/clipboard.min.js"></script>

    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>global.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>app.min.js"></script>


    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>components-clipboard.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>components-bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>wow.min.js"></script>
    <script>
      function initMap() {
        var latLang = {lat: -34.397, lng: 150.644};
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('gmapbg'), {
          center: latLang,
          zoom: 8
        });

         var marker = new google.maps.Marker({
          map: map,
          position: latLang,
          title: 'Hello World!'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&callback=initMap"
    async defer></script>
</body>

</html>