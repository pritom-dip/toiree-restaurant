<?php
$css        = '';
$active_css = '';
$width      = '';

// if ( $instance['btn_bg_color'] <> '' ) {
//     $css .= 'background-color:' . $instance['btn_bg_color'] . ';';
// }

// if ( $instance['btn_text_color'] <> '' ) {
//     $css .= 'color:' . $instance['btn_text_color'] . ';';
// }

// if ( $css ) {
//     $css = ' style="' . $css . '"';
// }

if ($instance['column_select'] == 'four') {
    $width .= '23%';
} else {
    $width .= '32%';
}

$terms = get_terms(array(
    'taxonomy'   => 'photo_gallary_category',
    'hide_empty' => true,
));
?>

<style>
    .portfolio-button {
        color: <?php echo $instance['btn_text_color']; ?> !important;
        background: <?php echo $instance['btn_bg_color'];?> !important;
    }

    .portfolio-button.is-checked {
        color: <?php echo $instance['active_btn_text_color']; ?> !important;
        background: <?php echo $instance['active_btn_bg_color']; ?> !important;
    }

    .portfolio-grid-item {
        width: <?php echo $width; ?>;
    }
</style>

<?php
if ($instance['hide_isotope_category1'] == true) {
    
} else { ?>
    <div class="portfolio-button-area text-center">
        <button type="button" class="portfolio-button is-checked" data-filter="">ALL</button>
        <?php foreach ($terms as $term) { ?>
            <button type="button" class="portfolio-button"
                    data-filter=".<?php echo $term->slug; ?>"><?php echo ucfirst($term->name); ?></button>
        <?php } ?>
    </div>
<?php } ?>

<div class="portfolio-gallery" id="gallery" data-design="<?php echo $instance['isotope_design']; ?>">

    <?php
    $lan         = tr_get_current_language();
    $sorting_ids = get_option( $lan .'portfolio_sorting_order');

    if ($sorting_ids != '') {
        $sorting_array = explode(',', $sorting_ids);

        foreach ($sorting_array as $postId) {

            if (get_post_status($postId) && 'publish' == get_post_status($postId) && $postId != '') {

                if (has_post_thumbnail($postId)) {
                    $image_link = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'full');
                    $image      = $image_link[0];

                } else {
                    $image = get_template_directory_uri() . '/assets/images/placeholder.jpeg';
                }

                $post_categories = get_the_terms($postId, 'photo_gallary_category');
                if (!empty($post_categories)) {
                    $categories = wp_list_pluck($post_categories, 'slug', 'term_id');
                    $categories = implode(" ", $categories);

                } else {
                    $categories = '';
                }

                if ($instance['show_title'] === true) {
                    $title = ' title="' . get_the_title($postId) . '"';
                } else {
                    $title = '';
                }

                $portfolio_video_link = get_post_meta($postId, 'portfolio_video_link', true);

                if (empty($portfolio_video_link)) {
                    $link = $image;
                } else {
                    $link = $portfolio_video_link;
                }
                ?>

                <a href="<?php echo $link; ?>"
                   class="portfolio-grid-item <?php echo $categories; ?>" <?php echo $title; ?>>
                    <img class="img-responsive" src="<?php echo $image; ?>">
                    <div class="image-wrapper">
                        <img src="<?php echo $image; ?>" class="displayed-image"/>
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
    }
    ?>
</div>