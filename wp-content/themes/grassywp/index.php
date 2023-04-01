<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package grassywp
 */
get_header(); ?>
  </div>
</div>
<?php
   get_template_part( 'template-parts/single/top-blog');
 ?>
<div id="rs-blog" class="rs-blog sec-spacer">
<div class="container">
  <div class="row">
  <?php
    //checking blog layout form option  
    $col ='';
    $blog_layout =''; 
    $column =''; 
    if(!empty($grassywp_option['blog-layout']))
    {
    $blog_layout =($grassywp_option['blog-layout']);
    $blog_grid =$grassywp_option['blog-grid'];        
    if($blog_layout == 'full')
    {
       $layout ='full-layout';
       $col = '-full';
       $column = 'sidebar-none';  
    } 
    
    elseif($blog_layout == '2left')
    {
       $layout = 'full-layout-left';  
    }
    
    elseif($blog_layout == '2right')
    {
       $layout = 'full-layout-right'; 
    } 
    else{
      $layout = 'full-layout';
    }

   ?>

  <div class="col-md-9<?php echo esc_attr($col); ?> <?php echo esc_attr($layout); ?>"> 
    
    <?php
    if ( have_posts() ) :           
      /* Start the Loop */
      while ( have_posts() ) : the_post();      
    ?>
     <article <?php post_class(); ?>>
      <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
        <div class="blog-item">
          <?php if ( has_post_thumbnail() ) {?>
          <div class="blog-img">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>    
          </div>
          <?php
            }       
          ?>
          <div class="full-blog-content">
            <div class="blog-meta">
              <h2 class="blog-title"><a href="<?php the_permalink();?>">
                <?php the_title();?>
                </a>
              </h2> 
              <div class="blog-date"> <i class="fa fa-calendar"></i>
                <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                <span class="author"> <i class="fa fa-user"></i>
                <?php the_author();?>
                </span></div>                
              <div class="blog-lc">
                <div class="comment"> <i class="fa fa-comments"></i>
                  <?php comments_number( '0', '1', '%' ); ?>
                </div>
              </div>           
            </div>
          <div class="blog-desc">   
            <?php the_excerpt();?>  
            <div class="clear-fix"></div>          
          </div>
          <div class="blog-button">
            <a href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'grassywp');?> <i class="fa fa-angle-right"></i></a>
        </div>
        </div>
          <ul class="btm-cate btm-cate-border">
              <li class="category-name"><i class="fa fa-folder-open-o"></i>
                    <?php the_category(', '); ?>
              </li>
              <li>
                  <?php 
                     if(has_tag()):
                     //tag add
                        $seperator = ', '; // blank instead of comma
                        $after = '';
                        $before = '';
                        echo '<div class="tag-line">';
                        the_tags( $before, $seperator, $after );
                        echo '</div>';
                     endif;
                  ?> 
                </li>
            </ul>
        </div>
      </div>
    </article>
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
  <?php if($layout!='full-layout')
    {
     ?>
  <div class="<?php echo esc_attr($column); ?>">
    <?php
       get_sidebar();
    ?>
  </div>
  <?php
    }
  }
  else{
    ?> 
      <div class="col-md-9">
        <?php
            if ( have_posts() ) :           
                /* Start the Loop */
                while ( have_posts() ) : the_post();
        ?>
        <article <?php post_class(); ?>>   
          <div class="col-sm-12 col-xs-12">
            <div class="blog-item">              
                <?php if (has_post_thumbnail()) {
                     ?>
                     <div class="blog-img featured-home">
                     <a href="<?php the_permalink()?>"><?php the_post_thumbnail();?> </a>  
                     </div>     
                  <?php  
                      }
                   ?>
              <div class="blog-content-main">
                <h2 class="blog-title">
                  <a href="<?php the_permalink();?>">
                      <?php the_title();?>
                  </a>
                </h2>

                <div class="blog-meta">
                  <div class="blog-date"> <i class="fa fa-calendar"></i>
                    <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                    <span class="author"> <i class="fa fa-user"></i>
                    <?php the_author();?>
                    </span></div>                  
                    <div class="blog-lc">
                      <div class="comment"> <i class="fa fa-comments"></i>
                        <?php comments_number( '0', '1', '%' ); ?>
                      </div>
                    </div>                 
                </div>
                <div class="blog-desc">              
                    <?php the_content();?> 
                    <div class="clear-fix"></div>  
                      <?php wp_link_pages( array(
                      'before'      => '<div class="page-links">' . __( 'Pages:', 'grassywp' ),
                      'after'       => '</div>',
                      'link_before' => '<span class="page-number">',
                      'link_after'  => '</span>',
                    ) );
                    ?> 
                    <div class="clear-fix"></div>             
                </div><!-- end .blog-desc -->
              </div><!-- end .blog-content-main -->  

               <ul class="btm-cate">
                  <li class="category-name"><i class="fa fa-folder-open-o"></i>
                    <?php the_category(', '); ?>
                </li>
                <li>
                     <?php 
                     if(has_tag()):
                     //tag add
                        $seperator = ', '; // blank instead of comma
                        $after = '';
                        $before = '';
                        echo '<div class="tag-line">';
                        the_tags( $before, $seperator, $after );
                        echo '</div>';
                      endif;
                     ?> 
                </li>
              </ul>
              
            </div>
          </div>
        </article>
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
     }
    
    ?>
  </div>
<?php
get_footer();