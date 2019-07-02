<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevSpot
 */

?>
  <button id="jump-to-top" class="btn btn-icon btn-primary"><i class="fa fa-2x fa-arrow-up"></i></button>
  <footer class="footer has-cards">
		  
    <div class="container container-lg">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          
        </div>
        <div class="col-md-6 mb-5 mb-lg-0">
          
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">Thanks for giving a visit here!</h3>
          <h4 class="mb-0 font-weight-light">Your <a href="<?php echo get_site_url() ?>/feedback/">feedbacks</a> are appreciated.</h4>
        </div>
        <div class="col-lg-6 text-lg-right btn-wrapper">
          <a target="_blank" href="https://www.facebook.com/deevsi.web" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Let's Connect">
            <i class="fa fa-facebook-square"></i>
          </a>          
        </div>
      </div>
      <hr class="margin-bottom-0">
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; <span id="copyright-year">2019</span> Deevsi
          </div>
        </div>
        <div class="col-md-6">
          <?php
            wp_nav_menu( array(
              'theme_location'=> 'menu-2',								
              'container'		=> 'ul',
              'menu_class'	=> 'nav nav-footer justify-content-end',
              'fallback_cb'	=> false
            ) );
          ?>
          
        </div>
      </div>
    </div>
 </footer>

<?php wp_footer(); ?>

</body>
</html>
