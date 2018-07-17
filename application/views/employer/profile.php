<?php   
    //$working_days = explode(' - ', $user_profile['working_days']);
    //$working_hours = explode(' - ', $user_profile['working_hours']);
    $dress_code = explode(',', $user_profile['dress_code']);
    $spoken_language = explode(',', $user_profile['spoken_language']);
    $company_address = json_decode($user_profile['address']);
    $profile_picture = end($profile_photo); 
    $header_picture = end($header_photo); 
    $dress_code_detail = explode(',', $detail['dress_code']);
    $dresscode = ucwords(str_replace(',',',',$detail['dress_code']).'');
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

<?php if (!empty($company_address)){
    foreach ($company_address as $key => $value){
?>
<style>
    /* Always set the map height explicitly to define the size of the div
                       * element that contains the map. */

    #gmap<?=$key;
    ?> {
        height: 100%;
        width: 100%;
    }

    /* Optional: Makes the sample page fill the window. */

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    .pac-container {
        z-index: 99999 !important;
    }

    .controls:focus {
        border-color: #4d90fe;
    }

    #infowindow-content<?=$key;
    ?> {
        display: none;
    }

    #gmap<?=$key;
    ?>#infowindow-content<?=$key;
    ?> {
        display: inline;
    }

</style>
<?php }} else { ?>
<style>
    /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */

    #gmap {
        height: 100%;
        width: 100%;
    }

    /* Optional: Makes the sample page fill the window. */

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    .pac-container {
        z-index: 99999 !important;
    }

    .controls:focus {
        border-color: #4d90fe;
    }

    #infowindow-content {
        display: none;
    }

    #gmap #infowindow-content {
        display: inline;
    }

    #pac-input {
        position: absolute;
        z-index: 99999;
    }

