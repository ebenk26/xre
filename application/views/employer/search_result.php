<?php if(!empty($searchResult)) {?>
<div class="row" style="display: flex;flex-wrap: wrap;">
    <?php
        foreach ($searchResult as $value)
        {
    ?>
            <div class="col-md-4">
                <div class="panel view overlay border-none">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h4 class="font-weight-600 text-uppercase">
                                    <a><?= isset($value[0]->fullname) ? $value[0]->fullname : 'None'; ?></a>
                                </h4>
                            </div>
                            <div class="media-right">
                                <img src="../../assets/global/img/xremo/profile-pic.png" class="avatar avatar-mini avatar-circle" alt="">
                            </div>
                        </div>
                        <h5>
                            <?php if(isset($value[0]->title) && !empty($value[0]->title)) {?>
                                    <!-- if experience exist in resume show -->
                                    <i class="icon-briefcase mr-10"></i> 
                                    <?= $value[0]->title; ?>
                                    <br/>
                            <?php }else{ ?>
                                    <!-- else show latest academic with qualifications in what fields study -->
                                    <i class="icon-graduation mr-10"></i>
                                    <?= isset($value[0]->university_name) ? $value[0]->university_name : 'None'; ?>
                                    <br/>
                        </h5>
                            <?php } ?>
                        <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                            <!-- Job Type -->
                            <!-- <li>
                                <p class="label label-md-blue label-sm font-weight-400"> Job Type</p>
                            </li> -->

                            <?php if(!empty($value[0]->expected_salary)) {?>
                                <!-- Salary -->
                                <li>
                                    <p class="label label-md-green label-sm font-weight-400">
                                        <?= isset($value[0]->expected_salary) ? number_format($value[0]->expected_salary,0,',','.') : 'None'; ?>
                                    </p>
                                </li>
                            <?php } ?>

                            <?php if(!empty($value[0]->location)) {?>
                                <!-- Location -->
                                <li>
                                    <p class="label label-md-purple label-sm font-weight-400">
                                        <?= isset($value[0]->location) ? $value[0]->location : 'None'; ?>
                                    </p>
                                </li>
                            <?php } ?>

                            <?php if(!empty($value[0]->start_date) && !empty($value[0]->end_date)) {?>
                                <!-- Year Of Experience -->
                                <li class="">
                                    <p class="label label-md-yellow md-black-text label-sm font-weight-400">
                                        <?php
                                            $endDate = in_array($value[0]->end_date,['0000-00-00','',NULL]) ? date('Y-m-d') : $value[0]->end_date;
                                            $start_date = new DateTime($value[0]->start_date);
                                            $end_date   = new DateTime($endDate);

                                            $diff = $end_date->diff($start_date);

                                            if($diff->y > 0)
                                            {
                                                $yOe = $diff->y > 1 ? $diff->format('1 Year to %y Year') : $diff->format('%y years');
                                            }
                                            else
                                            {
                                                if($diff->m > 0)
                                                {
                                                    $yOe = $diff->format('%m Month');
                                                }
                                                else
                                                {
                                                    $yOe = '1 Month';
                                                }
                                            }

                                            echo $yOe;
                                        ?>
                                    </p>
                                </li>
                            <?php } ?>
                            <!-- Postion Level -->
                            <!-- <li class="">
                                <p class="label label-md-deep-purple     label-sm font-weight-400"> Senior </p>
                            </li> -->
                        </ul>
                    </div>
                    <div class="mask mdo-white-v8 flex-center">
                        <?php
                            if($value[0]->is_shortlisted == 0)
                            {
                        ?>
                                <!-- If already add delete button -->
                                <a href="" class="btn btn-md-green  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Shortlist Candidate">
                                    <i class="fa fa-plus "></i>
                                </a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <!-- else by default -->
                                <a href="" class="btn btn-md-amber  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="This candidate already exist in your bookmark.">
                                    <i class="fa fa-check "></i>
                                </a>
                        <?php
                            }
                        ?>
                        <!--  -->
                        <a href="" class="btn btn-md-indigo  letter-space-xs mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume">
                            <i class="fa fa-eye "></i>
                        </a>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
</div>
<?php } ?>