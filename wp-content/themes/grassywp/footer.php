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
		 	require get_parent_theme_file_path('inc/footer_style/footer.php');    
		?>
	</div><!-- #page -->

		<?php 
		if(!empty($grassywp_option['show_top_bottom'])){	
			$rstop_bottom=$grassywp_option['show_top_bottom'];
			if($rstop_bottom == 1){
			?>
		 	<!-- start scrollUp  -->
			<div id="scrollUp">
			    <i class="fa fa-angle-up"></i>
			</div>   
			<?php }
			}
		?>

		<?php 			
			wp_footer(); 
		?>  
	</body>
</html>
