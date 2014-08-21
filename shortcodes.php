<?php
/** Template Name:Shortcodes */
get_header();
		echo'<section id="content" class="sub-pages"><div class="container">
				<div class="bread-crumb">'; 
					if($zappy_options['breadcrumbs_check']==1)
						{
						zappy_the_breadcrumb();
						}
				echo'</div>
				
				<div  class="sixteen columns">
					<div class="grid-title title-rightless">
				<div class="grid-icon"></div>
				<h2>'.get_the_title().'</h2>
				</div>';
		// Shortcodes Content
			$zappy_the_query = new WP_Query( 'pagename=shortcodes' );

			// The Loop
			if ( $zappy_the_query->have_posts() ) 
			{

				while ( $zappy_the_query->have_posts() ) 
				{
					$zappy_the_query->the_post();
					the_content();
				}
				   
			} 
			/* Restore original Post Data */
			wp_reset_postdata();
		echo'</div></div></section>';
 get_footer();?>