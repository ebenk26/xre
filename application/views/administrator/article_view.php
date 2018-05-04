	<!--========== PROMO BLOCK ==========-->
	<?php if($article->featured_image != ""){ ?>
	<div class="s-promo-block-v2 gradient-darkblue-v7  js-parallax-window parallax height-350" style="background: url('<?=base_url()?>assets/img/article/<?=$article->featured_image?>') no-repeat fixed;">
	<?php }else{ ?>
	<div class="s-promo-block-v2 gradient-darkblue-v7  js-parallax-window parallax height-350" style="background: url('<?=base_url()?>assets/img/site/mainpagebanner.jpg') no-repeat fixed ;">

		<?php }?>
		<div class="container g-ver-bottom-100 ">
			<div class="row mx-0 px-0-md px-30">
				<h1 class="font-weight-600 md-white-text wow fadeInUp  font-22 font-24-sm font-28-md font-40-lg" data-wow-delay=".1s">
					<?=$article->title?>
				</h1>
				<!-- Hidden When XS -->
				<p class=" font-16 mdo-white-v7-text wow fadeInUp hidden-xs visible-sm visible-md visible-lg " data-wow-delay=".2s">
					<i class="icon-user mr-5 "></i>
					<?=$article->author?> |
						<i class="icon-calendar mr-5"></i>
						<?=date('j F Y', strtotime($article->created_at))?>
				</p>

				<!-- Visible when XS -->
				<p class=" font-13 mdo-white-v7-text wow fadeInUp visible-xs hidden-sm hidden-md hidden-lg " data-wow-delay=".2s">
					<i class="icon-user mr-5 "></i>
					<?=$article->author?>
						<br>
						<i class="icon-calendar mr-5"></i>
						<?=date('j F Y', strtotime($article->created_at))?>
				</p>
			</div>
		</div>
	</div>

	<!--========== CONTENT ==========-->

	<div class="container py-60">
		<div class="row ">
			<div class="col-xs-12 col-md-9 mb-20 mb-0-md wow fadeIn " data-wow-delay=".2s">
				<?=$article->body?>
			</div>

			<div class="col-xs-12 col-sm-3 wow fadeIn " data-wow-delay=".2s ">
				<!-- Share -->
				<div class="row ">
					<div class="col-md-12">
						<h5 class="font-weight-600 md-darkblue-text ">Share </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 ">

						<ul class="social-icons social-icons-color ">
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
						</ul>
					</div>
				</div>
				<!-- Popular Post [Top 3 ] -->
				<div class="row mt-40">
					<div class="col-md-12">
						<h5 class="font-weight-600 md-darkblue-text">Popular Article </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($popular as $row){ if($no == 6){break;} $no++;?>
							<li>
								<div class="media">
									<div class="media-body">
										<h5 class="font-weight-500 roboto-font ">
											<a class="md-darkblue-text md-orange-text-hover" href="<?=base_url()?>article/<?=$row->slug?>">
												<?=$row->title?>
											</a>
										</h5>
										<small class="multiline-truncate mb-20">
											<?=$row->excerpt?>
										</small>
									</div>
								</div>
							</li>
							<?php }?>
						</ul>
					</div>
				</div>
				<!-- Recent Post [Latest 4 Post] -->
				<div class="row mt-40">
					<div class="col-md-12">
						<h5 class="font-weight-600 md-darkblue-text">Recent Article </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 ">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($recent as $row){ if($no == 6){break;} $no++;?>
							<li>
								<p>
									<a href="<?=base_url()?>article/<?=$row->slug?>" class="multiline-truncate md-darkblue-text md-orange-text-hover font-weight-400 roboto-font">
										<?=$row->title?>
									</a>
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
