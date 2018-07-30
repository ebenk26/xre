        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Job List
                        <!--<small>Here your job post should be</small>-->
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>administrator/student">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Job List</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->
				
				<?php 
					$total = 0;$active = 0;$expired = 0;$draft = 0;
					foreach ($job_post as $row) { 
						$total++;
						if ((date('Y-m-d') >= date('Y-m-d', strtotime($row->expiry_date))) || $row->status == 'expired') {
							$expired++;
						}elseif ($row->status == 'draft') {
							$draft++;
						}else{
							$active++;
						}
					}
				?>
				
                <div class="row widget-row">
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3 ">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Total</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$total?>">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
					<div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3 ">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Active</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$active?>">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
					<div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase mb-3 ">
                            <h4 class="widget-thumb-heading"> Job Post</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-yellow icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Draft</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$draft?>">0</span>
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
                                <i class="widget-thumb-icon bg-red icon-briefcase"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Expired</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?=$expired?>">0</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                </div>

                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Job List</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                        <?php if ($_COOKIE['country'] == 'id') {?>
                            <a href="#modal_add_jobpost" class="btn btn-circle btn-md-indigo" data-toggle="modal">
                                <i class="fa fa-plus"></i> New Job Post </a>                        
                        <?php } ?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th> Job </th>
                                    <th> Company </th>
                                    <th> Status </th>
                                    <th> Created At </th>
                                    <th> Expired At </th>
                                    <th> Number of Seen </th>
                                    <!--<th class="col-md-1"> Candidate </th>-->
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($job_post as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?php echo $row->id; ?></td>
                                        <td> <?php echo $row->name; ?></td>
                                        <td> <?php echo $row->company_name; ?></td>
                                        <td>
                                            <?php if ((date('Y-m-d') >= date('Y-m-d', strtotime($row->expiry_date))) || $row->status == 'expired') {?>
                                                <span class="label label-sm label-md-red"> Expired </span>
                                            <?php }elseif ($row->status == 'draft') {?>
                                                <span class="label label-sm label-md-amber"> Draft </span>
                                            <?php }else{ ?>
                                                <span class="label label-sm label-md-green"> Active </span>
                                            <?php } ?>
                                        </td>
                                        <td class=""><?php echo date('d M Y', strtotime($row->created_at)); ?> </td>
                                        <td class=""><?php echo date('d M Y', strtotime($row->expiry_date)); ?> </td>
                                        <td class=""><?php echo $row->number_of_seen; ?> </td>
                                        <!--<td class="text-center">
                                            <i class="icon-user"></i> 50
                                        </td>-->
                                        <td>
                                            <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($row->id),'='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
												<i class="fa fa-search"></i>
											</a>
											
											<a href="#modal_edit" id="row_<?=$row->id ?>" class="edit_button_job btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
												<i class="fa fa-edit"></i> 
											</a>
											
											
											<!--<div class="btn-group">
                                                <button class="btn btn-xs blue-ebonyclay dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <li>
                                                        <a href="#modal_edit_jobpost_<?php echo $row->id ?>" data-toggle="modal">
                                                            <i class="icon-pencil"></i> Edit </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/candidate/<?php echo rtrim(base64_encode($row->id),'='); ?>">
                                                            <i class="icon-user"></i> View Candidates </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($row->id),'='); ?>">
                                                            <i class="icon-eye"></i> Preview Job </a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;" class="md-red-text dlt-btn" id="<?php echo $row->id?>">
                                                            <i class="icon-trash md-red-text"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
											-->
                                        </td>
                                    </tr>                                        
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php foreach ($job_post as $row) { break;?>
            <div id="modal_edit_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content ">
						<div class="modal-header ">
							<h4 class="modal-title">Edit Job Post </h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/job_board/post/" method="POST">
								<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
								<div class="form-body">
                                    <div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Job Position Title</label>
												<input type="text" name="name" class="form-control" placeholder="Internship in IT department" value="<?=$row->name?>" required> 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Salary Range</label>
												<div class="form-inline">
													<input type="number" class="form-control " placeholder="0.00" value="<?php echo $row->budget_min ?>" name="budget_min">
													<span class="mx-2">to</span>
													<input type="number" class="form-control  " placeholder="0.00" value="<?php echo $row->budget_max ?>" name="budget_max">
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Employment Type</label>
												<select class="form-control" name="employment_type_id">
													<option value="" selected disabled>-- Choose Employment Type --</option>
													<?php foreach ($employment_type as $key => $employment_value) {?>
														<option <?php echo $row->employment_type_id == $employment_value['id'] ? 'selected':''; ?> value="<?php echo $employment_value['id']; ?>" ><?php echo $employment_value['name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Position Level</label>
												<select class="form-control" name="position_level_id">
													<option value="" selected disabled>-- Choose Position Level --</option>
													<?php foreach ($position_levels as $key => $position_level_value) {?>
														<option <?php echo $row->position_level_id == $position_level_value['id'] ? 'selected':''; ?> value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Years Of Experience</label>
												<select class="form-control" name="years_of_experience">
													<option value="" selected disabled>-- Choose Years Of Experience --</option>
													<?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
														<option <?php echo $row->years_of_experience == $year_of_experience_value['id'] ? 'selected':''; ?> value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<!--<label class="control-label mb-2 ">Job Description</label>
											<textarea name="job_Desc" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote" name="job_Desc"><?php echo $row->job_description?></textarea>-->
											<div class="form-group">
												<label class="control-label">Job Description</label>
												<textarea name="job_description" class="textarea_editor wysihtml5 form-control" rows="6"><?php echo $row->job_description?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<!--<label class="control-label mb-2 ">Nice To Have</label>
											<textarea name="nice_To_Have" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"><?php echo $row->other_requirements?></textarea>-->
											
											<div class="form-group">
												<label class="control-label">Job Requirement</label>
												<textarea name="qualifications" class="textarea_editor wysihtml5 form-control" rows="6"><?php echo $row->qualifications?></textarea>
											</div>											
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Nice To Have</label>
												<textarea name="other_requirements" class="textarea_editor wysihtml5 form-control" rows="6"><?php echo $row->other_requirements?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Additional Info</label>
												<textarea name="additional_info" class="textarea_editor wysihtml5 form-control" rows="6"><?php echo $row->additional_info?></textarea>
											</div>
										</div>
									</div>
								</div>
								</div>
								<input type="hidden" name="job_id" value="<?php echo $row->id ?>"></input>
								<div class="modal-footer form-action ">
									<button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
									<a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
								</div>
							</form>
						</div>
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
                    <form action="<?php echo base_url(); ?>employer/job_board/post" method="POST" class="form-horizontal form-row-seperated " id="addJobPost">
                        <div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
                            <div class="modal-body form-body pr-0">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group mx-0" id="search_company">
                                            <label class="control-label ">Company Name</label>
                                            <div class="input-icon">
                                                <i class="icon-briefcase"></i>
                                                <input type="text" class="form-control new-search-input trans-all" placeholder="Xremo sdn bhd" title="Search" id="keyword" name="user_id" onfocus="searchSolr(this.id,'addJobPost')" url="<?php echo base_url();?>administrator/job_board/get_company" id="company">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Job Position Title & Salary Range-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Job Position Title -->
                                        <div class="form-group mx-0">
                                            <label class="control-label ">Job Position Title</label>
                                            <div class="input-icon">
                                                <i class="icon-briefcase"></i>
                                                <input type="text" class="form-control input-xlarge " placeholder="Internship in IT department" name="job_position_name">
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
                                            <textarea class="textarea_editor" name="jobDescription" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2 ">Nice To Have</label>
                                            <textarea class="textarea_editor" name="niceToHave" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2 ">Job Requirement</label>
                                            <textarea class="textarea_editor" name="jobRequirement" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                        <div class="form-group mx-0">
                                            <label class="control-label mb-2">Additional Info</label>
                                            <textarea class="textarea_editor" name="additionalInfo" data-provide="markdown" rows="6" data-hidden-buttons="cmdCode , cmdQuote"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" id="job_status" name="status" value="post"></input>
                        <div class="modal-footer form-action ">
                            <!-- <a href="<?php echo base_url(); ?>employer/preview_job" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</a> -->
                            <button type="submit" id="preview_button" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</button>
                            <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Post</button>
                            <a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                        </div>
                    </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END MODAL : Add Job Post Info -->

        <!-- EDIT JOB POST -->
		<div id="modal_edit" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content ">
					<div class="modal-header ">
						<h4 class="modal-title">Edit Job Post </h4>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/job_board/post/" method="POST">
							<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Position Title</label>
											<input type="text" id="name_job" name="name" class="form-control" placeholder="Internship in IT department" value="" required> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Salary Range</label>
											<div class="form-inline">
												<input type="number" class="form-control " placeholder="0.00" value="" id="budget_min_job" name="budget_min">
												<span class="mx-2">to</span>
												<input type="number" class="form-control  " placeholder="0.00" value="" id="budget_max_job" name="budget_max">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Employment Type</label>
											<select class="form-control" id="employment_type_id_job" name="employment_type_id">
												<option value="" selected disabled>-- Choose Employment Type --</option>
												<?php foreach ($employment_type as $key => $employment_value) {?>
													<option value="<?php echo $employment_value['id']; ?>" ><?php echo $employment_value['name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Position Level</label>
											<select class="form-control" id="position_level_id_job" name="position_level_id">
												<option value="" selected disabled>-- Choose Position Level --</option>
												<?php foreach ($position_levels as $key => $position_level_value) {?>
													<option value="<?php echo $position_level_value['id']; ?>" ><?php echo $position_level_value['name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Years Of Experience</label>
											<select class="form-control" id="years_of_experience_job" name="years_of_experience">
												<option value="" selected disabled>-- Choose Years Of Experience --</option>
												<?php foreach ($year_of_experience as $key => $year_of_experience_value) { ?>
													<option value="<?php echo $year_of_experience_value['id']; ?>" ><?php echo $year_of_experience_value['name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Job Description</label>
											<textarea id="job_description_job" name="job_description" class="textarea_editor wysihtml5 form-control" rows="6"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Job Requirement</label>
											<textarea id="qualifications_job" name="qualifications" class="textarea_editor wysihtml5 form-control" rows="6"></textarea>
										</div>											
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nice To Have</label>
											<textarea id="other_requirements_job" name="other_requirements" class="textarea_editor wysihtml5 form-control" rows="6"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Additional Info</label>
											<textarea id="additional_info_job" name="additional_info" class="textarea_editor wysihtml5 form-control" rows="6"></textarea>
										</div>
									</div>
								</div>
							</div>
							</div>
							<input type="hidden" id="job_id_job" name="job_id" value=""></input>
							<div class="modal-footer form-action ">
								<button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
								<a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
		</div>

