<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job | Description</title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Vendor Styles -->
    <link href="<?php echo ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/themify/themify.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <!-- Metronic -->
    <link href="<?php echo ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/rateit/rateit.css" rel="stylesheet" type="text/css" />

    <!-- Megakit Styles -->
    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" type="text/css" />
    <!-- Metronic Styles -->
    <link href="<?php echo ASSETS; ?>css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo ASSETS; ?>css/portfolio.min.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../custom_pages/favicon.ico" type="image/x-icon">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employer - Job Preview</title>
</head>

<body>
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

                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-width-180">
                        <!-- Logo -->
                        <div class="s-header-v2-logo ">
                            <a href="index.html" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG_STUDENTS; ?>xremo-logo-white.svg" alt="Xremo Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Xremo Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <!-- guest -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav" hidden>
                                <!-- <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link  g-color-md-orange-text ">Search Job</a>
                                </li> -->
                                <li class="s-header-v2-nav-item">
                                    <a href="about.html" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="services.html" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="contacts.html" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="article.html" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="login.html" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                    <a href="login.html" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                </li>
                            </ul>
                        </div>
                        <!--logged user -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav">
                                <!-- <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link md-orange-text">Search Job</a>
                                </li> -->
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>site/about/" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>site/services/" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>site/contacts" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="#" class="s-header-v2-nav-link">Article</a>
                                </li>

                                <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                    <a href="index.html" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="../assets/pages/img/avatars/team10.jpg" class="avatar avatar-xtramini avatar-circle" alt="">
                                        <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right">
                                        <li>
                                            <a href="<?php echo base_url();?>employer/dashboard/" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-home mr-3"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>employer/profile/" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-note mr-3"></i>Edit Profile</a>
                                        </li>
                                        <!-- <li>
                                            <a href="student-view-profile.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-book-open mr-3"></i>My Resume</a>
                                        </li> -->
                                        <li>
                                            <a href="<?php echo base_url();?>employer/calendar/" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-calendar mr-3"></i>My Calendar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url();?>site/user/logout/" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-key mr-3"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>

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
    <section class="s-promo-block-v4 g-bg-gradient-md-blue-grey mt-height-300-xs">
        <div class="container g-ver-center-xs text-center my-5 ">
            <h1 class="md-white-text font-weight-500 display-4"><?php echo isset($job->name) ? $job->name: 'Job title';?> </h1>
            <p class=" roboto-font mt-4 ">
                <span class="label label-md-green font-weight-500 md-shadow-z-1">
                    <i class="fa fa-money mr-2"></i><?php echo $this->session->userdata('forex')?> <?php echo $job->budget_min; ?> - <?php echo $this->session->userdata('forex');?> <?php echo $job->budget_max; ?></span>
                <span class="label label-md-red font-weight-500 md-shadow-z-1">
                    <i class="icon-pointer mr-2"><?php echo $this->session->userdata('country')?></i></span>
                <!-- <span class="label label-md-blue-grey font-weight-500 md-shadow-z-1">
                        <i class="fa fa-building-o mr-2"></i>Company Industry</span> -->
                <span class="label label-md-orange font-weight-500 md-shadow-z-1"><?php echo $job->employment_name ;?></span>
                <span class="label label-md-purple font-weight-500 md-shadow-z-1"><?php echo $job->position_name ;?></span>
            </p>
        </div>
    </section>
    <!--========== END PROMO : VIEW JOB TITLE==========-->

    <!--========== CONTENT ==========-->
    <div class="container ">
        <div class="row mx-0 mt-4">
            <!-- COL - Company / Job Description / Requirement / Nice To Have / Additional Info / Location -->
            <div class="col-md-9">
                <!-- Company -->
                <div class="row mb-5 mx-0">
                    <div class="media">
                        <div class="pull-left">
                            <img src="../assets/global/img/portfolio/600x600/011.jpg" alt="" class="avatar avatar-small">
                        </div>
                        <div class="media-body">
                            <h5 class="roboto-font mt-2  font-16-xs ">
                                <i class="fa fa-building-o mr-2"></i>
                                <a href="company-description.html" class="font-weight-500"><?php echo $user_profile['company_name'];?> </a>
                            </h5>
                            <h6 class="roboto-font  font-14-xs">
                                <i class="icon-pointer"></i> Subang , Selangor
                            </h6>
                            <h6>
                                <span class="label label-md-blue-grey font-weight-500 mb-2">
                                    <?php echo $user_profile['industry'];?></span>
                            </h6>
                        </div>
                    </div>
                    <!-- <h5 class="font-weight-500 md-indigo-text primary-font mb-1">Job Description</h5>
                    <hr class="my-2 mt-width-100-xs border-md-indigo">
                    <p class="roboto-font font-grey-gallery ">LoremLorem ipsum dolor sit amet, consectetur adipisicing elit. Eum hic officia molestiae quibusdam a,
                        necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum
                        expedita autem illo modi. Eum hic officia molestiae quibusdam a, necessitatibus earum ullam molestias.
                        Veniam, optio, natus. Recusandae deleniti, neque ullam harum expedita autem illo modi. Eum hic officia
                        molestiae quibusdam a, necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti,
                        neque ullam harum expedita autem illo modi.
                    </p> -->
                </div>

                <!-- Job Description -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text primary-font text-uppercase font-17-xs">JOB DESCRIPTION </h5>
                    <hr class="my-2 mt-width-100-xs border-md-indigo">
                    <p class="roboto-font font-grey-gallery  "><?php echo $job->job_description;?>
                    </p>

                    <!-- <ul class=" roboto-font font-grey-gallery ">
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                    </ul> -->
                </div>

                <!-- Requirement -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text roboto-font font-15-xs text-uppercase letter-space-xs">Requirement</h5>
                    <!-- <hr class="my-2 mt-width-100-xs border-md-indigo"> -->
                    <p class="roboto-font font-grey-gallery "><?php echo $job->qualifications;?>
                    </p>
                    <!-- <ul class=" roboto-font font-grey-gallery ">
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                    </ul> -->
                </div>

                <!-- Nice To Have -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text roboto-font font-15-xs text-uppercase letter-space-xs">Nice To Have</h5>
                    <!-- <hr class="my-2 mt-width-100-xs border-md-indigo"> -->
                    <p class="roboto-font font-grey-gallery "><?php echo $job->other_requirements;?>
                    </p>
                    <!-- <ul class=" roboto-font font-grey-gallery ">
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                    </ul> -->
                </div>

                <!-- Benefits -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text roboto-font font-15-xs text-uppercase letter-space-xs">Benefits</h5>
                    <p class="roboto-font font-grey-gallery "><?php echo $user_profile['benefits'];?>
                    </p>

                </div>
                <!-- Additional Info -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text roboto-font  font-15-xs text-uppercase letter-space-xs">Additional Info</h5>
                    <!-- <hr class="my-2 mt-width-100-xs border-md-indigo"> -->
                    <p class="roboto-font font-grey-gallery "><?php echo $job->additional_info;?>
                    </p>
                    <!-- <ul class=" roboto-font font-grey-gallery ">
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                        <li>
                            <p class="my-1">necessitatibus earum ullam molestias. Veniam, optio, natus. Recusandae deleniti, neque ullam harum </p>
                        </li>
                    </ul> -->
                </div>

                <!-- Location -->
                <div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-indigo-text roboto-font  font-15-xs text-uppercase letter-space-xs">Location</h5>
                    <h6 class=" roboto-font  font-14-xs ">
                        <i class="icon-pointer mr-2"></i>
                        Suite 20-01 & 20-02B, Level 20 , The Pinnacle, Persiaran Lagoon Bandar Sunway, 47500 Subang Jaya, Selangor, Malaysia. </h6>
                    <!-- <hr class="my-2 mt-width-100-xs border-md-indigo"> -->
                    <!-- <section class="s-google-map">
                        <div id="js-google-container" class="s-google-container g-height-400-xs"></div>
                    </section> -->
                    <div id="gmapbg" class="s-google-map" style="height: 300px;"></div>
                </div>

            </div>
            <!-- COL - Button / Share / List of Job Available from that company -->
            <div class="col-md-3">

                <!-- Button -->
                <div class="row mb-5 mx-0">
                    <button type="submit" id="post_job" data-id='<?php echo $job->id; ?>' class=" btn btn-block btn-md-orange roboto-font mt-sweetalert" data-title="Do you agree to post this job?" data-type="info" data-allow-outside-click="true" data-confirm-button-text="Yes, I agree"
                        data-confirm-button-class="btn-info">
                        <i class="icon-note mr-2 "></i>Post</button>
                    <a href="employer-jobboard.html?#modal_add_jobpost" target="_blank" class=" btn btn-block btn-md-indigo roboto-font">
                        <i class="fa fa-building-o mr-2 "></i>Edit</a>
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
                                        <h6 class="mt-1 mb-1 md-indigo-text font-weight-500 roboto-font">Nick Jonas
                                            <small class="">
                                                <i class="icon-pointer"></i> Kuala Lumpur</small>
                                        </h6>
                                        <p class="roboto-font text-none">Applied for job
                                            <strong class="text-capitallize">Web Developer</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group text-left mx-0 mb-2">
                                    <textarea name="" id="" class="form-control " rows="7" placeholder="Describe about yourself and why we should we hire you? Not more than 300 words"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer md-grey lighten-4">
                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-md-indigo ">Submit</button>
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
                            <li class="font-13-xs md-white-text font-weight-500 letter-space-xs text-uppercase">Sitemap</li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="../custom_pages/welcome.html">Home</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="../custom_pages/about.html">About</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="../custom_pages/services.html">Service</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="../custom_pages/contacts.html">Contacts</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="../custom_pages/article.html">Article</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 g-margin-b-40-xs g-margin-b-0-md">
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs">
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Subscribe to Our Newsletter</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="font-13-xs g-color-white-opacity" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1  g-padding-y-50-xs g-padding-y-0-md">
                        <h3 class="font-18-xs g-color-white roboto-font">Xremo </h3>
                        <p class="g-color-white-opacity">We offers you an online career building experience, as Xciting as online dating.</p>
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs list-inline">
                            <li>
                                <a class="fa fa-youtube font-24-xs social-yt" href="https://www.youtube.com"></a>
                            </li>
                            <li>
                                <a class=" social-tw font-24-xs fa fa-twitter" href="https://www.twitter.com"></a>
                            </li>
                            <li>
                                <a class=" fa fa-facebook social-fb font-24-xs" href="https://www.facebook.com"></a>
                            </li>
                            <li>
                                <a class=" fa fa-linkedin social-li font-24-xs" href="https://www.linkedin.com"></a>
                            </li>
                            <li>
                                <a class=" fa fa-google-plus social-gplus font-24-xs" href="https://www.linkedin.com"></a>
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
                    <a href="index.html">
                        <img class="g-height-35-xs" src="<?php echo IMG_STUDENTS; ?>xremo-logo-white.png" alt=" Xremo Logo">
                    </a>
                </div>
                <div class="col-xs-6 g-text-right-xs">
                    <p class="g-font-size-14-xs g-margin-b-0-xs g-color-white-opacity-light mt-2">
                        <i class="fa fa-copyright fa-fw"></i>2017 Copyright Xremo.com
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copyright -->
    </footer>
    <!--========== END FOOTER ==========-->

    <a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>
    <!-- Back To Top -->

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.migrate.min.js"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- Megakit -->
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.wow.min.js"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>rateit/jquery.rateit.min.js" type="text/javascript"></script>

    <!-- General Components and Settings -->
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>global.min.js"></script>
    <script src="<?php echo JS_STUDENTS; ?>app.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>portfolio-3-col.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>wow.min.js"></script>
    <script src="<?php echo JS_EMPLOYER; ?>sweetalert.min.js" type="text/javascript"></script>
    <link href="<?php echo CSS_EMPLOYER; ?>sweetalert.css" rel="stylesheet" type="text/css">

    <script>
        $(document).ready(function () {
            $('#post_job').click(function(){
                var del = $(this).attr('data-id');
                    swal({
                        title: "Do you agree to post this job?",
                        type: "info",
                        confirmButtonText: "Yes, I agree",
                        closeOnConfirm: false
                    },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url:"<?php echo base_url();?>employer/job_board/post_job",
                                    method:"POST",
                                    data: {
                                      post_id: parseInt(del),
                                    },
                                    success:function(response) {
                                       swal("Success", "Job Has been posted.", "success");
                                       location.reload();
                                    }
                                  })
                            } else {
                                swal("Cancelled", "Post a job has been cancelled", "error");
                            }
                        }
                    );
            });
        });
    </script>
</body>

</html>