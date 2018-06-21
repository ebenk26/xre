	<!-- BEGIN FOOTER -->	
	<div class="page-footer pull-right mdo-white-v5-text">
        <div class="page-footer-inner"> <?=date('Y')?> ©
			<a target="_blank" class="mdo-white-v5-text" href="https://www.xremo.com">Xremo Sdn. Bhd.</a> &nbsp;|&nbsp;
			<a target="_blank" class="mdo-white-v5-text" href="<?=base_url()?><?= !empty($language->page_site_terms_of_use) ? $language->page_site_terms_of_use : 'terms-of-use'; ?>"><?= !empty($language->site_terms_of_use) ? $language->site_terms_of_use : 'Term Of Use' ?></a> &nbsp;|&nbsp;
			<a target="_blank" class="mdo-white-v5-text" href="<?=base_url()?><?= !empty($language->page_site_privacy_policy) ? $language->page_site_privacy_policy : 'privacy'; ?>"><?= !empty($language->site_privacy_policy) ? $language->site_privacy_policy : 'Term Of Use' ?></a> &nbsp;|&nbsp;
			<!-- <a target="_blank" class="mdo-white-v5-text" href="faq.html">FAQ</a> -->
			<div class="scroll-to-top" >
				<i class="icon-arrow-up md-orange-text"></i>
			</div>
		</div>
    </div>
    <!-- END FOOTER-->