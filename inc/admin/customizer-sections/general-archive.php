<?php

TRT_Kirki::add_section('display_archive',
    array(
        'title'    => esc_html__('Archive', 'themeplate'),
        'panel'    => 'general',
        'priority' => 3,
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_cate_layout',
        'type'     => 'radio-image',
        'label'    => esc_html__('Archive Layout', 'themeplate'),
        'tooltip'  => esc_html__('Archive layout select.', 'themeplate'),
        'section'  => 'display_archive',
        'choices'  => array(
            'full-content'  => TP_THEME_URI . 'assets/images/admin/layout/body-full.png',
            'sidebar-left'  => TP_THEME_URI . 'assets/images/admin/layout/sidebar-left.png',
            'sidebar-right' => TP_THEME_URI . 'assets/images/admin/layout/sidebar-right.png'
        ),
        'default'  => 'sidebar-right',
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_cate_hide_title',
        'type'     => 'switch',
        'label'    => esc_html__('Archive Hide Title', 'themeplate'),
        'tooltip'  => esc_html__('Archive hiden title setting.', 'themeplate'),
        'section'  => 'display_archive',
        'default'  => false,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_cate_top_image',
        'type'     => 'kirki-upload',
        'label'    => esc_html__('Archive Top Image', 'themeplate'),
        'tooltip'  => esc_html__('Select archive top image.', 'themeplate'),
        'section'  => 'display_archive',
        'js_vars'  => array(
            array(
                'element'  => '.top_site_main',
                'function' => 'css',
                'property' => 'background-image',
            ),
        ),
        'default'  => TP_THEME_URI . 'assets/images/bg-blog.jpg',
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_archive_cate_heading_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Archive Heading Background Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting archive heading background color.', 'themeplate'),
        'section'   => 'display_archive',
        'default'   => '#ffffff',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '.top_site_main.images_parallax:before',
                'property' => 'background-color',
            ),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_archive_cate_heading_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Archive Heading Text Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting archive heading text color.', 'themeplate'),
        'section'   => 'display_archive',
        'default'   => '#ffffff',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '.top_site_main .page-title-wrapper .banner-wrapper .heading__secondary',
                'property' => 'color',
            ),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_cate_sub_title',
        'type'     => 'text',
        'label'    => esc_html__('Archive Sub Title', 'themeplate'),
        'tooltip'  => esc_html__('Archive sub title setting.', 'themeplate'),
        'default'  => '',
        'section'  => 'display_archive',
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_excerpt_length',
        'type'     => 'number',
        'label'    => esc_html__('Archive Excerpt Length', 'themeplate'),
        'tooltip'  => esc_html__('Enter the number of words you want to cut from the content to be the excerpt of archive page.', 'themeplate'),
        'default'  => '20',
        'section'  => 'display_archive',
        'choices'  => array(
            'max'  => 100,
            'min'  => 10,
            'step' => 10
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_show_read_more',
        'type'     => 'switch',
        'label'    => esc_html__('Show Read More', 'themeplate'),
        'tooltip'  => esc_html__('Show read more setting.', 'themeplate'),
        'section'  => 'display_archive',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_show_category',
        'type'     => 'switch',
        'label'    => esc_html__('Show Category', 'themeplate'),
        'tooltip'  => esc_html__('Show category setting.', 'themeplate'),
        'section'  => 'display_archive',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_show_author',
        'type'     => 'switch',
        'label'    => esc_html__('Show Author', 'themeplate'),
        'tooltip'  => esc_html__('Show author setting.', 'themeplate'),
        'section'  => 'display_archive',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_show_comment',
        'type'     => 'switch',
        'label'    => esc_html__('Show Comment', 'themeplate'),
        'tooltip'  => esc_html__('Show comment setting.', 'themeplate'),
        'section'  => 'display_archive',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_show_date',
        'type'     => 'switch',
        'section'  => 'display_archive',
        'label'    => esc_html__('Show Date', 'themeplate'),
        'tooltip'  => esc_html__('Show date setting.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);