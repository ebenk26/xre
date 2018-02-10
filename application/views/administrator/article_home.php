<?php
    foreach ($article as $articles)
    {
?>
        <div class="col-sm-4 g-margin-b-30-xs g-margin-b-0-md">
            <!-- News -->
            <article>
                <img class="img-responsive" src="<?= base_url(); ?>assets/img/article/<?= $articles["featured_image"]; ?>" alt="Image">
                <div class="g-bg-color-white g-box-shadow-dark-lightest-v2 g-text-center-xs g-padding-x-40-xs g-padding-y-40-xs">
                    <!-- <p class="text-uppercase g-font-size-14-xs g-font-weight-700 g-color-md-orange-text g-letter-spacing-2">Career Fair</p> -->
                    <h2 class="g-font-size-20-xs g-font-weight-500 g-letter-spacing-1">
                        <a href="#" class=" g-color-md-orange-text"><?= $articles["title"]; ?></a>
                    </h2>
                    <p><?= $articles["excerpt"]; ?></p>
                </div>
            </article>
            <!-- End News -->
        </div>
<?php
    }
?>