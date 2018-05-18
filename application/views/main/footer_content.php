<!--========== FOOTER ==========-->
<footer class="bg-dark">
    <!-- Links -->
    <div class="hor-divider-solid-thin border-mdo-white-v3">
        <div class="container py-40 ">
            <div class="row">
                <div class="col-sm-3 mb-20-xs mb-0-md">
                    <ul class="list-unstyled g-ul-li-tb-5-xs mb-0-xs">
                        <h6 class="md-white-text">Sitemap</h6>
                        <hr class="hor-divider-solid-thin border-mdo-white-v3 width-150">
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_home;?>"><?= $language->site_home;?></a>
                        </li>
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_about;?>"><?= $language->site_about;?></a>
                        </li>
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_services;?>"><?= $language->site_services;?></a>
                        </li>
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_contact;?>"><?= $language->site_contact;?></a>
                        </li>
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?>article"><?= $language->site_article;?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 mb-40-xs mb-0-md">
                    <ul class="list-unstyled g-ul-li-tb-5-xs mb-0-xs">
                        <h6 class="md-white-text"><?= $language->site_privacy_protection;?></h6>
                        <hr class="hor-divider-solid-thin border-mdo-white-v3 width-150">
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_privacy_policy;?>"><?= $language->site_privacy_policy;?></a>
                        </li>
                        <li>
                            <a class="font-15 mdo-white-v7-text" href="<?php echo base_url(); ?><?= $language->page_site_terms_of_use;?>"><?= $language->site_terms_of_use;?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1  py-50 py-0-md">
                <h3 class="font-30  md-white-text">Xremo </h3>
                    <p class="mdo-white-v7-text">Xremo, is your long-term partner in talent solutions and also an emerging, preferred career source provider in South East Asia.</p>
                    <ul class="list-unstyled g-ul-li-tb-5-xs mb-0-xs list-inline">
                        <li>
                            <a href="https://www.youtube.com/channel/UCMFZ8a2QlaWHhPrPf2CURSw" data-original-title="youtube" class="social-icon social-icon-color youtube">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/xremomy" data-original-title="twitter" class="social-icon social-icon-color twitter"> </a>
                        </li>
                        <li>
                            <a href="https://www.prod.facebook.com/xremomy/" data-original-title="facebook" class="social-icon social-icon-color facebook">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/6382421/" data-original-title="linkedin" class="social-icon social-icon-color linkedin">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Links -->


    <!-- Copyright -->
    <div class="container ">
        <div class="row my-5">
            <div class="col-xs-6">
                <a href="<?=base_url()?>">
                    <img class="height-40" src="<?php echo IMG;?>site/xremo-logo-white.svg" alt="Xremo Logo">
                </a>
            </div>
            <div class="col-xs-6 text-right">
                <p class="font-14 mdo-white-v7-text mt-5 mb-0">
                    <i class="fa fa-copyright fa-fw"></i>
                    <?php echo date('Y') ?> <?= $language->site_copyright;?> Xremo.com
                </p>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->
<!-- Back To Top -->
<a href="javascript:void(0);" class="s-back-to-top js-back-to-top"></a>
