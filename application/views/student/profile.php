<?php !empty($user_profile['header_photo']) ? $user_profile['header_photo'] = $user_profile['header_photo'] : $user_profile['header_photo'] = '33.jpg';
        !empty($user_profile['profile_photo']) ? $user_profile['profile_photo'] = $user_profile['profile_photo'] : $user_profile['profile_photo'] = 'profile-pic.png';
        $checkGetHeaderImage = get_headers(IMG_STUDENTS.$user_profile['header_photo']);
        $checkGetProfileImage = get_headers(IMG_STUDENTS.$user_profile['profile_photo']) 
    ?>

<div class="page-content-wrapper">
    <div class="page-content">

        <!-- Page Header -->
        <div class="portlet light md-transparent  p-0 portlet-fit">
            <div class="portlet-title tabbable tabbable-tabdrop tabbable-line tab-md-indigo py-0 mb-0 border-md-blue-grey">
                <div class="caption">
                    <span class="caption-subject font-weight-300 text-capitalize font-26">
                        <?= !empty($language->user_profile) ? $language->user_profile : "User Profile" ?>
                    </span>
                </div>
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs mb-0 pb-0 ">
                    <?php
                            $tab_student = $this->session->flashdata('tab_student');
                        ?>
                        <li class="<?=$tab_student =='tab_overview' || $tab_student =='' ?'active':'' ?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_overview" data-toggle="tab">
                                <i class="icon-user font-22"></i>
                                <?= !empty($language->site_summary) ? $language->site_summary : "Overview" ?>
                            </a>
                        </li>
                        <li class="<?=$tab_student == " tab_education "?"active ":" "?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_education" data-toggle="tab">
                                <i class="icon-graduation font-22"></i>
                                <?= !empty($language->site_education) ? $language->site_education : "Education" ?>
                            </a>
                        </li>
                        <li class="<?=$tab_student == " tab_experience "?"active ":" "?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_experience" data-toggle="tab">
                                <i class="icon-briefcase font-22"></i>
                                <?= !empty($language->site_experience) ? $language->site_experience : "Experience" ?>
                            </a>
                        </li>
                        <li class="<?=$tab_student == " tab_non_education "?"active ":" "?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_non_education" data-toggle="tab">
                                <i class="icon-notebook font-22"></i>
                                <?= !empty($language->site_non_education) ? $language->site_non_education : "Non Education" ?>
                            </a>
                        </li>
                        <li class="<?=$tab_student == " tab_project "?"active ":" "?>">
                            <a href="<?php echo base_url(); ?>student/profile#tab_project" data-toggle="tab">
                                <i class="icon-badge font-22"></i>
                                <?= !empty($language->site_skill) ? $language->site_skill : "Skills" ?>
                            </a>
                        </li>

                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="portlet mt-0 ">
            <div class="tab-content">

                <!-- Tab Content : Overview -->
                <div class="tab-pane <?=$tab_student =='tab_overview' || $tab_student == '' ?'active':' '?>" id="tab_overview">
                    <!-- # Header Image -->
                    <div class="view height-300 bg-position-center" style="background:url(' <?= getimagesize(IMG_STUDENTS.$user_profile['header_photo']) ?  IMG_STUDENTS.$user_profile['header_photo'] : IMG_STUDENTS.'33.jpg'; ?>') center center no-repeat">
                        <div class="mask mdo-darkblue-v7 ">
                            <a href="#modal_edit_profile" data-toggle="modal" class="btn btn-md-indigo m-30 pull-right">
                                <i class="icon-pencil"></i> Edit Profile</a>
                        </div>
                    </div>
                    <!-- # User Card -->
                    <div class="portlet light">
                        <!--  Describe you whole profile -->
                        <div class="m-grid px-250">
                            <div class="m-grid-col m-grid-col-center  ">
                                <div class="mt-element-card-v2 ">
                                    <div class="mt-card-item p-0">
                                        <!-- Avatar -->
                                        <div class="mt-card-avatar text-center p-0">
                                            <img src="<?= $checkGetProfileImage[0] == 'HTTP/1.1 200 OK' ?  IMG_STUDENTS.$user_profile['profile_photo'] : IMG.'site/profile-pic.png'; ?>" class="avatar avatar-circle avatar-large mt-o-170">
                                        </div>
                                        <div class="mt-card-content mb-20 ">
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
                                            <hr class="border-medium center-block width-300 border-md-orange my-10">
                                            <p class="mt-card-desc mb-10 ">
                                                <?php echo !empty($user_profile['overview']['quote']) ? '<i class="fa fa-quote-left font-12 vertical-top mr-5"></i> '.$user_profile['overview']['quote'].' <i class="fa fa-quote-right vertical-top font-12 ml-5"></i>' : '';?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="center-block px-250  ">
                                    <div class="btn-group">
                                        <!-- <a href="#modal_print_resume" data-toggle="modal" class="btn btn-md-orange md-black-text hidden "><i class="icon-printer mr-5"></i> Print Resume</a> -->
                                        <a href="<?php
                                    $id = $this->session->userdata('id');
                                    $id_encoded = rtrim(base64_encode($id), '=');
                                    echo base_url() ?>profile/user/<?php echo $id_encoded; ?>" target="_blank" class="btn btn-md-darkblue ">
                                            <i class="icon-notebook"></i>
                                            <?= !empty($language->site_view_my_resume) ? $language->site_view_my_resume : " View Profile" ?>
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- # Section : About Myself -->
                        <div class="m-grid px-150">
                            <div class="m-grid-col ">
                                <h5 class="font-weight-700 text-uppercase letter-space-sm font-19">
                                    <?= !empty($language->site_about_me) ? $language->site_about_me : "About Myself" ?>
                                </h5>
                                <hr class="border-medium border-mdo-orange-v7 width-60 my-0">
                                <p>
                                    <?php echo !empty($user_profile['overview']['summary']) ? $user_profile['overview']['summary'] : '<i>Edit about you</i>';?>
                                </p>
                            </div>
                        </div>
                        <!-- # Section : Profile Info -->
                        <div class="m-grid px-150 mt-40 pb-100">
                            <div class="m-grid-col">

                                <h5 class="font-weight-700 text-uppercase letter-space-sm font-19">
                                    <?= !empty($language->site_personal_information) ? $language->site_personal_information : "Personal Information" ?>
                                </h5>
                                <hr class="border-medium border-mdo-orange-v7 width-60 mt-0 mb-10 ">

                                <div class="m-grid m-grid-responsive-xs">
                                    <!-- Col 1 -->
                                    <div class="m-grid-col m-grid-col-sm-6  m-grid-col-xs-12">
                                        <!-- Attribute : Full Name -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->site_full_name) ? $language->site_full_name : "Full Name" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : ucfirst($this->session->userdata('name'));?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Preferences Name -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class=" font-weight-600 md-indigo-text">
                                                    <?= !empty($language->site_pref_name) ? $language->site_pref_name : "Preferences Name" ?>
                                                </h5>
                                                <h5 class=" roboto-font ">
                                                    <?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : ucfirst($this->session->userdata('name'));?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Gender -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->site_gender) ? $language->site_gender : "Gender" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_gender']) ? $user_profile['overview']['student_bios_gender'] : '<i class="font-weight-300 md-grey-lighten-1-text"> I prefer not to say </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : DOB -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->DOB) ? $language->DOB : "Date of Birth" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_DOB']) ?  date('d F Y', strtotime($user_profile['overview']['student_bios_DOB'])) : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i> ';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Video Link -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->video_resume) ? $language->video_resume : "Video Resume" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Salary Expectation -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->site_expected_salary) ? $language->site_expected_salary : "Salary Expectation" ?>
                                                </h5>
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
                                        <!-- Attribute : Language Preferences -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text ">
                                                    <?= !empty($language->site_pref_language) ? $language->site_pref_language : "Language Preferences" ?>
                                                </h5>
                                                <?php if (!empty($user_profile['language'])) {?>
                                                <?php foreach ($user_profile['language'] as $key => $lang) {?>
                                                <!-- Language Ttle -->
                                                <h5 class="roboto-font font-weight-500 mb-0 letter-space-xs mt-30">
                                                    <?php echo !empty($lang['title']) ?  $lang['title'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                                <hr class="border-medium border-mdo-orange-v5 width-40 my-10">
                                                <h5 class="mt-0 mb-10 roboto-font ">
                                                    <b class="font-weight-400">
                                                        <?= !empty($language->written) ? $language->written : "Written" ?>
                                                    </b> :
                                                    <?php echo $lang['written']; ?> Level </h5>
                                                <h5 class="mt-0 mb-0 roboto-font">
                                                    <b class="font-weight-400">
                                                        <?= !empty($language->spoken) ? $language->spoken : "Spoken" ?>
                                                    </b> :
                                                    <?php echo $lang['spoken']; ?> Level </h5>

                                                <?php } ?>
                                                <?php } else{ ?>
                                                <h5>
                                                    <i class="font-weight-300 md-grey-lighten-1-text">
                                                        <?= !empty($language->none) ? $language->none : "None" ?>
                                                    </i>
                                                </h5>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Col 2 -->
                                    <div class="m-grid-col m-grid-col-sm-6 p-10 m-grid-col-xs-12">
                                        <!-- Attribute : Email Address  -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->email_address) ? $language->email_address : "Email" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo $this->session->userdata('email');?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Phone Number -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="mb-10 font-weight-600 md-indigo-text">
                                                    <?= !empty($language->site_contact_number) ? $language->site_contact_number : "Contact Number" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? $user_profile['overview']['student_bios_contact_number'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : Street @ Address -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->address) ? $language->address : "Street" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : City & Postcode -->
                                        <div class="m-grid">
                                            <!-- Attribute : City  -->
                                            <div class="m-grid-col">
                                                <h5 class="mb-10 font-weight-600 md-indigo-text">
                                                    <?= !empty($language->city) ? $language->city : "City" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['city']) ? $user_profile['address']['city'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>' ;?>
                                                </h5>
                                            </div>
                                            <!-- Attribute : Postcode  -->
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->postcode) ? $language->postcode : "Postcode" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['postcode']) ? $user_profile['address']['postcode'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>
                                        <!-- Attribute : State & Country  -->
                                        <div class="m-grid">
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->state) ? $language->state : "State" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['states']) ? $user_profile['address']['states'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>' ;?>
                                                </h5>
                                            </div>
                                            <div class="m-grid-col">
                                                <h5 class="font-weight-600 md-indigo-text">
                                                    <?= !empty($language->country) ? $language->country : "Country" ?>
                                                </h5>
                                                <h5 class="roboto-font">
                                                    <?php echo !empty($user_profile['address']['country']) ? $user_profile['address']['country'] : '<i class="font-weight-300 md-grey-lighten-1-text"> None </i>';?>
                                                </h5>
                                            </div>
                                        </div>

                                        <!-- Reference -->
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class=" font-weight-600 md-indigo-text">
                                                    <?= !empty($language->references) ? $language->references : "References" ?>
                                                </h5>
                                                <ul class="list-unstyled">
                                                    <?php           
                                                        if(!empty($user_profile['reference']) ){
                                                        foreach ($user_profile['reference'] as $reference_key => $reference_value) {
                                                    ?>
                                                    <li class="mb-30">
                                                        <?php if(!empty($reference_value['reference_name'])){ ?>
                                                        <h5 class=" roboto-font font-weight-500">
                                                            <?=$reference_value['reference_name']?>
                                                        </h5>
                                                        <?php } if(!empty($reference_value['reference_email'])){ ?>
                                                        <h5 class="roboto-font font-15">
                                                            <b class="font-weight-400 ">
                                                                <?= !empty($language->email_address) ? $language->email_address : "Email" ?>
                                                            </b> :

                                                            <?=$reference_value['reference_email'] != " "?$reference_value['reference_email']:"-"?>
                                                        </h5>
                                                        <?php } if(!empty($reference_value['reference_phone'])){ ?>
                                                        <h5 class="font-weight-400 roboto-font">
                                                            <b class="font-weight-400 ">
                                                                <?= !empty($language->phone_number) ? $language->phone_number : "Phone No." ?>
                                                            </b> :
                                                            <?=$reference_value['reference_phone'] != ""?$reference_value['reference_phone']:"-"?>
                                                        </h5>
                                                        <?php } if(!empty($reference_value['reference_relationship'])){ ?>
                                                        <h5 class=" font-weight-400 roboto-font">
                                                            <b class="font-weight-400 ">
                                                                <?= !empty($language->relationship) ? $language->relationship : "Relationships" ?>
                                                            </b>:
                                                            <?=$reference_value['reference_relationship'] != ""?$reference_value['reference_relationship']:"-"?>
                                                        </h5>
                                                        <?php } ?>
                                                    </li>
                                                    <?php } } else{ ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text">
                                                        <?= !empty($language->none) ? $language->none : "None" ?>
                                                    </i>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content :Education -->
                <div class="tab-pane <?=$tab_student =='tab_education'?'active':' '?>" id="tab_education">
                    <?php if (!empty($user_profile['academics'])): ?>
                    <div class="portlet light  ">
                        <div class="portlet-title ">
                            <div class="caption ">
                                <i class="icon-graduation font-17"></i>
                                <span class="caption-subject font-weight-600 ">
                                    <?= !empty($language->site_education) ? $language->site_education : "Education" ?>
                                </span>
                                <span class="caption-helper">
                                    <?= !empty($language->site_list_edu) ? $language->site_list_edu : "List out and summarize your education info." ?>
                                </span>
                            </div>
                            <!-- Modal Add education -->
                            <div class="actions">
                                <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md-indigo px-60 btn-add-edu">
                                    <i class="fa fa-plus  "></i>
                                    <?= !empty($language->add) ? $language->add : "Add" ?>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php $i=1; foreach($user_profile['academics'] as $value){ ?>
                                <li class="list-group-item ">
                                    <!-- Education Content -->
                                    <div class="media">
                                        <div class="media-body">
                                            <!-- 'Qualifications Level' in 'Field Study' -->
                                            <h4 class="font-weight-600 letter-space-xs font-20 mt-0">
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
                                            <hr class="border-medium width-100 border-md-amber mt-0 mb-10">
                                            <p class=" multiline-truncate my-20">
                                                <?//=strip_tags($value['degree_description']); ?>
                                                    <?=ucfirst($value['degree_description']);?>
                                            </p>
                                            <?php } ?>
                                        </div>
                                        <!-- Button -->
                                        <div class="media-right ">
                                            <!-- Edit Button -->
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_education_<?php echo $value['academic_id'];?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only btn-edit-edu tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Edit" id="academic-btn" edu-val="<?php echo $value['academic_id'];?>">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <div class="clearfix my-5"></div>
                                            <!-- Delete Button -->
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete  tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Delete" tb-val="academics" data-value="<?php echo $value['academic_id'];?>">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Modal : Edit Education -->
                                    <div class="modal fade in" id="modal_edit_education_<?php echo $value['academic_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content portlet light portlet-fit fade-in-up">
                                                <div class="modal-header portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject text-capitalize font-weight-500">
                                                            </i>
                                                            <?= !empty($language->site_edit_edu) ? $language->site_edit_edu : "Edit Education" ?>
                                                        </span>
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
                                                            <label class="control-label col-md-3">
                                                                </i>
                                                                <?= !empty($language->institution) ? $language->institution : "Institution Name" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="University of Malaya" name="university_name" value="<?php echo ucfirst($value['university_name']); ?>" required>
                                                            </div>

                                                        </div>

                                                        <!-- Qualifications Level -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->qualification) ? $language->qualification : "Qualification Level" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="Bachelor&#39;s Degree" name="qualification_level" value="<?php echo ucfirst($value['qualification_level']); ?>" required>
                                                            </div>
                                                        </div>

                                                        <!-- Field Of Study-->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->site_studyfield) ? $language->site_studyfield : "Field of Study" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " placeholder="Software Engineering" name="field_of_study" value="<?php echo ucfirst($value['degree_name']); ?>" required>
                                                            </div>
                                                        </div>

                                                        <!-- Time Period  -->
                                                        <!-- BUG : Fix End Date input disable if checkbox check -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                                            </label>
                                                            <div class="col-md-9  ">
                                                                <div class="m-grid ">
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker date-picker-start " size="16" type="text" value="<?php echo date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" id="StartDate1" name="from" required>
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                        <span class="help-block">
                                                                            <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? ' ' : date('d-m-Y', strtotime($value['end_date'])); ?>" id="EndDate1" placeholder="End Year" name="until" required>
                                                                        <span class="help-block md-checkbox has-warning">
                                                                            <input type="checkbox" class="md-check" id="md-check-edu-end_<?php echo $i;?>" name="current_date" <?php echo ($value[ 'end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                            <label for="md-check-edu-end_<?php echo $i;?>">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span>
                                                                                <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                                            </label>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->description) ? $language->description : "Description" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <?php 
                                                                echo '<textarea class="form-control autosizeme no-resize" rows="4" placeholder="Describe about your studying place and what subject you had study." name="academics_description">';
                                                                echo ucfirst($value['degree_description']); 
                                                                echo '</textarea>';
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" form-actions  modal-footer px-30 ">
                                                        <button type="submit" class="btn btn-md-indigo width-250 letter-space-xs">
                                                            <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; }  ?>
                            </ul>
                        </div>
                    </div>

                    <!-- # Empty State -->
                    <?php else: ?>
                    <div class="portlet height-600 flex-center ">
                        <div class="portlet-body text-center">
                            <i class="icon-rocket font-60 md-blue-grey-lighten-3-text"></i>
                            <h3 class=" text-center font-weight-600 font-28-md md-blue-grey-darken-2-text ">
                                <?= !empty($language->site_empty_edu) ? $language->site_empty_edu: "Let's get started..." ?>
                            </h3>
                            <h5 class="md-blue-grey-text mt-30 text-center px-160-md font-17-md">
                                <?= !empty($language->site_click_addedu) ? $language->site_click_addedu : "Start to create new info and summarize about your education." ?>
                            </h5>
                            <div class="width-500 center-block mt-40">
                                <a href="<?php echo base_url();?>student/profile#modal_add_education" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block btn-add-edu">
                                    <i class="fa fa-plus  "></i>
                                    <?= !empty($language->site_add_eduinfo) ? $language->site_add_eduinfo : "New Education Info" ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>

                <!-- Tab Content : Experience -->
                <div class="tab-pane <?=$tab_student == 'tab_experience'?'active':''?>" id="tab_experience">
                    <?php if (!empty($user_profile['experiences'])): ?>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-briefcase"></i>
                                <span class="caption-subject font-weight-600 ">
                                    <?= !empty($language->site_experience) ? $language->site_experience : "Experience" ?>
                                </span>
                                <span class="caption-helper">
                                    <?= !empty($language->site_list_work) ? $language->site_list_work : "List out and summarize your working experience." ?>
                                </span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_experience" data-toggle="modal" class="btn btn-md-indigo  btn-add-exp px-60">
                                    <i class="fa fa-plus"></i>
                                    <?= !empty($language->add) ? $language->add : "Add" ?>
                                </a>
                            </div>
                        </div>
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
                                            <h4 class="font-weight-600 letter-space-xs mb-5 mt-0">
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
                                            <hr class="border-medium width-100 border-md-amber my-10">
                                            <?php } ?>

                                            <!-- Description -->
                                            <?php if (!empty($value['experiences_description'])){ ?>
                                            <p class=" multiline-truncate mt-20">
                                                <?php echo ucfirst($value['experiences_description']);?>
                                            </p>
                                            <?php } ?>
                                            <!-- Skill Earned -->
                                            <?php if (!empty($value['skills'])){ ?>
                                            <p class="font-weight-600 mt-20  mb-10 text-uppercase font-15">
                                                <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                            </p>
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
                                        <div class="media-right ">
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_experience_<?php echo $value['experience_id']?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Edit">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <div class="clearfix my-5"></div>
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Delete" data-value="<?php echo $value['experience_id'];?>" tb-val="experiences">
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
                                                        <span class="caption-subject text-capitalize font-weight-500">
                                                            <?= !empty($language->site_edit_experience) ? $language->site_edit_experience : "Edit Experience" ?>
                                                        </span>
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
                                                                    <label class="control-label">
                                                                        <?= !empty($language->site_job_title) ? $language->site_job_title : "Job Title" ?>
                                                                    </label>
                                                                    <input type="text" class="form-control " name="title" placeholder="Internship in IT Dept" value="<?php echo ucfirst($value['experiences_title']);?>">
                                                                    <span class="help-block small">
                                                                        <?= !empty($language->site_add_current_career) ? $language->site_add_current_career : "Add your current status career info" ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- TIme Period  -->
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">
                                                                        <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                                                    </label>

                                                                    <div class="m-grid ">
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-start " size="16" type="text" name="start_date" value="<?php echo date('d-m-Y', strtotime($value['experiences_start_date']));?>" placeholder="From year" id="StartDate3">
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                            <span class="help-block">
                                                                                <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-end date-picker-end-exp " size="16" type="text" name="end_date" value="<?php echo ($value['experiences_end_date'] == '0000-00-00')? " " : date('d-m-Y', strtotime($value['experiences_end_date'])); ?>" placeholder="End Year" id="EndDate3" required>
                                                                            <span class="help-block md-checkbox has-warning mb-0">
                                                                                <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value[ 'experiences_end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                                <label for="checkbox<?php echo $i; ?>">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    <small>
                                                                                        <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                                                    </small>
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
                                                                    <label class="control-label">
                                                                        <?= !empty($language->site_company_name) ? $language->site_company_name : "Company Name" ?>
                                                                    </label>
                                                                    <input type="text" class="form-control " placeholder="Company #1 Sdn Bhd" name="company_name" value="<?php echo !empty($value['experiences_company_name']) ? $value['experiences_company_name'] : ''?>">
                                                                    <!-- <span class="help-block small"> Add your current status career info </span> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Job Employement Type  / Industry -->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0 mb-0">
                                                                            <label class="control-label ">
                                                                                <?= !empty($language->site_employment_type) ? $language->site_employment_type : "Employment Type" ?>
                                                                            </label>
                                                                            <select class="form-control" name="employment_type">
                                                                                <?php foreach ($employment_types as $key => $employment_types_value) {?>
                                                                                <option value="<?php echo !empty($employment_types_value['id']) ? $employment_types_value['id'] : ''?>" <?php echo $value[ 'employment_type_id']==$employment_types_value[ 'id'] ? 'selected' : '' ?>>
                                                                                    <?php echo !empty($employment_types_value['name']) ? $employment_types_value['name'] : ''?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block small">
                                                                                <?= !empty($language->site_prev_employment) ? $language->site_prev_employment : "Previous employement type" ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mx-0 mb-0">
                                                                            <label class="control-label ">
                                                                                <?= !empty($language->site_company_industry) ? $language->site_company_industry : "Company Industry" ?>
                                                                            </label>
                                                                            <select class="form-control   " name="industry">
                                                                                <option value="" selected disabled>
                                                                                    <?= !empty($language->site_company_industry) ? $language->site_company_industry : "Company Industry" ?>
                                                                                </option>
                                                                                <?php foreach ($industries as $key => $industry_value) {?>
                                                                                <option value="<?php echo !empty($industry_value['id']) ? $industry_value['id'] : ''?>" <?php echo $value[ 'industries_id']==$industry_value[ 'id'] ? 'selected' : '' ?>>
                                                                                    <?php echo !empty($industry_value['name']) ? $industry_value['name'] : ''?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <span class="help-block small">
                                                                                <?= !empty($language->site_add_company_industry) ? $language->site_add_company_industry : "Add your company industries" ?>
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
                                                                    <label class="control-label ">
                                                                        <?= !empty($language->description) ? $language->description : "Description" ?>
                                                                    </label>
                                                                    <?php
                                                                        echo '<textarea class="form-control autosizeme no-resize" rows="4" name="description" placeholder="Describe about your working experience." data-autosize-on="true">';
                                                                        echo ucfirst($description);
                                                                        echo '</textarea>';
                                                                    ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Skill Earned -->
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">
                                                                        <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                                                    </label>
                                                                    <input type="text" class="form-control input-xlarge" value="<?php echo !empty($value['skills']) ? $value['skills'] : '' ?>" data-role="tagsinput" name="skills">
                                                                    <span class="help-block small">
                                                                        <?= !empty($language->site_add_tag) ? $language->site_add_tag : "Press \"Tab\" to add tag" ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">
                                                            <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++; } ?>
                            </ul>
                        </div>
                    </div>

                    <!-- # Empty State -->
                    <?php else: ?>
                    <div class="portlet height-600 flex-center ">
                        <div class="portlet-body text-center">
                            <i class="icon-rocket font-60 md-blue-grey-lighten-3-text"></i>
                            <h3 class=" text-center font-weight-600 font-28-md md-blue-grey-darken-2-text ">
                                <?= !empty($language->site_empty_work) ? $language->site_empty_work : "Let's get started... " ?>
                            </h3>
                            <h5 class="md-blue-grey-text mt-30 text-center px-160-md font-17-md">
                                <?= !empty($language->site_click_addwork) ? $language->site_click_addwork : "Start to create new info and summarize about your working experience." ?>
                            </h5>
                            <div class="width-500 center-block mt-40">
                                <a href="<?php echo base_url();?>student/profile#modal_add_experience" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block btn-add-exp">
                                    <i class="fa fa-plus  "></i>
                                    <?= !empty($language->site_add_workexp) ? $language->site_add_workexp : "New Experience Info" ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>

                <!-- Tab Content : Non Education -->
                <div class="tab-pane <?=$tab_student == 'tab_non_education'?'active':' '?>" id="tab_non_education">
                    <!-- If Not empty -->
                    <?php if (!empty($user_profile['achievement'])): ?>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-notebook"></i>
                                <span class="caption-subject font-weight-600  ">
                                    <?= !empty($language->site_non_education) ? $language->site_non_education : "Non Education" ?>
                                </span>
                                <span class="caption-helper">
                                    <?= !empty($language->site_list_nonedu) ? $language->site_list_nonedu : "List out and summarize any event / activity / contest / achievements you have participate. " ?>
                                </span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md-indigo ">
                                    <i class="fa fa-plus"></i>
                                    <?= !empty($language->add) ? $language->add : "Add" ?>
                                </a>
                            </div>
                        </div>

                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php foreach($user_profile['achievement'] as $value){ ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <!-- Event -->
                                            <h4 class="font-weight-700 letter-space-xs mt-0">
                                                <?php echo ucfirst($value['achievement_title']);?> </h4>

                                            <!-- Date -->
                                            <h5 class="font-weight-400 roboto-font md-grey-darken-2-text font-15">
                                                <i class="fa fa-calendar mr-5"></i>
                                                <?php echo date('d F Y', strtotime($value['achievement_start_date']));?> -
                                                <?php echo date('d F Y', strtotime($value['achievement_end_date']));?>
                                            </h5>

                                            <?php if (!empty($value['achievement_description']) || ($value['achievement_tag']) ){ ?>
                                            <hr class="border-medium width-100 border-md-amber my-10">
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
                                        <div class="media-right ">
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_achievements_<?php echo $value['achievement_id']?>" class="btn btn-md-cyan btn-icon-only tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Edit" data-toggle="modal">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <div class="clearfix my-5"></div>
                                            <a href="javascript:;" tb-val="achievement" data-value="<?php echo $value['achievement_id'];?>" class="btn btn-md-red btn-icon-only btn-delete tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Delete">
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
                                                        <span class="caption-subject text-capitalize font-weight-500">
                                                            <?= !empty($language->site_edit_nonedu) ? $language->site_edit_nonedu : "Edit Non Education" ?>
                                                        </span>
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
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->site_name) ? $language->site_name : "Name" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control " name="achievement_name" placeholder="Brain Challenge 2016" value="<?php echo !empty($value['achievement_title']) ? $value['achievement_title'] : ''; ?>" required>
                                                                <span class="help-block small">
                                                                    <?= !empty($language->site_event) ? $language->site_event : "Event / Competition / Contest / Tournament you just joined" ?>
                                                                </span>
                                                            </div>

                                                        </div>

                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->description) ? $language->description : "Description" ?>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <?php 
                                                                    echo '<textarea class="form-control autosizeme no-resize" name="achievement_description" rows="4" placeholder="Describe about your studying place and what subject you had study.">';
                                                                    echo !empty($value['achievement_description']) ? $value['achievement_description'] : ''; 
                                                                    echo'</textarea>';
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <!-- TIme Period [REQUIRED] -->
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                                            </label>
                                                            <div class="col-md-9  ">
                                                                <div class="m-grid ">
                                                                    <div class="m-grid-col m-grid-col-xs-6">
                                                                        <input class="form-control form-control-inline date-picker-start" size="16" type="text" value="<?php echo !empty($value['achievement_start_date']) ? date('d-m-Y', strtotime($value['achievement_start_date'])) : date('d-m-Y') ;?>" name="start_date" id="StartDate2" placeholder="From year" required>
                                                                        <!-- <span class="help-block"> Select date </span> -->
                                                                    </div>
                                                                    <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                        <span class="help-block">
                                                                            <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                                        </span>
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
                                                                <span class="help-block small">
                                                                    <?= !empty($language->site_add_tag) ? $language->site_add_tag : "Press \"Tab\" to add tag" ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">
                                                            <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- # Empty State -->
                    <?php else: ?>
                    <div class="portlet height-600 flex-center ">
                        <div class="portlet-body text-center">
                            <i class="icon-rocket font-60 md-blue-grey-lighten-3-text"></i>
                            <h3 class=" text-center font-weight-600 font-28-md md-blue-grey-darken-2-text ">
                                <?= !empty($language->site_empty_nonedu) ? $language->site_empty_nonedu : "Let's get started... " ?>
                            </h3>
                            <h5 class="md-blue-grey-text mt-30 text-center px-160-md font-17-md">
                                <?= !empty($language->site_click_addnonedu) ? $language->site_click_addnonedu : "Start to create new non education info by summarize any activity / accomplishment / event / achievement you have participated related to your future career." ?>
                            </h5>
                            <div class="width-500 center-block mt-40">
                                <a href="#modal_add_achievements" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block">
                                    <i class="fa fa-plus  "></i>
                                    <?= !empty($language->site_add_noneduinfo) ? $language->site_add_noneduinfo : "New Achievements" ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>

                <!-- Tab Content : Project -->
                <div class="tab-pane <?=$tab_student == 'tab_project'?'active':' '?>" id='tab_project'>
                    <?php if (!empty($user_profile['projects'])): ?>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <i class="icon-badge"></i>
                                <span class="caption-subject font-weight-600">
                                    <?= !empty($language->site_skill) ? $language->site_skill : "Skills" ?>
                                </span>
                                <span class="caption-helper">
                                    <?= !empty($language->site_list_skill) ? $language->site_list_skill : "List out and summarize your acquire skill based by project you have participate." ?>
                                </span>
                            </div>
                            <div class="actions">
                                <a href="#modal_add_project" data-toggle="modal" class="btn btn-md-indigo  px-60">
                                    <i class="fa fa-plus"></i>
                                    <?= !empty($language->add) ? $language->add : "Add" ?>
                                </a>
                            </div>
                        </div>

                        <div class="portlet-body my-0 py-0">
                            <ul class="list-group list-border py-0">
                                <?php $i=1; foreach($user_profile['projects'] as $value){?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <!-- Content -->
                                        <div class="media-body">
                                            <!-- Project Name -->
                                            <h4 class="font-weight-700 letter-space-xs mt-0">
                                                <?php echo ucfirst($value['name']);?> </h4>

                                            <!-- Start / EndDate -->
                                            <h6 class="font-weight-400 roboto-font md-grey-darken-2-text font-15 ">
                                                <i class="fa fa-calendar mr-5"></i>
                                                <?php echo date('d F Y',strtotime($value['start_date'])); ?> -
                                                <?php echo ($value['end_date'] != '0000-00-00') ? date('d F Y',strtotime($value['start_date'])) : 'Now'; ?>
                                            </h6>

                                            <!-- DIVIDER only show when description or skill not empty -->
                                            <?php if (!empty($value['description']) || ($value['skills_acquired']) ){ ?>
                                            <hr class="border-medium width-100 border-md-amber mt-0 mb-10">
                                            <?php } ?>

                                            <!-- Description -->
                                            <?php if (!empty($value['description'])){ ?>
                                            <p class="roboto-font mt-20 multiline-truncate">
                                                <?php echo ucfirst($value['description']);?>
                                            </p>
                                            <?php } ?>

                                            <!-- Skill  -->
                                            <?php if (!empty($value['skills_acquired'])){ ?>
                                            <p class="font-weight-600 mb-10 text-uppercase font-15 mt-20">
                                                <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skills Earned" ?>
                                            </p>
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
                                        <div class="media-right">
                                            <!-- Edit Button  -->
                                            <a href="<?php echo base_url();?>student/profile#modal_edit_project_<?php echo $value['id'] ?>" data-toggle="modal" class="btn btn-md-cyan btn-icon-only tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Edit">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <div class="clearfix my-5"></div>
                                            <!-- Delete Button -->
                                            <a href="javascript:;" class="btn btn-md-red btn-icon-only btn-delete tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Delete" data-value="<?php echo $value['id'];?>" tb-val="user_projects">
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
                                                        <span class="caption-subject text-capitalize font-weight-500">
                                                            <?= !empty($language->site_edit_project) ? $language->site_edit_project : "Edit Project" ?>
                                                        </span>
                                                        <span class="caption-helper">
                                                            <?= !empty($language->site_skill_info) ? $language->site_skill_info : "add about your skill info based by project you involved" ?>
                                                        </span>
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
                                                                    <label class="control-label">
                                                                        <?= !empty($language->site_project_name) ? $language->site_project_name : "Nama Proyek" ?>
                                                                    </label>
                                                                    <input type="text" placeholder="Final Year Project" name="project_name" class="form-control" value="<?php echo ucfirst($value['name']); ?>" />
                                                                    <!-- <span class="help-block small"> Add your current status career info </span> -->
                                                                </div>
                                                            </div>
                                                            <!-- Time Period  -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label ">
                                                                        <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                                                    </label>
                                                                    <div class="m-grid ">
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="<?php echo ($value['start_date'] == '0000-00-00')? date('d-m-Y') : date('d-m-Y', strtotime($value['start_date'])); ?>" placeholder="From year" name="start_date" required>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                                            <span class="help-block">
                                                                                <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-grid-col m-grid-col-xs-6">
                                                                            <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="<?php echo ($value['end_date'] == '0000-00-00')? " " : date('d-m-Y', strtotime($value['end_date'])); ?>" placeholder="End Year" name="end_date">
                                                                            <span class="help-block md-checkbox has-warning mb-0">
                                                                                <input type="checkbox" id="checkbox<?php echo $i; ?>" class="md-check" name="current_date" <?php echo ($value[ 'end_date']=='0000-00-00' )? 'checked' : ''; ?>>
                                                                                <label for="checkbox<?php echo $i;?>">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    <small>
                                                                                        <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                                                    </small>
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
                                                                    <label class="control-label ">
                                                                        <?= !empty($language->description) ? $language->description : "Description" ?>
                                                                    </label>
                                                                    <?php
                                                                    echo '<textarea class="form-control autosizeme no-resize" name="project_description" rows="6" placeholder="Describe about your project progress.">';
                                                                    echo ucfirst($value['description']); 
                                                                    echo '</textarea>';
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <!-- Skill Earned -->
                                                            <div class="col-md-6">
                                                                <div class="form-group mx-0 mb-0">
                                                                    <label class="control-label">
                                                                        <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                                                    </label>
                                                                    <input type="text" class="form-control" value="<?php echo $value['skills_acquired']; ?>" data-role="tagsinput" name="skills">
                                                                    <span class="help-block small">
                                                                        <?= !empty($language->site_add_tag) ? $language->site_add_tag : "Press \"Tab\" to add tag" ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer form-actions px-30 md-grey-lighten-5">
                                                        <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs">
                                                            <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++;} ?>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="portlet height-600 flex-center ">
                        <div class="portlet-body text-center">
                            <i class="icon-rocket font-60 md-blue-grey-lighten-3-text"></i>
                            <h3 class=" text-center font-weight-600 font-28-md md-blue-grey-darken-2-text ">
                                <?= !empty($language->site_empty_skill) ? $language->site_empty_skill : "Let's get started..." ?>
                            </h3>
                            <h5 class="md-blue-grey-text mt-30 text-center px-160 font-17-md">
                                <?= !empty($language->site_click_addskill) ? $language->site_click_addskill : "Start to add your skill info on project you have involved either in academics nor work." ?>
                            </h5>
                            <div class="width-500 center-block mt-40">
                                <a href="#modal_add_project" data-toggle="modal" class="btn btn-md btn-md-indigo btn-block">
                                    <i class="fa fa-plus  "></i>
                                    <?= !empty($language->site_add_skill) ? $language->site_add_skill : "New Project" ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- ********************** MODAL ********************* -->
        <!-- Modal : Edit Profile -->
        <div class="modal fade in" id="modal_edit_profile" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content fade-in-up ">
                    <div class="portlet box mb-15 pb-0 ">
                        <div class="portlet-title tabbable-line md-darkblue tab-tw-md-orange px-30 ">
                            <div class="caption">
                                <span class="caption-subject">
                                    <?= !empty($language->site_update_profile) ? $language->site_update_profile : "Update Profile" ?>
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
                                        <i class="fa fa-language mr-5"></i>
                                        <?= !empty($language->language) ? $language->language : "Language" ?>
                                    </a>
                                </li>
                                <!-- Nav References -->
                                <li>
                                    <a data-toggle="tab" href="#tab_reference">
                                        <i class="fa fa-users mr-5"></i>
                                        <?= !empty($language->references) ? $language->references : "References" ?>
                                    </a>
                                </li>
                                <!-- Nav Picture -->
                                <li>
                                    <a data-toggle="tab" href="#tab_picture">
                                        <i class="fa fa-camera mr-5"></i>
                                        <?= !empty($language->site_profile_image) ? $language->site_profile_image : "Profile Image" ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form id="profile" action="<?php echo base_url(); ?>student/profile/post" method="POST" class="form" enctype="multipart/form-data">
                        <div class="modal-body ">
                            <div class="tab-content">
                                <!-- SECTION : Personal Info -->
                                <div class="tab-pane active fade-in-up" id="tab_personal">
                                    <!-- # Attribute : Full Name / User Status -->
                                    <div class="row ">
                                        <!-- Attribute : Full name -->
                                        <div class="col-sm-8">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_full_name ) ? $language->site_full_name  : "Full Name" ?>
                                                </label>
                                                <input type="text" class="form-control" name="fullname" placeholder="John Doe" value="<?php echo !empty($user_profile['overview']['name']) ? ucfirst($user_profile['overview']['name']) : '';?>" required>
                                            </div>
                                        </div>
                                        <!-- Attribute : User Status -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_current_career ) ? $language->site_current_career  : "Current Career" ?>
                                                </label>
                                                <div class="input-group">
                                                    <p class="form-control-static  md-indigo-text text-uppercase letter-space-xs font-weight-600 font-17">
                                                        <i class="icon-graduation mr-5 font-18"></i>
                                                        <?= !empty($language->student ) ? $language->student  : "Student" ?>
                                                    </p>
                                                    <?php if ($this->session->userdata('roles') == "student") { ?>
                                                        <div class="input-group-btn">
                                                            <a href="#" id="upgradeStatus" class="btn btn-md-orange btn-xs "><i class="fa fa-arrow-up mr-5"></i>Upgrade</a>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- # Attribute : Prefences Name / Gender / DOB -->
                                    <div class="row ">

                                        <!-- Attribute : Preferences Name -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_pref_name ) ? $language->site_pref_name  : "Preferences Name" ?>
                                                </label>
                                                <input type="text" class="form-control" placeholder="John" name="student_name" value="<?php echo !empty($user_profile['overview']['preference_name']) ? ucfirst($user_profile['overview']['preference_name']) : '';?>" required>
                                            </div>
                                        </div>

                                        <!-- Attribute : DOB -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->DOB ) ? $language->DOB  : "Date Of Birth" ?>
                                                </label>
                                                <input type="text" name="DOB" id="DOB" value="<?php echo !empty($user_profile['overview']['student_bios_DOB']) ? date('m/d/Y', strtotime($user_profile['overview']['student_bios_DOB'])) : date('d/m/Y');?>" class="form-control date-picker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" required>
                                            </div>
                                        </div>

                                        <!-- Attribute : Gender -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_gender ) ? $language->site_gender  : "Gender" ?>
                                                </label>
                                                <select class="form-control bs-select" name="gender">
                                                    <?php if (!empty($user_profile['overview']['student_bios_gender'])){ ?>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Male' ){echo "selected";}?>>
                                                        <?= !empty($language->male ) ? $language->male  : "Male" ?>
                                                    </option>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Female' ){echo "selected";}?>>
                                                        <?= !empty($language->female ) ? $language->female  : "Female" ?>
                                                    </option>
                                                    <option <?php if($user_profile[ 'overview'][ 'student_bios_gender']=='Prefer Not To Say' ){echo "selected";}?>>
                                                        <?= !empty($language->site_genderpref ) ? $language->site_genderpref  : "Prefer Not to Say" ?>
                                                    </option>
                                                    <?php }else{ ?>
                                                    <option>
                                                        <?= !empty($language->male ) ? $language->male  : "Male" ?>
                                                    </option>
                                                    <option>
                                                        <?= !empty($language->female ) ? $language->female  : "Female" ?>
                                                    </option>
                                                    <option>
                                                        <?= !empty($language->site_genderpref ) ? $language->site_genderpref  : "Prefer Not to Say" ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- # Attribute : Phone Number / Salary Expectation -->
                                    <div class="row ">
                                        <!-- Attribute : Phone Number -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->phone_number) ? $language->phone_number : "Phone Number" ?>
                                                </label>
                                                <input type="number" class="form-control" name="phone" placeholder="0123456789" value="<?php echo !empty($user_profile['overview']['student_bios_contact_number']) ? ucfirst($user_profile['overview']['student_bios_contact_number']) : '';?>" required>
                                            </div>
                                        </div>

                                        <!-- Attribute : Salary Expectation -->
                                        <div class=" col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_expected_salary) ? $language->site_expected_salary : "Salary Expectation" ?>
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <?php echo $this->session->userdata('forex'); ?>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="1000" name="expected_salary" value="<?php echo !empty($user_profile['overview']['expected_salary']) ? ucfirst($user_profile['overview']['expected_salary']) : '000';?>" required>
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                                <small class="helper-block md-grey-text mb-0">
                                                    <?= !empty($language->site_salary_expectation) ? $language->site_salary_expectation : "Your salary expectation" ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- # Title : Address -->
                                    <h4 class="font-18 letter-space-xs form-section  md-indigo-text text-uppercase font-weight-600 ">
                                        <?= !empty($language->address) ? $language->address : "Address" ?>
                                    </h4>
                                    <!-- # Attribute : Street / Postcode -->
                                    <div class="row">
                                        <!-- Attribute : Street -->
                                        <div class="col-sm-8">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->address) ? $language->address : "Address" ?>
                                                </label>
                                                <input type="text" class="form-control " name="address" placeholder="Unit / Lot , Road " value="<?php echo !empty($user_profile['address']['address']) ? $user_profile['address']['address']: '';?>" required>
                                            </div>
                                        </div>
                                        <!-- Attribute : Postcode -->
                                        <div class="col-sm-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->postcode) ? $language->postcode : "Postcode" ?>
                                                </label>
                                                <input type="text" class="form-control" name="post_code" placeholder="Postcode" value="<?php echo !empty($user_profile['address']['postcode']) ? ucfirst($user_profile['address']['postcode']) : '';?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- # Attribute : City / State / Country -->
                                    <div class="row">
                                        <!-- Attribute : City -->
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->city) ? $language->city : "City" ?>
                                                </label>
                                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo !empty($user_profile['address']['city']) ? ucfirst($user_profile['address']['city']) : '';?>" required>
                                            </div>
                                        </div>
                                        <!-- Attribute : State -->
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->state) ? $language->state : "State" ?>
                                                </label>
                                                <input type="text" class="form-control" name="state" placeholder="State" value="<?php echo !empty($user_profile['address']['states']) ? ucfirst($user_profile['address']['states']) : '';?>" required>
                                            </div>
                                        </div>
                                        <!-- Attribute : Country -->
                                        <div class="col-md-4">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->country) ? $language->country: "Country" ?>
                                                </label>
                                                <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo !empty($user_profile['address']['country']) ? ucfirst($user_profile['address']['country']) : '';?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- # Title : Summary / QOute -->
                                    <h4 class="font-18 letter-space-xs form-section md-indigo-text text-uppercase font-weight-600 ">
                                        <?= !empty($language->site_summarize) ? $language->site_summarize : "Summarize About Yourself" ?>
                                    </h4>
                                    <!-- Attribute : Quote -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_quote) ? $language->site_quote : "Quote" ?>
                                        </label>
                                        <?php
                                        echo '<textarea name="quotes" class="form-control autosizeme no-resize" id="" rows="2" placeholder="Add your quote / headlines">';
                                        echo !empty($user_profile['overview']['quote']) ? ucfirst($user_profile['overview']['quote']) : '';
                                        echo '</textarea>';
                                        ?>
                                    </div>
                                    <!-- About Yourself-->
                                    <div class="form-group mx-0 ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_about_you) ? $language->site_about_you : "About Yourself" ?>
                                        </label>
                                        <?php 
                                        echo '<textarea name="summary" class="form-control autosizeme no-resize" rows="4" placeholder="Summarize about yourself.">';
                                        echo !empty($user_profile['overview']['summary']) ? ucfirst($user_profile['overview']['summary']) : '';
                                        echo '</textarea>';
                                        ?>
                                    </div>

                                    <!-- Video Resume -->
                                    <h4 class="font-18 letter-space-xs form-section  md-indigo-text text-uppercase font-weight-600 ">
                                        <?= !empty($language->video_resume) ? $language->video_resume : "Video Resume" ?>
                                    </h4>
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_upload_video) ? $language->site_upload_video : " Upload your video link" ?>
                                        </label>
                                        <input type="text" name="youtubelink" class="form-control input-xlarge" placeholder="video link" value="<?php echo !empty($user_profile['overview']['youtubelink']) ? $user_profile['overview']['youtubelink'] : 'https://www.youtube.com/embed/xbmAA6eslqU';?>">
                                    </div>

                                </div>

                                <!-- SECTION : Language Proficiency -->
                                <div class="tab-pane fade-in-up " id="tab_language">
                                    <h4 class="font-18 letter-space-xs form-section  md-indigo-text text-uppercase font-weight-600 ">
                                        <?= !empty($language->site_lang_proficiency) ? $language->site_lang_proficiency : "Language Proficiency" ?>
                                    </h4>
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
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->language) ? $language->language : "Language" ?>
                                                        </label>
                                                        <select class="form-control " name="name">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_lang) ? $language->site_select_lang : "Select Language" ?>
                                                            </option>
                                                            <?php foreach ($languages as $key => $value) { ?>
                                                            <option <?php echo $user_language_value[ 'title']==$value[ 'name'] ? 'selected' : '' ?>>
                                                                <?php echo $value['name']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->written) ? $language->written : "Written" ?>
                                                        </label>
                                                        <select class="form-control" name="written">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_level) ? $language->site_select_level : "Select Level" ?>
                                                            </option>
                                                            <option value="Beginner" <?php echo $user_language_value[ 'written']=='Beginner' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_beginner) ? $language->site_beginner : "Beginner" ?>
                                                            </option>
                                                            <option value="Intermediate" <?php echo $user_language_value[ 'written']=='Intermediate' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_intermediate) ? $language->site_intermediate : "Intermediate" ?>
                                                            </option>
                                                            <option value="Advanced" <?php echo $user_language_value[ 'written']=='Advanced' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_advance) ? $language->site_advance : "Advanced" ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->spoken) ? $language->spoken : "Spoken" ?>
                                                        </label>
                                                        <select class="form-control" name="spoken">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_level) ? $language->site_select_level : "Select Level" ?>
                                                            </option>
                                                            <option value="Beginner" <?php echo $user_language_value[ 'spoken']=='Beginner' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_beginner) ? $language->site_beginner : "Beginner" ?>
                                                            </option>
                                                            <option value="Intermediate" <?php echo $user_language_value[ 'spoken']=='Intermediate' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_intermediate) ? $language->site_intermediate : "Intermediate" ?>
                                                            </option>
                                                            <option value="Advanced" <?php echo $user_language_value[ 'spoken']=='Advanced' ? 'selected' : '' ?>>
                                                                <?= !empty($language->site_advance) ? $language->site_advance : "Advanced" ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 vertical-bottom mt-45">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm  ">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php }
                                                    }else{ 
                                                ?>

                                                <div data-repeater-item class="row mt-20">
                                                    <!-- Attribute : Name Language  -->
                                                    <div class="col-md-4">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->language) ? $language->language : "Language" ?>
                                                        </label>
                                                        <select class="form-control " name="name">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_lang) ? $language->site_select_lang : "Select Language" ?>
                                                            </option>
                                                            <?php foreach ($languages as $key => $value) { ?>
                                                            <option>
                                                                <?php echo $value['name']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Attribute : Spoken  -->
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->written) ? $language->written : "Written" ?>
                                                        </label>
                                                        <select class="form-control" name="written">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_level) ? $language->site_select_level : "Select Level" ?>
                                                            </option>
                                                            <option value="Beginner">
                                                                <?= !empty($language->site_beginner) ? $language->site_beginner : "Beginner" ?>
                                                            </option>
                                                            <option value="Intermediate">
                                                                <?= !empty($language->site_intermediate) ? $language->site_intermediate : "Intermediate" ?>
                                                            </option>
                                                            <option value="Advanced">
                                                                <?= !empty($language->site_advance) ? $language->site_advance : "Advanced" ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- Attribute : Written  -->
                                                    <div class="col-md-3">
                                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                            <?= !empty($language->spoken) ? $language->spoken : "Spoken" ?>
                                                        </label>
                                                        <select class="form-control" name="spoken">
                                                            <option disabled selected>
                                                                <?= !empty($language->site_select_level) ? $language->site_select_level : "Select Level" ?>
                                                            </option>
                                                            <option value="Beginner">
                                                                <?= !empty($language->site_beginner) ? $language->site_beginner : "Beginner" ?>
                                                            </option>
                                                            <option value="Intermediate">
                                                                <?= !empty($language->site_intermediate) ? $language->site_intermediate : "Intermediate" ?>
                                                            </option>
                                                            <option value="Advanced">
                                                                <?= !empty($language->site_advance) ? $language->site_advance : "Advanced" ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- Button Remove -->
                                                    <div class="col-md-2 pt-45">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-md-red btn-sm ">
                                                            <i class="fa fa-close mr-5"></i>
                                                            <?= !empty($language->site_remove) ? $language->site_remove : "Remove" ?>
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php } ?>
                                            </div>
                                            <hr>
                                            <div class="mx-100">
                                                <a href="javascript:;" data-repeater-create class="btn btn-md-blue mt-repeater-add btn-block letter-space-sm font-14 text-uppercase font-weight-600  ">
                                                    <i class="fa fa-plus mr-5"></i>
                                                    <?= !empty($language->add_new_lang) ? $language->add_new_lang : "New Language" ?>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- SECTION : Reference -->
                                <div class="tab-pane fade-in-up" id="tab_reference">
                                    <h4 class="form-section font-weight-600 text-uppercase md-indigo-text">
                                        <?= !empty($language->references) ? $language->references : "References" ?>
                                    </h4>
                                    <div class="row mx-0">
                                        <div class="note note-info note-bordered">
                                            <h5 class="font-weight-400 letter-space-xs my-20">
                                                <b>
                                                    <?= !empty($language->site_note) ? $language->site_note : "Note" ?>
                                                </b> :
                                                <?= !empty($language->site_put) ? $language->site_put : "Put only 3 people as your reference" ?>
                                            </h5>
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
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->site_name) ? $language->site_name : "Name" ?>
                                                            </label>
                                                            <div class="input-icon">
                                                                <i class="icon-user"></i>
                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control" value="<?=$reference_value['reference_name']?>">
                                                            </div>
                                                        </div>
                                                        <!-- Email Address -->
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->email_address) ? $language->email_address : "Email Address" ?>
                                                            </label>
                                                            <div class="input-icon">
                                                                <i class="icon-envelope"></i>
                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control" value="<?=$reference_value['reference_email']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- # Relationship -->
                                                    <div class="col-md-5">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->relationship) ? $language->relationship : "Relationship" ?>
                                                            </label>
                                                            <input type="text" name="reference_relationship" placeholder="ex. Former employer" class="form-control" value="<?=$reference_value['reference_relationship']?>">
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->site_contact_number) ? $language->site_contact_number : "Contact Number" ?>
                                                            </label>
                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control" value="<?=$reference_value['reference_phone']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 pt-100">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-md-red btn-icon-only">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php }}else{?>
                                                <div data-repeater-item class=" row mt-20">
                                                    <div class="col-md-6">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->site_name) ? $language->site_name : "Name" ?>
                                                            </label>
                                                            <div class="input-icon">
                                                                <i class="icon-user"></i>
                                                                <input type="text" name="reference_name" placeholder="Name" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->email_address) ? $language->email_address : "Email Address" ?>
                                                            </label>
                                                            <div class="input-icon">
                                                                <i class="icon-envelope"></i>
                                                                <input type="text" name="reference_email" placeholder="Email address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->relationship) ? $language->relationship : "Relationship" ?>
                                                            </label>
                                                            <input type="text" name="reference_relationship" placeholder="ex. Former employer" class="form-control">
                                                        </div>
                                                        <div class="form-group mx-0">
                                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                                <?= !empty($language->site_contact_number) ? $language->site_contact_number : "Contact Number" ?>
                                                            </label>
                                                            <input type="text" name="reference_phone" placeholder="Phone Number" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 pt-100">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-md-red btn-icon-only ">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php }?>

                                            </div>
                                            <hr>
                                            <div class="mx-100">
                                                <a href="javascript:;" data-repeater-create class="btn btn-md-blue mt-repeater-add btn-block ">
                                                    <i class="fa fa-plus"></i>
                                                    <?= !empty($language->site_add_new) ? $language->site_add_new : "New Referer" ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- SECTION : Profile Picture -->
                                <div class="tab-pane fade-in-up " id="tab_picture">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_profile_image) ? $language->site_profile_image : "Profile Image" ?>
                                                </label>
                                                <br>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="<?php echo $checkGetProfileImage[0] == 'HTTP/1.1 200 OK' ?  IMG_STUDENTS.$user_profile['profile_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn btn-md-grey btn-file">
                                                            <span class="fileinput-new">
                                                                <?= !empty($language->site_select_image) ? $language->site_select_image : "Select Image" ?>
                                                            </span>
                                                            <span class="fileinput-exists">
                                                                <?= !empty($language->site_change) ? $language->site_change : "Change" ?>
                                                            </span>
                                                            <input type="file" name="profile_photo"> </span>
                                                        <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput">
                                                            <?= !empty($language->site_remove) ? $language->site_remove : "Remove" ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_header) ? $language->site_header : "Header Image" ?>
                                                </label>
                                                <br>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="<?php echo $checkGetHeaderImage[0] == 'HTTP/1.1 200 OK' ?  IMG_STUDENTS.$user_profile['header_photo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'; ?>" alt="Profile Picture"> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn btn-md-grey btn-file">
                                                            <span class="fileinput-new">
                                                                <?= !empty($language->site_select_image) ? $language->site_select_image : "Select Image" ?>
                                                            </span>
                                                            <span class="fileinput-exists">
                                                                <?= !empty($language->site_change) ? $language->site_change : "Change" ?>
                                                            </span>
                                                            <input type="file" name="header_photo"> </span>
                                                        <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput">
                                                            <?= !empty($language->site_remove) ? $language->site_remove : "Remove" ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-md-indigo  width-250 letter-space-xs pull-right">
                                <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Education -->
        <div class="modal fade in" id="modal_add_education" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content fade-in-up">
                    <div class="modal-header ">
                        <h4 class="modal-title">
                            <?= !empty($language->site_add_edu) ? $language->site_add_edu : "Add Education" ?>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </h4>
                    </div>
                    <form action="<?php echo base_url();?>student/profile/add_education" method="POST" class="form">
                        <input type="hidden" name="academic_id"></input>
                        <div class="modal-body fade-in-up">
                            <!-- # Attribute : Institution Name / Time Period -->
                            <div class="row">
                                <!-- Attribute : Institution Name -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->institution) ? $language->institution : "Institution Name" ?>
                                        </label>
                                        <input type="text" class="form-control" name="university_name" placeholder="The National University of Malaysia" required>
                                        <span class="help-block font-15">University / School / Institute Name</span>

                                    </div>
                                </div>
                                <!-- Attribute : Time Period  -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                        </label>

                                        <div class="m-grid ">
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker date-picker-start " size="16" type="text" placeholder="From year" name="from" required>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                <span class="help-block">
                                                    <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                </span>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker date-picker-end input-date-picker-end" size="16" type="text" placeholder="End Year" name="until" required>
                                                <span class="help-block md-checkbox has-warning">
                                                    <input type="checkbox" id="add_education" class="md-check md-check-edu-add" name="current_date">
                                                    <label for="add_education">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- # Attribute : Qualifications Level / Field Of Study -->
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <!-- Attribute : Qualifications Level -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->qualification) ? $language->qualification : "Qualification Level" ?>
                                        </label>
                                        <input type="text" class="form-control " placeholder="Bachelor&#39;s Degree" name="qualification_level" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <!--Attribute : Field Of Study-->
                                    <div class="form-group">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_studyfield) ? $language->site_studyfield : "Field of Study" ?>
                                        </label>
                                        <input type="text" class="form-control " name="field_of_study" placeholder="Economy" required>
                                        <span class="help-block"> Course Name / Module Class / Stream Class</span>
                                    </div>
                                </div>
                            </div>




                            <!-- # Attribute : Description -->
                            <div class="form-group">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                    <?= !empty($language->description) ? $language->description : "Description" ?>
                                </label>
                                <textarea class="form-control autosizeme no-resize" rows="4" placeholder="Summarize your experience studying in here." name="academics_description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-md-indigo  width-200">
                                <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Experience  -->
        <div class="modal fade in" id="modal_add_experience" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content fade-in-up">
                    <!-- Modal : Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <?= !empty($language->site_add_work) ? $language->site_add_work : "Add Experience" ?>
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </h4>
                    </div>
                    <form action="<?php echo base_url()?>student/profile/add_experience" method="POST" class="form">
                        <div class="modal-body fade-in-up">
                            <!-- # Attribute : Job Post & Time Period -->
                            <div class="row ">
                                <!-- Attribute : Job Position Title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_job_title) ? $language->site_job_title : "Job Position Title" ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Internship In Marketing Department" name="title" required>
                                        <span class="help-block small">
                                            <?= !empty($language->site_add_current_career) ? $language->site_add_current_career : "Your previous job position title" ?>
                                        </span>
                                    </div>
                                </div>
                                <!-- Attribute : Time Period -->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                        </label>
                                        <div class="m-grid ">
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-start" size="16" type="text" value="" placeholder="From year" name="start_date" required>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                <span class="help-block">
                                                    <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                </span>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-end input-date-picker-end" name="end_date" size="16" type="text" value="" placeholder="End Year" required>
                                                <span class="help-block md-checkbox has-warning">
                                                    <input type="checkbox" id="add_experience" class="md-check md-check-add-experience" name="current_date">
                                                    <label for="add_experience">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- # Attribute : Company Name / Job Employement Type / Industry -->
                            <div class="row ">
                                <!-- Attribute : Company Name -->
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_company_name) ? $language->site_company_name : "Company Name" ?>
                                        </label>
                                        <input type="text" class="form-control " name="company_name" placeholder="Company #1 Sdn Bhd" required>
                                    </div>
                                </div>

                                <!-- # Attribute : Job Employement Type  / Industry -->
                                <div class="col-md-6">
                                    <div class="row ">
                                        <!-- Attribute : Job Employement Type -->
                                        <div class="col-md-6">
                                            <div class="form-group mx-0 ">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_employment_type) ? $language->site_employment_type : "Employment Type" ?>
                                                </label>
                                                <select class="form-control bs-select" name="employment_type" title="Select employment">
                                                    <?php foreach ($employment_types as $key => $value) {?>
                                                    <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>">
                                                        <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-inline">
                                                    <?= !empty($language->site_prev_employment) ? $language->site_prev_employment : "Previous employement type" ?>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Attribute : Industry -->
                                        <div class="col-md-6 ">
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                                    <?= !empty($language->site_company_industry) ? $language->site_company_industry : "Company Industry" ?>
                                                </label>
                                                <select class="form-control bs-select" name="industry" title="Select Industry">
                                                    <?php foreach ($industries as $key => $value) {?>
                                                    <option value="<?php echo !empty($value['id']) ? $value['id'] : ''?>">
                                                        <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-inline">
                                                    <?= !empty($language->site_add_company_industry) ? $language->site_add_company_industry : "Add your company industries" ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--# Attribute : Description -->
                            <div class="form-group ">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                    <?= !empty($language->description) ? $language->description : "Description" ?>
                                </label>
                                <textarea class="form-control autosizeme no-resize" rows="4" placeholder="Summarize your working experience." name="description"></textarea>
                            </div>

                            <!-- Skill Earned -->

                            <div class="form-group mx-0 ">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                    <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                </label>
                                <input type="text" class="form-control" value="Time Management,Banking,Design,Wealth Management" data-role="tagsinput" name="skills">
                                <span class="help-inline">
                                    <?= !empty($language->site_add_tag) ? $language->site_add_tag : "Press \"Tab\" to add tag" ?>
                                </span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-md-indigo width-200">
                                <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Achievements  -->
        <div class="modal fade in" id="modal_add_achievements" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content  fade-in-up">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <?= !empty($language->site_add_nonedu) ? $language->site_add_nonedu : " Add Non Education" ?>
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </h4>
                    </div>
                    <form method="POST" id="achievement" class="form " action="<?php echo base_url()?>student/profile/add_achievement">
                        <div class="modal-body fade-in-up">
                            <!-- # Attribute : Name / Time Period -->
                            <div class="row">
                                <!-- Attribute: Name -->
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_name) ? $language->site_name : "Name" ?>
                                        </label>
                                        <input type="text" class="form-control " id="achievement_name" name="achievement_name" placeholder="Brain Challenge 2016" required>
                                        <span class="help-inline">
                                            <?= !empty($language->site_event) ? $language->site_event : "Event / Competition / Contest / Tournament you just joined" ?>
                                        </span>

                                    </div>
                                </div>
                                <!-- Attribute : Time Period  -->
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                        </label>

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
                            </div>


                            <!--# Attribute : Description -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                    <?= !empty($language->description) ? $language->description : "Description" ?>
                                </label>
                                <textarea id="achievement_description" name="achievement_description" class="form-control autosizeme no-resize" rows="4" placeholder="Summarize your experience involvement in this event/achievement/contest and etc." data-autosize-on="true"></textarea>
                            </div>


                            <!-- # Attribute : Skill Earned -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">
                                    <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                </label>

                                <input type="text" class="form-control input-large" value="Communication,Leadership Protegee,Teamwork,Problem Solving" data-role="tagsinput" style="display: none;" name="tag">
                                <span class="help-inline">
                                    <?= !empty($language->site_add_tag) ? $language->site_add_tag : "Press \"Tab\" to add tag" ?>
                                </span>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-md-indigo  width-200">
                                <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Modal : Add Project -->
        <div class="modal fade in" id="modal_add_project" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">

                            <?= !empty($language->site_new_project) ? $language->site_new_project : "Add Project" ?>
                                <button type="button" class="close " data-dismiss="modal" aria-hidden="true"></button>
                        </h4>

                    </div>
                    <form class="form" action="<?php echo base_url();?>student/profile/add_project" method="POST">
                        <div class="modal-body fade-in-up">

                            <!-- # Attribute : Project Title & Time Period -->
                            <div class="row ">
                            <!-- Attribute : Project Title -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">

                                            <?= !empty($language->site_project_name) ? $language->site_project_name : "Project Name" ?>
                                        </label>
                                        <input type="text" class="form-control " placeholder="Internship in IT Dept" name="project_name" required>
                                        <!-- <span class="help-block small"> Add your current status career info </span> -->
                                    </div>
                                </div>
                                <!-- Attribute : Time Period -->
                                <div class="col-md-6">
                                    <!-- TIme Period  -->
                                    <div class="form-group mx-0 mb-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">

                                            <?= !empty($language->site_time_period) ? $language->site_time_period : "Time Period" ?>
                                        </label>

                                        <div class="m-grid ">
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-start " size="16" type="text" value="" placeholder="From year" name="start_date" required>
                                                <!-- <span class="help-block"> Select date </span> -->
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-1 m-grid-col-center">
                                                <span class="help-block">
                                                    <?= !empty($language->site_to) ? $language->site_to : "to" ?>
                                                </span>
                                            </div>
                                            <div class="m-grid-col m-grid-col-xs-6">
                                                <input class="form-control form-control-inline date-picker-end" size="16" type="text" value="" placeholder="End Year" name="end_date">
                                                <span class="help-block md-checkbox has-warning mb-0">
                                                    <input type="checkbox" id="checkbox_add_project" class="md-check" name="current_date">
                                                    <label for="checkbox_add_project">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        <small>
                                                            <?= !empty($language->site_study_checkbox) ? $language->site_study_checkbox : "Currently?" ?>
                                                        </small>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--# Attribute :  Description -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">

                                    <?= !empty($language->description) ? $language->description : "Description" ?>
                                </label>
                                <textarea class="form-control autosizeme no-resize" rows="4" placeholder="Summarize how you acquire skill by involve in this project." name="project_description"></textarea>
                            </div>

                            <!-- # Attribute : Skill Earned -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">

                                    <?= !empty($language->site_skill_earned) ? $language->site_skill_earned : "Skill Earned" ?>
                                </label>
                                <input type="text" class="form-control" id="tagsinput" value="Design,Reporting,Editing Video,Graphic Designer" data-role="tagsinput" name="skills">
                                <span class="help-block small">
                                    <?= !empty($language->site_enter_tag) ? $language->site_enter_tag : "Press \"Enter\" to add tag" ?>
                                </span>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-md-indigo  width-200">
                                <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal : Print Resume -->
        <div class="modal fade in" id="modal_print_resume" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content fade-in-up">
                    <div class="modal-body p-0">
                        <div class="m-grid">
                            <div class="m-grid-col">
                                <div class="panel my-0 ">
                                    <div class="panel-body md-grey-light my-0 py-30">

                                        <img src="<?php echo IMG; ?>print/print-v1-blank.jpg" class="img-responsive height-450 center-block" alt="">
                                    </div>
                                    <div class="panel-footer md-grey-light border-none text-center">
                                        <div class="form-group ">
                                            <input type="radio" name="print" value="Style 1" checked>
                                            <label for="">Style 1</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col">
                                <div class="panel my-0">
                                    <div class="panel-body py-30">
                                        <img src="<?php echo IMG; ?>print/print-v3-blank.jpg" class="img-responsive height-450 center-block" alt="">
                                    </div>
                                    <div class="panel-footer  border-none text-center md-transparent">
                                        <div class="form-group ">
                                            <input type="radio" name="print" value="Style 2">
                                            <label for="">Style 2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-grid-col">
                                <div class="panel my-0">
                                    <div class="panel-body md-grey-light py-30">
                                        <img src="<?php echo IMG; ?>print/print-v5-blank.jpg" class="img-responsive height-450 center-block" alt="">
                                    </div>
                                    <div class="panel-footer md-grey-light border-none text-center">
                                        <div class="form-group ">
                                            <input type="radio" name="print" value="Style 3">
                                            <label for="">Style 3</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-md-indigo">
                            <i class="icon-printer mr-5"></i>Print</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ********************** End MODAL ********************* -->
    </div>
</div>
