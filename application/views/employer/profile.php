<?php   $working_days = explode(' - ', $user_profile['working_days']);
        $working_hours = explode(' - ', $user_profile['working_hours']);
        $dress_code = explode(',', $user_profile['dress_code']);
        $spoken_language = explode(',', $user_profile['spoken_language']);
        $company_address = json_decode($user_profile['address']);
        $profile_picture = end($profile_photo); 
        $header_picture = end($header_photo); 
        $dress_code_detail = explode(',', $detail['dress_code']);
        $dresscode = ucwords(str_replace(',',', ',$detail['dress_code']),', ');
        /*$dresscode = '';
        if (!empty($dress_code_detail)) {
            foreach ($dress_code_detail as $key => $value) {
                if ($value == end($dress_code_detail)) {
                    $dresscode .= ucwords($value);
                }else{
                    $dresscode .= ucwords($value).', ';
                }
            }
        }*/

        ?>
<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- <h1 class="page-title"> User Profile
                    <small>user profile 2</small>
                </h1> -->

                <div class="portlet light portlet-fit ">
                    <div class="m-grid m-grid-full-height m-grid-responsive-sm m-grid-responsive-md">
                        <div class="m-grid-row">
                            <!-- Col-4 -->
                            <div class="portlet light  m-grid-col m-grid-col-md-4 m-grid-col-sm-12 portlet-fit mb-0 ">
                                <div class="m-grid">
                                    <div class=" mt-height-300-xs view">
                                        <img src="<?php echo !empty($header_picture) ?  IMG_EMPLOYERS.$header_picture['name'] : IMG_EMPLOYER.'portfolio/1200x900/1.jpg'?>" class="img-fluid" alt="">
                                        <div class="mask">
                                            <a href="#modal_edit_header_picture" data-toggle="modal" class="btn btn-icon-only btn-circle btn-opacity-white pull-right mt-3 mx-3">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-title pb-6 mb-0 noborder">
                                    <div class="mt-element-card-v2 ">
                                        <div class="mt-card-item ">
                                            <div class="mt-card-avatar text-center  ">
                                                <!-- <img src="https://static.pexels.com/photos/172332/pexels-photo-172332.jpeg" class=" avatar avatar-medium avatar-border-md avatar-circle mt-margin-t-o-100-xs md-shadow-none "> -->
                                                <!-- <img src="../assets/global/img/xremo/profile-pic.png" class=" avatar avatar-medium avatar-border-md avatar-circle mt-margin-t-o-100-xs md-shadow-none "> -->
                                                <img src="<?php echo !empty($profile_picture) ?  IMG_EMPLOYERS.$profile_picture['name'] : IMG_EMPLOYER.'xremo/xremo-logo-blue.png'?>" class=" avatar avatar-medium avatar-border-md avatar-circle mt-margin-t-o-100-xs md-shadow-none  ">
                                                <!-- <img src="https://d27ktgqvbv3y3r.cloudfront.net/cms/images/meta/3bd5eafa-7674-4bf9-9903-e488ab64d3e7.jpg" class=" avatar avatar-medium avatar-border-md avatar-circle mt-margin-t-o-100-xs md-shadow-none  "> -->
                                                <a href="#modal_edit_default_picture" data-toggle="modal" class="btn btn-icon-only btn-circle   white  border-md-grey-light mt-margin-l-o-50-xs  ">
                                                    <i class="icon-pencil"></i>
                                                </a>

                                            </div>
                                            <div class="mt-card-content  ">
                                                <h3 class="mt-card-name  md-indigo-text font-weight-600 text-uppercase font-32-xs "><?php echo !empty($detail['company_name']) ? $detail['company_name']: 'Set Your Company Name'; ?></h3>
                                                <h5 class="md-grey-text text-darken-1 font-24-xs my-4"><?php echo !empty($detail['industry']) ? $detail['industry']: ''; ?></h5>
                                                <hr class="mt-width-400-xs center-block">
                                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" target="_blank" class="btn btn-md-indigo mb-6">View My Profile</a>
                                                <div class="mt-card-social">
                                                    <ul>
                                                        <?php if (!empty($social)) {
                                                         foreach ($social as $key => $value) { 
                                                            switch ($value['name']) {
                                                                case 'facebook':
                                                                    ?>
                                                                <li class="socicons">
                                                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-fb-bg socicon-facebook tooltips" data-original-title="Facebook"></a>
                                                                </li>
                                                            <?php break;
                                                                case 'twitter': ?>
                                                                <li class="socicons">
                                                                    <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-tw-bg socicon-twitter tooltips" data-original-title="Twitter"></a>
                                                                </li>        
                                                            <?php break;
                                                                case 'linkedin': ?>
                                                                <li class="socicons">
                                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-li-bg socicon-linkedin tooltips" data-original-title="Linked In"></a>
                                                                </li>
                                                            <?php break;
                                                                case 'gplus': ?>
                                                                <li class="socicons">
                                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-gplus-bg socicon-google tooltips" data-original-title="Google"></a>
                                                                </li>
                                                            <?php case 'youtube':?>
                                                                <li class="socicons">
                                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-yt-bg socicon-youtube tooltips" data-original-title="Youtube"></a>
                                                                </li>
                                                            <?php break; default:?>
                                                                <li class="socicons">
                                                                    
                                                                </li>
                                                            <?php break; } ?>
                                                            
                                                        <?php }} ?>
                                                    </ul>
                                                </div>
                                                <!-- <h5 class="md-grey-text text-darken-1 font-22-xs">Employer</h5> -->
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Col-8 -->
                            <div class="portlet light my-0 m-grid-col m-grid-col-md-8 m-grid-col-sm-12 md-shadow-z-1 sharpcorner">
                                <div class="portlet-title tabbable-line tab-border-md-indigo">
                                    <ul class="nav nav-tabs pull-left">
                                        <li class="active">
                                            <a href="#tab_about_info" data-toggle="tab">About Company</a>
                                        </li>
                                        <li>
                                            <a href="#tab_add_info" data-toggle="tab">Additional Info </a>
                                        </li>
                                        <li>
                                            <a href="#tab_contact_info" data-toggle="tab">Contact Info </a>
                                        </li>
                                        <!-- <li>
                                                                    <a href="#tab_contact_info" data-toggle="tab">Contact Info </a>
                                                                </li> -->
                                    </ul>
                                    <div class="actions">
                                        <a href="#modal_edit_company" data-toggle="modal" class="btn btn-outline-md-indigo btn-circle">
                                            <i class="icon-pencil mr-2"></i>Edit Profile</a>
                                    </div>
                                </div>
                                <div class="portlet-body tab-content ">
                                    <div class="tab-pane active" id="tab_about_info">
                                        <div class="m-grid ">
                                            <div class="m-grid-col">
                                                <h5 class="md-indigo-text  font-weight-700 text-uppercase">About Company</h5> 
                                                <?php if (!empty($detail['company_description'])) {?>
                                                    <p class="text-justify"> <?php echo ucfirst($detail['company_description']); ?></p>
                                                <?php }else{ ?>      
                                                    <div class="portlet px-4 py-10 md-shadow-none bg-grey-cararra">
                                                        <div class="portlet-body text-center">
                                                            <i class="icon-note font-grey-mint font-40-xs mb-4"></i>
                                                            <h4 class="text-center font-weight-500 font-grey-mint">No Info</h4>
                                                            <h5 class="text-center  font-grey-cascade mt-1 text-none">Edit your info by clicking on "
                                                                <i class="icon-pencil"></i> Edit Profile"</h5>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane " id="tab_add_info">

                                        <div class="m-grid">

                                            <div class="m-grid-col">
                                                <dl style="margin-right: 8px;">
                                                    <dt class="font-20-xs md-grey-text font-weight-600 ">Spoken Language</dt>
                                                    <dd class="md-grey-text text-darken-3 font-weight-600 mb-3 ">
                                                        <?php echo !empty($detail['spoken_language']) ?  $detail['spoken_language'] : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>'; ?>
                                                    </dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Company Size</dt>
                                                    <dd class=" md-grey-text text-darken-3 font-weight-600 mb-3 "><?php echo !empty($detail['total_staff']) ? str_replace('-', ' to ', $detail['total_staff']).' People' : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>'; ?></dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Dress Code</dt>
                                                    <dd class="md-grey-text text-darken-3 font-weight-600 mb-3 "><?php echo !empty($dresscode) ? ucwords($dresscode) : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>' ?> </dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Benefit</dt>
                                                    <dd class="md-grey-text text-darken-3 font-weight-600 mb-3 "><?php echo !empty($detail['benefits']) ? $detail['benefits'] : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>'?></dd>
                                                </dl>
                                            </div>
                                            <div class="m-grid-col">
                                                <dl>
                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Industry</dt>
                                                    <dd class=" md-grey-text text-darken-3 font-weight-600 mb-3 "><?php echo !empty($detail['industry']) ? $detail['industry'] : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>'; ?></dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Working Hour</dt>
                                                    <dd class=" md-grey-text text-darken-3 font-weight-600 mb-3 ">
													<?php if(!empty($detail['working_days']) && $detail['working_days'] != " - "){?>
														<?php echo ucwords($detail['working_days']);?>
														<?php if(!empty($detail['working_hours']) && $detail['working_hours'] != " - "){?>
															( <?php echo $detail['working_hours'];?> )
														<?php }else{?>
															<h6 class="font-grey-cascade mt-1 text-none">Hour not set. Click " <i class="icon-pencil"></i> Edit Profile" button</h6>
														<?php }?>
													<?php }else{?>
														<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>
													<?php }?>
													</dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Company Website</dt>
                                                    <dd class=" md-grey-text text-darken-3 font-weight-600 mb-3 ">
                                                        <?php if(!empty($detail['url'])){?>
															<a href="<?php echo $detail['url']?>" target="_blank"><?php echo $detail['url']?></a>
														<?php }else{?>
															<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>
														<?php }?>
                                                    </dd>

                                                    <dt class=" font-20-xs md-grey-text font-weight-600 ">Company Email</dt>
                                                    <dd class=" md-grey-text text-darken-3 font-weight-600 mb-3 ">
                                                        <?php echo !empty($detail['email']) ? $detail['email'] : '<h6 class="font-grey-cascade mt-1 text-none">Edit your info by clicking on " <i class="icon-pencil"></i> Edit Profile" button</h6>'; ?>
                                                    </dd>
                                                </dl>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="tab-pane " id="tab_contact_info">
                                        <h4 class="font-weight-500">Contact Information</h4>
                                        <hr>
                                        <?php 
                                            $addr = json_decode($detail['address']); 
                                            if (!empty($addr)) { ?>
                                        <ul class="list-group list-border">
                                            
                                            <?php foreach ($addr as $key => $value) {?>
                                            <li class="list-group-item">

                                                <span class="label label-<?php echo ($value->optionsRadios=='HQ') ? 'md-orange' : 'md-indigo' ?>"><?php echo ($value->optionsRadios == 'HQ') ? 'Headquarter' : ucfirst($value->optionsRadios); ?></span>
												
												<?php
													$full_address = $value->building_address != ""?$value->building_address.", ":"";
													$full_address .= $value->building_city != ""?$value->building_city.", ":"";
													$full_address .= $value->building_postcode != ""?$value->building_postcode.", ":"";
													$full_address .= $value->building_state != ""?$value->building_state.", ":"";
													$full_address .= $value->building_country != ""?$value->building_country.", ":"";
													$full_address = $full_address != ""?substr($full_address, 0, -2):"";
												?>
                                                <h5 class="font-weight-500"><?php echo $full_address; ?></h5>
												
                                                <h5><i class="fa fa-envelope mr-2"></i> <?php echo $value->building_email; ?></h5>
                                                <h5>
                                                    <i class="fa fa-phone mr-2"></i> <?php echo $value->building_phone; ?></h5>
                                                <h5>
                                                    <i class="fa fa-fax mr-2"></i> <?php echo $value->building_fax; ?></h5>

                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php }else{ ?>
                                        <div class="portlet px-4 py-10 md-shadow-none bg-grey-cararra">
                                            <div class="portlet-body text-center">
                                                <i class="icon-note font-grey-mint font-40-xs mb-4"></i>
                                                <h4 class="text-center font-weight-500 font-grey-mint">No Info</h4>
                                                <h5 class="text-center  font-grey-cascade mt-1 text-none">Edit your info by clicking on "
                                                    <i class="icon-pencil"></i> Edit Profile"</h5>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- BEGIN MODAL : Edit Company Info -->
        <div class="modal fade modal-open-noscroll " id="modal_edit_company" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content portlet light ">
                    <div class="modal-header p-0">
                        <h4 class="modal-title">Edit Company Profile</h4>
                        <div class="portlet-title tabbable-line tabbable-tabdrop mb-0 ">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_edit_about" data-toggle="tab"> About Company</a>
                                </li>
                                <li>
                                    <a href="#tab_edit_add_info" data-toggle="tab">Additional Info </a>
                                </li>
                                <li>
                                    <a href="#tab_edit_contact_info" data-toggle="tab">Contact Info </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">

                        <!-- Tab Edit About  -->
                        <div class="tab-pane active form" id="tab_edit_about">
                            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_profile" class="form-horizontal form-row-seperated ">
                                <div class="modal-body form-body ">
                                    <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">

                                        <!-- Company Name -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Company Name</label>
                                            <div class="col-sm-9 ">
                                                <input type="text" class="form-control " name="company_name" placeholder="Your company name" value="<?php echo !empty($detail['company_name']) ? $detail['company_name'] : ''; ?>" required>
                                                <!--<span class="help-block small">Company Full Name </span>-->
                                            </div>
                                        </div>
										
										<!-- Company Email -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Company Email</label>
                                            <div class="col-sm-9 ">
                                                <input type="text" class="form-control " name="email" placeholder="your@company.com" value="<?php echo !empty($detail['email']) ? $detail['email'] : ''; ?>" required>
                                            </div>
                                        </div>

                                        <!-- Company Registration Number -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Company Registration Number</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control input-medium" name="company_registration_number" placeholder="012ABC-DEFGH34" value="<?php echo !empty($detail['company_registration_number']) ? $detail['company_registration_number'] : ''; ?>">
                                                <!-- <span class="help-block small"></span> -->
                                            </div>
                                        </div>
										
                                        <!-- Industry -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Industry</label>
                                            <div class="col-md-9">
                                                <select class="bs-select form-control" name="industry">
                                                    <option value="" selected disabled>Select one </option>
                                                    <?php foreach($industries as $value){?>
                                                        <option value="<?php echo $value['id'];?>" <?php echo ($value['id']== $detail['company_industry_id']) ? 'selected' : '' ?>><?php echo $value['name'];?></option>    
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!--About Company  -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">About Company</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control autosizeme" name="about_company" rows="4" placeholder="Summarize about your company."><?php echo !empty($detail['company_description']) ? $detail['company_description'] : ''; ?></textarea>
                                                <!-- <input type="text" class="form-control " placeholder="Summarize about your company"> -->
                                                <!-- <span class="help-block small">Company Full Name </span> -->
                                            </div>
                                        </div>

                                        <!-- Corporate Wesite -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Corporate Websites</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control input-xlarge" name="corporate_website" placeholder="Add link here" value="<?php echo !empty($detail['url']) ? $detail['url'] : ''; ?>">
                                            </div>
                                        </div>

                                        <!-- Social Account -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Social Account</label>
                                            <div class="col-md-9">
                                                <div class="mt-repeater">
                                                    <div data-repeater-list="group-b">
                                                        <?php if (!empty($social)) {
                                                          foreach ($social as $key => $value) {?>
                                                            <div data-repeater-item class="row mt-2">
                                                                <div class="col-md-6">
                                                                    <input type="text" placeholder="Add link to here" class="form-control" name="link" value="<?php echo $value['link']; ?>" /> </div>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="name">
                                                                        <option value="" selected disabled>Select account type </option>
                                                                        <option value="facebook" <?php echo ($value['name']=='facebook') ? 'selected' : '' ?>>Facebook</option>
                                                                        <option value="twitter" <?php echo ($value['name']=='twitter') ? 'selected' : '' ?>>Twitter</option>
                                                                        <option value="gplus" <?php echo ($value['name']=='gplus') ? 'selected' : '' ?>>Google Plus</option>
                                                                        <option value="linkedin" <?php echo ($value['name']=='linkedin') ? 'selected' : '' ?>>Linked In</option>
                                                                        <option value="instagram" <?php echo ($value['name']=='instagram') ? 'selected' : '' ?>>Instagram</option>
                                                                        <option value="youtube" <?php echo ($value['name']=='youtube') ? 'selected' : '' ?>>Youtube</option>
                                                                        <option value="snapchat" <?php echo ($value['name']=='snapchat') ? 'selected' : '' ?>>SnapChat</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="control-label">&nbsp;</label>
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm vertical-top">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } }else{ ?>
                                                            <div data-repeater-item class="row mt-2">
                                                                <div class="col-md-6">
                                                                    <input type="text" placeholder="Add link to here" class="form-control" name="link"/> </div>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" name="name">
                                                                        <option value="" selected disabled>Select account type </option>
                                                                        <option value="facebook" >Facebook</option>
                                                                        <option value="twitter"  >Twitter</option>
                                                                        <option value="gplus"    >Google Plus</option>
                                                                        <option value="linkedin" >Linked In</option>
                                                                        <option value="instagram">Instagram</option>
                                                                        <option value="youtube"  >Youtube</option>
                                                                        <option value="snapchat" >SnapChat</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="control-label">&nbsp;</label>
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm vertical-top">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <hr>
                                                    <a href="javascript:;" data-repeater-create class="btn btn-info btn-sm mt-repeater-add">
                                                        <i class="fa fa-plus"></i> Add another account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer form-action ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>

                        <!-- Tab Edit Add Info -->
                        <div class="tab-pane form" id="tab_edit_add_info">
                            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_additional_info" class="form-horizontal form-row-seperated">
                                <div class="modal-body form-body ">
                                    <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                        <!-- Company Size -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Company Size</label>
                                            <div class="col-md-9">
                                                <select class="bs-select form-control input-xlarge  " name="company_size">
                                                    <option value="">Select company size</option>
                                                    <option value="1-50" <?php echo ($user_profile['total_staff'] == '1-50') ? 'selected' : ''; ?>>1 to 50 employee</option>
                                                    <option value="51-100" <?php echo ($user_profile['total_staff'] == '51-100') ? 'selected' : ''; ?>>50 to 100 employee</option>
                                                    <option value="100<" <?php echo ($user_profile['total_staff'] == '100<') ? 'selected' : ''; ?>>100 to above employee</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Company Dress Code -->
                                        <div class="form-group form-md-checkboxes">
                                            <label class="control-label col-md-3 md-grey-text text-darken-3">Dress Code</label>
                                            <div class="col-md-9">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                    
                                                    <input type="checkbox" id="checkbox6" class="md-check" value="casual" name="dress[]" <?php foreach($dress_code as $key => $value) : echo ($value == 'casual') ? 'checked' : ''; endforeach; ?>>
                                                        <label for="checkbox6">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Casual Dress Code</label>
                                                    </div>
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox7" class="md-check" value="formal" name="dress[]" <?php foreach($dress_code as $key => $value) : echo ($value == 'formal') ? 'checked' : ''; endforeach; ?>>
                                                        <label for="checkbox7">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Formal Dress Code </label>
                                                    </div>
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox8" class="md-check" value="business" name="dress[]" <?php foreach($dress_code as $key => $value) : echo ($value == 'business') ? 'checked' : ''; endforeach; ?>>
                                                        <label for="checkbox8">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Business Casual Code </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <span class="help-block small"></span> -->
                                        </div>

                                        <!-- Working Hours -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Working Hour</label>
                                            <div class="col-md-9">
                                                <label for="">Day</label>
                                                <div class="m-grid">
                                                    <div class="m-grid-col m-grid-col-md-5">
                                                        <select class="bs-select form-control" name="day_start">
                                                            <option value="">Select Day Start</option>
                                                            <option value="monday" <?php echo ($working_days[0] == 'monday') ? 'selected' : '' ?>>Monday</option>
                                                            <option value="tuesday" <?php echo ($working_days[0] == 'tuesday') ? 'selected' : '' ?>>Tuesday</option>
                                                            <option value="wednesday" <?php echo ($working_days[0] == 'wednesday') ? 'selected' : '' ?>>Wednesday</option>
                                                            <option value="thursday" <?php echo ($working_days[0] == 'thursday') ? 'selected' : '' ?>>Thursday</option>
                                                            <option value="friday" <?php echo ($working_days[0] == 'friday') ? 'selected' : '' ?>>Friday</option>
                                                            <option value="saturday" <?php echo ($working_days[0] == 'saturday') ? 'selected' : '' ?>>Saturday</option>
                                                            <option value="sunday" <?php echo ($working_days[0] == 'sunday') ? 'selected' : '' ?>>Sunday</option>
                                                        </select>
                                                    </div>
                                                    <div class="m-grid-col m-grid-col-md-2 m-grid-col-center">
                                                        <h5>to</h5>
                                                    </div>
                                                    <div class="m-grid-col m-grid-col-md-5">
                                                        <select class="bs-select form-control" name="day_end">
                                                            <option value="">Select Day End</option>
                                                            <option value="monday" <?php echo ($working_days[1] == 'monday') ? 'selected' : '' ?>>Monday</option>
                                                            <option value="tuesday" <?php echo ($working_days[1] == 'tuesday') ? 'selected' : '' ?>>Tuesday</option>
                                                            <option value="wednesday" <?php echo ($working_days[1] == 'wednesday') ? 'selected' : '' ?>>Wednesday</option>
                                                            <option value="thursday" <?php echo ($working_days[1] == 'thursday') ? 'selected' : '' ?>>Thursday</option>
                                                            <option value="friday" <?php echo ($working_days[1] == 'friday') ? 'selected' : '' ?>>Friday</option>
                                                            <option value="saturday" <?php echo ($working_days[1] == 'saturday') ? 'selected' : '' ?>>Saturday</option>
                                                            <option value="sunday" <?php echo ($working_days[0] == 'sunday') ? 'selected' : '' ?>>Sunday</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <label for="">Time</label>
                                                <div class="m-grid">
                                                    <!-- Start Time -->
                                                    <div class="m-grid-col m-grid-col-md-5">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" placeholder="Start At" name="work_hour_start" value="<?php echo !empty($working_hours[0]) ? $working_hours[0] : '' ?>">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-clock-o"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-grid-col m-grid-col-md-2 m-grid-col-center">
                                                        <h5>until</h5>
                                                    </div>
                                                    <!-- End Time -->
                                                    <div class="m-grid-col m-grid-col-md-5">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control timepicker timepicker-no-seconds" placeholder="End At" name="work_hour_end" value="<?php echo !empty($working_hours[1]) ? $working_hours[1] : '' ?>">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-clock-o"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!--Spoken Language-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Spoken Language</label>
                                            <div class="col-md-9">
                                                <select class="bs-select form-control " multiple name="language[]" id="spoken_language">
                                                <?php foreach ($language as $key => $value) {?>
                                                    <?php foreach ($spoken_language as $spoken_key => $spoken_value) {?>
                                                        <option <?php echo ($spoken_value == $value['name']) ? 'selected' : '' ?>><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Benefits -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3"> Benefits</label>
                                            <div class="col-md-9">
                                                <textarea class="autosizeme form-control" rows="3" placeholder="Annual Leaves , Allowances , Medicalfee , Dental Fee ,Annual Trip" name="benefits"><?php echo !empty($user_profile['benefits']) ? $user_profile['benefits'] : ''; ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer form-actions ">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane form " id="tab_edit_contact_info">
                            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_contact_info"  class="form-horizontal">
                                <div class="modal-body form-body">
                                    <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                        <div class="mt-repeater">
                                            <div data-repeater-list="contact_info">
                                                <?php if (!empty($company_address)) {
                                                foreach ($company_address as $key => $value) { ?>
                                                <div data-repeater-item class="mt-repeater-item">
                                                    <!-- Address -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">Address</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" placeholder="  Unit / Lot , Road ," name="building_address" value="<?php echo $value->building_address; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- City & State-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <label class="control-label col-md-4">City</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control " name="building_city" value="<?php echo $value->building_city; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <label class="control-label col-md-4">State</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="building_state" value="<?php echo $value->building_state; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Postcode & Country -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Postcode</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="Postcode" name="building_postcode" value="<?php echo $value->building_postcode; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <!-- <label class="control-label">Country</label> -->
                                                                <label class="control-label col-md-4">Country</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-control " name="building_country">
                                                                        <option value="" disabled>Select one </option>
                                                                        <?php foreach ($countries as $key => $country_value) { ?>
                                                                            <option <?php ($value->building_country == $country_value['name']) ? 'selected' : ''; ?>><?php echo $country_value['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Latitude</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="building_latitude" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_latitude; ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Longititude</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" name="building_longitude" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_longitude; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Phone Number</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="building_phone" value="<?php echo $value->building_phone; ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Fax Number</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="building_fax" value="<?php echo $value->building_fax; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Office Type and Remove Button -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Office Type</label>
                                                                <div class="col-md-8">
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="HQ" <?php echo ($value->optionsRadios=='HQ') ? 'checked' : '' ?> name="HQ"> Headquarter
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="branch" name="branch" <?php echo ($value->optionsRadios=='branch') ? 'checked' : '' ?>> Branch
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Email Address</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control input-large" placeholder="hello@xremo.com" name="building_email" value="<?php echo $value->building_email; ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row mx-0">
                                                        <div class="mt-width-300-xs">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-block">
                                                                <i class="fa fa-close"></i> Remove
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } }else{ ?>
                                                <div data-repeater-item class="mt-repeater-item">
                                                    <!-- Address -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">Address</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="building_address" placeholder="Unit / Lot , Road ," required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- City & State-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <label class="control-label col-md-4">City</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="building_city" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <label class="control-label col-md-4">State</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="building_state" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Postcode & Country -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Postcode</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="Postcode" name="building_postcode" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <!-- <label class="control-label">Country</label> -->
                                                                <label class="control-label col-md-4">Country</label>
                                                                <div class="col-md-8">
                                                                    <select class="form-control " name="building_country">
                                                                        <option value="" selected disabled>Select one </option>
                                                                        <?php foreach ($countries as $key => $country_value) { ?>
                                                                            <option><?php echo $country_value['name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Latitude</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="1.643604 " name="building_latitude">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Longititude</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="1.955566" name="building_longitude">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Phone Number</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="building_phone" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Fax Number</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="building_fax" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Office Type and Remove Button -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Office Type</label>
                                                                <div class="col-md-8">
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="HQ" name="HQ" checked="checked"> Headquarter
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="branch" name="branch"> Branch
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">Email Address</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control input-large" placeholder="hello@xremo.com" name="building_email">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row mx-0">
                                                        <div class="mt-width-300-xs">
                                                            <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-block">
                                                                <i class="fa fa-close"></i> Remove
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <a href="javascript:;" data-repeater-create class="btn btn-info  mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add new office</a>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer form-actions">
                                    <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END MODAL : Edit Company Info -->

        <!-- BEGIN MODAL : Edit Default Picture -->
        <div class="modal fade modal-open-noscroll modal-open" id="modal_edit_default_picture" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Default Picture</h4>
                    </div>
                    <form action="<?php echo base_url(); ?>employer/profile/upload_company_logo" method="POST" class=" form form-horizontal  form-bordered form-row-stripped " enctype="multipart/form-data">
                        <div class="modal-body form-body">
                            <div class="form-group ">
                                <label class="control-label col-md-3">Image Upload #1</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 500px; height: 300px;"> </div>
                                        <div>
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="company_logo"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                    <div class="clearfix mt-3">
                                        <span class="label label-success">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer form-actions">
                            <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                            <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                        </div>
                    </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END MODAL : Edit Default Picture -->

        <!-- BEGIN MODAL : Edit Header Picture -->
        <div class="modal fade modal-open-noscroll " id="modal_edit_header_picture" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Header Picture</h4>
                    </div>
                    <form action="<?php echo base_url(); ?>employer/profile/upload_company_header" method="POST" class=" form form-horizontal  form-bordered form-row-stripped " enctype="multipart/form-data">
                        <div class="modal-body form-body">

                            <div class="form-group ">
                                <label class="control-label col-md-3">Image Upload #1</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 500px; height: 300px;"> </div>
                                        <div>
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="company_header"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                    <div class="clearfix mt-3">
                                        <span class="label label-success">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-actions">
                            <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                            <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                        </div>
                    </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END MODAL : Edit Header Picture -->
