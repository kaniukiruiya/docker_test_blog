<?php
global $grassywp_option;
$post_meta_header_syle = get_post_meta($post->ID, 'trans_header', true);
if($post_meta_header_syle == 'Header Style 4'){
$style_4_bread='style_4_bread';
}
elseif(!empty($grassywp_option['header_layout'])){   
       $header_style=$grassywp_option['header_layout'];      
        if($header_style=='style4'){     
            $style_4_bread='style_4_bread';
      }
      else{
        $style_4_bread='';
      }
  }
else{
$style_4_bread='';
}
?>
<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($style_4_bread);?>">
  <?php if(!empty($grassywp_option['blog_banner']['url'])) { ?>
  <img src="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>" alt="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>"></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="breadcrumbs-inner">          
          <h3 class="page-title">
            <?php the_title(); ?>
          </h3>          
          <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
  }
 else{    
?>
  <div class="rs-breadcrumbs-inner <?php echo esc_attr($style_4_bread);?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">            
            <h3 class="page-title">
              <?php the_title();?>
            </h3>           
            <ul>
              <li> <a class="active" href="<?php echo esc_url( home_url('/') ); ?>">
                <?php esc_html_e('Home','grassywp');?>
                </a> </li>
              <li>
                <?php the_title();?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
 }
?>
</div>