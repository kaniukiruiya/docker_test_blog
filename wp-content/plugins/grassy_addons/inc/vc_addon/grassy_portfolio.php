<?php
/*
Element Description: Grassy Portfolio Box
*/
     // Element Mapping
    function vc_grassyPortfolio_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Portfolio Box', 'grassywp'),
                'base' => 'vc_grassyPortfolio',
                'description' => __('Grassy Portfolio Box Information', 'grassywp'), 
                'category' => __('by RS Theme', 'grassywp'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                         
                     array(
						"type" => "dropdown",
						"heading" => __("Show title", "grassywp"),
						"param_name" => "title",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",
						),						
					),
                     
             				
					array(
						"type" => "dropdown",
						"heading" => __("Show tagline", "grassywp"),
						"param_name" => "tagline",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No", 																																															
						),
						
					),
					
					array(
						'type' => 'textfield',
						'holder' => 'h3',						
						'heading' => __( 'Project Per Page', 'grassywp' ),
						'param_name' => 'per_page',
						'value' => __( '', 'grassywp' ),
						'description' => __( 'How many project want to show per page', 'grassywp' ),
						'admin_label' => false,
						'weight' => 0,
						'value' => '9'
					   
					),  
					
					array(
						"type" => "dropdown",
						"heading" => __("How many Column ", "grassywp"),
						"param_name" => "column",
						"value" => array(							    						
							
							'Two' => "Two",
							'Four' => "Four", 
							'Three' => "Three",
							'Full' => "Full",
						),
						
					),
					
												 
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Portfolio Icon', 'grassywp' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-search', // default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
					
						'description' => __( 'Select icon from library.', 'grassywp' ),
					),					
				  
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Icon color', 'grassywp' ),
						'param_name' => 'color',
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "grassywp" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),		
							
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "grassywp" ),
						"param_name" => "titlecolor",
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "grassywp" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),					  
							 
					
					array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Tag line color", "grassywp" ),
					"param_name" => "linecolor",
					"value" => '#ffffff', //Default  color
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
     add_action( 'vc_before_init', 'vc_grassyPortfolio_mapping' );
     
    // Element HTML
     function vc_grassyPortfolio_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'   => '',
                    'tagline' => '',					
					'titlecolor' => '',
					'column' =>'',
					'per_page' => '9',
					'el_class' => '',
					'icon_fontawesome' => 'fa fa-search',
					'color' => '',
					'css' => ''            
                ), 
                $atts,'vc_grassyPortfolio'
           )
        );
	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");

        $imgSrc = $img[0];
		
		//extract content
		$atts['content'] = $content;
		//extact icon 		
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
		
		$col_grid='';
		$col_group='';
		$col_full='';
		$col_filter='';
		$col_grid=$column;
		if($col_grid =='Two'){
			$col_group = 6;
		}
		if($col_grid =='Three'){
			$col_group = 4;
		}
		
		if($col_grid == 'Four'){
			$col_group = 3;
		}
		
		if($col_grid == 'Full'){
			$col_group=3;
			$col_full='full-grid';		
			$col_filter='col-filter';		
		}
		
        //******************//
        // query post
        //******************//

        $html ='<div class="rs-portfolio '.$css_class_custom.' '.$col_filter.'">
		<div class="portfolio-content '.$css_class.'">';
        // Get taxonomy form portfolio
        $html .= '<div class="portfolio-filter">
	                <button class="active" data-filter="*">ALL PROJECT</button>'; 
	                $taxonomy = "portfolio-category";
					$terms = get_terms($taxonomy); // Get all terms of a taxonomy				
					if ( $terms && !is_wp_error( $terms ) ) :
						$x=0;
						foreach ($terms as $term ): 
						 	$x++;
						 	$html .= '<button data-filter=".filter_'.$term->slug.'">'.$term->name.'</button>';				 
						endforeach;
					endif;
                
        $html .=' </div>'; 
		
        $html .='<div class="row"> <div class="grid">'; 
		
				$best_wp = new wp_Query(array(
					'post_type' => 'portfolios',
					'posts_per_page' =>$per_page,
					));	
       			if( $best_wp->have_posts() ): while( $best_wp->have_posts() ) : $best_wp->the_post();
				$termsArray = get_the_terms( $best_wp->ID, "portfolio-category" );  //Get the terms for this particular item
				 $termsString = ""; //initialize the string that will contain the terms
				 foreach ( $termsArray as $term ) { // for each term 
				 $termsString .= $term->slug.' '; //create a string that has all the slugs 
				 }
				
			   $post_title= get_the_title($best_wp->ID);
			  
			    if($title!='No'){
			   		 $post_title_show= get_the_title($best_wp->ID);
				}	
				else{
					 $post_title_show='';
				}			
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
			    $post_url=get_post_permalink($best_wp->ID); 
				if($tagline!='No'){
			   		 $post_tagline = get_post_meta( get_the_ID(), 'tagline', true );
				}
				else{
					 $post_tagline='';
					}	
						
				$html .='
				
				<div class="col-md-'.$col_group.' '.$col_full.' col-xs-6 grid-item mb-30 filter_'.$termsString.'">
                            <div class="portfolio-item">
                                <div class="portfolio-img">
                                   <img src="'.$post_img_url.'" alt="'.$post_title.'" />
                                </div>
                                <div class="portfolio-content">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <a class="image-popup p-zoom" href="'.$post_img_url.'">
                                                <span class="vc_icon_element-icon '.$icon_fontawesome.'" style="color:'.$color.'"></span>
                                            </a>
                                            <h3 class="p-title"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>											
                                            <p class="p-desc">'.$post_tagline.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
					
						endwhile; 
				wp_reset_query();
			endif;
			
		$html .= "</div></div>
		</div>
		</div>";		
	  return $html; 
    }

add_shortcode( 'vc_grassyPortfolio', 'vc_grassyPortfolio_html' );  