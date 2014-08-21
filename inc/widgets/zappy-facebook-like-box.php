<?php
/**
 * Zappy Facebook Like Box Widget.
 */
class Zappy_Facebook_Like_Box_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_facebook_like_box', // Base ID
			__('Zappy Facebook Like Box','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Facebook Like Box in Sidebar','fashion' ), ) // Widget Description
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
		$zappy_app_id = $form_values['zappy_app_id'];
		if(empty($zappy_app_id))
		  $zappy_app_id="254148368096571"; 		
		$zappy_facebook_url = $form_values['zappy_facebook_url'];
		if(empty($zappy_facebook_url))
		  $zappy_facebook_url="https://www.facebook.com/zappythemes";
		$zappy_facebook_like_box_width = $form_values['zappy_facebook_like_box_width'];
		if(empty($zappy_facebook_like_box_width))
			$zappy_facebook_like_box_width="300";
		$zappy_facebook_like_box_height = $form_values['zappy_facebook_like_box_height'];
		if(empty($zappy_facebook_like_box_height))
			$zappy_facebook_like_box_height="300";
		
		$zappy_facebook_like_box_color = strtolower($form_values['zappy_facebook_like_box_color']);
		
		if($zappy_facebook_like_box_color=='dark'){
			echo '<style type="text/css">.fb-like-box{background:#333;}</style>';
		}
		//Get Facebook Like Box Using HTML 5 
		echo '<div id="fb-root" class=""></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId='.$zappy_app_id.'";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>';

		echo '<div class="facebook" align="center"><div class="fb-like-box" data-href="'.$zappy_facebook_url.'" data-width="'.$zappy_facebook_like_box_width.'" data-height="'.$zappy_facebook_like_box_height.'" data-colorscheme="'.$zappy_facebook_like_box_color.'" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div></div>';
		
		//After Widget
		echo $form_args['after_widget'];
	}


	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get Facebook App Id
		if ( isset( $form_values[ 'zappy_app_id' ] ) ) {
			$zappy_app_id = $form_values[ 'zappy_app_id' ];
		}
		
		//Get Facebook Page URL
		if ( isset( $form_values[ 'zappy_facebook_url' ] ) ) {
			$zappy_facebook_url = $form_values[ 'zappy_facebook_url' ];
		}
		
		//Get Facebook Page URL
		if ( isset( $form_values[ 'zappy_facebook_url' ] ) ) {
			$zappy_facebook_url = $form_values[ 'zappy_facebook_url' ];
		}
		
		//Get Facebook Like Box Widht
		if ( isset( $form_values[ 'zappy_facebook_like_box_width' ] ) ) {
			$zappy_facebook_like_box_width = $form_values[ 'zappy_facebook_like_box_width' ];
		}
		
		//Get Facebook Like Box Height
		if ( isset( $form_values[ 'zappy_facebook_like_box_height' ] ) ) {
			$zappy_facebook_like_box_height = $form_values[ 'zappy_facebook_like_box_height' ];
		}
		
		//Get Facebook Color Scheme
		if ( isset( $form_values[ 'zappy_facebook_like_box_color' ] ) ) {
			$zappy_facebook_like_box_color = $form_values[ 'zappy_facebook_like_box_color' ];
		}
	
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		
		<!-- Facebook App ID -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_app_id' ); ?>"><?php _e( 'Facebook App ID:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_app_id' ); ?>" name="<?php echo $this->get_field_name( 'zappy_app_id' ); ?>" type="text" value="<?php echo esc_attr( $zappy_app_id ); ?>" />
		</p>
		
		<!-- Facebook Page URL -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_facebook_url' ); ?>"><?php _e( 'Facebook Page URL:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'zappy_facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $zappy_facebook_url ); ?>" />
		</p>
		
		<!-- Facebook Like Box Width -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_facebook_like_box_width' ); ?>"><?php _e( 'Width:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_facebook_like_box_width' ); ?>" name="<?php echo $this->get_field_name( 'zappy_facebook_like_box_width' ); ?>" type="text" value="<?php echo esc_attr( $zappy_facebook_like_box_width ); ?>" />
		</p>
		
		<!-- Facebook Like Box Height -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_facebook_like_box_height' ); ?>"><?php _e( 'Height:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_facebook_like_box_height' ); ?>" name="<?php echo $this->get_field_name( 'zappy_facebook_like_box_height' ); ?>" type="text" value="<?php echo esc_attr( $zappy_facebook_like_box_height ); ?>" />
		</p>
		
		<!-- Facebook Like Box Color Scheme -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_facebook_like_box_color' ); ?>"><?php _e( 'Color Scheme:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_facebook_like_box_color' ); ?>" name="<?php echo $this->get_field_name( 'zappy_facebook_like_box_color' ); ?>" >
				<?php

					$facebook_like_box_color_scheme = array('Light','Dark'); 
					foreach ( $facebook_like_box_color_scheme as $zappy_facebook_like_box_color_schemes ) {
					
					  if($zappy_facebook_like_box_color_schemes==$zappy_facebook_like_box_color){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$zappy_facebook_like_box_color_schemes.'" '.$selected.'>' . $zappy_facebook_like_box_color_schemes . '</option>';
					}

				?>
			</select>
			
		</p>
		
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_app_id'] = ( ! empty( $updated_form_values['zappy_app_id'] ) ) ? strip_tags( $updated_form_values['zappy_app_id'] ) : '';
		
		$form_values['zappy_facebook_url'] = ( ! empty( $updated_form_values['zappy_facebook_url'] ) ) ? strip_tags( $updated_form_values['zappy_facebook_url'] ) : '';
		
		$form_values['zappy_facebook_like_box_width'] = ( ! empty( $updated_form_values['zappy_facebook_like_box_width'] ) ) ? strip_tags( $updated_form_values['zappy_facebook_like_box_width'] ) : '';
		
		$form_values['zappy_facebook_like_box_height'] = ( ! empty( $updated_form_values['zappy_facebook_like_box_height'] ) ) ? strip_tags( $updated_form_values['zappy_facebook_like_box_height'] ) : '';
		
		$form_values['zappy_facebook_like_box_color'] = ( ! empty( $updated_form_values['zappy_facebook_like_box_color'] ) ) ? strip_tags( $updated_form_values['zappy_facebook_like_box_color'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}

} //Close Zappy Facebook Like Box Widget Class

// Register Zappy Facebook Like Box Widget
function register_Zappy_Facebook_Like_Box_Widget() {
    register_widget('Zappy_Facebook_Like_Box_Widget');
}
add_action('widgets_init', 'register_Zappy_Facebook_Like_Box_Widget');