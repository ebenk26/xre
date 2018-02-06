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
                                            <a href="" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Shipping Address</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4>
                                            <h4>
                                                <small>GST No : 0123456788912</small>
                                            </h4>
                                            <h4>
                                                <small>
                                                    <i class="icon-pointer mr-2"></i>No.30 , Jln Kampung Baru 3/7a, Kampung Baru, 41203, Kuala Lumpur.</small>
                                            </h4>
                                        </div>

                                    </div>
                                    <!-- Billing Address -->
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="" class="font-grey-gallery">Change</a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Billing Address</h5>
                                            <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4>
                                            <h4>
                                                <small>GST No : 0123456788912</small>
                                            </h4>
                                            <h4>
                                                <small>
                                                    <i class="icon-pointer mr-2"></i>No.30 , Jln Kampung Baru 3/7a, Kampung Baru, 41203, Kuala Lumpur.</small>
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
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="pull-right">
                                                <input type="checkbox" checked class="make-switch" data-size="mini">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Set your company profile to public</h5>
                                                <!-- <h4 class="mt-1  roboto-font font-weight-400">Xremo Sdn Bhd </h4> -->
                                                <h4>
                                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ornare lacus. Proin eros nisl, pharetra et euismod vitae, dapibus nec libero.
                                                        Proin dictum pulvinar volutpat. </small>
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
                                    <input type="text" class="form-control " name="company_name">
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
                                    <input type="password" class="form-control " name="password">
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

        </div>

    </div>
    <!-- END CONTAINER -->