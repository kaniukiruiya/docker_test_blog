<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grassywp
 */

?>
</div><!-- #content -->
</div><!-- .container -->
</div><!-- .main-container -->
<?php
global $grassywp_option;
?>
<footer id="rs-footer" class="rs-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">                   
                <div class="col-md-3">                                          
                    <div class="about-widget">
                     <?php					 	
            			 if(!empty($grassywp_option['footer_logo']['url'])) { ?>
                         <img src="<?php echo esc_attr( $grassywp_option['footer_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>">
                      <?php }               
           				 ?>
                      <?php dynamic_sidebar('footer1') ?>
                    </div>                        
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
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="copyright">
                    <?php require get_parent_theme_file_path('inc/footer_style/copyright.php'); ?>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="text-right ft-bottom-right">
                    <div class="footer-bottom-share">
                      <?php require get_parent_theme_file_path('inc/footer_style/footer-social.php');   ?>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
 </footer>

</div><!-- #page -->
	<?php 
    if(!empty($grassywp_option['show_top_bottom'])){
    ?>
     <!-- start scrollUp  -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>   
    <?php } ?>   
    


        <?php wp_footer(); ?>
  </body>
</html>
