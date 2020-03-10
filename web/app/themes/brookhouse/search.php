<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package brookhouse
 */
get_header();
?>
<?php get_sidebar(); ?>
<?php $s = get_search_query();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title">
                <?php _e('Search results for: ', 'brookhouse'); ?>
                <span class="page-description"><?php echo get_search_query(); ?></span>
            </h1>
        </header><!-- .page-header -->

        <div class="">
            <?php get_search_form(); ?>
        </div>

        <?php if (have_posts()) : ?>

            <?php
            // Start the Loop.
            while (have_posts()) :
                the_post(); ?>

                <article <?php post_class(); ?>>
                    <?php

                    $result_title = get_the_title();

                    if (get_post_type() === 'document') {
                        $document_upload = get_field('document_upload');
                        $ext = pathinfo($document_upload['url'], PATHINFO_EXTENSION);
                        $result_title .= ' (' . $ext . ')';
                    } else {
                        $result_url = get_permalink();
                    }
                    ?>
                    <header>
                        <h2 class="entry-title"><a href="<?php echo $result_url; ?>"><?php echo $result_title; ?></a>
                        </h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>

            <?php


            endwhile;

            global $wp_query;

            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'mid_size' => 2,
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => '<span class="screen-reader-text">' . __(
                        'Search results - previous page',
                        'justicejobs'
                    ) . '</span><span aria-hidden="true">' . __('PREV', 'justicejobs') . '</span>',
                'next_text' => '<span class="screen-reader-text"> ' . __(
                        'Search results',
                        'justicejobs'
                    ) . ' -  </span>' . __(
                        'NEXT',
                        'justicejobs'
                    ) . ' <span class="screen-reader-text">' . __(
                        'page',
                        'justicejobs'
                    ) . '</span>',
                'before_page_number' => '<span class="screen-reader-text">' . __(
                        'Search results - page',
                        'justicejobs'
                    ) . '</span>',
                'after_page_number' => '<span class="screen-reader-text"> ' . __(
                        ' of ',
                        'justicejobs'
                    ) . __($wp_query->max_num_pages) . '</span>'
            ));


        else :
            echo "No Results found";

        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
