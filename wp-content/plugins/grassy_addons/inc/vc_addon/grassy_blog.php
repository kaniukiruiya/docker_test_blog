<?php
/*
Element Description: Grassy Blog Box*/
    
    // Element Mapping
     function vc_grassyBlog_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }      
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Grassy Blog Module', 'grassywp'),
                'base' => 'vc_grassyBlog',
                'description' => __('Grassy Blog Module', 'grassywp'), 
                'category' => __('by RS Theme', 'grassywp'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
			
                     array(
						"type" => "dropdown",
						"heading" => __("Show title", 'grassywp'),
						"param_name" => "title",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No",												
						),						
					),                     
             				
					array(
						"type" => "dropdown",
						"heading" => __("Show  Author Info", 'grassywp'),
						"param_name" => "degination",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",																			
						),						
					),					
					array(
						"type" => "dropdown",
						"heading" => __("Show Short Description", 'grassywp'),
						"param_name" => "description",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No", 																			
						),						
					),
					
					array(
						"type" => "dropdown",
						"heading" => __("Blog Style", 'grassywp'),
						"param_name" => "blog_style",
						"value" => array(							    						
							'Slider' => "Slider", 
							'Grid' => "Grid",									
						),						
					),					
					
					array(
							"type" => "dropdown",
							"heading" => __("Blog Column Per Row", 'grassywp'),
							"param_name" => "pre_row",
							"value" => array(							
								'Col-1' => "Col-1", 
								'Col-2' => "Col-2",
								'Col-3' => "Col-3",	
								'Col-4' => "Col-4",																						
							),
							"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),						
						),	
					
					array(
						"type" => "textfield",
						"heading" => __("Post Per page", 'grassywp'),
						"param_name" => "post_per",
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
					"std" => "3",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),	
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
					"std" => "3",
					"group" 	  => __( "Slider Options", 'grassywp' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
     
  add_action( 'vc_before_init', 'vc_grassyBlog_mapping' );    
 
     
   function vc_grassyBlog_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					
                    'title'   => '',
                    'degination' => '',	
					'post_per' => '',	
					'description' => '',
					'blog_style'  =>'Slider',
					'pre_row' => 'Col-2',
					'col_lg'                => '3',
					'col_md'                => '3',
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
					'el_class' =>'',				
					'icon_fontawesome' => 'fa fa-users',					
					'css' => ''            
                ), 
                $atts,'vc_grassyBlog'
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
		$iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		//custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );


		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'false' ) ? false : true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 20,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );
		
		if($blog_style=='Slider'){
		
       
        // query post       	
		
		$html='<div class="rs-blog '.$css_class_custom.'">
		<div class="blog-carousel owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';                      
		$post_title_show='';
		$degination='';

		$best_wp = new wp_Query(array(
					'posts_per_page' =>$post_per,
					'order' => 'DESC',
					'tax_query' => array(
				        array(                
				            'taxonomy' => 'post_format',
				            'field' => 'slug',
				            'terms' => array( 
				                'post-format-aside',
				                'post-format-audio',
				                'post-format-chat',
				                'post-format-gallery',
				                'post-format-image',
				                'post-format-link',
				                'post-format-quote',
				                'post-format-status',
				                'post-format-video'
				            ),
				            'operator' => 'NOT IN'
				        )
				    )
				));	
       
		
			while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   
			    if($title!='No'){
			   		 $post_title_show= get_the_title($best_wp->ID);
				}			
						
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'thumb-medium');
			    $post_url=get_post_permalink($best_wp->ID); 
				
				if($degination!='No'){
			    $designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				$post_date=get_the_date();				
				//$post_comment=get_wp_count_comments($best_wp->ID);
				$post_admin=get_the_author();
				$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	
				$post_content=get_the_excerpt(); 
				$user_id='';
				$author_desigination=get_the_author_meta( 'position', $user_id );
				$comments_count=get_comments_number( '0', '1', '%' );	
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
								
				    $cat_name = esc_html( $categories[0]->name );
				    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}			
			
				 	
		$html .='<div class="blog-item">
				<div class="blog-img"> <img src="'.$post_img_url.'" alt="'.$post_title.'" />
				<div class="cat_name"><a href="'.$link.'">'.$cat_name.'</a></div>
					<div class="blog-img-content">
					<div class="display-table">
						<div class="display-table-cell">
							<a class="blog-link" href="'.$post_url.'" title="'.$post_title.'">
								<i class="fa fa-link"></i>
							</a>
							
						</div>
					</div>
				</div>			  
			</div>
			 <div class="blog-meta">
			 <h3 class="blog-title"><a href="'.$post_url.'"> '.$post_title.' </a></h3>
				<div class="blog-date">
					<i class="fa fa-calendar"></i> '.$post_date.' 
					<span class="author"> <i class="fa fa-user"></i> '.$post_admin.'</span>
				</div>
				<div class="blog-lc">					
					<div class="comment">
						<i class="fa fa-comments"></i> '.$comments_count.'
					</div>
				</div>
			</div>
			
			<div class="blog-desc">
				'.$post_content.'
			</div>
			<div class="blog-button">
				<a href="'.$post_url.'">Read More <i class="fa fa-angle-right"></i></a>
			</div>
		  </div>		
		';
			endwhile; 
			wp_reset_query();
			}
			else
			{	
			
			//checking column grid
			$per_item=$pre_row;
			$col='';
			if($per_item =='Col-1'){				
				$col='12';
				
			}
			if($per_item =='Col-4'){				
				$col='3';				
			}
			if($per_item =='Col-2'){				
				$col='6';				
			}
			if($per_item =='Col-3'){				
				$col='4';				
			}
			
			$html='<div class="rs-blog '.$css_class_custom.'">
					<div>';                      
					$post_title_show='';
					$degination='';
					$categories= '';

					$best_wp = new wp_Query(array(
								'posts_per_page' =>$post_per,
								'order' => 'DESC',
								'tax_query' => array(
							        array(                
							            'taxonomy' => 'post_format',
							            'field' => 'slug',
							            'terms' => array( 
							                'post-format-aside',
							                'post-format-audio',
							                'post-format-chat',
							                'post-format-gallery',
							                'post-format-image',
							                'post-format-link',
							                'post-format-quote',
							                'post-format-status',
							                'post-format-video'
							            ),
							            'operator' => 'NOT IN'
							        )
							    )
							));	
				   
					
						while($best_wp->have_posts()): $best_wp->the_post();
						   $post_title= get_the_title($best_wp->ID);
						   
							if($title!='No'){
								 $post_title_show= get_the_title($best_wp->ID);
							}			
									
							$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'thumb-medium');
							$post_url=get_post_permalink($best_wp->ID); 
							
							if($degination!='No'){
							$designation = get_post_meta( get_the_ID(), 'designation', true );
							}
							
							$post_date=get_the_date();					
							//$post_comment=get_wp_count_comments($best_wp->ID);
							$post_admin=get_the_author();
							$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	
							$post_content=get_the_excerpt(); 
							$user_id='';
							$author_desigination=get_the_author_meta( 'position', $user_id );
							$comments_count=get_comments_number( '0', '1', '%' );
							$categories = get_the_category();

							if ( ! empty( $categories ) ) {

							    $cat_name = esc_html( $categories[0]->name );
							    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
							}					
								
							$html .='<div class="blog-item col-md-'.$col.' col-sm-12 col-xs-12">
							<div class="blog-img"> 
							<img src="'.$post_img_url.'" alt="'.$post_title.'" />	
							   <div class="cat_name">
							   <a href="'.$link.'">'.$cat_name.'</a></div>
								<div class="blog-img-content">
								<div class="display-table">
									<div class="display-table-cell">
										<a class="blog-link" href="'.$post_url.'" title="'.$post_title.'">
											<i class="fa fa-link"></i>
										</a>										
									</div>
								</div>
							</div>			  
						</div>
						 <div class="blog-meta">
						 <h3 class="blog-title"><a href="'.$post_url.'"> '.$post_title.' </a></h3>
							<div class="blog-date">
								<i class="fa fa-calendar"></i> '.$post_date.' <span class="author"> <i class="fa fa-user"></i> '.$post_admin.'</span>
							</div>
							<div class="blog-lc">					
								<div class="comment">
									<i class="fa fa-comments"></i> '.$comments_count.'
								</div>
							</div>
						</div>					
						
						<div class="blog-desc">
							'.$post_content.'
						</div>
						<div class="blog-button">
							<a href="'.$post_url.'">Read More <i class="fa fa-angle-right"></i></a>
						</div>
					  </div>		
					';
			endwhile; 
			wp_reset_query();
				
			}
			$html .='</div>
			</div>';	
					  
			return $html; 
			}

		add_shortcode( 'vc_grassyBlog', 'vc_grassyBlog_html' );