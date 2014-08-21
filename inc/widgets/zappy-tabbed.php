<?php
/**
 * Zappy Tabbed Widget.
 */
class Zappy_Tabbed_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_tabbed', // Base ID
			__('Zappy Tabbed','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Tabs in Sidebar','fashion' ), ) // Widget Description
		);
		
		// Register Scripts.
		//add_action( 'wp_enqueue_scripts', array( $this, 'zappy_tabs_register_script') );

	}

	// Front-end display of widget.
	 public function widget( $form_args, $form_values ) {
		//Widget Title
		$title = apply_filters( 'widget_title', $form_values['zappy_title'] );
		
		//Before Widget
		echo $form_args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $form_args['before_title'] . $title . $form_args['after_title'];
		?>
		
		<!-- Get Tabbed Widget Output -->
			
		<div id="zappy-tabs">
			   <ul>
				<li><a href="#tabs-1"><?php _e('Popular','dynamis')?></a></li>
				<li><a href="#tabs-2"><?php _e('Recent','dynamis')?></a></li>
				<li><a href="#tabs-3"><?php _e('Comments','dynamis')?></a></li>
				<li><a href="#tabs-4"><?php _e('Tags','dynamis')?></a></li>
			  </ul>
			  <div id="tabs-1">
					<?php echo zappy_Popular_post(); ?>
			  </div>
			  <div id="tabs-2">
				<?php echo zappy_recent_post();?>
			  </div>
			  <div id="tabs-3">
					<?php zappy_latest_comments($zappy_comment_post_type='post',$zappy_number_of_comment='5',$post_status='publish',$zappy_comment_avatar='73',$zappy_comment_avatar_check='on',$zappy_comment_date_check='on');?>
			  </div>
			  <div id="tabs-4">
				<p><?php wp_tag_cloud( $args = array('smallest'=>14,'largest' => 20,'number' => 25,'orderby'=> 'count', 'order' => 'DESC' )); ?></p>
			  </div>
	    </div>
		<script>
		  jQuery(function() {
			jQuery( "#zappy-tabs" ).tabs();
		  });
		</script>
		
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
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
	/* //Register Scripts
	function zappy_tabs_register_script() {
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_register_style( 'zappy-tabs', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		wp_enqueue_style( 'zappy-tabs' );
	} */
	
	
} //Close Zappy Tabbed Widget Class

// Register Zappy Tabbed Widget
function register_Zappy_Tabbed_Widget() {
    register_widget('Zappy_Tabbed_Widget');
}
add_action('widgets_init', 'register_Zappy_Tabbed_Widget');