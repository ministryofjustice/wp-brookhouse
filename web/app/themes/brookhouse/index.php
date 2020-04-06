<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package brookhouse
 */
get_header();
get_sidebar();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <h1><?php _e('News', 'brookhouse'); ?></h1>

            <?php

            if (have_posts()) { ?>
                <div class="news-list">

                    <?php
                    while (have_posts()) {
                        the_post(); ?>

                        <article <?php post_class(); ?>>

                            <header>
                                <h2 class="entry-title">
                                    <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a>
                                </h2>
                            </header>
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="published-date">
                                <p>Published on: <?php echo get_the_date('j F Y'); ?></p>
                            </div>
                        </article>

                        <?php

                    }
                    ?>
                </div>
                <div class="news-navigation">
                    <?php
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
                                'brookhouse'
                            ) . '</span><span aria-hidden="true">' . __('PREV', 'brookhouse') . '</span>',
                        'next_text' => '<span class="screen-reader-text"> ' . __(
                                'Search results',
                                'brookhouse'
                            ) . ' -  </span>' . __(
                                'NEXT',
                                'brookhouse'
                            ) . ' <span class="screen-reader-text">' . __(
                                'page',
                                'brookhouse'
                            ) . '</span>',
                        'before_page_number' => '<span class="screen-reader-text">' . __(
                                'Search results - page',
                                'brookhouse'
                            ) . '</span>',
                        'after_page_number' => '<span class="screen-reader-text"> ' . __(
                                ' of ',
                                'brookhouse'
                            ) . __($wp_query->max_num_pages) . '</span>'
                    ));
                    ?>
                </div>
                <?php


            } else { ?>
                <p class="none-found"><?php _e('No News Found', 'brookhouse'); ?></p>

                <?php
            }
            ?>
        </main>
    </div><!-- #primary -->

<?php
get_footer();
