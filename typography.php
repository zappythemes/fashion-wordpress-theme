<?php
/** Template Name:Typography */
get_header();
		echo'<div class="container">
				<div class="bread-crumb">';
					if($zappy_options['breadcrumbs_check']==1)
						{
						zappy_the_breadcrumb();
						}
				echo'</div>
				<div  class="page-typography">
					<div class="typo-prev">';
		// Typography Content
			$zappy_the_query = new WP_Query( 'pagename=typography' );

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
		echo'</div></div></div>';
 get_footer();?>