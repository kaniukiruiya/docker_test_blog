<?php
$randvalue=rand(0,10000);
$popular='';

if( $atts['featured'] == 'true' ){
	if($atts['feature_text']!=''){
	$featured = '<span class="popular">' .$atts['feature_text'].'</span>';
	}
	$featured_class='featured';
	$popular='popular_plan';
}

$html='<section class="cl-pricing-wrap '.$atts['style'].'-'.$randvalue.'">
		  <div class="clpricing-table">
			<div class="price-table '.$atts['style'].'">
			<div class="cl-pricetable-wrap '.$popular.'  price-'.$atts['style'].'" style="background:'.$atts['boxes_color'].'; border:1px solid '.$atts['boxes_color'].'">
			<div class="top">
		 		'.$featured.'
				<div class="cl-header">
                  
            <h4 style="color:'.$atts['title_color'].'; background:'.$atts['title_background'].'">'.$atts['title'].' <span class="dolar"  style="color:'.$atts['title_background'].'"></span></h4> 
			<h5 style="color:'.$atts['title_color'].'">'.$atts['per'].'</h5>          
          </div>		   
       
			</div>
			<div class="featured"  style="color:'.$atts['text_color'].'"><p>
			  '.$atts['content'].'
			</div>
			
			<div class="bottom">
				<div class="dolar" style="color:'.$atts['text_color'].'">'.$atts['currency'].$atts['price'].'</div>
					'.$btn_code.'
					</div>	
				</div>
			</div>			
		</div>		  
	</section>	
	
';
		
		
return $html;
?>
