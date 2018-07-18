<!-- ===== Content ===== -->
<div class="page-content-wrapper">
    <div class="page-content">

        <h1 class="page-title">
            <?= !empty($language->site_my_wishlist) ? $language->site_my_wishlist : 'Wish List'?>
                <small>
                    <?= !empty($language->site_wishlist_subtitle) ? $language->site_wishlist_subtitle : 'Find and save your favourite company that you wish to work.'?>
                </small>
        </h1>
        <!-- END PAGE HEADER-->

        <!-- CONTENT -->
        <!-- # If (Empty States) -->

        <?php if (!empty($wishlist)): ?>
        <div class="mt-element-card mt-element-overlay mt-50">
            <div class="row">
                <!-- Add Button -->
                <?php if (count($wishlist) < 5): ?>
                <div class="col-lg-2 col-md- col-sm-6 col-xs-12">
                    <a href="#modal_add_wishlist_search" data-toggle="modal">
                        <div class="mt-card-item md-white-hover height-200 border-md-blue-grey border-dash md-white md-black-text-hover border-medium py-45 px-30 md-blue-grey-text font-weight-600">
                            <div class="m-grid m-grid-col m-grid-col-middle text-center ">
                                <i class="fa fa-plus-circle font-40 "></i>
                                <h6 class="my-40 font-18 font-weight-600 text-capitalize"> Add Company </h6>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif ?>
                <?php foreach ($wishlist as $key => $value): ?>
                <?php if (!empty($value['company_id']) && $value['company_id'] == $this->session->userdata('id')): ?>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="mt-card-item ">
                        <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                            <img src="<?= file_exists(IMG_EMPLOYERS.$value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_EMPLOYERS.'profile-pic.png' ?>" class="img-fluid height-200 width-auto center-block py-0">
                            <div class="mt-overlay mt-top">
                                <ul class="mt-info">
                                    <li>
                                        <a wishlistId="<?= $value['id']; ?>" class="btn btn-md-red btn-icon-only letter-space-xs tooltips removeWishlist" data-container="body" data-placement="top" data-original-title="Remove" href="javascript:;">
                                            <i class="fa fa-trash font-18"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url().'profile/company/'.rtrim(base64_encode($value['company_id']),'=');?>" class="btn btn-md-indigo btn-sm letter-space-xs ">
                                            <i class="icon-eye"></i> View Profile
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-card-content">
                            <h3 class="mt-card-name">
                                <?= !empty($value['company_name']) ? $value['company_name'] :  $value['company'];  ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="mt-card-item ">
                        <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                            <img src="<?= file_exists(IMG_EMPLOYERS.$value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_EMPLOYERS.'profile-pic.png' ?>" class="img-fluid height-200 width-auto center-block ">
                            <div class="mt-overlay mt-top">
                                <!-- Only had Remove Buton -->
                                <ul class="mt-info">
                                    <li>
                                        <a wishlistId="<?= $value['id']; ?>" class="btn btn-md-red btn-icon-only letter-space-xs tooltips removeWishlist" data-container="body" data-placement="top" data-original-title="Remove" href="javascript:;">
                                            <i class="fa fa-trash font-18"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-card-content p-0">
                            <h3 class="mt-card-name">
                                <?= !empty($value['company_name']) ? $value['company_name'] :  $value['company'];  ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
                <!-- Custom Company -->
            </div>
        </div>
        <?php else: ?>
        <div class="portlet height-600-md height-550-sm height-450 light flex-center mb-0">
            <div class="portlet-body text-center">
                <i class="fa fa-heart-o font-70 md-grey-lighten-1-text  mb-35-sm mb-15"></i>
                <h5 class="text-center font-weight-600 md-grey-darken-2-text font-22-md font-18">
                    <?= !empty($language->site_wishlist_empty) ? $language->site_wishlist_empty : 'My wishlist is empty'?>
                </h5>
                <p class="text-center font-weight-400 md-grey-darken-1-text font-16-md font-15-sm font-14">
                    <?= !empty($language->site_wishlist_empty_subtitle) ? $language->site_wishlist_empty_subtitle : 'List out your favourite company in here and we will notify you any incoming job from your favourite company.'?>
                </p>
                <a data-toggle="modal" href="#modal_add_wishlist_search" class="btn btn-md-indigo btn-sm mt-30-md mt-25">
                    <i class="icon-magnifier fa-fw"></i>
                    <?= !empty($language->site_new_wishlist) ? $language->site_new_wishlist : 'Find my favourite company'?>
                </a>
            </div>
        </div>
        <?php endif ?>


        <!-- Modal add by search -->
        <div class="modal fade in" id="modal_add_wishlist_search" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" action="<?= base_url(); ?>student/wishlist/addCompany" class="form">
                    <div class="modal-content portlet light portlet-fit">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <i class="icon-heart "></i>
                                <span class="caption-subject font-weight-600">
                                    <?= !empty($language->site_search_company) ? $language->site_search_company : 'Search Company'?>
                                </span>
                                <span class="caption-helper">
                                    <?= !empty($language->site_wishlist_add_company_subtitle) ? $language->site_wishlist_add_company_subtitle : 'Seek company that you wish to join'?>
                                </span>
                            </div>
                            <!-- Note : this search bar shall be hide when [Default View] is show , and only appear after user click buton or search through [Default View] -->
                            <div class="inputs">
                                <div class="portlet-input input-inline input-small">
                                    <div class="input-icon right">
                                        <i class="icon-magnifier"></i>
                                        <input type="text" id="searchTexboxCorner" class="form-control input-circle" placeholder="search...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body portlet-body">

                            <!--  Note: [Default View] for user to add is it by search or button. In this case , user shall search through search bar to find specific company  -->
                            <div class="portlet portlet-body center-block width-60-percent py-100 px-30">
                                <!-- Search Bar  -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-icon">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" id="search_company" class="form-control" placeholder="<?= !empty($language->site_search_company) ? $language->site_search_company : 'Search Company'?>">
                                        </div>
                                        <span class="input-group-btn">
                                            <a href="javascript:void(0);" class="btn btn-md-orange search_company">
                                                <?= !empty($language->site_search) ? $language->site_search : 'Search'?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <!-- Button View all Listed comany  -->
                                <!-- <a href="" class="btn btn-md-indigo center-block width-400 "> See all listed company</a> -->
                            </div>
                            <div class="mt-element-card mt-element-overlay">
                                <div class="row">
                                    <!-- Default card-->
                                    <div id="company_result" style="display: flex;flex-wrap: wrap;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a data-dismiss="modal" class="btn btn-md-indigo btn-outline hidden">Close</a>
                            <button type="submit" class="btn btn-md-indigo px-100 hidden">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal add by button -->
        <div class="modal fade in" id="modal_add_wishlist_button" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="" class="form">
                    <div class="modal-content portlet light portlet-fit">
                        <div class="modal-header portlet-title">
                            <div class="caption">
                                <i class="icon-heart font-purple-plum"></i>
                                <span class="caption-subject bold font-purple-plum uppercase"> Wishlist</span>
                                <span class="caption-helper">add company into your wish list account</span>
                            </div>
                            <!-- Note : this search bar shall be hide when [Default View] is show , and only appear after user click buton or search through [Default View] -->
                            <div class="inputs">
                                <div class="portlet-input input-inline input-small">
                                    <div class="input-icon right">
                                        <i class="icon-magnifier"></i>
                                        <input type="text" class="form-control input-circle" placeholder="search...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body portlet-body">

                            <!--  Note: [Default View] for user to add is it by search or button. In this case , user shall click button view list of company  -->
                            <div class="portlet portlet-body center-block width-60-percent py-100 px-30">
                                <!-- Search Bar  -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-icon">
                                            <i class="icon-magnifier"></i>
                                            <input type="text" class="form-control" placeholder="<?= !empty($language->site_search_company) ? $language->site_search_company : 'Search Company'?>">
                                        </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-md-orange">
                                                <?= !empty($language->site_search) ? $language->site_search : 'Search'?>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <!-- Button View all Listed comany  -->
                                <a href="" class="btn btn-md-indigo center-block width-400 "> See all listed company</a>
                            </div>
                            <div class="mt-element-card mt-element-overlay">
                                <div class="row">
                                    <!-- Default card-->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="mt-card-item">
                                            <div class="mt-card-avatar mt-overlay-1">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="img-fluid height-200 width-auto center-block">
                                                <div class="mt-overlay">
                                                    <ul class="mt-info">
                                                        <li>
                                                            <a class="btn btn-md-orange" href="javascript:;">
                                                                <i class="fa fa-plus "></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-card-content">
                                                <h3 class="mt-card-name">Company #1[Default]</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Active Card  -->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="mt-card-item border-mdo-orange-v8 ">
                                            <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                                <img src="../../assets/pages/img/background/10.jpg" class="img-fluid height-200 width-auto center-block">
                                                <div class="mt-overlay mt-top">
                                                    <ul class="mt-info">
                                                        <li>
                                                            <a class="btn btn-md-red " href="javascript:;">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-card-content">
                                                <h3 class="mt-card-name">Company #1 [Active @ Add]</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Default card-->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="mt-card-item">
                                            <div class="mt-card-avatar mt-overlay-1">
                                                <img src="../../assets/pages/img/background/19.jpg" class="img-fluid height-200 width-auto center-block">
                                                <div class="mt-overlay">
                                                    <ul class="mt-info">
                                                        <li>
                                                            <a class="btn btn-md-orange" href="javascript:;">
                                                                <i class="fa fa-plus "></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-card-content">
                                                <h3 class="mt-card-name ">
                                                    <a class="md-darkblue-text md-blue-text-hover">Company #1[Default]</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Active Card  -->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="mt-card-item border-mdo-orange-v8 ">
                                            <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                                <img src="../../assets/global/img/xremo/profile-pic.png" class="img-fluid height-200 width-auto center-block">
                                                <div class="mt-overlay mt-top">
                                                    <ul class="mt-info">
                                                        <li>
                                                            <a class="btn btn-md-red " href="javascript:;">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-card-content">
                                                <h3 class="mt-card-name">Company #1 [Active @ Add]</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <a data-dismiss="modal" class="btn btn-md-indigo btn-outline">Close</a>
                            <button type="submit" class="btn btn-md-indigo px-100">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if ($totalWishlist == 5): ?>
        <div class="well">
            <h5 class="md-red-text font-weight-600 font-17 mb-10">You already reach limit to add company into wishlist.</h5>
            <p class="font-weight-400 md-grey-darken-3-text font-15"> <?= !empty($language->removeWishlist) ? $language->removeWishlist : 'If you wish to add more company, please remove any company and be remind wishlist can allow up to save 5 company only.'?> </p>
        </div>
        <?php endif ?>
    </div>
</div>
