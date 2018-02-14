<?php $pic = !empty($settings->contact_person) ? json_decode($settings->contact_person) : ''; ?>

<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper ">
        <div class="page-content">

            <h1 class="page-title">Settings
                <small>Set up your settings in here</small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Settings</span>

                    </li>
                </ul>

            </div>

            <div class="row">
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable mb-2 menu-md-indigo">
                        <li class="active">
                            <a data-toggle="tab" href="#tab_account">
                                <i class="fa fa-user"></i> Account </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab_payment">
                                <i class="icon-wallet"></i> Payment</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#tab_privacy">
                                <i class="fa fa-eye"></i> Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- tab Account -->
                        <div class="tab-pane active" id="tab_account">
                            <div class="panel  panel-borderless panel-transparent" style="background-color: transparent;">
                                <div class="panel-heading" style="background-color: transparent;">
                                    <h4 class="panel-title font-40-xs">
                                        My Account
                                    </h4>
                                </div>
                                <hr class="border-grey-silver my-2  ">
                                <div class="panel-body">
                                    <!-- Company Name -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#modal_edit_company_name" data-toggle="modal" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-600 roboto-font font-20-xs mt-0 md-indigo-text">Company Name</h5>
                                            <h4 class="mt-1 font-weight-400 roboto-font"><?php echo !empty($settings) ? $settings->company_name : 'Xremo Sdn Bhd'; ?> </h4>
                                        </div>

                                    </div>
                                    <!-- Email Address -->
                                    <div class="media">
                                        <div class="pull-right hidden">
                                            <a href="" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text"> Email Address</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400"><?php echo !empty($settings) ? $settings->email : 'info@xremo.com'; ?> </h4>

                                        </div>

                                    </div>
                                    <!-- Person in charge -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#modal_edit_person_in_charge" data-toggle="modal" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Person In Charge</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400"><?php echo !empty($pic->pic_name) ? $pic->pic_name: 'Xremo Sdn Bhd'; ?> </h4>

                                            <h4>
                                                <small>
                                                    <i class="icon-briefcase mr-2"></i><?php echo !empty($pic->pic_position) ? $pic->pic_position: 'HR Department'; ?></small>
                                                <i class="fa fa-circle font-10-xs vertical-middle font-grey-gallery"></i>
                                                <small>
                                                    <i class="icon-envelope mr-2"></i><?php echo !empty($pic->pic_email) ? $pic->pic_email: 'cs@xremo.com'; ?></small>
                                            </h4>
                                        </div>

                                    </div>
                                    <!-- Change Password -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#modal_edit_password" data-toggle="modal" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Change Password</h5>
                                            <!-- <h4 class="mt-1  roboto-font font-weight-400">Nick Aaron </h4> -->

                                            <h4 hidden>
                                                <small>
                                                    <i class="icon-briefcase mr-2"></i>Administrative Manager</small>
                                                <i class="fa fa-circle font-10-xs vertical-middle font-grey-gallery"></i>
                                                <small>
                                                    <i class="icon-envelope mr-2"></i>nick_aaron@xremo.com</small>
                                            </h4>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="panel-group accordion accordion-icon accordion-border-bottom-orange noborder hidden" id="accordion3">
                                <div class="panel panel-borderless panel-transparent">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle toggle-angle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="true">Person In charge</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_1" class="panel-collapse  ">
                                        <div class="panel-body">
                                            <div class="media">
                                                <div class="pull-right">
                                                    <a href="" class="font-grey-gallery pull-right">Change</a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="font-weight-600 mt-0">Nick Aaron</h4>
                                                    <h5>Administrative Manager</h5>
                                                    <h5>nick_aaron@xremo.com</h5>
                                                </div>
                                            </div>
                                            <form action="" class="form form-horizontal">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <div class="panel  panel-borderless panel-transparent">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle toggle-angle collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> Change Password</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_2" class="panel-collapse collapse panel-transparent">
                                        <div class="panel-body">
                                            <form action="" class="form form-horizontal">
                                                <!-- <div class="form-body"> -->
                                                <div class="form-group">
                                                    <label for="" class="col-md-4 control-label">New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control input-large">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="col-md-4 control-label">Confirm New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control input-large">
                                                    </div>
                                                </div>
                                                <!-- <div class="pull-right"> -->
                                                <div class="col-md-4 pull-right">
                                                    <a href="" class="btn btn-md-cyan">Submit</a>
                                                    <!-- </div> -->
                                                </div>
                                                <!-- </div> -->
                                                <!-- <div class="form-actions">
                                                            </div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <div class="panel  panel-borderless panel-transparent">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle toggle-angle collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> Change Company Name</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_3" class="panel-collapse collapse panel-transparent">
                                        <div class="panel-body">
                                            <div class="media">
                                                <div class="pull-right">
                                                    <a href="" class="font-grey-gallery">Change</a>
                                                </div>
                                                <div class="media-body">
                                                    <h4>Xremo Sdn Bhd</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- tab payment -->
                        <div class="tab-pane" id="tab_payment">
                            <div class="panel  panel-borderless panel-transparent">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-40-xs">
                                        Payment
                                    </h4>
                                </div>
                                <hr class="border-grey-silver my-2  ">
                                <div class="panel-body">
                                    <!-- Shipping Address -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#modal_edit_payment_address" data-toggle="modal" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Shipping Address</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400"><?php echo !empty($settings->shipping_name) ? $settings->shipping_name : 'Please edit your shipping company name'; ?> </h4>
                                            <h4>
                                                <small>GST No : <?php echo !empty($settings->gst_account_number) ? $settings->gst_account_number : 'Please Edit your profile'; ?></small>
                                            </h4>
                                            <h4>
                                                <?php
                                                    $full_address = $settings->shipping_address != ""?$settings->shipping_address.", ":"";
                                                    $full_address .= $settings->shipping_city != ""?$settings->shipping_city.", ":"";
                                                    $full_address .= $settings->shipping_postcode != ""?$settings->shipping_postcode.", ":"";
                                                    $full_address .= $settings->shipping_state != ""?$settings->shipping_state.", ":"";
                                                    $full_address .= $settings->shipping_country != ""?$settings->shipping_country.", ":"";
                                                    $full_address = $full_address != ""?substr($full_address, 0, -2):"";
                                                ?>
                                                <small>
                                                    <i class="icon-pointer mr-2"></i><?php echo $full_address != "" ? $full_address : 'Please edit your shipping address'; ?></small>
                                                <h5>
                                                    <i class="fa fa-phone mr-2"></i> <?=$settings->shipping_phone != ""?$settings->shipping_phone:"Not provided"; ?></h5>
                                                <h5>
                                                    <i class="fa fa-fax mr-2"></i> <?=$settings->shipping_fax != ""?$settings->shipping_fax:"Not provided"; ?></h5>
                                            </h4>
                                        </div>

                                    </div>
                                    <!-- Billing Address -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#modal_edit_payment_address" data-toggle="modal" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Billing Address</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400"><?php echo !empty($settings->billing_name) ? $settings->billing_name : 'Please edit your billing company name'; ?> </h4>
                                            <h4>
                                                <small>GST No : <?php echo !empty($settings->gst_account_number) ? $settings->gst_account_number : 'Please Edit your profile'; ?></small>
                                            </h4>
                                            <h4>
                                                <?php
                                                    $full_address = $settings->billing_address != ""?$settings->billing_address.", ":"";
                                                    $full_address .= $settings->billing_city != ""?$settings->billing_city.", ":"";
                                                    $full_address .= $settings->billing_postcode != ""?$settings->billing_postcode.", ":"";
                                                    $full_address .= $settings->billing_state != ""?$settings->billing_state.", ":"";
                                                    $full_address .= $settings->billing_country != ""?$settings->billing_country.", ":"";
                                                    $full_address = $full_address != ""?substr($full_address, 0, -2):"";
                                                ?>
                                                <small>
                                                    <i class="icon-pointer mr-2"></i><?php echo $full_address != "" ? $full_address : 'Please edit your billing address'; ?></small>
                                                <h5>
                                                    <i class="fa fa-phone mr-2"></i> <?=$settings->billing_phone != ""?$settings->billing_phone:"Not provided"; ?></h5>
                                                <h5>
                                                    <i class="fa fa-fax mr-2"></i> <?=$settings->billing_fax != ""?$settings->billing_fax:"Not provided"; ?></h5>
                                            </h4>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- tab privacy -->
                        <div class="tab-pane" id="tab_privacy">
                            <div class="panel  panel-borderless panel-transparent">
                                <div class="panel-heading">
                                    <h4 class="panel-title font-40-xs">
                                        Privacy
                                    </h4>
                                </div>
                                <hr class="border-grey-silver my-2  ">
                                <div class="panel-body">
                                    <form action="">
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" id="searchable" <?php echo ($settings->searchable == 1) ? 'checked=checked' : ''; ?>>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>
                                                        Allow guests to search for my company profile.
                                                    </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" id="searchable_detail" <?php echo ($settings->searchable_detail == 1) ? 'checked=checked' : ''; ?>>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to registered users</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>
                                                        Allow registered users to search for my company profile.
                                                    </small>
                                                </h4>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Name -->
            <div class="modal fade in" id="modal_edit_company_name" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h4>Change Company Name </h4>
                        </div>
                        <form action="<?php echo base_url(); ?>employer/settings/change_company_name" method="POST" class=" form form-horizontal">
                            <div class="modal-body form-horizontal">

                                <div class="form-group mx-0">
                                    <label for="">Company Name</label>
                                    <input type="text" class="form-control " name="company_name" value="<?php echo !empty($settings) ? $settings->company_name : 'Xremo Sdn Bhd'; ?>">
                                </div>
                            </div>
                            <div class=" modal-footer">
                                <a href="" data-dismiss="modal" class="btn btn-default btn-outline"> Close</a>
                                <button type="submit" class="btn btn-md-indigo">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Name -->
            <div class="modal fade in" id="modal_edit_person_in_charge" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h4>Change Person in charge </h4>
                        </div>
                        <form action="<?php echo base_url(); ?>employer/settings/change_person_in_charge" method="POST" class=" form form-horizontal">
                            <div class="modal-body form-body">

                                <div class="form-group mx-0">
                                    <label class="control-label ">Full Name</label>
                                    <input type="text" name="pic_name" class="form-control" placeholder="Nick Aaron " value="<?php echo !empty($pic->pic_name) ? $pic->pic_name: 'Xremo Sdn Bhd'; ?>">
                                </div>
                                <div class="form-group mx-0">
                                    <label class="control-label ">Position </label>
                                    <input type="text" name="pic_position" class="form-control" placeholder="HR " value="<?php echo !empty($pic->pic_position) ? $pic->pic_position: 'HR Department'; ?>">
                                </div>
                                <div class="form-group mx-0">
                                    <label class="control-label ">Email Address</label>
                                    <input type="email" name="pic_email" class="form-control" placeholder="nick@email.com " value="<?php echo !empty($pic->pic_email) ? $pic->pic_email: 'cs@xremo.com'; ?>">
                                </div>

                            </div>
                            <div class=" modal-footer">
                                <a href="" data-dismiss="modal" class="btn btn-default btn-outline"> Close</a>
                                <button type="submit" class="btn btn-md-indigo">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Password -->
            <div class="modal fade in" id="modal_edit_password" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h4>Change Password </h4>
                        </div>
                        <form action="<?php echo base_url(); ?>employer/change_password" method="POST" class=" form form-horizontal">
                            <div class="modal-body form-horizontal">

                                <div class="form-group mx-0">
                                    <label for="">New Password</label>
                                    <input type="password" class="pass-strength-employer-setting form-control " name="password">
                                </div>
                                <!-- Input : Password -->
                                <div class="form-group  mx-0 password-strength-bar-employer-setting" style="display:none;">
                                    <!--<div class="col-md-8 col-md-offset-2  ">-->
                                        <div class="progress progress-striped active mb-0">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-label="Poor" style="width: 0%">
                                            <span class="sr-only">0% CompletePoor</span>
                                          </div>
                                        </div>
                                    <!--</div>-->
                                </div>
                                <div class="form-group mx-0">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" class="form-control " name="conf_password">
                                </div>
                            </div>
                            <div class=" modal-footer">
                                <a href="" data-dismiss="modal" class="btn btn-default btn-outline"> Close</a>
                                <button type="submit" class="btn btn-md-indigo">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- BEGIN MODAL : Edit Payment Address -->
            <div class="modal fade modal-open-noscroll " id="modal_edit_payment_address" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Shipping and Billing Address</h4>
                        </div>

                        <form action="<?php echo base_url(); ?>employer/settings/billing_shipping_address" method="POST" class="form-horizontal">
                            <div class="modal-body form-body">
                                <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                    <div class="shipping-address">
                                        <!-- Shipping Address -->
                                        <h4 class="form-section">Shipping Address</h4>
                                        <hr>
                                        <!-- Company Name -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Company name</label>
                                                    <input type="text" name="shipping-company" class="form-control" placeholder="Xremo Sdn Bhd" value="<?php echo !empty($settings->shipping_name) ? $settings->shipping_name : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-8">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Address</label>
                                                    <input type="text" name="shipping-address" class="form-control" placeholder="Unit / Lot , Road ," value="<?php echo !empty($settings->shipping_address) ? $settings->shipping_address : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Postcode / City / State-->
                                        <div class="row">
                                            <!-- Postcode -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Postcode</label>
                                                    <input type="text" name="shipping-postcode" class="form-control" placeholder="Postcode" value="<?php echo !empty($settings->shipping_postcode) ? $settings->shipping_postcode : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- City -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">City</label>
                                                    <input type="text" name="shipping-city" class="form-control" value="<?php echo !empty($settings->shipping_city) ? $settings->shipping_city : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- State -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">State</label>
                                                    <input type="text" name="shipping-state" class="form-control" value="<?php echo !empty($settings->shipping_state) ? $settings->shipping_state : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Country / Phone Number / Fax Number -->
                                        <div class="row">
                                            <!-- Country  -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Country</label>
                                                    <select name="shipping-country" class="form-control" >
                                                            <option disabled selected>- Select Country -</option>
                                                        <?php foreach ($country as $key => $value): ?>
                                                            <option <?php echo ($settings->shipping_country == $value['name']) ? 'selected' : '' ?>><?php echo $value['name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Phone Number -->
                                            <div class="col-md-4 ">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" name="shipping-phone" class="form-control" placeholder="Phone Number" value="<?php echo !empty($settings->shipping_phone) ? $settings->shipping_phone : '12345'; ?>">
                                                </div>
                                            </div>
                                            <!-- Fax Number -->
                                            <div class="col-md-4 ">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Fax Number</label>
                                                    <input type="text" name="shipping-fax" class="form-control" placeholder="Fax Number" value="<?php echo !empty($settings->shipping_fax) ? $settings->shipping_fax : ''; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CheckBox -->
                                        <!-- Note : @If checkbox selected , Shipping Form will hide @else default show -->
                                        <div class="form-group mx-0">
                                            <div class="col-md-8 ">
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="billing_same_with_shipping" id="checkboxShipping"> My shipping and billing information is the same.
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="billing-address">
                                        <!-- Billing Address -->
                                        <h4 class="form-section">Billing Address</h4>
                                        <hr>
                                        <!-- Company Name -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Company name</label>
                                                    <input type="text" name="billing-company" class="form-control billing-input" placeholder="Xremo Sdn Bhd" value="<?php echo !empty($settings->billing_name) ? $settings->billing_name : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-8">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">Address</label>
                                                    <input type="text" name="billing-address" class="form-control billing-input" placeholder="Unit / Lot , Road ," value="<?php echo !empty($settings->billing_address) ? $settings->billing_address : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Postcode / City / State-->
                                        <div class="row">
                                            <!-- Postcode -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Postcode</label>
                                                    <input type="text" name="billing-postcode" class="form-control billing-input" placeholder="Postcode" value="<?php echo !empty($settings->billing_postcode) ? $settings->billing_postcode : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- City -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label ">City</label>
                                                    <input type="text" name="billing-city" class="form-control billing-input" value="<?php echo !empty($settings->billing_city) ? $settings->billing_city : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- State -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">State</label>
                                                    <input type="text" name="billing-state" class="form-control billing-input"  value="<?php echo !empty($settings->billing_state) ? $settings->billing_state : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Country / Phone Number / Fax Number -->
                                        <div class="row">
                                            <!-- Country  -->
                                            <div class="col-md-4">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Country</label>
                                                    <select class="form-control billing-input" name="billing-country" >
                                                        <option disabled selected>- Select Country -</option>
                                                        <?php foreach ($country as $key => $value): ?>
                                                            <option <?php echo ($settings->billing_country == $value['name']) ? 'selected' : '' ?>><?php echo $value['name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Phone Number -->
                                            <div class="col-md-4 ">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" name="billing-phone" class="form-control billing-input" placeholder="Phone Number" value="<?php echo !empty($settings->billing_phone) ? $settings->billing_phone : ''; ?>">
                                                </div>
                                            </div>
                                            <!-- Fax Number -->
                                            <div class="col-md-4 ">
                                                <div class="form-group mx-0">
                                                    <label class="control-label">Fax Number</label>
                                                    <input type="text" name="billing-fax" class="form-control billing-input" placeholder="Fax Number" value="<?php echo !empty($settings->billing_fax) ? $settings->billing_fax : ''; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer form-actions">
                                <button type="submit" class="btn btn-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Save</button>
                                <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline-md-indigo  mt-width-150-xs font-20-xs letter-space-xs">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- END MODAL : Edit Payment Info -->

        </div>

    </div>
    <!-- END CONTAINER -->