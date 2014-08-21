<?php
/**
 * Zappy Specifc Author Post Widget.
 */
class Zappy_Author_Post_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_author_post', // Base ID
			__('Zappy Specific Author Post', 'fashion'), // Widget Name
			array( 'description' => __( 'Displaying Specific Author Post in Sidebar', 'fashion' ), ) // Widget Description
		);
	}

	// Front-end display of widget.
	 public function widget( $form_args, $form_values ) {
		//Widget Title
		$title = apply_filters( 'widget_title', $form_values['zappy_title'] );
		
		//Before Widget
		echo $form_args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $form_args['before_title'] . $title . $form_args['after_title'];
		//Get Form Fields Values	
		$zappy_authors = $form_values['zappy_authors'];	
		$zappy_authors_post_type = $form_values['zappy_authors_post_type'];
		$zappy_number_post = $form_values['zappy_number_post'];
		
		if($zappy_authors_post_type=='attachment'){
		
			$post_status="inherit";
		
		}else{
			$post_status="publish";
		}
		
		//Get specific author posts
		$zappy_author_query = new WP_Query("author=$zappy_authors&showposts=$zappy_number_post&post_type=$zappy_authors_post_type&post_status=$post_status"); 
		
?>
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
            <h4><a href="#"><?php the_title();?></a></h4>
            <span>- <?php echo get_the_author();?></span>
            </div>	
			<p>	
				<?php echo zappy_string_limit_words(get_the_excerpt(),20);?>	
			</p>
		
	   </div>
				<?php 
					
		
		
		//After Widget
		echo $form_args['after_widget'];

}
	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get specific author
		if ( isset( $form_values[ 'zappy_authors' ] ) ) {
			$zappy_authors = $form_values[ 'zappy_authors' ];
		}
		
		//Get specific post type
		if ( isset( $form_values[ 'zappy_authors_post_type' ] ) ) {
			$zappy_authors_post_type = $form_values[ 'zappy_authors_post_type' ];
		}
		
		//Get number of post
		if ( isset( $form_values[ 'zappy_number_post' ] ) ) {
			$zappy_number_post = $form_values[ 'zappy_number_post' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:', 'fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
	
		<!-- Authors -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_authors' ); ?>"><?php _e( 'Select Author:', 'fashion' ); ?></label> 
			
			<select id="<?php echo $this->get_field_id( 'zappy_authors' ); ?>" name="<?php echo $this->get_field_name( 'zappy_authors' ); ?>" >
				<?php
					
					$zappy_authors = get_users('orderby=nicename&role=administrator&who=authors');
					$sigle_zappy_authors = $form_values['zappy_authors'];
					 foreach ($zappy_authors as $author) {
					
					  if($sigle_zappy_authors==$author->ID){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$author->ID.'" '.$selected.'>' . ucfirst($author->user_nicename) . '</option>';
					}

				?>
			</select>
		</p>
		
		<!-- Post types -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_authors_post_type' ); ?>"><?php _e( 'Select Post Type:','fashion'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_authors_post_type' ); ?>" name="<?php echo $this->get_field_name( 'zappy_authors_post_type' ); ?>" >
				<?php
					$args=array('public' => true);
					$post_types = get_post_types($args, 'names' ); 
					
					$latest_post_types = $form_values['zappy_authors_post_type'];
					foreach ( $post_types as $post_type ) {
					
					  if($latest_post_types==$post_type){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$post_type.'" '.$selected.'>' . ucfirst($post_type) . '</option>';
					}

				?>
			</select>
		 
		</p>
	
		<!-- Number of post -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_number_post' ); ?>"><?php _e( 'Number of Post:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_number_post' ); ?>" name="<?php echo $this->get_field_name( 'zappy_number_post' ); ?>" type="text" value="<?php echo esc_attr( $zappy_number_post ); ?>" />
		</p>
		
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_authors'] = ( ! empty( $updated_form_values['zappy_authors'] ) ) ? strip_tags( $updated_form_values['zappy_authors'] ) : '';
		
		$form_values['zappy_authors_post_type'] = ( ! empty( $updated_form_values['zappy_authors_post_type'] ) ) ? strip_tags($updated_form_values['zappy_authors_post_type'] ) : '';
		
		$form_values['zappy_number_post'] = ( ! empty( $updated_form_values['zappy_number_post'] ) ) ? strip_tags($updated_form_values['zappy_number_post'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Specific Post Author Widget Class

// Register Zappy Specific Post Author Widge
function register_Zappy_Author_Post_Widget() {
    register_widget('Zappy_Author_Post_Widget');
}
add_action('widgets_init', 'register_Zappy_Author_Post_Widget');