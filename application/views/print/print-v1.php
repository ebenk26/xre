<!-- NOTE : NEED TO manage it margin to none when print -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Print-v1 </title>

    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">    
        
    <!-- GLobal -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.min.css"> -->

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="../custom_pages/favicon.ico" type="image/x-icon"> -->

</head>

<body>
<section class="page-resume">
        <div class="m-grid m-grid-full-height ">
            <div class="m-grid-row">
                <div class="m-grid-col m-grid-col-xs-4 m-grid-col-center p-20 md-darkblue full-height-content height-100-percent">

                    <!-- # PROFILE IMAGE -->
                    <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-medium avatar-circle mb-15 " alt="">

                    <!-- # FULL NAME -->
                    <h5 class="text-uppercase font-17 md-amber-text letter-space-xs mt-15 "><?= !empty($candidate['overview']['name']) ? $candidate['overview']['name'] : 'N/A'?></h5>
                    <hr class="border-dash border-mdo-white-v8 my-15">

                    <!-- # CONTACT -->
                    <div class="portlet portlet-body mb-15 ">
                        <ul class="list-unstyled px-5 ">
                            <!-- Phone -->
                            <li class="m-grid">
                                <div class="m-grid-col-xs-2 m-grid-col">
                                    <i class="fa fa-phone md-amber-text "></i>
                                </div>
                                <div class="m-grid-col-xs-10 m-grid-col">
                                    <small class="mdo-white-v8-text font-12"><?= !empty($candidate['overview']['student_bios_contact_number']) ? $candidate['overview']['student_bios_contact_number'] : 'N/A'; ?></small>
                                </div>
                            </li>

                            <!-- Email -->
                            <li class="m-grid">
                                <div class="m-grid-col-xs-2 m-grid-col">
                                    <i class="fa fa-envelope md-amber-text"></i>
                                </div>
                                <div class="m-grid-col-xs-10 m-grid-col">
                                    <small class="mdo-white-v8-text font-12 text-break"><?= !empty($candidate['overview']['email']) ? $candidate['overview']['email'] : 'N/A'; ?></small>
                                </div>
                            </li>

                            <!-- location -->
                            <!-- Please put city and state -->
                            <li class="m-grid">
                                <div class="m-grid-col-xs-2 m-grid-col">
                                    <i class="fa fa-map-marker md-amber-text "></i>
                                </div>
                                <div class="m-grid-col-xs-10 m-grid-col">
                                    <small class="mdo-white-v8-text text-break font-12"><?= !empty($candidate['address']['states']) ? $candidate['address']['states'] : 'N/A'; ?>, <?= !empty($candidate['address']['city']) ? $candidate['address']['city'] : 'N/A'; ?></small>
                                </div>
                            </li>

                            <!-- Link -->
                            <!-- Please extract link to user digital resume based from our site -->
                            <li class="m-grid">
                                <div class="m-grid-col-xs-2 m-grid-col">
                                    <i class="fa fa-link md-amber-text"></i>
                                </div>
                                <div class="m-grid-col-xs-10 m-grid-col">
                                    <small class="mdo-white-v8-text text-break font-12"><?= $candidate['link']; ?></small>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- # LANGUAGE -->
                    <div class="portlet portlet-body text-left mb-15">
                        <!-- Title -->
                        <h6 class=" text-uppercase font-15 md-amber-text mb-0 letter-space-xs title-resume">Language</h6>
                        <hr class="border-dash border-mdo-white-v8 my-15">
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-4 px-5">
                            <?php if (!empty($candidate['language'])) {
                             foreach ($candidate['language'] as $value) {?>
                                <li>
                                    <h6 class="md-amber-text font-13 mb-5"><?= $value['title'];?></h6>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Spoken
                                        <i class="fa fa-caret-right"></i> <?= $value['spoken'];?> </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5">Written
                                        <i class="fa fa-caret-right"></i> <?= $value['written'];?> </p>
                                </li>
                            <?php }} ?>
                        </ul>
                    </div>

                    <!-- # SKILL -->
                    <div class="portlet portlet-body text-left mb-15">
                        <!-- Title -->
                        <h6 class=" text-uppercase font-15 md-amber-text mb-0 letter-space-xs title-resume">Projects & Skill</h6>
                        <hr class="border-dash border-mdo-white-v8 my-15 ">
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-2 ">
                            <?php foreach ($candidate['projects'] as $key => $value): ?>
                                <li>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-0 "> <i class="fa fa-caret-right md-amber-text "></i><?= $value['name'];?> - <?= $value['skills_acquired'];?></p>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <!-- # REFERENCES -->
                    <div class="portlet portlet-body text-left mb-0">
                        <!-- Title -->
                        <h6 class="text-uppercase font-15 md-amber-text letter-space-xs title-resume">References</h6>
                        <hr class="border-dash border-mdo-white-v8 my-15">
                        <!-- 
                            CONTENT
                            Note : Attribute involve is Name of Referer , Relationship , Contact No , Email Address  
                            IF "Email Address " do not exist or null , hide it from resume
                        -->
                        <ul class="list-unstyled mt-ul-li-tb-4 px-5">
                            <?php foreach ($candidate['reference'] as $key => $value): ?>
                                <li>
                                    <h6 class="md-amber-text font-13 my-5"><?= !empty($value['reference_name']) ? $value['reference_name'] : 'N/A'; ?></h6>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"><?= !empty($value['reference_relationship']) ? $value['reference_relationship'] : 'N/A'; ?></p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> <?= !empty($value['reference_phone']) ? $value['reference_phone'] : 'N/A'; ?> </p>
                                    <p class="mdo-white-v7-text font-12 letter-space-xxs mb-5"> <?= !empty($value['reference_email']) ? $value['reference_email'] : 'N/A'; ?> </p>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

                <div class="m-grid-col m-grid-col-xs-8 p-20">
                    <!-- # About Me @ Profile-->
                    <div class="row no-space mt-0 mb-15">
                        <!-- Title -->
                        <div class="m-grid title-resume mt-0">
                            <hr class="border-mdo-amber-v7 mb-10 mt-0">
                            <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">About Me</h6>
                            <hr class="border-mdo-amber-v7 mt-10 mb-0">
                        </div>
                        <!-- Description -->
                        <p class="font-12 text-justify line-height-sm md-grey-darken-4-text mt-10 px-5"><?= !empty($candidate['overview']['summary']) ? $candidate['overview']['summary'] : 'N/A' ;?></p>
                    </div>

                    <!-- # Education -->
                    <!-- Note arrangement of each point is the latest one on top -->
                    <!-- Limit 4 [Select latest one on top] -->
                    <div class="row no-space mb-15">
                        <!-- Title -->
                        <div class="m-grid title-resume ">
                            <hr class="border-mdo-amber-v7 mb-10 mt-0">
                            <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Education</h6>
                            <hr class="border-mdo-amber-v7 mt-10 mb-0">
                        </div>
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5 mt-10 px-5">
                            <?php foreach ($candidate['academics'] as $key => $value): ?>
                                <li class="m-grid ">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text"> 
                                            <?php if ($value['start_date'] == '0000-00-00') {
                                                    echo 'Present';
                                                }else{ 

                                                    echo date('Y', strtotime($value['start_date'])); 

                                                }  ?>
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            <?php if ($value['end_date'] == '0000-00-00') {
                                                    echo 'Present';
                                                }else{ 

                                                    echo date('Y', strtotime($value['end_date'])); 

                                                }  ?>
                                        </small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-14 mb-5  md-darkblue-text"><?= !empty($value['degree_name']) ? $value['degree_name'] : 'N/A' ?></h5>
                                        <h6 class="mb-0 font-13 md-grey-darken-3-text font-weight-400"><?= !empty($value['university_name']) ? $value['university_name'] : 'N/A' ?></h6>
                                    </div>
                                </li>                                
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <!-- # Experience -->
                    <!-- Note arrangement of each point is the latest one on top -->
                    <div class="row no-space mb-15">
                        <!-- Title -->
                        <div class="m-grid  title-resume">
                            <hr class="border-mdo-amber-v7 mb-10 mt-0">
                            <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Experience</h6>
                            <hr class="border-mdo-amber-v7 mt-10 mb-0">
                        </div>

                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5  mt-10 px-5">
                            <?php foreach ($candidate['experiences'] as $key => $value): ?>
                                <li class="m-grid">
                                    <!-- END Date Joined - START Date Joined -->
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <!-- @ ATTR : Display Month and Year  -->
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">
                                            <?php if ($value['start_date'] == '0000-00-00') {
                                                    echo 'Present';
                                                }else{ 

                                                    echo date('Y', strtotime($value['start_date'])); 

                                                }  ?>
                                            <span class="height-10 mt-display-block">
                                                <i class="fa fa-minus font-12"></i>
                                            </span>
                                            <?php if ($value['end_date'] == '0000-00-00') {
                                                    echo 'Present';
                                                }else{ 

                                                    echo date('Y', strtotime($value['end_date'])); 

                                                }  ?>
                                        </small>
                                    </div>
                                    <!-- Content -->
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10 ">
                                        <!-- @ ATTR : Job Position Title -->
                                        <h5 class="font-14 mb-5 md-darkblue-text "><?= !empty($candidate['experiences']['experiences_title']) ? $candidate['experiences']['experiences_title'] : 'N/A'?></h5>
                                        <!-- @ ATTR : Company Name -->
                                        <h6 class="mb-5 font-13 font-weight-400 md-grey-darken-3-text">
                                            <i><?= !empty($candidate['experiences']['experiences_company_name']) ? $candidate['experiences']['experiences_company_name'] : 'N/A'?></i>
                                        </h6>
                                        <!-- @ ATTR : Description -->
                                        <p class="font-12 line-height-sm mb-0 text-justify">
                                            <?= !empty($candidate['experiences']['experiences_description']) ? $candidate['experiences']['experiences_description'] : 'N/A'?>
                                        </p>

                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <!-- # Non Education [Optional] -->
                    <!-- Note arrangement of each point is the latest one on top -->
                    <div class="row no-space  ">
                        <!-- Title -->
                        <div class="m-grid title-resume">
                            <hr class="border-mdo-amber-v7 mt-0 mb-10">
                            <h6 class=" text-uppercase font-15 md-darkblue-text font-weight-700 text-center letter-space-sm mb-0">Extracurricular Activity</h6>
                            <hr class="border-mdo-amber-v7 mt-10 mb-0">
                        </div>
                        <!-- Content -->
                        <ul class="list-unstyled mt-ul-li-tb-5  mt-10 px-5">
                        <?php foreach ($candidate['achievement'] as $key => $value): ?>
                                <li class="m-grid">
                                    <div class="m-grid-col m-grid-col-xs-3 m-grid-col-center m-grid-col-middle border-right border-medium p-10  border-mdo-grey-v3 md-blue-light">
                                        <small class="font-12 line-height-exs font-weight-600 mdo-darkblue-v7-text">
                                        <?php if ($value['achievement_start_date'] == '0000-00-00') {
                                                    echo 'Present';
                                                }else{ 

                                                    echo date('Y', strtotime($value['start_date'])); 

                                                }  ?></small>
                                    </div>
                                    <div class="m-grid-col m-grid-col-xs-9 m-grid-col-middle p-10">
                                        <h5 class="font-13 my-0"><?= !empty($value['achievement_title']) ? $value['achievement_title'] : 'N/A'?></h5>
                                    </div>
                                </li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
