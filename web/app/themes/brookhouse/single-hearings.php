<?php

/**
 * The Template for displaying all hearing posts.
 *
 * @package brookhouse
 */

get_header();
get_sidebar();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            the_title('<h1>', '</h1>');
            the_content('<p>', '</p>');
        endwhile;
    else :
        _e('<p>' . esc_html_e('Sorry, no posts available.') . '</p>');
    endif;

    // ACF hearing fields
    $hearing_date = get_field('hearing_date');
    $hearing_time = get_field('hearing_time');
    $hearing_body_text = get_field('hearing_body_text');
    
    _e('<span>' . $hearing_date . '</span><br>');
    _e('<span>' . $hearing_time . '</span>');
    _e('<p>' . $hearing_body_text . '</p>');

    include(locate_template('components/hearing-link-section.php', false, false)); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
