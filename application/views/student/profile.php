<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 499px;">
        <div class="portlet mb-0 md-shadow-none ">
            <div class="portlet light md-transparent  md-shadow-none  p-0">

                <div class="portlet-title tabbable-line tab-md-indigo py-0 mb-0 border-md-blue-grey">
                    <div class="caption">
                        <!-- <i class="icon-user font-44-xs "></i> -->
                        <span class="caption-subject font-weight-300 text-capitalize primary-font font-44-xs">User Profile</span>
                    </div>
					<ul class="nav nav-tabs  mb-0 pb-0">
                        <?php
							$tab_student = $this->session->flashdata('tab_student');
						?>						
						
						<li class="<?=$tab_student == "tab_overview" || $tab_student == ""?"active":""?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_overview" data-toggle="tab"><i class="icon-user font-26-xs"></i> Overview</a>
                        </li>
                        <li class="<?=$tab_student == "tab_education"?"active":""?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_education" data-toggle="tab"> <i class="icon-graduation font-26-xs"></i>Education </a>
                        </li>
                        <li class="<?=$tab_student == "tab_experience"?"active":""?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_experience" data-toggle="tab"> <i class="icon-briefcase font-26-xs"></i>Experience</a>
                        </li>
                        <li class="<?=$tab_student == "tab_non_education"?"active":""?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_non_education" data-toggle="tab"> <i class="icon-notebook font-26-xs"></i>Non Education</a>
                        </li>
                        <li class="<?=$tab_student == "tab_project"?"active":""?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_project" data-toggle="tab"> <i class="icon-badge font-26-xs"></i>Skills</a>
                        </li>
                        <!-- <li>
                                            <a href="#tab_privacy" data-toggle="tab"><i class="icon-lock font-26-xs"></i> Privacy</a>
                                        </li> -->
                    </ul>
                </div>

            </div>
        </div>
        <div class="portlet mt-0 ">
            <div class="tab-content">
                <!-- Tab Content : Overview -->
                <div class="tab-pane <?=$tab_student == "tab_overview" || $tab_student == ""?"active":""?> " id="tab_overview">
                    <div class="m-grid">
                        <div class=" view mt-height-250-xs hm-black-slight" style="background:url(' <?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'33.jpg'; ?>') center center no-repeat">
                            <!-- <img src="../assets/global/img/portfolio/1200x900/03.jpg" class="img-fluid" alt=""> -->
                            <div class="mask ">
                                <!-- <a href="" class="btn btn-sm btn-opacity-white  pull-right m-4 ">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a> -->
                                <a href="<?php
                                    $id = $this->session->userdata('id');
                                    $id_encoded = rtrim(base64_encode($id), '=');
                                 echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank" class="btn  btn-md-indigo pull-right m-4 letter-space-xs">
                                    View My Resume </a>

                            </div>
                        </div>
                    </div>
                    <div class="md-white">
                        <!--  Brief you whole profile -->
                        <div class="m-grid m-grid-col m-grid-col-center m-grid-responsive-xs">
                            <div class="m-grid-col m-grid-col-sm-3"></div>
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-6 m-grid-col-xs-12">
                                <!-- <h3 class="">Jennifer Lawrence</h3> -->
                                <div class="mt-element-card-v2 ">
                                    <div class="mt-card-item p-0">
                                        <div class="mt-card-avatar text-center p-0">
                                            <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG_STUDENTS.'profile-pic.png'; ?>" class="avatar-circle avatar-large avatar-border border-md-indigo lighten-5 mt-margin-t-o-150-xs">
                                            <!-- <a href="" class="btn btn-icon-only  btn-outline-md-indigo mt-margin-l-o-60-xs"><i class="icon-pencil"></i></a> -->
                                        </div>
                                        <div class="mt-card-content  ">
                                            <h3 class="mt-card-name mt-3 md-indigo-text"><?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?> <span class="label label-primary vertical-middle hidden"> Public</span> </h3>
                                            <p class="mt-card-desc md-grey-text text-lighten-1">
                                                </p><ul class="list-inline list-unstyled">
                                                    <li class="font-26-xs"><i class="icon-briefcase mr-2"></i><?php echo  !empty($user_profile['overview']['student_bios_occupation']) ?  ucfirst($user_profile['overview']['student_bios_occupation']) : 'Student';?></li>
                                                    <!-- <li class="vertical-top md-grey-text text-darken-1"><i class="fa fa-circle font-10-xs "></i></li> -->
                                                    <!-- <li class="font-26-xs"><i class="icon-lock"></i>Public</li> -->
                                                    <li class="font-26-xs"><i class="icon-pointer"></i> <?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : $this->session->userdata['country'];?> , <?php echo ucfirst($user_profile['address']['country']);?></li>
                                                    <li class="font-26-xs"><i class="icon-calendar"></i> <?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : "DOB not set";?></li>
                                                    <!-- <li class="font-26-xs"><i class="fa fa-phone font-26-xs"></i> 0123456789</li> -->
                                                    <!-- <li class="font-26-xs"><i class="icon-envelope "></i> jennifer_lawrence@email.com</li> -->
                                                </ul>
                                            <p></p>
                                            <p class="mt-card-desc">  <?php echo !empty($user_profile['overview']['quote']) ? '<i class="fa fa-quote-left font-14-xs vertical-top"></i>'.$user_profile['overview']['quote'].'<i class="fa fa-quote-right vertical-top font-14-xs"></i>' : '';?>
                                                 </p>
                                            <p class="mt-card-desc text-justify hidden">
                                                <?php echo !empty($user_profile['overview']['quote']) ? $user_profile['overview']['quote'] : 'Xremo your career portal';?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col m-grid-col-sm-3 m-grid-col-middle m-grid-col-right pr-4 hidden-xs">
                                <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-outline-md-indigo "><i class="icon-pencil"></i>Edit</a>
                            </div>
                            <div class="m-grid-col m-grid-col-xs-12 m-grid-col-middle m-grid-col-center visible-xs">
                                <div class="btn-group btn-group-justified">
                                    <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-outline-md-indigo">
                                        <i class="icon-pencil"></i>Edit</a>
                                    <a href="<?php echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank" class="btn  btn-outline-md-indigo  letter-space-xs">View My resume</a>
                                </div>

                            </div>
                        </div>

                        <hr class="mt-1">
                        <!-- About myself -->
                        <div class="m-grid m-grid-col m-grid-col-center">
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1"></div>
                            <!-- content -->
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-10 m-grid-col-xs-10">
                                <div class="m-grid">
                                    <div class="m-grid-col">
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5 class="font-weight-700 text-uppercase mb-2">About Myself</h5>
                                            </li>
                                            <li><?php echo !empty($user_profile['overview']['summary']) ? $user_profile['overview']['summary'] : 'I am a good candidate';?>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1 "></div>
                        </div>
                        <!-- Profile Information -->
                        <div class="clearfix my-3"></div>
                        <div class="m-grid m-grid-col m-grid-col-center pb-5">
                                    <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1"></div>
                                    <div class="m-grid-col  m-grid-col-sm-10 m-grid-col-xs-10">
                                        <h4 class="font-weight-700 text-uppercase ">Personal Information</h4>
                                        <hr class="mb-1">
                                        <div class="m-grid m-grid-responsive-xs">
                                            <div class="m-grid-col m-grid-col-sm-6  p-2 m-grid-col-xs-12">
                                                <!-- Full Name -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Full Name</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- preferences-name -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Preferences Name</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : ucfirst($this->session->userdata('name'));?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Gender -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Gender</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['student_bios_gender']) ? $user_profile['overview']['student_bios_gender'] : 'I prefer not to say';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- DOB -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Date Of Birth</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['student_bios_DOB']) ?  date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d F Y');?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Video Link -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Video Resume</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Salary Expectation -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Salary Expectation</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo $this->session->userdata('forex'); ?> <?php echo !empty($user_profile['overview']['expected_salary']) ? $user_profile['overview']['expected_salary'] : '000';?>.00</h5>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <!-- Language Preferences -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Language Preferences</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font">
                                                                <?php if (!empty($user_profile['language'])) {?>
                                                                    <?php foreach ($user_profile['language'] as $key => $lang) {?>
                                                                        <b><?php echo !empty($lang['title']) ?  $lang['title'] : 'Please edit your profile';?></b>
                                                                        [ Written : <?php echo $lang['written']; ?> Level, Spoken : <?php echo $lang['spoken']; ?> Level ]
                                                                        <br>
                                                                    <?php } ?>
                                                                <?php }else{ ?>
                                                                    <h5>Please edit your profile</h5>
                                                                <?php } ?>
                                                                </h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="m-grid-col m-grid-col-sm-6 p-2 m-grid-col-xs-12">
                                                
                                                <!-- Email -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Email</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo $this->session->userdata('email');?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Contact Number -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Contact Number</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? $user_profile['overview']['student_bios_contact_number'] : 'None';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <!-- Address -->
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Address</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="roboto-font"><?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address'] : 'None';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">Postcode</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="roboto-font"><?php echo !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'] : 'None';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text"> City</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="roboto-font"><?php echo !empty($user_profile['address']['city']) ? $user_profile['address']['city'] : 'None';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="m-grid">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">State</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="roboto-font"><?php echo !empty($user_profile['address']['states']) ? $user_profile['address']['states'] : 'None' ;?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text"> Country</h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="roboto-font"><?php echo !empty($user_profile['address']['country']) ? $user_profile['address']['country'] : 'None';?></h5>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Reference -->
                                                <div class="m-grid ">
                                                    <div class="m-grid-col">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <h5 class="mb-2 font-weight-600 md-indigo-text">References</h5>
                                                            </li>
                                                            <?php foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                                                                if($reference_value['reference_name'] != ""){
                                                                ?>
                                                                    <li class="mb-4">
                                                                        <h5 class=" roboto-font font-weight-600"><?=$reference_value['reference_name']?></h5>          
                                                                        <h5 class=" roboto-font">Email : <?=$reference_value['reference_email'] != ""?$reference_value['reference_email']:"-"?></h5>
                                                                        <h5 class=" roboto-font">Phone No. : <?=$reference_value['reference_phone'] != ""?$reference_value['reference_phone']:"-"?></h5>
                                                                        <h5 class=" roboto-font">Relationships : <?=$reference_value['reference_relationship'] != ""?$reference_value['reference_relationship']:"-"?></h5>
                                                                    </li>

                                                            <?php }}?>                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-grid-col m-grid-col-sm-1 m-grid-col-xs-1">
                                        <!-- <a href="" class="btn btn-outline-md-indigo "><i class="icon-pencil"></i>Edit</a> -->
                                    </div>
                                </div>
                    </div>
                </div>
				
                <!-- Tab Content :Education -->
                <div class="tab-pane <?=$tab_student == "tab_education"?"active":""?>" id="tab_education">
                    <div class="portlet light md-shadow-none">
                        <div class="portlet-title ">
                            <div class="caption ">
                                <i class="icon-graduation"></i>
                                <span class="caption-subject font-weight-500  roboto-font "> Education</span>
                                <span class="caption-helper"> list out all your previous education</span>
                            </div>
                            <!-- Modal Add education -->
                            <div class="actions">
                                <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md-indigo  btn-add-edu"><i class="fa fa-plus  "></i> Add </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php if (!empty($user_profile['academics'])): ?>
                                
                                <?php $i=1; foreach($user_profile['academics'] as $value){ ?>
                                <div class="media p-0">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_education_<?php echo $value['academic_id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only btn-edit-edu" id="academic-btn" edu-val="<?php echo $value['academic_id'];?>"><i class="icon-pencil" data-toggle="tooltip" title="edit"></i></a>
                                        <a href="javascript:;" data-toggle="modal" class="btn btn-md-red btn-icon-only btn-delete" tb-val="academics" data-value="<?php echo $value['academic_id'];?>"><i class="icon-trash" data-toggle="tooltip" title="delete"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 font-26-xs"> <?php echo ucfirst($value['qualification_level']); ?> in <?php echo ucfirst($value['degree_name']);?></h4>
                                        <h5 class="font-weight-500 font-20-xs font-22-md my-2 roboto-font"> <i class="fa fa-institution"></i> <?php echo ucfirst($value['university_name']); ?></h5>
                                        <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"><i class="fa fa-calendar"></i> <?php echo date('d F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));?></h6>
                                        <p class="roboto-font mb-0 multiline-truncate"> 
                                            <?//=strip_tags($value['degree_description']); ?>
                                            <?=ucfirst($value['degree_description']);?>
                                        </p>
                                    </div>
                                </div>
                                <hr>

                        <!-- Modal : Add / Edit Education -->
                            <div class="modal fade in" id="modal_edit_education_<?php echo $value['academic_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content portlet light">
                                        <div class="modal-header portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject text-capitalize font-weight-500">Edit Education</span>
                                                <!-- <span class="caption-helper">add about your education info</span> -->
                                            </div>
                                            <div class="actions py-4">
                                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                            </div>

                                        </div>
                                        <form action="<?php echo base_url();?>student/profile/edit_education" method="POST" class="form form-horizontal">
                                        <input type="hidden" name="academic_id" value="<?php echo $value['academic_id'];?>"></input>
                                            <div class="modal-body portlet-body ">
                                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 343.75px;"><div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 343.75px;">
                                                    <!-- Institution Name -->
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Institution Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " placeholder="University of Malaya" name="university_name" value="<?php echo ucfirst($value['university_name']); ?>" required>
                                                            <!-- <span class="help-block"> A block of help text.</span> -->
                                                        </div>

                                                    </div>

                                                    <!-- Qualifications Level -->
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Qualifications Level </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control " placeholder="Bachelor&#39;s Degree" name="qualification_level" value="<?php echo ucfirst($value['qualification_level']); ?>" required>
                                                            <!-- <span class="help-block"> A block of help text.</span> -->
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
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Time Period</label>
                                                        <div class="col-md-9  ">
                                                            <div class="m-grid ">
                                                                <div class="m-grid-col m-grid-col-xs-6">
                                                                    <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="<?php echo date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" id="StartDate1" name="from" required>
                                                                    <!-- <span class="help-block"> Select date </span> -->
                                                                </div>
                                                                <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                    <span class="help-block"> to </span>
                                                                </div>
                                                                <div class="m-grid-col m-grid-col-xs-6">
                                                                    <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? "" : date('d-m-Y', strtotime($value['end_date'])); ?>" id="EndDate1" placeholder="End Year" name="until" required>
                                                                    <span class="help-block md-checkbox has-warning"> 
                                                                    <input type="checkbox" class="md-check" id="md-check-edu-end_<?php echo $i;?>" name="current_date" <?php echo ($value['end_date'] == '0000-00-00')? 'checked' : ''; ?>>
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
                                                            <textarea class="form-control" rows="4" placeholder="Brief about your studying place and what subject you had study." name="academics_description"><?php echo ucfirst($value['degree_description']); ?></textarea>
                                                        </div>
                                                    </div>

                                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                                <div class="modal-footer form-actions ">
                                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                </div>
                                        
                                        </div></form>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; }  ?>
                            <?php else: ?>
                                <div class="portlet-body">
                                    <div class="portlet md-shadow-none p-6">
                                        <div class="portlet-body">
                                            <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                            <h5 class="font-grey-cascade mt-5 text-center">Click
                                                <b>'
                                                    <i class="fa fa-plus"></i> ADD '</b> button to add new information.</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <!-- End Example 1 -->
                        </div>

                    </div>
                </div>
                <!-- Tab Content : Achievements -->
                <div class="tab-pane <?=$tab_student == "tab_non_education"?"active":""?>" id="tab_non_education">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-notebook"></i>
                                <span class="caption-subject font-weight-500  roboto-font "> Non Education</span>
                                <span class="caption-helper"> list out all your previous non educational activity (join any colleage event ... or whatsoever)</span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md-indigo "><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php if (!empty($user_profile['achievement'])): ?>

                            <!-- Example 1 -->
                            <?php foreach($user_profile['achievement'] as $value){ ?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_achievements_<?php echo $value['achievement_id']?>" class="btn btn-md-cyan btn-icon-only" data-toggle="modal"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" tb-val="achievement" data-value="<?php echo $value['achievement_id'];?>" class="btn btn-md-red btn-icon-only btn-delete"><i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 "> <?php echo ucfirst($value['achievement_title']);?> </h4>
                                        <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> <?php echo date('d F Y', strtotime($value['achievement_start_date']));?> - <?php echo date('d F Y', strtotime($value['achievement_end_date']));?></h6>
                                        <p class="roboto-font mb-0 multiline-truncate"> <?php echo ucfirst($value['achievement_description']);?>
                                        </p>
                                        <h4 class="">
                                            <?php $tag = explode(',', $value['achievement_tag']);
                                            $label = array("label-primary","label-md-indigo","label-md-blue-grey","label-md-orange","label-md-green");
                                            shuffle($label);
                                            foreach ($tag as $tag_key => $tag_value) { 

                                                ?>
                                                <span class="label <?php echo $label[$tag_key]; ?> mx-1"><?php echo $tag_value; ?></span>

                                             <?php } ?>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <!-- Modal : Add / Edit Achievements  -->
                                    <div class="modal fade in" id="modal_edit_achievements_<?php echo $value['achievement_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Non Educational</span>
                                                        <!-- <span class="caption-helper">add about your education info</span> -->
                                                    </div>
                                                    <div class="actions py-4">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>

                                                </div>
                                                <form action="<?php echo base_url();?>student/profile/edit_achievement" class="form form-horizontal" method="POST">
                                                    <input type="hidden" name="achievement_id" value="<?php echo $value['achievement_id'];?>"></input>
                                                    <div class="modal-body portlet-body ">
                                                        <div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <!-- Institution Name -->
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
                                                                    <textarea class="form-control autosizeme" name="achievement_description" rows="4" placeholder="Brief about your studying place and what subject you had study."><?php echo !empty($value['achievement_description']) ? $value['achievement_description'] : ''; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- TIme Period  -->
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
                                                        <div class="modal-footer form-actions ">
                                                            <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                        </div>
                                                </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                            <?php } ?>
                            <?php else: ?>
                                <div class="portlet-body">
                                    <div class="portlet md-shadow-none p-6">
                                        <div class="portlet-body">
                                            <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                            <h5 class="font-grey-cascade mt-5 text-center">Click
                                                <b>'
                                                    <i class="fa fa-plus"></i> ADD '</b> button to add new information.</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
                <!-- Tab Content : Experience -->
                <div class="tab-pane <?=$tab_student == "tab_experience"?"active":""?>" id="tab_experience">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-briefcase"></i>
                                <span class="caption-subject font-weight-500  roboto-font ">Experience</span>
                                <span class="caption-helper"> list out all your previous working experience</span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_experience" data-toggle="modal" class="btn btn-md-indigo  btn-add-exp"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php if (!empty($user_profile['experiences'])): ?>
                            
                            <?php $i=1; foreach($user_profile['experiences'] as $value){  
                                $description = $value['experiences_description'];
                                $company_name = $value['experiences_company_name'];?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_experience_<?php echo $value['experience_id']?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only ">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['experience_id'];?>" tb-val="experiences">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-600 letter-space-xs mb-1 "> <?php echo ucfirst($value['experiences_title']);?>
                                            <!-- <small>[ September 2016 - Feb 2017]</small> -->
                                        </h4>
                                        <h5 class="font-weight-400 font-26-xs  mb-1 roboto-font">
                                            <i class="fa fa-building-o mr-2 "></i><?php echo ucfirst($value['experiences_company_name']);?></h5>
                                        <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs mb-1">
                                            <i class="fa fa-calendar"></i> <?php echo date('d F Y', strtotime($value['experiences_start_date']));?> - <?php echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['experiences_end_date']));?></h6>
                                        <h6>
                                            <span class="badge badge-roundless badge-md-teal letter-space-sm font-weight-500"> <?php echo !empty($value['employment_type']) ? $value['employment_type'] : 'Please Choose from the form'; ?></span>
                                            <span class="badge badge-roundless badge-important letter-space-sm font-weight-500"> <?php echo !empty($value['industry_name']) ? $value['industry_name'] : 'Please Choose from the form'; ?></span>
                                        </h6>
                                        <p class="roboto-font mb-1 multiline-truncate"> <?php echo ucfirst($value['experiences_description']);?>
                                        </p>
                                        <p class="font-weight-600 text-uppercase mb-1">Skill Earned</p>
                                        <ul class="list-unstyled list-inline ml-0">
                                            <?php 
                                            if ($value['skills']) {
                                                $skill = explode(',', $value['skills']);
                                                foreach ($skill as $key => $skill_value) {?>
                                                <li class="label label-md-shades darkblue font-18-xs"> <?php echo $skill_value; ?> </li>
                                            <?php }}else{echo '';} ?>
                                        </ul>

                                    </div>
                                </div>
                                <hr>
                                <!-- Modal : Edit Experience  -->
                                    <div class="modal fade in" id="modal_edit_experience_<?php echo $value['experience_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Experience</span>
                                                        <!-- <span class="caption-helper">add about your education info</span> -->
                                                    </div>
                                                    <div class="actions py-4">
                                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                    </div>

                                                </div>
                                                <form action="<?php echo base_url();?>student/profile/edit_experience" method="POST" class="form form-horizontal">
                                                <input type="hidden" name="experience_id" value="<?php echo $value['experience_id']?>"></input>
                                                    <div class="modal-body portlet-body ">
                                                        <div class="scroller mt-height-500-xs" data-always-visible="1" data-rail-visible1="1">
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
                                                                                <input class="form-control form-control-inline date-picker-end date-picker-end-exp " size="16" type="text" name="end_date" value="<?php echo ($value['experiences_end_date'] == '0000-00-00')? "" : date('d-m-Y', strtotime($value['experiences_end_date'])); ?>" placeholder="End Year" id="EndDate3" required>
                                                                                <span class="help-block md-checkbox has-warning mb-0">
                                                                                    <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value['experiences_end_date'] == '0000-00-00')? 'checked' : ''; ?>>
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
                                                                                        <option value="<?php echo !empty($employment_types_value['id']) ? $employment_types_value['id'] : ''?>" <?php echo $value['employment_type_id'] == $employment_types_value['id'] ? 'selected' : '' ?>><?php echo !empty($employment_types_value['name']) ? $employment_types_value['name'] : ''?></option>
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
                                                                                        <option value="<?php echo !empty($industry_value['id']) ? $industry_value['id'] : ''?>" <?php echo $value['industries_id'] == $industry_value['id'] ? 'selected' : '' ?>><?php echo !empty($industry_value['name']) ? $industry_value['name'] : ''?></option>
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
                                                                        <textarea class="form-control autosizeme" rows="4" name="description" placeholder="Brief about your working place ...." data-autosize-on="true" style="overflow-y: visible; overflow-x: hidden; word-wrap: break-word; resize: horizontal;"><?php echo ucfirst($description);?></textarea>
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
                                                    </div>
                                                    <div class="modal-footer form-actions ">
                                                        <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php $i++; } ?>
                            <?php else: ?>
                                <div class="portlet-body">
                                    <div class="portlet md-shadow-none p-6">
                                        <div class="portlet-body">
                                            <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                            <h5 class="font-grey-cascade mt-5 text-center">Click
                                                <b>'
                                                    <i class="fa fa-plus"></i> ADD '</b> button to add new information.</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- Tab Content : Project -->
                <div class="tab-pane <?=$tab_student == "tab_project"?"active":""?>" id="tab_project">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-badge"></i>
                                <span class="caption-subject font-weight-500  roboto-font ">Skills</span>
                                <span class="caption-helper"> list out all your skill based by project</span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_project" data-toggle="modal" class="btn btn-md-indigo "><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php if (!empty($user_profile['projects'])): ?>
                            <?php $i=1; foreach($user_profile['projects'] as $value){?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_project_<?php echo $value['id'] ?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['id'];?>" tb-val="user_projects"> <i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 "> <?php echo ucfirst($value['name']);?> </h4>
                                        <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> <?php echo date('d F Y',strtotime($value['start_date'])); ?> - <?php echo ($value['end_date'] != '0000-00-00') ? date('d F Y',strtotime($value['start_date'])) : 'Now'; ?></h6>
                                        <p class="roboto-font mb-0 multiline-truncate"> <?php echo ucfirst($value['description']);?>
                                        </p>
                                        <h5 class="font-weight-500 font-20-xs font-22-md mt-3 mb-0 roboto-font">Skills Earned :</h5>
                                        <h5 class="">
                                            <?php $tag = explode(',', $value['skills_acquired']);
                                            $label = array("label-primary","label-md-indigo","label-md-blue-grey","label-md-orange","label-md-green");
                                            shuffle($label);
                                            foreach ($tag as $tag_key => $tag_value) { 

                                                ?>
                                                <span class="label <?php echo $label[$tag_key]; ?> mx-1"><?php echo $tag_value; ?></span>

                                             <?php } ?>
                                        </h5>
                                    </div>
                                </div>
                                <hr>
                                <!-- Modal : Edit Project -->
                <div class="modal fade in" id="modal_edit_project_<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content portlet light">
                            <div class="modal-header portlet-title">
                                <div class="caption">
                                    <span class="caption-subject text-capitalize font-weight-500">Edit Project </span>
                                    <span class="caption-helper">add about your skill info based by project you involved</span>
                                </div>
                                <div class="actions py-4">
                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                </div>

                            </div>
                            <form action="<?php echo base_url();?>student/profile/edit_project" method="POST" class="form form-horizontal">
                                <input type="hidden" name="project_id" value="<?php echo $value['id'] ?>"></input>
                                <div class="modal-body portlet-body ">
                                    <div class="scroller mt-height-500-xs" data-always-visible="1" data-rail-visible1="1">
                                        <!-- Job Post & Time Period -->
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="form-group mx-0 mb-0">
                                                    <label class="control-label">Project Title</label>
                                                    <input type="text" placeholder="A Can of Tuna" name="project_name" class="form-control" value="<?php echo ucfirst($value['name']); ?>" />
                                                    <!-- <span class="help-block small"> Add your current status career info </span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- TIme Period  -->
                                                <div class="form-group mx-0 mb-0">
                                                    <label class="control-label ">Time Period</label>

                                                    <div class="m-grid ">
                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                            <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="<?php echo ($value['start_date'] == '0000-00-00')? date('d-m-Y') : date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" name="start_date" required>
                                                            <!-- <span class="help-block"> Select date </span> -->
                                                        </div>
                                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                            <span class="help-block"> to </span>
                                                        </div>
                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                            <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? "" : date('d-m-Y', strtotime($value['end_date'])); ?>" placeholder="End Year" name="end_date">
                                                            <span class="help-block md-checkbox has-warning mb-0">
                                                            <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value['end_date'] == '0000-00-00')? 'checked' : ''; ?>>
                                                                <label for="checkbox<?php echo $i;?>">
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
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <!-- Description -->
                                                <div class="form-group mx-0 mb-0">
                                                    <label class="control-label ">Description</label>
                                                    <textarea class="form-control autosizeme" name="project_description" rows="6" placeholder="Brief about yourproject progress ...."><?php echo ucfirst($value['description']); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Skill Earned -->
                                                <div class="form-group mx-0 mb-0">
                                                    <label class="control-label">Skill Earned</label>
                                                    <input type="text" class="form-control input-xlarge" value="<?php echo $value['skills_acquired']; ?>" data-role="tagsinput" name="skills">
                                                    <span class="help-block small"> Press "Tab" to add tag </span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                            <?php $i++;} ?>
                            <?php else: ?>
                                <div class="portlet-body">
                                    <div class="portlet md-shadow-none p-6">
                                        <div class="portlet-body">
                                            <h3 class="font-weight-500 text-center md-indigo-text"> It's empty ... </h3>
                                            <h5 class="font-grey-cascade mt-5 text-center">Click
                                                <b>'
                                                    <i class="fa fa-plus"></i> ADD '</b> button to add new information.</h5>
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
            <div class="modal fade in modal-open-noscroll" id="modal_edit_profile" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content portlet box ">
                            <div class="portlet-title tabbable-line md-indigo tab-tw-md-orange  ">
                                <div class="caption">
                                    <span class="caption-subject">
                                        Update Profile information
                                    </span>
                                </div>
                                <ul class="nav nav-tabs navProfile " id="navProfile" role="navigation">
                                    <li class="active">
                                        <a href="#basicinfoSection"> Basic info </a>
                                    </li>
                                    <li>
                                        <a href="#languageSection"> Language </a>
                                    </li>
                                    <li>
                                        <a href="#summarySection"> Summary </a>
                                    </li>
                                    <li>
                                        <a href="#videoSection"> Video Resume </a>
                                    </li>
                                    <li class="">
                                        <a href="#referenceSection"> References </a>
                                    </li>
                                    <li>
                                        <a href="#pictureSection"> Profile Picture </a>
                                    </li>
                                </ul>
                            </div>

                            <form id="profile" action="<?php echo base_url(); ?>student/profile/post" method="POST" class="form" enctype="multipart/form-data">

                                <div class="modal-body portlet-body form-horizontal">
                                    <div class="scroller mt-height-600-xs " data-always-visible="1" data-rail-visible="1" id="scrollerProfile" data-spy="scroll" data-target="#navProfile">
                                        <!-- SECTION : Basic Info -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="basicinfoSection"> Basic Info </h4>
                                        <hr class="mt-2">
                                        <div class="row mx-0 ">
                                            <!-- Full Name / Address -->
                                            <div class="col-md-6 ">
                                                <!-- Full name -->
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" placeholder="Jennifer Lawrence" value="<?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : '';?>" required>
                                                </div>
                                                <!-- Address -->
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" class="form-control " name="address" placeholder="Unit / Lot , Road , Postcode , City , State , Country" value="<?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address']: '';?>" required>
                                                </div>
                                                <!-- City & state -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label">City</label>
                                                            <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : '';?>" required> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">State</label>
                                                            <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo !empty($user_profile['address']['states']) ? ucfirst($user_profile['address']['states']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Post code & Country -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Postcode</label>
                                                            <input type="text" class="form-control" name="post_code" placeholder="Postcode" value="<?php echo !empty($user_profile['address']['postcode']) ? ucfirst($user_profile['address']['postcode']) : '';?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Country</label>
                                                            <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo !empty($user_profile['address']['country']) ? ucfirst($user_profile['address']['country']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                            <!-- Nickname /  Gender / DOB / Current Career, Phone -->
                                            <div class="col-md-6">
                                                <!-- Nick Name -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label">Preferences Name</label>
                                                            <input type="text" class="form-control" placeholder="Jenny" name="student_name" value="<?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label  ">Current Career</label>
                                                            <div class="input-group">
                                                                <p class="form-control-static  md-indigo-text font-weight-600">Student</p>
                                                                <div class="input-group-btn">
                                                                    <a href="#" class="btn btn-md-orange btn-xs ">
                                                                        <i class="fa fa-arrow-up"></i>Upgrade</a>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- DOB -->
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Date of Birth</label>
                                                            <input type="text" name="DOB" id="DOB" value="<?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('m/d/Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d/m/Y');?>" class="form-control date-picker" data-date-format="mm/dd/yyyy" placeholder="mm/dd/yyyy" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <!-- Gender -->
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Gender</label>
                                                            <select class="form-control" name="gender">
                                                                        <?php if (!empty($user_profile['overview']['student_bios_gender'])){ ?>
                                                                            <option <?php if($user_profile['overview']['student_bios_gender'] == 'Male'){echo "selected";}?>>Male</option>
                                                                            <option <?php if($user_profile['overview']['student_bios_gender'] == 'Female'){echo "selected";}?>>Female</option>
                                                                            <option <?php if($user_profile['overview']['student_bios_gender'] == 'Prefer Not To Say'){echo "selected";}?>>Prefer Not To Say</option>                               
                                                                        <?php }else{ ?>
                                                                            <option>Male</option>
                                                                            <option>Female</option>
                                                                            <option>Prefer Not To Say</option>
                                                                        <?php } ?>
                                                                    </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Phone Number & Current Career -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Phone Number</label>
                                                            <input type="number" class="form-control" name="phone" placeholder="0123456789" value="<?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? ucfirst($user_profile['overview']['student_bios_contact_number']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label ">Salary Expectation</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><?php echo $this->session->userdata('forex'); ?></span>
                                                                <input type="text" class="form-control" placeholder="2500" name="expected_salary" value="<?php echo !empty($user_profile['overview']['expected_salary']) ? ucfirst($user_profile['overview']['expected_salary']) : '000';?>" required>
                                                                <span class="input-group-addon">.00</span>
                                                            </div>
                                                            <span class="helper-block">Your salary expectation </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- SECTION : Language Profieciency -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="languageSection"> Language Profieciency </h4>
                                        <hr class="mt-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-0">
                                                    <div class="mt-repeater">
                                                        <div data-repeater-list="group-b">
                                                        
                                                            <?php 
                                                                if (!empty($user_profile['language'])) {
                                                                foreach ($user_profile['language'] as $user_language_key => $user_language_value) {?>
                                                                <div data-repeater-item class=" row mt-2">
                                                                    <input type="hidden" name="language_id" value="<?php echo $user_language_value['id'] ?>"></input>
                                                                    <div class="col-md-4">
                                                                        <label for="" class="control-label"> Language</label>
                                                                        <select class="form-control " name="name">
                                                                        <?php foreach ($language as $key => $value) { ?>
                                                                            <option <?php echo $user_language_value['title'] == $value['name'] ? 'selected' : '' ?>><?php echo $value['name']; ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="control-label"> Written</label>
                                                                        <select class="form-control" name="written">
                                                                            <option value="" disabled>Select level </option>
                                                                            <option value="Beginner" <?php echo $user_language_value['written'] == 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                                                                            <option value="Intermediate" <?php echo $user_language_value['written'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                                                                            <option value="Advanced" <?php echo $user_language_value['written'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="control-label"> Spoken</label>
                                                                        <select class="form-control" name="spoken">
                                                                            <option value="" disabled>Select level </option>
                                                                            <option value="Beginner" <?php echo $user_language_value['spoken'] == 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                                                                            <option value="Intermediate" <?php echo $user_language_value['spoken'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
                                                                            <option value="Advanced" <?php echo $user_language_value['spoken'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 vertical-middle py-3">
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm mt-4">
                                                                            <i class="fa fa-close"></i> remove
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <?php }
                                                            }else{ ?>
                                                                <div data-repeater-item class=" row mt-2">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="control-label"> Language</label>
                                                                        <select class="form-control " name="name">
                                                                            <option value="">Select language </option>
                                                                        <?php foreach ($language as $key => $value) { ?>
                                                                            <option><?php echo $value['name']; ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="control-label"> Written</label>
                                                                        <select class="form-control" name="written">
                                                                            <option value="">Select level </option>
                                                                            <option value="Beginner">Beginner</option>
                                                                            <option value="Intermediate">Intermediate</option>
                                                                            <option value="Advanced">Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="control-label"> Spoken</label>
                                                                        <select class="form-control" name="spoken">
                                                                            <option value="">Select level </option>
                                                                            <option value="Beginner">Beginner</option>
                                                                            <option value="Intermediate">Intermediate</option>
                                                                            <option value="Advanced">Advanced</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-2 vertical-middle py-3">
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm mt-4">
                                                                            <i class="fa fa-close"></i> remove
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                        <hr>
                                                        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add btn-sm mt-2 pull-right ">
                                                            <i class="fa fa-plus"></i> Add
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SECTION : Summary -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="summarySection"> Summary about yourself</h4>
                                        <hr class="mt-2">
                                        <!-- Headlines -->
                                        <div class="row mx-0">
                                            <div class="col-md-12">
                                                <div class="form-group mx-0">
                                                    <label class="control-label"> Quote</label>
                                                    <textarea name="quotes" class="form-control" id="" rows="5" placeholder="Your quote"><?php echo !empty($user_profile['overview']['quote']) ? ucfirst($user_profile['overview']['quote']) : '';?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Summary -->
                                        <div class="row mx-0">
                                            <div class="col-md-12">
                                                <div class="form-group mx-0 ">
                                                    <label class="control-label"> Summary</label>
                                                    <textarea name="summary" class="form-control" id="" rows="5" placeholder="Summary about yourself"><?php echo !empty($user_profile['overview']['summary']) ? ucfirst($user_profile['overview']['summary']) : '';?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SECTION : Video Resume -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="videoSection"> Video Resume </h4>
                                        <hr class="mt-2">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Upload Youtube link</label>
                                            <div class="col-md-9">
                                                <input type="text" name="youtubelink" class="form-control input-xlarge" placeholder="link video" value="<?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>">
                                            </div>
                                        </div>

                                        <!-- SECTION : Reference -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="referenceSection"> Reference </h4>
                                        <hr class="mt-2">
                                        <div class="note note-md-blue">
                                            <h5 class="my-0">Note : Put only 3 people as your reference</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mx-0">
                                                    <div class="mt-repeater">
                                                        <div data-repeater-list="group-r">
                                                            <?php 
                                                                if (!empty($user_profile['reference'])) {
                                                                foreach ($user_profile['reference'] as $reference_key => $reference_value) {?>
                                                                <div data-repeater-item class=" row mt-2 mx-0">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0">
                                                                            <div class="input-icon">
                                                                                <i class="icon-user"></i>
                                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control" value="<?=$reference_value['reference_name']?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mx-0">
                                                                            <div class="input-icon">
                                                                                <i class="icon-envelope"></i>
                                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control" value="<?=$reference_value['reference_email']?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mx-0">
                                                                            <input type="text" name="reference_relationship" placeholder="Relationship" class="form-control" value="<?=$reference_value['reference_relationship']?>">
                                                                        </div>
                                                                        <div class="form-group mx-0">
                                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control" value="<?=$reference_value['reference_phone']?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 vertical-middle py-3">
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm mt-4">
                                                                            <i class="fa fa-close"></i> remove
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            <?php }}else{?>
                                                                <div data-repeater-item class=" row mt-2 mx-0">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0">
                                                                            <div class="input-icon">
                                                                                <i class="icon-user"></i>
                                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mx-0">
                                                                            <div class="input-icon">
                                                                                <i class="icon-envelope"></i>
                                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mx-0">
                                                                            <input type="text" name="reference_relationship" placeholder="Relationship" class="form-control">
                                                                        </div>
                                                                        <div class="form-group mx-0">
                                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 vertical-middle py-3">
                                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm mt-4">
                                                                            <i class="fa fa-close"></i> remove
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            <?php }?>
                                                            
                                                        </div>
                                                        <hr>
                                                        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add btn-sm mt-2 pull-right">
                                                            <i class="fa fa-plus"></i> Add
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SECTION : Profile Picture -->
                                        <h4 class="form-section mb-0 font-weight-600 text-uppercase md-indigo-text" id="pictureSection"> Profile Picture </h4>
                                        <hr class="mt-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mx-0">
                                                    <label class="control-label "> Profile Picture</label>
                                                    <br>
                                                    <br>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php echo !empty($user_profile['profile_photo']) ?  IMG_STUDENTS.$user_profile['profile_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="profile_photo"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mx-0">
                                                    <label class="control-label "> Header Picture</label>
                                                    <br>
                                                    <br>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php echo !empty($user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="header_photo"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="form-actions modal-footer ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs pull-right">Save</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            <!-- Modal : Add / Edit Education -->
            <div class="modal fade in" id="modal_add_education" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Education</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form action="<?php echo base_url();?>student/profile/add_education" method="POST" class="form form-horizontal">
                        <input type="hidden" name="academic_id" ></input>
                            <div class="modal-body portlet-body ">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 343.75px;"><div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 343.75px;">
                                    <!-- Institution Name -->
                                    <div class="form-group">
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
                                                    <input class="form-control form-control-inline date-picker-start " size="16" type="text" placeholder="From year" name="from" required>
                                                    <!-- <span class="help-block"> Select date </span> -->
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                    <span class="help-block"> to </span>
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-6">
                                                    <input class="form-control form-control-inline date-picker-end input-date-picker-end" size="16" type="text" placeholder="End Year" name="until" required>
                                                    <span class="help-block md-checkbox has-warning"> 
                                                    <input type="checkbox" id="add_education" class="md-check md-check-edu-add" name="current_date" >
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

                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>
                        
                        </div></form>
                    </div>
                </div>
            </div>

            <!-- Modal : Add / Edit Achievements  -->
            <div class="modal fade in" id="modal_add_achievements" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Non Education</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form method="POST" id="achievement" class="form form-horizontal" action="<?php echo base_url()?>student/profile/add_achievement">
                            <div class="modal-body portlet-body ">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 343.75px;"><div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 343.75px;">
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

                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>
                        
                        </div></form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>

            <!-- Modal : Add / Edit Experience  -->
            <div class="modal fade in" id="modal_add_experience" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Experience</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form action="<?php echo base_url()?>student/profile/add_experience" method="POST" class="form form-horizontal">
                            <div class="modal-body portlet-body ">
                                <div class="scroller mt-height-500-xs" data-always-visible="1" data-rail-visible1="1">
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
                                    <!-- Job Post & Time Period -->
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
                                                                <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>"><?php echo !empty($value['name']) ? $value['name'] : ''?></option>
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
                                                                <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>"><?php echo !empty($value['name']) ? $value['name'] : ''?></option>
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
                            </div>
                            <div class="modal-footer form-actions ">
                                <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal : Add / Edit Project -->
                <div class="modal fade in" id="modal_add_project" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content portlet light">
                            <div class="modal-header portlet-title">
                                <div class="caption">
                                    <span class="caption-subject text-capitalize font-weight-500">New Project </span>
                                    <span class="caption-helper">add about your skill info based by project you involved</span>
                                </div>
                                <div class="actions py-4">
                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                </div>

                            </div>
                            <form class="form form-horizontal" action="<?php echo base_url();?>student/profile/add_project" method="POST">
                                <div class="modal-body portlet-body ">
                                    <div class="scroller mt-height-500-xs" data-always-visible="1" data-rail-visible1="1">
                                        <!-- Job Post & Time Period -->
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
                                                            <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="" placeholder="End Year" name="end_date" >
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
                                </div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            <!-- ********************** End MODAL ********************* -->

        </div>


    </div>
</div>
