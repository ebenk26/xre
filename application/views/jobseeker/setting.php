<?php
$keywords               = '';
$work_location          = [];
$position_level         = [];
$years_of_experience    = [];
$qualifications         = '';
$employment_type        = [];
$keywords_view          = [];
$qualifications_view    = [];
$range_min              = 0;
$range_max              = 0;
$range_min_view         = 0;
$range_max_view         = 0;

if(!empty($job_preferences))
{
    $keywords               = $job_preferences->keywords;
    $keywords_view          = !empty($job_preferences->keywords) ? explode(',', $job_preferences->keywords) : [];
    $work_location          = !empty($job_preferences->work_location) ? explode(';', $job_preferences->work_location) : [];
    $position_level         = !empty($job_preferences->position_level) ? explode(';', $job_preferences->position_level) : [];
    $years_of_experience    = !empty($job_preferences->years_of_experience) ? explode(';', $job_preferences->years_of_experience) : [];
    $qualifications         = $job_preferences->qualifications;
    $qualifications_view    = !empty($job_preferences->qualifications) ? explode(',', $job_preferences->qualifications) : [];
    $employment_type        = !empty($job_preferences->employment_type) ? explode(';', $job_preferences->employment_type) : [];

    if(!empty($job_preferences->salary_range))
    {
        $range              = explode('-', $job_preferences->salary_range);
        $range_min          = $range[0];
        $range_max          = $range[1];
        $range_min_view     = $currency->name.' '.number_format($range[0],0,',','.');
        $range_max_view     = $currency->name.' '.number_format($range[1],0,',','.');
    } 
}
?>
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
                                <div class="media">
                                    <div class="pull-right">
                                        <a href="#modal_edit_job_preferences" data-toggle="modal" class="font-grey-gallery">Change</a>
                                    </div>
                                    <div class="media-body">
                                        <!-- Keyword -->

                                        <!--Note : Random Arrangement And badge color also random  , extract from student profile.php  -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs mt-0 md-indigo-text">Keyword</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($keywords_view))
                                                {
                                                    foreach ($keywords_view as $keywordsViewValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $keywordsViewValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>

                                        <!-- Location -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Location</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($work_location))
                                                {
                                                    foreach ($work_location as $workLocationValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $workLocationValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>

                                        <!-- Job Type -->
                                        <!-- Note :  Please extract from existing list-->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Job Type</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($employment_type))
                                                {
                                                    foreach ($employment_type as $employmentTypeValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $employmentTypeValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>

                                        <!-- Position Level -->
                                        <!-- Note :  Please extract from existing list -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Position Level</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($position_level))
                                                {
                                                    foreach ($position_level as $positionLevelValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $positionLevelValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>

                                        <!-- Salary Range -->
                                        <!-- Note :  Please extract from existing list -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Salary Range</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($job_preferences->salary_range))
                                                {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $range_min_view.' - '.$range_max_view; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>

                                        <!-- Years Of Experience -->
                                        <!-- Note :  Please extract from existing list of Year of expereince in job post employer side-->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Years Of Experience</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($years_of_experience))
                                                {
                                                    foreach ($years_of_experience as $yearsOfExperienceValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $yearsOfExperienceValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
                                        </ul>



                                        <!-- Qualifications -->
                                        <h5 class="text-uppercase font-weight-600 roboto-font font-17 letter-space-xs  md-indigo-text mt-30">Qualifications</h5>
                                        <ul class="list-inline list-unstyled mt-ul-li-lr-0 mx-0">
                                            <?php
                                                if(!empty($qualifications_view))
                                                {
                                                    foreach ($qualifications_view as $qualificationsValue)
                                                    {
                                            ?>
                                                        <li class="mb-20">
                                                            <p class="label label-md-green ">
                                                                <?= $qualificationsValue; ?>
                                                            </p>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                            ?>
                                                    <i class="font-weight-300 md-grey-lighten-1-text"> None </i>
                                            <?php
                                                }
                                            ?>
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
                    <form class="form" method="POST" action="<?= site_url(); ?>jobseeker/settings/changeJobPreferences">
                        <div class="modal-body">
                            <!-- Keyword -->
                            <div class="form-group">
                                <label class="control-label">
                                    Keyword 
                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Type and press enter to add new keyword" style="cursor: pointer;"></i>
                                </label>
                                <input type="text" name="keywords" class="form-control input-lg" value="<?= $keywords; ?>" data-role="tagsinput">
                            </div>

                            <div class="md-checkbox-list row">
                                <div class="col-md-6">
                                    <!-- Checkbox Location -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxLocation" name="cbLocation" value="1" class="md-check trigger " data-trigger="fieldLocation" <?= count($work_location) > 0 ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxLocation">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Location </label>
                                    </div>
                                    <!--  Checkbox Position Level-->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxPositionLevel" name="cbPositionLevel" value="1" class="md-check trigger" data-trigger="fieldPositionLevel" <?= count($position_level) > 0 ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxPositionLevel">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Position Level </label>
                                    </div>
                                    <!--  Checkbox Salary Range-->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxSalaryRange" name="cbSalaryRange" value="1" class="md-check trigger" data-trigger="fieldSalaryRange" <?= count($position_level) > 0 ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxSalaryRange">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Salary Range </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Checkbox Year Of Experience -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxYearOfExperience" name="cbYearOfExperience" value="1" class="md-check trigger" data-trigger="fieldYearsOfExperience" <?= count($years_of_experience) > 0 ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxYearOfExperience">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Year Of Experience</label>
                                    </div>
                                    <!-- Checkbox Qualification -->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxQualification" name="cbQualification" value="1" class="md-check trigger" data-trigger="fieldQualifications" <?= !empty($qualifications) ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxQualification">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Qualification </label>
                                    </div>
                                    <!-- Checkbox Job Type-->
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkboxJobType" name="cbJobType" value="1" class="md-check trigger" data-trigger="fieldJobType" <?= count($employment_type) > 0 ? 'checked="checked"' : ''; ?>>
                                        <label for="checkboxJobType">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Job Type </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="form-group <?= count($work_location) <= 0 ? 'hidden' : ''; ?>" id="fieldLocation">
                                <label class="control-label">Location</label>
                                <select class="form-control bs-select" name="work_location[]" multiple>
                                    <?php
                                        foreach ($countries as $countriesVal)
                                        {
                                    ?>
                                            <option <?= in_array($countriesVal['name'], $work_location) ? 'selected="selected"' : ''; ?>>
                                                <?= $countriesVal['name']; ?>        
                                            </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- Position Level -->
                            <div class="form-group <?= count($position_level) <= 0 ? 'hidden' : ''; ?>" id="fieldPositionLevel">
                                <label class="control-label">Position Level</label>
                                <select class="form-control bs-select" name="position_level[]" multiple>
                                    <option <?= in_array('Junior', $position_level) ? 'selected="selected"' : ''; ?>>
                                        Junior
                                    </option}>
                                    <option <?= in_array('Senior', $position_level) ? 'selected="selected"' : ''; ?>>
                                        Senior
                                    </option>
                                    <option <?= in_array('Executive', $position_level) ? 'selected="selected"' : ''; ?>>
                                        Executive
                                    </option>
                                </select>
                            </div>
                            <!-- Salary Range -->
                            <div class="form-group <?= count($position_level) <= 0 ? 'hidden' : ''; ?>" id="fieldSalaryRange">
                                <label class="control-label">Salary Range</label>
                                <div style="margin-left: 10px;">
                                    <div><small>From</small></div>
                                    <input type="text" name="range_min" class="form-control" value="<?= $range_min; ?>">
                                    <div><small>To</small></div>
                                    <input type="text" name="range_max" class="form-control" value="<?= $range_max; ?>">
                                </div>
                            </div>
                            <!-- Years Of Experience -->
                            <div class="form-group <?= count($years_of_experience) <= 0 ? 'hidden' : ''; ?>" id="fieldYearsOfExperience">
                                <label class="control-label">Years Of Experience</label>
                                <select class="form-control bs-select" name="years_of_experience[]" multiple>
                                    <option <?= in_array('1-2 Years of Experience', $years_of_experience) ? 'selected="selected"' : ''; ?>>
                                        1-2 Years of Experience
                                    </option>
                                    <option <?= in_array('2-5 Years of Experience', $years_of_experience) ? 'selected="selected"' : ''; ?>>
                                        2-5 Years of Experience
                                    </option>
                                    <option <?= in_array('5-10 Years of Experience', $years_of_experience) ? 'selected="selected"' : ''; ?>>
                                        5-10 Years of Experience
                                    </option>
                                </select>
                            </div>
                            <!-- Qualifications -->
                            <div class="form-group <?= !empty($qualifications) <= 0 ? 'hidden' : ''; ?>" id="fieldQualifications">
                                <label class="control-label">
                                    Qualifications
                                    <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Type and press enter to add new qualifications" style="cursor: pointer;"></i>
                                </label>
                                <input type="text" name="qualifications" class="form-control input-lg" value="<?= $qualifications; ?>" data-role="tagsinput">
                            </div>

                            <!-- Job type -->
                            <div class="form-group <?= count($employment_type) <= 0 ? 'hidden' : ''; ?>" id="fieldJobType">
                                <label class="control-label">Job Type</label>
                                <select class="form-control bs-select" name="employment_type[]" multiple>
                                    <?php
                                        foreach ($employment as $employmentVal)
                                        {
                                    ?>
                                            <option <?= in_array($employmentVal['name'], $employment_type) ? 'selected="selected"' : ''; ?>>
                                                <?= $employmentVal['name']; ?>
                                            </option>
                                    <?php
                                        }
                                    ?>
                                </select>
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
                    <form action="<?php echo base_url(); ?>jobseeker/settings/change_fullname" class=" form form-horizontal" method="POST">
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
                    <form action="<?php echo base_url(); ?>jobseeker/settings/change_phone_number" class=" form form-horizontal" method="POST">
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
                    <form action="<?php echo base_url(); ?>jobseeker/change_password" method="POST" class=" form form-horizontal">
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
