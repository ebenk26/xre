<!-- BEGIN CONTENT -->
		<?php
			$roles = $this->session->userdata('roles');
		?>
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <h1 class="page-title"> <?=ucfirst($type)?>
                    <!--<small>here list of your message</small>-->
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?=base_url().$roles?>/dashboard">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span><?=ucfirst($type)?></span>
                        </li>
                    </ul>

                </div>
				
				
				<!-- BEGIN INBOX PART -->
				<div class="inbox">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inbox-sidebar">
                                    <!--<a href="javascript:;" data-title="Compose" class="btn red compose-btn btn-block">
                                        <i class="fa fa-edit"></i> Compose </a>-->
                                    <ul class="inbox-nav">
                                        <li class="<?=$type == "inbox"?"active":""?>">
											<a href="<?=base_url().$roles?>/inbox" data-type="inbox" data-title="Inbox"> Inbox
                                                <?=$new > 0?'<span class="badge badge-success">'.$new.'</span>':''?>
                                            </a>
                                        </li>
                                        <li class="<?=$type == "sent"?"active":""?>">
                                            <a href="<?=base_url().$roles?>/sent" data-type="sent" data-title="Sent"> Sent </a>
                                        </li>
                                        <!--<li class="">
                                            <a href="javascript:;" data-type="draft" data-title="Draft"> Draft
                                                <span class="badge badge-danger">8</span>
                                            </a>
                                        </li>-->
                                        <li class="divider"></li>
                                        <li class="<?=$type == "trash"?"active":""?>">
                                            <a href="<?=base_url().$roles?>/trash" class="sbold uppercase" data-title="Trash"> Trash
                                                <!--<span class="badge badge-info">23</span>-->
                                            </a>
                                        </li>
                                        <!--<li class="">
                                            <a href="javascript:;" data-type="inbox" data-title="Promotions"> Promotions
                                                <span class="badge badge-warning">2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-type="inbox" data-title="News"> News </a>
                                        </li>-->
                                    </ul>
                                    <!--<ul class="inbox-contacts">
                                        <li class="divider margin-bottom-30"></li>
                                        <li>
                                            <a href="javascript:;">
                                                <img class="contact-pic" src="../assets/pages/media/users/avatar4.jpg">
                                                <span class="contact-name">Adam Stone</span>
                                                <span class="contact-status bg-green"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <img class="contact-pic" src="../assets/pages/media/users/avatar2.jpg">
                                                <span class="contact-name">Lisa Wong</span>
                                                <span class="contact-status bg-red"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <img class="contact-pic" src="../assets/pages/media/users/avatar5.jpg">
                                                <span class="contact-name">Nick Strong</span>
                                                <span class="contact-status bg-green"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <img class="contact-pic" src="../assets/pages/media/users/avatar6.jpg">
                                                <span class="contact-name">Anna Bold</span>
                                                <span class="contact-status bg-yellow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <img class="contact-pic" src="../assets/pages/media/users/avatar7.jpg">
                                                <span class="contact-name">Richard Nilson</span>
                                                <span class="contact-status bg-green"></span>
                                            </a>
                                        </li>
                                    </ul>-->
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="inbox-body">
                                    <div class="inbox-header">
                                        <h1 class="pull-left"><?=ucfirst($type)?></h1>
										<div class="btn-group input-actions">
											<a class="btn btn-sm blue btn-outline dropdown-toggle sbold" href="javascript:;" data-toggle="dropdown"> Actions
												<i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu">
												<li>
													<a href="javascript:;">
														<i class="fa fa-pencil"></i> Mark as Read </a>
												</li>
												<li>
													<a href="javascript:;">
														<i class="fa fa-ban"></i> Spam </a>
												</li>
												<li class="divider"> </li>
												<li>
													<a href="javascript:;">
														<i class="fa fa-trash-o"></i> Delete </a>
												</li>
											</ul>
										</div>
                                        <!--<form class="form-inline pull-right" action="index.html">
                                            <div class="input-group input-medium">
                                                <input type="text" class="form-control" placeholder="Password">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>-->
                                    </div>
                                    <div class="inbox-content" style="">
										<table class="table table-striped table-bordered table-hover  order-column" id="xremo_table">
											<thead>
												<tr>
													<th class="text-center">#</th>
													<th> From </th>
													<th> To </th>
													<th> Subject </th>
													<th> Date </th>
													<th> Actions </th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;foreach ($message as $row) { ?>
													<?php 
														$bold1 = "";$bold2 = "";
														if($type == "inbox"){
															if($row->status_receiver == "NEW"){ $bold1 = "<b>";$bold2 = "</b>";}}?>
													<tr class="odd gradeX">
														<td class="text-center" ><?=$bold1.$no.$bold2;?></td>
														<td>
															<?=$bold1?><?=$row->sender_role == 'employer'?$row->sender_company_name:$row->sender_name;?><?=$bold2?>														
														</td>
														<td>
															<?=$bold1?><?=$row->receiver_role == 'employer'?$row->receiver_company_name:$row->receiver_name;?><?=$bold2?>
														</td>
														<td> <?=$bold1?><?php echo $row->subject; ?><?=$bold2?></td>
														<td> <?=$bold1?><?php echo date('d M Y H:i:s', strtotime($row->last_reply_at_sender != '0000-00-00 00:00:00'?$row->last_reply_at_sender:$row->created_at)); ?><?=$bold2?> </td>
														<td>
															<a href="<?php echo base_url(); ?>message/<?=rtrim(base64_encode($row->id), '='); ?>" target="_blank" class="btn btn-icon-only yellow" title="View" style="margin-right:0;">
																<i class="fa fa-search"></i>
															</a>
															
															<!--<a href="#modal_edit_<?=$row->id ?>" class="btn btn-icon-only blue" data-toggle="modal" title="Edit" style="margin-right:0;">
																<i class="fa fa-edit"></i> 
															</a>-->
															
															<?php if($type != "trash"){?>
																<a href="#modal_delete_<?=$row->id ?>" class="btn btn-icon-only red" data-toggle="modal" title="Delete" style="margin-right:0;">
																	<i class="fa fa-trash"></i> 
																</a>
															<?php }?>
														</td>
													</tr>                                        
												<?php $no++;} ?>
											</tbody>
										</table>
									
									
									
										<!--<table class="table table-striped table-advance table-hover">
											<thead>
												<tr>
													<th colspan="3">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-group-checkbox">
															<span></span>
														</label>
														<div class="btn-group input-actions">
															<a class="btn btn-sm blue btn-outline dropdown-toggle sbold" href="javascript:;" data-toggle="dropdown"> Actions
																<i class="fa fa-angle-down"></i>
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a href="javascript:;">
																		<i class="fa fa-pencil"></i> Mark as Read </a>
																</li>
																<li>
																	<a href="javascript:;">
																		<i class="fa fa-ban"></i> Spam </a>
																</li>
																<li class="divider"> </li>
																<li>
																	<a href="javascript:;">
																		<i class="fa fa-trash-o"></i> Delete </a>
																</li>
															</ul>
														</div>
													</th>
													<th class="pagination-control" colspan="3">
														<span class="pagination-info"> 1-30 of 789 </span>
														<a class="btn btn-sm blue btn-outline">
															<i class="fa fa-angle-left"></i>
														</a>
														<a class="btn btn-sm blue btn-outline">
															<i class="fa fa-angle-right"></i>
														</a>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="unread" data-messageid="1">
													<td class="inbox-small-cells">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-checkbox" value="1">
															<span></span>
														</label>
													</td>
													<td class="inbox-small-cells">
														<i class="fa fa-star"></i>
													</td>
													<td class="view-message hidden-xs"> Petronas IT </td>
													<td class="view-message "> New server for datacenter needed </td>
													<td class="view-message inbox-small-cells">
														<i class="fa fa-paperclip"></i>
													</td>
													<td class="view-message text-right"> 16:30 PM </td>
												</tr>
												<tr class="unread" data-messageid="2">
													<td class="inbox-small-cells">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-checkbox" value="1">
															<span></span>
														</label>
													</td>
													<td class="inbox-small-cells">
														<i class="fa fa-star"></i>
													</td>
													<td class="view-message hidden-xs"> Daniel Wong </td>
													<td class="view-message"> Please help us on customization of new secure server </td>
													<td class="view-message inbox-small-cells"> </td>
													<td class="view-message text-right"> March 15 </td>
												</tr>
												<tr data-messageid="3">
													<td class="inbox-small-cells">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-checkbox" value="1">
															<span></span>
														</label>
													</td>
													<td class="inbox-small-cells">
														<i class="fa fa-star"></i>
													</td>
													<td class="view-message hidden-xs"> John Doe </td>
													<td class="view-message"> Lorem ipsum dolor sit amet </td>
													<td class="view-message inbox-small-cells"> </td>
													<td class="view-message text-right"> March 15 </td>
												</tr>
												<tr data-messageid="4">
													<td class="inbox-small-cells">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-checkbox" value="1">
															<span></span>
														</label>
													</td>
													<td class="inbox-small-cells">
														<i class="fa fa-star"></i>
													</td>
													<td class="view-message hidden-xs"> Facebook </td>
													<td class="view-message"> Dolor sit amet, consectetuer adipiscing </td>
													<td class="view-message inbox-small-cells"> </td>
													<td class="view-message text-right"> March 14 </td>
												</tr>
												<tr data-messageid="5">
													<td class="inbox-small-cells">
														<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
															<input type="checkbox" class="mail-checkbox" value="1">
															<span></span>
														</label>
													</td>
													<td class="inbox-small-cells">
														<i class="fa fa-star inbox-started"></i>
													</td>
													<td class="view-message hidden-xs"> John Doe </td>
													<td class="view-message"> Lorem ipsum dolor sit amet </td>
													<td class="view-message inbox-small-cells"> </td>
													<td class="view-message text-right"> March 15 </td>
												</tr>
											</tbody>
										</table>-->
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
					
				<!-- END OF INBOX PART -->

                <?php foreach ($message as $row) { ?>
					<div id="modal_delete_<?=$row->id?>" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header ">
									<h4 class="modal-title">Delete Message</h4>
								</div>
								<div class="modal-body">
									<form action="<?php echo base_url(); ?>administrator/inbox/delete" method="POST">
										<div class="form-body">
											<h4>Are you sure?</h4><br>
										</div>
										<input type="hidden" name="id" value="<?=$row->id?>"></input>
										<input type="hidden" name="type" value="<?=$type?>"></input>
										<input type="hidden" name="sender" value="<?=$this->session->userdata('id') == $row->sender_id?"true":"false"?>"></input>
										
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
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->