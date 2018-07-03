<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=$page_title.docx");    
?>
<!-- NOTE : NEED TO manage it margin to none when print -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Print-v5 </title>

    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">    

    <!-- GLobal -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.min.css" id="style_components">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../custom_pages/favicon.ico" type="image/x-icon">

</head>

<body>
<section class="page-resume">
        <div class="m-grid m-grid-full-height ">
            <!-- Education > Experience > Skill -->
            <div class="m-grid-col-xs-8 m-grid-col p-25">
                <!-- # Profile -->
                <div class="m-grid mb-5">
                    <!-- Title -->
                    <div class="m-grid title-resume ">
                        <div class="m-grid-col m-grid-col-xs-2 width-10-percent m-grid-col-middle ">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                        <div class="m-grid-col  m-grid-col-middle m-grid-col-center width-auto">
                            <h6 class="text-uppercase font-15 letter-space-xs mx-10">
                                About Me
                            </h6>
                        </div>
                        <div class="m-grid-col m-grid-col-xs-8 m-grid-col-middle ">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                    </div>
                    <!-- Content -->
                    <p class=" font-12 md-grey-darken-3-text text-justify p-5 mb-5">Currently managing two brands under the same management. Experienced Marketing Manager with a demonstrated history of working in the telecommunications industry. Skilled in Strategic Brand Positioning, Creative Concept Design, Campaign Management, Brand Management, and Business (Marketing) Strategy. Strong marketing professional graduated from In-House Multimedia College and further my study at INTI International University.</p>
                </div>

                <!-- # Education -->
                <div class="m-grid mb-5">
                    <div class="m-grid-col">
                        <!-- Title -->
                        <div class="m-grid title-resume ">
                            <div class="m-grid-col m-grid-col-xs-1 width-10-percent m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                            <div class="m-grid-col  m-grid-col-middle m-grid-col-center width-auto">
                                <h6 class="text-uppercase font-15 letter-space-xs">
                                    Education
                                </h6>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-8 m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                        </div>
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5 px-5">
                            <li class="m-grid">
                                <div class="m-grid-col">
                                    <div class="media">
                                        <div class="pull-right">
                                            <!-- @ATTR : End Date/Present  - Start Date -->
                                            <p class="font-12 line-height-exs font-weight-400 md-grey-darken-2-text mt-5 mb-0 ">Feb 2015 - Feb 2013</p>
                                        </div>
                                        <div class="media-body">
                                            <!-- @ ATTR : Qualifications Level | Course Name -->
                                            <h5 class="font-13 mb-5 md-grey-darken-3-text">Diploma
                                                <span class="md-grey-darken-1-text"> | </span>
                                                <b>Art / Design / Creative Multimedia</b>
                                            </h5>
                                            <!-- @ ATTR: Institution Name -->
                                            <h6 class=" font-12 md-grey-darken-3-text font-weight-400 mb-5">INTI International University</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-grid">
                                <div class="m-grid-col">
                                    <div class="media">
                                        <div class="pull-right">
                                            <p class="font-12 line-height-exs font-weight-400 md-grey-darken-2-text mt-5 mb-0 ">Feb 2002 - Feb 1998 </p>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="font-13 mb-5 md-grey-darken-3-text">Diploma
                                                <span class="md-grey-darken-1-text"> | </span>
                                                <b>Art / Design / Creative Multimedia</b>
                                            </h5>
                                            <h6 class=" font-12 md-grey-darken-3-text font-weight-400 mb-5">In-House Multimedia Training College

                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- # Experience -->
                <div class="m-grid mb-5">
                    <div class="m-grid-col">
                        <!-- Heading  -->
                        <div class="m-grid title-resume mt-5">
                            <div class="m-grid-col m-grid-col-xs-1 width-10-percent m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                            <div class="m-grid-col  m-grid-col-middle m-grid-col-center width-auto">
                                <h6 class="text-uppercase font-15 letter-space-xs">
                                    Experience
                                </h6>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-8 m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                        </div>
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5 px-5">
                            <li>
                                <!-- @ATTR : Job Position Title | Company Name -->
                                <h5 class="font-13 mb-5  ">Marketing Manager |
                                    <b>Elabram Systems Sdn Bhd</b>
                                </h5>
                                <!-- @ATTR : End Date - Start Date -->
                                <p class="font-12 line-height-sm md-grey-darken-2-text mb-5 ">Present - Jan 2015</p>
                                <!-- @ATTR : Description -->
                                <p class="font-12 mb-5 line-height-sm text-justify md-grey-darken-3-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem esse repudiandae eligendi minima! Iure perspiciatis iusto non unde hic qui nostrum dicta ab beatae placeat aspernatur, fugit sed corrupti rerum.</p>
                            </li>
                            <li>
                                <h5 class="font-13 mb-5   ">Marketing Management Consultant |
                                    <b>Business Owner</b>
                                </h5>
                                <p class="font-12 md-grey-darken-2-text mb-5 line-height-sm ">Jan 2012 - Jan 2015</p>
                                <p class="font-12 line-height-sm text-justify md-grey-darken-3-text mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem esse repudiandae eligendi minima! Iure perspiciatis iusto non unde hic qui nostrum dicta ab beatae placeat aspernatur, fugit sed corrupti rerum.</p>
                            </li>
                            <li>
                                <h5 class="font-13 mb-5  ">Art Director + Asst Brand ManagerJob Position |
                                    <b>Bonia Bhd</b>
                                </h5>
                                <p class="font-12 line-height-sm md-grey-darken-2-text mb-5 ">Dec 2005 - Jun 2008</p>
                                <p class="font-12 line-height-sm text-justify md-grey-darken-3-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem esse repudiandae eligendi minima! Iure perspiciatis iusto non unde hic qui nostrum dicta ab beatae placeat aspernatur, fugit sed corrupti rerum.</p>
                            </li>
                            <li>
                                <h5 class="font-13 mb-5  ">Visual Merchandise / Graphic Designer |
                                    <b>OSIM (M) Sdn Bhd </b>
                                </h5>
                                <p class="font-12 line-height-sm md-grey-darken-2-text mb-5 ">May 2002 - Oct 2005</p>
                                <p class="font-12 line-height-sm text-justify md-grey-darken-3-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem esse repudiandae eligendi minima! Iure perspiciatis iusto non unde hic qui nostrum dicta ab beatae placeat aspernatur, fugit sed corrupti rerum.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- # Extracurricular Activit -->
                <div class="m-grid mb-5">
                    <div class="m-grid-col">
                        <!-- Title -->
                        <div class="m-grid title-resume">
                            <div class="m-grid-col m-grid-col-xs-1 width-10-percent m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                            <div class="m-grid-col  m-grid-col-middle m-grid-col-center width-auto">
                                <h6 class="text-uppercase font-15 letter-space-xs">
                                    Extracurricular Activity
                                </h6>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-5 m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                        </div>
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5 px-5">
                            <li>
                                <div class="media">
                                    <div class="pull-right">
                                        <p class="font-12 line-height-exs md-grey-darken-2-text  mt-5 mb-0 ">Jan 2013 - Jan 2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-13 mb-0  ">Event Title </h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="pull-right">
                                        <p class="font-12 line-height-exs md-grey-darken-2-text  mt-5 mb-0 ">Jan 2013 - Jan 2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-13 mb-0  ">Event Title </h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="pull-right">
                                        <p class="font-12 line-height-exs md-grey-darken-2-text  mt-5 mb-0 ">Jan 2013 - Jan 2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-13 mb-0">Event Title </h5>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="pull-right">
                                        <p class="font-12 line-height-exs md-grey-darken-2-text  mt-5 mb-0 ">Jan 2013 - Jan 2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="font-13 mb-0  ">Event Title </h5>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- # Skill -->
                <div class="m-grid mb-5">
                    <div class="m-grid-col">
                        <!-- Title -->
                        <div class="m-grid title-resume">
                            <div class="m-grid-col m-grid-col-xs-1 width-10-percent m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                            <div class="m-grid-col  m-grid-col-middle m-grid-col-center m-grid-col-xs-2">
                                <h6 class="text-uppercase font-15 letter-space-xs ">
                                    Skill
                                </h6>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-10 m-grid-col-middle ">
                                <hr class="mt-0 mb-10 border-mdo-black-v5">
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="row px-5">
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Brand Management</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Campaign Management</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Business (Marketing) Strategy </p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Chanel Management</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Budgeting and Planning</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Graphic Design</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Marketing Communications </p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>Business Development </p>
                            </div>
                            <div class="col-xs-6">
                                <p class="font-12 mb-5 md-grey-darken-3-text">
                                    <i class="fa fa-caret-right fa-fw"></i>International Businessskill 1</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Image > Name  > Profile > Contact  > Language > Reference-->
            <div class="m-grid-col-xs-4 m-grid-col md-light-blue-light p-25">

                <!-- # Profile Image -->
                <div class="m-grid ">
                    <div class="m-grid-col m-grid-col-center m-grid-col-middle  ">
                        <img src="../../assets/pages/img/avatars/team1.jpg" alt="" class="avatar-large avatar avatar-circle">
                    </div>
                </div>

                <!-- # FullName -->
                <div class="m-grid py-20 ">
                    <div class="m-grid-col m-grid-col-center">
                        <h4 class="text-uppercase mb-0 font-20">Nur Atikah Amira Binti Mohd Zain</h4>
                    </div>
                </div>

                <!-- # Contact -->
                <div class="m-grid py-5">
                    <!-- Title -->
                    <div class="m-grid">
                        <div class="m-grid-col width-10-percent m-grid-col-middle ">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-center width-auto">
                            <h6 class="text-uppercase font-15 letter-space-xs mx-5">
                                Contact
                            </h6>
                        </div>
                        <div class="m-grid-col m-grid-col-middle width-50-percent">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                    </div>

                    <!-- Content -->
                    <ul class="list-unstyled px-5 mt-ul-li-tb-3">
                        <!-- @ATTR : Phone Number -->
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-xs-1  m-grid-col-middle">
                                <i class="fa fa-phone md-grey-darken-3-text font-14"></i>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-11 pl-15 m-grid-col-middle">
                                <p class="mb-0 font-12 md-grey-darken-3-text">+60126307780</p>
                            </div>
                        </li>
                        <!-- @ATTR : Email Address -->
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-middle">
                                <i class="fa fa-envelope-o md-grey-darken-3-text font-14"></i>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-11 pl-15 m-grid-col-middle">
                                <p class="mb-0 font-12 text-break md-grey-darken-3-text">qunn1818@yahoo.com
                                </p>
                            </div>
                        </li>
                        <!-- @ATTR : Location -->
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-middle">
                                <i class="fa fa-map-marker md-grey-darken-3-text font-14"></i>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-11 pl-15 m-grid-col-middle ">
                                <p class="mb-0 font-12 text-break md-grey-darken-3-text">Seremban, Negeri Sembilan </p>
                            </div>
                        </li>
                        <!-- Link  -->
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-xs-1  m-grid-col-middle">
                                <i class="fa fa-chain font-14 md-grey-darken-3-text"></i>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-11 pl-15 m-grid-col-middle">
                                <p class="mb-0 text-break font-12 md-grey-darken-3-text">https://xremo.com/profile/user/MTA1NQ</p>
                            </div>
                        </li>
                    </ul>

                </div>

                <!-- Language -->
                <div class="m-grid py-5 ">
                    <!-- Title -->
                    <div class="m-grid">
                        <div class="m-grid-col width-10-percent m-grid-col-middle ">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-center width-auto">
                            <h6 class="text-uppercase font-15 letter-space-xs mx-5">
                                Language
                            </h6>
                        </div>
                        <div class="m-grid-col width-50-percent m-grid-col-middle ">
                            <hr class="mt-0 mb-10  border-mdo-black-v5">
                        </div>
                    </div>
                    <!-- Content -->

                    <ul class="list-unstyled mt-ul-li-tb-5 px-5">
                        <li>
                            <h6 class="mb-5 font-13 letter-space-xxs">Malay</h6>
                            <p class="mb-0 font-12 md-grey-darken-3-text "> Spoken
                                <i class="fa fa-caret-right"></i> Intermediate</p>
                            <p class="mb-0 font-12 md-grey-darken-3-text"> Written
                                <i class="fa fa-caret-right"></i> Beginner</p>
                        </li>
                        <li>
                            <h6 class="mb-5 font-13 letter-space-xxs">Chinese</h6>
                            <p class="mb-0 font-12 md-grey-darken-3-text "> Spoken
                                <i class="fa fa-caret-right"></i> Expert</p>
                            <p class="mb-0 font-12 md-grey-darken-3-text"> Written
                                <i class="fa fa-caret-right"></i> Beginner</p>
                        </li>
                        <li>
                            <h6 class="mb-0 font-13 letter-space-xxs">English</h6>
                            <p class="mb-0 font-12 md-grey-darken-3-text "> Spoken
                                <i class="fa fa-caret-right"></i> Intermediate</p>
                            <p class="mb-5 font-12 md-grey-darken-3-text"> Written
                                <i class="fa fa-caret-right"></i> Intermediate</p>
                        </li>
                    </ul>
                </div>

                <!-- Reference  -->
                <div class="m-grid py-5 ">
                    <!-- Title -->
                    <div class="m-grid">
                        <div class="m-grid-col  width-10-percent m-grid-col-middle ">
                            <hr class="mt-0 mb-10 border-mdo-black-v5">
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-center width-auto">
                            <h6 class="text-uppercase font-15 letter-space-xs mx-5">
                                Reference
                            </h6>
                        </div>
                        <div class="m-grid-col m-grid-col-middle width-50-percent ">
                            <hr class="mt-0 mb-10  border-mdo-black-v5 ">
                        </div>
                    </div>
                    <!-- Content -->
                    <ul class="list-unstyled mt-ul-li-tb-5 px-5">
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-middle ">
                                <h6 class="md-darkblue-text font-13 mb-5">Roy Goh |
                                    <span class="mdo-black-v8-text font-13 letter-space-xxs mb-5 font-weight-400">Former Peer</span>
                                </h6>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-phone mr-5"></i>+6012 213 6043 </p>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-envelope mr-5"></i>clark-lidgren@gmail.com </p>
                            </div>

                        </li>
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-middle py-5 ">
                                <h6 class="md-darkblue-text font-13 mb-5">James Wu |
                                    <span class="mdo-black-v8-text font-13 letter-space-xxs mb-5 font-weight-400">Former Peer</span>
                                </h6>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-phone mr-5"></i>+6012 213 6043 </p>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-envelope mr-5"></i>clark-lidgren@gmail.com </p>
                            </div>
                        </li>
                        <li class="m-grid">
                            <div class="m-grid-col m-grid-col-middle ">
                                <h6 class="md-darkblue-text font-13 mb-5">Clark Lindgren |
                                    <span class="mdo-black-v8-text font-13 letter-space-xxs mb-5 font-weight-400">Manager</span>
                                </h6>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-phone mr-5"></i>0123456789 </p>
                                <p class="mdo-black-v8-text font-12 letter-space-xxs mb-5">
                                    <i class="fa fa-envelope mr-5"></i>clark-lidgren@gmail.com </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>
</body>

</html>
