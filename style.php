<?php
global $zappy_options;
  echo "<style type='text/css'>";
 //Custom css code
 if($zappy_options['custom_css_code'])
  echo $zappy_options['custom_css_code'];
 


		  //Site Background
		  
		  if($zappy_options['background_option']==1)
		   {
			if($zappy_options['pattern_option']) 
				{
					for($i=1;$i<=20;$i++)
					{
					if($zappy_options['pattern_option']==$i){
					$site_background_url=get_template_directory_uri().'/Options/patterns/'.$i.'.png';
					$site_background = "url('$site_background_url')";	
					}
					
					}	
				
				}
			
		  }elseif($zappy_options['background_option']==2){
			$site_background = $zappy_options['background_image']['url'];
			$site_background = "url('$site_background')";
		  }elseif($zappy_options['background_option']==3){
			$site_background = $zappy_options["background_color"];
		  }
		  
		  echo "body{
				background:$site_background;
				background-size:cover;
		  }";

		  //Typography
		  //Font styles of paragraphs
		  if($zappy_options['general_font_check']==1){
		     if($zappy_options['general_font_styles']){
			 
				$p_font_family=$zappy_options['general_font_styles']['font-family'];
				$p_font_size=$zappy_options['general_font_styles']['font-size'];
				$p_font_color=$zappy_options['general_font_styles']['color'];
				$p_line_height=$zappy_options['general_font_styles']['line-height'];
				$p_font_weight=$zappy_options['general_font_styles']['font-weight'];
				$p_font_style=$zappy_options['general_font_styles']['font-style'];
				$p_font_wordspacing=$zappy_options['general_font_styles']['word-spacing'];
				$p_font_letterspacing=$zappy_options['general_font_styles']['letter-spacing'];
				
					echo ".logo-content p,.post-detail,.page-section-default p,.blog-content p,.single-blog-post p,.about-author p,.author-post p,.recent-com-text,.rssSummary,.footer-columns p,.related-post-detail p,p{
					font-family:$p_font_family;
					font-size:$p_font_size;
					color:$p_font_color;
					line-height:$p_line_height;
					font-weight:$p_font_weight;
					font-style:$p_font_style;
					word-spacing:$p_font_wordspacing;
					letter-spacing:$p_font_letterspacing;
				}";
			   
			 }
		  }
		 
		 //Font style for Post title
		   if($zappy_options['posttitle_font_check']==1)
			{
		
			   if($zappy_options['posttitle_font_styles'])
					{ 
						
						$posttitle_font_family=$zappy_options['posttitle_font_styles']['font-family'];
						$posttitle_font_size=$zappy_options['posttitle_font_styles']['font-size'];
						$posttitle_font_color=$zappy_options['posttitle_font_styles']['color'];
						$posttitle_line_height=$zappy_options['posttitle_font_styles']['line-height'];
						$posttitle_font_weight=$zappy_options['posttitle_font_styles']['font-weight'];
						$posttitle_font_style=$zappy_options['posttitle_font_styles']['font-style'];
						$posttitle_font_wordspacing=$zappy_options['posttitle_font_styles']['word-spacing'];
						$posttitle_font_letterspacing=$zappy_options['posttitle_font_styles']['letter-spacing'];
						echo ".grid-title h2,.single-blog-post h1 {	
							font-family:$posttitle_font_family;
							font-size:$posttitle_font_size;
							color:$posttitle_font_color;
							line-height:$posttitle_line_height;
							font-weight:$posttitle_font_weight;
							font-style:$posttitle_font_style;
							word-spacing:$posttitle_font_wordspacing;
							letter-spacing:$posttitle_font_letterspacing;
						}";
				 	}
			}
		//Font style for Widget title
		   if($zappy_options['widgettitle_font_check']==1)
			{
			   if($zappy_options['widgettitle_font_styles'])
					{
						$widgettitle_font_family=$zappy_options['widgettitle_font_styles']['font-family'];
						$widgettitle_font_size=$zappy_options['widgettitle_font_styles']['font-size'];
						$widgettitle_font_color=$zappy_options['widgettitle_font_styles']['color'];
						$widgettitle_line_height=$zappy_options['widgettitle_font_styles']['line-height'];
						$widgettitle_font_weight=$zappy_options['widgettitle_font_styles']['font-weight'];
						$widgettitle_font_style=$zappy_options['widgettitle_font_styles']['font-style'];
						$widgettitle_font_wordspacing=$zappy_options['widgettitle_font_styles']['word-spacing'];
						$widgettitle_font_letterspacing=$zappy_options['widgettitle_font_styles']['letter-spacing'];
						echo ".widget-title h2
						{
							font-family:$widgettitle_font_family;
							font-size:$widgettitle_font_size;
							color:$widgettitle_font_color;
							line-height:$widgettitle_line_height;
							font-weight:$widgettitle_font_weight;
							font-style:$widgettitle_font_style;
							word-spacing:$widgettitle_font_wordspacing;
							letter-spacing:$widgettitle_font_letterspacing;
						}";
					}
			}
	
		//Font style for H1
		if($zappy_options['heading1_font_check']==1)
		{
			 if($zappy_options['heading1_font_styles'])
			 {
				$h1_font_family=$zappy_options['heading1_font_styles']['font-family'];
				$h1_font_size=$zappy_options['heading1_font_styles']['font-size'];
				$h1_font_color=$zappy_options['heading1_font_styles']['color'];
				$h1_line_height=$zappy_options['heading1_font_styles']['line-height'];
				$h1_font_weight=$zappy_options['heading1_font_styles']['font-weight'];
				$h1_font_style=$zappy_options['heading1_font_styles']['font-style'];
				$h1_font_wordspacing=$zappy_options['heading1_font_styles']['word-spacing'];
				$h1_font_letterspacing=$zappy_options['heading1_font_styles']['letter-spacing'];
					echo "h1,.logo-content h1,.blog-content h1,.single-blog-post h1
					{
					font-family:$h1_font_family;
					font-size:$h1_font_size;
					color:$h1_font_color;
					line-height:$h1_line_height;
					font-weight:$h1_font_weight;
					font-style:$h1_font_style;
					word-spacing:$h1_font_wordspacing;
					letter-spacing:$h1_font_letterspacing;
					}";
			 }
		 } 
		 //Font style for H2
		if($zappy_options['heading2_font_check']==1)
		{
			 if($zappy_options['heading2_font_styles'])
			 {
				$h2_font_family=$zappy_options['heading2_font_styles']['font-family'];
				$h2_font_size=$zappy_options['heading2_font_styles']['font-size'];
				$h2_font_color=$zappy_options['heading2_font_styles']['color'];
				$h2_line_height=$zappy_options['heading2_font_styles']['line-height'];
				$h2_font_weight=$zappy_options['heading2_font_styles']['font-weight'];
				$h2_font_style=$zappy_options['heading2_font_styles']['font-style'];
				$h2_font_wordspacing=$zappy_options['heading2_font_styles']['word-spacing'];
				$h2_font_letterspacing=$zappy_options['heading2_font_styles']['letter-spacing'];
				echo "h2,.logo-content h2,.grid-title h2,.grid-title-right h2,.widget-title h2
				    {
						font-family:$h2_font_family;
						font-size:$h2_font_size;
						color:$h2_font_color;
						line-height:$h2_line_height;
						font-weight:$h2_font_weight;
						font-style:$h2_font_style;
						word-spacing:$h2_font_wordspacing;
						letter-spacing:$h2_font_letterspacing;
				    }";
			 }
		 }
		//Font style for H3
		if($zappy_options['heading3_font_check']==1){
			 if($zappy_options['heading3_font_styles']){
				$h3_font_family=$zappy_options['heading3_font_styles']['font-family'];
				$h3_font_size=$zappy_options['heading3_font_styles']['font-size'];
				$h3_font_color=$zappy_options['heading3_font_styles']['color'];
				$h3_line_height=$zappy_options['heading3_font_styles']['line-height'];
				$h3_font_weight=$zappy_options['heading3_font_styles']['font-weight'];
				$h3_font_style=$zappy_options['heading3_font_styles']['font-style'];
				$h3_font_wordspacing=$zappy_options['heading3_font_styles']['word-spacing'];
				$h3_font_letterspacing=$zappy_options['heading3_font_styles']['letter-spacing'];
				echo "h3,.abt-author h3,.contact-form h3,.footer-heading h3  {
					font-family:$h3_font_family;
					font-size:$h3_font_size;
					color:$h3_font_color;
					line-height:$h3_line_height;
					font-weight:$h3_font_weight;
					font-style:$h3_font_style;
					word-spacing:$h3_font_wordspacing;
					letter-spacing:$h3_font_letterspacing;
				}";
			 }
		 } 	
		 
		//Font style for H4
		if($zappy_options['heading4_font_check']==1){
			 if($zappy_options['heading4_font_styles']){
					$h4_font_family=$zappy_options['heading4_font_styles']['font-family'];
					$h4_font_size=$zappy_options['heading4_font_styles']['font-size'];
					$h4_font_color=$zappy_options['heading4_font_styles']['color'];
					$h4_line_height=$zappy_options['heading4_font_styles']['line-height'];
					$h4_font_weight=$zappy_options['heading4_font_styles']['font-weight'];
					$h4_font_style=$zappy_options['heading4_font_styles']['font-style'];
					$h4_font_wordspacing=$zappy_options['heading4_font_styles']['word-spacing'];
					$h4_font_letterspacing=$zappy_options['heading4_font_styles']['letter-spacing'];
					echo "h4,.post-fields .post-content-right h4,.comment-title h4,.contact-form h4  {
						font-family:$h4_font_family;
						font-size:$h4_font_size;
						color:$h4_font_color;
						line-height:$h4_line_height;
						font-weight:$h4_font_weight;
						font-style:$h4_font_style;
						word-spacing:$h4_font_wordspacing;
						letter-spacing:$h4_font_letterspacing;
					}";
			 }
		}
		//Font style for H5
		if($zappy_options['heading5_font_check']==1){
			 if($zappy_options['heading5_font_styles']){
					$h5_font_family=$zappy_options['heading5_font_styles']['font-family'];
					$h5_font_size=$zappy_options['heading5_font_styles']['font-size'];
					$h5_font_color=$zappy_options['heading5_font_styles']['color'];
					$h5_line_height=$zappy_options['heading5_font_styles']['line-height'];
					$h5_font_weight=$zappy_options['heading5_font_styles']['font-weight'];
					$h5_font_style=$zappy_options['heading5_font_styles']['font-style'];
					$h5_font_wordspacing=$zappy_options['heading5_font_styles']['word-spacing'];
					$h5_font_letterspacing=$zappy_options['heading5_font_styles']['letter-spacing'];
					echo ".about-author h5,h5 {
						font-family:$h5_font_family;
						font-size:$h5_font_size;
						color:$h5_font_color;
						line-height:$h5_line_height;
						font-weight:$h5_font_weight;
						font-style:$h5_font_style;
						word-spacing:$h5_font_wordspacing;
						letter-spacing:$h5_font_letterspacing;
					}";
			 }
		}
	//Font style for H6
		if($zappy_options['heading6_font_check']==1){
			 if($zappy_options['heading6_font_styles']){
					$h6_font_family=$zappy_options['heading6_font_styles']['font-family'];
					$h6_font_size=$zappy_options['heading6_font_styles']['font-size'];
					$h6_font_color=$zappy_options['heading6_font_styles']['color'];
					$h6_line_height=$zappy_options['heading6_font_styles']['line-height'];
					$h6_font_weight=$zappy_options['heading6_font_styles']['font-weight'];
					$h6_font_style=$zappy_options['heading6_font_styles']['font-style'];
					$h6_font_wordspacing=$zappy_options['heading6_font_styles']['word-spacing'];
					$h6_font_letterspacing=$zappy_options['heading6_font_styles']['letter-spacing'];
					echo ".footer-columns .footer-contact h6,h6 {
						font-family:$h6_font_family;
						font-size:$h6_font_size;
						color:$h6_font_color;
						line-height:$h6_line_height;
						font-weight:$h6_font_weight;
						font-style:$h6_font_style;
						word-spacing:$h6_font_wordspacing;
						letter-spacing:$h6_font_letterspacing;
					}";
			 }
		}
	   //Post link color
	 	if($zappy_options['post_link_color'])
		   {
			
			   $a_regular_color=$zappy_options['post_link_color']['regular'];
			   $a_hover_color=$zappy_options['post_link_color']['hover'];
			   $a_active_color=$zappy_options['post_link_color']['active'];
			   echo ".single-blog-post p a,.blog-content p{
						color:$a_regular_color;
					}
					 .single-blog-post p a:hover,.blog-content p a:hover{
						color:$a_hover_color;
					}
					.single-blog-post p a:active,.blog-content p a:active{
						color:$a_active_color;
					}
					";
		  }
	 
	   //Widget link color
		if($zappy_options['widget_link_color'])
		 {
		    
			   $a_regular_color=$zappy_options['widget_link_color']['regular'];
			   $a_hover_color=$zappy_options['widget_link_color']['hover'];
			   $a_active_color=$zappy_options['widget_link_color']['active'];
			   echo ".widget-container a,.widget-content ul li a{
						color:$a_regular_color;
					}
					..widget-container a:hover,.widget-content ul li a:hover{
						color:$a_hover_color;
					}
					..widget-container a:active,.widget-content ul li a:active{
						color:$a_active_color;
					}
					";
		}	
 echo "</style>";
?>	