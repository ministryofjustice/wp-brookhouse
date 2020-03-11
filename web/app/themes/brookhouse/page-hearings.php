<?php

/* Template Name: Hearings */

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
    
    get_template_part('components/hearing-upcoming');
    get_template_part('components/hearing-all');
    
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();