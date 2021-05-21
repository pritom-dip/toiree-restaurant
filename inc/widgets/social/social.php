<?php

class Thim_Social_Widget extends Thim_Widget
{

    function __construct()
    {

        parent::__construct(
            'social',
            esc_attr__('TT: Social Links', 'themeplate'),
            array(
                'description'   => esc_attr__('Social Links', 'themeplate'),
                'help'          => '',
                'panels_groups' => array('thim_widget_group'),
            ),
            array(),
            array(

                'title' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Title', 'themeplate')
                ),

                'link_twitter' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Twitter Url', 'themeplate'),
                ),

                'link_face' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Facebook Url', 'themeplate'),
                ),

                'link_instagram' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Instagram Url', 'themeplate'),
                ),

                'link_tripadvisor' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Tripadvisor Url', 'themeplate'),
                ),

                'link_pinterest' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Pinterest Url', 'themeplate'),
                ),

                'link_youtube' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Youtube Url', 'themeplate'),

                ),

                'link_yelp' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Yelp Url', 'themeplate'),
                ),

                'link_foursquare' => array(
                    'type'  => 'text',
                    'label' => esc_attr__('Foursquare Url', 'themeplate'),
                ),


                'link_target' => array(
                    'type'    => 'select',
                    'label'   => esc_attr__('Link Target', 'themeplate'),
                    'options' => array(
                        '_self'  => esc_attr__('Same window', 'themeplate'),
                        '_blank' => esc_attr__('New window', 'themeplate'),
                    ),
                ),


            ),
            TP_THEME_DIR . 'inc/widgets/social/'
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

function thim_social_register_widget()
{
    register_widget('Thim_Social_Widget');
}

add_action('widgets_init', 'thim_social_register_widget');