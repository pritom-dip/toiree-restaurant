<?php

class DirectoryListing
{


    /**
     * PostTypes constructor.
     */
    public function __construct()
    {
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
    }

    /**
     * Register custom post types
     */
    public function register_post_types()
    {
        register_post_type('menu_list', array(
            'labels'              => $this->get_posts_labels('Menu List', __('Menu List', 'themeplate'), __('Menu List', 'themeplate')),
            'hierarchical'        => false,
            'supports'            => array('title', 'editor','thumbnail'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-category',
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'capability_type'     => 'post',
            'rewrite'             => array(
                'slug'       => 'menu-list',
                'with_front' => true
            )

        ));

        register_post_type('photo_gallary', array(
            'labels'              => $this->get_posts_labels('Photogallary', __('Photogallary', 'themeplate'), __('Photogallary', 'themeplate')),
            'hierarchical'        => false,
            'supports'            => array('title', 'editor', 'post-formats','thumbnail'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-format-image',
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'capability_type'     => 'post',
            'rewrite'             => array(
                'slug'       => 'photogallary',
                'with_front' => true
            )

        ));

        register_post_type('normal_gallary', array(
            'labels'              => $this->get_posts_labels('Gallary', __('Gallary', 'themeplate'), __('Gallary', 'themeplate')),
            'hierarchical'        => false,
            'supports'            => array('title', 'editor', 'post-formats','thumbnail'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-format-image',
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => true,
            'query_var'           => true,
            'can_export'          => true,
            'capability_type'     => 'post',
            'rewrite'             => array(
                'slug'       => 'Gallary',
                'with_front' => true
            )

        ));


    }

    /**
     * Register custom taxonomies
     *
     * @since 1.0.0
     */
    public function register_taxonomies()
    {
        register_taxonomy('menu_list_category', array('menu_list'), array(
            'labels'            => $this->get_taxonomy_label('Categories', __('Menu Category', 'themeplate'), __('Menu Categories', 'themeplate')),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => false,
            'rewrite'           => array('slug' => 'menu_list_category'),
        ));

        register_taxonomy('photo_gallary_category', array('photo_gallary'), array(
            'labels'            => $this->get_taxonomy_label('Categories', __('Photogallary Category', 'themeplate'), __('Photogallary Categories', 'themeplate')),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'photo_gallary_category'),
        ));

        register_taxonomy('normal_gallary_category', array('normal_gallary'), array(
            'labels'            => $this->get_taxonomy_label('Categories', __('Photogallary Category', 'themeplate'), __('Photogallary Categories', 'themeplate')),
            'hierarchical'      => true,
            'public'            => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => 'normal_gallary_category'),
        ));

    }

    /**
     * Get all labels from post types
     */
    protected static function get_posts_labels($menu_name, $singular, $plural)
    {
        $labels = array(
            'name'               => $singular,
            'all_items'          => sprintf(__("All %s", 'themeplate'), $plural),
            'singular_name'      => $singular,
            'add_new'            => sprintf(__('New %s', 'themeplate'), $singular),
            'add_new_item'       => sprintf(__('Add New %s', 'themeplate'), $singular),
            'edit_item'          => sprintf(__('Edit %s', 'themeplate'), $singular),
            'new_item'           => sprintf(__('New %s', 'themeplate'), $singular),
            'view_item'          => sprintf(__('View %s', 'themeplate'), $singular),
            'search_items'       => sprintf(__('Search %s', 'themeplate'), $plural),
            'not_found'          => sprintf(__('No %s found', 'themeplate'), $plural),
            'not_found_in_trash' => sprintf(__('No %s found in Trash', 'themeplate'), $plural),
            'parent_item_colon'  => sprintf(__('Parent %s:', 'themeplate'), $singular),
            'menu_name'          => $menu_name,
        );

        return $labels;
    }

    /**
     * Get all labels from taxonomies
     */
    protected static function get_taxonomy_label($menu_name, $singular, $plural)
    {
        $labels = array(
            'name'              => sprintf(_x('%s', 'taxonomy general name', 'themeplate'), $plural),
            'singular_name'     => sprintf(_x('%s', 'taxonomy singular name', 'themeplate'), $singular),
            'search_items'      => sprintf(__('Search %', 'themeplate'), $plural),
            'all_items'         => sprintf(__('All %s', 'themeplate'), $plural),
            'parent_item'       => sprintf(__('Parent %s', 'themeplate'), $singular),
            'parent_item_colon' => sprintf(__('Parent %s:', 'themeplate'), $singular),
            'edit_item'         => sprintf(__('Edit %s', 'themeplate'), $singular),
            'update_item'       => sprintf(__('Update %s', 'themeplate'), $singular),
            'add_new_item'      => sprintf(__('Add New %s', 'themeplate'), $singular),
            'new_item_name'     => sprintf(__('New % Name', 'themeplate'), $singular),
            'menu_name'         => __($menu_name, 'themeplate'),
        );

        return $labels;
    }
}

