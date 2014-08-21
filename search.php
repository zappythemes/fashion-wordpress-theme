<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package fashion
 */

get_header(); ?>

		<main id="main" class="site-main" role="main">
		<div class="container">
    
			<div class="bread-crumb">
				<?php  
				if($zappy_options['breadcrumbs_check']==1)
					{
					zappy_the_breadcrumb();
					}
				?>
			</div>
			<div class="ten columns">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'fashion' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</div>
		<div class="six columns">
		<?php dynamic_sidebar('sidebar');?>
		</div>
		</div>
		</main><!-- #main -->
<?php get_footer(); ?>
