<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package fashion
 */

get_header(); ?>

		<div class="container"> 
			<div class="bread-crumb">
				<?php  
					if($zappy_options['breadcrumbs_check']==1)
						{
						zappy_the_breadcrumb();
						}
				?>
			</div>
			
			<div class="page-section-default">
			<div class="sixteen columns">
			<div class="grid-title title-rightless">
				<div class="grid-icon"></div>
				<h2><?php echo the_title();?></h2>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			<div class="clear"></div>
			</div>
			</div>
		</div>
<?php get_footer(); ?>