
    <!--========== PROMO BLOCK ==========-->
    <div class="s-promo-block-v2 g-bg-gradient-darkblue-strong g-height-300-xs" style="background: url('<?=base_url()?>assets/img/site/outofthebox.jpg')  no-repeat fixed;">
		<div class="g-container-md g-text-center-xs g-ver-center-md g-padding-y-150-xs g-padding-y-0-md">
            <div class="center-block">
                <!--<h1 class="g-font-size-40-xs g-font-size-50-sm g-font-size-60-md g-color-white g-letter-spacing-2 text-uppercase g-font-weight-500 g-margin-t-100-xs">Article</h1>
                <hr class="g-hor-divider-solid-sky-light g-width-400-xs center-block my-0">-->
            </div>

        </div>
	<!--<div class="s-promo-block-v2 g-bg-gradient-darkblue-light  g-height-300-xs" style="background: url('<?=base_url()?>assets/img/site/bg1.jpg')  no-repeat fixed;">-->
    </div>
    <!--========== END PROMO BLOCK ==========-->

    <!--========== CONTENT ==========-->

    <div class="container g-padding-y-20-xs">
        <div class="row mt-4 px-1">
            <div class="col-md-9 mb-6">
                <h2 class="font-weight-600 mb-4"> <?=$article->title?></h2>
                <small>
                    <i class="fa fa-user mr-1"></i> <?=$article->author?> |
                    <i class="fa fa-calendar mr-1"></i> <?=date('j F Y', strtotime($article->created_at))?>
				</small>
                
				<div style="margin-top:20px;">
					<?php if($article->featured_image != ""){?>
						<img src="<?=base_url()?>assets/img/article/<?=$article->featured_image?>" alt="" class="img-responsive pic-bordered g-height-300-xs" style="margin-bottom:10px;">
					<?php }?>
					<?=$article->body?>
				</div>
            </div>

            <div class="col-md-3">
                <!-- Share -->
                <div class="row mt-4 px-1">
					<div class="col-md-12">
						<h4 class="font-weight-500">Share </h4>
						<hr class="g-hor-border-1-solid-md-orange mt-width-50-xs mt-2">
						<ul class="social-icons social-icons-color">
							<li>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?= XREMO_URL; ?><?= uri_string(); ?>&amp;src=sdkpreparse" data-original-title="facebook" class="facebook fb-share-button share-fb" data-layout="button" data-size="small" data-mobile-iframe="false" target="_blank"> </a>
							</li>
							<li>
								<a href="https://plus.google.com/share?url=<?= XREMO_URL; ?><?= uri_string(); ?>" data-original-title="Google Plus" class="googleplus" target="_blank"> </a>
							</li>
							<li>
								<a href="http://www.linkedin.com/shareArticle?url=<?= XREMO_URL; ?><?= uri_string(); ?>" data-original-title="linkedin" class="linkedin" target="_blank"> </a>
							</li>
							<li>
								<a href="https://twitter.com/intent/tweet?text=<?php echo $article->title; ?> <?= XREMO_URL.uri_string(); ?>" data-original-title="twitter" class="twitter" target="_blank"> </a>
							</li>
							<!-- <li>
								<a href="javascript:;" data-original-title="instagram" class="instagram"> </a>
							</li> -->
						</ul>
					</div>
                </div>
                <!-- Popular Post [Top 3 ] -->
                <div class="row mt-4">
                    <div class="col-md-12">
						<h4 class="font-weight-500">Popular Article</h4>
						<hr class="g-hor-border-1-solid-md-orange mt-width-50-xs mt-2">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($popular as $row){ if($no == 6){break;} $no++;?>
								<li class="my-2">
									<div class="media">
										<?php if($row->featured_image != ""){?>
											<div class="media-left">
												<a href="<?=base_url()?>article/<?=$row->slug?>">
													<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" alt="" class="avatar avatar-tiny avatar-circle avatar-border-md">
												</a>
											</div>
										<?php }?>
										<div class="media-body">
											<h5 class="font-weight-600 pb-1 mb-0 mt-1">
												<a href="<?=base_url()?>article/<?=$row->slug?>"><?=$row->title?></a>
											</h5>
											<p class="mt-0">
												<small class="multiline-truncate"><?=$row->excerpt?></small>
											</p>
										</div>
									</div>
								</li>
							<?php }?>
						</ul>
					</div>
                </div>
                <!-- Recent Post [Latest 4 Post] -->
                <div class="row mt-4">
                    <div class="col-md-12">
						<h4 class="font-weight-500">Recent Article</h4>
						<hr class="g-hor-border-1-solid-md-orange mt-width-50-xs mt-2">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($recent as $row){ if($no == 6){break;} $no++;?>
								<li>
									<p class="">
										<a href="<?=base_url()?>article/<?=$row->slug?>" class="multiline-truncate"><?=$row->title?></a>
									</p>
								</li>
							<?php }?>
						</ul>
					</div>
                </div>
                

            </div>

        </div>
    </div>
    <!--========== END CONTENT ==========-->
