<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package brookhouse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content<?php if (get_the_title() == "About the Investigation") {
        echo " faqs";
    } ?>">
        <h1><?= get_the_title() ?></h1>
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'brookhouse'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <?php //edit_post_link( __( 'Edit', 'brookhouse' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
