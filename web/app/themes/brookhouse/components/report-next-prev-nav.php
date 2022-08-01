<?php

/* Component: Report Next and Previous Navigation */

$pages_args = array('sort_column' => 'menu_order');

$top_level_page = get_field('top_level_report_page');

if (!empty($top_level_page)) {
    $pages_args['child_of'] = $top_level_page->ID;
}

$pages = get_pages($pages_args);

$count = 0;
$prev_page = '';
$next_page = '';

//Look for current page in page list to determine next and prev page
foreach ($pages as $report_page) {
    if (get_the_ID() == $report_page->ID) {

        if ($count == 0 && !empty($top_level_page)) {
            $prev_page = $top_level_page;
        } else {
            $prev_page = $pages[$count - 1];
        }

        if (count($pages) > $count + 1) {
            $next_page = $pages[$count + 1];
        }
    }

    $count++;
}

//The report template is not planned to be used for top level page but this makes sure the next/prev nav still works if it is used.
if (!empty($pages) && !empty($top_level_page) && $top_level_page->ID == get_the_ID()) {
    //set to first page below top level page.
    $next_page = $pages[0];
}

if (!empty($prev_page) || !empty($next_page)) { ?>

    <div class="report_next_prev_nav">

        <?php

        if (!empty($prev_page)) { ?>
            <a class="prev_page_link" href="<?php echo get_permalink($prev_page->ID); ?>">Previous</a>
            <?php
        }

        ?>

        <?php
        if (!empty($next_page)) { ?>
            <a class="next_page_link" href="<?php echo get_permalink($next_page->ID); ?>">Next</a>

            <?php
        }
        ?>
    </div>
    <?php
}

?>
