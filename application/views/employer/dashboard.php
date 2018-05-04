<?php 
    $i= 0;
    foreach ($invitation as $key => $value) {
        if (strtotime($value['start_date']) > strtotime(date('Y-m-d H:i:s'))) {
            $i++;
        }
    }
    $upcoming = $i; ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Hey ! Welcome back
            <?php echo ucfirst($this->session->userdata('name'));?>
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

        <!-- Section : Widget -->
        <div class="row widget-row ">
            <!-- BEGIN WIDGET THUMB  : Job Post (Active)-->
            <div class="col-md-3">
                <div class="widget-thumb md-white text-uppercase mb-30">
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
            </div>
            <!-- END WIDGET THUMB  : Job Post (Active)-->
            <!-- BEGIN WIDGET THUMB : Profile Seen -->
            <div class="col-md-3">
                <div class="widget-thumb md-white text-uppercase mb-30">
                    <h4 class="widget-thumb-heading">Profile </h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon md-red icon-eye"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">Seen</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$user_profile['number_of_seen']?>">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB : Profile Seen-->
            <!-- BEGIN WIDGET THUMB : Upcoming Interview-->
            <div class="col-md-3">
                <div class="widget-thumb md-white text-uppercase mb-30">
                    <h4 class="widget-thumb-heading"> Interview</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon md-purple icon-calendar"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">Upcoming </span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $upcoming; ?>">
                                <?php echo $upcoming; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB : Upcoming Interview-->
            <!-- BEGIN WIDGET THUMB : Inbox-->
            <div class="col-md-3">
                <div class="widget-thumb md-white text-uppercase mb-30">
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
            </div>
            <!-- END WIDGET THUMB : Inbox-->
        </div>

        <!-- Section : Recent Job Post -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="portlet light tasks-widget">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-notebook font-dark"></i>
                            <span class="caption-subject font-dark font-weight-600 text-uppercase">Recent Job Post </span>
                        </div>
                    </div>
                    <div class="scroller height-500" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                        <div class="portlet-body">

                            <!-- ADD : EMPTY STATES -->
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr class="text-uppercase ">
                                            <th> # </th>
                                            <th class="col-sm-7"> Job </th>
                                            <!-- <th> Last Update</th> -->
                                            <th class="col-sm-2 text-center"> Status </th>
                                            <th class="col-sm-2 text-center"> Candidate</th>
                                            <th class="col-sm-1 text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($job_post as $key => $value) { if($i == 6){break;}?>
                                        <tr class="<?php echo ($value['status'] == 'preview') ? 'hidden' : '';  ?>">
                                            <td>
                                                <?php echo $i; ?> </td>
                                            <td>
                                                <?php echo $value['name'] ?> </td>
                                            <td class="text-center">
                                                <?php if(strtotime(date('Y-m-d')) >= strtotime($value['expiry_date'])){?>
                                                <span class="label label-sm label-danger"> Expired </span>
                                                <?php }else{?>
                                                <span class="label label-sm label-<?php if($value['status'] == 'post') {echo 'md-green';}else if($value['status'] == 'draft'){echo 'warning';}else if($value['status'] == 'expired'){echo 'danger';}?>">
                                                    <?php echo ucfirst($value['status'] == 'post'?"Active":$value['status']) ?> </span>
                                                <?php }?>
                                            </td>
                                            <td class="text-center">
                                                <i class="icon-users"></i>
                                                <?=$value['number_of_candidate']?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>job/candidate/<?php echo rtrim(base64_encode($value['id']),'='); ?>" target="_blank" class="btn btn-md-indigo btn-sm">View Candidates</a>
                                            </td>
                                        </tr>
                                        <?php ($value['status'] != 'preview') ? $i++ : ''; } ?>
                                    </tbody>
                                </table>
                                <a href="<?=base_url()?>employer/job_board" class="btn btn-danger text-uppercase pull-right px-100 mt-50">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light calendar">
                    <div class="portlet-title ">
                        <div class="caption">
                            <i class="icon-calendar font-dark"></i>
                            <span class="caption-subject font-dark font-weight-600 text-uppercase">Calendar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="fullcalendar"> </div>
                    </div>
                </div>
                <?php foreach ($dashboardInvitationCalendar as $key => $value): ?>
                <div class="modal fade" id="modal_more_info_<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content wow fadeInUp " data-wow-delay=".1s" data-wow-duration=".7s">
                            <div class="modal-header md-indigo md-white-text">
                                <h4 class="font-weight-500 letter-space-xs">
                                    <?php echo $value['title']; ?>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17 ">
                                    <i class="icon-briefcase mr-10"></i>
                                    <?php echo $value['job_name'] ?>
                                </h5>
                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                    <i class="icon-user mr-10"></i>
                                    <!-- <?php print_r($value); ?> -->
                                    <?php echo $value['fullname'] ?>
                                </h5>
                                <!-- IF ALL DAY -->
                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                    <i class="icon-clock mr-10"></i>
                                    <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                    <?php echo date('D, j M ,h:ia', strtotime($value['end_date'])); ?>
                                </h5>
                                <!--  @else non all day-->
                                <!-- Note need to add -->

                                <!-- Description -->
                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                    <i class="icon-book-open  mr-10"></i>
                                    <?php echo $value['description']; ?>
                                </h5>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Section : Recent Activities Feed  / Article -->
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption caption-md md-darkblue-text">
                            <i class="icon-list md-darkblue-text"></i>
                            <span class="caption-subject md-darkblue-text font-weight-600 text-uppercase">Recent Activities</span>
                        </div>
                    </div>
                    <div class="portlet-body ">
                        <div class="scroller height-370 " data-always-visible="1" data-rail-visible="1">
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
                                <?php }?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Article -->
            <div class="col-md-6">
                <div id="carousel-example-generic-v2" class="carousel  slide widget-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators carousel-indicators-red mb-30">
                        <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner " role="listbox">
                        <?php $i = 1;foreach ($article as $row) { ?>
                        <div class="item <?=$i == 1?" active ":" "?>">
                            <!-- BEGIN WIDGET BLOG -->
                            <div class="widget-blog  text-center mb-30 " style=" background-image: url('<?= !empty($row->featured_image) ? IMG." /article/ ".$row->featured_image : IMG."/site/dawn.jpg "; ?>'">
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
                                <a class="btn btn-danger text-uppercase" href="<?=base_url()?>article/<?=$row->slug?>" target="_blank">Read More</a>
                            </div>
                            <!-- END WIDGET BLOG -->
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
