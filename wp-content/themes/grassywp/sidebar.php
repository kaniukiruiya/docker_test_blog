<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grassywp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;}
?>
<div class="col-md-3 sidebar-global">
  <aside id="secondary" class="widget-area">
    <div class="bs-sidebar dynamic-sidebar">
      <?php
		    dynamic_sidebar( 'sidebar-1' );
      ?>
    </div>
  </aside>
  <!-- #secondary --> 
</div>
<?php
?>
