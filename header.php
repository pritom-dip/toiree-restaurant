<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package themeplate
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php
    $custom_sticky = $class_header = '';
    if (get_theme_mod('rtl_support') == true) {
        $class_header .= 'rtl';
    }
    if (get_theme_mod('config_att_sticky') == 'sticky_custom') {
        $custom_sticky .= ' bg-custom-sticky';
    }
    if (get_theme_mod('header_sticky') == 1) {
        $custom_sticky .= ' sticky-header';
    }
    if (get_theme_mod('header_position')) {
        $custom_sticky .= ' header_overlay';
        $class_header  .= ' wrapper-header_overlay';
    }

    $header_style  = get_theme_mod('header_style');
    $custom_sticky .= ' ' . $header_style;
    $class_header  .= ' wrapper-' . $header_style;

    if (get_theme_mod('box_layout') == 'boxed') {
        $class_boxed = 'boxed-area';
    } else {
        $class_boxed = '';
    }


    if (get_theme_mod('user_bg_pattern')) {
        $body_bg_style = 'background-image: url(' . thim_ssl_secure_url(get_theme_mod('bg_pattern')) . ');';
    } elseif (get_theme_mod('bg_pattern_upload')) {
        $body_bg_style = '
        background-image: url(' . thim_ssl_secure_url(get_theme_mod('bg_pattern_upload')) . ');
        background-repeat: ' . get_theme_mod('bg_repeat') . ';
        background-position: ' . get_theme_mod('bg_position') . ';
        background-size: ' . get_theme_mod('bg_size') . ';
        background-attachment: ' . get_theme_mod('bg_attachment') . ';
        ';
    } else {
        $body_bg_style = '';
    }


    wp_head(); ?>
</head>


<body <?php body_class($class_header); ?> >


<div id="wrapper-container" class="wrapper-container" style="<?php if ($body_bg_style != '') {
    echo $body_bg_style;
} ?>">
    <div class="content-pusher <?php echo esc_attr($class_boxed); ?>">

        <?php
        // if( get_theme_mod('topbar_show') === true ){
        //     get_template_part('inc/header/top-header');
        // }

		$sticky=get_theme_mod('header_sticky') === true ? ' sticky-header' : '';
        ?>

        <header id="masthead" class="site-header affix-top <?php echo esc_attr($custom_sticky);
        echo get_theme_mod('single_page_main_nav') === true ? ' sp_nav' : ''; echo $sticky; ?>">
            <?php
            // Drawer
            if (get_theme_mod('show_drawer') == true && is_active_sidebar('drawer_top')) {
                get_template_part('inc/header/drawer');
            }

            if ('header_v2' === get_theme_mod('header_style')) {
                get_template_part('inc/header/header_v2');
            } elseif ('header_v3' === get_theme_mod('header_style')) {
                get_template_part('inc/header/header_v3');
            } else if ('header_v4' === get_theme_mod('header_style')) {
                get_template_part('inc/header/header_v4');
            } else {
                get_template_part('inc/header/header_v1');
            }

            ?>
        </header>

        <div id="main-content" style="<?php if (get_theme_mod('box_layout') == 'wide') {
            echo $body_bg_style;
        } ?>">
