<?php

/**
	ReduxFramework Sample Config File
	For full documentation, please visit http://reduxframework.com/docs/
**/


/**
 
	Most of your editing will be done in this section.

	Here you can override default values, uncomment args and change their values.
	No $args are required, but they can be overridden if needed.
	
**/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name'); 
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','redux-framework-demo' ), $ct->display('Name') );

?>
<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
	<?php if ( $screenshot ) : ?>
		<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
		<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
			<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
		</a>
		<?php endif; ?>
		<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
	<?php endif; ?>

	<h4>
		<?php echo $ct->display('Name'); ?>
	</h4>

	<div>
		<ul class="theme-info">
			<li><?php printf( __('By %s','redux-framework-demo'), $ct->display('Author') ); ?></li>
			<li><?php printf( __('Version %s','redux-framework-demo'), $ct->display('Version') ); ?></li>
			<li><?php echo '<strong>'.__('Tags', 'redux-framework-demo').':</strong> '; ?><?php printf( $ct->display('Tags') ); ?></li>
		</ul>
		<p class="theme-description"><?php echo $ct->display('Description'); ?></p>
		<?php if ( $ct->parent() ) {
			printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
				__( 'http://codex.wordpress.org/Child_Themes','redux-framework-demo' ),
				$ct->parent()->display( 'Name' ) );
		} ?>
		
	</div>

</div>

<?php
$item_info = ob_get_contents();
    
ob_end_clean();


if( file_exists( dirname(__FILE__).'/info-html.html' )) {
	global $wp_filesystem;
	if (empty($wp_filesystem)) {
		require_once(ABSPATH .'/wp-admin/includes/file.php');
		WP_Filesystem();
	}  		
	$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
}

// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = false;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['dev_mode_icon_class'] = 'icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'zappy_options';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = true;


// Set the icon for the system info tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['system_info_icon'] = 'info-sign';

// Set the class for the system info tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['system_info_icon_class'] = 'icon-large';

$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
//$args['database'] = "theme_mods_expanded";
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyDReYaE4BuGUZmMSAmRzFUApqAwyVZGliA';

// Define the starting tab for the option panel.
// Default: '0';
//$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
//$args['admin_stylesheet'] = 'standard';

// Setup custom links in the footer for share icons
/*$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/ghost1227',
    'title' => 'Follow me on Twitter', 
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);
$args['share_icons']['linked_in'] = array(
    'link' => 'http://www.linkedin.com/profile/view?id=52559281',
    'title' => 'Find me on LinkedIn', 
    'img' => ReduxFramework::$_url . 'assets/img/social/LinkedIn.png'
);*/

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'icon-large';

// Set a custom menu icon.
//$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('Zappy Settings', 'redux-framework-demo');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('Zappy Options', 'redux-framework-demo');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'zappy_options';

$args['default_show'] = true;
$args['default_mark'] = '*';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
    
// Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
$args['help_tabs'][] = array(
    'id' => 'redux-opts-1',
    'title' => __('Theme Information 1', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);
$args['help_tabs'][] = array(
    'id' => 'redux-opts-2',
    'title' => __('Theme Information 2', 'redux-framework-demo'),
    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
);

// Set the help sidebar for the options page.                                        
$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');


// Add HTML before the form.
if (!isset($args['global_variable']) || $args['global_variable'] !== false ) {
	if (!empty($args['global_variable'])) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace("-", "_", $args['opt_name']);
	}
	$args['intro_text'] = __('<p></p>', 'redux-framework-demo');
} else {
	$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
}

// Add content after the form.
$args['footer_text'] = __('', 'redux-framework-demo');

// Set footer/credit line.
$args['footer_credit'] = __('', 'redux-framework-demo');


$sections = array();              

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../Options/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../Options/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) :
	
  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
  	$sample_patterns = array();

    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
      	$name = explode(".", $sample_patterns_file);
      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
      }
    }
  endif;
endif;

