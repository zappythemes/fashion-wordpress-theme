<?php
/**
 * Zappy Latest Post Widget.
 */
class Zappy_Latest_Post_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_latest_post', // Base ID
			__('Zappy Latest Post','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Latest Post in sidebar','fashion' ), ) // Widget Description
		);
	}

	// Front-end display of widget.
	public function widget( $args, $form_values ) {
		//Widget Title
		$zappy_title = apply_filters( 'widget_title', $form_values['zappy_title'] );

		echo $args['before_widget'];
		if ( ! empty( $zappy_title ) )
			echo $args['before_title'] . $zappy_title . $args['after_title'];
			
		//Get Form Values	
		$zappy_num_of_post=$form_values['zappy_num_of_post'];
		if(empty($zappy_num_of_post))
		  $zappy_num_of_post="5"; 
		$zappy_latest_post_type = $form_values['zappy_latest_post_type'];
		
		$zappy_thumb_check = $form_values[ 'zappy_thumb_check' ];
		
		if($zappy_latest_post_type=='attachment'){
		
			$post_status="inherit";
		
		}else{
			$post_status="publish";
		}
		
		?>	
		
		<!-- Get Latest Post -->	
		
			<?php
			$zappy_latest_post_query = new WP_Query("showposts=$zappy_num_of_post&post_type=$zappy_latest_post_type&post_status=$post_status"); 
			if($zappy_latest_post_query -> have_posts()){
				while ($zappy_latest_post_query -> have_posts()) : $zappy_latest_post_query -> the_post(); ?>
			<div class="author-post">
			
			<?php //Post thumbnail
			if($zappy_thumb_check=='on'){?>
			<div class="author-img">
			<figure>						
			<?php 
			global $post;
			$post_id=$post->ID;
			$post_thumbnail_id = get_post_thumbnail_id( $post_id );
			$url = wp_get_attachment_image_src( $post_thumbnail_id , 'thumbnail');
			echo '<img src="'.$url[0].'"/>';
			?>
			</figure>
			</div>		
					<?php 
					} ?> 
					<div class="author-title">
					<h4><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h4>
					</div>
					<p><?php echo zappy_string_limit_words(get_the_excerpt(),20);?></p>	
		  </div>
		<?php 
			endwhile;	
			}
		?>
		<?php	 
		echo $args['after_widget'];
	}


	//Back-end widget form.
	public function form( $form_values ) {
		//Get the zappy_title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get Number of post
		if ( isset( $form_values[ 'zappy_num_of_post' ] ) ) {
			$zappy_num_of_post = $form_values[ 'zappy_num_of_post' ];
		}
		
		
		//Get Display thumbnail?
		if ( isset( $form_values[ 'zappy_thumb_check' ] ) ) {
			$zappy_thumb_check = $form_values[ 'zappy_thumb_check' ];
			if($zappy_thumb_check=='on'){
				$thumb_checked = "checked=checked";
			} 
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
	
		<!-- Post type -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_latest_post_type' ); ?>"><?php _e( 'Select Post Type:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_latest_post_type' ); ?>" name="<?php echo $this->get_field_name( 'zappy_latest_post_type' ); ?>" >
				<?php
					$args=array('public' => true);
					$post_types = get_post_types($args, 'names' ); 
					
					$zappy_latest_post_types = $form_values['zappy_latest_post_type'];
					foreach ( $post_types as $post_type ) {
					
					  if($zappy_latest_post_types==$post_type){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$post_type.'" '.$selected.'>' . $post_type . '</option>';
					}

				?>
			</select>
		 
		</p>
	
		<!-- Number of post -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_num_of_post' ); ?>"><?php _e( 'Number of post:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_num_of_post' ); ?>" name="<?php echo $this->get_field_name( 'zappy_num_of_post' ); ?>" type="text" value="<?php echo esc_attr( $zappy_num_of_post ); ?>" />
		</p>
		
	
		<!-- Check Display Post Image -->
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id( 'zappy_thumb_check' ); ?>" name="<?php echo $this->get_field_name( 'zappy_thumb_check' ); ?>" type="checkbox" <?php echo $thumb_checked ?> />
			<label for="<?php echo $this->get_field_id( 'zappy_thumb_check' ); ?>"><?php _e( 'Display post thumbnail ?','fashion' ); ?></label> 
			
		</p>
		
		
		<?php 
	}

	
	//Save values from database
	
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
	
		//Update values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_num_of_post'] = ( ! empty( $updated_form_values['zappy_num_of_post'] ) ) ? strip_tags( $updated_form_values['zappy_num_of_post'] ) : '';
		
		$form_values['zappy_latest_post_type'] = ( ! empty( $updated_form_values['zappy_latest_post_type'] ) ) ? strip_tags( $updated_form_values['zappy_latest_post_type'] ) : '';
		
		$form_values['zappy_thumb_check'] = ( ! empty( $updated_form_values['zappy_thumb_check'] ) ) ? strip_tags( $updated_form_values['zappy_thumb_check'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}

} //close latest post widget class

// register Latest Post Widget
function register_Zappy_Latest_Post_Widget() {
    register_widget('Zappy_Latest_Post_Widget');
}
add_action('widgets_init', 'register_Zappy_Latest_Post_Widget');