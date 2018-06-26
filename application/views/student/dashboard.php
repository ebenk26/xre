<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        
        <!-- # Section : Page Header -->
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
                <li >
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        

        <!-- # Section : Video Resume & Profile Seen & Profile Rate & Upcoming Interview -->
        <div class="m-grid m-grid-responsive-xs mb-30">
            <!-- # Widget -->
            <div class="m-grid-col m-grid-col-md-4 pr-20-md ">
                <!-- # Widget : Profile Seen -->
                <div class="dashboard-stat2 pb-25 ">
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
                <div class="dashboard-stat2 pb-25">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="md-red-text">
                                <span data-counter="counterup" data-value="<?=$rate?>">0</span>
                            </h3>
                            <small class="text-uppercase">Your Profile Rate</small>
                        </div>
                        <div class="icon">
                            <i class="icon-star"></i>
                        </div>
                    </div>
                </div>
                <!-- # Widget : Upcoming Interview -->
                <div class="dashboard-stat2 pb-25 mb-0">
                    <div class="display my-0">
                        <div class="number">
                            <h3 class="md-blue-text">
                                <span data-counter="counterup" data-value="<?=$upcoming_interview['upcoming_interview_number']?>">0</span>
                            </h3>
                            <small class="text-uppercase">Upcoming Interview</small>
                        </div>
                        <div class="icon">
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- # Video -->
            <div class="m-grid-col m-grid-col-md-9 m-grid-col-auto-height panel">
                <div class=" panel-body py-0 mb-0">
                    <div class="m-grid">
                        <div class="m-grid-col m-grid-col-middle m-grid-col-xs-12 m-grid-col-sm-4">
                            <h3 class="mb-30 font-weight-600 line-height-lg md-grey-darken-3-text">Find out more the benefit to have video resume!</h3>
                            <p class="md-grey-darken-2-text font-16">Click play on video to learn more.</p>
                        </div>
                        <div class="m-grid-col m-grid-col-middle m-grid-col-center m-grid-col-xs-12 m-grid-col-sm-8 py-20 pl-30 pr-0">
                            <!-- <div class=""> -->
                            <!-- <i class="icon-control-play font-26"></i> -->
                            <div class="embed-responsive embed-responsive-16by9 my-auto  ">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xbmAA6eslqU"></iframe>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- # Section: Job Preferences Board-->
        <div class="portlet mb-30 ">
            <!-- TITLE  -->
            <div class="media">
                <div class="media-body">
                    <h3 class=" mb-0 text-capitalize ">What we just found for you!
                        <?php $new_job = 0;foreach ($job_positions_new as $key => $value) {$new_job++;}?>
                        <small class="label label-md-indigo label-sm my-0 ">
                            <?=$new_job?> new job</small>
                    </h3>

                </div>
                <div class="media-right media-bottom">
                    <a href="<?=base_url()?>job/search" target="_blank" class="btn btn-outline btn-md-darkblue mb-0">View All Job Dashboard</a>
                </div>
            </div>

            <hr class="border-mdo-darkblue-v1 ">
                        
            <?php if(!empty ($job_positions)){                    
                //Columns must be a factor of 12 (1,2,3,4,6,12)
                $numOfCols = 3;
                $colCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
                $maxCol = 6 ;
            ?>
            <div class="row mb-10">
                <?php
                    
                    foreach ($job_positions_new as $key => $value) {      
                    ?>
                    <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                        <div class="panel panel-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="font-weight-600 mb-10">
                                        <a class="md-black-text md-indigo-text-hover" href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['job_id']), '=');?>" target="_blank">
                                            <?php echo $value['job_post'] ?>
                                        </a>
                                    </h4>
                                    <h5 class="mb-10">
                                        <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($value['user_id']), '=');?>" target="_blank">
                                            <?php echo $value['company_name'] ?>
                                        </a>
                                    </h5>
                                    <small class="font-grey-salsa">
                                        <i class="icon-clock mr-10"></i>
                                        <?php  echo time_elapsed_string($value['job_created_time']); ?>
                                    </small>


                                </div>
                                <div class="media-right media-middle">
                                    <img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG.'/site/profile-pic.png'; ?>" alt="<?php echo $value['company_name'] ?>" class="avatar avatar-tiny avatar-circle mr-10">
                                </div>
                            </div>
                            <hr class="my-10">
                            <ul class="list-unstyled list-inline mt-ul-li-lr-0  mx-0 mt-ul-li-tb-2">
                                <!-- Location -->
                                <?php if (!empty($value['country_name'])) {?>
                                <li>
                                    <p class="badge badge-md-purple badge-roundless letter-space-xs">
                                        <i class="fa fa-map-marker "></i>
                                        <?php echo $value['country_name'] ?>
                                    </p>
                                </li>
                                <?php } ?>
                                <!-- Salary -->
                                <?php if (!empty($value['min_budget']) || ($value['max_budget']) ) {?>
                                <li>
                                    <p class="badge badge-md-green  badge-roundless letter-space-xs">
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
                                <li>
                                    <p class="badge badge-md-blue-grey badge-roundless letter-space-xs">
                                        <i class="fa fa-industry"></i>
                                        <?php echo $value['industry_name'] ?>
                                    </p>
                                </li>
                                <?php } ?>
                                <!-- Employment Type -->
                                <?php if (!empty($value['employment_name'])) {?>
                                <li>
                                    <p class="badge badge-md-blue badge-roundless letter-space-xs">
                                        <i class="fa fa-briefcase"></i>
                                        <?php echo $value['employment_name'] ;?>
                                    </p>
                                </li>
                                <?php } ?>

                                <!-- Position -->
                                <?php if (!empty($value['position_name'])) {?>
                                <li>
                                    <p class="badge badge-md-deep-purple badge-roundless letter-space-xs">
                                        <i class="fa fa-sitemap"></i>
                                        <?php echo $value['position_name'] ?>
                                    </p>
                                </li>
                                <?php } ?>



                            </ul>
                        </div>
                    </div>
                    <?php
                        $colCount++;
                        if ($colCount < $maxCol){                                
                            if($colCount % $numOfCols == 0 ) { echo '</div><div class="row">'; }                                            
                        }
                        else{ 
                            break; 
                        }
                    }
                    ?>
            </div>

            
            <!-- # Empty States -->
            <?php } else { ?>
            <div class="portlet text-center">
                <div class="portlet-body p-100">
                    <h3 class="text-center font-weight-600 md-indigo-text mb-20"> Set up your job preferences! </h2>
                    <h5 class="text-center  font-grey-cascade mb-40 px-200">Tired for waiting to get your own job preferences? How about set up now by edit your job preferences and we will search and notify to you !</h5>
                    <a href="<?php echo base_url(); ?>student/settings/" class="btn btn-outline btn-md-indigo  py-10 ">
                        <i class="icon-settings mr-10"></i> Set up my preferences.</a>
                </div>
            </div>
            <?php } ?>

        </div>


        <!-- # Section : Feed & Article -->
        <div class="m-grid mb-30">
            <!-- # Widget : New User   -->
            <div class="m-grid-col pr-15">
                <div class="portlet light tasks-widget">
                    <!-- Tab  -->
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-directions md-grey-darken-3-text"></i>
                            <span class="caption-subject md-grey-darken-3-text font-weight-600  text-uppercase">Info</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_join" data-toggle="tab">
                                    <i class="icon-users"></i> New User </a>
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
                                <!-- ! Empty -->
                                <?php if(!empty($shown_new)){?>
                                <div class="scroller height-400" data-always-visible="1" data-rail-visible="1" data-handle-color="#D7DCE2">
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
                                    </div>
                                </div>

                                <!-- # Empty State -->
                                <?php } else {?>
                                <div class="m-grid ">
                                    <div class="portlet md-grey-lighten-5 height-400 m-grid-col m-grid-col-middle m-grid-col-center px-80">
                                        <i class="icon-users font-40 md-indigo-text"></i>
                                        <h4 class="text-center font-weight-600 md-indigo-text ">No newcomer.</h4>
                                        <h6 class="text-center font-grey-cascade mt-20 font-15">There is no student had joined since your last login.</h6>
                                    </div>
                                </div>
                                <?php }?>
                            </div>

                            <!-- TAB  : Interview Session -->
                            <!-- [Done] Add EMPTY STATE -->
                            <div class="tab-pane " id="tab_interview">

                                <!-- IF (!empty) -->
                                <?php if(!empty($shown_interview)){?>
                                <div class="scroller height-400" data-always-visible="1" data-rail-visible="1" data-handle-color="#D7DCE2">
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
                                </div>

                                <!-- # Empty States -->
                                <?php } else {?>
                                <div class="m-grid ">
                                    <div class="portlet md-grey-lighten-5 height-400  m-grid-col m-grid-col-middle m-grid-col-center px-80">
                                        <h4 class="text-center font-weight-600 md-indigo-text ">No interview invitation had be received. </h4>
                                        <h6 class="text-center font-grey-cascade mt-20 font-15">Start to search job that suitable for you or improve your resume to get better chance !</h6>
                                    </div>
                                </div>
                                <?php }?>

                            </div>

                            <!-- TAB : Recent Activities -->
                            <div class="tab-pane " id="tab_activity">
                                <!-- IF (!empty) -->
                                <?php if(!empty($recent_activities)){?>
                                <div class="scroller height-400" data-always-visible="1" data-rail-visible="1" data-handle-color="#D7DCE2">
                                    <ul class="feeds">
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
                                        <?php } ?>
                                    </ul>
                                </div>

                                <!-- # Empty State -->
                                <?php } else { ?>
                                <div class="m-grid ">
                                    <div class="portlet md-grey-lighten-5 height-400  m-grid-col m-grid-col-middle m-grid-col-center px-80">
                                        <i class="icon-ghost font-40 md-indigo-text"></i>
                                        <h4 class="text-center font-weight-600 md-indigo-text"> No recent activity </h4>
                                    </div>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- # Widget : Article -->
            <div class="m-grid-col m-grid-col-auto-height pl-15">
                <div id="carousel-example-generic-v2" class="carousel slide widget-carousel height-550" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators carousel-indicators-white  ">
                        <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner " role="listbox">
                        <?php $i = 1;foreach ($article as $row) { ?>
                        <div class="item  <?=$i == 1?" active ":" "?>">
                            <!-- BEGIN WIDGET BLOG -->
                            <div class="widget-blog py-60 text-center height-550 " style=" background: url('<?= !empty($row->featured_image) ?IMG.'/article/'.$row->featured_image : IMG.'/site/dawn.jpg'; ?>'">
                                <div class="widget-blog-heading text-uppercase">
                                    <h4 class="widget-blog-title md-white-text font-24 line-height-md">
                                        <?=$row->title?>
                                    </h4>
                                    <span class="widget-blog-subtitle mdo-white-v7-text">
                                        <?=date('j F Y', strtotime($row->created_at))?>
                                    </span>
                                </div>
                                <p class="mdo-white-v7-text px-20">
                                    <?= strlen($row->excerpt) > 250?preg_replace('/\W\w+\s*(\W*)$/', '$1', substr($row->excerpt, 0 , 250))."...":$row->excerpt; ?>
                                </p>
                                <br/>
                                <a class="btn btn-md-amber text-uppercase letter-space-xs font-weight-600 md-grey-darken-3-text" href="<?=base_url()?>article/<?=$row->slug?>" target="_blank">Read More <i class="fa fa-chevron-right font-14"></i></a>
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
