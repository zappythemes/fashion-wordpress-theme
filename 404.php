<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package fashion
 */

get_header(); ?>

			<div class="container">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'fashion' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fashion' ); ?></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			</div>
			</div>

<?php get_footer(); ?>
