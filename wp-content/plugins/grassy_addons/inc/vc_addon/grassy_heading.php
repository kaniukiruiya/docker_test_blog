<?php
/*
Element Description: Grassy Custom Heading*/

    // Element Mapping
    function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Heading', 'grassywp'),
                'base' => 'vc_infobox',
                'description' => __('Grassy heading box', 'grassywp'), 
                'category' => __('by RS Theme', 'grassywp'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
			array(
				'type' => 'textfield',
				'holder' => 'h3',
				'class' => 'title-class',
				'heading' => __( 'Title', 'grassywp' ),
				'param_name' => 'title',
				'value' => __( '', 'grassywp' ),
				'description' => __( 'Heading title area', 'grassywp' ),
				'admin_label' => false,
				'weight' => 0,
			   
			),  
			 
			array(
				'type' => 'textfield',
				'holder' => 'h4',
				'class' => 'text-class',
				'heading' => __( 'Subtitle', 'grassywp' ),
				'param_name' => 'text',
				'value' => __( '', 'grassywp' ),
				'description' => __( 'Sub title text here', 'grassywp' ),
				'admin_label' => false,
				'weight' => 0,                        
			),		
			
			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'grassywp' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'grassywp' ),
			),		
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Title color", "grassywp" ),
				"param_name" => "titlecolor",
				"value" => '#4caf50', //Default Red color
				"description" => __( "Choose title color", "grassywp" ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
			 ),
			 
			 array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __( "Subtitle color", "grassywp" ),
				"param_name" => "subcolor",
				"value" => '#212121', //Default Red color
				"description" => __( "Choose subtitle color", "grassywp" ),
				'admin_label' => false,
				'weight' => 0,
				'group' => 'Style',
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
  
add_action( 'vc_before_init', 'vc_infobox_mapping' );
  
 // Element HTML
 function vc_infobox_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
					'titlecolor' => '',
					'subcolor' => '',
                    'text' => '',                    
					'font_heading_container' => '',
					'el_class' =>'',
					'css' => ''
                ), 
                $atts, 'vc_infobox'
            )
        );
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
         //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
         
        // Fill $html var with data
        $html = '
        <div class="sec-title '.$css_class.' '.$css_class_custom.'">         
            <h4 style="color:'.$titlecolor.'">'.$title.'</h4>             
            <h3 style="color:'.$subcolor.'">' . $text . '</h3>        
        </div>';   	
         
        return $html;
         
    }
add_shortcode( 'vc_infobox', 'vc_infobox_html' );