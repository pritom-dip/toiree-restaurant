<?php

/*
Widget Name: Masonry Design Widget
Author: Pritom Chowdhury Dip
*/

class ContentGrid2_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'contentgrid2',
			esc_attr__( 'TT: Content Grid Design Three', 'themeplate' ),
			array(
				'description'   => esc_attr__( 'Add Masonry Design', 'themeplate' ),
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(			
				'image1' => array(
                    'type'        => 'media',
                    'label'       => esc_attr__('Image One', 'themeplate'),
                    'description' => esc_attr__('Select first image from media library.', 'themeplate')
                ),
                'heading1' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__('Block One Heading', 'themeplate'),
                    'default'	  => esc_attr__('Block One Heading', 'themeplate')
                ),
                'heading1_weight' => array(
                    'type'        => 'select',
                    'label'       => esc_attr__('Block One Heading Weight', 'themeplate'),
                    'default' 	  => esc_attr__('600', 'themeplate'),
                    'options'	  => array(
                    	'400'	=> 'Normal',
                    	'600'	=> 'Bolder',
                    	'700'	=> 'Bold'
                    )
                ),
                'content1' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__('Block One Content', 'themeplate'),
                    'default'	  => esc_attr__('Block One Content', 'themeplate')
                ),
                'text1_bg_clr' => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Block One Background Color', 'themeplate')
                ),
                'text1_font_clr'  => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Block One Font Color', 'themeplate')
                ),	
                'active_num1_btn' => array(
                    'type'    => 'select',
                    'label'   => __('Block One button Show/Hide', 'themeplate'),
                    'default' => 'hide',
                    "options"       => array(
						"show"      => esc_attr__( "Show", "themeplate" ),
						"hide" 		=> esc_attr__( "Hide", "themeplate" )
					),
                    'state_emitter' => array(
						'callback'  => 'select',
						'args'      => array( 'active_num1_btn' )
					)
                ),
                'btn_one_text'      => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Button One Text', 'themeplate' ),
					'default'       => esc_attr__( "Read More...", "themeplate" ),
					'state_handler' => array(
						'active_num1_btn[show]' => array( 'show' ),
						'active_num1_btn[hide]' => array( 'hide' ),
					),
				),
				'btn_one_link'      => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Button One Link', 'themeplate' ),
					'default'       => esc_attr__( "example.com", "themeplate" ),
					'state_handler' => array(
						'active_num1_btn[show]' => array( 'show' ),
						'active_num1_btn[hide]' => array( 'hide' ),
					),
				),
				'btn1_bg_clr' => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Button One Background Color', 'themeplate'),
                    'state_handler' => array(
						'active_num1_btn[show]' => array( 'show' ),
						'active_num1_btn[hide]' => array( 'hide' ),
					),
                ),
                'btn1_font_clr'  => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Button One Font Color', 'themeplate'),
                    'state_handler' => array(
						'active_num1_btn[show]' => array( 'show' ),
						'active_num1_btn[hide]' => array( 'hide' ),
					),
                ),
                'image2' => array(
                    'type'        => 'media',
                    'label'       => esc_attr__('Image Two', 'themeplate'),
                    'description' => esc_attr__('Select second image from media library.', 'themeplate')
                ),
                'heading2' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__('Block Two Heading', 'themeplate'),
                    'default'	  => esc_attr__('Block Two Heading', 'themeplate')
                ),
                'heading2_weight' => array(
                    'type'        => 'select',
                    'label'       => esc_attr__('Block Two Heading Weight', 'themeplate'),
                    'default' 	  => esc_attr__('600', 'themeplate'),
                    'options'	  => array(
                    	'400'	=> 'Normal',
                    	'600'	=> 'Bolder',
                    	'700'	=> 'Bold'
                    )
                ),
                'content2' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__('Block Two Content', 'themeplate'),
                    'default'	  => esc_attr__('Block Two Content', 'themeplate')
                ),
                'text2_bg_clr' => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Block Two Background Color', 'themeplate')
                ),
                'text2_font_clr' => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Block Two Font Color', 'themeplate')
                ),
                'active_num2_btn' => array(
                    'type'    => 'select',
                    'label'   => __('Block Two button Show/Hide', 'themeplate'),
                    'default' => 'hide',
                    "options"       => array(
						"show"      => esc_attr__( "Show", "themeplate" ),
						"hide" 		=> esc_attr__( "Hide", "themeplate" )
					),
                    'state_emitter' => array(
						'callback'  => 'select',
						'args'      => array( 'active_num2_btn' )
					)
                ),
                'btn_two_text'      => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Button Two Text', 'themeplate' ),
					'default'       => esc_attr__( "Read More...", "themeplate" ),
					'state_handler' => array(
						'active_num2_btn[show]' => array( 'show' ),
						'active_num2_btn[hide]' => array( 'hide' ),
					),
				),
				'btn_two_link'      => array(
					'type'          => 'text',
					'label'         => esc_attr__( 'Button Two Link', 'themeplate' ),
					'default'       => esc_attr__( "example.com", "themeplate" ),
					'state_handler' => array(
						'active_num2_btn[show]' => array( 'show' ),
						'active_num2_btn[hide]' => array( 'hide' ),
					),
				),
				'btn2_bg_clr' => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Button Two Background Color', 'themeplate'),
                    'state_handler' => array(
						'active_num2_btn[show]' => array( 'show' ),
						'active_num2_btn[hide]' => array( 'hide' ),
					),
                ),
                'btn2_font_clr'  => array(
                    'type'        => 'color',
                    'label'       => esc_attr__('Button Two Font Color', 'themeplate'),
                    'state_handler' => array(
						'active_num2_btn[show]' => array( 'show' ),
						'active_num2_btn[hide]' => array( 'hide' ),
					),
                ),
			),
			TP_THEME_DIR . 'inc/widgets/contentgrid2'
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

function thim_contentgrid2_register_widget() {
	register_widget( 'ContentGrid2_Widget' );
}

add_action( 'widgets_init', 'thim_contentgrid2_register_widget' );