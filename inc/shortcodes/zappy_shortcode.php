<?php  
add_shortcode('testimonial', 'zappy_testimonial');   			// Add Testimonial
add_shortcode('tmli', 'testimonial_list');
add_shortcode('tmimg', 'testimonial_img');
add_shortcode('tmcontent', 'testimonial_content');           
add_shortcode('name', 'testimonial_name'); 
add_shortcode('video', 'zappy_AddVideo');						// Add Video	
add_shortcode('box', 'zappy_box');								// Add Box
add_shortcode('author', 'zappy_Author_info');					// Add Author Information
add_shortcode('button', 'zappy_button');						// Add Button
add_shortcode('icon', 'zappy_icon');							// Add Icons																
add_shortcode("tweet", "zappy_tweet_shortcode");				// Add Social Media
add_shortcode("google", "zappy_google_shortcode");
add_shortcode("facebook", "zappy_facebook_shortcode");
add_shortcode("linkedin", "zappy_linkedin_shortcode");
add_shortcode("stumbleupon", "zappy_stumbleupon_shortcode");
add_shortcode("pinterest", "zappy_pinterest_shortcode");
add_shortcode('feed', 'zappy_feeds');
add_shortcode('follow', 'zappy_follow');
add_shortcode('tooltip', 'zappy_Tooltip');						// Add ToolTips
add_shortcode('sliders', 'zappy_slider_div');					// Add Slider
add_shortcode('slider', 'zappy_slider_ul');
add_shortcode('img', 'zappy_slider_li');
add_shortcode('prices', 'zappy_prices');						// Add Price Table
add_shortcode('heading', 'zappy_prices_heading');
add_shortcode('pricelist', 'zappy_prices_lists');
add_shortcode('li', 'zappy_prices_li');
add_shortcode('totalprice', 'zappy_prices_totalprice');
add_shortcode('buy', 'zappy_prices_buy');
add_shortcode('quote', 'zappy_quotes');
//Include zappy confiq
require get_template_directory() . '/inc/shortcodes/shortcode_config.php';
// ==================================================   Register Shortcodes in Editor  ============================================ //
function register_addbuttons() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "shortcode_tinymce_plugin");
		add_filter('mce_buttons', 'register_shortcode_button');
	}
}

function register_shortcode_button($buttons) {
	array_push(
		$buttons,"AddBox","Icons","AddButtons","Tabs","Toggle","AuthorBio","|","Video","|","Tooltip","ShareButtons","Quotes"	); 
	return $buttons;
} 
function shortcode_tinymce_plugin($plugin_array) {
	$plugin_array['zappyShortCodes'] = JS_PATH;
	return $plugin_array;
}
add_action('init', 'register_addbuttons');   

//================================================= END(Register Buttoms) START (Quick Tag For Html Editor)  ============================================================ //

function editor_quicktags() {
	$result = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	wp_print_scripts( 'quicktags' );
	$buttons = array();	
	$buttons[] = array(
		'name' => 'one_third',
		'options' => array(
			'display_name' => 'one Third',
			'open_tag' => '\n[one_third]',
			'close_tag' => '[/one_third]\n',
			'key' => ''								));		
				
	$buttons[] = array(
		'name' => 'two_third',
		'options' => array(
			'display_name' => 'two Third',
			'open_tag' => '\n[two_third]',
			'close_tag' => '[/two_third]\n',
			'key' => ''								));		
	
	$buttons[] = array(
		'name' => 'one_half',
		'options' => array(
			'display_name' => 'one Half',
			'open_tag' => '\n[one_half]',
			'close_tag' => '[/one_half]\n',
			'key' => ''								));		
		
	$buttons[] = array(
		'name' => 'one_fourth',
		'options' => array(
			'display_name' => 'one fourth',
			'open_tag' => '\n[one_fourth]',
			'close_tag' => '[/one_fourth]\n',
			'key' => ''								));		
		
	for ($i=0; $i <= (count($buttons)-1); $i++)      {
		$result .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}','{$buttons[$i]['options']['display_name']}','{$buttons[$i]['options']['open_tag']}','{$buttons[$i]['options']['close_tag']}','{$buttons[$i]['options']['key']}'); \n";     }	
		$result .= "\n /* ]]> */ \n
		</script>";
		echo $result;									}

