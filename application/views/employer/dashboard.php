<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Hey ! Welcome back <?php echo ucfirst($this->session->userdata('name'));?>
                    <small>Here latest feeds regarding your Company account</small>
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?php echo base_url().'employer/dashboard'; ?>">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Dashboard</span>
                        </li>
                    </ul>

                </div>
                <!-- END PAGE HEADER-->

                <div class="row widget-row ">
                    <div class="col-md-3">

                        <!-- BEGIN WIDGET THUMB  : Job Post (Active)-->
                        <div class="widget-thumb md-white text-uppercase mb-20">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon md-green icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <?php 
										$active = 0; 
										foreach ($job_post as $key => $value) { 
											if(strtotime(date('Y-m-d')) <= strtotime($value['expiry_date']) && $value['status'] == 'post'){
												$active++;
											}
										}									
									?>
									<span class="widget-thumb-subtitle">Active</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$active?>"></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB  : Job Post (Active)-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Profile Seen -->
                        <div class="widget-thumb md-white text-uppercase mb-20">
                            <h4 class="widget-thumb-heading">Profile </h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon md-red icon-eye"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Seen</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$user_profile['number_of_seen']?>">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Profile Seen-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Upcoming Interview-->
                        <div class="widget-thumb md-white text-uppercase mb-20">
                            <h4 class="widget-thumb-heading"> Interview</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon md-purple icon-calendar"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Upcoming </span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo count($invitation); ?>"><?php echo count($invitation); ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Upcoming Interview-->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB : Inbox-->
                        <div class="widget-thumb md-white text-uppercase mb-20">
                            <h4 class="widget-thumb-heading">Inbox</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon md-blue icon-envelope"></i>
                                <div class="widget-thumb-body">
                                    <?php $message = getDataMessage("general");?>
									<span class="widget-thumb-subtitle">Unread Message</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$message['new']?>">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB : Inbox-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light tasks-widget">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="icon-share font-dark"></i>
                                    <span class="caption-subject font-dark font-weight-600 text-uppercase">Recent Job Post </span>
                                </div>
                            </div>
                            <div class="scroller" style="height: 350px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                <div class="portlet-body">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr class="text-uppercase ">
                                                    <th> # </th>
                                                    <th class="col-sm-7"> Job </th>
                                                    <!-- <th> Last Update</th> -->
                                                    <th class="col-sm-2"> Status </th>
                                                    <th class="col-sm-2"> Candidate</th>
                                                    <th class="col-sm-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; foreach ($job_post as $key => $value) { if($i == 6){break;}?>
                                                    <tr>
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php echo $value['name'] ?> </td>
                                                        <td>
                                                            <?php if(strtotime(date('Y-m-d')) >= strtotime($value['expiry_date'])){?>
																<span class="label label-sm label-danger"> Expired </span>
															<?php }else{?>
																<span class="label label-sm label-<?php if($value['status'] == 'post') {echo 'md-green';}else if($value['status'] == 'draft'){echo 'warning';}else if($value['status'] == 'expired'){echo 'danger';}?>"> <?php echo ucfirst($value['status'] == 'post'?"Active":$value['status']) ?> </span>
															<?php }?>															
                                                        </td>
                                                        <td>
                                                            <i class="icon-users"></i> <?=$value['number_of_candidate']?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>job/candidate/<?php echo rtrim(base64_encode($value['id']),'='); ?>" target="_blank" class="btn btn-md-indigo btn-sm  btn-circle">View</a>
                                                        </td>
                                                    </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>
										<br><a href="<?=base_url()?>employer/job_board" class="btn btn-danger text-uppercase pull-right">View All</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>

                    <!-- Article -->
                    <div class="col-md-4">
                        <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-red">
                                <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                                <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
								<li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
								<?php $i = 1;foreach ($article as $row) { ?>
									<div class="item <?=$i == 1?"active":""?>">
										<!-- BEGIN WIDGET BLOG -->
										<div class="widget-blog text-center margin-bottom-20 clearfix" style="height: 442px; padding-top: 50px; background-image: url(<?php echo IMG_STUDENTS; ?>'07.jpg'">
											<div class="widget-blog-heading text-uppercase">
												<h3 class="widget-blog-title"><?=$row->title?></h3>
												<span class="widget-blog-subtitle"><?=date('j F Y', strtotime($row->created_at))?></span>
											</div>
											<p><?= strlen($row->excerpt) > 250?preg_replace('/\W\w+\s*(\W*)$/', '$1', substr($row->excerpt, 0 , 250))."...":$row->excerpt; ?></p>
											<br/>
											<a class="btn btn-danger text-uppercase" href="<?=base_url()?>article/<?=$row->slug?>" target="_blank">Read More</a>
										</div>
										<!-- END WIDGET BLOG -->
									</div>
								<?php $i++;}?>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 col-sm-12">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption caption-md font-blue">
                                    <i class="icon-share font-blue"></i>
                                    <span class="caption-subject md-darkblue-text font-weight-600 text-uppercase">Recent Activities</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller mt-height-850-xs" data-always-visible="1" data-rail-visible="0">
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
															<div class="desc"><?=$row->activity?></div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date"> <?=time_elapsed_string($row->created_at)?> </div>
												</div>
											</li>
										<?php }?>
										
                                    </ul>
                                </div>
                                <!-- <div class="scroller-footer">
                                    <div class="btn-arrow-link pull-right">
                                        <a href="#" class="">See All Records</a>
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Ads -->
                    <div class="col-lg-6 col-sm-12">                        
                        <div class="portlet light calendar bordered">
                            <div class="portlet-title ">
                                <div class="caption">
                                    <i class="icon-calendar font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="fullcalendar"> </div>
                            </div>
                            <?php foreach ($dashboardInvitationCalendar as $key => $value): ?>
                                <div class="modal fade" id="modal_more_info_<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-hidden="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content ">
                                                    <div class="modal-header ">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">
                                                            <i class="icon-briefcase mr-2"></i><?php echo $value['job_name'] ?> (<?php echo $value['company_name']; ?>)</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        Job Position
                                                                    </div>
                                                                    <div class="col-md-8 text-uppercase font-weight-600 " style="height: 19px;">
                                                                        <?php echo $value['job_name'] ?>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        Candidate
                                                                    </div>
                                                                    <div class="col-md-8 text-uppercase ">
                                                                        <?php echo $value['fullname'] ?>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        Interview Session
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <?php echo $value['title'] ?>
                                                                    </div>
                                                                </li>
                                                                <!-- From -->
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        From
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['start_date'])); ?> - <?php echo date('H:i A', strtotime($value['start_date'])); ?>
                                                                    </div>
                                                                </li>
                                                                <!-- To -->
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        To
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['end_date'])); ?> - <?php echo date('H:i A', strtotime($value['end_date'])); ?>
                                                                    </div>
                                                                </li>
                                                                <!-- Details -->
                                                                <li>
                                                                    <div class="col-md-4 text-right font-weight-700">
                                                                        Details
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <?php echo $value['description']; ?>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer ">
                                                    <!--     <a href="#modal_edit_session_<?php echo rtrim(base64_encode($value['id']), '=');?>" data-toggle="modal" class="btn btn-md-indigo ">
                                                            Edit
                                                        </a>                  -->
                                                    </div>

                                                </div>
                                            </div>
                                </div>  
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->