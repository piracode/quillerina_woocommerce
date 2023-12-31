<?php

/**
 * quillerina-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package quillerina-theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function quillerina_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on quillerina-theme, use a find and replace
		* to change 'quillerina-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('quillerina-theme', get_template_directory() . '/languages');

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
			'main-menu' => esc_html__('Primary', 'quillerina-theme'),
			'footer-menu' => esc_html__('Footer Menu', 'quillerina-theme'),
			'header-secondary-menu' => esc_html__('Header Secondary Menu', 'quillerina-theme'),
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
			'quillerina_theme_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'quillerina_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function quillerina_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('quillerina_theme_content_width', 640);
}
add_action('after_setup_theme', 'quillerina_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quillerina_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'quillerina-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'quillerina-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'quillerina_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function quillerina_theme_scripts()
{
	wp_enqueue_style('quillerina-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('quillerina-theme-style', 'rtl', 'replace');

	wp_enqueue_script('quillerina-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'quillerina_theme_scripts');

//Enqueue Custom Fonts
function enqueue_custom_fonts()
{

	// Enqueue the 'Alex Brush' font
	wp_enqueue_style(
		'fwd-googlefont-alexbrush',
		'https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap',
		array(),
		null
	);

	// Enqueue the "Jua" font
	wp_enqueue_style(
		'fwd-googlefont-jua',
		'https://fonts.googleapis.com/css2?family=Jua&display=swap',
		array(),
		null
	);

	// Enqueue the "Jua" font
	wp_enqueue_style(
		'fwd-googlefont-playfairdisplay',
		'https://fonts.googleapis.com/css2?family=Playfair:wght@400;500&display=swap',
		array(),
		null
	);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');


// Function to change the login logo and background color
function custom_login()
{
	echo '<style type="text/css">
	body.login{
		background-color: #C6D2ED;
	}
        #login h1 a,
        .login h1 a {
            background-image: url(' . get_stylesheet_directory_uri() . '/images/logo.svg);
            height: 65px;
            width: 320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
		
    </style>';
}
add_action('login_enqueue_scripts', 'custom_login');

// Function to change the login logo URL
function custom_url_login()
{
	return home_url();
}
add_filter('login_headerurl', 'custom_url_login');

//Add normalize.css
function add_normalize_CSS()
{
	wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
}
add_action('wp_enqueue_scripts', 'add_normalize_CSS');

//Function to add AOS animation
function add_aos_animation()
{
	wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
	wp_enqueue_script('AOS', 'https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.js', false, null, true);
	wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array('AOS'), null, true);
}
add_action('wp_enqueue_scripts', 'add_aos_animation');

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
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Define a custom thumbnail size
add_image_size('custom-thumbnail', 200, 200, false);

// Display the custom thumbnail for the post
if (has_post_thumbnail()) {
	the_post_thumbnail('custom-thumbnail');
}
