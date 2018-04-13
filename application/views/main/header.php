<!DOCTYPE html>
<!-- saved from url=(0063)https://xremo.github.io/XremoFrontEnd/custom_pages/welcome.html -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Basic -->
    <?php $title= !empty($page_title) ? $page_title : 'Welcome';?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xremo -<?php echo $title; ?></title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css"
    />

    <!-- Bootstrap  -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
   
    <!-- Vendor Styles -->
    <link href="<?php echo base_url(); ?>assets/css/vendor/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/alertify.min.css" rel="stylesheet" type="text/css">
   
    <!-- Icon -->
    <link href="<?php echo base_url(); ?>assets/css/icon/themify.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">

    <!-- Global -->
    <link href="<?php echo base_url(); ?>assets/css/global/components.css" rel="stylesheet" type="text/css">
    <!-- Layout 8 -->
    <link href="<?php echo base_url(); ?>assets/css/layout8/layout8.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <!--<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->

    <!-- // REMOVE  -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title> -->

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

    <!--========== HEADER  ==========-->
    <header class="navbar-fixed-top s-header js-header-sticky">
        <!-- Navbar -->
        <nav class="s-header-v2-navbar">
            <div class="container mt-display-table-lg">
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
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default height-50" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-white.svg"
                                    alt="Xremo">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink height-50-sm height-60" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.svg"
                                    alt="Xremo ">
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
                                    <a href="<?php echo base_url(); ?>contact" class="s-header-v2-nav-link">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="<?=base_url()?>article" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <?php if ($this->session->userdata('name')){ ?>
                                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('roles'); ?>/dashboard" class="s-header-v2-nav-link">Welcome,
                                        <?php echo $this->session->userdata('name') ;?>
                                    </a>
                                    <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>login" class="s-header-v2-button btn btn-default">Login</a>
                                    <a href="<?php echo base_url(); ?>login" class="s-header-v2-button btn btn-shrink">Login</a>
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
