<?php

/**
 * Class TRT_Customize_Options
 */
class TRT_Customize_Options
{
    /**
     * TRT_Customize_Options constructor.
     */
    public function __construct()
    {
        add_action('customize_register', array($this, 'trt_deregister'));
        add_action('init', array($this, 'trt_create_customize_options'));
    }

    /**
     * Deregister customize default unnecessary
     *
     * @param $wp_customize
     */
    public function trt_deregister($wp_customize)
    {
        $wp_customize->remove_section('colors');
        $wp_customize->remove_section('background_image');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_control('blogdescription');
        $wp_customize->remove_control('blogname');
        $wp_customize->remove_control('display_header_text');
        $wp_customize->remove_section('static_front_page');
        // Rename existing section
        $wp_customize->add_section('title_tagline', array(
            'title' => esc_html__('Logo', 'sailing'),
            'panel' => 'general',
            'priority' => 1,
        ));
    }

    /**
     * Create customize
     *
     * @param $wp_customize
     */
    public function trt_create_customize_options($wp_customize)
    {
        //	Auto include sections
        foreach (glob(TP_THEME_DIR . "inc/admin/customizer-sections/*.php") as $file) {
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}

new TRT_Customize_Options();