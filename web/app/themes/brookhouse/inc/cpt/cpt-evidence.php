<?php

/**
 * Brookhouse custom post type 'Evidence'
 *
 * @package brookhouse
 */

/**
*
* Register the Evidence custom post type
*
* */
add_action('init', 'brookhouse_ctp_evidence_init');

function brookhouse_ctp_evidence_init()
{
    global $evidenceTaxonomies;

    $labels = [
        'name' => 'Evidence',
        'singular_name' => 'Evidence',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit Evidence Entry',
        'new_item' => 'New Evidence Entry',
        'all_items' => 'View All Evidence',
        'view_item' => 'View Evidence Entries',
        'search_items' => 'Search Evidence',
        'not_found' => 'No entries found',
        'not_found_in_trash' => 'No Evidence entries found in Bin',
        'parent_item_colon' => '',
        'menu_name' => 'Evidence'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'evidence'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-playlist-audio',
        'supports' => array('title'),
        'taxonomies' => $evidenceTaxonomies

    ];

    register_post_type('evidence', $args);
}
