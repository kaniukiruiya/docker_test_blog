<?php
/**
 * grassywp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grassywp
 */
if ( ! function_exists( 'grassywp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 
 
function grassywp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on grassywp, use a find and replace
	 * to change 'grassywp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'grassywp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );	
	
	function grassywp_custom_excerpt_length( $length ) {
		return 20;
	}	
	add_filter( 'excerpt_length', 'grassywp_custom_excerpt_length', 999 );

	// Changing excerpt more
	function grassy_excerpt_more($more) {
	return '...';
	}
	add_filter('excerpt_more', 'grassy_excerpt_more');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'grassywp' ),
		'menu-2' => esc_html__( 'Single Template Primary Menu', 'grassywp' ),
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
	add_theme_support( 'custom-background', apply_filters( 'grassywp_custom_background_args', array(
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
add_action( 'after_setup_theme', 'grassywp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grassywp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grassywp_content_width', 640 );
}
add_action( 'after_setup_theme', 'grassywp_content_width', 0 );

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/template-scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom Style
 */
require_once get_template_directory() . '/framework/custom.php';


// TGM Plugin Activation
if (is_admin()) {
	require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/framework/tgm-config.php';	
}


/**
 * Redux frameworks additions
 */

require_once get_template_directory() . '/libs/grassywp/config.php';

//remove revolution slid metabox

function grassywp_remove_revolution_slider_meta_boxes() {
	
	remove_meta_box( 'mymetabox_revslider_0', 'client', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'portfolios', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'grassy-team', 'normal' );
}

add_action( 'do_meta_boxes', 'grassywp_remove_revolution_slider_meta_boxes' );	


//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
   }
endif;

function grassywp_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'grassywp_removeDemoModeLink');

//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function grassywp_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'grassywp_wpb_move_comment_field_to_bottom' );	

/**
 * Registers an editor stylesheet for the theme.
 */
function grassywp_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'grassywp_theme_add_editor_styles' );

//woocommerce compatible
add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

/*
 * Enable support for Post Formats.
*/
add_theme_support( 'post-formats', array(
	'aside',
	'image',
	'video',
	'quote',
	'link',
	'gallery',
	'audio',
) );