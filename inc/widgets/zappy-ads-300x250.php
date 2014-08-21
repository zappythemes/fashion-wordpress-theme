<?php
/**
 * Zappy Ads_300x250 Widget.
 */
class Zappy_Ads_300x250_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_Ads_300x250', // Base ID
			__('Zappy Ads 300x250', 'fashion'), // Widget Name
			array( 'description' => __( 'Displaying Ads 300x250', 'fashion' ), ) // Widget Description
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
		$zappy_ads_300x250_image_path = $form_values['zappy_ads_300x250_image_path'];	
		$zappy_ads_300x250_ads_link = $form_values['zappy_ads_300x250_ads_link'];
		$zappy_ads_300x250_ads_custom_code = $form_values['zappy_ads_300x250_ads_custom_code'];
		
		//Get Ads
		if(!empty($zappy_ads_300x250_ads_custom_code)){
			 
		  echo '<div class="bigsponsor zappy_ads">';
					echo $zappy_ads_300x250_ads_custom_code;
		  echo '</div>';
			
		 }else{
			echo '<div class="bigsponsor zappy_ads">';
			echo "<a href='$zappy_ads_300x250_ads_link' target='_blank'><img src='$zappy_ads_300x250_image_path' width='300' height='250' /> </a>";
		    echo '</div>';
		}
		
		//After Widget
		echo $form_args['after_widget'];
	}


	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get Ads Image Path
		if ( isset( $form_values[ 'zappy_ads_300x250_image_path' ] ) ) {
			$zappy_ads_300x250_image_path = $form_values[ 'zappy_ads_300x250_image_path' ];
		}
		
		//Get Ads Link
		if ( isset( $form_values[ 'zappy_ads_300x250_ads_link' ] ) ) {
			$zappy_ads_300x250_ads_link = $form_values[ 'zappy_ads_300x250_ads_link' ];
		}
		
		//Get Ads Custom code
		if ( isset( $form_values[ 'zappy_ads_300x250_ads_custom_code' ] ) ) {
			$zappy_ads_300x250_ads_custom_code = $form_values[ 'zappy_ads_300x250_ads_custom_code' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:', 'fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
	
		<!-- Ads Image Path -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_ads_300x250_image_path' ); ?>"><?php _e( 'Ads Image Path:', 'fashion' ); ?></label> 
			
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_300x250_image_path' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_300x250_image_path' ); ?>" type="text" value="<?php echo esc_attr( $zappy_ads_300x250_image_path ); ?>" />
			<small>Use: http://example.com</small>
		</p>
		
		<!-- Ads Link -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_ads_300x250_ads_link' ); ?>"><?php _e( 'Ads Link:', 'fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_300x250_ads_link' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_300x250_ads_link' ); ?>" type="text" value="<?php echo esc_attr( $zappy_ads_300x250_ads_link ); ?>" />
		 <small>Use: http://example.com</small>
		</p>
	
		<!-- Ads Custom Code -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_ads_300x250_ads_custom_code' ); ?>"><?php _e( 'Ads Custom Code:', 'fashion' ); ?></label> 
			<textarea cols="30" rows="10" class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_300x250_ads_custom_code' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_300x250_ads_custom_code' ); ?>"><?php echo $zappy_ads_300x250_ads_custom_code;?></textarea>
		</p>
		
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_ads_300x250_image_path'] = ( ! empty( $updated_form_values['zappy_ads_300x250_image_path'] ) ) ? strip_tags( $updated_form_values['zappy_ads_300x250_image_path'] ) : '';
		
		$form_values['zappy_ads_300x250_ads_link'] = ( ! empty( $updated_form_values['zappy_ads_300x250_ads_link'] ) ) ? strip_tags($updated_form_values['zappy_ads_300x250_ads_link'] ) : '';
		
		$form_values['zappy_ads_300x250_ads_custom_code'] = ( ! empty( $updated_form_values['zappy_ads_300x250_ads_custom_code'] ) ) ? $updated_form_values['zappy_ads_300x250_ads_custom_code'] : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Ads_300x250 Widget Class

// Register Zappy Ads_300x250 Widget
function register_Zappy_Ads_300x250_Widget() {
    register_widget('Zappy_Ads_300x250_Widget');
}
add_action('widgets_init', 'register_Zappy_Ads_300x250_Widget');