<?php

class Carousel_Widget extends Thim_Widget
{
	function __construct()
	{
		parent::__construct(
			'carousel',
			esc_attr__('TT: Carousel', 'themeplate'),
			array(
				'description' => esc_attr__('Add carousel', 'themeplate'),
				'help' => '',
				'panels_groups' => array('thim_widget_group'),
			),
			array(),
			array(
				'style' => array(
					"type" => "select",
					"label" => esc_attr__("Style Carousel", "themeplate"),
					"default" => "base",
					"options" => array(
						"base" => esc_attr__("Style One", "themeplate"),
						"style_new" => esc_attr__("Style Two", "themeplate")
					),
					"description" => esc_attr__("Select style carousel.", "themeplate"),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array('style')
					)
				),
				'carousels' => array(
					'type' => 'repeater',
					'label' => esc_attr__('Items', 'themeplate'),
					'item_name' => esc_attr__('Item', 'themeplate'),
					'fields' => array(
						'image' => array(
							'type' => 'media',
							'label' => esc_attr__('Image', 'themeplate'),
							'description' => esc_attr__('Select image from media library.', 'themeplate')
						),
						'big_title' => array(
							'type' => 'text',
							'label' => esc_attr__('Main Title Text', 'themeplate'),
							'default' => esc_attr__("Main Title Default value", "themeplate"),
							'state_handler' => array(
								'style[base]' => array('hide'),
								'style[style_new]' => array('show'),
							),
						),
						'small_title' => array(
							'type' => 'text',
							'label' => esc_attr__('Sub Title Text', 'themeplate'),
							'default' => esc_attr__("Sub Title Default value", "themeplate"),
							'state_handler' => array(
								'style[base]' => array('hide'),
								'style[style_new]' => array('show'),
							),
						),
						'name' => array(
							"type" => "text",
							"label" => esc_attr__("Name", "themeplate"),
							"default" => "Name Default",
						),
						'link' => array(
							"type" => "text",
							"label" => esc_attr__("Link", "themeplate"),
							"default" => "#",
						),
						'info_sale' => array(
							"type" => "text",
							"label" => esc_attr__("Info Sale", "themeplate"),
							"default" => "40% Off",
						),
						'price' => array(
							"type" => "text",
							"label" => esc_attr__("Price", "themeplate"),
							"description" => esc_attr__("Price and Currency symbol per night", "themeplate"),
							"default" => "$300",
						),
						'price_type' => array(
							"type" => "text",
							"label" => esc_attr__("Price Type", "themeplate"),
							"description" => esc_attr__("", "themeplate"),
							"default" => "per night",
						),

					),
				),

				'number_show' => array(
					'type' => 'number',
					'label' => esc_html__('Number of items', 'themeplate'),
					'default' => '1',
					'state_handler' => array(
						'style[base]' => array('show'),
						'style[style_new]' => array('hide'),
					)
				),
				'auto_play' => array(
					'type' => 'checkbox',
					'label' => __('Auto Play On/Off', 'themeplate'),
					'default' => true
				),
				'auto_play_speed' => array(
					'type' => 'slider',
					'label' => __('Auto Play Speed', 'themeplat'),
					'default' => 3000,
					'min' => 1000,
					'max' => 5000,
					'integer' => true
				)

			),
			TP_THEME_DIR . 'inc/widgets/carousel/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name($instance)
	{
		return isset($instance['style']) ? $instance['style'] : 'base';
	}

	function get_style_name($instance)
	{
		return false;
	}
}

function thim_carousels_register_widget()
{
	register_widget('Carousel_Widget');
}

add_action('widgets_init', 'thim_carousels_register_widget');
