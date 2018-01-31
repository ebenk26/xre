<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Job | Search</title>

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
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
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!--========== HEADER  ==========-->
    <header class="navbar-fixed-top s-header js-header-sticky js-header-overlay">
        <!-- Navbar -->
        <nav class="s-header-v2-navbar">
            <div class="container g-display-table-lg">
                <!-- Navbar Row -->
                <div class="s-header-v2-navbar-row">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="s-header-v2-navbar-col">
                        <button type="button" class="collapsed s-header-v2-toggle" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                            <span class="s-header-v2-toggle-icon-bar"></span>
                        </button>
                    </div>

                    <!-- Logo -->
                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-width-180">
                        <div class="s-header-v2-logo ">
                            <a href="<?php echo base_url(); ?>" class="s-header-v2-logo-link ">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?php echo IMG_STUDENTS; ?>xremo.png" alt="Dublin Logo" style="height:47px">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-shrink" src="<?php echo IMG_STUDENTS; ?>xremo-logo-blue.png" style="height:47px" alt="Dublin Logo">
                            </a>
                        </div>
                    </div>
                    <!-- End Logo -->

                    <!-- Content -->
                    <div class="s-header-v2-navbar-col s-header-v2-navbar-col-right">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <!-- guest -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav">
                                <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link ">Search Job</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="about.html" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="services.html" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="contacts.html" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="article.html" class="s-header-v2-nav-link">Article</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="signup.html" class="s-header-v2-nav-link  g-color-md-orange-text ">SIGN UP</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="login.html" class=" g-letter-spacing-1 g-radius-50 g-font-size-14-xs s-btn s-btn-md-orange-bg  s-btn-xs font-weight-700 g-margin-t-25-xs g-margin-b-20-xs s-header-v2-logo-img-shrink text-uppercase">Login</a>
                                    <a href="login.html" class=" g-letter-spacing-1 g-radius-50 g-font-size-14-xs s-btn s-btn-white-bg  g-color-md-orange-text s-btn-xs font-weight-700  g-margin-t-25-xs g-margin-b-20-xs s-header-v2-logo-img-default text-uppercase">Login</a>
                                </li>
                            </ul>
                        </div>
                        <!--logged user -->
                        <div class="collapse navbar-collapse s-header-v2-navbar-collapse" id="nav-collapse">
                            <ul class="s-header-v2-nav hidden">
                                <!-- NOTE : Student got "Search Job " link meanwhile employer do not have -->
                                <li class="s-header-v2-nav-item">
                                    <a href="job-search.html" class="s-header-v2-nav-link">Search Job</a>
                                </li>
                                <!-- ########################################################## -->
                                <li class="s-header-v2-nav-item">
                                    <a href="about.html" class="s-header-v2-nav-link">About</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="services.html" class="s-header-v2-nav-link">Services</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="contacts.html" class="s-header-v2-nav-link s-header-v2-nav-link-dark">Contacts</a>
                                </li>
                                <li class="s-header-v2-nav-item">
                                    <a href="article.html" class="s-header-v2-nav-link">Article</a>
                                </li>

                                <li class="dropdown s-header-v2-nav-item s-header-v2-dropdown-on-hover">
                                    <a href="index.html" class="dropdown-toggle s-header-v2-nav-link -is-active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="../assets/pages/img/avatars/team10.jpg" class="avatar avatar-xtramini avatar-circle" alt="">
                                        <span class="g-font-size-10-xs g-margin-l-5-xs ti-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu s-header-v2-dropdown-menu pull-right">
                                        <li>
                                            <a href="student-dashboard-v2.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-home mr-3"></i>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="student-profile-v3.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-note mr-3"></i>Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="student-view-profile.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-book-open mr-3"></i>My Resume</a>
                                        </li>
                                        <li>
                                            <a href="student-calendar.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-calendar mr-3"></i>My Calendar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="welcome.html" class="s-header-v2-dropdown-menu-link">
                                                <i class="icon-key mr-3"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <!-- End Nav Menu -->
                    </div>
                </div>
                <!-- End Navbar Row -->
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
    <!--========== END HEADER ==========-->

    <!--========== PROMO : VIEW ==========-->
    <div class="s-promo-block-v2 g-bg-gradient-black-strong mt-height-250-xs" style="background: url(<?php echo base_url()?>assets/img/site/mainpagebanner.jpg) no-repeat fixed;">
        <div class="container  ">
            <form class="search-form search-form-expanded" action="<?php echo base_url(); ?>job/search" method="POST">
                <div class="row pt-18">
                    <div class="col-md-12">
                        <div class="form-group mx-0">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control " placeholder="Search Job Now" value="<?php echo $keyword; ?>">
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
                        <a href="#" class="md-indigo-text mb-1">Clear all filter</a>
                    </div>
                    <div class="media-body">
                        <h5 class="my-1 text-uppercase font-weight-600  font-16-xs roboto-font"> Filters</h5>
                    </div>
                </div>
                <hr class="border-grey-mint my-2">
                <ul class="list-group list-border md-transparent p-0">
                    <!-- Location -->
                    <li class="list-group-item md-transparent p-2">
                        <div class="media">
                            <div class="pull-right  ">
                                <a href="" class="md-indigo-text">Clear </a>
                            </div>
                            <div class="media-body">
                                <h4 class="my-2 text-uppercase font-weight-600 font-14-xs roboto-font"> Location</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control " placeholder="Enter state, country or province">
                        </div>
                    </li>
                    <!-- Job Type -->
                    <li class="list-group-item md-transparent p-2">
                        <div class="media">
                            <div class="pull-right  ">
                                <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button>
                                <!-- <a href="" class="md-indigo-text">Clear </a> -->
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
                                    <input type="checkbox" id="checkbox<?php echo $value['name'];?>" table="employment_types" value="<?php echo $value['id'] ?>" class="md-check">
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
                                <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button>
                                <!-- <a href="" class="md-indigo-text">Clear </a> -->
                            </div>
                            <div class="media-body">
                                <h4 class="my-2 text-uppercase font-weight-600 font-14-xs"> Company Industry
                                    <!-- <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select job type you desired"></i> -->
                                </h4>
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <select class="bs-select form-control   ">
                                <option value="" selected disabled>Company Industry </option>
                                <?php foreach ($industry as $key => $value) {?>
                                    <option table="industries" value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>
                    <!-- Position Level-->
                    <li class="list-group-item md-transparent p-2">
                        <div class="media">
                            <div class="pull-right  ">
                                <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button>
                                <!-- <a href="" class="md-indigo-text">Clear </a> -->
                            </div>
                            <div class="media-body">
                                <h4 class="my-2 text-uppercase font-weight-600 font-14-xs roboto-font"> Position Level
                                    <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select job type you desired"></i>
                                </h4>
                            </div>
                        </div>

                        <div class="md-checkbox-list ">
                            <!-- Checkbox Junior-->
                            <?php foreach ($position_levels as $key => $value) {?>
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox<?php echo $value['name']?>" class="md-check" table="position_levels" value="<?php echo $value['id'] ?>">
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
                                <button type="reset" class="btn btn-outline-md-indigo btn-no-border">Clear</button>
                                <!-- <a href="" class="md-indigo-text">Clear </a> -->
                            </div>
                            <div class="media-body">
                                <h4 class="my-2 text-uppercase font-weight-600 roboto-font font-14-xs"> Experience
                                    <i class="fa fa-info-circle tooltips" data-container="body" data-placement="top" data-original-title="select job type you desired"></i>
                                </h4>
                            </div>
                        </div>

                        <div class="md-checkbox-list ">
                            <?php foreach ($year_of_experiences as $key => $value) { ?>
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox<?php echo str_replace(' ', '', $value['name']);?>" class="md-check" table="year_of_experience" value="<?php echo $value['id'] ?>">
                                    <label for="checkbox<?php echo str_replace(' ', '', $value['name']);?>">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> <?php echo $value['name'];?> </label>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- COL : Job Search Content -->
            <div class="col-md-7">
                <div class="portlet light">
                    <div class="portlet-title mb-0">
                        <div class="caption">
                            <!-- <i class="icon-speech"></i> -->
                            <span class="caption-subject font-weight-700 text-uppercase"> Result [ 5 ]</span>
                            <!-- <span class="caption-helper">weekly stats...</span> -->
                        </div>
                        <div class="actions">

                            <a href="javascript:;" class="btn btn-circle btn-default">
                                Latest </a>
                            <a href="javascript:;" class="btn btn-circle btn-default">
                                Popular </a>
                            <!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a> -->
                        </div>
                    </div>
                    <div class="portlet-body">
                        <ul class="list-group list-border">
                            <!-- Login -->
                            <li class="list-group-item px-0">
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="job-description.html" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                    </div>
                                    <div class="media-body ">
                                        <h6 class="my-1 font-weight-700 roboto-font">
                                            <a>Job Position Title </a>
                                        </h6>
                                        <h6 class=" my-1 roboto-font">
                                            <a href="">Company Name</a>
                                        </h6>
                                    </div>
                                </div>
                                <p class="my-1 roboto-font">
                                    <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                    <span class="label label-md-blue-grey label-sm">Company Industry</span>
                                    <span class="label label-md-red label-sm">Location</span>
                                    <span class="label label-md-blue label-sm">Job Type</span>
                                    <span class="label label-md-purple label-sm">Position Level</span>
                                </p>
                                <p class="multiline-truncate roboto-font font-weight-300 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet urna elit, a pharetra lectus gravida nec. Pellentesque dignissim metus purus, non tincidunt
                                    magna ultrices facilisis. Mauris placerat erat ultricies euismod facilisis. Curabitur malesuada varius massa sit amet convallis. Ut at tellus ut ligula dapibus consectetur.
                                </p>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="job-description.html" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                    </div>
                                    <div class="media-body ">
                                        <h6 class="my-1 font-weight-700 roboto-font">
                                            <a>Job Position Title </a>
                                        </h6>
                                        <h6 class=" my-1 roboto-font">
                                            <a href="">Company Name</a>
                                        </h6>
                                    </div>
                                </div>
                                < <p class="my-1 roboto-font">
                                    <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                    <span class="label label-md-blue-grey label-sm">Company Industry</span>
                                    <span class="label label-md-red label-sm">Location</span>
                                    <span class="label label-md-blue label-sm">Job Type</span>
                                    <span class="label label-md-purple label-sm">Position Level</span>
                                    </p>
                                    <p class="multiline-truncate roboto-font font-weight-300 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet urna elit, a pharetra lectus gravida nec. Pellentesque dignissim metus purus, non tincidunt
                                        magna ultrices facilisis. Mauris placerat erat ultricies euismod facilisis. Curabitur malesuada varius massa sit amet convallis. Ut at tellus ut ligula dapibus consectetur.
                                    </p>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="job-description.html" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                    </div>
                                    <div class="media-body ">
                                        <h6 class="my-1 font-weight-700 roboto-font">
                                            <a>Job Position Title </a>
                                        </h6>
                                        <h6 class=" my-1 roboto-font">
                                            <a href="">Company Name</a>
                                        </h6>
                                    </div>
                                </div>
                                <p class="my-1 roboto-font">
                                    <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                    <span class="label label-md-blue-grey label-sm">Company Industry</span>
                                    <span class="label label-md-red label-sm">Location</span>
                                    <span class="label label-md-blue label-sm">Job Type</span>
                                    <span class="label label-md-purple label-sm">Position Level</span>
                                </p>
                                <p class="multiline-truncate roboto-font font-weight-300 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet urna elit, a pharetra lectus gravida nec. Pellentesque dignissim metus purus, non tincidunt
                                    magna ultrices facilisis. Mauris placerat erat ultricies euismod facilisis. Curabitur malesuada varius massa sit amet convallis. Ut at tellus ut ligula dapibus consectetur.
                                </p>

                            </li>
                            <li class="list-group-item px-0 ">
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="job-description.html" class="btn btn-md-indigo btn-sm letter-space-xs ">Apply</a>
                                    </div>
                                    <div class="media-body ">
                                        <h6 class="my-1 font-weight-700 roboto-font">
                                            <a>Job Position Title </a>
                                        </h6>
                                        <h6 class=" my-1 roboto-font">
                                            <a href="">Company Name</a>
                                        </h6>
                                    </div>
                                </div>
                                <p class="my-1 roboto-font">
                                    <!-- <span class="label label-md-green label-sm">Salary</span> -->
                                    <span class="label label-md-blue-grey label-sm">Company Industry</span>
                                    <span class="label label-md-red label-sm">Location</span>
                                    <span class="label label-md-blue label-sm">Job Type</span>
                                    <span class="label label-md-purple label-sm">Position Level</span>
                                </p>
                                <p class="multiline-truncate roboto-font font-weight-300 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet urna elit, a pharetra lectus gravida nec. Pellentesque dignissim metus purus, non tincidunt
                                    magna ultrices facilisis. Mauris placerat erat ultricies euismod facilisis. Curabitur malesuada varius massa sit amet convallis. Ut at tellus ut ligula dapibus consectetur.
                                </p>
                            </li>

                            <!-- Only Guest -->
                            <li class="list-group-item px-0">
                                <div class="media">
                                    <div class="pull-right ">
                                        <a href="login.html" class="btn btn-md-green btn-sm letter-space-xs ">Login to view </a>
                                    </div>
                                    <div class="media-body ">
                                        <h6 class="my-1 font-weight-700 roboto-font">
                                            Job Position Title
                                        </h6>
                                        <h6 class=" my-1 roboto-font">
                                            Company Name
                                        </h6>
                                        </dv>

                                    </div>
                                </div>

                                <p class="my-1 roboto-font">
                                    <!-- <span class="label label-md-green label-sm">Login to view salary</span> -->
                                    <span class="label label-md-blue-grey label-sm">Company Industry</span>
                                    <span class="label label-md-red label-sm">Location</span>
                                    <span class="label label-md-blue label-sm">Job Type</span>
                                    <span class="label label-md-purple label-sm">Position Level</span>
                                </p>
                                <p class="multiline-truncate roboto-font font-weight-300 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet urna elit, a pharetra lectus gravida nec. Pellentesque dignissim metus purus, non tincidunt
                                    magna ultrices facilisis. Mauris placerat erat ultricies euismod facilisis. Curabitur malesuada varius massa sit amet convallis. Ut at tellus ut ligula dapibus consectetur.
                                </p>
                            </li>

                            <!-- Pagination-->
                            <li class="list-group-item px-0 ">
                                <ul class="pagination pagination-lg">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> 1 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> 2 </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;"> 3 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> 4 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> 5 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> 6 </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- COL : Advertisement -->
            <div class="col-md-2">
                <div class="row mt-fullheight-xs md-yellow">
                    <p>Ad</p>
                </div>
            </div>
        </div>
    </div>


    <footer class="g-bg-color-dark">
        <!-- Links -->
        <div class="g-hor-divider-dashed-white-opacity-lightest">
            <div class="container g-padding-y-40-xs">
                <div class="row">
                    <div class="col-sm-3 g-margin-b-20-xs g-margin-b-0-md">
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs">
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="../custom_pages/welcome.html">Home</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="../custom_pages/about.html">About</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="../custom_pages/services.html">Service</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="../custom_pages/contacts.html">Contacts</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="../custom_pages/article.html">Article</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-3 g-margin-b-40-xs g-margin-b-0-md">
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs">
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="g-font-size-15-xs g-color-white-opacity" href="terms-use.html">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1  g-padding-y-50-xs g-padding-y-0-md">
                        <h3 class="g-font-size-18-xs g-color-white">Xremo </h3>
                        <p class="g-color-white-opacity">We offers you an online career building experience, as Xciting as online dating.</p>
                        <ul class="list-unstyled g-ul-li-tb-5-xs g-margin-b-0-xs list-inline">
                            <li>
                                <a class="fa fa-youtube-play fa-lg social-yt" href="https://www.youtube.com/channel/UCMFZ8a2QlaWHhPrPf2CURSw"></a>
                            </li>
                            <li>
                                <a class=" social-tw fa-lg fa fa-twitter" href="https://twitter.com/xremomy"></a>
                            </li>
                            <li>
                                <a class=" fa fa-facebook social-fb fa-lg" href="https://www.prod.facebook.com/xremomy/"></a>
                            </li>
                            <li>
                                <a class=" fa fa-linkedin social-li fa-lg" href="https://www.linkedin.com/company/6382421/"></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Links -->

        <!-- Copyright -->
        <div class="container g-padding-y-20-xs">
            <div class="row">
                <div class="col-xs-6">
                    <a href="index.html">
                        <img class="g-height-40-xs" src="../HTML/img/Xremo/all/xremo-logo-white.png" alt=" Xremo Logo">
                    </a>
                </div>
                <div class="col-xs-6 g-text-right-xs">
                    <p class="g-font-size-14-xs g-margin-b-0-xs g-color-white-opacity-light my-3">
                        <i class="fa fa-copyright fa-fw"></i>2018 Copyright Xremo.com
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copyright -->
    </footer>


    <a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>
    <!-- Back To Top -->

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
            $('input[type=checkbox]').each(function(){
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
            })
            // console.log($('#checkboxInternship').val());
        });
    </script>
</body>


</html>