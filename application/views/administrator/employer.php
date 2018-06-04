        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Employer
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
                                <span>Employer</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
				
                <div class="portlet light">
                    <div class="portlet-title tabbable-line">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Employer</span>
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
                            <span class="caption-subject"> Employer</span>
                        </div>
                        <div class="actions">
                            <a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal">
                                <i class="fa fa-plus"></i> Create Employer 
							</a>
							<a href="<?=base_url()?>administrator/employer/export" class="btn btn-circle btn-md-green">
                                <i class="fa fa-download"></i> Download List 
							</a>
                        </div>
                    </div>-->
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab2_1">
                                <div class="alert alert-danger"> <b>Indonesia</b> </div>
                                <div>
                                	<a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal" style="margin-bottom: 15px;">
		                                <i class="fa fa-plus"></i> Create Employer 
									</a>
                                	<a href="<?=base_url()?>administrator/employer/export/5" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                	<i class="fa fa-download"></i> Download List 
									</a>
								</div>

								<table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Company </th>
		                                    <th> Company Email </th>
		                                    <th> Contact Person </th>
											<th> Contact Person Email </th>
		                                    <th> Phone </th>
		                                    <th> Fax </th>
		                                    <th> Signup Date</th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($result as $row) {if($row->country == 5){?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$row->company_name; ?></td>
												<td> <?=$row->company_email; ?></td>
												<td> <?=$row->fullname; ?></td>
												<td> <?=$row->email; ?></td>
												<?php
													$building_phone = "";
													$building_fax = "";
													$company_address = json_decode($row->address);
													if (!empty($company_address)) {
														foreach ($company_address as $key => $value) {
															$building_phone = $value->building_phone;
															$building_fax = $value->building_fax;
															break;
														}
													}
												?>
												<td> <?=$building_phone; ?></td>
												<td> <?=$building_fax; ?></td>
												<td> <?=date('j F Y', strtotime($row->created_at)); ?></td>
												<td>
		                                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
														<i class="fa fa-search"></i>
													</a>
													
													<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
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
                                	<a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal" style="margin-bottom: 15px;">
		                                <i class="fa fa-plus"></i> Create Employer 
									</a>
                                	<a href="<?=base_url()?>administrator/employer/export/3" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>

								<table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Company </th>
		                                    <th> Company Email </th>
		                                    <th> Contact Person </th>
											<th> Contact Person Email </th>
		                                    <th> Phone </th>
		                                    <th> Fax </th>
		                                    <th> Signup Date</th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($result as $row) {if($row->country == 3){?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$row->company_name; ?></td>
												<td> <?=$row->company_email; ?></td>
												<td> <?=$row->fullname; ?></td>
												<td> <?=$row->email; ?></td>
												<?php
													$building_phone = "";
													$building_fax = "";
													$company_address = json_decode($row->address);
													if (!empty($company_address)) {
														foreach ($company_address as $key => $value) {
															$building_phone = $value->building_phone;
															$building_fax = $value->building_fax;
															break;
														}
													}
												?>
												<td> <?=$building_phone; ?></td>
												<td> <?=$building_fax; ?></td>
												<td> <?=date('j F Y', strtotime($row->created_at)); ?></td>
												<td>
		                                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
														<i class="fa fa-search"></i>
													</a>
													
													<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
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
                                	<a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal" style="margin-bottom: 15px;">
		                                <i class="fa fa-plus"></i> Create Employer 
									</a>
                                	<a href="<?=base_url()?>administrator/employer/export/4" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>

								<table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Company </th>
		                                    <th> Company Email </th>
		                                    <th> Contact Person </th>
											<th> Contact Person Email </th>
		                                    <th> Phone </th>
		                                    <th> Fax </th>
		                                    <th> Signup Date</th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($result as $row) {if($row->country == 4){?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$row->company_name; ?></td>
												<td> <?=$row->company_email; ?></td>
												<td> <?=$row->fullname; ?></td>
												<td> <?=$row->email; ?></td>
												<?php
													$building_phone = "";
													$building_fax = "";
													$company_address = json_decode($row->address);
													if (!empty($company_address)) {
														foreach ($company_address as $key => $value) {
															$building_phone = $value->building_phone;
															$building_fax = $value->building_fax;
															break;
														}
													}
												?>
												<td> <?=$building_phone; ?></td>
												<td> <?=$building_fax; ?></td>
												<td> <?=date('j F Y', strtotime($row->created_at)); ?></td>
												<td>
		                                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
														<i class="fa fa-search"></i>
													</a>
													
													<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
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
                                	<a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal" style="margin-bottom: 15px;">
		                                <i class="fa fa-plus"></i> Create Employer 
									</a>
                                	<a href="<?=base_url()?>administrator/employer/export/0" class="btn btn-circle btn-md-green" style="margin-bottom: 15px;">
	                                <i class="fa fa-download"></i> Download List 
									</a>
								</div>

								<table class="table table-striped table-bordered table-hover order-column xremo_table" id="">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">#</th>
		                                    <th> Company </th>
		                                    <th> Company Email </th>
		                                    <th> Contact Person </th>
											<th> Contact Person Email </th>
		                                    <!--<th class="col-md-1"> GST </th>-->
											<th> Phone </th>
		                                    <th> Fax </th>
		                                    <th> Signup Date</th>
		                                    <th> Actions </th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1;foreach ($result as $row) {if($row->country == 0){?>
		                                    <tr class="odd gradeX">
		                                        <td class="text-center" ><?=$no++; ?></td>
		                                        <td> <?=$row->company_name; ?></td>
												<td> <?=$row->company_email; ?></td>
												<td> <?=$row->fullname; ?></td>
												<td> <?=$row->email; ?></td>
												<?php
													$building_phone = "";
													$building_fax = "";
													$company_address = json_decode($row->address);
													if (!empty($company_address)) {
														foreach ($company_address as $key => $value) {
															$building_phone = $value->building_phone;
															$building_fax = $value->building_fax;
															break;
														}
													}
												?>
												<td> <?=$building_phone; ?></td>
												<td> <?=$building_fax; ?></td>
												<td> <?=date('j F Y', strtotime($row->created_at)); ?></td>
												<td>
		                                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
														<i class="fa fa-search"></i>
													</a>
													
													<!--<a href="" target="_blank" class=" btn btn-block btn-md-indigo roboto-font">
													<i class="fa fa-building-o mr-2 "></i>View Company</a>-->
													
													<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
														<i class="fa fa-edit"></i> 
													</a>
													
													<!--<div class="btn-toolbar">
														<div class="btn-group">
															
															<a class="btn btn-xs blue-ebonyclay" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
																Actions
																<i class="fa fa-angle-down"></i>
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a href="#modal_edit_jobpost_<?=$row->id ?>" data-toggle="modal">
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
																	<a href="javascript:;" class="md-red-text dlt-btn" id="<?=$row->id?>">
																		<i class="icon-trash md-red-text"></i> Delete
																	</a>
																</li>
															</ul>
														</div>
													</div>-->
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
        <?php foreach ($result as $row) { ?>
			<!-- BEGIN MODAL : Create Employer -->
			<div id="modal_edit_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title">Edit Employer</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/employer/post" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Country</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-globe font-yellow-gold"></i>
											</span>
											<select name="country" class="form-control">
	                                            <option value="0">Country Not Set</option>
	                                            <?php foreach ($countries as $row1) { ?>
	                                            	<option value="<?=$row1->id?>" <?php echo $row1->id == $row->country?"selected":"";?>><?=$row1->name?></option>
	                                            <?php }?>
	                                        </select> 
										</div>
									</div>

									<div class="form-group">
										<label>Company Name</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user font-yellow-gold"></i>
											</span>
											<input type="text" name="fullname" class="form-control" placeholder="Company Name" value="<?=$row->company_name?>" readonly> 
										</div>
									</div>
									
									<div class="form-group">
										<label>Contact Person Email Address</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope font-yellow-gold"></i>
											</span>
											<input type="email" name="email" class="form-control" placeholder="Email Address" value="<?=$row->email?>"> 
										</div>
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-lock font-yellow-gold"></i>
											</span>
											<input type="password" name="password" class="form-control" placeholder="Password" value="<?=$row->password?>">
										</div>
									</div>
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
        <!-- BEGIN MODAL : Create Employer -->
        <div id="modal_add" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title">Create Employer</h4>
                    </div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/employer/post" method="POST">
							<div class="form-body">
                                <div class="form-group">
									<label>Country</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-globe font-yellow-gold"></i>
										</span>
										<select name="country" class="form-control">
                                            <?php foreach ($countries as $row) { ?>
                                            	<option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php }?>
                                        </select> 
									</div>
								</div>

								<div class="form-group">
									<label>Company Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user font-yellow-gold"></i>
										</span>
										<input type="text" name="fullname" class="form-control" placeholder="Company Name"> 
									</div>
								</div>
								
								<div class="form-group">
									<label>Email Address</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-envelope font-yellow-gold"></i>
										</span>
										<input type="email" name="email" class="form-control" placeholder="Email Address"> 
									</div>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-lock font-yellow-gold"></i>
										</span>
										<input type="password" name="password" class="form-control" placeholder="Password">
									</div>
								</div>
							</div>
							<input type="hidden" name="submit_type" value="insert"></input>
							<input type="hidden" name="id" value="0"></input>
							<div class="modal-footer form-action ">
								<!-- <a href="<?php echo base_url(); ?>employer/preview_job" class="btn btn-md-orange  mt-width-150-xs font-20-xs letter-space-xs">Preview Job</a> -->
								<button type="submit" class="btn btn-md-blue  mt-width-150-xs font-20-xs letter-space-xs">Submit</button>
								<a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
							</div>
						</form>
					</div>
                    <!-- /.modal-content -->
                </div>
            </div>
        </div>
        <!-- END MODAL : Add Job Post Info -->