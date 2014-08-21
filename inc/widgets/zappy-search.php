<?php
/**
 * Zappy Feed burner Widget.
 */
class Zappy_Search_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_search', // Base ID
			__('Zappy Search Widget','fashion'), // Widget Name
			array( 'description' => __( 'Display Search Form in sidebar','fashion' ), ) // Widget Description
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
		$zappy_search_placeholder = $form_values['zappy_search_placeholder'];	
		
		?>
		
		<!-- Get Search Form -->
		<div class="ftr-sucribe" align="center">

			<form method="get" id="searchform" class="sb-cntnt-subscr" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				
				<input type="text" class="search-input sidbr-search-box" id="s" name="s" value="<?php printf( __('%s','fashion'),$zappy_search_placeholder);?>" onfocus="if (this.value == '<?php printf( __('%s','fashion'),$zappy_search_placeholder);?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php printf( __('%s','fashion'),$zappy_search_placeholder);?>';}"  />
				<input type="submit" class="search-submit sidbr-search-btn fontawesome-search" name="submit" id="searchsubmit" value="Search"  />
			</form>
			
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
		
		//Get Placeholder text
		if ( isset( $form_values[ 'zappy_search_placeholder' ] ) ) {
			$zappy_search_placeholder = $form_values[ 'zappy_search_placeholder' ];
		}	
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text"  value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		<!-- Placeholder Text -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_search_placeholder' ); ?>"><?php _e( 'Placeholder Text:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_search_placeholder' ); ?>" name="<?php echo $this->get_field_name( 'zappy_search_placeholder' ); ?>" type="text" placeholder="<?php echo $zappy_search_placeholder?>" value="<?php echo esc_attr( $zappy_search_placeholder ); ?>" />
		</p>
	
	
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_search_placeholder'] = ( ! empty( $updated_form_values['zappy_search_placeholder'] ) ) ? strip_tags( $updated_form_values['zappy_search_placeholder'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Search Widget Class

// Register Zappy Search Widge
function register_Zappy_Search_Widget() {
    register_widget('Zappy_Search_Widget');
}
add_action('widgets_init', 'register_Zappy_Search_Widget');