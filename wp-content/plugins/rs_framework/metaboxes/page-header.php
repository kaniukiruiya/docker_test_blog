<?php

/**
 * Create Area For Header Banner
 */

function graasy_header_bg( $post ) {
    wp_nonce_field( 'header_bg_bg_submit', 'header_bg_bg_nonce' );
    $graasy_stored_meta = get_post_meta( $post->ID ); ?>
    <p> 
      <h4><?php esc_html_e('Select Header Banner for Inner Pages','grassywp');?></h4>      
       <?php
	      if ( isset ( $graasy_stored_meta['meta-image']) ){
          if( !empty( $graasy_stored_meta['meta-image'][0]) ){
		   ?>
       <div class="meta-img-wrap"> 
           <i class="fa fa-close"></i>
	         <img id="meta-image-preview" src="<?php echo esc_url($graasy_stored_meta['meta-image'][0]);  ?>" />
       </div>
         <br />
        <?php } 
          }
        ?>
        <input type="text" size="35" name="meta-image" id="meta-image" class="meta_image" value="<?php if ( isset ( $graasy_stored_meta['meta-image'] ) ){ echo esc_url($graasy_stored_meta['meta-image'][0]); } ?>" />
        <input type="button" id="meta-image-button" class="button" value="Select Image" />
    </p>
     <p> 
      <h4><?php esc_html_e('Select Header Style','grassywp');?></h4> 
      <?php $trans_header = get_post_meta( $post->ID, 'trans_header', true ); 
  	  if($trans_header!=''){
  		  $header_style=$trans_header;
  	  }
  	  else{
  		   $header_style='Header Style 1';
  	  }
  	  ?>          
      <select name="trans_header">
       <option selected="selected" value="<?php echo esc_attr($header_style);?>"><?php echo  esc_attr($header_style);?></option>
       <option value="Header Style 1"><?php  esc_html_e('Header Style 1','grassywp');?></option>
       <option value="Header Style 2"><?php  esc_html_e('Header Style 2','grassywp');?></option>
       <option value="Header Style 3"><?php  esc_html_e('Header Style 3','grassywp');?></option>
       <option value="Header Style 4"><?php  esc_html_e('Header Style 4','grassywp');?></option>
       <option value="Header Style 5"><?php  esc_html_e('Header Style 5','grassywp');?></option>             
      </select>
      <h4><?php esc_html_e('Show Page Title','grassywp');?></h4> 
       <?php $page_title = get_post_meta( $post->ID, 'page_title', true ); 
	     $page_style = 'Show';
		   if($page_title!=''){		  
			  $page_style=$page_title;
		  }	 
	  ?>          
      <select name="page_title">
        <option selected="selected" value = "<?php echo esc_attr( $page_style);?>"><?php echo esc_attr($page_style);?></option>
        <option value="Show"><?php esc_html_e('Show','grassywp');?></option>
        <option value="Hide"><?php esc_html_e('Hide','grassywp');?></option>
      </select>       
    </p>

    <p> 
      <h4><?php esc_html_e('Show Breadcurmbs','grassywp');?></h4> 
      <?php $page_bread = get_post_meta( $post->ID, 'page_bread', true ); 
       $bread_style = 'Show';
        if($page_bread!=''){      
          $bread_style = $page_bread;
        }  
    ?>
          
      <select name="page_bread">
         <option selected="selected" value = "<?php echo esc_attr( $bread_style);?>"><?php echo esc_attr($bread_style);?></option>
         <option value="Show"><?php  esc_html_e('Show','grassywp');?></option>
         <option value="Hide"><?php  esc_html_e('Hide','grassywp');?></option>
      </select>       
    </p>

     <p> 
      <h4><?php esc_html_e('Select Footer Style','grassywp');?></h4> 
      <?php $trans_footer = get_post_meta( $post->ID, 'trans_footer', true ); 
      if($trans_footer!=''){
        $footer_style=$trans_footer;
      }
      else{
         $footer_style='Footer Style 1';
      }
    ?>
          
      <select name="trans_footer">
         <option selected="selected" value="<?php echo esc_attr($footer_style);?>"><?php echo esc_attr($footer_style);?></option>
         <option value="Footer Style 1"><?php esc_html_e('Footer Style 1','grassywp');?></option>
         <option value="Footer Style 2"><?php esc_html_e('Footer Style 2','grassywp');?></option>
         <option value="Footer Style 3"><?php esc_html_e('Footer Style 3','grassywp');?></option>
         <option value="Footer Style 4"><?php esc_html_e('Footer Style 4','grassywp');?></option>
         <option value="Footer Style 5"><?php esc_html_e('Footer Style 5','grassywp' );?></option>             
      </select>       
    </p> 
<?php    

}

/**
 * Add Header background image metabox to the back end for pages
 */

