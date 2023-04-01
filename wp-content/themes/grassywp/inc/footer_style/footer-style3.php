<?php
/*
Grassy footer style 3
*/
?>
<footer id="rs-footer" class="rs-footer footer-style-3">
<?php if(is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4'))
{
?>
<div class="footer-top">
  <div class="border-full-footer">
    <div class="container footer-style-33">
        <div class="row">
            <div class="col-md-3">  
                <?php dynamic_sidebar('footer1'); ?>  
            </div>
            <div class="col-md-3">  
                <?php dynamic_sidebar('footer2'); ?>  
            </div>
            <div class="col-md-3">  
                <?php dynamic_sidebar('footer3'); ?>  
            </div>  
             <div class="col-md-3">  
                <?php dynamic_sidebar('footer4'); ?>  
            </div>          
        </div>
    </div>
  </div>
  <div class="coll">                                          
    <div class="about-widget">
     <?php
         if(!empty($grassywp_option['footer_logo']['url'])) { ?>
            <img src="<?php echo esc_url( $grassywp_option['footer_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
           <?php }               
        ?>
    </div>
    <div class="footer-bottom-share">
        <?php require get_parent_theme_file_path('inc/footer_style/footer-social.php');   ?>
    </div> 
  </div>
</div>
<?php 
  } 
?>
  <div class="footer-bottom2">
    <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="right-menu">
                  <?php dynamic_sidebar('footer3'); ?>                               
              </div>
          </div>
          <div class="col-md-12 col-sm-12 text-center">
              <div class="copyright text-center">
                 <?php require get_parent_theme_file_path('inc/footer_style/copyright.php'); ?>
              </div>
          </div>
      </div>
    </div>
  </div>
</footer>