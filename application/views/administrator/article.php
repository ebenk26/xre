        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Article
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
                                <span>Article</span>
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
                            <span class="caption-subject"> Article</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="#modal_add" class="btn btn-circle btn-md-indigo" data-toggle="modal">
                                <i class="fa fa-plus"></i> New Article </a>                        
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover  order-column" id="xremo_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th> Title </th>
                                    <th> Author </th>
                                    <th> Tags </th>
                                    <th> Created At </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $row_no = 0;foreach ($result as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" ><?php echo $row->id; ?></td>
                                        <td> <?php echo $row->title; ?></td>
                                        <td> <?php echo $row->author; ?></td>
                                        <td> <?php echo $row->tags; ?> </td>
                                        <td> <?php echo date('d M Y', strtotime($row->created_at)); ?> </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>administrator/article/view/<?=$row->id?>" target="_blank" class="btn btn-icon-only yellow" title="View" style="margin-right:0;">
												<i class="fa fa-search"></i>
											</a>
											
											<a href="#modal_edit" id="row_<?=$row->id?>" class="edit_button_article btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
												<i class="fa fa-edit"></i> 
											</a>
											
											<a href="#modal_delete_<?=$row->id ?>" class="btn btn-icon-only red" data-toggle="modal" title="Delete" style="margin-right:0;">
												<i class="fa fa-remove"></i> 
											</a>
                                        </td>
                                    </tr>                                        
                                <?php $row_no++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php foreach ($result as $row) { break;?>
            <div id="modal_edit_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content ">
						<div class="modal-header ">
							<h4 class="modal-title">Edit Article </h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/article/post/" method="POST" enctype="multipart/form-data">
								<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
									<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Title</label>
												<input type="text" name="title" class="form-control" placeholder="Title" value="<?=$row->title?>" required> 
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Author</label>
												<input type="text" name="author" class="form-control" placeholder="Author" value="<?=$row->author?>" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Excerpt</label>
												<textarea name="excerpt" class="textarea form-control" rows="6" maxlength="250" required><?=$row->excerpt?></textarea>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Tags (separate by ',')</label>
												<input type="text" name="tags" class="form-control" placeholder="Tags (separate by ',')" value="<?=$row->tags?>">
											</div>
											
											<div class="form-group">
												<label>Featured Image</label>
												<input type="file" name="featured_image">
											</div>
											
											<?php if($row->featured_image != ""){?>
												<div class="form-group">
													<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" height="100px"/>
												</div>
											<?php }?>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Content</label>
												<textarea name="body" class="textarea_editor wysihtml5 form-control" rows="10"><?=$row->body?></textarea>
											</div>											
										</div>
									</div>
								</div>
								</div>
								<input type="hidden" name="id" value="<?=$row->id?>"></input>
								<input type="hidden" name="submit_type" value="update"></input>
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
		<?php }?>
		<?php foreach ($result as $row) { ?>
			<div id="modal_delete_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title">Delete Article</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>administrator/article/delete" method="POST">
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
        <!-- BEGIN MODAL : Add -->
        <div id="modal_add" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content ">
					<div class="modal-header ">
						<h4 class="modal-title">Add Article </h4>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/article/post/" method="POST" enctype="multipart/form-data">
							<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title</label>
											<input type="text" name="title" class="form-control" placeholder="Title" value="" required> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Author</label>
											<input type="text" name="author" class="form-control" placeholder="Author" value="" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Excerpt</label>
											<textarea name="excerpt" class="form-control" rows="6" maxlength="250" required></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tags (separate by ',')</label>
											<input type="text" name="tags" class="form-control" placeholder="Tags (separate by ',')" value="">
										</div>
										
										<div class="form-group">
											<label>Featured Image</label>
											<input type="file" name="featured_image">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Content</label>
											<textarea name="body" class="textarea_editor wysihtml5 form-control" rows="10"></textarea>
										</div>											
									</div>
								</div>
							</div>
							</div>
							<input type="hidden" name="id" value="0"></input>
							<input type="hidden" name="submit_type" value="insert"></input>
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
        <!-- END MODAL : Add Job Post Info -->
		
		<!-- MODAL EDIT -->
		<div id="modal_edit" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content ">
					<div class="modal-header ">
						<h4 class="modal-title">Edit Article </h4>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/article/post/" method="POST" enctype="multipart/form-data">
							<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
								<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Title</label>
											<input type="text" id="title_article" name="title" class="form-control" placeholder="Title" value="" required> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Author</label>
											<input type="text" id="author_article" name="author" class="form-control" placeholder="Author" value="" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Excerpt</label>
											<textarea id="excerpt_article" name="excerpt" class="textarea form-control" rows="6" maxlength="250" required></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tags (separate by ',')</label>
											<input type="text" id="tags_article" name="tags" class="form-control" placeholder="Tags (separate by ',')" value="">
										</div>
										
										<div class="form-group">
											<label>Featured Image</label>
											<input type="file" name="featured_image">
										</div>
										
										<?php //if($row->featured_image != ""){?>
											<div class="form-group">
												<img src="<?=base_url()?>assets/img/article/" height="100px" id="featured_image_article"/>
											</div>
										<?php //}?>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Content</label>
											<textarea id="body_article" name="body" class="textarea_editor wysihtml5 form-control" rows="10"></textarea>
										</div>											
									</div>
								</div>
							</div>
							</div>
							<input type="hidden" id="id_article" name="id" value=""></input>
							<input type="hidden" name="submit_type" value="update"></input>
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