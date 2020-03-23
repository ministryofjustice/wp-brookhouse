<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package brookhouse
 */

get_header();
get_sidebar();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php while (have_posts()) :
            the_post(); ?>

            <?php
                $page_lang = get_field('page-language');
                if (!empty($page_lang)) { ?>
                    <div lang="<?php echo $page_lang; ?>">
                    <?php
                }
            ?>

            <?php get_template_part('content', 'page'); ?>
            <?php get_template_part('components/cta-section'); ?>

            <?php
                if (!empty($page_lang)) { ?>
                    </div>
                    <?php
                }
            ?>
        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
