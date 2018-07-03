<!-- ===== Content ===== -->
        <div class="page-content-wrapper">
            <div class="page-content">

                <h1 class="page-title"> Candidate Bookmark
                    <a href="../employer/employer-searchcandidate.html" class="pull-right btn btn-md-indigo letter-space-xxs">
                        <i class="fa fa-plus fa-fw"></i>New Candidate</a>
                </h1>

                <div class="portlet light ">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="col-xs-1 text-center"> # </th>
                                    <th class="col-xs-9"> Candidate </th>
                                    <th class="col-xs-2 text-center"> </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($candidates_bookmark as $key => $value): ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"> <?php echo $i; ?> </td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left pt-10">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" alt="" class="avatar avatar-mini avatar-circle">
                                            </div>
                                            <div class="media-body">
                                                <h4><?= !empty($value['candidate']->fullname) ? $value['candidate']->fullname : 'Not Available'; ?></h4>
                                                <!-- Same thing like in search advanced -->
                                                <p class="mb-10">
                                                    <i class="icon-graduation mr-10"></i><?= !empty($value['academics']->university_name) ? $value['academics']->university_name : 'Not Available'; ?></p>
                                                    <p class="mb-10">
                                                    <i class="icon-briefcase mr-10"></i><?= !empty($value['experiences']->title) ? $value['experiences']->title : 'Not Available'; ?></p>
                                                <ul class="list-inline mt-ul-li-lr-0 p-0 m-0 mt-ul-li-tb-5">
                                                    <!-- Job Type -->
                                                    <li>
                                                        <p class="label label-md-blue label-sm font-weight-400"> <?= !empty($value['experiences']->employment_types) ? $value['experiences']->employment_types : 'Not Available'; ?></p>
                                                    </li>
                                                    <!-- Salary -->
                                                    <li>
                                                        <p class="label label-md-green label-sm font-weight-400"> <?= !empty($value['candidate']->expected_salary) ? $value['candidate']->expected_salary : 'Not Available'; ?> </p>
                                                    </li>
                                                    <!-- Location -->
                                                    <li>
                                                        <p class="label label-md-purple label-sm font-weight-400"> <?= !empty($value['candidate']->state) ? $value['candidate']->state : ''; ?> <?= !empty($value['candidate']->city) ? $value['candidate']->city : $value['candidate']->country; ?> </p>
                                                    </li>

                                                    <!-- Year Of Experience -->
                                                    <?php if(!empty($value['job_preference']->years_of_experience)) {?>
                                                    <li class="">
                                                        <p class="label label-md-yellow md-black-text label-sm font-weight-400"> <?= !empty($value['job_preference']->years_of_experience) ? $value['job_preference']->years_of_experience : 'Not Available'; ?> </p>
                                                    </li>
                                                    <?php } ?>
                                                    <!-- Postion Level -->
                                                    <?php if(!empty($value['job_preference']->position_level)) {?>
                                                    <li class="">
                                                        <p class="label label-md-deep-purple     label-sm font-weight-400"> <?= !empty($value['job_preference']->position_level) ? $value['job_preference']->position_level : 'Not Available'; ?> </p>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="my-25">
                                            <a href="" class="btn btn-md-cyan btn-icon-only mx-5 tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Download resume">
                                                <i class="icon-cloud-download"></i>
                                            </a>
                                            <a href="" class="btn btn-md-indigo mx-5 btn-icon-only tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="View Resume ">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-md-red mx-5 btn-icon-only tooltips" data-container="body" data-placement="top" data-html="true" data-original-title="Delete Candidate ">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade modal-open-noscroll " id="modal_view_summary" tabindex="-1" role="dialog" aria-hidden="false">
                </div>
            </div>
        </div>