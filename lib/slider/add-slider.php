<?php
    /**
    * add Slider function and methods file include section file
    * 
    * @package myresturent
    */

    function myResturentSlider() {
    $labels = array(
        'name'                  => _x( 'Slider', 'myresturent' ),
        'singular_name'         => _x( 'Slider', 'myresturent' ),
        'menu_name'             => _x( 'Slider', 'myresturent' ),
        'name_admin_bar'        => _x( 'Slider', 'myresturent' ),
        'add_new'               => __( 'Add Slider', 'myresturent' ),
        'add_new_item'          => __( 'Add New Slider', 'myresturent' ),
        'new_item'              => __( 'New Slider', 'myresturent' ),
        'edit_item'             => __( 'Edit Slider', 'myresturent' ),
        'view_item'             => __( 'View Slider', 'myresturent' ),
        'all_items'             => __( 'All Slider', 'myresturent' ),
        'search_items'          => __( 'Search Slider', 'myresturent' ),
        'parent_item_colon'     => __( 'Parent Slider:', 'myresturent' ),
        'not_found'             => __( 'No Slider found.', 'myresturent' ),
        'not_found_in_trash'    => __( 'No Slider found in Trash.', 'myresturent' ),
        'featured_image'        => _x( 'Slider Image', 'myresturent' ),
        'set_featured_image'    => _x( 'Set Slider image','myresturent' ),
        'remove_featured_image' => _x( 'Remove Slider image','myresturent' ),
        'use_featured_image'    => _x( 'Use as Slider image','myresturent' ),
        'archives'              => _x( 'Slider archives',  'myresturent' ),
        'insert_into_item'      => _x( 'Insert into Slider','myresturent' ),
        'filter_items_list'     => _x( 'Filter Slider list', 'myresturent' ),
        'items_list_navigation' => _x( 'Slider list navigation', 'myresturent' ),
        'items_list'            => _x( 'Slider list', 'myresturent' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes' ),
        'taxonomies'          => array( 'post_tag','genres','Slider-category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    );
 
    register_post_type( 'Slider', $args );
}
add_action( 'init', 'myResturentSlider' );


// Add the Custom Meta Box for slider

function myResturentSliderMetaBox() {
    add_meta_box(
        'custom_meta_box', // $id
        'Slider Link text', // $title 
        'myResturentSliderShowMetaBox', // $callback
        'slider', // $page
        'normal', // $context
        'high' // $priority
    ); 
}
add_action('add_meta_boxes', 'myResturentSliderMetaBox');


// Custom slider fields array
$prefix = 'slider_';
$custom_meta_fields = array(
    array(
        'label'=> 'Slider Link Text',
        'desc'  => 'Enter Link Text to be displayed in Slider',
        'id'    => $prefix.'sliderLink',
        'type'  => 'text',
    ),
);

// The slider callback function
function myResturentSliderShowMetaBox() {
 
    global $custom_meta_fields, $post;
     
    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
      
    // Begin the field table and loop
    echo '<table class="form-table">';
     
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // text field
                    case 'text':
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                            <br /><span class="description">'.$field['desc'].'</span>';
                    break;
nbsp;               }
        echo '</td></tr>';
    }
     
    echo '</table>';
     
}
 
// Save the custom meta data
function myResturentSliderSaveMetaBox($post_id) {
 
    global $custom_meta_fields;
    if (isset($_POST['custom_meta_box_nonce'])) {
        // verify nonce
        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))){
            return $post_id;
        } 
    }
         
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
         
    // check permissions
    if (isset($_POST['post_type'])) {
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
        }
    }
    if (isset($_POST['custom_meta_box_nonce'])) {
        // loop through fields and save the Slider meta data
        foreach ($custom_meta_fields as $field) {
            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
            if ($new && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}
add_action('save_post', 'myResturentSliderSaveMetaBox');

// register slider category
register_taxonomy("Slider-category", array("Slider"), array(
    "hierarchical"  =>  true, 
    "label" => "Slider Categories", 
    "singular_label" => 
    "Slider Category",  
    "rewrite" => true,
    'default_term'  => 'Un Category',
));