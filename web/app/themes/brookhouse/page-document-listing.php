<?php
/* Template Name: Document Listing Template */

get_header();


?>
<?php get_sidebar(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main documents-main">
        <?php while (have_posts()) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <?php

            $doc_type = get_field('listing_document_type');

            if (!empty($doc_type)) { ?>

                <?php

                if (taxonomy_exists($doc_type)) {
                    $doc_categories = get_terms(array(
                        'taxonomy' => $doc_type
                    ));


                    if (is_array($doc_categories) && !empty($doc_categories)) {

                        foreach ($doc_categories as $category) { ?>
                            <h2 class="table-title"><?php $category->name; ?></h2>

                            <?php

                            $documents = get_posts(
                                array(
                                    'post_type' => 'document',
                                    'posts_per_page' => -1,
                                )
                            );

                            if (is_array($doc_categories) && !empty($documents)) {

                                foreach ($documents as $doc) {

                                    $document_url = get_field('research_document_url', get_the_ID())
                                        ?? get_field('research_document_file', get_the_ID());

                                    if ($document_url) { ?>
                                        <div class="results-line">
                                            <a href="<?php echo $document_url; ?>"> <?php echo $doc->post_title; ?></a>

                                        </div>
                                        <?php
                                    }

                                }

                            }

                        }

                    }
                }


            }
            ?>
        <?php endwhile; // end of the loop. ?>
    </main>
</div>

<?php get_footer(); ?>
