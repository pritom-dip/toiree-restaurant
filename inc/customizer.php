<?php
/**
 * TRT Theme Customizer.
 *
 * @package TRT
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trt_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'trt_customize_register' );

/**
* Add the configuration.
* This way all the fields using the 'trt_opt' ID
* will inherit these options
*/
TRT_Kirki::add_config( 'trt_opt', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
) );

if (class_exists('TRT_Autoload')) {
  require_once TP_THEME_DIR . 'inc/admin/customize-options.php';
}
 
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themeplate_customize_preview_js() {
	wp_enqueue_script( 'themeplate_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'themeplate_customize_preview_js' );
