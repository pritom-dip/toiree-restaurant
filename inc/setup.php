<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @package themeplate
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'themeplate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themeplate_setup() {
		load_theme_textdomain( 'themeplate', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'themeplate' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( "post-thumbnails" );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		add_theme_support( 'custom-background', apply_filters( 'themeplate_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif; // themeplate_setup
add_action( 'after_setup_theme', 'themeplate_setup' );

/**
 * Adding the Read more link to excerpts
 */
function custom_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/* Adds a custom read more link to all excerpts, manually or automatically generated */
function all_excerpts_get_more_link($post_excerpt) {

	return $post_excerpt . ' [...]<p><a class="btn btn-default themeplate-read-more-link" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More...', 'themeplate')  . '</a></p>';
}
add_filter('wp_trim_excerpt', 'all_excerpts_get_more_link');
