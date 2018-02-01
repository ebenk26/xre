<?php   $id = $this->session->userdata('id'); 
        $roles= $this->session->userdata('roles');

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Student | View Profile</title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

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
    <title>Student - My Profile</title>
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
                            <a href="<?php echo base_url(); ?>" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG_STUDENTS; ?>xremo-logo-white.svg" alt="logo" alt="Xremo Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Xremo Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <!-- guest -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse" hidden>
                            <ul class="s-header-v2-nav" hidden>
                                <!-- <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link  g-color-md-orange-text ">Search Job</a>
                                </li> -->
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                    <a href="<?php echo base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                </li>
                            </ul>
                        </div>
                        <!--logged user -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse" >
                            <ul class="s-header-v2-nav">
                                <!-- <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link md-orange-text">Search Job</a>
                                </li> -->
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <?php if(!empty($id)){?>
                                <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                    <a href="index.html" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-xtramini avatar-circle" alt="">
                                        <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right">
                                        <li>
                                            <a href="<?php echo base_url(); ?><?php echo $roles; ?>/dashboard" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-home mr-3"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?><?php echo $roles; ?>/profile" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-note mr-3"></i>Edit Profile</a>
                                        </li>
                                        <?php if ($roles !='employer') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>profile/user/<?php echo rtrim(base64_encode($id),'=');?>" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>My Resume</a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?><?php echo $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-calendar mr-3"></i>My Calendar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-key mr-3"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php }else{ ?>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    <a href="<?php echo base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                </li>
                                <?php } ?>

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


    <!--========== PROMO : VIEW ==========-->

    <div class="view  hm-black-strong mt-height-300-xs  visible-md visible-lg" style="background: url('<?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>'); ">
        <div class="mask ">
            <div class="container g-padding-y-110-xs ">
                <div class="col-md-9 col-xs-12">
                    <ul class="list-unstyled mx-0">
                        <li>
                            <h3 class="font-34-md  font-30-xs  md-orange-text text-lighten-1 font-weight-500  mt-3 "><?php echo !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?></h3>
                        </li>
                        <li hidden>
                            <ul class="list-unstyled list-inline mx-0  ">
                                <li>
                                    <small class="mdo-white-strong-text">
                                        <i class="icon-pointer  "></i> Ipoh , Perak</small>
                                </li>
                                <li>
                                    <small class="mdo-white-strong-text">
                                        <i class="fa fa-phone "></i> (+60) 12345678</small>
                                </li>
                                <li>
                                    <small class="mdo-white-strong-text">
                                        <i class="icon-envelope"></i> jennifer_lawrence@gmail.com</small>
                                </li>
                            </ul>
                        </li>
                        <hr class="border-mdo-white-slight mt-width-200-xs">

                        <li>
                            <p class=" font-14-xs font-weight-500 mdo-white-strong-text">
                                <i class="fa fa-quote-left font-10-xs vertical-top"></i><?php echo !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
                                <i class="fa fa-quote-right vertical-top font-10-xs"></i>
                            </p>
                        </li>
                        <li>

                            <ul class="list-inline list-unstyled mx-0 ">
                                <li>
                                    <h5 class="md-white-text font-weight-700 text-uppercase letter-space-xs">
                                        Share my resume to
                                    </h5>
                                </li>
                                <li>
                                    <i class="fa fa-facebook g-font-size-20-xs social-fb"></i>
                                </li>
                                <li>
                                    <i class="fa fa-google-plus g-font-size-20-xs social-gplus"></i>
                                </li>
                                <li>
                                    <i class="fa fa-linkedin g-font-size-20-xs social-li"></i>
                                </li>
                                <li>
                                    <i class="fa fa-twitter g-font-size-20-xs social-tw"></i>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3  col-xs-12 text-center">
                    <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" alt="" class="avatar avatar-large avatar-circle ">
                    <li hidden>
                        <!-- <h5 class="md-white-text font-weight-700 text-uppercase letter-space-xs">
                            Share:
                        </h5> -->
                        <ul class="list-inline list-unstyled mx-0">
                            <li>
                            </li>
                            <li>
                                <i class="fa fa-facebook g-font-size-20-xs social-fb"></i>
                            </li>
                            <li>
                                <i class="fa fa-google-plus g-font-size-20-xs social-gplus"></i>
                            </li>
                            <li>
                                <i class="fa fa-linkedin g-font-size-20-xs social-li"></i>
                            </li>
                            <li>
                                <i class="fa fa-twitter g-font-size-20-xs social-tw"></i>
                            </li>

                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <!-- Visible when 768px to below  -->
    <div class="visible-sm visible-xs">
        <div class="view  hm-black-strong mt-height-250-xs " style="background: url('<?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>');">
            <div class="mask"></div>
        </div>
        <div class="mt-element-card-v2 text-center  ">
            <div class="mt-card-item p-0">
                <div class="mt-card-avatar  mt-margin-t-o-70-xs">
                    <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-circle avatar-medium ">
                    <!-- <a href="" class="btn btn-icon-only btn-circle btn-outline-md-indigo mt-margin-l-o-60-xs"><i class="icon-pencil"></i></a> -->
                </div>
                <div class="mt-card-content px-3  ">
                    <h3 class="mt-card-name my-3 md-orange-text "><?php echo !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?></h3>
                    <!-- <hr class="border-mdo-darkblue-light mt-width-150-xs center-block"> -->

                    <p class="mt-card-desc font-14-xs font-weight-500">
                        <i class="fa fa-quote-left font-10-xs vertical-top"></i> <?php echo !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
                        <i class="fa fa-quote-right vertical-top font-10-xs"></i>
                    </p>
                    <!-- <hr>    -->
                    <hr class="border-mdo-darkblue-light mt-width-150-xs center-block">

                    <p class="mt-card-desc ">
                        <?php echo !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
                    </p>
                    <p class="mt-card-desc md-grey-text text-lighten-1 mt-4">
                        <h5 class="text-uppercase font-12-xs font-weight-700 ">Share to</h5>
                        <ul class="list-inline list-unstyled mx-0">

                            <li>
                                <i class="fa fa-facebook g-font-size-20-xs social-fb"></i>
                            </li>
                            <li>
                                <i class="fa fa-google-plus g-font-size-20-xs social-gplus"></i>
                            </li>
                            <li>
                                <i class="fa fa-linkedin g-font-size-20-xs social-li"></i>
                            </li>
                            <li>
                                <i class="fa fa-twitter g-font-size-20-xs social-tw"></i>
                            </li>


                        </ul>
                        <!-- <ul class="list-unstyled list-inline mx-0  ">
                                <li>
                                    <small >
                                        <i class="icon-pointer  "></i> Ipoh , Perak</small>
                                </li>
                                <li>
                                    <small >
                                        <i class="fa fa-phone "></i> (+60) 12345678</small>
                                </li>
                                <li>
                                    <small >
                                        <i class="icon-envelope"></i> jennifer_lawrence@gmail.com</small>
                                </li>
                            </ul> -->
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!--========== END PROMO : VIEW ==========-->

    <div class="m-grid m-grid-full-height m-grid-responsive-xs m-grid-responsive-sm">
        <!-- <div class="m-grid-row"> -->
        <!-- Col-md-4 -->
        <div class="m-grid-col m-grid-col-md-4 m-grid-col-sm-12 m-grid-col-xs-12  md-grey lighten-5  ">
            <ul class="list-group ">
                <!-- Personal Info -->
                <li class="list-group-item noborder md-grey lighten-5 pt-4 ">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> Personal Information</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">

                    <ul class="list-unstyled mx-0 text-center">
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">ADDRESS</h5>
                            <p class="mt-1 "><?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address'] : 'None';?>, <?php echo !empty($user_profile['address']['city']) ? $user_profile['address']['city'] : 'None';?> <?php echo !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'] : 'None';?> , <?php echo !empty($user_profile['address']['states']) ? $user_profile['address']['states'] : 'None';?>, <?php echo !empty($user_profile['address']['country']) ? $user_profile['address']['country'] : 'None';?></p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  mb-0 font-13-xs text-uppercase font-grey-gallery">EMAIL ADDRESS</h5>
                            <p class="mt-1 "><?php echo !empty($user_profile['overview']['email']) ?  $user_profile['overview']['email'] : 'cs@xremo.com'; ?></p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Phone Number</h5>
                            <p class="mt-1 "><?php echo !empty($user_profile['overview']['student_bios_contact_number']) ?  $user_profile['overview']['student_bios_contact_number'] : '(+60)0000000)'; ?>
                                <span class="badge badge-roundless badge-md-orange right text-uppercase">Primary</span>
                            </p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Date Of Birth </h5>
                            <p class="mt-1 "> <?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d F Y');?></p>
                        </li>
                        <li>
                            <h5 class="font-weight-700 font-grey-gallery mb-0 font-13-xs text-uppercase">Gender</h5>
                            <p class="mt-1  text-lighten-4"><?php echo !empty($user_profile['overview']['student_bios_gender']) ?  $user_profile['overview']['student_bios_gender'] : 'Prefer not to say'; ?></p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Language </h5>
                            <ul class="list-unstyled mx-0">
                                <?php foreach($user_profile['language'] as $key => $value){?>
                                <li>
                                    <p class="my-1 ">
                                        <strong class="font-14-xs md-orange-text"> <?php echo $value['title']; ?> </strong>
                                        <br>
                                        <small>[ Spoken : <?php echo $value['spoken']; ?> Level , Written : <?php echo $value['written']; ?> Level] </small>
                                    </p>

                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- CV Video -->
                <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> Video Resume</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?php echo !empty($user_profile['overview']['youtubelink']) ?  $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU'; ?>"></iframe>
                    </div>
                </li>
                <!-- Gallery -->
                <!-- <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> Project Gallery</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <div class="portfolio-content portfolio-3">
                        <div id="js-grid-lightbox-gallery" class="cbp">
                            <div class="cbp-item identity logos">
                                <a href="../assets/global/img/portfolio/1200x900/01.jpg" class="cbp-caption cbp-lightbox" data-title="Dashboard<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/21.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Dashboard</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design">
                                <a href="../assets/global/img/portfolio/1200x900/1.jpg" class="cbp-caption cbp-lightbox" data-title="Client chat app WIP<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/22.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Client chat app WIP</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item motion identity">
                                <a href="../assets/global/img/portfolio/1200x900/02.jpg" class="cbp-caption cbp-lightbox" data-title="World Clock Widget<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/23.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">World Clock Widget</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item identity graphic">
                                <a href="../assets/global/img/portfolio/1200x900/2.jpg" class="cbp-caption cbp-lightbox" data-title="Website Lightbox<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/24.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Website Lightbox</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item motion logos">
                                <a href="../assets/global/img/portfolio/1200x900/03.jpg" class="cbp-caption cbp-lightbox" data-title="Skateshop Website<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/25.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Skateshop Website</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design">
                                <a href="../assets/global/img/portfolio/1200x900/3.jpg" class="cbp-caption cbp-lightbox" data-title="10 Navigation Bars<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/26.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">10 Navigation Bars</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item motion logos">
                                <a href="../assets/global/img/portfolio/1200x900/03.jpg" class="cbp-caption cbp-lightbox" data-title="Skateshop Website<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/25.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Skateshop Website</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design">
                                <a href="../assets/global/img/portfolio/1200x900/3.jpg" class="cbp-caption cbp-lightbox" data-title="10 Navigation Bars<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="../assets/global/img/portfolio/600x600/26.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">10 Navigation Bars</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                        <div id="js-loadMore-lightbox-gallery" class="cbp-l-loadMore-button">
                            <a href="../assets/global/plugins/cubeportfolio/ajax/loadMore3.html" class="cbp-l-loadMore-link btn grey-mint btn-outline" rel="nofollow">
                                <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
                                <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                                <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
                            </a>
                        </div>
                    </div>
                </li> -->
                <!-- Reference (Limit PUT 3 ONLY)-->
                <!-- <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> References</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <ul class="list-unstyled text-center ">
                        <li>
                            <dl>
                                <dt>Reference Name #1</dt>
                                <dd class="font-14-xs">(999) 999 999 </dd>
                                <dd class="font-14-xs">reference_name#1@email.com </dd>
                                <dd class="font-14-xs">Relationship to reference </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>Reference Name #1</dt>
                                <dd class="font-14-xs">(999) 999 999 </dd>
                                <dd class="font-14-xs">reference_name#1@email.com </dd>
                                <dd class="font-14-xs">Relationship to reference </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>Reference Name #1</dt>
                                <dd class="font-14-xs">(999) 999 999 </dd>
                                <dd class="font-14-xs">reference_name#1@email.com </dd>
                                <dd class="font-14-xs">Relationship to reference </dd>
                            </dl>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>

        <!-- Content  col-md-8-->
        <div class="m-grid-col m-grid-col-md-8 m-grid-col-sm-12 m-grid-col-xs-12  ">
            <div class="portlet light">
                <!-- Nav Tabs -->
                <div class="portlet-title tabbable-line tab-border-md-orange py-0 mb-0 ">
                    <ul class="nav nav-tabs pull-left">
                        <li class="active">
                            <a href="#tab_summary" data-toggle="tab">
                                <i class="icon-user font-26-xs"></i> Summary</a>
                        </li>
                        <li>
                            <a href="#tab_education" data-toggle="tab">
                                <i class="icon-graduation font-26-xs"></i>Education </a>
                        </li>
                        <li>
                            <a href="#tab_experience" data-toggle="tab">
                                <i class="icon-briefcase font-26-xs"></i>Experience</a>
                        </li>
                        <li>
                            <a href="#tab_noneducation" data-toggle="tab">
                                <i class="icon-notebook font-26-xs"></i>Non Education</a>
                        </li>
                        <li>
                            <a href="#tab_skills" data-toggle="tab">
                                <i class="icon-badge font-26-xs"></i>Skills</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- Tab Summary -->
                        <div class="tab-pane active" id="tab_summary">
                            <ul class="list-group">
                                <!-- About Me -->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">About Me</h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs my-1">
                                    <p class="mb-1"><?php echo !empty($user_profile['overview']['summary']) ?  $user_profile['overview']['summary'] : 'The best preparation for tomorrow is doing your best today.'; ?></p>
                                </li>
                                <hr>
                                <!-- Education [Latest ]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Education</h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <?php foreach($user_profile['academics'] as $key => $value){?>
                                    <ul class="list-unstyled ">
                                        <li class="font-weight-500 font-16-xs text-capitalize roboto-font"><?php echo $value['degree_name']?>
                                            <small class="font-weight-400 font-13-xs pull-right"> <?php echo date('d F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));?></small>
                                        </li>
                                        <hr class="my-1 mt-width-100-xs">
                                        <li class="font-weight-400 font-15-xs ">
                                            <i class="fa fa-university"></i> <?php echo $value['university_name']?> </li>
                                    </ul>
                                    <br>
                                    <?php } ?>
                                </li>
                                <hr>
                                <!-- Experience [All] -->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Experience</h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled ">
                                        <?php foreach($user_profile['experiences'] as $key => $value){?>
                                        <li class="mb-3">
                                            <h5 class="font-weight-500 font-16-xs text-capitalize roboto-font mb-1"> <?php echo $value['experiences_title'];?>
                                                <span class="badge badge-roundless badge-md-blue-grey"><?php echo $value['employment_type'];?></span>
                                                <small class="font-weight-400 font-13-xs pull-right"> <?php echo date('F Y', strtotime($value['experiences_start_date']));?> - <?php echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));?></small>
                                            </h5>
                                            <hr class="my-1 mt-width-100-xs">
                                            <h5 class=" font-weight-400 font-15-xs">
                                                <i class="fa fa-building-o"></i> <?php echo $value['experiences_company_name'];?> </h5>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <hr>
                                <!-- Non Education [All]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Non Education </h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled">
                                        <?php foreach($user_profile['achievement'] as $key => $value){?>
                                        <li class="font-weight-500 font-weight-18-xs text-capitalize roboto-font">
                                            <i class="icon-notebook"></i> <?php echo $value['achievement_title']; ?>
                                            <small class="font-weight-400 font-13-xs pull-right"> <?php echo date('d F Y', strtotime($value['achievement_start_date']));?> - <?php echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['achievement_end_date']));?> </small>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <hr>
                                <!-- Skill [All]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Skill </h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled">
                                        <?php foreach($user_profile['projects'] as $key => $value){?>
                                        <li class="font-weight-500 font-weight-18-xs text-capitalize roboto-font">
                                            <i class="fa fa-tasks fa-fw"></i><?php echo $value['name']; ?>
                                            <small class="font-weight-400 font-13-xs pull-right"> <?php echo date('F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));?> </small>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab Education [Rate & Review]-->
                        <div class="tab-pane" id="tab_education">
                            <ul class="list-group list-border">
                                <?php foreach($user_profile['academics'] as $key => $value){?>
                                <!-- User View -->
                                <li class="list-group-item  ">
                                    <div class="media">
                                        <!-- Overall Rate and Total Review -->
                                        <!-- <div class="pull-right">
                                            <div class="btn-group">
                                                <a href="#modal_readonlyrate" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center " data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                    4.5
                                                    <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#modal_readonlyreview" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips" data-container="body" data-placement="top" data-original-title="Click here to see who review me ">5
                                                    <i class="icon-note"></i>
                                                </a>
                                            </div>
                                        </div> -->
                                        <div class="media-body">
                                            <h5 class="font-weight-600 font-14-xs font-16-xs mb-1"><?php echo $value['qualification_level'];?> in <?php echo $value['degree_name'];?>
                                            </h5>
                                            <h6 class=" font-weight-400 font-15-xs mb-1">
                                                <i class="fa fa-institution mr-1"></i><?php echo $value['university_name']; ?>
                                            </h6>
                                            <small>
                                                <i class="fa fa-calendar mr-1"></i><?php echo date('F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));?>
                                            </small>
                                            <h6 class=" font-weight-400 font-grey-gallery mb-1">
                                            </h6>
                                        </div>
                                    </div>
                                    <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                    <p class="font-15-xs"><?php echo $value['degree_description']; ?></p>
                                </li>
                                <?php } ?>
                            </ul>

                        </div>

                        <!-- Experience [Rate & Review]-->
                        <div class="tab-pane" id="tab_experience">
                            <ul class="list-group list-border">
                                <!-- User View : User can only VIEW people who rate and review -->
                                <?php foreach($user_profile['experiences'] as $key => $value){?>
                                <li class="list-group-item  ">
                                    <div class="media">
                                        <!-- Overall Rate and Total Review -->
                                        <div class="pull-right">
                                            <!-- <h4 class="font-weight-700 text-uppercase font-13-xs text-center mb-1 font-grey-gallery">Overall</h4> -->
                                            <!-- <hr class="my-1">  -->
                                            <!-- <div class="btn-group">
                                                <a href="#modal_readonlyrate" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center " data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                    4.5
                                                    <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#modal_readonlyreview" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips" data-container="body" data-placement="top" data-original-title="Click here to see who review me ">5
                                                    <i class="icon-note"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                        <div class="media-body">
                                            <h5 class="font-weight-600 font-16-xs"> <?php echo $value['experiences_title'];?>
                                                <!-- <span class="badge badge-roundless badge-md-blue letter-space-sm font-weight-500"> Full Time</span>
                                                    <span class="badge badge-roundless badge-md-green letter-space-sm font-weight-500"> Part Time</span>
                                                    <span class="badge badge-roundless badge-md-deep-purple letter-space-sm font-weight-500"> Volunteer</span>
                                                    <span class="badge badge-roundless badge-md-purple letter-space-sm font-weight-500"> Contract</span>
                                                    <span class="badge badge-roundless badge-md-amber letter-space-sm font-weight-500"> Temporary</span> -->
                                                <small><?php echo date('F Y', strtotime($value['experiences_start_date']));?> - <?php echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));?> </small>
                                            </h5>
                                            <h6 class=" font-weight-400 font-15-xs">
                                                <i class="fa fa-building-o"></i> <?php echo $value['experiences_company_name']; ?>
                                            </h6>
                                            <h6 class="mb-1">
                                                <span class="badge badge-roundless badge-md-teal letter-space-sm font-weight-500"> <?php echo $value['employment_type']; ?></span>
                                                <span class="badge badge-roundless badge-important letter-space-sm font-weight-500"> <?php echo $value['industry_name']; ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                    <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                    <p class="font-15-xs "><?php echo $value['experiences_description']; ?></p>
                                    <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                    <ul class="list-unstyled list-inline ml-0">
                                        <?php $skill = explode(',', $value['skills']);?>
                                        <?php foreach($skill as $key => $skill_value){?>
                                        <li class="label label-md-shades darkblue font-13-xs"> <?php echo !empty($skill_value) ? strtoupper($skill_value) : 'NONE'; ?> </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <!-- Non Education [Endorse]-->
                        <div class="tab-pane" id="tab_noneducation">
                            <ul class="list-group list-border">
                                <ul class="list-group list-border">
                                    <!-- User View : User can onlyview endorser-->
                                    <?php foreach($user_profile['achievement'] as $key => $value){?>
                                    <li class="list-group-item  ">
                                        <div class="media">
                                            <!-- Overall Rate and Total Review -->
                                            <!-- <div class="pull-right">
                                                <div class="btn-group">
                                                    <a href="#modal_endorser" data-toggle="modal" class="btn btn-md-indigo font-weight-700 tooltips text-center " data-container="body" data-placement="top" data-original-title="Click here to see who endorsed me ">
                                                        <i class="icon-users"></i>
                                                        3 endorser
                                                    </a>
                                                </div>
                                            </div> -->
                                            <div class="media-body">
                                                <h5 class="font-weight-600 font-16-xs mb-1"> <?php echo $value['achievement_title']?>
                                                </h5>
                                                <small>
                                                    <i class="fa fa-calendar mr-1"></i><?php echo date('F Y', strtotime($value['achievement_start_date']));?> - <?php echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['achievement_end_date']));?> </small>
                                            </div>
                                        </div>
                                        <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                        <p class="font-15-xs "><?php echo $value['achievement_description']?></p>
                                        <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                        <ul class="list-unstyled list-inline ml-0">
                                            <?php $non_edu = explode(',', $value['achievement_tag']);?>
                                        <?php foreach($non_edu as $key => $non_edu_value){?>
                                            <li class="label label-md-shades darkblue font-13-xs"> <?php echo !empty($non_edu_value) ? strtoupper($non_edu_value) : 'NONE'; ?> </li>
                                        <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </ul>
                        </div>
                        <!-- Skill -->
                        <div class="tab-pane" id="tab_skills">
                            <ul class="list-group list-border">
                                <ul class="list-group list-border">
                                    <!-- User View : User can onlyview endorser-->
                                    <?php foreach($user_profile['projects'] as $key => $value){?>
                                    <li class="list-group-item  ">
                                        <div class="media">
                                            <!-- Overall Rate and Total Review -->
                                            <!-- <div class="pull-right">
                                                <div class="btn-group">
                                                    <a href="#modal_endorser" data-toggle="modal" class="btn btn-md-indigo font-weight-700 tooltips text-center " data-container="body" data-placement="top" data-original-title="Click here to see who endorsed me ">
                                                        <i class="icon-users"></i>
                                                        3 endorser
                                                    </a>
                                                </div>
                                            </div> -->
                                            <div class="media-body">
                                                <h5 class="font-weight-600 font-16-xs mb-1"> <?php echo $value['name']?>
                                                </h5>
                                                <small>
                                                    <i class="fa fa-calendar mr-1"></i><?php echo date('F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));?> </small>
                                            </div>
                                        </div>
                                        <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                        <p class="font-15-xs "><?php echo $value['description']?></p>
                                        <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                        <ul class="list-unstyled list-inline ml-0">
                                            <?php $project = explode(',', $value['skills_acquired']);?>
                                        <?php foreach($project as $key => $project_value){?>
                                            <li class="label label-md-shades darkblue font-13-xs"> <?php echo !empty($project_value) ? strtoupper($project_value) : 'NONE'; ?> </li>
                                        <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Modal Review [CAn be used by Other User to review current user]-->
                <div class="modal fade modal-open-noscroll " id="modal_review" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-500"> Review -
                                    <small class="font-15-xs">Bachelor Degree In Software Engineering </small>
                                </h4>
                            </div>
                            <div class="modal-body  ">
                                <div class="scroller mt-height-250-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="mt-comments-v2">
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">1 years ago</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a class="" href="#">
                                                        <span class="mt-comment-author">Natasha Kim</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date"> 3 minute ago</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">Just Now</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="" class="btn btn-default">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-grey lighten-4">
                                <form action="" class="form form-horizontal">
                                    <div class="form-group text-left mx-0 mb-2">
                                        <textarea name="" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>
                                        <span class="help-block">Please put genuine statement !</span>
                                    </div>
                                    <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>
                                    <button type="submit" class="btn btn-md-indigo ">Submit</button>

                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- Modal Rate -->
                <div class="modal fade modal-open-noscroll " id="modal_rate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Rating -
                                    <small class="font-15-xs">Bachelor Degree In Software Engineering </small>
                                    <button data-dismiss="modal" class="close"></button>

                                </h4>
                            </div>
                            <div class="modal-body  ">
                                <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="list-group list-borderless">
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give rating 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give you 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give you 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer md-grey lighten-4 g-text-left-xs  ">
                                <form action="">
                                    <input type="hidden" id="backing1Education" value="4.5">
                                    <div id="rateit1Education" data-size="50"></div>
                                    <h5 class="text-none" id="value1Education">Rate this user</h5>

                                    <button type="submit" class="btn btn-md-indigo ">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- Modal Readonly Review -->
                <div class="modal fade modal-open-noscroll " id="modal_readonlyreview" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-500"> Review -
                                    <small class="font-15-xs">Bachelor Degree In Software Engineering </small>
                                    <button data-dismiss="modal" class="close"></button>

                                </h4>
                            </div>
                            <div class="modal-body  ">
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="mt-comments-v2">
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar6.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Larisa Maskalyova</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">1 years ago</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar8.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a class="" href="#">
                                                        <span class="mt-comment-author">Natasha Kim</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date"> 3 minute ago</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar1.jpg"> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a>
                                                        <span class="mt-comment-author">Michael Baker</span>
                                                    </a>
                                                    <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>
                                                    <span class="mt-comment-date">Just Now</span>
                                                </div>
                                                <div class="mt-comment-text ">Lorem iorem ipsum dolor sit amet consectetur adipisicing elit. Velit ratione doloribus distinctio dolorem, omnis praesentium eius explicabo ut natus beatae
                                                    ipsam incidunt tempora repellat iste sapiente, aperiam quae deserunt nostrum?
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="" class="btn btn-default">Load More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- Modal Readonly Rating -->
                <div class="modal fade modal-open-noscroll " id="modal_readonlyrate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Rating -
                                    <small class="font-15-xs">Bachelor Degree In Software Engineering </small>
                                    <button data-dismiss="modal" class="close"></button>

                                </h4>
                            </div>
                            <div class="modal-body  ">
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="list-group list-borderless">
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give you 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give you 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img src="../assets/pages/img/avatars/team11.jpg" alt="" class="avatar avatar-mini avatar-circle avatar-border-sm">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 font-15-xs  mb-1">Avril Lavigne
                                                        <small class="text-none font-13-xs ">give you 3.5 / 5
                                                            <i class="icon-star"></i>
                                                        </small>
                                                    </h4>
                                                    <a href="" class="btn blue-ebonyclay btn-xs">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- Modal Endorser -->
                <div class="modal fade modal-open-noscroll " id="modal_endorser" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Endorse -
                                    <small class="font-15-xs">Event #1 </small>
                                    <button data-dismiss="modal" class="close"></button>
                                </h4>
                            </div>
                            <div class="modal-body  ">
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                    <ul class="list-unstyled ">
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                        <li class="media media-middle">
                                            <div class="pull-left">
                                                <img src="../assets/pages/img/avatars/team1.jpg" alt="" class="avatar avatar-xtramini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading small font-weight-600 text-uppercase mb-1">Bill Maker</div>
                                                <div class="media-heading-sub small">endorse this on 20th January 2017</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('main/footer_content');?>

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->
    <!-- <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>jquery.migrate.min.js"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_STUDENTS; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- Megakit -->
    <script type="text/javascript" src="vendor/jquery.wow.min.js"></script>
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
    <!-- T -->
    <script src="<?php echo JS_STUDENTS; ?>portfolio-3-gallery.js" type="text/javascript"></script>
    <!--========== END JAVASCRIPTS ==========-->


    <!-- Rate It  Plugin 
    view doc on http://gjunge.github.io/rateit.js/examples/-->
    <script type="text/javascript">
        $(function () {
            $('#rateit7').rateit({
                max: 5,
                step: 0.25,
                backingfld: '#backing7',
                resetable: false,
            });
        });
        // Education Star
        $(function () {
            $('#rateit1Education').rateit({
                max: 5,
                step: 0.25,
                backingfld: '#backing1Education',
                resetable: false
            });    

            $("#rateit1Education").bind('rated', function (event, value) {
                $('#value1Education').text('Are you sure give this user rating : ' + value + ' out of 5');
            });
        });
        // Experience Star
        $(function () {
            $('#rateit1Experience').rateit({
                max: 5,
                step: 0.25,
                backingfld: '#backing1Experience',
                resetable: false
            });    

            $("#rateit1Experience").bind('rated', function (event, value) {
                $('#value1Experience').text('Are you sure give  this user rating : ' + value + ' out of 5');
            });
        });
    </script>
</body>


</html>