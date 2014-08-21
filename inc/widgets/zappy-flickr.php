<?php
/**
 * Zappy Flickr Widget.
 */
class zappy_flickr_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_flickr', // Base ID
			__('Zappy Flickr','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Flickr Images','fashion' ), ) // Widget Description
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
		$zappy_flickr_order = $form_values['zappy_flickr_order'];
		$zappy_flickr_id = $form_values['zappy_flickr_id'];
		if(empty($zappy_flickr_id))
		  $zappy_flickr_id="120260814@N04";
		$zappy_flickr_number_image = $form_values[ 'zappy_flickr_number_image' ];
		if(empty($zappy_flickr_number_image))
		  $zappy_flickr_number_image="8";
		  
		//Get Flicker Images
		echo '<div id="flickr_badge_wrapper">
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$zappy_flickr_number_image.'&display='.$zappy_flickr_order.'&size=s&layout=x&source=user&user='.$zappy_flickr_id.'"></script>
		</div>';
		echo '<style type="text/css">#flickr_badge_wrapper {float: left;margin: 0;}
			.flickr_badge_image {display: inline-block;float: left;height: 65px;list-style: none outside none;margin-bottom: 0;padding: 2px;width: 30%;overflow: hidden;}.flickr_badge_image img{width:100%;height: 62px;}
			
		</style>';
		//After Widget
		echo $form_args['after_widget'];
	}


	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get Flicker ID
		if ( isset( $form_values[ 'zappy_flickr_id' ] ) ) {
			$zappy_flickr_id = $form_values[ 'zappy_flickr_id' ];
		}
		
		//Get Flicker Image Size
		if ( isset( $form_values[ 'zappy_flickr_image_size' ] ) ) {
			$zappy_flickr_image_size = $form_values[ 'zappy_flickr_image_size' ];
		}
		
		//Get Flicker Image Order
		if ( isset( $form_values[ 'zappy_flickr_order' ] ) ) {
			$zappy_flickr_order = $form_values[ 'zappy_flickr_order' ];
		}
		
		//Get Flicker Image Order
		if ( isset( $form_values[ 'zappy_flickr_number_image' ] ) ) {
			$zappy_flickr_number_image = $form_values[ 'zappy_flickr_number_image' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		<!-- Flicker ID -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_flickr_id' ); ?>"><?php _e( 'Flicker ID:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'zappy_flickr_id' ); ?>" type="text" value="<?php echo esc_attr( $zappy_flickr_id ); ?>" />
		</p>
		
		<!-- Number of Images -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_flickr_number_image' ); ?>"><?php _e( 'Number of images:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_flickr_number_image' ); ?>" name="<?php echo $this->get_field_name( 'zappy_flickr_number_image' ); ?>" type="text" value="<?php echo esc_attr( $zappy_flickr_number_image ); ?>" />
		</p>
					
		<!-- Flicker Image Order -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_flickr_order' ); ?>"><?php _e( 'Order:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_flickr_order' ); ?>" name="<?php echo $this->get_field_name( 'zappy_flickr_order' ); ?>" >
				<?php
					$zappy_flickr_orders = array('Latest'=>'latest','Random'=>'random');
					
					$single_zappy_flickr_order = $form_values['zappy_flickr_order'];
					foreach ( $zappy_flickr_orders as $key =>$val ) {
					
					  if($val ==$single_zappy_flickr_order){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$val.'" '.$selected.'>' . ucfirst($key) . '</option>';
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
		$form_values['zappy_flickr_id'] = ( ! empty( $updated_form_values['zappy_flickr_id'] ) ) ? strip_tags($updated_form_values['zappy_flickr_id'] ) : '';
		
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_flickr_number_image'] = ( ! empty( $updated_form_values['zappy_flickr_number_image'] ) ) ? strip_tags( $updated_form_values['zappy_flickr_number_image'] ) : '';
		
		$form_values['zappy_flickr_order'] = ( ! empty( $updated_form_values['zappy_flickr_order'] ) ) ? strip_tags($updated_form_values['zappy_flickr_order'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Flicker Widget Class

// Register Zappy Flicker Widget
function register_zappy_flickr_Widget() {
    register_widget('zappy_flickr_Widget');
}
add_action('widgets_init', 'register_zappy_flickr_Widget');