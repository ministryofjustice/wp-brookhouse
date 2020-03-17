<?php
if(!empty($article)) { ?>

        <div class="news-list-item">
            <a href="<?php echo get_permalink($article->ID); ?>"> <?php echo $article->post_title; ?></a>

        </div>
        <?php

}
