<?php
//breadcrumbs added for page
if(is_page()){
    $post_meta_header_syle = get_post_meta($post->ID, 'trans_header', true);
     if($post_meta_header_syle == 'Header Style 4'){
      $style_4_bread='style_4_bread';
    }
    elseif(!empty($grassywp_option['header_layout'])){   
           $header_style = $grassywp_option['header_layout'];      
            if($header_style == 'style4'){     
              $style_4_bread='style_4_bread';
          }
          else{
            $style_4_bread='';
          }
        }
    else{
    $style_4_bread='';
    }

  $post_meta_data = get_post_meta($post->ID, 'meta-image', true);?>
  <?php if($post_meta_data!=''){   
  ?>
  <div class="rs-breadcrumbs <?php echo esc_attr($style_4_bread);?>"> 
    <img id="meta-image-preview" src="<?php echo esc_url($post_meta_data); ?>" alt="<?php echo esc_url($post_meta_data); ?>" />
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">
            <?php 
              $post_meta_title = get_post_meta($post->ID, 'page_title', true);?>
            <?php if($post_meta_title == 'Yes'){             
            ?>
            <h3 class="page-title">
              <?php the_title();?>
            </h3>
            <?php } 
            else{
             ?>
            <h3 class="page-title">
              <?php the_title();?>
            </h3>
            <?php
             }     
             ?>
            <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
  else{   
  $post_meta_bread = get_post_meta($post->ID, 'page_bread', true);?>
  <?php if($post_meta_bread == 'Show' || $post_meta_bread == ''){?>
  <div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($style_4_bread);?>">
    <div class="rs-breadcrumbs-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h3 class="page-title">
                <?php the_title();?>
              </h3>
              <ul>
                <li> <a class="active" href="<?php echo esc_url(home_url('/')); ?>">
                  <?php esc_html_e('Home','grassywp');?>
                  </a> </li>
                <li>
                  <?php the_title(); ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
    else{
      $post_meta_title = get_post_meta($post->ID, 'page_title', true);?>
      <?php if($post_meta_title == 'Hide'){
        }
      else{
        ?>
        <div class="container inner-page-title  <?php echo esc_attr($style_4_bread);?>">
          <h3>
            <?php the_title();?>
          </h3>
        </div>
    <?php } 
      }
  }
}



// breadcrumbs added for archive page
if(is_archive()){
if(!empty($grassywp_option['header_layout'])){   
     $header_style = $grassywp_option['header_layout'];      
      if($header_style == 'style4'){     
        $style_4_bread = 'style_4_bread';
    }
    else{
      $style_4_bread='';
    }
  }
else{
  $style_4_bread='';
}
?>
<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($style_4_bread);?>">
  <?php if(!empty($grassywp_option['blog_banner']['url'])) { ?>
  <img src="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>" alt="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>"></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="breadcrumbs-inner"> 
          <?php
            the_archive_title( '<h3 class="page-title">', '</h3>' );
          ?>                
          <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
  }
 else{    
?>
  <div class="rs-breadcrumbs-inner <?php echo esc_attr($style_4_bread);?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="breadcrumbs-inner">            
            <?php
              the_archive_title( '<h3 class="page-title">', '</h3>' );
            ?>                
            <?php if(shortcode_exists('flexy_breadcrumb')){echo do_shortcode( '[flexy_breadcrumb]' );} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
   }
  ?>
</div>
<?php
}


// breadcrumbs added for search page

if(is_search()){
if(!empty($grassywp_option['header_layout'])){   
       $header_style=$grassywp_option['header_layout'];      
        if($header_style=='style4'){     
            $style_4_bread='style_4_bread';
      }
      else{
        $style_4_bread='';
      }
    }
else{
$style_4_bread='';
}
?>
<div class="rs-breadcrumbs  porfolio-details <?php echo esc_attr($style_4_bread);?>">
  <?php if(!empty($grassywp_option['blog_banner']['url'])) { ?>
  <div class="search-image">
  <img src="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>" alt="<?php echo esc_url($grassywp_option['blog_banner']['url']); ?>"></a>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="breadcrumbs-inner">
          <?php if ( have_posts() ) : ?>
      <h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'grassywp' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
      <?php else : ?>
      <h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'grassywp' ); ?></h3>
      <?php endif; ?>         
        </div>
      </div>
    </div>
  </div>
</div>
  <?php 
  }
 else{    
?>
  <div class="rs-breadcrumbs-inner <?php echo esc_attr($style_4_bread);?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
        <div class="breadcrumbs-inner">         
          <?php if ( have_posts() ) : ?>
      <h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'grassywp' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
      <?php else : ?>
      <h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'grassywp' ); ?></h3>
      <?php endif; ?>   
      
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php
 }
?>
</div>
<?php
}