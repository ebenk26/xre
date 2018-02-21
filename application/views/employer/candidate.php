        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="portlet light md-transparent portlet-fit p-0">
                    <div class="portlet-title tabbable-line tab-md-indigo py-0  pl-0 mb-0 border-md-grey">
                        <div class="caption">
                            <span class="caption-subject font-weight-300 text-capitalize primary-font font-44-xs"> Candidate List</span>
                            <span class="caption-helper "><?php echo !empty($job) ? $job->name : 'none'; ?></span>
                        </div>
                        <ul class="nav nav-tabs mb-0 pb-0">
                            <li class="active">
                                <a href="#tab_new_candidates" data-toggle="tab">
                                    <i class="icon-users font-26-xs"></i> New </a>
                            </li>
                            <li>
                                <a href="#tab_shortlisted_candidates" data-toggle="tab">
                                    <i class="icon-user-following font-26-xs"></i> Shortlisted </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Job Board</span>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Candidate List [<?php echo !empty($job) ? $job->name : 'none'; ?>]</span>
                            <!-- <i class="fa fa-angle-right"></i> -->
                        </li>
                    </ul>

                </div>
                <div class="tab-content">

                    <!-- Tab New Candidates -->
                    <div class="tab-pane active" id="tab_new_candidates">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <!-- <i class="icon-user font-44-xs "></i> -->
                                    <span class="caption-subject"> New Candidates</span>
                                    <span class="caption-helper "><?php echo !empty($job) ? $job->name : 'none'; ?></span>
                                </div>
                                <!-- <div class="actions">
                                    <a href="" class="btn btn-md-indigo">Add to shortlist</a>
                                    <a href="" class="btn btn-md-red">Reject</a>
                                </div> -->
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered order-column" id="xremo_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center col-sm-1">#</th>
                                            <th class="col-sm-7"> Candidates </th>
                                            <th class="text-center col-sm-1 "> Application Status </th>
                                            <th class="text-center col-sm-1 "> Applied Date </th>
                                            <th class="text-center col-sm-2"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1; foreach ($candidates as $key => $value) { 
                                            if ($value['application_status'] == 'APPLIED' ) {
                                            ?>
                                            <tr class="odd gradeX ">
                                                <td class="text-center vertical-middle col-xs-1"><?php echo $i; ?></td>
                                                <td class="col-xs-4">
                                                    <div class="media verticle-middle hidden-xs ">
                                                        <div class="pull-left">
                                                            <img src="<?php echo !empty($value['img'])? IMG_STUDENTS.$value['img'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="" class="avatar avatar-circle avatar-xtramini avatar-border-sm  ">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="font-weight-500 font-26-xs"><?php echo $value['user_name']; ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="visible-xs">
                                                        <?php echo $value['user_name']; ?>
                                                    </div>
                                                </td>
                                                <td class="text-center vertical-middle col-xs-2"> <?php echo $value['application_status']; ?> </td>
                                                <td class="text-center vertical-middle col-xs-3"> <?php echo date('j F Y',strtotime($value['sent_at'])); ?> </td>
                                                <td class=" col-xs-2">
                                                    <div class="btn-group visible-xs">
                                                        <button class="btn green btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:void(0)" data-toggle="modal" class="btn btn-md-indigo  btn-icon-only  tooltips user-btn" data-container="body" data-placement="top" uid="<?php echo rtrim(base64_encode($value['id_user']),'=');?>" data-original-title="View Summary">
                                                                    <i class="icon-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="btn btn-md-orange btn-icon-only tooltips my-2 shortlist-btn" data-container="body" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-placement="top" data-original-title="Shortlist Candidate">
                                                                    <i class="icon-star"></i>
                                                                </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <button type="button" data-id='<?php echo rtrim(base64_encode($value['application_id']),'=');?>' candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" class="btn btn-md-red btn-icon-only tooltips my-2 mt-sweetalert reject-candidate" data-container="body" data-placement="top" data-original-title="Reject Candidate" data-title="Do you want to reject this candidate?"
                                                                    data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger"
                                                                    data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">
                                                                    <i class="icon-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul class="list-unstyled list-inline my-0 hidden-xs vertical-middle">
                                                        <li>
                                                            <a href="javascript:void(0)" data-toggle="modal" class="btn btn-md-indigo  btn-icon-only  tooltips user-btn" data-container="body" data-placement="top" uid="<?php echo rtrim(base64_encode($value['user_id']),'=');?>" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-container="body" data-placement="top" data-original-title="View Summary">
                                                                <i class="icon-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="btn btn-md-orange btn-icon-only tooltips my-2 shortlist-btn" data-container="body" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-placement="top" data-original-title="Shortlist Candidate">
                                                                <i class="icon-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" class="btn btn-md-red btn-icon-only tooltips my-2 mt-sweetalert reject-candidate" data-container="body" data-placement="top" data-original-title="Reject Candidate" data-title="Do you want to remove this post?"
                                                                data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger"
                                                                data-cancel-button-text='No' data-confirm-button-text='Yes' data-confirm-button-class="btn-info">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </li>
                                                    </ul>



                                                </td>
                                            </tr>
                                        <?php $i++; }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Shorlisted Candidate -->
                    <div class="tab-pane" id="tab_shortlisted_candidates">
                        <div class="portlet portlet-fit light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <!-- <i class="icon-user font-44-xs "></i> -->
                                    <span class="caption-subject"> Shortlisted Candidates</span>
                                    <!-- <span class="caption-helper ">Internship in IT</span> -->
                                </div>
                                <div class="actions">
                                    <div class="btn-group hidden">
                                        <a class="btn btn-circle btn-default " href="#modal_set_session" data-toggle="modal">
                                            <i class="fa fa-calendar"></i> Set Interview Session
                                        </a>

                                    </div>
                                        <a class="btn btn-circle btn-md-indigo" href="#modal_interview_session_list" data-toggle="modal">
                                        <i class="fa fa-calendar"></i> All Interview Session</a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered " id="xremo_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center col-xs-1">#</th>
                                            <th class="col-xs-4"> Candidates </th>
                                            <th class="text-center col-xs-2 "> Application Status </th>
                                            <th class="text-center col-xs-4"> Invitation Status </th>
                                            <th class="text-center col-xs-1"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i =1; foreach ($shortlisted as $key => $value) { ?>
                                            <tr class="odd gradeX ">
                                                <td class="text-center vertical-middle col-xs-1"><?php echo $i; ?></td>
                                                <td class="col-xs-4">
                                                    <div class="pull-left">
                                                        <img src="<?php echo !empty($value['img'])? IMG_STUDENTS.$value['img'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="" class="avatar avatar-circle avatar-xtramini avatar-border-sm  ">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="font-weight-500 font-26-xs"><?php echo $value['user_name']; ?></h4>
                                                    </div>
                                                </td>
                                                <td class="text-center vertical-middle col-xs-2">
                                                    <span class="label label-md-shades <?php if($value['application_status'] == 'SHORTLISTED'){echo 'label-warning';}elseif ($value['application_status'] == 'ACCEPTED'){ echo 'label-md-green';
                                                    }elseif ($value['application_status'] == 'REJECTED' || $value['application_status'] == 'WITHDRAW') {echo 'label-md-red';}elseif ($value['application_status'] == 'INTERVIEW') { echo 'label-info'; }else{ echo 'darkblue';} ?> label-sm"><?php echo !empty($value['application_status']) ? $value['application_status'] : 'Shortlisted' ?></span>
                                                </td>
                                                <td class="text-center vertical-middle col-xs-4">
                                                    <span class="label <?php if($value['interview_status'] == 'pending'){echo 'label-warning';}elseif ($value['interview_status'] == 'accept'){ echo 'label-md-green';
                                                    }elseif ($value['interview_status'] == 'reject') {echo 'label-md-red';}elseif ($value['interview_status'] == 'reschedule') { echo 'label-info'; }else{ echo 'darkblue';} ?> label-sm"><?php echo !empty($value['interview_status']) ? strtoupper($value['interview_status']) : 'Not Sent Invitation' ?></span> <?php echo $value['interview_title']; ?>
                                                </td>
                                                <td class="vertical-middle col-xs-1">
                                                    <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:void(0)" class="user-btn" data-toggle="modal" uid="<?php echo rtrim(base64_encode($value['id_user']),'=');?>">
                                                                        <i class="icon-eye"></i>
                                                                        View Summary
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <?php if ($value['interview_status'] == 'reschedule'): ?>
                                                                        <a href="#modal_rescheduled_form_<?php echo $value['interview_schedule_id'];?>" class="choose_session" candidate-email="<?php echo $value['user_email']; ?>" candidate-name="<?php echo $value['user_name'];?>" data-toggle="modal" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" job-id="<?php echo rtrim(base64_encode($job->id),'=')?>">
                                                                                <i class="icon-calendar"></i>
                                                                                Rescheduled Interview
                                                                            </a>
                                                                    <?php else: ?>
                                                                        <a href="#modal_set_session_<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" candidate-email="<?php echo $value['user_email']; ?>" candidate-name="<?php echo $value['user_name'];?>" data-toggle="modal" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" job-id="<?php echo rtrim(base64_encode($job->id))?>">
                                                                                <i class="icon-paper-plane"></i>
                                                                                Send Interview Invitation
                                                                            </a>
                                                                    <?php endif ?>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="#" class="md-green-text mt-sweetalert hire-candidate" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" >
                                                                        <i class="icon-check md-green-text"></i>
                                                                        Hire Candidate
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="md-red-text mt-sweetalert reject-candidate" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" >
                                                                        <i class="icon-close md-red-text"></i>
                                                                        Reject Candidate
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;} ?>
                                        <!-- BEGIN MODAL : View Candidate Summary -->
                                        <div class="modal fade modal-open-noscroll " id="modal_tab_shortlist_candidate" tabindex="-1" role="dialog" aria-hidden="false">
                                            
                                        </div>
                                        <!-- END MODAL : View Candidate Summary -->
                                    </tbody>
                                </table>

                                

                                <!-- BEGIN MODAL : Reject Form [IGNORE] -->
                                <div class="modal fade hidden" id="modal_reject_form" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Why You want to reject this candidate? State your reason!</h4>
                                            </div>
                                            <form action="<?php echo base_url(); ?>job_board/reject" class="form form-fit">
                                                <div class="modal-body">
                                                    <div class="form-group ">
                                                        <!-- <label class="control-label col-md-2">Default Editor</label> -->
                                                        <!-- <div class="col-md-10"> -->
                                                        <!-- <div name="summernote" id="summernote_1" > </div> -->
                                                        <textarea name="reason" class="form-control" rows="13" placeholder=""></textarea>
                                                        <span class="help-block md-red-text">Are you sure to reject this candidate ? Once you reject you can't get return back to view this candidates?</span>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                    <button class="btn btn-md-red "> Reject</button>
                                                    <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Cancel</a>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- END MODAL : Reject Form -->

                                <?php foreach ($shortlisted as $key => $value): ?>
                                    
                                
                                <!-- BEGIN MODAL : Rescheduled Form -->
                                <div class="modal fade modal-open-noscroll" id="modal_rescheduled_form_<?php echo $value['interview_schedule_id'];?>" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content form">
                                            <div class="modal-header">
                                                <h4>Rescheduled</h4>
                                            </div>
                                            <form action="<?php echo base_url(); ?>employer/candidate/reschedule_interview_session" method="POST" class="form-horizontal">
                                                <input type="hidden" name="interview_schedule_id" value="<?php echo rtrim(base64_encode($value['interview_schedule_id']), '='); ?>">
                                                <input type="hidden" name="job_position_id" value="<?php echo rtrim(base64_encode($value['job_position_id']), '='); ?>">
                                                <input type="hidden" name="candidate_id" value="<?php echo rtrim(base64_encode($value['interview_schedule_user_id']), '='); ?>">
                                                
                                                <div class="modal-body form-body">
                                                    <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">
                                                        <div class="row mx-0">
                                                            <div class="form-group mx-0 col-md-12">
                                                                <label class="control-label font-weight-600">Requested By</label><br>
                                                                <label class="control-label"><?php echo $value['user_name'];?></label>
                                                                <br>
                                                                <label class="control-label font-weight-600">Proposed Start Date</label> <br>
                                                                <label class="control-label"><?php echo date('d M Y H:i:s', strtotime($value['suggested_start_date'] ));?></label>
                                                                <br/>
                                                                <label class="control-label font-weight-600">Proposed End Date</label> <br><label class="control-label"><?php echo date('d M Y H:i:s', strtotime($value['suggested_end_date'] ));?></label><br>
                                                                <label class="control-label font-weight-600">Reschedule Reason</label><br>
                                                                <p class="form-control-static"><?php echo $value['candidate_reply']; ?></p>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mx-0 col-md-12">
                                                            <label for="">Do you agree to rescheduled ?</label>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="confirmation" class="agree-reschedule"  value="Yes"  checked="checked"> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="confirmation" class="disagree-reschedule"  value="No"> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!-- If Radio "Yes" -->
                                                        <div class="recreate-session">
                                                            <h5 class="form-section mx-0 col-md-12 mt-0">New Schedule</h5>
                                                            <div class="row mx-0">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mx-0">
                                                                        <label class="control-label">From</label>
                                                                        <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                            <input type="text" size="16" class="form-control" name="start_date" value="<?php echo date('d F Y - H:i', strtotime($value['suggested_start_date'] ));?>">
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
                                                                            <input type="text" size="16" class="form-control" name="end_date" value="<?php echo date('d F Y - H:i', strtotime($value['suggested_end_date'] ));?>">
                                                                            <span class="input-group-addon">
                                                                                <button class="btn default date-set" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mx-0 col-md-12">
                                                                <label for="" class="control-label">Reply</label>
                                                                <textarea class="form-control" rows="10" placeholder="Your reply to candidate" name="reschedule_detail"></textarea>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">

                                                    <button class="btn btn-md-red "> Save</button>
                                                    <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Cancel</a>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- END MODAL : Rescheduled Form -->



                                <!-- INTERVIEW -->
                                <!-- BEGIN MODAL : Set Interview Session -->
                                <div class="modal fade" id="modal_set_session_<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title font-weight-600 ">Interview Schedule
                                                </h4>
                                            </div>
                                            <form action="<?php echo base_url(); ?>employer/job_board/single_invitation" method="POST" class="form-horizontal">
                                                <input type="hidden" value="<?php echo $job_id; ?>" name="job_id"></input>
                                                <input type="hidden" value="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" name="candidate_id"></input>
                                                <input type="hidden" value="<?php echo rtrim(base64_encode($value['application_id']),'='); ?>" name="application_id"></input>
                                                <input type="hidden" name="candidate_email" value="<?php echo $value['user_email']; ?>"></input>
                                                <input type="hidden" name="candidate_name" value="<?php echo $value['user_name'];?>"></input>
                                                <div class="modal-body form-body ">
                                                    <div class="form-group mx-0">
                                                        <label class="control-label col-md-3">Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="title" value="Session 1" class="form-control input-medium">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mx-0">
                                                        <label class="control-label col-md-3">From</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group date form_datetime form_datetime bs-datetime">
                                                                <input type="text" name="start_date" size="16" class="form-control">
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
                                                                <input type="text" name="end_date" size="16" class="form-control">
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
                                                            <textarea class="form-control" rows="5" name="description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer form-actions ">
                                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- END MODAL : Set Interview Session -->

                                <!-- BEGIN MODAL : View Reject Detail -->
                                <div class="modal fade modal-open-noscroll" id="modal_view_reject_detail" tabindex="-1" role="dialog" aria-hidden="false">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content form">
                                            <div class="modal-header">
                                                <h4 class="font-weight-600">Rejection Letter
                                                    <small class="font-weight-300">by <?php echo $value['user_name'] ?></small>
                                                </h4>

                                            </div>
                                            <form action="" class="form-horizontal">
                                                <div class="modal-body form-body">
                                                    <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">
                                                        <div class="row mx-0">
                                                            <div class="form-group mx-0 col-md-12">
                                                                <p class="form-control-static"><?php echo $value['candidate_reply'] ?></p>
                                                            </div>
                                                        </div>





                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Close</a>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <!-- END MODAL : View Reject Detail-->

                                <?php endforeach ?>
                            </div>
                        </div>

                    </div>

                    <!-- BEGIN MODAL : View Candidate Summary -->
                    <div class="modal fade modal-open-noscroll " id="modal_view_summary" tabindex="-1" role="dialog" aria-hidden="false">
                        
                    </div>
                    <!-- END MODAL : View Candidate Summary -->

                    <!-- BEGIN MODAL : All available session -->
                    <div class="modal fade modal-open-noscroll" id="modal_interview_session_list" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content form">
                                <div class="modal-header">
                                    <h4 class="font-weight-600">All interview session
                                    </h4>

                                </div>
                                <div class="modal-body form-body">
                                    <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row mx-0">
                                            <div class="form-group mx-0 col-md-12">
                                                    <table class="table table-striped table-bordered table-hover  order-column">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th> Session </th>
                                                                <th> Candidate </th>
                                                                <th> Status </th>
                                                                <th> From </th>
                                                                <th> To </th>
                                                                <th> Action </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;foreach ($interview_session as $key => $session_value) { ?>
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td class="text-center" ><?=$no?></td>
                                                                    <td>
                                                                        <?=$session_value['title']?>                                                     
                                                                    </td>
                                                                    <td>
                                                                        <?=$session_value['candidate_name']?>                                                     
                                                                    </td>
                                                                    <td>
                                                                        <?=$session_value['interview_status']?>                                                     
                                                                    </td>
                                                                    <td>
                                                                        <?=date('d M Y H:i', strtotime($session_value['start_date'] ));?>
                                                                    </td>
                                                                    <td> <?=date('d M Y H:i', strtotime($session_value['end_date'] ));?></td>
                                                                    <td> 
                                                                        <a href="#modal_view_detail_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                                                        <a href="#modal_edit_session_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                                        <a href="#" class="remove-interview-session <?php echo ($session_value['interview_status'] == 'accept') ? 'hidden' : ''; ?>" session-id="<?php echo rtrim(base64_encode($session_value['id']), '=');?>" application-id="<?php echo rtrim(base64_encode($session_value['application_id']), '=');?>"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>         
                                                                                           
                                                            <?php $no++;} ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Close</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END MODAL : All available session-->

                    <!-- BEGIN MODAL : All available session -->
                    <div class="modal fade modal-open-noscroll" id="modal_interview_session_list" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content form">
                                <div class="modal-header">
                                    <h4 class="font-weight-600">All available session
                                    </h4>

                                </div>
                                <div class="modal-body form-body">
                                    <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">
                                        <div class="row mx-0">
                                            <div class="form-group mx-0 col-md-12">
                                                    <table class="table table-striped table-bordered table-hover  order-column">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th> Title </th>
                                                                <th> From </th>
                                                                <th> To </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;foreach ($interview_session as $key => $session_value) { ?>
                                                                
                                                                <tr class="odd gradeX">
                                                                    <td class="text-center" ><?=$no?></td>
                                                                    <td>
                                                                        <?=$session_value['title']?>                                                     
                                                                    </td>
                                                                    <td>
                                                                        <?=date('d M Y H:i:s', strtotime($session_value['start_date'] ));?>
                                                                    </td>
                                                                    <td> <?=date('d M Y H:i:s', strtotime($session_value['end_date'] ));?></td>
                                                                </tr>                                        
                                                            <?php $no++;} ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Close</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END MODAL : All available session-->

                    

                    <?php foreach ($interview_session as $key => $session_value): ?>
                    
                    <!-- BEGIN MODAL : View Interview Detail-->
                    <div class="modal fade " id="modal_view_detail_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title font-weight-600 "> View Interview Details
                                    </h4>
                                </div>


                                <div class="modal-body">
                                    <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="col-md-3 text-right font-weight-700">
                                                    Job Position
                                                </div>
                                                <div class="col-md-9 text-uppercase font-weight-600 ">
                                                    <?php echo !empty($job) ? $job->name : 'none'; ?>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-md-3 text-right font-weight-700">
                                                    Title
                                                </div>
                                                <div class="col-md-9">
                                                    <?php echo !empty($session_value) ? $session_value['title'] : 'none'; ?>
                                                </div>
                                            </li>
                                            <!-- From -->
                                            <li>
                                                <div class="col-md-3 text-right font-weight-700">
                                                    From
                                                </div>
                                                <div class="col-md-9">
                                                    <i class="icon-calendar mr-2"></i> <?php echo !empty($session_value['start_date']) ? date('d F Y - H:i', strtotime($session_value['start_date'])) : '01 January 2018 - 00:00'; ?>
                                                </div>
                                            </li>
                                            <!-- To -->
                                            <li>
                                                <div class="col-md-3 text-right font-weight-700">
                                                    To
                                                </div>
                                                <div class="col-md-9">
                                                    <i class="icon-calendar mr-2"></i> <?php echo !empty($session_value['end_date']) ? date('d F Y - H:i', strtotime($session_value['end_date'])) : '01 January 2018 - 00:00'; ?>
                                                </div>
                                            </li>
                                            <!-- Details -->
                                            <li>
                                                <div class="col-md-3 text-right font-weight-700">
                                                    Details
                                                </div>
                                                <div class="col-md-9">
                                                    <?php echo !empty($session_value['description']) ? $session_value['description'] : 'Session Name'; ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END MODAL : View Interview Detail-->   


                    <!-- BEGIN MODAL : Edit Interview Session -->
                        <div class="modal fade " id="modal_edit_session_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog ">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title font-weight-600 "> Edit [ <?php echo !empty($session_value['title']) ? $session_value['title'] : 'Session Name'; ?> ]
                                        </h4>
                                    </div>
                                    <form action="<?php echo base_url(); ?>candidate/edit_session" method="POST" class="form-horizontal">
                                        <div class="modal-body form-body ">
                                        <input type="hidden" name="id" value="<?php echo !empty($session_value['id']) ? $session_value['id'] : 0; ?>"></input>
                                        <input type="hidden" value="<?php echo $job_id; ?>" name="job_id"></input>
                                            <div class="form-group mx-0">
                                                <label class="control-label col-md-3">Title</label>
                                                <div class="col-md-9">
                                                    <input type="text" value="<?php echo !empty($session_value['title']) ? $session_value['title'] : 'Session Name'; ?>" class="form-control input-medium" name="title" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group mx-0">
                                                <label class="control-label col-md-3">From</label>
                                                <div class="col-md-6">
                                                    <div class="input-group date form_datetime form_datetime bs-datetime">
                                                        <input type="text" size="16" class="form-control" name="start_date" value="<?php echo !empty($session_value['start_date']) ? date('d F Y - H:i', strtotime($session_value['start_date'])) : date('d F Y - H:i'); ?>">
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
                                                        <input type="text" size="16" class="form-control" name="end_date" value="<?php echo !empty($session_value['end_date']) ? date('d F Y - H:i', strtotime($session_value['end_date'])) : date('d F Y - H:i'); ?>">
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
                                                    <textarea class="form-control" rows="5" name="description"><?php echo !empty($session_value['description']) ? $session_value['description'] : 'Session Name'; ?></textarea>
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
                        <!-- BEGIN MODAL : Choose interview session for user -->
                        <div class="modal fade " id="choose_interview_session" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content form">
                                    <div class="modal-header">
                                        <h4 class="font-weight-600">Select interview session for the user
                                        </h4>

                                    </div>
                                    <div class="modal-body form-body">
                                        <div class="scroller mt-height-300-xs mt-height-500-sm mt-height-600-md" data-always-visible="1" data-rail-visible1="1">
                                            <div class="row mx-0">
                                                <div class="form-group mx-0 col-md-12">
                                                        <table class="table table-striped table-bordered table-hover  order-column">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">#</th>
                                                                    <th> Title </th>
                                                                    <th> From </th>
                                                                    <th> To </th>
                                                                    <th> Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1;foreach ($interview_session as $key => $session_value) { ?>
                                                                    
                                                                    <tr class="odd gradeX">
                                                                        <td class="text-center" ><?=$no?></td>
                                                                        <td>
                                                                            <?=$session_value['title']?>                                                     
                                                                        </td>
                                                                        <td>
                                                                            <?=date('d M Y H:i:s', strtotime($session_value['start_date'] ));?>
                                                                        </td>
                                                                        <td> <?=date('d M Y H:i:s', strtotime($session_value['end_date'] ));?></td>
                                                                        <td> 
                                                                            <a href="#" class="send-invitation invite-candidate" interview-id="<?php echo rtrim(base64_encode($session_value['id']),'='); ?>" job-id="<?php echo rtrim(base64_encode($job->id),'='); ?>"  data-toggle="modal"><i class="icon-paper-plane"></i></a>
                                                                        </td>
                                                                    </tr>         
                                                                                               
                                                                <?php $no++;} ?>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="" class="btn btn-outline-md-red" data-dismiss="modal" aria-hidden="true">Close</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END MODAL :  Choose interview session for user -->

                </div>

            </div>
        </div>
        <!-- END CONTENT