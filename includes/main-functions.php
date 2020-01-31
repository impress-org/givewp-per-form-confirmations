<?php 


/*
 * REDIRECT FUNCTION
 * Hooks into give_get_success_page_uri
 * 
 */
 
function pfconfs_4_give_redirects( $success_page ) {

    $give_options = give_get_settings();

    $success_page = isset( $give_options['success_page'] ) ? get_permalink( absint( $give_options['success_page'] ) ) : get_bloginfo( 'url' );

    $form_id = isset( $_POST['give-form-id'] ) ? $_POST['give-form-id'] : 0;

    $redirect_status = get_post_meta( $form_id, 'pfconfs4givewp-fields_status', true);
    $conf_url = get_post_meta( $form_id, 'pfconfs4givewp-fields_page_url', true);

	if ( $redirect_status == 'customize' ) {
		$success_page = $conf_url[0];
    } 

	return $success_page;

}

add_filter( 'give_get_success_page_uri', 'pfconfs_4_give_redirects', 10, 1 );

/*
 * MESSAGING FUNCTIONS
 * Adds custom messaging above/below the donation confirmation table
 */
add_action('give_payment_receipt_before_table', 'pfconfs4givewp_output_sharing_above');
add_action('give_payment_receipt_after_table', 'pfconfs4givewp_output_sharing_below');

function pfconfs4givewp_output_sharing_above() {

    global $give_receipt_args, $donation;

    $args['ID']     = $donation->ID;
    $args['form_id'] = get_post_meta( $args['ID'], '_give_payment_form_id', true );
    $args['form_meta'] = get_post_meta( $args['form_id'] );

    $position = $args['form_meta']['pfconfs4givewp-fields_message_location'][0];
    $message = $args['form_meta']['pfconfs4givewp-fields_confirmation_message'][0];

    if ( $position =='above' ) {
        echo esc_html( $message );
    }
}

function pfconfs4givewp_output_sharing_below() {
    
    global $give_receipt_args, $donation;

    $args['ID']     = $donation->ID;
    $args['form_id'] = get_post_meta( $args['ID'], '_give_payment_form_id', true );
    $args['form_meta'] = get_post_meta( $args['form_id'] );

    $position = $args['form_meta']['pfconfs4givewp-fields_message_location'][0];
    $message = $args['form_meta']['pfconfs4givewp-fields_confirmation_message'][0];

    if ( $position=='below' ) {
        echo esc_html( $message );
    }
}
