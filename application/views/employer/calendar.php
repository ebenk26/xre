<div class="page-content-wrapper">
    <div class="page-content">
        <!-- # Title -->
        <h1 class="page-title"> Calendar
            <small>Here show latest events or public holiday</small>
        </h1>
        <!-- # Breadcrumb -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>employer/dashboard"><?= !empty($language->site_home) ? $language->site_home : "Home"  ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span><?= !empty($language->site_calendar) ? $language->site_calendar : "Calendar"  ?></span>
                </li>
            </ul>
        </div>
        <!-- # Content -->
        <div class="portlet light portlet-fit  calendar">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-calendar font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Event</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <!-- Event / Agenda / Upcoming Interview -->
                    <div class="col-md-6 col-sm-12 no-space col-xs-12">
                        <div class="portlet ">
                            <!-- @if not empty -->
                            <?php if (!empty($invitation)){ ?>
                            <div class="portlet-body">
                                <div class="scroller height-630 " data-always-visible="1" data-rail-visible="1">
                                    <!-- PANEL -->
                                    <div class="panel-group accordion" id="accordion_event">
                                        <?php foreach ($invitation as $key => $value): ?>
                                        <div class="panel panel-transparent">
                                            <!-- Panel Heading -->
                                            <div class="panel-heading">
                                                <h4 class="panel-title font-weight-600">
                                                    <?php if( $key == 0 ) {?>
                                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion_event" href="#collapse_event_<?php echo $value['id'] ?>">
                                                        <?php echo $value['title']; ?>
                                                    </a>
                                                    <?php } else {?>
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion_event" href="#collapse_event_<?php echo $value['id'] ?>">
                                                        <?php echo $value['title']; ?>
                                                    </a>
                                                    <?php } ?>
                                                </h4>
                                            </div>
                                            <!-- Panel Body -->
                                            <?php if( $key == 0 ) { ?>
                                            <div id="collapse_event_<?php echo $value['id'] ?>" class="panel-collapse collapse in">
                                                <?php } else {?>
                                                <div id="collapse_event_<?php echo $value['id'] ?>" class="panel-collapse collapse">
                                                    <?php } ?>
                                                    <div class="panel-body">
                                                        <h5 class="font-weight-400 letter-space-xs mb-30">
                                                            <i class="icon-briefcase mr-10"></i>
                                                            <?php echo $value['job_name'] ?>
                                                        </h5>
                                                        <?php if (date('D', strtotime($value['start_date'])) != date('D', strtotime($value['end_date'])) ) {?>
                                                        <h5 class="font-weight-400 letter-space-xs mb-30">
                                                            <i class="icon-clock mr-10"></i>
                                                            <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                            <?php echo date('D, j M ,h:ia', strtotime($value['end_date'])); ?> </h5>
                                                        <?php }else{ ?>
                                                        <h5 class="font-weight-400 letter-space-xs mb-30">
                                                            <i class="icon-clock mr-10"></i> Date :
                                                            <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                            <?php echo date('h:ia', strtotime($value['end_date'])); ?> </h5>
                                                        <?php } ?>
                                                        <h5 class="font-weight-400 letter-space-xs mb-30 ">
                                                            <i class="icon-tag mr-10"></i> Interview Invitation</span>
                                                        </h5>
                                                        <a href="#modal_info_<?php echo $value['id']; ?>" data-toggle="modal" class="btn btn-outline btn-md-indigo btn-sm font-16">
                                                            <i class="icon-notebook mr-5"></i> View Invitation Detail</a>
                                                    </div>
                                                </div>

                                                <!-- Modal : Detail Interview -->
                                                <div class="modal fade modal_detail_interview mt-150" id="modal_info_<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                    <div class="modal-dialog ">
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
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="portlet-body ">
                                    <div class="portlet md-shadow-none">
                                        <div class="portlet-body text-center p-120">
                                            <i class="fa fa-calendar-times-o font-40 font-grey-cascade"></i>
                                            <h4 class="font-weight-500 text-center font-grey-cascade mb-0"> No upcoming event </h4>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                    </div>
                    <!-- Calendar -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div id="fullcalendar" class="has-toolbar"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>