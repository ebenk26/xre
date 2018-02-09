<!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content" style="min-height: 598px;">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Calendar
                            <small>calendar page</small>
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
                <!-- END PAGE HEAD-->

                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit bordered calendar">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <!-- Calendar -->
                                    <div class="col-md-6 col-sm-12">
                                        <div id="fullcalendar" class="has-toolbar"> </div>

                                    </div>
                                    <!-- Event / Agenda / Upcoming Interview -->
                                    <div class="col-md-6 col-sm-12 no-space">
                                        <div class="portlet  md-shadow-none light m-0">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-notebook font-grey-gallery"></i>
                                                    <span class="caption-subject bold font-grey-gallery font-24-xs"> Event </span>
                                                    <!-- <span class="caption-helper">more samples...</span> -->
                                                </div>
                                                <div class="tools">
                                                    <!-- <a href="" class="collapse" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="reload" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="fullscreen" data-original-title="" title=""> </a> -->
                                                    <!-- <a href="" class="remove" data-original-title="" title=""> </a> -->
                                                </div>
                                            </div>
                                            <!-- @if empty -->
                                            <div class="portlet-body hidden">
                                                <div class="portlet md-shadow-none">
                                                    <div class="portlet-body text-center p-6">
                                                        <h3 class="font-weight-500 text-center font-grey-cascade mb-0"> No upcoming event </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- @else -->
                                            <div class="portlet-body">
                                                <div class="scroller mt-height-550-xs " data-always-visible="1" data-rail-visible1="1">

                                                <?php foreach ($invitation as $key => $value): ?>
                                                    <!-- List 1 -->
                                                    <div class="m-grid">
                                                        <div class="m-grid-col m-grid-col-xs-2 md-yellow accent-1 m-grid-col-center m-grid-col-middle">
                                                            <h3 class="mt-3 font-weight-700"><?php echo date('d', strtotime($value['start_date'])); ?></h3>
                                                            <h5 class="font-26-xs mb-3 roboto-font"><?php echo date('M', strtotime($value['start_date'])); ?></h5>
                                                        </div>
                                                        <div class="m-grid-col m-grid-col-xs-10">
                                                            <ul class="list-unstyled ml-3">
                                                                <li>
                                                                    <h4 class="font-weight-600"><?php echo $value['job_name'] ?> </h4>
                                                                </li>
                                                                <li class="">
                                                                    <h5 class="">
                                                                        <i class="icon-clock mr-2"></i><?php echo date('l', strtotime($value['start_date'])); ?> , <?php echo date('h', strtotime($value['start_date'])); ?> <?php echo date('A', strtotime($value['start_date'])); ?> - <?php echo date('h', strtotime($value['end_date'])); ?> <?php echo date('A', strtotime($value['end_date'])); ?></h5>
                                                                </li>
                                                                <li>
                                                                    <a href="#modal-info" data-toggle="modal" class="btn btn-xs btn-md-indigo vertical-middle">More Info</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>                                                    
                                                    <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-hidden="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h4 class="modal-title">
                                                                        <i class="icon-briefcase mr-2"></i><?php echo $value['job_name'] ?> (<?php echo $value['company_name']; ?>)</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="scroller mt-height-600-xs" data-always-visible="1" data-rail-visible1="1">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Job Position
                                                                                </div>
                                                                                <div class="col-md-9 text-uppercase font-weight-600">
                                                                                    <?php echo $value['job_name'] ?>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Title
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <?php echo $value['title']; ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- From -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    From
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['start_date'])); ?> - <?php echo date('H:i', strtotime($value['start_date'])); ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- To -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    To
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <i class="icon-calendar mr-2"></i> <?php echo date('j F Y', strtotime($value['end_date'])); ?> - <?php echo date('H:i', strtotime($value['end_date'])); ?>
                                                                                </div>
                                                                            </li>
                                                                            <!-- Details -->
                                                                            <li>
                                                                                <div class="col-md-3 text-right font-weight-700">
                                                                                    Details
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <?php echo $value['description']; ?>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
        </div>

        <!-- END CONTENT -->