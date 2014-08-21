<?php
/**
 * Zappy Feed burner Widget.
 */
class Zappy_Feed_Burner_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_feed_burner', // Base ID
			__('Zappy Feed Burner Widget','fashion'), // Widget Name
			array( 'description' => __( 'Subscribe to our email newsletter.', 'zappy_feed_burner' ), ) // Widget Description
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
		$zappy_feed_burner_id = $form_values['zappy_feed_burner_id'];
		$zappy_feedburner_text = $form_values['zappy_feedburner_text'];
		?>
		
		<!-- Get Subscriber Form -->
		<div class="ftr-sucribe ft-form">
			<?php if($zappy_feedburner_text){?>
				<p class="Email_above_text ftr-content"><?php echo $zappy_feedburner_text?></p>
			<?php }?>	
			<form action="http://feedburner.google.com/fb/a/mailverify" method="post" class="sb-cntnt-subscr" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $zappy_feed_burner_id ; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			  <p>	
				<input class="footer-input feedburner-email ft-input" type="text" name="email" value="<?php _e( 'enter your mail' , 'fashion') ; ?>" onfocus="if (this.value == '<?php _e( 'enter your mail' , 'fashion') ; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'enter your mail' , 'fashion') ; ?>';}">
			  </p>	
				<input type="hidden" value="<?php echo $zappy_feed_burner_id ; ?>" name="uri">
				<input type="hidden" name="loc" value="en_US">			
			 <p>		
				<input class="footer-submit ft-submit" type="submit" name="submit" value="<?php _e( 'Subscribe' , 'zappy_feed_burner') ; ?>"> 
			</p>
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
		
		//Get Feedburner id
		if ( isset( $form_values[ 'zappy_feed_burner_id' ] ) ) {
			$zappy_feed_burner_id = $form_values[ 'zappy_feed_burner_id' ];
		}
		
		//Get Email above text
		if ( isset( $form_values[ 'zappy_feedburner_text' ] ) ) {
			$zappy_feedburner_text = $form_values[ 'zappy_feedburner_text' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
	
		<!-- Feedbuner ID -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_feed_burner_id' ); ?>"><?php _e( 'Feedburner ID:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_feed_burner_id' ); ?>" name="<?php echo $this->get_field_name( 'zappy_feed_burner_id' ); ?>" type="text" value="<?php echo esc_attr( $zappy_feed_burner_id ); ?>" /><small>http://feeds.feedburner.com/Your Feedburner ID</small>
			
		</p>
		
		<!-- Text above Email Input Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_feedburner_text' ); ?>"><?php _e( 'Above Input Text:','fashion' ); ?>
			<textarea rows="5" id="<?php echo $this->get_field_id( 'zappy_feedburner_text' ); ?>" name="<?php echo $this->get_field_name( 'zappy_feedburner_text' ); ?>" class="widefat" ><?php echo $zappy_feedburner_text ?></textarea>
		</p>
		
		
		<?php 
	}

	
	//Save values from database
	public function update( $updated_form_values, $old_form_values) {
		$form_values = array();
		//Update form values
		$form_values['zappy_title'] = ( ! empty( $updated_form_values['zappy_title'] ) ) ? strip_tags( $updated_form_values['zappy_title'] ) : '';
		
		$form_values['zappy_feed_burner_id'] = ( ! empty( $updated_form_values['zappy_feed_burner_id'] ) ) ? strip_tags( $updated_form_values['zappy_feed_burner_id'] ) : '';
		
		$form_values['zappy_feedburner_text'] = ( ! empty( $updated_form_values['zappy_feedburner_text'] ) ) ? strip_tags($updated_form_values['zappy_feedburner_text'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Feed Burner Widget Class

// Register Zappy Feed Burner Widge
function register_Zappy_Feed_Burner_Widget() {
    register_widget('Zappy_Feed_Burner_Widget');
}
add_action('widgets_init', 'register_Zappy_Feed_Burner_Widget');