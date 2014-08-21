<?php
/**
 * Zappy Video Widget.
 */
class Zappy_Video_Widget extends WP_Widget {

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			'zappy_video', // Base ID
			__('Zappy Video','fashion'), // Widget Name
			array( 'description' => __( 'Displaying Various Video\'s in Sidebar','fashion' ), ) // Widget Description
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
		$zappy_video_id = $form_values['zappy_video_id'];
		if(empty($zappy_video_id))
		  $zappy_video_id="2BlMNH1QTeE"; 
		$zappy_video_source = $form_values['zappy_video_source'];
		if(empty($zappy_video_source))
		  $zappy_video_source="YouTube"; 
		$zappy_video_width = $form_values['zappy_video_width'];
		if(empty($zappy_video_width))
		  $zappy_video_source="350"; 
		$zappy_video_height = $form_values[ 'zappy_video_height' ];
		if(empty($zappy_video_height))
		  $zappy_video_source="250"; 
		$zappy_video_auto = $form_values[ 'zappy_video_auto' ];
		if($zappy_video_auto=='Yes'){
		  $zappy_video_auto=1;
		}else{
			$zappy_video_auto=0;
		}
		
		//Get video source url
		if($zappy_video_source=='YouTube'){
			$zappy_video_url= "http://www.youtube.com/v/$zappy_video_id?autoplay=$zappy_video_auto&loop=0&rel=0";
		}elseif($zappy_video_source=='Vimeo'){
			$video_param1="";
			$video_param2="";
			$zappy_video_url="http://vimeo.com/moogaloop.swf?clip_id=$zappy_video_id&amp;server=vimeo.com&amp;loop=0&amp;fullscreen=1&amp;autoplay=$zappy_video_auto";
		}elseif($zappy_video_source=='MySpace'){
			$zappy_video_url="http://mediaservices.myspace.com/services/media/embed.aspx/m=$zappy_video_id,t=1,mt=video,ap=$zappy_video_auto";
		}elseif($zappy_video_source=='WordPress'){
			if($zappy_video_auto==1){
			 $auto="&autoPlay=true";
			}
			$zappy_video_url="http://s0.videopress.com/player.swf?v=1.02";
			$video_param1 = "<param name='flashvars' value='guid=".$zappy_video_id.$auto."'>";
			
		}elseif($zappy_video_source=='DailyMotion'){
			$zappy_video_url="http://www.dailymotion.com/swf/video/$zappy_video_id&autoStart=$zappy_video_auto&related=0";
		}elseif($zappy_video_source=='SlideShare'){
			$zappy_video_url="http://www.slideshare.net/slideshow/embed_code/$zappy_video_id";
		}
		
		//Display the video in sidebar
		echo "\n<object width=\"$zappy_video_width\" height=\"$zappy_video_height\">\n";
		echo $video_param1;
		echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
		echo "<param name=\"allowscriptaccess\" value=\"always\" />\n";
		echo "<param name=\"movie\" value=\"$zappy_video_url\" />\n";
		echo "<param name=\"wmode\" value=\"transparent\">\n";
		echo "<embed src=\"$zappy_video_url\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" ";
		echo "allowfullscreen=\"true\" allowscriptaccess=\"always\" ";
		echo $video_param2;
		echo "width=\"$zappy_video_width\" height=\"$zappy_video_height\">\n";
		echo "</embed>\n";
		echo "</object>\n\n";
		
		
		//After Widget
		echo $form_args['after_widget'];
	}


	//Back-end widget form.
	 
	public function form( $form_values ) {
	
		//Get the widget title
		if ( isset( $form_values[ 'zappy_title' ] ) ) {
			$zappy_title = $form_values[ 'zappy_title' ];
		}
		
		//Get Video id
		if ( isset( $form_values[ 'zappy_video_id' ] ) ) {
			$zappy_video_id = $form_values[ 'zappy_video_id' ];
		}
		
		//Get Video source
		if ( isset( $form_values[ 'zappy_video_source' ] ) ) {
			$zappy_video_source = $form_values[ 'zappy_video_source' ];
		}
		
		//Get video width
		if ( isset( $form_values[ 'zappy_video_width' ] ) ) {
			$zappy_video_width = $form_values[ 'zappy_video_width' ];
		}
		
		//Get video height
		if ( isset( $form_values[ 'zappy_video_height' ] ) ) {
			$zappy_video_height = $form_values[ 'zappy_video_height' ];
		}
		
		//Get video auto play
		if ( isset( $form_values[ 'zappy_video_auto' ] ) ) {
			$zappy_video_auto = $form_values[ 'zappy_video_auto' ];
		}
		
		?>
		
		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_title' ); ?>"><?php _e( 'Title:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_title' ); ?>" name="<?php echo $this->get_field_name( 'zappy_title' ); ?>" type="text" placeholder="<?php echo $zappy_title?>" value="<?php echo esc_attr( $zappy_title ); ?>" />
		</p>
		
	
		<!-- Video ID-->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_video_id' ); ?>"><?php _e( 'Video ID:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_video_id' ); ?>" name="<?php echo $this->get_field_name( 'zappy_video_id' ); ?>" type="text" value="<?php echo esc_attr( $zappy_video_id ); ?>" />
			
		</p>
		
		<!-- Video Source -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_video_source' ); ?>"><?php _e( 'Select Source:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_video_source' ); ?>" name="<?php echo $this->get_field_name( 'zappy_video_source' ); ?>" >
				<?php
					
					$zappy_video_sources=array('YouTube','Vimeo','MySpace','WordPress','DailyMotion');
					$zappy_single_video_source = $form_values['zappy_video_source'];
					foreach ( $zappy_video_sources as $zappy_video_source ) {
					
					  if($zappy_video_source==$zappy_single_video_source){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$zappy_video_source.'" '.$selected.'>' . $zappy_video_source. '</option>';
					}

				?>
			</select>
		 
		</p>
	
		<!-- Video Width -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_video_width' ); ?>"><?php _e( 'Width:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_video_width' ); ?>" name="<?php echo $this->get_field_name( 'zappy_video_width' ); ?>" type="text" value="<?php echo esc_attr( $zappy_video_width ); ?>" />
		</p>
		
		<!-- Video Height -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_video_height' ); ?>"><?php _e( 'Height:','fashion' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'zappy_video_height' ); ?>" name="<?php echo $this->get_field_name( 'zappy_video_height' ); ?>" type="text" value="<?php echo esc_attr( $zappy_video_height ); ?>" />
		</p>
		
		<!-- Video Auto Play -->
		<p>
			<label for="<?php echo $this->get_field_id( 'zappy_video_auto' ); ?>"><?php _e( 'Auto Play:','fashion' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'zappy_video_auto' ); ?>" name="<?php echo $this->get_field_name( 'zappy_video_auto' ); ?>" >
				<?php
					$zappy_video_sources=array('Yes','No');
					$zappy_auto_play = $form_values['zappy_video_auto'];
					foreach ( $zappy_video_sources as $zappy_video_source ) {
					
					  if($zappy_auto_play==$zappy_video_source){
						$selected="selected=selected";
					  }else{
						$selected="";
					  }
					  
					   echo '<option value="'.$zappy_video_source.'" '.$selected.'>' .$zappy_video_source. '</option>';
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
		
		$form_values['zappy_video_id'] = ( ! empty( $updated_form_values['zappy_video_id'] ) ) ? strip_tags( $updated_form_values['zappy_video_id'] ) : '';
		
		$form_values['zappy_video_source'] = ( ! empty( $updated_form_values['zappy_video_source'] ) ) ? strip_tags($updated_form_values['zappy_video_source'] ) : '';
		
		$form_values['zappy_video_width'] = ( ! empty( $updated_form_values['zappy_video_width'] ) ) ? strip_tags($updated_form_values['zappy_video_width'] ) : '';
		
		$form_values['zappy_video_height'] = ( ! empty( $updated_form_values['zappy_video_height'] ) ) ? strip_tags($updated_form_values['zappy_video_height'] ) : '';
		
		$form_values['zappy_video_auto'] = ( ! empty( $updated_form_values['zappy_video_auto'] ) ) ? strip_tags($updated_form_values['zappy_video_auto'] ) : '';
		
		//Return All form fields values	
		return $form_values;
	}
	
} //Close Zappy Video Widget Class

// Register Zappy Video Widget
function register_Zappy_Video_Widget() {
    register_widget('Zappy_Video_Widget');
}
add_action('widgets_init', 'register_Zappy_Video_Widget');