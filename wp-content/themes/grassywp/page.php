 <?php

/**
 * The template for displaying all pages.
 *
 * @package Grassy
 * @author RS Theme
 * @link http://www.rstheme.com 
 */

get_header(); ?>

	</div><!-- #content -->
</div><!-- 	container -->

<?php  
   get_template_part('template-parts/single/page-header');
?>
<div class="container">
<div id="content" class="site-content">
<?php
  //checking page layout 

	$page_layout = get_post_meta( $post->ID, 'layout', true );
	$col_side = '';
	$col_letf = '';
	if($page_layout == '2left')
	{
		$col_side = '9';
		$col_letf = 'left-sidebar';
	}
	elseif($page_layout == '2right')
	{
		$col_side = '9';
	}
	else{
		$col_side = '12';
	}
?>

    <div class="row">
	    <div class="col-md-<?php echo esc_attr( $col_side). ' ' .esc_attr( $col_letf) ?>">
		    <?php	
				while ( have_posts() ) : the_post();    
				get_template_part( 'template-parts/content', 'page' );
				endwhile; // End of the loop.
		    ?>
	    </div>
		<?php 
			get_sidebar( 'page' );
		?>
	</div>
<?php
get_footer();

