<?php

/**
 * Brookhouse custom post type 'Hearing'
 *
 * @package brookhouse
 */

/**
*
* Register the Hearing custom post type
*
* */
add_action('init', 'brookhouse_ctp_hearing_init');

function brookhouse_ctp_hearing_init()
{

    $labels = [
        'name' => 'Hearings',
        'singular_name' => 'Hearing',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit Hearing Entry',
        'new_item' => 'New Entry',
        'all_items' => 'View All Hearings',
        'view_item' => 'View Entries',
        'search_items' => 'Search Hearing',
        'not_found' => 'No entries found',
        'not_found_in_trash' => 'No Hearing entries found in Bin',
        'parent_item_colon' => '',
        'menu_name' => 'Hearings',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hearings'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => array('title'),
    ];

    register_post_type('hearing', $args);
}

/**
*
* Remove side meta boxes on Document entry admin page - these have been replaced in ACF with ACF fields
*
* */
//add_action('do_meta_boxes', 'wpdocs_remove_plugin_metaboxes');

// function wpdocs_remove_plugin_metaboxes()
// {
//     global $brookhouseTaxonomies;

//     if (count($brookhouseTaxonomies) > 0) {
//         remove_meta_box('corporate-documentsdiv', 'Document', 'side');
//         remove_meta_box('media-releasesdiv', 'Document', 'side');
//         remove_meta_box('other-publicationsdiv', 'Document', 'side');
//     }
// }
