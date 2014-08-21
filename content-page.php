<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package fashion
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-image">
	<figure>
	<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<img src="<?php echo $img[0];?>"></figure>
	</div>
	<?php the_content(); ?>
</article><!-- #post-## -->
