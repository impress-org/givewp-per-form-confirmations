<?php 

function pfconfs_4_give_redirects( $success_page ) {

    $give_options = give_get_settings();

    $success_page = isset( $give_options['success_page'] ) ? get_permalink( absint( $give_options['success_page'] ) ) : get_bloginfo( 'url' );

    $form_id = isset( $_POST['give-form-id'] ) ? $_POST['give-form-id'] : 0;
    $form_meta = get_post_meta( $form_id );
    $redirect_status = get_post_meta( $form_id, 'pfconfs4givewp-fields_status', true);
    $conf_url = get_post_meta( $form_id, 'pfconfs4givewp-fields_page_url', true);

	if ( $redirect_status = 'customize' ) {
		$success_page = esc_url( $conf_url );
	} 

	return $success_page;

}

add_filter( 'give_get_success_page_uri', 'pfconfs_4_give_redirects', 10, 1 );