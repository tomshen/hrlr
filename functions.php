<?php
/**
 * HRLR functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HRLR
 */

if ( ! function_exists( 'hrlr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hrlr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on HRLR, use a find and replace
		 * to change 'hrlr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hrlr', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'hrlr' ),
			'menu-2' => esc_html__( 'Secondary', 'hrlr' ),
			'menu-3' => esc_html__( 'Social', 'hrlr' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hrlr_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hrlr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hrlr_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hrlr_content_width', 640 );
}
add_action( 'after_setup_theme', 'hrlr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hrlr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hrlr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hrlr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hrlr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hrlr_scripts() {
	wp_enqueue_style( 'hrlr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'hrlr-accordion', get_template_directory_uri() . '/js/accordion.js', array(), true );

	wp_enqueue_script( 'hrlr-footnotes', get_template_directory_uri() . '/js/footnotes.js', array(), true );

	wp_enqueue_script( 'hrlr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hrlr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hrlr_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customize archive excerpt ellipsis
 */

 function new_excerpt_more ($more) {
	 return '...';
 }

 add_filter('excerpt_more', 'new_excerpt_more');


 /**
  * Display main menu additional fields
  */

function my_wp_nav_menu_objects( $items, $args ) {

	// modify primary nav only

	if( $args->theme_location == 'menu-1' ) {

		foreach( $items as $key=>$item ) {

			// vars
			$bg_color = get_field('bg_color', $item);
			$text_color = get_field('text_color', $item);
			$footnote = get_field('footnote', $item);

			if( $bg_color ) {
				$item_before = '<div data-bg-color="'. $bg_color .'" data-text-color="' . $text_color . '">';
				$item_after = '<sup>' . $key . '</sup></div>';
				$item->title = $item_before . $item->title . $item_after;
			}
		}
	}

	// return
	return $items;

}

/**
 * Display main menu footnotes
 */

function my_wp_nav_menu_items( $items, $args ) {

	// get menu
	$menu = wp_get_nav_menu_items($args->menu);

	// modify primary only
	if( $args->theme_location == 'menu-1' ) {

		// closes main menu items list
		$footnotes = '</ul>';

		// begins footnote list
		$footnotes .= '<ul class="footnotes">';

		foreach( $menu as $key=>$item ) {
			$footnote = get_field('footnote', $item);

			$footnotes .= '<li class="hrlr-menu-footnote">';
				$footnotes .= '<sup>';
				$footnotes .= $key + 1;
				$footnotes .= '</sup>';
			$footnotes .= $footnote;
			$footnotes .= '</li>';
		}

		// Wordpress adds final </ul>

		$items = $items . $footnotes;

	}

	// return
	return $items;
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);
