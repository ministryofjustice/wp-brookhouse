<?php

/* Component: Latest News Section */

?>
    <div class="latest-news-section">

        <h2><?php _e('Latest News', 'brookhouse'); ?></h2>

        <?php
        $articles = get_posts(
            array(
                'post_type' => 'post',
                'posts_per_page' => 5,
            )
        );

        if (is_array($articles) && !empty($articles)) { ?>

            <div class="news-list">
                <?php
                foreach ($articles as $article) {
                    include(locate_template('content-news-list-item.php', false, false));
                }
                ?>
            </div>

            <?php

        } else { ?>

            <p class="none-found"><?php _e('No News Found', 'brookhouse'); ?></p>
            <?php

        }
        ?>

    </div>
<?php


?>