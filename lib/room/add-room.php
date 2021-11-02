<?php
    /**
    * add Room function and methods file include section file
    * 
    * @package myresturent
    */

    function myResturentRoom() {
    $labels = array(
        'name'                  => _x( 'Room', 'myresturent' ),
        'singular_name'         => _x( 'Room', 'myresturent' ),
        'menu_name'             => _x( 'Room', 'myresturent' ),
        'name_admin_bar'        => _x( 'Room', 'myresturent' ),
        'add_new'               => __( 'Add Room', 'myresturent' ),
        'add_new_item'          => __( 'Add New Room', 'myresturent' ),
        'new_item'              => __( 'New Room', 'myresturent' ),
        'edit_item'             => __( 'Edit Room', 'myresturent' ),
        'view_item'             => __( 'View Room', 'myresturent' ),
        'all_items'             => __( 'All Room', 'myresturent' ),
        'search_items'          => __( 'Search Room', 'myresturent' ),
        'parent_item_colon'     => __( 'Parent Room:', 'myresturent' ),
        'not_found'             => __( 'No Room found.', 'myresturent' ),
        'not_found_in_trash'    => __( 'No Room found in Trash.', 'myresturent' ),
        'featured_image'        => _x( 'Room Image', 'myresturent' ),
        'set_featured_image'    => _x( 'Set Room image','myresturent' ),
        'remove_featured_image' => _x( 'Remove Room image','myresturent' ),
        'use_featured_image'    => _x( 'Use as Room image','myresturent' ),
        'archives'              => _x( 'Room archives',  'myresturent' ),
        'insert_into_item'      => _x( 'Insert into Room','myresturent' ),
        'filter_items_list'     => _x( 'Filter Room list', 'myresturent' ),
        'items_list_navigation' => _x( 'Room list navigation', 'myresturent' ),
        'items_list'            => _x( 'Room list', 'myresturent' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Room' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes' ),
        'taxonomies'          => array( 'post_tag','genres','Room-category'),
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
 
    register_post_type( 'Room', $args );
}
add_action( 'init', 'myResturentRoom' );


// Add the Custom Meta Box for Room

function myResturentRoomMetaBox() {
    add_meta_box(
        'custom_meta_box', // $id
        'Room Price text', // $title 
        'myResturentRoomShowMetaBox', // $callback
        'Room', // $page
        'normal', // $context
        'high' // $priority
    ); 
}
add_action('add_meta_boxes', 'myResturentRoomMetaBox');


// Custom Room fields array
$prefix = 'Room_';
$custom_meta_fields = array(
    array(
        'label'=> 'Room Price Per Night',
        'desc'  => 'Enter rice Per Night to be displayed in Room',
        'id'    => $prefix.'RoomPrice',
        'type'  => 'text',
    ),
);

// The Room callback function
function myResturentRoomShowMetaBox() {
 
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
function myResturentRoomSaveMetaBox($post_id) {
 
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
        // loop through fields and save the Room meta data
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
add_action('save_post', 'myResturentRoomSaveMetaBox');

// register Room category
register_taxonomy("Room-category", array("Room"), array(
    "hierarchical"  =>  true, 
    "label" => "Room Categories", 
    "singular_label" => 
    "Room Category",  
    "rewrite" => true,
    'default_term'  => 'Un Category',
));