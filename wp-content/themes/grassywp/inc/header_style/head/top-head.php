<?php
/* Top Header part for grassy template*/
if(!empty($grassywp_option['mobile-top'])):
  $rstop = 'hidden-xs';
else:
  $rstop = "";
endif;
?>
<div class="toolbar-area <?php echo esc_attr($rstop);?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-7 col-xs-12">
        <div class="toolbar-contact">
          <ul>
            <?php if(!empty($grassywp_option['phone'])) { ?>
            <li> <i class="fa fa-phone"></i><a href="tel:+<?php echo esc_attr($grassywp_option['phone'])?>"> <span><?php echo esc_html($grassywp_option['phone-pretext']);?></span> <?php echo esc_html($grassywp_option['phone']); ?></a> </li>
            <?php } ?>
            <?php if(!empty($grassywp_option['top-email'])) { ?>
            <li> <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($grassywp_option['top-email'])?>"><?php echo esc_html($grassywp_option['top-email'])?></a> </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-sm-5 col-xs-12">
        <div class="toolbar-sl-share">
          <ul>
            <?php
            if(!empty($grassywp_option['show-social'])){
              $top_social = $grassywp_option['show-social']; 
          
                if($top_social == '1'){              
                  if(!empty($grassywp_option['facebook'])) { ?>
                  <li> <a href="<?php echo esc_url($grassywp_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                  <?php } ?>
                  <?php if(!empty($grassywp_option['twitter'])) { ?>
                  <li> <a href="<?php echo esc_url($grassywp_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                  <?php } ?>
                  <?php if(!empty($grassywp_option['rss'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['pinterest'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['linkedin'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['google'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['instagram'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                  <?php } ?>
                  <?php if(!empty($grassywp_option['vimeo'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['tumblr'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                  <?php } ?>
                  <?php if (!empty($grassywp_option['youtube'])) { ?>
                  <li> <a href="<?php  echo esc_url($grassywp_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                  <?php } 
                  }
              }
            ?>
            <?php if (!empty($grassywp_option['quote'])) { ?>
            <li> <a href="<?php echo esc_url(home_url( '/' )); ?><?php echo esc_attr($grassywp_option['quote_link']); ?>" class="quote-button"><?php  echo esc_html($grassywp_option['quote']); ?></a> 
            </li>              
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
