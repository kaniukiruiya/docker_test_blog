<?php
/**
 * The header for our theme 
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
	<!-- include header -->
	<?php
	 require get_parent_theme_file_path('inc/header_style/header.php');	
	?>
	<!-- End Header -->

	<div class="main-contain">
		<div class="container">
			<div class="content site-content">
