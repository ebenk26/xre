        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Job Seeker
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
                                <span>Job Seeker</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->
                <?php if($this->uri->segment(1) != "administrator"){?>
					<div class="row widget-row">
						<div class="col-md-3">
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
						</div>
						<div class="col-md-3">
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
						</div>
						<div class="col-md-6">
							<div class="widget-thumb widget-bg-color-gray text-uppercase mb-3 ">

								<h4 class="widget-thumb-heading">Need more job post ?</h4>
								<!-- <div class="widget-thumb-wrap"> -->
								<!-- <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i> -->
								<div class="widget-thumb-body">
									<div class="widget-thumb-subtitle mb-2">Purchase More in here</div>
									<a href="employer-purchasepackage.html" class="btn btn-md-amber">Buy More</a>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
				
                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Job Seeker</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="<?=base_url()?>administrator/job_seeker/export" class="btn btn-circle btn-md-green">
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
										<!--<td> <?=$row->email; ?></td>-->
										<td> 
											<?php if($row->youtubelink != ""){?>
												<a href="<?=$row->youtubelink?>" class="btn btn-circle btn-md-red" target="_blank">
													<i class="fa fa-video-camera"></i> Watch 
												</a>
											<?php }?>
										</td>
										<td>
											<!--<a href="<?=base_url()?>profile/user/<?=$row->youtubelink?>" class="btn btn-circle btn-md-blue">
												<i class="fa fa-user"></i> View Profile 
											</a>-->
											
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
                                        <!--<td>
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

                                        </td>-->
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
							<h4 class="modal-title">Edit Job Seeker</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/job_seeker/post" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Job Seeker Email Address</label>
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