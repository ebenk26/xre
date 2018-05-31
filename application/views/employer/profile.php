<?php   
    //$working_days = explode(' - ', $user_profile['working_days']);
    //$working_hours = explode(' - ', $user_profile['working_hours']);
    $dress_code = explode(',', $user_profile['dress_code']);
    $spoken_language = explode(',', $user_profile['spoken_language']);
    $company_address = json_decode($user_profile['address']);
    $profile_picture = end($profile_photo); 
    $header_picture = end($header_photo); 
    $dress_code_detail = explode(',', $detail['dress_code']);
    $dresscode = ucwords(str_replace(',',', ',$detail['dress_code']).', ');
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

<?php 
if (!empty($company_address)){
    foreach ($company_address as $key => $value){
?>
        <style>
            /* Always set the map height explicitly to define the size of the div
                       * element that contains the map. */

            #gmap<?=$key;?> {
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

            #infowindow-content<?=$key;?> {
                display: none;
            }

            #gmap<?=$key;?> #infowindow-content<?=$key;?> {
                display: inline;
            }
        </style>
<?php
    }
}
else
{
?>
    <style>
          /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */
          #gmap {
            height: 100%;
            width: 100%;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
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

          .pac-container{
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
          #pac-input{
            position: absolute;
            z-index: 99999;
          }
    </style>
<?php
}
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- Page Header -->
        <h1 class="page-title">Company Profile</h1>

        <!-- Content -->
        <div class="portlet">
            <!-- # Header Image -->
            <div class=" view height-300 " style="background:url('<?php echo !empty($header_picture) ?  IMG_EMPLOYERS.$header_picture['name'] : IMG_EMPLOYER.'portfolio/1200x900/1.jpg'?>') center center no-repeat;">
                <div class="mask hm-darkblue-v7 ">
                    <a href="#modal_edit_header_picture" data-toggle="modal" class="btn  btn-circle btn-mdo-white pull-right m-30">
                        <i class="icon-camera"></i>
                        Edit Header
                    </a>
                </div>
            </div>
            <div class="portlet light">
                <!--  # User Card -->
                <div class="mt-element-card-v2 mb-50">
                    <div class="mt-card-item p-0">
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
                            <h3 class="mt-card-name  md-indigo-text font-weight-600 text-uppercase font-24 ">
                                <?php echo !empty($detail['company_name']) ? $detail['company_name']: 'Set Your Company Name'; ?>
                            </h3>

                            <ul class="list-inline list-unstyled">
                                <?php if(!empty($detail['industry'])){  ?>
                                <li class="font-18 md-grey-darken-2-text">
                                    <i class="fa fa-industry mr-5"></i>
                                    <?php echo !empty($detail['industry']) ? $detail['industry']: ''; ?>
                                </li>
                                <?php } 
                                        if(!empty($detail['total_staff'])){  ?>
                                <li class="font-18 md-grey-darken-2-text">
                                    <!-- <h5 class="mb-10 font-weight-600 md-indigo-text"> Company Size</h5> -->
                                    <i class="fa fa-users md-grey-darken-2-text mr-5"></i>
                                    <?php echo !empty($detail['total_staff']) ? str_replace('-', ' to ', $detail['total_staff']).' Employee' : ''; ?>

                                </li>
                                <?php }  ?>
                            </ul>
                            <hr class="border-md-orange center-block width-300">
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
                                        <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-li-bg socicon-linkedin tooltips" data-original-title="LinkedIn"></a>
                                    </li>
                                    <?php break;
                                                        case 'gplus': ?>
                                    <li class="socicons">
                                        <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-gplus-bg socicon-google tooltips" data-original-title="Google Plus"></a>
                                    </li>
                                    <?php break;
                                                        case 'youtube':?>
                                    <li class="socicons">
                                        <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-yt-bg socicon-youtube tooltips" data-original-title="Youtube"></a>
                                    </li>
                                    <?php break;
                                                        case 'instagram':?>
                                    <li class="socicons">
                                        <a href="<?php echo !empty($value['link']) ? $value['link'] : '#' ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid social-yt-bg socicon-instagram tooltips" data-original-title="Instagram"></a>
                                    </li>
                                    <?php break; default:?>
                                    <li class="socicons">

                                    </li>
                                    <?php break; } ?>

                                    <?php }} ?>
                                </ul>
                            </div>
                        </div>
                        <div class="center-block width-400">
                            <!-- <div class="btn-group mx-0"> -->
                            <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($this->session->userdata('id')),'=') ?>" target="_blank" class="btn btn-md-indigo mb-6">View My Profile</a>
                            <a href="#modal_edit_company" data-toggle="modal" class="btn btn-outline btn-md-indigo " data-id="<?= $detail['id']; ?>">
                                <i class="icon-pencil mr-5"></i>Edit Profile</a>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <!-- # Tab Line -->
                <div class="portlet-title tabbable-line tab-md-indigo  flex-center ">
                    <ul class="nav nav-tabs ">
                        <li class="active ">
                            <a href="#tab_about_info" data-toggle="tab" class="font-18">
                                <i class="fa fa-building-o mr-10"></i>About Company</a>
                        </li>
                        <li>
                            <a href="#tab_contact_info " data-toggle="tab" class="font-18">
                                <i class="icon-pointer mr-10"></i>Company Location </a>
                        </li>
                    </ul>
                </div>
                <!-- # Tab Content -->
                <div class="portlet-body tab-content">
                    <!-- Tab : About Company , Additional Info -->
                    <div class="tab-pane active" id="tab_about_info">
                        <!-- About Company -->
                        <div class="row  mx-0">
                            <h5 class="font-weight-700 text-uppercase mb-10 text-left md-indigo-text">About Company</h5>
                            <p>
                                <?php if (!empty($detail['company_description'])) {?>
                                <?php echo ucfirst($detail['company_description']); ?>
                                <?php }else{ ?>
                                <i class="md-grey-text"> None</i>
                                <?php } ?>
                            </p>
                        </div>
                        <!-- Details -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <ul class="list-unstyled">
                                    <!-- Spoken Languange -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text"> Spoken Language</h5>
                                        <h5 class="roboto-font">
                                            <?php echo !empty($detail['spoken_language']) ?  $detail['spoken_language'] : '<i class="md-grey-text"> None</i>'; ?>
                                        </h5>
                                    </li>
                                    <!-- Dress Code  -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text">Dress Code</h5>
                                        <h5 class="roboto-font ">
                                            <?php if(!empty($user_profile['dress_code'])){?>
                                            <?php echo !empty($dresscode) ? ucwords($dresscode) : '' ?>
                                            <?php }else{?>
                                            <i class="md-grey-text"> None</i>
                                            <?php } ?>
                                        </h5>
                                    </li>
                                    <!-- Benefits -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text">Benefit</h5>
                                        <h5 class="roboto-font ">
                                            <?php echo !empty($detail['benefits']) ? $detail['benefits'] : '<i class="md-grey-text"> None</i>'?>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <ul class="list-unstyled">
                                    <!-- Working Day & Time -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text"> Working Day & Time</h5>
                                        <h5 class="roboto-font">
                                            <?php if($detail['working_days_start'] != "" && $detail['working_days_end'] != ""){?>
                                            <?php echo ucwords($detail['working_days_start'].' - '.$detail['working_days_end']);?>
                                            <?php if($detail['working_hours_start'] != "" && $detail['working_hours_end'] != ""){?> (
                                            <?php echo $detail['working_hours_start'].' - '.$detail['working_hours_end'];?> )
                                            <?php }else{?>
                                            <i class="md-grey-text"> Working Time has not set.</i>
                                            <?php }?>
                                            <?php }else{?>
                                            <i class="md-grey-text"> None</i>
                                            <?php }?>
                                        </h5>
                                    </li>
                                    <!-- Company Website -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text"> Company Website</h5>
                                        <h5 class="roboto-font font-weight-300">
                                            <?php if(!empty($detail['url'])){?>
                                            <a href="<?php echo $detail['url']?>" target="_blank">
                                                <?php echo $detail['url']?>
                                            </a>
                                            <?php }else{?>
                                            <i class="md-grey-text"> None</i>
                                            <?php }?>
                                        </h5>
                                    </li>
                                    <!-- Company Email -->
                                    <li>
                                        <h5 class="mb-10 font-weight-600 md-indigo-text"> Company Email</h5>
                                        <h5 class="roboto-font font-weight-300">
                                            <?php echo !empty($detail['email']) ? $detail['email'] : '<i class="md-grey-text"> None</i>'; ?>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Tab : Contact Info -->
                    <div class="tab-pane " id="tab_contact_info">
                        <?php 
                                    $addr = json_decode($detail['address']); 
                                    if (!empty($addr)) { ?>
                        <ul class="list-unstyled mt-25">
                            <?php foreach ($addr as $key => $value) {?>
                            <li>
                                <?php if(!empty($value->optionsRadios)) { ?>
                                <span class="label label-sm mb-20 label-<?php echo ($value->optionsRadios=='HQ') ? 'md-orange' : 'md-indigo' ?>">
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
                                    <h5>
                                        <i class="icon-pointer"></i>
                                        <?php echo $full_address; ?>
                                    </h5>
                                    <ul class="list-inline list-unstyled mx-0">
                                        <?php if(!empty($value->building_email)){ ?>
                                        <li>
                                            <h5>
                                                <i class="fa fa-envelope mr-5"></i>
                                                <?=$value->building_email != ""?$value->building_email:"Not provided"; ?>
                                            </h5>
                                        </li>
                                        <?php } if(!empty($value->building_phone)){ ?>
                                        <li>
                                            <h5>
                                                <i class="fa fa-phone mr-5"></i>
                                                <?=$value->building_phone != ""?$value->building_phone:"Not provided"; ?>
                                            </h5>
                                        </li>
                                        <?php } if(!empty($value->building_fax)){ ?>
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
                        <?php }else{ ?>
                        <div class="portlet p-150 md md-grey-lighten-5">
                            <div class="portlet-body text-center">
                                <i class="icon-pointer font-grey-mint font-40 mb-20"></i>
                                <h4 class="text-center font-weight-500 font-grey-mint">Location Not Found!</h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<!-- BEGIN MODAL : Edit Company Info -->
<div class="modal fade" id="modal_edit_company" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-full ">
        <div class="modal-content portlet light ">
            <!--  Nav Tab  -->
            <div class="portlet-title tabbable-line tabbable-tabdrop mb-0 ">
                <div class="caption">
                    <i class="icon-pencil"></i>
                    <span class="caption-subject text-capitalize">Edit Company Profile</span>
                </div>
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_edit_about" data-toggle="tab">About Company</a>
                    </li>
                    <li>
                        <a href="#tab_edit_add_info" data-toggle="tab">Additional Info </a>
                    </li>
                    <li>
                        <a href="#tab_edit_contact_info" data-toggle="tab">Location Info </a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Tab Edit About  -->
                <div class="tab-pane active form" id="tab_edit_about">
                    <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_profile" class="form-horizontal ">
                        <div class="modal-body form-body ">
                            <!-- <div class="scroller height-640-sm height-300" data-always-visible="1" data-rail-visible1="1"> -->
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <!-- Company Name -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Name</label>
                                        <input type="text" class="form-control " name="company_name" placeholder="Your company name" value="<?php echo !empty($detail['company_name']) ? $detail['company_name'] : ''; ?>" required>
                                        <!--<span class="help-block small">Company Full Name </span>-->
                                    </div>

                                    <!--About Company  -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">About Company</label>
                                        <textarea class="form-control autosizeme" name="about_company" rows="5" placeholder="Summarize about your company."><?php echo !empty($detail['company_description']) ? $detail['company_description'] : ''; ?></textarea>
                                        <!-- <input type="text" class="form-control " placeholder="Summarize about your company"> -->
                                        <!-- <span class="help-block small">Company Full Name </span> -->
                                    </div>

                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Social Account</label>
                                        <div class="mt-repeater">
                                            <div data-repeater-list="group-b">
                                                <?php if (!empty($social)) {
                                                    foreach ($social as $key => $value) {?>
                                                <div data-repeater-item class="row mt-10">
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                        <input type="text" placeholder="Add link to here" class="form-control" name="link" value="<?php echo $value['link']; ?>" /> </div>
                                                    <div class="col-md-4 col-xs-4 col-sm-4">
                                                        <select class="form-control" name="name" required>
                                                            <option value="" selected disabled>Select account type </option>
                                                            <option value="facebook" <?php echo ($value[ 'name']=='facebook' ) ? 'selected' : '' ?>>Facebook</option>
                                                            <option value="twitter" <?php echo ($value[ 'name']=='twitter' ) ? 'selected' : '' ?>>Twitter</option>
                                                            <option value="gplus" <?php echo ($value[ 'name']=='gplus' ) ? 'selected' : '' ?>>Google Plus</option>
                                                            <option value="linkedin" <?php echo ($value[ 'name']=='linkedin' ) ? 'selected' : '' ?>>LinkedIn</option>
                                                            <option value="instagram" <?php echo ($value[ 'name']=='instagram' ) ? 'selected' : '' ?>>Instagram</option>
                                                            <option value="youtube" <?php echo ($value[ 'name']=='youtube' ) ? 'selected' : '' ?>>Youtube</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-2">
                                                        <a href="javascript:;" data-repeater-delete class="btn btn-danger btn-sm vertical-top ">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php } }else{ ?>
                                                <div data-repeater-item class="row mt-10">
                                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                                        <input type="text" placeholder="Add link to here" class="form-control" name="link" /> </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
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
                                                    <div class="col-md-2 col-xs-2 col-sm-2">
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

                                <div class="col-md-5 col-sm-12">
                                    <!-- Company Registration Number -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Registration Number</label>
                                        <input type="text" class="form-control " name="company_registration_number" placeholder="012ABC-DEFGH34" value="<?php echo !empty($detail['company_registration_number']) ? $detail['company_registration_number'] : ''; ?>">
                                    </div>

                                    <!-- Company Email -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Email</label>
                                        <input type="text" class="form-control " name="email" placeholder="your@company.com" value="<?php echo !empty($detail['email']) ? $detail['email'] : ''; ?>" required>
                                    </div>

                                    <!-- Industry -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Industry</label>
                                        <select class="bs-select form-control" name="industry">
                                            <option value="" selected disabled>Select one </option>
                                            <?php foreach($industries as $value){?>
                                            <option value="<?php echo $value['id'];?>" <?php echo ($value[ 'id']==$detail[ 'company_industry_id']) ? 'selected' : '' ?>>
                                                <?php echo $value['name'];?>
                                            </option>
                                            <?php } ?>
                                        </select>

                                    </div>

                                    <!-- Corporate Website -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Corporate Websites</label>

                                        <input type="text" class="form-control" name="corporate_website" placeholder="Add link here" value="<?php echo !empty($detail['url']) ? $detail['url'] : ''; ?>">
                                    </div>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer form-action ">
                            <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                            <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Tab Edit Add Info -->
                <div class="tab-pane form" id="tab_edit_add_info">
                    <form method="POST" action="<?php echo base_url(); ?>employer/profile/edit_additional_info" class="form-horizontal ">
                        <div class="modal-body form-body ">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <!-- Company Size -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Company Size</label>
                                        <select class="bs-select form-control " name="company_size">
                                            <option value="">Select company size</option>
                                            <option value="1-50" <?php echo ($user_profile[ 'total_staff']=='1-50' ) ? 'selected' : ''; ?>>1 to 50 employee</option>
                                            <option value="51-100" <?php echo ($user_profile[ 'total_staff']=='51-100' ) ? 'selected' : ''; ?>>51 to 100 employee</option>
                                            <option value="> 100" <?php echo ($user_profile[ 'total_staff']=='> 100' ) ? 'selected' : ''; ?>>100 to above employee</option>
                                        </select>
                                    </div>

                                    <!-- Company Dress Code -->
                                    <div class="form-group form-md-checkboxes mx-0 ">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Dress Code</label>
                                        <div class="md-checkbox-inline">
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

                                    <!-- Benefits -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600"> Benefits</label>
                                        <textarea class="autosizeme form-control" rows="4" placeholder="Annual Leaves , Allowances , Medicalfee , Dental Fee ,Annual Trip" name="benefits"><?php echo !empty($user_profile['benefits']) ? $user_profile['benefits'] : ''; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">

                                    <!-- Working Hours -->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Working Hour</label>
                                        <br>
                                        <label for="">Day</label>
                                        <div class="m-grid">
                                            <div class="m-grid-col m-grid-col-md-5">
                                                <select class="bs-select form-control" name="day_start">
                                                    <option value="">Select Day Start</option>
                                                    <option value="monday" <?php echo ($detail[ 'working_days_start']=='monday' ) ? 'selected' : '' ?>>Monday</option>
                                                    <option value="tuesday" <?php echo ($detail[ 'working_days_start']=='tuesday' ) ? 'selected' : '' ?>>Tuesday</option>
                                                    <option value="wednesday" <?php echo ($detail[ 'working_days_start']=='wednesday' ) ? 'selected' : '' ?>>Wednesday</option>
                                                    <option value="thursday" <?php echo ($detail[ 'working_days_start']=='thursday' ) ? 'selected' : '' ?>>Thursday</option>
                                                    <option value="friday" <?php echo ($detail[ 'working_days_start']=='friday' ) ? 'selected' : '' ?>>Friday</option>
                                                    <option value="saturday" <?php echo ($detail[ 'working_days_start']=='saturday' ) ? 'selected' : '' ?>>Saturday</option>
                                                    <option value="sunday" <?php echo ($detail[ 'working_days_start']=='sunday' ) ? 'selected' : '' ?>>Sunday</option>
                                                </select>
                                            </div>
                                            <div class="m-grid-col m-grid-col-md-2 m-grid-col-center">
                                                <h5>to</h5>
                                            </div>
                                            <div class="m-grid-col m-grid-col-md-5">
                                                <select class="bs-select form-control" name="day_end">
                                                    <option value="">Select Day End</option>
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
                                        <hr>
                                        <label for="">Time</label>
                                        <div class="m-grid">
                                            <!-- Start Time -->
                                            <div class="m-grid-col m-grid-col-md-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control timepicker timepicker-no-seconds" placeholder="Start At" name="work_hour_start" value="<?php echo $detail['working_hours_start'] != " " ? $detail['working_hours_start'] : '' ?>">
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
                                                    <input type="text" class="form-control timepicker timepicker-no-seconds" placeholder="End At" name="work_hour_end" value="<?php echo $detail['working_hours_end'] != " " ? $detail['working_hours_end'] : '' ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn default" type="button">
                                                            <i class="fa fa-clock-o"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Spoken Language-->
                                    <div class="form-group mx-0">
                                        <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Spoken Language</label>
                                        <select class="bs-select form-control " multiple name="language[]" id="spoken_language">
                                            <?php foreach ($language as $key => $value) {?>
                                            <?php foreach ($spoken_language as $spoken_key => $spoken_value) {?>
                                            <option <?php echo ($spoken_value==$value[ 'name']) ? 'selected' : '' ?>>
                                                <?php echo $value['name']; ?>
                                            </option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer form-actions ">
                            <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                            <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Tab Edit Contact Info -->
                <div class="tab-pane form " id="tab_edit_contact_info">
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
                                                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600 ">Address</label>
                                                <input type="text" class="form-control" placeholder="  Unit / Lot , Road ," name="contact_info[<?= $key; ?>][building_address]" id="building_address<?= $key; ?>" value="<?php echo $value->building_address; ?>">
                                            </div>
                                        </div>
                                        <!-- City & State-->
                                        <!-- Postcode & Country -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">City</label>
                                                    <input type="text" class="form-control " name="contact_info[<?= $key; ?>][building_city]" id="building_city<?= $key; ?>" value="<?php echo $value->building_city; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">State</label>
                                                    <input type="text" class="form-control" name="contact_info[<?= $key; ?>][building_state]" id="building_state<?= $key; ?>" value="<?php echo $value->building_state; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Postcode</label>
                                                    <input type="text" class="form-control" placeholder="Postcode" name="contact_info[<?= $key; ?>][building_postcode]" id="building_postcode<?= $key; ?>" value="<?php echo $value->building_postcode; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <!-- <label class="control-label">Country</label> -->
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Country</label>

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
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Latitude</label>

                                                    <input type="text" name="contact_info[<?= $key; ?>][building_latitude]" id="building_latitude<?= $key; ?>" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_latitude; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Longititude</label>
                                                    <input type="text" name="contact_info[<?= $key; ?>][building_longitude]" id="building_longitude<?= $key; ?>" class="form-control" placeholder="1.643604 " value="<?php echo $value->building_longitude; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_phone]" id="building_phone<?= $key; ?>" value="<?php echo $value->building_phone; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Fax Number</label>
                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[<?= $key; ?>][building_fax]" id="building_fax<?= $key; ?>" value="<?php echo $value->building_fax; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Office Type and Remove Button -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Office Type</label>

                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios4" value="HQ" <?php echo (!empty($value->optionsRadios) && $value->optionsRadios=='HQ') ? 'checked' : '' ?> name="HQ"> Headquarter
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="contact_info[<?= $key; ?>][optionsRadios]" id="optionsRadios5" value="branch" <?php echo (!empty($value->optionsRadios) && $value->optionsRadios=='branch') ? 'checked' : '' ?>> Branch
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Email Address</label>
                                                    <input type="text" class="form-control " placeholder="hello@xremo.com" name="contact_info[<?= $key; ?>][building_email]" id="building_email<?= $key; ?>" value="<?php echo $value->building_email; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pull-right my-50">
                                                <a href="javascript:;" class="btn btn-danger btn-block delContact">
                                                    <i class="fa fa-close"></i> Remove
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
                                                <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600 ">Address</label>
                                                <input type="text" class="form-control" placeholder="  Unit / Lot , Road ," name="contact_info[0][building_address]" id="building_address">
                                            </div>
                                        </div>
                                        <!-- City & State-->
                                        <!-- Postcode & Country -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">City</label>
                                                    <input type="text" class="form-control " name="contact_info[0][building_city]" id="building_city">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label  md-grey-darken-3-text mb-10 font-weight-600">State</label>
                                                    <input type="text" class="form-control" name="contact_info[0][building_state]" id="building_state">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Postcode</label>
                                                    <input type="text" class="form-control" placeholder="Postcode" name="contact_info[0][building_postcode]" id="building_postcode">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <!-- <label class="control-label">Country</label> -->
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Country</label>

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
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Latitude</label>

                                                    <input type="text" name="contact_info[0][building_latitude]" id="building_latitude" class="form-control" placeholder="1.643604 ">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Longititude</label>
                                                    <input type="text" name="contact_info[0][building_longitude]" id="building_longitude" class="form-control" placeholder="1.643604 ">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[0][building_phone]" id="building_phone">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Fax Number</label>
                                                    <input type="text" class="form-control" placeholder="01 -23459557 " name="contact_info[0][building_fax]" id="building_fax">
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Office Type and Remove Button -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mx-0">
                                                    <label class="control-label md-grey-darken-3-text mb-10 font-weight-600">Office Type</label>

                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="contact_info[0][optionsRadios]" id="optionsRadios4" value="HQ" name="HQ" checked="checked"> Headquarter
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="contact_info[0][optionsRadios]" id="optionsRadios5" value="branch"> Branch
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
                                                <a href="javascript:;" class="btn btn-danger btn-block delContact">
                                                    <i class="fa fa-close"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <a href="javascript:;" class="btn btn-info mb-30" id="addOffice" data-val="<?= count($company_address); ?>">
                                    <i class="fa fa-plus"></i> Add new office</a>
                            </div>
                            <div class="modal-footer form-actions">
                                <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                                <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Save</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN MODAL : Edit Default Picture -->
<div class="modal fade " id="modal_edit_default_picture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Default Picture</h4>
            </div>
            <form action="<?php echo base_url(); ?>employer/profile/upload_company_logo" method="POST" class=" form " enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="form-group mx-0 ">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 565px; height: 300px;"> </div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_logo"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>

                        </div>
                        <div class="clearfix mt-30">
                            <span class="label label-success label-sm">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>

                    </div>
                </div>
                <div class="modal-footer md-grey-lighten-5">
                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                    <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Save</button>
                </div>
            </form>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<!-- BEGIN MODAL : Edit Header Picture -->
<div class="modal fade  " id="modal_edit_header_picture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Edit Header Picture</h4>
            </div>
            <form action="<?php echo base_url(); ?>employer/profile/upload_company_header" method="POST" class=" form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group  mx-0">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:560px; height: 300px;"> </div>
                            <span class="btn btn-md-darkblue btn-outline btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="company_header"> </span>
                            <a href="javascript:;" class="btn btn-md-red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                        <div class="clearfix mt-20">
                            <span class="label label-success label-sm">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                    </div>
                </div>

                <div class="modal-footer md-grey-lighten-5">
                    <a data-dismiss="modal" aria-hidden="true" class="btn btn-outline btn-md-indigo  letter-space-xs">Cancel</a>
                    <button type="submit" class="btn btn-md-indigo  btn-md letter-space-xs px-100">Save</button>
                </div>
            </form>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
