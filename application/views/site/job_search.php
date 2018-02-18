<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Job | Search</title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all" rel="stylesheet" type="text/css" />

    <!-- Vendor Styles -->
    <link href="<?php echo ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/themify/themify.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Metronic -->
    <link href="<?php echo ASSETS; ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>plugins/rateit/rateit.css" rel="stylesheet" type="text/css" />

    <!-- Megakit Styles -->
    <!-- Metronic Styles -->
    <link href="<?php echo ASSETS; ?>css/components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS; ?>css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo ASSETS; ?>css/style.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">
</head>

<body>
    <?php $this->load->view('site/header_content');?>

    <!--========== PROMO : VIEW ==========-->
    <div class="s-promo-block-v2 g-bg-gradient-black-strong mt-height-250-xs" style="background: url(<?php echo base_url()?>assets/img/site/mainpagebanner.jpg) no-repeat fixed;">
        <div class="container  ">
            <form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                <div class="row pt-18">
                    <div class="col-md-12">
                        <div class="form-group mx-0">
                            <div class="input-group input-group-lg">
                                <input type="text" name="query" class="form-control " placeholder="Search Job Now" value="<?php echo $keyword; ?>">
                                <!-- <input type="text" class="form-control input-medium" placeholder="Location"> -->
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-md-orange btn-lg mb-0">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid g-bg-color-sky-light pt-5">
        <div class="row">
            <!--COL : Filter -->
            <div class="col-md-3 ">
                <div class="media">
                    <div class="pull-right  ">
                        <form id="clear_all_form" action="<?= current_url(); ?>" method="POST">
                            <input type="submit" name="clear_all_filter" class="hidden">
                            <a href="#" class="md-indigo-text mb-1">Clear all filter</a>
                        </form>
                    </div>
                    <div class="media-body">
                        <h5 class="my-1 text-uppercase font-weight-600  font-16-xs roboto-font"> Filters</h5>
                    </div>
                </div>
                <hr class="border-grey-mint my-2">
                <?php
                    $params = $_GET;

                    $clear_location         = current_url().'?';
                    $clear_job_type         = current_url().'?';
                    $clear_company_industry = current_url().'?';
                    $clear_position_levels  = current_url().'?';
                    $clear_experiences      = current_url().'?';
                    $latest                 = isset($params["latest"]) ? current_url().'?' : current_url().'?latest=1';
                    $popular                = isset($params["popular"]) ? current_url().'?' : current_url().'?popular=1';

                    if($params)
                    {
                        foreach ($params as $param => $param_value)
                        {
                            if(isset($param) && $param != 'country_name' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $clear_location .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $clear_location .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'employment_type' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $clear_job_type .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $clear_job_type .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'company_industry' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $clear_company_industry .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $clear_company_industry .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'position_levels' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $clear_position_levels .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $clear_position_levels .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'experiences' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $clear_experiences .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $clear_experiences .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'popular' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $latest .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $latest .= '&'.$param.'='.$param_value;
                                }
                            }

                            if(isset($param) && $param != 'latest' && !empty($param_value))
                            {
                                if(is_array($param_value))
                                {
                                    foreach ($param_value as $param_array)
                                    {
                                        $popular .= '&'.$param.'[]='.$param_array;
                                    }
                                }
                                else
                                {
                                    $popular .= '&'.$param.'='.$param_value;
                                }
                            }
                        }
                    }
                ?>
                <ul class="list-group list-border md-transparent p-0">
                    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="GET" id="job_search_form">
                        <input type="hidden" name="query" value="<?php echo $keyword; ?>">
                        <!-- Location -->
                        <li class="list-group-item md-transparent p-2">
                            <div class="media">
                                <div class="pull-right  ">
                                    <a href="<?= $clear_location; ?>" class="md-indigo-text">Clear </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="my-2 text-uppercase font-weight-600 font-14-xs roboto-font"> Location
                                        <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="type location you desired"></i>
                                    </h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="country_name" class="form-control " placeholder="Enter country or province">
                            </div>
                        </li>
                        <!-- Job Type -->
                        <li class="list-group-item md-transparent p-2">
                            <div class="media">
                                <div class="pull-right  ">
                                    <!-- <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button> -->
                                    <a href="<?= $clear_job_type; ?>" class="md-indigo-text">Clear </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-body">
                                        <h4 class="my-2 text-uppercase font-weight-600 font-14-xs roboto-font"> Job Type
                                            <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select job type you desired"></i>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="md-checkbox-list ">
                                <?php foreach ($employment_type as $key => $value) { ?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="employment_type[]" id="checkbox<?php echo $value['name'];?>" value="<?php echo $value['id'] ?>" class="md-check" <?php echo (isset($_GET["employment_type"]) && in_array($value['id'],$_GET["employment_type"])) ? 'checked="checked"' : ''; ?>>
                                        <label for="checkbox<?php echo $value['name'];?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> <?php echo $value['name'];?> </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                        <!-- Industry -->
                        <li class="list-group-item md-transparent p-2">
                            <div class="media">
                                <div class="pull-right  ">
                                    <!-- <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button> -->
                                    <a href="<?= $clear_company_industry; ?>" class="md-indigo-text">Clear </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="my-2 text-uppercase font-weight-600 font-14-xs"> Company Industry
                                        <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select company industry you desired"></i>
                                    </h4>
                                </div>
                            </div>
                            <div class="form-group mt-1">
                                <select class="bs-select form-control" name="company_industry" id="company_industry">
                                    <option value="" selected disabled>Company Industry </option>
                                    <?php foreach ($industry as $key => $value) {?>
                                        <option table="industries" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET["company_industry"]) && $value['id'] == $_GET["company_industry"]) ? 'selected="selected"' : ''; ?>><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </li>
                        <!-- Position Level-->
                        <li class="list-group-item md-transparent p-2">
                            <div class="media">
                                <div class="pull-right  ">
                                    <!-- <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button> -->
                                    <a href="<?= $clear_position_levels; ?>" class="md-indigo-text">Clear </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="my-2 text-uppercase font-weight-600 font-14-xs roboto-font"> Position Level
                                        <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select position level you desired"></i>
                                    </h4>
                                </div>
                            </div>

                            <div class="md-checkbox-list ">
                                <!-- Checkbox Junior-->
                                <?php foreach ($position_levels as $key => $value) {?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="position_levels[]" id="checkbox<?php echo $value['name']?>" class="md-check" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET["position_levels"]) && in_array($value['id'],$_GET["position_levels"])) ? 'checked="checked"' : ''; ?>>
                                        <label for="checkbox<?php echo $value['name']?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> <?php echo $value['name']?> </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                        <!-- Experience Level-->
                        <li class="list-group-item md-transparent p-2">
                            <div class="media">
                                <div class="pull-right  ">
                                    <!-- <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button> -->
                                    <a href="<?= $clear_experiences; ?>" class="md-indigo-text">Clear </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="my-2 text-uppercase font-weight-600 roboto-font font-14-xs"> Experience
                                        <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select experience you desired"></i>
                                    </h4>
                                </div>
                            </div>

                            <div class="md-checkbox-list ">
                                <?php foreach ($year_of_experiences as $key => $value) { ?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="experiences[]" id="checkbox<?php echo str_replace(' ', '', $value['name']);?>" class="md-check" table="year_of_experience" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET["experiences"]) && in_array($value['id'],$_GET["experiences"])) ? 'checked="checked"' : ''; ?>>
                                        <label for="checkbox<?php echo str_replace(' ', '', $value['name']);?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> <?php echo $value['name'];?> </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </li>
                        <input type="submit" name="job_search_submit" value="true" class="hidden">
                    </form>
                </ul>
            </div>

            <!-- COL : Job Search Content -->
            <div class="col-md-7">
                <div class="portlet light">
                    <div class="portlet-title mb-0">
                        <div class="caption">
                            <!-- <i class="icon-speech"></i> -->
                            <span class="caption-subject font-weight-700 text-uppercase"> Result [ <?= $total_result; ?> ]</span>
                            <!-- <span class="caption-helper">weekly stats...</span> -->
                        </div>
                        <div class="actions">

                            <a href="<?= $latest; ?>" class="btn btn-circle btn-default">
                                Latest </a>
                            <a href="<?= $popular; ?>" class="btn btn-circle btn-default">
                                Popular </a>
                            <!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a> -->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <ul class="list-group list-border">
                            <?php
                                if($search_result)
                                {
                                    foreach ($search_result as $job_result)
                                    {
                                        $url_detail     = base_url().'job/details/'.rtrim(base64_encode($job_result['id']), '=');
                                        $company_url    = base_url().'profile/company/'.rtrim(base64_encode($job_result['user_id']), '=');
                            ?>
                                        <li class="list-group-item px-0">
                                            <div class="widget-media">
                                                <!-- <div class="pull-right ">
                                                   <a href="#" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                                </div> -->
                                                <?php if(!empty($job_result['company_img'])){?>
												<div class="widget-media-elements text-center pull-left">
                                                    <img src="<?php echo !empty($job_result['company_img']) ? IMG_EMPLOYERS.$job_result['company_img'] : IMG_STUDENTS.'xremo-logo-white.svg'; ?>" alt="<?= $job_result["company_name"]; ?>" class="widget-media-avatar-job-search img-responsive">
                                                </div>
												<?php }?>
                                                <div class="media-body ">
                                                    <h6 class="my-1 font-weight-700 roboto-font">
                                                        <a href="<?= $url_detail; ?>" target="_blank" style="color:coral;"><?= $job_result["name"]; ?></a>
                                                    </h6>
                                                    <h6 class=" my-1 roboto-font">
                                                        <a href="<?= $company_url; ?>" target="_blank"><?= $job_result["company_name"]; ?></a>
                                                    </h6>
                                                </div>
                                            </div>
                                            <p class="my-1 roboto-font">
                                                <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                                <span class="label label-md-blue-grey label-sm"><?= $job_result["industry_name"]; ?></span>
                                                <span class="label label-md-red label-sm"><?= $job_result["state_name"]; ?></span>
                                                <span class="label label-md-blue label-sm"><?= $job_result["job_type"]; ?></span>
                                                <span class="label label-md-purple label-sm"><?= $job_result["position_level"]; ?></span>
                                            </p>
                                            <p class="multiline-truncate roboto-font font-weight-300 mb-3">
                                                <?//= substr($job_result["job_description"],0,250); ?>
												<?= strip_tags($job_result["job_description"]); ?>
                                            </p>
                                        </li>
                            <?php
                                    }
                                }
                            ?>

                            <!-- Pagination-->
                            <li class="list-group-item px-0 ">
                                <ul class="pagination pagination-lg">
                                    <?= $pagination; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- COL : Advertisement -->
            <!-- <div class="col-md-2">
                <div class="row mt-fullheight-xs md-yellow">
                    <p>Ad</p>
                </div>
            </div> -->
        </div>
    </div>

	<?php $this->load->view('main/footer_content');?>
    

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Megakit -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.back-to-top.min.js"></script>
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

    <!-- General Components and Settings -->
    <script type="text/javascript" src="<?php echo ASSETS; ?>scripts/app.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>global.js"></script>

    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>components-bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_STUDENTS; ?>wow.min.js"></script>
    <link href="<?php echo ASSETS; ?>plugins/select2/js/select2.min.js" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(document).ready(function () {
            /*$('input[type=checkbox]').each(function(){
                $(this).click(function(){
                    alert($(this).val());
                    $.ajax({
                        url:"<?php echo base_url();?>filter",
                        method:"POST",
                        data: {
                          id: parseInt($(this).val()),
                          table: $(this).attr('table'),
                        },
                        success:function(response) {
                           console.log(response);
                        }
                    })
                });
            })*/
            // console.log($('#checkboxInternship').val());

            $('#clear_all_form a').click(function()
            {
                $('#clear_all_form input:submit').trigger('click');
            });

            $('#job_search_form input:checkbox').click(function()
            {
                $('#job_search_form input:submit').trigger('click');
            });

            $('#company_industry').change(function()
            {
                $('#job_search_form input:submit').trigger('click');
            });
        });
    </script>
</body>


</html>