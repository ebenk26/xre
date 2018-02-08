        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php if($type == "new"){?>
					<!-- BEGIN PAGE HEAD-->
					<div class="page-head">
						<!-- BEGIN PAGE TITLE -->

						<h1 class="page-title">Create Message
							<!--<small>Here your job post should be</small>-->
						</h1>
						<div class="page-bar">
							<ul class="page-breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="<?=base_url()?><?=$roles?>/dashboard">Home</a>
									<i class="fa fa-angle-right"></i>
								</li>
								<li>
									<span>Create Message</span>
								</li>
							</ul>

						</div>
						<!-- END PAGE TITLE -->
					</div>
					
				<?php }else{?>
					<!-- BEGIN PAGE HEAD-->
					<div class="page-head">
						<!-- BEGIN PAGE TITLE -->

						<h1 class="page-title"> View Message
							<!--<small>Here your job post should be</small>-->
						</h1>
						<div class="page-bar">
							<ul class="page-breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="<?=base_url()?><?=$roles?>/dashboard">Home</a>
									<i class="fa fa-angle-right"></i>
								</li>
								<li>
									<span> View Message</span>
								</li>
							</ul>

						</div>
						<!-- END PAGE TITLE -->
					</div>
				<?php }?>
				
                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <?php if($type == "new"){?>
								<i class="icon-envelope font-green-sharp"></i>
								<span class="caption-subject"> Create Message</span>
							<?php }else{?>
								<i class="icon-envelope font-green-sharp"></i>
								<span class="caption-subject"> View Message</span>
							<?php }?>
                        </div>
                        <div class="actions">
                            <?php if($type != "new"){?>
								<a href="#modal_add" class="btn btn-circle btn-md-blue" data-toggle="modal">
									<i class="fa fa-plus"></i> Reply 
								</a>
							<?php }?>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!--<div class="modal-body">-->
							<?php if($type == "new"){?>
								<form action="<?php echo base_url(); ?>administrator/inbox/post/" method="POST">
									<div class="scroller mt-height-650-xs" data-always-visible="1" data-rail-visible1="1">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>To</label>
													<input type="text" name="to_name" class="form-control" placeholder="Internship in IT department" value="<?=$to_name?>" readonly> 
													<input type="hidden" name="sender_id" value="<?=$this->session->userdata('id')?>"></input>
													<input type="hidden" name="receiver_id" value="<?=$receiver_id ?>"></input>
													<input type="hidden" name="type" value="new"></input>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Subject</label>
													<input type="text" name="subject" class="form-control" placeholder="Subject of the message" value="" maxlength="255"> 
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Message</label>
													<textarea name="message" class="wysihtml5 form-control" rows="6"></textarea>
												</div>
											</div>
										</div>
									</div>
									</div>
									
									<div class="modal-footer form-action ">
										<button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Send</button>
										<a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
									</div>
								</form>
							<?php }else{?>
								<div class="inbox">
									<div class="inbox-body">
										<div class="inbox-content" style="min-height:20px;margin-bottom:10px;">
											<div class="inbox-header inbox-view-header">
												<h1><b>Subject : <?=$message->subject?></b></h1>
											</div>
										</div>
										
										<?php foreach($message_reply as $row){?>
											<div class="inbox-content" style="margin-bottom:50px;min-height: 20px;">
												<div class="inbox-view-info">
													<div class="row">
														<div class="col-md-12">
															<?php if($row->profile_photo != ""){?>
																<?php if($row->replier_roles == "employer"){?>
																	<img src="<?=IMG_EMPLOYERS.$row->profile_photo?>" class="inbox-author img-circle" style="height:50px;">
																<?php }else{?>
																	<img src="<?=IMG_STUDENTS.$row->profile_photo?>" class="inbox-author img-circle" style="height:50px;">
																<?php }?>
															<?php }?>													
															<b><span class="sbold"><?=$row->replier_roles == "employer"?$row->company_name:$row->fullname?> </span></b>
															 on <?=date('j F Y H:i:s', strtotime($row->created_at))?> 
														</div>
													</div>
												</div>
												<div class="inbox-view">
													<?=$row->message?>
												</div>
												<!-- ATTACHMENT -->
												<!--<hr>
												<div class="inbox-attached">
													<div class="margin-bottom-15">
														<span>attachments — </span>
														<a href="javascript:;">Download all attachments </a>
														<a href="javascript:;">View all images </a>
													</div>
													<div class="margin-bottom-25">
														<img src="../assets/pages/media/gallery/image4.jpg">
														<div>
															<strong>image4.jpg</strong>
															<span>173K </span>
															<a href="javascript:;">View </a>
															<a href="javascript:;">Download </a>
														</div>
														<div class="margin-bottom-25">
															<img src="../assets/pages/media/gallery/image3.jpg">
															<div>
																<strong>IMAG0705.jpg</strong>
																<span>14K </span>
																<a href="javascript:;">View </a>
																<a href="javascript:;">Download </a>
															</div>
														</div>
														<div class="margin-bottom-25">
															<img src="../assets/pages/media/gallery/image5.jpg">
															<div>
																<strong>test.jpg</strong>
																<span>132K </span>
																<a href="javascript:;">View </a>
																<a href="javascript:;">Download </a>
															</div>
														</div>
													</div>
												</div>
												-->
												<!-- ATTACHMENT -->
											</div>
										<?php }?>
										<div class="inbox-content" style="">
											<!--<div class="inbox-header inbox-view-header">
												<h1><?=$message->subject?></h1>
												<h1 class="pull-left"><?=$message->subject?>
													<a href="javascript:;"> Inbox </a>
												</h1>
												<div class="pull-right">
													<a href="javascript:;" class="btn btn-icon-only dark btn-outline">
														<i class="fa fa-print"></i>
													</a>
												</div>
											</div>-->
											<div class="inbox-view-info">
												<div class="row">
													<div class="col-md-12">
														<?php if($message->profile_photo != ""){?>
															<img src="<?=IMG_STUDENTS.$message->profile_photo?>" class="inbox-author img-circle" style="height:50px;">
														<?php }?>													
														<b><span class="sbold"><?=$message->sender_role == "employer"?$message->sender_company_name:$message->sender_name?> </span></b>
														<!--<span>&lt;support@go.com&gt; </span> to
														<span class="sbold"> me </span>--> on <?=date('j F Y H:i:s', strtotime($message->created_at))?> 
													</div>
													<!--<div class="col-md-5 inbox-info-btn"></div>-->
												</div>
											</div>
											<div class="inbox-view">
												<?=$message->message?>
											</div>
											<!-- ATTACHMENT -->
											<!--<hr>
											<div class="inbox-attached">
												<div class="margin-bottom-15">
													<span>attachments — </span>
													<a href="javascript:;">Download all attachments </a>
													<a href="javascript:;">View all images </a>
												</div>
												<div class="margin-bottom-25">
													<img src="../assets/pages/media/gallery/image4.jpg">
													<div>
														<strong>image4.jpg</strong>
														<span>173K </span>
														<a href="javascript:;">View </a>
														<a href="javascript:;">Download </a>
													</div>
													<div class="margin-bottom-25">
														<img src="../assets/pages/media/gallery/image3.jpg">
														<div>
															<strong>IMAG0705.jpg</strong>
															<span>14K </span>
															<a href="javascript:;">View </a>
															<a href="javascript:;">Download </a>
														</div>
													</div>
													<div class="margin-bottom-25">
														<img src="../assets/pages/media/gallery/image5.jpg">
														<div>
															<strong>test.jpg</strong>
															<span>132K </span>
															<a href="javascript:;">View </a>
															<a href="javascript:;">Download </a>
														</div>
													</div>
												</div>
											</div>
											-->
											<!-- ATTACHMENT -->
										</div>
									</div>
								</div>
							<?php }?>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- BEGIN MODAL : Create Employer -->
        <div id="modal_add" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title">Reply Message</h4>
                    </div>
					<div class="modal-body">
						<form action="<?php echo base_url(); ?>administrator/inbox/post" method="POST">
							<div class="form-body">
								<div class="form-group">
									<label>Message</label>
									<textarea name="message" class="wysihtml5 form-control" rows="6"></textarea>
									
									<input type="hidden" name="user_id" value="<?=$this->session->userdata('id')?>"></input>
									<input type="hidden" name="inbox_id" value="<?=$message->id?>"></input>
									
									<input type="hidden" name="sender_id" value="<?=$message->sender_id?>"></input>
									<input type="hidden" name="receiver_id" value="<?=$message->receiver_id ?>"></input>
													
									<input type="hidden" name="type" value="reply"></input>
								</div>
								
								<!--<div class="form-group">
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
								</div>-->
							</div>
							<input type="hidden" name="submit_type" value="insert"></input>
							<input type="hidden" name="id" value="0"></input>
							<div class="modal-footer form-action ">
								<button type="submit" class="btn btn-md-blue  mt-width-150-xs font-20-xs letter-space-xs">Reply</button>
								<a data-dismiss="modal" id="submit_button" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
							</div>
						</form>
					</div>
                    <!-- /.modal-content -->
                </div>
            </div>
        </div>
        <!-- END MODAL : Add Job Post Info -->