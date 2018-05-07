<!--========== PROMO BLOCK ==========-->
<div class="s-promo-block-v2 gradient-darkblue-v7  js-parallax-window parallax height-300" style="background: url('<?=base_url()?>assets/img/site/mainpagebanner.jpg')  no-repeat fixed;">
	<div class="g-container-md text-center g-ver-bottom-90">
		<div class="center-block">
			<div class="wow fadeInUp " data-wow-delay=".1s">
				<h1 class="font-40 font-50-sm font-60-md  md-white-text letter-space-sm text-uppercase font-weight-500">Article</h1>
			</div>
			<div class="wow fadeInUp " data-wow-delay=".3s">
				<hr class=" width-250 center-block mt-0 mb-5 border-mdo-orange-v8 hor-divider-solid-medium">
			</div>
			<div class="wow fadeInUp "  data-wow-delay=".5s">
				<hr class=" width-200 center-block mt-0  border-mdo-orange-v8 hor-divider-solid-medium">
			</div>
		</div>
	</div>
</div>
<!--========== END PROMO BLOCK ==========-->

<!--========== CONTENT ==========-->
<div class="container py-60">
	<div class="row">
		<!-- LIST -->
		<div class="col-xs-12 col-sm-9 col-md-9">
			<ul class="list-group list-border">
				<?php 
						$article_page 	= $this->session->userdata('article_page');
						$no = 1;
						foreach($result as $row){ 
							if(($no < $article_page*5-4) || ($no > $article_page*5)){$no++;continue;} 
							$no++;					
					?>
				<li class="list-group-item ">
					<div class="media ">
						<?php if($row->featured_image != ""){?>
						<div class="pull-left hidden-xs visible-sm visible-md visible-lg">
							<a href="<?=base_url()?>article/<?=$row->slug?>">
								<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" alt="" class="avatar avatar-medium avatar-circle">
							</a>
						</div>
						<?php }?>
						<div class="media-body">
							<?php if($row->featured_image != ""){?>
							<div class=" visible-xs hidden-sm hidden-md hidden-lg">
								<a href="<?=base_url()?>article/<?=$row->slug?>">
									<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" alt="" class="img-fluid mb-30">
								</a>
							</div>
							<?php }?>
							<a href="<?=base_url()?>article/<?=$row->slug?>">
								<h3 class="font-weight-600 font-18 font-20-sm font-22-md font-26-xl">
									<?=$row->title?>
								</h3>
							</a>
							<p class="roboto-font multiline-truncate">
								<?=$row->excerpt?>
							</p>
							<p class="my-10 hidden-xs">
								<small>
									<i class="icon-user mr-5"></i>
									<?=$row->author?> | </small>
								<small>
									<i class="icon-calendar mr-5"></i>
									<?=date('j F Y', strtotime($row->created_at))?>
								</small>
								<small class="pull-right">
									<a href="<?=base_url()?>article/<?=$row->slug?>" class="btn btn-md-orange px-40 btn-sm letter-space-sm text-uppercase font-weight-600">More</a>
								</small>
							</p>
							<div class="visible-xs hidden-sm hidden-md hidden-lg mt-20 ">
								<a href="<?=base_url()?>article/<?=$row->slug?>" class="btn btn-md-orange px-40 btn-sm letter-space-sm text-uppercase font-weight-600">More</a>

							</div>

						</div>
					</div>
				</li>
				<?php }?>

				<li class="list-group-item text-center ">
					<ul class="pagination pagination-sm">
						<?php
								$article_total = 0;
								foreach($result as $row){
									$article_total++;
								}
								
								$max_page = 0;
								if($article_total%5 == 0){
									$max_page = $article_total/5;
								}else{
									$max_page = floor($article_total/5) + 1;
								}
								
								
								$article_page 	= $this->session->userdata('article_page');
								$prev 			= $article_page - 1;
								$next 			= $article_page + 1;
							?>
							<li>
								<a href="<?=base_url().'article'?>"> First </a>
							</li>
							<li>
								<a href="<?=$article_page == 1?base_url().'article':base_url().'article/page/'.$prev?>">
									<i class="fa fa-angle-left"></i>
								</a>
							</li>
							<?php if($article_page-2 > 0){ $other_page = $article_page-2;?>
							<li>
								<a href="<?=base_url().'article/page/'.$other_page?>">
									<?=$article_page-2?>
								</a>
							</li>
							<?php }?>
							<?php if($article_page-1 > 0){ $other_page = $article_page-1;?>
							<li>
								<a href="<?=base_url().'article/page/'.$other_page?>">
									<?=$article_page-1?>
								</a>
							</li>
							<?php }?>
							<li class="active">
								<a href="javascript:;">
									<?=$article_page?>
								</a>
							</li>
							<?php if($article_total > $article_page+$article_page*4){ $other_page = $article_page+1;?>
							<li>
								<a href="<?=base_url().'article/page/'.$other_page?>">
									<?=$article_page+1?>
								</a>
							</li>
							<?php }?>
							<?php if($article_total > $article_page+$article_page*4+5){ $other_page = $article_page+2;?>
							<li>
								<a href="<?=base_url().'article/page/'.$other_page?>">
									<?=$article_page+2?>
								</a>
							</li>
							<?php }?>
							<li>
								<a href="<?=$article_page == $max_page || $article_page > $max_page?base_url().'article/page/'.$max_page:base_url().'article/page/'.$next?>">
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
							<li>
								<a href="<?=base_url().'article/page/'.$max_page?>"> Last </a>
							</li>
					</ul>
				</li>

			</ul>
		</div>

		<!-- Popular post / Recent Post -->
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<!-- Popular Post [Top 3 ] -->
			<div class="row ">
				<div class="col-xs-12">
					<h5 class="font-weight-600 md-darkblue-text ">Popular Article </h5>
					<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 ">
					<ul class="list-unstyled">
						<?php $no = 1;foreach($popular as $row){ if($no == 6){break;} $no++;?>
						<li >
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
					<h5 class="font-weight-600 md-darkblue-text ">Recent Article </h5>
					<hr class=" width-50 hor-divider-solid-medium border-mdo-orange-v5 my-10 ">
					<ul class="list-unstyled">
						<?php $no = 1;foreach($recent as $row){ if($no == 6){break;} $no++;?>
						<li >
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
