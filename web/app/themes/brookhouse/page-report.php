<?php

/* Template Name: Report Page */

get_header();
get_sidebar('report');
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

            <?php get_template_part('content', 'report'); ?>
            <?php get_template_part('components/report-next-prev-nav'); ?>
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
