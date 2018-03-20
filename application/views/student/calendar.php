        <div class="page-content-wrapper">
            <div class="page-content" style="min-height: 598px;">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Calendar
                            <!--<small>calendar page</small>-->
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->

                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit bordered calendar">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-calendar font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <!-- Calendar -->
                                    <div class="col-md-6 col-sm-12">
                                        <div id="fullcalendar" class="has-toolbar"> </div>

                                    </div>
                                    <!-- Event / Agenda / Upcoming Interview -->
                                    <div class="col-md-6 col-sm-12 no-space">
                                        <div class="portlet  md-shadow-none light m-0">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-notebook font-grey-gallery"></i>
                                                    <span class="caption-subject bold font-grey-gallery font-24-xs"> Event </span>
                                                    <!-- <span class="caption-helper">more samples...</span> -->
                                                </div>
                                                <div class="tools">
                                                    <!-- <a href="" class="collapse" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="reload" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="fullscreen" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="remove" data-original-title="" title=""> </a> -->
                                                </div>
                                            </div>
                                            <!-- @if empty -->
                                            <div class="portlet-body hidden">
                                                <div class="portlet md-shadow-none">
                                                    <div class="portlet-body text-center p-6">
                                                        <h3 class="font-weight-500 text-center font-grey-cascade mb-0"> No upcoming event </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- @else -->
                                            <div class="portlet-body">
                                                <div class="scroller mt-height-550-xs " data-always-visible="1" data-rail-visible1="1">

                                                <?php foreach ($invitation as $key => $value): ?>
                                                    <!-- List 1 -->
                                                    <div class="m-grid">
                                                        <div class="m-grid-col m-grid-col-xs-2 md-yellow accent-1 m-grid-col-center m-grid-col-middle">
                                                            <h3 class="mt-3 font-weight-700"><?php echo date('d', strtotime($value['start_date'])); ?></h3>
                                                            <h5 class="font-26-xs mb-3 roboto-font"><?php echo date('M', strtotime($value['start_date'])); ?></h5>
                                                        </div>
                                                        <div class="m-grid-col m-grid-col-xs-10">
                                                            <ul class="list-unstyled ml-3">
                                                                <li>
                                                                    <h4 class="font-weight-600"><?php echo $value['job_name'] ?> </h4>
                                                                </li>
                                                                <li class="">
                                                                    <h5 class="">
                                                                        <i class="icon-clock mr-2"></i><?php echo date('l', strtotime($value['start_date'])); ?> , <?php echo date('h:i', strtotime($value['start_date'])); ?> <?php echo date('A', strtotime($value['start_date'])); ?> - <?php echo date('h:i', strtotime($value['end_date'])); ?> <?php echo date('A', strtotime($value['end_date'])); ?></h5>
                                                                </li>
                                                                <li>
                                                                    <h5 class="">
                                                                        <span class="label label-md-shades <?php if($value['status'] == 'reschedule'){echo 'label-info';}elseif ($value['status'] == 'accept'){ echo 'label-md-green';
                                                                            }elseif ($value['status'] == 'reject' ) {echo 'label-md-red';}elseif ($value['status'] == 'pending') { echo 'label-warning'; }else{ echo 'darkblue';} ?> label-sm"><?php echo ($value['status'] == 'pending') ? 'Waiting for acceptance' : ucfirst($value['status']); ?></span>
                                                                    </h5>
                                                                </li>
                                                                <li>
                                                                    <a href="#modal_info_<?php echo rtrim(base64_encode($value['id']), '='); ?>" data-toggle="modal" class="btn btn-xs btn-md-indigo vertical-middle">More Info</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>                                                    
                                                    <div class="modal fade modal_detail_interview" id="modal_info_<?php echo rtrim(base64_encode($value['id']), '='); ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h4 class="modal-title">
                                                                        <i class="icon-briefcase mr-2"></i><?php echo $value['job_name'] ?> (<?php echo $value['company_name']; ?>)</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="scroller mt-height-300-xs" data-always-visible="1" data-rail-visible1="1">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <div class="col-md-4 text-right font-weight-700">
                                                                                    Job Position
                                                                                </div>
                                                                                <div class="col-md-8 text-uppercase font-weight-600" style="height: 19px;">
                                                                                    <?php echo $value['job_name'] ?>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="col-md-4 text-right font-weight-700">
                                                                                    Interview Session
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <?php echo $value['title']; ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- From -->
                                                                            <li>
                                                                                <div class="col-md-4 text-right font-weight-700">
                                                                                    From
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['start_date'])); ?> - <?php echo date('H:i', strtotime($value['start_date'])); ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- To -->
                                                                            <li>
                                                                                <div class="col-md-4 text-right font-weight-700">
                                                                                    To
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['end_date'])); ?> - <?php echo date('H:i', strtotime($value['end_date'])); ?>
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
                                                                <div class="modal-footer">
                                                                    <?php if ($value['status'] == 'pending') {?>
                                                                        <div class="col-md-12 text-right">
                                                                            <a href="#" class="btn btn-md-indigo btn-acc" job-id="<?php echo $value['job_id'];?>"  session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>" >Accept</a>
                                                                            <a href="#modal_rescheduled_form" data-toggle="modal" class="btn btn-md-orange btn-resc" job-id="<?php echo $value['job_id'];?>" session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>">Reschedule</a>
                                                                            <a href="#modal_reject_form" data-toggle="modal" class="btn btn-md-red btn-rej" job-id="<?php echo $value['job_id'];?>" session-id="<?php echo $value['session_id'];?>" employer-id="<?php echo $value['employer_id'];?>">Reject</a>

                                                                        </div>
                                                                    <?php } ?>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                                    <!-- BEGIN MODAL : Rescheduled Form -->
                                                    <div class="modal fade modal-open-noscroll" id="modal_rescheduled_form" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content form">
                                                                <div class="modal-header">
                                                                    <h4>Rescheduled</h4>
                                                                </div>
                                                                <form action="<?php echo base_url(); ?>student/applications_history/reschedule_invitation" class="form-horizontal" method="POST">
                                                                <input type="hidden" class="job-id" name="job_id"></input>
                                                                <input type="hidden" class="session-id" name="session_id"></input>
                                                                <input type="hidden" class="employer-id" name="employer_id"></input>
                                                                    <div class="modal-body form-body">
                                                                        <h5 class="form-section mx-0 col-md-12 mt-0">Propose New Schedule</h5>              
                                                                        <div class="row mx-0">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mx-0">
                                                                                    <label class="control-label">From</label>
                                                                                    <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                                        <input type="text" size="16" class="form-control" name="start_date">
                                                                                        <span class="input-group-addon">
                                                                                            <button class="btn default date-set" type="button">
                                                                                                <i class="fa fa-calendar"></i>
                                                                                            </button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">To</label>
                                                                                    <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                                        <input type="text" size="16" class="form-control" name="end_date">
                                                                                        <span class="input-group-addon">
                                                                                            <button class="btn default date-set" type="button">
                                                                                                <i class="fa fa-calendar"></i>
                                                                                            </button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mx-0">
                                                                            <div class="form-group mx-0 col-md-12">
                                                                                <label for="" class="control-label">Reschedule Reason</label>
                                                                                <textarea class="form-control" rows="10" name="candidate_reply" placeholder="Reschedule Reason"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button class="btn btn-md-red" type="submit"> Save</button>
                                                                        <a href="#" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Cancel</a>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- END MODAL : Rescheduled Form -->

                                                    <!-- BEGIN MODAL : Reject Form -->
                                                    <div class="modal fade modal-open-noscroll" id="modal_reject_form" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content form">
                                                                <div class="modal-header">
                                                                    <h4>Rejection Letter</h4>
                                                                </div>
                                                                <form action="<?php echo base_url(); ?>student/applications_history/reject_invitation" class="form-horizontal" method="POST">
                                                                <input type="hidden" class="job-id" name="job_id"></input>
                                                                <input type="hidden" class="session-id" name="session_id"></input>
                                                                <input type="hidden" class="employer-id" name="employer_id"></input>
                                                                    <div class="modal-body form-body">
                                                                            <h5 class="form-section mx-0 col-md-12 mt-0">Letter Content</h5>
                                                                            <div class="form-group mx-0 col-md-12">
                                                                                <label for="" class="control-label">Reply</label>
                                                                                <textarea class="form-control" rows="10" name="candidate_reply" placeholder="Rejection Reason"></textarea>
                                                                            </div>
                                                                            <div class="row mx-0">
                                                                                <div class="col-md-6">
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-6 text-right">
                                                                                    <button class="btn btn-md-red" type="submit"> Save</button>
                                                                                    <a href="#" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- END MODAL : Rescheduled Form -->

                                                    

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>

        <!-- END CONTENT