<?php

function menulist_add_pages() {
    add_submenu_page(
	    'edit.php?post_type=menu_list',
	    __( 'Menu List Category Sorting', 'themeplate' ),
	    __( 'Menu List Category Sorting', 'themeplate' ),
	    'manage_options',
	    'menu-category-sorting',
	    'menulist_settings_page'
	);
}

add_action( 'admin_menu', 'menulist_add_pages' );

function menulist_settings_page() {
    echo "<h2>" . __( 'Menu List Category Sorting', 'themeplate' ) . "</h2>";

    $lan     = tr_get_current_language();
    $options = get_option( $lan . '_menulist_sorting_order' );
    ?>

    <div class="portfolio-section-wrapper">
    	<div class="portfolio-row">
    		<div data-repeater-list='menu_list' class="menu_list-dragable" id="menu-list">
    		<?php
    		$sorting_ids   	 = get_option( $lan . '_menulist_sorting_order' );

    		if( $sorting_ids != '' ){
    			$sorting_array = explode( ',', $sorting_ids );

	    		foreach( $sorting_array as $catId ){

	    			if( !empty( $catId )  ){

					    if( $term = get_term_by( 'id', $catId, 'menu_list_category' ) ){
						    $name = $term->name;
						} else {
							$name = '';
						}
		        		?>

				        	<div id="<?php  echo $catId; ?>" class="menu-drag">						
								<span class="menu_list_admin_sort_title"><?php echo $name; ?></span>
								
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

add_action( 'wp_ajax_nopriv_menulist_sortable', 'menulist_sortable_get_data' );
add_action( 'wp_ajax_menulist_sortable', 'menulist_sortable_get_data' );

function menulist_sortable_get_data(){
    $lan     = tr_get_current_language();
	$ids_order = $_POST['order'];
	update_option( $lan . '_menulist_sorting_order', $ids_order );
	return 'success';
}


add_action('create_menu_list_category', 'menulist_sorting_order_create', 10, 2);

function menulist_sorting_order_create($term_id, $taxonomy_term_id){

    $lan     = tr_get_current_language();

    // $options = get_option('menulist_sorting_order'); 
    
   $options = get_option( $lan.'_menulist_sorting_order' );

    if (!empty($options)) {

        $catId  = strval( $term_id ); 
        $ids    = explode( ',', $options );

        if (!in_array( $catId, $ids )) {
            $new_options = $options . ',' . $catId;
            update_option( $lan.'_menulist_sorting_order', $new_options );
        }

    } else {
        // error_log('message');
        update_option( $lan.'_menulist_sorting_order', $term_id );
    }
}

add_action( 'delete_menu_list_category', 'menulist_sorting_order_delete', 10 );

function menulist_sorting_order_delete( $term_id ){

    $lan     = tr_get_current_language();
	$options = get_option( $lan . '_menulist_sorting_order' );

    if (!empty( $options )) {

        $id = strval( $term_id );

        if ( strpos( $options, $id ) == true ) {      	
        	
        	$deleted_options = str_replace( ',' . $id, '', $options );
            update_option( $lan . '_menulist_sorting_order', $deleted_options );
        }

        if( $options == $term_id ){
        	$deleted_options = str_replace( $id, '', $options );
            update_option( $lan . '_menulist_sorting_order', $deleted_options );
        }
    }
}

add_action( 'wp_ajax_nopriv_menu_list_sortable', 'menu_list_sortable_get_data' );
add_action( 'wp_ajax_menu_list_sortable', 'menu_list_sortable_get_data' );

function menu_list_sortable_get_data(){
	$ids_order = $_POST['order'];
    $lan     = tr_get_current_language();
	update_option( $lan . '_menulist_sorting_order', $ids_order );
	return 'success';
} 

function tr_get_current_language(){
    $current_lang = '';

    if (class_exists('SitePress')) {
        $current_lang = apply_filters( 'wpml_current_language', NULL );
    } 

    return $current_lang;
}