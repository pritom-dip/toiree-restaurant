<?php
// main menu
TRT_Kirki::add_section('display_main_menu',
	array(
		'title' => esc_html__('Main Menu', 'themeplate'),
		'panel' => 'header',
		'priority' => 5,
	)
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'single_page_main_nav',
		'type' => 'switch',
		'label' => esc_html__('Single Page Main Menu', 'themeplate'),
		'tooltip' => esc_html__('Turn On/Off Single Page Main Menu Onclick Section scrolling.', 'themeplate'),
		'section' => 'display_main_menu',
		'default' => false,
		'priority' => 3,
		'choices' => array(
			true => esc_html__('On', 'themeplate'),
			false => esc_html__('Off', 'themeplate'),
		),
	)
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'bg_main_menu_color',
		'type' => 'color',
		'label' => esc_html__('Background color', 'themeplate'),
		'tooltip' => esc_html__('Pick a background color for main menu. It is working only header 2.', 'themeplate'),
		'section' => 'display_main_menu',
		'default' => '#ffffff',
		'transport' => 'auto',
		'output' => array(
			array(
				'element' => '.width-navigation .navbar-nav,.header_v4 .menu_v4_wrapper .tm-flex',
				'property' => 'background-color',
			)
		)
	)
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'main_menu_text_color',
		'type' => 'color',
		'label' => esc_html__('Text color', 'themeplate'),
		'tooltip' => esc_html__('Pick a text color for main menu', 'themeplate'),
		'section' => 'display_main_menu',
		'transport' => 'auto',
		'default' => '#ffffff',
		'output' => array(
			array(
				'choice' => 'color',
				'element' => '
					.width-navigation .navbar-nav li  a,
					.width-navigation .navbar-nav li span,
                    ul.navbar-nav > li > a,
                    ul.navbar-nav > li > span',
				'property' => 'color',
			)
		)
	)
);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'main_menu_text_hover_color',
		'type' => 'color',
		'label' => esc_html__('Text Hover color', 'themeplate'),
		'tooltip' => esc_html__('Pick a text hover color for main menu', 'themeplate'),
		'section' => 'display_main_menu',
		'transport' => 'auto',
		'default' => '#2eb0d1',
		'output' => array(
			array(
				'choice' => 'color',
				'element' => '
					.navigation .navbar-nav > li.current-menu-item > a,
					.navigation .navbar-nav > li:hover > a,
					.navigation .navbar-nav > li.current-menu-item > span,
				    .navigation .navbar-nav > li:hover > span',
				'property' => 'color',
			)
		)
	)
);


TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'main_menu_text_hover_border_bc',
		'type' => 'color',
		'label' => esc_html__('Hover border bottom color', 'themeplate'),
		'tooltip' => esc_html__('Pick a text hover color for main menu', 'themeplate'),
		'section' => 'display_main_menu',
		'transport' => 'auto',
		'default' => '#2eb0d1',
		'output' => array(
			array(
				'choice' => 'color',
				'element' => '
					 .wrapper-header_v1 ul.navbar-nav .menu-item a:hover,
					 .wrapper-header_v2 ul.navbar-nav .menu-item a:hover,
					 .wrapper-header_v3 ul.navbar-nav .menu-item a:hover,
					 .wrapper-header_v4 ul.navbar-nav .menu-item a:hover',
				'property' => 'border-bottom-color',
			)
		)
	)
);

TRT_Kirki::add_field('trt_opt', [
	'type' => 'background',
	'settings' => 'background_setting_opacity',
	'label' => esc_html__('Menu Background Control for header version 4', 'themeplate'),
	'tooltip' => esc_html__('Menu Background Control for header version 4', 'themeplate'),
	'section' => 'display_main_menu',
	'default' => [
		'background-color' => 'rgba(20,20,20,.8)',
//		'background-image' => '',
//		'background-repeat' => 'repeat',
//		'background-position' => 'center center',
//		'background-size' => 'cover',
//		'background-attachment' => 'scroll',
	],
	'transport' => 'auto',
	'output' => [
		[
			'element' => '.width-navigation .navbar-nav, .header_v4 .menu_v4_wrapper .tm-flex',
		],
	],
]);

TRT_Kirki::add_field('trt_opt',
	array(
		'settings' => 'main_menu',
		'type' => 'typography',
		'label' => esc_html__('Fonts Main Menu', 'themeplate'),
		'tooltip' => esc_html__('Allows you to select all font font properties for main menu. ', 'themeplate'),
		'section' => 'display_main_menu',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '13px',
			'line-height' => '2.33em',
			'text-transform' => 'uppercase',
		),
		'transport' => 'auto',
		'output' => array(
			array(
				'choice' => 'font-family',
				'element' => '
					.navigation .navbar-nav > li > a,
					.navigation .navbar-nav > li > span',
				'property' => 'font-family',
			),
			array(
				'choice' => 'variant',
				'element' => '
					.navigation .navbar-nav > li > a,
					.navigation .navbar-nav > li > span',
				'property' => 'font-weight',
			),
			array(
				'choice' => 'font-size',
				'element' => '
					.navigation .navbar-nav > li > a,
					.navigation .navbar-nav > li > span',
				'property' => 'font-size',
			),
			array(
				'choice' => 'line-height',
				'element' => '
					.navigation .navbar-nav > li > a,
					.navigation .navbar-nav > li > span',
				'property' => 'line-height',
			),
			array(
				'choice' => 'text-transform',
				'element' => '
					.navigation .navbar-nav > li > a,
					.navigation .navbar-nav > li > span',
				'property' => 'text-transform',
			),
		)
	)
);
