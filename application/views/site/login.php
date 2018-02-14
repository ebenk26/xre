<!DOCTYPE html>
<!-- saved from url=(0061)https://xremo.github.io/XremoFrontEnd/custom_pages/login.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Xremo - Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="author">
	
	<!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/main-font-css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/plugins.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/login-5.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/alertify.min.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
</head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <div class=" user-login-5">
        <div class="row bs-reset ">
            <!-- col-bg-color-indigo  -->
            <div class="col-md-6 bs-reset">
                <div class="view hm-indigo-strong">
                    <img src="<?php echo base_url(); ?>assets/img/site/bg1.jpg" class="img-fluid login-bg" alt="">
                    <div class="mask">
                        <div class="m-grid m-grid-full-height ">
                            <div class="m-grid-col m-grid-col-middle m-grid-col-center font-white">
                                <blockquote class="blockquote mx-5">
                                    <p class="mb-0">Your Career is like garden it can hold an assortement of life's energy yields a bounty
                                        for you. You do not need to grow just one thing in your garden. You do not need to
                                        do just one thing in your career.</p>
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
                        <a href="<?=base_url()?>"><img class="login-logo" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.png" style="height:68px;"></a>
                    </div>
                </div>
                <!-- Content -->
                <div class="login-content " style="padding: 0 5%;">
                    <div class="portlet portlet-body text-center">
                        <!-- Form Login -->
                        <form class="form-horizontal login-form px-4" action="<?php echo base_url(); ?>site/user/login_post" method="post" novalidate="novalidate">
                            <h4 class="fw-semibold md-grey-text text-darken-2">Login to your account</h4>
                            <div class="clearfix"></div>
                            <div class="clearfix"></div>
                            <!--  Alert Display -->
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Email Input -->
                            <div class="form-group form-md-line-input px-5">
                                <div class="col-md-12">
                                    <div class="input-icon">
                                        <input name="email" type="email" class="form-control " placeholder="Email" required>
                                        <div class="form-control-focus"> </div>
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Password Input -->
                            <div class="form-group form-md-line-input px-5">
                                <div class="col-md-12">
                                    <div class="input-icon ">
                                        <input name="password" type="password" class="form-control " placeholder="Password" required>
                                        <div class="form-control-focus"> </div>
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Remember Me & Forgot Password  -->
                            <div class="m-grid my-4 px-5">
                                <div class="m-grid-col m-grid-col-middle m-grid-col-left">
                                    <div class="md-checkbox md-indigo-box">
                                        <input type="checkbox" id="checkbox16" name="remember" class="md-check">
                                        <label for="checkbox16">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Remember Me
                                            </label>
                                    </div>
                                </div>
                                <div class="m-grid-col m-grid-col-middle m-grid-col-right">
                                    <a href="javascript:;" id="forget-password" class="forget-password"><label>Forgot Password? </label> </a>
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
                                    Don't have an account ?<a href="<?php echo base_url(); ?>signup"> Sign Up </a>
                                </div>
                            </div>
                        </form>

                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form px-7 text-center" action="<?php echo base_url(); ?>site/user/forgot_password" method="post" style="display: none;">

                            <h3 class="md-indigo-text">Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email">
                            </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn btn-warning mr-4">Back</button>
                                <button type="submit" class="btn btn-md-indigo text-uppercase">Submit</button>
                                <!--<button type="submit" class="btn btn-md-indigo text-uppercase pull-right">Submit</button>-->
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
    <!-- END : LOGIN PAGE 5-1 -->

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/login-5.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <script>
        $(document).ready(function () {
            $('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
    <script>
        // assumes you're using jQuery
        $(document).ready(function() {
            <?php if($this->session->flashdata('msg_success')){ ?>
                alertify.success('<?php echo $this->session->flashdata('msg_success'); ?>', 'success', 10);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
                alertify.error('<?php echo $this->session->flashdata('msg_failed'); ?>', 'error', 5);
            <?php } ?>
        });
    </script>


</body></html>