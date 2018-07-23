<div class="page-content-wrapper">
    <div class="page-content">

        <!-- # Page Header -->
        <h1 class="page-title"> Application History
            <small>To kept track of your previous job application.</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo base_url().'student/dashboard'; ?>">
                        <?= !empty($language->site_home) ? $language->site_home : "Home" ?>
                    </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= !empty($language->site_application_history) ? $language->site_application_history : 'Application History'?>
                </li>
            </ul>
        </div>

        <!-- # Page Content -->
        <div class="portlet light ">
            <?php if (!empty($applications_history)) { ?>
            <div class="portlet-body pb-30 ">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-stripped table-hover">

                        <thead>
                            <tr class="text-uppercase">
                                <th class="col-md-1 text-center"> # </th>
                                <th class="col-md-6"> Job Post </th>
                                <th class="col-md-2 text-center"> Date Apply </th>
                                <th class="col-md-2 text-center"> Status </th>
                                <th class="col-md-1 text-center"> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; foreach ($applications_history as $key => $value) { ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $i; ?> </td>
                                <td class="media">
                                    <div class="pull-left">
                                        <!-- <?php echo $value['profile_photo']; ?> -->
                                        <img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG.'site/profile-pic.png'; ?>" alt="" class="avatar avatar-mini avatar-circle">
                                    </div>
                                    <div class="media-body">
                                        <ul class="list-unstyled">
                                            <li class="font-18 font-weight-600">
                                                <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']), '='); ?>"class="md-grey-darken-3-text" target="_blank">
                                                    <?php echo $value['name'] ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($value['company_id']), '='); ?>" target="_blank">
                                                    <?php echo $value['company_name'] ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php echo time_elapsed_string($value['apply_time']); ?> </td>
                                <td class="text-center ">
                                    <span class="badge badge-roundless badge-md-<?php echo ($value['applieds_status'] == 'WITHDRAW' || $value['applieds_status'] == 'REJECTED') ? 'red' : 'green'; ?>   ">
                                        <?php echo $value['applieds_status']; ?> </span>
                                </td>
                                <td class="text-center">
                                    <?php if($value['applieds_status'] != 'WITHDRAW'){?>
                                    <a href="#" class="btn btn-icon-only btn-md-red  dlt-history tooltips" data-id="<?php echo $value['job_id']; ?>" title="Withdraw" data-container="body" data-placement="left" data-original-title="Withdraw this job">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <?php } else {?>
            <!-- # Empty States -->
            <div class="portlet height-600-md height-550-sm height-450 light flex-center mb-0">
                <div class="portlet-body text-center">
                    <i class="icon-briefcase font-80-md font-70-sm font-60 md-grey-lighten-1-text mb-55-md mb-35-sm mb-15"></i>
                    <h5 class="text-center font-weight-600 md-grey-darken-2-text font-18-md font-16">Start searching your dream job.</h5>
                    <a href="<?php echo base_url(); ?>job/search" class="btn btn-md-indigo btn-block mt-30-md mt-25">
                        <i class="icon-magnifier mr-2"></i> Search Job</a>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>



    </div>
</div>
