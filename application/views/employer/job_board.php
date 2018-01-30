        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Job Board
                        <small>Here your job post should be</small>
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Job Board</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->
                <div class="row widget-row">
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3 ">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Current</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="4">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3">
                            <h4 class="widget-thumb-heading">Job Post </h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red icon-layers"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Expired</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="2">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-6">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-gray text-uppercase mb-3 ">

                            <h4 class="widget-thumb-heading">Need more job post ?</h4>
                            <!-- <div class="widget-thumb-wrap"> -->
                            <!-- <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i> -->
                            <div class="widget-thumb-body">
                                <div class="widget-thumb-subtitle mb-2">Purchase More in here</div>
                                <a href="employer-purchasepackage.html" class="btn btn-md-amber">Buy More</a>
                            </div>
                            <!-- </div> -->
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                </div>

                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Job Post</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="#modal_add_jobpost" class="btn btn-circle btn-md-indigo" data-toggle="modal">
                                <i class="fa fa-plus"></i> New Job Post </a>                        
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-6"> Job </th>
                                    <th class="col-md-1"> Status </th>
                                    <th class="col-md-2"> Expired At </th>
                                    <th class="col-md-1 "> Candidate </th>
                                    <th class="col-md-1"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($job_post)) {
                                    $i =1;
                                  foreach ($job_post as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?php echo $i; ?></td>
                                        <td> <?php echo $value['name']; ?></td>
                                        <td>
                                            <?php if ((date('Y-m-d') >= date('Y-m-d', strtotime($value['expiry_date']))) || $value['status'] == 'expired') {?>
                                                <span class="label label-sm label-md-red"> Expired </span>
                                            <?php }elseif ($value['status'] == 'draft') {?>
                                                <span class="label label-sm label-md-amber"> Draft </span>
                                            <?php }else{ ?>
                                                <span class="label label-sm label-md-green"> Active </span>
                                            <?php } ?>
                                        </td>
                                        <td class=""><?php echo date('d M Y', strtotime($value['expiry_date'])); ?> </td>
                                        <td class="text-center">
                                            <i class="icon-user"></i> 50
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs blue-ebonyclay dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <?php if ( (date('Y-m-d') <= date('Y-m-d', strtotime($value['expiry_date']))) && $value['status'] != 'expired') {?>
                                                    <li>
                                                        <a href="#modal_edit_jobpost_<?php echo $value['id'] ?>" data-toggle="modal">
                                                            <i class="icon-pencil"></i> Edit </a>
                                                    </li>
                                                    <?php } ?>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/candidate/<?php echo rtrim(base64_encode($value['id']),'='); ?>">
                                                            <i class="icon-user"></i> View Candidates </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']),'='); ?>">
                                                            <i class="icon-eye"></i> Preview Job </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;" class="md-red-text dlt-btn" id="<?php echo $value['id']?>">
                                                            <i class="icon-trash md-red-text"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>                                        
                                <?php $i++;}} ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php foreach ($job_post as $key => $value) { ?>

                <div class="modal fade modal-open-noscroll  " id="modal_edit_jobpost_<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <h4 class="modal-title">Edit Post </h4>
                            </div>

                            <form action="<?php echo base_url(); ?>employer/job_board/update/" method="POST" class="form-horizontal form-row-seperated ">
                                <div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="modal-body form-body pr-0">
                                        <input type="hidden" name="job_id" value="<?php echo $value['id'] ?>"></input>
                                        <!-- Job Position Title & Salary Range-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Job Position Title -->
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Job Position Title</label>
                                                    <div class="input-icon">
                                                        <i class="icon-briefcase"></i>
                                                        <input type="text" class="form-control" placeholder="Internship in IT department"  value="<?php echo $value['name'] ?>" name="title" required>
                                                        <!-- <span class="help-block small">Internship in IT department</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group mx-0 ">
                                                    <label class="control-label ">Salary Range</label>
                                                    <div class="form-inline">

                                                        <input type="number" class="form-control " placeholder="0.00" value="<?php echo $value['budget_min'] ?>" name="budget_min">
                                                        <span class="mx-2">to</span>
                                                        <input type="number" class="form-control  " placeholder="0.00" value="<?php echo $value['budget_max'] ?>" name="budget_max">
                                                    </div>

                                                    <!-- <span class="help-block small">Internship in IT department</span> -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Employement Type / Position Level / Years of Experience -->
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Employment Type</label>
                                                    <select class="bs-select form-control  " name="employment_Type">
                                                        <option value="" selected disabled>Employment Type</option>
                                                        <?php foreach ($employment_type as $key => $employment_value) {?>
                                                            <option <?php echo $value['employment_type_id'] == $employment_value['id'] ? 'selected':''; ?> value="<?php echo $employment_value['id']; ?>" ><?php echo $employment_value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Position Level</label>
                                                    <select class="bs-select form-control   " name="employment_level">
                                                        <?php foreach ($position_levels as $key => $position_level_value) {?>
                                                            <option <?php echo $value['position_level_id'] == $position_level_value['id'] ? 'selected':''; ?> value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Years Of Experience</label>
                                                    <select class="bs-select form-control" name="year_Of_Experience">
                                                        <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                                            <option <?php echo $value['years_of_experience'] == $year_of_experience_value['id'] ? 'selected':''; ?> value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job Description / Nice To Have / Job Requirement / Additional Info -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mx-0">
                                                    <label class="control-label mb-2 ">Job Description</label>
                                                    <textarea name="job_Desc" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote" name="job_Desc"><?php echo $value['job_description']?></textarea>
                                                </div>
                                                <div class="form-group mx-0">
                                                    <label class="control-label mb-2 ">Nice To Have</label>
                                                    <textarea name="nice_To_Have" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"><?php echo $value['other_requirements']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mx-0">
                                                    <label class="control-label mb-2 ">Job Requirement</label>
                                                    <textarea name="job_Requirement" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"><?php echo $value['qualifications']?></textarea>
                                                </div>
                                                <div class="form-group mx-0">
                                                    <label class="control-label mb-2">Additional Info</label>
                                                    <textarea name="additional_Info" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"><?php echo $value['additional_info']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="job_status_edit" name="status" value="post"></input>
                                    </div>
                                </div>
                                <div class="modal-footer form-action ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>

                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
        <?php } ?>
        <!-- BEGIN MODAL : Add Job Post Info -->
        <div class="modal fade modal-open-noscroll  " id="modal_add_jobpost" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <h4 class="modal-title">New Job Post Info</h4>
                    </div>
                    <form action="<?php echo base_url(); ?>employer/job_board/post" id="post_job" method="POST" class="form-horizontal form-row-seperated ">
                        <div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
                            <div class="modal-body form-body pr-0">

                                <!-- Job Position Title & Salary Range-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Job Position Title -->
                                        <div class="form-group mx-0">
                                            <label class="control-label ">Job Position Title</label>
                                            <div class="input-icon">
                                                <i class="icon-briefcase"></i>
                                                <input type="text" class="form-control input-xlarge " placeholder="Internship in IT department" name="job_position_name" required>
                                                <!-- <span class="help-block small">Internship in IT department</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group mx-0 ">
                                            <label class="control-label ">Salary Range</label>
                                            <div class="form-inline">

                                                <input type="number" class="form-control " placeholder="0.00" name="budget_min">
                                                <span class="mx-2">to</span>
                                                <input type="number" class="form-control  " placeholder="0.00" name="budget_max">
                                            </div>

                                            <!-- <span class="help-block small">Internship in IT department</span> -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Employement Type / Position Level / Years of Experience -->
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group mx-0">
                                            <label class="control-label ">Employment Type</label>
                                            <select class="bs-select form-control" name="employmentType">
                                                <option value="" selected disabled>Employment Type</option>
                                                <?php foreach ($employment_type as $key => $employment_value) {?>
                                                    <option value="<?php echo $employment_value['id']; ?>" ><?php echo $employment_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mx-0">
                                            <label class="control-label ">Position Level</label>
                                            <select class="bs-select form-control" name="employmentLevel">
                                                <?php foreach ($position_levels as $key => $position_level_value) {?>
                                                    <option value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mx-0">
                                            <label class="control-label ">Years Of Experience</label>
                                            <select class="bs-select form-control" name="yearOfExperience">
                                                <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                                    <option value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Description / Nice To Have / Job Requirement / Additional Info -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2 ">Job Description</label>
                                            <textarea name="jobDescription" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2 ">Nice To Have</label>
                                            <textarea name="niceToHave" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2 ">Job Requirement</label>
                                            <textarea name="jobRequirement" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2">Additional Info</label>
                                            <textarea name="additionalInfo" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" id="job_status_add" name="status"></input>
                        <div class="modal-footer form-action ">
                            <!-- <a href="<?php echo base_url(); ?>employer/preview_job" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</a> -->
                            <button type="submit" id="preview_button_add" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</button>
                            <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Post</button>
                            <a data-dismiss="modal" id="submit_button_add" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                        </div>
                    </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END MODAL : Add Job Post Info -->

        