<?php

/**
 * The Sidebar containing the menu for a report
 *
 * @package brookhouse
 */

?>
<div id="secondary" class="widget-area sidebar-report">
    <h2>Contents</h2>
    <ul class="report-menu">
        <?php

        $args = array(
            'title_li' => '',
            'sort_column' => 'menu_order'
        );

        $top_level_page = get_field('top_level_report_page');

        if (!empty($top_level_page)) {
            $args['child_of'] = $top_level_page->ID;

            ?>
            <li class="top-level-report-link">
                <a href="<?php echo get_permalink($top_level_page->ID); ?>"><?php echo get_the_title($top_level_page->ID); ?></a>
            </li>
            <?php
        }
        ?>
        <?php wp_list_pages($args); ?>
        <li class="report-menu-back-link"><a href="<?php echo home_url();?>">Back to Homepage</a></li>
    </ul>
</div><!-- #secondary -->
