<?php
//Set Post Views
function zappy_set_post_views($postID) {
		$count_key = 'zappy_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//Track Post Views
function zappy_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    zappy_set_post_views($post_id);
}
add_action( 'wp_head', 'zappy_track_post_views');

//Get Post Views
function zappy_get_post_views($postID){
    $count_key = 'zappy_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

//Zappy Popular Post
function zappy_Popular_post(){

	$zappy_popularpost = new WP_Query( array( 'posts_per_page' =>3, 'meta_key' => 'zappy_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		if($zappy_popularpost -> have_posts()):
				while ($zappy_popularpost -> have_posts()) : $zappy_popularpost -> the_post();?>
						<div class="author-post">
						<div class="author-img">
                            <figure>
							
							<?php
								global $post;
								$post_id=$post->ID;
								$post_thumbnail_id = get_post_thumbnail_id( $post_id );
								$url = wp_get_attachment_image_src( $post_thumbnail_id , 'thumbnail');
								if(empty($url))
									{
										$url[0]=get_template_directory_uri().'/images/layouts/nopreview.png';
									}
									
										echo '<img src="'.$url[0].'"/>';
							?>
							</figure>
                        </div>
						<div class="author-title">
                                <h4><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
                                <span>- <?php echo get_the_author();?></span>
                        </div>	
						<p>
							
							<?php echo zappy_string_limit_words(get_the_excerpt(),20);?>
							
						</p>
				
					   </div>
				<?php 
		
			endwhile;
			
	else:
		echo "Sorry No Posts are available";
	endif;	
}

//Zappy Recent Post
function zappy_recent_post(){

	$zappy_recent_post = new WP_Query( array( 'posts_per_page' => 3, 'post_type' => 'post','post_status'=>'publish' ) );
				if($zappy_recent_post -> have_posts()):
				while ($zappy_recent_post -> have_posts()) : $zappy_recent_post -> the_post();?>
						<div class="author-post">
								<div class="author-title">
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                <span>- <?php echo get_the_author();?></span>
								</div>
								<p>
									<?php echo zappy_string_limit_words(get_the_excerpt(),20);?>	
								</p>
						
					   </div>
				<?php 
			endwhile;
else:
		echo "Sorry No Posts are available";
	endif;				
}

//Zappy Latest Comments
function zappy_latest_comments($zappy_comment_post_type='post',$zappy_number_of_comment='3',$post_status='publish',$zappy_comment_avatar='73',$zappy_comment_avatar_check){

		 $args ="";
		 $args .= "post_type=$zappy_comment_post_type&number=$zappy_number_of_comment&post_status=$post_status";

		 if(isset($zappy_comment_post_name)){
			$args .= "&post_name=$zappy_comment_post_name";
		 }
		$zappy_comments_query = new WP_Comment_Query;
		$zappy_comments       = $zappy_comments_query->query( $args );
		if( $zappy_comments ) :
			
				foreach( $zappy_comments as $zappy_comment ) :?>
						<div class="recent-comment">
							<div class="comment-heading">
                            <div class="comment-date">
                                <p><?php echo get_comment_date('d M',$zappy_comment->comment_ID);?></p>
                            </div>
							<div class="comment-title">
                              <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            </div>
							</div>
									
								<p class="recent-com-text">
									
									<?php echo zappy_string_limit_words($zappy_comment->comment_content,20)?>
									
								</p>
						
					   </div>
				<?php
					
				endforeach;
				
			
		 else:
			echo "Sorry No comments are available";
		endif;	
}
//Facebook Like Count
function zappy_facebook_like_count($zappy_facebook_url){
		$zappy_url = str_replace('https://www.facebook.com/', '', $zappy_facebook_url);
		
		
		$curl_url = 'https://graph.facebook.com/' . $zappy_url;
		//wp_remote_get($curl_url);
		echo wp_remote_get($curl_url);
		try{
			//$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $curl_url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			//$result = curl_exec($ch);
			$results = json_decode($result, true);
			curl_close($ch);
			if(array_key_exists( 'error', $results)){
				$flc_message = 'Error - '.$results['error']['message'];
				return $flc_message;
			}
			else{
				return (int)$results['likes'];
			}
		}
		catch( Exception $e){
			$flc_message = $e->getMessage();
		} 

}
//Google Like box count
function zappy_google_plus_count($id)
{

			$zappy_link = "https://plus.google.com/".$id;

			$zappy_gplus = array(
	                'method'    => 'POST',
	                'sslverify' => false,
	                'timeout'   => 30,
	                'headers'   => array( 'Content-Type' => 'application/json' ),
	                'body'      => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $zappy_link . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]'
	            );

	           
	        $remote_data = wp_remote_get( 'https://clients6.google.com/rpc', $zappy_gplus );            

	        $json_data = json_decode( $remote_data['body'], true );
			$gresult="";
	        foreach($json_data[0]['result']['metadata']['globalCounts'] as $zappy_gcount){
	                	
	        $gresult .= $zappy_gcount;

	        }

	        if( 0 != $zappy_gcount){

	        	return $zappy_gcount; 

	        } else {

				$zappy_link = "https://plus.google.com/".$id."/posts";		

				$page = WP_Filesystem($zappy_link);

				if (preg_match('/>([0-9,]+) people</i', $page, $matches)) {
				
					return str_replace(',', '', $matches[1]);

				}

	        }

}
	
?>