add_action('admin_head','editor_quicktags');

// ==================================== END (Html Quick Tag)...START(Shortcodes for Testimonial ) ===========================================  //
function zappy_testimonial( $atts, $content = null )	 {
	$result ='<script type="text/javascript">jQuery(document).ready(function(){jQuery("#cbp-qtrotator").cbpQTRotator();}); </script><div id="cbp-qtrotator" class="cbp-qtrotator"> ' . do_shortcode($content) . ' </div>';
   return $result; 									     
   }
// Testimonial [list]
function testimonial_list( $atts, $content = null )	 {
	$result =' <div class="cbp-qtcontent"> ' . do_shortcode($content) . ' </div>';
   return $result;								 }

// Testimonial [img] 
function testimonial_img( $atts, $content = null )  {
 	$result ='<img src="' . do_shortcode($content) . '"/>';                      
   return $result;						      }

// Testimonial [content]
function testimonial_content( $atts, $content = null ) {
	$result ='<blockquote>' . do_shortcode($content) . '</blockquote>';
   return $result;								 }

// Testimonial [name] 
function testimonial_name( $atts, $content = null ) {
	$result ='<footer>' . do_shortcode($content) . ' </footer>';
   return $result;							  }
							 

// ==================================== END (Testimonial Tag)...START(Shortcodes for Video(youtube,dailymotion,Vimeo) ) ============================ //
  function zappy_AddVideo( $atts, $content = null ) {
		@extract($atts);
		$width  = ($width)  ? $width  :'420' ;
		$height = ($height) ? $height : '315';
		$video_url = @parse_url($content);
		
			if ( $video_url['host'] == 'www.youtube.com' || $video_url['host']  == 'youtube.com' ) {
				parse_str( @parse_url( $content, PHP_URL_QUERY ), $my_array_of_vars );
				$video =  $my_array_of_vars['v'] ;
				$result ='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
				
			}elseif( $video_url['host'] == 'www.vimeo.com' || $video_url['host']  == 'vimeo.com' ){	
			
				$video = (int) substr(@parse_url($content, PHP_URL_PATH), 1);
				
				$result='<iframe src="http://player.vimeo.com/video/'.$video.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
				
			}elseif( $video_url['host'] == 'www.dailymotion.com' || $video_url['host']  == 'dailymotion.com' ){	
				
				$video = substr(@parse_url($content, PHP_URL_PATH), 7);	$video_id = strtok($video, '_');
				$result='<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$video_id.'"></iframe>';
			}
	return $result;	
	
	}

// ==================================== END (Html Video Tag)...START(Shortcodes for Box ) ==================================  //

function zappy_box( $atts, $content = null ) {
    @extract($atts);	
	$align = (@$align) ? $align : '';
	$title = (@$title) ? $title : '';
	switch ($type)
	{
		 
		  case 'sbox' : 
				$result = '<div id="content-box" class="content-green"> <h4 class="right-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
				return $result;
		  break;
		   case 'ebox' : 
				$result = '<div id="content-box" class="content-red"><h4 class="error-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
				return $result;
		  break;
		  
		  case 'abox': 
				$result = '<div id="content-box" class="content-yellow"><h4 class="alert-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
				return $result;
			 break;
		  case 'dbox': 
				$result = '<div id="content-box" class="content-blue"><h4 class="loc-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
				return $result;
			 break;		 
		  case 'fbox': 
			   $result = '<div id="content-box" class="content-orange"><h4 class="star-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
			   return $result;
			break;
		case 'flbox' : 
				$result = '<div id="content-box" class="content-grey"><h4 class="flag-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
				return $result;
			 break;
		 
		  default : 
			$result = '<div id="content-box" class="content-green"><h4 class="right-ic">'.$title.' </h4><p>' .do_shortcode($content). '</p></div>';
			 return $result;
		 
	}
								}
								
			
