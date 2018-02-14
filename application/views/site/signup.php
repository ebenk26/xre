<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Xremo - Sign Up</title>
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

    <style type="text/css">
        .progress-bar {
          text-align: center;
          height: 1.5em;
          width: 100%;
          -webkit-appearance: none;
          border: none;
          
          /* Set the progressbar to relative */
          position:relative;
        }
        .progress-bar:before {
          content: attr(data-label);
          font-size: 0.8em;
          vertical-align: 0;
          
          /*Position text over the progress bar */
          position:absolute;
          left:0;
          right:0;
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
        .ajs-message{
            color: #FFFFFF;
        }
    </style>
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
                        <a href="<?=base_url()?>"><img class="login-logo" src="<?php echo base_url(); ?>assets/img/site/xremo-logo-blue.png" style="height:68px;"></a>
                    </div>
                </div>
                <div class="login-content portlet">
                    <div class="portlet portlet-body text-center">
                        <h4 class="font-weight-500 md-grey-text text-darken-2 mb-2 text-uppercase">Signup </h4>
                        <p class="lead mb-2 font-20-xs">Select your user account to proceed</p>
                        <div class="clearfix"></div>
                        <!-- Button Toggle : Select User -->
                        <div class="btn-group mb-3" data-toggle="buttons">
                            <a class="btn btn-outline-md-indigo active px-4 " href="<?php echo base_url(); ?>site/user/signup#studentUser" data-toggle="tab" id="studentRadio">
                                <input type="radio"> Student</a>
                            <!--<a class="btn btn-circle btn-outline-md-indigo px-4" href="<?php echo base_url(); ?>site/user/signup#jobseekerUser" data-toggle="tab" id="jobseekerRadio">
                                <input type="radio"> Jobseeker</a>-->
                            <a class="btn btn-outline-md-indigo px-4 " href="<?php echo base_url(); ?>site/user/signup#employerUser" data-toggle="tab" id="employerRadio"> 
                                <input type="radio"> Employer </a>
                        </div>
                        <!-- Tab Content : Form Signup User  -->
                        <div class="tab-content">
                            <!-- Form User : Student -->
                            <div class="tab-pane active" id="studentUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/student_signup_post" class="form-horizontal" id="studentUserForm">
                                    <div class="form-body">
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="text" name="fullname" id="fullname_student" class="form-control " placeholder="Full Name" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="email" name="email" id="email_student" class="form-control " placeholder="Email Address" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php $error_email = substr(form_error('email'),3);$error_email = substr($error_email,0,-4);echo $error_email ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input type="password" name="password" id="password_student" class="pass-strength-student form-control" placeholder="Password" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1 password-strength-bar-student" id="password-strength-bar" style="display:none;">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <div class="progress progress-striped active mb-0">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                                    <span class="sr-only">0% CompletePoor</span>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="password" name="confirm_password" id="confirm_password_student" class="form-control" placeholder="Confirm Password" required>
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php $error_confirm_password = substr(form_error('confirm_password'),3);$error_confirm_password = substr($error_confirm_password,0,-4);echo $error_confirm_password ?></span>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-3">
                                            <div class="col-md-9 col-md-offset-2 ">
												<div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <!--<input type="checkbox" name="terms" id="checkbox16" class="md-check">-->
													<input type="checkbox" name="terms" id="checkboxregisterstudent" class="md-check" required>
                                                    <label for="checkboxregisterstudent" class="pl-1">
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
                                                <button type="submit" class="btn btn-block btn-md-indigo">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Form User : Jobseeker -->
                            <div class="tab-pane " id="jobseekerUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/jobseeker_signup_post" class="form-horizontal" id="jobseekerUserForm">
                                    <div class="form-body">
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="fullname" id="fullname_jobseeker" type="text" class="form-control " placeholder="FullName">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="email" id="email_jobseeker" type="email" class="form-control " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input name="password" id="password_jobseeker" type="password" class="pass-strength-jobseeker form-control " placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1 password-strength-bar-jobseeker" style="display:none;">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <div class="progress progress-striped active mb-0">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                                    <span class="sr-only">0% CompletePoor</span>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="confirm_password" id="confirm_password_jobseeker" type="password" class="form-control " placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-3">
                                            <div class="col-md-9 col-md-offset-2 ">
												<div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <!--<input type="checkbox" name="terms" id="checkbox16" class="md-check">-->
													<input type="checkbox" name="terms" id="checkboxregisterjobseeker" class="md-check" required>
                                                    <label for="checkboxregisterjobseeker" class="pl-1">
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
                                                <button type="submit" class="btn btn-block btn-md-indigo">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Form User : Employer -->
                            <div class="tab-pane " id="employerUser">
                                <form method="POST" action="<?php echo base_url(); ?>site/user/employer_signup_post" class="form-horizontal" id="employerUserForm">
                                    <div class="form-body">
                                        <!-- Input : Company Name -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input type="text" name="company_name" id="company_name_employer" class="form-control " placeholder="Company Name">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('company_name'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Fullname -->
                                        <div class="form-group form-md-line-input  mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="fullname" id="fullname_employer" type="text" class="form-control " placeholder="Full Name">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('fullname'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Email -->
                                        <div class="form-group form-md-line-input mb-1 ">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="email" id="email_employer" type="email" class="form-control " placeholder="Email Address">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php $error_email = substr(form_error('email'),3);$error_email = substr($error_email,0,-4);echo $error_email ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <input name="password" id="password_employer" type="password" class="pass-strength-employer form-control " placeholder="Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Input : Password -->
                                        <div class="form-group form-md-line-input  mb-1 password-strength-bar-employer" style="display:none;">
                                            <div class="col-md-8 col-md-offset-2  ">
                                                <div class="progress progress-striped active mb-0">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                                    <span class="sr-only">0% CompletePoor</span>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input : Confirm Password -->
                                        <div class="form-group form-md-line-input  mb-1">
                                            <div class="col-md-8 col-md-offset-2 ">
                                                <input name="confirm_password" id="confirm_password_employer" type="password" class="form-control " placeholder="Confirm Password">
                                                <div class="form-control-focus"> </div>
                                                <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                            </div>
                                        </div>
                                        <!-- Checkbox : I Agree -->
                                        <div class="form-group form-md-line-input  my-2">
                                            <div class="col-md-9 col-md-offset-2 ">
												<div class="md-checkbox-list md-checkbox md-indigo-box">
                                                    <!--<input type="checkbox" name="terms" id="checkbox16" class="md-check">-->
													<input type="checkbox" name="terms" id="checkboxemployer" class="md-check" required>
                                                    <label for="checkboxemployer" class="pl-1">
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
                                Already have an account ?<a href="<?php echo base_url(); ?>login"> Sign In </a>
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
                                <h1 class="font-weight-500 display-3">Student Feature </h1>
                                <p class="md-white-text font-18"> Xremo empowers students in pitching and exploring themselves with convenient digital resume & video CVs to enhance the career matching to the correct one. It boosts the relevancy and generates sensational values to both students. </p>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="font-weight-600">Feature</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Digital Resume
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Video Resume
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Rating , Endorsement & Review
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Gallery
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> And many more ...
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="m-grid m-grid-full-height md-indigo login-bg" id="jobseekerContent">
                        <div class="m-grid-col m-grid-col-middle  font-white">
                            <div class="portlet portlet-body px-7">
                                <h1 class="font-weight-500 display-3">Jobseeker Feature </h1>
                                <p class="md-white-text font-18">Xremo empowers jobseekers in pitching and exploring themselves with convenient digital resume & video CVs to enhance the career matching to the correct one. It boosts the relevancy and generates sensational values to both students. </p>
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="font-weight-600">Feature</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Digital Resume
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Video Resume
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Rating , Endorsement & Review
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Gallery
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> And many more ...
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="m-grid m-grid-full-height md-indigo login-bg" id="employerContent">
                        <div class="m-grid-col m-grid-col-middle  font-white">
                            <div class="portlet portlet-body px-7">
                                <h1 class="font-weight-500 display-3">Employer Feature </h1>
                                <p class="md-white-text font-18">Xremo is one of the first few, if not first to use the Video Resume at such a wide scale. Xremo prides itself in being dynamic and cutting edge by providing you the newest tools at an arm's length and we will continue on providing new ways in solving the problem of Internship, Career Seeking and Talent Recruitment. </p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Easy to access digital resume
                                    </li>

                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Candidates video resume
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Interview arrangement & schedule systems
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> Resume Search
                                    </li>
                                    <li>
                                        <i class="fa fa-caret-right md-orange-text"></i> And many more ...
                                    </li>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PASSWORD STRENGTH SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/js/pass-strength.js" type="text/javascript"></script>
    <!-- END PASSWORD STRENGTH SCRIPTS -->
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

                $("#studentUserForm")[0].reset();
                $(".password-strength-bar-student").hide();
                $(".password-strength-bar-employer").hide();
                $(".password-strength-bar-jobseeker").hide();
            });

            $("#studentUser button").click(function(argument)
            {
                alertify.dismissAll();
                alertify.set('notifier','position', 'bottom-left');
                
                var error = false;
                if($("#studentUser #fullname_student").val() == "")
                {
                    alertify.error('Please fill in your full name', 'error', 5);
                    error = true;
                }

                if($("#studentUser #email_student").val() == "")
                {
                    alertify.error('Please fill in your email address', 'error', 5);
                    error = true;
                }

                if($("#studentUser #password_student").val() == "")
                {
                    alertify.error('Please fill in your password', 'error', 5);
                    error = true;
                }

                if($("#studentUser #confirm_password_student").val() == "")
                {
                    alertify.error('Please fill in your confirm password', 'error', 5);
                    error = true;
                }

                if($("#studentUser #password_student").val() != $("#studentUser #confirm_password_student").val())
                {
                    alertify.error('Your password and confirm password did not same', 'error', 5);
                    error = true;
                }

                if($('#studentUser #checkboxregisterstudent').prop('checked') === false)
                {
                    alertify.error('Please check agree term of use and privacy policy', 'error', 5);
                    error = true;
                }

                if(error){
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

            $("#jobseekerUser button").click(function(argument)
            {
                if($("#jobseekerUser #password_jobseeker").val() != $("#jobseekerUser #confirm_password_jobseeker").val())
                {
                    alertify.error('Your password and confirm password did not same', 'error', 5);
                }

                if($('#jobseekerUser #checkboxregisterjobseeker').prop('checked') === false)
                {
                    alertify.error('Please check agree term of use and privacy policy', 'error', 5);
                }

                if(error){
                    return false;
                }
            });
            
            // Employer
            $("#employerRadio").click(function () {
                $("#employerContent").show();
                $("#studentContent").hide();
                $("#jobseekerContent").hide();

                $("#employerUserForm")[0].reset();
                $(".password-strength-bar-student").hide();
                $(".password-strength-bar-employer").hide();
                $(".password-strength-bar-jobseeker").hide();

                if ($('#employerRadio').prop('checked') === false) {
                    $('#employerContent').hide();
                }
            });

            $("#employerUser button").click(function(argument)
            {
                alertify.dismissAll();
                alertify.set('notifier','position', 'bottom-left');

                var error = false;
                if($("#employerUser #company_name_employer").val() == "")
                {
                    alertify.error('Please fill in your company name', 'error', 5);
                    error = true;
                }

                if($("#employerUser #fullname_employer").val() == "")
                {
                    alertify.error('Please fill in your full name', 'error', 5);
                    error = true;
                }

                if($("#employerUser #email_employer").val() == "")
                {
                    alertify.error('Please fill in your email address', 'error', 5);
                    error = true;
                }

                if($("#employerUser #password_employer").val() == "")
                {
                    alertify.error('Please fill in your password', 'error', 5);
                    error = true;
                }

                if($("#employerUser #confirm_password_employer").val() == "")
                {
                    alertify.error('Please fill in your confirm password', 'error', 5);
                    error = true;
                }

                if($("#employerUser #password_employer").val() != $("#employerUser #confirm_password_employer").val())
                {
                    alertify.error('Your password and confirm password did not same', 'error', 5);
                    error = true;
                }

                if($('#employerUser #checkboxemployer').prop('checked') === false)
                {
                    alertify.error('Please check agree term of use and privacy policy', 'error', 5);
                    error = true;
                }

                if(error){
                    return false;
                }
            });
        });
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