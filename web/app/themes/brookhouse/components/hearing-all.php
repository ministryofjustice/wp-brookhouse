<?php

/* Component: Hearing link section */

$args = array (
    'post_type' => 'hearings',
    'meta_key' => 'hearing_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$query = new WP_Query($args);
?>

<table>
    <caption>All hearings</caption>
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Hearing</th>
            <th scope="col">Links</th>
        </tr>
    </thead>

    <?php

    while ($query->have_posts()) :
        $query->the_post();

        // Get ACF hearing fields
        $hearing_date = get_field('hearing_date');
        $hearing_time = get_field('hearing_time');
        $hearing_body_text = get_field('hearing_body_text');
        ?>

    <tbody>
        <tr>
            <td data-label="Date"><?php _e($hearing_date); ?></td>
            <td data-label="Hearing">
                <h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <?php _e($hearing_time); ?><p><?php _e($hearing_body_text); ?></p>
            </td>
            <td data-label="Links">
                <?php include(locate_template('components/hearing-link-section.php', false, false)); ?>
            </td>
        </tr>
    </tbody>

    <?php
    endwhile;
    wp_reset_query();
    ?>
</table>