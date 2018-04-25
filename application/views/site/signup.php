<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META  -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="author">

    <!-- TITLE -->
    <title>Xremo - Sign Up</title>

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

    <!-- Custom -->
    <link href="<?php echo base_url(); ?>assets/css/vendor/alertify.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .progress-bar {
            text-align: center;
            height: 1.5em;
            width: 100%;
            -webkit-appearance: none;
            border: none;

            /* Set the progressbar to relative */
            position: relative;
        }

        .progress-bar:before {
            content: attr(data-label);
            font-size: 0.8em;
            vertical-align: 0;

            /*Position text over the progress bar */
            position: absolute;
            left: 0;
            right: 0;
        }

        .progress-bar::-webkit-progress-bar {
            background-color: #c9c9c9;
        }

        .progress-bar::-webkit-progress-value {
            background-color: #7cc4ff;
        }

        .progress-bar::-moz-progress-bar {
            background-color: #7cc4ff;
        }

        .ajs-message {
            color: #FFFFFF;
        }

    </style>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico">

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

<body class="login">

    <div class="user-login-5 m-grid  m-grid-responsive-xs m-grid-responsive-sm">
        <div class="bs-reset m-grid-row ">
            <!-- Student Form -->
            <div class="m-grid-col m-grid-col-center m-grid-col-middle login-container bs-reset  m-grid-col-12-sm">
                <div class="m-grid ">
                    <a href="<?=base_url()?>">
                        <img class=" mt-70 my-10-md height-100" src="<?php echo IMG; ?>site/xremo-logo-blue.svg">
                    </a>
                </div>
                <div class="login-content ">
                    <div class="portlet " id="studentContent">
                        <h1 class="font-weight-500 display-4 text-center mt-0 mb-70">Are you a student? </h1>
                        <a class="btn btn-md-darkblue btn-outline  btn-lg mb-60 mb-0-md" href="<?php echo base_url(); ?>signup#studentUser" id="studentRadio">Sign up as Student</a>
                    </div>

                    <div class="portlet" id="studentUser">
                        <div class="portlet-body">
                            <form method="POST" action="<?php echo base_url(); ?>site/user/student_signup_post" class="form-horizontal" id="studentUserForm">
                                <div class="form-body">
                                    <!-- Input : Fullname -->
                                    <div class="form-group form-md-line-input  mb-5 ">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="fullname" id="fullname_student" class="form-control " placeholder="Full Name" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('fullname'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Email -->
                                    <div class="form-group form-md-line-input mb-5 ">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-envelope-o"></i>
                                                <input type="email" name="email" id="email_student" class="form-control " placeholder="Email Address" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php $error_email = substr(form_error('email'),3);$error_email = substr($error_email,0,-4);echo $error_email ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Password -->
                                    <div class="form-group form-md-line-input  mb-5">
                                        <div class="col-md-8 col-md-offset-2  ">
                                            <div class="input-icon">
                                                <i class="fa fa-key"></i>
                                                <input type="password" name="password" id="password_student" class="pass-strength-student form-control" placeholder="Password" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('password'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Password -->
                                    <div class="form-group form-md-line-input  mb-5 password-strength-bar-student" id="password-strength-bar" style="display:none;">
                                        <div class="col-md-8 col-md-offset-2  ">
                                            <div class="progress progress-striped active mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                                    <span class="sr-only">0% CompletePoor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Confirm Password -->
                                    <div class="form-group form-md-line-input  mb-5">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-key"></i>
                                                <input type="password" name="confirm_password" id="confirm_password_student" class="form-control" placeholder="Confirm Password" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php $error_confirm_password = substr(form_error('confirm_password'),3);$error_confirm_password = substr($error_confirm_password,0,-4);echo $error_confirm_password ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkbox : I Agree -->
                                    <div class="form-group form-md-line-input  my-15">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="md-checkbox-list md-checkbox md-indigo-box">
                                                <!--<input type="checkbox" name="terms" id="checkbox16" class="md-check">-->
                                                <input type="checkbox" name="terms" id="checkboxregisterstudent" class="md-check" required>
                                                <label for="checkboxregisterstudent" class="ml-1">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> I agree with all the
                                                    <a href="<?=base_url()?>terms-of-use" target="_blank">terms of use </a> and
                                                    <a href="<?=base_url()?>privacy" target="_blank"> privacy policy</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button : Submit -->
                                    <div class="form-group mt-3 ">
                                        <div class="col-md-offset-2 col-md-8 ">
                                            <button type="submit" class="btn btn-block btn-md-orange">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
            <!-- Employer Form -->
            <div class="m-grid-col m-grid-col-center m-grid-col-middle login-container bs-reset md-darkblue m-grid-col-12-sm">
                <a href="<?=base_url()?>">
                    <img class="mt-70 my-10-md height-100" src="<?php echo IMG; ?>site/xremo-logo-white.svg">
                </a>
                <div class="login-content ">
                    <div class="portlet" id="employerContent">
                        <div class="portlet-body">
                            <h1 class="font-weight-500 display-4 md-white-text mt-0 text-center mb-70">Are you a employer? </h1>
                            <a class="btn btn-md-white btn-outline btn-lg" id="employerRadio" href="<?php echo base_url(); ?>signup#employerUser">
                                Sign up as Employer</a>
                        </div>

                    </div>
                    <!-- Form User : Employer -->
                    <div class="portlet" id="employerUser">
                        <div class="portlet-body md-white-text">
                            <form method="POST" action="<?php echo base_url(); ?>site/user/employer_signup_post" class="form-horizontal" id="employerUserForm">
                                <div class="form-body">
                                    <!-- Input : Company Name -->
                                    <div class="form-group form-md-line-input  mb-5 ">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-building-o"></i>
                                                <input type="text" name="company_name" id="company_name_employer" class="form-control md-white-text " placeholder="Company Name">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('company_name'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Fullname -->
                                    <div class="form-group form-md-line-input  mb-5 ">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input name="fullname" id="fullname_employer" type="text" class="form-control md-white-text " placeholder="Full Name">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('fullname'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Email -->
                                    <div class="form-group form-md-line-input mb-5 ">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-envelope-o"></i>
                                                <input name="email" id="email_employer" type="email" class="form-control md-white-text " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php $error_email = substr(form_error('email'),3);$error_email = substr($error_email,0,-4);echo $error_email ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Password -->
                                    <div class="form-group form-md-line-input  mb-5">
                                        <div class="col-md-8 col-md-offset-2  ">
                                            <div class="input-icon">
                                                <i class="fa fa-key"></i>
                                                <input name="password" id="password_employer" type="password" class="pass-strength-employer form-control  md-white-text" placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('password'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input : Password -->
                                    <div class="form-group form-md-line-input  mb-5 password-strength-bar-employer" style="display:none;">
                                        <div class="col-md-8 col-md-offset-2  ">

                                            <div class="progress progress-striped active mb-0">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                                    <span class="sr-only">0% CompletePoor</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Input : Confirm Password -->
                                    <div class="form-group form-md-line-input  mb-5">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="input-icon">
                                                <i class="fa fa-key"></i>
                                                <input name="confirm_password" id="confirm_password_employer" type="password" class="form-control md-white-text" placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger">
                                                    <?php echo form_error('confirm_password'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkbox : I Agree -->
                                    <div class="form-group form-md-line-input  my-10">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <div class="md-checkbox-list md-checkbox md-orange-checkbox md-white-text">
                                                <!--<input type="checkbox" name="terms" id="checkbox16" class="md-check">-->
                                                <input type="checkbox" name="terms" id="checkboxemployer" class="md-check" required>
                                                <label for="checkboxemployer" class="ml-1 md-white-text">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> I agree with all the
                                                    <a href="<?=base_url()?>terms-of-use" target="_blank" class="md-white-text">terms of use </a> and
                                                    <a href="<?=base_url()?>privacy" target="_blank" class="md-white-text"> privacy policy</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button : Submit -->
                                    <div class="form-group mt-3 ">
                                        <div class="col-md-offset-2 col-md-8 ">
                                            <button type="submit" class="btn btn-block  btn-md-orange">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="login-footer ">
                    <div class="row bs-reset">
                        <div class="m-grid ">
                            <div class="m-grid-col m-grid-col-middle m-grid-col-center font-white">
                                Already have an account ?
                                <a href="<?php echo base_url(); ?>login" class="md-orange-text"> Sign In </a>
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
    <!-- RAdio Button -->
    <script>
        $(document).ready(function () {

            // by default
            $("#studentContent").show();
            $("#studentUser").hide();
            $("#employerUser").hide();

            $("#studentRadio").click(function () {
                $("#studentContent").hide();
                $("#studentUser").show();
                $("#employerContent").show();
                $("#employerUser").hide();
            });

            $("#employerRadio").click(function () {
                $("#employerContent").hide();
                $("#employerUser").show();
                $("#studentContent").show();
                $("#studentUser").hide();
            });

            $("#studentUser button").click(function (argument) {
                alertify.dismissAll();
                alertify.set('notifier', 'position', 'bottom-left');

                var error = false;
                if ($("#studentUser #fullname_student").val() == "") {
                    alertify.error('Please fill in your full name', 'error', 5);
                    error = true;
                }

                if ($("#studentUser #email_student").val() == "") {
                    alertify.error('Please fill in your email address', 'error', 5);
                    error = true;
                }

                if ($("#studentUser #password_student").val() == "") {
                    alertify.error('Please fill in your password', 'error', 5);
                    error = true;
                }

                if ($("#studentUser #confirm_password_student").val() == "") {
                    alertify.error('Please fill in your confirm password', 'error', 5);
                    error = true;
                }

                if ($("#studentUser #password_student").val() != $(
                        "#studentUser #confirm_password_student").val()) {
                    alertify.error('Your password and confirm password did not same', 'error',
                        5);
                    error = true;
                }

                if ($('#studentUser #checkboxregisterstudent').prop('checked') === false) {
                    alertify.error('Please check agree term of use and privacy policy', 'error',
                        5);
                    error = true;
                }

                if (error) {
                    return false;
                }

            });

            // Jobseeker
            $("#jobseekerRadio").click(function () {
                $("#jobseekerContent").show();
                $("#studentContent").hide();
                $("#employerContent").hide();

                $("#jobseekerUserForm")[0].reset();
                $(".password-strength-bar-student").hide();
                $(".password-strength-bar-employer").hide();
                $(".password-strength-bar-jobseeker").hide();

                if ($('#jobseekerRadio').prop('checked') === false) {
                    $('#jobseekerContent').hide();
                }
            });

            $("#jobseekerUser button").click(function (argument) {
                if ($("#jobseekerUser #password_jobseeker").val() != $(
                        "#jobseekerUser #confirm_password_jobseeker").val()) {
                    alertify.error('Your password and confirm password did not same', 'error',
                        5);
                }

                if ($('#jobseekerUser #checkboxregisterjobseeker').prop('checked') === false) {
                    alertify.error('Please check agree term of use and privacy policy', 'error',
                        5);
                }

                if (error) {
                    return false;
                }
            });

            // Employer
            $("#employerRadio").click(function () {

                $("#employerUserForm")[0].reset();
                $(".password-strength-bar-student").hide();
                $(".password-strength-bar-employer").hide();
                $(".password-strength-bar-jobseeker").hide();

                if ($('#employerRadio').prop('checked') === false) {
                    $('#employerContent').hide();
                }
            });

            $("#employerUser button").click(function (argument) {
                alertify.dismissAll();
                alertify.set('notifier', 'position', 'bottom-left');

                var error = false;
                if ($("#employerUser #company_name_employer").val() == "") {
                    alertify.error('Please fill in your company name', 'error', 5);
                    error = true;
                }

                if ($("#employerUser #fullname_employer").val() == "") {
                    alertify.error('Please fill in your full name', 'error', 5);
                    error = true;
                }

                if ($("#employerUser #email_employer").val() == "") {
                    alertify.error('Please fill in your email address', 'error', 5);
                    error = true;
                }

                if ($("#employerUser #password_employer").val() == "") {
                    alertify.error('Please fill in your password', 'error', 5);
                    error = true;
                }

                if ($("#employerUser #confirm_password_employer").val() == "") {
                    alertify.error('Please fill in your confirm password', 'error', 5);
                    error = true;
                }

                if ($("#employerUser #password_employer").val() != $(
                        "#employerUser #confirm_password_employer").val()) {
                    alertify.error('Your password and confirm password did not same', 'error',
                        5);
                    error = true;
                }

                if ($('#employerUser #checkboxemployer').prop('checked') === false) {
                    alertify.error('Please check agree term of use and privacy policy', 'error',
                        5);
                    error = true;
                }

                if (error) {
                    return false;
                }
            });
        });

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
