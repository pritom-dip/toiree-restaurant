<?php

/*
Widget Name: Menu Widget
Author: Pritom Chowdhury Dip
*/

class Menu_Widget extends Thim_Widget
{
	function __construct()
	{
		parent::__construct(
			'menu',
			esc_attr__('TT: Menu', 'themeplate'),
			array(
				'description' => esc_attr__('Add Menu', 'themeplate'),
				'panels_groups' => array('thim_widget_group')
			),
			array(),

			array(
				'style' => array(
					"type" => "select",
					"label" => esc_attr__("Style heading", "themeplate"),
					"default" => "base",
					"options" => array(
						"base" => esc_attr__("Style One", "themeplate"),
						"style_new" => esc_attr__("Style Two", "themeplate"),
						"style_three" => esc_attr__("Style Three", "themeplate"),
						"style_four" => esc_attr__("Style Four", "themeplate"),
						"style_five" => esc_attr__("Style Five", "themeplate")
					),
					"description" => esc_attr__("Select style heading.", "themeplate"),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array('style1')
					)
				),

				'category_color' => array(
					'label' => __('Category name Color', 'themeplate'),
					'type' => 'color',
					'default' => '#303030',
				),

				'column_num' => array(
					'label' => __('Column Number', 'themeplate'),
					'desc' => __('Column Number for Menu List.', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'one' => 'One Column',
						'two' => 'Two Column'
					),
					'default' => 'two',
					'state_handler' => array(
						'style1[base]' => array('show'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('hide'),
					),
				),

				'line' => array(
					'label' => __('Line', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'show' => 'Show',
						'hide' => 'Hide'
					),
					'default' => 'show',
					'state_handler' => array(
						'style1[base]' => array('show'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('hide'),
					),
				),

				'border_line' => array(
					'label' => __('Show separator between the items', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'show' => 'Show',
						'hide' => 'Hide'
					),
					'default' => 'show',
					'state_handler' => array(
						'style1[base]' => array('hide'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('show'),
						'style1[style_five]' => array('show'),
					),
				),

				'menu_background_image' => array(
					'type' => 'media',
					'label' => __('Menu Background image wrapper', 'themeplate'),
					'choose' => __('Choose image', 'themeplate'),
					'update' => __('Set image', 'themeplate'),
					'library' => 'image',
					//'default' =>  TP_THEME_URI.'assets/images/menu-bg.png',
					'fallback' => true,
					'state_handler' => array(
						'style1[base]' => array('hide'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('show'),
					),
				),
				'menu_background_image_overlay' => array(
					'label' => __('Menu Background Image Overlay Color', 'themeplate'),
					'type' => 'color',
					'default' => '#ffffff',
					'state_handler' => array(
						'style1[base]' => array('hide'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('show'),
					),
				),


				/*'menu_background_wrap' => array(
					'label' => __('Menu Wrapper Background image Show/Hide', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'show' => 'Show',
						'hide' => 'Hide'
					),
					'default' => 'Hide',
					'state_handler' => array(
						'style1[base]' => array('hide'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('show'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array('style_menu_5')
					)
				),

				'menu_background_image' => array(
					'type' => 'media',
					'label' => __('Choose a media thing', 'themeplate'),
					'choose' => __('Choose image', 'themeplate'),
					'update' => __('Set image', 'themeplate'),
					'library' => 'image',
					'fallback' => true,
					'state_handler' => array(
						'style_menu_5[show]' => array('show'),
						'style_menu_5[hide]' => array('hide'),
					),
				),*/


				'currency' => array(
					'label' => __('Currency ', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'TK' => 'TK',
						'$' => '$',
						'£' => '£',
						'€' => '€'
					),
					'default' => '€',
					/*'state_handler' => array(
						'style1[base]'          => array( 'hide' ),
						'style1[style_new]'     => array( 'hide' ),
						'style1[style_three]'   => array( 'show' ),
					),*/
				),

				'heading_color' => array(
					'label' => __('Heading Color', 'themeplate'),
					'type' => 'color',
					'default' => '#303030',
				),

				/*'heading_description_color' => array(
					'label' => __('Heading Description Color', 'themeplate'),
					'type' => 'color',
					'default' => '#303030',
				),*/

				'heading_seperator' => array(
					'label' => __('Heading Seperator', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'show' => 'Show',
						'hide' => 'Hide'
					),
					'default' => 'show',
					'state_handler' => array(
						'style1[base]' => array('show'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('hide'),

					),
				),

				'seperator_position' => array(
					'label' => __('Seperator Position', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'above' => 'Above text',
						'bellow' => 'Bellow text',
						'center' => 'Center Text'
					),
					'default' => 'center',
					'state_handler' => array(
						'style1[base]' => array('show'),
						'style1[style_new]' => array('hide'),
						'style1[style_three]' => array('hide'),
						'style1[style_four]' => array('hide'),
						'style1[style_five]' => array('hide'),
					),
				),

				'heading_position' => array(
					'label' => __('Heading Position', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'left' => 'Left',
						'right' => 'Right',
						'center' => 'Center'
					),
					'default' => 'center',
				),
				'content_color' => array(
					'label' => __('Menu item Heading Color', 'themeplate'),
					'type' => 'color',
					'default' => '#303030',
				),
				'content_desc_color' => array(
					'label' => __('Menu item Description Color', 'themeplate'),
					'type' => 'color',
					'default' => '#303030',
				),
				'content_price_font_weight' => array(
					'label' => __('Menu item Description Color', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'600' => 'Bold',
						'400' => 'Normal'
					),
					'default' => '400',
				),
				'content' => array(
					'label' => __('Description Show/Hide', 'themeplate'),
					'type' => 'select',
					'options' => array(
						'show' => 'Show',
						'hide' => 'Hide',
					),
					'default' => 'show',
				),
			),

			TP_THEME_DIR . 'inc/widgets/menu'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name($instance)
	{
		return isset($instance['style']) ? $instance['style'] : 'base';
		// return 'base';
	}

	function get_style_name($instance)
	{
		return false;
	}
}

function thim_menu_register_widget()
{
	register_widget('Menu_Widget');
}

add_action('widgets_init', 'thim_menu_register_widget');
