<?php

/**
 * The template for displaying Search Results pages.
 *
 * @package brookhouse
 */

get_header();
?>
<?php get_sidebar(); ?>
<?php $s = get_search_query(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title">
                <?php _e('Search results for: ', 'brookhouse'); ?>
                <span class="page-description"><?php echo get_search_query(); ?></span>
            </h1>
        </header><!-- .page-header -->

        <div><?php get_template_part('search-filter'); ?></div>

        <div>

        <br>
        <?php
            global $wp_query;
            echo $wp_query->found_posts . ' results found</p>';
        ?>
        <hr>
        </div>

        <?php if (have_posts()) : ?>
            <?php
            // Start the Loop.
            while (have_posts()) :
                the_post(); ?>

                <article <?php post_class(); ?>>
        <?php

        $result_title = get_the_title();
        $result_url = get_permalink();

        // Allow list to add post types you want to modify in search results
            $post_types_to_include = ['documents','evidence'];
            $post_type_in_array = in_array(get_post_type(), $post_types_to_include);

            if ($post_type_in_array) {
                $evidence_upload = get_field('evidence_upload')?? false;
                $document_upload = get_field('document_upload')?? false;

                $acf_url = '';

                if ($evidence_upload) {
                    $acf_url = $evidence_upload['url'];
                }

                if ($document_upload) {
                    $acf_url = $document_upload['url'];
                }

                $ext = pathinfo($acf_url, PATHINFO_EXTENSION);
                $result_title .= ' (' . $ext . ')';
                $result_url = $acf_url;
            }

            ?>
                    <header>
                        <h2 class="entry-title"><a href="<?php echo esc_url($result_url); ?>"><?php echo $result_title; ?></a>
                        </h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                        <?php the_category(', '); ?>
                        <br><br>
                    </div>
                </article>

                <?php
            endwhile;
            ?>
            <div class="search-navigation">
            <?php

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
        else :
            echo "No Results found";
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
