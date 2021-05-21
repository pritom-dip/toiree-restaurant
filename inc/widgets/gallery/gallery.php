<?php

/*
Widget Name: Normal Gallery Widget
Author: Pritom Chowdhury Dip
*/

class Gallery_widget extends Thim_Widget {
    function __construct() {
        parent::__construct(
            'gallery',
            esc_attr__( 'TT: Gallery', 'themeplate' ),
            array(
                'description'    => esc_attr__( 'Add Gallery', 'themeplate' ),
                'help'           => 'https://siteorigin.com/widgets-bundle/editor-widget/',
                'panels_groups'  => array( 'thim_widget_group' )
            ),
            array(),
            array(              
                'gallery_image'  => array(
                    'type'       => 'textarea',
                    'label'      => esc_attr__( 'Gallery image shortcode', 'themeplate' )
                ),
                'column_num'        => array(
                    "type"          => "select",
                    "label"         => esc_attr__( "Column", "themeplate" ),
                    "default"       => "column_three",
                    "options"       => array(
                        "column_three"  => esc_attr__( "Three Column", "themeplate" ),
                        "column_four"   => esc_attr__( "Four Column", "themeplate" ),
                        "column_five"   => esc_attr__( "Five Column", "themeplate" ),
                    ),
                ),
                'mobile_options'    => array(
                    "type"          => "select",
                    "label"         => esc_attr__( "Mobile layout", "themeplate" ),
                    "default"       => "tr_no_slider",
                    "options"       => array(
                        "tr_no_slider"  => esc_attr__( "One after another", "themeplate" ),
                        "tr_gl_slider"  => esc_attr__( "Slider On Mobile", "themeplate" )
                    ),
                    'state_emitter' => array(
                        'callback'  => 'select',
                        'args'      => array( 'mobile_options' )
                    )
                ),
                'autoplay_options'  => array(
                    "type"          => "select",
                    "label"         => esc_attr__( "Autoplay on Slider", "themeplate" ),
                    "default"       => "on",
                    "options"       => array(
                        "on"          => esc_attr__( "On", "themeplate" ),
                        "off"         => esc_attr__( "Off", "themeplate" )
                    ),
                    'state_handler' => array(
                        'mobile_options[tr_no_slider]'   => array( 'hide' ),
                        'mobile_options[tr_gl_slider]'   => array( 'show' ),
                    ),
                ),
                'isotope_option'  => array(
                    "type"        => "select",
                    "label"       => esc_attr__("Select Column", "themeplate"),
                    "default"     => "masonry",
                    "options"     => array(
                        "masonry" => esc_attr__("Mosaic", "themeplate"),
                        "fitRows" => esc_attr__("Fit Column", "themeplate")
                    ),
                    "description" => esc_attr__("Select Style.", "themeplate"),
                ),

            ),
            
            TP_THEME_DIR . 'inc/widgets/gallery'
        );
    }

    /**
     * Initialize the Gallery widget
     */

    function get_template_name( $instance ) {
        return 'base';
    }

    function get_style_name( $instance ) {
        return false;
    }

}

function thim_gallery_register_widget() {
    register_widget( 'Gallery_widget' );
}

add_action( 'widgets_init', 'thim_gallery_register_widget' );