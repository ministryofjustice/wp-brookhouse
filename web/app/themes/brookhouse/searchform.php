<?php

/**
 * The template for displaying search forms in brookhouse
 *
 * @package brookhouse
 */

 // Conditional that only displays search field on all pages except search page
 // as it already has its own dedicated search fields.
if (!is_search()) :
    ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'label', 'brookhouse'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'brookhouse'); ?>"
        value="<?php echo esc_attr(get_search_query()); ?>" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'brookhouse'); ?>">
</form>

    <?php
endif;
