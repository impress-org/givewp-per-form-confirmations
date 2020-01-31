jQuery(document).ready(function($) {
    var price_option = $( '.pfconfs4givewp-fields_status_field input:radio' );
    var message_location = $('.pfconfs4givewp-fields_message_location_field');

    price_option.on( 'change', function() {

        var price_option_val = $( '.pfconfs4givewp-fields_status_field input:radio:checked' ).val();
        if ( price_option_val === 'customize' ) {
            //set price shows
            $( '.pfconfs4givewp-fields_page_url_field' ).show();
            $( '.pfconfs4givewp-fields_message_location_field' ).show(); // Hide multi-val stuffs.
            $( '.pfconfs4givewp-fields_confirmation_message_field' ).show(); // Hide display style setting.

        } else {
            //multi-value shows
            $( '.pfconfs4givewp-fields_page_url_field' ).hide();
            $( '.pfconfs4givewp-fields_message_location_field' ).hide(); // Hide multi-val stuffs.
            $( '.pfconfs4givewp-fields_confirmation_message_field' ).hide(); // Hide display style setting.
        }
    } ).change();

    message_location.on( 'change', function() {

        var price_option_val = $( '.pfconfs4givewp-fields_message_location_field input:radio:checked' ).val();
        
        if ( price_option_val === 'disabled' ) {
            //set price shows
            $( '.pfconfs4givewp-fields_confirmation_message_field' ).hide();

        } else {
            //multi-value shows
            $( '.pfconfs4givewp-fields_confirmation_message_field' ).show();
        }
    } ).change();
});