</style>
<?php } ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- Page Header -->
        <h1 class="page-title">
            <?= !empty($language->site_company_profile) ? $language->site_company_profile : "Company Profile" ?>
        </h1>

        <!-- Content -->
        <div class="portlet">
            <!-- # Header Image -->
            <div class=" view height-300 " style="background:url('<?php echo !empty($header_picture) ?  IMG_EMPLOYERS.$header_picture['name'] : IMG_EMPLOYER.'portfolio/1200x900/1.jpg'?>') center center no-repeat;">
                <div class="mask hm-darkblue-v7 ">
                    <a href="#modal_edit_header_picture" data-toggle="modal" class="btn  btn-circle btn-mdo-black pull-right m-30">
                        <i class="icon-camera"></i>
                        <?= !empty($language->site_edit_header) ? $language->site_edit_header : "Edit Header" ?>
                    </a>
                </div>
            </div>

            <div class="portlet light">
                <div class="mt-element-card-v2 mb-10">
                    <div class="mt-card-item">
                        <!-- Default Picture -->
                        <div class="mt-card-avatar text-center p-0">
                            <img src="<?php echo !empty($profile_picture) ?  IMG_EMPLOYERS.$profile_picture['name'] : IMG.'site/profile-pic.png'?>" class=" avatar avatar-large avatar-circle mt-o-150 ">
                            <a href="#modal_edit_default_picture" data-toggle="modal" class="btn btn-circle btn-mdo-white  ml-o-50 btn-icon-only">
                                <i class="icon-camera"></i>
                            </a>
                        </div>
                        <!-- Short Content -->
                        <div class="mt-card-content  ">
                            <!-- Company Name -->
                            <h3 class="mt-card-name  md-indigo-text font-weight-600 text-uppercase font-24  mb-10">
                                <?php echo !empty($detail['company_name']) ? $detail['company_name']: 'Set Your Company Name'; ?>
                            </h3>
                            <small class="md-grey-darken-2-text mt-0 font-14">ABC-123456789</small>
                            <div class=" btn-group flex-center">
                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" target="_blank" class="btn btn-md-darkblue my-20">View My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- # Content -->
                <div class="portlet-body px-120-md px-30-sm px-20">
                    <!-- About Company  -->
                    <!-- Note : Attribute involve in here is spoken language , dress code , company size, working time and days , benefit , about company description-->
                    <div class="portlet">
                        <div class="portlet-title ">
                            <div class="caption">
                                <span class="caption-subject font-16 font-weight-600 md-grey-darken-3-text">
                                    <?= !empty($language->site_about_company) ? $language->site_about_company : "About Company" ?>
                                </span>
                            </div>
                            <?php if (!empty($detail['company_description'] || $detail['industry'] || $detail['url'] || $social)) { ?>
                            <div class="actions">
                                <a data-toggle="modal" href="#modal_edit_about" class="btn btn-md-indigo btn-outline">
                                    <i class="icon-pencil mr-5 "></i>Edit</a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="portlet-body">
                            <?php if (!empty($detail['company_description'] || $detail['industry'] || $detail['url'] || $social)){?>
                            <!--  @Attribute : About Company -->
                            <?php if (!empty($detail['company_description'])) {?>
                            <p>
                                <?php echo ucfirst($detail['company_description']); ?>
                            </p>
                            <?php } ?>

                            <div class="row">
                                <!-- @ Attribute : Industry -->
                                <?php if (!empty($detail['industry'])) {?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_industry) ? $language->site_industry : "Industry" ?>
                                    </h5>
                                    <h5 class="roboto-font font-weight-300">
                                        <?php echo !empty($detail['industry']) ? $detail['industry']: '<i class="md-grey-text">None</i>'; ?>
                                    </h5>
                                </div>
                                <?php } ?>

                                <!-- @Attribute : Company Website -->
                                <?php if (!empty($detail['url'])) {?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_company_website) ? $language->site_company_website : "Company Website" ?>
                                    </h5>
                                    <h5 class="roboto-font font-weight-300">
                                        <?php if(!empty($detail['url'])){?>
                                        <a href="<?php echo $detail['url']?>" target="_blank">
                                            <?php echo $detail['url']?>
                                        </a>
                                        <?php }else{?>
                                        <i class="md-grey-text"> None</i>
                                        <?php }?>
                                    </h5>
                                </div>
                                <?php } ?>

                                <!-- @ Attribute : Company Email -->
                                <?php if (!empty($detail['email'])) {?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_company_email) ? $language->site_company_email : "Email" ?>
                                    </h5>
                                    <h5 class="roboto-font font-weight-300">
                                        <?php echo !empty($detail['email']) ? $detail['email'] : '<i class="md-grey-text"> None</i>'; ?>
                                    </h5>
                                </div>
                                <?php } ?>

                                <!-- # Attribute : Social Account -->
                                <?php if (!empty($social)) { ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">Social Account</h5>
                                    <ul class="list-inline list-unstyled mt-ul-li-lr-1 mx-0">
                                        <?php foreach ($social as $key => $value) { 
                                                switch ($value['name']) {   
                                                case 'facebook':
                                            ?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-fb-bg socicon-facebook tooltips" data-original-title="Facebook"></a>
                                        </li>
                                        <?php break; case 'twitter': 
                                            ?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-tw-bg socicon-twitter tooltips" data-original-title="Twitter"></a>
                                        </li>
                                        <?php break; case 'linkedin': ?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-li-bg socicon-linkedin tooltips" data-original-title="LinkedIn"></a>
                                        </li>
                                        <?php break; case 'gplus': ?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-gplus-bg socicon-google tooltips" data-original-title="Google Plus"></a>
                                        </li>
                                        <?php break; case 'youtube':?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-yt-bg socicon-youtube tooltips" data-original-title="Youtube"></a>
                                        </li>
                                        <?php break; case 'instagram':?>
                                        <li class="socicons">
                                            <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-yt-bg socicon-instagram tooltips" data-original-title="Instagram"></a>
                                        </li>
                                        <?php break; default:?>
                                        <?php break; } } ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>

                            <?php } else { ?>
                            <!-- # Empty States -->
                            <div class="portlet height-450 md md-grey-lighten-5 flex-center">
                                <div class="portlet-body text-center">
                                    <i class="fa fa-file font-grey-mint font-38 mb-30"></i>
                                    <h5 class="text-center font-weight-600 font-grey-mint font-20">No Info! </h5>
                                    <p class="text-center font-weight-400 font-grey-mint"> Try to click button below to edit company profile.</p>
                                    <a data-toggle="modal" href="#modal_edit_about" class="btn btn-md-indigo btn-sm mt-25">
                                        <i class="icon-pencil fa-fw"></i>
                                        <?= !empty($language->site_edit_company_profile) ? $language->site_edit_company_profile : "Edit Profile" ?>
                                    </a>
                                </div>
                            </div>
                            <?php }?>

                        </div>
                    </div>
                    <!-- Additional Info -->
                    <!-- Note : Attribute involve in here is spoken language , dress code , company size, working time and days , benefit-->
                    <div class="portlet">
                        <div class="portlet-title mb-0">
                            <div class="caption">
                                <span class="caption-subject font-16 font-weight-600 md-grey-darken-3-text">
                                    <?= !empty($language->site_additional_info) ? $language->site_additional_info : "Additional Info" ?>
                                </span>
                            </div>
                            <?php if (!empty($detail['spoken_language'] || $detail['working_days_start'] || $detail['working_hours_start'] || $dresscode || $detail['total_staff'] || $detail['benefits'])) { ?>
                            <div class="actions">
                                <a data-toggle="modal" href="#modal_edit_additional" class="btn btn-md-indigo btn-outline">
                                    <i class="icon-pencil mr-5 "></i>Edit</a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="portlet-body">

                            <?php if (!empty($detail['spoken_language'] || $detail['working_days_start'] || $detail['working_hours_start'] || $dresscode || $detail['total_staff'] || $detail['benefits'])) { ?>
                            <div class="row">
                                <!-- @Attribute : Spoken Language -->
                                <?php if (!empty($detail['spoken_language'])){ ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_spoken_language) ? $language->site_spoken_language : "Spoken Language" ?>
                                    </h5>
                                    <h5 class="roboto-font font-weight-300">
                                        <?php echo !empty($detail['spoken_language']) ?  $detail['spoken_language'] : '<i class="md-grey-text"> None</i>'; ?>
                                    </h5>
                                </div>

                                <!-- @Attribute : Working Day & Time -->
                                <!-- Note : If working days and time is empty and not be filled in , it won't show in view. -->
                                <?php } if($detail['working_days_start'] != "" && $detail['working_days_end'] != "" && $detail['working_hours_start'] != "" && $detail['working_hours_end'] != ""){?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text"> Working Day & Time</h5>
                                    <h5 class="roboto-font font-weight-300">
                                        <?php echo ucwords($detail['working_days_start'].' - '.$detail['working_days_end']);?> |
                                        <?php echo $detail['working_hours_start'].' - '.$detail['working_hours_end'];?> </h5>
                                </div>
                                <?php }?>

                                <!-- @Attribute : Dress Code -->
                                <?php if(!empty($dresscode)){ ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_dress_code) ? $language->site_dress_code : "Dress Code" ?>
                                    </h5>
                                    <h5 class="roboto-font font-weight-300 ">
                                        <?php echo ucwords($dresscode);?>
                                    </h5>
                                </div>
                                <?php } ?>

                                <!-- @Attribute : Company Size -->
                                <?php if(!empty($detail['total_staff'])){ ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h5 class="mb-10 font-weight-600 md-indigo-text">
                                        <?= !empty($language->site_company_size) ? $language->site_company_size : "Company Size" ?>
                                    </h5>
                                    <h5 class="roboto-font  font-weight-300">
                                        <?php echo !empty($detail['total_staff']) ? str_replace('-', ' to ', $detail['total_staff']).' Employee' : '<i class="md-grey-text">None</i>'; ?>
                                    </h5>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- @Attribute : Benefit -->
                            <?php if (!empty($detail['benefits'])){ ?>
                            <div class="row mx-0  mb-60">
                                <h5 class="mb-10 font-weight-600 md-indigo-text">
                                    <?= !empty($language->site_benefit) ? $language->site_benefit : "Benefit" ?>
                                </h5>
                                <h5 class="roboto-font font-weight-300 line-height-sm">
                                    <?php echo $detail['benefits'] ?>
                                </h5>
                            </div>
                            <?php } } else { ?>
                            <!-- # Empty States -->
                            <div class="portlet height-450 md md-grey-lighten-5 flex-center">
                                <div class="portlet-body text-center">
                                    <i class="fa fa-file font-grey-mint font-38 mb-30"></i>
                                    <h5 class="text-center font-weight-600 font-grey-mint font-20">No Info! </h5>
                                    <p class="text-center font-weight-400 font-grey-mint"> Try to click button below to edit company profile.</p>
                                    <a data-toggle="modal" href="#modal_edit_additional" class="btn btn-md-indigo btn-sm mt-25">
                                        <i class="icon-pencil fa-fw"></i>
                                        <?= !empty($language->site_edit_company_profile) ? $language->site_edit_company_profile : "Edit Profile" ?>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>

                    <!-- Location -->
                    <div class="portlet">
                        <!-- # TITLE -->
                        <div class="portlet-title mb-20">
                            <div class="caption">
                                <span class="caption-subject font-16 font-weight-600 md-grey-darken-3-text">Location</span>
                            </div>
                            <?php $addr = json_decode($detail['address']); 
                            if (!empty($addr)){ ?>
                            <div class="actions">
                                <a data-toggle="modal" href="#modal_edit_location" class="btn  font-14 btn-md-indigo btn-outline">
                                    <i class="icon-pencil mr-5 "></i>Edit</a>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- # CONTENT -->
                        <div class="portlet-body">
                            <?php $addr = json_decode($detail['address']); 
                            if (!empty($addr)){ ?>
                            <!-- Visual Map  -->
                            <div class="portlet height-500 md md-grey-lighten-5">
                                <p class="flex-center">Put a Map in here </p>
                            </div>
                            <ul class="list-unstyled mt-25 mt-ul-li-tb-10 mx-0">
                                <?php foreach ($addr as $key => $value) {?>
                                <li>
                                    <?php if(!empty($value->optionsRadios)) { ?>
                                    <span class="label label-sm mb-20 label-<?php echo ($value->optionsRadios=='HQ') ? 'md-amber md-black-text' : 'md-blue' ?>">
                                        <?php echo ($value->optionsRadios == 'HQ') ? 'Headquarter' : 'Branch'; ?>
                                    </span>
                                    <?php } ?>
                                    <?php
                                    $full_address = $value->building_address != ""?$value->building_address.", ":"";
                                    $full_address .= $value->building_city != ""?$value->building_city.", ":"";
                                    $full_address .= $value->building_postcode != ""?$value->building_postcode.", ":"";
                                    $full_address .= $value->building_state != ""?$value->building_state.", ":"";
                                    $full_address .= $value->building_country != ""?$value->building_country.", ":"";
                                    $full_address = $full_address != ""?substr($full_address, 0, -2):"";
                                ?>
                                        <!-- @ Attribute : Full Address  -->
                                        <h5 class="my-5">
                                            <i class="icon-pointer"></i>
                                            <?php echo $full_address; ?>
                                        </h5>
                                        <ul class="list-inline list-unstyled mx-0">
                                            <?php if(!empty($value->building_email)){ ?>
                                            <!-- @ Attribute : Building Email  -->
                                            <li>
                                                <h5>
                                                    <i class="fa fa-envelope mr-5"></i>
                                                    <?=$value->building_email != ""?$value->building_email:"Not provided"; ?>
                                                </h5>
                                            </li>
                                            <?php } if(!empty($value->building_phone)){ ?>
                                            <!-- @ Attribute : Building Phone  -->
                                            <li>
                                                <h5>
                                                    <i class="fa fa-phone mr-5"></i>
                                                    <?=$value->building_phone != ""?$value->building_phone:"Not provided"; ?>
                                                </h5>
                                            </li>
                                            <?php } if(!empty($value->building_fax)){ ?>
                                            <!-- @ Attribute : Building Fax  -->
                                            <li>
                                                <h5>
                                                    <i class="fa fa-fax mr-5"></i>
                                                    <?=$value->building_fax != ""?$value->building_fax:"Not provided"; ?>
                                                </h5>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } else {?>
                            <!-- # Empty States -->
                            <div class="portlet height-450 md md-grey-lighten-5 flex-center">
                                <div class="portlet-body text-center">
                                    <i class="icon-pointer font-grey-mint font-40 mb-30"></i>
                                    <h5 class="text-center font-weight-600 font-grey-mint font-20">No Info! </h5>
                                    <p class="text-center font-weight-400 font-grey-mint"> Click button below to add your company location in here! </p>
                                    <a data-toggle="modal" href="#modal_edit_location" class="btn btn-md-indigo btn-sm mt-25">
                                        <i class="fa fa-plus fa-fw"></i>Add location</a>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->


<!-- MODAL : About Company-->
<div class="modal fade" id="modal_edit_about" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content ">
            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_profile" class="form-horizontal fade-in-up">
                <div class="modal-header">
                    <h4 class="modal-title font-20 text-capitalize"> Edit
                        <?= !empty($language->site_about_company) ? $language->site_about_company : "About Company" ?>
                            <a data-dismiss="modal" aria-hidden="true" class="close"></a>
                    </h4>
                </div>
                <div class="modal-body form-body ">
                    <!-- Company Name / Reg No -->
                    <div class="row">
                        <!--@Attribute : Company Name -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                    <?= !empty($language->site_company_name) ? $language->site_company_name : "Company Name" ?>
                                </label>
                                <input type="text" class="form-control " name="company_name" placeholder="Company Name" value="<?php echo !empty($detail['company_name']) ? $detail['company_name'] : ''; ?>" required>
                            </div>
                        </div>
                        <!--@Attribute : Company Registration Number -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Registration No.</label>
                                <input type="text" class="form-control " name="company_registration_number" placeholder="Company Reg. No." value="<?php echo !empty($detail['company_registration_number']) ? $detail['company_registration_number'] : ''; ?>">
                            </div>
                        </div>

                    </div>
                    <!--  Industry / Website link -->
                    <div class="row">
                        <!-- @Attribute : Industry -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                    <?= !empty($language->site_industry) ? $language->site_industry : "Industry" ?>
                                </label>
                                <select class=" form-control bs-select" name="industry" title="select industry">
                                    <?php foreach($industries as $value){?>
                                    <option value="<?php echo $value['id'];?>" <?php echo ($value[ 'id']==$detail[ 'company_industry_id']) ? 'selected' : '' ?>>
                                        <?php echo $value['name'];?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <!--@Attribute : Corporate Website -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                    <?= !empty($language->site_company_website) ? $language->site_company_website : "Company Website" ?>
                                </label>
                                <input type="url" class="form-control" name="corporate_website" placeholder="Add link here" value="<?php echo !empty($detail['url']) ? $detail['url'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                    <!--@Attribute : About Company  -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                            <?= !empty($language->site_about_company) ? $language->site_about_company : "About Company" ?>
                        </label>
                        <?php 
                        echo'<textarea class="form-control autosizeme no-resize" name="about_company" rows="5" placeholder="Summarize about your company.">';
                        echo !empty($detail['company_description']) ? $detail['company_description'] : ''; 
                        echo'</textarea>'; ?>
                    </div>
                    <!-- @Attribute : Social Account -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-0 font-weight-600">Social Account</label>
                        <div class="mt-repeater ">
                            <div data-repeater-list="group-b">
                                <?php if (!empty($social)) {
                                foreach ($social as $key => $value) {?>
                                <div data-repeater-item class="row my-15">
                                    <div class="col-md-7 col-xs-12 col-sm-7">
                                        <input type="url" placeholder="Add link to here" class="form-control" name="link" value="<?php echo $value['link']; ?>" /> </div>
                                    <div class="col-md-3 col-xs-12 col-sm-3">
                                        <select class="form-control" name="name">
                                            <option value="" selected disabled>Select account type </option>
                                            <option value="facebook" <?php echo ($value[ 'name']=='facebook' ) ? 'selected' : '' ?>>Facebook</option>
                                            <option value="twitter" <?php echo ($value[ 'name']=='twitter' ) ? 'selected' : '' ?>>Twitter</option>
                                            <option value="gplus" <?php echo ($value[ 'name']=='gplus' ) ? 'selected' : '' ?>>Google Plus</option>
                                            <option value="linkedin" <?php echo ($value[ 'name']=='linkedin' ) ? 'selected' : '' ?>>LinkedIn</option>
                                            <option value="instagram" <?php echo ($value[ 'name']=='instagram' ) ? 'selected' : '' ?>>Instagram</option>
                                            <option value="youtube" <?php echo ($value[ 'name']=='youtube' ) ? 'selected' : '' ?>>Youtube</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-xs-12 col-sm-2 my-auto">
                                        <a href="javascript:;" data-repeater-delete class="btn btn-md-red btn-icon-only">
                                            <i class="fa fa-close font-17"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php } }else{ ?>
                                <div data-repeater-item class="row my-15">
                                    <div class="col-md-7 col-xs-12 col-sm-7">
                                        <input type="url" placeholder="Add link to here" class="form-control" name="link" /> </div>
                                    <div class="col-md-3 col-xs-12 col-sm-3">
                                        <select class="form-control" name="name">
                                            <option value="" selected disabled>Select account type </option>
                                            <option value="facebook">Facebook</option>
                                            <option value="twitter">Twitter</option>
                                            <option value="gplus">Google Plus</option>
                                            <option value="linkedin">LinkedIn</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="youtube">Youtube</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-xs-12 col-sm-2 my-auto">
                                        <a href="javascript:;" data-repeater-delete class="btn btn-md-red btn-icon-only">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <hr>

                            <a href="javascript:;" data-repeater-create class="btn btn-md-blue btn-sm mt-repeater-add ">
                                <i class="fa fa-plus"></i>
                                <?= !empty($language->site_add_another_account) ? $language->site_add_another_account : "Add another account"?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer form-action ">
                    <button type="submit" class="btn btn-md-indigo width-200">
                        <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL : Additional Info -->
<div class="modal fade " id="modal_edit_additional" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_additional_info" class="form-horizontal fade-in-up">
                <div class="modal-header">
                    <h4 class="modal-title font-20 text-capitalize">
                        Edit
                        <?= !empty($language->site_additional_info) ? $language->site_additional_info : "Additional Info" ?>
                            <a data-dismiss="modal" aria-hidden="true" class="close"></a>
                    </h4>
                </div>
                <div class="modal-body form-body ">
                    <div class="row">
                        <!-- Working Hours -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-20 font-weight-600">
                                    <?= !empty($language->site_working_day) ? $language->site_working_day : "Working Day" ?> &
                                        <?= !empty($language->site_working_time) ? $language->site_working_time : "Working Time" ?>
                                </label>
                                <div class="m-grid">
                                    <div class="m-grid-col m-grid-col-md-5">
                                        <select class="bs-select form-control" name="day_start" title="Begin Day">
                                            <option value="monday" <?php echo ($detail[ 'working_days_start']=='monday' ) ? 'selected' : '' ?>>Monday</option>
                                            <option value="tuesday" <?php echo ($detail[ 'working_days_start']=='tuesday' ) ? 'selected' : '' ?>>Tuesday</option>
                                            <option value="wednesday" <?php echo ($detail[ 'working_days_start']=='wednesday' ) ? 'selected' : '' ?>>Wednesday</option>
                                            <option value="thursday" <?php echo ($detail[ 'working_days_start']=='thursday' ) ? 'selected' : '' ?>>Thursday</option>
                                            <option value="friday" <?php echo ($detail[ 'working_days_start']=='friday' ) ? 'selected' : '' ?>>Friday</option>
                                            <option value="saturday" <?php echo ($detail[ 'working_days_start']=='saturday' ) ? 'selected' : '' ?>>Saturday</option>
                                            <option value="sunday" <?php echo ($detail[ 'working_days_start']=='sunday' ) ? 'selected' : '' ?>>Sunday</option>
                                        </select>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-2 m-grid-col-center width-10-percent">
                                        <h5>
                                            <?= !empty($language->site_until) ? $language->site_until : "Until" ?>
                                        </h5>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-5">
                                        <select class=" form-control" name="day_end" title="End Day">
                                            <option value="friday" <?php echo ($detail[ 'working_days_end']=='friday' ) ? 'selected' : '' ?>>Friday</option>
                                            <option value="saturday" <?php echo ($detail[ 'working_days_end']=='saturday' ) ? 'selected' : '' ?>>Saturday</option>
                                            <option value="sunday" <?php echo ($detail[ 'working_days_end']=='sunday' ) ? 'selected' : '' ?>>Sunday</option>
                                            <option value="monday" <?php echo ($detail[ 'working_days_end']=='monday' ) ? 'selected' : '' ?>>Monday</option>
                                            <option value="tuesday" <?php echo ($detail[ 'working_days_end']=='tuesday' ) ? 'selected' : '' ?>>Tuesday</option>
                                            <option value="wednesday" <?php echo ($detail[ 'working_days_end']=='wednesday' ) ? 'selected' : '' ?>>Wednesday</option>
                                            <option value="thursday" <?php echo ($detail[ 'working_days_end']=='thursday' ) ? 'selected' : '' ?>>Thursday</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="my-15">
                                <div class="m-grid">
                                    <!-- Start Time -->
                                    <div class="m-grid-col m-grid-col-md-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker timepicker-24" placeholder="Start At" name="work_hour_start">
                                            <span class="input-group-btn">
                                                <button class="btn default md-shadow-none" type="button">
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-grid-col m-grid-col-md-2 width-10-percent m-grid-col-center">
                                        <h5>
                                            <?= !empty($language->site_until) ? $language->site_until : "Until" ?>
                                        </h5>
                                    </div>
                                    <!-- End Time -->
                                    <div class="m-grid-col m-grid-col-md-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker timepicker-24" placeholder="End At" name="work_hour_end">
                                            <span class="input-group-btn">
                                                <button class="btn default md-shadow-none" type="button">
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Company Dress Code -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group form-md-checkboxes mx-0 ">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                    <?= !empty($language->site_dress_code) ? $language->site_dress_code : "Dress Code" ?>
                                </label>
                                <div class="md-checkbox-list">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox6" class="md-check" value="casual" name="dress[]" <?php foreach($dress_code as $key=> $value) : echo ($value == 'casual') ? 'checked' : ''; endforeach; ?>>
                                        <label for="checkbox6">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Casual Dress Code</label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox7" class="md-check" value="formal" name="dress[]" <?php foreach($dress_code as $key=> $value) : echo ($value == 'formal') ? 'checked' : ''; endforeach; ?>>
                                        <label for="checkbox7">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Formal Dress Code </label>
                                    </div>
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox8" class="md-check" value="business" name="dress[]" <?php foreach($dress_code as $key=> $value) : echo ($value == 'business') ? 'checked' : ''; endforeach; ?>>
                                        <label for="checkbox8">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Business Casual Code </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Company Size -->
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Size</label>
                                <select class=" form-control bs-select" name="company_size" title=" Select company size">
                                    <option value="1-50" <?php echo ($user_profile[ 'total_staff']=='1-50' ) ? 'selected' : ''; ?>>1 to 50 employee</option>
                                    <option value="51-100" <?php echo ($user_profile[ 'total_staff']=='51-100' ) ? 'selected' : ''; ?>>51 to 100 employee</option>
                                    <option value="> 100" <?php echo ($user_profile[ 'total_staff']=='> 100' ) ? 'selected' : ''; ?>>100 to above employee</option>
                                </select>
                            </div>
                        </div>
                        <!--Spoken Language-->
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group mx-0">
                                <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                    <?= !empty($language->site_spoken_language) ? $language->site_spoken_language : "Spoken Language" ?>
                                </label>
                                <<select class="bs-select form-control" multiple name="language[]" id="spoken_language" title="Select Language">
                                    <?php foreach ($languages as $key => $value) {?>
                                    <?php foreach ($spoken_language as $spoken_key => $spoken_value) {?>
                                    <option <?php echo ($spoken_value==$value[ 'name']) ? 'selected' : '' ?>>
                                        <?php echo $value['name']; ?>
                                    </option>
                                    <?php } ?>
                                    <?php } ?>
                                    </select>
                                    <span class="helper-block mb-10 font-14">You can add multiple language </span>
                            </div>
                        </div>
                    </div>
                    <!-- Benefits -->
                    <div class="form-group mx-0">
                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                            <?= !empty($language->site_benefit) ? $language->site_benefit : "Benefits" ?>
                        </label>
                        <?php echo '<textarea class="autosizeme no-resize form-control" rows="7" placeholder="Annual Leaves , Allowances , Medicalfee , Dental Fee ,Annual Trip" name="benefits">'; 
                            echo !empty($user_profile['benefits']) ? $user_profile['benefits'] : '';
                            echo '</textarea>';
                        ?>
                    </div>
                </div>
                <div class="modal-footer form-actions ">
                    <button type="submit" class="btn btn-md-indigo width-200">
                        <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL : Location Info -->
<div class="modal fade" id="modal_edit_location" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title font-20 text-capitalize">Edit Location
                    <a data-dismiss="modal" aria-hidden="true" class="close"></a>
                </h4>
            </div>
            <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_contact_info" class="form-horizontal">
                <div class="modal-body form-body">
                    <div class="">
                        <div id="contactInfoForm">
                            <?php if (!empty($company_address)) {
                                        foreach ($company_address as $key => $value) { ?>
                            <div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <input type="hidden" id="addMapTitle<?= $key; ?>" name="mapTitle"></input>
                                        <input type="hidden" id="addMapDescription<?= $key; ?>" name="mapDescription"></input>
                                        <div class="row mx-0">
                                            <div class="col-md-12">
                                                <div style="height: 300px;" id="map-window<?= $key; ?>">
                                                    <input id="pac-input<?= $key; ?>" class="controls" type="text" placeholder="Enter a location">
                                                    <div class="profileMap" id="gmap<?= $key; ?>" style="z-index: 9999 !important;"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="row mx-0">
                                    <div class="form-group mx-0">
                                        <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->address) ? $language->address : "Address" ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="  Unit / Lot , Road ," name="contact_info[<?= $key; ?>][building_address]" id="building_address<?= $key; ?>" value="<?php echo $value->building_address; ?>">
                                    </div>
                                </div>
                                <!-- City & State-->
                                <!-- Postcode & Country -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->city) ? $language->city : "City" ?>
                                            </label>
                                            <input type="text" class="form-control " name="contact_info[<?= $key; ?>][building_city]" id="building_city<?= $key; ?>" value="<?php echo $value->building_city; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->state) ? $language->state : "State" ?>
                                            </label>
                                            <input type="text" class="form-control" name="contact_info[<?= $key; ?>][building_state]" id="building_state<?= $key; ?>" value="<?php echo $value->building_state; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->postcode) ? $language->postcode : "Postcode" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Postcode" name="contact_info[<?= $key; ?>][building_postcode]" id="building_postcode<?= $key; ?>" value="<?php echo $value->building_postcode; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <!-- <label class="control-label">Country</label> -->
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->country) ? $language->country : "Country" ?>
                                            </label>

                                            <select class="form-control " name="contact_info[<?= $key; ?>][building_country]" id="building_country<?= $key; ?>">
                                                <option value="" disabled>Select one </option>
                                                <?php foreach ($countries as $country_value) { ?>
                                                <option <?php ($value->building_country == $country_value['name']) ? 'selected' : ''; ?>>
                                                    <?php echo $country_value['name']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- Lat/Long -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->latitude) ? $language->latitude : "Latitude" ?>
                                            </label>

                                            <input type="text" name="contact_info[<?= $key; ?>][building_latitude]" id="building_latitude<?= $key; ?>" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_latitude; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->longitude) ? $language->longitude : "Longititude" ?>
                                            </label>
                                            <input type="text" name="contact_info[<?= $key; ?>][building_longitude]" id="building_longitude<?= $key; ?>" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_longitude; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->phone_number) ? $language->phone_number : "Phone Number" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_phone]" id="building_phone<?= $key; ?>" value="<?php echo $value->building_phone; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->fax_number) ? $language->fax_number : "Fax Number" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_fax]" id="building_fax<?= $key; ?>" value="<?php echo $value->building_fax; ?>">
                                        </div>
                                    </div>
                                </div>


                                <!-- Office Type and Remove Button -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->office_type) ? $language->office_type : "Office Type" ?>
                                            </label>

                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios4" value="HQ" <?php echo (!empty($value->optionsRadios) && $value->optionsRadios=='HQ') ? 'checked' : '' ?> name="HQ">
                                                    <?= !empty($language->headquarter) ? $language->headquarter : "HQ" ?>
                                                        <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios5" value="branch" <?php echo (!empty($value->optionsRadios) && $value->optionsRadios=='branch') ? 'checked' : '' ?>>
                                                    <?= !empty($language->branch) ? $language->branch : "Branch" ?>
                                                        <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->email_address) ? $language->email_address : "Email Address" ?>
                                            </label>
                                            <input type="text" class="form-control " placeholder="hello@xremo.com" name="contact_info[<?= $key; ?>][building_email]" id="building_email<?= $key; ?>" value="<?php echo $value->building_email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pull-right my-50">
                                        <a href="javascript:;" class="btn btn-md-red btn-block delContact">
                                            <i class="fa fa-close"></i>
                                            <?= !empty($language->remove) ? $language->remove : "Remove" ?>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <?php } }else{ ?>
                            <div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <input type="hidden" id="addMapTitle" name="mapTitle"></input>
                                        <input type="hidden" id="addMapDescription" name="mapDescription"></input>
                                        <div class="row mx-0">
                                            <div class="col-md-12">
                                                <div style="height: 300px;" id="map-window">
                                                    <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                                                    <div class="profileMap" id="gmap" style="z-index: 9999 !important;"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="row mx-0">
                                    <div class="form-group mx-0">
                                        <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600 ">
                                            <?= !empty($language->address) ? $language->address : "Address" ?>
                                        </label>
                                        <input type="text" class="form-control" placeholder="  Unit / Lot , Road ," name="contact_info[0][building_address]" id="building_address">
                                    </div>
                                </div>
                                <!-- City & State-->
                                <!-- Postcode & Country -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->city) ? $language->city : "City" ?>
                                            </label>
                                            <input type="text" class="form-control " name="contact_info[0][building_city]" id="building_city">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->state) ? $language->state : "State" ?>
                                            </label>
                                            <input type="text" class="form-control" name="contact_info[0][building_state]" id="building_state">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->postcode) ? $language->postcode : "Postcode" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Postcode" name="contact_info[0][building_postcode]" id="building_postcode">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <!-- <label class="control-label">Country</label> -->
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->country) ? $language->country : "Country" ?>
                                            </label>

                                            <select class="form-control " name="contact_info[0][building_country]" id="building_country">
                                                <option value="" disabled>Select one </option>
                                                <?php foreach ($countries as $country_value) { ?>
                                                <option value="<?= $country_value['name']; ?>">
                                                    <?php echo $country_value['name']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- Lat/Long -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->latitude) ? $language->latitude : "Latitude" ?>
                                            </label>

                                            <input type="text" name="contact_info[0][building_latitude]" id="building_latitude" class="form-control" placeholder="1.643604 ">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->longitude) ? $language->longitude : "Longititude" ?>
                                            </label>
                                            <input type="text" name="contact_info[0][building_longitude]" id="building_longitude" class="form-control" placeholder="1.643604 ">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->phone_number) ? $language->phone_number : "Phone Number" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[0][building_phone]" id="building_phone">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->fax_number) ? $language->fax_number : "Fax Number" ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[0][building_fax]" id="building_fax">
                                        </div>
                                    </div>
                                </div>


                                <!-- Office Type and Remove Button -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">
                                                <?= !empty($language->office_type) ? $language->office_type : "Office Type" ?>
                                            </label>

                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="contact_info[0][optionsRadios]" id="optionsRadios4" value="HQ" name="HQ" checked="checked">
                                                    <?= !empty($language->headquarter) ? $language->headquarter : "HQ" ?>
                                                        <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="contact_info[0][optionsRadios]" id="optionsRadios5" value="branch">
                                                    <?= !empty($language->branch) ? $language->branch : "Branch" ?>
                                                        <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mx-0">
                                            <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Email Address</label>
                                            <input type="text" class="form-control " placeholder="hello@xremo.com" name="contact_info[0][building_email]" id="building_email">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pull-right my-50">
                                        <a href="javascript:;" class="btn btn-md-red btn-block delContact">
                                            <i class="fa fa-close"></i>
                                            <?= !empty($language->remove) ? $language->remove : "Remove" ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <a href="javascript:;" class="btn btn-md-blue mb-30" id="addOffice" data-val="<?= count($company_address); ?>">
                            <i class="fa fa-plus"></i>
                            <?= !empty($language->add_new_office) ? $language->add_new_office : "Add New Office" ?>
                        </a>
                    </div>
                    <div class="modal-footer form-actions">
                        <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">
                            <?= !empty($language->site_cancel) ? $language->site_cancel : "Cancel" ?>
                        </a>
                        <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">
                            <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                        </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN MODAL : Edit Default Picture -->
