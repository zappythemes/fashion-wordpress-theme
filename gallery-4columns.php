<?php 
/**
Template Name: Gallery 4 Columns
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
    
    <div class="gallery-page-section">
		<div class="grid-title title-rightless">
		<div class="grid-icon"></div>
		<h2><?php echo the_title();?></h2>
		</div>
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
            <li class="four columns column alpha omega fourcolumns">
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
<?php get_footer();?>