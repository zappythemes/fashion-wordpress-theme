<?php
/**
 * Zappy Ads_120x60 Widget.
 */
class Zappy_Ads_120x60_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_Ads_120x60', // Base ID
			__('Zappy Ads 120x60', 'fashion'), // Widget Name
			array( 'description' => __( 'Displaying Ads 120x60', 'fashion' ), ) // Widget Description
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
		for($i=1;$i<=4;$i++){
		
			$zappy_ads_120x60_image_path = $form_values["zappy_ads_120x60_image_path$i"];	
			$zappy_ads_120x60_ads_link = $form_values["zappy_ads_120x60_ads_link$i"];
			$zappy_ads_120x60_ads_custom_code = $form_values["zappy_ads_120x60_ads_custom_code$i"];
			
			//Get Ads
			if(!empty($zappy_ads_120x60_ads_custom_code)){
					 
			  echo '<div class="smallsponsor">';
						echo $zappy_ads_120x60_ads_custom_code;
			  echo '</div>';
					
			}elseif($zappy_ads_120x60_image_path){
				echo '<div class="smallsponsor">';
				echo "<a href='$zappy_ads_120x60_ads_link' target='_blank'><img src='$zappy_ads_120x60_image_path' width='120' height='60' /> </a>";
				echo '</div>';
			}
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
	    for($i=1;$i<=4;$i++){
		
			//Get Ads Image Path
			if ( isset( $form_values[ "zappy_ads_120x60_image_path$i" ] ) ) {
				$zappy_ads_120x60_image_path = $form_values[ "zappy_ads_120x60_image_path$i" ];
			}
			
			//Get Ads Link
			if ( isset( $form_values[ "zappy_ads_120x60_ads_link$i" ] ) ) {
				$zappy_ads_120x60_ads_link = $form_values[ "zappy_ads_120x60_ads_link$i"];
			}
			
			//Get Ads Custom code
			if ( isset( $form_values[ "zappy_ads_120x60_ads_custom_code$i" ] ) ) {
				$zappy_ads_120x60_ads_custom_code = $form_values[ "zappy_ads_120x60_ads_custom_code$i" ];
			}
		   if($i<=1){		
		?>
		
			<!-- Widget Title -->
			<p>
				<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion'); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
			</p>
		  <?php } ?>
			<!-- Ads Image Path -->
			<p>
				<label for="<?php echo $this->get_field_id( 'zappy_ads_120x60_image_path'.$i.'' ); ?>"><?php printf( __('Ads Image Path %d :','fashion' ), $i); ?></label> 
				
				<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_120x60_image_path'.$i.'' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_120x60_image_path'.$i.'' ); ?>" type="text" value="<?php echo esc_attr( $zappy_ads_120x60_image_path ); ?>" />
				<small>Use: http://example.com</small>
			</p>
			
			<!-- Ads Link -->
			<p>
				<label for="<?php echo $this->get_field_id( 'zappy_ads_120x60_ads_link'.$i.'' ); ?>"><?php printf( __('Ads Link %d :','fashion' ), $i); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_120x60_ads_link'.$i.'' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_120x60_ads_link'.$i.'' ); ?>" type="text" value="<?php echo esc_attr( $zappy_ads_120x60_ads_link ); ?>" />
			 <small>Use: http://example.com</small>
			</p>
		
			<!-- Ads Custom Code -->
			<p>
				<label for="<?php echo $this->get_field_id( 'zappy_ads_120x60_ads_custom_code'.$i.'' ); ?>"><?php printf( __('Ads Custom Code %d :','fashion' ), $i); ?></label> 
				<textarea cols="30" rows="10" class="widefat" id="<?php echo $this->get_field_id( 'zappy_ads_120x60_ads_custom_code'.$i.'' ); ?>" name="<?php echo $this->get_field_name( 'zappy_ads_120x60_ads_custom_code'.$i.'' ); ?>"><?php echo $zappy_ads_120x60_ads_custom_code;?></textarea>
			</p>
		<?php } 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		for($i=1;$i<=4;$i++){
			$form_values["zappy_ads_120x60_image_path$i"] = ( ! empty( $updated_form_values["zappy_ads_120x60_image_path$i"] ) ) ? strip_tags( $updated_form_values["zappy_ads_120x60_image_path$i"] ) : '';
			
			$form_values["zappy_ads_120x60_ads_link$i"] = ( ! empty( $updated_form_values["zappy_ads_120x60_ads_link$i"] ) ) ? strip_tags($updated_form_values["zappy_ads_120x60_ads_link$i"] ) : '';
			
			$form_values["zappy_ads_120x60_ads_custom_code$i"] = ( ! empty( $updated_form_values["zappy_ads_120x60_ads_custom_code$i"] ) ) ? $updated_form_values["zappy_ads_120x60_ads_custom_code$i"] : '';
		}
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Ads_120x60 Widget Class

// Register Zappy Ads_120x60 Widget
function register_Zappy_Ads_120x60_Widget() {
    register_widget('Zappy_Ads_120x60_Widget');
}
add_action('widgets_init', 'register_Zappy_Ads_120x60_Widget');