<div class="modal fade " id="modal_edit_default_picture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Default Picture
                    <a data-dismiss="modal" aria-hidden="true" class="close"></a>
                </h4>

            </div>
            <form action="<?php echo base_url(); ?>employer/profile/upload_company_logo" method="POST" class=" form " enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="form-group mx-0 ">
                        <?php if(!empty($profile_picture)) { ?>
                        <div class="fileinput fileinput-exists width-100-percent" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail md-grey-hover width-100-percent center-block mt-display-block height-500 p-30" data-trigger="fileinput">
                                <img src="<?php echo !empty($profile_picture) ?  IMG_EMPLOYERS.$profile_picture['name'] : IMG.'site/profile-pic.png'?>" class="img-responsive center-block">
                            </div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_logo"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <?php } else { ?>
                        <div class="fileinput fileinput-new width-100-percent" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail md-grey-hover width-100-percent center-block mt-display-block height-500 p-30" data-trigger="fileinput"></div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_logo"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <?php } ?>

                        <div class="clearfix mt-30">
                            <span class="label label-success label-sm">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>

                    </div>
                </div>
                <div class="modal-footer md-grey-lighten-5">

                    <button type="submit" class="btn btn-md-indigo width-200">
                        <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- BEGIN MODAL : Edit Header Picture -->
