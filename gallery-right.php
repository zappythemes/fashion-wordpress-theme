<?php 
/**
Template Name: Gallery With Right Sidebar 
*/
get_header();?>
<div class="container">    
    <div class="bread-crumb">
        <?php  
		if($zappy_options['breadcrumbs_check']==1)
			{
			zappy_the_breadcrumb();
			}
		?>
    </div>
    <div class="ten columns">
		<div class="grid-title">
		<div class="grid-icon"></div>
		<h2><?php echo the_title();?></h2>
		</div>
		<div class="gallery-page-section">
			<ul class="gallery clearfix">
				<?php
					/**theme gallery*/
						if($zappy_options['gallery'])
						{
						$zappy_gallery=explode(",",$zappy_options['gallery']);
							foreach($zappy_gallery as $zappy_gallery_value)
							{
							$url = wp_get_attachment_image_src($zappy_gallery_value,'full'); 
							$url1 = wp_get_attachment_image_src($zappy_gallery_value,'medium'); 
							?>
				<li class="three columns alpha omega threecolumns-right">
					<a href="<?php echo $url[0];?>" rel="prettyPhoto[gallery1]">
						<div class="pic">
							<figure><img src="<?php echo $url[0];?>"></figure><span class="pic-caption left-to-right"><span>
						</div>
					</a>
				</li>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<div class="six columns">
	<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>