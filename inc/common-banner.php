<section class="section-profile-cover section-shaped my-0">
    <div class="shape shape-style-1 shape-default alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container banner-small shape-container d-flex align-items-center py-lg">
        <div class="col px-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ) ?>">
                        <h1 class="site-title text-white"><?php bloginfo( 'name' ); ?></h1>
                    </a>
                    <div class="mt-4">
                        <p class="text-white">
                            <?php 
                                if($post)
                                    include get_template_directory() . "/inc/breadcrumb.php";
                                else if(is_404())
                                    echo '404';
                            ?>						
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-grey" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</section>