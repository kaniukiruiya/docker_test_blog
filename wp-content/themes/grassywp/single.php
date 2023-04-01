<?php
/**
 * The template for displaying all single posts *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package grassywp
 */
get_header();
?>
 </div>
</div>
<?php
   get_template_part('template-parts/single/top');
 ?>
<!-- .rs-breadcumbs -->
<div class="container"> 
  <!-- Blog Detail Start -->
  <div class="rs-blog-details pt-100 pb-70">
    <div class="row">      
      <div class="col-md-9">
        <?php     
         while ( have_posts() ) : the_post();     
       ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php
            get_template_part( 'template-parts/post/content', get_post_format() );     
          ?>
          <div class="clear-fix"></div>  
        </article>
        <?php 
          if(has_tag()){
         //tag add
            $seperator = ''; // blank instead of comma
            $after = '';
            echo '<div class="tag-line">';
            the_tags( 'Tags: ', $seperator, $after );
            echo '</div>';
           }?>  
        
        <?php
          get_template_part( 'pagination' );
        ?>
        <!-- .ps-navigation -->
          <?php 
            $rs_show_author = '';
            $rs_show_author = $grassywp_option['blog-author'];
            if($rs_show_author == 'show'){
              $rs_author_meta = get_the_author_meta('description'); 
              if(!empty($rs_author_meta)){
              ?>
              <div class="author-block">
                <div class="author-img"> 
                  <?php echo get_avatar(get_the_author_meta( 'ID' ), 200);?> </div>
                <div class="author-desc">
                  <h3 class="author-title">
                    <?php the_author();?>
                  </h3>
                  <p>
                    <?php   
                      echo wpautop( get_the_author_meta( 'description' ) );?>
                  </p>
                  <a href="<?php echo esc_url(get_the_author_meta('user_url'))?>" target="_blank">
                  <?php echo esc_url(get_the_author_meta( 'user_url'))?>
                  </a> 
                </div>
              </div>

        <!-- .author-block -->
        <?php }
            }?>
              <?php 
                $rsblog_author='';
                if($rsblog_author==""){
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
                }
                else
                {
                $rsblog_author = $grassywp_option['blog-comments'];
                if($rsblog_author == 'show'){     
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
                }
              }
              endwhile; // End of the loop.
            ?>
      </div>
       <?php
        get_sidebar();
        ?>
      </div>
  </div>
  <!-- Blog Detail End --> 
</div>
<!-- .container -->
<?php
get_footer();



