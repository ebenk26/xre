<?php 
    $header_image = end($header_photo); 
	$profile_image = end($profile_photo);
	$company_location = json_decode($detail['address']);
    $login = $this->session->userdata('id');
    $roles= $this->session->userdata('roles');
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
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
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
                                        <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right" style="margin-top:-20px;">
                                            <li>
                                                <a href="<?php echo base_url(); ?><?php echo $roles; ?>/dashboard" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-home mr-3"></i>Dashboard</a>
                                            </li>
											<?php if ($roles !='administrator') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?><?php echo $roles; ?>/profile" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-note mr-3"></i>Edit Profile</a>
                                            </li>
											<?php }?>
                                            <?php  if ($roles == 'student') {?>
                                                <li>
                                                    <a href="student-view-profile.html" class="s-header-v2-dropdown-menu-link">
                                                        <i class="icon-book-open mr-3"></i>My Resume</a>
                                                </li>
                                            <?php } ?>
											<?php if ($roles !='administrator') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?><?php echo $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-calendar mr-3"></i>My Calendar</a>
                                            </li>
											<?php }?>
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
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
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
    <?php if($header_image['name'] != ""){?>
		<div class="s-promo-block-v2 g-bg-gradient-darkblue-strong mt-height-300-xs" style="background: url(<?php echo IMG_EMPLOYERS; ?><?php echo $header_image['name']; ?>) no-repeat fixed; z-index: -1;">
	<?php }else{?>
		<div class="s-promo-block-v2 g-bg-gradient-darkblue-strong mt-height-300-xs" style="background: url(<?=base_url()?>assets/img/site/mainpagebanner.jpg) no-repeat fixed; z-index: -1;">
	<?php }?>
	
    </div>
    <div class="container mt-margin-t-o-120-xs ">
        <div class="row mx-0">
            <div class="s-mockup-v3 md-transparent ">
                <div class="media py-4 ">
                    <div class="pull-left mr-3">
                        <?php if($profile_image['name'] != ""){?>
							<img src="<?php echo IMG_EMPLOYERS; ?><?php echo $profile_image['name']; ?>" alt="" class="avatar avatar-large avatar-border-sm  p-2 md-white border-mdo-bluegrey-slight g-box-shadow-dark-lightest-v3">
						<?php }else{?>
							<img src="<?=base_url()?>assets/img/site/xremo-logo-blue.png" alt="" class="avatar avatar-large avatar-border-sm  p-2 md-white border-mdo-bluegrey-slight g-box-shadow-dark-lightest-v3">
						<?php }?>
						
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
									<?php if($detail['company_description'] == ""){?>
										<div class="portlet p-4 md-shadow-none">
											<div class="portlet-body text-center">
												<i class="icon-ghost font-grey-mint font-40-xs mb-4"></i>
												<h5 class="text-center font-weight-500 font-grey-mint">Not Provided</h5>
												<!--<h6 class="text-center  font-grey-cascade mt-1 text-none">Add your info in here to make your company look great.</h6>
												<a href="employer-profile.html" class="btn btn-outline-md-indigo px-6">My Profile</a>-->
											</div>
										</div>
									<?php }else{?>
										<p class="roboto-font font-grey-gallery "><?php echo $detail['company_description']; ?></p>
									<?php }?>
                                </div>

                                <!-- Location -->
                                <div class="row mb-5 mx-0">
                                    <h5 class="font-weight-600 md-grey-text text-darken-3 roboto-font  font-17-xs text-uppercase letter-space-xs">Location</h5>
                                    <hr class="g-hor-border-1-solid-md-orange my-2 mt-width-60-xs">
                                    	<?php 
                                        if(!empty($company_location)){?>
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
                                    	<?php }?>
											</ul>
										<?php }else{ ?>
											<!--<p class="roboto-font font-grey-gallery font-14-xs ">
												Not Provided
											</p>-->
											<div class="portlet p-4 md-shadow-none">
												<div class="portlet-body text-center">
													<i class="icon-puzzle font-grey-mint font-40-xs mb-4"></i>
													<h5 class="text-center font-weight-500 font-grey-mint">Not Provided</h5>
													<!--<h6 class="text-center  font-grey-cascade mt-1 text-none">It's seem like this company forgot to update his/her info. </h6>-->
												</div>
											</div>
										<?php }?>
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_job_info">
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
                                                <!--<div class="pull-right ">
                                                    <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']), '='); ?>" class="btn btn-md-indigo btn-sm letter-space-xs " target="_blank">Apply</a>
                                                </div>-->
                                                <div class="media-body ">
                                                    <h6 class="my-1 font-weight-700 roboto-font">
                                                        <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']), '='); ?>"><?php echo !empty($value['name']) ? $value['name'] :'' ; ?> </a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <p class="my-1 roboto-font">
                                                <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                                <span class="label label-md-red label-sm"><i class="icon-pointer"></i> <?php echo $this->session->userdata('country')?></span>
                                                <span class="label label-md-blue label-sm"><?php echo $value['employment_name'] ;?></span>
                                                <span class="label label-md-purple label-sm"><?php echo $value['position_level_id']==1 ? 'Junior' : $value['position_level_id']==2 ? 'Senior' : 'Executive'; ?></span>
                                            </p>
                                            <p class="multiline-truncate roboto-font font-weight-300 mb-3"><?php echo !empty($value['job_description']) ? $value['job_description'] : ''; ?>
                                            </p>
                                        </li>
                                    <?php } ?>
                                    <!-- Pagination -->
                                    <li class="list-group-item px-0 ">
                                        <ul class="pagination pagination-lg">
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
													<a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>"> <?=$article_page-2?> </a>
												</li>
											<?php }?>
											<?php if($article_page-1 > 0){ $other_page = $article_page-1;?>
											<li>
												<a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>"> <?=$article_page-1?> </a>
											</li>
											<?php }?>
											<li class="active">
												<a href="javascript:;"> <?=$article_page?> </a>
											</li>
											<?php if($article_total > $article_page+$article_page*4){ $other_page = $article_page+1;?>
												<li>
													<a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>"> <?=$article_page+1?> </a>
												</li>
											<?php }?>
											<?php if($article_total > $article_page+$article_page*4+5){ $other_page = $article_page+2;?>
												<li>
													<a href="<?=base_url().'profile/company/'.$this->uri->segment(URI_SEGMENT_DETAIL).'/page/'.$other_page.'#tab_job_info'?>"> <?=$article_page+2?> </a>
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
											
											
											<!--<li>
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
                                            </li>-->
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
                <div class="row mb-3   mx-0 ">
                    <ul class="list-unstyled ">
                        <!-- Company Industry -->
                        <?php //if (!empty($detail['industry'])): ?>    
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-industry mr-1"></i>Industry</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['industry'] != ""?$detail['industry']:"Not Provided"; ?>
                            </p>
                        </li>
                        <?php //endif ?>

                        <!-- Company Size -->
                        <?php //if (!empty($detail['total_staff'])): ?>
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-building-o mr-1"></i>Company Size</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['total_staff'] != ""?$detail['total_staff']:"Not Provided"; ?> People
                            </p>
                        </li>                            
                        <?php //endif ?>

                        <!-- Working Hour -->
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="icon-clock mr-1"></i>Working Hour</h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['working_hours'] != ""?$detail['working_hours']:"Not Provided"; ?>
                            </p>
                        </li>

                        <!-- Dress Code -->
                        <?php //if (!empty($detail['dress_code'])): ?>
                            <li>
                                <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                    <i class="icon-users mr-1"></i>Dress Code </h5>
                                <p class="roboto-font font-grey-gallery font-14-xs ">
                                    <?php echo $detail['dress_code'] != ""?$detail['dress_code']:"Not Provided"; ?>
                                </p>
                            </li>
                        <?php //endif ?>

                        <!-- Website -->
                        <?php //if (!empty($detail['url'])): ?>
                            <li>
                                <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                    <i class="icon-screen-desktop mr-1"></i>Website </h5>
                                <p class="roboto-font font-grey-gallery font-14-xs ">
                                    <?php echo $detail['url'] != ""?"<a href='".$detail['url']."'>".$detail['url']."</a>":"Not Provided"; ?>
                                </p>
                            </li>
                        <?php //endif ?>

                        <!-- Spoken Language -->
                        <?php //if (!empty($detail['spoken_language'])): ?>
                            <li>
                                <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                    <i class="fa fa-language mr-1"></i>Spoken Language </h5>
                                <p class="roboto-font font-grey-gallery font-14-xs ">
                                    <?php echo $detail['spoken_language'] != ""?$detail['spoken_language']:"Not Provided"; ?>
                                </p>
                            </li>
                        <?php //endif ?>

                        <!-- Benefit -->
                        <?php if (!empty($detail['benefits'])): ?>   
                        <li>
                            <h5 class="font-weight-500 font-grey-gallery roboto-font font-14-xs text-capitalize letter-space-xs mb-1">
                                <i class="fa fa-diamond mr-1"></i>Benefit </h5>
                            <p class="roboto-font font-grey-gallery font-14-xs ">
                                <?php echo $detail['benefits'] != ""?$detail['benefits']:"Not Provided"; ?>
                            </p>
                        </li>
                        <?php endif ?>

                    </ul>
                </div>

                <!-- Follow Me Social Icons -->
                <div class="row mb-5 mx-0 ">
                    <h5 class="font-weight-600 md-orange-text roboto-font mb-2 font-15-xs text-uppercase letter-space-xs">Follow Me </h5>
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
                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Twitter"  class="twitter" target="_blank"></a>
                                </li>        
                            <?php $followme++;break;
                                case 'linkedin': ?>
                                <li>
                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" data-original-title="Linked In"  class="linkedin" target="_blank"></a>
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
                            <?php break; default:?>
                                <li>
                                    
                                </li>
                            <?php break; } ?>
                            
                        <?php } if($followme == 0){?>
							<p class="roboto-font font-grey-gallery font-14-xs ">
                                Not Provided
                            </p>
						<?php }?>						
                    </ul>
                </div>
                <!-- Ad -->
                <!--<div class="row mb-5 mx-0">
                    <h5 class="font-weight-600 md-orange-text roboto-font mb-2 font-15-xs text-uppercase letter-space-xs">Recent view
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

	<?php $this->load->view('main/footer_content');?>

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
            var address = <?php echo $detail['address']; ?>;
            var company_name = '<?php echo $detail['company_name']; ?>';
            var latLang = {lat: 3.9453071, lng: 107.4046742};
            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('gmapbg'), {
              center: latLang,
              zoom: 4
            });

            $.each(address,function(i,v){
                var lat = parseInt(v.building_latitude);
                var long = parseInt(v.building_longitude);
                 var marker = new google.maps.Marker({
                  map: map,
                  position: {lat: lat, lng: long},
                  title: company_name
                });
            });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&callback=initMap"
    async defer></script>
</body>

</html>