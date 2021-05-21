<?php
TRT_Kirki::add_section('display_top_header',
    array(
        'title'    => esc_html__('Toolbar', 'themeplate'),
        'panel'    => 'header',
        'priority' => 3,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'topbar_show',
        'type'     => 'switch',
        'label'    => esc_html__('Show Toolbar', 'themeplate'),
        'tooltip'  => esc_html__('Turn On toolbar header.', 'themeplate'),
        'section'  => 'display_top_header',
        'default'  => true,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'font_size_top_header',
        'label'     => esc_html__('Font size', 'themeplate'),
        'tooltip'   => esc_html__('Input font size toolbar.', 'themeplate'),
        'type'      => 'typography',
        'section'   => 'display_top_header',
        'default'   => array(
            'font-size' => '13px'
        ),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'font-size',
                'element'  => '.top-header',
                'property' => 'font-size',
            ),
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'toolbar_bg_color',
        'type'      => 'color',
        'label'     => esc_html__('Toolbar Background color', 'themeplate'),
        'tooltip'   => esc_html__('Background Color for toolbar header no sticky.', 'themeplate'),
        'section'   => 'display_top_header',
        'default'   => '',
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'color',
                'element'  => '.wrapper-container .content-pusher .toolbar',
                'property' => 'background-color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'toolbar_color',
        'type'      => 'color',
        'label'     => esc_html__('Toolbar color', 'themeplate'),
        'tooltip'   => esc_html__('Color for toolbar header no sticky.', 'themeplate'),
        'section'   => 'display_top_header',
        'default'   => '#ffffff',
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'color',
                'element'  => '.top-header b, .top-header aside, .top-header, .top-header p, .top-header a',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'toolbar_color_hover',
        'type'      => 'color',
        'label'     => esc_html__('Toolbar color hover', 'themeplate'),
        'tooltip'   => esc_html__('Color hover for toolbar header no sticky.', 'themeplate'),
        'section'   => 'display_top_header',
        'default'   => '#4e9db5',
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'    => array(
            array(
                'choice'   => 'color',
                'element'  => '.top-header a:hover, .thim-select-language .language ul li a:hover',
                'property' => 'color',
            )
        )
    )
);