<?php

class video_Widget extends Thim_Widget
{
	function __construct()
	{
		parent::__construct(
			'video',
			esc_attr__('TT: Video Slider', 'themeplate'),
			array(
				'description' => esc_attr__('Add Custom', 'themeplate'),
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				/*'style' => array(
					"type" => "select",
					"label" => esc_attr__("Style heading", "themeplate"),
					"default" => "base",
					"options" => array(
						"base" => esc_attr__("Style Old", "themeplate"),
						"style_new" => esc_attr__("Style New", "themeplate")
					),
					"description" => esc_attr__("Select style heading.", "themeplate"),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array('style1')
					)
				),*/
				'video_link' => array(
					'type' => 'text',
					'label' => esc_attr__('Media Upload Link', 'themeplate')
				),
				'video_title' => array(
					'type' => 'text',
					'label' => esc_attr__('Title', 'themeplate')
				),
				'video_title_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Title Color', 'themeplate'),
					'default' => '#ffffff'
				),

				'video_description' => array(
					'type' => 'textarea',
					'label' => esc_attr__('Description', 'themeplate'),
				),

				'video_description_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Description Color', 'themeplate'),
					'default' => '#ffffff'
				),

				'video_button' => array(
					'type' => 'text',
					'label' => esc_attr__('Button Text', 'themeplate')
				),

				'button_link' => array(
					'type' => 'text',
					'label' => esc_attr__('Button Link', 'themeplate'),
					'default' => '#'
				),

				'video_button_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Button Color', 'themeplate'),
					'default' => '#ffffff'
				),
				'video_button_bg_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Button BG Color', 'themeplate'),
					'default' => '#ffffff'
				),
				'video_button_hover_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Button Hover BG Color', 'themeplate'),
					'default' => '#ffffff'
				),

				'video_sound_button_bg_color' => array(
					'type' => 'color',
					'label' => esc_attr__('Sound Button Color', 'themeplate'),
					'default' => '#ffea00'
				),


			),
			TP_THEME_DIR . 'inc/widgets/video'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name($instance)
	{
		//return isset($instance['style']) ? $instance['style'] : 'base';
		return 'base';
	}

	function get_style_name($instance)
	{
		return false;
	}
}

function thim_video_register_widget()
{
	register_widget('video_Widget');
}

add_action('widgets_init', 'thim_video_register_widget');
