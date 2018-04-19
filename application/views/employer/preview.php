<?php 
    $roles = $this->session->userdata('roles'); 
    $login = $this->session->userdata('id');
    $image = end($company_image);

    if (!empty($job->location)) {
        $location = json_decode($job->location, true);
        $location_map = json_decode($job->location);
    }
    $expired = strtotime($job->expiry_date) < strtotime(date('Y-m-d'));
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Bootstrap  -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Vendor Styles -->
    <link href="<?php echo base_url(); ?>assets/css/vendor/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/vendor/alertify.min.css" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link href="<?php echo base_url(); ?>assets/css/icon/themify.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon/simple-line-icons.min.css" rel="stylesheet" type="text/css">

    <!-- Global -->
    <link href="<?php echo base_url(); ?>assets/css/global/components.css" rel="stylesheet" type="text/css">
    <!-- Layout 8 -->
    <link href="<?php echo base_url(); ?>assets/css/layout8/layout8.css" rel="stylesheet" type="text/css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo ASSETS; ?>css/portfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/contact.min.css" rel="stylesheet" type="text/css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
    <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="<?php echo current_url();?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="XREMO Job Posting | <?php echo $job->name; ?>" />
    <meta property="og:description" content="<?php echo strip_tags($job->job_description); ?>" />
    <meta property="og:image" content="<?php echo IMG_STUDENTS; ?>xremo-logo-white.svg" />

    <title>Employer - Job Preview</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115543574-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-115543574-1');

    </script>
</head>

