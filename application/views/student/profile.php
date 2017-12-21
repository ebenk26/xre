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
                        <li class="active">
                            <a href="<?php echo base_url(); ?>student/profile#tab_overview" data-toggle="tab"><i class="icon-user font-26-xs"></i> Overview</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>student/profile#tab_education" data-toggle="tab"> <i class="icon-graduation font-26-xs"></i>Education </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>student/profile#tab_non_education" data-toggle="tab"> <i class="icon-trophy font-26-xs"></i>Non-Education</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>student/profile#tab_experience" data-toggle="tab"> <i class="icon-briefcase font-26-xs"></i>Experience</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>student/profile#tab_skills" data-toggle="tab"> <i class="icon-badge font-26-xs"></i>Skills</a>
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
                <div class="tab-pane active " id="tab_overview">
                    <div class="m-grid">
                        <div class=" view mt-height-250-xs hm-black-slight" style="background:url(' <?php echo !empty($user_profile['image']['name']) ?  IMG_STUDENTS.$user_profile['image']['name'] : IMG_STUDENTS.'33.jpg'; ?>') center center no-repeat">
                            <!-- <img src="../assets/global/img/portfolio/1200x900/03.jpg" class="img-fluid" alt=""> -->
                            <div class="mask ">
                                <!-- <a href="" class="btn btn-sm btn-opacity-white  pull-right m-4 ">
                                    <i class="icon-pencil"></i>
                                    Edit
                                </a> -->
                                <a href="student-view-profile.html" target="_blank" class="btn  btn-md-indigo pull-right m-4 letter-space-xs">
                                    View My Resume </a>

                            </div>
                        </div>
                    </div>
                    <div class="md-white">
                        <!--  Brief you whole profile -->
                        <div class="m-grid m-grid-col m-grid-col-center">
                            <div class="m-grid-col m-grid-col-sm-3"></div>
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-6">
                                <!-- <h3 class="">Jennifer Lawrence</h3> -->
                                <div class="mt-element-card-v2 ">
                                    <div class="mt-card-item p-0">
                                        <div class="mt-card-avatar text-center p-0">
                                            <img src="<?php echo !empty($user_profile['image']['name']) ?  IMG_STUDENTS.$user_profile['image']['name'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" class="avatar-circle avatar-large avatar-border border-md-indigo lighten-5 mt-margin-t-o-150-xs">
                                            <!-- <a href="" class="btn btn-icon-only btn-circle btn-outline-md-indigo mt-margin-l-o-60-xs"><i class="icon-pencil"></i></a> -->
                                        </div>
                                        <div class="mt-card-content  ">
                                            <h3 class="mt-card-name mt-3 md-indigo-text"><?php echo ucfirst($this->session->userdata('name'));?> <span class="label label-primary vertical-middle hidden"> Public</span> </h3>
                                            <p class="mt-card-desc md-grey-text text-lighten-1">
                                                </p><ul class="list-inline list-unstyled">
                                                    <li class="font-26-xs"><i class="icon-briefcase mr-2"></i><?php echo  !empty($user_profile['overview']['student_bios_occupation']) ?  ucfirst($user_profile['overview']['student_bios_occupation']) : 'Student';?></li>
                                                    <!-- <li class="vertical-top md-grey-text text-darken-1"><i class="fa fa-circle font-10-xs "></i></li> -->
                                                    <!-- <li class="font-26-xs"><i class="icon-lock"></i>Public</li> -->
                                                    <li class="font-26-xs"><i class="icon-pointer"></i> <?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : $this->session->userdata['country'];?> , <?php echo ucfirst($user_profile['address']['country']);?></li>
                                                    <li class="font-26-xs"><i class="icon-calendar"></i> <?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d F Y');?></li>
                                                    <!-- <li class="font-26-xs"><i class="fa fa-phone font-26-xs"></i> 0123456789</li> -->
                                                    <!-- <li class="font-26-xs"><i class="icon-envelope "></i> jennifer_lawrence@email.com</li> -->
                                                </ul>
                                            <p></p>
                                            <p class="mt-card-desc"> <i class="fa fa-quote-left font-14-xs vertical-top"></i> <?php echo !empty($user_profile['overview']['quote']) ? $user_profile['overview']['quote'] : 'Xremo your career portal';?>
                                                <i class="fa fa-quote-right vertical-top font-14-xs"></i> </p>
                                            <p class="mt-card-desc text-justify hidden">
                                                <?php echo !empty($user_profile['overview']['quote']) ? $user_profile['overview']['quote'] : 'Xremo your career portal';?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col m-grid-col-sm-3 m-grid-col-middle m-grid-col-right pr-5">
                                <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-outline-md-indigo btn-circle"><i class="icon-pencil"></i>Edit</a>
                            </div>
                        </div>

                        <hr class="mt-1">
                        <!-- About myself -->
                        <div class="m-grid m-grid-col m-grid-col-center">
                            <div class="m-grid-col m-grid-col-sm-1"></div>
                            <!-- content -->
                            <div class="m-grid-col m-grid-col-center m-grid-col-sm-10">
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
                            <div class="m-grid-col m-grid-col-sm-1 "></div>
                        </div>
                        <!-- Profile Information -->
                        <div class="clearfix my-3"></div>
                        <div class="m-grid m-grid-col m-grid-col-center pb-5">
                            <div class="m-grid-col m-grid-col-sm-1"></div>
                            <div class="m-grid-col  m-grid-col-sm-10">
                                <h4 class="font-weight-400 text-uppercase ">Personal Information</h4>
                                <hr class="my-2">
                                <div class="m-grid">
                                    <div class="m-grid-col m-grid-col-md-6  p-2">
                                        <!-- preferences-name -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600 ">Preferences Name</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : ucfirst($this->session->userdata('name'));?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Full Name -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600">Full Name</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Gender -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600">Gender</h5>
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
                                                        <h5 class="mb-2 font-weight-600">Date Of Birth</h5>
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
                                                        <h5 class="mb-2 font-weight-600">CV Video</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-6 p-2">
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600">Email</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class=" roboto-font"><?php echo $this->session->userdata('email');?></h5>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600">Contact Number</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class=" roboto-font"><?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? $user_profile['overview']['student_bios_contact_number'] : 'None';?></h5>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600">Address</h5>
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
                                                        <h5 class="mb-2 font-weight-600">Postcode</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="roboto-font"><?php echo !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'] : 'None';?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600"> City</h5>
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
                                                        <h5 class="mb-2 font-weight-600">State</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="roboto-font"><?php echo !empty($user_profile['address']['states']) ? $user_profile['address']['states'] : 'None' ;?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="m-grid-col">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <h5 class="mb-2 font-weight-600"> Country</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="roboto-font"><?php echo !empty($user_profile['address']['country']) ? $user_profile['address']['country'] : 'None';?></h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="m-grid-col m-grid-col-sm-1 ">
                                <!-- <a href="" class="btn btn-outline-md-indigo btn-circle"><i class="icon-pencil"></i>Edit</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Content :Education -->
                <div class="tab-pane " id="tab_education">
                    <div class="portlet light md-shadow-none">
                        <div class="portlet-title ">
                            <div class="caption ">
                                <i class="icon-graduation"></i>
                                <span class="caption-subject font-weight-500  roboto-font "> Education</span>
                                <span class="caption-helper"> list out all your previous education</span>
                            </div>
                            <!-- Modal Add education -->
                            <div class="actions">
                                <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md-indigo btn-circle"><i class="fa fa-plus  "></i> Add </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php foreach($user_profile['academics'] as $value){ ?>
                            <div class="media p-0">
                                <div class="pull-right my-4 ">
                                    <a href="<?php echo base_url();?>student/profile#modal_edit_education_<?php echo $value['academic_id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only" id="academic-btn"><i class="icon-pencil" data-toggle="tooltip" title="edit"></i></a>
                                    <a href="javascript:;" data-toggle="modal" class="btn btn-md-red btn-icon-only btn-delete" tb-val="academics" data-value="<?php echo $value['academic_id'];?>"><i class="icon-trash" data-toggle="tooltip" title="delete"></i></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="font-weight-700 letter-space-xs mb-1 font-26-xs"><?php echo ucfirst($value['university_name']); ?> </h4>
                                    <h5 class="font-weight-500 font-20-xs font-22-md my-2 roboto-font"><?php echo ucfirst($value['degree_name']);?></h5>
                                    <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> <?php echo date('d F Y', strtotime($value['start_date']));?> - <?php echo ($value['end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['end_date']));?></h6>
                                    <p class="roboto-font mb-0 multiline-truncate"> <?php echo ucfirst($value['degree_description']);?>
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
                                                                    <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? date('d-m-Y') : date('d-m-Y', strtotime($value['end_date'])); ?>" id="EndDate1" placeholder="End Year" name="until" required>
                                                                    <span class="help-block md-checkbox has-warning"> 
                                                                    <input type="checkbox" id="edit_education" class="md-check" name="current_date" <?php echo ($value['end_date'] == '0000-00-00')? 'checked' : ''; ?>>
                                                                    <label for="edit_education">
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
                            <?php } ?>
                            <!-- End Example 1 -->
                        </div>

                    </div>
                </div>
                <!-- Tab Content : Achievements -->
                <div class="tab-pane " id="tab_non_education">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <!-- <i class="icon-graduation font-green-sharp"></i> -->
                                <span class="caption-subject font-weight-500  roboto-font "> Non-Education</span>
                                <span class="caption-helper"> list out all your previous non-educational activity (join any colleage event ... or whatsoever)</span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md-indigo btn-circle"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="portlet-body">
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
                                                        <span class="caption-subject text-capitalize font-weight-500">Edit Non-Educational</span>
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
                                                                            <input class="form-control form-control-inline date-picker-start input-medium" size="16" type="text" value="<?php echo !empty($value['start_date']) ? date('d-m-Y', strtotime($value['start_date'])) : date('d-m-Y') ;?>" name="start_date" id="StartDate2" placeholder="From year" required>
                                                                            <!-- <span class="help-block"> Select date </span> -->
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-end input-medium" size="16" type="text" value="<?php echo !empty($value['end_date']) ? date('d-m-Y', strtotime($value['end_date'])) : date('d-m-Y') ;?>" name="end_date" id="EndDate2" placeholder="From year" required>
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
                        </div>

                    </div>
                </div>
                <!-- Tab Content : Experience -->
                <div class="tab-pane " id="tab_experience">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <!-- <i class="icon-graduation font-green-sharp"></i> -->
                                <span class="caption-subject font-weight-500  roboto-font ">Experience</span>
                                <span class="caption-helper"> list out all your previous working experience</span>
                            </div>
                            <div class="actions">
                                <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/student-profile-v3.html#modal_add_experience" data-toggle="modal" class="btn btn-md-indigo btn-circle"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php foreach($user_profile['experiences'] as $value){ ?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_experience_<?php echo $value['experience_id']?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['experience_id'];?>" tb-val="experiences"><i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="m-grid">
                                            <div class="m-grid-col m-grid-col-xs-8">
                                                <h4 class="font-weight-700 mb-1 "> <?php echo ucfirst($value['experiences_title']);?> </h4>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-4 m-grid-col-right m-grid-col-middle">
                                                <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> <?php echo date('d F Y', strtotime($value['experiences_start_date']));?> - <?php echo ($value['experiences_end_date'] == '0000-00-00') ? 'Now' : date('d F Y', strtotime($value['experiences_end_date']));?></h6>
                                            </div>

                                        </div>
                                        <h5 class="font-weight-500 font-22-xs font-24-md my-2 roboto-font"><?php echo ucfirst($value['experiences_company_name']);?></h5>
                                        <p class="roboto-font mb-0 multiline-truncate"> <?php echo ucfirst($value['experiences_description']);?>
                                        </p>

                                    </div>
                                </div>
                                <hr>
                                <!-- Modal : Add / Edit Experience  -->
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
                                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 281.25px;"><div class="scroller mt-height-450-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 281.25px;">
                                                        <!-- Job Post Name -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Job Post</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " name="title" placeholder="Internship in IT Dept" value="<?php echo ucfirst($value['experiences_title']);?>">
                                                                <span class="help-block small" required> Add your current status career info </span>
                                                            </div>
                                                        </div>

                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control autosizeme" rows="4" name="description" placeholder="Brief about your working place ...." data-autosize-on="true" style="overflow-y: visible; overflow-x: hidden; word-wrap: break-word; resize: horizontal;"><?php echo ucfirst($value['experiences_description']);?></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- TIme Period  -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time Period</label>
                                                            <div class="col-md-9  ">
                                                                <div class="m-grid ">
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker-start " size="16" type="text" name="start_date" value="<?php echo date('d-m-Y', strtotime($value['experiences_start_date']));?>" placeholder="From year" id="StartDate3">
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                        <span class="help-block"> to </span>
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker-end " size="16" type="text" name="end_date" value="<?php echo ($value['experiences_end_date'] == '0000-00-00')? date('d-m-Y') : date('d-m-Y', strtotime($value['experiences_end_date'])); ?>" placeholder="End Year" id="EndDate3">
                                                                        <span class="help-block md-checkbox has-warning"> 
                                                                            <input type="checkbox" id="edit_exp" class="md-check" name="current_date" <?php echo ($value['experiences_end_date'] == '0000-00-00')? 'checked' : ''; ?>>
                                                                            <label for="edit_exp">
                                                                                <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span> Currently still working?
                                                                        </label>
                                                                        </span>
                                                                    </div>
                                                                </div>

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
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Tab Content : Skills -->
                <div class="tab-pane" id="tab_skills">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <!-- <i class="icon-graduation font-green-sharp"></i> -->
                                <span class="caption-subject font-weight-500  roboto-font ">Skills</span>
                                <span class="caption-helper"> list out all your previous working experience(part time, intern or whatsoever you do by earning money)</span>
                            </div>
                            <div class="actions">
                                <!-- <a href="#modal_add_skills" data-toggle="modal" class="btn btn-md-indigo "><i class="fa fa-plus"></i> Add</a> -->
                                <div class="btn-group">
                                    <a class="btn btn-md-indigo btn-circle" href="javascript:;" data-toggle="dropdown">
                                                                                        <i class="fa fa-plus"></i> Add
                                                                                        <i class="fa fa-angle-down"></i>
                                                                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#modal_add_project" data-toggle="modal">Project </a>
                                        </li>
                                        <li>
                                            <a href="#modal_add_skill" data-toggle="modal">Skill </a>
                                        </li>
                                        <li>
                                            <a href="#modal_add_language" data-toggle="modal">Language</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php foreach($user_profile['projects'] as $value){?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_project_<?php echo $value['id'] ?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['id'];?>" tb-val="user_projects"> <i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 "> <?php echo ucfirst($value['name']);?> </h4>
                                        <!-- <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> 1 September 2013 - 22 February 2017</h6> -->
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
                                                    <span class="caption-subject text-capitalize font-weight-500">Edit Project</span>
                                                    <!-- <span class="caption-helper">add about your education info</span> -->
                                                </div>
                                                <div class="actions py-4">
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                </div>

                                            </div>
                                            <form action="<?php echo base_url();?>student/profile/edit_project" method="POST" class="form form-horizontal">
                                                <input type="hidden" name="project_id" value="<?php echo $value['id'] ?>"></input>
                                                <div class="modal-body portlet-body ">
                                                    <div class="scroller mt-height-450-xs" data-always-visible="1" data-rail-visible1="1">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Project name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" placeholder="A Can of Tuna" name="project_name" class="form-control" value="<?php echo ucfirst($value['name']); ?>" /> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Project Description</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="3" name="project_description" placeholder="It's delicious!!"><?php echo ucfirst($value['description']); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Skill Acquired</label>
                                                            <div class="col-md-9">
                                                                <div class="mt-repeater">
                                                                    <div data-repeater-list="group-b">
                                                                        <?php $tag = explode(',', $value['skills_acquired']);
                                                                            foreach ($tag as $tag_key => $tag_value) { ?>
                                                                        <div data-repeater-item class="row mb-4">
                                                                                <div class="col-md-10">
                                                                                    <input type="text" placeholder="CSS" class="form-control" name="skills" value="<?php echo $tag_value ?>" />
                                                                                </div>
                                                                            <!-- <div class="col-md-5">
                                                                                <select class="bs-select form-control">
                                                                                            <option>Select level </option>
                                                                                            <option>Beginner</option>
                                                                                            <option>Intermediate</option>
                                                                                            <option>Expert</option>
                                                                                        </select>
                                                                            </div> -->
                                                                            <div class="col-md-2">
                                                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm my-0">
                                                                                    <i class="fa fa-close"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <hr>
                                                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add btn-sm mt-3">
                                                                        <i class="fa fa-plus"></i> Add 
                                                                    </a>

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
                            <?php } ?>
                            <?php foreach($user_profile['skills'] as $value){?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_skills_<?php echo $value['id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only" id="skills-btn"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['id'];?>" tb-val="user_skill_set"> <i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 "> <?php echo ucfirst($value['title']);?> </h4>
                                        <!-- <h6 class="font-weight-400 roboto-font md-grey-text text-darken-2 font-20-xs my-2"> 1 September 2013 - 22 February 2017</h6> -->
                                        <p class="roboto-font mb-0 multiline-truncate"> <?php echo ucfirst($value['description']);?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal fade in" id="modal_edit_skills_<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content portlet light">
                                            <div class="modal-header portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject text-capitalize font-weight-500">Edit Skill</span>
                                                    <!-- <span class="caption-helper">add about your education info</span> -->
                                                </div>
                                                <div class="actions py-4">
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                </div>

                                            </div>
                                            <form action="<?php echo base_url();?>student/profile/edit_skills" class="form form-horizontal" method="POST">
                                            <input type="hidden" name="skills_id" value="<?php echo $value['id'];?>">
                                                <div class="modal-body portlet-body ">
                                                    <!-- <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1"> -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Skill name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" placeholder="A Can of Tuna" class="form-control" name="skill_name" value="<?php echo $value['title'] ?>" required> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Skill Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" placeholder="It&#39;s delicious!!" name="skill_description"><?php echo $value['description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Level</label>
                                                        <div class="col-md-9">
                                                            <select class="bs-select form-control" name="skill_level">
                                                                <option disabled>Select level</option>
                                                                <option <?php echo ($value['level'] == 'Beginner') ? 'selected' : '' ?> >Beginner</option>
                                                                <option <?php echo ($value['level'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                                                                <option <?php echo ($value['level'] == 'Expert') ? 'selected' : '' ?>>Expert</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- </div> -->
                                                </div>

                                                <div class="modal-footer form-actions ">
                                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php foreach($user_profile['language'] as $value){?>
                                <div class="media">
                                    <div class="pull-right my-4 ">
                                        <a href="<?php echo base_url();?>student/profile#modal_edit_language_<?php echo $value['id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only" id="language-btn"><i class="icon-pencil"></i></a>
                                        <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete" data-value="<?php echo $value['id'];?>" tb-val="user_language_set"> <i class="icon-trash"></i></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-weight-700 letter-space-xs mb-1 "> <?php echo ucfirst($value['title']);?></h4>
                                        <p class="roboto-font mb-0 multiline-truncate"><?php echo ucfirst($value['profieciency']);?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal fade in" id="modal_edit_language_<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content portlet light">
                                            <div class="modal-header portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject text-capitalize font-weight-500">Add Skill</span>
                                                    <!-- <span class="caption-helper">add about your education info</span> -->
                                                </div>
                                                <div class="actions py-4">
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                                </div>

                                            </div>
                                            <form action="<?php echo base_url();?>student/profile/edit_language" class="form form-horizontal" method="POST">
                                            <input type="hidden" name="language_id" value="<?php echo $value['id'];?>">
                                                <div class="modal-body portlet-body ">
                                                    <!-- <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1"> -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Language</label>
                                                        <div class="col-md-9">
                                                            <input type="text" placeholder="English" class="form-control" name="language" value="<?php echo $value['title'] ?>" required> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Profieciency</label>
                                                        <div class="col-md-9">
                                                            <select class="bs-select form-control" name="profieciency">
                                                                <option disabled>Select level</option>
                                                                <option <?php echo ($value['profieciency'] == 'Beginner') ? 'selected' : '' ?> >Beginner</option>
                                                                <option <?php echo ($value['profieciency'] == 'Intermediate') ? 'selected' : '' ?>>Intermediate</option>
                                                                <option <?php echo ($value['profieciency'] == 'Expert') ? 'selected' : '' ?>>Expert</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- </div> -->
                                                </div>

                                                <div class="modal-footer form-actions ">
                                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ********************** MODAL ********************* -->
            <!-- Modal : Edit Profile -->
            <div class="modal fade in" id="modal_edit_profile" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content portlet light ">
                        <div class="portlet-title tabbable-line ">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Edit Profile</span>
                            </div>
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="https://xremo.github.io/XremoFrontEnd/custom_pages/student-profile-v3.html#tab_profile" data-toggle="tab">Profile</a>
                                </li>
                            </ul>

                        </div>
                        <div class="tab-content">
                            <!-- Tab : Profile  -->
                            <div class="tab-pane active " id="tab_profile">
                                <form id="profile" action="<?php echo base_url(); ?>student/profile/post" method="POST" class="form" enctype="multipart/form-data">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 343.75px;"><div class="scroller mt-height-550-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 343.75px;">
                                        <div class="modal-body portlet-body form-horizontal" style="overflow-y: auto;height: 350px;">
                                            <!-- <h4 class="form-section mb-0"> Person Info</h4> -->
                                            <!-- <hr class="mt-3"> -->
                                            <!-- Nick Name -->
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Preferences Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control input-medium" placeholder="Jenny" name="student_name" value="<?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : '';?>" required>
                                                </div>
                                            </div>
                                            <!-- Full name -->
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Full Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control input-xlarge" name="fullname" placeholder="Jennifer Lawrence" value="<?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : '';?>" required>
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Gender</label>
                                                        <div class="col-md-8">
                                                            <select class="bs-select form-control" name="gender">
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Date of Birth</label>
                                                        <div class="col-md-8">
                                                            <input type="text" name="DOB" id="DOB" value="<?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('d/m/Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d/m/Y');?>" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Current Career -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Current Career</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="current" placeholder="Student" value="<?php echo !empty($user_profile['overview']['student_bios_occupation']) ? ucfirst($user_profile['overview']['student_bios_occupation']) : $this->session->userdata('roles');?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Phone Number</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="phone" placeholder="0123456789" value="<?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? ucfirst($user_profile['overview']['student_bios_contact_number']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Adresss -->
                                            <h4 class="form-section mb-0"> Address</h4>
                                            <hr class="mt-3">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Address</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control " name="address" placeholder="Unit / Lot , Road , Postcode , City , State , Country" value="<?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address']: '';?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label class="control-label col-md-4">City</label>

                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="city" value="<?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : '';?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label class="control-label col-md-4">State</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="state" value="<?php echo !empty($user_profile['address']['states']) ? ucfirst($user_profile['address']['states']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Post Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="post_code" value="<?php echo !empty($user_profile['address']['postcode']) ? ucfirst($user_profile['address']['postcode']) : '';?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4">Country</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="country" value="<?php echo !empty($user_profile['address']['country']) ? ucfirst($user_profile['address']['country']) : '';?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>


                                            <h4 class="form-section mb-0"> Quotes</h4>
                                            <hr class="mt-3">
                                            <!-- Quotes/ Headline  -->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"> Quotes / Headlines</label>
                                                <div class="col-md-10">
                                                    <textarea name="quotes" class="form-control" id="" rows="3" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi consectetur possimus pariatur nihil praesentium veniam asperiores, debitis consequatur commodi esse, id sit? Perferendis maxime ea odit asperiores animi earum pariatur!"><?php echo !empty($user_profile['overview']['quote']) ? ucfirst($user_profile['overview']['quote']) : '';?></textarea>
                                                </div>
                                            </div>

                                            <h4 class="form-section mb-0"> Summary</h4>
                                            <hr class="mt-3">

                                            <!-- Summary  -->
                                            <div class="form-group">
                                                <label class="control-label col-md-2"> Summary</label>
                                                <div class="col-md-10">
                                                    <textarea name="summary" class="form-control" id="" rows="3" placeholder="Summarize about yourself"><?php echo !empty($user_profile['overview']['summary']) ? ucfirst($user_profile['overview']['summary']) : '';?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2"> Profile Picture</label>
                                                <div class="col-md-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php echo !empty($user_profile['image']['name']) ?  IMG_STUDENTS.$user_profile['image']['name'] : IMG_STUDENTS.'xremo-logo-blue.png'; ?>" alt=""> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="newImage"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2">Video Link</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="youtubelink" class="form-control input-xlarge" placeholder="link video" value="<?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                    <div class="form-actions modal-footer ">
                                        <button type="submit" id="save_profile" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs pull-right">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                                    <input class="form-control form-control-inline date-picker-start " size="16" type="text" placeholder="From year" name="from">
                                                    <!-- <span class="help-block"> Select date </span> -->
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                    <span class="help-block"> to </span>
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-6">
                                                    <input class="form-control form-control-inline date-picker-end" size="16" type="text" placeholder="End Year" name="until">
                                                    <span class="help-block md-checkbox has-warning"> 
                                                    <input type="checkbox" id="add_education" class="md-check" name="current_date">
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
                                <span class="caption-subject text-capitalize font-weight-500">Add Achievements</span>
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
                                                    <input id="achievement_time_from" class="form-control form-control-inline date-picker-start input-medium" size="16" type="text" value="" placeholder="From year" name="start_date">
                                                    <!-- <span class="help-block"> Select date </span> -->
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-6">
                                                    <input id="achievement_time_until" class="form-control form-control-inline date-picker-end input-medium" size="16" type="text" value="" placeholder="Until year" name="end_date">
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
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 281.25px;"><div class="scroller mt-height-450-xs" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 281.25px;">
                                    <!-- Job Post Name -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Job Post</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control " name="title" placeholder="Internship in IT Dept">
                                            <span class="help-block small"> Add your current status career info </span>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control autosizeme" name="description" rows="4" placeholder="Brief about your working place ...." data-autosize-on="true" style="overflow-y: visible; overflow-x: hidden; word-wrap: break-word; resize: horizontal;"></textarea>
                                        </div>
                                    </div>
                                    <!-- TIme Period  -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Time Period</label>
                                        <div class="col-md-9  ">
                                            <div class="m-grid ">
                                                <div class="m-grid-col m-grid-col-xs-6">
                                                    <input class="form-control form-control-inline date-picker-start " name="start_date" size="16" type="text" value="" placeholder="From year">
                                                    <!-- <span class="help-block"> Select date </span> -->
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                    <span class="help-block"> to </span>
                                                </div>
                                                <div class="m-grid-col m-grid-col-xs-6">
                                                    <input class="form-control form-control-inline date-picker-end" name="end_date" size="16" type="text" value="" placeholder="End Year">
                                                    <span class="help-block md-checkbox has-warning"> 
                                                        <input type="checkbox" id="add_experience" class="md-check" name="current_date">
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


                                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                </div>
                        
                        </div></form>
                    </div>
                </div>
            </div>

            <!-- Modal : Add / Edit Project -->
                    <div class="modal fade in" id="modal_add_project" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content portlet light">
                                <div class="modal-header portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject text-capitalize font-weight-500">Add Project</span>
                                        <!-- <span class="caption-helper">add about your education info</span> -->
                                    </div>
                                    <div class="actions py-4">
                                        <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                                    </div>

                                </div>
                                <form action="<?php echo base_url();?>student/profile/add_project" method="POST" class="form form-horizontal">
                                    <div class="modal-body portlet-body ">
                                        <div class="scroller mt-height-450-xs" data-always-visible="1" data-rail-visible1="1">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Project name</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="A Can of Tuna" name="project_name" class="form-control" /> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Project Description</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" rows="3" name="project_description" placeholder="It's delicious!!"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Skill Acquired</label>
                                                <div class="col-md-9">
                                                    <div class="mt-repeater">
                                                        <div data-repeater-list="group-b">
                                                            <div data-repeater-item class="row mb-4">
                                                                <div class="col-md-10">
                                                                    <input type="text" placeholder="CSS" class="form-control" name="skills" />
                                                                </div>
                                                                <!-- <div class="col-md-5">
                                                                    <select class="bs-select form-control">
                                                                                <option>Select level </option>
                                                                                <option>Beginner</option>
                                                                                <option>Intermediate</option>
                                                                                <option>Expert</option>
                                                                            </select>
                                                                </div> -->
                                                                <div class="col-md-2">
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm my-0">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr>
                                                        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add btn-sm mt-3">
                                                            <i class="fa fa-plus"></i> Add 
                                                        </a>

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
            <!--Modal : Add / Edit skill -->
            <div class="modal fade in" id="modal_add_skill" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Skill</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form action="<?php echo base_url();?>student/profile/add_skills" class="form form-horizontal" method="POST">
                            <div class="modal-body portlet-body ">
                                <!-- <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1"> -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Skill name</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="A Can of Tuna" class="form-control" name="skill_name"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Skill Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="3" placeholder="It&#39;s delicious!!" name="skill_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Level</label>
                                    <div class="col-md-9">
                                        <select class="bs-select form-control" name="skill_level">
                                            <option disabled>Select level</option>
                                            <option>Beginner</option>
                                            <option>Intermediate</option>
                                            <option>Expert</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- </div> -->
                            </div>

                            <div class="modal-footer form-actions ">
                                <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Modal : Add / Edit language -->
            <div class="modal fade in" id="modal_add_language" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content portlet light">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <span class="caption-subject text-capitalize font-weight-500">Add Language</span>
                                <!-- <span class="caption-helper">add about your education info</span> -->
                            </div>
                            <div class="actions py-4">
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                            </div>

                        </div>
                        <form method="POST" action="<?php echo base_url();?>student/profile/add_language" class="form form-horizontal">
                            <div class="modal-body portlet-body ">
                                <!-- <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1"> -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Language</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="English" class="form-control" name="language_name"> </div>
                                    </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Profieciency </label>
                                    <div class="col-md-9">
                                        <select class="bs-select form-control input-medium" name="profieciency">
                                            <option disabled>Select level</option>
                                            <option>Beginner</option>
                                            <option>Intermediate</option>
                                            <option>Expert</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- </div> -->
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