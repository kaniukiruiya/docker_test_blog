<?php
/**
 * Template part for displaying posts *
 * @link https://codex.wordpress.org/Template_Hierarchy *
 * @package grassywp
 * @since 1.0
 * @version 1.0
 */
?>
<?php if(has_post_thumbnail()){
?>
<div class="bs-img">
  <?php the_post_thumbnail()?>
</div>
<?php
 }?>
<div class="single-content-full">
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

      ) 
    );
      wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'grassywp' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
    ?>
</div>
</div>

