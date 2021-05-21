<?php
TRT_Kirki::add_section('display_header_settings',
    array(
        'title'    => esc_html__('Header', 'themeplate'),
        'panel'    => 'header',
        'priority' => 2,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'header_style',
        'type'     => 'radio-image',
        'label'    => esc_html__('Select a Layout', 'themeplate'),
        'tooltip'  => esc_html__('Select a Layout for header', 'themeplate'),
        'section'  => 'display_header_settings',
        'choices'  => array(
            'header_v1' => TP_THEME_URI . 'assets/images/admin/header/header_v1.jpg',
            'header_v2' => TP_THEME_URI . 'assets/images/admin/header/header_v2.jpg',
            'header_v3' => TP_THEME_URI . 'assets/images/admin/header/header_v3.jpg',
            'header_v4' => TP_THEME_URI . 'assets/images/admin/header/header_v4.jpg',
        ),
        'default'  => 'header_v1',
    )
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'header_position',
        'type'     => 'switch',
        'label'    => esc_html__('Header Overlay', 'themeplate'),
        'tooltip'  => esc_html__('Turn On/Off header overlay.', 'themeplate'),
        'section'  => 'display_header_settings',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt', [
    'type'     => 'color',
    'settings' => 'header_bg_color',
    'label'    => esc_html__('Header Background', 'themeplate'),
    'tooltip'  => esc_html__('Background color for header.', 'themeplate'),
    'section'  => 'display_header_settings',
    'default'  => '#0088CC',
    'output'   => array(
        array(
            'element'  => 'header.site-header, .menu_v4_wrapper .navbar-toggle',
            'property' => 'background-color',
        )
    )
]);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'header_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Header Text Color', 'themeplate'),
        'tooltip'   => esc_html__('Text color for header version 2.', 'themeplate'),
        'section'   => 'display_header_settings',
        'default'   => '#ffffff',
        'transport' => 'auto',
        'output'    => array(
            array(
                'element'  => 'header.site-header p, header.site-header b, header.site-header a',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'header_text_color_hover',
        'type'      => 'color',
        'label'     => esc_html__('Header Color Hover', 'themeplate'),
        'tooltip'   => esc_html__('Header color hover for header version 2.', 'themeplate'),
        'section'   => 'display_header_settings',
        'default'   => '#2eb0d1',
        'transport' => 'auto',
        'choices'   => array( 'alpha' => true ),
        'output'    => array(
            array(
                'element'  => 'header.site-header p, header.site-header b, header.site-header a:hover',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'header_typography',
        'type'      => 'typography',
        'label'     => esc_html__('Fonts', 'themeplate'),
        'tooltip'   => esc_html__('Allows you to select all font font properties for header. ', 'themeplate'),
        'section'   => 'display_header_settings',
        'default'   => array(
            'font-family' => 'Roboto',
            'variant'     => '700',
            'font-size'   => '13px',
        ),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'font-family',
                'element'  => 'header.site-header p, header.site-header b, header.site-header a',
                'property' => 'font-family',
            ),
            array(
                'choice'   => 'variant',
                'element'  => 'header.site-header p, header.site-header b, header.site-header a',
                'property' => 'font-weight',
            ),
            array(
                'choice'   => 'font-size',
                'element'  => 'header.site-header p, header.site-header b, header.site-header a',
                'property' => 'font-size',
            ),
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'header_search_display',
        'type'     => 'switch',
        'label'    => esc_html__('Header Search Display', 'themeplate'),
        'tooltip'  => esc_html__('Turn On/Off header search display.', 'themeplate'),
        'section'  => 'display_header_settings',
        'default'  => false,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);