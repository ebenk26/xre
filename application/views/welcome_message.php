<?php $country =$this->session->userdata('country');  !empty($country) ? redirect(base_url().'site/home') : true;?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Basic -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome</title>

    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/themify.css" rel="stylesheet" type="text/css">
    <link href="assets/css/scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/swiper.min.css" rel="stylesheet" type="text/css">
    <!-- Metronic -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <!-- Megakit Styles -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Metronic Styles -->
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico" type="image/x-icon">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115543574-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-115543574-1');
    </script>
    
</head>

<body>

    <div class="s-promo-block-v2 g-bg-gradient-darkblue-strong g-fullheight-xs" style="background: url(assets/img/site/mainpagebanner.jpg) no-repeat fixed;">
        <div class="container  g-padding-y-60-xs">
            <div class="row g-row-col-0  g-ver-center-xs  g-padding-x-145-sm">
                <div class="col-sm-12 g-text-center-xs ">
                        <img class="img-responsive g-margin-auto g-margin-b-35-xs" src="assets/img/site/xremo.png" alt="Dublin Logo">
                    <h4 class="g-font-size-20-xs text-uppercase g-font-weight-700 g-letter-spacing-2 g-color-white g-margin-b-30-xs">Select country</h4>
                </div>
                <div class="col-sm-4 col-xs-4 center-block ">
                    <a href="site/country/my/">
                        <img src="assets/img/site/malaysia_round_icon_256.png" alt="" class="img-fluid center-block ">
                    </a>
                </div>
                <div class="col-sm-4  col-xs-4 center-block">
                    <a href="site/country/ph/">
                        <img src="assets/img/site/philippines_round_icon_256.png" alt="" class="img-fluid center-block">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-4 center-block">
                    <a href="site/country/id/">
                        <img src="assets/img/site/indonesia_round_icon_256.png" alt="" class="img-fluid center-block">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--========== END PROMO : VIEW ==========-->



    <!-- Back To Top -->
    <a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>

    <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
    <!-- Vendor -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.wow.min.js"></script>

    <!-- General Components and Settings -->
    <script type="text/javascript" src="assets/js/global.min.js"></script>
    <script type="text/javascript" src="assets/js/header-sticky.min.js"></script>
    <script type="text/javascript" src="assets/js/scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="assets/js/masonry.min.js"></script>
    <script type="text/javascript" src="assets/js/equal-height.min.js"></script>
    <script type="text/javascript" src="assets/js/parallax.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.min.js"></script>
    <!--========== END JAVASCRIPTS ==========-->


</body></html>