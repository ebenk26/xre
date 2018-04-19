<?php $this->load->view('main/footer_content');?>

<!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->

<!-- CORE -->
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-v1-12-4.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery-v1-11.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.migrate.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/js.cookie.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- VENDOR -->
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.smooth-scroll.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.back-to-top.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.equal-height.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/jquery.wow.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/counterup.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/swiper/swiper.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/jquery.masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/masonry/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/rateit/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- Custom-->
<script type="text/javascript" src="<?php echo JS; ?>alertify.min.js"></script>

<!-- Global-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global/app.min.js"></script>
<!-- Layout 8 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/layout8/layout8.min.js"></script>

<!-- Component Page -->
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/header-sticky.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/counter.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/portfolio-3-col.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/parallax.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo JS; ?>layout8/components/google-map.min.js"></script> -->
<script type="text/javascript" src="<?php echo JS; ?>layout8/components/wow.min.js"></script>

<script type="text/javascript" src="<?php echo JS; ?>pages/portfolio-3-gallery.js"></script>


<!--========== END JAVASCRIPTS ==========-->

<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            getArticle();
        }, 1000);
    })

    function getArticle() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home-article",
            success: function (response) {
                var data = JSON.parse(response);

                $("#latest_article").html(data.article);
            }
        });
    }

</script>

</body>

</html>
