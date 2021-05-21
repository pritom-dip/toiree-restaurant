<?php

// header Options
TRT_Kirki::add_section('display_header_menu',
    array(
        'title'    => esc_html__('Sticky Menu', 'themeplate'),
        'panel'    => 'header',
        'priority' => 14,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'header_sticky',
        'type'     => 'switch',
        'label'    => esc_html__('Menu Sticky', 'themeplate'),
        'tooltip'  => esc_html__('Turn On/Off menu sticky when up scroll mouse.', 'themeplate'),
        'section'  => 'display_header_menu',
        'default'  => true,
        'priority' => 3,
        'choices'  => array(
            true  => esc_html__('On', 'themeplate'),
            false => esc_html__('Off', 'themeplate'),
        ),
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'config_att_sticky',
        'type'     => 'select',
        'label'    => esc_html__('Config Sticky Menu?', 'themeplate'),
        'tooltip'  => 'Select style menu',
        'section'  => 'display_header_menu',
        'choices'  => array(
            'sticky_same'   => esc_html__('The same with main menu', 'themeplate'),
            'sticky_custom' => esc_html__('Custom', 'themeplate')
        ),
        'default'  => 'sticky_custom'
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'sticky_bg_main_menu_color',
        'type'      => 'color',
        'label'     => esc_html__('Header Sticky Background', 'themeplate'),
        'tooltip'   => esc_html__('Background color for menu sticky.', 'themeplate'),
        'section'   => 'display_header_menu',
        'default'   => '#ffffff',
        'priority'  => 4,
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.sticky-header-show',
                'property' => 'background-color',
				'units'   => '', //use to append px, %, etc
				'suffix'   => ' !important'
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'sticky_main_menu_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Header Text/Link Color', 'themeplate'),
        'tooltip'   => esc_html__('Header text color for menu sticky.', 'themeplate'),
        'section'   => 'display_header_menu',
        'default'   => '#2a2a2a',
        'priority'  => 5,
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '
					.bg-custom-sticky.affix .navbar-nav > li > a,
					.bg-custom-sticky.affix .navbar-nav > li > span',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'sticky_main_menu_text_hover_color',
        'type'      => 'color',
        'label'     => esc_html__('Header Text/Link Color Hover', 'themeplate'),
        'tooltip'   => esc_html__('Header text color for menu sticky hover.', 'themeplate'),
        'section'   => 'display_header_menu',
        'default'   => '#2eb0d1',
        'priority'  => 6,
        'choices'   => array('alpha' => true),
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '
					.bg-custom-sticky.affix .navbar-nav > li.current-menu-item > a span,
					.bg-custom-sticky.affix .navbar-nav > li .current-menu-ancestor > a span,
					.bg-custom-sticky.affix .navbar-nav > li:hover > a span,
					.bg-custom-sticky.affix .navbar-nav > li.current-menu-item > span span,
					.bg-custom-sticky.affix .navbar-nav > li .current-menu-ancestor > span span,
					.bg-custom-sticky.affix .navbar-nav > li:hover > span span',
                'property' => 'color',
            )
        )
    )
);
