<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Change Password</title>

    <!-- Web Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700&subset=all">

    <!-- Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>css/components.css">

    <link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../custom_pages/favicon.ico" type="image/x-icon">
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
                    <div class="s-header-v2-navbar-col ">
                        <div class="s-header-v2-logo">
                            <a href="index.html" class="s-header-v2-logo-link">
                                <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?= ASSETS; ?>img/xremo/xremo.png" alt="Dublin Logo" style="height:47px">
                                <!-- <img class="s-header-v2-logo-img s-header-v2-logo-img-default" src="<?= ASSETS; ?>img/xremo/xremo-logo-blue.png" style="height:47px" alt="Dublin Logo"> -->
                            </a>
                        </div>
                    </div>
                    <!-- End Logo -->

                    <!-- Content -->

                </div>
                <!-- End Navbar Row -->
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
    <!--========== END HEADER ==========-->

    <!--========== CONTENT ==========-->
    <section class="s-promo-block-v4 g-bg-gradient-md-indigo g-fullheight-xs">
        <div class="container g-ver-center-xs pt-4 ">
            <div class="portlet light px-8 py-5">
                <div class="portlet-body ">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="md-indigo-text font-weight-500 primary-font my-4 ">Reset Your Password</h2>
                            <p class="roboto-font mb-2">You have requested to reset password for:</p>
                            <p class="font-weight-600">student12@gmail.com</p>
                        </div>
                        <div class="col-sm-6 md-grey lighten-4  py-4 px-3">
                            <form action="" class="form-horizontal">
                                <!-- New Password -->
                                <div class="form-group mx-0 ">
                                    <label class="control-label ">New Password</label>
                                    <input type="password" class="form-control " placeholder="">
                                    <!-- <span class="help-block small">pass </span -->

                                </div>
                                <div class="form-group mx-0">
                                    <label class="control-label ">Confirm New Password</label>
                                    <input type="password" class="form-control " placeholder="">
                                    <!-- <span class="help-block small">pass </span -->
                                </div>
                                <button type="submit" class="btn btn-md-indigo">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== END CONTENT ==========-->



    <!-- Back To Top -->

    <!-- BEGIN CORE PLUGINS -->
    <!-- Metronic -->
    <script type="text/javascript" src="<?= ASSETS; ?>plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?= ASSETS; ?>plugins/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?= ASSETS; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
