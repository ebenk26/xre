<!DOCTYPE html>
<!-- saved from url=(0061)https://xremo.github.io/XremoFrontEnd/custom_pages/login.html -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="author">

    <title>Xremo - Login</title>

    <!-- CSS STYLES -->
    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/simple-line-icons.min.css">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/select2/css/select2-bootstrap.min.css">

    <!-- Global -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/plugins.min.css">

    <!-- Page Layout -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>pages/login-5.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>vendor/alertify.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">

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
<!-- END HEAD -->

<body class="login">

    <div class="user-login-5 m-grid  m-grid-responsive-xs m-grid-responsive-sm m-grid-flex">
        <div class="bs-reset m-grid-row m-grid-full-height">
            <!-- Col- MD DARKBLUE -->
            <div class="m-grid-col m-grid-col-center m-grid-col-middle  bs-reset  m-grid-col-12-sm  m-grid-col-order-2 hidden-xs ">
                <div class="view g-fullheight">
                    <img src="<?php echo base_url(); ?>assets/img/site/bg1.jpg" class="" alt="">
                    <div class="mask hm-darkblue-v8">
                        <div class="m-grid m-grid-full-height ">
                            <div class="m-grid-col m-grid-col-middle m-grid-col-center md-white-text">
                                <blockquote class="blockquote mx-5">
                                    <h4 class="md-white-text ">Your Career is like garden it can hold an assortement of life's energy yields a bounty for you. You do not need to grow just one thing in your garden. You do not need to do just one thing in your career.</h4>
                                    <footer class="blockquote-footer md-orange-text ">Quote of the day</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-1 -->
            <div class="m-grid-col m-grid-col-center m-grid-col-middle login-container bs-reset  m-grid-col-12-sm  m-gird-col-order-1">
                <div class="login-content m-grid p-0 m-0 g-fullheight">
                    <div class="m-grid-col m-grid-col-center m-grid-col-middle ">
                        <div class="portlet">
                            <a href="<?=base_url()?>">
                                <img class="height-100" src="<?php echo IMG; ?>site/xremo-logo-blue.svg">
                            </a>
                            <div class="portlet-body">
                                <!-- Form Login -->
                                <form class="form-horizontal login-form " action="<?php echo base_url(); ?>site/user/login_post" method="post" novalidate="novalidate">
                                    <div class="form-body ">
                                        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
                                            <h4 class="font-weight-400 md-grey-darken-2-text mt-90 mb-70"><?= !empty($language->login_to_your_account) ? $language->login_to_your_account : "Login to your account"; ?></h4>
                                            <!--  Alert Display -->
                                            <div class="alert alert-danger display-hide mb-30 mt-5">
                                                <button class="close" data-close="alert"></button>
                                                <span>Enter any username and password. </span>
                                            </div>
                                            <!-- Email Input -->
                                            <div class="form-group form-md-line-input ">
                                                <div class="input-icon">
                                                    <input name="email" type="email" class="form-control " placeholder="Email" required>
                                                    <div class="form-control-focus"> </div>
                                                    <i class="fa fa-envelope-o"></i>
                                                </div>
                                            </div>
                                            <!-- Password -->
                                            <div class="form-group form-md-line-input">
                                                <div class="input-icon ">
                                                    <input name="password" type="password" class="form-control " placeholder="Password" required>
                                                    <div class="form-control-focus"> </div>
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </div>
                                            <!-- Remember Me & Forgot Password  -->
                                            <div class="form-group form-md-line-input mt-10 mb-80">
                                                <div class="m-grid my-10">
                                                    <div class="m-grid-col m-grid-col-middle m-grid-col-left">
                                                        <div class="md-checkbox md-indigo-box">
                                                            <input type="checkbox" id="checkbox16" name="remember" class="md-check">
                                                            <label for="checkbox16" class="font-weight-400 ">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> <?= !empty($language->login_remember_me) ? $language->login_remember_me : 'Remember Me'; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="m-grid-col m-grid-col-middle m-grid-col-right">
                                                        <a href="javascript:;" id="forget-password" class="forget-password ">
                                                            <label class="font-weight-400 "><?= !empty($language->login_forgot_password) ? $language->login_forgot_password : 'Forgot Password'; ?>? </label>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-40">
                                                <button type="submit" class="btn btn-md-indigo btn-block"><?= !empty($language->site_signin) ? $language->site_signin : "Signin"; ?></button>
                                            </div>
                                            <div class="m-grid my-4">
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center ">
                                                    <?= !empty($language->login_no_account) ? $language->login_no_account : "Don't Have an account"; ?>?
                                                    <a href="<?php echo base_url(); ?>signup"> <?= !empty($language->site_signup) ? $language->site_signup : 'Signup'; ?> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- BEGIN FORGOT PASSWORD FORM -->
                                <form class="forget-form text-center mt-display-none" action="<?php echo base_url(); ?>site/user/forgot_password" method="post">
                                    <div class="form-body">
                                        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
                                            <h3 class="md-indigo-text mt-90 mb-70"><?= !empty($language->login_forgot_password) ? $language->login_forgot_password : 'Forgot Password'; ?> ?</h3>
                                            <p class="mb-30 "> Enter your e-mail address below to reset your password. </p>

                                            <div class="form-group">
                                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email">
                                            </div>
                                            <button type="button" id="back-btn" class="btn btn-md-indigo btn-outline mr-4 pull-left">Back</button>
                                            <button type="submit" class="btn btn-md-indigo text-uppercase pull-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORGOT PASSWORD FORM -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <!-- CORE -->
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- Vendor -->
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-validation/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>plugins/backstretch/jquery.backstretch.min.js"></script>

    <!-- Custom-->
    <script type="text/javascript" src="<?php echo JS; ?>alertify.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>pass-strength.js"></script>

    <!-- Global-->
    <script type="text/javascript" src="<?php echo JS; ?>global/app.min.js"></script>

    <!-- Page Layout -->
    <script type="text/javascript" src="<?php echo JS; ?>pages/login-5.js"></script>


    <script>
        $(document).ready(function () {
            $('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
        })

    </script>
    <script>
        // assumes you're using jQuery
        $(document).ready(function () {
            <?php if($this->session->flashdata('msg_success')){ ?>
            alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 10);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
            alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
            <?php } ?>
        });

    </script>


</body>

</html>
