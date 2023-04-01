<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @package grassywp
 * @author RS Theme
 * @link http://www.rstheme.com
 */
?>
<?php
// Register Portfolio Post Type
function grassy_portfolio_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Portfolios', 'grassywp' ),
		'singular_name'      => esc_html__( 'Portfolio', 'grassywp' ),
		'add_new'            => esc_html_x( 'Add New Portfolio', 'grassywp', 'grassywp' ),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'grassywp' ),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'grassywp' ),
		'new_item'           => esc_html__( 'New Portfolio', 'grassywp' ),
		'all_items'          => esc_html__( 'All Portfolios', 'grassywp' ),
		'view_item'          => esc_html__( 'View Portfolio', 'grassywp' ),
		'search_items'       => esc_html__( 'Search Portfolios', 'grassywp' ),
		'not_found'          => esc_html__( 'No Portfolios found', 'grassywp' ),
		'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'grassywp' ),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'grassywp' ),
		'menu_name'          => esc_html__( 'Portfolio', 'grassywp' ),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,	
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title', 'thumbnail','editor' ),		
	);
	register_post_type( 'portfolios', $args );
}
add_action( 'init', 'grassy_portfolio_register_post_type' );
function tr_create_portfolio() {
    register_taxonomy(
        'portfolio-category',
        'portfolios',
        array(
            'label' => __( 'Categories','grassywp' ),
            'rewrite' => array( 'slug' => 'portfolio-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'tr_create_portfolio' );

// Meta Box

/*--------------------------------------------------------------
*			Portfolio info
*-------------------------------------------------------------*/
function grassy_portfolio_meta_box() {
	add_meta_box( 'member_info_meta', esc_html__( 'Portfolio Info', 'grassywp' ), 'grassy_portfolio_member_info_meta_callback', 'portfolios', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'grassy_portfolio_meta_box');
// member info callback
function grassy_portfolio_member_info_meta_callback( $portfolio_info ) {
	wp_nonce_field( 'portfolio_metabox', 'portfolio_metabox' ); ?>
<div style="margin: 10px 0;">
  <label for="tagline" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Project Tag Line', 'grassywp' ) ?>
  </label>
  <?php $tagline = get_post_meta( $portfolio_info->ID, 'tagline', true ); ?>
  <input type="text" name="tagline" id="tagline" class="tagline" value="<?php echo esc_html($tagline); ?>" style="width:300px;"/>
</div>
<div style="margin: 10px 0;">
  <label for="created" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Created by: ', 'grassywp' ) ?>
  </label>
  <?php $created = get_post_meta( $portfolio_info->ID, 'created', true ); ?>
  <input type="text" name="created" id="created" class="created" value="<?php echo esc_html($created); ?>" style="width:300px;" />
</div>
<div style="margin: 10px 0;">
  <label for="date" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Date: ', 'grassywp' ) ?>
  </label>
  <?php $date = get_post_meta( $portfolio_info->ID, 'date', true ); ?>
  <input type="text" name="date" id="date" class="date" value="<?php echo esc_html($date); ?>" style="width:300px;" />
</div>
<div style="margin: 10px 0;">
  <label for="skills" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Skills: ', 'grassywp' ) ?>
  </label>
  <?php $skills = get_post_meta( $portfolio_info->ID, 'skills', true ); ?>
  <input type="text" name="skills" id="skills" class="skills" value="<?php echo esc_html($skills); ?>" style="width:300px;" />
</div>
<div style="margin: 10px 0;">
  <label for="client" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Client: ', 'grassywp' ) ?>
  </label>
  <?php $client = get_post_meta( $portfolio_info->ID, 'client', true ); ?>
  <input type="text" name="client" id="client" class="client" value="<?php echo esc_html($client); ?>" style="width:300px; "/>
</div>
<div style="margin: 10px 0;">
  <label for="demo" style="width:150px; display:inline-block;">
    <?php esc_html_e( 'Demo Links: ', 'grassywp' ) ?>
  </label>
  <?php $demo = get_post_meta( $portfolio_info->ID, 'demo', true ); ?>
  <input type="text" name="demo" id="demo" class="demo" value="<?php echo esc_html($demo); ?>" style="width:300px;" />
</div>
<?php }
/*--------------------------------------------------------------
 *			Save meta
*-------------------------------------------------------------*/
function save_grassy_portfolio_social_meta( $post_id ) {
	if ( ! isset( $_POST['portfolio_metabox'] ) ) {
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( 'portfolios' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}
	$mymeta = array( 'tagline','created','date','skills','client','demo' );
	foreach ( $mymeta as $keys ) {

		if ( is_array( $_POST[ $keys ] ) ) {
			$data = array();

			foreach ( $_POST[ $keys ] as $key => $value ) {
				$data[] = $value;
			}
		} else {
			$data = sanitize_text_field( $_POST[ $keys ] );
		}
		update_post_meta( $post_id, $keys, $data );
	}
}
add_action( 'save_post', 'save_grassy_portfolio_social_meta' );