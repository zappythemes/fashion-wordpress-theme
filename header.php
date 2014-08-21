<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fashion
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
	global $zappy_options;
		if(isset($zappy_options['favicon_image']))
		{
		$zappy_favicon=$zappy_options['favicon_image']['url'];
		}
		else
		{
		 $zappy_favicon="images/favicon.ico";
		}
	?>
	<!-- Favicons -->	
	<link rel="shortcut icon" href="<?php echo $zappy_favicon;?>">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/images/layout/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/images/layout/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/images/layout/apple-touch-icon-114x114.png">
	
<?php wp_head(); 
//Theme Options css
		get_template_part('style.php');
		//global $zappy_options;
		
		/*Zappy Custom Header Code*/
		if($zappy_options['header_code']){
			echo "<script type='text/javascript'>".$zappy_options['header_code']."</script>";
		}
?>
</head>

<body <?php body_class(); ?>>
<header class="main-header">
<?php 
if(is_front_page()){
if(isset($zappy_options['slides']))
	{
		echo'<div class="header-backimage flexslider" id="top-slider">
			 <ul class="slides">';
				$zappy_slide_count=count($zappy_options['slides']);
					for($i=0;$i<$zappy_slide_count;$i++)
					{
						$url=$zappy_options['slides'][$i]['image'];
						echo'<li>
						
						<figure><img src="'.$url.'"></figure>
							<div class="logo-content fadeleft-effect">
								<div class="logo-texting">
									<h1 id="fittext1">'.$zappy_options['slides'][$i]['title'].'</h1>
									<p>'.$zappy_options['slides'][$i]['description'].'</p>
									<div class="view-more"><button><a href="'.$zappy_options['slides'][$i]['url'].'">'.__('View More','fashion').'</a></button></div>
								</div>
							</div>
						</li>';
					}
			echo'</ul>
		</div>';
	}
	}
    ?>
	<?php if(is_front_page()){?>
    <div class="header-menu">
        <div class="container">
            <div class="three columns">
                <div class="logo">
                    <figure>
					<?php 
					//Logo
					global $zappy_options;
					
					$zappy_logo_option=$zappy_options['logo_option'];
					
					if($zappy_logo_option==1){
					if(isset($zappy_options['logo_image']['url'])){
					$zappy_logo_url=$zappy_options['logo_image']['url'];
					}
					if(isset($zappy_options['logo_image']))
					echo'<a href="'.get_site_url().'"><img src="'.$zappy_logo_url.'"></a>';
					}else{
					$zappy_logo_text=$zappy_options['site_name'];
					if(empty($zappy_logo_text)){
					$zappy_logo_text=get_bloginfo('name');
					}
					echo '<a id="logo" href="'.get_site_url().'">'.$zappy_logo_text.'</a>';
					}	
					?>
					</figure>
                </div>
            </div>
            <div class="thirteen columns">
                <div class="main-menu">
                    <nav>
					 <?php   wp_nav_menu( array('menu' => 'Header Menu' ,'container' => '','menu_id'=>'example','menu_class' => 'sf-menu'));?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
	<?php if(!is_front_page()){?>
	<div class="header-menu-inner">
        <div class="container">
            <div class="menu-bg">
                <div class="three columns">
                    <div class="logo">
                        <figure>
						<?php 
						//Logo
						global $zappy_options;
						$zappy_logo_option=$zappy_options['logo_option'];
						if($zappy_logo_option==1){
						if(isset($zappy_options['logo_image']['url'])){
						$zappy_logo_url=$zappy_options['logo_image']['url'];
						}
						if(isset($zappy_options['logo_image']))
						echo'<a href="'.get_site_url().'"><img src="'.$zappy_logo_url.'"></a>';
						}else{
						$zappy_logo_text=$zappy_options['site_name'];
						if(empty($zappy_logo_text)){
						$zappy_logo_text=get_bloginfo('name');
						}
						echo '<a id="logo" href="'.get_site_url().'">'.$zappy_logo_text.'</a>';
						}	
						?>
						</figure>
                    </div>
                </div>
                <div class="thirteen columns">
                    <div class="main-menu">
                        <nav>
							<?php   wp_nav_menu( array('menu' => 'Header Menu' ,'container' => '','menu_id'=>'example','menu_class' => 'sf-menu'));?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
</header>
<div class="clear"></div>
	<script>
		jQuery(document).ready(function(){
			jQuery('ul.sf-menu').superfish({
				animation: {height:'show'},	// slide-down effect without fade-in
				delay:		 1200			// 1.2 second delay on mouseout
			});
		});

	</script>
	<script>
	jQuery(document).ready(function () {
		jQuery('header nav').meanmenu();
	});
	</script>
	<script type="text/javascript">
		jQuery(window).load(function(){
		
			jQuery('#top-slider').flexslider({
			animation: "fade",
			slideshowSpeed: 4000,
			start: function(slider){
			jQuery('body').removeClass('loading');
			}
			})	
		});
	</script>
	<script type="text/javascript">
		jQuery(window).load(function(){
		
			jQuery('.flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 4000,
			start: function(slider){
			jQuery('body').removeClass('loading');
			}
			})	
		});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.fadeleft-effect').addClass("hidden").viewportChecker({
			classToAdd: 'visible animated fadeInLeft', // Class to add to the elements when they are visible
			offset: 100    
		   }); 
		jQuery('.fadeup-effect').addClass("hidden").viewportChecker({
			classToAdd: 'visible animated fadeInUp', // Class to add to the elements when they are visible
			offset: 100    
		   });   
	});            
	</script>

	<script type="text/javascript" charset="utf-8">
				jQuery(document).ready(function(){
					jQuery("area[rel^='prettyPhoto']").prettyPhoto();
					
					jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
					jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
			
					jQuery("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
						custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
						changepicturecallback: function(){ initialize(); }
					});

					jQuery("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
						custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
						changepicturecallback: function(){ _bsap.exec(); }
					});
				});
	</script>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
	BackToTop({
	text : '',
	autoShow : true,
	timeEffect : 800,
	appearMethod : 'slide',
	effectScroll : 'linear' 
	});
	});
	jQuery(document).ready(function(){
	jQuery('.related-posting figure img').removeAttr( "width" );
    jQuery('.related-posting figure img').removeAttr( "height" );
	});
	</script>