// ==================================== END (Html Box Tag)...START(Shortcodes for Toggle ) ==================================  //
function zappy_toggles( $atts, $content = null ) {
    @extract($atts);

	$result='<script type="text/javascript">jQuery(document).ready(function(){jQuery("#shortcode_toggles").accordion(); }); </script><div id="shortcode_toggles" class="shortcode-accordion">
		'.do_shortcode($content).'
	</div>';
   return $result;
}
add_shortcode('toggles', 'zappy_toggles');

## Toggle -------------------------------------------------- //
function zappy_toggle( $atts, $content = null ) {
	@extract($atts);
	$out ='<h3>'.$title.'</h3><div><p>'.do_shortcode($content).'</p></div>';
   return $out;
}
add_shortcode('toggle', 'zappy_toggle');


## Toggle Head -------------------------------------------------- //
function zappy_toggles_head( $atts, $content = null ) {
	$out = do_shortcode($content);
   return $out;
}
add_shortcode('toggles_head', 'zappy_toggles_head');


## Toggle_title -------------------------------------------------- #
function zappy_toggle_titles( $atts, $content = null ) {
	@extract($atts);
	$out = '<h3>'.do_shortcode($content).'</h3>';
   return $out;
}
add_shortcode('toggle_title', 'zappy_toggle_titles');

// ==================================== END (Html Toggle Tag)...START(Shortcodes for quote ) ==================================  //  	
  						
function zappy_quotes( $atts, $content = null ) {
    @extract($atts);
	$title = ($name) ? $name : '';
	$result = '<blockquote>&ldquo;' .do_shortcode($content). ' &rdquo;</blockquote><em>&ldquo;'.$title.'&rdquo;</em>';
    return $result;
    								}

// ==================================== Column Type1  ============================================================= //
add_shortcode('list_type1','list_type1') ;
add_shortcode('li1','zappy_lists1') ;
add_shortcode('sublist1','zappy_sublists1') ;
add_shortcode('sli1','zappy_sublist1') ;

function list_type1( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul class="list-type-1 four columns alpha">' .do_shortcode($content). ' </ul>';
    return $result;}

    function zappy_lists1( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&rsaquo;</span> ' .do_shortcode($content). ' </li>';
    return $result;
 
                                    }
    function zappy_sublist1( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul> <li style="list-style:none !important"><span class="srtcd-list-style">&rsaquo;</span> ' .do_shortcode($content). ' </li></ul>';
    return $result;

                                    }
    function zappy_sublists1( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&rsaquo;;</span> ' .do_shortcode($content). ' </li>';
    return $result;

                                    }
// ==================================== Column Type2  ============================================================= //
add_shortcode('list_type2','list_type2') ;
add_shortcode('li2','zappy_lists2') ;
add_shortcode('sublist2','zappy_sublists2') ;
add_shortcode('sli2','zappy_sublist2') ;

function list_type2( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul class="list-type-2 four columns ">' .do_shortcode($content). ' </ul>';
    return $result;}

    function zappy_lists2( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&rarr;</span> ' .do_shortcode($content). ' </li>';
    return $result;
 
                                    }
    function zappy_sublist2( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul> <li style="list-style:none !important"><span class="srtcd-list-style">&rarr;</span>' .do_shortcode($content). '</li> </ul>';
    return $result;

                                    }
    function zappy_sublists2( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&rarr;;</span> ' .do_shortcode($content). ' </li>';
    return $result;

                                    }
