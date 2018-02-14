<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper ">
            <div class="page-content">
                <h1 class="page-title">Settings
                    <small>Here a little bit about yourself</small>
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

                <!-- Tab Content : Account & Privacy  -->
                <div class="row">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable mb-2 menu-md-indigo">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_account">
                                    <i class="fa fa-user"></i> Account </a>
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
                                <div class="panel  panel-borderless panel-transparent">
                                    <div class="panel-heading">
                                        <h4 class="panel-title font-40-xs">
                                            My Account
                                        </h4>
                                    </div>
                                    <hr class="border-grey-silver my-2  ">
                                    <div class="panel-body">
                                        <!-- Full Name -->
                                        <div class="media">
                                            <div class="pull-right">
                                                <a href="#modal_edit_fullname" data-toggle="modal" class="font-grey-gallery">Change</a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-600 roboto-font font-20-xs mt-0 md-indigo-text">Full Name</h5>
                                                <h4 class="mt-1 font-weight-400 roboto-font"><?php echo !empty($user->fullname) ? $user->fullname : 'Please Edit your profile'; ?> </h4>
                                            </div>

                                        </div>
                                        <!-- Email Address -->
                                        <div class="media">
                                            <div class="pull-right hidden">
                                                <a href="" class="font-grey-gallery">Change</a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text"> Email Address</h5>
                                                <h4 class="mt-1  roboto-font font-weight-400"> <?php echo !empty($user->email) ? $user->email : 'Please Edit your profile'; ?></h4>
                                            </div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="media">
                                            <div class="pull-right ">
                                                <a href="#modal_edit_phonenumber" data-toggle="modal" class="font-grey-gallery">Change</a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Phone Number</h5>
                                                <h4 class="mt-1  roboto-font font-weight-400"> <?php echo isset($user_bios->contact_number) ? $user_bios->contact_number : 'Please Edit your profile' ; ?></h4>
                                            </div>
                                        </div>


                                        <!-- Change Password -->
                                        <div class="media">
                                            <div class="pull-right">
                                                <a href="#modal_edit_password" data-toggle="modal" class="font-grey-gallery">Change</a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Change Password</h5>
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
                                        <div class="media" id="searchable_content">
                                            <div class="pull-right">
                                                <input type="checkbox" id="searchable" <?php echo (isset($user_bios->searchable) && $user_bios->searchable == 1) ? 'checked=checked' : ''; ?>>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text"> Not Searchable</h5>
                                                <h4>
                                                    <small>
                                                        Do not allow employers to search for my profile.
                                                    </small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="media <?php echo (isset($user_bios->searchable) && $user_bios->searchable == 1) ? 'hidden' : ''; ?>" id="searchable_detail_content">
                                            <div class="pull-right">
                                                <input type="checkbox" id="searchable_detail" <?php echo (isset($user_bios->searchable_detail) && $user_bios->searchable_detail == 1) ? 'checked=checked' : ''; ?>>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="text-uppercase font-weight-700 roboto-font font-20-xs mt-0 md-indigo-text">Searchable with Contact Details</h5>
                                                <h4>
                                                    <small>
                                                        Allow Employers to search for my profile, see my name and contact details.
                                                    </small>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Full Name -->
                <div class="modal fade in" id="modal_edit_fullname" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4>Edit Full Name </h4>
                            </div>
                            <form action="<?php echo base_url(); ?>student/settings/change_fullname" class=" form form-horizontal" method="POST">
                                <div class="modal-body form-horizontal">

                                    <div class="form-group mx-0">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control " name="fullname" value="<?php echo $user->fullname; ?>">
                                    </div>
                                    <!-- <div class="form-actions"> -->
                                </div>
                                <div class=" modal-footer">
                                    <a href="" data-dismiss="modal" class="btn btn-default btn-outline"> Close</a>
                                    <button type="submit" class="btn btn-md-indigo">Save</button>
                                    <!-- </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Phone Number -->
                <div class="modal fade in" id="modal_edit_phonenumber" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h4>Edit Phone Number </h4>
                            </div>
                            <form action="<?php echo base_url(); ?>student/settings/change_phone_number" class=" form form-horizontal" method="POST">
                                <div class="modal-body form-horizontal">

                                    <div class="form-group mx-0">
                                        <label for="">Phone Number</label>
                                        <div class="form-inline">
                                            <div class="input-group">
                                                <input type="text" name="contact_number" class="form-control " value="<?php echo isset($user_bios->contact_number) ? $user_bios->contact_number: 'Please Edit your profile'; ?>">
                                            </div>

                                        </div>
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
                            <form action="<?php echo base_url(); ?>student/change_password" method="POST" class=" form form-horizontal">
                                <div class="modal-body form-horizontal">

                                    <div class="form-group mx-0">
                                        <label for="">New Password</label>
                                        <input type="password" name="password" class="pass-strength-student-setting form-control " value="" required>
                                    </div>
                                    <!-- Input : Password -->
                                    <div class="form-group  mx-0 password-strength-bar-student-setting" style="display:none;">
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
                                        <input type="password" name="conf_password" class="form-control " value="" required>
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