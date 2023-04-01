<?php

	// Element Mapping
	 function vc_counter_mapping() {
         
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
         
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Grassy Counter', 'grassywp'),
            'base' => 'vc_counter',
            'description' => __('Grassy counter for project', 'grassywp'), 
            'category' => __('by RS Theme', 'grassywp'),   
            'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',            
            'params' => array(   
                      
                array(
                    'type' => 'textfield',
                    'holder' => 'h3',
                    'class' => 'title-class',
                    'heading' => __( 'Porject Title', 'grassywp' ),
                    'param_name' => 'title',
                    'value' => __( '', 'grassywp' ),
                    'description' => __( 'Project Title', 'grassywp' ),
                    'admin_label' => false,
                    'weight' => 0,
                   
                ),  
				
				  array(
                    'type' => 'textfield',
                    'holder' => 'h3',
                    'class' => 'project-class',
                    'heading' => __( 'Project Count', 'grassywp' ),
                    'param_name' => 'project',
                    'value' => __( '', 'grassywp' ),
                    'description' => __( 'Project counter (Example: 100 only number)', 'grassywp' ),
                    'admin_label' => false,
                    'weight' => 0,
                    
                ), 
                  
                array(
						'type' => 'iconpicker',
						'heading' => __( 'Portfolio Icon', 'grassywp' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-user', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
					
						'description' => __( 'Select icon from library.', 'grassywp' ),
					),
					 array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'grassywp' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'grassywp' 										                            ),
						),        
                     
           		 )
        )
    );                                
        
}

 add_action( 'vc_before_init', 'vc_counter_mapping' );
 
// Element HTML
function vc_counter_html( $atts ) {
     
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'title'   => '',
                'project' => '',
				'icon_fontawesome' =>'fa fa-user',
				'el_class' =>'',
            ), 
            $atts,'vc_counter'
        )
    );
	
     //custom class added
	$wrapper_classes = array($el_class) ;			
	$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
	$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
    $html = '
	<div class="counter-top-area">
    <div class="rs-counter-list">     
		<i class="'.$icon_fontawesome.'"></i>
        <h2 class="rs-counter">' . $project. '</h2>         
        <h3>'.$title.'</h3>
     
    </div></div>';      
     
    return $html;
     
}
add_shortcode( 'vc_counter', 'vc_counter_html' );