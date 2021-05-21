<?php
TRT_Kirki::add_section("display_page_404",
    array(
        'title'    => esc_html__('404', 'themeplate'),
        'panel'    => 'general',
        'priority' => 12,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => '404_top_image',
        'type'      => 'kirki-upload',
        'label'     => esc_html__('Top Image 404', 'themeplate'),
        'tooltip'   => esc_html__('Select top image file for 404.', 'themeplate'),
        'section'   => 'display_page_404',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '.top_site_main',
                'property' => 'background-image',
            ),
        ),
        'default'   => TP_THEME_URI . "assets/images/404.png",
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => '404_heading_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Background Top Heading Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting color top heading 404.', 'themeplate'),
        'section'   => 'display_page_404',
        'default'   => '#181818',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '.top_site_main',
                'property' => 'background-color',
            ),
        ),
    )
);
