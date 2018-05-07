<div class="page-content-wrapper">
    <div class="page-content">
        <!-- # Page Title -->
        <h1 class="page-title">Calendar</h1>
        <!-- # Page Navigate -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>student/dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Calendar</span>
                </li>
            </ul>
        </div>
        <!-- # Content [Event | Calendar] -->
        <!-- # Hidden XS [Hide if it low than sm] -->
        <div class="portlet light portlet-fit bordered calendar ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-calendar font-green"></i>
                    <span class="caption-subject font-green font-weight-600 text-uppercase">Event</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <!-- Event / Agenda / Upcoming Interview -->
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="portlet  mb-0-md mb-60">
                            <!-- @if empty -->
                            <?php if (!empty($invitation)){ ?>
                            <!-- Hide when in Mobile version -->
                            <div class="portlet-body">
                                <div class="scroller height-630" data-always-visible="1" data-rail-visible="1">

                                    <!-- PANEL -->
                                    <div class="panel-group accordion  " id="accordion_event" role="tablist" aria-multiselectable="true">
                                        <?php foreach ($invitation as $key => $value): ?>
                                        <div class="panel panel-transparent">

                                            <!-- Panel Heading -->
                                            <div class="panel-heading">
                                                <h4 class="panel-title font-weight-600">
                                                    <?php if ($key==0){ ?>
                                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion_event" href="#collapse_event_<?php echo $value['id'] ?>">
                                                        <!-- <i class="icon-briefcase mr-10"></i>                                                     -->
                                                        <?php echo $value['title']; ?>
                                                    </a>
                                                    <?php }else{?>
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion_event" href="#collapse_event_<?php echo $value['id'] ?>">
                                                        <!-- <i class="icon-briefcase mr-10"></i>                                                     -->
                                                        <?php echo $value['title']; ?>
                                                    </a>
                                                    <?php }?>
                                                </h4>
                                            </div>

                                            <!-- Panel Body -->
                                            <?php if ($key==0){ ?>
                                            <div id="collapse_event_<?php echo $value['id'] ?>" class="panel-collapse  collapse in">
                                                <?php }else{?>
                                                <div id="collapse_event_<?php echo $value['id'] ?>" class="panel-collapse collapse">
                                                    <?php }?>
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
                                                            <i class="icon-clock mr-10"></i>
                                                            <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                            <?php echo date('h:ia', strtotime($value['end_date'])); ?> </h5>
                                                        <?php } ?>

                                                        <h5 class="font-weight-400 letter-space-xs mb-30">
                                                            <i class="icon-tag mr-10"></i> Interview Invitation</span>
                                                            <span class="badge mb-10 font-weight-400 <?php if($value['status'] == 'reschedule'){echo 'badge-info';}elseif ($value['status'] == 'accept'){ echo 'badge-md-green';
                                                                }elseif ($value['status'] == 'reject' ) {echo 'badge-md-red';}elseif ($value['status'] == 'pending') { echo 'badge-warning'; }else{ echo 'badge-md-darkblue';} ?> label-sm">
                                                                <?php echo ($value['status'] == 'pending') ? 'Waiting for acceptance' : ucfirst($value['status']); ?>
                                                            </span>
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
                                                                    <i class="fa fa-building mr-10"></i>
                                                                    <?php echo $value['company_name'] ?>
                                                                </h5>

                                                                <?php if (date('D', strtotime($value['start_date'])) != date('D', strtotime($value['end_date'])) ) {?>
                                                                <h5 class="font-weight-400 letter-space-xs mb-30">
                                                                    <i class="icon-clock mr-10"></i>
                                                                    <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                                    <?php echo date('D, j M ,h:ia', strtotime($value['end_date'])); ?> </h5>
                                                                <?php }else{ ?>
                                                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                                                    <i class="icon-clock mr-10"></i>
                                                                    <?php echo date('D, j M , h:ia', strtotime($value['start_date'])); ?> -
                                                                    <?php echo date('D, j M ,h:ia', strtotime($value['end_date'])); ?>
                                                                </h5>
                                                                <?php } ?>

                                                                <!-- Description -->
                                                                <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                                                    <i class="icon-book-open  mr-10"></i>
                                                                    <?php echo $value['description']; ?>
                                                                </h5>


                                                            </div>
                                                            <div class="modal-footer ">
                                                                <?php if ($value['status'] == 'pending') {?>
                                                                <a href="#modal_reject_form" data-toggle="modal" class="btn btn-md-red btn-rej  letter-space-xs  " job-id="<?php echo $value['job_id'];?>" session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>">Reject</a>
                                                                <a href="#modal_rescheduled_form" data-toggle="modal" class="btn btn-md-indigo btn-resc letter-space-xs" job-id="<?php echo $value['job_id'];?>" session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>">Reschedule Session</a>
                                                                <a href="#" class="btn btn-md-green btn-acc letter-space-xs " job-id="<?php echo $value['job_id'];?>" session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>">Accept Interview</a>
                                                                <?php } else {?>
                                                                <a href="#" class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Close</a>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                        </div>

                                        <!-- MODAL : Rescheduled Form -->
                                        <div class="modal fade" id="modal_rescheduled_form" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog ">
                                                <div class="modal-content fade-in-up ">
                                                    <div class="modal-header">
                                                        <h4 class="font-weight-600">Rescheduled Interview Session </h4>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>student/applications_history/reschedule_invitation" class="" method="POST">
                                                        <input type="hidden" class="job-id" name="job_id"></input>
                                                        <input type="hidden" class="session-id" name="session_id"></input>
                                                        <input type="hidden" class="employer-id" name="employer_id"></input>
                                                        <div class="modal-body ">
                                                            <!-- Date / Time -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mx-0">
                                                                        <label for="" class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Date</label>
                                                                        <div class="input-icon ">
                                                                            <i class="icon-calendar"></i>
                                                                            <input type="text" class="form-control date date-picker ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mx-0">
                                                                        <label for="" class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Time</label>
                                                                        <div class="input-icon ">
                                                                            <i class="icon-clock"></i>
                                                                            <input type="text" class="form-control timepicker timepicker-24 " placeholder="start time">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Reason -->
                                                            <div class="form-group mx-0">
                                                                <label for="" class="control-label md-grey-darken-3-text mb-10 font-weight-600 ">Reschedule Reason</label>
                                                                <textarea class="form-control" rows="5" name="candidate_reply" placeholder="Tell your reason to reschedule this interview session."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                            <button class="btn btn-md-indigo letter-space-xs width-200" type="submit"> Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MODAL : Reject Form -->
                                        <div class="modal fade " id="modal_reject_form" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog fade-in-up">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="font-weight-600">Rejection Letter</h4>
                                                    </div>
                                                    <form action="<?php echo base_url(); ?>student/applications_history/reject_invitation" class="form" method="POST">
                                                        <input type="hidden" class="job-id" name="job_id"></input>
                                                        <input type="hidden" class="session-id" name="session_id"></input>
                                                        <input type="hidden" class="employer-id" name="employer_id"></input>
                                                        <div class="modal-body">
                                                            <div class="form-group mx-0 ">
                                                                <!-- <label for="" class="control-label">Reply</label> -->
                                                                <textarea class="form-control" rows="10" name="candidate_reply" placeholder="Please state your reason to reject for this interview."></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                            <button class="btn btn-md-indigo letter-space-xs width-200" type="submit"> Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                            <div id="fullcalendar" class="has-toolbar"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
