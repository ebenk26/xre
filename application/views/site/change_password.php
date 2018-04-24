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
    <link rel="stylesheet" type="text/css" href="<?= CSS; ?>layout8/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.css" >
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
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG; ?>site/xremo-logo-white.svg" alt="Xremo Logo" style="height:47px">
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
        <div class="container g-ver-center  ">
            <div class="portlet light p-100">
                <div class="portlet-body ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="md-indigo-text font-weight-500 my-20 ">Reset Your Password</h2>
                            <p class="mb-2">You have requested to reset password for:</p>
                            <h6 class="font-weight-600 text-none"><?= base64_decode($this->uri->segment(2));  ?></h6>
                        </div>
                        <div class="col-sm-6 bg-sky-light p-20">
                            <form action="<?= base_url();  ?>site/user/forgotPassword" method="POST" class="form-horizontal">
                                <input type="hidden" value="<?= base64_decode($this->uri->segment(2));  ?>"></input>
                                <!-- New Password -->
                                <div class="form-group mx-0 ">
                                    <label class="control-label ">New Password</label>
                                    <input type="password" class="form-control " name="password" placeholder="">
                                    <!-- <span class="help-block small">pass </span -->

                                </div>
                                <div class="form-group mx-0">
                                    <label class="control-label ">Confirm New Password</label>
                                    <input type="password" class="form-control " name="conf_password" placeholder="">
                                    <!-- <span class="help-block small">pass </span -->
                                </div>
                                <button type="submit" class="btn btn-md-indigo">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== END CONTENT ==========-->

    

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
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.smooth-scroll.min.js"></script>
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
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/components/google-map.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/wow.min.js"></script>

    <!-- Page -->
    <script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3-gallery.js"></script>
</body>

</html>
