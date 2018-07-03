<?php $preview=0; $post=0; $expired=0; foreach ($job_post as $key => $value) {
    if ((date('Y-m-d') >= date('Y-m-d', strtotime($value['expiry_date']))) || $value['status'] == 'expired') {
        $expired++;
    }else if ($value['status'] == 'post') {
        $post++;
    }else if($value['status'] == 'preview'){
        $preview++;
    }
}

 ?>
<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */

    .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    .pac-container {
        z-index: 99999 !important;
    }

    .controls:focus {
        border-color: #4d90fe;
    }

    /* .title {
        font-weight: bold;
    } */

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

</style>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN PAGE HEAD-->
        <h1 class="page-title"><?= !empty($language->site_job_board) ? $language->site_job_board : "Job Board"  ?>
            <small>Here your job post should be</small>
        </h1>

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url();?>employer/dashboard"><?= !empty($language->site_home) ? $language->site_home : "Home"  ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span><?= !empty($language->site_job_board) ? $language->site_job_board : "Job Board"  ?></span>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEAD-->

        <!-- SECION : WIDGET -->
        <div class="row widget-row">

            <!-- REMAINING POST -->
            <div class="col-md-4">
                <div class="widget-thumb md-white text-uppercase mb-30 ">
                    <h4 class="widget-thumb-heading"> <?= !empty($language->job_post) ? $language->job_post : "Job Post"  ?></h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon md-green icon-bulb"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle"><?= !empty($language->active) ? $language->active : "Active"  ?></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $post; ?>">
                                <?php echo $post; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EXPIRED POST -->
            <div class="col-md-4">
                <!-- BEGIN WIDGET THUMB -->
                <div class="widget-thumb md-white text-uppercase mb-30">
                    <h4 class="widget-thumb-heading"><?= !empty($language->job_post) ? $language->job_post : "Job Post"  ?> </h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon md-red icon-layers"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle"><?= !empty($language->expired) ? $language->expired : "Expired"  ?></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $expired; ?>">
                                <?php echo $expired; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>

            <?php   $total_job = 0;
                    if (!empty($job_post)) {
                        $i =1;
					    foreach ($job_post as $key => $value) { 
                            $total_job++;
                        }
                    }
            ?>
            <!-- DRAFT POST -->
            <div class="col-md-4">
                <div class="widget-thumb md-white text-uppercase mb-30">
                    <h4 class="widget-thumb-heading"><?= !empty($language->job_post) ? $language->job_post : "Job Post"  ?> </h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon md-yellow icon-layers"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle"><?= !empty($language->draft) ? $language->draft : "Draft"  ?></span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $total_job-$post-$expired; ?>">
                                <?php echo $expired; ?>
                            </span>
                        </div>
                    </div>
                </div>''
                <!-- END WIDGET THUMB -->
            </div>
            <!-- BUY MORE -->
            <!--<div class="col-md-6">
                        <div class="widget-thumb widget-bg-color-gray text-uppercase mb-30 ">

                            <h4 class="widget-thumb-heading">Need more job post ?</h4>
                            <div class="widget-thumb-body">
                                <div class="widget-thumb-subtitle mb-2">Purchase More in here</div>
                                <a href="employer-purchasepackage.html" class="btn btn-md-amber">Buy More</a>
                            </div>
                        </div>
                    </div>-->
        </div>

        <!-- SECTION : LIST OF JOB POST -->
        <div class="portlet light">
            <!-- TITLE -->
            <div class="portlet-title ">
                <div class="caption ">
                    <i class="icon-briefcase"></i>
                    <span class="caption-subject"> <?= !empty($language->job_post) ? $language->job_post : "Job Post"  ?></span>
                </div>
                <div class="actions">
                    <?php if (!empty($job_post)) { ?>
                    <a href="#modal_add_jobpost" class="btn btn-md-indigo" data-toggle="modal">
                        <i class="fa fa-plus"></i> <?= !empty($language->new_job_post) ? $language->new_job_post : "New Job Post"  ?> </a>
                    <?php }  ?>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ADD : EMPTY STATES -->
            <?php if (!empty($job_post)) { ?>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover order-column " id="xremo_table">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">#</th>
                            <th class="col-md-6"> <?= !empty($language->job_title) ? $language->job_title : "Job Title"  ?> </th>
                            <th class="col-md-1"> Status </th>
                            <th class="col-md-2"> <?= !empty($language->expired_at) ? $language->expired_at : "Expired At"  ?> </th>
                            <th class="col-md-1 "> <?= !empty($language->candidates) ? $language->candidates : "Candidates"  ?> </th>
                            <th class="col-md-1"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i =1;
                            foreach ($job_post as $key => $value) {
                                
                            ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['name'];  ?>
                                        </td>
                                        <td>
                                            <?php if (strtotime(date('Y-m-d')) >= strtotime($value['expiry_date']) || $value['status'] == 'expired') {?>
                                            <span class="label label-sm label-md-red"> <?= !empty($language->expired) ? $language->expired : "Expired"  ?> </span>
                                            <?php }elseif ($value['status'] == 'preview') {?>
                                            <span class="label label-sm label-md-amber"> <?= !empty($language->draft) ? $language->draft : "Draft"  ?> </span>
                                            <?php }else{ ?>
                                            <span class="label label-sm label-md-green"> Active </span>
                                            <?php } ?>
                                        </td>
                                        <td class="">
                                            <?php echo date('d M Y', strtotime($value['expiry_date'])); ?> </td>
                                        <td class="text-center">
                                            <i class="icon-users"></i>
                                            <?=$value['number_of_candidate']?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-md-indigo dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <?php if ( (date('Y-m-d') <= date('Y-m-d', strtotime($value['expiry_date']))) && $value['status'] != 'expired') {?>
                                                    <li>
                                                        <a class="edit_jobpost" data-id="<?=  $value['id']; ?>" href="#modal_edit_jobpost_<?php echo $value['id'] ?>" data-toggle="modal">
                                                            <i class="icon-pencil"></i> Edit Job Post </a>
                                                    </li>
                                                    <?php } ?>
                                                    <?php if($value['status'] != 'preview' || $value['status'] != 'draft'):  ?>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/candidate/<?php echo rtrim(base64_encode($value['id']),'='); ?>">
                                                            <i class="icon-users"></i> <?= !empty($language->view_candidates) ? $language->view_candidates : "View Candidates"  ?> </a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']),'='); ?>">
                                                            <i class="fa fa-file-text-o"></i>
                                                            <?php echo ($value['status'] == 'post') ? (!empty($language->view_post) ? $language->view_post : 'View Post ') : 'Preview' ?>
                                                        </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;" class="md-red-text dlt-btn" id="<?php echo $value['id']?>">
                                                            <i class="icon-trash md-red-text"></i> <?= !empty($language->site_remove) ? $language->site_remove : "Remove"  ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                            <?php
                                
                            ?>
                            <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
            <!-- # Empty States -->
            <div class="portlet-body">
                <div class="portlet md-grey-lighten-5 p-130 ">
                    <div class="portlet-body">
                        <h3 class="font-weight-500 text-center md-indigo-text"> <?= !empty($language->no_job_post_found) ? $language->no_job_post_found : "No Job Post Has Been Found"  ?></h3>
                        <h5 class="font-grey-cascade mt-30 font-weight-400  font-17 text-center"><?= !empty($language->start_by_create_job_post) ? $language->start_by_create_job_post : "Start by create job post to hire suitable candidate for your company."  ?>  </h5>
                        <a href="#modal_add_jobpost" class="btn btn-md-indigo btn-md center-block mt-40 width-300" data-toggle="modal">
                            <i class="fa fa-plus"></i> <?= !empty($language->create_job_post) ? $language->create_job_post : "Create Job Post" ?></a>
                    </div>
                </div>
            </div>
            <?php }  ?>
        </div>

    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN MODAL : ADD JOB POST -->
<div class="modal fade" id="modal_add_jobpost" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-full width-90-percent">
        <div class="modal-content ">
            <!-- TITLE -->
            <div class="modal-header ">
                <h4 class="modal-title"><?= !empty($language->new_job_post) ? $language->new_job_post : "New Job Post"  ?></h4>
            </div>
            <!-- FORM  -->
            <form action="<?php echo base_url(); ?>employer/job_board/post" id="post_job" method="POST" class="form form-horizontal ">
                <div class="modal-body form-body ">

                    <!-- Job Position Title & Salary Range-->
                    <div class="row">
                        <div class="col-md-7 col-xs-12">
                            <!-- Job Position Title -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->job_position_title) ? $language->job_position_title : "Job Position Title"  ?></label>
                                <div class="input-icon">
                                    <i class="icon-briefcase"></i>
                                    <input type="text" class="form-control " placeholder="Internship in IT department" name="job_position_name" required>
                                    <!-- <span class="help-block small">Internship in IT department</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="form-group mx-0 " id="salaryBlock">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->salary_range) ? $language->salary_range : "Salary Range"  ?></label>
                                <div class="form-inline">
                                    <select name="currency" class="form-control ">
                                        <?php foreach ($forex as $key => $value): ?>
                                        <option>
                                            <?php echo $value['name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="number" class="form-control addBudgetMin" id="addBudgetMin" placeholder="0.00" name="budget_min" min="0" max="999999999">
                                    <span class="mx-5">to</span>
                                    <input type="number" class="form-control addBudgetMax  " id="addBudgetMax" placeholder="0.00" name="budget_max" min="0" max="999999999">
                                </div>
                                <span class="help-block has-error hidden" id="salaryBlockError">Minimum salary should be lower.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employement Type / Position Level / Years of Experience -->
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->employment_type) ? $language->employment_type : "Employment Type"  ?></label>
                                <select class="bs-select form-control" name="employmentType">
                                    <option value="" selected disabled>Employment Type</option>
                                    <?php foreach ($employment_type as $key => $employment_value) {?>
                                    <option value="<?php echo $employment_value['id']; ?>">
                                        <?php echo $employment_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->position_level) ? $language->position_level : "Position Level"  ?></label>
                                <select class="bs-select form-control" name="employmentLevel">
                                    <option disabled selected>Position Level</option>
                                    <?php foreach ($position_levels as $key => $position_level_value) {?>
                                    <option value="<?php echo $position_level_value['id']; ?>">
                                        <?php echo $position_level_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->year_of_experience) ? $language->year_of_experience : "Years Of Experience"  ?></label>
                                <select class="bs-select form-control" name="yearOfExperience">
                                    <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                    <option value="<?php echo $year_of_experience_value['id']; ?>">
                                        <?php echo $year_of_experience_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- TEXT EDITOR : JOB DESCRIPTION -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->job_description) ? $language->job_description : "Job Description"  ?></label>
                        <textarea name="jobDescription" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"></textarea>
                    </div>

                    <!-- TEXT EDITOR : NICE TO HAVE -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->nice_to_have) ? $language->nice_to_have : "Nice To Have"  ?></label>
                        <textarea name="niceToHave" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"></textarea>
                    </div>

                    <!-- TEXT EDITOR : JOB REQUIREMENT -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->job_requirement) ? $language->job_requirement : "Job Requirement"  ?></label>
                        <textarea name="jobRequirement" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"></textarea>
                    </div>

                    <!-- TEXT EDITOR : ADDITIONAL INFO -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->additional_info) ? $language->additional_info : "additional_info"  ?></label>
                        <textarea name="additionalInfo" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"></textarea>
                    </div>

                    <!-- LOCATION JOB -->
                    <h4 class="form-section mt-50"><?= !empty($language->site_location_info) ? $language->site_location_info : "Location Info"  ?></h4>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <!-- Address -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->address) ? $language->address : "Address"  ?></label>
                                <input type="text" name="address" class="form-control" placeholder="Unit / Lot , Road ," value="<?=$user_profile['shipping_address']?>" id="addAddress" required>
                            </div>
                            <!-- City /  Postcode-->
                            <div class="row ">
                                <!-- City  -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->city) ? $language->city : "City"  ?></label>
                                        <input type="text" class="form-control" name="city" value="<?=$user_profile['shipping_city']?>" id="addCity" required>
                                    </div>
                                </div>
                                <!-- Postcode -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->postcode) ? $language->postcode : "Postcode"  ?></label>
                                        <input type="text" class="form-control" placeholder="Postcode" name="postcode" value="<?=$user_profile['shipping_postcode']?>" id="addPostcode" required>

                                    </div>
                                </div>

                            </div>

                            <!-- state /Country  -->
                            <div class="row">
                                <!-- State -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0 ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->state) ? $language->state : "State"  ?></label>
                                        <input type="text" class="form-control" name="state" value="<?=$user_profile['shipping_state']?>" id="addState" required>
                                    </div>
                                </div>
                                <!-- Country -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->country) ? $language->country : "Country"  ?></label>
                                        <select class="form-control" name="country" id="addCountry" required>
                                            <?php foreach ($countries as $key => $value) {?>
                                            <option value="<?=$value['name']?>" <?php if($value[ 'name']==$user_profile[ 'shipping_country']){echo "selected";}?>>
                                                <?php echo $value['name']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Long / Lat -->
                            <div class="row">
                                <!-- Latitude -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->latitude) ? $language->latitude : "Latitude"  ?></label>
                                        <input type="text" class="form-control" placeholder="1.643604 " id="addLatitude" name="latitude" value="<?=$user_profile['latitude']?>" required>
                                    </div>
                                </div>
                                <!-- Longititude -->
                                <div class="col-md-6">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->longitude) ? $language->longitude : "Longitude"  ?></label>
                                        <input type="text" class="form-control" placeholder="1.955566" id="addLongitude" name="longitude" value="<?=$user_profile['longitude']?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- MAP -->
                            <input type="hidden" id="addMapTitle" name="mapTitle"></input>
                            <input type="hidden" id="addMapDescription" name="mapDescription"></input>
                            <!-- <div class="row "> -->
                            <!-- <div class="col-md-12"> -->
                            <div class="mb-50" style="height: 350px;" id="map-window">
                                <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                                <div id="map" style="z-index: 9999 !important"></div>
                            </div>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>

                </div>
                <input type="hidden" id="job_status_add" name="status"></input>
                <div class="modal-footer form-action ">
                    <a data-dismiss="modal" id="submit_button_add" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs"><?= !empty($language->site_cancel) ? $language->site_cancel : "Cancel"  ?></a>
                    <button type="submit" id="preview_button_add" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Preview</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL : Add Job Post Info -->