<body>
    <?php $this->load->view('site/header_content');?>

    <!--========== PROMO : VIEW JOB TITLE==========-->

    <div class="s-promo-block-v2 gradient-darkblue-v8 height-300" style="background: url(<?=base_url()?>assets/img/site/mainpagebanner.jpg) no-repeat fixed; z-index: -1; background-size:cover;">
        <div class="container g-ver-bottom-80 text-center">
            <h1 class="md-white-text font-weight-500 font-42 mb-20">
                <?php echo isset($job->name) ? $job->name: 'Job title';?> </h1>

            <p class="label label-md-green md-shadow-z-1 mr-10 font-17">
                <i class="fa fa-usd mr-5"></i>
                <?php echo $job->forex; ?>
                <?php echo $job->budget_min; ?> -
                <?php echo $job->forex; ?>
                <?php echo $job->budget_max; ?>
            </p>
            <p class="label label-md-red md-shadow-z-1 mr-10 font-17">
                <i class="icon-pointer mr-5"></i>
                <?php echo $this->session->userdata('country')?>
            </p>
            <!-- <span class="label label-md-blue-grey font-weight-500 md-shadow-z-1">
                        <i class="fa fa-building-o mr-5"></i>Company Industry</span> -->
            <p class="label label-md-blue md-shadow-z-1 mr-10 font-17">
                <i class="icon-briefcase mr-5"></i>
                <?php echo $job->employment_name ;?>
            </p>
            <p class="label label-md-purple md-shadow-z-1 mr-10 font-17">
                <!-- <i class="fa fa-sitemap mr-5"></i> -->
                <?php echo $job->position_name ;?>
            </p>

        </div>
    </div>
    <!--========== END PROMO : VIEW JOB TITLE==========-->

    <!--========== CONTENT ==========-->
    <div class="container ">
        <div class="row mx-0 mt-50">
            <!-- COL - Company / Job Description / Requirement / Nice To Have / Additional Info / Location -->
            <div class="col-md-9">
                <!-- Company -->
                <div class="row mb-40 mx-0">
                    <div class="media ">
                        <div class="pull-left">
                            <img src="<?php echo !empty($image['name']) ? IMG_EMPLOYERS.$image['name'] : IMG.'/site/xremo-logo-blue.svg'; ?>" alt="" class="avatar avatar-small">
                        </div>
                        <div class="media-body py-10">
                            <h6>
                                <i class="fa fa-building-o mr-5"></i>
                                <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($user_profile['id_users']), '='); ?>" class="font-weight-500">
                                    <?php echo $user_profile['company_name'];?>
                                </a>
                            </h6>
                            <h6>
                                <?php if (!empty($location)): ?>
                                <?php
                                    //$full_address = $location['address'] != ""?$location['address'].", ":"";
                                    $full_address1 = $location['city'] != ""?$location['city'].", ":"";
                                    //$full_address .= $location['postcode'] != ""?$location['postcode'].", ":"";
                                    $full_address1 .= $location['state'] != ""?$location['state'].", ":"";
                                    //$full_address .= $location['country'] != ""?$location['country'].", ":"";
                                    $full_address1 = $full_address1 != ""?substr($full_address1, 0, -2):"";
                                ?>
                                    <i class="icon-pointer"></i>
                                    <?php echo $full_address1;?>
                                    <?php endif ?>
                            </h6>
                            <h6 class="label label-md-blue-grey font-weight-500 label-sm">
                                <i class="fa fa-industry mr-5"></i>
                                <?php echo $user_profile['industry'];?>
                            </h6>
                            <h6 class="label label-md-red font-weight-500 label-sm  mx-10">
                                <i class="icon-calendar"></i>
                                Expired on
                                <?php echo date('j F Y', strtotime($job->expiry_date));?>
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text  text-uppercase font-17">JOB DESCRIPTION </h5>
                    <hr class="my-10 width-70 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p class=" font-grey-gallery font-15">
                        <?php echo $job->job_description != ""?$job->job_description:"Not Provided";?>
                    </p>
                </div>

                <!-- Requirement -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text  font-16 text-uppercase letter-space-xs">Requirement</h5>
                    <hr class="my-10 width-30 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p class=" font-grey-gallery ">
                        <?php echo $job->qualifications != ""?$job->qualifications:"Not Provided";?>
                    </p>
                </div>

                <!-- Nice To Have -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text font-16 text-uppercase letter-space-xs">Nice To Have</h5>
                    <hr class="my-10 width-30 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p class=" font-grey-gallery ">
                        <?php echo $job->other_requirements != ""?$job->other_requirements:"Not Provided";?>
                    </p>
                </div>

                <!-- Benefits -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text font-16 text-uppercase letter-space-xs">Benefits</h5>
                    <hr class="my-10 width-30 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p class="font-grey-gallery ">
                        <?php echo $user_profile['benefits'] != ""?$user_profile['benefits']:"Not Provided";?>
                    </p>
                </div>

                <!-- Additional Info -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text font-16 text-uppercase letter-space-xs">Additional Info</h5>
                    <hr class="my-10 width-30 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p class=" font-grey-gallery ">
                        <?php echo $job->additional_info != ""?$job->additional_info:"Not Provided";?>
                    </p>
                </div>

                <!-- Location -->
                <?php if (!empty($location)): ?>
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text font-16 text-uppercase letter-space-xs">Location</h5>
                    <hr class="my-10 width-30 hor-divider-solid-medium mx-0 border-md-indigo">
                    <p>
                        <i class="icon-pointer mr-5"></i>
                        <?php
                            $full_address = $location['address'] != ""?$location['address'].", ":"";
                            $full_address .= $location['city'] != ""?$location['city'].", ":"";
                            $full_address .= $location['postcode'] != ""?$location['postcode'].", ":"";
                            $full_address .= $location['state'] != ""?$location['state'].", ":"";
                            $full_address .= $location['country'] != ""?$location['country'].", ":"";
                            $full_address = $full_address != ""?substr($full_address, 0, -2):"";
                        ?>
                            <?php echo $full_address; ?>.
                    </p>
                    <!-- <hr class="my-2 mt-width-100-xs border-md-indigo"> -->
                    <!-- <section class="s-google-map">
                        <div id="js-google-container" class="s-google-container g-height-400-xs"></div>
                    </section> -->
                    <div id="gmapbg" class="s-google-map" style="height: 300px;"></div>
                </div>
                <?php endif ?>
            </div>
            <!-- COL - Button / Share / List of Job Available from that company -->
            <div class="col-md-3">

                <!-- Button -->
                <?php if ($roles == 'employer' && ($job->status !='expired' && $job->status != 'post') && !$expired): ?>
                <div class="row mb-30 mx-0">
                    <button type="submit" id="post_job" data-id='<?php echo $job->id; ?>' class=" btn btn-block btn-md-orange  letter-space-xs py-20 mt-sweetalert text-uppercase font-18 font-weight-600" data-title="Do you agree to post this job?"
                        data-type="info" data-allow-outside-click="true" data-confirm-button-text="Yes, I agree" data-confirm-button-class="btn-info">
                        <i class="icon-book-open mr-5 "></i>Post</button>

                    <a href="<?php echo base_url(); ?>employer/job_board/#modal_edit_jobpost_<?php echo $job->id;?>" target="_blank" class=" py-20 btn btn-block btn-md-darkblue text-uppercase  font-18 font-weight-600 letter-space-xs">
                        <i class="icon-pencil mr-5 "></i>Edit</a>
                </div>
                <?php endif ?>

                <?php if (($roles == 'student' || $roles =='jobseeker') && $job->status == 'post') :?>
                <!-- Button -->
                <div class="row mb-30 mx-0">
                    <?php if(strtotime(date('Y-m-d')) > strtotime($job->expiry_date)){?>
                    <a class=" btn btn-block btn-md-orange ">
                        <i class="icon-info mr-5 "></i>Expired Job Vacancy</a>
                    <?php }else{?>
                    <?php if($applied == null){?>
                    <a href="#modal_job_apply" data-toggle="modal" class=" btn btn-block btn-md-orange ">
                        <i class="icon-note mr-5 "></i>Apply This Job</a>
                    <?php }else{?>
                    <a class=" btn btn-block btn-md-orange ">
                        <i class="icon-info mr-5 "></i>
                        <?=$applied->status?>
                    </a>
                    <?php }}?>
                    <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($user_profile['id_users']), '='); ?>" target="_blank" class=" btn btn-block btn-md-darkblue ">
                        <i class="fa fa-building-o mr-5 "></i>View Company</a>
                </div>

                <!-- Share To -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text  mb-2 font-16 text-uppercase letter-space-xs">Share Job</h5>
                    <ul class="list-unstyled g-ul-li-tb-5-xs mb-0-xs list-inline">
                        <li>
                            <a href="https://www.youtube.com/channel/UCMFZ8a2QlaWHhPrPf2CURSw" data-original-title="youtube" class="social-icon social-icon-color youtube">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo !empty($user_profile['overview']['name']) ?  $user_profile['overview']['name'] : 'XREMO'; ?> Profile on Xremo <?= XREMO_URL; ?><?= uri_string(); ?>"
                                target="_blank" data-original-title="twitter" class="social-icon social-icon-color twitter share-tw"> </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= XREMO_URL; ?><?= uri_string(); ?>&amp;src=sdkpreparse" data-layout="button" data-size="small" data-mobile-iframe="false" target="_blank" data-original-title="facebook"
                                class="social-icon social-icon-color facebook share-fb fb-share-button "></a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com/shareArticle?url=<?= XREMO_URL; ?><?= uri_string(); ?>" target="_blank" data-original-title="linkedin" class="social-icon social-icon-color linkedin share-tw"></a>
                        </li>
                        <li>
                            <a <a href="https://plus.google.com/share?url=<?= XREMO_URL; ?><?= uri_string(); ?>" target="_blank" data-original-title="googleplus" class="social-icon social-icon-color googleplus share-gplus">
                            </a>
                        </li>
                    </ul>

                </div>

                <!-- URL  -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text  mb-10 font-16 text-uppercase letter-space-xs">Job Url</h5>
                    <div class="mt-clipboard-container px-0 py-5">
                        <div class="input-group">
                            <input type="text" id="clipboard" class="form-control" value="<?php echo base_url().uri_string(); ?>" />
                            <span class="input-group-btn-vertical">
                                <a href="javascript:;" class="btn btn-md-cyan mt-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboard">
                                    <i class="icon-note"></i> Copy Url</a>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- More From -->
                <div class="row mb-20 mx-0">
                    <h5 class="font-weight-600 md-darkblue-text  mb-10 font-16 text-uppercase letter-space-xs">More From
                        <a href="<?php echo base_url(); ?>profile/company/<?php echo rtrim(base64_encode($user_profile['id_users']), '='); ?>" class="md-orange-text" target="_blank">
                            <?php echo $user_profile['company_name']; ?>
                        </a>
                    </h5>

                    <ul class="list-group list-borderless">
                        <?php foreach ($more_jobs as $key => $value): $address=json_decode($value['location']); ?>
                        <li class="list-group-item px-0 py-1">
                            <a class="md-orange-text-hover" href="<?php echo base_url(); ?>job/details/<?= rtrim(base64_encode($value['id']), '='); ?>" target="_blank">
                                <p class=" my-0 font-15 font-weight-500 md-orange-text-hover ">
                                    <?php echo $value['name']; ?>
                                    <small class="font-weight-400">[
                                        <?php echo $value['employment_name'] ?>]</small>
                                </p>

                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>

                </div>
                <?php endif; ?>

                <?php if (empty($login)) : ?>
                <!--<div class="row mb-5 mx-0">
                        <a href="<?php echo base_url() ?>login" target="_blank" class=" btn btn-block btn-md-darkblue ">
                            Login</a>
                    </div>-->
                <?php endif; ?>


            </div>
        </div>


        <!-- Modal Job Apply-->
        <div class="modal fade " id="modal_job_apply" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class=" mb-0">Short Description About Yourself</h5>
                    </div>
                    <form action="<?php echo base_url(); ?>student/dashboard/applied" method="POST" class="form form-horizontal">
                        <div class="modal-body  ">
                            <div class="media ">
                                <div class="pull-left">
                                    <img src="<?php echo !empty($applicant['img']) ? IMG_STUDENTS.$applicant['img'] : IMG_STUDENTS.'profile-pic.png'; ?>" alt="" class="avatar avatar-mini avatar-circle">
                                </div>
                                <div class="media-body">
                                    <h6 class="my-5 md-darkblue-text font-weight-500 ">
                                        <?php $student = $this->session->userdata('name'); echo !empty($student) ? $student : ''; ?>
                                        <!-- <small class="">
                                                <i class="icon-pointer"></i>
                                                <?php $country = $this->session->userdata('country'); echo !empty($country) ? $country : ''; ?>
                                            </small> -->
                                    </h6>
                                    <p class="text-none">Apply for position
                                        <strong class="text-capitallize">
                                            <?php echo $job->name; ?>
                                        </strong>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group text-left mx-0 mb-10">
                                <textarea name="coverletter" id="" class="form-control " rows="10" placeholder="Describe yourself and why we should hire you? Not more than 300 words"></textarea>
                                <input type="hidden" name="job_id" value="<?= $job_id; ?>">
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <a href="" data-dismiss="modal" class="btn btn-outline btn-md-indigo">Cancel</a>
                            <button type="submit" class="btn btn-md-indigo ">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!--========== END CONTENT ==========-->

    <?php $this->load->view('main/footer_content');?>

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->

    <!-- BEGIN CORE PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-v1-12-4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>

    <!--//REMOVE
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.wow.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
	-->

    <!-- General Components and Settings -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global/app.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/layout8/layout8.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>portfolio-3-col.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>wow.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>clipboard.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>components-clipboard.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    <script src="<?php echo JS_EMPLOYER; ?>sweetalert.min.js" type="text/javascript"></script>
    <link href="<?php echo CSS_EMPLOYER; ?>sweetalert.css" rel="stylesheet" type="text/css">

    <script>
        $(document).ready(function () {
            $('#post_job').click(function () {
                var del = $(this).attr('data-id');
                swal({
                        title: "Do you agree to post this job?",
                        type: "info",
                        confirmButtonText: "Yes, I agree",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "<?php echo base_url();?>employer/job_board/post_job",
                                method: "POST",
                                data: {
                                    post_id: parseInt(del),
                                },
                                success: function (response) {
                                    swal("Success", "Job Has been posted.", "success");
                                    window.location.replace('<?php echo base_url();?>employer/dashboard/');
                                }
                            })
                        } else {
                            swal("Cancelled", "Post a job has been cancelled", "error");
                        }
                    }
                );
            });

            <?php if($this->session->flashdata('msg_success')){ ?>
            alertify.success('<?php echo $this->session->flashdata('
                msg_success '); ?>', 'success', 5);
            <?php } ?>
            <?php if($this->session->flashdata('msg_failed')){ ?>
            alertify.error('<?php echo $this->session->flashdata('
                msg_failed '); ?>', 'error', 5);
            <?php } ?>
        });

    </script>

    <script>
        <?php if (!empty($job->location)) {?>

        function initMap() {
            var latLang = {
                lat: <?php echo $location_map->latitude; ?>,
                lng: <?php echo $location_map->longitude; ?>
            };
            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('gmapbg'), {
                center: latLang,
                zoom: 8
            });

            var marker = new google.maps.Marker({
                map: map,
                position: latLang,
                title: '<?php echo $user_profile['
                company_name '];?>'
            });
        }
        <?php }?>

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5IHxM-F43CGvNccBU_RK8b8IFanhbh8M&callback=initMap" async defer></script>

    <style type="text/css">
        #at4-share {
            display: none !important;
        }

    </style>
</body>

</html>
