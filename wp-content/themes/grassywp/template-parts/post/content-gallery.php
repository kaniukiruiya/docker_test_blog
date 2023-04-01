<?php
/**
 * Template part for displaying gallery posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) {
		echo grassywp_get_svg( array( 'icon' => 'thumb-tack' ) );
	}
	?>
	<div class="gallery-post-tp">
	<div class="bs-info single-page-info">

  <ul class="bs-meta">

    <li><i class="fa fa-calendar"></i><span>

      <?php the_date();?>

      </span></li>

    <li><i class="fa fa-user"></i><a href="#">

      <?php the_author(); ?>

      </a></li>

    <li class="category-name"><i class="fa fa-folder-open-o"></i>

      <?php the_category(', '); ?>

    </li>

  </ul>  

</div>  

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! get_post_gallery() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'grassywp-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the gallery.
			if ( get_post_gallery() ) {
				echo '<div class="entry-gallery">';
					echo get_post_gallery();
				echo '</div>';
			};

		};

		if ( is_single() || ! get_post_gallery() ) {

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

	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		//grassywp_entry_footer();
	}
	?>
</div>
</article><!-- #post-## -->
