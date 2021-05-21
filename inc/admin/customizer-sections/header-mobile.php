<?php
// main menu
TRT_Kirki::add_section('display_mobile_menu',
    array(
        'title'    => esc_html__('Mobile Menu', 'themeplate'),
        'panel'    => 'header',
        'priority' => 15,
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'icon_mobile_menu_color_background',
        'type'      => 'color',
        'label'     => __('Color Mobile Menu Icon', 'themeplate'),
        'tooltip'   => 'Pick A Color Mobile Menu Icon',
        'default'   => '#ffffff',
        'section'   => 'display_mobile_menu',
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.menu-mobile-effect span',
                'property' => 'background-color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'bg_mobile_menu_color',
        'type'      => 'color',
        'label'     => esc_html__('Background color mobile menu', 'themeplate'),
        'tooltip'   => esc_html__('Pick a background color for mobile menu', 'themeplate'),
        'section'   => 'display_mobile_menu',
        'transport' => 'auto',
        'default'   => '#222222',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.width-navigation',
                'property' => 'background-color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'mobile_menu_text_color',
        'type'      => 'color',
        'label'     => esc_html__('Text color', 'themeplate'),
        'tooltip'   => esc_html__('Pick a text color for mobile menu', 'themeplate'),
        'default'   => '#d8d8d8',
        'section'   => 'display_mobile_menu',
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '.width-navigation ul li a, .width-navigation ul li span',
                'property' => 'color',
            )
        )
    )
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings'  => 'mobile_menu_icon_bar_color',
		'type'      => 'color',
		'label'     => esc_html__('Mobile menu icon bar color', 'themeplate'),
		'tooltip'   => esc_html__('Mobile menu icon bar color', 'themeplate'),
		'default'   => '#000000',
		'section'   => 'display_mobile_menu',
		'transport' => 'auto',
		'output'   => array(
			array(
				'choice'   => 'color',
				'element'  => '#menuToggle .icon-bar',
				'property' => 'background-color',
			)
		)
	)
);


TRT_Kirki::add_field('trt_opt',
    array(
        'settings'  => 'mobile_menu_text_hover_color',
        'type'      => 'color',
        'label'     => esc_html__('Text Hover color', 'themeplate'),
        'tooltip'   => esc_html__('Pick a text hover color for mobile menu', 'themeplate'),
        'default'   => '#2eb0d1',
        'section'   => 'display_mobile_menu',
        'transport' => 'auto',
        'output'   => array(
            array(
                'choice'   => 'color',
                'element'  => '
					.site-header .navbar-nav li:hover > a,
					.site-header .navbar-nav li.current_page_item > a,
					.site-header .navbar-nav li.current-menu-ancestor > a,
					.site-header .navbar-nav li:hover > a > span,
					.site-header .navbar-nav li.current_page_item > a > span,
					.site-header .navbar-nav li.current-menu-ancestor > a > span',
                'property' => 'color',
            )
        )
    )
);
