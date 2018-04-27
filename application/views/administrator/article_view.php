<!--========== PROMO BLOCK ==========-->
<?php if($article->featured_image != ""){?>
<div class="s-promo-block-v2 gradient-darkblue-v7  js-parallax-window parallax height-300 " style="background: url('<?=base_url()?>assets/img/article/<?=$article->featured_image?>'); no-repeat fixed">
	<?php }
	else{ 
		?>
		<div class="s-promo-block-v2 gradient-darkblue-v7  js-parallax-window parallax height-300 " style="background: url('<?=base_url()?>assets/img/site/mainpagebanner.jpg'); no-repeat fixed">
	<?php }?>
		<div class="container g-ver-bottom-100">
			<div class="row">
				<h1 class="font-weight-600 md-white-text wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".1s">
					<?=$article->title?>
				</h1>
				<p class=" mdo-white-v7-text wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".2s">
					<i class="icon-user mr-5 "></i>
					<?=$article->author?> |
						<i class="icon-calendar mr-5"></i>
						<?=date('j F Y', strtotime($article->created_at))?>
			</div>
		</div>
	</div>

	<!--========== CONTENT ==========-->

	<div class="container py-60">
		<div class="row ">
			<div class="col-md-9 mb-20 mb-0-md wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".2s">
				<?=$article->body?>
			</div>

			<div class="col-md-3">
				<!-- Share -->
				<div class="row ">
					<div class="col-md-12">
						<h5 class="font-weight-600 md-darkblue-text wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".2s ">Share </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".3s">

						<ul class="social-icons social-icons-color wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".4s">
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
				<div class="row mt-40">
					<div class="col-md-12">
						<h5 class="font-weight-600 md-darkblue-text wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".2s ">Popular Article </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".3s">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($popular as $row){ if($no == 6){break;} $no++;?>
							<li class="wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".4s">
								<div class="media">
									<?php if($row->featured_image != ""){?>
									<div class="media-left">
										<a href="<?=base_url()?>article/<?=$row->slug?>">
											<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" alt="" class="avatar avatar-tiny avatar-circle ">
										</a>
									</div>
									<?php }?>
									<div class="media-body">
										<h5 class="font-weight-500 roboto-font ">
											<a class="md-darkblue-text md-orange-text-hover" href="<?=base_url()?>article/<?=$row->slug?>">
												<?=$row->title?>
											</a>
										</h5>
										<p>
											<small class="multiline-truncate">
												<?=$row->excerpt?>
											</small>
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
						<h5 class="font-weight-600 md-darkblue-text wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".2s">Recent Article </h5>
						<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".3s">
						<ul class="list-unstyled">
							<?php $no = 1;foreach($recent as $row){ if($no == 6){break;} $no++;?>
							<li class="wow fadeInUp animated" data-wow-duration=".3" data-wow-delay=".4s">
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
