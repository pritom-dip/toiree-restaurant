<?php

/*
Widget Name: Photogallary widget
Author: Pritom Chowdhury Dip
*/

class Photogallary_Widget extends Thim_Widget
{
    function __construct()
    {
        parent::__construct(
            'photogallary',
            esc_attr__('TT: Photogallary', 'themeplate'),
            array(
                'description'   => esc_attr__('Add Photogallary', 'themeplate'),
                'panels_groups' => array('thim_widget_group')
            ),
            array(),
            array(

                'column_select' => array(
                    "type"        => "select",
                    "label"       => esc_attr__("Select Column", "themeplate"),
                    "default"     => "three",
                    "options"     => array(
                        "three" => esc_attr__("Three Column", "themeplate"),
                        "four"  => esc_attr__("Four Column", "themeplate")
                    ),
                    "description" => esc_attr__("Select Coumn Number.", "themeplate"),
                ),

                'btn_bg_color' => array(
                    'type'    => 'color',
                    'label'   => esc_attr__('Button background color', 'themeplate'),
                    'default' => '#363636'
                ),

                'btn_text_color' => array(
                    'type'    => 'color',
                    'label'   => esc_attr__('Button text color', 'themeplate'),
                    'default' => '#fff'
                ),

                'active_btn_bg_color' => array(
                    'type'    => 'color',
                    'label'   => esc_attr__('Active button background color', 'themeplate'),
                    'default' => '#4b895b'
                ),

                'active_btn_text_color' => array(
                    'type'    => 'color',
                    'label'   => esc_attr__('Active button text color', 'themeplate'),
                    'default' => '#fff'
                ),

                'show_title' => array(
                    'type'    => 'checkbox',
                    'label'   => esc_attr__('Show Title', 'themeplate'),
                    'default' => true
                ),

                'isotope_design'        => array(
                    "type"        => "select",
                    "label"       => esc_attr__("Select Column", "themeplate"),
                    "default"     => "masonry",
                    "options"     => array(
                        "masonry" => esc_attr__("Mosaic", "themeplate"),
                        "fitRows" => esc_attr__("Fit Column", "themeplate")
                    ),
                    "description" => esc_attr__("Select Style.", "themeplate"),
                ),
                'hide_isotope_category1' => array(
                    'type'    => 'checkbox',
                    'label'   => esc_attr__('Hide Category option', 'themeplate'),
                    'default' => false
                ),

            ),
            TP_THEME_DIR . 'inc/widgets/photogallary'
        );
    }

    /**
     * Initialize the CTA widget
     */

    function get_template_name($instance)
    {
        return 'base';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

function thim_photogallary_register_widget()
{
    register_widget('Photogallary_Widget');
}

add_action('widgets_init', 'thim_photogallary_register_widget');