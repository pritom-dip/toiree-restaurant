<?php
/**
 * themeplate enqueue scripts
 *
 * @package themeplate
 */


function themeplate_scripts()
{
    $version = defined('WP_DEBUG') ? time() : '1.0.0';
    wp_enqueue_style('themeplate-styles', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), $version);

    wp_enqueue_script('jquery');

    wp_enqueue_script('imgloaded', get_template_directory_uri() . '/inc/admin/assets/js/imageloaded.js', array('jquery'), $version, true);

    wp_enqueue_script('isotope', get_template_directory_uri() . '/inc/admin/assets/js/isotope.js', array('jquery'), $version, true);

    wp_enqueue_script('lightgallery', get_template_directory_uri() . '/inc/admin/assets/js/lightgallery.js', array('jquery'), $version, true);

    wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), $version, true);

    wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl-carousel.min.js', array('jquery'), '2.3.4', true);

    wp_enqueue_script('themeplate-scripts', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery', 'imgloaded', 'isotope', 'lightgallery', 'lightbox', 'carousel' ), $version, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'themeplate_scripts');


function themeplate_admin_scripts()
{
    $version = defined('WP_DEBUG') ? time() : '1.0.0';
    wp_enqueue_style('globalAdminCss', get_stylesheet_directory_uri() . '/inc/admin/assets/css/global-custom-admin.css', array(), $version);
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_script('globalAdmin', get_template_directory_uri() . '/inc/admin/assets/js/global-custom-admin.js', array('jquery'), $version, true);

    wp_enqueue_style('related-pages-admin-styles', get_stylesheet_directory_uri() . '/assets/css/admin.css');

    wp_enqueue_media();
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-droppable');

    wp_enqueue_script('repeatable-js', get_template_directory_uri() . '/inc/admin/assets/js/repeater.js', array('jquery'), $version, true);

    wp_enqueue_script('repeat-field', get_template_directory_uri() . '/inc/admin/assets/js/admin-post-meta.js', array('jquery', 'jquery-ui-droppable', 'jquery-ui-draggable', 'jquery-ui-sortable', 'repeatable-js'), $version, true);

    wp_localize_script('repeat-field', 'Adminobg', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

}

add_action('admin_enqueue_scripts', 'themeplate_admin_scripts');
