<?php

class  Thim_Testimonial_Widget extends Thim_Widget
{
    function __construct()
    {
        parent::__construct(
            'testimonial',
            esc_attr__('TT: Testimonial', 'themeplate'),
            array(
                'description'   => esc_attr__('Add Testimonial', 'themeplate'),
                'panels_groups' => array('thim_widget_group')
            ),
            array(),
            array(
                'style' => array(
                    "type"          => "select",
                    "label"         => esc_attr__("Style heading", "themeplate"),
                    "default"       => "base",
                    "options"       => array(
                        "base"      => esc_attr__("Style Old", "themeplate"),
                        "style_new" => esc_attr__("Style New", "themeplate")
                    ),
                    "description"   => esc_attr__("Select style heading.", "themeplate"),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array('style')
                    )
                ),

                'testimonials' => array(
                    'type'      => 'repeater',
                    'label'     => esc_attr__('Testimonials', 'themeplate'),
                    'item_name' => esc_attr__('Testimonial', 'themeplate'),
                    'fields'    => array(

                        'article' => array(
                            "type"    => "textarea",
                            "label"   => esc_attr__("Testimonial Article", "themeplate"),
                            "default" => "Default Value",
                        ),

                        'image' => array(
                            'type'        => 'media',
                            'label'       => esc_attr__('Author Image', 'themeplate'),
                            'description' => esc_attr__('Select image from media library.', 'themeplate')
                        ),

                        'name' => array(
                            "type"    => "text",
                            "label"   => esc_attr__("Name", "themeplate"),
                            "default" => "Name Default",
                        ),

                        'link' => array(
                            "type"    => "text",
                            "label"   => esc_attr__("Link", "themeplate"),
                            "default" => "#",
                        ),

                    ),
                ),


                'sect_title' => array(
                    'type'    => 'text',
                    'label'   => esc_attr__('Section Title', 'themeplate'),
                    'default' => esc_attr__("Default value", "themeplate")
                ),

                'auto_play'       => array(
                    'type'    => 'checkbox',
                    'label'   => __('Auto Play On/Off', 'themeplate'),
                    'default' => true
                ),
                'auto_play_speed' => array(
                    'type'    => 'slider',
                    'label'   => __('Auto Play Speed', 'themeplat'),
                    'default' => 3000,
                    'min'     => 1000,
                    'max'     => 5000,
                    'integer' => true
                ),
            ),
            TP_THEME_DIR . 'inc/widgets/testimonial'
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

function thim_testimonial_register_widget()
{
    register_widget('Thim_Testimonial_Widget');
}

add_action('widgets_init', 'thim_testimonial_register_widget');