<?php 
    $id = $this->session->userdata('id'); 
    $roles= $this->session->userdata('roles');
    $segmented_uri = $this->uri->segment(3);
    $percentage_completion = ($roles == 'employer') ? (ProfileCompletion($employer_profile) >= 90) : (studentProfileCompletion($id) >= 70);
    if ($id != base64_decode($segmented_uri)) {
        $endorseReviewRating = EndorseReviewRating(array(  'endorser'=> $id,'endorsed'=> base64_decode($segmented_uri)));
    }else{
        $endorseReviewRating = EndorseReviewRating(array('endorsed'=> base64_decode($segmented_uri)));
    }
    $reviewerUser = AllUserReviewer(array('endorsed'=> base64_decode($segmented_uri)));

    $data_arr['roles'] = $roles;
    $data_arr['user_profile'] = $user_profile;
    
    $checkUser = ($id == base64_decode($segmented_uri))?'same_user':'different_user';
?>
<?php   
            !empty($user_profile['header_photo'] ) ? $user_profile['header_photo']  = $user_profile['header_photo']  : $user_profile['header_photo']  = '33.jpg';
            !empty($user_profile['profile_photo']) ? $user_profile['profile_photo'] = $user_profile['profile_photo'] : $user_profile['profile_photo'] = 'profile-pic.png';
            $checkUserHeaderImgProfile  = file_exists(CHECK_IMG_DIRECTORY_LIVE.STUDENT_IMG_DIRECTORY.$user_profile['header_photo'] );
            $checkUserMainImgProfile    = file_exists(CHECK_IMG_DIRECTORY_LIVE.STUDENT_IMG_DIRECTORY.$user_profile['profile_photo']);
     ?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- TITLE -->
    <?php if ($roles =='student') {?>
    <title>
        <?= !empty($language->site_stdview_profile) ? $language->site_stdview_profile : "Student | View Profile"?>
    </title>
    <?php } else {?>
    <title>
        <?php echo ucwords($user_profile['overview']['name']); ?>
    </title>
    <?php } ?>


    <!-- ======= CSS STYLES ======= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/simple-line-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/themify.css">

    <!-- Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>layout8/vendor/scrollbar/scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>layout8/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>layout8/vendor/swiper/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>layout8/vendor/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/bootstrap-select/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/rateit/rateit.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>vendor/alertify.min.css">

    <!-- Global -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.min.css">

    <!-- Layout 8 -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout8/layout8.min.css">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/portfolio.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/favicon.ico">



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