<div class="modal fade  " id="modal_edit_header_picture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Header Picture
                    <a data-dismiss="modal" aria-hidden="true" class="close"></a>
                </h4>
            </div>
            <form action="<?php echo base_url(); ?>employer/profile/upload_company_header" method="POST" class=" form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group  mx-0">
                        <?php if(!empty($header_picture)) { ?>
                        <div class="fileinput fileinput-exists width-100-percent" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail md-grey-hover width-100-percent center-block mt-display-block height-500 p-30" data-trigger="fileinput">
                                <img src="<?php echo !empty($header_picture) ?  IMG_EMPLOYERS.$header_picture['name'] : IMG_EMPLOYER.'portfolio/1200x900/1.jpg'?>" class="img-responsive center-block">
                            </div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_header"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <?php } else { ?>
                        <div class="fileinput fileinput-new width-100-percent" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail md-grey-hover width-100-percent center-block mt-display-block height-500 p-30" data-trigger="fileinput"></div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_header"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <?php } ?>
                        <div class="clearfix mt-20">
                            <span class="label label-success label-sm">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                    </div>
                </div>
                <div class="modal-footer md-grey-lighten-5">
                    <button type="submit" class="btn btn-md-indigo width-200">
                        <?= !empty($language->site_save) ? $language->site_save : "Save" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
