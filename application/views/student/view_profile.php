<!-- <pre> -->
<?php   $id = $this->session->userdata('id'); 
        $roles= $this->session->userdata('roles');
        $segmented_uri = $this->uri->segment(3);
        $percentage_completion = ($roles == 'employer') ? (ProfileCompletion($employer_profile) >= 90) : (studentProfileCompletion($id) >= 70);
        if ($id != base64_decode($segmented_uri)) {
            $endorseReviewRating = EndorseReviewRating(array(  'endorser'=> $id,
                                        'endorsed'=> base64_decode($segmented_uri)));
        }else{
            $endorseReviewRating = EndorseReviewRating(array('endorsed'=> base64_decode($segmented_uri)));
        }
        $reviewerUser = AllUserReviewer(array('endorsed'=> base64_decode($segmented_uri)));

        $data_arr['roles'] = $roles;
        $data_arr['user_profile'] = $user_profile;
        
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
    <link href="<?= ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/themify/themify.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <!-- Metronic -->
    <link href="<?= ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>plugins/rateit/rateit.css" rel="stylesheet" type="text/css" />

    <!-- Megakit Styles -->
    <link href="<?= ASSETS; ?>css/style.css" rel="stylesheet" type="text/css" />
    <!-- Metronic Styles -->
    <link href="<?= ASSETS; ?>css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS; ?>css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= ASSETS; ?>css/portfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon.ico">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student - My Profile</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115543574-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-115543574-1');
    </script>
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
                            <a href="<?= base_url(); ?>" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?= IMG_STUDENTS; ?>xremo-logo-white.svg" alt="logo" alt="Xremo Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?= IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Xremo Logo">
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
                                    <a href="<?= base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                    <a href="<?= base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                </li>
                            </ul>
                        </div>
                        <!--logged user -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse" >
                            <ul class="s-header-v2-nav">
                                <?php if ($roles =='student' || empty($id)) {?>
                                    <li class="s-header-v2-nav-item">
                                        <a href="<?= base_url(); ?>job/search" class="s-header-v2-nav-link ">Search Job</a>
                                    </li>
                                <?php }?>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <?php if(!empty($id)){?>
                                <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                    <a href="<?=base_url()?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php if ($roles =='administrator') {?>
                                            <img src="<?= !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-xtramini avatar-circle" alt="">
                                        <?php }?>

                                        <?php if ($roles =='employer') {?>
                                            <img alt="Employer Picture" class="avatar avatar-xtramini avatar-circle" src="<?= $this->session->userdata('img_profile') != "" ?  IMG_EMPLOYERS.base64_decode($this->session->userdata('img_profile')) : IMG_EMPLOYER.'xremo/xremo-logo-blue.png'?>">
                                        <?php }?>
                                        
                                        <?php if ($roles =='student') {?>
                                            <img alt="Student Picture" class="avatar avatar-xtramini avatar-circle" src="<?= $this->session->userdata('img_profile') != "" ?  IMG_STUDENTS.base64_decode($this->session->userdata('img_profile')) : IMG_STUDENTS.'profile-pic.png'; ?>" />
                                        <?php }?>

                                        <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right" style="margin-top:-20px;">
                                        <li>
                                            <a href="<?= base_url(); ?><?= $roles; ?>/dashboard" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-home mr-3"></i>Dashboard</a>
                                        </li>
										<?php if ($roles !='administrator') {?>
                                        <li>
                                            <a href="<?= base_url(); ?><?= $roles; ?>/profile" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-note mr-3"></i>Edit Profile</a>
                                        </li>
										<?php } ?>
                                        <?php if ($roles !='employer' && $roles !='administrator') {?>
                                            <li>
                                                <a href="<?= base_url(); ?>profile/user/<?= rtrim(base64_encode($this->session->userdata('id')),'=');?>" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>My Resume</a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($roles =='employer') {?>
                                        <li>
                                            <a href="<?= base_url(); ?>profile/company/<?= rtrim(base64_encode($this->session->userdata('id')),'=') ?>" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-book-open mr-3"></i> View My Profile
                                            </a>
                                        </li>
                                        <?php }?>
										<?php if ($roles !='administrator') {?>
                                        <li>
                                            <a href="<?= base_url(); ?><?= $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-calendar mr-3"></i>My Calendar</a>
                                        </li>
										<?php } ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?= base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-key mr-3"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php }else{ ?>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?= base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    <a href="<?= base_url(); ?>site/user/login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
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

    <div class="view  hm-black-strong mt-height-300-xs  visible-md visible-lg" style="background: url('<?= !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>'); ">
        <div class="mask ">
            <div class="container g-padding-y-110-xs ">
                <div class="col-md-9 col-xs-12">
                    <ul class="list-unstyled mx-0">
                        <li>
                            <h3 class="font-34-md  font-30-xs  md-orange-text text-lighten-1 font-weight-500  mt-3 "><?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?></h3>
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
                                <?= !empty($user_profile['overview']['quote']) ?  '<i class="fa fa-quote-left font-10-xs vertical-top"></i>'.$user_profile['overview']['quote'].'<i class="fa fa-quote-right vertical-top font-10-xs"></i>' : ''; ?>
                                
                            </p>
                        </li>
                        <?php if ($id == $segmented_uri) {?>
                        <li>
                            <ul class="list-inline list-unstyled mx-0 ">
                                <li>
                                    <h5 class="md-white-text font-weight-700 text-uppercase letter-space-xs">
                                        Share my resume to
                                    </h5>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= XREMO_URL; ?><?= uri_string(); ?>&amp;src=sdkpreparse" class="fb-share-button share-fb" data-href="umroh-bersama-ustadz-subhan-bawazier" data-layout="button" data-size="small" data-mobile-iframe="false" target="_blank">
                                        <i class="fa fa-facebook g-font-size-20-xs social-fb"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url=<?= XREMO_URL; ?><?= uri_string(); ?>" class="share-gplus" target="_blank">
                                        <i class="fa fa-google-plus g-font-size-20-xs social-gplus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?url=<?= XREMO_URL; ?><?= uri_string(); ?>" class="share-tw" target="_blank">
                                        <i class="fa fa-linkedin g-font-size-20-xs social-li"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text=<?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?> Profile on Xremo <?= XREMO_URL; ?><?= uri_string(); ?>" class="share-tw" target="_blank">
                                        <i class="fa fa-twitter g-font-size-20-xs social-tw"></i>
                                    </a>
                                </li>
								
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-3  col-xs-12 text-center">
					<img src="<?= !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="" class="avatar avatar-large avatar-circle ">
                    <li hidden>
                        <!-- <h5 class="md-white-text font-weight-700 text-uppercase letter-space-xs">
                            Share:
                        </h5> -->
                        <ul class="list-inline list-unstyled mx-0">
                            <li>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= XREMO_URL; ?><?= uri_string(); ?>&amp;src=sdkpreparse" class="fb-share-button share-fb" data-href="umroh-bersama-ustadz-subhan-bawazier" data-layout="button" data-size="small" data-mobile-iframe="false" target="_blank">
                                    <i class="fa fa-facebook g-font-size-20-xs social-fb"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/share?url=<?= XREMO_URL; ?><?= uri_string(); ?>" class="share-gplus" target="_blank">
                                    <i class="fa fa-google-plus g-font-size-20-xs social-gplus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?url=<?= XREMO_URL; ?><?= uri_string(); ?>" class="share-tw" target="_blank">
                                    <i class="fa fa-linkedin g-font-size-20-xs social-li"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?text=<?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?> Profile on Xremo <?= XREMO_URL; ?><?= uri_string(); ?>" class="share-tw" target="_blank">
                                    <i class="fa fa-twitter g-font-size-20-xs social-tw"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <!-- Visible when 768px to below  -->
    <div class="visible-sm visible-xs">
        <div class="view  hm-black-strong mt-height-250-xs " style="background: url('<?= !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>');">
            <div class="mask"></div>
        </div>
        <div class="mt-element-card-v2 text-center  ">
            <div class="mt-card-item p-0">
                <div class="mt-card-avatar  mt-margin-t-o-70-xs">
                    <img src="<?= !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-circle avatar-medium ">
                    <!-- <a href="" class="btn btn-icon-only btn-circle btn-outline-md-indigo mt-margin-l-o-60-xs"><i class="icon-pencil"></i></a> -->
                </div>
                <div class="mt-card-content px-3  ">
                    <h3 class="mt-card-name my-3 md-orange-text "><?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?></h3>
                    <!-- <hr class="border-mdo-darkblue-light mt-width-150-xs center-block"> -->

                    <p class="mt-card-desc font-14-xs font-weight-500">
                        <i class="fa fa-quote-left font-10-xs vertical-top"></i> <?= !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
                        <i class="fa fa-quote-right vertical-top font-10-xs"></i>
                    </p>
                    <!-- <hr>    -->
                    <hr class="border-mdo-darkblue-light mt-width-150-xs center-block">

                    <p class="mt-card-desc ">
                        <?= !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
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
                            <?php if($this->session->userdata('id') && ($this->session->userdata('id') != $user_profile['overview']['id_users'])){?>									
								<a href="<?=base_url()?>send_message/<?=rtrim(base64_encode($user_profile['overview']['id_users']), '='); ?>/new" class=" btn btn-block btn-md-orange roboto-font mb-4" target="_blank">
											<i class="icon-envelope mr-2 "></i>Send Message</a>
							<?php }?>                                        
                        </li>
                        <li>
                            <h5 class="font-weight-700 font-grey-gallery mb-0 font-13-xs text-uppercase">Gender</h5>
                            <p class="mt-1  text-lighten-4"><?= !empty($user_profile['overview']['student_bios_gender']) ?  $user_profile['overview']['student_bios_gender'] : '-'; ?></p>
                        </li>
                        <?php if(!empty($roles)){ ?>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Date Of Birth </h5>
                            <p class="mt-1 "> 
                                <?php   
                                    if(!empty($user_profile['overview']['student_bios_DOB']))
                                    {
                                        if(empty($user_profile['overview']['student_bios_DOB']) || $user_profile['overview']['student_bios_DOB'] == '0000-00-00' || $user_profile['overview']['student_bios_DOB'] == '1970-01-01')
                                        {
                                            echo '-';
                                        }
                                        else
                                        {
                                            echo date('d F Y', strtotime($user_profile['overview']['student_bios_DOB']));
                                        }
                                    }
                                    else
                                    {
                                        echo "-";
                                    }
                                ?>
                            </p>
                        </li>
                        <?php } ?>
                        <?php if(!empty($roles) && ($roles == 'employer' || $this->session->userdata('id') == $user_profile['overview']['id_users'])){ ?>
						<li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Phone Number</h5>
                            <p class="mt-1 "><?= !empty($user_profile['overview']['student_bios_contact_number']) ?  $user_profile['overview']['student_bios_contact_number'] : '-'; ?>
                                <!--<span class="badge badge-roundless badge-md-orange right text-uppercase">Primary</span>-->
                            </p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  mb-0 font-13-xs text-uppercase font-grey-gallery">EMAIL ADDRESS</h5>
                            <p class="mt-1 "><?= !empty($user_profile['overview']['email']) ?  $user_profile['overview']['email'] : '-'; ?></p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">ADDRESS</h5>
                            
                            <?php
                                $full_address = !empty($user_profile['address']['address']) ? $user_profile['address']['address'].", ":"";
                                $full_address .= !empty($user_profile['address']['city']) ? $user_profile['address']['city'].", ":"";
                                $full_address .= !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'].", ":"";
                                $full_address .= !empty($user_profile['address']['states']) ? $user_profile['address']['states'].", ":"";
                                $full_address .= !empty($user_profile['address']['country']) ? $user_profile['address']['country'].", ":"";
                                $full_address = $full_address != ""?substr($full_address, 0, -2):"-";
                            ?>
                            <p class="mt-1 "><?= $full_address;?></p>
                        </li>
                        <?php } ?>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-13-xs text-uppercase">Language </h5>
                            <ul class="list-unstyled mx-0">
                                <?php if(!empty($user_profile['language'])){?>
                                <?php foreach($user_profile['language'] as $key => $value){?>
                                <li>
                                    <p class="my-1 ">
                                        <strong class="font-14-xs md-orange-text"> <?= $value['title']; ?> </strong>
                                        <br>
                                        <small>[ Spoken : <?= $value['spoken']; ?> Level , Written : <?= $value['written']; ?> Level] </small>
                                    </p>

                                </li>
                                <?php }}else{ echo "-";} ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- CV Video -->
                <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> Video Resume</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="<?= !empty($user_profile['overview']['youtubelink']) ?  $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU'; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </li>
                <!-- Gallery -->
                <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> Gallery</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <?php if(!empty($gallery)) {?>
                        <div class="portfolio-content portfolio-3">
                            <div id="js-grid-lightbox-gallery" class="cbp">
                        <?php $gall_no = 1;foreach ($gallery as $gallery_key => $gallery_value) {?>
                                <div class="cbp-item" id="gall_<?=$gall_no?>" <?=$gall_no > 12?'style="display:none;"':''?>>
                                    <a href="<?= base_url()."assets/img/gallery/".$gallery_value['photo']; ?>" class="cbp-caption cbp-lightbox" data-title="<?=$gallery_value['title'];?><br><?=$gallery_value['description'];?>">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="<?= base_url()."assets/img/gallery/".$gallery_value['photo']; ?>" alt=""> </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignLeft">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-title"><?=$gallery_value['title'];?></div>
                                                    <div class="cbp-l-caption-desc"><?=$gallery_value['description'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!--<div class="cbp-item identity logos">
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
                                </div>-->                                
                    <?php $gall_no++;}?>
                    </div>
                        <?php if($gall_no > 12){?>
                            <div id="js-loadMore-lightbox-gallery" class="cbp-l-loadMore-button">
                                <a href="#" class="cbp-l-loadMore-link btn grey-mint m-4 letter-space-xs" id="gall_more">LOAD MORE</a>
                            </div>
                        <?php }?>                   

                        <!--<div id="js-loadMore-lightbox-gallery" class="cbp-l-loadMore-button">-->
                        <!--<div class="cbp-l-loadMore-button">
                            <a href="#" class="cbp-l-loadMore-link btn grey-mint btn-outline" rel="nofollow">
                                <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
                                <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                                <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
                            </a>
                        </div>-->
                    </div>                    
                    <?php }else{?>
                        <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                    <?php }?>

                    <!-- @if empty -->
                    <!--<div class="portlet p-4 md-shadow-none">
                        <div class="portlet-body text-center">
                            <i class="icon-cup font-grey-mint font-40-xs mb-4"></i>
                            <h4 class="text-center font-weight-500 font-grey-mint">Coming Soon...</h4>
                            <h5 class="text-center  font-grey-cascade mt-1 text-none">Stay Tuned ! Thie feature will be released soon.</h5>
                        </div>
                    </div>-->
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

                <?php if(!empty($roles)){ ?>
                <!-- Reference (Limit PUT 3 ONLY)-->
                <li class="list-group-item noborder md-grey lighten-5 pt-4">
                    <h4 class="text-center text-uppercase  md-orange-text text-darken-1 font-weight-700"> References</h4>
                    <hr class="border-mdo-orange-light mt-width-300-xs center-block">
                    <ul class="list-unstyled text-center ">
                        <?php if(!empty($user_profile['reference'])) {
                            foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                            if($reference_value['reference_name'] != ""){
                            ?>
                                <li>
                                    <dl>
                                        <dt><?=$reference_value['reference_name']?></dt>
                                        <dd class="font-14-xs"><?=$reference_value['reference_phone'] != ""?$reference_value['reference_phone']:"-"?> </dd>
                                        <dd class="font-14-xs"><?=$reference_value['reference_email'] != ""?$reference_value['reference_email']:"-"?> </dd>
                                        <dd class="font-14-xs"><?=$reference_value['reference_relationship'] != ""?$reference_value['reference_relationship']:"-"?> </dd>
                                    </dl>
                                </li>
                        <?php }}?>
                        <?php }else{?>
                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                        <?php }?>
                    </ul>
                </li> 
                <?php }?>
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
                                    <?php if(!empty($user_profile['overview']['summary'])){?>
                                        <p class="mb-1"><?= $user_profile['overview']['summary']?></p>
                                    <?php }else{?>                                        
                                        <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </li>
                                <hr>
                                <!-- Education [Latest ]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Education</h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <?php if(!empty($user_profile['academics'])){?>
                                        <?php foreach($user_profile['academics'] as $key => $value){?>
                                        <ul class="list-unstyled ">
                                            <li class="font-weight-500 font-16-xs text-capitalize roboto-font"><?= $value['degree_name']?>
                                                <small class="font-weight-400 font-13-xs pull-right"> 
                                                    <?php 
                                                        if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('d F Y', strtotime($value['start_date']));
                                                    ?> 
                                                    - 
                                                    <?php 
                                                            echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));
                                                        }
                                                    ?>
                                                </small>
                                            </li>
                                            <hr class="my-1 mt-width-100-xs">
                                            <li class="font-weight-400 font-15-xs ">
                                                <i class="fa fa-university"></i> <?= $value['university_name']?> </li>
                                        </ul>
                                        <br>
                                        <?php } ?>
                                    <?php }else{?>
                                        <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </li>
                                <hr>
                                <!-- Experience [All] -->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Experience</h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled ">
                                        <?php if(!empty($user_profile['experiences'])){?>
                                            <?php foreach($user_profile['experiences'] as $key => $value){?>
                                            <li class="mb-3">
                                                <h5 class="font-weight-500 font-16-xs text-capitalize roboto-font mb-1"> <?= $value['experiences_title'];?>
                                                    <span class="badge badge-roundless badge-md-blue-grey"><?= $value['employment_type'];?></span>
                                                    <small class="font-weight-400 font-13-xs pull-right"> 
                                                        <?php 
                                                            if(empty($value['experiences_start_date']) || $value['experiences_start_date'] == '0000-00-00' || $value['experiences_start_date'] == '1970-01-01')
                                                            {
                                                                echo 'Not Provided';
                                                            }
                                                            else
                                                            {
                                                                echo date('F Y', strtotime($value['experiences_start_date']));
                                                        ?> 
                                                        - 
                                                        <?php 
                                                                echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));
                                                            }
                                                        ?>
                                                    </small>
                                                </h5>
                                                <hr class="my-1 mt-width-100-xs">
                                                <h5 class=" font-weight-400 font-15-xs">
                                                    <i class="fa fa-building-o"></i> <?= $value['experiences_company_name'];?> </h5>
                                            </li>
                                            <?php } ?>
                                        <?php }else{?>
                                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                        <?php }?>
                                    </ul>
                                </li>
                                <hr>
                                <!-- Non Education [All]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Non Education </h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled">
                                        <?php if(!empty($user_profile['achievement'])){?>
                                            <?php foreach($user_profile['achievement'] as $key => $value){?>
                                            <li class="font-weight-500 font-weight-18-xs text-capitalize roboto-font">
                                                <i class="icon-notebook"></i> <?= $value['achievement_title']; ?>
                                                <small class="font-weight-400 font-13-xs pull-right"> 
                                                    <?php 
                                                        if(empty($value['achievement_start_date']) || $value['achievement_start_date'] == '0000-00-00' || $value['achievement_start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('d F Y', strtotime($value['achievement_start_date']));
                                                    ?> 
                                                    - 
                                                    <?php 
                                                            echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['achievement_end_date']));
                                                        }
                                                    ?> 
                                                </small>
                                            </li>
                                            <?php } ?>
                                        <?php }else{?>
                                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                        <?php }?>
                                    </ul>
                                </li>
                                <hr>
                                <!-- Skill [All]-->
                                <li class="list-group-item noborder py-4">
                                    <h4 class="font-weight-700 text-uppercase font-blue-chambray mb-1 letter-space-xs">Skill </h4>
                                    <hr class="border-md-blue-grey mt-width-40-xs mt-1 mb-3">
                                    <ul class="list-unstyled">
                                        <?php if(!empty($user_profile['achievement'])){?>
                                            <?php foreach($user_profile['projects'] as $key => $value){?>
                                            <li class="font-weight-500 font-weight-18-xs text-capitalize roboto-font">
                                                <i class="fa fa-tasks fa-fw"></i><?= $value['name']; ?>
                                                <small class="font-weight-400 font-13-xs pull-right"> 
                                                    <?php 
                                                        if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('F Y', strtotime($value['start_date']));
                                                    ?> 
                                                    - 
                                                    <?php 
                                                            echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));
                                                        }
                                                    ?> 
                                                </small>
                                            </li>
                                            <?php }?>
                                        <?php }else{?>
                                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                        <?php }?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Tab Education [Rate & Review]-->
                        <div class="tab-pane" id="tab_education">
                            <ul class="list-group list-border">
                                <?php if(!empty($user_profile['academics'])){?>
                                    <?php foreach($user_profile['academics'] as $key => $value){

                                        $keyReviewEdu = array_search($value['academic_id'], array_column($endorseReviewRating['review'],'skill_id'));

                                        $review_counter = countReviewerEducation($value['academic_id']);
                                        if (!is_bool($keyReviewEdu)) {
                                            $checkReviewSame = $value['academic_id'] == $endorseReviewRating['review'][$keyReviewEdu]['skill_id'];
                                            $checkReviewNotSame = $value['academic_id'] != $endorseReviewRating['review'][$keyReviewEdu]['skill_id'];
                                            $countReviewer = count($review_counter['education']);
                                        }else{
                                            $checkReviewSame = false;
                                            $checkReviewNotSame = true;
                                            $countReviewer = count($review_counter['education']);
                                        }

                                        $review_counter = countReviewerEducation($value['academic_id']);
                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdExistEducationReview = array_search($id, array_column($review_counter['education'],'endorser_id'));
                                        }else{
                                            $checkIdExistEducationReview = array_search($id, array_column($review_counter['education'],'user_id'));
                                        }

                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdExistEducationRate = array_search($id, array_column($review_counter['education'],'endorser_id'));
                                        }else{
                                            $checkIdExistEducationRate = array_search($id, array_column($review_counter['education'],'user_id'));
                                        }

                                        if (($countReviewer == 0) && $id == base64_decode($segmented_uri)) {
                                            $modal_review = 'modal_reviewed_empty_educations_'.$value['academic_id'];
                                        }else if(($countReviewer == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_review = 'modal_reviewer_empty_educations_'.$value['academic_id'];
                                        }else if($countReviewer > 0 && !is_bool($checkIdExistEducationReview)){
                                            $modal_review = 'modal_review_education_list';
                                        }else{
                                            $modal_review = 'modal_review_education_input';
                                        }

                                        /*end review*/
                                        /*start rating*/
                                        $rate_education = countRateEducation($value['academic_id']);
                                        $total_rating = 0;
                                        foreach ($rate_education['education'] as $key => $rating) {
                                            // var_dump($value[$i+1]['rating']);
                                                $total_rating += $rating['rating'];
                                        }

                                        $keyRatingEdu = array_search($value['academic_id'], array_column($endorseReviewRating['rate'],'skill_id'));
                                        $rating_counter = countRateEducation($value['academic_id']);
                                        if (!is_bool($keyRatingEdu)) {
                                            $checkRatingSame = $value['academic_id'] == $endorseReviewRating['rate'][$keyRatingExp]['skill_id'];
                                            $checkRatingNotSame = $value['academic_id'] != $endorseReviewRating['rate'][$keyRatingExp]['skill_id'];
                                            $countRater = count($rating_counter['education']);
                                        }else{
                                            $checkRatingSame = false;
                                            $checkRatingNotSame = true;
                                            $countRater = count($rating_counter['education']);
                                        }


                                        if (($countRater == 0) && $id == base64_decode($segmented_uri)) {
                                            $modal_rate = 'modal_rated_empty_educations_'.$value['academic_id'];
                                        }else if(($countRater == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_rate = 'modal_rater_empty_educations_'.$value['academic_id'];
                                        }else if($countRater > 0 && !is_bool($checkIdExistEducationRate)){
                                            $modal_rate = 'modal_rate_education_list';
                                        }else{
                                            $modal_rate = 'modal_list_rater_input';
                                        }

                                        if ($total_rating > 0 && !empty($rate_education['education'])) {
                                            $totalRating = round($total_rating/count($rate_education['education']),1);
                                        }else{
                                            $totalRating = round($total_rating,1);      
                                        }
                                    ?>
                                    <!-- User View -->
                                    <li class="list-group-item  ">
                                        <div class="media">
                                            <!-- Overall Rate and Total Review -->
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <?php 
                                                    if (!empty($id)) :
                                                            if (!empty($keyRatingEdu)) : ?>
                                                            <a href="#<?= $modal_rate;?>" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['academic_id']; ?>" data-name="<?= $value['degree_name'];?>" endorse-type="academics" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_list_rater_input') ? 'rate-education-input' : 'rate-education-list';?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                                <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (empty($endorseReviewRating['endorse'][$keyReviewEdu]['rating'])) ): ?>
                                                            <a href="#<?= $modal_rate;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['academic_id']; ?>" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_list_rater_input') ? 'rate-education-input' : 'rate-education-list';?>" endorse-type="academics" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                            <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <?php else: ?>
                                                                <a href="#<?= $modal_rate;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['academic_id']; ?>" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_list_rater_input') ? 'rate-education-input' : 'rate-education-list';?>" endorse-type="academics" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                                <?= $totalRating; ?>
                                                                    <i class="icon-star text-center"></i>
                                                                </a>
                                                            <?php endif; ?>

                                                            <?php if(!empty($keyReviewEdu)): ?>
                                                            <a href="#<?= $modal_review;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_review_education_list') ? 'review-education-list' : 'review-education-input';?>" endorse-type="academics" data-container="body" data-placement="top" data-original-title="Click here to see who review me "><?= $countReviewer?>
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (empty($endorseReviewRating['endorse'][$keyReviewEdu]['rating'])) ): ?>
                                                            <a href="#<?= $modal_review;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_review_education_list') ? 'review-education-list' : 'review-education-input';?>" endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="academics" data-name="<?= $value['degree_name']; ?>" data-id="<?= $value['academic_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "><?= $countReviewer?>
                                                            <i class="icon-note"></i>
                                                            </a>
                                                            <?php else: ?>
                                                                <a href="#<?= $modal_review;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_review_education_list') ? 'review-education-list' : 'review-education-input';?>" endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="academics" data-name="<?= $value['degree_name']; ?>" data-id="<?= $value['academic_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "><?= $countReviewer?>
                                                                <i class="icon-note"></i>
                                                                </a>
                                                            <?php endif; ?>  
                                                <?php else: ?>
                                                        <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">Login to review </a>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="font-weight-600 font-14-xs font-16-xs mb-1"><?= $value['qualification_level'];?> in <?= $value['degree_name'];?>
                                                </h5>
                                                <h6 class=" font-weight-400 font-15-xs mb-1">
                                                    <i class="fa fa-institution mr-1"></i><?= $value['university_name']; ?>
                                                </h6>
                                                <small>
                                                    <i class="fa fa-calendar mr-1"></i>
                                                    <?php 
                                                        if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('F Y', strtotime($value['start_date']));
                                                    ?> 
                                                    - 
                                                    <?php 
                                                            echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));
                                                        }
                                                    ?>
                                                </small>
                                                <h6 class=" font-weight-400 font-grey-gallery mb-1">
                                                </h6>
                                            </div>
                                        </div>
                                        <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                        <p class="font-15-xs"><?= $value['degree_description']; ?></p>
                                    </li>
                                    
                                    <div class="modal fade modal-open-noscroll " id="modal_rater_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- [Change Title to it job position/ Field of study title] -->
                                                    <h4 class="modal-title font-weight-500"> Rating -
                                                        <!-- <small class="font-15-xs">Bachelor Degree In Software Engineering </small> -->
                                                        <small class="font-15-xs"><?= $value['degree_name'];?> </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                                        <!-- @if empty -->
                                                        <div class="portlet px-4 py-8 md-shadow-none">
                                                            <div class="portlet-body text-center">
                                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>
                                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to rate </h4>
                                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine rating about his/her information.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer md-grey lighten-4 g-text-left-xs">
                                                    <form action="<?= base_url(); ?>site/endorsment/rate" method="POST">
                                                        <div class="media-body media-middle">
                                                            <input type="hidden" id="backing1Education" value="4.5" name="ratings">
                                                            <input type="hidden" value="<?= $value['academic_id'];?>" name="skill_id">
                                                            <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                                            <input type="hidden" value="<?= base64_decode($segmented_uri);?>" name="endorsed_id">
                                                            <div id="rateit1Education" data-size="50"></div>
                                                            <h5 class="text-none" id="value1Education">Rate this user</h5>
                                                        </div>
                                                        <div class="media-right media-middle">
                                                            <button type="submit" class="btn btn-md-indigo">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                    <div class="modal fade modal-open-noscroll " id="modal_rated_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- [Change Title to it job position/ Field of study title] -->
                                                    <h4 class="modal-title font-weight-500"> Rating -
                                                        <!-- <small class="font-15-xs">Bachelor Degree In Software Engineering </small> -->
                                                        <small class="font-15-xs"><?= $value['degree_name'];?> </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                                        <!-- @if empty -->
                                                        <div class="portlet px-4 py-8 md-shadow-none">
                                                            <div class="portlet-body text-center">
                                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>
                                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>
                                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>
                                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                    <!-- Modal Reviewer -->
                                        <div class="modal fade modal-open-noscroll " id="modal_reviewer_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- [Change Title to it job position/ Field of study title] -->
                                                        <h4 class="modal-title font-weight-500"> Review - 
                                                            <small class="font-15-xs"><?= $value['degree_name'] ?> </small>
                                                            <button data-dismiss="modal" class="close"></button>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet-body text-center">
                                                                    <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                                                    <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to endorse </h4>
                                                                    <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine endorsement about his/her information.</h5>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer md-grey lighten-4">
                                                        <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">
                                                            <div class="form-group text-left mx-0 mb-2">
                                                                <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>
                                                                <input type="hidden" value="<?= $value['academic_id'];?>" name="skill_id">
                                                                <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                                                <input type="hidden" value="<?= base64_decode($segmented_uri);?>" name="endorsed_id">
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

                                    <?php } ?>
                                <?php }else{?>
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                <?php }?>
                            </ul>

                        </div>

                        <!-- Experience [Rate & Review]-->
                        <div class="tab-pane" id="tab_experience">
                            <ul class="list-group list-border">
                                <!-- User View : User can only VIEW people who rate and review -->
                                <?php if(!empty($user_profile['experiences'])){?>

                                    <?php $i=1; foreach($user_profile['experiences'] as $key => $value){
                                        
                                        $keyReviewExp = array_search($value['experience_id'], array_column($endorseReviewRating['review'],'exp_id'));
                                        $review_counter = countReviewerExp($value['experience_id']);
                                        if (!is_bool($keyReviewExp)) {
                                            $checkReviewSame = $value['experience_id'] == $endorseReviewRating['review'][$keyReviewExp]['exp_id'];
                                            $checkReviewNotSame = $value['experience_id'] != $endorseReviewRating['review'][$keyReviewExp]['exp_id'];
                                            $countReviewer = count($review_counter['experience']);
                                        }else{
                                            $checkReviewSame = false;
                                            $checkReviewNotSame = true;
                                            $countReviewer = count($review_counter['experience']);
                                        }



                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdExist = array_search($id, array_column($review_counter['experience'],'endorser_id'));
                                        }else{
                                            $checkIdExist = array_search($id, array_column($review_counter['experience'],'user_id'));
                                        }  
                                        if (($countReviewer == 0) && $id == base64_decode($segmented_uri)) {
                                            $modal_review = 'modal_reviewed_empty_experiences_'.$value['experience_id'];
                                        }else if(($countReviewer == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_review = 'modal_reviewer_empty_experiences_'.$value['experience_id'];
                                        }else if($countReviewer > 0 && !is_bool($checkIdExist)){
                                            $modal_review = 'modal_review_experience_list';
                                        }else{
                                            $modal_review = 'modal_list_reviewer_input';
                                        }
                                        /*end review*/
                                        /*start rating*/

                                        $rate_experience = countRateExp($value['experience_id']);

                                        $total_rating = 0;
                                        foreach ($rate_experience['experience'] as $key => $rating) {
                                            // var_dump($value[$i+1]['rating']);
                                                $total_rating += $rating['rating'];
                                        }

                                        $keyRatingExp = array_search($value['experience_id'], array_column($endorseReviewRating['rate'],'exp_id'));
                                        $rating_counter = countRateExp($value['experience_id']);
                                        

                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdRatingExist = array_search($id, array_column($rating_counter['experience'],'endorser_id'));
                                        }else{
                                            $checkIdRatingExist = array_search($id, array_column($rating_counter['experience'],'user_id'));
                                        }                                        

                                        if (!is_bool($keyRatingExp)) {
                                            $checkRatingSame = $value['experience_id'] == $endorseReviewRating['rate'][$keyRatingExp]['exp_id'];
                                            $checkRatingNotSame = $value['experience_id'] != $endorseReviewRating['rate'][$keyRatingExp]['exp_id'];
                                            $countRater = count($rating_counter['experience']);
                                        }else{
                                            $checkRatingSame = false;
                                            $checkRatingNotSame = true;
                                            $countRater = count($rating_counter['experience']);
                                        }


                                        if (($countRater == 0) && $id == base64_decode($segmented_uri)) {
                                            $modal_rate = 'modal_rated_empty_experience_'.$value['experience_id'];
                                        }else if(($countRater == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_rate = 'modal_rater_empty_experience_'.$value['experience_id'];
                                        }else if($countRater > 0 && !is_bool($checkIdRatingExist)){
                                            $modal_rate = 'modal_rate_experience_list';
                                        }else{
                                            $modal_rate = 'modal_list_rater_input';
                                        }

                                        if ($total_rating > 0 && !empty($rate_experience['experience'])) {
                                            $totalRating = round($total_rating/count($rate_experience['experience']),1);
                                        }else{
                                            $totalRating = round($total_rating,1);      
                                        }
                                        
                                        ?>
                                    <li class="list-group-item  ">
                                        <div class="media">
                                            <!-- Overall Rate and Total Review -->
                                            <div class="pull-right">
                                                <!-- <h4 class="font-weight-700 text-uppercase font-13-xs text-center mb-1 font-grey-gallery">Overall</h4> -->
                                                <!-- <hr class="my-1">  -->
                                                <div class="btn-group">
                                                    <?php 
                                                    if (!empty($id)):
                                                        if (!empty($keyReviewExp)) :?>
                                                            <?php if (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkReviewSame): ?>
                                                            <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" endorse-type="experience" data-id="<?= $value['experience_id']; ?>" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_rate_experience_list') ?  'rate-experience-list' : 'rate-experience-input';?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                            <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "><?= $countReviewer ;?>
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkReviewNotSame ): ?>
                                                            <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['experience_id']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_rate_experience_list') ?  'rate-experience-list' : 'rate-experience-input';?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                            <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "><?= $countReviewer ;?>
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            <?php else: ?>
                                                            <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['experience_id']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_rate_experience_list') ?  'rate-experience-list' : 'rate-experience-input';?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                                <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?> " data-container="body" data-placement="top" data-original-title="Click here to see who review me "  endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>"><?= $countReviewer ;?>
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            <?php endif; ?>
                                                    <?php else: ?>
                                                            <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['experience_id']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= ($modal_rate == 'modal_rate_experience_list') ?  'rate-experience-list' : 'rate-experience-input';?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me ">
                                                                <?= $totalRating; ?>
                                                                <i class="icon-star text-center"></i>
                                                            </a>
                                                            <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "  endorser-id="<?= $id; ?>" user-id="<?= $segmented_uri; ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>"><?= $countReviewer ;?>
                                                                <i class="icon-note"></i>
                                                            </a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                        <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">Login to review </a>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="font-weight-600 font-16-xs"> <?= $value['experiences_title'];?>
                                                    <!-- <span class="badge badge-roundless badge-md-blue letter-space-sm font-weight-500"> Full Time</span>
                                                        <span class="badge badge-roundless badge-md-green letter-space-sm font-weight-500"> Part Time</span>
                                                        <span class="badge badge-roundless badge-md-deep-purple letter-space-sm font-weight-500"> Volunteer</span>
                                                        <span class="badge badge-roundless badge-md-purple letter-space-sm font-weight-500"> Contract</span>
                                                        <span class="badge badge-roundless badge-md-amber letter-space-sm font-weight-500"> Temporary</span> -->
                                                    <small>
                                                        <?php 
                                                            if(empty($value['experiences_start_date']) || $value['experiences_start_date'] == '0000-00-00' || $value['experiences_start_date'] == '1970-01-01')
                                                            {
                                                                echo 'Not Provided';
                                                            }
                                                            else
                                                            {
                                                                echo date('F Y', strtotime($value['experiences_start_date']));
                                                        ?> 
                                                        - 
                                                        <?php 
                                                                echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));
                                                            }
                                                        ?> 
                                                    </small>
                                                </h5>
                                                <h6 class=" font-weight-400 font-15-xs">
                                                    <i class="fa fa-building-o"></i> <?= $value['experiences_company_name']; ?>
                                                </h6>
                                                <h6 class="mb-1">
                                                    <span class="badge badge-roundless badge-md-teal letter-space-sm font-weight-500"> <?= $value['employment_type']; ?></span>
                                                    <span class="badge badge-roundless badge-important letter-space-sm font-weight-500"> <?= $value['industry_name']; ?></span>
                                                </h6>
                                            </div>
                                        </div>
                                        <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                        <p class="font-15-xs "><?= $value['experiences_description']; ?></p>
                                        <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                        <ul class="list-unstyled list-inline ml-0">
                                            <?php $skill = explode(',', $value['skills']);?>
                                            <?php foreach($skill as $key => $skill_value){?>
                                            <li class="label label-md-shades darkblue font-13-xs"> <?= !empty($skill_value) ? strtoupper($skill_value) : 'NONE'; ?> </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    
                                    <div class="modal fade modal-open-noscroll " id="modal_rated_empty_experience_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- [Change Title to it job position/ Field of study title] -->
                                                    <h4 class="modal-title font-weight-500"> Rating -
                                                        <!-- <small class="font-15-xs">Bachelor Degree In Software Engineering </small> -->
                                                        <small class="font-15-xs"><?= $value['experiences_title'];?> </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                                        <!-- @if empty -->
                                                        <div class="portlet px-4 py-8 md-shadow-none">
                                                            <div class="portlet-body text-center">
                                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>
                                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>
                                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>
                                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                    <!-- Modal Rate -->
                <div class="modal fade modal-open-noscroll " id="modal_rater_empty_experience_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Rating -
                                    <!-- <small class="font-15-xs">Bachelor Degree In Software Engineering </small> -->
                                    <small class="font-15-xs"><?= $value['experiences_title'];?> </small>
                                    <button data-dismiss="modal" class="close"></button>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                    <!-- @if empty -->
                                    <div class="portlet px-4 py-8 md-shadow-none">
                                        <div class="portlet-body text-center">
                                            <i class="icon-star font-grey-mint font-40-xs mb-4"></i>
                                            <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to rate </h4>
                                            <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine rating about his/her information.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer md-grey lighten-4 g-text-left-xs">
                                <form action="<?= base_url(); ?>site/endorsment/rate" method="POST">
                                    <div class="media-body media-middle">
                                        <input type="hidden" id="backing1Experience" value="4.5" name="ratings">
                                        <input type="hidden" value="<?= $value['experience_id'];?>" name="exp_id">
                                        <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                        <input type="hidden" value="<?= base64_decode($segmented_uri);?>" name="endorsed_id">
                                        <div id="rateit1Experience" data-size="50"></div>
                                        <h5 class="text-none" id="value1Experience">Rate this user</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <button type="submit" class="btn btn-md-indigo">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- Modal Reviewer -->
                <div class="modal fade modal-open-noscroll " id="modal_reviewer_empty_experiences_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Endorse - 
                                    <small class="font-15-xs"><?= $value['experiences_title'] ?> </small>
                                    <button data-dismiss="modal" class="close"></button>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="portlet px-4 py-8 md-shadow-none">
                                        <div class="portlet px-4 py-8 md-shadow-none">
                                        <div class="portlet-body text-center">
                                            <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                            <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to endorse </h4>
                                            <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine endorsement about his/her information.</h5>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-grey lighten-4">
                                <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">
                                    <div class="form-group text-left mx-0 mb-2">
                                        <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>
                                        <input type="hidden" value="<?= $value['experience_id'];?>" name="exp_id">
                                        <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                        <input type="hidden" value="<?= base64_decode($segmented_uri);?>" name="endorsed_id">
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

                                    

                                    
                                    <?php } ?>
                                <?php }else{?>
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                <?php }?>
                            </ul>
                        </div>

                        <!-- Non Education [Endorse]-->
                        <div class="tab-pane" id="tab_noneducation">
                            <ul class="list-group list-border">
                                <ul class="list-group list-border">
                                    <!-- User View : User can onlyview endorser-->
                                    <?php if(!empty($user_profile['achievement'])){?>
                                        <?php foreach($user_profile['achievement'] as $key => $value){
                                            $endorsement_counter = countEndorserAchievement($value['achievement_id']);
                                            $keyAchievement = array_search($value['achievement_id'], array_column($endorseReviewRating['endorse'],'achievement_id'));
                                            if (!is_bool($keyAchievement)) {
                                                $checkEndorseSame = $value['achievement_id'] == $endorseReviewRating['endorse'][$keyAchievement]['achievement_id'];
                                                $checkEndorseNotSame = $value['achievement_id'] != $endorseReviewRating['endorse'][$keyAchievement]['achievement_id'];
                                                $countEndorser = count($endorsement_counter['achievement']);
                                            }else{
                                                $checkEndorseSame = false;
                                                $checkEndorseNotSame = true;
                                                $countEndorser = 0;
                                            }
                                            if (($countEndorser == 0) && $id == base64_decode($segmented_uri)) {
                                                $modal_endorse = 'modal_endorsed_empty_achievement_'.$value['achievement_id'];
                                            }else if(($countEndorser == 0) && $id != base64_decode($segmented_uri)){
                                                $modal_endorse = 'modal_endorser_empty_achievement_'.$value['achievement_id'];
                                            }else{
                                                $modal_endorse = 'modal_endorser_list';
                                            }
                                            ?>
                                        <li class="list-group-item  ">
                                            <div class="media">
                                                <!-- Overall Rate and Total Review -->
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                    <?php 
                                                    if (!empty($id)):
                                                        if (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (!empty($endorseReviewRating['endorse'])) && $checkEndorseSame ): ?>
                                                        
                                                        <button class="btn btn-md-red font-weight-700 tooltips text-center unendorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" endorse-type="achievement" data-id="<?= $value['achievement_id']; ?>" data-placement="top" data-original-title="Endorse this user">
                                                        <i class="icon-close"></i>
                                                        Unendorse
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['achievement_id']; ?>" endorse-type="achievement" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['achievement_title']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>

                                                    <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkEndorseNotSame ): ?>
                                                        
                                                        <button class="btn btn-md-amber font-weight-700 tooltips text-center endorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" endorse-type="achievement" data-id="<?= $value['achievement_id']; ?>" data-placement="top" data-original-title="Endorse this user">
                                                        <i class="icon-check"></i>
                                                        Endorse Me
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['achievement_id']; ?>" endorse-type="achievement" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['achievement_title']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>

                                                    <?php elseif (base64_decode($segmented_uri) == $id): ?>
                                                        
                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" endorse-type="achievement" data-name="<?= $value['achievement_title']; ?>" data-id="<?= $value['achievement_id']; ?>" user-id="<?= base64_decode($segmented_uri); ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>
                                                    <?php else: ?>
                                                            <a href="<?= base_url(); ?><?= $roles ?>/profile" class="btn btn-md-indigo font-weight-700 tooltips text-center" data-container="body" data-placement="top" data-original-title="view endorser">
                                                                <i class="icon-user"></i>
                                                                Complete your profile to endorse
                                                            </a>
                                                    <?php endif ?>

                                            <?php   else: ?>
                                                <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">Login to review </a>
                                            <?php   endif ?>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-weight-600 font-16-xs mb-1"> <?= $value['achievement_title']?>
                                                    </h5>
                                                    <small>
                                                        <i class="fa fa-calendar mr-1"></i>
                                                        <?php 
                                                            if(empty($value['achievement_start_date']) || $value['achievement_start_date'] == '0000-00-00' || $value['achievement_start_date'] == '1970-01-01')
                                                            {
                                                                echo 'Not Provided';
                                                            }
                                                            else
                                                            {
                                                                echo date('F Y', strtotime($value['achievement_start_date']));
                                                        ?> 
                                                        - 
                                                        <?php 
                                                                echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['achievement_end_date']));
                                                            }
                                                        ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                            <p class="font-15-xs "><?= $value['achievement_description']?></p>
                                            <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                            <ul class="list-unstyled list-inline ml-0">
                                                <?php $non_edu = explode(',', $value['achievement_tag']);?>
                                            <?php foreach($non_edu as $key => $non_edu_value){?>
                                                <li class="label label-md-shades darkblue font-13-xs"> <?= !empty($non_edu_value) ? strtoupper($non_edu_value) : 'NONE'; ?> </li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                        <!-- Modal Endorser -->
                                        <div class="modal fade modal-open-noscroll " id="modal_endorsed_empty_achievement_<?= $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- [Change Title to it job position/ Field of study title] -->
                                                        <h4 class="modal-title font-weight-500"> Endorse - 
                                                            <small class="font-15-xs"><?= $value['achievement_title'] ?> </small>
                                                            <button data-dismiss="modal" class="close"></button>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <!-- @if empty (User View)-->
                                                            <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet-body text-center">
                                                                    <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                                                    <h4 class="text-center font-weight-500 font-grey-mint text-none">Ask your friend to endorse! </h4>
                                                                    <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to endorse your resume.</h5>
                                                                    <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- Modal Endorser -->
                                        <div class="modal fade modal-open-noscroll " id="modal_endorser_empty_achievement_<?= $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- [Change Title to it job position/ Field of study title] -->
                                                        <h4 class="modal-title font-weight-500"> Endorse - 
                                                            <small class="font-15-xs"><?= $value['achievement_title'] ?> </small>
                                                            <button data-dismiss="modal" class="close"></button>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <!-- @if empty (User View)-->
                                                            <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet-body text-center">
                                                                    <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                                                    <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to endorse </h4>
                                                                    <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine endorsement about his/her information.</h5>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <?php } ?>
                                    <?php }else{?>
                                        <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </ul>
                            </ul>
                        </div>
                        <!-- Skill -->
                        <div class="tab-pane" id="tab_skills">
                            <ul class="list-group list-border">
                                <ul class="list-group list-border">
                                    <!-- User View : User can onlyview endorser-->
                                    <?php if(!empty($user_profile['projects'])){?>
                                        <?php $i=0; foreach($user_profile['projects'] as $key => $value){
                                            $keyAchievement = array_search($value['id'], array_column($endorseReviewRating['endorse'],'user_project_id'));
                                            $countEndorserProject = countEndorserProject($value['id']);
                                            if (!is_bool($keyAchievement)) {
                                                $checkEndorseSame = $value['id'] == $endorseReviewRating['endorse'][$keyAchievement]['user_project_id'];
                                                $checkEndorseNotSame = $value['id'] != $endorseReviewRating['endorse'][$keyAchievement]['user_project_id'];
                                                $countEndorser = count($countEndorserProject['project']);
                                            }else{
                                                $checkEndorseSame = false;
                                                $checkEndorseNotSame = true;
                                                $countEndorser = 0;
                                            }
                                            if (($countEndorser == 0) && $id == base64_decode($segmented_uri)) {
                                                $modal_endorse = 'modal_endorsed_empty_project_'.$value['id'];
                                            }else if(($countEndorser == 0) && $id != base64_decode($segmented_uri)){
                                                $modal_endorse = 'modal_endorser_empty_project_'.$value['id'];
                                            }else{
                                                $modal_endorse = 'modal_endorser_list';
                                            }
                                            ?>
                                        <li class="list-group-item  ">
                                            <div class="media">
                                                <!-- Overall Rate and Total Review -->
                                                <div class="pull-right">
                                                    <div class="btn-group">
                                                    <?php 
                                                    if (!empty($id)):
                                                        if ( ($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (!empty($endorseReviewRating['endorse'])) && $checkEndorseSame ): ?>
                                                        
                                                        <button class="btn btn-md-red font-weight-700 tooltips text-center unendorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['id']; ?>" data-placement="top" data-original-title="Endorse this user" endorse-type="project">
                                                        <i class="icon-close"></i>
                                                        Unendorse
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" endorse-type="project" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>

                                                        <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkEndorseNotSame ): ?>
                                                        
                                                        <button class="btn btn-md-amber font-weight-700 tooltips text-center endorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['id']; ?>" data-placement="top" data-original-title="Endorse this user" endorse-type="project">
                                                        <i class="icon-check"></i>
                                                        Endorse Me
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" endorse-type="project" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>

                                                        <?php elseif (base64_decode($segmented_uri) == $id): ?>
                                                        
                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?> Endorser
                                                        </a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url(); ?><?= $roles ?>/profile" class="btn btn-md-indigo font-weight-700 tooltips text-center" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser">
                                                                <i class="icon-user"></i>
                                                                Complete your profile to endorse
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">Login to review </a>
                                                    <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-weight-600 font-16-xs mb-1"> <?= $value['name']?>
                                                    </h5>
                                                    <small>
                                                        <i class="fa fa-calendar mr-1"></i>
                                                        <?php 
                                                            if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                            {
                                                                echo 'Not Provided';
                                                            }
                                                            else
                                                            {
                                                                echo date('F Y', strtotime($value['start_date']));
                                                        ?> 
                                                        - 
                                                        <?php 
                                                                echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));
                                                            }
                                                        ?> 
                                                    </small>
                                                </div>
                                            </div>
                                            <hr class="border-mdo-orange-strong my-2 mt-width-200-xs">
                                            <p class="font-15-xs "><?= $value['description']?></p>
                                            <p class="font-weight-500 font-14-xs text-uppercase mb-1">Skill Earned</p>
                                            <ul class="list-unstyled list-inline ml-0">
                                                <?php $project = explode(',', $value['skills_acquired']);?>
                                            <?php foreach($project as $key => $project_value){?>
                                                <li class="label label-md-shades darkblue font-13-xs"> <?= !empty($project_value) ? strtoupper($project_value) : 'NONE'; ?> </li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                        <!-- Modal Endorser -->
                                        <div class="modal fade modal-open-noscroll " id="modal_endorsed_empty_project_<?= $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- [Change Title to it job position/ Field of study title] -->
                                                        <h4 class="modal-title font-weight-500"> Endorse -
                                                            <small class="font-15-xs"><?= $value['name'] ?> </small>
                                                            <button data-dismiss="modal" class="close"></button>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <!-- @if empty (User View)-->
                                                            <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet-body text-center">
                                                                    <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                                                    <h4 class="text-center font-weight-500 font-grey-mint text-none">Ask your friend to endorse! </h4>
                                                                    <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to endorse your resume.</h5>
                                                                    <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- Modal Endorser -->
                                        <div class="modal fade modal-open-noscroll " id="modal_endorser_empty_project_<?= $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <!-- [Change Title to it job position/ Field of study title] -->
                                                        <h4 class="modal-title font-weight-500"> Endorse - 
                                                            <small class="font-15-xs"><?= $value['name'] ?> </small>
                                                            <button data-dismiss="modal" class="close"></button>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <!-- @if empty (User View)-->
                                                            <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet px-4 py-8 md-shadow-none">
                                                                <div class="portlet-body text-center">
                                                                    <i class="icon-users font-grey-mint font-40-xs mb-4"></i>
                                                                    <h4 class="text-center font-weight-500 font-grey-mint text-none">Be the first to endorse </h4>
                                                                    <h5 class="text-center  font-grey-cascade mt-1 text-none">Give a genuine endorsement about his/her information.</h5>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <?php } ?>
                                    <?php }else{?>
                                        <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Modal Endorser -->
                <div class="modal fade modal-open-noscroll " id="modal_endorser_list" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal rate -->
                <div class="modal fade modal-open-noscroll " id="modal_rate_experience_list" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal review -->
                <div class="modal fade modal-open-noscroll " id="modal_review_experience_list" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>
                
                <!-- Modal Review [CAn be used by Other User to review current user]-->
                <div class="modal fade modal-open-noscroll " id="modal_list_reviewer_input" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal Rating -->
                <div class="modal fade modal-open-noscroll " id="modal_list_rater_input" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal review -->
                <div class="modal fade modal-open-noscroll " id="modal_review_education_list" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal review -->
                <div class="modal fade modal-open-noscroll " id="modal_review_education_input" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal rate -->
                <div class="modal fade modal-open-noscroll " id="modal_rate_education_list" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal rate -->
                <div class="modal fade modal-open-noscroll " id="modal_rate_education_input" tabindex="-1" role="dialog" aria-hidden="true">
                    
                </div>

                <!-- Modal Endorser -->
                <div class="modal fade modal-open-noscroll " id="invite_friends" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- [Change Title to it job position/ Field of study title] -->
                                <h4 class="modal-title font-weight-500"> Invite Friends
                                    <button data-dismiss="modal" class="close"></button>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="portlet px-4 py-8 md-shadow-none">
                                        <form action="<?= base_url(); ?>site/endorsment/invite" class="form form-horizontal" method="POST">
                                            <div class="form-group text-left mx-0 mb-2">
                                                <textarea name="email_address" id="" class="form-control" rows="5" placeholder="Invite your friends email with comma as separated key e.g abcd@email.com, efgh@email.com"></textarea>
                                            </div>
                                            <input type="hidden" name="username" value="<?= $this->session->userdata('name');?>"></input>
                                            <input type="hidden" name="user_id" value="<?= $segmented_uri;?>"></input>
                                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>
                                            <button type="submit" class="btn btn-md-indigo ">Submit</button>
                                        </form>
                                    </div>
                                    </div>
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
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.migrate.min.js"></script>
    <script src="<?= JS_STUDENTS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= JS_STUDENTS; ?>js.cookie.min.js" type="text/javascript"></script>
    <script src="<?= JS_STUDENTS; ?>jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?= JS_STUDENTS; ?>jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?= JS_STUDENTS; ?>bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- Megakit -->
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>jquery.wow.min.js"></script>
    <script src="<?= JS_STUDENTS; ?>jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <script src="<?= JS_STUDENTS; ?>rateit/jquery.rateit.min.js" type="text/javascript"></script>

    <!-- General Components and Settings -->
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>global.min.js"></script>
    <script src="<?= JS_STUDENTS; ?>app.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?= JS_STUDENTS; ?>header-sticky.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>swiper.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>masonry.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>equal-height.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>parallax.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>portfolio-3-col.min.js"></script>
    <script type="text/javascript" src="<?= JS_STUDENTS; ?>wow.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/alertify.min.js"></script>
    <!-- T -->
    <script src="<?= JS_STUDENTS; ?>portfolio-3-gallery.js" type="text/javascript"></script>
    <!--========== END JAVASCRIPTS ==========-->


    <!-- Rate It  Plugin 
    view doc on http://gjunge.github.io/rateit.js/examples/-->
    <script type="text/javascript">
        $(document).ready(function () {
            //GALLERY LOAD MORE
            var max_gall = <?= !empty($gall_no) ? $gall_no : 0;?>;
            var load_more = 13;
            var gall_height = 400;
            $( "#gall_more" ).on( "click", function(e) {
                e.preventDefault();

                //get total new item
                var load_more_temp = load_more;
                var total_tambahan = 0;
                for(var i=0;i<12;i++){
                    if(load_more_temp < max_gall){
                        load_more_temp++;
                        total_tambahan++;
                    }                    
                }
                //set new height of gallery container
                var total_tambahan_row = Math.ceil(total_tambahan/4);
                gall_height += total_tambahan_row*90;
                $( "#js-grid-lightbox-gallery" ).css( "height", gall_height );

                //show 12 hidden more item
                for(var i=0;i<12;i++){
                    if(load_more < max_gall){
                        var row_pos = Math.ceil(load_more/4);
                        $( "#gall_"+load_more ).css( "top", (row_pos-1)*109 );
                        $( "#gall_"+load_more ).show();
                        load_more++;
                    }                    
                }
                
                //hide button load more if nothing more
                if(load_more >= max_gall){
                    $( "#gall_more" ).hide();
                }
                
            });

            $(".endorse-btn").click( function () {
                var dataId = $(this).attr('data-id');
                var endorserId = $(this).attr('endorser-id');
                var endorsedId = $(this).attr('endorsed-id');
                var endorsedType = $(this).attr('endorse-type');
                alertify.confirm('Endorse user', 'Are you sure you want to endorse?', function(){ 
                    $.post("<?= base_url(); ?>site/endorsment/endorse", {dataId : dataId, endorserId : endorserId, endorsedId: endorsedId, endorsedType : endorsedType}, function(data) {
                        if(data == "false") {
                            alertify.error('Endorse user Failed');
                        } else {
                            alertify.success('Endorse user success.');
                            location.reload();
                        }
                    });
                }, function(data){
                     alertify.error('Cancel');
                });
            });

            $(".unendorse-btn").click( function () {
                var dataId = $(this).attr('data-id');
                var endorserId = $(this).attr('endorser-id');
                var endorsedId = $(this).attr('endorsed-id');
                var endorsedType = $(this).attr('endorse-type');
                alertify.confirm('Endorse user', 'Are you sure you want to unendorse?', function(){ 
                    $.post("<?= base_url(); ?>site/endorsment/unendorse", {dataId : dataId, endorserId : endorserId, endorsedId: endorsedId, endorsedType : endorsedType}, function(data) {
                        if(data == "false") {
                            alertify.error('Unendorse user Failed');
                        } else {
                            alertify.success('Unendorse user success.');
                            location.reload();
                        }
                    });
                }, function(data){
                     alertify.error('Cancel');
                });
            });

            $('.endorser-list').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/assets/img/student/';
                
            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getEndorser",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var endorser = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            endorser +=    '<li class="media media-middle">\
                                                <div class="pull-left">\
                                                    <img src="'+image_directory+v.profile_photo+'" alt="" class="avatar avatar-xtramini avatar-circle">\
                                                </div>\
                                                <div class="media-body">\
                                                    <div class="media-heading small font-weight-600 text-uppercase mb-1">'+v.fullname+'</div>\
                                                    <div class="media-heading-sub small">endorse this on '+v.created_at+'</div>\
                                                </div>\
                                            </li>';
                        });
 
                        $('#modal_endorser_list').html('<div class="modal-dialog">\
                        <div class="modal-content">\
                            <div class="modal-header">\
                                <!-- [Change Title to it job position/ Field of study title] -->\
                                <h4 class="modal-title font-weight-500"> Endorse -\
                                    <small class="font-15-xs">'+dataName+' </small>\
                                    <button data-dismiss="modal" class="close"></button>\
                                </h4>\
                            </div>\
                            <div class="modal-body">\
                                <div class="scroller mt-height-400-xs" data-always-visible="1" data-rail-visible1="1">\
                                    <ul class="list-unstyled">\
                                    '+endorser+'\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </div>');
                        
                    }
                })
            });

            $('.review-input').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');
            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getReview",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                                <div class="mt-comment-img">\
                                                    <img src="'+image_directory+v.profile_photo+'"> </div>\
                                                <div class="mt-comment-body">\
                                                    <div class="mt-comment-info">\
                                                        <a>\
                                                            <span class="mt-comment-author">'+v.fullname+'</span>\
                                                        </a>\
                                                        <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                        <span class="mt-comment-date">'+v.created_at+'</span>\
                                                    </div>\
                                                    <div class="mt-comment-text">'+v.rating+'\
                                                    </div>\
                                                </div>\
                                            </div>';
                        });
 
                        $('#modal_list_reviewer_input').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Review -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                    <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">\
                                        <div class="form-group text-left mx-0 mb-2">\
                                            <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>\
                                            <input type="hidden" name="exp_id" value="'+dataId+'"></input>\
                                            <input type="hidden" name="endorser_id" value="'+endorserId+'"></input>\
                                            <input type="hidden" name="user_id" value="'+dataUserId+'"></input>\
                                            <span class="help-block">Please put genuine statement !</span>\
                                        </div>\
                                        <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>\
                                        <button type="submit" class="btn btn-md-indigo ">Submit</button>\
                                    </form>\
                                </div\
                            </div>\
                        </div>');
                        
                    }
                })
            });

            $('.review-experience-list').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/assets/img/student/';

            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getReview",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                                <div class="mt-comment-img">\
                                                    <img src="'+image_directory+v.profile_photo+'"> </div>\
                                                <div class="mt-comment-body">\
                                                    <div class="mt-comment-info">\
                                                        <a>\
                                                            <span class="mt-comment-author">'+v.fullname+'</span>\
                                                        </a>\
                                                        <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                        <span class="mt-comment-date">'+v.created_at+'</span>\
                                                    </div>\
                                                    <div class="mt-comment-text">'+v.rating+'\
                                                    </div>\
                                                </div>\
                                            </div>';
                        });
 
                        $('#modal_review_experience_list').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Review -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="portlet px-4 py-8 md-shadow-none">\
                                            <div class="portlet-body text-center">\
                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>\
                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>\
                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>\
                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                                            </div>\
                                        </div>\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                </div>\
                            </div>\
                        </div>');
                        
                    }
                })
            });


            $('.review-education-input').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/xremo/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');
            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getReview",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                                <div class="mt-comment-img">\
                                                    <img style="width:40px;" src="'+image_directory+v.profile_photo+'"> </div>\
                                                <div class="mt-comment-body">\
                                                    <div class="mt-comment-info">\
                                                        <a>\
                                                            <span class="mt-comment-author">'+v.fullname+'</span>\
                                                        </a>\
                                                        <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                        <span class="mt-comment-date">'+v.created_at+'</span>\
                                                    </div>\
                                                    <div class="mt-comment-text">'+v.rating+'\
                                                    </div>\
                                                </div>\
                                            </div>';
                        });
 
                        $('#modal_review_education_input').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Review -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                    <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">\
                                        <div class="form-group text-left mx-0 mb-2">\
                                            <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>\
                                            <input type="hidden" name="exp_id" value="'+dataId+'"></input>\
                                            <input type="hidden" name="endorser_id" value="'+endorserId+'"></input>\
                                            <input type="hidden" name="user_id" value="'+dataUserId+'"></input>\
                                            <span class="help-block">Please put genuine statement !</span>\
                                        </div>\
                                        <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>\
                                        <button type="submit" class="btn btn-md-indigo ">Submit</button>\
                                    </form>\
                                </div\
                            </div>\
                        </div>');
                        
                    }
                })
            });

            $('.review-education-list').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/xremo/assets/img/student/';

            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getReview",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                        <div class="mt-comment-img">\
                                            <img style="width:40px;" src="'+image_directory+v.profile_photo+'"> </div>\
                                        <div class="mt-comment-body">\
                                            <div class="mt-comment-info">\
                                                <a>\
                                                    <span class="mt-comment-author">'+v.fullname+'</span>\
                                                </a>\
                                                <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                <span class="mt-comment-date">'+v.created_at+'</span>\
                                            </div>\
                                            <div class="mt-comment-text">'+v.rating+'\
                                            </div>\
                                        </div>\
                                    </div>';
                        });

                        $('#modal_review_education_list').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Review -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="portlet px-4 py-8 md-shadow-none">\
                                            <div class="portlet-body text-center">\
                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>\
                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>\
                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>\
                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                                            </div>\
                                        </div>\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                </div>\
                            </div>\
                        </div>');
                        
                    }
                })
            });