function graasy_add_meta_boxes() {
    add_meta_box( 'case-study-bg', esc_html__('Header Settings', 'grassywp'), 'graasy_header_bg', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'graasy_add_meta_boxes' );

/**
 * Save background image metabox for header banner
 */

function save_header_bg_meta_box( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'header_bg_bg_nonce' ] ) && wp_verify_nonce( $_POST[ 'header_bg_bg_nonce' ], 'header_bg_bg_submit' ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
        return;
    }

   //Save Value
  
  if( isset( $_POST[ 'meta-image' ] ) ) {
        update_post_meta( $post_id, 'meta-image', sanitize_text_field( $_POST[ 'meta-image' ]));
    }
  if( isset( $_POST[ 'trans_header' ] ) ) {
        update_post_meta( $post_id, 'trans_header', sanitize_text_field( $_POST['trans_header' ]));
    }

    if( isset( $_POST[ 'trans_footer' ] ) ) {
        update_post_meta( $post_id, 'trans_footer', sanitize_text_field( $_POST['trans_footer' ]));
    }
	 if( isset( $_POST[ 'page_title' ] ) ) {
        update_post_meta( $post_id, 'page_title', sanitize_text_field( $_POST[ 'page_title' ]));
    }

    if( isset( $_POST[ 'page_bread' ] ) ) {
        update_post_meta( $post_id, 'page_bread', sanitize_text_field( $_POST[ 'page_bread' ]));
    }
    
}
add_action( 'save_post', 'save_header_bg_meta_box' );



//metabox for page & posts sidebar
/* Define the custom box */
 
add_action( 'add_meta_boxes', 'add_sidebar_metabox' );
add_action( 'save_post', 'save_sidebar_postdata' );
 
/* Adds a box to the side column on the Post and Page edit screens */
function add_sidebar_metabox()
{
    add_meta_box( 
        'custom_sidebar',
        esc_html__( 'Post Sidebar Setting', 'grassywp' ),
        'custom_sidebar_callback',
        'post',
        'side'
    );
    add_meta_box( 
        'custom_sidebar',
        esc_html__( 'Page Sidebar Setting', 'grassywp' ),
        'custom_sidebar_callback',
        'page',
        'side'
    );
}

/* Prints the box content */
function custom_sidebar_callback( $post ){
    global $wp_registered_sidebars;     
    $custom = get_post_custom($post->ID);     
    if(isset($custom['custom_sidebar']))
      $val = $custom['custom_sidebar'][0];
    else
      $val = "Sidebar"; 
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'custom_sidebar_nonce' ); 
    // The actual fields for data entry
  	$left_check='';	
  	$right_check='';
  	$full_check='';
  	$lcalss='';
  	$rcalss='';
  	$fcalss='';
	
  	$page_layout = get_post_meta( $post->ID, 'layout', true );
  	if($page_layout == '2left'){
  		$left_check= 'checked="checked"';
  		$lcalss = 'active';
  	}
  	else if($page_layout == '2right'){
  		$right_check = 'checked="checked"';
  		$rcalss = 'active';		
  	}
  	
  	else{
  		$full_check = 'checked="checked"';
  		$fcalss = 'active';
  	}
	
	  $directory = get_template_directory_uri();	 
	  $output1 = '<div class="radio-select"><p><label for="myplugin_layout">'.esc_html__("Choose Layout", 'grassywp' ).'</label></p>';
	  $output1 .='<input id="2left" type="radio" name="layout" value="2left" '.esc_attr($left_check).'><label for="2left" class="'.esc_attr($lcalss).'"><img src="'.esc_url($directory).'/images/2cl.png" /></label>';
	  $output1 .='<input id="2right" type="radio" name="layout" value="2right" '.esc_attr($right_check).'><label for="2right" class="'.esc_attr($rcalss).'"><img src="'.esc_url($directory).'/images/2cr.png" /></label>';
	  $output1 .='<input id="full" type="radio" name="layout" value="full" '.esc_attr($full_check).'><label for="full" class="full '.$fcalss.'"><img src="'.esc_url($directory).'/images/1c.png" /></label></div>';
	  echo ($output1);
	
	  $output = '<p><label for="myplugin_new_field">'.esc_html__("Choose a sidebar to display", 'grassywp' ).'</label></p>';    
    $output .= "<select name='custom_sidebar'>";
 
    // Add a default option
	  $themename = '';
    $output .= "<option";
    if($val == "default")
      $output .= " selected='selected'";
      $output .= " value='default'>".esc_html__('Select Sidebar','grassywp')."</option>";
     
    // Fill the select element with all registered sidebars
    foreach($wp_registered_sidebars as $sidebar_id => $sidebar)
    {
        $output .= "<option";
        if($sidebar_id == $val)
        $output .= " selected='selected'";
        $output .= " value='".$sidebar_id."'>".$sidebar['name']."</option>";
    }     
    $output .= "</select>";       
    echo $output;
  }

/* When the post is saved, saves our custom data */
function save_sidebar_postdata( $post_id )
{
    // verify if this is an auto save routine. 
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
 
    // verify this came from our screen and with proper authorization,
    // because save_post can be triggered at other times
	
	  $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'custom_sidebar_nonce' ] ) && wp_verify_nonce( $_POST[ 'custom_sidebar_nonce' ], 'custom_sidebar_nonce' ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
        return;
    }
 
    /*if ( !wp_verify_nonce( $_POST['custom_sidebar_nonce'], plugin_basename( __FILE__ ) ) )
      return;*/
 
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
 
    if( isset( $_POST[ 'custom_sidebar' ] ) ) {
        update_post_meta( $post_id, 'custom_sidebar', sanitize_text_field($_POST[ 'custom_sidebar' ]) );
    }
	
  	if( isset( $_POST[ 'layout' ] ) ) {
        update_post_meta( $post_id, 'layout', sanitize_text_field($_POST[ 'layout' ]) );
    }

}