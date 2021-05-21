<?php
/**
 * Declaring widgets
 *
 *
 * @package themeplate
 */
function themeplate_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'themeplate'),
        'id'            => 'sidebar-1',
        'description'   => 'Sidebar widget area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Toolbar', 'themeplate'),
        'id'            => 'toolbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    if (get_theme_mod('header_style') == 'header_v2') {
        register_sidebar(array(
            'name'          => esc_html__('Logo Left', 'themeplate'),
            'id'            => 'logo_left',
            'description'   => 'Display widgets in left of logo, using with header layout 02',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

        register_sidebar(array(
            'name'          => esc_html__('Logo Right', 'themeplate'),
            'id'            => 'logo_right',
            'description'   => 'Display widgets in right of logo, using with header layout 02',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    } elseif (get_theme_mod('header_style') == 'header_v3') {
        register_sidebar(array(
            'name'          => 'Menu Left',
            'id'            => 'menu_left',
            'description'   => esc_html__('Menu Left', 'themeplate'),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => 'Menu Right',
            'id'            => 'menu_right',
            'description'   => esc_html__('Menu Right', 'themeplate'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
    } else {
        register_sidebar(array(
            'name'          => 'Menu Right',
            'id'            => 'menu_right',
            'description'   => esc_html__('Menu Right', 'themeplate'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
    }

    register_sidebar(array(
        'name'          => esc_html__('Offcanvas Sidebar', 'themeplate'),
        'id'            => 'offcanvas_sidebar',
        'description'   => 'Offcanvas Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Main Bottom', 'themeplate'),
        'id'            => 'main-bottom',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer', 'themeplate'),
        'id'            => 'footer',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer Copyright', 'themeplate'),
        'id'            => 'footer_copyright',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

}

add_action('widgets_init', 'themeplate_widgets_init');
