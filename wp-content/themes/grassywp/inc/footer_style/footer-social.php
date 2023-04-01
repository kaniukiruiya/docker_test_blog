<?php
/*
      Grassy Footer Social Links
*/
?>
<?php 
      if(!empty($grassywp_option['show-social2'])){
            $footer_social = $grassywp_option['show-social2'];
            if($footer_social == 1){?>
                  <ul>  
                        <?php
                         if(!empty($grassywp_option['facebook'])) { ?>
                         <li> 
                              <a href="<?php echo esc_url($grassywp_option['facebook'])?>" target="_blank"><i class="fa fa-facebook"></i></a> 
                         </li>
                        <?php } ?>
                        <?php if(!empty($grassywp_option['twitter'])) { ?>
                        <li> 
                              <a href="<?php echo esc_url($grassywp_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($grassywp_option['rss'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['pinterest'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['linkedin'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['google'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['instagram'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($grassywp_option['vimeo'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['vimeo'])?> " target="_blank"><i class="fa fa-vimeo"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['tumblr'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['tumblr'])?> " target="_blank"><i class="fa fa-tumblr"></i></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($grassywp_option['youtube'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($grassywp_option['youtube'])?> " target="_blank"><i class="fa fa-youtube"></i></a> 
                        </li>
                        <?php } ?>     
                  </ul>
       <?php } 
}?>
