<?php
/**
 * Zappy Latest Comment Widget.
 */
class Zappy_Lates_Comment_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_latest_comments', // Base ID
			__('Zappy Latest Comment','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Latest Comment in Sidebar','fashion'), ) // Widget Description
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
		$zappy_comment_post_name = $form_values['zappy_comment_post_name'];	
		$zappy_comment_post_type = $form_values['zappy_comment_post_type'];
		$zappy_number_of_comment = $form_values['zappy_number_of_comment'];
		$zappy_comment_avatar = $form_values[ 'zappy_comment_avatar' ];
		$zappy_comment_avatar = str_replace("px","",$zappy_comment_avatar);
		$zappy_comment_avatar_check = $form_values[ 'zappy_comment_avatar_check' ];
		//$zappy_comment_date_check = $form_values[ 'zappy_comment_date_check' ];
		
		if($zappy_comment_post_type=='attachment'){
		
			$post_status="inherit";
		
		}else{
			$post_status="publish";
		}
		
		if(empty($zappy_comment_avatar))
			$zappy_comment_avatar='73';
		 
		//Get all Comments
		zappy_latest_comments($zappy_comment_post_type,$zappy_number_of_comment,$post_status,$zappy_comment_avatar,$zappy_comment_avatar_check);
			
		//After Widget
		echo $form_args['after_widget'];
	}


	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get specific post comments
		if ( isset( $form_values[ 'zappy_comment_post_name' ] ) ) {
			$zappy_comment_post_name = $form_values[ 'zappy_comment_post_name' ];
		}
		
		//Get specific post type
		if ( isset( $form_values[ 'zappy_comment_post_type' ] ) ) {
			$zappy_comment_post_type = $form_values[ 'zappy_comment_post_type' ];
		}
		
		//Get number of comments
		if ( isset( $form_values[ 'zappy_number_of_comment' ] ) ) {
			$zappy_number_of_comment = $form_values[ 'zappy_number_of_comment' ];
		}
		
		//Get Avatar Image
		if ( isset( $form_values[ 'zappy_comment_avatar' ] ) ) {
			$zappy_comment_avatar = $form_values[ 'zappy_comment_avatar' ];
		}
		
		//Display Avatar?
		if ( isset( $form_values[ 'zappy_comment_avatar_check' ] ) ) {
			$zappy_comment_avatar_check = $form_values[ 'zappy_comment_avatar_check' ];
			if($zappy_comment_avatar_check=='on'){
				$avatar_checked = "checked=checked";
			}
		}
		
		//Display Date?
		if ( isset( $form_values[ 'zappy_comment_date_check' ] ) ) {
			$zappy_comment_date_check = $form_values[ 'zappy_comment_date_check' ];
			if($zappy_comment_date_check=='on'){
				$avatar_checked = "checked=checked";
			}
		}
			
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		<!-- Post types -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_comment_post_type' ); ?>"><?php _e( 'Select Post Type:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_comment_post_type' ); ?>" name="<?php echo $this->get_field_name( 'zappy_comment_post_type' ); ?>" >
				<?php
					$args=array('public' => true);
					$post_types = get_post_types($args, 'names' ); 
					
					$latest_post_types = $form_values['zappy_comment_post_type'];
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
	
	
		<!-- Post Name -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_comment_post_name' ); ?>"><?php _e( 'Post Name (slug):','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_comment_post_name' ); ?>" name="<?php echo $this->get_field_name( 'zappy_comment_post_name' ); ?>" type="text" value="<?php echo esc_attr( $zappy_comment_post_name ); ?>" />
			
		</p>
		
		<!-- Number of post -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_number_of_comment' ); ?>"><?php _e( 'Number of Comments:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_number_of_comment' ); ?>" name="<?php echo $this->get_field_name( 'zappy_number_of_comment' ); ?>" type="text" value="<?php echo esc_attr( $zappy_number_of_comment ); ?>" />
		</p>
		
		
		
		<!-- Check Display Date -->
		<!--p>
			<input class="checkbox" id="<?php //echo $this->get_field_id( 'zappy_comment_date_check' ); ?>" name="<?php //echo $this->get_field_name( 'zappy_comment_date_check' ); ?>" type="checkbox" <?php // echo $avatar_checked ?> />
			<label for="<?php //echo $this->get_field_id( 'zappy_comment_date_check' ); ?>"><?php // _e( 'Display Comment Date ?' ); ?></label> 
			
		</p--> 
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_comment_post_name'] = ( ! empty( $updated_form_values['zappy_comment_post_name'] ) ) ? strip_tags( $updated_form_values['zappy_comment_post_name'] ) : '';
		
		$form_values['zappy_comment_post_type'] = ( ! empty( $updated_form_values['zappy_comment_post_type'] ) ) ? strip_tags($updated_form_values['zappy_comment_post_type'] ) : '';
		
		$form_values['zappy_number_of_comment'] = ( ! empty( $updated_form_values['zappy_number_of_comment'] ) ) ? strip_tags($updated_form_values['zappy_number_of_comment'] ) : '';
		
		$form_values['zappy_comment_avatar'] = ( ! empty( $updated_form_values['zappy_comment_avatar'] ) ) ? strip_tags($updated_form_values['zappy_comment_avatar'] ) : '';
		
		$form_values['zappy_comment_avatar_check'] = ( ! empty( $updated_form_values['zappy_comment_avatar_check'] ) ) ? strip_tags($updated_form_values['zappy_comment_avatar_check'] ) : '';
		
		/* $form_values['zappy_comment_date_check'] = ( ! empty( $updated_form_values['zappy_comment_date_check'] ) ) ? strip_tags($updated_form_values['zappy_comment_date_check'] ) : ''; */
		
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Latest Comment Widget Class

// Register Zappy Latest Comment Widget
function register_Zappy_Lates_Comment_Widget() {
    register_widget('Zappy_Lates_Comment_Widget');
}
add_action('widgets_init', 'register_Zappy_Lates_Comment_Widget');