<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Xremo - Sign Up</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="author">

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
    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="https://xremo.github.io/XremoFrontEnd/custom_pages/favicon.ico">
</head>

<body class="login">

    <div class="user-login-5">
        <div class="row bs-reset ">
            <!-- col-form -->
            <div class="col-md-6 login-container bs-reset">
                <div class="m-grid ">
                    <div class="m-grid-col  m-grid-col-center ">
                        <img class="login-logo" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.png" style="height:68px;">
                    </div>
                </div>
                <div class="login-content portlet">
                    <div class="portlet portlet-body text-center">
                        <h4 class="font-weight-500 md-grey-text text-darken-2 mb-2 text-uppercase">Signup </h4>
                        <p class="lead mb-2 font-20-xs">Select your user account to proceed</p>
                        <div class="clearfix"></div>
                        <!-- Button Toggle : Select User -->
                        <div class="btn-group mb-3" data-toggle="buttons">
                            <a class="btn btn-circle btn-outline-md-indigo active px-4 " href="<?php echo base_url(); ?>site/user/signup#studentUser" data-toggle="tab" id="studentRadio">
                                <input type="radio"> Student</a>
                            <a class="btn btn-circle btn-outline-md-indigo px-4" href="<?php echo base_url(); ?>site/user/signup#jobseekerUser" data-toggle="tab" id="jobseekerRadio">
                                <input type="radio"> Jobseeker</a>
                            <a class="btn btn-outline-md-indigo btn-circle px-4 " href="<?php echo base_url(); ?>site/user/signup#employerUser" data-toggle="tab" id="employerRadio"> 
                                <input type="radio"> Employer </a>
                        </div>
                        <!-- Tab Content : Form Signup User  -->
                        <div class="tab-content">
                            <!-- Form User : Student -->
                            <div class="tab-pane active" id="studentUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/student_signup_post" class="form-horizontal">
                                    <div class="form-body">
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="text" name="fullname" class="form-control " placeholder="FullName">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="email" name="email" class="form-control " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input type="password" name="password" class="form-control " placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="password" name="confirm_password" class="form-control " placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-3">
                                            <div class="col-md-8 col-md-offset-2 ">

                                                <div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <input type="checkbox" name="terms" id="checkbox16" class="md-check">
                                                    <label for="checkbox16" class="pl-1">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> 
                                                    I agreee with all the <a href="<?php echo base_url(); ?>site/user/signup#">terms and conditions</a>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button : Submit -->
                                        <div class="form-group mt-3 ">
                                            <div class="col-md-offset-2 col-md-8 ">
                                                <button type="submit" class="btn btn-block btn-md-indigo">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Form User : Jobseeker -->
                            <div class="tab-pane " id="jobseekerUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/jobseeker_signup_post" class="form-horizontal">
                                    <div class="form-body">
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="fullname" type="text" class="form-control " placeholder="FullName">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="email" type="email" class="form-control " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input name="password" type="password" class="form-control " placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="confirm_password" type="password" class="form-control " placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-3">
                                            <div class="col-md-8 col-md-offset-2 ">

                                                <div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <input type="checkbox" id="checkbox16" name="terms" class="md-check">
                                                    <label for="checkbox16" class="pl-1">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box "></span> I agreee with all the <a href="<?php echo base_url(); ?>site/user/signup#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button : Submit -->
                                        <div class="form-group mt-3 ">
                                            <div class="col-md-offset-2 col-md-8 ">
                                                <button type="submit" class="btn btn-block btn-md-indigo">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Form User : Employer -->
                            <div class="tab-pane " id="employerUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/employer_signup_post" class="form-horizontal">
                                    <div class="form-body">
                                        <!-- Input : Company Name -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="text" name="company_name" class="form-control " placeholder="Company Name">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="fullname" type="text" class="form-control " placeholder="FullName">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="email" type="email" class="form-control " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input name="password" type="password" class="form-control " placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="confirm_password" type="password" class="form-control " placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-2">
                                            <div class="col-md-8 col-md-offset-2 ">

                                                <div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <input type="checkbox" id="checkbox16" name="terms" class="md-check">
                                                    <label for="checkbox16" class="pl-1">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box "></span> I agreee with all the <a href="<?php echo base_url(); ?>site/user/signup#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button : Submit -->
                                        <div class="form-group mt-3 ">
                                            <div class="col-md-offset-2 col-md-8 ">
                                                <button type="submit" class="btn btn-block btn-md-indigo">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="m-grid">
                            <div class="m-grid-col m-grid-col-middle m-grid-col-center ">
                                Already have an account ?<a href="<?php echo base_url(); ?>site/user/login"> Sign In </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col-bg-color-indigo  -->
            <div class="col-md-6 bs-reset">
                <div class="tab-content">

                    <div class="m-grid m-grid-full-height md-indigo login-bg" id="studentContent">
                        <div class="m-grid-col m-grid-col-middle  font-white">
                            <div class="portlet portlet-body px-7">
                                <h1 class="font-weight-500 display-3 ">Student Feature </h1>
                                <p class="md-white-text font-18"> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam
                                    erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="m-grid m-grid-full-height md-indigo login-bg" id="jobseekerContent" style="display: none;">
                        <div class="m-grid-col m-grid-col-middle  font-white">
                            <div class="portlet portlet-body px-7">
                                <h1 class="font-weight-500 display-3 ">Jobseeker Feature </h1>
                                <p class="md-white-text font-18"> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam
                                    erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="m-grid m-grid-full-height md-indigo login-bg" id="employerContent" style="display: none;">
                        <div class="m-grid-col m-grid-col-middle  font-white">
                            <div class="portlet portlet-body px-7">
                                <h1 class="font-weight-500 display-3 ">Employer Feature </h1>
                                <p class="md-white-text font-18"> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam
                                    erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                    <li><i class="fa fa-caret-right md-orange-text"></i>Lorem ipsum dolor sit amet, coectetuer
                                        adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum
                                        dolor sit amet, coectetuer adipiscing. </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


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
    <!-- RAdio Button -->
    <script>
        $(document).ready(function () {

            // by default
            $("#studentContent").show();
            $("#jobseekerContent").hide();
            $("#employerContent").hide();

            // Student
            $("#studentRadio").click(function () {
                $("#studentContent").show();
                $("#jobseekerContent").hide();
                $("#employerContent").hide();
            });
            $("#studentRadio").click(function () {
                if ($('#studentRadio').prop('checked') === false) {
                    $('#studentContent').hide();
                }
            });
            // Jobseeker
            $("#jobseekerRadio").click(function () {
                $("#jobseekerContent").show();
                $("#studentContent").hide();
                $("#employerContent").hide();
            });
            $("#jobseekerRadio").click(function () {
                if ($('#jobseekerRadio').prop('checked') === false) {
                    $('#jobseekerContent').hide();
                }
            });
            // Employer
            $("#employerRadio").click(function () {
                $("#employerContent").show();
                $("#studentContent").hide();
                $("#jobseekerContent").hide();
            });
            $("#employerRadio").click(function () {
                if ($('#employerRadio').prop('checked') === false) {
                    $('#employerContent').hide();
                }
            });
        });
    </script>


</body></html>