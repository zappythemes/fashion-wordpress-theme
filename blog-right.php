<?php 
/**Template Name:Blog With Right Sidebar */
get_header();
if($zappy_options['excerpt_length'])
{
	$zappy_excerpt_length =$zappy_options['excerpt_length'];
}
else
{ 
	$zappy_excerpt_length =10;
}
if($zappy_options['no_of_post'])
{
	$zappy_number_of_post=$zappy_options['no_of_post'];
}
else
{
	$zappy_number_of_post=get_options('posts_per_page');	
}
?>
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
        <div class="grid-title">
            <div class="grid-icon"></div>
            <h2><?php the_title();?></h2>
        </div>
        <div class="blog-section">
			<?php 
			if ( get_query_var('paged') ) 
					{ 
						$paged = get_query_var('paged'); 
						
					}
				elseif ( get_query_var('page') ) 
					{
						$paged = get_query_var('page');
					
					}
				else 
					{ 
						$paged = 1; 
						
					}
						query_posts("posts_per_page=$zappy_number_of_post&post_type='post'&paged=".$paged);
						// Blog Content
									// The Loop
					if ( have_posts() ) 
					{
					$i=0;
				while( have_posts()): the_post(); 
					global $post;
					$category=get_the_category();
					if($i%2==0){
					?>
					<article class="left-blog ">
                        <div class="five columns alpha omega">
                            <div class="blog-content">
                                <span><a href="<?php echo get_category_link( $category[0]->term_id );?>"><?php  echo $category[0]->cat_name; ?></a></span>
                                <h1><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h1>   
                                <p><?php echo zappy_string_limit_words(get_the_excerpt(),$zappy_excerpt_length);?></p> 
                                <p class="blog-learnmore">
								<?php if(str_word_count(get_the_excerpt()) > $zappy_excerpt_length){?>
								<a href="<?php the_permalink();?>"><?php echo _e('Read more','fashion');?></a>
								<?php } ?>
								</p>
                            </div>
                        </div>
                        <div class="five columns alpha omega small-blog">
                            <figure>
								<?php 
								$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
											if($zappy_options['featured_img_check']==1){?>
											<img src="<?php echo $img[0];?>"/>
											<?php } ?> 
                               
                            </figure>
                        </div>
                    </article>
				
				<?php } else{?>
                    <article class="left-blog">
                        <div class="five columns alpha omega small-blog">
                            <figure>
							<?php 
								$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
											if($zappy_options['featured_img_check']==1){?>
											<img src="<?php echo $img[0];?>"/>
											<?php } ?> 
                            </figure>
                        </div>
                        <div class="five columns alpha omega">
                            <div class="blog-content">
                                <span><a href="<?php echo get_category_link( $category[0]->term_id );?>"><?php  echo $category[0]->cat_name; ?></a></span>
                                <h1><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h1>   
                                <p><?php echo zappy_string_limit_words(get_the_excerpt(),$zappy_excerpt_length);?></p> 
                                <p class="blog-learnmore"><a href="<?php the_permalink();?>"><?php echo _e('Read more','fashion');?></a></p>
                            </div>
                        </div>
                    </article>
               
               <?php
			   }
			   $i++;
			   endwhile;
			   global $wp_query;
				zappy_pagination($wp_query->max_num_pages,2);	
			   }
			   else
					{
						// no posts found
						echo "Sorry no posts found";
					}
			/* Restore original Post Data */
			wp_reset_postdata();
			   ?>         
        </div>
    </div>
    <div class="six columns">
		<?php dynamic_sidebar('sidebar');?>
	</div>
</div>
<?php get_footer();?>