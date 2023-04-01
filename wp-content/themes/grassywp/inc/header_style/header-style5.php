<?php
/*
Grassy header style 5
*/
?>
<header id="rs-header" class="header-styl-5">
   <!-- Toolbar Start -->
   <?php
      if(!empty($grassywp_option['show-top'])){
       $top_bar = $grassywp_option['show-top'];      
        if($top_bar == ""){ ?>
         <div class="top-gap">
          <?php require get_parent_theme_file_path('inc/header_style/head/top-head.php');
          ?>
        </div>
      <?php
       }
       else{
       if($top_bar == 1){
        require get_parent_theme_file_path('inc/header_style/head/top-head.php');
       } 
    }
  }
?>
   <!-- Toolbar End -->
  
   <!-- Header Menu Start -->
  <?php 
   if(!empty($grassywp_option['off_sticky'])):   
    $sticky = $grassywp_option['off_sticky'];         
    if($sticky == 1):
     $sticky_menu = 'menu-sticky';		 	  
    endif;
   else:
   $sticky_menu = '';
  endif;
   ?>
  <div class="menu-area <?php echo esc_attr($sticky_menu);?>">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo-area">
            <?php
			       if(!empty($grassywp_option['grassywplogo']['url'])) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php  echo esc_url($grassywp_option['grassywplogo']['url']); ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ) ;?>"></a>
            <?php }	else{?>
            <h1 id="logo"> <span class="site-name"><a href="<?php esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <?php bloginfo( 'name' ); ?>
              </a></span> </h1>
            <!-- end of #logo -->
            <?php } ?>
          </div>
        </div>
        <?php
        //search page here
        if(!empty($grassywp_option['off_search'])):
         $sticky_search = $grassywp_option['off_search'];
         else:
          $sticky_search = '';
       endif;
       
       if($sticky_search == '1'):
         ?>
        <div class="col-sm-9 search-header hidden-sm">
          <?php get_search_form(); ?>
        </div>
        <?php endif; ?>
        
      </div>
    </div>
      <div class="coll border-full">
        <div class="container">
          <?php if(!empty($grassywp_option['off_canvas']) || !empty($grassywp_option['off_search'])):
                $menu_right = 'nav-right-bar';
              else:
                $menu_right = ''; 
                endif;  
          ?>  
          <nav class="nav navbar <?php echo esc_attr($menu_right);?>">

            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse">
              <?php
    					wp_nav_menu( array(
    						'theme_location' => 'menu-1',
    						'menu_id'        => 'primary-menu',
    					) );
    				?>
            </div>
          </nav>
             <?php 
	           //off convas here
        		if(!empty($grassywp_option['off_canvas'])){
        				$off = $grassywp_option['off_canvas'];
        				if($off == 1){
        	 ?>
                <div class = 'nav-link-container'>
                  <a href='#' class="nav-menu-link"><i class="fa fa-bars" aria-hidden="true"></i></a>
                </div>  
                <?php }
        		}?> 
        </div>
      </div>      
  </div>
  <!-- Header Menu End --> 
</header>

<?php 
  //off convas here
    require get_parent_theme_file_path('inc/header_style/canvas/canvas.php');
?>