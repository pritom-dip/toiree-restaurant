<?php

define('TP_THEME_DIR', trailingslashit(get_template_directory()));
define('TP_THEME_URI', trailingslashit(get_template_directory_uri()));
define('TP_THEME_VERSION', '2.0.0');

define('THIM_CORE_FILE', __FILE__);
define('THIM_CORE_PATH', dirname(__FILE__));

define('THIM_CORE_URI', untrailingslashit(get_template_directory()));
define('THIM_CORE_ASSETS_URI', THIM_CORE_URI . '/assets');
define('THIM_CORE_VERSION', '2.0.0');

define('THIM_CORE_ADMIN_PATH', THIM_CORE_PATH . '/admin');
define('THIM_CORE_INC_PATH', THIM_CORE_PATH . '/inc');
define('THIM_CORE_ADMIN_URI', THIM_CORE_URI . '/admin');
define('THIM_CORE_INC_URI', THIM_CORE_URI . '/inc');

define('TP_THEME_THIM_DIR', trailingslashit(get_template_directory()));
define('TP_THEME_THIM_URI', trailingslashit(get_template_directory_uri()));
define('TP_CHILD_THEME_THIM_DIR', trailingslashit(get_stylesheet_directory()));
define('TP_CHILD_THEME_THIM_URI', trailingslashit(get_stylesheet_directory_uri()));



/**
 * themeplate functions and definitions
 *
 * @package themeplate
 */
/**
 * Theme setup and custom theme supports.
 */
require TP_THEME_DIR . 'inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require TP_THEME_DIR . 'inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require TP_THEME_DIR . 'inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require TP_THEME_DIR . 'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require TP_THEME_DIR . 'inc/extras.php';

/**
 * Customizer additions.
 */
require TP_THEME_DIR . 'inc/custom-comments.php';

/**
 * Load custom WordPress nav walker.
 */
require TP_THEME_DIR . 'inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require TP_THEME_DIR . 'inc/woocommerce.php';

require TP_THEME_DIR . 'inc/include-kirki.php';
require TP_THEME_DIR . 'inc/trt-kirki.php';

require TP_THEME_DIR . 'inc/plugins-activator.php';

require TP_THEME_DIR . 'inc/class-autoload.php';
new TRT_Autoload();



#remove field in Display settings
require TP_THEME_DIR . 'inc/wrapper-before-after.php';

/**
 * Customizer additions.
 */
require TP_THEME_DIR . 'inc/customizer.php';
require TP_THEME_DIR . 'inc/header/logo.php';


/**
 * Photo gallery Admin
 */
require TP_THEME_DIR . 'inc/admin/photogallary/photogallary.php';

/**
 * Photo gallery Admin
 */
require TP_THEME_DIR . 'inc/admin/menu/menu.php';

require TP_THEME_DIR . 'inc/widgets/widgets.php';
/**
 * Library.
 */
require TP_THEME_DIR . 'inc/libs/Tax-meta-class/Tax-meta-class.php';
require TP_THEME_DIR . 'inc/tax-meta.php';
require TP_THEME_DIR . 'inc/libs/theme-wrapper.php';

/**
 * Load directory listing.
 */
require TP_THEME_DIR . 'inc/class-directory-listing.php';
new DirectoryListing();

require TP_THEME_DIR . 'inc/class-meta-field.php';
new TRT_MetaField();
//require TP_THEME_DIR . 'inc/class-settings-api.php';
//require TP_THEME_DIR . 'inc/class-settings.php';
//new Settings();


/**
 * Load short code class
 */
require TP_THEME_DIR . 'inc/class-short-code.php';
new TRT_shortCode();


