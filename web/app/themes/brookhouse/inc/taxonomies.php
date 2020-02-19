<?php

/**
 * brookhouse taxonomies
 *
 * @package brookhouse
 */

$brookhouseTaxonomies = [
    'corporate-documents',
    'media-releases',
    'other-publications'
];

/**
*
* Register the taxonomies
*
* */
add_action('init', 'brookhouse_create_document_taxonomies');

function brookhouse_create_document_taxonomies()
{
    global $brookhouseTaxonomies;

    if (is_array($brookhouseTaxonomies)) {
        foreach ($brookhouseTaxonomies as $taxonomy) {
            $taxonomyFriendlyTitle = str_replace('-', ' ', $taxonomy);
            $taxonomyFriendlyTitle = ucfirst($taxonomyFriendlyTitle);

            $labels = array(
            'name'              => _x($taxonomyFriendlyTitle, 'taxonomy general name', 'textdomain'),
            'singular_name'     => _x($taxonomyFriendlyTitle, 'taxonomy singular name', 'textdomain'),
            'search_items'      => __($taxonomyFriendlyTitle, 'textdomain'),
            'all_items'         => __('All ' . $taxonomyFriendlyTitle, 'textdomain'),
            'parent_item'       => __('Parent ' . $taxonomyFriendlyTitle, 'textdomain'),
            'parent_item_colon' => __('Parent ' . $taxonomyFriendlyTitle, 'textdomain'),
            'edit_item'         => __('Edit ' . $taxonomyFriendlyTitle, 'textdomain'),
            'update_item'       => __('Update ' . $taxonomyFriendlyTitle, 'textdomain'),
            'add_new_item'      => __('Add New ' . $taxonomyFriendlyTitle, 'textdomain'),
            'new_item_name'     => __('New ' . $taxonomyFriendlyTitle . ' Name', 'textdomain'),
            'menu_name'         => __($taxonomyFriendlyTitle, 'textdomain'),
            );

            $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $taxonomy )
            );

            register_taxonomy($taxonomy, 'Document', $args);
        }
    }
}
