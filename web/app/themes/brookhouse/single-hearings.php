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
    
    _e('<span>'. $hearing_date . '</span><br>');
    _e('<span>'. $hearing_time . '</span>');
    _e('<p>' . $hearing_body_text . '</p>');

    include(locate_template('components/hearing-link-section.php', false, false)); ?>

    <h3>Hearing location</h3>

    <address>
    Brook House Inquiry<br>
    The International Dispute Resolution Centre<br>
    70 Fleet Street<br>
    London<br>
    EC4Y 1EU<br>
    </address>

    <a href="https://www.google.com/maps/place/International+Dispute+Resolution+Centre+Ltd/@51.5139923,-0.1094127,17z/data=!3m1!4b1!4m5!3m4!1s0x487604b2b87d2383:0x3ef3ecd74c455098!8m2!3d51.513989!4d-0.107224">Find on Google maps</a>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();