// ==================================== Column Type3  ============================================================= //
add_shortcode('list_type3','list_type3') ;
add_shortcode('li3','zappy_lists3') ;
add_shortcode('sublist3','zappy_sublists3') ;
add_shortcode('sli3','zappy_sublist3') ;

function list_type3( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul class="list-type-3 four columns ">' .do_shortcode($content). ' </ul>';
    return $result;
	}

    function zappy_lists3( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&bull;</span> ' .do_shortcode($content). ' </li>';
    return $result;
	}
	
    function zappy_sublist3( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul><li style="list-style:none !important"><span class="srtcd-list-style">&bull;</span>' .do_shortcode($content). '</li></ul>';
    return $result;
	}
	
    function zappy_sublists3( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&bull;;</span> ' .do_shortcode($content). ' </li>';
    return $result;
	}
    // ==================================== Column Type4  ============================================================= //
add_shortcode('list_type4','list_type4') ;
add_shortcode('li4','zappy_lists4') ;
add_shortcode('sublist4','zappy_sublists4') ;
add_shortcode('sli4','zappy_sublist4') ;

function list_type4( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul class="list-type-4 four columns omega">' .do_shortcode($content). ' </ul>';
    return $result;}

    function zappy_lists4( $atts, $content = null ) {
    @extract($atts);
    $result = ' <li style="list-style:none !important"><span class="srtcd-list-style">&diams;</span> ' .do_shortcode($content). ' </li>';
    return $result;
	}
	
    function zappy_sublist4( $atts, $content = null ) {
    @extract($atts);
    $result = '<ul> <li style="list-style:none !important"><span class="srtcd-list-style">&diams;</span>' .do_shortcode($content). ' </li></ul>';
    return $result;
	}
	
// ==================================== END (Html quote Tag)...START(Shortcodes for Author ) ==================================  //  						

function zappy_Author_info( $atts, $content = null ) {
    @extract($atts);
	$author=get_the_author_meta('user_nicename', $id );
	$email=get_the_author_meta('user_email', $id );
	$bio=get_the_author_meta('description', $id );
	$result = '<div class="srtcd-author-content">
                            <div class="two columns alpha">
                           		'.get_avatar($id,80).'
                            </div>
                            <div class="twelve columns omega">
                                <p class="srtcd-author-name">'.ucfirst($author).'</p>
                                <p class="twelve columns omega srtcd-author-text">' .$bio. '</p>
                            </div>
                </div>';
                   
    return $result;

 
 }
// ==================================== END (Html Author Tag)...START(Shortcodes for button ) ==================================  //
function zappy_button( $atts, $content = null ) {
    @extract($atts);
	$size  = ($size)  ? $size  :'small-button' ;
	$color = ($color) ? $color : 'grey';
	$link  = ($link) ? $link : '';
	
	$result = '<a href="'.$link.'" id="'   .$size.'" class="button '.$color.'">' .do_shortcode($content). '</a>';
    return $result;								}

// ==================================== END (Html button Tag)...START(Shortcodes for icon ) ==================================  //
	function zappy_icon( $atts, $content = null ) {
    @extract($atts);
	$type =  (@$type)  ? $type  :'home-ic' ;
	$color = (@$color) ? $color : 'grey';
	$link  = (@$link) ? $link : '';
	$target = (@$target) ? ' target="_blank"' : '';
	$result = '<a href="'.$link.'" '.$target.' id="icon-button" class="button '.$color.'"><span class="left-element">'.do_shortcode($content). '</span><span class="' .$type. '"></span></a>';
	return $result;							  }


// ==================================== END (Html  icon)...START(Shortcodes for Tooltip ) ==================================  //
function zappy_Tooltip( $atts, $content = null ) {
    @extract($atts);
	if( empty($gravity) ) $gravity = '';
	$result = '<a id="tooltip" class="tooltip"> Tool-Tip <span><img class="callout" src="'.get_template_directory_uri().'/inc/shortcodes/images/shortcodes/callout.gif">'.$content.'</a></span>';
   return $result;								 }


