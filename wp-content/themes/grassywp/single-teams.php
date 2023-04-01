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
   echo get_template_part( 'template-parts/single/top-team');
 ?>
  <!-- Breadcrumbs End --> 
  
  <!-- Team Detail Start -->
  
  <div class="rs-porfolio-details sec-spacer">
    <div class="container">
      <?php while ( have_posts() ) : the_post();
      //take metafield value
        $designation = get_post_meta( get_the_ID(), 'designation', true );
        $company = get_post_meta( get_the_ID(), 'company', true );
        $address = get_post_meta( get_the_ID(), 'address', true );
        $city = get_post_meta( get_the_ID(), 'city', true );
        $state = get_post_meta( get_the_ID(), 'state', true );
        $country = get_post_meta( get_the_ID(), 'country', true );
        $phone = get_post_meta( get_the_ID(), 'phone', true );
        $email = get_post_meta( get_the_ID(), 'email', true );
        $website = get_post_meta( get_the_ID(), 'website', true );
        $facebook = get_post_meta(get_the_ID(), 'facebook', true );
        $twitter = get_post_meta( get_the_ID(), 'twitter', true );
        $google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
        $linkedin = get_post_meta( get_the_ID(), 'linkedin', true );

	  ?>
      <div class="row">
        <?php 
          $class1="col-md-4";
          $class2="col-md-8";
        if ( has_post_thumbnail() ):
           $class1="col-md-4";
             $class2="col-md-8";
        else:
            $class1="";
            $class2="col-md-12";
        endif;

        if ( has_post_thumbnail() ):?>
        <div class="<?php echo esc_attr($class1); ?> col-sm-12">
          <div class="ps-image">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
      <?php endif; ?>
        <div class="<?php echo esc_attr($class2); ?> col-sm-12">
          <?php if( $designation || $company || $facebook || $twitter || $google_plus ){ ?>
          <div class="ps-informations">
            <h3 class="info-title">
              <?php esc_html_e('Team Information','grassywp');?>
            </h3>
            <ul>
              <?php if( $designation ): ?>
              <li><span>
                <?php esc_html_e( 'Designation:','grassywp' );?>
                </span><?php echo esc_html( $designation ); ?>
              </li>
              <?php endif;?>
              <?php if( $company ):?>
              <li><span>
                <?php esc_html_e( 'Company:','grassywp' );?>
                </span><?php echo esc_html( $company ); ?>
              </li>
              <?php endif;
               if( $facebook ):?>
              <li class="social-icon">
                <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"> 
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <?php endif;
              if( $twitter ):?>
              <li class="social-icon"> 
                <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"> 
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>              
              <?php endif;
               if( $google_plus ): ?>
              <li class="social-icon">
                <a href="<?php  echo esc_url($google_plus); ?>" target="_blank">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
              <?php endif;?>
              <?php if( $linkedin ):?>
              <li class="social-icon">
                <a href="<?php echo esc_url($linkedin); ?>" target="_blank"> 
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <?php endif; ?>
              <div class="clear-fix"></div>
              <?php if( $address ):?>
              <li><span>
                <?php esc_html_e( 'Address:','grassywp' );?>
                </span>
                <?php  echo esc_html( $address ); ?>
              </li>
              <?php endif;
              if( $city ): ?>
              <li><span>
                <?php esc_html_e( 'City:','grassywp' );?>
                </span>
                <?php  echo esc_html( $city ); ?>
              </li>
              <?php endif; 
               if( $state ):?>
              <li><span>
                <?php esc_html_e( 'State:','grassywp' );?>
                </span><?php echo esc_html( $state ); ?></li>
              <?php endif; ?>
              <?php if($country):?>
              <li><span>
                <?php esc_html_e( 'Country:','grassywp' );?>
                </span><?php echo esc_html( $country ); ?></li>
              <?php endif; ?>
              <?php if( $phone ):?>
              <li><span>
                <?php esc_html_e( 'Phone:','grassywp' );?>
                </span><?php echo esc_html( $phone ) ; ?></li>
              <?php endif; ?>
              <?php if( $email ):?>
              <li><span>
                <?php esc_html_e('Email:','grassywp');?>
                </span><a href="mailto:<?php echo esc_attr($email); ?>">
                <?php  echo esc_html( $email ); ?>
                </a></li>
              <?php endif; ?>
              <?php if( $website ):?>
              <li><span>
                <?php esc_html_e( 'Website:','grassywp' );?>
                </span><a href="<?php echo esc_url( $website); ?>" target="_blank">
                <?php  echo esc_html( $website ); ?>
                </a></li>
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
    </div>
  </div>
</div>
<!-- Portfolio Detail End -->

<?php
get_footer();