/*Rate*/
            $('.rate-education-input').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');
            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getRate",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                                <div class="mt-comment-img">\
                                                    <img style="width:40px;" src="'+image_directory+v.profile_photo+'"> </div>\
                                                <div class="mt-comment-body">\
                                                    <div class="mt-comment-info">\
                                                        <a>\
                                                            <span class="mt-comment-author">'+v.fullname+'</span>\
                                                        </a>\
                                                        <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                        <span class="mt-comment-date">'+v.created_at+'</span>\
                                                    </div>\
                                                    <div class="mt-comment-text">'+v.rating+'\
                                                    </div>\
                                                </div>\
                                            </div>';
                        });
 
                        $('#modal_rate_education_input').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Rate -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                    <form action="<?= base_url(); ?>site/endorsment/rate" class="form form-horizontal" method="POST">\
                                        <div class="form-group text-left mx-0 mb-2">\
                                            <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>\
                                            <input type="hidden" name="exp_id" value="'+dataId+'"></input>\
                                            <input type="hidden" name="endorser_id" value="'+endorserId+'"></input>\
                                            <input type="hidden" name="user_id" value="'+dataUserId+'"></input>\
                                            <span class="help-block">Please put genuine statement !</span>\
                                        </div>\
                                        <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>\
                                        <button type="submit" class="btn btn-md-indigo ">Submit</button>\
                                    </form>\
                                </div\
                            </div>\
                        </div>');
                        
                    }
                })
            });

            $('.rate-education-list').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/xremo/assets/img/student/';

            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getRate",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                        <div class="mt-comment-img">\
                                            <img style="width:40px;" src="'+image_directory+v.profile_photo+'"> </div>\
                                        <div class="mt-comment-body">\
                                            <div class="mt-comment-info">\
                                                <a>\
                                                    <span class="mt-comment-author">'+v.fullname+'</span>\
                                                </a>\
                                                <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                <span class="mt-comment-date">'+v.created_at+'</span>\
                                            </div>\
                                            <small class="text-none font-13-xs mt-1">give rating '+v.rating+' out of 5\
                                                <i class="icon-star"></i>\
                                            </small>\
                                        </div>\
                                    </div>';
                        });

                        $('#modal_rate_education_list').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Rate -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="portlet px-4 py-8 md-shadow-none">\
                                            <div class="portlet-body text-center">\
                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>\
                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>\
                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>\
                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                                            </div>\
                                        </div>\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                </div>\
                            </div>\
                        </div>');
                        
                    }
                })
            });
        });

        $('.rate-experience-list').click(function(){
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin+'/xremo/assets/img/student/';

            
                $.ajax({
                    url:"<?= base_url();?>site/endorsment/getRate",
                    method:"GET",
                    data: {
                      data_id: dataId,
                      user_id: dataUserId,
                      endorsedType: endorsedType,
                    },

                    success:function(response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student,function(i,v){
                            reviews += '<div class="mt-comment">\
                                        <div class="mt-comment-img">\
                                            <img style="width:40px;" src="'+image_directory+v.profile_photo+'"> </div>\
                                        <div class="mt-comment-body">\
                                            <div class="mt-comment-info">\
                                                <a>\
                                                    <span class="mt-comment-author">'+v.fullname+'</span>\
                                                </a>\
                                                <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="#">View Profile</a>\
                                                <span class="mt-comment-date">'+v.created_at+'</span>\
                                            </div>\
                                            <small class="text-none font-13-xs mt-1">give rating '+v.rating+' out of 5\
                                                <i class="icon-star"></i>\
                                            </small>\
                                        </div>\
                                    </div>';
                        });

                        $('#modal_rate_experience_list').html('<div class="modal-dialog modal-lg">\
                            <div class="modal-content">\
                                <div class="modal-header">\
                                    <h4 class="modal-title font-weight-500"> Rate -\
                                        <small class="font-15-xs">'+dataName+' </small>\
                                    </h4>\
                                </div>\
                                <div class="modal-body">\
                                    <div class="scroller mt-height-250-xs mt-height-400-md" data-always-visible="1" data-rail-visible1="1">\
                                        <div class="portlet px-4 py-8 md-shadow-none">\
                                            <div class="portlet-body text-center">\
                                                <i class="icon-star font-grey-mint font-40-xs mb-4"></i>\
                                                <h4 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h4>\
                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Hey ! Invite one of your friend to rate your resume.</h5>\
                                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                                            </div>\
                                        </div>\
                                        <div class="mt-comments-v2">\
                                            '+reviews+'\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="modal-footer md-grey lighten-4">\
                                </div>\
                            </div>\
                        </div>');
                        
                    }
                })
            });

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