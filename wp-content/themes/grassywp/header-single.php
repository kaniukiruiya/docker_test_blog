 <?php

/**

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grassywp
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- dynamic css -->
<?php
global $grassywp_option;

?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <!--Preloader start here-->      
  <?php
   require get_parent_theme_file_path('inc/header_style/preloader.php');  
  ?>  
  <!--Preloader area end here-->  
  <div id="page" class="site">

  <!-- checking transparent herader-->
  <?php

   if(is_page()){

  	 $post_meta_header = get_post_meta($post->ID, 'trans_header', true);

   	$transparent='';

  	 if($post_meta_header =='Yes'){

  		 $transparent ='header-transparent';

  	 }

   }

  ?>

  <header id="rs-header"> 

    <!-- Toolbar Start -->

    <?php 
    if(!empty($grassywp_option['show-top'])):
      $top_bar = $grassywp_option['show-top'];
    else:
      $top_bar='';
      endif;
    ?>

    <?php if($top_bar =='Yes'){
   ?>

    <div class="toolbar-area hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($grassywp_option['phone'])) { ?>
                <li> <i class="fa fa-phone"></i><a href="tel:+<?php echo esc_attr($grassywp_option['phone'])?>"> <span><?php echo esc_html($grassywp_option['phone-pretext']);?></span> <?php echo esc_html($grassywp_option['phone']); ?></a> </li>
                <?php } ?>

                <?php if(!empty($grassywp_option['top-email'])) { ?>

                <li class="hidden-sm"> <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($grassywp_option['top-email'])?>"><?php echo esc_html($grassywp_option['top-email'])?></a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
                <?php
                if(!empty($grassywp_option['show-social'])):
                 $top_social=$grassywp_option['show-social'];
                else:
                  $top_social='';
                endif;

                if($top_social=='1'){              

                if(!empty($grassywp_option['facebook'])) { ?>

                <li> <a href="<?php echo esc_url($grassywp_option['facebook'])?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>

                <?php } ?>

                <?php if(!empty($grassywp_option['twitter'])) { ?>

                <li> <a href="<?php echo esc_url($grassywp_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>

                <?php } ?>

                <?php if(!empty($grassywp_option['rss'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['pinterest'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['linkedin'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['google'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['instagram'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>

                <?php } ?>

                <?php if(!empty($grassywp_option['vimeo'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['vimeo'])?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['tumblr'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['tumblr'])?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>

                <?php } ?>

                <?php if (!empty($grassywp_option['youtube'])) { ?>

                <li> <a href="<?php  echo esc_url($grassywp_option['youtube'])?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>

                <?php } 

                }?>

                <?php if (!empty($grassywp_option['quote'])) { ?>

                <li> <a href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo esc_attr($grassywp_option['quote_link']) ?>" class="quote-button"><?php  echo esc_html($grassywp_option['quote']); ?></a> </li>

                <?php }?>

              </ul>

            </div>

          </div>

        </div>

      </div>

    </div>

    <?php } ?>

    <!-- Toolbar End --> 

    <!-- Header Menu Start -->

    <div class="menu-area menu-sticky">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="logo-area">
              <?php
  			         if (!empty($grassywp_option['grassywplogo']['url'])) { ?>
              	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $grassywp_option['grassywplogo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>"></a>
               <?php }	else{?>	
                <h1 id="logo">
              </h1><!-- end of #logo -->
                  <span class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
              </h1><!-- end of #logo -->

  			<?php } ?>
            </div>
          </div>

          <div class="col-sm-9 menu-responsive">
            <nav class="nav navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse collapse">

              <?php
        				wp_nav_menu( array(
        					'theme_location' => 'menu-2',
        					'menu_id'        => 'primary-menu-single',
        				) );
        			?>
            </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- Header Menu End --> 
  </header>
  <!-- End Header Menu End -->

  <div class="main-contain">
  <div class="container">
  <div id="content" class="site-content">

