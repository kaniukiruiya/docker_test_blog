<?php
/**
 * Template part for displaying image posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<?php if(has_post_thumbnail()){
?>
<?php //header style; ?>
<div class="bs-img">
  <?php the_post_thumbnail()?>
</div>
<?php
}?>

<div class="single-content-full">
<div class="bs-info">
  <ul class="bs-meta">
    <li><i class="fa fa-clock-o"></i><span>
      <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
      </span></li>
    <li><i class="fa fa-user"></i><a href="#">
      <?php the_author(); ?>
      </a></li>
    <li class="category-name">
      <?php the_category(); ?>
    </li>
  </ul>
</div>
 <div class="bs-desc">
	<?php if ( is_single() || '' === get_the_post_thumbnail() ) {

		// Only show content if is a single post, or if there's no featured image.
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'grassywp' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'grassywp' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );

	};
	?>
</div>
</div>