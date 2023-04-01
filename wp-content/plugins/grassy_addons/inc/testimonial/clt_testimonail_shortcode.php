<?php

add_action('init', 'clt_testimonial_vc_addon_cpt');
function clt_testimonial_vc_addon_cpt() {
    register_post_type('clt_testimonials', array(
        'labels' => array(
            'name' => __('CL Testimonials', 'cl-testimonial-visual-composer-addon'),
            'singular_name' => __('CL Testimonial', 'cl-testimonial-visual-composer-addon'),
            'menu_name' => __('CL Testimonials', 'cl-testimonial-visual-composer-addon'),
            'parent_item_colon' => __('Parent Testimonial:', 'cl-testimonial-visual-composer-addon'),
            'all_items' => __('All Testimonials', 'cl-testimonial-visual-composer-addon'),
            'view_item' => __('View Testimonial', 'cl-testimonial-visual-composer-addon'),
            'add_new_item' => __('Add New Testimonial', 'cl-testimonial-visual-composer-addon'),
            'add_new' => __('Add New', 'cl-testimonial-visual-composer-addon'),
            'edit_item' => __('Edit Testimonial', 'cl-testimonial-visual-composer-addon'),
            'update_item' => __('Update Testimonial', 'cl-testimonial-visual-composer-addon'),
            'search_items' => __('Search Testimonial', 'cl-testimonial-visual-composer-addon'),
            'not_found' => __('Not found', 'cl-testimonial-visual-composer-addon'),
            'not_found_in_trash' => __('Not found in Trash', 'cl-testimonial-visual-composer-addon')
			),
			
			'public' => true,
			'menu_position' => 20,
			'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array(''),
			'register_meta_box_cb' => 'clt_testimonials_meta_box',
			'has_archive' => true
		)
    );
}


function cl_testimonial_function( $atts, $content ) {
	$attributes = array();
    extract(
		$atts = shortcode_atts(	
		array(
			'title' => '',
			'designation' => '',
			'titlecolor' => '',
			'dsignation_color' => '',
			'content_color' => '',
			'dsignation_bg_color' => '',
			'type' =>'Slider',
			'testi_style' =>'Style 1',				
			'testi_perpage' =>'2'				
			
		), $atts, 'clt_testimonial'
	)	
);


//checking testimonial type
if($type=='Slider'){
$post_title_show='';
$degination='';
$best_wp = new wp_Query(array(
	'post_type' => 'clt_testimonials',
	'posts_per_page' => -1,
));	

 $html= '<div id="rs-testimonial" class="rs-testimonial">
	    <div class="container">                
		<div class="testi-carousel row">';
			 $i=1;
			 $active="";
			 while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   $post_content= get_the_content($best_wp->ID);
			   
				if($title!='No'){
					 $post_title_show= get_the_title($best_wp->ID);
				}	
						
				$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
								
				if($degination!='No'){
				$designation = get_post_meta( get_the_ID(), 'designation', true );
				}
		
	

	//if this is first value in row, create new row
  
	    $html .='<div class="testi-item col-md-4">';	 
		$html .= '
			<a data-toggle="tab" href="#tab'.$i.'">
				<div class="testi-img">
					<img src="'.$post_img_url .'" alt="Client Image">
				</div>
				<h3 class="testi-name">'.$post_title.'</h3>
				<span class="testi-title">'.$designation.'</span>
			</a>';
			
		 $html .='<div class="tab-pane tab-text animated flipInX in '.$active.'">
			<div class="testi-content">
			  <p> '.$post_content.'</p>
			</div>
		</div>';

$html .='</div>';
$i++;
endwhile;		
$html .='</div>';
$html .='</div>
</div>';
}

else{
	$testi_per_item=$testi_perpage;
	if($testi_style=='Style 1'){
	$post_title_show='';
	$degination='';
	$best_wp = new wp_Query(array(
		'post_type' => 'clt_testimonials',
		'posts_per_page' => $testi_per_item,
	));	

  	$html= '<div id="grid-testimonial2" class="rs-testimonial">
	        <div class="container"> ';              
	
			 $active="";
			 while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   $post_content= get_the_content($best_wp->ID);
			   
				if($title!='No'){
					 $post_title_show= get_the_title($best_wp->ID);
				}	
						
				$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
								
				if($degination!='No'){
				$designation = get_post_meta( get_the_ID(), 'designation', true );
				}
		
	

	//if this is first value in row, create new row
  
	$html .='<div class="testi-item col-md-4">';	 
	$html .= '
			
			';
		
	 $html .='<div class="content-inner'.$active.'">
				<div class="testi-content1">
				  <p> '.$post_content.'</p>
				</div>
				<div class="testi-img">
					<img src="'.$post_img_url .'" alt="Client Image">
				</div>
				<div class="name-title">
				<h3 class="testi-name">'.$post_title.'</h3>
				<span class="testi-title">'.$designation.'</span>
				</div>
			</div>';

$html .='</div>';
	
	endwhile;		
	
	$html .='</div>
			</div>';
}
	
	if($testi_style=='Style 2'){
	$post_title_show='';
	$degination='';
	$best_wp = new wp_Query(array(
		'post_type' => 'clt_testimonials',
		'posts_per_page' => $testi_per_item,
	));	

 	$html= '<div id="grid-testimonial3" class="rs-testimonial">
			<div class="container">                
		';
			 
			 $active="";
			 while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   $post_content= get_the_content($best_wp->ID);
			   
				if($title!='No'){
					 $post_title_show= get_the_title($best_wp->ID);
				}	
						
				$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
								
				if($degination!='No'){
				$designation = get_post_meta( get_the_ID(), 'designation', true );
				}
		
	

	//if this is first value in row, create new row
  
	$html .='<div class="testi-item col-md-12">';	 
		$html .= '
			
				<div class="testi-img">
					<img src="'.$post_img_url .'" alt="Client Image">
				</div>
				<h3 class="testi-name">'.$post_title.'</h3>
				<span class="testi-title">'.$designation.'</span>
			';
			
	 $html .='<div class="'.$active.'">
		<div class="testi-content2">
		  <p> '.$post_content.'</p>
		</div>
	</div>';

	$html .='</div>';
	
	endwhile;		
	
	$html .='</div>
</div>';
	}	
}

return $html;
}
?>
