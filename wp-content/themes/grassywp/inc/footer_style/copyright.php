<?php 
if(!empty($grassywp_option['copyright'])){?>
	<p><?php echo wp_kses_post($grassywp_option['copyright']); ?></p>
	<?php }
	 else{
	    ?>
	<p><?php echo esc_attr('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> </p>
	<?php
	 }   
?>