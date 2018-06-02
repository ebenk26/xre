<!-- BEGIN CONTENT -->
<div class="page-content-wrapper ">
    <div class="page-content">
        <h1 class="page-title">Settings
            <small>Here a little bit about yourself</small>
        </h1>
        <!-- <div class="page-bar">
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

                </div> -->

        <!-- Tab Content : Account & Privacy  -->
        <div class="row">
            <div class="col-md-3">
                <ul class="ver-inline-menu tabbable mb-10 menu-md-indigo">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_account">
                            <i class="fa fa-user"></i> Account </a>
                    </li>
                    <!-- Job Preferences -->
                    <li>
                        <a data-toggle="tab" href="#tab_job">
                            <i class="fa fa-briefcase"></i> Job Preferences </a>
                    </li>
                    <!-- Privacy -->
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
                                <h4 class="panel-title font-30">
                                    My Account
                                </h4>
                            </div>
                            <hr class="border-grey-silver my-10  ">
                            <div class="panel-body">
                                <!-- Full Name -->
                                <div class="media">
                                    <div class="pull-right">
                                        <a href="#modal_edit_fullname" data-toggle="modal" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 mt-0 md-indigo-text">Full Name</h5>
                                        <h4 class="roboto-font">
                                            <?php echo !empty($user->fullname) ? $user->fullname : 'Please Edit your profile'; ?> </h4>
                                    </div>

                                </div>
                                <!-- Email Address -->
                                <div class="media">
                                    <div class="pull-right hidden">
                                        <a href="" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 mt-0 md-indigo-text">Email Address</h5>
                                        <h4 class="roboto-font">
                                            <?php echo !empty($user->email) ? $user->email : 'Please Edit your profile'; ?>
                                        </h4>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="#modal_edit_phonenumber" data-toggle="modal" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 mt-0 md-indigo-text">Phone Number</h5>
                                        <h4 class="roboto-font">
                                            <?php echo isset($user_bios->contact_number) ? $user_bios->contact_number : 'Please Edit your profile' ; ?>
                                        </h4>
                                    </div>
                                </div>


                                <!-- Change Password -->
                                <div class="media">
                                    <div class="pull-right">
                                        <a href="#modal_edit_password" data-toggle="modal" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 mt-0 md-indigo-text">Change Password</h5>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Tab Job Preferences -->
                    <div class="tab-pane" id="tab_job">
                        <div class="panel  panel-borderless panel-transparent">
                            <div class="panel-heading">
                                <h4 class="panel-title font-26 font-weight-400">
                                    My Job Preferences
                                </h4>
                            </div>
                            <hr class="border-grey-silver my-10">
                            <div class="panel-body">
                                <div class="well">
                                    <p>Note : Attribute </p>
                                    <ol>
                                        <li>
                                            <b>Keyword </b>- Find skill ,job post title( job name) and other keyword </li>
                                        <li>
                                            <b>Location </b> - Specific to state and city based user reg ip (p/s if we include country it might too big for us to handle </li>
                                        <li>
                                            <b>Position Level </b> - use exist data</li>
                                        <li>
                                            <b>Specialization </b>- extract data from industry list , and we cannot provide a detail list of specialization(job position in industry) exist in this industy </li>
                                        <li>
                                            <b>Qualification </b> - issue how to find it in search job , unless system can detect certain keyword in job description or we can ignore it first </li>
                                        <li>
                                            <b>Field of study </b>- same thing like 'Qualifications'</li>
                                        <li>
                                            <b>Years of experience </b> - use exist data </li>
                                    </ol>
                                </div>
                                <div class="media">
                                    <div class="pull-right">
                                        <a href="#modal_edit_job_preferences" data-toggle="modal" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <!-- Keyword -->

                                        <!--Note : Random Arrangement And badge color also random  , extract from student profile.php  -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs mt-0 md-indigo-text">Keyword</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                        <!-- Location -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Location</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Selangor</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Subang Jaya </span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">City </span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">State</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                        <!-- Specialization -->
                                        <!-- Note :  Please extract from existing list of industry -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Specialization</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                        <!-- Job Type -->
                                        <!-- Note :  Please extract from existing list-->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Job Type</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Internship</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Contract</span>
                                            </li>
                                        </ul>

                                        <!-- Position Level -->
                                        <!-- Note :  Please extract from existing list -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Position Level</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                        <!-- Years Of Experience -->
                                        <!-- Note :  Please extract from existing list of Year of expereince in job post employer side-->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Years Of Experience</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>



                                        <!-- Qualifications -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Qualifications</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                        <!-- Field Of Study -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Field Of Study</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <li class="mb-20">
                                                <p class="label label-md-green ">Engineer</p>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                            <li class="mb-20">
                                                <span class="label label-md-green ">Engineer</span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- tab privacy -->
                    <div class="tab-pane" id="tab_privacy">
                        <div class="panel  panel-borderless panel-transparent">
                            <div class="panel-heading">
                                <h4 class="panel-title font-30">
                                    Privacy
                                </h4>
                            </div>
                            <hr class="border-grey-silver my-10 ">
                            <div class="panel-body">
                                <div class="media" id="searchable_content">
                                    <div class="pull-right">
                                        <input type="checkbox" id="searchable" <?php echo (isset($user_bios->searchable) && $user_bios->searchable == 1) ? 'checked=checked' : ''; ?>>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 mt-0 md-indigo-text">Not Searchable</h5>
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
                                        <h5 class="text-uppercase font-weight-700 roboto-font font-17 mt-0 md-indigo-text">Searchable with Contact Details</h5>
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

        <!-- Modal Edit Job Preferences -->
        <div class="modal fade in" id="modal_edit_job_preferences" role="dialog" aria-hidden="true">
            <div class="modal-dialog  ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Job Preferences </h4>
                    </div>
                    <form class="form">
                        <div class="modal-body">
                            <!-- Keyword -->
                            <div class="form-group">
                                <label class="control-label">Keyword</label>
                                <input type="text" class="form-control input-lg" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
                            </div>
                            if it checked , input will show else hide

                            <div class="md-checkbox-list row">
                                <div class="col-md-6">
                                    <!-- Checkbox Location -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxLocation" name="cbLocation" value="1" class="md-check trigger " data-trigger="fieldLocation">
                                        <label for="checkboxLocation">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Location </label>
                                    </div>
                                    <!-- Checkbox Specialization -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxSpecialization" name="cbSpecialization" value="1" class="md-check trigger" data-trigger="fieldSpecialization">
                                        <label for="checkboxSpecialization">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Specialization </label>
                                    </div>
                                    <!--  Checkbox Position Level-->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxPositionLevel" name="cbPositionLevel" value="1" class="md-check trigger" data-trigger="fieldPositionLevel">
                                        <label for="checkboxPositionLevel">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Position Level </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Checkbox Year Of Experience -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxYearOfExperience" name="cbYearOfExperience" value="1" class="md-check trigger" data-trigger="fieldYearsOfExperience">
                                        <label for="checkboxYearOfExperience">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Year Of Experience</label>
                                    </div>
                                    <!-- Checkbox Qualification -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxQualification" name="cbQualification" value="1" class="md-check trigger" data-trigger="fieldQualifications">
                                        <label for="checkboxQualification">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Qualification </label>
                                    </div>
                                    <!-- Checkbox Job Type-->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxJobType" name="cbJobType" value="1" class="md-check trigger" data-trigger="fieldJobType">
                                        <label for="checkboxJobType">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Job Type </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-group" id="fieldLocation">
                                <label class="control-label">Location</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Specialization -->
                            <div class="form-group hidden" id="fieldSpecialization">
                                <label class="control-label">Specialization</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Position Level -->
                            <div class="form-group hidden" id="fieldPositionLevel">
                                <label class="control-label">Position Level</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Years Of Experience -->
                            <div class="form-group hidden" id="fieldYearsOfExperience">
                                <label class="control-label">Years Of Experience</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Qualifications -->
                            <div class="form-group hidden" id="fieldQualifications">
                                <label class="control-label">Qualifications</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <!-- Field Of Studys -->
                            <div class="form-group hidden" id="fieldFOS">
                                <label class="control-label">Field Of studys</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <!-- Job type -->
                            <div class="form-group hidden" id="fieldJobType">
                                <label class="control-label">Job Type</label>
                                <div class="input-group select2-bootstrap-append select2-bootstrap-prepend">
                                    <select class="form-control select2" multiple>
                                        <option></option>
                                        <optgroup label="Alaskan">
                                            <option value="AK">Alaska</option>
                                            <option value="HI" disabled="disabled">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <a href="" data-dismiss="modal" class="btn btn-outline btn-md-indigo"> Close</a>
                            <button type="submit" class="btn btn-md-indigo px-100 ">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Modal Edit Full Name -->
        <div class="modal fade in mt-200" id="modal_edit_fullname" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4>Edit Full Name </h4>
                    </div>
                    <form action="<?php echo base_url(); ?>student/settings/change_fullname" class=" form form-horizontal" method="POST">
                        <div class="modal-body form-horizontal">
                            <div class="form-group p-0 m-0">
                                <!-- <label for="">Full Name</label> -->
                                <input type="text" class="form-control mb-0 " name="fullname" value="<?php echo $user->fullname; ?>">
                            </div>

                        </div>
                        <div class=" modal-footer md-grey-lighten-5">
                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline px-50"> Cancel</a>
                            <button type="submit" class="btn btn-md-indigo px-60">Save</button>
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
                                <!-- <label for="">Phone Number</label> -->
                                <!-- <div class="form-inline">
                                    <div class="input-group"> -->
                                        <input type="text" name="contact_number" class="form-control " value="<?php echo isset($user_bios->contact_number) ? $user_bios->contact_number: 'Please Edit your profile'; ?>">
                                    <!-- </div>
                                </div> -->
                            </div>
                        </div>
                        <div class=" modal-footer md-grey-lighten-5">
                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline px-50"> Cancel</a>
                            <button type="submit" class="btn btn-md-indigo px-60">Save</button>
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
                        <div class=" modal-footer md-grey-lighten-5">
                            <a href="" data-dismiss="modal" class="btn btn-default btn-outline px-50"> Cancel</a>
                            <button type="submit" class="btn btn-md-indigo px-60">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END CONTAINER -->