//Start Sections//////////////////////
//general site wide settings
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'home',
				'title' => __('General Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">These are some site wide settings.</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
						'id'=>'logo_option',
						'type' => 'select',
						'title' => __('Please select if you want to display custom Logo/Text for site title', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Select one option', 'redux-framework-demo'),
						'options' => array('1' => 'Custom Logo', '2' => 'Custom Text'),//Must provide key => value pairs for select options
						'default' => '1',
						'width' => '50%'
						),
					array(
		                'id' => 'logo_image',
		                'type' => 'media', 
		                'required' => array('logo_option','=','1'),
						'url'=> true,
		                'title' => __('Custom Logo Image', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please upload your logo here(For better view, provide minimum width=217px and height=48px)', 'redux-framework-demo')
						),
					array(
						'id' => 'site_name', //must be unique
						'type' => 'text',
						'required' => array('logo_option','=','2'),
						'title' => __('Site Name', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your site name here', 'redux-framework-demo'),
						),
					array(
		                'id' => 'favicon_image',
		                'type' => 'media',
						'url'=> true,
		                'title' => __('Custom Favicon', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please upload your custom favicon here(For better view, provide minimum width=16px and height=16px)', 'redux-framework-demo')
						),
					array(
						'id'=>'no_of_post',
						'type' => 'text',
						'title' => __('Please enter the number of post you want to display in the Blog page of your site', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter a numeric value', 'redux-framework-demo'),
						'validate' => 'numeric',
						'default' => '10',
						'class' => 'small-text'
						),
					array(
						'id'=>'excerpt_length',
						'type' => 'text',
						'title' => __('Please enter the number of words you want to display in post excerpt', 'redux-framework-demo'),
						'subtitle' => __('<a href="">Click Here</a> to find out what is post excerpt', 'redux-framework-demo'),
						'desc' => __('Please enter a numeric value', 'redux-framework-demo'),
						'validate' => 'numeric',
						'default' => '55',
						'class' => 'small-text'
						),
					array(
						'id' => 'breadcrumbs_check',
						'type' => 'switch',
						'title' => __('Do you want to display Breadcrumbs?', 'redux-framework-demo'), 
						'subtitle' => __('<a href="">Click Here</a> to find out what is a breadcrumb', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Breadcrumbs', 'redux-framework-demo'),
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'social_footer_check',
						'type' => 'switch',
						'title' => __('Do you want to display Social Icons in the footer?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Social Icons in the footer', 'redux-framework-demo'),
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'footer_text',
						'type' => 'editor',
						'title' => __('Footer Text', 'redux-framework-demo'), 
						'subtitle' => __('You can use the following shortcodes in your footer text: [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-title] [site-tagline] [current-year]', 'redux-framework-demo'),
						'default' => '',
						),
					array(
						'id' => 'header_code',
						'type' => 'textarea',
						'title' => __('Custom Header Code', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('You can provide any additional header code here, like google analytics or any custom javascript.', 'redux-framework-demo'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'default' => ''
						),
					array(
						'id' => 'footer_code',
						'type' => 'textarea',
						'title' => __('Custom Footer Code', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('You can provide any additional footer code here, like google analytics or any custom javascript.', 'redux-framework-demo'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'default' => ''
						)
					)
				);
							 		
//style settings
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'screen',
				'title' => __('Styling', 'redux-framework-demo'),
				'desc' => __('<p class="description">Settings for styling your site</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
						'id'=>'background_option',
						'type' => 'select',
						'title' => __('Please select if you want to display pattern or custom image for your website background', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Select one option', 'redux-framework-demo'),
						'options' => array('1' => 'Pattern', '2' => 'Custom Image', '3' => 'Background Colour'),//Must provide key => value pairs for select options
						'default' => '',
						'width' => '50%'
						),
					array(
		                'id' => 'pattern_option',
		                'type' => 'image_select',
		                'width' => '50px',
		                'height' => '50px',
		                'required' => array('background_option','=','1'),
		                'title' => __('Please select which pattern you would like for your website background', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('You can choose from 20 different patterns', 'redux-framework-demo'),
		                'options' => array(
		                    '1' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/1.png'),
		                    '2' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/2.png'),
		                    '3' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/3.png'),
		                    '4' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/4.png'),
		                    '5' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/5.png'),
		                    '6' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/6.png'),
		                    '7' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/7.png'),
		                    '8' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/8.png'),
		                    '9' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/9.png'),
		                    '10' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/10.png'),
		                    '11' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/11.png'),
		                    '12' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/12.png'),
		                    '13' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/13.png'),
		                    '14' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/14.png'),
		                    '15' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/15.png'),
		                    '16' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/16.png'),
		                    '17' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/17.png'),
		                    '18' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/18.png'),
		                    '19' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/19.png'),
		                    '20' => array('alt' => '', 'img' => get_template_directory_uri().'/options/patterns/20.png')
		                ), // Must provide key => value(array:title|img) pairs for radio options
		                'default' => ''
						),
					array(
		                'id' => 'background_image',
		                'type' => 'media', 
		                'required' => array('background_option','=','2'),
						'url'=> true,
		                'title' => __('Custom Background Image', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please upload your background image here(Image size must be mentioned here)', 'redux-framework-demo')
						),
					array(
						'id'=>'background_color',
						'type' => 'color',
						'required' => array('background_option','=','3'),
						'title' => __('Select a Background Color', 'redux-framework-demo'), 
						'subtitle' => __('Pick a background color for your website (default: #fff).', 'redux-framework-demo'),
						'default' => '#FFFFFF',
						'validate' => 'color'
						),
					array(
						'id'=>'custom_css_code',
						'type' => 'textarea',	
						'title' => __('Add your Custom CSS Code here', 'redux-framework-demo'), 
						'subtitle' => __('Paste your CSS code here.', 'redux-framework-demo'),
						'desc' => '',
			            'default' => ''
						)
					)
				);
//settings for typography
$sections[] = 	array(
				'icon_class' => 'icon-large',
				'icon' => 'font',
				'title' => __('Typography', 'redux-framework-demo'),
				'desc' => __('<p class="description">Typography settings for your website</p>', 'redux-framework-demo'),
				'fields' => array(
					//To change general font styles
					array(
						'id' => 'general_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of paragraphs?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Paragraphs', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'general_font_styles',
						'type' => 'typography',
						'required' => array('general_font_check','=','1'),
						'title' => __('General Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all p tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change post title font styles
					array(
						'id' => 'posttitle_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of post title?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Post Title', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'posttitle_font_styles',
						'type' => 'typography',
						'required' => array('posttitle_font_check','=','1'),
						'title' => __('Post Title Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all post titles of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change widget title font styles
					array(
						'id' => 'widgettitle_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of widget title?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Widget Title', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'widgettitle_font_styles',
						'type' => 'typography',
						'required' => array('widgettitle_font_check','=','1'),
						'title' => __('Widget Title Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all widget titles of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading1 font styles
					array(
						'id' => 'heading1_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of First Heading (H1)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of First Heading (H1)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading1_font_styles',
						'type' => 'typography',
						'required' => array('heading1_font_check','=','1'),
						'title' => __('First Heading [H1] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h1 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading2 font styles
					array(
						'id' => 'heading2_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of Second Heading (H2)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Second Heading (H2)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading2_font_styles',
						'type' => 'typography',
						'required' => array('heading2_font_check','=','1'),
						'title' => __('Second Heading [H2] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' =>'', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h2 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading3 font styles
					array(
						'id' => 'heading3_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of Third Heading (H3)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Third Heading (H3)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading3_font_styles',
						'type' => 'typography',
						'required' => array('heading3_font_check','=','1'),
						'title' => __('Third Heading [H3] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h3 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading4 font styles
					array(
						'id' => 'heading4_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of Fourth Heading (H4)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Fourth Heading (H4)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading4_font_styles',
						'type' => 'typography',
						'required' => array('heading4_font_check','=','1'),
						'title' => __('Fourth Heading [H4] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h4 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading5 font styles
					array(
						'id' => 'heading5_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of Fifth Heading (H5)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Fifth Heading (H5)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading5_font_styles',
						'type' => 'typography',
						'required' => array('heading5_font_check','=','1'),
						'title' => __('Fifth Heading [H5] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h5 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					//To change heading6 font styles
					array(
						'id' => 'heading6_font_check',
						'type' => 'switch',
						'title' => __('Do you want to change the font styles of Sixth Heading (H6)?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to change the font styles of Sixth Heading (H6)', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'heading6_font_styles',
						'type' => 'typography',
						'required' => array('heading6_font_check','=','1'),
						'title' => __('Sixth Heading [H6] Typography', 'redux-framework-demo'),
						//'compiler'=>true, // Use if you want to hook in your own CSS compiler
						'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
						//'font-backup'=>true, // Select a backup non-google font in addition to a google font
						//'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
						//'subsets'=>false, // Only appears if google is true and subsets not set to false
						//'font-size'=>false,
						//'line-height'=>false,
						'word-spacing'=>true, // Defaults to false
						'letter-spacing'=>true, // Defaults to false
						//'color'=>false,
						//'preview'=>false, // Disable the previewer
						'output' => '', // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle'=> __('Applies to all h6 tags of your website', 'redux-framework-demo'),
						'default'=> array(
							'color'=>"", 
							'font-style'=>'',
							'font-family'=>'', 
							'font-size'=>'', 
							'line-height'=>''),
						),
					array(
						'id'=>'post_link_color',
						'type' => 'link_color',
						'title' => __('Post link colour', 'redux-framework-demo'),
						'output' => array('.post-content a'), // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle' => __('Applies to all the links in your post', 'redux-framework-demo'),
						'desc' => __('Please select the relevant colours as necessary', 'redux-framework-demo'),
						'default' => array(
							'show_regular' => true,
							'show_hover' => true,
							'show_active' => true
							)
						),
					array(
						'id'=>'widget_link_color',
						'type' => 'link_color',
						'title' => __('Widget link colour', 'redux-framework-demo'),
						'output' => array('.sidebar .content a'), // An array of CSS selectors to apply this font style to dynamically
						'units'=>'px', // Defaults to px
						'subtitle' => __('Applies to all the links in your widget', 'redux-framework-demo'),
						'desc' => __('Please select the relevant colours as necessary', 'redux-framework-demo'),
						'default' => array(
							'show_regular' => true,
							'show_hover' => true,
							'show_active' => true
							)
						)
					
					)
				);
//settings for social links
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'globe',
				'title' => __('Social Links', 'redux-framework-demo'),
				'desc' => __('<p class="description">Here you can provide details of your social pages</p>', 'redux-framework-demo'),
				'fields' => array(
				//To get Facebook URL
					array(
						'id' => 'facebook_check',
						'type' => 'switch',
						'title' => __('Display Facebook icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Facebook icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'facebook_link',
						'type' => 'text',
						'title' => __('Your Facebook page/profile URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your facebook page/profile URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('facebook_check','=','1'),
						'default' => ''
						),
				//To get Twitter URL
					array(
						'id' => 'twitter_check',
						'type' => 'switch',
						'title' => __('Display Twitter icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Twitter icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'twitter_link',
						'type' => 'text',
						'title' => __('Your Twitter profile URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your Twitter profile URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('twitter_check','=','1'),
						'default' => ''
						),
				
				//To get Linked In URL
					array(
						'id' => 'linkedin_check',
						'type' => 'switch',
						'title' => __('Display LinkedIn icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display LinkedIn icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'linkedin_link',
						'type' => 'text',
						'title' => __('Your LinkedIn profile URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your LinkedIn profile URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('linkedin_check','=','1'),
						'default' => ''
						),
				//To get Google+ URL
					array(
						'id' => 'googleplus_check',
						'type' => 'switch',
						'title' => __('Display Google+ icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Google+ icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'googleplus_link',
						'type' => 'text',
						'title' => __('Your Google+ profile URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your Google+ page/profile URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('googleplus_check','=','1'),
						'default' => ''
						),
				//To get Pinterest URL
					array(
						'id' => 'pinterest_check',
						'type' => 'switch',
						'title' => __('Display Pinterest icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Pinterest icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'pinterest_link',
						'type' => 'text',
						'title' => __('Your Pinterest profile URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your Pinterest profile URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('pinterest_check','=','1'),
						'default' => ''
						),
				//To get Vimeo URL
					array(
						'id' => 'vimeo_check',
						'type' => 'switch',
						'title' => __('Display Vimeo icon?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Vimeo icon', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'vimeo_link',
						'type' => 'text',
						'title' => __('Your Vimeo page URL', 'redux-framework-demo'),
						'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
						'desc' => __('Please enter your Vimeo page URL (including http://)', 'redux-framework-demo'),
						'validate' => 'url',
						'required' => array('vimeo_check','=','1'),
						'default' => ''
						)															
					)
				);
//settings for articles
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'pencil',
				'title' => __('Article Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">Here you can change the settings of how articles are displayed</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
						'id' => 'main_info',
						'type' => 'info',
						'desc' => __('Main Settings', 'redux-framework-demo')
						),
					//To show/hide featured image
					array(
						'id' => 'featured_img_check',
						'type' => 'switch',
						'title' => __('Show Featured Image?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show featured image in your article.', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide post author box
					array(
						'id' => 'post_author_check',
						'type' => 'switch',
						'title' => __('Show Post Author Box?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show author box below the post', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'sharing_info',
						'type' => 'info',
						'desc' => __('Sharing Settings', 'redux-framework-demo')
						),
					//To show/hide twitter share option
					array(
						'id' => 'twitter_share_check',
						'type' => 'switch',
						'title' => __('Show Twitter share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show Twitter share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide facebook share option
					array(
						'id' => 'facebook_share_check',
						'type' => 'switch',
						'title' => __('Show Facebook share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show Facebook share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide Google+ share option
					array(
						'id' => 'googleplus_share_check',
						'type' => 'switch',
						'title' => __('Show Google+ share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show Google+ share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide LinkedIn share option
					array(
						'id' => 'linkedin_share_check',
						'type' => 'switch',
						'title' => __('Show LinkedIn share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show LinkedIn share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide Stumbleupon share option
					array(
						'id' => 'stumbleupon_share_check',
						'type' => 'switch',
						'title' => __('Show Stumble Upon share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show Stumble Upon share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//To show/hide pinterest share option
					array(
						'id' => 'pinterest_share_check',
						'type' => 'switch',
						'title' => __('Show Pinterest share button?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show Pinterest share option in your article', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'relatedpost_info',
						'type' => 'info',
						'desc' => __('Related Post Settings', 'redux-framework-demo')
						),
					//To show/hide related post image
					array(
						'id' => 'related_post_check',
						'type' => 'switch',
						'title' => __('Show related post?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you wish to show related post below your article.', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						)

					)
				);
//settings for ad banners
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'picture',
				'title' => __('Banner Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">Here you can manage how banners are displayed on your site</p>', 'redux-framework-demo'),
				'fields' => array(
					
					//To activate Bottom banner
					array(
						'id' => 'bottombanner_info',
						'type' => 'info',
						'desc' => __('Bottom Banner Settings', 'redux-framework-demo')
						),
					array(
						'id' => 'bottom_banner_check',
						'type' => 'switch',
						'title' => __('Display Bottom Banner?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Bottom Banner', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'bottom_banner_option',
						'type' => 'select',
						'required' => array('bottom_banner_check','equals','1'),
						'title' => __('Select which banner you want to display', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Select one option', 'redux-framework-demo'),
						'options' => array('1' => 'Adsense Banner', '2' => 'Custom Banner'),//Must provide key => value pairs for select options
						'default' => '1',
						'width' => '50%'
						),
					array(
						'id' => 'bottom_banner_code',
						'type' => 'textarea',
						'required' => array('bottom_banner_option','equals','1'),
						'title' => __('Bottom banner adsense code', 'redux-framework-demo'),
						'subtitle' => __('This must be javascript', 'redux-framework-demo'),
						'desc' => __('Please paste your bottom banner code here(Size: 480x250)', 'redux-framework-demo'),
						'validate' => 'html',
						'default' => ''
						),
					array(
		                'id' => 'bottom_banner_image',
		                'type' => 'media',
		                'required' => array('bottom_banner_option','equals','2'),
						'url'=> true,
		                'title' => __('Bottom Banner Image', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Upload your bottom banner image (For better view, provide minimum width=470px and height=60px)', 'redux-framework-demo')
						),
					array(
		                'id' => 'bottom_banner_link',
		                'type' => 'text',
		                'required' => array('bottom_banner_option','equals','2'),
		                'title' => __('Bottom Banner Link', 'redux-framework-demo'),
		                'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
		                'desc' => __('Please paste your bottom banner link here (including http://)', 'redux-framework-demo'),
		                'validate' => 'url',
		                'default' => ''
						),
					array(
		                'id' => 'bottom_banner_alternative_text',
		                'type' => 'text',
		                'required' => array('bottom_banner_option','equals','2'),
		                'title' => __('Bottom Banner Alternative Text', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please enter the alternative text for bottom banner (Good for SEO purpose, but not compulsory)', 'redux-framework-demo'),
		                'default' => ''
						),
					array(
						'id' => 'bottom_banner_openlink',
						'type' => 'switch',
						'required' => array('bottom_banner_option','equals','2'),
						'title' => __('Open link in new tab?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to open Bottom Banner link in new tab', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//End bottom banner scripts
					//To activate article top banner
					array(
						'id' => 'article_topbanner_info',
						'type' => 'info',
						'desc' => __('Article Top Banner Settings', 'redux-framework-demo')
						),
					array(
						'id' => 'article_top_banner_check',
						'type' => 'switch',
						'title' => __('Display Article Top Banner?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Article Top Banner', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'article_top_banner_option',
						'type' => 'select',
						'required' => array('article_top_banner_check','equals','1'),
						'title' => __('Select which banner you want to display', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Select one option', 'redux-framework-demo'),
						'options' => array('1' => 'Adsense Banner', '2' => 'Custom Banner'),//Must provide key => value pairs for select options
						'default' => '1',
						'width' => '50%'
						),
					array(
						'id' => 'article_top_banner_code',
						'type' => 'textarea',
						'required' => array('article_top_banner_option','equals','1'),
						'title' => __('Article Top Banner adsense code', 'redux-framework-demo'),
						'subtitle' => __('This must be javascript', 'redux-framework-demo'),
						'desc' => __('Please paste your Article Top Banner code here(Size: 480x250)', 'redux-framework-demo'),
						'validate' => 'html',
						'default' => ''
						),
					array(
		                'id' => 'article_top_banner_image',
		                'type' => 'media',
		                'required' => array('article_top_banner_option','equals','2'),
						'url'=> true,
		                'title' => __('Article Top Banner Image', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Upload your Article Top Banner image (For better view, provide minimum width=470px and height=60px)', 'redux-framework-demo')
						),
					array(
		                'id' => 'article_top_banner_link',
		                'type' => 'text',
		                'required' => array('article_top_banner_option','equals','2'),
		                'title' => __('Article Top Banner Link', 'redux-framework-demo'),
		                'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
		                'desc' => __('Please paste your Article Top Banner link here (including http://)', 'redux-framework-demo'),
		                'validate' => 'url',
		                'default' => ''
						),
					array(
		                'id' => 'article_top_banner_alternative_text',
		                'type' => 'text',
		                'required' => array('article_top_banner_option','equals','2'),
		                'title' => __('Article Top Banner Alternative Text', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please enter the alternative text for Article Top Banner (Good for SEO purpose, but not compulsory)', 'redux-framework-demo'),
		                'default' => ''
						),
					array(
						'id' => 'article_top_banner_openlink',
						'type' => 'switch',
						'required' => array('article_top_banner_option','equals','2'),
						'title' => __('Open link in new tab?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to open Article Top Banner link in new tab', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						),
					//End article top banner scripts
					//To activate article bottom banner
					array(
						'id' => 'article_bottombanner_info',
						'type' => 'info',
						'desc' => __('Article Bottom Banner Settings', 'redux-framework-demo')
						),
					array(
						'id' => 'article_bottom_banner_check',
						'type' => 'switch',
						'title' => __('Display Article Bottom Banner?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Article Bottom Banner', 'redux-framework-demo'),
						
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'article_bottom_banner_option',
						'type' => 'select',
						'required' => array('article_bottom_banner_check','equals','1'),
						'title' => __('Select which banner you want to display', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Select one option', 'redux-framework-demo'),
						'options' => array('1' => 'Adsense Banner', '2' => 'Custom Banner'),//Must provide key => value pairs for select options
						'default' => '1',
						'width' => '50%'
						),
					array(
						'id' => 'article_bottom_banner_code',
						'type' => 'textarea',
						'required' => array('article_bottom_banner_option','equals','1'),
						'title' => __('Article Bottom Banner adsense code', 'redux-framework-demo'),
						'subtitle' => __('This must be javascript', 'redux-framework-demo'),
						'desc' => __('Please paste your Article Bottom Banner code here(Size: 480x250)', 'redux-framework-demo'),
						'validate' => 'html',
						'default' => ''
						),
					array(
		                'id' => 'article_bottom_banner_image',
		                'type' => 'media',
		                'required' => array('article_bottom_banner_option','equals','2'),
						'url'=> true,
		                'title' => __('Article Bottom Banner Image', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Upload your Article Bottom Banner image (For better view, provide minimum width=470px and height=60px)', 'redux-framework-demo')
						),
					array(
		                'id' => 'article_bottom_banner_link',
		                'type' => 'text',
		                'required' => array('article_bottom_banner_option','equals','2'),
		                'title' => __('Article Bottom Banner Link', 'redux-framework-demo'),
		                'subtitle' => __('This must be a URL.', 'redux-framework-demo'),
		                'desc' => __('Please paste your Article Bottom Banner link here (including http://)', 'redux-framework-demo'),
		                'validate' => 'url',
		                'default' => ''
						),
					array(
		                'id' => 'article_bottom_banner_alternative_text',
		                'type' => 'text',
		                'required' => array('article_bottom_banner_option','equals','2'),
		                'title' => __('Article Bottom Banner Alternative Text', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('Please enter the alternative text for Article Bottom Banner (Good for SEO purpose, but not compulsory)', 'redux-framework-demo'),
		                'default' => ''
						),
					array(
						'id' => 'article_bottom_banner_openlink',
						'type' => 'switch',
						'required' => array('article_bottom_banner_option','equals','2'),
						'title' => __('Open link in new tab?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to open Article Bottom Banner link in new tab', 'redux-framework-demo'),
						
						'default' => '1' // 1 = checked | 0 = unchecked
						)
					//End article bottom banner scripts
					)
				);
//settings for Slider
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'film',
				'title' => __('Slider Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">Here you can add or edit slider images</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
						'id'=>'slides',
						'type' => 'slides',
						'title' => __('Upload you slider images here', 'redux-framework-demo'),
						'subtitle'=> __('You and drag and drop to rearrange your slides', 'redux-framework-demo'),
						'desc' => __('For better view, provide image minimum width=1300px and height=600px', 'redux-framework-demo')
						)
					)
				);
//settings for Gallery page
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'th-large',
				'title' => __('Gallery Page Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">Here you can add or edit gallery images</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
			            'id' => 'gallery',
			            'type' => 'gallery',
			            'title' => __('Add/Edit Gallery', 'so-panels'),
			            'subtitle' => __('Create a new Gallery by selecting existing or uploading new images', 'so-panels'),
			            'desc' => __('', 'redux-framework-demo'),
			            )
					)
				);
//settings for skin selection
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'website',
				'title' => __('Skins', 'redux-framework-demo'),
				'desc' => __('<p class="description">Select which skin you want to apply to your website.</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
		                'id' => 'skin_option',
		                'type' => 'image_select',
						 'width' => '250px',
		                'title' => __('Please select which skin you would like for your website', 'redux-framework-demo'),
		                'subtitle' => __('', 'redux-framework-demo'),
		                'desc' => __('You can choose from 6 different skin options', 'redux-framework-demo'),
		                'options' => array(
		                    'style' => array('alt' => 'default', 'img' => get_template_directory_uri().'/options/skins/default.png'),
							'green' => array('alt' => 'Green', 'img' => get_template_directory_uri().'/options/skins/skin-green.jpg'),
							'blue' => array('alt' => 'Blue', 'img' => get_template_directory_uri().'/options/skins/skin-blue.jpg'),
							'red' => array('alt' => 'Red', 'img' => get_template_directory_uri().'/options/skins/skin-red.jpg'),
							'yellow' => array('alt' => 'Yellow', 'img' => get_template_directory_uri().'/options/skins/skin-yellow.jpg'),
							'pink' => array('alt' => 'Pink', 'img' => get_template_directory_uri().'/options/skins/skin-pink.jpg'),
							'darkgreen' => array('alt' => 'Dark Green', 'img' => get_template_directory_uri().'/options/skins/skin-darkgreen.jpg'),
					    ), // Must provide key => value(array:title|img) pairs for radio options
		                'default' => 'style'
						)
					)
				);
//settings for contact page
$sections[] = array(
				'icon_class' => 'icon-large',
				'icon' => 'address-book',
				'title' => __('Contact Page Settings', 'redux-framework-demo'),
				'desc' => __('<p class="description">Settings to be displayed in the contact page</p>', 'redux-framework-demo'),
				'fields' => array(
					array(
						'id' => 'contact_form_check',
						'type' => 'switch',
						'title' => __('Display Contact Form?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display contact form', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id'=>'contact_form_title',
						'type' => 'text',
						'required' => array('contact_form_check','equals','1'),
						'title' => __('Title', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('', 'redux-framework-demo')
						),
					array(
						'id'=>'contact_form_email',
						'type' => 'text',
						'required' => array('contact_form_check','equals','1'),
						'title' => __('Enter the email id to receive enquiries', 'redux-framework-demo'),
						'subtitle' => __('Please enter the email id you wish to receive enquiries from the contact form', 'redux-framework-demo'),
						'desc' => __('You have to enter a valid email id', 'redux-framework-demo'),
						'validate' => 'email',
						'msg' => 'Please enter a valid email id',
						'default' => ''
						),
					array(
						'id' => 'address_check',
						'type' => 'switch',
						'title' => __('Display Address Details?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Address Details in your Contact Page', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'address_line_one', //must be unique
						'type' => 'text',
						'required' => array('address_check','=','1'),
						'title' => __('Address Line 1', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your first line of address', 'redux-framework-demo'),
						),
					array(
						'id' => 'address_line_two', //must be unique
						'type' => 'text',
						'required' => array('address_check','=','1'),
						'title' => __('Address Line 2', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your second line of address', 'redux-framework-demo'),
						),
					array(
						'id' => 'city', //must be unique
						'type' => 'text',
						'required' => array('address_check','=','1'),
						'title' => __('City/Town', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your city/town name', 'redux-framework-demo'),
						),
					array(
						'id' => 'state', //must be unique
						'type' => 'text',
						'required' => array('address_check','=','1'),
						'title' => __('State/County', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your state/county name', 'redux-framework-demo'),
						),
					array(
						'id' => 'country', //must be unique
						'type' => 'text',
						'required' => array('address_check','=','1'),
						'title' => __('Country', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your country name', 'redux-framework-demo'),
						),
					array(
						'id'=>'twitter_name',
						'type' => 'text',
						'required' => array('address_check','equals','1'),
						'title' => __('Enter Twitter name', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('', 'redux-framework-demo')
						),
					array(
						'id'=>'fb_name',
						'type' => 'text',
						'required' => array('address_check','equals','1'),
						'title' => __('Enter Facebook name', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('', 'redux-framework-demo')
						),
					array(
						'id'=>'contact_form_address_email',
						'type' => 'text',
						'required' => array('address_check','equals','1'),
						'title' => __('Enter your email id', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('You have to enter a valid email id', 'redux-framework-demo'),
						'validate' => 'email',
						'msg' => 'Please enter a valid email id',
						'default' => ''
						),
					array(
						'id'=>'contact_form_phone',
						'type' => 'text',
						'required' => array('address_check','equals','1'),
						'title' => __('Enter your Contact Number', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your contact number here', 'redux-framework-demo')
						),
					array(
						'id' => 'map_check',
						'type' => 'switch',
						'required' => array('address_check','=','1'),
						'title' => __('Display Map in Contact Page?', 'redux-framework-demo'), 
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Switch on if you want to display Map in Contact Page', 'redux-framework-demo'),
						'default' => '0' // 1 = checked | 0 = unchecked
						),
					array(
						'id' => 'latitude', //must be unique
						'type' => 'text',
						'required' => array('map_check','=','1'),
						'title' => __('Enter your Latitude', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your latitude in order to display Map in your Contact Page', 'redux-framework-demo'),
						),
					array(
						'id' => 'longitude', //must be unique
						'type' => 'text',
						'required' => array('map_check','=','1'),
						'title' => __('Enter your Longitude', 'redux-framework-demo'),
						'subtitle' => __('', 'redux-framework-demo'),
						'desc' => __('Please enter your longitude in order to display Map in your Contact Page', 'redux-framework-demo'),
						),
					)
				);



//End Sections///////////////////////

		
		
$tabs = array();

if (function_exists('wp_get_theme')){
$theme_data = wp_get_theme();
$theme_uri = $theme_data->get('ThemeURI');
$description = $theme_data->get('Description');
$author = $theme_data->get('Author');
$version = $theme_data->get('Version');
$tags = $theme_data->get('Tags');
}else{
$theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()).'style.css');
$theme_uri = $theme_data['URI'];
$description = $theme_data['Description'];
$author = $theme_data['Author'];
$version = $theme_data['Version'];
$tags = $theme_data['Tags'];
}	

$theme_info = '<div class="redux-framework-section-desc">';
$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'redux-framework-demo').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'redux-framework-demo').$author.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'redux-framework-demo').$version.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$description.'</p>';
$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'redux-framework-demo').implode(', ', $tags).'</p>';
$theme_info .= '</div>';

if(file_exists(dirname(__FILE__).'/README.md')){
$tabs['theme_docs'] = array(
			'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
			'title' => __('Documentation', 'redux-framework-demo'),
			'content' => WP_Filesystem(dirname(__FILE__).'/README.md')
			);
}//if




// You can append a new section at any time.
/*$sections[] = array(
	'icon' => 'eye-open',
	'icon_class' => 'icon-large',
	'title' => __('Additional Fields', 'redux-framework-demo'),
	'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
	'fields' => array(

		array(
			'id'=>'17',
			'type' => 'date',
			'title' => __('Date Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
			),
		array(
			'id'=>'21',
			'type' => 'divide'
			),					
		array(
			'id'=>'18',
			'type' => 'button_set',
			'title' => __('Button Set Option', 'redux-framework-demo'), 
			'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
			'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
			'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
			'default' => '2'
			),
		array(
			'id'=>'23',
			'type' => 'info',
            'required' => array('18','equals',array('1','2')),	
			'desc' => __('This is the info field, if you want to break sections up.', 'redux-framework-demo')
        ),
        array(
            'id'=>'info_warning',
            'type'=>'info',
            'style'=>'warning',
            'header'=> __( 'This is a header.', 'redux-framework-demo' ),
            'desc' => __( 'This is an info field with the warning style applied and a header.', 'redux-framework-demo')
        ),
        array(
            'id'=>'info_success',
            'type'=>'info',
            'style'=>'success',
            'icon'=>'info-sign',
            'header'=> __( 'This is a header.', 'redux-framework-demo' ),
            'desc' => __( 'This is an info field with the success style applied, a header and an icon.', 'redux-framework-demo')
        ),
		array(
			'id'=>'raw_info',
			'type' => 'info',
			'required' => array('18','equals',array('1','2')),
			'raw_html'=>true,
			'desc' => $sampleHTML,
			),							
		array(
			'id'=>"custom_callback",
			//'type' => 'nothing',//doesnt need to be called for callback fields
			'title' => __('Custom Field Callback', 'redux-framework-demo'), 
			'subtitle' => __('This is a completely unique field type', 'redux-framework-demo'),
			'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'redux-framework-demo'),
			'callback' => 'my_custom_field'
			),
		
		array(
			'id'=>"group",
			'type' => 'group',//doesnt need to be called for callback fields
			'title' => __('Group', 'redux-framework-demo'), 
			'subtitle' => __('Group any items together.', 'redux-framework-demo'),
			'desc' => __('No limit as to what you can group. Just don\'t try to group a group.', 'redux-framework-demo'),
			'groupname' => __('Group', 'redux-framework-demo'), // Group name
			'subfields' => 
				array(
					array(
						'id'=>'switch-fold',
						'type' => 'switch', 
						'title' => __('testing fold with Group', 'redux-framework-demo'),
						'subtitle'=> __('Look, it\'s on!', 'redux-framework-demo'),
						"default" 		=> 1,
						),	
					array(
                        'id'=>'text-group',
                        'type' => 'text',
                        'title' => __('Text', 'redux-framework-demo'), 
                        'subtitle' => __('Here you put your subtitle', 'redux-framework-demo'),
                        'required' => array('switch-fold', '=' , '1'),
						),
					array(
						'id'=>'select-group',
						'type' => 'select',
						'title' => __('Testing select', 'redux-framework-demo'), 
						'subtitle' => __('Select your themes alternative color scheme.', 'redux-framework-demo'),
						'options' => array('default.css'=>'default.css', 'color1.css'=>'color1.css'),
						'default' => 'default.css',
						),
					),
			),			
			
		)

	);*/    

$tabs['item_info'] = array(
	'icon' => 'info-sign',
	'icon_class' => 'icon-large',
    'title' => __('Theme Information', 'redux-framework-demo'),
    'content' => $item_info
);

if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
    $tabs['docs'] = array(
		'icon' => 'book',
		'icon_class' => 'icon-large',
        'title' => __('Documentation', 'redux-framework-demo'),
        'content' => nl2br(WP_Filesystem(trailingslashit(dirname(__FILE__)) . 'README.html'))
    );
}

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// END Sample Config


/**
 
 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 	Simply include this function in the child themes functions.php file.
 
 	NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 	so you must use get_template_directory_uri() if you want to use any of the built in icons
 
 **/
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', 'redux-framework-demo'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
add_filter('redux-opts-sections-redux-sample', 'add_another_section');


/**

	Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.

**/
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-redux-sample-file', 'change_framework_args');





/** 

	Custom function for the callback referenced above

 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/**
 
	Custom function for the callback validation referenced above

**/
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}

/**

	This is a test function that will let you see when the compiler hook occurs. 
	It only runs if a field	set with compiler=>true is changed.

**/
function testCompiler() {
	//echo "Compiler hook!";
}
add_action('redux-compiler-redux-sample-file', 'testCompiler');



/**

	Use this code to hide the activation notice telling users about a sample panel.

**/
if ( class_exists('ReduxFrameworkPlugin') ) {
	//remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	
}

/**

	Use this code to hide the demo mode link from the plugin page. Only used when Redux is a plugin.

**/
function removeDemoModeLink() {
	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
	}
}
//add_action('init', 'removeDemoModeLink');