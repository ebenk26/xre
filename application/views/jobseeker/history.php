<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Application History </h1>
        <!-- END PAGE HEADER-->


        <div class="portlet light ">
        <!-- IF NOT EMPTY -->
            <?php if (!empty($applications_history)) { ?>
            <div class="portlet-body py-20 ">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="uppercase">
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
                                        <!--<img src="<?php echo IMG_EMPLOYER?><?=$value['profile_photo']?>" class="avatar avatar-mini" alt="">-->
                                        <img src="<?php echo !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG.'site/profile-pic.png'; ?>" alt="" class="avatar avatar-mini avatar-circle">
                                    </div>
                                    <div class="media-body">
                                        <ul class="list-unstyled">
                                            <li class="font-18 font-weight-600">
                                                <a href="<?php echo base_url(); ?>job/details/<?php echo rtrim(base64_encode($value['id']), '='); ?>" style="color:grey;" target="_blank">
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
                                <td class="text-center">
                                    <span class="label label-sm label-md-<?php echo ($value['applieds_status'] == 'WITHDRAW' || $value['applieds_status'] == 'REJECTED') ? 'red' : 'green'; ?>   ">
                                        <?php echo $value['applieds_status']; ?> </span>
                                </td>
                                <td class="text-center">
                                    <?php if($value['applieds_status'] != 'WITHDRAW'){?>
                                    <a href="#" class="btn btn-icon-only btn-danger dlt-history" data-id="<?php echo $value['job_id']; ?>" title="Withdraw">
                                        <i class="icon-trash"></i>
                                    </a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- EMPTY STATE-->
            <?php } else {?>
            <div class="portlet p-120 md-grey-lighten-5 light mt-40 mx-60">
                <div class="portlet-body ">
                    <h2 class="text-center font-weight-500 md-indigo-text mt-50"> Oh no ! You haven't apply for any jobs yet. </h2>
                    <h5 class="text-center font-18 font-grey-cascade mt-30">How about start to search job and apply for it! </h5>
                    <div class="width-300 center-block mt-30">
                        <a href="<?php echo base_url(); ?>job/search" class="btn btn-outline btn-md-indigo btn-block mb-50">
                            <i class="icon-magnifier mr-2"></i> Search Job</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>



    </div>
</div>
