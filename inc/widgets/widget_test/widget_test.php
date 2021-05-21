<?php

/*
Widget Name: Masonry Design Widget
Author: Pritom Chowdhury Dip
*/

class Custom_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'widget_test',
			esc_attr__( 'TT: Custom', 'themeplate' ),
			array(
				'description'   => esc_attr__( 'Add Custom', 'themeplate' ),
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
						'args'      => array( 'style1' )
					)
				),				
				'title'             => array(
					'type'    => 'text',
					'label'   => esc_attr__( 'Heading Text', 'themeplate' ),
					'default' => esc_attr__( "Default value", "themeplate" )
				),
			),
			TP_THEME_DIR . 'inc/widgets/widget_test'
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

function thim_custom_register_widget() {
	register_widget( 'Custom_Widget' );
}

add_action( 'widgets_init', 'thim_custom_register_widget' );