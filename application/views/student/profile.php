<div class="page-content-wrapper">
    <div class="page-content">

        <!-- Page Header -->
        <div class="portlet mb-0 md-shadow-none ">
            <div class="portlet light md-transparent  p-0">
                <div class="portlet-title tabbable-line tab-md-indigo py-0 mb-0 border-md-blue-grey">
                    <div class="caption">
                        <span class="caption-subject font-weight-300 text-capitalize font-26">User Profile</span>
                    </div>
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs mb-0 pb-0">
                        <?php
							$tab_student = $this->session->flashdata('tab_student');
						?>
                            <li class="<?=$tab_student =='tab_overview' || $tab_student =='' ?'active':'' ?>">
                                <a href="<?php echo base_url(); ?>student/profile#tab_overview" data-toggle="tab">
                                    <i class="icon-user font-22"></i> Overview</a>
                            </li>
                            <li class="<?=$tab_student == " tab_education "?"active ":" "?>">
                                <a href="<?php echo base_url(); ?>student/profile#tab_education" data-toggle="tab">
                                    <i class="icon-graduation font-22"></i>Education </a>
                            </li>
                            <li class="<?=$tab_student == " tab_experience "?"active ":" "?>">
                                <a href="<?php echo base_url(); ?>student/profile#tab_experience" data-toggle="tab">
                                    <i class="icon-briefcase font-22"></i>Experience</a>
                            </li>
                            <li class="<?=$tab_student == " tab_non_education "?"active ":" "?>">
                                <a href="<?php echo base_url(); ?>student/profile#tab_non_education" data-toggle="tab">
                                    <i class="icon-notebook font-22"></i>Non Education</a>
                            </li>
                            <li class="<?=$tab_student == " tab_project "?"active ":" "?>">
                                <a href="<?php echo base_url(); ?>student/profile#tab_project" data-toggle="tab">
                                    <i class="icon-badge font-22"></i>Skills</a>
                            </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="portlet mt-0 ">
            <div class="tab-content">

                <!-- Tab Content : Overview -->
                <div class="tab-pane <?=$tab_student =='tab_overview' || $tab_student == '' ?'active':' '?>" id="tab_overview">
                    <!-- HEADER Image -->
                    <div class="view height-300 " style="background:url(' <?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'33.jpg'; ?>') center center no-repeat">
                        <div class="mask hm-darkblue-v7 ">
                            <a href="<?php
                                    $id = $this->session->userdata('id');
                                    $id_encoded = rtrim(base64_encode($id), '=');
                                 echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank" class="btn btn-md-orange pull-right m-20 letter-space-xs">
                                View My Resume </a>
                        </div>
                    </div>
                    <div class="portlet light">
                        <!--  Brief you whole profile -->
                        <div class="m-grid m-grid-col m-grid-col-center m-grid-responsive-xs">
                            <div class="m-grid-col m-grid-col-sm-3"></div>
                            <!-- CONTENT -->
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-6 m-grid-col-xs-12">
                                <div class="mt-element-card-v2 ">
                                    <div class="mt-card-item p-0">
                                        <!-- Avatar -->
                                        <div class="mt-card-avatar text-center p-0">
                                            <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG.'site/profile-pic.png'; ?>" class="avatar avatar-circle avatar-large mt-o-170">
                                        </div>
                                        <div class="mt-card-content  ">
                                            <!--  Full name   -->
                                            <h3 class="mt-card-name mt-15 md-indigo-text">
                                                <?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?>
                                            </h3>
                                            <!-- Role / Location / DOB -->
                                            <ul class="list-inline list-unstyled">
                                                <!-- User Role -->
                                                <!-- No need to put empty states because the role had been assign from the moment user signup -->
                                                <li class="font-17">
                                                    <i class="icon-briefcase mr-5"></i>
                                                    <?php echo  !empty($user_profile['overview']['student_bios_occupation']) ?  ucfirst($user_profile['overview']['student_bios_occupation']) : 'Student';?>
                                                </li>

                                                <!-- Location [State , Country] -->
                                                <?php if(!empty($user_profile['address']['city']) || ($user_profile['address']['country']) ){?>
                                                <li class="font-17">
                                                    <i class="icon-pointer"></i>
                                                    <?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : $this->session->userdata['country'];?>
                                                    <?php if(!empty($user_profile['address']['city'])){?> ,
                                                    <?php }?>
                                                    <?php echo ucfirst($user_profile['address']['country']);?>
                                                </li>
                                                <?php }?>

                                                <!-- Date of Birth -->
                                                <?php if(!empty($user_profile['overview']['student_bios_DOB'])){?>
                                                <li class="font-17">
                                                    <i class="icon-calendar"></i>
                                                    <?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : "DOB not set";?>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            <!-- Quote -->

                                            <p class="mt-card-desc mt-40">
                                                <?php echo !empty($user_profile['overview']['quote']) ? '<i class="fa fa-quote-left font-12 vertical-top mr-5"></i> '.$user_profile['overview']['quote'].' <i class="fa fa-quote-right vertical-top font-12 ml-5"></i>' : '';?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Show sm above [Button]-->
                            <div class="m-grid-col m-grid-col-sm-3 m-grid-col-middle m-grid-col-right pr-20 hidden-xs">
                                <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-outline btn-md-indigo ">
                                    <i class="icon-pencil mr-5"></i>Edit</a>
                            </div>
                            <!-- Hide Sm Above but show when sm below -->
                            <div class="m-grid-col m-grid-col-xs-12 visible-xs">
                                <div class="btn-group btn-group-justified px-10 mb-0 ">
                                    <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-outline btn-md-indigo">
                                        <i class="icon-pencil"></i> Edit</a>
                                    <a href="<?php echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank" class="btn btn-md-indigo  btn-outline letter-space-xs"> View My resume </a>
                                </div>

                            </div>
                        </div>
                        <hr class="mt-5-sm mt-0">
                        <!-- About myself -->
                        <div class="m-grid m-grid-col m-grid-col-center">
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1"></div>
                            <!-- content -->
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-10 m-grid-col-xs-10">
                                <div class="m-grid">
                                    <div class="m-grid-col">
                                        <h5 class="font-weight-700 text-uppercase letter-space-sm font-19">About Myself</h5>
                                        <hr class="hor-divider-solid-medium border-mdo-orange-v7 width-60 my-0">
                                        <p>
                                            <?php echo !empty($user_profile['overview']['summary']) ? $user_profile['overview']['summary'] : 'I am a good candidate';?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1 "></div>
                        </div>
                        <!-- Profile Information -->
                        <div class="m-grid m-grid-col m-grid-col-center mt-40 pb-100">
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1"></div>
                            <div class="m-grid-col  m-grid-col-sm-10 m-grid-col-xs-10">
                                <h5 class="font-weight-700 text-uppercase letter-space-sm font-19">Personal information</h5>
                                <hr class="hor-divider-solid-medium border-mdo-orange-v7 width-60 mt-0 mb-10 ">
                                <div class="m-grid m-grid-responsive-xs">
                                    <!-- Col 1 -->
                                    <div class="m-grid-col m-grid-col-sm-6  m-grid-col-xs-12">
                                        <!-- Full Name -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Full Name</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Preferences Name -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class=" font-weight-600 md-indigo-text">Preferences Name</h5>
                                                <h5 class=" roboto-font ">
                                                    <?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : ucfirst($this->session->userdata('name'));?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Gender -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Gender</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_gender']) ? $user_profile['overview']['student_bios_gender'] : '<i class="font-weight-300 md-grey-lighten-1-text"> I prefer not to say </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- DOB -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Date Of Birth</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_DOB']) ?  date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i> ';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Video Link -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Video Resume</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Salary Expectation -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Salary Expectation</h5>
                                                <h5 class="roboto-font">
                                                    <!-- If not empty this will show -->
                                                    <?php if(!empty($user_profile['overview']['expected_salary'])){?>
                                                    <?php echo $this->session->userdata('forex'); ?>
                                                    <?php }?>

                                                    <!-- Default -->
                                                    <?php echo !empty($user_profile['overview']['expected_salary']) ? $user_profile['overview']['expected_salary'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>

                                                    <!-- If not empty this will show -->
                                                    <?php if(!empty($user_profile['overview']['expected_salary'])){?> .00
                                                    <?php }?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Language Preferences -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text ">Language Preferences</h5>
                                                <?php if (!empty($user_profile['language'])) {?>
                                                <?php foreach ($user_profile['language'] as $key => $lang) {?>
                                                <!-- Language Ttle -->
                                                <h5 class="roboto-font font-weight-500 mb-0 letter-space-xs mt-30">
                                                    <?php echo !empty($lang['title']) ?  $lang['title'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                                <hr class="hor-divider-solid-medium border-mdo-orange-v5 width-40 my-10">
                                                <h5 class="mt-0 mb-10 roboto-font "> <b class="font-weight-400">Written </b> :
                                                    <?php echo $lang['written']; ?> Level </h5>
                                                <h5 class="mt-0 mb-0 roboto-font"> <b class="font-weight-400"> Spoken </b> :
                                                    <?php echo $lang['spoken']; ?> Level </h5>

                                                <?php } ?>
                                                <?php } else{ ?>
                                                <h5>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                                </h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Col 2 -->
                                    <div class="m-grid-col m-grid-col-sm-6 p-10 m-grid-col-xs-12">
                                        <!-- Email -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Email</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo $this->session->userdata('email');?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Contact Number -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="mb-10 font-weight-600 md-indigo-text">Contact Number</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? $user_profile['overview']['student_bios_contact_number'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Street -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Street</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Postcode -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">Postcode</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                            <div class="m-grid-col">
                                                <h5 class="mb-10 font-weight-600 md-indigo-text"> City</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['city']) ? $user_profile['address']['city'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>' ;?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- State / Country -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">State</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['states']) ? $user_profile['address']['states'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>' ;?>
                                                </h5>
                                            </div>
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text"> Country</h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['country']) ? $user_profile['address']['country'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>

                                        <!-- Reference -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class=" font-weight-600 md-indigo-text">References</h5>
                                                <ul class="list-unstyled">
                                                    <?php 
                                                        if(!empty($user_profile['reference'])){
                                                        foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                                                    ?>
                                                    <li class="mb-30">
                                                        <h5 class=" roboto-font font-weight-500">
                                                            <?=$reference_value['reference_name']?>
                                                        </h5>
                                                        <h5 class="roboto-font font-15"><b class="font-weight-400 "> Email </b> :
                                                            <?=$reference_value['reference_email'] != ""?$reference_value['reference_email']:"-"?>
                                                        </h5>
                                                        <h5 class="font-weight-400 roboto-font"><b class="font-weight-400 "> Phone No.</b> :
                                                            <?=$reference_value['reference_phone'] != ""?$reference_value['reference_phone']:"-"?>
                                                        </h5>
                                                        <h5 class=" font-weight-400 roboto-font"><b class="font-weight-400 "> Relationships </b>:
                                                            <?=$reference_value['reference_relationship'] != ""?$reference_value['reference_relationship']:"-"?>
                                                        </h5>
                                                    </li>
                                                    <?php }}
                                                     else{ ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1"> </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content :Education -->
                <div class="tab-pane <?=$tab_student =='tab_education'?'active':' '?>" id="tab_education">
                    <div class="portlet light  ">
                        <div class="portlet-title ">
                            <div class="caption ">
                                <i class="icon-graduation font-17"></i>
                                <span class="caption-subject font-weight-500 roboto-font "> Education</span>
                                <span class="caption-helper"> list out your previous education</span>
                            </div>
                            <!-- Modal Add education -->
                            <div class="actions">
                                <?php if (!empty($user_profile['academics'])){ ?>
                                <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md-indigo px-60 btn-add-edu">
                                    <i class="fa fa-plus  "></i> Add </a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- IF NOT EMPTY -->
                        <?php if (!empty($user_profile['academics'])): ?>
                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php $i=1; foreach($user_profile['academics'] as $value){ ?>
                                <li class="list-group-item ">
                                    <!-- Education Content -->
                                    <div class="media">
                                        <div class="media-body">
                                            <!-- 'Qualifications Level' in 'Field Study' -->
                                            <h4 class="font-weight-600 letter-space-xs font-20">
                                                <?php echo ucfirst($value['qualification_level']); ?> in
                                                <?php echo ucfirst($value['degree_name']);?>
                                            </h4>
                                            <!-- Institution Name -->
                                            <h5 class="font-weight-500 font-18  ">
                                                <i class="fa fa-institution"></i>
                                                <?php echo ucfirst($value['university_name']); ?>
                                            </h5>
                                            <!-- Start & End Date -->
                                            <h5 class="font-weight-400 roboto-font md-grey-darken-2-text font-15">
                                                <i class="fa fa-calendar"></i>
                                                <?php echo date('d F Y', strtotime($value['start_date']));?> -
                                                <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));?>
                                            </h5>
                                            <!-- Description  -->
                                            <?php if (!empty($value['degree_description'])){ ?>
                                            <hr class="hor-divider-solid-medium width-100 border-md-amber mt-0 mb-10">
                                            <p class=" multiline-truncate my-20">
                                                <?//=strip_tags($value['degree_description']); ?>
                                                    <?=ucfirst($value['degree_description']);?>
                                            </p>
                                            <?php } ?>
                                        </div>
                                        <!-- Button -->
                                        <div class="media-right media-middle ">
                                            <!-- Edit Button -->
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_education_<?php echo $value['academic_id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only btn-edit-edu mb-20" id="academic-btn" edu-val="<?php echo $value['academic_id'];?>">
                                                <i class="icon-pencil" data-toggle="tooltip" title="edit"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" tb-val="academics" data-value="<?php echo $value['academic_id'];?>">
                                                <i class="icon-trash" data-toggle="tooltip" title="delete"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Modal : Edit Education -->
                                    <div class="modal fade in" id="modal_edit_education_<?php echo $value['academic_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light portlet-fit fade-in-up">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Education</span>
                                                    </div>
                                                    <div class="actions py-20">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                </div>
                                                <form action="<?php echo base_url();?>student/profile/edit_education" method="POST" class="form">
                                                    <input type="hidden" name="academic_id" value="<?php echo $value['academic_id'];?>"></input>
                                                    <div class="modal-body portlet-body form-horizontal ">
                                                        <!-- Institution Name -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Institution Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="University of Malaya" name="university_name" value="<?php echo ucfirst($value['university_name']); ?>" required>
                                                            </div>

                                                        </div>

                                                        <!-- Qualifications Level -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Qualifications Level </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="Bachelor&#39;s Degree" name="qualification_level" value="<?php echo ucfirst($value['qualification_level']); ?>" required>
                                                            </div>
                                                        </div>

                                                        <!-- Field Of Study-->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Field Of Study</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="Software Engineering" name="field_of_study" value="<?php echo ucfirst($value['degree_name']); ?>" required>
                                                            </div>
                                                        </div>

                                                        <!-- TIme Period  -->
                                                        <!-- BUG : FIx End Date input disable if checkbox check -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time Period</label>
                                                            <div class="col-md-9  ">
                                                                <div class="m-grid ">
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker date-picker-start " size="16" type="text" value="<?php echo date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" id="StartDate1" name="from" required>
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                        <span class="help-block"> to </span>
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? ' ' : date('d-m-Y', strtotime($value['end_date'])); ?>" id="EndDate1" placeholder="End Year" name="until" required>
                                                                        <span class="help-block md-checkbox has-warning">
                                                                            <input type="checkbox" class="md-check" id="md-check-edu-end_<?php echo $i;?>" name="current_date" <?php echo ($value[ 'end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                            <label for="md-check-edu-end_<?php echo $i;?>">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span> Currently still studying?
                                                                            </label>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="4" placeholder="Brief about your studying place and what subject you had study." name="academics_description">
                                                                    <?php echo ucfirst($value['degree_description']); ?>
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" form-actions  modal-footer px-30 ">
                                                        <button type="submit" class="btn btn-md-indigo width-250 letter-space-xs">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; }  ?>
                            </ul>
                        </div>
                        <!-- Empty State -->
                        <?php else: ?>
                        <div class="portlet-body">
                            <div class="portlet md-grey-lighten-5 p-130 ">
                                <div class="portlet-body">
                                    <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                    <h5 class="font-grey-cascade mt-30 text-center">Click button below to add education information.</h5>
                                    <div class="width-500 center-block mt-40">
                                        <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block btn-add-edu">
                                            <i class="fa fa-plus  "></i> Add Education Info </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                </div>

                <!-- Tab Content : Experience -->
                <div class="tab-pane <?=$tab_student == 'tab_experience'?'active':''?>" id="tab_experience">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-briefcase"></i>
                                <span class="caption-subject font-weight-500  roboto-font ">Experience</span>
                                <span class="caption-helper"> list out all your previous working experience</span>
                            </div>
                            <div class="actions">
                                <?php if (!empty($user_profile['experiences'])){ ?>
                                <a href="#modal_add_experience" data-toggle="modal" class="btn btn-md-indigo  btn-add-exp px-60">
                                    <i class="fa fa-plus"></i> Add</a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- IF NOT EMPTY -->
                        <?php if (!empty($user_profile['experiences'])): ?>
                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php $i=1; foreach($user_profile['experiences'] as $value){  
                                $description = $value['experiences_description'];
                                $company_name = $value['experiences_company_name'];
                                ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <!-- Content -->
                                        <div class="media-body">
                                            <!-- Job Title -->
                                            <h4 class="font-weight-600 letter-space-xs mb-5 ">
                                                <?php echo ucfirst($value['experiences_title']);?>
                                            </h4>
                                            <!-- Company Name -->
                                            <h5 class="font-weight-400 font-18">
                                                <i class="fa fa-building-o mr-5"></i>
                                                <?php echo ucfirst($value['experiences_company_name']);?>
                                            </h5>
                                            <!-- Start & End Date -->
                                            <h5 class="font-weight-400 roboto-font md-grey-darken-2-text font-15">
                                                <i class="fa fa-calendar mr-5"></i>
                                                <?php echo date('d F Y', strtotime($value['experiences_start_date']));?> -
                                                <?php echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['experiences_end_date']));?>
                                            </h5>
                                            <!-- Company Industry / Employement type -->
                                            <h6>
                                                <?php if (!empty($value['employement_type'])){ ?>
                                                <span class="badge badge-roundless badge-primary letter-space-xs font-weight-500">
                                                    <i class="fa fa-briefcase"></i>
                                                    <?php echo !empty($value['employment_type']) ? $value['employment_type'] : 'Please Choose from the form'; ?>
                                                </span>
                                                <?php } ?>
                                                <?php if (!empty($value['industry_name'])){ ?>
                                                <span class="badge badge-roundless badge md-blue-grey badge-important letter-space-sm font-weight-500">
                                                    <i class="fa fa-industry"></i>
                                                    <?php echo !empty($value['industry_name']) ? $value['industry_name'] : 'Please Choose from the form'; ?>
                                                </span>
                                                <?php } ?>
                                            </h6>

                                            <?php if (!empty($value['experiences_description']) ||($value['skills']) ){ ?>
                                            <hr class="hor-divider-solid-medium width-100 border-md-amber my-10">
                                            <?php } ?>

                                            <!-- Description -->
                                            <?php if (!empty($value['experiences_description'])){ ?>
                                            <p class=" multiline-truncate mt-20">
                                                <?php echo ucfirst($value['experiences_description']);?>
                                            </p>
                                            <?php } ?>
                                            <!-- Skill Earned -->
                                            <?php if (!empty($value['skills'])){ ?>
                                            <p class="font-weight-600 mt-20  mb-10 text-uppercase font-15">Skill Earned</p>
                                            <ul class="list-unstyled list-inline mt-ul-li-lr-0 mx-0">
                                                <?php 
                                                    $tag = explode(',', $value['skills']);
                                                    $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                                    shuffle($label);
                                                    $i = 0;

                                                    foreach ($tag as $tag_key => $tag_value) { 
                                                        ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;
                                                ?>
                                                <li>
                                                    <p class="label <?php echo $label[$tag_key]; ?> label-sm">
                                                        <?php echo $tag_value; ?>
                                                    </p>
                                                </li>
                                                <?php $tag_key++; } ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        <!-- Button -->
                                        <div class="media-right my-20 ">
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_experience_<?php echo $value['experience_id']?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only  mb-20 ">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['experience_id'];?>" tb-val="experiences">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Modal : Edit Experience  -->
                                    <div class="modal fade in" id="modal_edit_experience_<?php echo $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light portlet-fit fade-in-up">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Experience</span>
                                                        <!-- <span class="caption-helper">add about your education info</span> -->
                                                    </div>
                                                    <div class="actions py-20">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>

                                                </div>
                                                <form action="<?php echo base_url();?>student/profile/edit_experience" method="POST" class="form form-horizontal">
                                                    <input type="hidden" name="experience_id" value="<?php echo $value['experience_id']?>"></input>
                                                    <div class="modal-body portlet-body ">
                                                        <!-- Job Post & Time Period -->
                                                        <div class="row ">
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">Job Title</label>
                                                                    <input type="text" class="form-control " name="title" placeholder="Internship in IT Dept" value="<?php echo ucfirst($value['experiences_title']);?>">
                                                                    <span class="help-block small"> Add your current status career info </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- TIme Period  -->
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">Time Period</label>

                                                                    <div class="m-grid ">
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-start " size="16" type="text" name="start_date" value="<?php echo date('d-m-Y', strtotime($value['experiences_start_date']));?>" placeholder="From year" id="StartDate3">
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                            <span class="help-block"> to </span>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-end date-picker-end-exp " size="16" type="text" name="end_date" value="<?php echo ($value['experiences_end_date'] == '0000-00-00')? " " : date('d-m-Y', strtotime($value['experiences_end_date'])); ?>" placeholder="End Year" id="EndDate3" required>
                                                                            <span class="help-block md-checkbox has-warning mb-0">
                                                                                <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value[ 'experiences_end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                                <label for="checkbox<?php echo $i; ?>">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    <small> Currently still working?</small>
                                                                                </label>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Job Post & Time Period -->
                                                        <div class="row ">
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">Company Name</label>
                                                                    <input type="text" class="form-control " placeholder="Company #1 Sdn Bhd" name="company_name" value="<?php echo !empty($value['experiences_company_name']) ? $value['experiences_company_name'] : ''?>">
                                                                    <!-- <span class="help-block small"> Add your current status career info </span> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Job Employement Type  / Industry -->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0 mb-0">
                                                                            <label class="control-label ">Employement Type</label>
                                                                            <select class="form-control" name="employment_type">
                                                                                <?php foreach ($employment_types as $key => $employment_types_value) {?>
                                                                                <option value="<?php echo !empty($employment_types_value['id']) ? $employment_types_value['id'] : ''?>" <?php echo $value[ 'employment_type_id']==$employment_types_value[ 'id'] ? 'selected' : '' ?>>
                                                                                    <?php echo !empty($employment_types_value['name']) ? $employment_types_value['name'] : ''?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block small"> Previous employement type </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0 mb-0">
                                                                            <label class="control-label ">Industry</label>
                                                                            <select class="form-control   " name="industry">
                                                                                <option value="" selected disabled>Company Industry </option>
                                                                                <?php foreach ($industries as $key => $industry_value) {?>
                                                                                <option value="<?php echo !empty($industry_value['id']) ? $industry_value['id'] : ''?>" <?php echo $value[ 'industries_id']==$industry_value[ 'id'] ? 'selected' : '' ?>>
                                                                                    <?php echo !empty($industry_value['name']) ? $industry_value['name'] : ''?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block small"> Add your company industries </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-md-6">
                                                                <!-- Description -->
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">Description</label>
                                                                    <textarea class="form-control autosizeme" rows="4" name="description" placeholder="Brief about your working place ...." data-autosize-on="true" style="overflow-y: visible; overflow-x: hidden; word-wrap: break-word; resize: horizontal;">
                                                                        <?php echo ucfirst($description);?>
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Skill Earned -->
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">Skill Earned</label>
                                                                    <input type="text" class="form-control input-xlarge" value="<?php echo !empty($value['skills']) ? $value['skills'] : '' ?>" data-role="tagsinput" name="skills">
                                                                    <span class="help-block small"> Press "Tab" to add tag </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; } ?>
                            </ul>
                        </div>
                        <!-- Empty State -->
                        <?php else: ?>
                        <div class="portlet-body">
                            <div class="portlet md-grey-lighten-5 p-130 ">
                                <div class="portlet-body">
                                    <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                    <h5 class="font-grey-cascade mt-30 text-center">Click button below to add experience information.</h5>
                                    <div class="width-500 center-block mt-40">
                                        <a href="<?php echo base_url();?>student/profile#modal_add_experience" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block btn-add-exp">
                                            <i class="fa fa-plus  "></i> Add Experience Info </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                </div>

                <!-- Tab Content : Achievements -->
                <div class="tab-pane <?=$tab_student == 'tab_non_education'?'active':' '?>" id="tab_non_education">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-notebook"></i>
                                <span class="caption-subject font-weight-500 roboto-font "> Non Education</span>
                                <span class="caption-helper"> list out all your previous non educational activity (join any colleage event ... or whatsoever)</span>
                            </div>
                            <div class="actions">
                                <?php if (!empty($user_profile['achievement'])){ ?>
                                <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md-indigo px-60 ">
                                    <i class="fa fa-plus"></i> Add</a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- If Not empty -->
                        <?php if (!empty($user_profile['achievement'])): ?>
                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php foreach($user_profile['achievement'] as $value){ ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <!-- Event -->
                                            <h4 class="font-weight-700 letter-space-xs ">
                                                <?php echo ucfirst($value['achievement_title']);?> </h4>

                                            <!-- Date -->
                                            <h5 class="font-weight-400 roboto-font md-grey-darken-2-text font-15">
                                                <i class="fa fa-calendar mr-5"></i>
                                                <?php echo date('d F Y', strtotime($value['achievement_start_date']));?> -
                                                <?php echo date('d F Y', strtotime($value['achievement_end_date']));?>
                                            </h5>

                                            <?php if (!empty($value['achievement_description']) || ($value['achievement_tag']) ){ ?>
                                            <hr class="hor-divider-solid-medium width-100 border-md-amber my-10">
                                            <?php } ?>

                                            <!-- Description -->
                                            <?php if (!empty($value['achievement_description'])){ ?>
                                            <p class="roboto-font mt-20 multiline-truncate">
                                                <?php echo ucfirst($value['achievement_description']);?>
                                            </p>
                                            <?php } ?>

                                            <!-- Tag -->
                                            <?php if (!empty($value['achievement_tag'])){ ?>
                                            <ul class="list-unstyled list-inline mx-0 mt-ul-li-lr-0 mt-20">
                                                <?php $tag = explode(',', $value['achievement_tag']);
                                                    $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                                    shuffle($label);
                                                    $i = 0;
                                                foreach ($tag as $tag_key => $tag_value) { ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;?>
                                                <li>
                                                    <span class="label <?php echo $label[$tag_key]; ?> label-sm mx-0">
                                                        <?php echo $tag_value; ?>
                                                    </span>
                                                </li>
                                                <?php $tag_key++; } ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        <div class="media-right my-20 ">
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_achievements_<?php echo $value['achievement_id']?>" class="btn btn-md-cyan btn-icon-only mb-20 " data-toggle="modal">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <a href="javascript:;" tb-val="achievement" data-value="<?php echo $value['achievement_id'];?>" class="btn btn-md-red btn-icon-only btn-delete mb-20">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Modal : Add / Edit Achievements  -->
                                    <div class="modal fade in" id="modal_edit_achievements_<?php echo $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light portlet-fit fade-in-up">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Non Education</span>
                                                    </div>
                                                    <div class="actions py-20">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                </div>

                                                <form action="<?php echo base_url();?>student/profile/edit_achievement" class="form form-horizontal" method="POST">
                                                    <input type="hidden" name="achievement_id" value="<?php echo $value['achievement_id'];?>"></input>
                                                    <div class="modal-body portlet-body ">
                                                        <!-- Institution Name [required]-->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " name="achievement_name" placeholder="Brain Challenge 2016" value="<?php echo !empty($value['achievement_title']) ? $value['achievement_title'] : ''; ?>" required>
                                                                <span class="help-block small">Event / Competition / Contest / Tournament you just joined </span>
                                                            </div>

                                                        </div>

                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control autosizeme" name="achievement_description" rows="4" placeholder="Brief about your studying place and what subject you had study.">
                                                                    <?php echo !empty($value['achievement_description']) ? $value['achievement_description'] : ''; ?>
                                                                </textarea>
                                                            </div>
                                                        </div>

                                                        <!-- TIme Period [REQUIRED] -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time Period</label>
                                                            <div class="col-md-9  ">
                                                                <div class="m-grid ">
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker-start" size="16" type="text" value="<?php echo !empty($value['achievement_start_date']) ? date('d-m-Y', strtotime($value['achievement_start_date'])) : date('d-m-Y') ;?>" name="start_date" id="StartDate2" placeholder="From year" required>
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                        <span class="help-block"> to </span>
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo !empty($value['achievement_end_date']) ? date('d-m-Y', strtotime($value['achievement_end_date'])) : date('d-m-Y') ;?>" name="end_date" id="EndDate2" placeholder="From year" required>
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- Tag -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tag</label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="tag" class="form-control input-large" value="<?php echo !empty($value['achievement_tag']) ? $value['achievement_tag'] : '';?>" data-role="tagsinput">
                                                                <span class="help-block small"> Press "Tab" to add tag </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Empty State -->
                        <?php else: ?>
                        <div class="portlet-body">
                            <div class="portlet md-grey-lighten-5 p-130 ">
                                <div class="portlet-body">
                                    <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                    <h5 class="font-grey-cascade mt-30 text-center">Click button below to add non education information.</h5>
                                    <div class="width-500 center-block mt-40">
                                        <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block">
                                            <i class="fa fa-plus  "></i> Add Non Education Info </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                </div>

                <!-- Tab Content : Project -->
                <div class="tab-pane <?=$tab_student == 'tab_project'?'active':' '?>" id='tab_project'>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-badge"></i>
                                <span class="caption-subject font-weight-500  roboto-font ">Skills</span>
                                <span class="caption-helper"> list out all your skill based by project</span>
                            </div>
                            <div class="actions">
                                <?php if (!empty($user_profile['projects'])){ ?>
                                <a href="#modal_add_project" data-toggle="modal" class="btn btn-md-indigo  px-60">
                                    <i class="fa fa-plus"></i> Add</a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if (!empty($user_profile['projects'])): ?>
                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php $i=1; foreach($user_profile['projects'] as $value){?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <!-- Content -->
                                        <div class="media-body">
                                            <!-- Project Name -->
                                            <h4 class="font-weight-700 letter-space-xs">
                                                <?php echo ucfirst($value['name']);?> </h4>

                                            <!-- Start / EndDate -->
                                            <h6 class="font-weight-400 roboto-font md-grey-darken-2-text font-15 ">
                                                <i class="fa fa-calendar mr-5"></i>
                                                <?php echo date('d F Y',strtotime($value['start_date'])); ?> -
                                                <?php echo ($value['end_date'] != '0000-00-00') ? date('d F Y',strtotime($value['start_date'])) : 'Now'; ?>
                                            </h6>

                                            <!-- DIVIDER only show when description or skill not empty -->
                                            <?php if (!empty($value['description']) || ($value['skills_acquired']) ){ ?>
                                            <hr class="hor-divider-solid-medium width-100 border-md-amber mt-0 mb-10">
                                            <?php } ?>

                                            <!-- Description -->
                                            <?php if (!empty($value['description'])){ ?>
                                            <p class="roboto-font mt-20 multiline-truncate">
                                                <?php echo ucfirst($value['description']);?>
                                            </p>
                                            <?php } ?>

                                            <!-- Skill  -->
                                            <?php if (!empty($value['skills_acquired'])){ ?>
                                            <p class="font-weight-600 mb-10 text-uppercase font-15 mt-20"> Skills Earned :</p>
                                            <ul class="list-inline list-unstyled mx-0 mt-ul-li-lr-0 ">
                                                <?php $tag = explode(',', $value['skills_acquired']);
                                                        $label = array("label-md-cyan","label-md-indigo","label-md-purple","label-md-orange","label-md-green");
                                                        shuffle($label);
                                                        foreach ($tag as $tag_key => $tag_value) { 
                                                                ($tag_key >= 5) ? $tag_key = 0: $tag_key = $tag_key;
                                                ?>
                                                <li>
                                                    <p class="label <?php echo $label[$tag_key]; ?> label-sm">
                                                        <?php echo $tag_value; ?>
                                                    </p>
                                                </li>

                                                <?php $tag_key ++;} ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        <!-- Button -->
                                        <div class="media-right media-middle my-20 ">
                                            <!-- Edit Button  -->
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_project_<?php echo $value['id'] ?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only mb-20">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete mb-20" data-value="<?php echo $value['id'];?>" tb-val="user_projects">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <!-- Modal : Edit Project -->
                                    <div class="modal fade in" id="modal_edit_project_<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light portlet-fit fade-in-up">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Project </span>
                                                        <span class="caption-helper">add about your skill info based by project you involved</span>
                                                    </div>
                                                    <div class="actions py-20">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                </div>
                                                <form action="<?php echo base_url();?>student/profile/edit_project" method="POST" class="form form-horizontal">
                                                    <input type="hidden" name="project_id" value="<?php echo $value['id'] ?>"></input>
                                                    <div class="modal-body portlet-body ">
                                                        <!-- Project Title / Time Period-->
                                                        <div class="row ">
                                                            <!-- Project Title -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">Project Title</label>
                                                                    <input type="text" placeholder="Final Year Project" name="project_name" class="form-control" value="<?php echo ucfirst($value['name']); ?>" />
                                                                    <!-- <span class="help-block small"> Add your current status career info </span> -->
                                                                </div>
                                                            </div>
                                                            <!-- Time Period  -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">Time Period</label>
                                                                    <div class="m-grid ">
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="<?php echo ($value['start_date'] == '0000-00-00')? date('d-m-Y') : date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" name="start_date" required>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                            <span class="help-block"> to </span>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? " " : date('d-m-Y', strtotime($value['end_date'])); ?>" placeholder="End Year" name="end_date">
                                                                            <span class="help-block md-checkbox has-warning mb-0">
                                                                                <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value[ 'end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                                <label for="checkbox<?php echo $i;?>">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    <small> Currently project still ongoing?</small>
                                                                                </label>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Description / Skill Earned -->
                                                        <div class="row ">
                                                            <!-- Description -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">Description</label>
                                                                    <textarea class="form-control autosizeme" name="project_description" rows="6" placeholder="Brief about your project progress ....">
                                                                        <?php echo ucfirst($value['description']); ?>
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <!-- Skill Earned -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">Skill Earned</label>
                                                                    <input type="text" class="form-control input-xlarge" value="<?php echo $value['skills_acquired']; ?>" data-role="tagsinput" name="skills">
                                                                    <span class="help-block small"> Press "Tab" to add tag </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++;} ?>
                            </ul>
                        </div>
                        <?php else: ?>
                        <div class="portlet-body">
                            <div class="portlet md-grey-lighten-5 p-130 ">
                                <div class="portlet-body">
                                    <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                    <h5 class="font-grey-cascade mt-30 text-center">Click button below to add skill information based project you involve.</h5>
                                    <div class="width-500 center-block mt-40">
                                        <a href="#modal_add_project" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block">
                                            <i class="fa fa-plus  "></i> Add Skill Info </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ********************** MODAL ********************* -->
        <!-- Modal : Edit Profile -->
        <div class="modal fade in" id="modal_edit_profile" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet box ">
                    <div class="portlet-title tabbable-line md-indigo tab-tw-md-orange">
                        <div class="caption">
                            <span class="caption-subject">
                                Update Profile information
                            </span>
                        </div>
                        <ul class="nav nav-tabs">
                            <!-- Nav Personal -->
                            <li class="active">
                                <a data-toggle="tab" href="#tab_personal">
                                    <i class="icon-user mr-5"></i>Personal </a>
                            </li>
                            <!-- Nav Language -->
                            <li>
                                <a data-toggle="tab" href="#tab_language">
                                    <i class="fa fa-language mr-5"></i>Language </a>
                            </li>
                            <!-- Nav References -->
                            <li>
                                <a data-toggle="tab" href="#tab_reference">
                                    <i class="fa fa-users mr-5"></i> References </a>
                            </li>
                            <!-- Nav Picture -->
                            <li>
                                <a data-toggle="tab" href="#tab_picture">
                                    <i class="fa fa-camera mr-5"></i> Profile Image </a>
                            </li>
                        </ul>
                    </div>

                    <form id="profile" action="<?php echo base_url(); ?>student/profile/post" method="POST" class="form" enctype="multipart/form-data">
                        <div class="modal-body portlet-body form-horizontal">
                            <div class="tab-content">
                                <!-- SECTION : Personal Info -->
                                <div class="tab-pane active fade-in-up" id="tab_personal">
                                    <h4 class="form-section font-weight-600 text-uppercase md-indigo-text"> My Personal Information </h4>
                                    <!-- # Full Name / Preferences Name -->
                                    <div class="row">
                                        <!-- Full name -->
                                        <div class="col-sm-8">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Full Name</label>
                                                <input type="text" class="form-control" name="fullname" placeholder="Jennifer Lawrence" value="<?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : '';?>" required>
                                            </div>
                                        </div>
                                        <!-- Preferencs Name -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "> Current Career</label>
                                                <div class="input-group">
                                                    <p class="form-control-static  md-indigo-text text-uppercase letter-space-xs font-weight-600 font-17">
                                                        <i class="icon-graduation mr-5 font-18"></i> Student</p>
                                                    <!-- <div class="input-group-btn">
                                                        <a href="#" class="btn btn-md-orange btn-xs "><i class="fa fa-arrow-up mr-5"></i>Upgrade</a>
                                                    </div> -->
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- # Prefences Name / Gender / DOB -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Preferences Name</label>
                                                <input type="text" class="form-control" placeholder="Jenny" name="student_name" value="<?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : '';?>" required>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <!-- DOB -->
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "> Date Of Birth</label>
                                                <input type="text" name="DOB" id="DOB" value="<?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('m/d/Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d/m/Y');?>" class="form-control date-picker" data-date-format="mm/dd/yyyy" placeholder="mm/dd/yyyy" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- Gender -->
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Gender</label>
                                                <select class="form-control bs-select" name="gender">
                                                    <?php if (!empty($user_profile['overview']['student_bios_gender'])){ ?>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Male' ){echo "selected";}?>>Male</option>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Female' ){echo "selected";}?>>Female</option>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Prefer Not To Say' ){echo "selected";}?>>Prefer Not To Say</option>
                                                    <?php }else{ ?>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Prefer Not To Say</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- # Phone Number / Salary Expectation -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Phone Number</label>
                                                <input type="number" class="form-control" name="phone" placeholder="0123456789" value="<?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? ucfirst($user_profile['overview']['student_bios_contact_number']) : '';?>" required>
                                            </div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "> Salary Expectation</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <?php echo $this->session->userdata('forex'); ?>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="2500" name="expected_salary" value="<?php echo !empty($user_profile['overview']['expected_salary']) ? ucfirst($user_profile['overview']['expected_salary']) : '000';?>" required>
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                                <small class="helper-block md-grey-text mb-0">Your salary expectation </small>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="letter-space-sm form-section mb-10 md-indigo-text">Address</h4>
                                    <!-- # Street / Postcode -->
                                    <div class="row  ">
                                        <!-- Address -->
                                        <div class="col-sm-8">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Street</label>
                                                <input type="text" class="form-control " name="address" placeholder="Unit / Lot , Road " value="<?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address']: '';?>" required>
                                            </div>
                                        </div>
                                        <!--  Postcode -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Postcode</label>
                                                <input type="text" class="form-control" name="post_code" placeholder="Postcode" value="<?php echo !empty($user_profile['address']['postcode']) ? ucfirst($user_profile['address']['postcode']) : '';?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- # City & state -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : '';?>" required> </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">State</label>
                                                <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo !empty($user_profile['address']['states']) ? ucfirst($user_profile['address']['states']) : '';?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Country</label>
                                                <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo !empty($user_profile['address']['country']) ? ucfirst($user_profile['address']['country']) : '';?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="letter-space-sm form-section mb-10 md-indigo-text">Summarize About Yourself</h4>
                                    <!-- # Quote -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Quote</label>
                                        <textarea name="quotes" class="form-control" id="" rows="2" placeholder="Add your quote / headlines">
                                            <?php echo !empty($user_profile['overview']['quote']) ? ucfirst($user_profile['overview']['quote']) : '';?>
                                        </textarea>
                                    </div>
                                    <!-- About Yourself-->
                                    <div class="form-group mx-0 ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">About Yourself</label>
                                        <textarea name="summary" class="form-control" id="" rows="4" placeholder="Summary about yourself">
                                            <?php echo !empty($user_profile['overview']['summary']) ? ucfirst($user_profile['overview']['summary']) : '';?>
                                        </textarea>
                                    </div>

                                    <!-- Video Resume -->
                                    <h4 class="letter-space-sm form-section mb-10 md-indigo-text">Video Resume</h4>
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Upload your video link</label>
                                        <input type="text" name="youtubelink" class="form-control input-xlarge" placeholder="video link" value="<?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>">
                                    </div>

                                </div>

                                <!-- SECTION : Language Profieciency -->
                                <div class="tab-pane fade-in-up " id="tab_language">
                                    <h4 class="form-section font-weight-600 text-uppercase md-indigo-text"> Language Profieciency </h4>
                                    <div class="form-group mx-0">
                                        <div class="mt-repeater">
                                            <div data-repeater-list="group-b">
                                                <?php 
                                                    if (!empty($user_profile['language'])) {
                                                        foreach ($user_profile['language'] as $user_language_key => $user_language_value) {
                                                ?>
                                                <div data-repeater-item class=" row mt-20">
                                                    <input type="hidden" name="language_id" value="<?php echo $user_language_value['id'] ?>"></input>
                                                    <div class="col-md-4">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Language</label>
                                                        <select class="form-control " name="name">
                                                            <?php foreach ($language as $key => $value) { ?>
                                                            <option <?php echo $user_language_value[ 'title']==$value[ 'name'] ? 'selected' : '' ?>>
                                                                <?php echo $value['name']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Written</label>
                                                        <select class="form-control" name="written">
                                                            <option value="" disabled>Select level </option>
                                                            <option value="Beginner" <?php echo $user_language_value[ 'written']=='Beginner' ? 'selected' : '' ?>>Beginner</option>
                                                            <option value="Intermediate" <?php echo $user_language_value[ 'written']=='Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                                                            <option value="Advanced" <?php echo $user_language_value[ 'written']=='Advanced' ? 'selected' : '' ?>>Advanced</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Spoken</label>
                                                        <select class="form-control" name="spoken">
                                                            <option value="" disabled>Select level </option>
                                                            <option value="Beginner" <?php echo $user_language_value[ 'spoken']=='Beginner' ? 'selected' : '' ?>>Beginner</option>
                                                            <option value="Intermediate" <?php echo $user_language_value[ 'spoken']=='Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                                                            <option value="Advanced" <?php echo $user_language_value[ 'spoken']=='Advanced' ? 'selected' : '' ?>>Advanced</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 vertical-bottom pt-55">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm  ">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php }
                                                    }else{ 
                                                ?>

                                                <div data-repeater-item class="row mt-20">
                                                    <div class="col-md-4">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Language</label>
                                                        <select class="form-control " name="name">
                                                            <option value="">Select language </option>
                                                            <?php foreach ($language as $key => $value) { ?>
                                                            <option>
                                                                <?php echo $value['name']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Written</label>
                                                        <select class="form-control bs-select" name="written">
                                                            <option value="">Select level </option>
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Advanced">Advanced</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Spoken</label>
                                                        <select class="form-control" name="spoken">
                                                            <option value="">Select level </option>
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                            <option value="Advanced">Advanced</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 pt-55">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm">
                                                            <i class="fa fa-close"></i> remove
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php } ?>
                                            </div>
                                            <hr>
                                            <div class="mx-100">
                                                <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add  btn-block  ">
                                                    <i class="fa fa-plus"></i> Add new language
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- SECTION : Reference -->
                                <div class="tab-pane fade-in-up" id="tab_reference">
                                    <h4 class="form-section font-weight-600 text-uppercase md-indigo-text"> Reference </h4>
                                    <div class="row mx-0">
                                        <div class="note note-info note-bordered">
                                            <h5 class="font-weight-400 letter-space-xs my-20">
                                                <b>Note</b> : Put only 3 people as your reference</h5>
                                        </div>
                                    </div>

                                    <div class="form-group mx-0">
                                        <div class="mt-repeater">
                                            <div data-repeater-list="group-r">
                                                <?php 
                                                    if (!empty($user_profile['reference'])) {
                                                        foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                                                ?>
                                                <div data-repeater-item class=" row mt-20">
                                                    <!-- # Name / Email Address -->
                                                    <div class="col-md-6">
                                                        <!-- Name -->
                                                        <div class="form-group mx-0 ">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Name</label>
                                                            <div class="input-icon">
                                                                <i class="icon-user"></i>
                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control" value="<?=$reference_value['reference_name']?>">
                                                            </div>
                                                        </div>
                                                        <!-- Email Address -->
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Email Address</label>
                                                            <div class="input-icon">
                                                                <i class="icon-envelope"></i>
                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control" value="<?=$reference_value['reference_email']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- # Relationship -->
                                                    <div class="col-md-5">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "> Relationship</label>
                                                            <input type="text" name="reference_relationship" placeholder="ex. Former employer" class="form-control" value="<?=$reference_value['reference_relationship']?>">
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "> Contact Number</label>
                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control" value="<?=$reference_value['reference_phone']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 pt-100">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php }}else{?>
                                                <div data-repeater-item class=" row mt-20">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Name</label>
                                                            <div class="input-icon">
                                                                <i class="icon-user"></i>
                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Email Address</label>
                                                            <div class="input-icon">
                                                                <i class="icon-envelope"></i>
                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Relationship </label>
                                                            <input type="text" name="reference_relationship" placeholder="ex. Former employer" class="form-control">
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Contact Number</label>
                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 pt-100">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm ">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php }?>

                                            </div>
                                            <hr>
                                            <div class="mx-100">
                                                <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add btn-block ">
                                                    <i class="fa fa-plus"></i> Add new
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- SECTION : Profile Picture -->
                                <div class="tab-pane fade-in-up " id="tab_picture">
                                    <h4 class="form-section font-weight-600 text-uppercase md-indigo-text"> Profile Image </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Profile Image</label>
                                                <br>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn btn-md-grey btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="profile_photo"> </span>
                                                        <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Header Image</label>
                                                <br>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="<?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn btn-md-grey btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="header_photo"> </span>
                                                        <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions modal-footer ">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs pull-right">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Modal : Add Education -->
        <div class="modal fade in" id="modal_add_education" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content portlet light portlet-fit fade-in-up">
                    <div class="modal-header portlet-title">
                        <div class="caption">
                            <span class="caption-subject text-capitalize font-weight-500">Add Education</span>
                        </div>
                        <div class="actions py-20">
                            <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </div>

                    </div>
                    <form action="<?php echo base_url();?>student/profile/add_education" method="POST" class="form form-horizontal">
                        <input type="hidden" name="academic_id"></input>
                        <div class="modal-body portlet-body ">

                            <!-- Institution Name -->
                            <div class="form-group ">
                                <label class="control-label col-md-3">Institution Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="University of Malaya" name="university_name" required>
                                    <!-- <span class="help-block"> A block of help text.</span> -->
                                </div>

                            </div>

                            <!-- Qualifications Level -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Qualifications Level </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Bachelor&#39;s Degree" name="qualification_level" required>
                                    <!-- <span class="help-block"> A block of help text.</span> -->
                                </div>
                            </div>

                            <!-- Field Of Study-->
                            <div class="form-group">
                                <label class="control-label col-md-3">Field Of Study</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " placeholder="Software Engineering" name="field_of_study" required>
                                </div>
                            </div>

                            <!-- TIme Period  -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Time Period</label>
                                <div class="col-md-9  ">
                                    <div class="m-grid ">
                                        <div class="m-grid-col m-grid-col-xs-6">
                                            <input class="form-control form-control-inline date-picker date-picker-start " size="16" type="text" placeholder="From year" name="from" required>
                                            <!-- <span class="help-block"> Select date </span> -->
                                        </div>
                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                            <span class="help-block"> to </span>
                                        </div>
                                        <div class="m-grid-col m-grid-col-xs-6">
                                            <input class="form-control form-control-inline date-picker date-picker-end input-date-picker-end" size="16" type="text" placeholder="End Year" name="until" required>
                                            <span class="help-block md-checkbox has-warning">
                                                <input type="checkbox" id="add_education" class="md-check md-check-edu-add" name="current_date">
                                                <label for="add_education">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Currently still studying?
                                                </label>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="4" placeholder="Brief about your studying place and what subject you had study." name="academics_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Experience  -->
        <div class="modal fade in" id="modal_add_experience" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet light portlet-fit fade-in-up">
                    <div class="modal-header portlet-title">
                        <div class="caption">
                            <span class="caption-subject text-capitalize font-weight-500">Add Experience</span>
                        </div>
                        <div class="actions py-20">
                            <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </div>

                    </div>
                    <form action="<?php echo base_url()?>student/profile/add_experience" method="POST" class="form form-horizontal">
                        <div class="modal-body portlet-body ">
                            <!-- Job Post & Time Period -->
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label">Job Title</label>
                                        <input type="text" class="form-control " placeholder="Internship in IT Dept" name="title" required>
                                        <span class="help-block small"> Add your current status career info </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- TIme Period  -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label ">Time Period</label>

                                        <div class="m-grid ">
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-start" size="16" type="text" value="" placeholder="From year" name="start_date" required>
                                                <!-- <span class="help-block"> Select date </span> -->
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                <span class="help-block"> to </span>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-end input-date-picker-end" name="end_date" size="16" type="text" value="" placeholder="End Year" required>
                                                <span class="help-block md-checkbox has-warning">
                                                    <input type="checkbox" id="add_experience" class="md-check md-check-add-experience" name="current_date">
                                                    <label for="add_experience">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Currently still working?
                                                    </label>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Company Name / Job Employement Type / Industry -->
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label">Company Name</label>
                                        <input type="text" class="form-control " name="company_name" placeholder="Company #1 Sdn Bhd" required>
                                        <!-- <span class="help-block small"> Add your current status career info </span> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Job Employement Type  / Industry -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mx-0 mb-0">
                                                <label class="control-label ">Employement Type</label>
                                                <select class="form-control" name="employment_type">
                                                    <?php foreach ($employment_types as $key => $value) {?>
                                                    <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>">
                                                        <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block small"> Previous employement type </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mx-0 mb-0">
                                                <label class="control-label ">Industry</label>
                                                <select class="form-control   " name="industry">
                                                    <option value="" selected disabled>Company Industry </option>
                                                    <?php foreach ($industries as $key => $value) {?>
                                                    <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>">
                                                        <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block small"> Add your company industries </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Description / Skill Earned -->
                            <div class="row ">
                                <div class="col-md-6">
                                    <!-- Description -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label ">Description</label>
                                        <textarea class="form-control autosizeme" rows="4" placeholder="Brief about your working place ...." name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Skill Earned -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label">Skill Earned</label>
                                        <input type="text" class="form-control input-xlarge" value="Microsoft Office, Internet Browsing, Research" data-role="tagsinput" name="skills">
                                        <span class="help-block small"> Press "Tab" to add tag </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Achievements  -->
        <div class="modal fade in" id="modal_add_achievements" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet light portlet-fit fade-in-up">
                    <div class="modal-header portlet-title ">
                        <div class="caption">
                            <span class="caption-subject text-capitalize font-weight-500">Add Non Education</span>
                        </div>
                        <div class="actions py-20">
                            <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                    </div>
                    <form method="POST" id="achievement" class="form " action="<?php echo base_url()?>student/profile/add_achievement">
                        <div class="modal-body portlet-body form-horizontal ">
                            <!-- Institution Name -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="achievement_name" name="achievement_name" placeholder="Brain Challenge 2016" required>
                                    <span class="help-block small">Event / Competition / Contest / Tournament you just joined </span>
                                </div>

                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea id="achievement_description" name="achievement_description" class="form-control autosizeme" rows="4" placeholder="Brief about your studying place and what subject you had study." data-autosize-on="true" style="overflow-y: visible; overflow-x: hidden; word-wrap: break-word; resize: horizontal;"></textarea>
                                </div>
                            </div>

                            <!-- TIme Period  -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Time Period</label>
                                <div class="col-md-9  ">
                                    <div class="m-grid ">
                                        <div class="m-grid-col m-grid-col-xs-6">
                                            <input id="achievement_time_from" class="form-control form-control-inline date-picker-start" size="16" type="text" value="" placeholder="From year" name="start_date" required>
                                            <!-- <span class="help-block"> Select date </span> -->
                                        </div>
                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                            <span class="help-block"> to </span>
                                        </div>
                                        <div class="m-grid-col m-grid-col-xs-6">
                                            <input id="achievement_time_until" class="form-control form-control-inline date-picker-end" size="16" type="text" value="" placeholder="Until year" name="end_date" required>
                                            <!-- <span class="help-block"> Select date </span> -->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Tag -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Tag</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-large" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" style="display: none;" name="tag">
                                    <span class="help-block small"> Press "Tab" to add tag </span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Project -->
        <div class="modal fade in" id="modal_add_project" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet light portlet-fit fade-in-up ">
                    <div class="modal-header portlet-title">
                        <div class="caption">
                            <span class="caption-subject text-capitalize font-weight-500">New Project </span>
                            <span class="caption-helper">add about your skill info based by project you involved</span>
                        </div>
                        <div class="actions py-20">
                            <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </div>

                    </div>
                    <form class="form form-horizontal" action="<?php echo base_url();?>student/profile/add_project" method="POST">
                        <div class="modal-body portlet-body ">

                            <!-- Project Title & Time Period -->
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label">Project Title</label>
                                        <input type="text" class="form-control " placeholder="Internship in IT Dept" name="project_name" required>
                                        <!-- <span class="help-block small"> Add your current status career info </span> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- TIme Period  -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label ">Time Period</label>

                                        <div class="m-grid ">
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="" placeholder="From year" name="start_date" required>
                                                <!-- <span class="help-block"> Select date </span> -->
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                <span class="help-block"> to </span>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="" placeholder="End Year" name="end_date">
                                                <span class="help-block md-checkbox has-warning mb-0">
                                                    <input type="checkbox" id="checkbox_add_project" class="md-check" name="current_date">
                                                    <label for="checkbox_add_project">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <small> Currently still working?</small>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Description / Skill earned -->
                            <div class="row ">
                                <div class="col-md-6">
                                    <!-- Description -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label ">Description</label>
                                        <textarea class="form-control autosizeme" rows="6" placeholder="Brief about yourproject progress ...." name="project_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Skill Earned -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label">Skill Earned</label>
                                        <input type="text" class="form-control input-xlarge" id="tagsinput" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" name="skills">
                                        <span class="help-block small"> Press "Enter" to add tag </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ********************** End MODAL ********************* -->
    </div>
</div>
