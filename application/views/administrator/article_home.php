<?php
    foreach ($article as $articles){
?>
    <div class="col-sm-4 mb-0-md mb-30">
        <!-- News -->
        <article>
            <?php
                if(isset($articles["featured_image"]) && !empty($articles["featured_image"]))
                {
            ?>
                <div class="view height-230 " style="background: url('<?= base_url(); ?>assets/img/article/<?= $articles[" featured_image "]; ?>') no-repeat fixed center ;">
                    <div class="mask hm-darkblue-v3"></div>
                </div>
                <?php
                }
            ?>
                    <div class="md-white shadow-v3 text-center p-40">
                        <h4 class=" font-weight-600 letter-space-xs">
                            <a href="<?= base_url().'article/'.$articles['slug']; ?>" target="_blank" class=" md-darkblue-text">
                                <?= $articles["title"]; ?>
                            </a>
                        </h4>
                        <hr class="width-100 border-md-orange center-block mb-5">
                        <hr class="width-80 border-md-orange center-block mt-0">
                        <p class="mdo-darkblue-v8-text">
                            <?= $articles["excerpt"]; ?>
                        </p>
                    </div>
        </article>
        <!-- End News -->
    </div>
<?php
    }
?>
