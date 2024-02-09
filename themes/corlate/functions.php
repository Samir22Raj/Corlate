<?php
/**
 * corlate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corlate
 */

$version = wp_get_theme()->get("Version");
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', $version);
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function corlate_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on corlate, use a find and replace
	 * to change 'corlate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('corlate', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'corlate'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'corlate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'corlate_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corlate_content_width()
{
	$GLOBALS['content_width'] = apply_filters('corlate_content_width', 640);
}
add_action('after_setup_theme', 'corlate_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corlate_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'corlate'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'corlate'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'corlate_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function corlate_scripts()
{
	wp_enqueue_style('corlate-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('corlate-style', 'rtl', 'replace');

	wp_enqueue_script('corlate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	// Actually load up the stylesheet.
	// Enqueue style.
	wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('font-awesome-min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, 'all');
	wp_enqueue_style('animate-min', get_template_directory_uri() . '/css/animate.min.css', array(), false, 'all');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), false, 'all');
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
	// wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome.css', array(), false, 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');

	// Enqueue js files.
	//wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', '', '1.10.2', false);
	wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('jquery-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), _S_VERSION, true);
	wp_enqueue_script('jquery-isotope-min', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wow-min', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
	// wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', '', 1.0, true);
	// wp_enqueue_script('respond-min', get_template_directory_uri() . '/js/respond.min.js', '', 1.0, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'corlate_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue Styles and Scripts.
 * require get_template_directory() . '/inc/function-enqueue.php';
 */

/**
 * Menus registered and customized.
 */
require get_template_directory() . '/inc/menu-customizations.php';

/**
 * Sidebars registered.
 */
require get_template_directory() . '/inc/reg-sidebar.php';

/**
 * Shortcodes registered.
 */
require get_template_directory() . '/inc/reg-shortcode.php';

/**
 * Overriding widgets.
 */
require get_template_directory() . '/inc/overide-widget.php';