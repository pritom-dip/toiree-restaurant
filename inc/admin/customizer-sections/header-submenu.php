<?php
// main menu

TRT_Kirki::add_section('display_sub_menu',
    array(
        'title'    => esc_html__('Sub Menu', 'themeplate'),
        'panel'    => 'header',
        'priority' => 6,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'sub_menu_bg_color',
        'type'     => 'color',
        'label'    => esc_html__('Header Background Sub Menu', 'themeplate'),
        'tooltip'  => esc_html__('Background color for sub menu.', 'themeplate'),
        'section'  => 'display_sub_menu',
        'default'  => '#ffffff',
        'priority' => 5,
        'choices'  => array('alpha' => true),
        'auto'     => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.navigation .navbar-nav li.tc-menu-layout-default .sub-menu,
                ul.navbar-nav ul.sub-menu',
                'property' => 'background-color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(

        'settings' => 'sub_menu_border_color',
        'type'     => 'color',
        'label'    => esc_html__('Color Border Bottom', 'themeplate'),
        'tooltip'  => esc_html__('Color Border Bottom for sub menu.', 'themeplate'),
        'section'  => 'display_sub_menu',
        'default'  => '#dddddd',
        'priority' => 5,
        'choices'  => array('alpha' => true),
        'auto'     => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.navigation .navbar-nav li.tc-menu-layout-default .sub-menu li:after',
                'property' => 'background-color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'sub_menu_text_color',
        'type'     => 'color',
        'label'    => esc_html__('Text/Link Color Sub Menu', 'themeplate'),
        'tooltip'  => esc_html__('Text color for sub menu.', 'themeplate'),
        'section'  => 'display_sub_menu',
        'default'  => '#666666',
        'priority' => 6,
        'choices'  => array('alpha' => true),
        'auto'     => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '
					.navigation .navbar-nav > li .sub-menu a,
					.navigation .navbar-nav > li .sub-menu span,
                    ul.navbar-nav ul.sub-menu li a',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings' => 'sub_menu_text_color_hover',
        'type'     => 'color',
        'label'    => esc_html__('Text/Link Sub Menu Color Hover', 'themeplate'),
        'tooltip'  => esc_html__('Text color for sub menu hover.', 'themeplate'),
        'section'  => 'display_sub_menu',
        'default'  => '#2eb0d1',
        'priority' => 7,
        'choices'  => array('alpha' => true),
        'auto'     => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '
					.navigation .navbar-nav > li .sub-menu li:hover a,
					.navigation .navbar-nav > li .sub-menu li:hover span,
                    ul.navbar-nav ul.sub-menu li a:hover,
                    ul.navbar-nav ul.sub-menu li span:hover',
                'property' => 'color',
            )
        )
    )
);