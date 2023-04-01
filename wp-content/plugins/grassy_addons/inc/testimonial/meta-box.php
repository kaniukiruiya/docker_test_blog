<?php
/*
 * * Register MetaBox For Testimonial CPT
 */
// Meta Box

/*--------------------------------------------------------------
*			Member info
*-------------------------------------------------------------*/

function clt_testimonials_meta_box() {
	add_meta_box( 'testimonial_info_meta', esc_html__( 'Member Info', 'grassywp' ), 'clt_testimonials_meta_callback', 'clt_testimonials', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'clt_testimonials_meta_box');


// testimonial info callback
function clt_testimonials_meta_callback( $testimonial_info ) {

	wp_nonce_field( 'testimonial_social_metabox', 'testimonial_social_metabox_nonce' ); ?>

	<div style="margin: 10px 0;"><label for="designation" style="width:150px; display:inline-block;"><?php esc_html_e( 'Designation', 'grassywp' ) ?></label>
	<?php $designation = get_post_meta( $testimonial_info->ID, 'designation', true ); ?>
	<input type="text" name="designation" id="designation" class="designation" value="<?php echo esc_html($designation); ?>" style="width:300px;"/>
	</div>   


<?php }



/*--------------------------------------------------------------
 *			Save testimonial social meta
*-------------------------------------------------------------*/
function save_clt_testimonials_meta_social_meta( $post_id ) {
	if ( ! isset( $_POST['testimonial_social_metabox_nonce'] ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'clt_testimonials' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	$mymeta = array( 'designation' );

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

add_action( 'save_post', 'save_clt_testimonials_meta_social_meta' );