        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->

                    <h1 class="page-title">Tracking
                        <!--<small>Here your job post should be</small>-->
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>administrator/student">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Tracking Voucher</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->

                <div class="portlet light">
                    <div class="portlet-title ">
                        <div class="caption font-green-sharp">
                            <i class="icon-briefcase font-green-sharp"></i>
                            <span class="caption-subject"> Tracking</span>
                            <!-- <span class="caption-helper">more samples...</span> -->
                        </div>
                        <div class="actions">
                            <a href="<?= base_url(); ?>administrator/tracking/export" class="btn btn-circle btn-md-indigo" data-toggle="modal">
                                <i class="fa fa-plus"></i> Export </a>                        
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover  order-column xremo_table">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Company </th>
                                    <th> Referral Code </th>
                                    <th> Student </th>
                                    <th> Profile Percentage </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($voucher as $key => $value): ?>
                                    <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $value['company_name'] ?></td>
                                            <td><?= $value['code'] ?></td>
                                            <td><?= $value['user'] ?></td>
                                            <td><?= $value['percent'] ?></td>
                                    </tr>                                        
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        
        