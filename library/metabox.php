<?php


// init cmb2
require_once( 'cmb2/init.php' );



// add metabox(es)
function page_metaboxes( $meta_boxes ) {


    // showcase metabox
    $showcase_metabox = new_cmb2_box( array(
        'id' => 'showcase_metabox',
        'title' => 'Showcase',
        'object_types' => array( 'page', 'partner' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( '', 'page-front' )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $showcase_metabox_group = $showcase_metabox->add_field( array(
        'id' => CMB_PREFIX . 'showcase',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Slide', 'cmb2'),
            'remove_button' => __('Remove Slide', 'cmb2'),
            'group_title'   => __( 'Slide {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Subtitle',
        'id'   => 'subtitle',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Link',
        'id'   => 'link',
        'type' => 'text',
    ) );

    $showcase_metabox->add_group_field( $showcase_metabox_group, array(
        'name' => 'Image/Video',
        'id'   => 'image',
        'type' => 'file',
        'preview_size' => array( 200, 100 )
    ) );



    // event metabox
    $event_metabox = new_cmb2_box( array(
        'id' => 'event_metabox',
        'title' => 'Event',
        'object_types' => array( 'event' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $event_metabox->add_field( array(
        'name' => 'Start Date/Time',
        'id'   => CMB_PREFIX . 'event_start',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'End Date/Time',
        'id'   => CMB_PREFIX . 'event_end',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Early Bird Deadline',
        'id'   => CMB_PREFIX . 'event_early_date',
        'type' => 'text_datetime_timestamp'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Early Bird Price',
        'id'   => CMB_PREFIX . 'event_price_early',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Regular Price',
        'id'   => CMB_PREFIX . 'event_price',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Venue',
        'id'   => CMB_PREFIX . 'event_venue',
        'type' => 'text',
    ) );

    $event_metabox->add_field( array(
        'name' => 'Address',
        'id'   => CMB_PREFIX . 'event_address',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'City',
        'id'   => CMB_PREFIX . 'event_city',
        'type' => 'text_medium'
    ) );

    $event_metabox->add_field( array(
        'name' => 'State',
        'id'   => CMB_PREFIX . 'event_state',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Zipcode',
        'id'   => CMB_PREFIX . 'event_zipcode',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Email',
        'id'   => CMB_PREFIX . 'event_email',
        'type' => 'text_email'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Phone',
        'id'   => CMB_PREFIX . 'event_phone',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Fax',
        'id'   => CMB_PREFIX . 'event_fax',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Venue Website',
        'id'   => CMB_PREFIX . 'event_venue_website',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel',
        'id'   => CMB_PREFIX . 'event_hotel',
        'type' => 'text',
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Address',
        'id'   => CMB_PREFIX . 'event_hotel_address',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel City',
        'id'   => CMB_PREFIX . 'event_hotel_city',
        'type' => 'text_medium'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel State',
        'id'   => CMB_PREFIX . 'event_hotel_state',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Zipcode',
        'id'   => CMB_PREFIX . 'event_hotel_zipcode',
        'type' => 'text_small'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Email',
        'id'   => CMB_PREFIX . 'event_hotel_email',
        'type' => 'text_email'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Phone',
        'id'   => CMB_PREFIX . 'event_hotel_phone',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Rate',
        'id'   => CMB_PREFIX . 'event_hotel_price',
        'type' => 'text_money'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Hotel Website',
        'id'   => CMB_PREFIX . 'event_hotel_website',
        'type' => 'text'
    ) );

    $event_metabox->add_field( array(
        'name' => 'Event Website',
        'id'   => CMB_PREFIX . 'event_website',
        'desc' => 'If populated, links from the calendar/listings will go directly to this URL instead of the event page on this website.',
        'type' => 'text'
    ) );


}
add_filter( 'cmb2_init', 'page_metaboxes' );



// get CMB value
function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}


function cmb2_metabox_show_on_template( $display, $meta_box ) {
    if ( isset( $meta_box['show_on']['key'] ) && isset( $meta_box['show_on']['value'] ) ) :
        if( 'template' !== $meta_box['show_on']['key'] )
            return $display;

        // Get the current ID
        if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
        elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
        if( !isset( $post_id ) ) return false;

        $template_name = get_page_template_slug( $post_id );
        if ( !empty( $template_name ) ) $template_name = substr($template_name, 0, -4);

        // If value isn't an array, turn it into one
        $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

        // See if there's a match
        return in_array( $template_name, $meta_box['show_on']['value'] );
    else:
        return $display;
    endif;
}
add_filter( 'cmb2_show_on', 'cmb2_metabox_show_on_template', 10, 2 );



?>