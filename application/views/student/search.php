<div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> Search Result of <small><?php echo $keyword; ?></small></h1>

                <!-- END PAGE HEADER-->

                <!-- version 1 -->
                <div class="row ">
                    <div class="col-xs-12">
                        <div class="portlet ">
                            <div class="portlet light ">
                                <!-- Tab Nav -->
                                <div class="portlet-title tabbable-line hidden">
                                    <div class="caption">
                                        <!-- <i class="icon-book-open md-white-text"></i> -->
                                        <!-- <span class="caption-subject font-weight-500 text-capitalize">User Profile</span> -->
                                    </div>
                                </div>
                                <!-- Tab Content -->
                                <div class="portlet-body ">

                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th class="col-md-1 text-center"> # </th>
                                                    <th class="col-md-6"> Job Post </th>
                                                    <th class="col-md-2 text-center"> Date Apply </th>
                                                    <th class="col-md-1 text-center"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($search_result as $key => $value) { ?>
                                                    <tr>
                                                        <td class="text-center"> <?php echo $value['id'] ?> </td>
                                                        <td class="media">

                                                            <div class="pull-left">
                                                                <img src="../assets/global/img/portfolio/600x600/01.jpg" class="avatar avatar-mini" alt="">
                                                            </div>
                                                            <div class="media-body">
                                                                <ul class="list-unstyled">
                                                                    <li class="font-24-xs font-weight-600"><?php echo $value['name'] ?></li>
                                                                    <li><a><?php echo $value['company_name'] ?></a></li>
                                                                </ul>
                                                            </div>


                                                        </td>
                                                        <td class="text-center"> <?php echo time_elapsed_string($value['created_at']); ?> </td>
                                                        <td class="text-center">
                                                            <a href="" class="btn btn-icon-only btn-danger">Apply</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>