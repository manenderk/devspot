<?php
    /**
     * Template Name: Profile
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package DevSpot
     */
    
    get_header();
    ?>
    <main class="profile-page">
    <?php include 'inc/common-banner.php' ?>
    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--200">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <?php the_post_thumbnail( [180, 180], [ 'class' => 'rounded-circle']); ?>
                </div>
              </div>
            </div>
            <?php the_content() ?>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php
get_footer();