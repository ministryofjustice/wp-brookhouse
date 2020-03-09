<?php

/* Template Name: Hearings */


$query = new WP_Query(array(
    'post_type' => 'hearings',
    'post_status' => 'publish',
    'posts_per_page' => -1,
));

$hearing_date = get_field('hearing_date');
$hearing_time = get_field('hearing_time');
$hearing_body_text = get_field('hearing_body_text');
$hearing_document = get_field('hearing_document');
$hearing_link = get_field('hearing_link');

get_header();
get_sidebar();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

<?php


while ($query->have_posts()) {
    $query->the_post();

    $post_id = get_the_ID();

    var_dump($post_id);
    echo $post_id;
    echo "<br>";
}

wp_reset_query();

?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
