<?php
/**
 * fashion functions and definitions
 *
 * @package fashion
 */
//To Activate theme options

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/Options/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/Options/ReduxCore/framework.php' );
}
if ( !isset( $zappy_options ) && file_exists( dirname( __FILE__ ) . '/Options/options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/Options/options.php' );
}
//Theme Updates
require_once('wp-updates-theme.php');
new WPUpdatesThemeUpdater_879( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'fashion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fashion_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fashion, use a find and replace
	 * to change 'fashion' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fashion', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	 add_editor_style(); 
	 //the_post_thumbnail(); 
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fashion' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fashion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // fashion_setup
add_action( 'after_setup_theme', 'fashion_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fashion_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fashion' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget widget-container %2$s"><div class="widget-title"><div class="grid-icon"></div>',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2></div><div class="widget-content">',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'fashion' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<div class="four columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-heading"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'fashion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fashion_scripts() {
	global $zappy_options;
	$skin=$zappy_options['skin_option'];

	   if($skin=='style'){
			wp_enqueue_style( 'fashion-style', get_stylesheet_uri() );
	   }else{
			wp_enqueue_style( 'fashion-skin-'.$skin.'-css', get_template_directory_uri().'/css/style-'.$skin.'.css');
	   }
	   
	//wp_enqueue_style( 'fashion-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fashion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fashion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//Base Styles   
	wp_enqueue_style( 'fashion-base', get_template_directory_uri().'/css/base.css' );
	wp_enqueue_style( 'fashion-skeleton', get_template_directory_uri().'/css/skeleton.css' );
	wp_enqueue_style( 'fashion-layout', get_template_directory_uri().'/css/layout.css' );
	//superfish
	wp_enqueue_style( 'fashion-superfish', get_template_directory_uri().'/css/superfish.css' );
	//prettyPhoto
	wp_enqueue_style( 'fashion-prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css' );
	//Flexislider
	wp_enqueue_style( 'fashion-flexslider', get_template_directory_uri().'/css/flexslider.css' );
	//Jquery css
	wp_enqueue_style( 'fashion-jquery-ui', get_template_directory_uri().'/inc/shortcodes/jquery-ui.css' );
	//sass-compiled
	wp_enqueue_style( 'fashion-sass-compiled', get_template_directory_uri().'/css/sass-compiled.css' );
	//animate
	wp_enqueue_style( 'fashion-animate', get_template_directory_uri().'/css/animate.css' );
	//meanmenu
	wp_enqueue_style( 'fashion-meanmenu', get_template_directory_uri().'/css/meanmenu.css' );
	//component
	wp_enqueue_style( 'fashion-component', get_template_directory_uri().'/css/component.css' );
	
	//component
	wp_enqueue_style( 'fashion-hover-component', get_template_directory_uri().'/css/hover-component.css' );
	
	//Tabs widget
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	
	//HoverIntent
	wp_enqueue_script( 'fashion-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js');
	
	//Flexislider
	wp_enqueue_script( 'fashion-flexslider-js', get_template_directory_uri().'/js/jquery.flexslider.js' );
	
	//Superfish
	wp_enqueue_script( 'fashion-superfish', get_template_directory_uri() . '/js/superfish.js');
	
	//prettyPhoto
	wp_enqueue_script( 'fashion-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	
	//meanmenu
	wp_enqueue_script( 'fashion-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js');
	
	//modernizr
	wp_enqueue_script( 'fashion-modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom-st.js');
	
	//modernizr-st
	wp_enqueue_script( 'fashion-modernizr.custom', get_template_directory_uri() . '/js/modernizr.custom.js');
	
	//viewportchecker
	wp_enqueue_script( 'fashion-viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js');
	
	//classie
	wp_enqueue_script( 'fashion-classie', get_template_directory_uri() . '/js/classie.js');
	
	//cbpScroller
	wp_enqueue_script( 'fashion-cbpScroller', get_template_directory_uri() . '/js/cbpScroller.js');
	
	//BackToTop
	wp_enqueue_script( 'fashion-BackToTop', get_template_directory_uri() . '/js/BackToTop.jquery.js');
	
	//toucheffects
	wp_enqueue_script( 'fashion-toucheffects', get_template_directory_uri() . '/js/toucheffects.js');
	
	//Validate
	wp_enqueue_script( 'fashion-toucheffects', get_template_directory_uri() . '/js/jquery.validate.js');
		
	//Map
	wp_enqueue_script( 'fashion-toucheffects', get_template_directory_uri() . '/js/jquery.ui.map.js');
	
}
add_action( 'wp_enqueue_scripts', 'fashion_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*To Activate Widgets*/
require( get_template_directory() . '/inc/widgets/zappy-widgets.php');

//To Activate Shortcodes
require get_template_directory() . '/inc/shortcodes/zappy_shortcode.php';


//Zappy Excerpt Length
function zappy_string_limit_words($word, $word_limit)
{
	  $words = explode(' ', $word, ($word_limit + 1));
	  if(count($words) > $word_limit)
	  array_pop($words);
	  return implode(' ', $words);
}
//pagination
function zappy_pagination($pages = '', $range = 2){  
 $showitems = $range;  

 global $paged;
 if(empty($paged)) $paged = 1;

 if($pages == '')
 {
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     if(!$pages)
     {
         $pages = 1;
     }
 }   

 if(1 != $pages)
 {
	echo '<ul class="pagination">';
     
     if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' class='entypo-left-open' >&lsaquo;</a></li>";
     if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' >&lsaquo;&lsaquo;</a></li>";

     for ($i=1; $i <= $pages; $i++)
     {
         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         {
             echo ($paged == $i)? "<li><a class='current'>".$i."</a></span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
         }
     }

     if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'> &rsaquo;</a></li>";  
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' class='entypo-right-open' >&rsaquo;&rsaquo;</a></li>";
    echo '</ul>';
 }
}

//Update nested comments options
update_option('thread_comments_depth',3);

/*Social Share Function*/
 function zappy_social_shares($twittwer,$facebook,$google_plus,$linkedin,$stumbleupon,$pinterest){
 echo"<ul>";
			   if($twittwer==1){?>
			   <li>
			     	<a href="<?php esc_url('https://twitter.com/share');
					?>" class="twitter-share-button" data-url="<?php echo get_permalink()?>" data-text="<?php echo get_the_excerpt();?>" data-lang="en" >Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			   </li>
			  <?php }
			   
			   if($facebook==1){?>
				  <li>
			      <div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=255784091173381";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					</script>
				<div class="fb-share-button" data-href="<?php echo get_permalink()?>" data-type="button_count"></div>
				</li>
			  <?php } 
			   if($google_plus==1){?>
				  <!-- Place this tag where you want the share button to render. -->
				  <li>
				  <div class="g-plus" data-action="share" data-href="<?php echo get_permalink()?>" data-annotation="bubble"></div>

					<!-- Place this tag after the last share tag. -->
					<script type="text/javascript">
					  (function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
				  </li>
			   <?php }
			   if($linkedin==1){?>
				<li>
			       <script src="//platform.linkedin.com/in.js" type="text/javascript">
						lang: en_US
				  </script>
				  <script type="IN/Share" data-url="<?php echo get_permalink()?>" data-counter="right"></script> 
				</li>
			   <?php
			   }
			   if($stumbleupon==1){?>
			      <!-- Place this tag where you want the su badge to render -->
				<li>
				<su:badge layout="1"></su:badge>

				<!-- Place this snippet wherever appropriate -->
				<script type="text/javascript">
				  (function() {
					var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
					li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
				  })();
				</script>
				</li>
			  <?php }
			   if($pinterest==1){
			     global $post;
				$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							
			   ?>
				<li>
			     <a href="//www.pinterest.com/pin/create/button/?url=<?php echo get_permalink()?>&media=<?php echo $img[0]?>&description=<?php echo get_the_excerpt();?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
				<script type="text/javascript">
					(function(d){
						var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
						p.type = 'text/javascript';
						p.async = true;
						p.src = '//assets.pinterest.com/js/pinit.js';
						f.parentNode.insertBefore(p, f);
					}(document));
			   </script>
			    </li>
			   <?php }
				echo"</ul>";
}

//Favicon in admin side
function zappy_admin_area_favicon(){
  global $zappy_options;
	if(isset($zappy_options['favicon_image']['url'])){
	$zappy_favicon=$zappy_options['favicon_image']['url'];
	}
	if(empty($zappy_favicon)){
	   $zappy_favicon="images/favicon.ico";
	}
	echo '<link rel="shortcut icon" href="' . $zappy_favicon . '" />';
}
add_action('admin_head', 'zappy_admin_area_favicon');
/**comment function
	================================================== **/
	
	if ( ! function_exists( 'custom_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own revelation_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Fashion
 */
function custom_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'fashion' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'fashion' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	 <!-- Comments Section -->
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		
			
				<?php 
					
					printf( '',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '', 'fashion' ) . '</span>' : ''
					);
				?>
			<div class="article-comment">
                <div class="about-author">
                    <figure><?php echo get_avatar( $comment->comment_author_email, 69);?> </figure>
                    <h5><a href="#"><?php echo ucfirst(get_comment_author());?></a></h5>
                    <span><?php $date=get_comment_date('dS M'); echo $date;?></span>
                    <?php comment_text(); ?>
					<?php echo get_comment_reply_link(array_merge( $args, array('depth' =>1,'reply_text' =>'Reply', 'max_depth' =>$args['max_depth'])));?>		
                </div>
            </div>
				
		</article><!-- Comments Section Ends -->
		 
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

//Related Posts
function related_post($current_post_type,$post_id){


	// The query arguments
	$zappy_args = array(
		'posts_per_page' => 2,
		'order' => 'DESC',
		'orderby' => 'ID',
		'post_type' => $current_post_type,
		'post__not_in' => array( $post_id)
	);

	// Create the related query
	$zappy_rel_query = new WP_Query( $zappy_args );
	
	// Check if there is any related posts
	if( $zappy_rel_query->have_posts() ) : 

		// The Loop
				while ( $zappy_rel_query->have_posts() ) :
					$zappy_rel_query->the_post();
					global $post;
					$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); 	
			?>     
			<div class="five columns alpha">
                <div class="related-posting">
                    <div class="post-month"><p><?php echo get_the_date('M');?></p></div>
                    <figure>
					<?php
						$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
						if(empty($img))
								{
									$img[0]=get_template_directory_uri().'/images/layout/nopreview.png';
								}
								echo '<a href="'.get_permalink().'">';?>
								<img src="<?php echo $img[0];?>">
								<?php echo'</a>';
					  ?>
					</figure>
					<div class="related-post-detail">
                    <p><?php the_title() ?></p>
                    </div>
                </div>
            </div>             
			<?php
				endwhile;
	endif;

	// Reset the query
	wp_reset_query();
}

/*--BreadCrumb Function--*/
function zappy_the_breadcrumb() {
echo "<ul>";
if ( !is_page('home'))
{
    if (!is_front_page()) {
       echo '<li><a class="light-grey" href="';
        echo home_url();
        echo '">';
        _e('Home','fashion');
        echo '</a></li> <li><a href="#" class="entypo-right-thin"></a></li> ';
        if (is_category() || is_single()) {
		$a=get_the_category();
		  if($a)
		  {
		    echo'<li>';
            echo the_category(',');
			echo'</li>';
			echo'<li><a href="#" class="entypo-right-thin"></a></li>';
			
		  }
            if (is_single()) {
				echo '<li><a href="'.get_permalink().'">';
                echo the_title();
				echo '</a></li>';
            }
        } elseif (is_page()) {
		global $post;
            if($post->post_parent){
                $zappy = get_post_ancestors( $post->ID );
                 
                foreach ( $zappy as $zappy_value ) {
                    $output = '<li><a href="'.get_permalink($zappy_value).'" title="'.get_the_title($zappy_value).'">'.get_the_title($zappy_value).'</a></li><li><a href="#" class="entypo-right-thin"></a></li>';
                }
                echo $output;
                echo '<li><strong title="'.$title.'"> '.$title.'</strong></li>';
            } else { 
			echo '<li><a>';
              echo the_title(); 
			  echo '</a></li>';
            }
        }
    }
    if (is_tag()) {echo single_tag_title( $prefix = '', $display = true );}
    if (is_day()) {echo"<li><a>".__('Archive for','fashion'); the_time('F jS, Y').'</a></li>'; }
    if (is_month()) {echo"<li><a>".__('Archive for','fashion'); the_time('F, Y').'</a></li>'; }
    if (is_year()) {echo"<li><a>".__('Archive for','fashion'); the_time('Y').'</a></li>'; }
    if (is_author()) {echo"<li><a>".__('Author Archive','fashion');echo"</a></li>"; }
    if (is_search()) {echo"<li><a>".__('Search Results','fashion');echo"</a></li>"; }
}
echo "</ul>";
}