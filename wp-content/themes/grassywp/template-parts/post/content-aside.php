<?php
/**
 * Template part for displaying aside post
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
 <div class="bs-desc">
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
        'before'      => '<div class="page-links">' . __( 'Pages:', 'grassywp' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
    ?>
</div>
</div>

