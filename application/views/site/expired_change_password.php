<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Expired Link Change Password</title>

    <!-- CSS STYLES -->
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link href="<?php echo CSS; ?>bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= CSS; ?>layout8/style.css">
    <link rel="stylesheet" type="text/css" href="<?= CSS; ?>layout8/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>plugins/simple-line-icons/simple-line-icons.min.css">

    <!-- Icon -->
    <link href="<?php echo CSS; ?>icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">

    <!-- Global -->
    <link href="<?php echo CSS; ?>global/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>global/plugins.min.css" rel="stylesheet" type="text/css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">
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

                    <!-- Logo -->
                    <div class="s-header-v2-navbar-col ">
                        <div class="s-header-v2-logo">
                            <a href="<?= base_url(); ?>" class="s-header-v2-logo-link">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG; ?>site/xremo-logo-white.svg" alt="Xremo Logo" style="height:47px">
                                <!-- <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="../../assets/global/img/xremo/xremo-logo-blue.png" style="height:47px" alt="Dublin Logo"> -->
                            </a>
                        </div>
                    </div>
                    <!-- End Logo -->

                    <!-- Content -->

                </div>
                <!-- End Navbar Row -->
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
    <!--========== END HEADER ==========-->

    <!--========== CONTENT ==========-->
    <section class="s-promo-block-v4 gradient-indigo g-fullheight">
        <div class="container g-ver-center width-700">
            <div class="portlet light p-100 md-shadow-z-3 text-center">
                <div class="portlet-body ">
                    <i class="icon-close display-3 md-red-text "></i>
                    <h4 class="mt-40">Link expired.</h4>
                    <p class="font-16 mx-30 mb-40 font-weight-400">Hey there! Your Xremo password has expired after 24 hour or has already been used! To reset your password , enter your email.</p>
                    <form action="<?php echo base_url(); ?>site/user/forgot_password" method="post">
                        <div class="form-group mx-0 mt-20">
                            <div class="input-icon">
                                <i class="icon-envelope"></i>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>

                        </div>
                        <div class="text-right ">
                            <a href="welcome.html" class="btn btn-outline-md-indigo">Cancel</a>
                            <button class="btn btn-md-indigo width-200" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--========== END CONTENT ==========-->



    <!-- CORE -->
    <!-- <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- VENDOR -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.smooth-scroll.min.js"></script>

    <!-- Custom-->
    <script type="text/javascript" src="<?php echo JS; ?>alertify.min.js"></script>

    <!-- Global-->
    <script type="text/javascript" src="<?php echo JS; ?>global/app.min.js"></script>
    <!-- Layout 8 -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/layout8.min.js"></script>

    <!-- Component Page -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/header-sticky.min.js"></script>

</body>

</html>
