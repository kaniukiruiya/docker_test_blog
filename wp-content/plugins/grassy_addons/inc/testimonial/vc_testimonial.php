<?php
function clt_testimonial_slider() {

    // Title
    vc_map(
        array(
            'name' => __( 'CL Testimonial','js_composer' ),
            'base' => 'clt_testimonial',		
            'category' => __( 'Content', 'js_composer' ),
			'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',
			'category' => __('by RS Theme', 'grassywp'), 
			'is_container' => true,
			'params' => array(
                		array(
						"type" => "dropdown",
						"heading" => __("Show Title", "js_composer"),
						"param_name" => "title",
						"value" => array(							
							'Show' => "show",
							'Hide' => "hide", 																																															
							),
						
						),
					
						array(
							"type" => "dropdown",
							"heading" => __("Show Designation", "js_composer"),
							"param_name" => "designation",
							"value" => array(							
								'Show' => "show", 
								'Hide' => "hide", 																																															
							),						
						),

						array(
							"type" => "dropdown",
							"heading" => __("Testimonial Type", "grassywp"),
							"param_name" => "type",
							"value" => array(							
								'Slider' => "Slider", 
								'Grid' => "Grid"																																														
							),
							
						),

						array(
							"type" => "dropdown",
							"heading" => __("Select Testimonial Style", "grassywp"),
							"param_name" => "testi_style",
							"value" => array(							
								'Style 1' => "Style 1", 
								'Style 2' => "Style 2",																																															
							),
							"dependency" => Array('element' => 'type', 'value' => array('Grid')),						
						),	

						array(
							"type" => "textfield",
							"heading" => __("Testimonial Perpage", "grassywp"),
							"param_name" => "testi_perpage",
							"value" =>'2',
							"dependency" => Array('element' => 'type', 'value' => array('Grid')),						
						),			
				
					
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Title color", "my-text-domain" ),
							"param_name" => "titlecolor",
							"value" => '#212121', //Default Red color
							"description" => __( "Choose color", "my-text-domain" ),
							'admin_label' => false,
							'weight' => 0,
							'group' => 'Style',
						 ),				 
					
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Designation color", "my-text-domain" ),
							"param_name" => "dsignation_color",
							"value" => '#666666', //Default Red color
							"description" => __( "Choose color", "my-text-domain" ),
							'admin_label' => false,
							'weight' => 0,
							'group' => 'Style',
						 ),
					 
						 array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Testimonial Content color", "my-text-domain" ),
							"param_name" => "content_color",
							"value" => '#fff', //Default Red color
							"description" => __( "Choose color", "my-text-domain" ),
							'admin_label' => false,
							'weight' => 0,
							'group' => 'Style',
						 ),		
					 
						 array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __( "Testimonial Content Background", "my-text-domain" ),
							"param_name" => "dsignation_bg_color",
							"value" => '#4caf50', //Default Red color
							"description" => __( "Choose color", "my-text-domain" ),
							'admin_label' => false,
							'weight' => 0,
							'group' => 'Style',
						 ),						 
												
								
            )
        )
    );
}
add_action( 'vc_before_init', 'clt_testimonial_slider' );

add_shortcode( 'clt_testimonial', 'cl_testimonial_function' );

?>