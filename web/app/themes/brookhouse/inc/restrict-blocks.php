<?php
/**
 *  Restricts core Gutenberg Block in editor
 */
function brookhouse_allowed_block_types($allowed_blocks)
{

    $allowed_blocks = array(
        'core/image',
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/file',
        'core/media-text',
        'core/columns',
        'core/spacer',
        'core/table',
        'core/legacy-widget',
        'core/embed',
        'core/button',
        'core/buttons',
        'core/freeform'
    );

    return $allowed_blocks;

}

add_filter('allowed_block_types_all', 'brookhouse_allowed_block_types');

function brookhouse_restrict_embed_blocks()
{

        wp_enqueue_script(
            'restrict-embed-blocks',
            moj_get_asset('restrict-embed-blocks'),
            array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'), null, true
        );

}

add_action('enqueue_block_editor_assets', 'brookhouse_restrict_embed_blocks');
