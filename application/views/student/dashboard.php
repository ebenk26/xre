<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Welcome back ,
            <?php echo ucfirst($this->session->userdata('name'));?>!
            <small>last login on
                <?php echo !empty($last_logged_in[count($last_logged_in)-2]['user_history']) ? date('d F Y H:i:m', strtotime($last_logged_in[count($last_logged_in)-2]['user_history'])) : date('d F Y H:i:m'); ?> </small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url().'student/dashboard'; ?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->

        <!-- Widget-Dashboard / Video Resume -->
        <div class="row">
            <!-- # Widget -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- # Widget : Profile Seen -->
                <div class="dashboard-stat2  ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="<?=$users['overview']['number_of_seen'] != null?$users['overview']['number_of_seen']:0?>">0</span>
                            </h3>
                            <small class="text-uppercase">Profile Seen</small>
                        </div>
                        <div class="icon">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <!-- # Widget : Profile Rating -->
                <div class="dashboard-stat2 ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="md-red-text">
                                <span data-counter="counterup" data-value="<?=$rate?>"></span>
                            </h3>
                            <small class="text-uppercase">Your Profile Rate</small>
                        </div>
                        <div class="icon">
                            <i class="icon-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- # Widget : Upcoming Interview -->
                <div class="dashboard-stat2 ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="<?=$upcoming_interview['upcoming_interview_number']?>"></span>
                            </h3>
                            <small class="text-uppercase">Upcoming Interview</small>
                        </div>
                        <div class="icon">
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                </div>
                <?php $new_job = 0;foreach ($job_positions_new as $key => $value) {$new_job++;}?>
                <!-- # Widget : Latest Job Vacancy -->
                <div class="dashboard-stat2 ">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="<?=$new_job?>"></span>
                            </h3>
                            <small class="text-uppercase">New Job Vacancy</small>
                        </div>
                        <div class="icon">
                            <i class="icon-briefcase"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- # Video -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <div class="portlet light  height-350">
                    <div class="col-md-7 col-xs-12">
                        <div class="my-55">
                            <h2 class="mb-30">Interested in video resume</h2>
                            <h5>Check it out more by click play button</h5>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <!-- <div class=""> -->
                        <!-- <i class="icon-control-play font-26"></i> -->
                        <div class="embed-responsive embed-responsive-4by3 my-45 ">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xbmAA6eslqU"></iframe>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Find Job-->
        <div class="row mx-0 mb-30 ">
            <div class="portlet ">
                <!-- TITLE  -->
                <div class="media">
                    <div class="media-body">
                        <h2 class="text-none mb-10">What we just found for you!
                            <!-- <span class="font-24 label label-md-indigo">30 new job</span> -->
                        </h2>
                    </div>
                    <div class="media-right media-bottom">
                        <a href="<?=base_url()?>job/search" target="_blank" class="btn btn-outline btn-md-darkblue mb-0">View All Job Dashboard</a>
                        <!-- <a href="student-settings.html" class="btn btn-outline btn-md-indigo mt-4">
                        <i class="icon-settings"></i>Job Preferences</a> -->
                    </div>
                </div>

                <hr class="border-mdo-darkblue-v1 ">

                <!-- CONTENT -->
                <!-- NOTE :  Only extract latest 1 week job have been posted and based user preferences or put limit only latest 10 job been posted will be show-->
                <!-- @IF empty / No Info -->
                <!-- <div class="portlet mt-height-50-percent  md-shadow-none"> -->
                <!-- <div class="portlet-body px-18 py-10">
                    <h2 class="text-center font-weight-500 md-indigo-text"> Set up your job preferences! </h2>
                    <h5 class="text-center font-26-xs font-grey-cascade mt-4">Tired for waiting your job preference? Why not set up your job preferences by click
                        <b> '
                            <i class="icon-settings mr-2"></i>Job Preferences ' </b> and we will search and automatically notify your preferences!!</h5>
                </div> -->
                <!-- </div> -->

                <!-- @ ELSE IF CONTENT less than and equal to 6  : button load do not have to appear -->

                <?php                    
                    //Columns must be a factor of 12 (1,2,3,4,6,12)
                    $numOfCols = 3;
                    $colCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    $maxCol = 6;
                    ?>
                <div class="row mb-30 ">
                    <?php
                    foreach ($job_positions_new as $key => $value) {      
                    ?>
                        <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                            <div class="media md-white px-20 py-30">
                                <div class="media-body">
                                    <div class="media mx-0">
                                        <!-- # Post Title / Company Name / Time posted -->
                                        <div class="media-body">
                                            <!-- # Post Title -->
                                            <h4 class="font-weight-600 font-20">
                                                <a class="md-black-text md-indigo-text-hover" href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['job_id']), '=');?>" target="_blank">
                                                    <?php echo $value['job_post'] ?>
                                                </a>
                                            </h4>
                                            <!-- # Company Name -->
                                            <h5 class="font-weight-400 text-capitalize">
                                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($value['user_id']), '=');?>" target="_blank">
                                                    <?php echo $value['company_name'] ?>
                                                </a>
                                            </h5>
                                            <!-- # Post Date Released -->
                                            <small class="font-grey-salsa mb-0">
                                                <i class="icon-calendar mr-5"></i>
                                                <?php echo time_elapsed_string($value['job_created_time']); ?>
                                            </small>
                                        </div>
                                        <!-- # Company Profile Picture -->
                                        <div class="media-right">
                                            <img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG.'/site/profile-pic.png'; ?>" alt="<?php echo $value['company_name'] ?>" class="avatar avatar-tiny avatar-circle mr-10">
                                        </div>
                                    </div>
                                    <hr class="my-20">
                                    <!-- # Label -->
                                    <!-- [Done] Fix : All label will be hidden if empty  -->
                                    <ul class="list-unstyled list-inline mt-ul-li-lr-0  mx-0">
                                        <!-- Location -->
                                                <!-- <?php var_dump($value) ?> -->
                                        <?php if (!empty($value['country_name'])) {?>
                                        <li class="mb-10 px-0">
                                            <p class="label label-md-purple label-sm font-12 letter-space-xs">
                                                <i class="fa fa-map-marker "></i>
                                                <?php echo $value['country_name'] ?>
                                            </p>
                                        </li>
                                        <?php } ?>
                                        <!-- Salary -->
                                        <?php if (!empty($value['min_budget']) || ($value['max_budget']) ) {?>
                                        <li class=" mb-10">
                                            <p class="label label-md-green label-sm font-12 letter-space-xs">
                                                <i class="fa fa-usd"></i>
                                                <?php echo $this->session->userdata('forex') ?>
                                                <?php echo $value['min_budget']; ?> -
                                                <?php echo $this->session->userdata('forex') ?>
                                                <?php echo $value['max_budget']; ?>
                                            </p>
                                        </li>
                                        <?php } ?>
                                        <!-- Industry -->
                                        <?php if (!empty($value['industry_name'])) {?>
                                        <li class=" mb-10">
                                            <p class="label label-md-blue-grey label-sm font-12 letter-space-xs">
                                                <i class="fa fa-industry"></i>
                                                <?php echo $value['industry_name'] ?>
                                            </p>
                                        </li>
                                        <?php } ?>
                                        <!-- Employment Type -->
                                        <?php if (!empty($value['employment_name'])) {?>
                                        <li class=" mb-10 px-0 ">
                                            <p class="label label-md-blue label-sm font-12 letter-space-xs">
                                                <i class="fa fa-briefcase"></i>
                                                <?php echo $value['employment_name'] ;?>
                                            </p>
                                        </li>
                                        <?php } ?>

                                        <!-- Position -->
                                        <?php if (!empty($value['position_name'])) {?>
                                        <li class=" mb-10">
                                            <p class="label label-md-deep-purple label-sm  font-12 letter-space-xs">
                                                <i class="fa fa-sitemap"></i>
                                                <?php echo $value['position_name'] ?>
                                            </p>
                                        </li>
                                        <?php } ?>

                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                        $colCount++;
                        // echo $colCount;
                        if ($colCount < $maxCol){
                        if($colCount % $numOfCols == 0) { echo '</div><div class="row">'; }                                            
                         }
                         else{
                             break;
                         }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Widget : Feed & Article -->
        <div class="row">
            <!-- # Tab : New join /  Interview / Recent Activities -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="portlet light tasks-widget">
                    <!-- Tab  -->
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-directions font-dark"></i>
                            <span class="caption-subject font-dark font-weight-600  text-uppercase">Info</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_join" data-toggle="tab">
                                    <i class="icon-users"></i> New Join </a>
                            </li>
                            <li>
                                <a href="#tab_interview" data-toggle="tab">
                                    <i class="icon-calendar"></i> Interview </a>
                            </li>
                            <li>
                                <a href="#tab_activity" data-toggle="tab">
                                    <i class="icon-rocket"></i> Recent Activities </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- Tab : New Join User -->
                            <div class="tab-pane active" id="tab_join">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="1" data-handle-color="#D7DCE2">
                                    <div class="mt-comments-v2">
                                        <!-- IF (!empty) -->
                                        <?php $shown_new = 0;foreach($new_join as $row){$shown_new++;?>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <?php if($row->profile_photo != ""){?>
                                                <img src="<?=IMG_STUDENTS.$row->profile_photo;?>" style="height:35px;margin-right:10px;" />
                                                <?php }?>
                                            </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <a href="<?=base_url()?>profile/user/<?=rtrim(base64_encode($row->id), '=');?>" target="_blank">
                                                        <span class="mt-comment-author">
                                                            <?=$row->fullname?>
                                                        </span>
                                                    </a>
                                                    <span class="mt-comment-date">
                                                        <?=date('j M Y H:i A', strtotime($row->created_at))?>
                                                    </span>
                                                </div>
                                                <div class="mt-comment-text">
                                                    <?=$row->quote != ""?$row->quote:""?>
                                                </div>

                                            </div>
                                        </div>
                                        <?php }?>

                                        <!-- ELSE -->
                                        <?php if($shown_new == 0){?>
                                        <div class="portlet light md-grey-lighten-5">
                                            <div class="portlet-body p-80 text-center">
                                                <i class="icon-users font-50 md-indigo-text"></i>
                                                <h3 class="text-center font-weight-500 md-indigo-text"> No new join student.</h3>
                                                <h5 class="text-center font-grey-cascade mt-20">New registered student since your last logged in</h5>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB  : Interview Session -->
                            <!-- [Done] Add EMPTY STATE -->
                            <div class="tab-pane " id="tab_interview">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <!-- IF (!empty) -->
                                    <div class="general-item-list">
                                        <?php $shown_interview = 0;foreach($upcoming_interview['upcoming_interview'] as $row){ $shown_interview++;?>
                                        <div class="item">
                                            <div class="item-head">
                                                <div class="item-details">
                                                    <img class="item-pic rounded" src="<?=$row->profile_photo != " "?IMG_EMPLOYERS.$row->profile_photo:IMG.'/site/profile-pic.png'; ?>">
                                                    <a href="<?=base_url()?>profile/company/<?=rtrim(base64_encode($row->employer_id),'=') ?>" target="_blank" class="item-name primary-link">
                                                        <?=$row->company_name?>
                                                    </a>
                                                    <span class="item-label">
                                                        <?=date('j F Y H:i A', strtotime($row->start_date))?>
                                                    </span>
                                                </div>
                                                <span class="item-status">
                                                    <span class="badge badge-empty badge-danger mr-10"></span>Upcoming</span>
                                                </span>
                                            </div>
                                            <div class="item-body">
                                                <a href="<?=base_url()?>job/details/<?=rtrim(base64_encode($row->job_id),'=') ?>" target="_blank" class="item-name primary-link">
                                                    <b>[
                                                        <?=$row->position?>]</b>
                                                </a>
                                                <?=$row->description?>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <!-- ELSE -->
                                    <?php if($shown_interview == 0){?>
                                    <div class="portlet light md-grey-lighten-5">
                                        <div class="portlet-body p-80">
                                            <h3 class="text-center font-weight-500 md-indigo-text"> You have no interview invitation yet.</h3>
                                            <h5 class="text-center font-grey-cascade mt-20">Search job that suitable to built your career ! If not , update your profile</h5>
                                            <a href="<?=base_url()?>student/profile" class="btn btn-outline btn-md-indigo center-block mt-50">Update Profile ! </a>

                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>

                            <!-- TAB : Recent Activities -->
                            <!-- [Done] Add EMPTY STATE -->
                            <div class="tab-pane " id="tab_activity">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <ul class="feeds">
                                        <!-- IF (!empty) -->
                                        <?php if(!empty($recent_activities)){?>
                                        <?php foreach($recent_activities as $row){?>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-<?=$row->label?>">
                                                            <i class="fa <?=$row->icon?>"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc">
                                                            <?=$row->activity?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date">
                                                    <?=time_elapsed_string($row->created_at)?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <?php }else{?>
                                        <!-- # Empty State -->
                                        <div class="portlet light md-grey-lighten-5">
                                            <div class="portlet-body p-80 text-center">
                                                <i class="icon-ghost font-50 md-indigo-text"></i>
                                                <h3 class="text-center font-weight-500 md-indigo-text"> It's empty.</h3>
                                                <h5 class="text-center font-grey-cascade mt-20">There is no recent activities found in your account.</h5>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- # Article  -->
            <div class="col-md-6 col-xs-12 col-sm-12">
                <div id="carousel-example-generic-v2" class="carousel slide widget-carousel " data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators carousel-indicators-red py-40 ">
                        <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner " role="listbox">
                        <?php $i = 1;foreach ($article as $row) { ?>
                        <div class="item   <?=$i == 1?" active ":" "?>">
                            <!-- BEGIN WIDGET BLOG -->
                            <div class="widget-blog text-center mb-30 py-110" style=" background: url('<?= !empty($row->featured_image) ?IMG.'/article/'.$row->featured_image : IMG.'/site/dawn.jpg'; ?>'">
                                <div class="widget-blog-heading text-uppercase">
                                    <h3 class="widget-blog-title md-white-text">
                                        <?=$row->title?>
                                    </h3>
                                    <span class="widget-blog-subtitle mdo-white-v7-text">
                                        <?=date('j F Y', strtotime($row->created_at))?>
                                    </span>
                                </div>
                                <p class="mdo-white-v7-text">
                                    <?= strlen($row->excerpt) > 250?preg_replace('/\W\w+\s*(\W*)$/', '$1', substr($row->excerpt, 0 , 250))."...":$row->excerpt; ?>
                                </p>
                                <br/>
                                <a class="btn btn-md-orange text-uppercase" href="<?=base_url()?>article/<?=$row->slug?>" target="_blank">Read More</a>
                            </div>
                            <!-- END WIDGET BLOG -->
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