<body>
    <!-- # HEADER -->
    <?php $this->load->view('site/header_content');?>
    <!-- # VIEW -->
    <div class="s-promo-block-v2 gradient-darkblue-v7 height-350 g-bg-position-center hidden-xs " style="background: url('<?= $checkUserHeaderImgProfile ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'33.jpg'?>');">
        <div class="container g-ver-bottom-80-md g-ver-bottom-70-sm ">
            <!-- Fullname & Quote -->
            <div class="col-md-9 col-sm-9">
                <ul class="list-unstyled mx-0 mt-60-md mt-20-sm">
                    <!-- Full Name -->
                    <?php if(!empty($user_profile['overview']['quote'])) { ?>
                    <li>
                        <h3 class="font-36-md font-30 md-orange-lighten-1-text font-weight-600 text-uppercase letter-space-sm ">
                            <?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?>
                        </h3>
                    </li>
                    <!-- Quote -->
                    <hr class="border-md-white width-70 hor-divider-solid-thick">
                    <li>
                        <p class="  font-weight-400 md-white-text letter-space-sm">
                            <?= !empty($user_profile['overview']['quote']) ?  '<i class="fa fa-quote-left font-10 vertical-top mr-5"></i>'.$user_profile['overview']['quote'].'<i class="fa fa-quote-right vertical-top font-10 ml-5"></i>' : ''; ?>
                        </p>
                    </li>
                    <?php } else {  ?>
                    <li>
                        <h3 class="font-36-md font-30 md-orange-lighten-1-text font-weight-600 text-uppercase mt-120-lg mt-70-sm letter-space-sm ">
                            <?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?>
                        </h3>
                    </li>
                    <!-- Quote -->
                    <hr class="border-md-white width-70 hor-divider-solid-thick my-10">
                    <?php } ?>
                </ul>
            </div>
            <!--  Profile IMAGE -->
            <div class="col-md-3  col-sm-3 text-center">
                <img src="<?= $checkUserMainImgProfile ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.jpg'?>" alt="" class="avatar avatar-big avatar-circle  hidden-sm">
                <img src="<?= $checkUserMainImgProfile ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.jpg'?>" alt="" class="avatar avatar-large avatar-circle  visible-sm">
            </div>
        </div>
    </div>
    <!-- @ Mobile View -->
    <div class="visible-xs md-grey-lighten-5">
        <div class="view  height-250 g-bg-position-center " style="background: url('<?= $checkUserHeaderImgProfile ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'33.jpg'?>');">
            <div class="mask hm-darkblue-v7"></div>
        </div>
        <div class="mt-element-card-v2 text-center  mb-0">
            <div class="mt-card-item p-0 mb-0">
                <div class="mt-card-avatar  mt-o-70">
                    <img src="<?= $checkUserMainImgProfile ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.jpg'?>" class="avatar avatar-circle avatar-medium ">
                </div>
                <div class="mt-card-content px-15 mb-0 ">
                    <h4 class="mt-card-name mt-20 md-darkblue-text mb-0 text-uppercase font-20 font-weight-600 ">
                        <?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?>
                    </h4>
                    <hr class="border-mdo-orange-v5 width-80 center-block  hor-divider-solid-medium">
                    <?php if(!empty($user_profile['overview']['quote'])){ ?>
                    <p class="mt-card-desc font-14 letter-space-xs font-weight-500 pb-10 mb-0">
                        <i class="fa fa-quote-left font-10 vertical-top"></i>
                        <?= !empty($user_profile['overview']['quote']) ?  $user_profile['overview']['quote'] : 'The best preparation for tomorrow is doing your best today.'; ?>
                            <i class="fa fa-quote-right vertical-top font-10"></i>
                    </p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!-- @END Mobile View -->

    <!-- Content -->
    <div class="m-grid m-grid-responsive-xs">
        <!-- Share /Personal Info /  Video Resume /Gallery / References -->
        <div class="m-grid-col m-grid-col-lg-4 m-grid-col-md-4 m-grid-col-sm-12 m-grid-col-xs-12  md-grey-lighten-5 px-10-sm py-20-sm py-0  m-grid-col-full-height">
            <ul class="list-group">
                <!-- Share button -->
                <?php if($checkUser == 'same_user'): ?>
                <li class="list-group-item border-none md-grey-lighten-5 pt-30-sm pt-0 ">
                    <h6 class="text-center  text-uppercase  md-darkblue-text font-weight-600 letter-space-sm hidden-xs ">
                        <?= !empty($language->site_share) ? $language->site_share : "SHARE"?>
                    </h6>
                    <hr class="border-mdo-orange-v5 width-100 center-block hor-divider-solid-medium my-10 hidden-xs">
                    <ul class="list-inline list-unstyled mx-0 text-center ">
                        <!-- G+ -->
                        <li>
                            <a href="https://plus.google.com/share?url=<?= XREMO_URL; ?><?= uri_string(); ?>" target="_blank" data-original-title="googleplus" class="social-icon social-icon-color googleplus share-gplus"></a>
                        </li>
                        <!-- Twitter -->
                        <li>
                            <a href="https://twitter.com/intent/tweet?text=<?= !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?> Profile on Xremo <?= XREMO_URL; ?><?= uri_string(); ?>" target="_blank" data-original-title="twitter" class="social-icon social-icon-color twitter share-tw">
                            </a>
                        </li>
                        <!-- Facebook -->
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= XREMO_URL; ?><?= uri_string(); ?>&amp;src=sdkpreparse" data-href="umroh-bersama-ustadz-subhan-bawazier" data-layout="button" data-size="small" data-mobile-iframe="false" target="_blank" data-original-title="facebook" class="social-icon social-icon-color facebook fb-share-button share-fb">
                            </a>
                        </li>
                        <!-- Linked In -->
                        <li>
                            <a href="http://www.linkedin.com/shareArticle?url=<?= XREMO_URL; ?><?= uri_string(); ?>" target="_blank" data-original-title="linkedin" class="share-tw social-icon social-icon-color linkedin">
                            </a>
                        </li>

                    </ul>

                </li>
                <?php endif; ?>

                <!-- Personal Info -->
                <li class="list-group-item border-none md-grey-lighten-5 pt-30-sm pt-20 ">
                    <h6 class="text-center text-uppercase  md-darkblue-text font-weight-600 letter-space-sm hidden-xs">
                        <?= !empty($language->site_personal_information) ? $language->site_personal_information: "Personal Information" ?>
                    </h6>
                    <h6 class="text-center text-uppercase font-16 md-darkblue-text font-weight-600 letter-space-sm visible-xs">
                        <?= !empty($language->site_personal_information) ? $language->site_personal_information: "Personal Information" ?>
                    </h6>
                    <hr class="border-mdo-orange-v5 width-100 center-block hor-divider-solid-medium my-10">
                    <ul class="list-unstyled mx-0 text-center">
                        <li>
                            <?php if($this->session->userdata('id') && ($this->session->userdata('id') != $user_profile['overview']['id_users'])){?>
                            <a href="<?=base_url()?>send_message/<?=rtrim(base64_encode($user_profile['overview']['id_users']), '='); ?>/new" class=" btn btn-block btn-md-orange roboto-font mb-20" target="_blank">
                                <i class="icon-envelope mr-2 "></i>
                                <?= !empty($language->site_send_message) ? $language->site_send_message : "Send Message" ;?>
                            </a>
                            <?php }?>
                        </li>
                        <li>
                            <h5 class="font-weight-700 font-grey-gallery mb-0 font-14 text-uppercase">
                                <?= !empty($language->site_gender) ? $language->site_gender : "Gender" ;?>
                            </h5>
                            <p class="mt-5  text-lighten-4">
                                <?= !empty($user_profile['overview']['student_bios_gender']) ?  $user_profile['overview']['student_bios_gender'] : '-'; ?>
                            </p>
                        </li>
                        <?php if(!empty($roles)){ ?>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-14 text-uppercase">
                                <?= !empty($language->DOB) ? $language->DOB : "Date Of Birth" ;?>
                            </h5>
                            <p class="mt-5 ">
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
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-14 text-uppercase">
                                <?= !empty($language->phone_number) ? $language->phone_number : "Phone Number" ;?>
                            </h5>
                            <p class="mt-5 ">
                                <?= !empty($user_profile['overview']['student_bios_contact_number']) ?  $user_profile['overview']['student_bios_contact_number'] : '-'; ?>
                                    <!--<span class="badge badge-roundless badge-md-orange right text-uppercase">Primary</span>-->
                            </p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  mb-0 font-14 text-uppercase font-grey-gallery">
                                <?= !empty($language->email_address) ? $language->email_address : "Email Address" ;?>
                            </h5>
                            <p class="mt-5 ">
                                <?= !empty($user_profile['overview']['email']) ?  $user_profile['overview']['email'] : '-'; ?>
                            </p>
                        </li>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-14 text-uppercase">
                                <?= !empty($language->address) ? $language->address : "Address" ;?>
                            </h5>
                            <?php
                                $full_address = !empty($user_profile['address']['address']) ? $user_profile['address']['address'].", ":"";
                                $full_address .= !empty($user_profile['address']['city']) ? $user_profile['address']['city'].", ":"";
                                $full_address .= !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'].", ":"";
                                $full_address .= !empty($user_profile['address']['states']) ? $user_profile['address']['states'].", ":"";
                                $full_address .= !empty($user_profile['address']['country']) ? $user_profile['address']['country'].", ":"";
                                $full_address = $full_address != ""?substr($full_address, 0, -2):"-";
                            ?>
                                <p class="mt-5 ">
                                    <?= $full_address;?>
                                </p>
                        </li>
                        <?php } ?>
                        <li>
                            <h5 class="font-weight-700  font-grey-gallery mb-0 font-14 text-uppercase">
                                <?= !empty($language->language) ? $language->language : "Language" ;?>
                            </h5>
                            <ul class="list-unstyled mx-0">
                                <?php if(!empty($user_profile['language'])){?>
                                <?php foreach($user_profile['language'] as $key => $value){?>
                                <li>
                                    <p class="my-5 ">
                                        <strong class="font-14 md-orange-text">
                                            <?= $value['title']; ?>
                                        </strong>
                                        <br>
                                        <small>[
                                            <?= !empty($language->spoken) ? $language->spoken : "Spoken" ;?> :
                                                <?= $value['spoken']; ?> Level ,
                                                    <?= !empty($language->written) ? $language->written : "Written" ;?> :
                                                        <?= $value['written']; ?> Level] </small>
                                    </p>

                                </li>
                                <?php }}else{ echo "-";} ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- CV Video -->
                <li class="list-group-item border-none md-grey-lighten-5 pt-30-sm pt-20">
                    <h6 class="text-center text-uppercase  md-darkblue-text font-weight-600 letter-space-sm hidden-xs ">
                        <?= !empty($language->video_resume) ? $language->video_resume : "Video Resume" ;?>
                    </h6>
                    <h6 class="text-center text-uppercase font-16 md-darkblue-text font-weight-600 letter-space-sm visible-xs">
                        <?= !empty($language->video_resume) ? $language->video_resume : "Video Resume" ;?>
                    </h6>
                    <hr class="border-mdo-orange-v5 width-100 center-block hor-divider-solid-medium my-10">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="<?= !empty($user_profile['overview']['youtubelink']) ?  $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU'; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </li>

                <!-- Gallery -->
                <li class="list-group-item border-none md-grey-lighten-5 pt-30">
                    <h6 class="text-center text-uppercase  md-darkblue-text font-weight-600 letter-space-sm ">
                        <?= !empty($language->site_gallery) ? $language->site_gallery : "Gallery" ;?>
                    </h6>
                    <hr class="border-mdo-orange-v5 width-100 center-block hor-divider-solid-medium my-10">
                    <?php if(!empty($gallery)) {?>
                    <div class="portfolio-content portfolio-3">
                        <div id="js-grid-lightbox-gallery" class="cbp">
                            <?php $gall_no = 1;foreach ($gallery as $gallery_key => $gallery_value) {?>
                            <div class="cbp-item" id="gall_<?=$gall_no?>" <?=$gall_no> 12?'style="display:none;"':''?>>
                                <a href="<?= IMG.'gallery/'.$gallery_value['photo']; ?>" class="cbp-caption cbp-lightbox" data-title="<?=$gallery_value['title'];?><br><?=$gallery_value['description'];?>">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="<?= IMG.'gallery/'.$gallery_value['photo']; ?>" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">
                                                    <?=$gallery_value['title'];?>
                                                </div>
                                                <div class="cbp-l-caption-desc">
                                                    <?=$gallery_value['description'];?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $gall_no++;}?>
                        </div>
                        <?php if($gall_no > 12){?>
                        <div id="js-loadMore-lightbox-gallery" class="cbp-l-loadMore-button">
                            <a href="#" class="cbp-l-loadMore-link btn btn-md-grey btn-outline m-20 letter-space-xs" id="gall_more">
                                <?= !empty($language->site_load) ? $language->site_load : "LOAD MORE" ;?>
                            </a>
                        </div>
                        <?php }?>
                    </div>
                    <?php }else{?>
                    <!-- # Empty States -->
                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                    <?php }?>
                </li>

                <!-- Reference (Limit PUT 3 ONLY)-->
                <?php if(!empty($roles)){ ?>
                <li class="list-group-item border-none md-grey-lighten-5 pt-20">
                    <h6 class="text-center text-uppercase  md-darkblue-text font-weight-600 letter-space-sm ">
                        <?= !empty($language->references) ? $language->references : "References" ;?>
                    </h6>
                    <hr class="border-mdo-orange-v5 width-100 center-block hor-divider-solid-medium my-10">
                    <?php if(!empty($user_profile['reference'])) { ?>
                    <ul class="list-unstyled text-center ">
                        <?php foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                            if($reference_value['reference_name'] != ""){ ?>
                        <li>
                            <dl>
                                <dt>
                                    <?=$reference_value['reference_name']?>
                                </dt>
                                <dd class="font-14">
                                    <?=$reference_value['reference_phone'] != ""?$reference_value['reference_phone']:"-"?>
                                </dd>
                                <dd class="font-14">
                                    <?=$reference_value['reference_email'] != ""?$reference_value['reference_email']:"-"?>
                                </dd>
                                <dd class="font-14">
                                    <?=$reference_value['reference_relationship'] != ""?$reference_value['reference_relationship']:"-"?>
                                </dd>
                            </dl>
                        </li>
                        <?php } }  ?>
                    </ul>
                    <?php }else{?>
                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                    <?php }?>
                    <?php }?>
                </li>

            </ul>
        </div>

        <!-- Content-->
        <div class="m-grid-col m-grid-col-lg-8 m-grid-col-md-8 m-grid-col-sm-12 m-grid-col-xs-12 py-20-sm px-10-sm p-0 ">
            <div class="portlet light ">

                <!-- Nav Tabs -->
                
                <div class="portlet-title tabbable-line tab-md-orange hidden-xs tabbable tabbable-tabdrop">
                    <ul class="nav nav-tabs pull-left mt-position-relative">
                        <li class="active">
                            <a href="#tab_summary" data-toggle="tab" class="font-15 font-weight-400">
                                <i class="icon-user mr-5"></i>
                                <?= !empty($language->site_summary) ? $language->site_summary : "Summary" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_education" data-toggle="tab" class="font-15 font-weight-400">
                                <i class="icon-graduation mr-5"></i>
                                <?= !empty($language->site_education) ? $language->site_education : "Education" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_experience" data-toggle="tab" class="font-15 font-weight-400">
                                <i class="icon-briefcase mr-5"></i>
                                <?= !empty($language->site_experience) ? $language->site_experience : "Experience" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_noneducation" data-toggle="tab" class="font-15 font-weight-400">
                                <i class="icon-notebook mr-5"></i>
                                <?= !empty($language->site_non_education) ? $language->site_non_education : "Non Education" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_skills" data-toggle="tab" class="font-15 font-weight-400">
                                <i class="icon-badge mr-5"></i>
                                <?= !empty($language->site_project) ? $language->site_project : "Project" ;?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- @ Mobile View -->
                <div class=" portlet-title  visible-xs  tabbable tabbable-tabdrop ">
                    <ul class="nav nav-pills tab-md-indigo  mt-position-relative" role="navigation">
                        <li class="active ">
                            <a href="#tab_summary" data-toggle="tab" class="font-14 font-weight-400 p-10">
                                <i class="icon-user "></i>
                                <?= !empty($language->site_summary) ? $language->site_summary : "Summary" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_education" data-toggle="tab" class="font-14 font-weight-400 p-10">
                                <i class="icon-graduation"></i>
                                <?= !empty($language->site_education) ? $language->site_education : "Education" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_experience" data-toggle="tab" class="font-14 font-weight-400 p-10">
                                <i class="icon-briefcase mr-5"></i>
                                <?= !empty($language->site_experience) ? $language->site_experience : "Experience" ;?>
                            </a>
                        </li>
                        <li>
                            <a href="#tab_noneducation" data-toggle="tab" class="font-14 font-weight-400 p-10">
                                <i class="icon-notebook mr-5"></i>
                                <?= !empty($language->site_non_education) ? $language->site_non_education : "Non Education" ;?>
                            </a>
                        </li>
                        <li >
                            <a href="#tab_skills" data-toggle="tab" class="font-14 font-weight-400 p-10">
                                <i class="icon-badge mr-5"></i>
                                <?= !empty($language->site_project) ? $language->site_project : "Project" ;?>
                            </a>
                        </li>
                    </ul>                    
                </div>

                <!-- Tab Content -->
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- Tab Summary -->
                        <div class="tab-pane active" id="tab_summary">
                            <ul class="list-group list-border">
                                <!-- About Me -->
                                <li class="list-group-item border-none py-20">
                                    <h6 class="font-weight-700 text-uppercase md-darkblue-text mb-5 letter-space-xs">
                                        <?= !empty($language->site_about_me) ? $language->site_about_me : "About Me" ;?>
                                    </h6>
                                    <hr class="border-md-orange width-30 mt-10 hor-divider-solid-thick">

                                    <?php if(!empty($user_profile['overview']['summary'])){?>
                                    <p class="mb-5 font-weight-400">
                                        <?= $user_profile['overview']['summary']?>
                                    </p>
                                    <?php }else{?>
                                    <!-- # Empty States -->
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>

                                </li>

                                <!-- Education [Latest ]-->
                                <li class="list-group-item border-none py-20">
                                    <h6 class="font-weight-700 text-uppercase md-darkblue-text mb-5 letter-space-xs">
                                        <?= !empty($language->site_education) ? $language->site_education : "Education" ;?>
                                    </h6>
                                    <hr class="border-md-orange width-30 mt-10 hor-divider-solid-thick">

                                    <?php if(!empty($user_profile['academics'])){?>
                                    <ul class="list-unstyled my-15">
                                        <?php foreach($user_profile['academics'] as $key => $value){?>
                                        <li class="font-weight-500 font-17 text-capitalize roboto-font">
                                            <?= $value['degree_name']?>
                                                <small class="font-weight-400 font-14 pull-right">
                                                    <?php 
                                                                if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                                {
                                                                    echo 'Not Provided';
                                                                }
                                                                else
                                                                {
                                                                    echo date('d F Y', strtotime($value['start_date']));
                                                            ?> -
                                                    <?php 
                                                                    echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));
                                                                }
                                                            ?>
                                                </small>
                                        </li>
                                        <li class="font-weight-400 font-16">
                                            <i class="fa fa-university"></i>
                                            <?= $value['university_name']?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php }else{?>
                                    <!-- # Empty States -->
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>

                                </li>

                                <!-- Experience [All] -->
                                <li class="list-group-item border-none py-20">
                                    <h6 class="font-weight-700 text-uppercase md-darkblue-text mb-5 letter-space-xs">
                                        <?= !empty($language->site_experience) ? $language->site_experience : "Experience" ;?>
                                    </h6>
                                    <hr class="border-md-orange width-30 mt-10 hor-divider-solid-thick">

                                    <?php if(!empty($user_profile['experiences'])){?>
                                    <ul class="list-unstyled mt-20 ">
                                        <?php foreach($user_profile['experiences'] as $key => $value){?>
                                        <li class="my-15">
                                            <h5 class="font-weight-500 font-16 text-capitalize roboto-font ">
                                                <?= $value['experiences_title'];?>
                                                    -
                                                    <span class="md-blue-text ml-5">
                                                        <i class="icon-briefcase "></i>
                                                        <?= $value['employment_type'];?>
                                                    </span>
                                                    <small class="font-weight-400 font-14 pull-right">
                                                        <?php 
                                                                    if(empty($value['experiences_start_date']) || $value['experiences_start_date'] == '0000-00-00' || $value['experiences_start_date'] == '1970-01-01')
                                                                    {
                                                                        echo 'Not Provided';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo date('F Y', strtotime($value['experiences_start_date']));
                                                                ?> -
                                                        <?php 
                                                                        echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));
                                                                    }
                                                                ?>
                                                    </small>
                                            </h5>
                                            <h5 class=" font-weight-400 font-16">
                                                <i class="fa fa-building-o"></i>
                                                <?= $value['experiences_company_name'];?>
                                            </h5>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php }else{?>
                                    <!-- # Empty States -->
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>

                                </li>

                                <!-- Non Education [All]-->
                                <li class="list-group-item border-none py-20">
                                    <h6 class="font-weight-700 text-uppercase md-darkblue-text mb-5 letter-space-xs">
                                        <?= !empty($language->site_non_education) ? $language->site_non_education : "Non Education" ;?>
                                    </h6>
                                    <hr class="border-md-orange width-30 mt-10 hor-divider-solid-thick">

                                    <?php if(!empty($user_profile['achievement'])){?>
                                    <ul class="list-unstyled">
                                        <?php foreach($user_profile['achievement'] as $key => $value){?>
                                        <li class="font-weight-400 font-17 text-capitalize roboto-font">
                                            <i class="icon-notebook"></i>
                                            <?= $value['achievement_title']; ?>
                                                <small class="font-weight-400 font-14 pull-right ">
                                                    <?php 
                                                        if(empty($value['achievement_start_date']) || $value['achievement_start_date'] == '0000-00-00' || $value['achievement_start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('d F Y', strtotime($value['achievement_start_date']));
                                                    ?> -
                                                    <?php 
                                                            echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['achievement_end_date']));
                                                        }
                                                    ?>
                                                </small>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php }else{?>
                                    <!-- # Empty States -->
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </li>

                                <!-- Skill [All]-->
                                <li class="list-group-item border-none py-20">
                                    <h6 class="font-weight-700 text-uppercase md-darkblue-text mb-5 letter-space-xs">
                                        <?= !empty($language->site_project) ? $language->site_project : "Project" ;?>
                                    </h6>
                                    <hr class="border-md-orange width-30 mt-10 hor-divider-solid-thick">
                                    <?php if(!empty($user_profile['achievement'])){?>
                                    <ul class="list-unstyled">
                                        <?php foreach($user_profile['projects'] as $key => $value){?>
                                        <li class="font-weight-500 font-17 text-capitalize roboto-font">
                                            <i class="fa fa-tasks fa-fw"></i>
                                            <?= $value['name']; ?>
                                                <small class="font-weight-400 font-14 pull-right">
                                                    <?php 
                                                        if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('F Y', strtotime($value['start_date']));
                                                    ?> -
                                                    <?php 
                                                            echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));
                                                        }
                                                    ?>
                                                </small>
                                        </li>
                                        <?php }?>
                                    </ul>
                                    <?php }else{?>
                                    <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                                    <?php }?>
                                </li>
                            </ul>
                        </div>

                        <!-- Tab Education [Rate & Review]-->
                        <div class="tab-pane" id="tab_education">
                            <?php if(!empty($user_profile['academics'])){?>
                            <ul class="list-group list-border">
                                <?php $i=0; foreach($user_profile['academics'] as $key => $value){
                                        $keyReviewEdu = array_search($value['academic_id'], array_column($endorseReviewRating['review'],'skill_id'));
                                        $review_counter = countReviewerEducation($value['academic_id'], $segmented_uri);

                                        if (!is_bool($keyReviewEdu)) {
                                            $checkReviewSame = $value['academic_id'] == $endorseReviewRating['review'][$keyReviewEdu]['skill_id'];
                                            $checkReviewNotSame = $value['academic_id'] != $endorseReviewRating['review'][$keyReviewEdu]['skill_id'];
                                            $countReviewer = count($review_counter['education']);
                                        }else{
                                            $checkReviewSame = false;
                                            $checkReviewNotSame = true;
                                            $countReviewer = count($review_counter['education']);
                                        }

                                        

                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdExistEducationReview = array_search($id, array_column($review_counter['education'],'endorser_id'));
                                            
                                        }else{
                                            $checkIdExistEducationReview = array_search($id, array_column($review_counter['education'],'user_id'));
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
                                        $rate_education = countRateEducation($value['academic_id'], $segmented_uri);
                                        $total_rating = 0;
                                        foreach ($rate_education['education'] as $key => $rating) {
                                            // var_dump($value[$i+1]['rating']);
                                                $total_rating += $rating['rating'];
                                        }

                                        $keyRatingEdu = array_search($value['academic_id'], array_column($endorseReviewRating['rate'],'skill_id'));
                                        $rating_counter = countRateEducation($value['academic_id'], $segmented_uri);
                                        if (!is_bool($keyRatingEdu)) {
                                            $checkRatingSame = $value['academic_id'] == $endorseReviewRating['rate'][$keyRatingEdu]['skill_id'];
                                            $checkRatingNotSame = $value['academic_id'] != $endorseReviewRating['rate'][$keyRatingEdu]['skill_id'];
                                            $countRater = count($rating_counter['education']);
                                        }else{
                                            $checkRatingSame = false;
                                            $checkRatingNotSame = true;
                                            $countRater = count($rating_counter['education']);
                                        }

                                        if ($id != base64_decode($segmented_uri)) {
                                            $checkIdExistEducationRate = array_search($id, array_column($rating_counter['education'],'endorser_id'));
                                            
                                        }else{
                                            $checkIdExistEducationRate = array_search($id, array_column($rating_counter['education'],'user_id'));
                                        }


                                        if (($countRater == 0) && $id == base64_decode($segmented_uri)) {
                                            $modal_rate = 'modal_rated_empty_educations_'.$value['academic_id'];
                                            $class = 'rate-education-list';
                                        }else if(($countRater == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_rate = 'modal_rater_empty_educations';
                                            $class = 'rate-education-input-empty';
                                        }else if($countRater > 0 && !is_bool($checkIdExistEducationRate)){
                                            $modal_rate = 'modal_rate_education_list';
                                            $class = 'rate-education-list';
                                        }else{
                                            $modal_rate = 'modal_list_rater_input';
                                            $class = 'rate-education-input';
                                        }

                                        

                                        if ($total_rating > 0 && !empty($rate_education['education'])) {
                                            $totalRating = round($total_rating/count($rate_education['education']),1);
                                        }else{
                                            $totalRating = round($total_rating,1);      
                                        }
                                    ?>

                                <li class="list-group-item  ">
                                    <div class="media">
                                        <!-- Rate & Review Button -->
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <?php if (!empty($id)) :
                                                        // Rate
                                                        if (!empty($keyRatingEdu)) : ?>
                                                <a href="#<?= $modal_rate;?>" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['academic_id']; ?>" data-name="<?= $value['degree_name'];?>" endorse-type="academics" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>

                                                <?php else: ?>
                                                <a href="#<?= $modal_rate;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['academic_id']; ?>" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class; ?>" endorse-type="academics" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>

                                                <?php endif; ?>
                                                <!-- Review -->
                                                <?php if(!empty($keyReviewEdu)): ?>
                                                <a href="#<?= $modal_review;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_review_education_list') ? 'review-education-list' : 'review-education-input';?>" endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['academic_id']; ?>" endorse-type="academics" data-container="body" data-placement="top" data-original-title="Click here to see who review me " user="<?= $checkUser?>">
                                                    <?= $countReviewer?>
                                                        <i class="icon-note"></i>
                                                </a>
                                                <?php else: ?>
                                                <a href="#<?= $modal_review;?>" data-name="<?= $value['degree_name'];?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_review_education_list') ? 'review-education-list' : 'review-education-input';?>" endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" endorse-type="academics" data-name="<?= $value['degree_name']; ?>" data-id="<?= $value['academic_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me "
                                                    user="<?= $checkUser?>">
                                                    <?= $countReviewer?>
                                                        <i class="icon-note"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php else: ?>
                                                <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">
                                                    <?= !empty($language->site_login_to_review) ? $language->site_login_to_review : "Login to review" ;?>
                                                </a>
                                                <?php endif ?>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <!-- Qualifications Level & Degree Names -->
                                            <h6 class="font-weight-600  ">
                                                <?= $value['qualification_level'];?> in
                                                    <?= $value['degree_name'];?>
                                            </h6>
                                            <!-- Institution Name  -->
                                            <h6 class=" font-weight-400 font-16 ">
                                                <i class="fa fa-institution mr-5"></i>
                                                <?= $value['university_name']; ?>
                                            </h6>
                                            <!-- Start - End Date -->
                                            <h6 class=" font-weight-400 font-grey-gallery font-14">
                                                <i class="icon-calendar mr-5"></i>
                                                <?php 
                                                        if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01')
                                                        {
                                                            echo 'Not Provided';
                                                        }
                                                        else
                                                        {
                                                            echo date('d F Y', strtotime($value['start_date']));
                                                    ?> -
                                                <?php 
                                                            echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));
                                                        }
                                                    ?>

                                            </h6>
                                        </div>
                                    </div>
                                    <hr class="border-mdo-orange-v7 my-10 width-200">
                                    <!-- Description -->
                                    <p class="font-16 font-weight-400  text-justify">
                                        <?= $value['degree_description']; ?>
                                    </p>
                                </li>

                                <!-- Modal : Rate [Rated Empty Educations] -->
                                <!-- # Empty States Modal [User-Employer]-->
                                <div class="modal fade" id="modal_rated_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->review) ? $language->review : "Review " ;?> -
                                                        <small class="font-16">
                                                            <?= $value['degree_name'];?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50 ">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-star font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_get_friendsrt) ? $language->site_get_friendsrt : "Get your friends to rate you!" ;?>
                                                                </h4>
                                                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 font-16 font-weight-400 text-none">
                                                                    <?= !empty($language->site_rate_invite) ? $language->site_rate_invite : "Hey ! Invite one of your friend to rate your resume." ;?>
                                                        </h5>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Reviewed [Reviewed Empty Education] -->
                                <!-- # Empty States Modal [User-Employer]-->
                                <div class="modal fade" id="modal_reviewed_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->review) ? $language->review : "Review " ;?> -
                                                        <small class="font-16">
                                                            <?= $value['degree_name'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50 ">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-note font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_get_friendsrv) ? $language->site_get_friendsrv : "Get your friends to review you!" ;?>
                                                        </h5>
                                                        <h6 class="text-center font-16 font-weight-400 font-grey-cascade mt-10 mb-30 text-none">
                                                            <?= !empty($language->site_review_invite) ? $language->site_review_invite : "Hey ! Invite one of your friend to review your resume." ;?>
                                                        </h6>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Reviewer -->
                                <!-- # Empty States Modal [User-Logged user]-->
                                <div class="modal fade" id="modal_reviewer_empty_educations_<?= $value['academic_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->review) ? $language->review : "Review s" ;?> -
                                                        <small class="font-16">
                                                            <?= $value['degree_name'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50 ">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-20"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_first_review) ? $language->site_first_review : "Be the first to review" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-5 text-none font-16 font-weight-400">
                                                            <?= !empty($language->site_genuine_review) ? $language->site_genuine_review : "Give a genuine review about his/her information." ;?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer md-grey-lighten-5">
                                                <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">
                                                    <div class="form-group text-left mx-0 mb-10">
                                                        <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>
                                                        <input type="hidden" value="<?= $value['academic_id'];?>" name="skill_id">
                                                        <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                                        <input type="hidden" value="<?= !empty($segmented_uri) ? base64_decode($segmented_uri) : $this->session->userdata('id');?>" name="endorsed_id">
                                                    </div>
                                                    <a href="" data-dismiss="modal" class="btn btn-default btn-outline">
                                                        <?= !empty($language->site_cancel) ? $language->site_cancel : "Cancel" ;?>
                                                    </a>
                                                    <button type="submit" class="btn btn-md-indigo ">
                                                        <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php $i++; } ?>
                            </ul>
                            <?php }else{?>
                            <!-- # Empty States -->
                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                            <?php }?>
                        </div>

                        <!-- Tab Experience [Rate & Review]-->
                        <div class="tab-pane" id="tab_experience">
                            <?php if(!empty($user_profile['experiences'])){?>
                            <ul class="list-group list-border">
                                <?php $i=1; foreach($user_profile['experiences'] as $key => $value){        
                                        $keyReviewExp = array_search($value['experience_id'], array_column($endorseReviewRating['review'],'exp_id'));
                                        $review_counter = countReviewerExp($value['experience_id'], $segmented_uri);
                                        
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
                                            $class = 'review-experience-list';
                                        }else if(($countReviewer == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_review = 'modal_reviewer_empty_experiences_'.$value['experience_id'];
                                            $class = 'review-input';
                                        }else if($countReviewer > 0 && !is_bool($checkIdExist)){
                                            $modal_review = 'modal_review_experience_list';
                                            $class = 'review-experience-list';
                                        }else{
                                            $modal_review = 'modal_list_reviewer_input';
                                            $class = 'review-input';
                                        }
                                        /*end review*/
                                        /*start rating*/

                                        $rate_experience = countRateExp($value['experience_id'], $segmented_uri);

                                        $total_rating = 0;
                                        foreach ($rate_experience['experience'] as $key => $rating) {
                                            // var_dump($value[$i+1]['rating']);
                                                $total_rating += $rating['rating'];
                                        }

                                        $keyRatingExp = array_search($value['experience_id'], array_column($endorseReviewRating['rate'],'exp_id'));
                                        $rating_counter = countRateExp($value['experience_id'], $segmented_uri);

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
                                            $class = 'rate-experience-list';
                                        }else if(($countRater == 0) && $id != base64_decode($segmented_uri)){
                                            $modal_rate = 'modal_rater_empty_experience';
                                            $class = 'rate-experience-input-empty';
                                        }else if($countRater > 0 && !is_bool($checkIdRatingExist)){
                                            $modal_rate = 'modal_rate_experience_list';
                                            $class = 'rate-experience-list';
                                        }else{
                                            $modal_rate = 'modal_list_rater_input';
                                            $class = 'rate-experience-input';
                                        }


                                        if ($total_rating > 0 && !empty($rate_experience['experience'])) {
                                            $totalRating = round($total_rating/count($rate_experience['experience']),1);
                                        }else{
                                            $totalRating = round($total_rating,1);      
                                        }
                                        
                                ?>
                                <li class="list-group-item  ">
                                    <div class="media">
                                        <!-- Rate & Review -->
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <?php if (!empty($id)):
                                                        if (!empty($keyReviewExp)) :?>
                                                <?php if (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkReviewSame): ?>
                                                <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" endorse-type="experience" data-id="<?= $value['experience_id']; ?>" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class;?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me " user="<?= $checkUser?>">
                                                    <?= $countReviewer ;?>
                                                        <i class="icon-note"></i>
                                                </a>

                                                <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkReviewNotSame ): ?>
                                                <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['experience_id']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class;?>" data-name="<?= $value['experiences_title']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me " user="<?= $checkUser?>">
                                                    <?= $countReviewer ;?>
                                                        <i class="icon-note"></i>
                                                </a>

                                                <?php else: ?>
                                                <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['experience_id']; ?>" data-name="<?= $value['experiences_title']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class;?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?> " data-container="body" data-placement="top" data-original-title="Click here to see who review me " endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" user="<?= $checkUser?>">
                                                    <?= $countReviewer ;?>
                                                        <i class="icon-note"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php else: ?>
                                                <a href="#<?= $modal_rate; ?>" endorser-id="<?= $id; ?>" endorsed-id="<?= base64_decode($segmented_uri); ?>" data-id="<?= $value['experience_id']; ?>" endorse-type="experience" data-toggle="modal" class="btn btn-md-amber  btn-md font-weight-700 tooltips text-center <?= $class; ?>" data-name="<?= $value['experiences_title']; ?>" data-container="body" data-placement="top" data-original-title="Click here to see who rate me " user="<?= $checkUser?>">
                                                    <?= $totalRating; ?>
                                                        <i class="icon-star text-center"></i>
                                                </a>
                                                <a href="#<?= $modal_review; ?>" data-toggle="modal" class="btn btn-md-indigo  btn-md font-weight-700 tooltips <?= ($modal_review == 'modal_list_reviewer_input') ? 'review-input' : 'review-experience-list';?>" data-container="body" data-placement="top" data-original-title="Click here to see who review me " endorser-id="<?= $id; ?>" user-id="<?= base64_decode($segmented_uri); ?>" endorse-type="experience" data-name="<?= $value['experiences_title']; ?>" data-id="<?= $value['experience_id']; ?>" user="<?= $checkUser?>">
                                                    <?= $countReviewer ;?>
                                                        <i class="icon-note"></i>
                                                </a>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">
                                                    <?= !empty($language->site_login_to_review) ? $language->site_login_to_review : "Login to review" ;?>
                                                </a>
                                                <?php endif ?>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <!-- Title -->
                                            <h6 class="font-weight-600 ">
                                                <?= $value['experiences_title'];?>
                                            </h6>
                                            <!-- Company NAme -->
                                            <h6 class=" font-weight-400 font-16">
                                                <i class="fa fa-building-o mr-5"></i>
                                                <?= $value['experiences_company_name']; ?>
                                            </h6>
                                            <!-- Start date / End date -->
                                            <h6 class="font-weight-400 font-14 font-grey-gallery">
                                                <i class="icon-calendar mr-5"></i>
                                                <?php 
                                                    if(empty($value['experiences_start_date']) || $value['experiences_start_date'] == '0000-00-00' || $value['experiences_start_date'] == '1970-01-01')
                                                    {
                                                        echo 'Not Provided';
                                                    }
                                                    else
                                                    {
                                                        echo date('F Y', strtotime($value['experiences_start_date']));
                                                ?> -
                                                <?php 
                                                        echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['experiences_end_date']));
                                                    }
                                                ?>
                                            </h6>
                                            <h6 class="">
                                                <?php if (!empty($value['employment_type'])){ ?>
                                                <span class="label label-md-blue letter-space-sm font-weight-500 mr-5">
                                                    <i class="icon-briefcase mr-5"></i>
                                                    <?= $value['employment_type']; ?>
                                                </span>
                                                <?php } if (!empty($value['industry_name'])){ ?>
                                                <span class="label  badge-important label-md-blue-grey letter-space-sm font-weight-500">
                                                    <i class="fa fa-industry mr-5"></i>
                                                    <?= $value['industry_name']; ?>
                                                </span>
                                                <?php } ?>
                                            </h6>
                                        </div>
                                    </div>


                                    <?php if (!empty($value['experiences_description']) ||($value['skills']) ){ ?>
                                    <hr class="border-mdo-orange-v7 my-10 width-200">
                                    <?php } ?>

                                    <!-- Description -->
                                    <?php if (!empty($value['experiences_description'])){ ?>
                                    <p class="font-16 text-justify font-weight-400 ">
                                        <?= $value['experiences_description']; ?>
                                    </p>
                                    <?php } ?>
                                    <!-- Skill Earned -->
                                    <?php if (!empty($value['skills'])){ ?>
                                    <p class="font-weight-600 font-14 text-uppercase mb-5">
                                        <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ;?>
                                    </p>
                                    <ul class="list-unstyled list-inline mt-ul-li-lr-0 mx-0">
                                        <?php 
                                            $tag = explode(',', $value['skills']);
                                            $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                            shuffle($label);
                                            $i = 0;

                                            foreach ($tag as $tag_key => $tag_value) { 
                                                ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;
                                        ?>
                                        <li>
                                            <p class="label <?php echo $label[$tag_key]; ?> label-sm">
                                                <?php echo $tag_value; ?>
                                            </p>
                                        </li>
                                        <?php $tag_key++; } ?>
                                    </ul>
                                    <?php } ?>
                                </li>

                                <!-- Modal : Rate [Rated Empty Experience] -->
                                <!-- # Empty States [User - Employer] -->
                                <div class="modal fade" id="modal_rated_empty_experience_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->rating) ? $language->rating : "Rating " ;?> -
                                                        <small class="font-16">
                                                            <?= $value['experiences_title'];?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50 ">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-star font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_get_friendsrt) ? $language->site_get_friendsrt : "Get your friends to rate you!" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-10 mb-30 text-none font-16 font-weight-400">
                                                            <?= !empty($language->site_rate_invite) ? $language->site_rate_invite : "Hey ! Invite one of your friend to rate your resume." ;?>
                                                        </h6>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal : Review [Reviewed Empty Experience] -->
                                <!-- # Empty States [User - Employer] -->
                                <div class="modal fade" id="modal_reviewed_empty_experiences_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->review) ? $language->review : "Review " ;?> -
                                                        <small class="font-16">
                                                            <?= $value['experiences_title'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50 ">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-star font-grey-mint font-40 mb-20"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_get_friendsrv) ? $language->site_get_friendsrv : "Get your friends to review you!" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-5 text-none font-16 font-weight-400">
                                                            <?= !empty($language->site_review_invite) ? $language->site_review_invite : "Hey ! Invite one of your friend to review your resume." ;?>
                                                        </h6>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal : Review [Reviewer Empty Experience] -->
                                <!-- # Empty States [User - All] -->
                                <div class="modal fade" id="modal_reviewer_empty_experiences_<?= $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->review) ? $language->review : "Review " ;?> -
                                                        <small class="font-16">
                                                            <?= $value['experiences_title'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-20"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_first_review) ? $language->site_first_review : "Be the first to review" ;?>
                                                        </h5>
                                                        <h6 class="font-16 font-weight-400 text-center  font-grey-cascade mt-5 text-none">
                                                            <?= !empty($language->site_genuine_review) ? $language->site_genuine_review : "Give a genuine review about his/her information." ;?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer md-grey-lighten-5">
                                                <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">
                                                    <div class="form-group text-left mx-0 mb-10">
                                                        <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>
                                                        <input type="hidden" value="<?= $value['experience_id'];?>" name="exp_id">
                                                        <input type="hidden" value="<?= $id;?>" name="endorser_id">
                                                        <input type="hidden" value="<?= base64_decode($segmented_uri);?>" name="endorsed_id">
                                                        <span class="help-block">
                                                            <?= !empty($language->site_genuine_state) ? $language->site_genuine_state : "Please put genuine statement !" ;?>
                                                        </span>
                                                    </div>
                                                    <a href="" data-dismiss="modal" class="btn btn-default btn-outline">
                                                        <?= !empty($language->site_cancel) ? $language->site_cancel : "Cancel" ;?>
                                                    </a>
                                                    <button type="submit" class="btn btn-md-indigo ">
                                                        <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </ul>
                            <?php }else{?>
                            <!-- # Empty States -->
                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                            <?php }?>
                        </div>

                        <!-- Tab Non Education [Endorse]-->
                        <div class="tab-pane" id="tab_noneducation">
                            <?php if(!empty($user_profile['achievement'])){?>
                            <ul class="list-group list-border">
                                <?php foreach($user_profile['achievement'] as $key => $value){
                                        $endorsement_counter = countEndorserAchievement($value['achievement_id'], $segmented_uri);
                                        $keyAchievement = array_search($value['achievement_id'], array_column($endorseReviewRating['endorse'],'achievement_id'));

                                        if (!is_bool($keyAchievement)) {
                                            $checkEndorseSame = $value['achievement_id'] == $endorseReviewRating['endorse'][$keyAchievement]['achievement_id'];
                                            $checkEndorseNotSame = $value['achievement_id'] != $endorseReviewRating['endorse'][$keyAchievement]['achievement_id'];
                                            $countEndorser = count($endorsement_counter['achievement']);
                                        }else{
                                            $checkEndorseSame = false;
                                            $checkEndorseNotSame = true;
                                            $countEndorser = count($endorsement_counter['achievement']);
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
                                        <!-- Endorse -->
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <?php if (!empty($id)):
                                                        if (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (!empty($endorseReviewRating['endorse'])) && $checkEndorseSame ): ?>
                                                        <button class="btn btn-md-red font-weight-700 tooltips text-center unendorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" endorse-type="achievement" data-id="<?= $value['achievement_id']; ?>" data-placement="top" data-original-title="Endorse this user" user="<?= $checkUser?>">
                                                            <i class="icon-close"></i>
                                                            Unendorse
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['achievement_id']; ?>" endorse-type="achievement" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['achievement_title']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project" user="<?= $checkUser?>">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?>
                                                                <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                        </a>

                                                        <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkEndorseNotSame ): ?>
                                                        <button class="btn btn-md-amber font-weight-700 tooltips text-center endorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" endorse-type="achievement" data-id="<?= $value['achievement_id']; ?>" data-placement="top" data-original-title="Endorse this user" user="<?= $checkUser?>">
                                                            <i class="icon-check"></i>
                                                            Endorse Me
                                                        </button>

                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['achievement_id']; ?>" endorse-type="achievement" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['achievement_title']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project" user="<?= $checkUser?>">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?>
                                                                <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                        </a>

                                                        <?php elseif (base64_decode($segmented_uri) == $id): ?>
                                                        <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" endorse-type="achievement" data-name="<?= $value['achievement_title']; ?>" data-id="<?= $value['achievement_id']; ?>" user-id="<?= base64_decode($segmented_uri); ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project" user="<?= $checkUser?>">
                                                            <i class="icon-user"></i>
                                                            <?= $countEndorser; ?>
                                                                <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                        </a>

                                                        <?php else: ?>
                                                        <a href="<?= base_url(); ?><?= $roles ?>/profile" class="btn btn-md-indigo font-weight-700 tooltips text-center" data-container="body" data-placement="top" data-original-title="view endorser">
                                                            <i class="icon-user"></i>
                                                            <?= !empty($language->site_complete) ? $language->site_complete : "Complete your profile to endorse" ;?>
                                                        </a>
                                                        <?php endif ?>
                                                <?php else: ?>
                                                    <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">
                                                        <?= !empty($language->site_login_to_review) ? $language->site_login_to_review : "Login to review" ;?>
                                                    </a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <!-- Title -->
                                            <h6 class="font-weight-600">
                                                <?= $value['achievement_title']?>
                                            </h6>
                                            <!-- Start Date - End Date -->
                                            <h6 class="font-grey-gallery font-weight-400 font-14">
                                                <i class="icon-calendar mr-5"></i>
                                                <?php if(empty($value['achievement_start_date']) || $value['achievement_start_date'] == '0000-00-00' || $value['achievement_start_date'] == '1970-01-01') { echo 'Not Provided'; }
                                                    else{ echo date('F Y', strtotime($value['achievement_start_date']));
                                                ?> -
                                                <?php echo ($value['achievement_end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['achievement_end_date']));} ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <?php if (!empty($value['achievement_description']) ||($value['achievement_tag']) ){ ?>
                                    <hr class="border-mdo-orange-v7 my-10 width-200">
                                    <?php } ?>

                                    <!-- Description -->
                                    <?php if (!empty($value['achievement_description'])){ ?>
                                    <p class="font-16 text-justify font-weight-400 ">
                                        <?= $value['achievement_description']; ?>
                                    </p>
                                    <?php } ?>

                                    <!-- Skill Earned -->
                                    <?php if (!empty($value['achievement_tag'])){ ?>
                                    <p class="font-weight-600 font-14 text-uppercase ">Skill Earned</p>
                                    <ul class="list-unstyled list-inline mt-ul-li-lr-0 mx-0">
                                        <?php 
                                            $non_edu = explode(',', $value['achievement_tag']);
                                            $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                            shuffle($label);
                                            $i = 0;

                                            foreach ($non_edu as $tag_key => $tag_value) { 
                                                ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;
                                        ?>
                                            <li>
                                                <p class="label <?php echo $label[$tag_key]; ?> label-sm">
                                                    <?php echo $tag_value; ?>
                                                </p>
                                            </li>
                                        <?php $tag_key++; } ?>
                                    </ul>
                                    <?php } ?>
                                </li>

                                <!-- Modal : Endorse [ Endorsed empty achievement] -->
                                <!-- # Empty States [User - Employer] -->
                                <div class="modal fade" id="modal_endorsed_empty_achievement_<?= $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->endorse) ? $language->endorse : "Endorse" ;?> -
                                                        <small class="font-16">
                                                            <?= $value['achievement_title'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint ">
                                                            <?= !empty($language->site_get_friendsen) ? $language->site_get_friendsen : "Ask your friend to endorse!" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-10 mb-30 font-16 font-weight-400">
                                                            <?= !empty($language->site_endorse_invite) ? $language->site_endorse_invite : "Hey ! Invite one of your friend to endorse your resume." ;?>
                                                        </h6>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal : Endorse [ Endorser empty achievement] -->
                                <!-- # Empty States [User - Alls] -->
                                <div class="modal fade" id="modal_endorser_empty_achievement_<?= $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->endorse) ? $language->endorse : "Endorse" ;?> -
                                                        <small class="font-16">
                                                            <?= $value['achievement_title'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-20"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_first_endorse) ? $language->site_first_endorse : "Be the first to endorse" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-5 text-none font-16 font-weight-400">
                                                            <?= !empty($language->site_genuine_endorse) ? $language->site_genuine_endorse : "Give a genuine endorsement about his/her information." ;?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </ul>
                            <?php }else{?>
                            <!-- # Empty State -->
                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                            <?php }?>

                        </div>

                        <!-- Tab Skill -->
                        <div class="tab-pane" id="tab_skills">
                            <?php if(!empty($user_profile['projects'])){?>
                            <ul class="list-group list-border">
                                <?php $i=0; foreach($user_profile['projects'] as $key => $value){
                                        $keyAchievement = array_search($value['id'], array_column($endorseReviewRating['endorse'],'user_project_id'));
                                        $countEndorserProject = countEndorserProject($value['id'], $segmented_uri);
                                        if (!is_bool($keyAchievement)) {
                                            $checkEndorseSame = $value['id'] == $endorseReviewRating['endorse'][$keyAchievement]['user_project_id'];
                                            $checkEndorseNotSame = $value['id'] != $endorseReviewRating['endorse'][$keyAchievement]['user_project_id'];
                                            $countEndorser = count($countEndorserProject['project']);
                                        }else{
                                            $checkEndorseSame = false;
                                            $checkEndorseNotSame = true;
                                            $countEndorser = count($countEndorserProject['project']);
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
                                        <!-- Endorse -->
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <?php if (!empty($id)):
                                                        if ( ($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && (!empty($endorseReviewRating['endorse'])) && $checkEndorseSame ): ?>
                                                <button class="btn btn-md-red font-weight-700 tooltips text-center unendorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['id']; ?>" data-placement="top" data-original-title="Endorse this user" endorse-type="project" user="<?= $checkUser?>">
                                                    <i class="icon-close"></i>
                                                    Unendorse
                                                </button>

                                                <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" endorse-type="project" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project" user="<?= $checkUser?>">
                                                    <i class="icon-user"></i>
                                                    <?= $countEndorser; ?>
                                                        <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                </a>

                                                <?php elseif (($id != base64_decode($segmented_uri)) && ($percentage_completion == true) && $checkEndorseNotSame ): ?>
                                                <button class="btn btn-md-amber font-weight-700 tooltips text-center endorse-btn" data-container="body" endorser-id="<?= $id; ?>" endorsed-id="<?= $segmented_uri; ?>" data-id="<?= $value['id']; ?>" data-placement="top" data-original-title="Endorse this user" endorse-type="project">
                                                    <i class="icon-check" user="<?= $checkUser?>"></i>
                                                    Endorse Me
                                                </button>

                                                <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" endorse-type="project" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project">
                                                    <i class="icon-user" user="<?= $checkUser?>"></i>
                                                    <?= $countEndorser; ?>
                                                        <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                </a>

                                                <?php elseif (base64_decode($segmented_uri) == $id): ?>
                                                <a data-toggle="modal" href="#<?= $modal_endorse;?>" class="btn btn-md-indigo font-weight-700 tooltips text-center endorser-list" data-id="<?= $value['id']; ?>" user-id="<?= base64_decode($segmented_uri); ?>" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" id="endorse_project" user="<?= $checkUser?>">
                                                    <i class="icon-user"></i>
                                                    <?= $countEndorser; ?>
                                                        <?= !empty($language->endorser) ? $language->endorser : "Endorser" ;?>
                                                </a>
                                                <?php else: ?>
                                                <a href="<?= base_url(); ?><?= $roles ?>/profile" class="btn btn-md-indigo font-weight-700 tooltips text-center" data-name="<?= $value['name']; ?>" data-container="body" data-placement="top" data-original-title="view endorser" user="<?= $checkUser?>">
                                                    <i class="icon-user"></i>
                                                    Complete your profile to endorse
                                                </a>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <a href="<?= base_url(); ?>login" class="btn btn-md-green btn-circle">
                                                    <?= !empty($language->site_login_to_review) ? $language->site_login_to_review : "Login to review" ;?>
                                                </a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <!-- Title -->
                                            <h6 class="font-weight-600 ">
                                                <?= $value['name']?>
                                            </h6>
                                            <!-- Start Date / End Date -->
                                            <h6 class="font-weight-400 font-grey-gallery font-14">
                                                <i class="icon-calendar mr-5"></i>
                                                <?php if(empty($value['start_date']) || $value['start_date'] == '0000-00-00' || $value['start_date'] == '1970-01-01'){echo 'Not Provided';}
                                                else { echo date('F Y', strtotime($value['start_date']));
                                                ?> -
                                                <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('F Y', strtotime($value['end_date']));}?>
                                            </h6>
                                        </div>
                                    </div>
                                    <?php if (!empty($value['description']) ||($value['skills_acquired']) ){ ?>
                                    <hr class="border-mdo-orange-v7 my-10 width-200">
                                    <?php } ?>

                                    <!-- Description -->
                                    <?php if (!empty($value['description'])){ ?>
                                    <p class="font-16 text-justify font-weight-400 ">
                                        <?= $value['description']; ?>
                                    </p>
                                    <?php } ?>
                                    <!-- Skill Earned -->
                                    <?php if (!empty($value['skills_acquired'])){ ?>
                                    <p class="font-weight-600 font-14 text-uppercase ">Skill Earned</p>
                                    <ul class="list-unstyled list-inline mt-ul-li-lr-0 mx-0">
                                        <?php 
                                            $project = explode(',', $value['skills_acquired']);
                                            $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                            shuffle($label);
                                            $i = 0;

                                            foreach ($project as $tag_key => $tag_value) { 
                                                ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;
                                        ?>
                                        <li>
                                            <p class="label <?php echo $label[$tag_key]; ?> label-sm">
                                                <?php echo $tag_value; ?>
                                            </p>
                                        </li>
                                        <?php $tag_key++; } ?>
                                    </ul>
                                    <?php } ?>

                                </li>
                                <!-- Modal : Endorse [ Endorsed empty project] -->
                                <!-- # Empty States [User - Employer] -->
                                <div class="modal fade" id="modal_endorsed_empty_project_<?= $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->endorse) ? $language->endorse : "Endorse" ;?> -
                                                        <small class="font-16">
                                                            <?= $value['name'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_get_friendsen) ? $language->site_get_friendsen : "Ask your friend to endorse!" ;?>
                                                        </h5>
                                                        <h6 class="text-center font-grey-cascade mt-10 mb-30 font-16 font-weight-400 text-none">
                                                            <?= !empty($language->site_endorse_invite) ? $language->site_endorse_invite : "Hey ! Invite one of your friend to endorse your resume." ;?>
                                                        </h6>
                                                        <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">
                                                            <?= !empty($language->site_invite_btn) ? $language->site_invite_btn : "Invite My Friends" ;?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal : Endorse [ Endorsed empty achievement] -->
                                <!-- # Empty States [User - All] -->
                                <div class="modal fade" id="modal_endorser_empty_project_<?= $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-500">
                                                    <?= !empty($language->endorse) ? $language->endorse : "Endorse" ;?> -
                                                        <small class="font-16">
                                                            <?= $value['name'] ?>
                                                        </small>
                                                        <button data-dismiss="modal" class="close"></button>
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet p-50">
                                                    <div class="portlet-body text-center">
                                                        <i class="icon-users font-grey-mint font-40 mb-40"></i>
                                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">
                                                            <?= !empty($language->site_first_endorse) ? $language->site_first_endorse : "Be the first to endorse" ;?>
                                                        </h5>
                                                        <h6 class="text-center  font-grey-cascade mt-10 text-none font-16 font-weight-400">
                                                            <?= !empty($language->site_genuine_endorse) ? $language->site_genuine_endorse : "Give a genuine endorsement about his/her information." ;?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </ul>
                            <?php }else{?>
                            <!-- # Empty State -->
                            <?php $this->load->view('student/main/profile_missing', $data_arr);?>
                            <?php }?>
                        </div>

                    </div>
                </div>


                <!-- Modal : Endorse [ List Endorser] -->
                <div class="modal fade" id="modal_endorser_list" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal : Rate [ Experience List] -->
                <div class="modal fade" id="modal_rate_experience_list" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal : Review [ Experience List] -->
                <div class="modal fade" id="modal_review_experience_list" tabindex="-1" role="dialog" aria-hidden="true"> </div>

                <!-- Modal : Review [List Reviewer - Input ] -->
                <div class="modal fade " id="modal_list_reviewer_input" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal : Rate [List Rater -Input] -->
                <div class="modal fade" id="modal_list_rater_input" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-500">
                                    <?= !empty($language->rating) ? $language->rating : "Rating " ;?> -
                                        <small class="font-16" id="dataName">Experience </small>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="mt-comments-v2" id="reviews">
                                </div>
                            </div>
                            <div class="modal-footer md-grey-lighten-5 text-left">
                                <form action="<?= base_url(); ?>site/endorsment/rate" method="POST">
                                    <div class="media-body media-middle">
                                        <input type="hidden" id="backing2inputExperience" value="4.5" name="ratings">
                                        <input type="hidden" id="dataId" name="skill_id">
                                        <input type="hidden" id="endorserId" name="endorser_id">
                                        <input type="hidden" id="dataUserId" name="endorsed_id">
                                        <div id="rateit2inputExperience" data-size="50"></div>
                                        <h5 class="text-none" id="value2inputExperience">Rate this user</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <button type="submit" class="btn btn-md-indigo">
                                            <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal: Rate [Rater Empty Education] -->
                <div class="modal fade" id="modal_rater_empty_educations" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-500">
                                    <?= !empty($language->rating) ? $language->rating : "Rating " ;?> -
                                        <small class="font-16" id="dataNameExp">Experience </small>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="portlet p-50">
                                    <div class="portlet-body text-center">
                                        <i class="icon-star font-grey-mint font-40 mb-40"></i>
                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">Be the first to rate </h5>
                                        <h6 class="text-center  font-grey-cascade mt-10 font-16 font-weight-400 text-none">Give a genuine rating about his/her information.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-grey-lighten-5 text-left">
                                <form action="<?= base_url(); ?>site/endorsment/rate" method="POST">
                                    <div class="media-body media-middle">
                                        <input type="hidden" id="backing3inputExperience" value="4.5" name="ratings">
                                        <input type="hidden" id="dataIdExp" name="skill_id">
                                        <input type="hidden" id="endorserIdExp" name="endorser_id">
                                        <input type="hidden" id="dataUserIdExp" name="endorsed_id">
                                        <div id="rateit3inputExperience" data-size="50"></div>
                                        <h5 class="text-none" id="value3inputExperience">Rate this user</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <button type="submit" class="btn btn-md-indigo">
                                            <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal: Rate [Rater Empty Experience] -->
                <div class="modal fade" id="modal_rater_empty_experience" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-500">
                                    <?= !empty($language->rating) ? $language->rating : "Rating " ;?> -
                                        <small class="font-16" id="dataNameExp">Experience </small>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="portlet p-50 md-shadow-none">
                                    <div class="portlet-body text-center">
                                        <i class="icon-star font-grey-mint font-40 mb-40"></i>
                                        <h5 class="text-center font-weight-500 font-grey-mint text-none">Be the first to rate </h5>
                                        <h6 class="text-center  font-grey-cascade mt-10 font-16 font-weight-400 text-none">Give a genuine rating about his/her information.</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer md-grey-lighten-5 text-left">
                                <form action="<?= base_url(); ?>site/endorsment/rate" method="POST">
                                    <div class="media-body media-middle">
                                        <input type="hidden" id="backing1Experience" value="4.5" name="ratings">
                                        <input type="hidden" id="dataIdExp" name="exp_id">
                                        <input type="hidden" id="endorserIdExp" name="endorser_id">
                                        <input type="hidden" id="dataUserIdExp" name="endorsed_id">
                                        <div id="rateit1Experience" data-size="50"></div>
                                        <h5 class="text-none" id="value1Experience">Rate this user</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <button type="submit" class="btn btn-md-indigo">
                                            <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal: Review [Education List] -->
                <div class="modal fade" id="modal_review_education_list" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal: Review [Education Input] -->
                <div class="modal fade" id="modal_review_education_input" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal: Rate [Education List] -->
                <div class="modal fade" id="modal_rate_education_list" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal: Rate [Education Input] -->
                <div class="modal fade" id="modal_rate_education_input" tabindex="-1" role="dialog" aria-hidden="true"></div>

                <!-- Modal Endorser -->
                <div class="modal fade " id="invite_friends" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-500"> Invite Friends
                                    <button data-dismiss="modal" class="close"></button>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="portlet p-50">
                                    <form action="<?= base_url(); ?>site/endorsment/invite" class="form form-horizontal" method="POST">
                                        <div class="form-group text-left mx-0 mb-10">
                                            <textarea name="email_address" id="" class="form-control" rows="5" placeholder="Invite your friends email with comma as separated key e.g abcd@email.com, efgh@email.com"></textarea>
                                        </div>
                                        <input type="hidden" name="username" value="<?= $this->session->userdata('name');?>"></input>
                                        <input type="hidden" name="user_id" value="<?= $segmented_uri;?>"></input>
                                        <a href="" data-dismiss="modal" class="btn btn-default btn-outline">
                                            <?= !empty($language->site_cancel) ? $language->site_cancel : "Cancel" ;?>
                                        </a>
                                        <button type="submit" class="btn btn-md-indigo ">
                                            <?= !empty($language->site_submit) ? $language->site_submit : "Submit" ;?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- # FOOTER -->
    <?php $this->load->view('main/footer_content');?>


    <!-- CORE -->
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- VENDOR -->
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.smooth-scroll.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/counterup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-tabdrop/bootstrap-tabdrop.js"></script>

    <!-- Custom-->
    <script type="text/javascript" src="<?php echo JS; ?>alertify.min.js"></script>

    <!-- Global-->
    <script type="text/javascript" src="<?php echo JS; ?>global/app.min.js"></script>
    <!-- Layout 8 -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/layout8.min.js"></script>

    <!-- Component Page -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/counter.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/portfolio-3-col.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/parallax.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/components/google-map.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/wow.min.js"></script>

    <!-- Page -->
    <script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3-gallery.js"></script>
    <!--========== END JAVASCRIPTS ==========-->


    <!-- Rate It  Plugin 
    view doc on http://gjunge.github.io/rateit.js/examples/-->
    <script type="text/javascript">
        $(document).ready(function () {
            //GALLERY LOAD MORE
            var max_gall = <?= !empty($gall_no) ? $gall_no : 0;?>;
            var load_more = 13;
            var gall_height = 400;
            $("#gall_more").on("click", function (e) {
                e.preventDefault();

                //get total new item
                var load_more_temp = load_more;
                var total_tambahan = 0;
                for (var i = 0; i < 12; i++) {
                    if (load_more_temp < max_gall) {
                        load_more_temp++;
                        total_tambahan++;
                    }
                }
                //set new height of gallery container
                var total_tambahan_row = Math.ceil(total_tambahan / 4);
                gall_height += total_tambahan_row * 90;
                $("#js-grid-lightbox-gallery").css("height", gall_height);

                //show 12 hidden more item
                for (var i = 0; i < 12; i++) {
                    if (load_more < max_gall) {
                        var row_pos = Math.ceil(load_more / 4);
                        $("#gall_" + load_more).css("top", (row_pos - 1) * 109);
                        $("#gall_" + load_more).show();
                        load_more++;
                    }
                }

                //hide button load more if nothing more
                if (load_more >= max_gall) {
                    $("#gall_more").hide();
                }

            });

            // Endorsement
            $(".endorse-btn").click(function () {
                var dataId = $(this).attr('data-id');
                var endorserId = $(this).attr('endorser-id');
                var endorsedId = $(this).attr('endorsed-id');
                var endorsedType = $(this).attr('endorse-type');
                alertify.confirm('Endorse user', 'Are you sure you want to endorse?', function () {
                    $.post("<?= base_url(); ?>site/endorsment/endorse", {
                        dataId: dataId,
                        endorserId: endorserId,
                        endorsedId: endorsedId,
                        endorsedType: endorsedType
                    }, function (data) {
                        alertify.success('Endorse user success.');
                    });
                    window.location.reload(true);
                }, function (data) {
                    alertify.error('Cancel');
                });
            });

            $(".unendorse-btn").click(function () {
                var dataId = $(this).attr('data-id');
                var endorserId = $(this).attr('endorser-id');
                var endorsedId = $(this).attr('endorsed-id');
                var endorsedType = $(this).attr('endorse-type');
                alertify.confirm('Endorse user', 'Are you sure you want to unendorse?', function () {
                    $.post("<?= base_url(); ?>site/endorsment/unendorse", {
                        dataId: dataId,
                        endorserId: endorserId,
                        endorsedId: endorsedId,
                        endorsedType: endorsedType
                    }, function (data) {
                        alertify.success('Endorse user success.');
                    });
                    window.location.reload(true);
                }, function (data) {
                    alertify.error('Cancel');
                });
            });

            $('.endorser-list').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var user = $(this).attr('user');

                if (user == 'same_user') {
                    invitation =
                        '<div class="portlet p-50 ">\
                            <div class="portlet-body text-center">\
                                <i class="icon-star font-grey-mint font-40 mb-40"></i>\
                                <h5 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to endorse you! </h5>\
                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 font-weight-400 font-16 text-none">Hey ! Invite one of your friend to endorse your resume.</h6>\
                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                            </div>\
                        </div>';
                } else {
                    invitation = '';
                }

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getEndorser",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var endorser = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            endorser += '<li class="media media-middle">\
                                            <div class="pull-left">\
                                                <img src="' + v.profile_photo +
                                '" alt="" class="avatar avatar-xtramini avatar-circle">\
                                            </div>\
                                            <div class="media-body">\
                                                <div class="media-heading small font-weight-600 text-uppercase mb-5">' + v.fullname + '</div>\
                                                <div class="media-heading-sub small">endorse this on ' + v.created_at +
                                '</div>\
                                            </div>\
                                        </li>';
                        });

                        $('#modal_endorser_list').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                    <h5 class="modal-title font-weight-500"> Endorse -\
                                        <small class="font-16">' + dataName +
                            ' </small>\
                                        <button data-dismiss="modal" class="close"></button>\
                                    </h5>\
                                </div>\
                                <div class="modal-body">' +
                            invitation +
                            '<ul class="list-unstyled">' +
                            endorser +
                            '</ul>\
                                </div>\
                            </div>');
                    }
                })
            });

            // Review

            // # Review experience
            $('.review-input').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getReview",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';
                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">' +
                                '<div class="mt-comment-img">' +
                                '<img src="' + v.profile_photo + '" class="avatar avatar-xtramini avatar-circle">' +
                                '</div>' +
                                '<div class="mt-comment-body">' +
                                '<div class="mt-comment-info">' +
                                '<a href="' + v.link + '"><span class="mt-comment-author">' + v.fullname + '</span></a>' +
                                '<span class="mt-comment-date">' + v.created_at + '</span>' +
                                '</div>' +
                                '<div class="mt-comment-text">' + v.rating + '</div>' +
                                '</div>' +
                                '</div>'
                        });

                        $('#modal_list_reviewer_input').html(
                            '<div class="modal-dialog ">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Review - <small class="font-16">' + dataName +
                            ' </small></h5>\
                                    </div>\
                                    <div class="modal-body">\
                                        <div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                        <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">\
                                        <div class="form-group text-left mx-0 mb-10">\
                                            <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>\
                                            <input type="hidden" name="exp_id" value="' +
                            dataId + '"></input>\
                                            <input type="hidden" name="endorser_id" value="' + endorserId + '"></input>\
                                            <input type="hidden" name="user_id" value="' + dataUserId +
                            '"></input>\
                                            <span class="help-block">Please put genuine statement !</span>\
                                        </div>\
                                        <a href="" data-dismiss="modal" class="btn btn-default btn-outline">submit</a>\
                                        <button type="submit" class="btn btn-md-indigo ">Submit</button>\
                                        </form>\
                                    </div>\
                                </div>\
                            </div>'
                        );
                    }
                })
            });
            $('.review-experience-list').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var user = $(this).attr('user');

                if (user == 'same_user') {
                    invitation =
                        '<div class="portlet p-50 md-shadow-none">\
                            <div class="portlet-body text-center">\
                                <i class="icon-star font-grey-mint font-40 mb-40"></i>\
                                <h5 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to review you! </h5>\
                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 text-none">Hey ! Invite one of your friend to review your resume.</h6>\
                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                            </div>\
                        </div>';
                } else {
                    invitation = '';
                }

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getReview",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '" >\
                                    </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a href="' + v.link + '" ><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <span class="mt-comment-date">' + v.created_at +
                                '</span>\
                                        </div>\
                                        <div class="mt-comment-text">' +
                                v.rating +
                                '</div>\
                                    </div>\
                                </div>';
                        });

                        $('#modal_review_experience_list').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Review - <small class="font-16">' + dataName + '</small></h5>\
                                    </div>\
                                    <div class="modal-body">' +
                            invitation +
                            '<div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                    </div>\
                                </div>\
                            </div>'
                        );

                    }
                })
            });

            // # Review education
            $('.review-education-input').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/xremo/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getReview",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '">\
                                    </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a href="' + v.link + '" ><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <span class="mt-comment-date">' + v.created_at +
                                '</span>\
                                        </div>\
                                        <div class="mt-comment-text">' +
                                v.rating +
                                '</div>\
                                    </div>\
                                </div>';
                        });

                        $('#modal_review_education_input').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Review - <small class="font-16">' + dataName +
                            '</small></h5>\
                                    </div>\
                                    <div class="modal-body">\
                                        <div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                        <form action="<?= base_url(); ?>site/endorsment/review" class="form form-horizontal" method="POST">\
                                            <div class="form-group text-left mx-0 mb-10">\
                                                <textarea name="rating" id="" class="form-control" rows="5" placeholder="Write your review in here"></textarea>\
                                                <input type="hidden" name="skill_id" value="' +
                            dataId + '"></input>\
                                                <input type="hidden" name="endorser_id" value="' + endorserId + '"></input>\
                                                <input type="hidden" name="endorsed_id" value="' + dataUserId +
                            '"></input>\
                                                <span class="help-block">Please put genuine statement !</span>\
                                            </div>\
                                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline">Cancel</a>\
                                            <button type="submit" class="btn btn-md-indigo ">Submit</button>\
                                        </form>\
                                    </div\
                                </div>\
                            </div>'
                        );

                    }
                })
            });

            $('.review-education-list').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('user-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/xremo/assets/img/student/';
                var user = $(this).attr('user');

                if (user == 'same_user') {
                    invitation =
                        '<div class="portlet p-50">\
                            <div class="portlet-body text-center">\
                                <i class="icon-star font-grey-mint font-40 mb-40"></i>\
                                <h5 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to review you! </h5>\
                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 font-16 font-weight-400 text-none">Hey ! Invite one of your friend to review your resume.</h6>\
                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                            </div>\
                        </div>';
                } else {
                    invitation = '';
                }

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getReview",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '">\
                                    </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a href="' + v.link + '"><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <span class="mt-comment-date">' + v.created_at +
                                '</span>\
                                        </div>\
                                        <div class="mt-comment-text">' +
                                v.rating +
                                '</div>\
                                    </div>\
                                </div>';
                        });

                        $('#modal_review_education_list').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Review - <small class="font-16">' + dataName + '</small></h5>\
                                    </div>\
                                    <div class="modal-body">' +
                            invitation +
                            '<div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                    </div>\
                                </div>\
                            </div>'
                        );

                    }
                })
            });

            // Rate
            // # Rate experience
            $('.rate-experience-input').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getRate",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '">\
                                     </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a href="' + v.link + '" ><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <span class="mt-comment-date">' + v.created_at +
                                '</span>\
                                        </div>\
                                        <div class="mt-comment-text">' +
                                v.rating +
                                '</div>\
                                    </div>\
                                </div>';
                        });


                        $('#modal_list_rater_input #dataName').text(dataName);
                        $('#modal_list_rater_input #reviews').html(reviews);
                        $('#modal_list_rater_input #dataId').val(dataId);
                        $('#modal_list_rater_input #dataUserId').val(dataUserId);
                        $('#modal_list_rater_input #endorserId').val(endorserId);

                    }
                })
            });
            // # Rate education
            $('.rate-education-input').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');


                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getRate",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {

                        
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        if (student.length > 0) {
                            $.each(student, function (i, v) {
                                reviews +=
                                    '<div class="mt-comment">\
                                        <div class="mt-comment-img">\
                                            <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                    '">\
                                        </div>\
                                        <div class="mt-comment-body">\
                                            <div class="mt-comment-info">\
                                                <a href="' + v.link + '"><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                                <span class="mt-comment-date">' + v.created_at +
                                    '</span>\
                                            </div>\
                                            <div class="mt-comment-text">' +
                                    v.rating +
                                    '</div>\
                                        </div>\
                                    </div>';
                            });
                        }

                        $('#modal_list_rater_input #dataName').text(dataName);
                        $('#modal_list_rater_input #reviews').html(reviews);
                        $('#modal_list_rater_input #dataId').val(dataId);
                        $('#modal_list_rater_input #dataUserId').val(dataUserId);
                        $('#modal_list_rater_input #endorserId').val(endorserId);

                    }
                })
            });
            // # Rate Empty
            $('.rate-education-input-empty').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');

                $('#modal_rater_empty_educations #dataNameExp').text(dataName);
                $('#modal_rater_empty_educations #reviews').html(reviews);
                $('#modal_rater_empty_educations #dataIdExp').val(dataId);
                $('#modal_rater_empty_educations #dataUserIdExp').val(dataUserId);
                $('#modal_rater_empty_educations #endorserIdExp').val(endorserId);
            });

            $('.rate-experience-input-empty').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var endorserId = $(this).attr('endorser-id');


                $('#modal_rater_empty_experience #dataNameExp').text(dataName);
                $('#modal_rater_empty_experience #reviews').html(reviews);
                $('#modal_rater_empty_experience #dataIdExp').val(dataId);
                $('#modal_rater_empty_experience #dataUserIdExp').val(dataUserId);
                $('#modal_rater_empty_experience #endorserIdExp').val(endorserId);

            });

            $('.rate-education-list').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/xremo/assets/img/student/';
                var user = $(this).attr('user');

                if (user == 'same_user') {
                    invitation =
                        '<div class="portlet p-50">\
                            <div class="portlet-body text-center">\
                                <i class="icon-star font-grey-mint font-40 mb-40"></i>\
                                <h5 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h5>\
                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 font-weight-600 font-16 text-none">Hey ! Invite one of your friend to rate your resume.</h6>\
                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                            </div>\
                        </div>';
                } else {
                    invitation = '';
                }

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getRate",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '">\
                                    </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a href="' + v.link + '" ><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <span class="mt-comment-date">' + v.created_at +
                                '</span>\
                                        </div>\
                                        <small class="text-none font-14 mt-5">give rating ' + v.rating + ' out of 5\
                                            <i class="icon-star"></i>\
                                        </small>\
                                    </div>\
                                </div>';
                        });

                        $('#modal_rate_education_list').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Rate - <small class="font-16">' + dataName + '</small></h5>\
                                    </div>\
                                    <div class="modal-body">' +
                            invitation +
                            '<div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                    </div>\
                                </div>\
                            </div>'
                        );

                    }
                })
            });

            $('.rate-experience-list').click(function () {
                var dataId = $(this).attr('data-id');
                var dataUserId = $(this).attr('endorsed-id');
                var dataName = $(this).attr('data-name');
                var endorsedType = $(this).attr('endorse-type');
                var image_directory = window.location.origin + '/assets/img/student/';
                var user = $(this).attr('user');

                if (user == 'same_user') {
                    invitation =
                        '<div class="portlet p-50">\
                            <div class="portlet-body text-center">\
                                <i class="icon-star font-grey-mint font-40 mb-40"></i>\
                                <h5 class="text-center font-weight-500 font-grey-mint text-none">Get your friends to rate you! </h5>\
                                <h6 class="text-center  font-grey-cascade mt-10 mb-30 text-none font-16 font-weight-400 ">Hey ! Invite one of your friend to rate your resume.</h6>\
                                <a data-toggle="modal" href="#invite_friends" class="btn btn-md-indigo">Invite My Friends</a>\
                            </div>\
                        </div>';
                } else {
                    invitation = '';
                }

                $.ajax({
                    url: "<?= base_url();?>site/endorsment/getRate",
                    method: "GET",
                    data: {
                        data_id: dataId,
                        user_id: dataUserId,
                        endorsedType: endorsedType,
                    },

                    success: function (response) {
                        var student = JSON.parse(response);
                        var reviews = '';

                        var profile_pic = 'profile-pic.png';

                        $.each(student, function (i, v) {
                            reviews +=
                                '<div class="mt-comment">\
                                    <div class="mt-comment-img">\
                                        <img class="avatar avatar-xtramini avatar-circle" src="' + v.profile_photo +
                                '">\
                                    </div>\
                                    <div class="mt-comment-body">\
                                        <div class="mt-comment-info">\
                                            <a><span class="mt-comment-author">' + v.fullname + '</span></a>\
                                            <a class="mt-comment-action btn btn-xs blue-ebonyclay " href="' + v.link +
                                '">View Profile</a>\
                                            <span class="mt-comment-date">' + v.created_at + '</span>\
                                        </div>\
                                        <small class="text-none font-14 mt-5">give rating ' + v.rating + ' out of 5 <i class="icon-star"></i></small>\
                                    </div>\
                                </div>';
                        });

                        $('#modal_rate_experience_list').html(
                            '<div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <h5 class="modal-title font-weight-500"> Rate - <small class="font-16">' + dataName + '</small></h5>\
                                    </div>\
                                    <div class="modal-body">' +
                            invitation +
                            '<div class="mt-comments-v2">' +
                            reviews +
                            '</div>\
                                    </div>\
                                    <div class="modal-footer md-grey-lighten-5">\
                                    </div>\
                                </div>\
                            </div>'
                        );

                    }
                })
            });
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
        $(function () {
            $('#rateit2inputExperience').rateit({
                max: 5,
                step: 0.25,
                backingfld: '#backing2inputExperience',
                resetable: false
            });    

            $("#rateit2inputExperience").bind('rated', function (event, value) {
                $('#value2inputExperience').text('Are you sure give  this user rating : ' + value + ' out of 5');
            });
        });

        $(function () {
            $('#rateit3inputExperience').rateit({
                max: 5,
                step: 0.25,
                backingfld: '#backing3inputExperience',
                resetable: false
            });    

            $("#rateit3inputExperience").bind('rated', function (event, value) {
                $('#value3inputExperience').text('Are you sure give  this user rating : ' + value + ' out of 5');
            });
        });

    </script>
</body>

</html>
