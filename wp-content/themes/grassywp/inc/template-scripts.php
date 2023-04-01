<?php
/**
 * Enqueue scripts and styles.
 */

function grassywp_scripts() {
	//register style
	wp_enqueue_style( 'boostrap', get_template_directory_uri() .'/css/bootstrap.min.css' );	
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/css/slick.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/css/magnific-popup.css');
	wp_enqueue_style( 'grassywp-style-default', get_template_directory_uri() .'/css/default.css' );
	wp_enqueue_style( 'grassywp-style-menu', get_template_directory_uri() .'/css/menu.css' );
	wp_enqueue_style( 'grassywp-style-responsive', get_template_directory_uri() .'/css/responsive.css' );
	wp_enqueue_style( 'grassywp-style', get_stylesheet_uri() );
	
	
	wp_enqueue_script( 'grassywp-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'grassywp-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'grassywp-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'grassywp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );
	if(is_page_template('page-single.php')){
 	wp_enqueue_script('singlePageNav', get_template_directory_uri() . '/js/jquery.singlePageNav.min.js', array('jquery'), '20151343414', true);
 	wp_enqueue_script('grassywp-inner', get_template_directory_uri() . '/js/inner.js', array('jquery'), '201513434', true); 
	}
	wp_enqueue_script('grassywp-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '201513434', true); 	 
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'grassywp_scripts' );

	
	
	
	//adding admin css and js here	
	add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
	function load_admin_styles() {
		wp_enqueue_style( 'admin_css_grassy', get_template_directory_uri() . '/css/admin-style.css', true, '1.0.0' );
		wp_enqueue_script( 'grassywp-admin-script', get_template_directory_uri() . '/js/admin-script.js', array('jquery'), '20151215', true );
		
	}  
?>
