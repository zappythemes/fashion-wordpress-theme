<?php 
add_action( 'wp_head', 'zappy_register' ); 
function zappy_register() {

	//Testimonials
	wp_register_script('modernizr', get_template_directory_uri().'/inc/shortcodes/js/modernizr.custom.js');
    wp_enqueue_script( 'modernizr' );

 	wp_register_script('cbpQTRotato', get_template_directory_uri().'/inc/shortcodes/js/jquery.cbpQTRotator.min.js');
    wp_enqueue_script( 'cbpQTRotato' );
    
	//Shortcode CSS 
	wp_register_style('shortcode', get_template_directory_uri().'/inc/shortcodes/shortcode.css');
	wp_enqueue_style( 'shortcode' );
	
	//Toggles
	wp_enqueue_script( 'jquery-ui-accordion' );
	
 }
 ?>