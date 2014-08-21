<?php
/**
 * @package fashion
 */
    global $zappy_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-blog-post">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<div class="post-image"><figure>
		<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
		if($zappy_options['featured_img_check']==1){?>
		<?php the_post_thumbnail('full'); } ?>
		</figure></div>
		<div class="post-date"><p><?php echo get_the_date('d M');?></p></div>
			<div class="single-blog-content">
			<?php the_content(); ?>
			</div>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'fashion' ),
					'after'  => '</div>',
				) );
			?>
	</div>
</article><!-- #post-## -->
