<?php

/* Template Name: Full Width Page */

get_header();
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
