

    <!--========== PROMO BLOCK ==========-->
    <div class="s-promo-block-v2 g-bg-gradient-darkblue-strong parallax js-parallax-window" style="background: url('<?=base_url()?>assets/img/site/aboutus.jpg')  no-repeat fixed;">
        <div class="g-container-md g-text-center-xs g-ver-center-md g-padding-y-150-xs g-padding-y-0-md">
            <div class="center-block">
                <h1 class="g-font-size-40-xs g-font-size-50-sm g-font-size-60-md g-color-white g-letter-spacing-2 text-uppercase g-font-weight-500 g-margin-t-100-xs">Article</h1>
                <hr class="g-hor-divider-solid-sky-light g-width-400-xs center-block my-0">
            </div>

        </div>
    </div>
    <!--========== END PROMO BLOCK ==========-->

    <!--========== CONTENT ==========-->
    <!-- <div class="g-bg-color-sky-light"> -->
    <div class="container g-padding-y-20-xs">
        <div class="row">
            <div class="col-md-9">

                <ul class="list-group list-border">
                    <?php $no = 1;foreach($result as $row){ if($no == 6){break;} $no++;?>
						<li class="list-group-item px-1">
							<div class="media">
								<?php if($row->featured_image != ""){?>
									<div class="media-left pr-3">
										<a href="<?=base_url()?>article/<?=$row->slug?>">
											<img src="<?=base_url()?>assets/img/article/<?=$row->featured_image?>" alt="" class="avatar avatar-large">
										</a>
									</div>
								<?php }?>
								<div class="media-body">
									<a href="<?=base_url()?>article/<?=$row->slug?>">
										<h3 class="font-weight-600 pt-2"><?=$row->title?></h3>
									</a>
									<p class="roboto-font multiline-truncate"><?=$row->excerpt?></p>
									<p class="">
										<small>
											<i class="fa fa-user mr-1"></i> <?=$row->author?> | </small>
										<small>
											<i class="fa fa-calendar mr-1"></i> <?=date('j F Y', strtotime($row->created_at))?> </small>

										<small class="g-pull-right-xs">
											<a href="<?=base_url()?>article/<?=$row->slug?>" class="btn btn-md-orange">More</a>
										</small>
									</p>

								</div>
							</div>
						</li>
					<?php }?>                    

                    <li class="list-group-item text-center px-1">
                        <ul class="pagination pagination-mini">
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
									<a href="<?=base_url().'article/page/'.$other_page?>"> <?=$article_page-2?> </a>
								</li>
							<?php }?>
							<?php if($article_page-1 > 0){ $other_page = $article_page-1;?>
                            <li>
                                <a href="<?=base_url().'article/page/'.$other_page?>"> <?=$article_page-1?> </a>
                            </li>
							<?php }?>
                            <li class="active">
                                <a href="javascript:;"> <?=$article_page?> </a>
                            </li>
                            <?php if($article_total > $article_page+$article_page*4){ $other_page = $article_page+1;?>
								<li>
									<a href="<?=base_url().'article/page/'.$other_page?>"> <?=$article_page+1?> </a>
								</li>
							<?php }?>
                            <?php if($article_total > $article_page+$article_page*4+5){ $other_page = $article_page+2;?>
								<li>
									<a href="<?=base_url().'article/page/'.$other_page?>"> <?=$article_page+2?> </a>
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

            <div class="col-md-3">
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
