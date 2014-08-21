<?php
/**
 * The Template for displaying all single posts.
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
		<div class="ten columns">
		<?php while ( have_posts() ) : the_post(); 
			//Article Top Banner
						 if($zappy_options['article_top_banner_check']==1)
						 {
						   if($zappy_options['article_top_banner_option']==2)
						   {
						   
							 if($zappy_options['article_top_banner_openlink']==1)
							 {
								$target="target='_blank'";
							 }
						 ?>
							<div class="ftr-banner" align="center">
								<figure>
									<a href="<?php echo $zappy_options['article_top_banner_link']?>" title="<?php echo $zappy_options['article_top_banner_alternative_text']?>" <?php echo $target; ?>><img src="<?php echo $zappy_options['article_top_banner_image']['url']?>"></a>
								</figure>
							</div>
					   <?php 
							}
							elseif($zappy_options['article_top_banner_option']==1)
								{
						?>
								<div class="container ftr-banner" align="center">
									 <?php echo "<script type='text/javascript'>". $zappy_options['article_top_banner_code']."</script>";?>
								</div>
						<?php
								}
							}
						?>
			<?php get_template_part( 'content', 'single' ); 
			echo'<div class="clear"></div>';
						//Author Details
						if($zappy_options['post_author_check']==1)
						{
							global $post;
							$user_info=get_userdata($post->post_author);
							$mail=$user_info->user_email;
							$author=get_the_author();
							echo' <div class="abt-author">
								  <h3>'.__('About author','fashion').'</h3>
								  <div class="about-author">
								  <figure>'.get_avatar( $mail, 69 ).'</figure>
								  <h5><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.$author.'</a></h5>
								  <span>'.get_the_date('dS M').'</span>
								  <p>'.$user_info->description.'</p></div>
								</div><div class="clear"></div>
								';
									
						}
         
						//Recent Articles
						if($zappy_options['related_post_check']==1)
						{
							   echo'<div class="related-post">
									<div class="grid-title">
										<div class="grid-icon"></div>
										<h2>'.__('Related Post','fashion').'</h2>
									</div>';
										
							global $post;

							$current_post_type = get_post_type( $post );
							related_post($current_post_type,get_the_ID());
							echo"</div><div class='clear'></div>";
						}
						
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				echo '<div class="clear"></div>';
				//Article Bottom Banner
							 if($zappy_options['article_bottom_banner_check']==1)
							 {
							   if($zappy_options['article_bottom_banner_option']==2)
							   {
							   
								 if($zappy_options['article_bottom_banner_openlink']==1)
								 {
									$target="target='_blank'";
								 }
						?>
							<div class="ftr-banner" align="center" style="margin-top:10px;">
								<figure>
									<a href="<?php echo $zappy_options['article_bottom_banner_link']?>" title="<?php echo $zappy_options['article_bottom_banner_alternative_text']?>" <?php echo $target; ?>><img src="<?php echo $zappy_options['article_bottom_banner_image']['url']?>"></a>
								</figure>
							</div>
					   <?php 
							}
							elseif($zappy_options['article_bottom_banner_option']==1)
							{
					   ?>
								<div class="ftr-banner" align="center" style="margin-top:10px;">
									 <?php echo "<script type='text/javascript'>". $zappy_options['article_bottom_banner_code']."</script>";?>
								</div>
						<?php	
							}
							}
			 endwhile; // end of the loop. ?>
		</div>
		<div class="six columns">
		<?php dynamic_sidebar('sidebar');?>
		</div>
</div><!-- #primary -->
<?php get_footer(); ?>