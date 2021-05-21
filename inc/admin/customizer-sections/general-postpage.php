<?php

TRT_Kirki::add_section('display_postpage',
    array(
        'title'    => 'Post & Page',
        'panel'    => 'general',
        'priority' => 4,
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_single_layout',
        'type'     => 'radio-image',
        'label'    => esc_html__('Single & Page Layout', 'themeplate'),
        'tooltip'  => esc_html__('Single & Page layout setting.', 'themeplate'),
        'section'  => 'display_postpage',
        'choices'  => array(
            'full-content'  => TP_THEME_URI . 'assets/images/admin/layout/body-full.png',
            'sidebar-left'  => TP_THEME_URI . 'assets/images/admin/layout/sidebar-left.png',
            'sidebar-right' => TP_THEME_URI . 'assets/images/admin/layout/sidebar-right.png'
        ),
        'default'  => 'full-content'
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_single_hide_title',
        'type'     => 'switch',
        'section'  => 'display_postpage',
        'label'    => esc_html__('Hide Title', 'themeplate'),
        'tooltip'  => esc_html__('Hide title setting.', 'themeplate'),
        'default'  => false,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'thim_top_section_hide',
		'type'     => 'switch',
		'section'  => 'display_postpage',
		'label'    => esc_html__('Hide Top Banner Image Section', 'themeplate'),
		'tooltip'  => esc_html__('Hide Top Banner Image Section', 'themeplate'),
		'default'  => false,
		'choices'  => array(
			true  => esc_html__('On', 'themeplate'),
			false => esc_html__('Off', 'themeplate'),
		),
	)
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_archive_single_top_image',
        'type'      => 'upload',
        'label'     => esc_html__('Top Image', 'themeplate'),
        'tooltip'   => esc_html__('Top image for page and post setting.', 'themeplate'),
        'section'   => 'display_postpage',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => '.top_site_main',
                'property' => 'background-image',
            ),
        ),
        'default'   => TP_THEME_URI . 'assets/images/bg-blog.jpg'
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'thim_archive_single_heading_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Background Heading Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting heading background color post and page.', 'themeplate'),
        'section'   => 'display_postpage',
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
        'settings'  => 'thim_archive_single_heading_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Heading Color', 'themeplate'),
        'tooltip'   => esc_html__('Setting heading text color setting.', 'themeplate'),
        'section'   => 'display_postpage',
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
        'settings' => 'thim_archive_single_title',
        'type'     => 'text',
        'label'    => esc_html__('Custom Title', 'themeplate'),
        'tooltip'  => esc_html__('Enter your custom tile page and post.', 'themeplate'),
        'section'  => 'display_postpage',
        'default'  => ' ',
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_archive_single_sub_title',
        'type'     => 'text',
        'label'    => esc_html__('Custom Sub Title', 'themeplate'),
        'tooltip'  => esc_html__('Enter your custom sub tile page and post.', 'themeplate'),
        'section'  => 'display_postpage',
        'default'  => ' ',
    )
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'top_header_banner_info',
		'type'     => 'switch',
		'section'  => 'display_postpage',
		'label'    => esc_html__('Show Banner Icon Box', 'themeplate'),
		'tooltip'  => esc_html__('Show Banner Icon Box', 'themeplate'),
		'default'  => false,
		'choices'  => array(
			true  => esc_html__('On', 'themeplate'),
			false => esc_html__('Off', 'themeplate'),
		),
	)
);


//TRT_Kirki::add_field('trt_opt',
//	array(
//		'settings' => 'top_header_banner_title_hide',
//		'type'     => 'switch',
//		'section'  => 'display_postpage',
//		'label'    => esc_html__('Hide Banner Title', 'themeplate'),
//		'tooltip'  => esc_html__('Hide Banner Title', 'themeplate'),
//		'default'  => true,
//		'choices'  => array(
//			true  => esc_html__('On', 'themeplate'),
//			false => esc_html__('Off', 'themeplate'),
//		),
//	)
//);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_single_show_category',
        'type'     => 'switch',
        'section'  => 'display_postpage',
        'label'    => esc_html__('Show Category', 'themeplate'),
        'tooltip'  => esc_html__('Show category setting.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_single_show_date',
        'type'     => 'switch',
        'section'  => 'display_postpage',
        'label'    => esc_html__('Show Date', 'themeplate'),
        'tooltip'  => esc_html__('Show date setting.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_single_show_author',
        'type'     => 'switch',
        'section'  => 'display_postpage',
        'label'    => esc_html__('Show Author', 'themeplate'),
        'tooltip'  => esc_html__('Show author setting.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'thim_single_show_comment',
        'type'     => 'switch',
        'section'  => 'display_postpage',
        'label'    => esc_html__('Show Comment', 'themeplate'),
        'tooltip'  => esc_html__('Show comment setting.', 'themeplate'),
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);
