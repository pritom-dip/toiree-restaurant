<?php

class Thim_Button_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'button',
			esc_html__( 'TT: Button', 'themeplate' ),
			array(
				'description'   => esc_html__( 'Button', 'themeplate' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(
				'text'          => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text', 'themeplate' ),
					'default' => esc_html__( 'Button Text', 'themeplate' )
				),
				'link'          => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Link', 'themeplate' ),
					'default' => esc_html__( '#', 'themeplate' )
				),
				'link_target'   => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Link Target', 'themeplate' ),
					'default' => '_self',
					'options' => array(
						'_blank' => esc_html__( 'New Window', 'themeplate' ),
						'_self'  => esc_html__( 'This Window', 'themeplate' )
					)
				),
				'image_icon'    => array(
					'type'        => 'media',
					'label'       => esc_attr__( 'Image Icon', 'themeplate' ),
					'description' => esc_attr__( 'Select image from media library.', 'themeplate' )
				),
				'button_option' => array(
					'type'   => 'section',
					'label'  => esc_html__( 'Custom Style', 'themeplate' ),
					'hide'   => true,
					'fields' => array(
						'custom'             => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Custom Style', 'themeplate' ),
							'default' => 'no',
							'options' => array(
								'no'  => esc_html__( 'No', 'themeplate' ),
								'yes' => esc_html__( 'Yes', 'themeplate' )
							)
						),
						'button_color'       => array(
							'type'    => 'color',
							'label'   => esc_html__( 'Button Color', 'themeplate' ),
							'default' => '#c19b76'
						),
						'text_color'         => array(
							'type'    => 'color',
							'label'   => esc_html__( 'Text Color', 'themeplate' ),
							'default' => '#FFF'
						),
						'button_hover_color' => array(
							'type'    => 'color',
							'label'   => esc_html__( 'Button Hover Color', 'themeplate' ),
							'default' => '#c19b76'
						),
						'text_hover_color'   => array(
							'type'    => 'color',
							'label'   => esc_html__( 'Text Hover Color', 'themeplate' ),
							'default' => '#FFF'
						),
					),
				),
			),
			TP_THEME_DIR . 'inc/widgets/button/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */
	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_button_register_widget() {
	register_widget( 'Thim_Button_Widget' );
}

add_action( 'widgets_init', 'thim_button_register_widget' );