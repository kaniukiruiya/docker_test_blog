<div class="rs-breadcrumbs  porfolio-details">
<?php
global $grassywp_option;
 if(!empty($grassywp_option['team_single_image']['url'])) { ?>
    <img src="<?php echo esc_url($grassywp_option['team_single_image']['url']); ?>" alt="<?php echo esc_url($grassywp_option['team_single_image']['url']); ?>">
    
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">
            <h3 class="page-title"><?php the_title(); ?></h3>
             <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?> </div>
        </div>
      </div>
    </div>
    <?php } else{ ?>
    <div class="rs-breadcrumbs-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h3 class="page-title">
                <?php the_title();?>
              </h3>
              <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
   }
  ?>
</div>
