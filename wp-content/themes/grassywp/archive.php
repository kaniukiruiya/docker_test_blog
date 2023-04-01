<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package grassywp
 */
get_header(); ?>
</div>
</div>
<?php  
   get_template_part('template-parts/single/page-header');
?>
<div class="container">
  <div class="content">
  <div class="rs-blog-details pt-70 pb-70">
    <div class="row">
      <div class="col-md-9">
      <?php
      if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) : the_post();
      ?>
        <div class="archive-post row">
        <?php if ( has_post_thumbnail() ) {
        ?>
            <div class="col-sm-3">
              <div class="blog-item">
                <div class="blog-img">
                  <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail(); ?>                        
                    </a>
                </div>
              </div>
           </div>
          <?php
        $col_archive='9';
      }
      else{
             $col_archive='12';
         }
          ?>
          <div class="col-sm-<?php echo esc_attr($col_archive);?>">
            <article <?php post_class(); ?>>
            <div class="blog-desc">
              <div class="blog-img-content">
                <div class="display-table">
                  <div class="display-table-cell">
                    <h3 class="blog-title"><a href="<?php the_permalink();?>">
                      <?php the_title();?>
                      </a></h3>
                    <div class="blog-meta">
                      <div class="blog-date"> <i class="fa fa-calendar"></i>
                        <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                        <span class="author"> <i class="fa fa-user"></i>
                        <?php the_author();?>
                        </span> 
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
              <?php the_excerpt();?>
            </div>
          </div>
        </article>
        </div>
        <?php  
          endwhile;   
        ?>
        <div class="pagination-area">
          <?php
            the_posts_pagination();
          ?>
        </div>
        <?php
          else :
          get_template_part( 'template-parts/content', 'none' );
          endif; ?>
      </div>
    <?php
      get_sidebar();
      ?>
    </div>
  </div>
<?php
get_footer();

