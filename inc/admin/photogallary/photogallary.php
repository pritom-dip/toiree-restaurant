<?php


function portfolio_add_pages() {
    add_submenu_page(
	    'edit.php?post_type=photo_gallary',
	    __( 'Portfolio Sorting', 'themeplate' ),
	    __( 'Portfolio Sorting', 'themeplate' ),
	    'manage_options',
	    'portfolio-gallary-sorting',
	    'portfolio_settings_page'
	);
}

add_action( 'admin_menu', 'portfolio_add_pages' );

function portfolio_settings_page() {
    echo "<h2>" . __( 'Portfolio Sorting', 'themeplate' ) . "</h2>";
    ?>

    <div class="portfolio-section-wrapper">
    	<div class="portfolio-row">
    		<div data-repeater-list='portfolio' class="portfolio-dragable" id="portfolio-list">
    		<?php
    		$lan     = tr_get_current_language();
    		$sorting_ids   	 = get_option( $lan . 'portfolio_sorting_order');

    		if( $sorting_ids != '' ){
    			$sorting_array = explode( ',', $sorting_ids );

	    		foreach( $sorting_array as $postId ){

	    			if ( get_post_status ( $postId ) && 'publish' == get_post_status ( $postId ) && $postId != '' ) {

		    			if( has_post_thumbnail( $postId ) ){
		    				$image_link  = wp_get_attachment_image_src( get_post_thumbnail_id( $postId ), 'single-post-thumbnail' );
		    				$image 		 = $image_link[0];

		    			} else {
		    				$image 		 = get_template_directory_uri(). '/assets/images/placeholder.jpeg';
		    			}
		    			
				        $post_categories = get_the_terms( $postId,'photo_gallary_category');
				        if( !empty($post_categories)){
				        	$categories      = wp_list_pluck( $post_categories, 'slug', 'term_id');
				        	$categories = implode("| ", $categories);

				        } else {
				        	$categories = '';
				        }
		        		
	        		?>

			        	<div id="<?php echo $postId; ?>" class="portfolio-drag">
						
							<img class="mtheme_admin_sort_image" src="<?php echo $image; ?>" width="30px" height="30px" alt="">
							<span class="mtheme_admin_sort_title"><?php echo get_the_title($postId); ?></span>
							<span class="mtheme_admin_sort_categories"><?php echo $categories; ?></span>
							
						</div>

		       		<?php
		    		} 
		    	}	
	    	} 
	    	?>
    		</div>
    	</div>
    </div>

    <?php
}

add_action( 'wp_ajax_nopriv_portfolio_sortable', 'portfolio_sortable_get_data' );
add_action( 'wp_ajax_portfolio_sortable', 'portfolio_sortable_get_data' );

function portfolio_sortable_get_data(){
	$lan 	   = tr_get_current_language();
	$ids_order = $_POST['order'];
	update_option( $lan . 'portfolio_sorting_order', $ids_order );
	return 'success';
}