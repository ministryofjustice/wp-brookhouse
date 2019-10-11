<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package brookhouse
 */
get_header();
?>
<?php get_sidebar(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'brookhouse'); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Please select an option from the menu on the left.', 'brookhouse'); ?></p>

            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