<!-- BEGIN MODAL : EDIT JOB POST -->
<?php foreach ($job_post as $key => $value) { $location = json_decode($value['location']); ?>
<div class="modal fade  modal-open " id="modal_edit_jobpost_<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-full width-90-percent">
        <div class="modal-content ">
            <!-- TITLE -->
            <div class="modal-header ">
                <h4 class="modal-title">Edit Job Post </h4>
            </div>
            <!-- FORM -->
            <form action="<?php echo base_url(); ?>employer/job_board/update/" method="POST" class="form form-horizontal  ">
                <input type="hidden" id="job_status_edit" name="status" value="<?php echo !empty($value['status']) ? $value['status']: 'preview'; ?>"></input>
                <div class="modal-body form-body ">
                    <input type="hidden" name="job_id" value="<?php echo $value['id'] ?>"></input>
                    <!-- Job Position Title & Salary Range-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-12">
                            <!-- Job Position Title -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->job_position_title) ? $language->job_position_title : "Job Position Title"  ?></label>
                                <div class="input-icon">
                                    <i class="icon-briefcase"></i>
                                    <input type="text" class="form-control" placeholder="Internship in IT department" value="<?php echo $value['name'] ?>" name="title" required>
                                    <!-- <span class="help-block small">Internship in IT department</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12">
                            <div class="form-group mx-0 " id="salaryBlock<?=$value['id']?>">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->salary_range) ? $language->salary_range : "Salary Range"  ?></label>
                                <div class="form-inline">
                                    <select name="currency" class="form-control ">
                                        <?php foreach ($forex as $key => $currency): ?>
                                        <option <?php echo $value[ 'forex']==$currency[ 'name'] ? 'selected' : ''; ?>>
                                            <?php echo $currency['name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="number" class="form-control" id="editBudgetMin<?=$value['id']?>" placeholder="0.00" value="<?php echo $value['budget_min'] ?>" name="budget_min" min="0" max="999999999">
                                    <span class="mx-2">to</span>
                                    <input type="number" class="form-control" id="editBudgetMax<?=$value['id']?>" placeholder="0.00" value="<?php echo $value['budget_max'] ?>" name="budget_max" min="0" max="999999999">
                                </div>
                                <span class="help-block has-error hidden" id="salaryBlockError<?=$value['id']?>">Minimum salary should be lower.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employement Type / Position Level / Years of Experience -->
                    <div class="row ">
                        <!-- Employement Type -->
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->employment_type) ? $language->employment_type : "Employment Type"  ?></label>
                                <select class="bs-select form-control  " name="employment_Type">
                                    <option value="" disabled>Employment Type</option>
                                    <?php foreach ($employment_type as $key => $employment_value) {?>
                                    <option <?php echo $value[ 'employment_type_id']==$employment_value[ 'id'] ? 'selected': ''; ?> value="
                                        <?php echo $employment_value['id']; ?>" >
                                        <?php echo $employment_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Position Level -->
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600   "><?= !empty($language->position_level) ? $language->position_level : "Position Level"  ?></label>
                                <select class="bs-select form-control   " name="employment_level">
                                    <option disabled>Position Level</option>
                                    <?php foreach ($position_levels as $key => $position_level_value) {?>
                                    <option <?php echo $value[ 'position_level_id']==$position_level_value[ 'id'] ? 'selected': ''; ?> value="
                                        <?php echo $position_level_value['id']; ?>" >
                                        <?php echo $position_level_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Years Of Experience -->
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600   "><?= !empty($language->year_of_experience) ? $language->year_of_experience : "Years Of Experience"  ?></label>
                                <select class="bs-select form-control" name="year_Of_Experience">
                                    <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                    <option <?php echo $value[ 'years_of_experience']==$year_of_experience_value[ 'id'] ? 'selected': ''; ?> value="
                                        <?php echo $year_of_experience_value['id']; ?>" >
                                        <?php echo $year_of_experience_value['name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description / Nice To Have / Job Requirement / Additional Info -->
                    <!-- TEXT EDITOR : JOB DESCRIPTION -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600   "><?= !empty($language->job_description) ? $language->job_description : "Job Description"  ?></label>
                        <textarea name="job_Desc" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" name="job_Desc" class="textarea_editor"><?php echo $value['job_description']?></textarea>
                    </div>
                    <!-- TEXT EDITOR : NICE TO HAVE -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->nice_to_have) ? $language->nice_to_have : "Nice To Have"  ?></label>
                        <textarea name="nice_To_Have" data-provide="markdown" rows=10 data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"><?php echo $value['other_requirements']?></textarea>
                    </div>
                    <!-- TEXT EDITOR : JOB REQUIREMENT -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"><?= !empty($language->job_requirement) ? $language->job_requirement : "Job Requirement"  ?></label>
                        <textarea name="job_Requirement" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"><?php echo $value['qualifications']?></textarea>
                    </div>
                    <!-- TEXT EDITOR : ADDITIONAL INFO -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600 "><?= !empty($language->additional_info) ? $language->additional_info : "additional_info"  ?></label>
                        <textarea name="additional_Info" data-provide="markdown" rows="10" data-hidden-buttons="cmdCode , cmdQuote" class="textarea_editor"><?php echo $value['additional_info']?></textarea>
                    </div>

                    <h4 class="form-section mt-50 "><?= !empty($language->site_location_info) ? $language->site_location_info : "Location Info"  ?></h4>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- Address -->
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->address) ? $language->address : "Address"  ?></label>
                                <input type="text" name="address" value="<?php echo !empty($location->address) ? $location->address : ''; ?>" class="form-control" placeholder="Unit / Lot , Road ," id="addAddress<?= $value['id'];?>">
                            </div>
                            <!-- City /  Postcode-->
                            <div class="row ">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->city) ? $language->city : "City"  ?></label>
                                        <input type="text" class="form-control" name="city" value="<?php echo !empty($location->city) ? $location->city : ''; ?>" id="addCity<?= $value['id'];?>">
                                    </div>
                                </div>    
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->postcode) ? $language->postcode : "Postcode"  ?></label>
                                        <input type="text" class="form-control" placeholder="Postcode" name="postcode" value="<?php echo !empty($location->postcode) ? $location->postcode : ''; ?>" id="addPostcode<?= $value['id'];?>">
                                    </div>
                                </div>
                            </div>
                            <!-- State /Country -->
                            <div class="row ">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0 ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->state) ? $language->state : "State"  ?></label>
                                        <input type="text" class="form-control" name="state" value="<?php echo !empty($location->state) ? $location->state : ''; ?>" id="addState<?= $value['id'];?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0">
                                        <!-- <label class="control-label">Country</label> -->
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600   "><?= !empty($language->country) ? $language->country : "Country"  ?></label>

                                        <select class="form-control" name="country" id="addCountry<?= $value['id'];?>">
                                            <?php foreach ($countries as $key => $country_value) {?>
                                            <option <?php echo $location->country == $country_value['name'] ? 'selected' : '' ?>>
                                                <?php echo $country_value['name']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                            </div> 
                            <!-- Longititude & Latitude -->
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->latitude) ? $language->latitude : "Latitude"  ?></label>
                                        <input id="latitude<?= $value['id']?>" type="text" class="form-control" placeholder="1.643604 " name="latitude" value="<?php echo !empty($location->latitude) ? $location->latitude : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600  "><?= !empty($language->longitude) ? $language->longitude : "Longitude"  ?></label>
                                        <input id="longitude<?= $value['id']?>" type="text" class="form-control" placeholder="1.955566" name="longitude" value="<?php echo !empty($location->longitude) ? $location->longitude : ''; ?>">
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="col-md-6 col-sm-12">
                            <input type="hidden" id="addMapTitle<?= $value['id']?>" name="mapTitle" value="<?= !empty($location->map_title) ? $location->map_title : 'Map Title';?>"></input>
                            <input type="hidden" id="addMapDescription<?= $value['id']?>" name="mapDescription" value="<?= !empty($location->map_description) ? $location->map_description : 'Map Description';?>"></input>
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="mb-50 " style="height: 350px; " id="map-window<?= $value['id'];?>">
                                        <input id="pac-input<?= $value['id'];?>" class="controls" type="text" placeholder="Enter a location">
                                        <div id="map<?= $value['id'];?>" style="height: 100%; z-index: 9999 !important"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer form-action ">
                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                    <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100" id="preview_button_edit_<?= $value['id']?>">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!-- END MODAL : EDIT JOB POST -->
