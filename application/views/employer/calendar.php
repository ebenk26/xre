<div class="page-content-wrapper">
    <div class="page-content">
        <h1 class="page-title"> Calendar
            <small>Here latest events or public holiday show</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>employer/dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Calendar</span>
                </li>
            </ul>

        </div>
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
                    <div class="col-md-6 col-sm-12 no-space">
                        <div class="portlet ">
                            <!-- @if empty -->
                            <?php if (!empty($invitation)){ ?>
                            <div class="portlet-body">
                                <div class="scroller height-630 " data-always-visible="1" data-rail-visible="1">
                                    <!-- PANEL -->
                                    <div class="panel-group accordion  " id="accordion_event" role="tablist" aria-multiselectable="true">
                                        <?php foreach ($invitation as $key => $value): ?>
                                        <!-- Item #{id} -->
                                        <div class="panel panel-transparent">
                                            <!-- Panel Heading -->
                                            <div class="panel-heading">
                                                <h4 class="panel-title font-weight-600">
                                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion_event" href="#collapse_event_<?php echo $value['id'] ?>">
                                                        <!-- <i class="icon-briefcase mr-10"></i>                                                     -->
                                                        <?php echo $value['title']; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <!-- Panel Body -->
                                            <div id="collapse_event_<?php echo $value['id'] ?>" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <h5 class="font-weight-400 letter-space-xs mb-30">
                                                        <i class="icon-briefcase mr-10"></i>
                                                        <?php echo $value['job_name'] ?>
                                                    </h5>
                                                    <!-- IF != ALL DAY -->
                                                    <h5 class="font-weight-400 letter-space-xs mb-30">
                                                        <i class="icon-clock mr-10"></i> Date :
                                                        <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                        <?php echo date('D, j M ,h:ia', strtotime($value['end_date'])); ?> </h5>
                                                    <!-- If == ALL DAY -->
                                                    <h5 class="font-weight-400 letter-space-xs mb-30">
                                                        <i class="icon-clock mr-10"></i> Date :
                                                        <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                        <?php echo date('h:ia', strtotime($value['end_date'])); ?> </h5>
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
                                                    <div class="modal-content">
                                                        <div class="modal-header md-indigo md-white-text">
                                                            <button type="button" class="close md-white-text" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="font-weight-500 letter-space-xs">
                                                                <!-- <i class="icon-briefcase mr-10"></i> -->
                                                                <?php echo $value['title']; ?>
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17 ">
                                                                <i class="icon-briefcase mr-10"></i>
                                                                <?php echo $value['job_name'] ?>
                                                            </h5>
                                                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                                                <i class="fa fa-building mr-10"></i>
                                                                <?php echo $value['company_name'] ?>
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
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Item #{id} -->
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
                    <div class="col-md-6">
                        <div id="fullcalendar" class="has-toolbar"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
