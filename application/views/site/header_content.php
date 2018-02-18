<?php 
    $roles = $this->session->userdata('roles'); 
    $login = $this->session->userdata('id');
?>
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
                            <a href="<?php echo base_url(); ?>home" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG_STUDENTS; ?>xremo.png" alt="Xremo Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Xremo Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!--Desktop Menu -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav">
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>job/search" class="s-header-v2-nav-link ">Search Job</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>about" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>services" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contact</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url();?>article" class="s-header-v2-nav-link">Article</a>
                                </li>

                                <?php if (!empty($login)){ ?>
                                <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                    <a href="<?=base_url()?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php if ($roles =='administrator') {?>
                                            <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-xtramini avatar-circle" alt="">
                                        <?php }?>

                                        <?php if ($roles =='employer') {?>
                                            <img alt="Employer Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "" ?  IMG_EMPLOYERS.base64_decode($this->session->userdata('img_profile')) : IMG_EMPLOYER.'xremo/xremo-logo-blue.png'?>">
                                        <?php }?>
                                        
                                        <?php if ($roles =='student') {?>
                                            <img alt="Student Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "" ?  IMG_STUDENTS.base64_decode($this->session->userdata('img_profile')) : IMG_STUDENTS.'profile-pic.png'; ?>" />
                                        <?php }?>
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
                                        <?php } ?>
                                        <?php if ($roles !='employer' && $roles !='administrator') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>profile/user/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=');?>" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>My Resume</a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($roles =='employer') {?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-book-open mr-3"></i>View My Profile
                                            </a>
                                        </li>
                                        <?php }?>
                                        <?php if ($roles !='administrator') {?>
                                        <li>
                                            <a href="<?php echo base_url(); ?><?php echo $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-calendar mr-3"></i>My Calendar</a>
                                        </li>
                                        <?php } ?>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-key mr-3"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php }else{ ?>
                                    <li class="s-header-v2-nav-item">
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                        <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse">
                            <ul class="s-header-v2-nav hidden">
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
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contact</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?php echo base_url(); ?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <?php if (!empty($login)): ?>
                                    <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                        <a href="<?php echo base_url(); ?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                            <?php if ($roles =='administrator') {?>
                                                <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar avatar-xtramini avatar-circle" alt="">
                                            <?php }?>

                                            <?php if ($roles =='employer') {?>
                                                <img alt="Employer Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "" ?  IMG_EMPLOYERS.base64_decode($this->session->userdata('img_profile')) : IMG_EMPLOYER.'xremo/xremo-logo-blue.png'?>">
                                            <?php }?>
                                            
                                            <?php if ($roles =='student') {?>
                                                <img alt="Student Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "" ?  IMG_STUDENTS.base64_decode($this->session->userdata('img_profile')) : IMG_STUDENTS.'profile-pic.png'; ?>" />
                                            <?php }?>

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
                                            <?php } ?>
                                            <?php if ($roles !='employer' && $roles !='administrator') {?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>profile/user/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=');?>" class="s-header-v2-dropdown-menu-link">
                                                        <i class="icon-book-open mr-3"></i>My Resume</a>
                                                </li>
                                            <?php } ?>
                                            <?php if ($roles =='employer') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-book-open mr-3"></i>View My Profile
                                                </a>
                                            </li>
                                            <?php }?>
                                            <?php if ($roles !='administrator') {?>
                                            <li>
                                                <a href="<?php echo base_url(); ?><?php echo $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                                    <i class="icon-calendar mr-3"></i>My Calendar</a>
                                            </li>
                                            <?php } ?>
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