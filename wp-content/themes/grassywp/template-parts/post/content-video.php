<?php
/**
 * Template part for displaying video posts
 *
 * @package Grassy
 * @author RS Theme
 * @link http://www.rstheme.com
 */



?>
<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
	<div class="bs-img">
	  <?php the_post_thumbnail()?>
    </div>
<?php endif; ?> 

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
		$video = false;

		// Only get video from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		}
	?>

	<?php
	if ( ! is_single() ) {

		// If not a single post, highlight the video file.
		if ( ! empty( $video ) ) {
			foreach ( $video as $video_html ) {
				echo '<div class="entry-video">';
					echo esc_html( $video_html );
				echo '</div>';
			}
		};

	};

	if ( is_single() || empty( $video ) ) {

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

