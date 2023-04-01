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
// Register Team Post Type
function grassy_team_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Members', 'grassywp' ),
		'singular_name'      => esc_html__( 'Member', 'grassywp' ),
		'add_new'            => esc_html_x( 'Add New Member', 'grassywp', 'grassywp' ),
		'add_new_item'       => esc_html__( 'Add New Member', 'grassywp' ),
		'edit_item'          => esc_html__( 'Edit Member', 'grassywp' ),
		'new_item'           => esc_html__( 'New Member', 'grassywp' ),
		'all_items'          => esc_html__( 'All Members', 'grassywp' ),
		'view_item'          => esc_html__( 'View Member', 'grassywp' ),
		'search_items'       => esc_html__( 'Search Members', 'grassywp' ),
		'not_found'          => esc_html__( 'No Members found', 'grassywp' ),
		'not_found_in_trash' => esc_html__( 'No Members found in Trash', 'grassywp' ),
		'parent_item_colon'  => esc_html__( 'Parent Member:', 'grassywp' ),
		'menu_name'          => esc_html__( 'Team', 'grassywp' ),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title', 'thumbnail','editor' )
	);
	register_post_type( 'teams', $args );
}
add_action( 'init', 'grassy_team_register_post_type' );
// Meta Box
/*--------------------------------------------------------------
*			Member info
*-------------------------------------------------------------*/
function grassy_team_member_info_meta_box() {
	add_meta_box( 'member_info_meta', esc_html__( 'Member Info', 'grassywp' ), 'grassy_team_member_info_meta_callback', 'teams', 'advanced', 'high', 1 );
}
add_action( 'add_meta_boxes', 'grassy_team_member_info_meta_box');
// member info callback
function grassy_team_member_info_meta_callback( $member_info ) {
	wp_nonce_field( 'member_social_metabox', 'member_social_metabox_nonce' ); ?>
	<div style="margin: 10px 0;"><label for="designation" style="width:150px; display:inline-block;"><?php esc_html_e( 'Designation', 'grassywp' ) ?></label>
	<?php $designation = get_post_meta( $member_info->ID, 'designation', true ); ?>
	<input type="text" name="designation" id="designation" class="designation" value="<?php echo esc_html($designation); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="company" style="width:150px; display:inline-block;"><?php esc_html_e( 'Company', 'grassywp' ) ?></label>
	<?php $company = get_post_meta( $member_info->ID, 'company', true ); ?>
	<input type="text" name="company" id="company" class="company" value="<?php echo esc_html($company); ?>" style="width:300px;"/>
	</div> 

    <div style="margin: 10px 0;"><label for="Description" style="width:150px; display:inline-block;"><?php esc_html_e( 'Short Description', 'grassywp' ) ?></label>
	<?php $description = get_post_meta( $member_info->ID, 'description', true ); ?>
	<textarea name="description" id="description" class="description" style="width:300px; height:120px"/><?php echo esc_html($description); ?></textarea>
	</div>

	<div style="margin: 10px 0;"><label for="address" style="width:150px; display:inline-block;"><?php esc_html_e( 'Address', 'grassywp' ) ?></label>
	<?php $address = get_post_meta( $member_info->ID, 'address', true ); ?>
	<input type="text" name="address" id="address" class="address" value="<?php echo esc_html($address); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="city" style="width:150px; display:inline-block;"><?php esc_html_e( 'City', 'grassywp' ) ?></label>
	<?php $city = get_post_meta( $member_info->ID, 'city', true ); ?>
	<input type="text" name="city" id="city" class="city" value="<?php echo esc_html($city); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="state" style="width:150px; display:inline-block;"><?php esc_html_e( 'State', 'grassywp' ) ?></label>
	<?php $state = get_post_meta( $member_info->ID, 'state', true ); ?>
	<input type="text" name="state" id="state" class="state" value="<?php echo esc_html($state); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="country" style="width:150px; display:inline-block;"><?php esc_html_e( 'Country', 'grassywp' ) ?></label>
	<?php $country = get_post_meta( $member_info->ID, 'country', true ); ?>
	<input type="text" name="country" id="country" class="country" value="<?php echo esc_html($country); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="phone" style="width:150px; display:inline-block;"><?php esc_html_e( 'Phone', 'grassywp' ) ?></label>
	<?php $phone = get_post_meta( $member_info->ID, 'phone', true ); ?>
	<input type="text" name="phone" id="phone" class="phone" value="<?php echo esc_html($phone); ?>" style="width:300px;"/>
	</div>

	<div style="margin: 10px 0;"><label for="email" style="width:150px; display:inline-block;"><?php esc_html_e( 'Email', 'grassywp' ) ?></label>
	<?php $email = get_post_meta( $member_info->ID, 'email', true ); ?>
	<input type="text" name="email" id="email" class="email" value="<?php echo esc_html($email); ?>" style="width:300px;"/>
	</div> 

	<div style="margin: 10px 0;"><label for="website" style="width:150px; display:inline-block;"><?php esc_html_e( 'Website', 'grassywp' ) ?></label>
	<?php $website = get_post_meta( $member_info->ID, 'website', true ); ?>
	<input type="text" name="website" id="website" class="website" value="<?php echo esc_html($website); ?>" style="width:300px;"/>
	</div> 

<?php }
/*--------------------------------------------------------------
*			Member social links
*-------------------------------------------------------------*/
function grassy_team_member_social_link_meta_box() {
	add_meta_box( 'member_social_link_meta', esc_html__( 'Member Social Links', 'grassywp' ), 'grassy_team_social_meta_link_callback', 'teams', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'grassy_team_member_social_link_meta_box' );
// Social Meta Callback
function grassy_team_social_meta_link_callback( $social_meta ) {
	wp_nonce_field( 'member_social_metabox', 'member_social_metabox_nonce' ); ?>
	<!-- member social -->
	<div class="wrap-meta-group">
		<div style="margin: 10px 0;"><label for="facebook" style="width:150px; display:inline-block;"><?php esc_html_e( 'Facebook', 'grassywp' ) ?></label>
			<?php $facebook = get_post_meta( $social_meta->ID, 'facebook', true ); ?>
			<input type="text" name="facebook" id="facebook" class="facebook" value="<?php echo esc_html($facebook); ?>" style="width:300px;"/>
		</div>
		<div style="margin: 10px 0;"><label for="twitter" style="width:150px; display:inline-block;"><?php esc_html_e(
					'Twitter', 'grassywp' ) ?></label>
			<?php $twitter = get_post_meta( $social_meta->ID, 'twitter', true ); ?>
			<input type="text" name="twitter" id="twitter" class="twitter" value="<?php echo esc_html($twitter); ?>" style="width:300px;"/>
		</div>
		<div style="margin: 10px 0;"><label for="google_plus" style="width:150px; display:inline-block;"><?php esc_html_e( 'Google Plus', 'grassywp' ) ?></label>
			<?php $google_plus = get_post_meta( $social_meta->ID, 'google_plus', true ); ?>
			<input type="text" name="google_plus" id="google_plus" class="google_plus" value="<?php echo esc_html($google_plus); ?>" style="width:300px;"/>
		</div>
		<div style="margin: 10px 0;"><label for="linkedin" style="width:150px; display:inline-block;"><?php esc_html_e( 'Linkedin', 'grassywp' ) ?></label>
			<?php $linkedin= get_post_meta( $social_meta->ID, 'linkedin', true ); ?>
			<input type="text" name="linkedin" id="linkedin" class="linkedin" value="<?php echo esc_html($linkedin); ?>" style="width:300px;"/>
		</div>
	</div>
<?php }
/*--------------------------------------------------------------
 *			Save member social meta
*-------------------------------------------------------------*/
function save_grassy_team_member_social_meta( $post_id ) {
	if ( ! isset( $_POST['member_social_metabox_nonce'] ) ) {
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( 'teams' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}
	$mymeta = array( 'facebook', 'twitter', 'google_plus', 'linkedin', 'designation', 'description','website','phone','address','city','state','country','phone','email','company' );
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
add_action( 'save_post', 'save_grassy_team_member_social_meta' );