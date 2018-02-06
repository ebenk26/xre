        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Industry
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
                                <span>Industry</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
				
                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Industry</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal">
                                <i class="fa fa-plus"></i> Create Industry 
							</a>
							<!--<a href="<?=base_url()?>administrator/employer/export" class="btn btn-circle btn-md-green">
                                <i class="fa fa-download"></i> Download List 
							</a>-->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th> Industry </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;foreach ($result as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?=$no++; ?></td>
                                        <td> <?=$row->name; ?></td>
										<td>
                                            <a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
												<i class="fa fa-edit"></i> 
											</a>
											
											<a href="#modal_delete_<?=$row->id ?>" class="btn btn-icon-only red" data-toggle="modal" title="Delete" style="margin-right:0;">
												<i class="fa fa-remove"></i> 
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
							<h4 class="modal-title">Edit Industry</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/industry/post" method="POST">
								<div class="form-body">
									<div class="form-group">
										<label>Industry</label>
										<input type="text" name="name" class="form-control" placeholder="Industry" value="<?=$row->name?>">
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
			
			<div id="modal_delete_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title">Delete Industry</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/industry/delete" method="POST">
								<div class="form-body">
									<h4>Are you sure?</h4><br>
								</div>
								<input type="hidden" name="id" value="<?=$row->id?>"></input>
								
								<div class="modal-footer form-action ">
									<button type="submit" class="btn btn-md-red  mt-width-150-xs font-20-xs letter-space-xs">Delete</button>
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
                        <h4 class="modal-title">Create Industry</h4>
                    </div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/industry/post" method="POST">
							<div class="form-body">
								<div class="form-group">
									<label>Industry</label>
									<input type="text" name="name" class="form-control" placeholder="Industry" value="">
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