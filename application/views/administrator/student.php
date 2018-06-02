        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Student
                        <!--<small>Here your job post should be</small>-->
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>administrator/job_seeker">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Student</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->
				
                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Student</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="<?=base_url()?>administrator/student/export" class="btn btn-circle btn-md-green">
                                <i class="fa fa-download"></i> Download List 
							</a>
							<!--
							<a href="#modal_add_jobpost" class="btn btn-circle btn-md-green" data-toggle="modal">
                                <i class="fa fa-download"></i> Download List 
							</a>
							-->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Signup Date </th>
                                    <!--<th class="col-md-2"> CV </th>-->
                                    <th> Video CV </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;foreach ($job_seeker as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?=$no++; ?></td>
                                        <td> <?=$row->fullname; ?></td>
										<td> <?=$row->email; ?></td>
										<td> <?=date('j F Y', strtotime($row->created_at)); ?></td>
										<!--<td> <?=$row->email; ?></td>-->
										<td> 
											<?php if($row->youtubelink != ""){?>
												<a href="<?=$row->youtubelink?>" class="btn btn-circle btn-md-red" target="_blank">
													<i class="fa fa-video-camera"></i> Watch 
												</a>
											<?php }?>
										</td>
										<td>
											<a href="<?php
												$id = $row->id;
												$id_encoded = rtrim(base64_encode($id), '=');
												echo base_url()?>profile/user/<?=$id_encoded; ?>" target="_blank" class="btn btn-circle btn-md-blue">
												<i class="fa fa-user"></i> View Profile 
											</a>
											
											<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
												<i class="fa fa-edit"></i> 
											</a>
										</td>
                                    </tr>                                        
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        
        <?php foreach ($job_seeker as $row) { ?>
			<!-- BEGIN MODAL : Create Employer -->
			<div id="modal_edit_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title">Edit Student</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/student/post" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Student Email Address</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope font-yellow-gold"></i>
											</span>
											<input type="email" name="email" class="form-control" placeholder="Email Address" value="<?=$row->email?>"> 
										</div>
									</div>
									
									<!--<div class="form-group">
										<label>Password</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-lock font-yellow-gold"></i>
											</span>
											<input type="password" name="password" class="form-control" placeholder="Password" value="<?=$row->password?>">
										</div>
									</div>-->
								</div>
								<input type="hidden" name="submit_type" value="edit"></input>
								<input type="hidden" name="id" value="<?=$row->id?>"></input>
								<input type="hidden" name="password_old" value="<?=$row->password?>"></input>									
								
								<div class="modal-footer form-action ">
									<!-- <a href="<?php echo base_url(); ?>employer/preview_job" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</a> -->
									<button type="submit" class="btn btn-md-blue  mt-width-150-xs font-20-xs letter-space-xs">Update</button>
									<a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
				</div>
			</div>
        <?php } ?>