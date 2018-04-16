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

     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugin/jquery-v1-12-4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
	
	<!--//REMOVE
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.wow.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
	-->

    <!-- General Components and Settings -->
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global/app.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
    <!--========== END JAVASCRIPTS ==========-->


</body></html>