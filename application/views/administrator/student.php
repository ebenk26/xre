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
                    <div class="portlet-title tabbable-line">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Student</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#portlet_tab2_1" data-toggle="tab" aria-expanded="true"> Indonesia </a>
                            </li>
                            <li class="">
                                <a href="#portlet_tab2_2" data-toggle="tab" aria-expanded="false"> Malaysia </a>
                            </li>
                            <li class="">
                                <a href="#portlet_tab2_3" data-toggle="tab" aria-expanded="false"> Philippines </a>
                            </li>
                            <li class="">
                                <a href="#portlet_tab2_4" data-toggle="tab" aria-expanded="false"> Country Not Set </a>
                            </li>
                        </ul>
                    </div>

                    <!--<div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Student</span>
                        </div>
                        <div class="actions">
                            <a href="<?=base_url()?>administrator/student/export" class="btn btn-circle btn-md-green">
                                <i class="fa fa-download"></i> Download List 
							</a>
                        </div>
                    </div>-->
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab2_1">
                                <div class="alert alert-danger"> <b>Indonesia</b> </div>
                                <div>
                                	<a href="<?=base_url()?>administrator/student/export/5" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>
                                
                                <!--<div class="btn-group margin-bottom-10">
                                    <a class="btn red" href="javascript:;" data-toggle="dropdown">
                                        <i class="fa fa-user"></i> Settings
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-plus"></i> Add </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-trash-o"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-times"></i> Delete </a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="javascript:;"> Full Settings </a>
                                        </li>
                                    </ul>
                                </div>-->
                                <table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Name </th>
		                                    <th> Email </th>
		                                    <th> Signup Date </th>
		                                    <!--<th class="col-md-2"> CV </th>-->
		                                    <th> Video CV </th>
		                                    <th> Percentage </th>
		                                    <th> Verify </th>
		                                    <th> Last Seen </th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($job_seeker as $row => $value) {if($value['overview']['country_id'] == 5){ ?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$value['overview']['name']; ?></td>
												<td> <?=$value['overview']['email']; ?></td>
												<td> <?=date('j F Y', strtotime($value['overview']['updated_at']) ); ?></td>
												<td> 
													<?php if($value['overview']['youtubelink'] != ""){?>
														<a href="<?=$value['overview']['youtubelink']?>" class="btn btn-circle btn-md-red" target="_blank">
															<i class="fa fa-video-camera"></i> Watch 
														</a>
													<?php }?>
												</td>
												<td> <?=$value['percent']; ?></td>
												<td> <?=$value['overview']['verified']==1 ? '<i class="fa fa-check">' : ''; ?> </td>
												<td> <?= time_elapsed_string($value['overview']['last_seen_at']) ; ?> </td>
												<td>
													<a href="<?php
														$id = $value['overview']['id_users'];
														$id_encoded = rtrim(base64_encode($id), '=');
														echo base_url()?>profile/user/<?=$id_encoded; ?>" target="_blank" class="btn btn-circle btn-md-blue">
														<i class="fa fa-user"></i> View Profile 
													</a>
													
													<a href="#modal_edit_<?=$value['overview']['id_users'] ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
													</a>

													<a href="#" class="btn btn-icon-only blue sendMail" data-name="<?= $value['overview']['name'];?>" data-email="<?= $value['overview']['email'];?>" title="Edit" style="margin-right:0;">
														<i class="fa fa-envelope"></i> 
													</a>
												</td>
		                                    </tr>                                        
		                                <?php }} ?>
		                            </tbody>
		                        </table>
                            </div>
                            <div class="tab-pane" id="portlet_tab2_2">
                                <div class="alert alert-info"> <b>Malaysia</b> </div>
                                <div>
                                	<a href="<?=base_url()?>administrator/student/export/3" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>
                                <table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Name </th>
		                                    <th> Email </th>
		                                    <th> Signup Date </th>
		                                    <!--<th class="col-md-2"> CV </th>-->
		                                    <th> Video CV </th>
		                                    <th> Percentage </th>
		                                    <th> Verify </th>
		                                    <th> Last Seen </th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($job_seeker as $row => $value) {if($value['overview']['country_id'] == 3){ ?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$value['overview']['name']; ?></td>
												<td> <?=$value['overview']['email']; ?></td>
												<td> <?=date('j F Y', strtotime($value['overview']['updated_at']) ); ?></td>
												<td> 
													<?php if($value['overview']['youtubelink'] != ""){?>
														<a href="<?=$value['overview']['youtubelink']?>" class="btn btn-circle btn-md-red" target="_blank">
															<i class="fa fa-video-camera"></i> Watch 
														</a>
													<?php }?>
												</td>
												<td> <?=$value['percent']; ?></td>
												<td> <?=$value['overview']['verified']==1 ? '<i class="fa fa-check">' : ''; ?> </td>
												<td> <?= time_elapsed_string($value['overview']['last_seen_at']) ; ?> </td>
												<td>
													<a href="<?php
														$id = $value['overview']['id_users'];
														$id_encoded = rtrim(base64_encode($id), '=');
														echo base_url()?>profile/user/<?=$id_encoded; ?>" target="_blank" class="btn btn-circle btn-md-blue">
														<i class="fa fa-user"></i> View Profile 
													</a>
													
													<a href="#modal_edit_<?=$value['overview']['id_users'] ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
													</a>

													<a href="#" class="btn btn-icon-only blue sendMail" data-name="<?= $value['overview']['name'];?>" data-email="<?= $value['overview']['email'];?>" title="Edit" style="margin-right:0;">
														<i class="fa fa-envelope"></i> 
													</a>
												</td>
		                                    </tr>                                           
		                                <?php }} ?>
		                            </tbody>
		                        </table>
                            </div>
                            <div class="tab-pane" id="portlet_tab2_3">
                                <div class="alert alert-warning"> <b>Philippines</b> </div>
                                <div>
                                	<a href="<?=base_url()?>administrator/student/export/4" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>
                                <table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Name </th>
		                                    <th> Email </th>
		                                    <th> Signup Date </th>
		                                    <!--<th class="col-md-2"> CV </th>-->
		                                    <th> Video CV </th>
		                                    <th> Percentage </th>
		                                    <th> Verify </th>
		                                    <th> Last Seen </th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($job_seeker as $row => $value) {if($value['overview']['country_id'] == 4){ ?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$value['overview']['name']; ?></td>
												<td> <?=$value['overview']['email']; ?></td>
												<td> <?=date('j F Y', strtotime($value['overview']['updated_at']) ); ?></td>
												<td> 
													<?php if($value['overview']['youtubelink'] != ""){?>
														<a href="<?=$value['overview']['youtubelink']?>" class="btn btn-circle btn-md-red" target="_blank">
															<i class="fa fa-video-camera"></i> Watch 
														</a>
													<?php }?>
												</td>
												<td> <?=$value['percent']; ?></td>
												<td> <?=$value['overview']['verified']==1 ? '<i class="fa fa-check">' : ''; ?> </td>
												<td> <?= time_elapsed_string($value['overview']['last_seen_at']) ; ?> </td>
												<td>
													<a href="<?php
														$id = $value['overview']['id_users'];
														$id_encoded = rtrim(base64_encode($id), '=');
														echo base_url()?>profile/user/<?=$id_encoded; ?>" target="_blank" class="btn btn-circle btn-md-blue">
														<i class="fa fa-user"></i> View Profile 
													</a>
													
													<a href="#modal_edit_<?=$value['overview']['id_users'] ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
													</a>

													<a href="#" class="btn btn-icon-only blue sendMail" data-name="<?= $value['overview']['name'];?>" data-email="<?= $value['overview']['email'];?>" title="Edit" style="margin-right:0;">
														<i class="fa fa-envelope"></i> 
													</a>
												</td>
		                                    </tr>                                           
		                                <?php }} ?>
		                            </tbody>
		                        </table>
                            </div>
                            <div class="tab-pane" id="portlet_tab2_4">
                                <div class="alert alert-success"> <b>Country Not Set</b> </div>
                                <div>
                                	<a href="<?=base_url()?>administrator/student/export/0" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>
                                <table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Name </th>
		                                    <th> Email </th>
		                                    <th> Signup Date </th>
		                                    <!--<th class="col-md-2"> CV </th>-->
		                                    <th> Video CV </th>
		                                    <th> Percentage </th>
		                                    <th> Verify </th>
		                                    <th> Last Seen </th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($job_seeker as $row => $value) {if($value['overview']['country_id'] == 0){ ?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$value['overview']['name']; ?></td>
												<td> <?=$value['overview']['email']; ?></td>
												<td> <?=date('j F Y', strtotime($value['overview']['updated_at']) ); ?></td>
												<td> 
													<?php if($value['overview']['youtubelink'] != ""){?>
														<a href="<?=$value['overview']['youtubelink']?>" class="btn btn-circle btn-md-red" target="_blank">
															<i class="fa fa-video-camera"></i> Watch 
														</a>
													<?php }?>
												</td>
												<td> <?=$value['percent']; ?></td>
												<td> <?=$value['overview']['verified']==1 ? '<i class="fa fa-check">' : ''; ?> </td>
												<td> <?= time_elapsed_string($value['overview']['last_seen_at']) ; ?> </td>
												<td>
													<a href="<?php
														$id = $value['overview']['id_users'];
														$id_encoded = rtrim(base64_encode($id), '=');
														echo base_url()?>profile/user/<?=$id_encoded; ?>" target="_blank" class="btn btn-circle btn-md-blue">
														<i class="fa fa-user"></i> View Profile 
													</a>
													
													<a href="#modal_edit_<?=$value['overview']['id_users'] ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
													</a>

													<a href="#" class="btn btn-icon-only blue sendMail" data-name="<?= $value['overview']['name'];?>" data-email="<?= $value['overview']['email'];?>" title="Edit" style="margin-right:0;">
														<i class="fa fa-envelope"></i> 
													</a>
												</td>
		                                    </tr>                                            
		                                <?php }} ?>
		                            </tbody>
		                        </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <?php foreach ($job_seeker as $row => $value) { ?>
			<!-- BEGIN MODAL : Create Employer -->
			<div id="modal_edit_<?=$value['overview']['id_users']?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
											<input type="email" name="email" class="form-control" placeholder="Email Address" value="<?=$value['overview']['email']?>"> 
										</div>
									</div>
									
									<!--<div class="form-group">
										<label>Password</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-lock font-yellow-gold"></i>
											</span>
											<input type="password" name="password" class="form-control" placeholder="Password" value="<?=$value['overview']['password']?>">
										</div>
									</div>-->
								</div>
								<input type="hidden" name="submit_type" value="edit"></input>
								<input type="hidden" name="id" value="<?=$value['overview']['id_users']?>"></input>
								<input type="hidden" name="password_old" value="<?=$value['overview']['password']?>"></input>									
								
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