<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package grassywp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function grassywp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'grassywp_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function grassywp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}

add_action( 'wp_head', 'grassywp_pingback_header' );

/*
Register Fonts theme google font
*/
function grassy_studio_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'grassywp' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat|Open Sans
:300,400,400italic,600,700italic,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function grassy_studio_scripts() {
    wp_enqueue_style( 'studio-fonts', grassy_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'grassy_studio_scripts' );


//Favicon Icon
function grassy_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
  	global $grassywp_option;
  	 
  	if(!empty($grassywp_option['grassy_favicon']['url']))
  	{?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($grassywp_option['grassy_favicon']['url'])); ?>">	
 	<?php }
	}
}
add_filter('wp_head', 'grassy_site_icon');


//demo content file include here

function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Grassy Demo Import',
			'categories'                 => array( 'Category 1' ),
			'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/grassy.wordpress.xml',
			'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/grassy-widgets.wie',			
			'import_redux'               => array(
				array(
					'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/redux_options_grassywp.json',
					'option_name' => 'grassywp_option',
				),
			),
			
			'import_notice'              => __( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'grassywp' ),
			
		),
		
	);
}

add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$main_menu_single = get_term_by( 'name', 'Main Menu Single', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'menu-1' => $main_menu->term_id,
			'menu-2' => $main_menu_single->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID ); 

	//Import Revolution Slider
  if ( class_exists( 'RevSlider' ) ) {
     $slider_array = array(
        get_template_directory()."/ocdi/slider/home1.zip",
        get_template_directory()."/ocdi/slider/homepage2.zip",
        get_template_directory()."/ocdi/slider/home-transparent.zip",
        get_template_directory()."/ocdi/slider/video.zip"         
     );

     $slider = new RevSlider();

     foreach($slider_array as $filepath){
       $slider->importSliderFromPost(true,true,$filepath);  
     }
  }  
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );