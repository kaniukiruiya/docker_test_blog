<?php
/**
 * Template part for displaying audio post
 *
 * @package grassywp
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

	<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$audio = false;

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		}

	?>

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the audio file.
			if ( ! empty( $audio ) ) {
				foreach ( $audio as $audio_html ) {
					echo '<div class="entry-audio">';
						echo esc_html($audio_html);
					echo '</div><!-- .entry-audio -->';
				}
			};

		};

		if ( is_single() || empty( $audio ) ) {

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
	</div>
</div>
