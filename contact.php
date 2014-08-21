<?php 
/**Template Name: Contact Us
*/
get_header();

/*Mail Function*/
	if(isset($_POST['contact_submit'])=='submit')
	{
	  $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n" ;
	  if(empty($zappy_options['contact_form_email']))
	   {
	    $to=get_settings('admin_email');
	   }
      else{ $to=$zappy_options['contact_form_email']; }
	  $subject="Contact Form";
	
	  $message='Name:'.$_POST['contact_name']."<br/>".'Email :'.$_POST['contact_email']."<br/>".'Comments :'.$_POST['contact_commentbox'];
	   $zappy_mail=wp_mail($to,$subject,$message,$headers) ;	
	}
	?>
<div class="container">
    
    <div class="bread-crumb">
        <?php
		if($zappy_options['breadcrumbs_check']==1)
		{
		zappy_the_breadcrumb();
		}
		?>
    </div>
    <div class="sixteen columns">
		<div class="grid-title title-rightless">
		<div class="grid-icon"></div>
		<h2><?php echo the_title();?></h2>
		</div>
		<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				else :
					echo wpautop( 'Sorry, no posts were found' );
				endif;
				 if($zappy_options['map_check']==1)
					{	
				
						$address="";
								if(isset($zappy_options['contact_form_name']))
								$address .='<b>'.$zappy_options['contact_form_name'].'</b><br/>';
								if($zappy_options['address_line_one'])
								$address .=$zappy_options['address_line_one'].'<br/>';
								if($zappy_options['address_line_two'])
								$address .=$zappy_options['address_line_two'].'<br/>';
								if($zappy_options['city'])
								$address .=$zappy_options['city'].'<br/>';
								if($zappy_options['state'])
								$address .=$zappy_options['state'].'<br/>';
								if($zappy_options['country'])
								$address .=$zappy_options['country'];
							?>
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
							<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.ui.map.js"></script>
							<script type="text/javascript">
								jQuery(function() { 
									
									jQuery('#map_canvas').gmap({'center': '<?php echo $zappy_options['latitude'];?>,<?php echo $zappy_options['longitude'];?>', 'zoom': 16, 'disableDefaultUI':true, 'callback': function() {
											var self = this;
											self.addMarker({'position': this.get('map').getCenter() }).click(function() {
												self.openInfoWindow({ 'content':'<?php echo $address;?>' }, this);
											});	
										}});
								});
							</script>
							<div id="map_canvas" class="contact-map"></div>
							<style type="text/css">
								.contact-map{ width:98%; height:400px; }
							</style>
							</div>
						<!--End Google Map-->
					<?php 
					}
					?>

			
            <div class="contact-page-form">
			<?php if($zappy_options['address_check']==1)
					{
					?>
                <div class="eight columns alpha contact-details">
                    <ul>
					<?php if($zappy_options['contact_form_phone']){?>
                        <li><span class="cal-image"></span><p><?php echo $zappy_options['contact_form_phone'];?></p></li>
					<?php }?>
					<?php if($zappy_options['contact_form_email']){?>
                        <li><span class="msg-image"></span><p><?php echo $zappy_options['contact_form_email'];?></p></li>
					<?php }?>	
					<?php if($zappy_options['twitter_name']){?>
                        <li><span class="entypo-twitter-circled"></span><p><?php echo $zappy_options['twitter_name'];?></p></li>
					<?php }?>
					<?php if($zappy_options['twitter_name']){?>
                        <li><span class="entypo-facebook-circled"></span><p><?php echo $zappy_options['fb_name'];?></p></li>
					<?php } ?>
					<?php if($zappy_options['contact_form_address_email']){?>
                        <li><span class="entypo-gplus-circled"></span><p><?php echo $zappy_options['contact_form_address_email'];?></p></li>
					<?php } ?>
                    </ul>                    
                </div>
			<?php } ?>
			<?php if($zappy_options['contact_form_check']==1)
					 {
					 ?>
                <div class="eight columns alpha contact-form">
                    <h3><?php echo $zappy_options['contact_form_title'];?></h3>
					<?php if($zappy_mail==true)
					{
					echo $sucess="<h4>Mail Was Sucessfully Sent...</h4>";
					}
					?>
					<form class="addMargL15p" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" id="contact_form">
                    <input type="text" name="contact_name" placeholder="name" class="contact-input" required>
                    <input type="text" name="contact_email" placeholder="email" class="contact-input" required>
                    <textarea name="contact_commentbox" placeholder="message" class="contact-text" required></textarea>
                    <input type="submit" value="submit" name="contact_submit" class="contact-submit">
					</form>
                </div>
			<?php } ?>
            </div>
        </div>        
    </div>
    
</div>
<?php get_footer();?>