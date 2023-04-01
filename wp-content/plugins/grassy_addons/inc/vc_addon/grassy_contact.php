<?php
/*
Element Description: Grassy Contact Module
*/
 
     
    // Element Mapping
    function vc_contact_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Contact Information', 'grassywp'),
                'base' => 'vc_contact',
                'description' => __('Grassy contact info box', 'grassywp'), 
                'category' => __('by RS Theme', 'grassywp'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Primary Phone', 'grassywp' ),
                        'param_name' => 'primary_phone',
                        'value' => __( '', 'grassywp' ),
                        'description' => __( 'Primary phone no. here', 'grassywp' ),
                        'admin_label' => false,
                        'weight' => 0,
                       
                    ),  
                     
                    array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'text-class',
                        'heading' => __( 'Secondary Phone', 'grassywp' ),
                        'param_name' => 'secondary_phone',
                        'value' => __( '', 'grassywp' ),
                        'description' => __( 'Secondaey phone no. here', 'grassywp' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),
					
					  array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'text-class',
                        'heading' => __( 'Email Address', 'grassywp' ),
                        'param_name' => 'email_address',
                        'value' => __( '', 'grassywp' ),
                        'description' => __( 'Enter your email address', 'grassywp' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),
					
					 array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'text-class',
                        'heading' => __( 'Website URL', 'grassywp' ),
                        'param_name' => 'web_url',
                        'value' => __( '', 'grassywp' ),
                        'description' => __( 'Enter your web address', 'grassywp' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),
					
					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Adress", "grassywp" ),
						"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a 	"param_name"
						"value" =>'',
						"description" => __( "Enter your address.", "grassywp" )
					 ),
				
						array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
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
	add_action( 'vc_before_init', 'vc_contact_mapping' );
	
  
    // Element HTML
    function vc_contact_html( $atts,$content ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'primary_phone'   => '',
					'secondary_phone' => '',
					'email_address' => '',
					'el_class' =>'',
                    'web_url' => '',                    
					'css' =>''
                ), 
                $atts, 'vc_contact'
            )
        );
		
		//extract content
		$atts['content'] = $content;
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
	 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
    
         
        // Fill $html var with data
        $html = '
		<div class="rs-contact">
       <div class="contact-address '.$css_class.' '.$css_class_custom.'">';
	   
	   if($primary_phone!='' || $secondary_phone!=''){
		   
	      
      $html .='<div class="address-item">
				<div class="address-icon">
					<i class="fa fa-phone"></i>
				</div>
				<div class="address-text">
					'.$primary_phone.' <br>
					'.$secondary_phone.'
				</div>
			</div>';
			
	   }
	   if($email_address!='' || $web_url!=''){
		   
		$html .='<div class="address-item">
				<div class="address-icon">
					<i class="fa fa-envelope-o"></i>
				</div>
				<div class="address-text">
					'.$email_address.' <br>
					'.$web_url.'
				</div>
			</div>';
	   }
		
		if($content!=''){
			
		$html .='<div class="address-item">
				<div class="address-icon">
					<i class="fa fa-map-marker"></i>
				</div>
				<div class="address-text">
					'.$content.'
				</div>
			</div>
		</div>
		</div>';
		}         
   return $html;         
}

add_shortcode( 'vc_contact', 'vc_contact_html' );