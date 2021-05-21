<?php

TRT_Kirki::add_section('display_front_page',
    array(
        'title'    => esc_html__('Blog Page', 'themeplate'),
        'panel'    => 'general',
        'priority' => 2,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_front_page_cate_layout',
        'type'     => 'radio-image',
        'label'    => esc_html__('Layout', 'themeplate'),
        'tooltip'  => esc_html__('Blog page layout setting.', 'themeplate'),
        'section'  => 'display_front_page',
        'choices'  => array(
            'full-content'  => TP_THEME_URI . 'assets/images/admin/layout/body-full.png',
            'sidebar-left'  => TP_THEME_URI . 'assets/images/admin/layout/sidebar-left.png',
            'sidebar-right' => TP_THEME_URI . 'assets/images/admin/layout/sidebar-right.png'
        ),
        'default'  => 'sidebar-right'
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_front_page_hide_title',
        'type'     => 'switch',
        'section'  => 'display_front_page',
        'label'    => esc_html__('Hide Title', 'themeplate'),
        'tooltip'  => esc_html__('Hide title blog page setting.', 'themeplate'),
        'default'  => false,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_front_page_top_image',
        'type'     => 'upload',
        'label'    => esc_html__('Top Image', 'themeplate'),
        'tooltip'  => esc_html__('Select top image for blog page.', 'themeplate'),
        'section'  => 'display_front_page',
        'output'  => array(
            array(
                'element'  => '.top_site_main',
                'property' => 'background-image',
            ),
        ),
        'default'  => TP_THEME_URI . 'assets/images/bg-blog.jpg',
    ));

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_front_page_heading_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Heading Background Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting background color top heading blog page.', 'themeplate'),
        'section'   => 'display_front_page',
        'default'   => '#ffffff',
        'transport' => 'auto',
        'output'   => array(
            array(
                'element'  => '.top_site_main.images_parallax:before',
                'property' => 'background-color',
            ),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_front_page_heading_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Heading Text Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting color top heading blog page.', 'themeplate'),
        'section'   => 'display_front_page',
        'default'   => '#ffffff',
        'transport' => 'auto',
        'output'   => array(
            array(
                'element'  => '.top_site_main .page-title-wrapper .banner-wrapper .heading__secondary',
                'property' => 'color',
            ),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_front_page_custom_title',
        'type'     => 'text',
        'label'    => esc_html__('Custom Title', 'themeplate'),
        'tooltip'  => esc_html__('Enter blog page custom title.', 'themeplate'),
        'section'  => 'display_front_page',
        'default'  => '',
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_front_page_sub_title',
        'type'     => 'text',
        'label'    => esc_html__('Sub Title', 'themeplate'),
        'tooltip'  => esc_html__('Enter blog page sub title.', 'themeplate'),
        'section'  => 'display_front_page',
        'default'  => '',
    )
);
