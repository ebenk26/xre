<div class="page-content-wrapper">
    <div class="page-content">
        <!-- <div class="loading">
            <img src="<?= base_url(); ?>assets/employer/img/loading.gif">
        </div> -->

        <!-- # Title / Tab -->
        <div class="portlet light md-transparent portlet-fit p-0">
            <div class="portlet-title tabbable-line tab-md-indigo py-0  pl-0 mb-0 border-md-grey">
                <div class="caption">
                    <i class="icon-briefcase font-20"></i>
                    <span class="caption-subject font-weight-300 text-capitalize  font-24">
                        <?php echo !empty($job) ? $job->name : 'none'; ?>
                    </span>
                    <span class="caption-helper ">Candidate List</span>
                </div>
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_new_candidates" data-toggle="tab">
                            <i class="icon-users font-22"></i> New </a>
                    </li>
                    <li>
                        <a href="#tab_shortlisted_candidates" data-toggle="tab">
                            <i class="icon-user-following font-22"></i> Shortlisted </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- # Page Bar -->
        <div class="page-bar ">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>employer/dashboard">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo base_url();?>employer/job_board">Job Board</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>
                        <?php echo !empty($job) ? $job->name : 'none'; ?> [Candidate List]</span>
                </li>
            </ul>
        </div>
        <!-- # Tab Content -->
        <div class="tab-content">

            <!-- Tab New Candidates -->
            <div class="tab-pane active" id="tab_new_candidates">

                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject ">New Candidates</span>
                        </div>
                    </div>
                    <?php if (!empty($candidates)) :?>
                    <!-- Fix : Need to put another logic to diffrentiate new candidate and other type -->
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
                                    <td class="text-center ">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="">
                                        <div class="media hidden-xs ">
                                            <div class="pull-left">
                                                <img src="<?php echo !empty($value['img'])? IMG_STUDENTS.$value['img'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="<?php echo $value['user_name']; ?>" class="avatar avatar-circle avatar-xtramini  ">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="font-weight-500 font-18">
                                                    <?php echo $value['user_name']; ?>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="visible-xs ">
                                            <?php echo $value['user_name']; ?>
                                        </div>
                                    </td>
                                    <td class="text-center  font-weight-600 ">
                                        <?php echo $value['application_status']; ?> </td>
                                    <td class="text-center  ">
                                        <?php echo date('j F Y',strtotime($value['sent_at'])); ?> </td>
                                    <!-- MOBILE MODE -->
                                    <td class="">
                                        <div class="btn-group dropup clearfix  visible-xs visible-sm hidden-md">
                                            <button class="btn btn-md-green btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions 
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu " role="menu">
                                                <!-- View Summary -->
                                                <li>
                                                    <a href="javascript:void(0)" data-toggle="modal" class="user-btn" data-container="body" data-placement="top" uid="<?php echo rtrim(base64_encode($value['id_user']),'=');?>" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-original-title="View Summary">
                                                        <i class="icon-eye"></i> View Summary
                                                    </a>
                                                </li>
                                                <!-- Shortlist Candidate -->
                                                <li>
                                                    <a href="javascript:void(0)" class=" shortlist-btn" data-container="body" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-placement="top" data-original-title="Shortlist Candidate">
                                                        <i class="icon-star"></i> Shortlist Candidate
                                                    </a>
                                                </li>
                                                <!-- Reject Candidate -->
                                                <li>
                                                    <button type="button" data-id='<?php echo rtrim(base64_encode($value[' application_id ']),'=');?>' candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" class="btn btn-no-border btn-md-red btn-outline mt-sweetalert reject-candidate" data-container="body" data-placement="top" data-original-title="Reject Candidate"
                                                        data-title="Do you want to reject this candidate?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes'
                                                        data-confirm-button-class="btn-info">
                                                        <i class="icon-trash"></i> Reject Candidate
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group  hidden-xs hidden-sm visible-md visible-lg  clearfix ">
                                            <!-- View Summary -->
                                            <a href="javascript:void(0)" data-toggle="modal" class="btn btn-md-indigo  btn-icon-only tooltips user-btn" data-container="body" data-placement="top" uid="<?php echo rtrim(base64_encode($value['user_id']),'=');?>" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-container="body"
                                                data-placement="top" data-original-title="View Summary">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <!-- shortlist Candidate -->
                                            <a href="javascript:void(0)" class="btn btn-md-orange btn-icon-only tooltips shortlist-btn" data-container="body" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" data-placement="top" data-original-title="Shortlist Candidate">
                                                <i class="icon-star"></i>
                                            </a>
                                            <!-- Reject Candidate -->
                                            <button type="button" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" class="btn btn-md-red btn-icon-only tooltips  mt-sweetalert reject-candidate" data-container="body" data-placement="top" data-original-title="Reject Candidate"
                                                data-title="Do you want to remove this post?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text='No' data-confirm-button-text='Yes'
                                                data-confirm-button-class="btn-info">

                                                <i class="icon-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <?php $i++; }} ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="portlet-body text-center p-100">
                        <i class="icon-ghost font-grey-mint font-60 mb-30"></i>
                        <h4 class="text-center font-weight-500 font-grey-mint">Sorry , We did not find any candidates.</h4>
                        <!-- <h5 class="text-center  font-grey-cascade mt-1 text-none">Go to.</h5> -->
                    </div>
                    <?php endif ?>
                </div>
            </div>

            <!-- Tab Shorlisted Candidate -->
            <div class="tab-pane" id="tab_shortlisted_candidates">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject"> Shortlisted Candidates</span>
                        </div>
                        <div class="actions">
                            <a class="btn  btn-md-indigo" href="#modal_interview_session_list" data-toggle="modal">
                                <i class="icon-calendar"></i> Interview Session</a>
                        </div>
                    </div>
                    <?php if (!empty($shortlisted)): ?>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered " id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="text-center col-xs-1">#</th>
                                    <th class="col-xs-4"> Candidates </th>
                                    <th class="text-center col-xs-2 "> Application Status </th>
                                    <th class="text-center col-xs-2"> Applied Date </th>
                                    <th class="text-center col-xs-4"> Invitation Status </th>
                                    <th class="text-center col-xs-1"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; foreach ($shortlisted as $key => $value) { ?>
                                <tr class="odd gradeX ">
                                    <td class="text-center vertical-middle col-xs-1">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="col-xs-4">
                                        <div class="pull-left">
                                            <img src="<?php echo !empty($value['img'])? IMG_STUDENTS.$value['img'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="" class="avatar avatar-circle avatar-xtramini mr-10  ">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="font-weight-500 font-18">
                                                <?php echo $value['user_name']; ?>
                                            </h4>
                                        </div>
                                    </td>
                                    <td class="text-center vertical-middle col-xs-2 ">
                                        <span class="label  <?php 
                                            if($value['application_status'] == 'SHORTLISTED'){
                                                echo 'label-md-purple';
                                            }elseif ($value['application_status'] == 'ACCEPTED'){
                                                 echo 'label-md-green';
                                            }
                                            elseif ($value['application_status'] == 'REJECTED' || $value['application_status'] == 'WITHDRAW') {
                                            echo 'label-md-red';
                                            }elseif ($value['application_status'] == 'INTERVIEW') { 
                                            echo 'label-info';
                                            }
                                            else{ echo 'label-md-darkblue';} ?> 
                                            label-sm">
                                            <?php echo !empty($value['application_status']) ? $value['application_status'] : 'Shortlisted' ?>
                                        </span>
                                    </td>
                                    <td class="text-center vertical-middle col-xs-1">
                                        <?php echo date('d M Y', strtotime($value['sent_at'] ));?>
                                    </td>
                                    <td class="text-center vertical-middle col-xs-4">
                                        <span class="mr-5 label <?php if($value['interview_status'] == 'pending'){echo 'label-warning';}elseif ($value['interview_status'] == 'accept'){ echo 'label-md-green';
                                                        }elseif ($value['interview_status'] == 'reject') {echo 'label-md-red';}elseif ($value['interview_status'] == 'reschedule') { echo 'label-info'; }else{ echo 'label-md-darkblue';} ?> label-sm">
                                            <?php echo !empty($value['interview_status']) ? strtoupper($value['interview_status']) :'Invitation not sent' ?>
                                        </span>
                                        <b>
                                            <?php echo $value['interview_title']; ?>
                                        </b>
                                    </td>
                                    <td class="vertical-middle col-xs-1">
                                        <div class="btn-group">
                                            <button class="btn btn-xs btn-md-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="javascript:void(0)" class="user-btn" data-toggle="modal" uid="<?php echo rtrim(base64_encode($value['id_user']),'=');?>" app-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>">
                                                        <i class="icon-eye"></i>
                                                        View Summary
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php if ($value['interview_status'] == 'reschedule'): ?>
                                                    <a href="#modal_rescheduled_form_<?php echo $value['interview_schedule_id'];?>" class="choose_session" candidate-email="<?php echo $value['user_email']; ?>" candidate-name="<?php echo $value['user_name'];?>" data-toggle="modal" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>"
                                                        job-id="<?php echo rtrim(base64_encode($job->id),'=')?>">
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
                                                    <a href="#" class="md-green-text mt-sweetalert hire-candidate" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>">
                                                        <i class="icon-check md-green-text"></i>
                                                        Hire Candidate
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="md-red-text mt-sweetalert reject-candidate" data-id="<?php echo rtrim(base64_encode($value['application_id']),'=');?>" candidate-id="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>">
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
                                <div class="modal fade " id="modal_tab_shortlist_candidate" tabindex="-1" role="dialog" aria-hidden="false">
                                </div>
                                <!-- END MODAL : View Candidate Summary -->
                            </tbody>
                        </table>

                        <?php foreach ($shortlisted as $key => $value): ?>

                        <!-- BEGIN MODAL : Rescheduled Form -->
                        <div class="modal fade" id="modal_rescheduled_form_<?php echo $value['interview_schedule_id'];?>" tabindex="-1" role="dialog" aria-hidden="false" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="font-weight-600 mb-20">Rescheduled Session</h4>
                                        <h5 class="font-weight-400">Requested By
                                            <b>
                                                <?php echo $value['user_name'];?> </b>
                                        </h5>
                                    </div>
                                    <form action="<?php echo base_url(); ?>employer/candidate/reschedule_interview_session" method="POST" class="form">
                                        <input type="hidden" name="interview_schedule_id" value="<?php echo rtrim(base64_encode($value['interview_schedule_id']), '='); ?>">
                                        <input type="hidden" name="job_position_id" value="<?php echo rtrim(base64_encode($value['job_position_id']), '='); ?>">
                                        <input type="hidden" name="candidate_id" value="<?php echo rtrim(base64_encode($value['interview_schedule_user_id']), '='); ?>">
                                        <div class="modal-body ">
                                            <!-- Start DAte /Time [Proposed] -->
                                            <div class="row">
                                                <!-- Date -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="md-grey-darken-3-text mb-10 font-weight-600">Proposed Date</label>
                                                        <div class="input-icon ">
                                                            <i class="icon-calendar"></i>
                                                            <input type="text" class="form-control date date-picker" readonly disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Time -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" md-grey-darken-3-text mb-10 font-weight-600">Proposed Time</label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                            <input type="text" class="form-control timepicker timepicker-24" readonly disabled> </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Reason -->
                                            <div class="row mx-0 mt-20">
                                                <label for="" class="md-grey-darken-3-text mb-10 font-weight-600"> Rescheduled Reason</label>
                                                <p class="">
                                                    <?php echo $value['candidate_reply']; ?>
                                                </p>
                                            </div>
                                            <!-- Radio Button -->
                                            <!-- Fix : Show new schedule when radio button click 'no' -->
                                            <div class="form-group mt-20 ">
                                                <label for="" class="md-grey-darken-3-text mb-10 font-weight-600">Do you agree to rescheduled ?</label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="confirmation" class="agree-reschedule" value="Yes" checked="checked"> Yes
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="confirmation" class="disagree-reschedule" value="No"> No
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- If Radio "No" -->
                                            <div class="recreate-session">
                                                <h4 class="form-section ">New Schedule</h4>
                                                <!-- Start Date / Time -->
                                                <div class="row">
                                                    <!-- Date -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class=" control-label md-grey-darken-3-text mb-10 font-weight-600 ">Date </label>
                                                            <div class="input-icon ">
                                                                <i class="icon-calendar"></i>
                                                                <input type="text" class="form-control date date-picker">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Time -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class=" control-label md-grey-darken-3-text mb-10 font-weight-600 "> Time </label>
                                                            <div class="input-icon">
                                                                <i class="fa fa-clock-o"></i>
                                                                <input type="text" class="form-control timepicker timepicker-24"> </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mx-0 ">
                                                    <label for="" class="control-label">Reply</label>
                                                    <textarea class="form-control" rows="10" placeholder="Your reply to candidate" name="reschedule_detail"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <a class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                            <button class="btn btn-md-indigo width-200 letter-space-xs"> Send </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL : Rescheduled Form -->

                        <!-- INTERVIEW -->
                        <!-- BEGIN MODAL : Set Interview Session -->
                        <div class="modal fade" id="modal_set_session_<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog fade-in-up">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title font-weight-600 ">Set Schedule Interview
                                        </h4>
                                    </div>
                                    <form action="<?php echo base_url(); ?>employer/job_board/single_invitation" method="POST" class="form">
                                        <input type="hidden" value="<?php echo $job_id; ?>" name="job_id"></input>
                                        <input type="hidden" value="<?php echo rtrim(base64_encode($value['user_id']),'='); ?>" name="candidate_id"></input>
                                        <input type="hidden" value="<?php echo rtrim(base64_encode($value['application_id']),'='); ?>" name="application_id"></input>
                                        <input type="hidden" name="candidate_email" value="<?php echo $value['user_email']; ?>"></input>
                                        <input type="hidden" name="candidate_name" value="<?php echo $value['user_name'];?>"></input>
                                        <div class="modal-body ">
                                            <!-- Title -->
                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Title</label>
                                                <input type="text" name="title" value="Session 1" class="form-control">
                                            </div>
                                            <!-- Start Date / Time -->
                                            <div class="row">
                                                <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">Start Date / Time </label>
                                                <!-- Date -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon ">
                                                            <i class="icon-calendar"></i>
                                                            <input type="text" class="form-control date date-picker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Time -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                            <input type="text" class="form-control timepicker timepicker-24"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Date / Time -->
                                            <div class="row">
                                                <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">End Date / Time </label>
                                                <!-- Date -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon ">
                                                            <i class="icon-calendar"></i>
                                                            <input type="text" class="form-control date date-picker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Time -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                            <input type="text" class="form-control timepicker timepicker-24"> </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Checkbox: All Day -->
                                            <!-- Note : IF user check this box , only show  below -->
                                            <div class="form-group form-md-checkboxes mx-0 ">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox_allday" class="md-check">
                                                    <label for="checkbox_allday">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> All Day </label>
                                                </div>
                                            </div>
                                            <!-- Date [If All Day Check]-->
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
                                            </div>
                                            <!-- Start Time & End Time [If All Day Check] -->
                                            <div class="row mb-30">
                                                <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">Time</label>
                                                <div class="col-md-6">
                                                    <div class="input-icon ">
                                                        <i class="icon-clock"></i>
                                                        <input type="text" class="form-control timepicker timepicker-24 " placeholder="start time">
                                                        <span class="helper-block font-15">Start</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-icon ">
                                                        <i class="icon-clock"></i>
                                                        <input type="text" class="form-control timepicker timepicker-24 " placeholder="end time">
                                                        <span class="helper-block font-15">End</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mx-0">
                                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Details</label>
                                                <textarea class="form-control" rows="5" name="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-md-indigo width-200 letter-space-xs">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- END MODAL : Set Interview Session -->

                        <!-- BEGIN MODAL : View Reject Detail -->
                        <div class="modal fade" id="modal_view_reject_detail" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="font-weight-600">Rejection Letter
                                            <small class="font-weight-300">by
                                                <?php echo $value['user_name'] ?>
                                            </small>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <?php echo $value['candidate_reply'] ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="" class="btn btn-outline btn-md-red" data-dismiss="modal" aria-hidden="true">Close</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END MODAL : View Reject Detail-->

                        <?php endforeach ?>
                    </div>
                    <?php else: ?>
                    <div class="portlet-body text-center p-100">
                        <i class="icon-ghost font-grey-mint font-60 mb-30"></i>
                        <h4 class="text-center font-weight-500 font-grey-mint">Sorry , We did not find any candidates.</h4>
                        <h5 class="text-center  font-grey-cascade mt-1 text-none">Go to 'tab new candidate' and select suitable candidate for your company.</h5>
                    </div>
                    <?php endif ?>
                </div>

            </div>


            <!-- BEGIN MODAL : View Candidate Summary -->
            <div class="modal fade modal-open-noscroll " id="modal_view_summary" tabindex="-1" role="dialog" aria-hidden="false">
            </div>
            <!-- END MODAL : View Candidate Summary -->

            <!-- BEGIN MODAL : All available session -->
            <div class="modal fade" id="modal_interview_session_list" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content form">
                        <div class="modal-header">
                            <h4 class="">Interview session</h4>
                        </div>
                        <div class="modal-body form-body">
                            <div class="row mx-0">
                                <div class="form-group mx-0 col-md-12">
                                    <?php if(!empty($interview_session)): ?>
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
                                                <td class="text-center">
                                                    <?=$no?>
                                                </td>
                                                <!-- Session -->
                                                <td>
                                                    <?=$session_value['title']?>
                                                </td>
                                                <!-- Candidate -->
                                                <td>
                                                    <?=$session_value['candidate_name']?>
                                                </td>
                                                <!-- Status -->
                                                <td class="text-capitalized">
                                                    <?=$session_value['interview_status']?>
                                                </td>
                                                <!-- From -->
                                                <td>
                                                    <?=date('d M Y H:i', strtotime($session_value['start_date'] ));?>
                                                </td>
                                                <!-- To -->
                                                <td>
                                                    <?=date('d M Y H:i', strtotime($session_value['end_date'] ));?>
                                                </td>
                                                <!-- Action -->
                                                <td>
                                                    <a class="btn btn-icon-only btn-md-indigo" href="#modal_view_detail_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" data-toggle="modal">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-icon-only btn-md-blue" href="#modal_edit_session_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" data-toggle="modal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-icon-only btn-md-red" href="#" class="remove-interview-session <?php echo ($session_value['interview_status'] == 'accept') ? 'hidden' : ''; ?>" session-id="<?php echo rtrim(base64_encode($session_value['id']), '=');?>" application-id="<?php echo rtrim(base64_encode($session_value['application_id']), '=');?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <?php $no++;} ?>
                                        </tbody>
                                    </table>
                                    <!-- EMPTY STATE -->
                                    <?php else: ?>
                                    <div class="portlet-body text-center">
                                        <div class="portlet-body text-center p-100">
                                            <i class="icon-ghost font-grey-mint font-60 mb-30"></i>
                                            <h4 class="text-center font-weight-500 font-grey-mint">Sorry , We did not find any interview session for
                                                <?php echo $job->name; ?> at this moment</h4>
                                            <h4 class="text-center font-weight-500 font-grey-mint"></h4>
                                            <h5 class="text-center  font-grey-cascade mt-1 text-none">Create interview session by click button and appoint candidates.</h5>
                                        </div>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <a href="" class="btn btn-outline btn-md-indigo" data-dismiss="modal" aria-hidden="true">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL : All available session-->

            <!-- BEGIN MODAL : All available session -->
            <!-- NOTE : BE HIDDEN -->
            <div class="modal fade modal-open-noscroll" id="modal_interview_session_list" tabindex="-1" role="dialog" aria-hidden="false" hidden>
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
                                                    <td class="text-center">
                                                        <?=$no?>
                                                    </td>
                                                    <td>
                                                        <?=$session_value['title']?>
                                                    </td>
                                                    <td>
                                                        <?=date('d M Y H:i:s', strtotime($session_value['start_date'] ));?>
                                                    </td>
                                                    <td>
                                                        <?=date('d M Y H:i:s', strtotime($session_value['end_date'] ));?>
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



            <?php foreach ($interview_session as $key => $session_value): ?>
            <!-- BEGIN MODAL : View Interview Detail-->
            <div class="modal fade " id="modal_view_detail_<?php echo rtrim(base64_encode($session_value['id']), '=');?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content ">
                        <div class="modal-header md-indigo md-white-text">
                            <button type="button" class="close md-white-text" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="font-weight-500 letter-space-xs">
                                <?php echo $session_value['title']; ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17 ">
                                <i class="icon-briefcase mr-10"></i>
                                <?php echo $session_value['job_name'] ?>
                            </h5>
                            <!-- User -->
                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17 ">
                                <i class="icon-user mr-10"></i>
                                <?php echo $session_value['candidate_name'] ?>
                            </h5>
                            <!-- IF != ALL DAY -->
                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                <i class="icon-clock mr-10"></i>
                                <?php echo date('D, j M , h:ia', strtotime($session_value['start_date'])); ?> -
                                <?php echo date('D, j M ,h:ia', strtotime($session_value['end_date'])); ?>
                            </h5>
                            <!--  If == all day-->
                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                <i class="icon-clock mr-10"></i>
                                <?php echo date('D, j M , h:ia', strtotime($session_value['start_date'])); ?> -
                                <?php echo date('h:ia', strtotime($session_value['end_date'])); ?>
                            </h5>

                            <!-- Description -->
                            <h5 class="font-weight-400 letter-space-xs mb-30 font-17">
                                <i class="icon-book-open  mr-10"></i>
                                <?php echo $session_value['description']; ?>
                            </h5>
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
                            <h4 class="modal-title font-weight-600 "> Edit
                                <?php echo !empty($session_value['title']) ? $session_value['title'] : 'Session Name'; ?>
                            </h4>
                        </div>
                        <form action="<?php echo base_url(); ?>candidate/edit_session" method="POST" class="form">
                            <div class="modal-body ">
                                <input type="hidden" name="id" value="<?php echo !empty($session_value['id']) ? $session_value['id'] : 0; ?>"></input>
                                <input type="hidden" value="<?php echo $job_id; ?>" name="job_id"></input>
                                <!-- Title -->
                                <div class="form-group mx-0">
                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Title</label>
                                    <input type="text" value="<?php echo !empty($session_value['title']) ? $session_value['title'] : 'Session Name'; ?>" class="form-control" name="title" readonly>
                                </div>
                                <!-- Start Date / Time -->
                                <div class="row">
                                    <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">Start Date / Time </label>
                                    <!-- Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-icon ">
                                                <i class="icon-calendar"></i>
                                                <input type="text" class="form-control date date-picker">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-clock-o"></i>
                                                <input type="text" class="form-control timepicker timepicker-24"> </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Date / Time -->
                                <div class="row">
                                    <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">End Date / Time </label>
                                    <!-- Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-icon ">
                                                <i class="icon-calendar"></i>
                                                <input type="text" class="form-control date date-picker">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Time -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-clock-o"></i>
                                                <input type="text" class="form-control timepicker timepicker-24"> </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkbox: All Day -->
                                <!-- Note : IF user check this box , only show  below -->
                                <div class="form-group form-md-checkboxes mx-0 ">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox_allday" class="md-check">
                                        <label for="checkbox_allday">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> All Day </label>
                                    </div>
                                </div>
                                <!-- Date [If All Day Check]-->
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
                                </div>
                                <!-- Start Time & End Time [If All Day Check] -->
                                <div class="row mb-30">
                                    <label class="col-md-12 md-grey-darken-3-text mb-10 font-weight-600 ">Time</label>
                                    <div class="col-md-6">
                                        <div class="input-icon ">
                                            <i class="icon-clock"></i>
                                            <input type="text" class="form-control timepicker timepicker-24 " placeholder="start time">
                                            <span class="helper-block font-15">Start</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-icon ">
                                            <i class="icon-clock"></i>
                                            <input type="text" class="form-control timepicker timepicker-24 " placeholder="end time">
                                            <span class="helper-block font-15">End</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mx-0">
                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Details</label>
                                    <textarea class="form-control" rows="5" name="description">
                                        <?php echo !empty($session_value['description']) ? $session_value['description'] : 'Session Name'; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="submit" class="btn btn-md-indigo  width-200 letter-space-xs">Save</button>
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
                            <!-- <div class="scroller height-300 height-500-sm height-600-" data-always-visible="1" data-rail-visible="1"> -->

                            <div class="form-group mx-0 ">
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
                                            <td class="text-center">
                                                <?=$no?>
                                            </td>
                                            <td>
                                                <?=$session_value['title']?>
                                            </td>
                                            <td>
                                                <?=date('d M Y H:i:s', strtotime($session_value['start_date'] ));?>
                                            </td>
                                            <td>
                                                <?=date('d M Y H:i:s', strtotime($session_value['end_date'] ));?>
                                            </td>
                                            <td>
                                                <a href="#" class="send-invitation invite-candidate" interview-id="<?php echo rtrim(base64_encode($session_value['id']),'='); ?>" job-id="<?php echo rtrim(base64_encode($job->id),'='); ?>" data-toggle="modal">
                                                    <i class="icon-paper-plane"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- </div> -->
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
