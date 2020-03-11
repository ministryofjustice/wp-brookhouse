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

                    if (is_array($doc_categories) && !empty($doc_categories)) { ?>
                        <div class="doc-listing-filters">
                            <h3>Document List Filters</h3>
                            <div class="doc-listing-cat-filter-wrapper">
                                <label for="doc-cat-filter">Document Category</label>
                                <select id="doc-cat-filter">
                                    <option value="">All categories</option>
                                    <?php foreach ($doc_categories as $category) { ?>
                                        <option value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="document-list">
                            <?php


                            foreach ($doc_categories as $category) { ?>
                                <?php

                                $documents = get_posts(
                                    array(
                                        'post_type' => 'documents',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => $doc_type,
                                                'field' => 'slug',
                                                'terms' => $category->slug,
                                            ),
                                        ),
                                        'orderby' => 'meta_value_num',
                                        'meta_key' => 'publish_date',
                                        'order' => 'DESC',
                                    )
                                );

                                if (is_array($documents) && !empty($documents)) { ?>
                                    <div id="doc-cat-<?php echo $category->term_id; ?>"
                                         class="document-list-by-category">
                                        <h2><?php echo $category->name; ?></h2>

                                        <?php

                                        foreach ($documents as $doc) {
                                            include(locate_template('content-document-list-item.php', false, false));
                                        }
                                        ?>
                                    </div>
                                    <?php

                                }

                            }
                            ?>
                        </div>
                        <?php

                    } else {
                        $documents = get_posts(
                            array(
                                'post_type' => 'documents',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'document_type_to_upload',
                                        'value' => $doc_type,
                                    ),
                                ),
                                'orderby' => 'meta_value_num',
                                'meta_key' => 'publish_date',
                                'order' => 'DESC',
                            )
                        );

                        if (is_array($documents) && !empty($documents)) { ?>

                            <div class="document-list">

                                <?php
                                foreach ($documents as $doc) {

                                    include(locate_template('content-document-list-item.php', false, false));
                                }
                                ?>
                            </div>
                            <?php

                        } else { ?>
                            <p>No Documents Found</p>
                            <?php

                        }
                    }
                }


            }
            ?>
        <?php endwhile; // end of the loop. ?>
    </main>
</div>

<?php get_footer(); ?>
