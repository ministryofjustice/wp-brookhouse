<?php

/**
 * The template used for displaying page content in page-report.php
 *
 * @package brookhouse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <h1><?= get_the_title() ?></h1>
        <?php get_template_part('components/report-next-prev-nav'); ?>
        <?php
            the_content();
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
