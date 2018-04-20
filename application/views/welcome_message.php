<?php $country =$this->session->userdata('country');  !empty($country) ? redirect(base_url().'site/home') : true;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Basic -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Discover your Xciting internship and career in Xremo">
    <meta name="keywords" content="Xremo, Job Portal, Internship, Career Portal, Indonesia, Malaysia, Philipines">
    <meta name="author" content="Xremo">
    <title>Xremo Career Portal, Job Portal</title>


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
    
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>vendor/alertify.min.css">

    <!-- Global -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.css">

    <!-- Layout 8 -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout8/layout8.css">


    <!-- Favicon -->
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico" type="image/x-icon">

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

    <!-- <style type="text/css">
    .animation{
        visibility: visible; 
        animation-delay: 0.1s; 
        animation-name: fadeInUp;
    }
    </style> -->

</head>

<body>

    <!--========== PROMO : VIEW ==========-->
    <div class="s-promo-block-v2 gradient-darkblue-v7 g-fullheight" style="background: url('assets/img/site/mainpagebanner.jpg') no-repeat fixed;">
        <div class="container g-ver-center ">
            <div class="row g-row-col-0  px-120-sm text-center">
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive m-auto  height-100" src="assets/img/site/xremo-logo-white.svg" alt="Xremo Job Portal">
                </div>
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".2s">
                    <h1 class="font-34  md-white-text font-weight-600 mt-30">Discover your Xciting internship and career in Xremo</h1>
                </div>
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".3s">
                    <div class="width-200  center-block my-40  border-mdo-orange-v8 hor-divider-solid-medium"> </div>
                </div>
            </div>

            <div class="row g-row-col-0  px-120-sm text-center ">
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".4s">
                    <h4 class="font-weight-600 md-white-text letter-space-xs">Select your Country</h4>
                </div>
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".5s">
                    <div class="btn-group text-center" role="group" aria-label="...">

                        <a href="site/country/id/" class="btn btn-md-indigo btn-lg px-35 mx-15 mb-10">Indonesia</a>
                        <a href="site/country/my/" class="btn btn-md-indigo btn-lg mx-15 px-35 mb-10">Malaysia</a>
                        <a href="site/country/ph/" class="btn btn-md-indigo btn-lg mx-15 px-35 mb-10">Philipines</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    <!--========== END PROMO : VIEW ==========-->



    <!-- Back To Top -->
    <a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>
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


</body>

</html>
