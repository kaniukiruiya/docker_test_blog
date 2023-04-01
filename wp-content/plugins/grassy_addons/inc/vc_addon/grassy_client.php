<?php
/*
Element Description: Grassy Client elements
*/
// Element Mapping

function vc_grassyClient_mapping() {
	 
	// Stop all if VC is not enabled
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}
	 
	// Map the block with vc_map()
	vc_map( 
		array(
			'name' => __('Grassy Client Module', 'grassywp'),
			'base' => 'vc_grassyClient',
			'description' => __('Grassy Client Module', 'grassywp'), 
			'category' => __('by RS Theme', 'grassywp'),   
			'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',    
			'params' => array( 
			array(
				'type' => 'textfield',
				'holder' => 'h3',
				'class' => 'title-class',
				'heading' => __( 'Post Per Page', 'grassywp' ),
				'param_name' => 'title',
				'value' => __( '6', 'grassywp' ),				
				'admin_label' => false,
				'weight' => 0,
				'description' => __( 'Write -1 to show all', 'grassywp' ),	
			   
			),  

			array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'grassywp' ),
					"param_name" => "col_lg",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "6",
					"group" 	  => __( "Slider Options", 'grassywp' ),
						
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'grassywp' ),
					"param_name" => "col_md",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "6",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'grassywp' ),
					"param_name" => "col_sm",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'grassywp' ),
					"param_name" => "col_xs",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "2",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'grassywp' ),
					"param_name" => "col_mobile",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "1",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					
					),

					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'grassywp' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'grassywp' ) => 'false',
						__( 'Enabled', 'grassywp' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'grassywp' ),
					"group" => __( "Slider Options", 'grassywp' ),
					
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'grassywp' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "grassywp" )  => 'true',
						__( "Disable", "grassywp" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'grassywp' ),
					"group" => __( "Slider Options", 'grassywp' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'grassywp' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "grassywp" )  => 'true',
						__( "Disable", "grassywp" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'grassywp' ),
					"group" => __( "Slider Options", 'grassywp' ),
					
					),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'grassywp' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "grassywp" )  => '5000',
						__( "4 Seconds", "grassywp" )  => '4000',
						__( "3 Seconds", "grassywp" )  => '3000',
						__( "2 Seconds", "grassywp" )  => '4000',
						__( "1 Seconds", "grassywp" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'grassywp' ),
					"group" 	  => __( "Slider Options", 'grassywp' ),
					
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'grassywp' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'grassywp' ),
					"group" 	  => __( "Slider Options", 'grassywp' ),
					
					),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'grassywp' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "grassywp" )  => 'true',
						__( "Disable", "grassywp" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'grassywp' ),
					"group" 	 => __( "Slider Options", 'grassywp' ),
					),
					


			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'grassywp' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'grassywp' ),
			),	
			
			array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'grassywp' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'grassywp' ),
			),           
		 ),
		)
	);                                
	
}
     
 add_action( 'vc_before_init', 'vc_grassyClient_mapping' );
     
    // Element HTML
   function vc_grassyClient_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '6',
                    'col_lg'                => '6',
					'col_md'                => '6',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'true',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',
                    'el_class' => '',					
					'css' => ''            
                ), 
                $atts,'vc_grassyClient'
           )
        );
	
       //post per page
	   $per_page=$title;
	  
	   //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
	
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'false' ) ? false : true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );
		
        //******************//
        // query post
        //******************//
		
		$html='<div class="rs-partner '.$css_class.' '.$css_class_custom.'">           
					<div class="partner-carousel owl-carousel" data-carousel-options="'.esc_attr( $owl_data ).'">';      
		
						$best_wp = new wp_Query(array(
									'posts_per_page' =>$per_page,
									'post_type'=>'client',
									'order' => 'DESC',
								));			   
						
							while($best_wp->have_posts()): $best_wp->the_post();
							   $post_title= get_the_title($best_wp->ID);				
							   $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');	
							   $client_link = get_post_meta( get_the_ID(), 'client_link', true );	    		
						
		$html .='<div class="partner-item">
				<a href="'.$client_link.'" target="_blank"><img src="'.$post_img_url.'" alt="'.$post_title.'"></a>
				</div>';
			endwhile; 
			wp_reset_query();
		$html .='</div>
	</div>';
 return $html; 
}
add_shortcode( 'vc_grassyClient', 'vc_grassyClient_html' );