<?php $country =$this->session->userdata('country');  !empty($country) ? redirect(base_url().'site/home') : true;?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Basic -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Discover your Xciting internship and career in Xremo">
    <meta name="keywords" content="Xremo, Job Portal, Internship, Career Portal, Indonesia, Malaysia, Philipines">
    <meta name="author" content="Xremo">
    <title>Xremo Career Portal, Job Portal</title>

    
    <link href="<?php echo CSS; ?>bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>vendor/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>vendor/scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>vendor/swiper.min.css" rel="stylesheet" type="text/css">
    <!-- Metronic -->
    <link href="<?php echo CSS; ?>icon/themify.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <!-- Metronic Styles -->
    <link href="<?php echo CSS; ?>global/components.css" rel="stylesheet" type="text/css">
    <!-- Megakit Styles -->
    <link href="<?php echo CSS; ?>layout8/layout8.css" rel="stylesheet" type="text/css">

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
    <div class="s-promo-block-v2 g-bg-gradient-darkblue-strong g-fullheight-xs" style="background: url(assets/img/site/mainpagebanner.jpg) no-repeat fixed;">
        <div class="container   g-ver-center-xs">
            <div class="row g-row-col-0  g-padding-x-120-sm g-text-center-xs">
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive g-margin-auto g-margin-b-40-xs" src="assets/img/site/xremo.png" alt="Xremo Job Portal">
                </div>
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".2s">
                    <h1 class="g-font-size-34-xs  g-color-md-white-text g-font-weight-600 g-margin-b-20-xs">Discover your Xciting internship and career in Xremo</h1>
                </div>
                <div class="wow fadeInUp animated " data-wow-duration=".3" data-wow-delay=".3s">
                    <div class="g-hor-divider-solid-md-orange g-width-350-sm  center-block g-margin-b-50-xs"></div>
                </div>
            </div>

            <div class="row g-row-col-0  g-padding-x-120-sm g-text-center-xs ">
                <div class="wow fadeInUp animated animation" data-wow-duration=".3" data-wow-delay=".4s">
                    <h4 class="font-weight-600 md-white-text">Select your Country</h4>
                </div>
                <div class="wow fadeInUp animated animation" data-wow-duration=".3" data-wow-delay=".5s">
                    <div class="btn-group " role="group" aria-label="...">

                        <a href="site/country/id/" class="btn btn-md-indigo md-white-text btn-lg px-5 mx-2">Indonesia</a>
                        <a href="site/country/my/" class="btn btn-md-indigo btn-lg mx-2 px-5">Malaysia</a>
                        <a href="site/country/ph/" class="btn btn-md-indigo btn-lg mx-2 px-5">Philipines</a>

                    </div>
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