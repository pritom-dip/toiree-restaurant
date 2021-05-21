<?php

class Thim_Award_Widget extends Thim_Widget
{
    function __construct()
    {
        parent::__construct(
            'award',
            esc_attr__('TT: Awards', 'themeplate'),
            array(
                'description'   => esc_attr__('Add Awards', 'themeplate'),
                'panels_groups' => array('thim_widget_group')
            ),
            array(),
            array(
                'style' => array(
                    "type"          => "select",
                    "label"         => esc_attr__("Style heading", "themeplate"),
                    "default"       => "base",
                    "options"       => array(
                        "base"      => esc_attr__("Style One", "themeplate"),
                        "style_new" => esc_attr__("Style Two", "themeplate")
                    ),
                    "description"   => esc_attr__("Select style heading.", "themeplate"),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array('style')
                    )
                ),
                'title' => array(
                    'type'    => 'text',
                    'label'   => esc_attr__('Section Heading', 'themeplate'),
                    'default' => esc_attr__("Default value", "themeplate")
                ),

                'bg_image' => array(
                    'type'        => 'media',
                    'label'       => esc_attr__('Background Image', 'themeplate'),
                    'description' => esc_attr__('Select image from media library.', 'themeplate')
                ),

                'awards' => array(
                    'type'      => 'repeater',
                    'label'     => esc_attr__('Awards', 'themeplate'),
                    'item_name' => esc_attr__('Award', 'themeplate'),
                    'fields'    => array(
                        'image' => array(
                            'type'        => 'media',
                            'label'       => esc_attr__('Brand Image', 'themeplate'),
                            'description' => esc_attr__('Select image from media library.', 'themeplate')
                        ),

                        'link' => array(
                            "type"    => "text",
                            "label"   => esc_attr__("Link", "themeplate"),
                            "default" => "#",
                        ),

                        'name' => array(
                            "type"          => "text",
                            "label"         => esc_attr__("Name", "themeplate"),
                            "default"       => "Default Value",
                            'state_handler' => array(
                                'style[base]'      => array('hide'),
                                'style[style_new]' => array('show'),
                            ),
                        )
                    ),
                ),


            ),
            TP_THEME_DIR . 'inc/widgets/award'
        );
    }


    function get_template_name($instance)
    {
        return isset($instance['style']) ? $instance['style'] : 'base';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

function thim_award_register_widget()
{
    register_widget('Thim_Award_Widget');
}

add_action('widgets_init', 'thim_award_register_widget');