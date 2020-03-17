<?php

/* Template Name: Home Page */

get_header();
get_sidebar();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php while (have_posts()) :
                the_post(); ?>
                <?php get_template_part('content', 'page'); ?>
                <?php get_template_part('components/cta-section'); ?>
                <div class="flex-grid">
                    <div class="col">
                        <?php get_template_part('components/latest-documents'); ?>
                    </div>
                    <div class="col">
                        <?php get_template_part('components/latest-news'); ?>
                    </div>
                </div>
            <?php endwhile; // end of the loop. ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
