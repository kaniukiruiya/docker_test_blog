<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package grassywp
 */

get_header(); ?>
</div>
</div>

<!-- Main content Start -->

<div class="main-content"> 
  <!-- Breadcrumbs Start -->
  <?php
   get_template_part( 'template-parts/single/top-portfolio'); ?>

  <!-- Breadcrumbs End --> 
  
  <!-- Portfolio Detail Start -->
  <div class="rs-porfolio-details sec-spacer">
    <div class="container">
      <?php while ( have_posts() ) : the_post();
			 $post_created = get_post_meta( get_the_ID(), 'created', true );
			 $post_date = get_post_meta( get_the_ID(), 'date', true );
			 $post_client = get_post_meta( get_the_ID(), 'client', true );
			 $post_skills = get_post_meta( get_the_ID(), 'skills', true );
			 $post_demo = get_post_meta( get_the_ID(), 'demo', true );
	  ?>
      <div class="row">
        <?php
          $class1 = "col-md-7";
          $class2 = "col-md-5";
        if ( has_post_thumbnail() ):
           $class1 = "col-md-7";
             $class2 = "col-md-5";
        else:
            $class1 = "";
            $class2 = "col-md-12";
        endif;
       
        if ( has_post_thumbnail() ):?>
        <div class="<?php echo esc_attr($class1); ?> col-sm-12">
          <div class="ps-image">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
       <?php endif; ?> 
        <div class="<?php echo esc_attr($class2); ?> col-sm-12">
          <?php if($post_created || $post_date || $post_client || $post_skills || $post_demo){ ?>
          <div class="ps-informations">
            <h3 class="info-title"><?php esc_html_e( 'Portfolio Information','grassywp' );?></h3>
            <ul>
              <?php if( $post_created ):?>
              <li><span><?php esc_html_e( 'Created by:','grassywp' );?> </span><?php echo esc_html( $post_created ); ?></li>
              <?php endif;?>
              <?php if($post_date):?>
              <li><span><?php esc_html_e( 'Date:','grassywp' );?>  </span><?php echo esc_html( $post_date ); ?></li>
              <?php endif;?>
              <?php if( $post_skills ):?>
              <li><span><?php esc_html_e('Skills:','grassywp');?>  </span><?php echo esc_html($post_skills); ?></li>
              <?php endif; ?>
              <?php if($post_client):?>
              <li><span><?php esc_html_e('Client:','grassywp');?>  </span><?php echo esc_html($post_client); ?></li>
              <?php endif; ?>
              <?php if($post_demo):?>
              <li><span><?php esc_html_e('Demo:','grassywp');?></span><a href="<?php echo esc_url( $post_demo ); ?>"><?php esc_html_e('see demo:','grassywp');?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <?php } ?>         
        </div>
      </div>
      <div class="project-desc">       
        <?php the_content(); ?>
      </div>
      <?php endwhile; ?>      
      <?php
          get_template_part( 'pagination' );
      ?>
      <!-- end pagination -->        
    </div>
  </div>
</div>
<!-- Portfolio Detail End -->
<?php
get_footer();