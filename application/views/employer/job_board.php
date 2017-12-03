        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- <h1 class="page-title"> User Profile
                    <small>user profile 2</small>
                </h1> -->
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
                                <?php foreach ($job_post as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?php echo $value['id']; ?></td>
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
                                                    <li>
                                                        <a href="#modal_edit_jobpost_<?php echo $value['id'] ?>" data-toggle="modal">
                                                            <i class="icon-pencil"></i> Edit </a>
                                                    </li>
                                                    <li>
                                                        <a href="employer-candidate.html">
                                                            <i class="icon-user"></i> View Candidates </a>
                                                    </li>
                                                    <li>
                                                        <a href="employer-previewjob.html">
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
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php foreach ($job_post as $key => $value) { ?>
            <!-- BEGIN MODAL : Edit Job Post Info -->
                <div class="modal fade modal-open-noscroll " id="modal_edit_jobpost_<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header ">
                                <h4 class="modal-title">New Job Post Info</h4>
                            </div>

                            <form action="<?php echo base_url(); ?>employer/job_board/update/" class="form-horizontal form-row-seperated " method="POST" >
                                <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="modal-body form-body pr-0">
                                        <input type="hidden" name="job_id" value="<?php echo $value['id'] ?>"></input>
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Job Position Title</label>
                                                    <input type="text" class="form-control" placeholder="Internship in IT department"  value="<?php echo $value['name'] ?>" name="title">
                                                    <!-- <span class="help-block small">Internship in IT department</span> -->
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row m-0">
                                            <div class="col-md-4">
                                                <div class="form-group col-md-12">
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
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Position Level</label>
                                                    <select class="bs-select form-control " name="employment_Level" >
                                                        <?php foreach ($position_levels as $key => $position_level_value) {?>
                                                            <option <?php echo $value['position_level_id'] == $position_level_value['id'] ? 'selected':''; ?> value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Years Of Experience</label>
                                                    <select class="bs-select form-control" name="year_Of_Experience">
                                                        <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                                            <option <?php echo $value['years_of_experience'] == $year_of_experience_value['id'] ? 'selected':''; ?> value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job Description -->
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Job Description</label>
                                                    <textarea data-provide="markdown" rows="10" name="job_Desc"><?php echo $value['job_description']?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job Requirement -->
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Job Requirement</label>
                                                    <textarea name="job_Requirement" data-provide="markdown" rows="10"><?php echo $value['qualifications']?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Nice To Have -->
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Nice To Have</label>
                                                    <textarea name="nice_To_Have" data-provide="markdown" rows="10"><?php echo $value['other_requirements']?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Additional Info -->
                                        <div class="row m-0">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label ">Additional Info</label>
                                                    <textarea name="additional_Info" data-provide="markdown" rows="10"><?php echo $value['additional_info']?></textarea>
                                                </div>
                                            </div>
                                        </div>

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
                <!-- END MODAL : Edit Job Post Info -->
        <?php } ?>
        <!-- BEGIN MODAL : Add Job Post Info -->
        <div class="modal fade modal-open-noscroll " id="modal_add_jobpost" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <h4 class="modal-title">New Job Post Info</h4>
                    </div>

                    <form action="<?php echo base_url(); ?>employer/job_board/post" method="POST" class="form-horizontal form-row-seperated ">
                        <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                            <div class="modal-body form-body pr-0">

                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Job Position Title</label>
                                            <input type="text" class="form-control" placeholder="Internship in IT department" name="job_position_name">
                                            <!-- <span class="help-block small">Internship in IT department</span> -->
                                        </div>
                                    </div>

                                </div>

                                <div class="row m-0">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Employment Type</label>
                                            <select class="bs-select form-control" name="employmentType">
                                                <option value="" selected disabled>Employment Type</option>
                                                <?php foreach ($employment_type as $key => $employment_value) {?>
                                                    <option <?php echo $value['employment_type_id'] == $employment_value['id'] ? 'selected':''; ?> value="<?php echo $employment_value['id']; ?>" ><?php echo $employment_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Position Level</label>
                                            <select class="bs-select form-control" name="employmentLevel">
                                                <?php foreach ($position_levels as $key => $position_level_value) {?>
                                                    <option <?php echo $value['position_level_id'] == $position_level_value['id'] ? 'selected':''; ?> value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Years Of Experience</label>
                                            <select class="bs-select form-control" name="yearOfExperience">
                                                <?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
                                                    <option <?php echo $value['years_of_experience'] == $year_of_experience_value['id'] ? 'selected':''; ?> value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Job Description</label>
                                            <textarea name="jobDescription" data-provide="markdown" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Requirement -->
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Job Requirement</label>
                                            <textarea name="jobRequirement" data-provide="markdown" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nice To Have -->
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Nice To Have</label>
                                            <textarea name="niceToHave" data-provide="markdown" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label class="control-label ">Additional Info</label>
                                            <textarea name="additionalInfo" data-provide="markdown" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

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
        <!-- END MODAL : Add Job Post Info -->

        