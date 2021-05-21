<?php

$gallery_metas 		= trt_get_meta_value( $id, 'tr_gallery' );

if( empty( $gallery_metas )  ){ 
	echo 'There are no images'; 
	return; 
}

$gallery_array = explode( ',', $gallery_metas );
?>

<div class="portfolio-gallery_wrrapper normal_gallery" id="tr_gallery">

	<?php 
	if ( '' !== $gallery_array ) {   
		
        foreach ( $gallery_array as $gallery_meta ) {

	        $img_src = wp_get_attachment_url( $gallery_meta );
	        $title 	 = apply_filters('the_excerpt', get_post_field('post_excerpt', $gallery_meta));
    	?>	
			<a href="<?php echo $img_src; ?>" class="portfolio-grid-item">
                <div class="image-wrapper">
                    <img src="<?php echo $img_src; ?>" class="displayed-image"/>
                    <div class="image-overlay">
                        <div class="image-icon-wrap">
	             		<span class="column-gridblock-icon">
	             			<span class="hover-icon-effect"><i class="fa fa-search"></i></span>
	             		</span>
                        </div>
                    </div>
                </div>
            </a>
        <?php
    	}
    }
    ?>

</div>