        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Service Item
                        <!--<small>Here your job post should be</small>-->
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>admin/job_seeker">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Service Item</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
				
                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Service Item</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal">
                                <i class="fa fa-plus"></i> Create Service Item 
							</a>
							<!--<a href="<?=base_url()?>admin/employer/export" class="btn btn-circle btn-md-green">
                                <i class="fa fa-download"></i> Download List 
							</a>-->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-6"> Service Item </th>
                                    <th class="col-md-1"> Value </th>
                                    <th class="col-md-2"> Operation Code </th>
									<th width="150"> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;foreach ($result as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?=$no++; ?></td>
                                        <td> <?=$row->name; ?></td>
										<td> <?=$row->value; ?></td>
										<?php
											$operation_code = "";
											if($row->operation_code == "post_job") {
												$operation_code = "Post Job";
											}elseif($row->operation_code == "unlock_cv"){
												$operation_code = "Unlock CV";
											}else{
												$operation_code = "Others";
											}
										?>
										<td> <?=$operation_code; ?></td>
										<td>
                                            <!--<a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only red" title="View" style="margin-right:0;">
												<i class="fa fa-search"></i>
											</a>-->
											
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
        <?php foreach ($result as $row) { ?>
			<!-- BEGIN MODAL : Create Employer -->
			<div id="modal_edit_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title">Edit Service Item</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>admin/service_item/post" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Service Item</label>
										<input type="text" name="name" class="form-control" placeholder="Service Item" value="<?=$row->name?>">
									</div>
									
									<div class="form-group">
										<label>Value</label>
										<input type="number" class="form-control " placeholder="0.00" value="<?php echo $row->value ?>" name="value">
									</div>
									
									<div class="form-group">
										<label>Operation Code</label>
										<select class="form-control" name="operation_code">
											<option value="others" <?php echo $row->operation_code == "others" ? 'selected':''; ?>>Others</option>
											<option value="post_job" <?php echo $row->operation_code == "post_job" ? 'selected':''; ?>>Post Job</option>
											<option value="unlock_cv" <?php echo $row->operation_code == "unlock_cv" ? 'selected':''; ?>>Unlock CV</option>
										</select>
									</div>
								</div>
								<input type="hidden" name="submit_type" value="edit"></input>
								<input type="hidden" name="id" value="<?=$row->id?>"></input>
								
								<div class="modal-footer form-action ">
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
                        <h4 class="modal-title">Create Service Item</h4>
                    </div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>admin/service_item/post" method="POST">
							<div class="form-body">
								<div class="form-group">
									<label>Service Item</label>
									<input type="text" name="name" class="form-control" placeholder="Service Item" value="">
								</div>
								
								<div class="form-group">
									<label>Value</label>
									<input type="number" class="form-control " placeholder="0.00" value="" name="value">
								</div>
								
								<div class="form-group">
									<label>Operation Code</label>
									<select class="form-control" name="operation_code">
										<option value="others">Others</option>
										<option value="post_job">Post Job</option>
										<option value="unlock_cv">Unlock CV</option>
									</select>
								</div>
							</div>
							<input type="hidden" name="submit_type" value="insert"></input>
							<input type="hidden" name="id" value="0"></input>
							<div class="modal-footer form-action ">
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