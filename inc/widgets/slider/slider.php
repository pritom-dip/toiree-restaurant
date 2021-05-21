<?php

class Slider_Widget extends Thim_Widget
{
    function __construct()
    {
        parent::__construct(
            'slider',
            esc_attr__('TT: Slider', 'themeplate'),
            array(
                'description'   => esc_attr__('Add slider', 'themeplate'),
                'help'          => '',
                'panels_groups' => array('thim_widget_group'),
            ),
            array(),
            array(
                'style'               => array(
                    "type"          => "select",
                    "label"         => esc_attr__("Style Carousel", "themeplate"),
                    "default"       => "base",
                    "options"       => array(
                        "base"      => esc_attr__("Style One", "themeplate"),
                        "style_new" => esc_attr__("Style Two", "themeplate")
                    ),
                    "description"   => esc_attr__("Select style slider.", "themeplate"),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array('style')
                    )
                ),
                'sliders'             => array(
                    'type'      => 'repeater',
                    'label'     => esc_attr__('Items', 'themeplate'),
                    'item_name' => esc_attr__('Item', 'themeplate'),
                    'fields'    => array(
                        'image' => array(
                            'type'        => 'media',
                            'label'       => esc_attr__('Image', 'themeplate'),
                            'description' => esc_attr__('Select image from media library.', 'themeplate')
                        ),

                        'title'           => array(
                            'type'    => 'text',
                            'label'   => esc_attr__('Title', 'themeplate'),
                            'default' => esc_attr__("Default value", "themeplate"),
                        ),
                        'subtitle'        => array(
                            'type'          => 'text',
                            'label'         => esc_attr__('Sub Title', 'themeplate'),
                            'default'       => esc_attr__("Default value", "themeplate"),
                            'state_handler' => array(
                                'style[base]'      => array('hide'),
                                'style[style_new]' => array('show'),
                            ),
                        ),
                        'description'     => array(
                            'type'    => 'textarea',
                            'label'   => esc_attr__('Description', 'themeplate'),
                            'default' => esc_attr__("Default value", "themeplate"),
                        ),
                        'button_text'     => array(
                            "type"    => "text",
                            "label"   => esc_attr__("Button Text", "themeplate"),
                            "default" => "Default Text",
                        ),
                        'button_bg_color' => array(
                            'type'    => 'color',
                            'label'   => __('Button Background Color', 'themeplate'),
                            'default' => '#a94442'
                        ),
                        'link'            => array(
                            "type"    => "text",
                            "label"   => esc_attr__("Link", "themeplate"),
                            "default" => "#",
                        ),
                        /* 'info_sale'       => array(
                             "type"    => "text",
                             "label"   => esc_attr__("Info Sale", "themeplate"),
                             "default" => "40% Off",
                         ),
                         'price'           => array(
                             "type"        => "text",
                             "label"       => esc_attr__("Price", "themeplate"),
                             "description" => esc_attr__("Price and Currency symbol per night", "themeplate"),
                             "default"     => "$300",
                         ),*/
                    ),
                ),
                'font_heading'        => array(
                    "type"          => "select",
                    "label"         => esc_attr__("Font Title and description", "themeplate"),
                    "default"       => "default",
                    "options"       => array(
                        "default" => esc_attr__("Default", "themeplate"),
                        "custom"  => esc_attr__("Custom", "themeplate")
                    ),
                    "description"   => esc_attr__("Select Font heading.", "themeplate"),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array('font_heading_type')
                    )
                ),
                'custom_font_heading' => array(
                    'type'          => 'section',
                    'label'         => esc_attr__('Custom Font For Title', 'themeplate'),
                    'hide'          => true,
                    'state_handler' => array(
                        'font_heading_type[custom]'  => array('show'),
                        'font_heading_type[default]' => array('hide'),
                    ),
                    'fields'        => array(
                        'custom_font_size'   => array(
                            "type"        => "number",
                            "label"       => esc_attr__("Font Size", "themeplate"),
                            "suffix"      => "px",
                            "default"     => "14",
                            "description" => esc_attr__("custom font size", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'custom_font_weight' => array(
                            "type"        => "select",
                            "label"       => esc_attr__("Custom Font Weight", "themeplate"),
                            "options"     => array(
                                "normal" => esc_attr__("Normal", "themeplate"),
                                "bold"   => esc_attr__("Bold", "themeplate"),
                                "100"    => esc_attr__("100", "themeplate"),
                                "200"    => esc_attr__("200", "themeplate"),
                                "300"    => esc_attr__("300", "themeplate"),
                                "400"    => esc_attr__("400", "themeplate"),
                                "500"    => esc_attr__("500", "themeplate"),
                                "600"    => esc_attr__("600", "themeplate"),
                                "700"    => esc_attr__("700", "themeplate"),
                                "800"    => esc_attr__("800", "themeplate"),
                                "900"    => esc_attr__("900", "themeplate")
                            ),
                            "description" => esc_attr__("Select Custom Font Weight", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'custom_font_style'  => array(
                            "type"        => "select",
                            "label"       => esc_attr__("Custom Font Style", "themeplate"),
                            "options"     => array(
                                "inherit" => esc_attr__("inherit", "themeplate"),
                                "initial" => esc_attr__("initial", "themeplate"),
                                "italic"  => esc_attr__("italic", "themeplate"),
                                "normal"  => esc_attr__("normal", "themeplate"),
                                "oblique" => esc_attr__("oblique", "themeplate")
                            ),
                            "description" => esc_attr__("Select Custom Font Style", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'title_text_color'   => array(
                            'type'    => 'color',
                            'label'   => __('Text Color', 'themeplate'),
                            'default' => '#ffffff'
                        ),

                    ),
                ),

                'custom_details_font_heading' => array(
                    'type'          => 'section',
                    'label'         => esc_attr__('Custom Font For Description', 'themeplate'),
                    'hide'          => true,
                    'state_handler' => array(
                        'font_heading_type[custom]'  => array('show'),
                        'font_heading_type[default]' => array('hide'),
                    ),
                    'fields'        => array(
                        'custom_font_size'   => array(
                            "type"        => "number",
                            "label"       => esc_attr__("Font Size", "themeplate"),
                            "suffix"      => "px",
                            "default"     => "14",
                            "description" => esc_attr__("custom font size", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'custom_font_weight' => array(
                            "type"        => "select",
                            "label"       => esc_attr__("Custom Font Weight", "themeplate"),
                            "options"     => array(
                                "normal" => esc_attr__("Normal", "themeplate"),
                                "bold"   => esc_attr__("Bold", "themeplate"),
                                "100"    => esc_attr__("100", "themeplate"),
                                "200"    => esc_attr__("200", "themeplate"),
                                "300"    => esc_attr__("300", "themeplate"),
                                "400"    => esc_attr__("400", "themeplate"),
                                "500"    => esc_attr__("500", "themeplate"),
                                "600"    => esc_attr__("600", "themeplate"),
                                "700"    => esc_attr__("700", "themeplate"),
                                "800"    => esc_attr__("800", "themeplate"),
                                "900"    => esc_attr__("900", "themeplate")
                            ),
                            "description" => esc_attr__("Select Custom Font Weight", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'custom_font_style'  => array(
                            "type"        => "select",
                            "label"       => esc_attr__("Custom Font Style", "themeplate"),
                            "options"     => array(
                                "inherit" => esc_attr__("inherit", "themeplate"),
                                "initial" => esc_attr__("initial", "themeplate"),
                                "italic"  => esc_attr__("italic", "themeplate"),
                                "normal"  => esc_attr__("normal", "themeplate"),
                                "oblique" => esc_attr__("oblique", "themeplate")
                            ),
                            "description" => esc_attr__("Select Custom Font Style", "themeplate"),
                            "class"       => "color-mini",
                        ),
                        'title_text_color'   => array(
                            'type'    => 'color',
                            'label'   => __('Text Color', 'themeplate'),
                            'default' => '#ffffff'
                        ),

                    ),
                ),
                'auto_play'                   => array(
                    'type'    => 'checkbox',
                    'label'   => __('Auto Play On/Off', 'themeplate'),
                    'default' => true
                ),
                'auto_play_speed'             => array(
                    'type'    => 'slider',
                    'label'   => __('Auto Play Speed', 'themeplat'),
                    'default' => 3000,
                    'min'     => 1000,
                    'max'     => 5000,
                    'integer' => true
                ),

                'caption_position' => array(
                    'type'    => 'select',
                    'label'   => __('Caption position', 'themeplate'),
                    "default" => "right",
                    "options" => array(
                        "right"  => esc_attr__("Right", "themeplate"),
                        "left"   => esc_attr__("Left", "themeplate"),
                        "center" => esc_attr__("Center", "themeplate")
                    ),
                ),

                'caption_bg_opacity' => array(
                    'type'    => 'slider',
                    'label'   => __('Caption Background Opacity', 'themeplat'),
                    'default' => 5,
                    'min'     => 1,
                    'max'     => 9,
                    'float'   => true
                ),

                'caption_bg_color' => array(
                    'type'    => 'color',
                    'label'   => __('Caption Background Color', 'themeplate'),
                    'default' => '#a94442'
                )


            ),
            TP_THEME_DIR . 'inc/widgets/slider/'
        );
    }

    /**
     * Initialize the CTA widget
     */

    function get_template_name($instance)
    {
        return isset($instance['style']) ? $instance['style'] : 'base';
    }

    function get_style_name($instance)
    {
        return false;
    }
}

function thim_sliders_register_widget()
{
    register_widget('Slider_Widget');
}

add_action('widgets_init', 'thim_sliders_register_widget');