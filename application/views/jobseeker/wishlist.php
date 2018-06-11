<!-- ===== Content ===== -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <h1 class="page-title"> <?= !empty($language->site_my_wishlist) ? $language->site_my_wishlist : 'My Wishlist'?>
                    <small><?= !empty($language->site_wishlist_subtitle) ? $language->site_wishlist_subtitle : 'My Wishlist'?> </small>
                </h1>
                <!-- END PAGE HEADER-->

                <!-- CONTENT -->
                <!-- # If (Empty States) -->
                
                <?php if (!empty($wishlist)): ?>
                    <div class="mt-element-card mt-element-overlay mt-50">
                        <div class="row">
                            <!-- Add Button -->
                            <?php if (count($wishlist) < 5): ?>
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                    <a href="#modal_add_wishlist_search" data-toggle="modal">
                                        <div class="mt-card-item md-white-hover height-200 border-md-blue-grey border-dash md-white md-black-text-hover border-medium py-45 px-30 md-blue-grey-text font-weight-600">
                                            <div class="m-grid m-grid-col m-grid-col-middle text-center ">
                                                <i class="fa fa-plus-circle font-40 "></i>
                                                <h6 class="my-40 font-18 font-weight-600 text-capitalize" > Add wish</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif ?>
                            <?php foreach ($wishlist as $key => $value): ?>
                                <?php if (!empty($value['company_id'])): ?>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <div class="mt-card-item ">
                                            <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                                <img src="<?= !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_EMPLOYERS.'profile-pic.png' ?>" class="img-fluid height-200 width-auto center-block py-0">
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
                                                <h3 class="mt-card-name"><?= !empty($value['company']) ? $value['company'] : '';  ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <div class="mt-card-item ">
                                            <div class="mt-card-avatar mt-overlay-1 mt-scroll-down">
                                                <img src="<?= !empty($value['profile_photo']) ? IMG_EMPLOYERS.$value['profile_photo'] : IMG_EMPLOYERS.'profile-pic.png' ?>" class="img-fluid height-200 width-auto center-block ">
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
                                                <h3 class="mt-card-name"><?= !empty($value['company_name']) ? $value['company_name'] : '';  ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                            <!-- Custom Company -->
                    </div>
                <?php else: ?>
                    <div class="portlet light text-center">
                        <div class="portlet-body p-100 ">
                            <i class="fa fa-heart-o font-40"></i>
                            <h5 class="font-weight-600 font-24"><?= !empty($language->site_wishlist_empty) ? $language->site_wishlist_empty : 'Your wishlist is empty'?></h5>
                            <h6 class="font-weight-400 font-18 font-grey-cascade mb-40"><?= !empty($language->site_wishlist_empty_subtitle) ? $language->site_wishlist_empty_subtitle : 'Add your favourite company here'?></h6>
                            <a href="#modal_add_wishlist_search" class="btn btn-md-indigo btn-md " data-toggle="modal">
                            <i class="fa fa-plus mr-10"></i><?= !empty($language->site_new_wishlist) ? $language->site_new_wishlist : 'New Wishlist'?></a>
                        </div>
                    </div>
                <?php endif ?>

                
                <!-- Modal add by search -->
                <div class="modal fade in" id="modal_add_wishlist_search" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="<?= base_url(); ?>jobseeker/wishlist/addCompany" class="form">
                            <div class="modal-content portlet light portlet-fit">
                                <div class="modal-header portlet-title">
                                    <div class="caption">
                                        <i class="icon-heart font-purple-plum"></i>
                                        <span class="caption-subject bold font-purple-plum uppercase"> <?= !empty($language->site_wishlist) ? $language->site_wishlist : 'Wishlist'?></span>
                                        <span class="caption-helper"><?= !empty($language->site_wishlist_add_company_subtitle) ? $language->site_wishlist_add_company_subtitle : 'add company into your wish list account'?></span>
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
                                                    <a href="javascript:void(0);" class="btn btn-md-orange search_company" ><?= !empty($language->site_search) ? $language->site_search : 'Search'?></a>
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
                                                    <button class="btn btn-md-orange"><?= !empty($language->site_search) ? $language->site_search : 'Search'?></button>
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


            </div>
        </div>