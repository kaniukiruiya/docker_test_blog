<?php
/*
Element Description: Grassy Services Box
*/
    // Element Mapping
     function vc_grassyServices_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Service Box', 'grassywp'),
                'base' => 'vc_grassyServices',
                'description' => __('Grassy Service Box Information', 'grassywp'), 
                'category' => __('by RS Theme', 'grassywp'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Grassy Service Title ', 'grassywp' ),
                        'param_name' => 'title',
                        'value' => __( '', 'grassywp' ),
                        'description' => __( 'Grassy services title here', 'grassywp' ),
                        'admin_label' => false,
                        'weight' => 0,
                       
                    ),                   
             				
					array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Services content here", "grassywp" ),
						"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a 	"param_name"
						"value" =>'',
						"description" => __( "Duis in mi erat. Phasellus vitae in to lorem vehicula, viverra libero quis, sodalesnulla. Donec at the turpis quis tellus laoreet.", "grassywp" )
					 ),
					 
					 array(
						"type" => "dropdown",
						"heading" => __("Select Sevices Style", "grassywp"),
						"param_name" => "service_style",
						"value" => array(						    
							'Style 1' => "Style 1",						
							'Style 2' => "Style 2", 
							 																																															
						),						
					),					 
					
					 array(
							"type"        => "attach_image",
							"heading"     => __( "Service Image", "grassywp" ),
							"description" => __( "Add services image", "grassywp" ),
							"param_name"  => "screenshots",
							"value"       => "",
							"dependency" => Array('element' => 'service_style', 'value' => array('Style 2')),
						),				
					
									
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Service Icon', 'grassywp' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-users', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),					
						'description' => __( 'Select icon from library.', 'grassywp' ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 1')),
					),
					
					array(
						'type' => 'vc_link',
						'heading' => __( 'URL (Link)', 'grassywp' ),
						'param_name' => 'button_link',
						'description' => __( 'Add link to Serices Pages.', 'grassywp' ),						
					),
												
					
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "grassywp" ),
						"param_name" => "titlecolor",
						"value" => '#212121', //Default Red color
						"description" => __( "Choose color", "grassywp" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
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
     
  add_action( 'vc_before_init', 'vc_grassyServices_mapping' );
     
    // Element HTML
    function vc_grassyServices_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'icon_fontawesome' => 'fa fa-users',
					'icon' => 'Image',					
					'titlecolor' => '',
					'text_font' => '',
					'el_class' =>'',
					'service_style' => 'Style 1',
					'button_link' => '',
					'css' => '','vc_grassyServices'
                ), 
                $atts,'vc_grassyServices'
            )
        );
	
        $a = shortcode_atts(array(
          'screenshots' => 'screenshots',
        ), $atts);
        
		
		//Link check
		
		//parse link for vc linke		
		$button_link = ( '||' === $button_link ) ? '' : $button_link;
		$button_link = vc_build_link( $button_link );
		$use_link = false;
		if ( strlen( $button_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $button_link['url'];
			$a_title = $button_link['title'];
			$a_target = $button_link['target'];
		}
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );
		
		
		//Checl icon or image here		
		
        $img = wp_get_attachment_image_src($a["screenshots"], "large");

        $imgSrc = $img[0];	
		$imageClass='<img src="'.$imgSrc.'" alt="grassy-service" />';
		
		$icon = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
		$iconClass='<i class="'.$icon.'"></i>';
		
		//extract content
		$atts['content'] = $content;

		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
		
        //checking services style
                
        // Fill $html var with data
		if($service_style=='Style 1')
		{
        $html = '
		<div class="rs-services">
		<div class="services-wrap '.$css_class.' '.$css_class_custom.'"> 
         <div class="services-item">
            <div class="services-icon">
                '.$iconClass.'
             </div>
        
			<div class="services-desc">
				<h2 class="services-title"><a '. $attributes.'>'.$title.'</a></h2>
				'.$atts['content'].' 
				</div>
			</div>	
		</div></div>
	';   	
  	return $html;
	}
	else{
		$html = '<div class="rs-services"><div class="service-inner services-style-2 '.$css_class.' '.$css_class_custom.'">
		<div class="services-wrap"> 
         <div class="services-item">
            <div class="services-icon">
                '.$imageClass.'
             </div>
        
		<div class="services-desc">			
			'.$atts['content'].' 
		</div>		
		</div>	
	</div>
	<h2 class="services-title services-title2"><a '. $attributes.'>'.$title.'</a></h2>
	</div></div>';   	
  		return $html;
	}
 }
add_shortcode( 'vc_grassyServices', 'vc_grassyServices_html' );
 