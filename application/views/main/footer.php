
    <?php $this->load->view('main/footer_content');?>
	
    <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
    <!-- Vendor -->
	
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-v1-12-4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/jquery-v1-11.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
	
	<!--//REMOVE
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/jquery.masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/masonry/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/jquery.wow.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/rateit/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS; ?>plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
	-->

    <!-- General Components and Settings -->
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global/app.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/layout8/layout8.min.js"></script>    
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header-sticky.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/masonry.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/equal-height.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
    <!--========== END JAVASCRIPTS ==========-->
    
    <script type="text/javascript">
        $(document).ready(function()
        {
            setTimeout(function(){
                getArticle();
            }, 1000);
        })

        function getArticle()
        {
            $.ajax({
                type    : "POST",
                url     : "<?php echo base_url();?>home-article",
                success:function(response)
                {
                    var data = JSON.parse(response);

                    $("#latest_article").html(data.article);
                }
            });
        }

    </script>

</body></html>