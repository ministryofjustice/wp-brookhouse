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
        $news_posts_count = wp_count_posts();

        if ($news_posts_count->publish > 1) { ?>
            <div class="news-archive-link">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('View news archive', 'brookhouse'); ?></a>
            </div>
            <?php
        }
        ?>

    </div>
<?php


?>