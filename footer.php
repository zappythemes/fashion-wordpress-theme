<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fashion
 */

 global $zappy_options;
	//Footer Banner
	if($zappy_options['bottom_banner_check']==1)
	{
	if($zappy_options['bottom_banner_option']==2)
	{
	if($zappy_options['bottom_banner_openlink']==1)
	{
	$target="target='_blank'";
	}
	?>
	<div class="ftr-banner" align="center">
	   <figure>
		 <a href="<?php echo $zappy_options['bottom_banner_link']?>" title="<?php echo $zappy_options['bottom_banner_alternative_text']?>" <?php echo $target; ?>><img src="<?php echo $zappy_options['bottom_banner_image']['url']?>"></a>
	   </figure>
	</div>

	<?php 
	}
			elseif($zappy_options['bottom_banner_option']==1)
	{
	?>
				<div class="container ftr-banner" align="center">
						<?php echo "<script type='text/javascript'>". $zappy_options['bottom_banner_code']."</script>";?>
				</div>
	<?php
	}
	}
?>
<!-- Footer Section -->
<div class="footer-section">
    <div class="container">
        <div class="footer-columns">
            <?php dynamic_sidebar('footer');?>          
            
               
        </div>
        <div class="copy-right">
            <div class="eight columns">
                <?php
				if($zappy_options['footer_text']){
						$zappy_footer_text=$zappy_options['footer_text'];
					  }else{
						$zappy_footer_text="Copyright &#169; 2014 Fashion. All Rights Reserved.";
					  }
					 echo "<p>$zappy_footer_text</p>";
				?>
            </div>
            <div class="eight columns">
                <div class="social-icon-fot">
                    <ul>
					<?php 
						if($zappy_options['facebook_check']==1)
						echo '<li><a href="'.$zappy_options['facebook_link'].'" class="entypo-facebook-circled"></a></li>';
						if($zappy_options['twitter_check']==1)
						echo '<li><a href="'.$zappy_options['twitter_link'].'" class="entypo-tumblr-circled"></a></li>';	  
						if($zappy_options['linkedin_check']==1)
						echo '<li><a href="'.$zappy_options['linkedin_link'].'" class="entypo-linkedin-circled"></a></li>';  
						if($zappy_options['googleplus_check']==1)
						echo '<li><a href="'.$zappy_options['googleplus_link'].'" class="entypo-gplus-circled"></a></li>'; 
						if($zappy_options['pinterest_check']==1)
						echo '<li><a href="'.$zappy_options['pinterest_link'].'" class="entypo-pinterest-circled"></a></li>';
						if($zappy_options['vimeo_check']==1)
						echo '<li><a href="'.$zappy_options['vimeo_link'].'" class="entypo-vimeo-circled"></a></li>';
					?>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- Footer Section Ends-->
<?php wp_footer();
/*Zappy Custom Footer Code*/
	if($zappy_options['footer_code']){
		echo "<script type='text/javascript'>".$zappy_options['footer_code']."</script>";
	}
 ?>

</body>
</html>