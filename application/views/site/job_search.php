<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Job | Search</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>bootstrap/bootstrap-switch.min.css">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/simple-line-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>icon/themify.css">

    <!-- Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>plugins/animate/animate.css">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>vendor/alertify.min.css">

    <!-- Global -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>global/components.css">

    <!-- Layout 8 -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>layout8/layout8.css">


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico">

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

    <!--========== PROMO : VIEW ==========-->
    <div class="s-promo-block-v2 gradient-darkblue-v7 height-300" style="background: url(<?php echo base_url()?>assets/img/site/mainpagebanner.jpg) ;">
        <div class="container g-ver-bottom-90  ">
            <form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                <div class="row ">
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

    <div class="container-fluid bg-sky-light pt-30">
        <div class="row">
            <!--COL : Filter -->
            <div class="col-md-3 ">
                <div class="media">
                    <div class="pull-right  ">
                        <form id="clear_all_form" action="<?= current_url(); ?>" method="POST">
                            <h5>
                                <input type="submit" name="clear_all_filter" class="hidden">
                                <a href="#" class="md-indigo-text  font-15">Clear all filter</a>
                            </h5>
                        </form>
                    </div>
                    <div class="media-body">
                        <h5 class="my-5 text-uppercase font-weight-600  font-16 roboto-font"> Filters</h5>
                    </div>
                </div>
                <hr class="border-grey-mint my-10">
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
                    <ul class="list-group border-none md-transparent p-0">
                        <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="GET" id="job_search_form">
                            <input type="hidden" name="query" value="<?php echo $keyword; ?>">
                            <!-- Location -->
                            <li class="list-group-item md-transparent p-10 border-none">
                                <div class="media">
                                    <div class="pull-right  ">
                                        <h4>
                                            <a href="<?= $clear_location; ?>" class="md-indigo-text font-14">Clear </a>
                                        </h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="my-10 text-uppercase font-weight-600 font-16 roboto-font"> Location
                                            <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="type location you desired"></i>
                                        </h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="country_name" class="form-control " placeholder="Enter country or province">
                                </div>
                            </li>

                            <!-- Job Type -->
                            <li class="list-group-item md-transparent p-10 border-none">
                                <div class="media">
                                    <div class="pull-right  ">
                                        <h4>
                                            <a href="<?= $clear_job_type; ?>" class="md-indigo-text font-14">Clear </a>
                                        </h4>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-body">
                                            <h4 class="my-10 text-uppercase font-weight-600 font-16 roboto-font"> Job Type
                                                <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select job type you desired"></i>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-checkbox-list ">
                                    <?php foreach ($employment_type as $key => $value) { ?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="employment_type[]" id="checkbox<?php echo $value['name'];?>" value="<?php echo $value['id'] ?>" class="md-check" <?php echo (isset($_GET[ "employment_type"]) && in_array($value[
                                            'id'],$_GET[ "employment_type"])) ? 'checked="checked"' : ''; ?>>
                                        <label class="font-weight-400 font-15" for="checkbox<?php echo $value['name'];?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <?php echo $value['name'];?> </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>

                            <!-- Industry -->
                            <li class="list-group-item md-transparent p-10 border-none">
                                <div class="media">
                                    <div class="pull-right  ">
                                        <h4>
                                            <a href="<?= $clear_company_industry; ?>" class="md-indigo-text font-14">Clear </a>
                                        </h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="my-10 text-uppercase font-weight-600 font-16"> Company Industry
                                            <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select company industry you desired"></i>
                                        </h4>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <select class="bs-select form-control" name="company_industry" id="company_industry">
                                        <option value="" selected disabled>Company Industry </option>
                                        <?php foreach ($industry as $key => $value) {?>
                                        <option table="industries" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET[ "company_industry"]) && $value[ 'id']==$_GET[ "company_industry"]) ? 'selected="selected"' : ''; ?>>
                                            <?php echo $value['name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </li>

                            <!-- Position Level-->
                            <li class="list-group-item md-transparent p-10 border-none">
                                <div class="media">
                                    <div class="pull-right  ">
                                        <h4>
                                            <a href="<?= $clear_position_levels; ?>" class="md-indigo-text font-14">Clear </a>
                                        </h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="my-10 text-uppercase font-weight-600 font-16 roboto-font"> Position Level
                                            <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select position level you desired"></i>
                                        </h4>
                                    </div>
                                </div>

                                <div class="md-checkbox-list ">
                                    <!-- Checkbox Junior-->
                                    <?php foreach ($position_levels as $key => $value) {?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="position_levels[]" id="checkbox<?php echo $value['name']?>" class="md-check" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET[ "position_levels"]) && in_array($value[
                                            'id'],$_GET[ "position_levels"])) ? 'checked="checked"' : ''; ?>>
                                        <label class="font-weight-400 font-15" for="checkbox<?php echo $value['name']?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <?php echo $value['name']?> </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>

                            <!-- Experience Level-->
                            <li class="list-group-item border-none p-10 md-transparent">
                                <div class="media">
                                    <div class="pull-right  ">
                                        <!-- <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button> -->
                                        <h4>
                                            <a href="<?= $clear_experiences; ?>" class="md-indigo-text font-14 ">Clear </a>
                                        </h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="my-10 text-uppercase font-weight-600 roboto-font font-16"> Experience
                                            <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select experience you desired"></i>
                                        </h4>
                                    </div>
                                </div>
                                <div class="md-checkbox-list ">
                                    <?php foreach ($year_of_experiences as $key => $value) { ?>
                                    <div class="md-checkbox">
                                        <input type="checkbox" name="experiences[]" id="checkbox<?php echo str_replace(' ', '', $value['name']);?>" class="md-check" table="year_of_experience" value="<?php echo $value['id'] ?>" <?php echo (isset($_GET[
                                            "experiences"]) && in_array($value[ 'id'],$_GET[ "experiences"])) ? 'checked="checked"' : ''; ?>>
                                        <label class="font-weight-400 font-15" for="checkbox<?php echo str_replace(' ', '', $value['name']);?>">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <?php echo $value['name'];?> </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </li>

                            <input type="submit" name="job_search_submit" value="true" class="hidden">
                        </form>
                    </ul>
            </div>

            <!-- COL : Job Search Content -->
            <div class="col-md-9">
                <div class="portlet light">
                    <div class="portlet-title mb-0">
                        <div class="caption">
                            <span class="caption-subject font-weight-700 text-uppercase"> Result [
                                <?= $total_result; ?>]</span>
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
                                <!-- Job -->
                                <li class="list-group-item px-0">
                                    <div class="media border-none media-middle">
                                        <?php if(!empty($job_result['company_img'])){?>
                                        <div class="media-left ">
                                            <!-- <div class="widget-media-elements text-center pull-left"> -->
                                            <img class="avatar avatar-medium" src="<?php echo !empty($job_result['company_img']) ? IMG_EMPLOYERS.$job_result['company_img'] : IMG.'/site/xremo-logo-white.svg'; ?>" alt="<?=$job_result['company_name']; ?>">
                                        </div>
                                        <?php }?>
                                        <div class="media-body ">
                                            <!-- Job Title -->
                                            <?php if(!empty($job_result['name'])){?>
                                            <h5 class="font-weight-600">
                                                <a href="<?= $url_detail; ?>" target="_blank" class="md-orange-text-hover">
                                                    <?= $job_result["name"]; ?>
                                                </a>
                                            </h5>
                                            <?php }?>
                                            <!-- Company Name -->
                                            <h6>
                                                <a href="<?= $company_url; ?>" target="_blank">
                                                    <i class="fa fa-building-o"></i>
                                                    <?= $job_result["company_name"]; ?>
                                                </a>
                                            </h6>
                                            <!-- Label -->
                                            <h6>
                                                <!-- Industry -->
                                                <?php if(!empty($job_result['industry_name'])){?>
                                                <p class="label label-md-blue-grey  mr-5 letter-space-xs">
                                                    <i class="fa fa-industry"></i>
                                                    <?= $job_result["industry_name"]; ?>
                                                </p>
                                                <?php }?>

                                                <!-- HIDE : IDK what is this -->
                                                <p class="label label-md-red  mr-5 hidden">
                                                    <?= $job_result["state_name"]; ?>
                                                </p>

                                                <!-- Job Type -->
                                                <?php if(!empty($job_result['job_type'])){?>
                                                <p class="label label-md-blue  mr-5 letter-space-xs">
                                                    <i class="fa fa-briefcase"></i>
                                                    <?= $job_result["job_type"]; ?>
                                                </p>
                                                <?php }?>
                                                <!-- Position Level -->
                                                <?php if(!empty($job_result['position_level'])){?>
                                                <p class="label label-md-purple  mr-5 letter-space-xs">
                                                    <i class="fa fa-sitemap"></i>
                                                    <?= $job_result["position_level"]; ?>
                                                </p>
                                                <?php }?>
                                                <!-- Country @ Location -->
                                                <?php if(!empty($job_result['location'])){?>
                                                <p class="label label-md-cyan  mr-5  letter-space-xs ">
                                                    <i class="icon-pointer"></i>
                                                    <?= json_decode($job_result["location"])->country; ?>
                                                </p>
                                                <?php }?>

                                                <?php if(!empty($job_result['budget_min'] || $job_result['budget_max'] || $job_result['forex'] )){?>
                                                <!-- Salary -->
                                                <p class="label label-md-green  mr-5 letter-space-xs">
                                                    <i class="fa fa-usd"></i>
                                                    <?= $job_result['forex'];?>
                                                        <?= str_replace(',', '.', number_format($job_result["budget_min"]));?>
                                                            -
                                                            <?= $job_result['forex'];?>
                                                                <?= str_replace(',', '.', number_format($job_result["budget_max"]));?>
                                                </p>
                                                <?php }?>
                                            </h6>
                                            <!-- Job Description -->
                                            <p class="multiline-truncate  font-weight-300 mb-5">
                                                <?//= substr($job_result["job_description"],0,250); ?>
                                                    <?= strip_tags($job_result["job_description"]); ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <?php
                                    }
                                }
                            ?>
                                    <!-- Pagination-->
                                    <li class="list-group-item px-0">
                                        <ul class="pagination">
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


    <!-- CORE -->
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- VENDOR -->
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.smooth-scroll.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/counterup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

    <!-- Custom-->
    <script type="text/javascript" src="<?php echo JS; ?>alertify.min.js"></script>

    <!-- Global-->
    <script type="text/javascript" src="<?php echo JS; ?>global/app.min.js"></script>
    <!-- Layout 8 -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/layout8.min.js"></script>

    <!-- Component Page -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/counter.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/portfolio-3-col.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/parallax.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/components/google-map.min.js"></script> -->
    <script type="text/javascript" src="<?php echo JS; ?>layout8/components/wow.min.js"></script>

    <!-- Page -->
    <script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3-gallery.js"></script>

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

            $('#clear_all_form a').click(function () {
                $('#clear_all_form input:submit').trigger('click');
            });

            $('#job_search_form input:checkbox').click(function () {
                $('#job_search_form input:submit').trigger('click');
            });

            $('#company_industry').change(function () {
                $('#job_search_form input:submit').trigger('click');
            });
        });

    </script>
</body>


</html>
