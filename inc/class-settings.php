<?php

class Settings extends Settings_API {
	private $settings_api;

	function __construct() {
		$this->settings_api = new Settings_API();
		add_action('admin_init', array($this, 'admin_init'));
		add_action('admin_menu', array($this, 'admin_menu'));
	}

	function admin_init() {
		//set the settings
		$this->settings_api->set_sections($this->get_settings_sections());
		$this->settings_api->set_fields($this->get_settings_fields());

		//initialize settings
		$this->settings_api->admin_init();
	}

	function get_settings_sections() {
		$sections = array(
			array(
				'id'    => 'menu_list_settings',
				'title' => __( 'Menu List Settings', 'themeplate' )
			),
		);

		return apply_filters( 'menu_list_settings_section', $sections );
	}

	/**
	 * Returns all the settings fields
	 *
	 * @return array settings fields
	 */
	function get_settings_fields() {

		$settings_fields = array(

			'menu_list_settings' => array(

                array(
                    'name'    => 'column_num',
                    'label'   => __('Column Number', 'themeplate'),
                    'desc'    => __('Column Number for Menu List.', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'one'   => 'One Column',
                        'two'   => 'Two Column'
                    ),
                    'default' => 'two',
                ),

                array(
                    'name'    => 'line',
                    'label'   => __('Line', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'show'   => 'Show',
                        'hide'   => 'Hide'
                    ),
                    'default' => 'show',
                ),

                array(
                    'name'    => 'heading_color',
                    'label'   => __('Heading Color', 'themeplate'),
                    'type'    => 'color',
                    'default' => '#ae9a65',
                ),

                array(
                    'name'    => 'heading_seperator',
                    'label'   => __('Heading Seperator', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'show'   => 'Show',
                        'hide'   => 'Hide'
                    ),
                    'default' => 'show',
                ),

                array(
                    'name'    => 'seperator_position',
                    'label'   => __('Seperator Position', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'above'     => 'Above text',
                        'bellow'    => 'Bellow text',
                        'center'    => 'Center Text'
                    ),
                    'default' => 'center',
                ),

                array(
                    'name'    => 'heading_position',
                    'label'   => __('Heading Position', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'left'     => 'Left',
                        'right'    => 'Right',
                        'center'   => 'Center'
                    ),
                    'default' => 'center',
                ),

                array(
                    'name'    => 'content',
                    'label'   => __('Description', 'themeplate'),
                    'type'    => 'select',
                    'options' => array(
                        'show'   => 'Show',
                        'hide'   => 'Hide'
                    ),
                    'default' => 'show',
                ),

			),
		);

		return apply_filters('menu_list_settings_fields', $settings_fields);
	}

	/**
	 * Add Menu List settings sub menu
	 *
	 * @since 1.0.0
	 */

	function admin_menu() {

		add_submenu_page(
			'edit.php?post_type=menu_list',
			__('Menu List Settings', 'themeplate'),
			__('Menu List Settings', 'themeplate'),
			'manage_options',
			'menu-list-settings',
			array($this, 'settings_page')
		);

	}

	/**
	 * Menu page for Menu List sub menu
	 *
	 * @since 1.0.0
	 */

	function settings_page() {
		echo '<div class="wrap">';
		echo sprintf("<h2>%s</h2>", __('Menu List Settings', 'themeplate'));
		$this->settings_api->show_settings();
		echo '</div>';

	}
}




