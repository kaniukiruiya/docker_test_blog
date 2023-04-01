<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package grassywp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-content">
    <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'grassywp' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links page-links-pge">' . __( 'Pages:', 'grassywp' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		

		// If comments are open and there is at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}?> 
  </div>
  <!-- .entry-content -->
  
  <?php if ( get_edit_post_link() ) : ?>
  <div class="entry-footer">
    <?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'grassywp' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
  </div>
  <!-- .entry-footer -->
  <?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> --> 
