<?php 
    $roles = $this->session->userdata('roles'); 
    $login = $this->session->userdata('id');
?>

<!--========== HEADER  ==========-->
<header class="navbar-fixed-top s-header js-header-sticky">
    <nav class="s-header-v2-navbar">
        <div class="container mt-display-table-lg">

            <div class="s-header-v2-navbar-row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="s-header-v2-navbar-col">
                    <button type="button" class="collapsed s-header-v2-toggle" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                        <span class="s-header-v2-toggle-icon-bar"></span>
                    </button>
                </div>

                <!-- Logo -->
                <div class="s-header-v2-navbar-col s-header-v2-navbar-col-width-180">
                    <a href="<?php echo base_url(); ?>home" class="s-header-v2-logo-link ">
                        <img class="s-header-v2-logo-img s-header-v2-logo-img-default height-50" src="<?php echo IMG; ?>site/xremo-logo-white.svg" alt="Xremo">
                        <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink height-50-sm height-60" src="<?php echo IMG; ?>site/xremo-logo-blue.svg" alt="Xremo ">
                    </a>
                </div>
                <!-- End Logo -->

                <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                    <!--Desktop Menu -->
                    <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                        <ul class="s-header-v2-nav">
                            <!-- Search Job  -->
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url(); ?>job/search" class="s-header-v2-nav-link ">Search Job</a>
                            </li>
                            <!--  About -->
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url();?>about" class="s-header-v2-nav-link">About</a>
                            </li>
                            <!-- Services -->
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url();?>services" class="s-header-v2-nav-link">Services</a>
                            </li>
                            <!-- Contact -->
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url();?>contact" class="s-header-v2-nav-link ">Contact</a>
                            </li>
                            <!-- Article -->
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url();?>article" class="s-header-v2-nav-link">Article</a>
                            </li>
                            <!-- USER LOGIN -->
                            <?php if (!empty($login)){ ?>
                            <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                <a href="<?=base_url()?>" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                    <!-- Administrator -->
                                    <?php if ($roles =='administrator') {?>
                                    <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG.'/site/xremo-logo-blue.svg'; ?>" class="avatar avatar-xtramini avatar-circle" alt="">
                                    <?php }?>

                                    <!-- Employer -->
                                    <?php if ($roles =='employer') {?>
                                    <img alt="Employer Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "
                                        " ?  IMG_EMPLOYERS.base64_decode($this->session->userdata('img_profile')) : IMG.'site/xremo-logo-blue.svg'?>">
                                    <?php }?>

                                    <!-- Student -->
                                    <?php if ($roles =='student') {?>
                                    <img alt="Student Picture" class="avatar avatar-xtramini avatar-circle" src="<?php echo $this->session->userdata('img_profile') != "
                                        " ?  IMG_STUDENTS.base64_decode($this->session->userdata('img_profile')) : IMG_STUDENTS.'profile-pic.png'; ?>" />
                                    <?php }?>

                                    <span class="font-10 ml-5 ti-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right mt-o-20">
                                    <!-- DASHBOARD -->
                                    <li>
                                        <a href="<?php echo base_url(); ?><?php echo $roles; ?>/dashboard" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-home mr-10"></i>Dashboard</a>
                                    </li>
                                    <!-- EDIT PROFILE -->
                                    <?php if ($roles !='administrator') {?>
                                    <li>
                                        <a href="<?php echo base_url(); ?><?php echo $roles; ?>/profile" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-note mr-10"></i>Edit Profile</a>
                                    </li>
                                    <?php } ?>
                                    <!-- RESUME FOR STUDENT -->
                                    <?php if ($roles !='employer' && $roles !='administrator') {?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>profile/user/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=');?>" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-book-open mr-10"></i>My Resume</a>
                                    </li>
                                    <?php } ?>
                                    <!-- VIEW PROFILE -->
                                    <?php if ($roles =='employer') {?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-book-open mr-10"></i>View My Profile
                                        </a>
                                    </li>
                                    <?php }?>
                                    <!-- CALENDAR -->
                                    <?php if ($roles !='administrator') {?>
                                    <li>
                                        <a href="<?php echo base_url(); ?><?php echo $roles; ?>/calendar" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-calendar mr-10"></i>My Calendar</a>
                                    </li>
                                    <?php } ?>
                                    <li class="divider"></li>
                                    <!-- LOGOUT -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>site/user/logout" class="s-header-v2-dropdown-menu-link">
                                            <i class="icon-key mr-10"></i>Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- IF USER NOT LOGIN -->
                            <?php }else{ ?>
                            <li class="s-header-v2-nav-item">
                                <a href="<?php echo base_url(); ?>login" class="s-header-v2-button btn btn-default">Login</a>
                                <a href="<?php echo base_url(); ?>login" class="s-header-v2-button btn btn-shrink">Login</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
    </nav>
</header>
<!--========== END HEADER ==========-->
