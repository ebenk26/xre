BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <h1 class="page-title"> Calendar
                    <small>Here latest events or public holiday show</small>
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Calendar</span>
                        </li>
                    </ul>

                </div>
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit  calendar">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="scroller mt-height-550-xs " data-always-visible="1" data-rail-visible1="1">
                                            <h4 class="mt-0 font-weight-600 text-uppercase font-26-xs">Event</h4>
                                            <hr class="my-3 " />
                                            <ul class="list-unstyled">
                                                <?php foreach ($invitation as $key => $value): ?>
                                                    <li>
                                                        <div class="note note-md-indigo note-bordered">
                                                            <h5 class="text-uppercase font-weight-600 letter-space-xs">
                                                                <i class="icon-briefcase mr-2"></i><?php echo $value['job_name'] ?></h5>
                                                            <h5 class="">
                                                                <i class="icon-calendar mr-2"></i><?php echo date('l', strtotime($value['start_date'])); ?> , <?php echo date('j F Y', strtotime($value['start_date'])); ?> </h5>
                                                            <h5 class="">
                                                                <i class="icon-clock mr-2"></i> <?php echo date('H:i A', strtotime($value['start_date'])); ?> - <?php echo date('H:i A', strtotime($value['end_date'])); ?>
                                                                <a href="#modal_more_info_<?php echo rtrim(base64_encode($value['id']), '=');?>" class="btn btn-outline white btn-xs btn-circle pull-right " data-toggle="modal">More info</a>
                                                            </h5>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                    <!-- BEGIN MODAL : More Info on Event -->
                                                    <div class="modal fade" id="modal_more_info_<?php echo rtrim(base64_encode($value['id']), '=');?>" tabindex="-1" role="dialog" aria-hidden="false">
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
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Job Position
                                                                                </div>
                                                                                <div class="col-md-9 text-uppercase font-weight-600 ">
                                                                                    <?php echo $value['job_name'] ?>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    User Name
                                                                                </div>
                                                                                <div class="col-md-9 text-uppercase ">
                                                                                    <?php echo $value['fullname'] ?>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Title
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <?php echo $value['title'] ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- From -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    From
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['start_date'])); ?> - <?php echo date('H:i A', strtotime($value['start_date'])); ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- To -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    To
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['end_date'])); ?> - <?php echo date('H:i A', strtotime($value['end_date'])); ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- Details -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Details
                                                                                </div>
                                                                                <div class="col-md-9">
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
                        
                                                    <!-- BEGIN MODAL : Edit Interview Session -->
                                                    <div class="modal fade " id="modal_edit_session_<?php echo rtrim(base64_encode($value['id']), '=');?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog ">
                                                            <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h4 class="modal-title font-weight-600 "> Edit [ <?php echo !empty($value['title']) ? $value['title'] : 'Session Name'; ?> ]
                                                                    </h4>
                                                                </div>
                                                                <form action="<?php echo base_url(); ?>candidate/edit_session" method="POST" class="form-horizontal">
                                                                    <div class="modal-body form-body ">
                                                                    <input type="hidden" name="id" value="<?php echo !empty($value['id']) ? $value['id'] : 0; ?>"></input>
                                                                    <input type="hidden" name="page" value="calendar"></input>
                                                                    <input type="hidden" value="<?php echo rtrim(base64_encode($value['interview_job_id']), '='); ?>" name="job_id"></input>
                                                                        <div class="form-group mx-0">
                                                                            <label class="control-label col-md-3">Title</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" value="<?php echo !empty($value['title']) ? $value['title'] : 'Session Name'; ?>" class="form-control input-medium" name="title" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mx-0">
                                                                            <label class="control-label col-md-3">From</label>
                                                                            <div class="col-md-6">
                                                                                <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                                    <input type="text" size="16" class="form-control" name="start_date" value="<?php echo !empty($value['start_date']) ? date('d F Y - H:i', strtotime($value['start_date'])) : '01 January 2018 - 00:00'; ?>">
                                                                                    <span class="input-group-addon">
                                                                                        <button class="btn default date-set" type="button">
                                                                                            <i class="fa fa-calendar"></i>
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mx-0">
                                                                            <label class="control-label col-md-3">To</label>
                                                                            <div class="col-md-6">
                                                                                <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                                    <input type="text" size="16" class="form-control" name="end_date" value="<?php echo !empty($value['end_date']) ? date('d F Y - H:i', strtotime($value['end_date'])) : '01 January 2018 - 00:00'; ?>">
                                                                                    <span class="input-group-addon">
                                                                                        <button class="btn default date-set" type="button">
                                                                                            <i class="fa fa-calendar"></i>
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mx-0">
                                                                            <label class="control-label col-md-3">Details</label>
                                                                            <div class="col-md-9 ">
                                                                                <textarea class="form-control" rows="5" name="description"><?php echo !empty($value['description']) ? $value['description'] : 'Session Name'; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer form-actions ">
                                                                        <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END MODAL : Edit Interview Session -->                                                    
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div id="fullcalendar" class="has-toolbar"> </div>
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