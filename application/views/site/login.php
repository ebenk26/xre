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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link href="<?php echo CSS; ?>bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link href="<?php echo CSS; ?>icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin -->
    <link href="<?php echo JS; ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo JS; ?>plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Global -->
    <link href="<?php echo CSS; ?>global/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS; ?>global/plugins.min.css" rel="stylesheet" type="text/css">

    <!-- Page Layout -->
    <link href="<?php echo CSS; ?>pages/login-5.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/alertify.min.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL STYLES -->

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

    <div class=" user-login-5">
        <div class="row bs-reset ">
            <!-- col-bg-color-indigo  -->
            <div class="col-md-6 bs-reset">
                <div class="view">
                    <img src="<?php echo base_url(); ?>assets/img/site/bg1.jpg" class="img-fluid login-bg" alt="">
                    <div class="mask hm-darkblue-v8">
                        <div class="m-grid m-grid-full-height ">
                            <div class="m-grid-col m-grid-col-middle m-grid-col-center md-white-text">
                                <blockquote class="blockquote mx-5">
                                    <h4 class="md-white-text ">Your Career is like garden it can hold an assortement of life's energy yields a bounty for you. You do not need to grow just one thing in your garden. You do not need
                                        to do just one thing in your career.</h4>
                                    <footer class="blockquote-footer md-orange-text ">Quote of the day</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-1 -->
            <div class="col-md-6 login-container bs-reset">
                <!-- Logo -->
                <div class="m-grid ">
                    <div class="m-grid-col m-grid-col-middle m-grid-col-center ">
                        <a href="<?=base_url()?>">
                            <img class="login-logo" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.svg" style="height:68px;">
                        </a>
                    </div>
                </div>
                <!-- Content -->
                <div class="login-content ">
                    <div class="portlet portlet-body text-center">
                        <!-- Form Login -->
                        <form class="form-horizontal login-form " action="<?php echo base_url(); ?>site/user/login_post" method="post" novalidate="novalidate">
                            <h4 class="font-weight-600 md-grey-darken-2-text  mb-40">Login to your account</h4>
                            <!--  Alert Display -->
                            <div class="alert alert-danger display-hide mt-20">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Email Input -->
                            <div class="form-body">
                                <!--<div class="form-group form-md-line-input px-5">-->
                                <div class="form-group form-md-line-input">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="input-icon">
                                            <input name="email" type="email" class="form-control " placeholder="Email" required>
                                            <div class="form-control-focus"> </div>
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Password Input -->
                                <div class="form-group form-md-line-input">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="input-icon ">
                                            <input name="password" type="password" class="form-control " placeholder="Password" required>
                                            <div class="form-control-focus"> </div>
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Remember Me & Forgot Password  -->
                                <div class="form-group form-md-line-input">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="m-grid my-10">
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-left">
                                                <div class="md-checkbox md-indigo-box">
                                                    <input type="checkbox" id="checkbox16" name="remember" class="md-check">
                                                    <label for="checkbox16" class="font-weight-400 ">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="m-grid-col m-grid-col-middle m-grid-col-right">
                                                <a href="javascript:;" id="forget-password" class="forget-password ">
                                                    <label class="font-weight-400 ">Forgot Password? </label>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Submit Button -->
                                <div class="form-group my-4">
                                    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-md-indigo btn-block">Sign in</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="m-grid my-4">
                                    <div class="m-grid-col m-grid-col-middle m-grid-col-center ">
                                        Don't have an account ?
                                        <a href="<?php echo base_url(); ?>signup"> Sign Up </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form px-7 text-center" action="<?php echo base_url(); ?>site/user/forgot_password" method="post" style="display: none;">
                            <div class="form-body">
                                <h3 class="md-indigo-text">Forgot Password ?</h3>
                                <p> Enter your e-mail address below to reset your password. </p>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="button" id="back-btn" class="btn btn-warning mr-4">Back</button>
                                        <button type="submit" class="btn btn-md-indigo text-uppercase">Submit</button>
                                        <!--<button type="submit" class="btn btn-md-indigo text-uppercase pull-right">Submit</button>-->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                </div>
                <!-- Footer -->
                <!--<div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-12 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright © Xremo <?=date('Y')?></p>
                            </div>
                        </div>
                    </div>
                </div>-->
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
            alertify.success('<?php echo $this->session->flashdata('
                msg_success '); ?>', 'success', 10);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
            alertify.error('<?php echo $this->session->flashdata('
                msg_failed '); ?>', 'error', 5);
            <?php } ?>
        });

    </script>


</body>

</html>
