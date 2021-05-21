<?php

class Heading_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'heading',
			esc_attr__( 'TT: Heading', 'themeplate' ),
			array(
				'description'   => esc_attr__( 'Add heading text', 'themeplate' ),
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(
				'style'             => array(
					"type"          => "select",
					"label"         => esc_attr__( "Style heading", "themeplate" ),
					"default"       => "base",
					"options"       => array(
						"base"      => esc_attr__( "Style Old", "themeplate" ),
						"style_new" => esc_attr__( "Style New", "themeplate" )
					),
					"description"   => esc_attr__( "Select style heading.", "themeplate" ),
					'state_emitter' => array(
						'callback'  => 'select',
						'args'      => array( 'style' )
					)
				),
				'small_title'       => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Small Heading Text', 'themeplate' ),
					'default'       => esc_attr__( "Default value", "themeplate" ),
					'state_handler' => array(
						'style[base]'      => array( 'hide' ),
						'style[style_new]' => array( 'show' ),
					),
				),
				'title'               => array(
					'type'    => 'text',
					'label'   => esc_attr__( 'Heading Text', 'themeplate' ),
					'default' => esc_attr__( "Default value", "themeplate" )
				),
				'line'                => array(
					'type'          => 'checkbox',
					'label'         => esc_attr__( 'Show Separator', 'themeplate' ),
					'state_handler' => array(
						'style[base]'      => array( 'show' ),
						'style[style_new]' => array( 'hide' ),
					),
				),
				'textcolor'           => array(
					'type'          => 'color',
					'label'         => esc_attr__( 'Text Heading color', 'themeplate' ),
					'default'       => '',
					'state_handler' => array(
						'style[base]'      => array( 'show' ),
						'style[style_new]' => array( 'hide' ),
					),
				),
				'size'                => array(
					"type"    => "select",
					"label"   => esc_attr__( "Size Heading", "themeplate" ),
					"options" => array(
						"h2" => esc_attr__( "h2", "themeplate" ),
						"h3" => esc_attr__( "h3", "themeplate" ),
						"h4" => esc_attr__( "h4", "themeplate" ),
						"h5" => esc_attr__( "h5", "themeplate" ),
						"h6" => esc_attr__( "h6", "themeplate" )
					),
					"default" => "h3"
				),
				'font_heading'        => array(
					"type"          => "select",
					"label"         => esc_attr__( "Font Heading", "themeplate" ),
					"default"       => "default",
					"options"       => array(
						"default" => esc_attr__( "Default", "themeplate" ),
						"custom"  => esc_attr__( "Custom", "themeplate" )
					),
					"description"   => esc_attr__( "Select Font heading.", "themeplate" ),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'font_heading_type' )
					)
				),
				'custom_font_heading' => array(
					'type'          => 'section',
					'label'         => esc_attr__( 'Custom Font Heading', 'themeplate' ),
					'hide'          => true,
					'state_handler' => array(
						'font_heading_type[custom]'  => array( 'show' ),
						'font_heading_type[default]' => array( 'hide' ),
					),
					'fields'        => array(
						'custom_font_size'   => array(
							"type"        => "number",
							"label"       => esc_attr__( "Font Size", "themeplate" ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => esc_attr__( "custom font size", "themeplate" ),
							"class"       => "color-mini",
						),
						'custom_font_weight' => array(
							"type"        => "select",
							"label"       => esc_attr__( "Custom Font Weight", "themeplate" ),
							"options"     => array(
								"normal" => esc_attr__( "Normal", "themeplate" ),
								"bold"   => esc_attr__( "Bold", "themeplate" ),
								"100"    => esc_attr__( "100", "themeplate" ),
								"200"    => esc_attr__( "200", "themeplate" ),
								"300"    => esc_attr__( "300", "themeplate" ),
								"400"    => esc_attr__( "400", "themeplate" ),
								"500"    => esc_attr__( "500", "themeplate" ),
								"600"    => esc_attr__( "600", "themeplate" ),
								"700"    => esc_attr__( "700", "themeplate" ),
								"800"    => esc_attr__( "800", "themeplate" ),
								"900"    => esc_attr__( "900", "themeplate" )
							),
							"description" => esc_attr__( "Select Custom Font Weight", "themeplate" ),
							"class"       => "color-mini",
						),
						'custom_font_style'  => array(
							"type"        => "select",
							"label"       => esc_attr__( "Custom Font Style", "themeplate" ),
							"options"     => array(
								"inherit" => esc_attr__( "inherit", "themeplate" ),
								"initial" => esc_attr__( "initial", "themeplate" ),
								"italic"  => esc_attr__( "italic", "themeplate" ),
								"normal"  => esc_attr__( "normal", "themeplate" ),
								"oblique" => esc_attr__( "oblique", "themeplate" )
							),
							"description" => esc_attr__( "Select Custom Font Style", "themeplate" ),
							"class"       => "color-mini",
						),
					),
				),
				'sub-title'           => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Sub Heading', 'themeplate' ),
					'default'       => '',
					'state_handler' => array(
						'style[base]'      => array( 'show' ),
						'style[style_new]' => array( 'hide' ),
					),
				),
				'background_title'    => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Background Heading', 'themeplate' ),
					'default'       => 'Default',
					'state_handler' => array(
						'style[base]'      => array( 'hide' ),
						'style[style_new]' => array( 'show' ),
					),
				),
				'description'         => array(
					'type'                  => 'textarea',
					'label'                 => esc_attr__( 'Description Text', 'themeplate' ),
					'default'               => esc_attr__( "Default value", "themeplate" ),
					'allow_html_formatting' => true,
					'state_handler'         => array(
						'style[base]'      => array( 'hide' ),
						'style[style_new]' => array( 'show' ),
					),
				),
				'show_button_heading' => array(
					"type"          => "select",
					"label"         => esc_attr__( "Show button heading", "themeplate" ),
					"default"       => "no",
					"options"       => array(
						"yes" => esc_attr__( "Yes", "themeplate" ),
						"no"  => esc_attr__( "No", "themeplate" )
					),
					"description"   => esc_attr__( "Show button for heading.", "themeplate" ),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'show_button_heading' )
					)
				),
				'title_button'        => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Title Button Heading', 'themeplate' ),
					'default'       => 'Button',
					'state_handler' => array(
						'show_button_heading[yes]' => array( 'show' ),
						'show_button_heading[no]'  => array( 'hide' ),
					),
				),
				'link_button'         => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Link Button Heading', 'themeplate' ),
					'default'       => '#',
					'state_handler' => array(
						'show_button_heading[yes]' => array( 'show' ),
						'show_button_heading[no]'  => array( 'hide' ),
					),
				),
				'link_target'         => array(
					'type'          => 'select',
					'label'         => esc_attr__( 'Link Target Button', 'themeplate' ),
					'options'       => array(
						'_self'  => esc_attr__( 'Same window', 'themeplate' ),
						'_blank' => esc_attr__( 'New window', 'themeplate' ),
					),
					'state_handler' => array(
						'show_button_heading[yes]' => array( 'show' ),
						'show_button_heading[no]'  => array( 'hide' ),
					),
				),
				'css_animation'       => array(
					"type"    => "select",
					"label"   => esc_attr__( "CSS Animation", "themeplate" ),
					"options" => array(
						""              => esc_attr__( "No", "themeplate" ),
						"top-to-bottom" => esc_attr__( "Top to bottom", "themeplate" ),
						"bottom-to-top" => esc_attr__( "Bottom to top", "themeplate" ),
						"left-to-right" => esc_attr__( "Left to right", "themeplate" ),
						"right-to-left" => esc_attr__( "Right to left", "themeplate" ),
						"appear"        => esc_attr__( "Appear from center", "themeplate" )
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/heading/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return isset( $instance['style'] ) ? $instance['style'] : 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_heading_register_widget() {
	register_widget( 'Heading_Widget' );
}

add_action( 'widgets_init', 'thim_heading_register_widget' );