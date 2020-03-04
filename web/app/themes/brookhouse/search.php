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

        <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php _e( 'Search results for: ', 'brookhouse' ); ?>
                <span class="page-description"><?php echo get_search_query(); ?></span>
            </h1>
        </header><!-- .page-header -->

        <?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();?>

                <article <?php post_class(); ?>>
                    <?php

                    $result_title = get_the_title();

                    if (get_post_type() === 'document') {
                        $document_upload = get_field('document_upload');
                        $ext = pathinfo($document_upload['url'], PATHINFO_EXTENSION);
                        $result_title .= ' (' . $ext . ')';
                    }
                    else {
                        $result_url = get_permalink();
                    }
                    ?>
                    <header>
                        <h2 class="entry-title"><a href="<?php echo $result_url; ?>"><?php echo $result_title; ?></a></h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>

                <?php


			endwhile;

            the_posts_navigation();


        else :
            echo "No Results found";

		endif;
		?>
    </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
