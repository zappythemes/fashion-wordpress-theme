<?php
/**
 * Zappy Google Plus Widget.
 */
class zappy_Google_Plus_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_google_plus', // Base ID
			__('Zappy Google Plus Follow Us','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Google Plus follow us widget','fashion' ), ) // Widget Description
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
		$zappy_button_width = str_replace('px','',$form_values['zappy_button_width']);	
		$zappy_google_page = $form_values['zappy_google_page'];
		if(empty($zappy_google_page))
		  $zappy_google_page="https://plus.google.com/106933429488943533699/";
		?>
		
				<!-- Google +1 script -->
				<script type="text/javascript">
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				
				<!-- Link blog to Google+ page -->
				<a style='display: block; height: 0;' href="<?php echo $zappy_google_page?>" rel="publisher">&nbsp;</a>
			
				<!-- Google +1 Page badge -->
				<g:plus href="<?php echo $zappy_google_page;?>" width="<?php echo $zappy_button_width ?>" theme="light"></g:plus>
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
		
		//Get Google Page URL
		if ( isset( $form_values[ 'zappy_google_page' ] ) ) {
			$zappy_google_page = $form_values[ 'zappy_google_page' ];
		}
		
		//Get Follow Us button size
		if ( isset( $form_values[ 'zappy_button_width' ] ) ) {
			$zappy_button_width = $form_values[ 'zappy_button_width' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		<!-- Google Plus page url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_google_page' ); ?>"><?php _e( 'Page URL:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_google_page' ); ?>" name="<?php echo $this->get_field_name( 'zappy_google_page' ); ?>" type="text" value="<?php echo esc_attr( $zappy_google_page ); ?>" />
		</p>
		
		<!-- Follow us  Width -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_button_width' ); ?>"><?php _e( 'Width:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_button_width' ); ?>" name="<?php echo $this->get_field_name( 'zappy_button_width' ); ?>" type="text" value="<?php echo esc_attr( $zappy_button_width ); ?>" />
		</p>
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_google_page'] = ( ! empty( $updated_form_values['zappy_google_page'] ) ) ? strip_tags($updated_form_values['zappy_google_page'] ) : '';
		
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_button_width'] = ( ! empty( $updated_form_values['zappy_button_width'] ) ) ? strip_tags( $updated_form_values['zappy_button_width'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Google Plus Widget Class

// Register Zappy Google Plus Widget
function register_zappy_Google_Plus_Widget() {
    register_widget('zappy_Google_Plus_Widget');
}
add_action('widgets_init', 'register_zappy_Google_Plus_Widget');