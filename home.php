<?php get_header();
	global $zappy_options;
	if($zappy_options['no_of_post'])
	{
		$zappy_number_of_post=$zappy_options['no_of_post'];
	}
	else
	{
		$zappy_number_of_post=get_options('posts_per_page');	
	}
	if($zappy_options['excerpt_length'])
	{
		$zappy_excerpt_length =$zappy_options['excerpt_length'];
	}
	else
	{ 
		$zappy_excerpt_length =10;
	}
?>
<div class="container">
    <div class="ten columns">
	<!-- Post Section -->
		<div class="post-section">
			<div class="grid-title">
				<div class="grid-icon"></div>
				<h2><?php _e('posts','fashion');?></h2>
			</div>
			
			<div class="post-fields cbp-so-scroller" id="cbp-so-scroller">
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
				// Zappy Query
				query_posts("posts_per_page=$zappy_number_of_post&post_type='post'&paged=".$paged);

				// The Loop
				if ( have_posts() ) {
				$i=0;
					while ( have_posts()): the_post();
						
						global $post;
							$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 
							if(empty($img))
								{
									$img[0]=get_template_directory_uri().'/images/nopreview.png';
								}
								if($i%2==0){
						echo '<article class="post-content cbp-so-section">
					<div class="five columns alpha omega cbp-so-side cbp-so-side-left">
						<figure><img src="'.$img[0].'"></figure>
					</div>
					<div class="five columns post-content-text">
						<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
						<div class="post-date">
							<p>'.get_the_date("d M").'</p>
						</div>
						<p class="post-detail">'.zappy_string_limit_words(get_the_excerpt(),$zappy_excerpt_length).'<span>';
					  if(str_word_count(get_the_excerpt()) > $zappy_excerpt_length){
		 
					  echo "<a href=".get_permalink().">".__('Read more','fashion')."</a>";
					
					 } 
					echo'</span></p></div></article>';
					}
						else{
					echo'<article class="post-content-right cbp-so-section">                        
                        <div class="five columns  alpha omega post-content-text">
                            <h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
                            <div class="post-date">
                                <p>'.get_the_date("d M").'</p>
                            </div>                           
                            <p class="post-detail">'.zappy_string_limit_words(get_the_excerpt(),$zappy_excerpt_length).'<span>';
							if(str_word_count(get_the_excerpt()) > $zappy_excerpt_length){
							  echo "<a href=".get_permalink().">".__('Read more','fashion')."</a>";
							 } 
							echo'</span></p>                            
                        </div>
                        <div class="five columns cbp-so-side cbp-so-side-right">
                            <figure><img src="'.$img[0].'"></figure>
                        </div>
                    </article>';
					}
					$i++;
					endwhile;
					global $wp_query;
					zappy_pagination($wp_query->max_num_pages,2);	
					}
				else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();?>
				
				
			</div>                
		</div>
	<!-- Post Section Ends-->
	<!-- Gallery Section -->
        <div class="gallery-section fadeup-effect">
            <div class="grid-title">
                <div class="grid-icon"></div>
                <h2><?php _e('Gallery','fashion');?></h2>
            </div>
            <div class="gallery-image-grid">
                <ul class="gallery clearfix">
				<?php
				/**theme gallery*/
					if($zappy_options['gallery'])
					{
					$i=1;
					$zappy_gallery=explode(",",$zappy_options['gallery']);
					$gallery_count=count($zappy_gallery);
					$count=10;
						foreach($zappy_gallery as $zappy_gallery_value)
						{
						if($i<=$count){
						if($i==1)
						{
							$class="medium";
						}
						else
						{
							$class="thumb";
						}
						$url = wp_get_attachment_image_src($zappy_gallery_value,'full'); 
						$url2 = wp_get_attachment_image_src($zappy_gallery_value,'medium'); 
						$url1 = wp_get_attachment_image_src($zappy_gallery_value,'thumbnail'); ?>
						<li class="gallery-<?php echo $class;?>">
							<a href="<?php echo $url[0];?>" rel="prettyPhoto[gallery1]">
							<div class="pic">
								<figure><img src="<?php echo $url[0];?>"></figure><span class="pic-caption bottom-to-top"><span>
							</div>
							</a>
						</li>               
						<?php
						$i++;
							}
							else
							{
							if($gallery_count>10){?>
							<div class="view-more"><button><a href="<?php echo get_site_url();?>/gallery"><?php _e('View More','fashion');?></a></button></div>
							<?php } 
							}
							}
							}?>
						
                </ul>
            </div>
        </div>
        <!-- Gallery Section Ends -->
	</div>
	<div class="six columns">
	<?php get_sidebar();?>
	</div>
</div>
<script>
	new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );
</script>
<?php get_footer();
?>