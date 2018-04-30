<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Change Password</title>

    <!-- CSS STYLES -->
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link href="<?php echo CSS; ?>bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link href="<?php echo CSS; ?>icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">

    <!-- Global -->
    <link href="<?php echo CSS; ?>global/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>global/plugins.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>layout8/layout8.css" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <!--========== HEADER  ==========-->
    <header class="navbar-fixed-top s-header js-header-sticky js-header-overlay">
        <!-- Navbar -->
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
                    <div class="s-header-v2-navbar-col ">
                        <div class="s-header-v2-logo">
                            <a href="<?= base_url(); ?>" class="s-header-v2-logo-link">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default height-50" src="<?php echo IMG; ?>site/xremo-logo-white.svg" alt="Xremo Logo" style="height:47px">
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
            <div class="portlet light  md-shadow-z-3 text-center">
                <div class="portlet-body px-0 py-100">
                    <i class="icon-check display-3 md-green-text "></i>
                    <h4 class="mt-20">Your password has been reset</h4>
                    <p class="font-16 font-weight-400">Login to your account by using new password.</p>
                    <a href="<?= base_url(); ?>" class="btn btn-md-indigo mt-15">Login to my account</a>
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
