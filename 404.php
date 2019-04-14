<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package DevSpot
 */

get_header();
?>
<main>
	<?php include 'inc/common-banner.php' ?>
	<section class="section bg-secondary">
		<div class="container">
			<div class="card card-profile shadow banner-card">
				<div class="px-4 ptbx-4">
					<div class="row">
						<div class="col-md-8">
							<div id="content" class="site-content">
								<div id="primary" class="content-area text-center">
									<img class="img-fluid" src="wp-content/themes/devspot/assets/img/theme/404-animate.gif">
									<h1>Oops! That page can't be found.</h1>
									<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();