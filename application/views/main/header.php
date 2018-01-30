<!DOCTYPE html>
<!-- saved from url=(0063)https://xremo.github.io/XremoFrontEnd/custom_pages/welcome.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Basic -->
    <?php $title= !empty($page_title) ? $page_title : 'Welcome';?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xremo - <?php echo $title; ?></title>

    <!-- Web Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/main-font-css" rel="stylesheet">

    <!-- Vendor Styles -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/themify.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
    <!-- Metronic -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <!-- Megakit Styles -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Metronic Styles -->
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
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
                            <a href="<?php echo base_url(); ?>site/home" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo base_url(); ?>assets/img/site/xremo.png" alt="Dublin Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.png" style="height:47px" alt="Dublin Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav">
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
                                    <a href="#" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <?php if ($this->session->userdata('name')){ ?>
                                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('roles'); ?>/dashboard" class="s-header-v2-nav-link">Welcome, <?php echo $this->session->userdata('name') ;?></a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-brd s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-default">Login</a>
                                    <a href="<?php echo base_url(); ?>login" class=" g-letter-spacing-1 g-radius-50 g-font-size-16-xs s-btn s-btn-md-orange-bg s-btn-xs g-margin-t-20-xs g-margin-b-20-xs s-header-v2-logo-img-shrink">Login</a>
                                    <?php } ?>
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