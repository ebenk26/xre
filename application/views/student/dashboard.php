<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Welcome back , <?php echo ucfirst($this->session->userdata('name'));?>!
                    <small>last login on <?php echo !empty($last_logged_in[count($last_logged_in)-2]['user_history']) ? date('d F Y H:i:m', strtotime($last_logged_in[count($last_logged_in)-2]['user_history'])) : date('d F Y H:i:m'); ?> </small>
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
                <!-- Widget-Dashboard -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4 ">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-green-sharp">
                                        <span data-counter="counterup" data-value="<?=$users['overview']['number_of_seen']?>">60</span>
                                    </h3>
                                    <small class="text-uppercase">Profile Seen</small>
                                </div>
                                <div class="icon">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4 ">
                            <div class="display my-0">
                                <div class="number">
                                    <h3 class="font-red-haze">
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
                        <div class="dashboard-stat2 p-4">
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
                    </div>
					<?php $new_job = 0;foreach ($job_positions as $key => $value) {$new_job++;}?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat2 p-4">
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
                </div>

                <!-- Widget : Feed & Job Find -->
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light tasks-widget">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-share font-dark"></i>
                                    <span class="caption-subject font-dark bold uppercase">Informations</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#portlet_tab1" data-toggle="tab"> New Join </a>
                                    </li>
                                    <li>
                                        <a href="#portlet_tab2" data-toggle="tab"> Upcoming Interview </a>
                                    </li>
                                    <li>
                                        <a href="#portlet_tab3" data-toggle="tab"> Recent Activities </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- TAB BEGIN : Review , Rate , Endorse  -->
                                    <div class="tab-pane active" id="portlet_tab1">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="mt-comments-v2">
                                                <?php foreach($new_join as $row){?>
													<div class="mt-comment">
														<div class="mt-comment-img">
															<?php if($row->profile_photo != ""){?>
																<img src="<?=IMG_STUDENTS.$row->profile_photo;?>" style="height:35px;margin-right:10px;"/>
															<?php }?>
														</div>
														<div class="mt-comment-body">
															<div class="mt-comment-info">
																<a><span class="mt-comment-author"><?=$row->fullname?></span></a>
																<!-- <span class="mt-comment-action"> -->
																<!--<a class="mt-comment-action btn btn-xs btn-outline blue-ebonyclay btn-circle" href="#">View Profile</a>-->
																<a class="btn btn-xs btn-outline-md-indigo btn-circle ml-2" href="<?=base_url()?>profile/user/<?=rtrim(base64_encode($row->id), '=');?>" target="_blank">View Profile</a>
																<!-- </span> --> 
																<span class="mt-comment-date"><?=date('j M Y H:i A', strtotime($row->created_at))?></span>
															</div>
															<div class="mt-comment-text"><?=$row->quote != ""?$row->quote:""?>
															</div>

														</div>
													</div>
												<?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB END : Review , Rate , Endorse  -->

                                    <!-- TAB BEGIN : Interview Session -->
                                    <div class="tab-pane " id="portlet_tab2">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="general-item-list">
                                                <?php foreach($upcoming_interview['upcoming_interview'] as $row){?>
													<div class="item">
														<div class="item-head">
															<div class="item-details">
																<img class="item-pic rounded" src="<?=$row->profile_photo != ""?IMG_EMPLOYERS.$row->profile_photo:IMG_STUDENTS.'xremo-logo-blue.png'; ?>">
																<a href="<?=base_url()?>profile/company/<?=rtrim(base64_encode($row->employer_id),'=') ?>" target="_blank" class="item-name primary-link"><?=$row->company_name?></a>
																<span class="item-label"><?=date('j F Y H:i A', strtotime($row->start_date))?></span>
															</div>
															<span class="item-status">
																<!--<span class="badge badge-empty badge-success mr-2"></span>Ongoing
																<span class="badge badge-empty badge-warning mr-2"></span>Pending</span>
																<span class="badge badge-empty badge-primary mr-2"></span>Closed</span>-->
																<span class="badge badge-empty badge-danger mr-2"></span>Upcoming</span>
															</span>
														</div>
														<div class="item-body"> <a href="<?=base_url()?>job/details/<?=rtrim(base64_encode($row->job_id),'=') ?>" target="_blank" class="item-name primary-link"><b>[<?=$row->position?>]</b></a> <?=$row->description?>
														</div>
													</div>
												<?php }?>	
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TAB END : Interview Session -->

                                    <!-- TAB BEGIN : System -->
                                    <div class="tab-pane " id="portlet_tab3">
                                        <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <ul class="feeds">
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> You have 4 pending tasks.
                                                                    <span class="label label-sm label-info"> Take action
                                                                        <i class="fa fa-share"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> Just now </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New version v1.4 just lunched! </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 20 mins </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-danger">
                                                                    <i class="fa fa-bolt"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 24 mins </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 30 mins </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 40 mins </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-warning">
                                                                    <i class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New user registered. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 1.5 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-success">
                                                                    <i class="fa fa-bell-o"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                                    <span class="label label-sm label-default "> Overdue </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 2 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 3 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-warning">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 5 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 18 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-default">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 21 hours </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col1">
                                                        <div class="cont">
                                                            <div class="cont-col1">
                                                                <div class="label label-sm label-info">
                                                                    <i class="fa fa-bullhorn"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cont-col2">
                                                                <div class="desc"> New order received. Please take care of it. </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col2">
                                                        <div class="date"> 22 hours </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- TAB END : System -->
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="portlet box task-widget">
                            <div class="portlet-title bg-blue-ebonyclay py-4">
                                <div class="caption">
                                    We found <?=$new_job == 0?"no":""?> new job for you !
                                    <div class="pull-right">
                                        <span class="label label-success ml-3"><?=$new_job?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                    <?php $no_new = 0;foreach ($job_positions as $key => $value) { if($no_new == 5){break;} $no_new++;?>
                                        <div class="widget-media">
                                            <div class="widget-media-elements text-center">
                                                <!--<img class="widget-media-avatar img-responsive" src="<?php echo IMG_STUDENTS ?>xremo-logo-blue.png" alt="">-->
												
												<img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_STUDENTS.'xremo-logo-white.svg'; ?>" alt="" class="widget-media-avatar img-responsive">
												
                                                <!-- <a class="btn btn-outline-md-indigo btn-xs mt-3" href="#">View</a> -->
                                            </div>
                                            <div class="pull-right">
                                                <!-- <a class="btn btn-xs btn-md-red ">View</a> -->
                                                <!-- <small class="md-grey-text font-weight-600">2 days ago</small> -->
                                                <a class="btn btn-outline-md-indigo btn-sm mt-1 mt-display-block-xs" href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['job_id']), '=');?>" target="_blank">View Job</a>
                                                <!--<a class="btn btn-outline blue-ebonyclay btn-sm mt-1 mt-display-block-xs apply" id="<?php echo $value['job_id'] ?>" href="#">Apply</a>-->
                                                <!-- <a class="btn btn-md-red btn-sm mt-1 mt-display-block-xs" href="#"><i class="icon-pin"></i></a> -->
                                            </div>
                                            <!-- <i class="fa fa-chevron-right pull-right font-40-xs my-5"></i> -->
                                            <div class="widget-media-body">
                                                <h4 class="widget-media-body-title font-blue-ebonyclay mb-0"> <?php echo $value['job_post'] ?> <small class="md-grey-text font-weight-600 ml-2"> <?php echo time_elapsed_string($value['job_created_time']); ?></small>
                                                </h4>
                                                <p class="widget-media-body-subtitle my-2">
													<a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($value['user_id']), '=');?>" target="_blank"> <?php echo $value['company_name'] ?>
                                                    </a>
												</p>
                                                <?php if (!empty($value['state_name'])) {?>
                                                <a href="" class="badge badge-primary badge-roundless"> <?php echo $value['state_name'] ?></a>
                                                <?php } ?>
                                                <a href="" class="badge badge-md-green badge-roundless"> <?php echo $this->session->userdata('forex') ?> <?php echo $value['min_budget']; ?> - <?php echo $this->session->userdata('forex') ?> <?php echo $value['max_budget']; ?></a>
                                                <a href="" class="badge badge-md-deep-orange badge-roundless"> <?php echo $value['employment_name'] ;?></a>
                                                <?php if (!empty($value['position_name'])) {?>
                                                    <a href="" class="badge badge-blue-ebonyclay badge-roundless"> <?php echo $value['position_name'] ?></a>
                                                <?php } ?>
                                                <?php if (!empty($value['industry_name'])) {?>
                                                <a href="" class="badge badge-md-purple badge-roundless"> <?php echo $value['industry_name'] ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- more -->
                                    <div class="widget-media mb-0">
                                        <div class="widget-media-body text-center">
                                            <!-- <img class="widget-media-avatar img-responsive" src="../HTML/img/Xremo/all/xremo-logo-blue.png" alt=""> -->
                                            <!--<a class="md-grey-text text-darken-1 " href="<?=base_url()?>job/search" target="_blank">View Job Dashboard </a>-->
											
											<a href="<?=base_url()?>job/search" target="_blank" class="btn  btn-md-orange m-4 letter-space-xs">View Job Dashboard</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->