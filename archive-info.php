<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-blog-post">
	<a href="<?php the_permalink();?>"><h1><?php the_title(); ?></h1></a>
	<?php 
	$archive_year  = get_the_date('Y'); 
	$archive_month = get_the_date('m'); 
	$archive_day   = get_the_date('d'); 
				global $zappy_options;
				if($zappy_options['excerpt_length'])
				{
					$zappy_excerpt_length =$zappy_options['excerpt_length'];
				}
				else
				{ 
					$zappy_excerpt_length =10;
				}?>
				<div class="post-image"><figure>
				<?php
				if($zappy_options['featured_img_check']==1)
				{
					global $post;
					$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full'); 
						if(empty($img))
								{
									$img[0]=get_template_directory_uri().'/images/nopreview.png';
								}
				?>
					<img src="<?php echo $img[0];?>">
			<?php } ?>
			</figure>
			</div>
			<div class="post-date"><p><?php echo get_the_date('d M');?></p></div>
			<p><?php echo zappy_string_limit_words(get_the_excerpt(),$zappy_excerpt_length);?></p>
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'neeve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div>
</article><!-- #post-## -->