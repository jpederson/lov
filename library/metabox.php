<?php


// init cmb2
require_once( 'cmb2/init.php' );



// add metabox(es)
function page_metaboxes( $meta_boxes ) {


    // global vars we're using to store CU Match up questions.
    global $goals, $stages;


    // set up the colors
    $colors = array(
        'teal' => 'Teal',
        'river' => 'River',
        'navy' => 'Navy',
        'forest' => 'Forest',
        'lime' => 'Lime',
        'orange' => 'Orange',
        'grey-light' => 'Grey - Light',
        'grey-dark' => 'Grey - Dark',
    );


    // showcase metabox
    $title_metabox = new_cmb2_box( array(
        'id' => 'title_metabox',
        'title' => 'Large Title',
        'object_types' => array( 'page', 'product' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ));

    $title_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'large-title',
        'type' => 'text',
    ) );

    $title_metabox->add_field( array(
        'name' => 'Icon',
        'id'   => CMB_PREFIX . 'large-title-icon',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $title_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'large-title-color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );



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



    // showcase metabox
    $left_metabox = new_cmb2_box( array(
        'id' => 'left_metabox',
        'title' => 'Left Column',
        'object_types' => array( 'page', 'product' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
    ));

    $left_metabox->add_field( array(
        'name' => 'Left Column Content',
        'description' => 'Enter text or ads for the left column.',
        'id'   => CMB_PREFIX . 'left_content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );




    // select all products
    $args = array( 'post_type' => 'product', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' );
    $loop = new WP_Query( $args );
    $products = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $products[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();



    // accordion metabox
    $prod_accordion_metabox = new_cmb2_box( array(
        'id' => 'prod_accordion_metabox',
        'title' => 'Product Accordion',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( "" )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $prod_accordion_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'prod_accordion_title',
        'type' => 'text',
    ) );

    $prod_accordion_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'prod_accordion_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $prod_accordion_metabox->add_field( array(
        'name' => 'Icon',
        'id'   => CMB_PREFIX . 'prod_accordion_icon',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $prod_accordion_metabox->add_field( array(
        'name' => 'Products',
        'id' => CMB_PREFIX . 'prod_accordion_products',
        'type' => 'multicheck',
        'options' => $products,
    ) );



    // select all products
    $args = array( 'post_type' => 'partner', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC' );
    $loop = new WP_Query( $args );
    $partners = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $partners[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();



    // accordion metabox
    $part_accordion_metabox = new_cmb2_box( array(
        'id' => 'part_accordion_metabox',
        'title' => 'Partner Accordion',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( "" )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $part_accordion_metabox->add_field( array(
        'name' => 'Title',
        'id'   => CMB_PREFIX . 'part_accordion_title',
        'type' => 'text',
    ) );

    $part_accordion_metabox->add_field( array(
        'name' => 'Color',
        'id'   => CMB_PREFIX . 'part_accordion_color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $part_accordion_metabox->add_field( array(
        'name' => 'Icon',
        'id'   => CMB_PREFIX . 'part_accordion_icon',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $part_accordion_metabox->add_field( array(
        'name' => 'Partners',
        'id' => CMB_PREFIX . 'part_accordion_partners',
        'type' => 'multicheck',
        'options' => $partners,
    ) );



    // accordion metabox
    $accordion_metabox = new_cmb2_box( array(
        'id' => 'accordion_metabox',
        'title' => 'General Accordions',
        'object_types' => array( 'page' ), // post type
        'show_on' => array(
            'key' => 'template',
            'value' => array( "" )
        ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $accordion_metabox_group = $accordion_metabox->add_field( array(
        'id' => CMB_PREFIX . 'accordion',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Box', 'cmb'),
            'remove_button' => __('Remove Box', 'cmb'),
            'group_title'   => __( 'Accordion Box {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Icon',
        'id'   => 'icon',
        'type' => 'file',
        'preview_size' => array( 30, 30 )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Color',
        'id'   => 'color',
        'type' => 'select',
        'default' => 'teal',
        'options' => $colors
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Default State',
        'id'   => 'state',
        'type' => 'select',
        'default' => 'closed',
        'options' => array(
            'closed' => 'Closed',
            'open' => 'Open',
        )
    ) );

    $accordion_metabox->add_group_field( $accordion_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7 )
    ) );



    // partner information
    $partner_info = new_cmb2_box( array(
        'id' => 'partner_info',
        'title' => 'Partner Information',
        'object_types' => array( 'partner' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );

    $partner_info->add_field( array(
        'name' => 'Featured Partner',
        'desc' => 'Set this partner as a featured partner so they show first on listings?',
        'id' => CMB_PREFIX . 'partner_featured',
        'type' => 'select',
        'options' => array(
            '0' => 'No',
            '1' => 'Yes'
        )
    ) );

    $partner_info->add_field( array(
        'name' => 'Logo',
        'desc' => 'Set a partner logo image.',
        'id' => CMB_PREFIX . 'partner_logo',
        'type' => 'file',
        'allow' => array( 'url', 'attachment' )
    ) );

    $partner_contacts = $partner_info->add_field( array(
        'id' => CMB_PREFIX . 'partner_contacts',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Contact', 'cmb'),
            'remove_button' => __('Remove Contact', 'cmb'),
            'group_title'   => __( 'Contact {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $partner_info->add_group_field( $partner_contacts, array(
        'name' => 'Contact Photo',
        'desc' => 'Add a photo of the contact person.',
        'id' => 'photo',
        'type' => 'file',
        'allow' => array( 'url', 'attachment' ),
        'preview_size' => array( 50, 50 )
    ) );

    $partner_info->add_group_field( $partner_contacts, array(
        'name' => 'Contact Name',
        'id' => 'name',
        'type' => 'text_medium'
    ) );

    $partner_info->add_group_field( $partner_contacts, array(
        'name' => 'Phone Number',
        'id' => 'phone',
        'type' => 'text_medium'
    ) );

    $partner_info->add_group_field( $partner_contacts, array(
        'name' => 'Email Address',
        'id' => 'email',
        'type' => 'text_email'
    ) );

    $partner_info->add_field( array(
        'name' => 'Twitter ID',
        'id' => CMB_PREFIX . 'partner_twitter',
        'type' => 'text_medium'
    ) );

    $partner_info->add_field( array(
        'name' => 'Website',
        'id' => CMB_PREFIX . 'partner_website',
        'type' => 'text_url'
    ) );

    $partner_info->add_field( array(
        'name' => 'Testimonials',
        'id' => CMB_PREFIX . 'partner_testimonials',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 10, )
    ) );

    $partner_info->add_field( array(
        'name' => 'Articles',
        'desc' => 'Enter some links to and perhaps snippets of articles from around the web.',
        'id' => CMB_PREFIX . 'partner_articles',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7, )
    ) );

    $partner_info->add_field( array(
        'name' => 'Videos',
        'desc' => 'Paste video URLs to embed videos automatically, so you can enter content above/below it.',
        'id' => CMB_PREFIX . 'partner_videos',
        'type' => 'wysiwyg',
        'options' => array( 'textarea_rows' => 7, )
    ) );

    $partner_info->add_field( array(
        'name' => 'Products',
        'desc' => 'Select the products this partner provides.',
        'id' => CMB_PREFIX . 'partner_products',
        'type' => 'multicheck',
        'options' => $products,
    ) );

    $partner_info->add_field( array(
        'name' => 'Goals',
        'desc' => 'Select the goals the partner will help achieve.',
        'id' => CMB_PREFIX . 'partner_goals',
        'type' => 'multicheck',
        'options' => $goals,
    ) );

    $partner_info->add_field( array(
        'name' => 'Product Stage',
        'desc' => 'How established/tried & true are the products this partner offers.',
        'id' => CMB_PREFIX . 'partner_stages',
        'type' => 'multicheck',
        'options' => $stages,
    ) );

    $partner_info->add_field( array(
        'name' => 'Ad Image',
        'id' => CMB_PREFIX . 'partner_ad_image',
        'desc' => 'Upload an ad image for this partner (768x90).',
        'type' => 'file',
        'preview_size' => array( 768, 90 )
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