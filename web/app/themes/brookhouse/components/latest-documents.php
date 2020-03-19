<?php

/* Component: Latest Documents Section */
?>
    <div class="latest-documents-section">

        <h2><?php _e('Latest Documents', 'brookhouse'); ?></h2>

        <?php
        $documents = get_posts(
            array(
                'post_type' => 'documents',
                'posts_per_page' => 5,
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

            <p class="none-found"><?php _e('No Documents Found', 'brookhouse'); ?></p>
            <?php

        }
        ?>


    </div>
