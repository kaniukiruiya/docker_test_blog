<?php
/**
 /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grassywp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grassywp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grassywp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Off Canvas Sidebar', 'grassywp' ),
		'id'            => 'sidebarcanvas-1',
		'description'   => esc_html__( 'Add widgets here.', 'grassywp' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

 	register_sidebar( array(
			'name' => __( 'Footer One Widget Area', 'grassywp' ),
			'id' => 'footer1',
			'description' => __( 'Add Text widgets area', 'grassywp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 		 				

	 register_sidebar( array(
			'name' => __( 'Footer Two Widget Area', 'grassywp' ),
			'id' => 'footer2',
			'description' => __( 'Add text box widgets area', 'grassywp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 
	 register_sidebar( array(
			'name' => __( 'Footer Three Widget Area', 'grassywp' ),
			'id' => 'footer3',
			'description' => __( 'Add text box widgets area', 'grassywp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 
			 register_sidebar( array(
			'name' => __( 'Footer Four Widget Area', 'grassywp' ),
			'id' => 'footer4',
			'description' => __( 'Add text box widgets area', 'grassywp' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );				
}
add_action( 'widgets_init', 'grassywp_widgets_init' );