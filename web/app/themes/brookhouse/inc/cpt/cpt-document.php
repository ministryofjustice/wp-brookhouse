<?php

function brookhouse_ctp_document_init()
{
    $labels = array(
        'name' => 'Research',
        'singular_name' => 'Research item',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit Research Entry',
        'new_item' => 'New Entry',
        'all_items' => 'View All Research',
        'view_item' => 'View Entries',
        'search_items' => 'Search Research',
        'not_found' => 'No entries found',
        'not_found_in_trash' => 'No research entries found in Bin',
        'parent_item_colon' => '',
        'menu_name' => 'Research'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'document'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title')
    );

    register_post_type('research', $args);
}

add_action('init', 'brookhouse_ctp_document_init');

/**
 * Initialize the meta boxes.
 */
function brookhouse_add_document_meta_boxes()
{
    $document_metabox = array(
        'id' => 'document_metabox_hearing',
        'title' => 'Research Details',
        'pages' => array('research'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'document_type',
                'label' => 'Document Type',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Document',
                        'value' => 'document'
                    ),
                    array (
                        'label' => 'Ruling',
                        'value' => 'ruling'
                    )
                )
            ),
            array(
                'id' => 'document_date',
                'label' => 'Document Date',
                'type' => 'text',
                'class' => 'datepicker',
            ),
            array(
                'id' => 'document_url',
                'label' => 'Document URL',
                'type' => 'upload'
            )
        )
    );
    ot_register_meta_box($document_metabox);
}

//add_action('admin_init', 'brookhouse_add_document_meta_boxes');