// ==================================== END (Html Tooltip)...START(Shortcodes for Tweet/google-plus ) ==================================  //

// Tweet +
   function zappy_tweet_shortcode( $atts, $content = null ) { 
	global $post;
	$result="<li class='social-share'><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><a href='https://twitter.com/share' class='twitter-share-button' data-dnt='true'>Tweet</a></li>";

    return $result;  }  

// Google +
    function zappy_google_shortcode( $atts, $content = null ) { 
	global $post;
    return "<li class='social-share'>  <div class='g-plus' data-action='share' data-href='". get_permalink()."' data-annotation='bubble'></div>

					<!-- Place this tag after the last share tag. -->
					<script type='text/javascript'>
					  (function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script></li>"; 
	}
// Facebook 
    function zappy_facebook_shortcode( $atts, $content = null ) 
	{ 
	global $post;
	return "<li class='social-share'><div id='fb-root'></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = '//connect.facebook.net/en_US/all.js#xfbml=1&appId=129665367204130';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class='fb-share-button' data-href='". get_permalink()."' data-type='button_count'></div></li>";
	}		
// Linkedin 
    function zappy_linkedin_shortcode( $atts, $content = null ) 
	{ 
	global $post;
	return "<li class='social-share'><script src='//platform.linkedin.com/in.js' type='text/javascript'>
						lang: en_US
				  </script>
				  <script type='IN/Share' data-url='".get_permalink()."' data-counter='right'></script></li>";
	}
// Stumbleupon 
    function zappy_stumbleupon_shortcode( $atts, $content = null ) 
	{ 
	global $post;
	return "<li class='social-share'><su:badge layout='1'></su:badge>
				<script type='text/javascript'>
				  (function() {
					var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
					li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
				  })();
				</script></li>";
	}
// Pinterest 
    function zappy_pinterest_shortcode( $atts, $content = null ) 
	{ 
	global $post;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	return "<li class='social-share'><a href='//www.pinterest.com/pin/create/button/?url=". get_permalink()."&media=".$img[0]."&description=".get_the_excerpt()." data-pin-do='buttonPin' data-pin-config='beside'><img src='//assets.pinterest.com/images/pidgets/pin_it_button.png' /></a>
				<script type='text/javascript'>
					(function(d){
						var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
						p.type = 'text/javascript';
						p.async = true;
						p.src = '//assets.pinterest.com/js/pinit.js';
						f.parentNode.insertBefore(p, f);
					}(document));
			   </script></li>";
	}
// ==================================== END (Social media)...START(Shortcodes for Tab ) ==================================  //

function tab_tabs( $atts, $content = null ) {
    @extract($atts);
	
	if($type== "one" );
	else $type= 'two';
 	//wp_enqueue_script('zappy-tabs');
	$result ='
	
	<div id="shortcode_tabs_'.$type.'" class="shortcode-tabs">
		'.do_shortcode($content).'
	</div>
	<script type="text/javascript">	jQuery(document).ready(function(){	jQuery("#shortcode_tabs_'.$type.'").tabs(); }); </script>
	';
   return $result;
}
add_shortcode('tabs', 'tab_tabs');

## Tab -------------------------------------------------- //
function tab_tab( $atts, $content = null ) {
	@extract($atts);
	$out ='
		<div id="'.$id.'">
		'.do_shortcode($content).'
		</div>
	';
   return $out;
}
add_shortcode('tab', 'tab_tab');


## Tab Head -------------------------------------------------- //
function tab_tabs_head( $atts, $content = null ) {
	$out ='<ul>'.do_shortcode($content).'</ul>';
   return $out;
}
add_shortcode('tabs_head', 'tab_tabs_head');


## Tab_title -------------------------------------------------- #
function tab_titles( $atts, $content = null ) {
	@extract($atts);
	$out ='<li><a href="#'.$id.'">'.do_shortcode($content).'</a></li>';
   return $out;
}
add_shortcode('tab_title', 'tab_titles');

// ==================================== END (Tab)...START(Shortcodes for Slider ) ==================================  //
                  
// Sliders [sliders] 
function zappy_slider_div( $atts, $content = null ) {
	$result ='  <div class="flexslider">' . do_shortcode($content) . ' </div>';
   return $result;									}

// Sliders [slider] 
function zappy_slider_ul( $atts, $content = null ) {
	$result ='<ul class="slides"> ' . do_shortcode($content) . ' </ul>';
   return $result;									}
 
 // Sliders [img]
function zappy_slider_li( $atts, $content = null ) {
	  @extract($atts);

	$result ='<li><span class="slide-image"><img src="' . do_shortcode($content) . '" /> </span></li>';
   return $result;
   									}

// ==================================== END (Slider)...START(Shortcodes for Price Table ) ==================================  //
add_shortcode('price_container', 'prices_container');
 function prices_container( $atts, $content = null ) {
	$result =' <div class="table-container" >' . do_shortcode($content) . '</div>';
   return $result;					}	
// Price Table [prices] 
function zappy_prices( $atts, $content = null ) {
	$result ='<ul class="pricing_table">
           <li class="price_block"> ' . do_shortcode($content) . ' 
           </ul> </li>';
   return $result;								}

// Price Table [heading] 
function zappy_prices_heading( $atts, $content = null ) {
	 @extract($atts);
	$color  = ($color)  ? $color  :'red' ;
	$result ='<h3 class="srtcd-'.$color.'-bg">' . do_shortcode($content) . ' </h3>';
   return $result;										}
 
 // Price Table [pricelist] 
function zappy_prices_lists( $atts, $content = null ) {	 
	$result ='<ul class="features">' . do_shortcode($content) . '</ul>';
    return $result;									  }
// Price Table [li]
function zappy_prices_li( $atts, $content = null ) {	 
	$result ='<li>' . do_shortcode($content) . '</li>';
    return $result;									}
// Price Table [totalprice] 
function zappy_prices_totalprice( $atts, $content = null ) {
	 @extract($atts);
	$link  = (@$link) ? ' '.$link : '';
	$color  = (@$color)  ? $color  :'red' ;
	$result =' <div class="price-block srtcd-'.$color.'-bg"><p class="srtcd-table-priceTxt"> ' . do_shortcode($content) . '</p>';
   return $result;											}

// Price Table [buy] 
function zappy_prices_buy( $atts, $content = null ) {
	 @extract($atts);
	$target = (@$target) ? ' target="_blank"' : 'target="_blank"';
	$link  = (@$link) ? $link : '';	 
	$result =' <a href="'.$link.'" '. $target .' class="action_button"> ' . do_shortcode($content) . '</a></div>';
   return $result;									}

// ==================================== END (Price Table)...START(Shortcodes for Columns ) ==================================  //

add_shortcode('one_third', 'zappy_one_third');
add_shortcode('two_third', 'zappy_two_third');
add_shortcode('one_half', 'zappy_one_half');
add_shortcode('one_fourth', 'zappy_one_fourth');

function zappy_one_third( $atts, $content = null ) {
   return '<p class="one-third">' . do_shortcode($content) . '</p>'; }

function zappy_two_third( $atts, $content = null ) {
   return '<p class="two-half">' . do_shortcode($content) . '</p>'; }
  
function zappy_one_half( $atts, $content = null ) {
   return '<p class="one-half">' . do_shortcode($content) . '</p>'; }
function zappy_one_fourth( $atts, $content = null ) {
   return '<p class="one-four">' . do_shortcode($content) . '</p>'; }

// javascript include for TinyMce Visual Editor 

define ( 'JS_PATH' , get_template_directory_uri().'/inc/shortcodes/js/zappy_custome_shortcode.js');
?>