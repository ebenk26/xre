<?php 
    $header_image = end($header_photo); 
	$profile_image = end($profile_photo);
	$company_location = json_decode($detail['address']);
    $login = $this->session->userdata('id');
    $roles= $this->session->userdata('roles');
    $dress_code_detail = explode(',', $detail['dress_code']);
    $dresscode = '';
    if (!empty($dress_code_detail)) {
        foreach ($dress_code_detail as $key => $value) {
            if ($value == end($dress_code_detail)) {
                $dresscode .= ucwords($value);
            }else{
                $dresscode .= ucwords($value).', ';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Company | Description</title>

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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.css">

    <!-- Layout 8 -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout8/layout8.css">

    <!-- PAGES -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/portfolio.min.css">



    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

<body class="bg-sky-light">

    <?php $this->load->view('site/header_content');?>


    <!--========== PROMO : VIEW JOB TITLE==========-->
    <?php if($header_image['name'] != ""){?>
    <div class="s-promo-block-v2 gradient-darkblue-v7 height-300" style="background: url('<?php echo IMG_EMPLOYERS;?><?php echo $header_image['name']; ?>') center center no-repeat fixed; z-index: -1; background-size:cover;">
        <?php }else{?>
        <div class="s-promo-block-v2 gradient-darkblue-v7 height-300" style="background: url('<?php echo IMG_EMPLOYER;?>portfolio/1200x900/1.jpg') no-repeat fixed; z-index: -1; background-size:cover;">
            <?php }?>
        </div>
        <div class="container mt-o-120 ">
            <div class="row mx-0">
                <div class="s-mockup-v3 md-transparent ">
                    <div class="media py-20 ">
                        <div class="pull-left mr-10">
                            <?php if($profile_image['name'] != ""){?>
                            <img src="<?php echo IMG_EMPLOYERS; ?><?php echo $profile_image['name']; ?>" alt="" class="avatar avatar-large  avatar-circle  md-white  shadow-v4 avatar-border-md border-mdo-white-v8">
                            <?php }else{?>
                            <img src="<?php echo IMG;?>site/profile-pic.png" alt="" class="avatar avatar-large avatar-border-md avatar-circle md-white shadow-v4 border-mdo-white-v8">
                            <?php }?>

                        </div>
                        <div class="media-body ">
                            <?php if (!empty ($detail['industry'])){ ?>
                            <h2 class="mt-10  md-white-text ">
                                <?php echo $detail['company_name']; ?>
                            </h2>
                            <h6 class="mb-5  mdo-white-v8-text font-weight-300">
                                <i class="fa fa-industry mr-5 font-17 ml-5"></i>
                                <?php echo $detail['industry'] ?>
                            </h6>
                            <?php } else { ?>
                            <h2 class="mt-40 md-white-text ">
                                <?php echo $detail['company_name']; ?>
                            </h2>
                            <?php }  ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== END PROMO : VIEW JOB TITLE==========-->

        <!--========== CONTENT ==========-->
        <div class="container ">

            <div class="row  mx-0 mt-10">
                <!-- About Company / Job Post -->
                <div class="col-md-9 height-100-percent  pl-0">
                    <div class="portlet light  ">
                        <div class="portlet-title tabbable-line tab-md-orange">
                            <ul class="nav nav-tabs pull-left">
                                <li class="active">
                                    <a href="#tab_about_info" data-toggle="tab" class="font-15">
                                        <i class="icon-notebook mr-5"></i>About Company</a>
                                </li>
                                <li>
                                    <a href="#tab_job_info" data-toggle="tab" class="font-15">
                                        <i class="icon-briefcase mr-5"></i>Job Post</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_about_info">
                                    <!-- About Company -->
                                    <div class="row my-20 mx-0">
                                        <h5 class="font-weight-600 md-grey-darken-3-text  font-16 text-uppercase letter-space-xs">About
                                            <?php echo $detail['company_name']; ?>
                                        </h5>
                                        <hr class="hor-divider-solid-medium border-md-orange my-10 width-30">
                                        <?php if($detail['company_description'] == ""){?>
                                        <!-- Empty States -->
                                        <div class="portlet p-20 md-shadow-none">
                                            <div class="portlet-body text-center">
                                                <i class="icon-ghost font-grey-mint font-40 mb-40"></i>
                                                <h5 class="text-center font-weight-500 font-grey-mint">Sorry.. </h5>
                                                <h6 class="text-center  font-grey-cascade mt-1 font-weight-400 text-none">No information can be found. </h6>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <p class="font-grey-gallery  text-justify">
                                            <?php echo $detail['company_description']; ?>
                                        </p>
                                        <?php }?>
                                    </div>

                                    <!-- Location -->
                                    <div class="row my-20 mx-0">
                                        <h5 class="font-weight-600 md-grey-darken-3-text font-16 text-uppercase letter-space-xs">Location</h5>
                                        <hr class="hor-divider-solid-medium border-md-orange my-10 width-30">
                                        <?php 
                                        if(!empty($company_location)){?>
                                        <div id="gmapbg" class="s-google-map height-auto height-300 my-20"></div>
                                        <ul class="list-unstyled">
                                            <?php                                        
                                            foreach ($company_location as $key => $value) { 
                                                $lat = -6;
                                                $long = 100;
										    ?>
                                            <li>
                                                <!-- BRANCH / HQ -->
                                                <h5 class="font-weight-600 md-grey-darken-3-text font-15 text-uppercase letter-space-xs">
                                                    <?php echo (!empty($value->optionsRadios) && $value->optionsRadios == 'HQ') ? 'Headquarter' : 'Branch'; ?>
                                                </h5>
                                                <?php
													$full_address = $value->building_address != ""?$value->building_address.", ":"";
													$full_address .= $value->building_city != ""?$value->building_city.", ":"";
													$full_address .= $value->building_postcode != ""?$value->building_postcode.", ":"";
													$full_address .= $value->building_state != ""?$value->building_state.", ":"";
													$full_address .= $value->building_country != ""?$value->building_country.", ":"";
													$full_address = $full_address != ""?substr($full_address, 0, -2):"";
												?>
                                                    <!-- FULL ADDRESS OF BRANCH / HQ -->
                                                    <?php if($full_address != ""){?>
                                                    <p class="mb-5 ">
                                                        <i class="fa fa-map-marker mr-5"></i>
                                                        <?php echo $full_address; ?>
                                                    </p>
                                                    <?php }?>
                                                    <!-- EMAIL / PHONE / FAX -->
                                                    <ul class="list-inline list-unstyled mx-0">
                                                        <!-- EMAIL -->
                                                        <?php if($value->building_email != ""){?>
                                                        <li>
                                                            <p class="text-none">
                                                                <i class="fa fa-envelope mr-5"></i>
                                                                <?php echo $value->building_email; ?>
                                                            </p>
                                                        </li>
                                                        <?php }?>
                                                        <!-- PHONE -->
                                                        <?php if($value->building_phone != ""){?>
                                                        <li>
                                                            <p class="text-none">
                                                                <i class="fa fa-phone mr-5"></i>
                                                                <?php echo $value->building_phone; ?>
                                                            </p>
                                                        </li>
                                                        <?php }?>
                                                        <!-- FAX NUMBER -->
                                                        <?php if($value->building_fax != ""){?>
                                                        <li>
                                                            <p class=" text-none">
                                                                <i class="fa fa-fax mr-5"></i>
                                                                <?php echo $value->building_fax; ?> </p>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                            </li>

                                            <?php }?>
                                        </ul>
                                        <?php }else{ ?>
                                        <!--<p class=" font-grey-gallery  ">
												Not Provided
											</p>-->
                                        <div class="portlet p-20 md-shadow-none">
                                            <div class="portlet-body text-center">
                                                <i class="icon-ghost font-grey-mint font-40 mb-30"></i>
                                                <h5 class="text-center font-weight-500 font-grey-mint">Sorry.. </h5>
                                                <h6 class="text-center  font-grey-cascade mt-1 font-weight-400 text-none">No information can be found. </h6>
                                            </div>
                                        </div>
                                        <?php }?>

                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_job_info">
                                    <?php if(!empty($job)){?>
                                    <ul class="list-group list-border pt-0">
                                        <!-- Content -->
                                        <?php 
                                            $article_page 	= $this->session->userdata('article_page');
                                            $no = 1;
                                            foreach ($job as $key => $value) {
                                                if(($no < $article_page*5-4) || ($no > $article_page*5)){$no++;continue;} 
                                                
                                                $no++; 
									    ?>
                                        <li class="list-group-item ">
                                            <div class="media">
                                                <div class="media-body ">
                                                    <h6 class=" font-weight-600 font-17 ">
                                                        <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']), '='); ?>" target="_blank">
                                                            <?php echo !empty($value['name']) ? $value['name'] :'' ; ?> </a>
                                                    </h6>
                                                    <p class="mt-0 ">
                                                        <span class="label label-md-purple letter-space-xs mr-5 label-sm">
                                                            <i class="fa fa-map-marker"></i>
                                                            <?php echo $this->session->userdata('country')?>
                                                        </span>
                                                        <span class="label label-md-blue mr-5 label-sm">
                                                            <i class="fa fa-briefcase"></i>
                                                            <?php echo $value['employment_name'] ;?>
                                                        </span>
                                                        <span class="label label-deep-md-purple mr-5 label-sm">
                                                            <i class="fa fa-sitemap"></i>
                                                            <?php echo $value['position_level_id']==1 ? 'Junior' : $value['position_level_id']==2 ? 'Senior' : 'Executive'; ?>
                                                        </span>
                                                    </p>
                                                    <p class="multiline-truncate font-weight-400 mb-15 font-14 ">
                                                        <?php echo !empty($value['job_description']) ? $value['job_description'] : ''; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                        <?php } ?>
                                        <!-- Pagination -->
                                        <li class="list-group-item px-0 flex-center">
                                            <ul class="pagination  pagination-sm">
                                                <?php
												$article_total = 0;
												foreach($job as $row){
													$article_total++;
												}
												
												$max_page = 0;
												if($article_total%5 == 0){
													$max_page = $article_total/5;
												}else{
													$max_page = floor($article_total/5) + 1;
												}
												
												
												$article_page 	= $this->session->userdata('article_page');
												$prev 			= $article_page - 1;
												$next 			= $article_page + 1;
											?>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'#tab_job_info'?>"> First </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?=$article_page == 1?base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'#tab_job_info':base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'page/'.$prev.'#tab_job_info'?>">
                                                            <i class="fa fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <?php if($article_page-2 > 0){ $other_page = $article_page-2;?>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>">
                                                            <?=$article_page-2?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                    <?php if($article_page-1 > 0){ $other_page = $article_page-1;?>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>">
                                                            <?=$article_page-1?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                    <li class="active">
                                                        <a href="javascript:;">
                                                            <?=$article_page?>
                                                        </a>
                                                    </li>
                                                    <?php if($article_total > $article_page+$article_page*4){ $other_page = $article_page+1;?>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>">
                                                            <?=$article_page+1?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                    <?php if($article_total > $article_page+$article_page*4+5){ $other_page = $article_page+2;?>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>">
                                                            <?=$article_page+2?>
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                    <li>
                                                        <a href="<?=$article_page == $max_page || $article_page > $max_page?base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$max_page.'#tab_job_info':base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$next.'#tab_job_info'?>">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$max_page.'#tab_job_info'?>"> Last </a>
                                                    </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <?php } else {?>
                                    <div class="portlet p-20 md-shadow-none">
                                        <div class="portlet-body text-center">
                                            <i class="icon-ghost font-grey-mint font-40 mb-30"></i>
                                            <h5 class="text-center font-weight-500 font-grey-mint">Sorry.. </h5>
                                            <h6 class="text-center  font-grey-cascade mt-1 font-weight-400 text-none">No information can be found. </h6>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pr-0">
                    <!-- Send Message Button -->
                    <?php if($this->session->userdata('id') && ($this->session->userdata('id') != $detail['id_users'])){?>
                    <div class="row  mx-0 mb-30">
                        <a href="<?=base_url()?>send_message/<?=rtrim(base64_encode($detail['id_users']), '='); ?>/new" class=" btn btn-md-orange btn-block " target="_blank">
                            <i class="icon-envelope mr-5 "></i>Send Message</a>

                    </div>
                    <?php }?>
                    <!-- Company Short Info -->
                    <div class="row mb-30  mx-0 ">
                        <ul class="list-unstyled ">
                            <!-- Company Industry -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="fa fa-industry mr-5"></i>Industry</h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['industry'] != ""?$detail['industry']:'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>


                            <!-- Company Size -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="fa fa-building-o mr-5"></i>Company Size</h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['total_staff'] != ""?$detail['total_staff']."People":'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>

                            <!-- Working Day -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="icon-calendar mr-5"></i>Working Day</h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['working_days_start'] != "" && $detail['working_days_end'] != ""?ucwords($detail['working_days_start'].' - '.$detail['working_days_end']):'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>

                            <!-- Working Hour -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="icon-clock mr-5"></i>Working Hour</h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['working_hours_start'] != "" && $detail['working_hours_end'] != ""?ucwords($detail['working_hours_start'].' - '.$detail['working_hours_end']):'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>

                            <!-- Dress Code -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="icon-users mr-5"></i>Dress Code </h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $dresscode != ""?ucwords($dresscode):'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>

                            <!-- Website -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="icon-screen-desktop mr-5"></i>Website </h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php if($detail['url'] != ""){?>
                                    <a href="<?=$detail['url']?>" target="_blank">
                                        <?=$detail['url']?>
                                    </a>
                                    <?php }else{?>
                                    <i class="font-weight-300 font-15">Not Provided </i>
                                    <?php }?>
                                </p>
                            </li>

                            <!-- Spoken Language -->
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="fa fa-language mr-5"></i>Spoken Language </h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['spoken_language'] != "" && $detail['spoken_language'] != "0"?$detail['spoken_language']:'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>

                            <!-- Benefit -->
                            <?php if (!empty($detail['benefits'])): ?>
                            <li>
                                <h6 class="font-weight-600 font-grey-gallery text-capitalize mb-5 font-15">
                                    <i class="fa fa-diamond mr-5"></i>Benefit </h6>
                                <p class="font-weight-400 font-grey-gallery font-15 ">
                                    <?php echo $detail['benefits'] != ""?$detail['benefits']:'<i class="font-weight-300 font-15">Not Provided </i>'; ?>
                                </p>
                            </li>
                            <?php endif ?>

                        </ul>
                    </div>

                    <!-- Follow Me Social Icons -->
                    <div class="row mb-30 mx-0 ">
                        <h6 class="font-weight-600 md-orange-text  mb-10 text-uppercase letter-space-xs font-16">Follow Me </h6>
                        <ul class="social-icons social-icons-color">
                            <?php $followme = 0;foreach ($social as $key => $value) { 
                            switch ($value['name']) {
                                case 'facebook':
                                    ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Facebook" class="facebook" target="_blank"> </a>
                            </li>
                            <?php $followme++;break;
                                case 'twitter': ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Twitter" class="twitter" target="_blank"></a>
                            </li>
                            <?php $followme++;break;
                                case 'linkedin': ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Linked In" class="linkedin" target="_blank"></a>
                            </li>
                            <?php $followme++;break;
                                case 'gplus': ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="googleplus" data-original-title="Google Plus" target="_blank"></a>
                            </li>
                            <?php $followme++;break;
                                case 'instagram': ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="instagram" data-original-title="Instagram" target="_blank"></a>
                            </li>
                            <?php $followme++;break;
                                case 'youtube': ?>
                            <li>
                                <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="youtube" data-original-title="Youtube" target="_blank"></a>
                            </li>
                            <?php break; default:?>
                            <li>

                            </li>
                            <?php break; } ?>

                            <?php } if($followme == 0){?>
                            <i class="font-weight-300 font-15">Not Provided </i>
                            <?php }?>
                        </ul>
                    </div>


                    <!-- Ad -->
                    <!--<div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-orange-text  mb-2 font-15-xs text-uppercase letter-space-xs">Recent view
                        <a href="" class="md-orange-text">Company #1</a>
                    </h5>
                    <div class="g-fullheight-xs md-yellow col-md-12">
                        Here is Advertisement o r whatsover
                    </div> 
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
                </div>-->
                </div>
            </div>            
        </div>
        <!--========== END CONTENT ==========-->

        <?php $this->load->view('main/footer_content');?>

        <!-- CORE -->
        <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script> -->
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
        <script type="text/javascript" src="<?php echo JS; ?>layout8/components/google-map.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>layout8/components/wow.min.js"></script>

        <!-- Page -->
        <script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3-gallery.js"></script>


        <script>
            function initMap() {
                var address = <?php echo $detail['address']; ?>;
                var company_name = '<?= $detail['company_name']; ?>';
                var latLang = {
                    lat: 0,
                    lng: 120
                };
                // Create a map object and specify the DOM element for display.
                var map = new google.maps.Map(document.getElementById('gmapbg'), {
                    center: latLang,
                    zoom: 4
                });

                $.each(address, function (i, v) {
                    if (v.optionsRadios == 'HQ') {
                        var lat = parseInt(v.building_latitude);
                        var longi = parseInt(v.building_longitude);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: {
                                lat: lat,
                                lng: longi
                            },
                            title: company_name
                        });
                    }
                });
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&callback=initMap" async defer></script>
</body>

</html>
