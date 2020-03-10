<?php

/* Template Name: Hearings */

get_header();
get_sidebar();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <h1><?php echo get_the_title(); ?></h1>

    <?php
    
    get_template_part('components/hearing-upcoming');
    get_template_part('components/hearing-all');
    
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();