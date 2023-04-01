<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed

*/
add_action('wp_head', 'grassy_custom_colors', 160);
function grassy_custom_colors() { 
global $grassywp_option;	
/***styling options
------------------*/
	if(!empty($grassywp_option['body_bg_color']))
	{
	  	$body_bg=$grassywp_option['body_bg_color'];
	}
	if(!empty($grassywp_option['body_text_color']))
	{
	  	$body_color=$grassywp_option['body_text_color'];
	}	
	if(!empty($grassywp_option['primary_color']))
	{	

		$site_color=$grassywp_option['primary_color'];
		$link_color=$grassywp_option['link_text_color'];
		$link_hover_color=$grassywp_option['link_hover_text_color'];
		$footer_bgcolor=$grassywp_option['footer_bg_color'];	
		$menu_text_color=$grassywp_option['menu_text_color'];
		$menu_text_hover_color=$grassywp_option['menu_text_hover_color'];
		$menu_active_color=$grassywp_option['menu_text_active_color'];
		$drop_down_bg=$grassywp_option['drop_down_bg_color'];
		$dropdown_text_color=$grassywp_option['drop_text_color'];
		$drop_text_hover_color=$grassywp_option['drop_text_hover_color'];

	}

	if(!empty($grassywp_option['drop_text_hoverbg_color']))
	{
	  $drop_text_hoverbg_color=$grassywp_option['drop_text_hoverbg_color'];
	}

	if(!empty($grassywp_option['drop_text_border_color']))
	{
	  $dropdown_border_color=$grassywp_option['drop_text_border_color'];
	}		

	//typography extract for body	

	if(!empty($grassywp_option['opt-typography-body']['color']))
	{
		$body_typography_color=$grassywp_option['opt-typography-body']['color'];
	}

	if(!empty($grassywp_option['opt-typography-body']['font-weight']))
	{
		$body_typography_style=$grassywp_option['opt-typography-body']['font-weight'];
	}

	if(!empty($grassywp_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight=$grassywp_option['opt-typography-body']['line-height'];
	}

	if(!empty($grassywp_option['opt-typography-body']['font-family']))
	{
		$body_typography_font=$grassywp_option['opt-typography-body']['font-family'];
	}

	if(!empty($grassywp_option['opt-typography-body']['font-size']))
	{
		$body_typography_font_size=$grassywp_option['opt-typography-body']['font-size'];
	}	

	//typography extract for menu
	if(!empty($grassywp_option['opt-typography-menu']['color']))
	{
		$menu_typography_color=$grassywp_option['opt-typography-menu']['color'];
	}
	if(!empty($grassywp_option['opt-typography-menu']['font-weight']))
	{
		$menu_typography_weight=$grassywp_option['opt-typography-menu']['font-weight'];
	}
	if(!empty($grassywp_option['opt-typography-menu']['font-family']))
	{
		$menu_typography_font_family=$grassywp_option['opt-typography-menu']['font-family'];
	}
	if(!empty($grassywp_option['opt-typography-menu']['font-size']))
	{	

	$menu_typography_font_fsize=$grassywp_option['opt-typography-menu']['font-size'];	

	}		

	if(!empty($grassywp_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$grassywp_option['opt-typography-menu']['line-height'];

	}

	//typography extract for heading

	if(!empty($grassywp_option['opt-typography-h1']['color']))
	{
		$h1_typography_color=$grassywp_option['opt-typography-h1']['color'];
	}			

	if(!empty($grassywp_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$grassywp_option['opt-typography-h1']['font-weight'];
	}
	if(!empty($grassywp_option['opt-typography-h1']['font-family']))

	{
		$h1_typography_font_family=$grassywp_option['opt-typography-h1']['font-family'];
	}

	if(!empty($grassywp_option['opt-typography-h1']['font-size']))

	{
		$h1_typography_font_fsize=$grassywp_option['opt-typography-h1']['font-size'];	
	}	

	if(!empty($grassywp_option['opt-typography-h1']['line-height']))

	{

		$h1_typography_line_height=$grassywp_option['opt-typography-h1']['line-height'];

	}
	//for h2

	if(!empty($grassywp_option['opt-typography-h2']['color']))

	{

		$h2_typography_color=$grassywp_option['opt-typography-h2']['color'];

	}

	if(!empty($grassywp_option['opt-typography-h2']['font-size']))

	{

		$h2_typography_font_fsize=$grassywp_option['opt-typography-h2']['font-size'];	

	}



	if(!empty($grassywp_option['opt-typography-h2']['font-weight']))

	{

		$h2_typography_font_weight=$grassywp_option['opt-typography-h2']['font-weight'];

	}	

	if(!empty($grassywp_option['opt-typography-h2']['font-family']))

	{

		$h2_typography_font_family=$grassywp_option['opt-typography-h2']['font-family'];

	}

	if(!empty($grassywp_option['opt-typography-h2']['font-size']))

	{

		$h2_typography_font_fsize=$grassywp_option['opt-typography-h2']['font-size'];	

	}	

	

	if(!empty($grassywp_option['opt-typography-h2']['line-height']))

	{

		$h2_typography_line_height=$grassywp_option['opt-typography-h2']['line-height'];

	}



	//FOR h3

	

	

	if(!empty($grassywp_option['opt-typography-h3']['color']))

	{

		$h3_typography_color=$grassywp_option['opt-typography-h3']['color'];	

	}

	if(!empty($grassywp_option['opt-typography-h3']['font-weight']))

	{

		$h3_typography_font_weightt=$grassywp_option['opt-typography-h3']['font-weight'];

	}	

	if(!empty($grassywp_option['opt-typography-h3']['font-family']))

	{

		$h3_typography_font_family=$grassywp_option['opt-typography-h3']['font-family'];

	}

	if(!empty($grassywp_option['opt-typography-h3']['font-size']))

	{

		$h3_typography_font_fsize=$grassywp_option['opt-typography-h3']['font-size'];	

	}	

	

	if(!empty($grassywp_option['opt-typography-h3']['line-height']))

	{

		$h3_typography_line_height=$grassywp_option['opt-typography-h3']['line-height'];

	}



	//FOR h4



	if(!empty($grassywp_option['opt-typography-h4']['color']))

	{

		$h4_typography_color=$grassywp_option['opt-typography-h4']['color'];

	}



		

	if(!empty($grassywp_option['opt-typography-h4']['font-weight']))

	{

		$h4_typography_font_weight=$grassywp_option['opt-typography-h4']['font-weight'];

	}

	if(!empty($grassywp_option['opt-typography-h4']['font-family']))

	{

		$h4_typography_font_family=$grassywp_option['opt-typography-h4']['font-family'];

	}	

	

	if(!empty($grassywp_option['opt-typography-h4']['font-size']))

	{

		$h4_typography_font_fsize=$grassywp_option['opt-typography-h4']['font-size'];

	}



	if(!empty($grassywp_option['opt-typography-h4']['line-height']))

	{

		$h4_typography_line_height=$grassywp_option['opt-typography-h4']['line-height'];

	}



	//for h5

	

	if(!empty($grassywp_option['opt-typography-h4']['color']))

	{

		$h5_typography_color=$grassywp_option['opt-typography-h5']['color'];

	}

		

	if(!empty($grassywp_option['opt-typography-h5']['font-weight']))

	{

		$h5_typography_font_weight=$grassywp_option['opt-typography-h5']['font-weight'];

	}	

	if(!empty($grassywp_option['opt-typography-h5']['font-family']))

	{

		$h5_typography_font_family=$grassywp_option['opt-typography-h5']['font-family'];

	}	

	if(!empty($grassywp_option['opt-typography-h5']['font-size']))

	{

		$h5_typography_font_fsize=$grassywp_option['opt-typography-h5']['font-size'];	

	}

	

	if(!empty($grassywp_option['opt-typography-h5']['line-height']))

	{

		$h5_typography_line_height=$grassywp_option['opt-typography-h5']['line-height'];

	}





	//for h6

	if(!empty($grassywp_option['opt-typography-6']['color']))

	{

		$h6_typography_color=$grassywp_option['opt-typography-6']['color'];

	}

		

	if(!empty($grassywp_option['opt-typography-6']['font-weight']))

	{

		$h6_typography_font_weight=$grassywp_option['opt-typography-6']['font-weight'];

	}



	if(!empty($grassywp_option['opt-typography-6']['font-family']))

	{

		$h6_typography_font_family=$grassywp_option['opt-typography-6']['font-family'];

	}

	



	if(!empty($grassywp_option['opt-typography-6']['font-size']))

	{

		$h6_typography_font_fsize=$grassywp_option['opt-typography-6']['font-size'];

	}

		

	if(!empty($grassywp_option['opt-typography-6']['line-height']))

	{

		$h6_typography_line_height=$grassywp_option['opt-typography-6']['line-height'];

	}



	

?>







<!-- Typography -->



<?php if(!empty($body_color))

{
	global $grassywp_option;
	$hex = $site_color;
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$site_color_rgb = "$r, $g, $b";
	?>
	<style>
	.rs-blog-details .author-block{
	   background: <?php echo esc_attr($site_color); ?> !important;
	}
	.sidenav{
		background: rgba(<?php echo esc_attr($site_color_rgb)?>,.9) !important;
	}
	body{

		background:<?php echo esc_attr($body_bg); ?> !important;
		color:<?php echo esc_attr($body_color); ?> !important;
		font-family: <?php echo esc_attr($body_typography_font);?> !important;
		font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
	    <?php if(!empty($body_typography_lineheight)){
		?>
		line-height:<?php echo esc_attr($body_typography_lineheight);?> !important;
		<?php }?>
		<?php if(!empty($body_typography_style)){
		?>
		font-weight:<?php echo esc_attr($body_typography_style);?> !important;
		<?php }?>	
	}
	.tag-line a{
		border:1px solid <?php echo esc_attr($site_color); ?> !important;
		margin-right: 8px;
		padding: 2px 0;
		border-radius: 5px;
	}
	.tag-line a:hover{
		background: <?php echo esc_attr($site_color); ?> !important;
		text-transform: capitalize !important;
		color: #fff;
	}
	.bs-search input{
		border:1px solid <?php echo esc_attr($site_color); ?> !important;
	}
   .cl-pricetable-wrap.price-style10{
	   background: <?php echo esc_attr($site_color); ?> !important;
	   border-color: <?php echo esc_attr($site_color); ?> !important;
	}
	.owl-navigation-yes .owl-nav [class*="owl-"]:hover,
	.rs-testimonial .testi-carousel .slick-arrow:hover{
		color: <?php echo esc_attr($site_color); ?> !important;
		border-color: <?php echo esc_attr($site_color); ?> !important;
	}
	.bs-search button, .portfolio-content .vc_icon_element-icon{
		color: <?php echo esc_attr($site_color); ?> !important;
	}
	.format-aside{
		padding: 20px;
	}
	.blog-button a, .cat_name, .faq-home .vc_tta-panel-title a,
	.footer-style-5 .footer-bottom-share ul li a,
	.rs-contact .contact-address .address-item:hover .address-icon{
		background: <?php echo esc_attr($site_color); ?> !important;
	}
	.nav ul ul.sub-menu> li:first-child, blockquote{
		border-color: <?php echo esc_attr($site_color); ?> !important;
	}
	.faq-home .vc_tta-panel.vc_active .vc_tta-panel-title a{
	    opacity: 0.8 !important;
	}
	.nav-link-container a{
		color: <?php echo esc_attr($site_color); ?> !important;	
	}
	.nav-link-container a:hover{
		opacity: .7 !important;	
	}
	.preloader{
		background: <?php echo esc_attr($site_color); ?> !important;	
	}
	.navbar a, .navbar li{

		font-family:<?php echo esc_attr($menu_typography_font_family);?>!important;

		font-size:<?php echo esc_attr($menu_typography_font_fsize);?>!important;	

		<?php if(!empty($menu_typography_line_height)){

		?>

		line-height: 90px;
		<?php }?>
	}
	h1{
		color:<?php echo esc_attr($h1_typography_color);?> !important;
		font-family:<?php echo esc_attr($h1_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h1_typography_font_fsize);?>!important;
		<?php if(!empty($h1_typography_weight)){
		?>
		font-weight:<?php echo esc_attr($h1_typography_weight);?>!important;
		<?php }?>
		<?php if(!empty($h1_typography_line_height)){
		?>
		line-height:<?php echo esc_attr($h1_typography_line_height);?>!important;
		<?php }?>
		}

	h2{

		color:<?php echo esc_attr($h2_typography_color);?>;
		font-family:<?php echo esc_attr($h2_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
		<?php if(!empty($h2_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h2_typography_font_weight);?>!important;
		<?php }?>	

		<?php if(!empty($h2_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h2_typography_line_height);?>
		<?php }?>
	}

	h3{

		color:<?php echo esc_attr($h3_typography_color);?> ;
		font-family:<?php echo esc_attr($h3_typography_font_family);?>!important;
		font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
		<?php if(!empty($h3_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h3_typography_font_weight);?>!important;
		<?php }?>	

		<?php if(!empty($h3_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h3_typography_line_height);?>
		<?php }?>
	}

	h4{

		color:<?php echo esc_attr($h4_typography_color);?>;

		font-family:<?php echo esc_attr($h4_typography_font_family);?>!important;

		font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;

		<?php if(!empty($h4_typography_font_weight)){

		?>

		font-weight:<?php echo esc_attr($h4_typography_font_weight);?>!important;

		<?php }?>

		

		<?php if(!empty($h4_typography_line_height)){

		?>

			line-height:<?php echo esc_attr($h4_typography_line_height);?>!important;

		<?php }?>

		

	}

	h5{

		color:<?php echo esc_attr($h5_typography_color);?>;

		font-family:<?php echo esc_attr($h5_typography_font_family);?>!important;

		font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;

		<?php if(!empty($h5_typography_font_weight)){

		?>

		font-weight:<?php echo esc_attr($h5_typography_font_weight);?>!important;

		<?php }?>

		

		<?php if(!empty($h5_typography_line_height)){

		?>

			line-height:<?php echo esc_attr($h5_typography_line_height);?>!important;

		<?php }?>

	}

	h6{

		color:<?php echo esc_attr($h6_typography_color);?> ;

		font-family:<?php echo esc_attr($h6_typography_font_family);?>!important;

		font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;

		<?php if(!empty($h6_typography_font_weight)){

		?>

		font-weight:<?php echo esc_attr($h6_typography_font_weight);?>!important;

		<?php }?>

		

		<?php if(!empty($h6_typography_line_height)){

		?>

			line-height:<?php echo esc_attr($h6_typography_line_height);?>!important;

		<?php }?>

	}
	<?php if(!empty($grassywp_option['top_icon_color'])){?>
		#rs-header .toolbar-area .toolbar-contact ul li i,
		#rs-header .toolbar-area .toolbar-sl-share ul li a i{
		color: <?php echo esc_attr($grassywp_option['top_icon_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['top_icon_hover_color'])){?>
		#rs-header .toolbar-area .toolbar-contact ul li i:hover,
		#rs-header .toolbar-area .toolbar-sl-share ul li a i:hover{
		color: <?php echo esc_attr($grassywp_option['top_icon_hover_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['top_text_color'])){?>
		#rs-header .toolbar-area .toolbar-contact ul li a,
		#rs-header .toolbar-area .toolbar-contact{
		color: <?php echo esc_attr($grassywp_option['top_text_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['top_link_hover_color'])){?>
		#rs-header .toolbar-area .toolbar-contact ul li a:hover{
		color: <?php echo esc_attr($grassywp_option['top_link_hover_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['$top_btn_color'])){?>
		#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-button{
		color: <?php echo esc_attr($grassywp_option['$top_btn_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['btn_text_hover_color'])){?>
		#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-button:hover{
		color: <?php echo esc_attr($grassywp_option['btn_text_hover_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['top_btn_bg_color'])){?>
		#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-button{
		background: <?php echo esc_attr($grassywp_option['top_btn_bg_color']); ?> !important;
	}
	<?php }?>

	<?php if(!empty($grassywp_option['top_btn_bg_hover_color'])){?>
		#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-button:hover{
		background: <?php echo esc_attr($grassywp_option['top_btn_bg_hover_color']); ?> !important;
	}
	<?php }?>

	.rs-blog .blog-item h3.blog-title a:hover,
	.rs-blog .blog-item:hover h3 a, .comment i, .comments-area .comment-navigation .nav-next:before,
	.comments-area .comment-navigation .nav-previous::before{
		color: <?php echo esc_attr($site_color); ?> !important;
	}
	.pagination-area .nav-links span.current{
		border-color: <?php echo esc_attr($site_color); ?> !important;
		background: <?php echo esc_attr($site_color); ?> !important;
	}

	.toolbar-area, .readon.border, 

	#rs-cta,  

	.portfolio-filter button.active, 

	.portfolio-filter button:hover, 

	.rs-team .team-item .team-social .social-icon, 

	.mc4wp-form input[type="submit"], 

	.rs-testimonial .testi-content, 

	.wpcf7-form .wpcf7-submit, 

	.rs-footer .footer-top .recent-post-widget .post-item .post-date, 

	.rs-footer .footer-title::after, 

	.rs-footer .footer-top .widget_nav_menu li a::after, 

	.rs-services .services-desc::after, 

	.rs-footer .footer-bottom .footer-bottom-share ul li a:hover, 

	#scrollUp i:hover,

	#wp-megamenu-menu-1 > .wpmm-nav-wrap ul.wp-megamenu > li.wpmm_dropdown_menu  ul.wp-megamenu-sub-menu, 

	#wp-megamenu-menu-1 > .wpmm-nav-wrap ul.wp-megamenu  li.wpmm-type-widget .wp-megamenu-sub-menu li .wp-megamenu-sub-menu, 

	#wp-megamenu-menu-1 > .wpmm-nav-wrap ul.wp-megamenu > li.wpmm_mega_menu > ul.wp-megamenu-sub-menu, .pagination-area .nav-links a:hover,.ps-navigation ul a{

		background:<?php echo esc_attr($site_color);?> !important;

	}

	.sec-title h4, .exp-title,

	.rs-about .about-exp, .counter-top-area .rs-counter-list i, 

	.rs-team .team-item .display-table-cell i, .rs-team .team-item .team-title, .rs-testimonial .testi-content::before, .rs-blog .blog-item .blog-img .blog-img-content .blog-link, .rs-blog .blog-item:hover .blog-meta, .rs-services .services-icon, #wp-megamenu-menu-1 > .wpmm-nav-wrap ul.wp-megamenu > li.current-menu-item > a, #wp-megamenu-menu-1 > .wpmm-nav-wrap ul.wp-megamenu > li > a:hover,.page-template-page-single .menu-area .navbar ul li.active a, #rs-header .menu-area .navbar ul li.current-menu-ancestor > a, .header-transparent .menu-area .navbar ul li.current-menu-ancestor.current-menu-parent > a, .sec-title-single h3, .nav-close-menu-li a, #scrollUp i, .bs-sidebar .tagcloud a{

		color:<?php echo esc_attr($site_color); ?> !important;

	}

	.readon.border, .rs-team .team-item .team-desc, .mc4wp-form input[type="text"], .mc4wp-form input[type="url"], .mc4wp-form input[type="tel"], .mc4wp-form input[type="number"], .mc4wp-form input[type="email"], .rs-contact .contact-address .address-item .address-icon, .rs-footer .footer-bottom .footer-bottom-share ul li a, #scrollUp i, .pagination-area .nav-links a, .ps-navigation ul a, .sidenav .nav-close-menu-li a, .bs-sidebar .tagcloud a{

		border-color:<?php echo esc_attr($site_color); ?>

	}

	a, a:visited, a:focus{

		color:<?php echo esc_attr($link_color);?>

	}
	.rs-breadcrumbs ul li a,
	#rs-header .logo-area a{
	color:<?php echo esc_attr($link_color);?>!important;
}

	a:hover{

		color:<?php echo esc_attr($link_hover_color);?>

	}


	#rs-header .logo-area a:hover,
	.bs-sidebar ul a:hover {
	color:<?php echo esc_attr($link_hover_color);?> !important;
}


	.rs-footer{

		background:<?php echo esc_attr($footer_bgcolor);?>

	}

	.preloader{

		background:<?php echo esc_attr($site_color); ?> !important;

	}

	#rs-header .menu-area .navbar ul li > a{

		color:<?php echo esc_attr($menu_text_color); ?>

	}

	#rs-header .menu-area .navbar ul li:hover a{

		color:<?php echo esc_attr($menu_text_hover_color);?> !important;

	}

	#rs-header .menu-area .menu .current_page_item a, #rs-header .menu-area .menu .current-menu-item a{

		color:<?php echo esc_attr($menu_active_color); ?> !important;

	}

	.menu-area .navbar ul li ul.sub-menu{

		background:<?php echo esc_attr($drop_down_bg);?> !important;

	}

	#rs-header .menu-area .navbar ul li .sub-menu li a, #rs-header .menu-area .navbar ul li .children li a{

		color:<?php echo esc_attr($dropdown_text_color);?> !important;

	}

	#rs-header .menu-area .navbar ul ul li a:hover ,

	#rs-header .menu-area .navbar ul ul li.current-menu-item a{

		color:<?php echo esc_attr($drop_text_hover_color);?>	

	}

	#rs-header .menu-area .navbar ul ul li a:hover,

	#rs-header .menu-area .navbar ul ul li.current-menu-item a{

		<?php if(!empty($drop_text_hoverbg_color))

		{?>

		  background:<?php echo esc_attr($drop_text_hoverbg_color); ?> !important;

		<?php }?>

		

	}

	#rs-header .menu-area .navbar ul li .sub-menu li{
		border-color:<?php echo esc_attr($dropdown_border_color); ?> !important;
	}

	input[type="submit"]{

		background: <?php echo esc_attr($site_color);?>!important;
		color: #fff !important;
		border-radius: 30px;
		border: 0;

	}



	.page-links span, #primary-menu li.menu-item-has-children a:after, li.page_item_has_children:after, #rs-header .menu-area .navbar .navbar-toggle{

		background: <?php echo esc_attr($site_color);?>!important;

	}



	.post-password-form input[type="password"], .page-links span{

		border:1px solid <?php echo esc_attr($site_color);?>!important;

	}

	.page-links span:hover, kbd, mark, ins{
		background: <?php echo esc_attr($site_color);?>!important;
		color: #fff;
	}

	.bs-sidebar .tagcloud a:hover{
		background: <?php echo esc_attr($site_color);?>!important;
		color: #fff !important;
	}

	.sticky.hentry .blog-title a, .sticky.hentry .blog-title:before, code, pre, samp, .widget ul li:before, .btm-cate i,

	.btm-cate .tag-line::before, .rs-blog-details .bs-meta li i, .btm-cate .tag-line a:hover, .btm-cate li a:hover,	.blog-date i, li.category-name ul.post-categories:before, .rs-blog-details .bs-meta li a:hover{

		color: <?php echo esc_attr($site_color);?>!important;

	}
	.sticky.hentry .blog-title a, .rs-blog .blog-item:hover .blog-title a, .sticky.hentry .blog-title:before,
	.archive .blog-desc:hover .blog-title a, .format-link .bs-title a:before{

		color: <?php echo esc_attr($site_color);?>!important;

	}
	</style>
	<?php
	}

}

?>