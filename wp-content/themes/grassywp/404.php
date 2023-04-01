<?php
/**
 *The template for displaying 404 pages (not found)
 *Template Name:404 Page
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package grassywp
 */

get_header(); ?>
    </div><!-- content -->
</div><!-- container -->
<?php 
if(!empty($grassywp_option['grassy_error']['url'])):
  $error = $grassywp_option['grassy_error']['url'];
else:
  $erro='';
endif;
?>
<div class="page-error" style="background-image: url('<?php echo esc_url( $error );?>')">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">    
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title">
						<?php
						 if(!empty($grassywp_option['title_404'])){
							 echo esc_html($grassywp_option['title_404']);
						 }
						 else{
						 esc_html_e( '404.', 'grassywp' ); }
						 ?>
						</h1>
                    </header><!-- .page-header -->    
                    <div class="page-content">
                        <h3>						
						<?php
						 if(!empty($grassywp_option['text_404'])){
							 echo esc_html($grassywp_option['text_404']);
						 }
						 else{
						 esc_html_e( 'Page Not Found', 'grassywp' ); }
						 ?>
                         </h3>
                        <div class="bs-sidebar">
                            <?php
                                get_search_form();					
                            ?>
                        </div><!-- bs-sidebar -->
                        <a href="<?php echo esc_url(home_url('/')); ?>">
							<?php
                             if(!empty($grassywp_option['back_home'])){
                                 echo esc_html($grassywp_option['back_home']);
                             }
                             else{
                             esc_html_e('OR BACK TO HOMEPAGE', 'grassywp'); }
                             ?>
                         ></a>
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->    
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>   
</div> <!-- .page-error -->
<?php
get_footer();
