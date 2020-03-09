<?php

/* Template Name: Hearings */

/**
 * Get all hearing posts
 */

$query = new WP_Query(array(
    'post_type' => 'hearings',
    'post_status' => 'publish',
    'posts_per_page' => -1,
));

get_header();
get_sidebar();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <h1><?php echo get_the_title(); ?></h1>
<?php

while ($query->have_posts()) :
    $query->the_post();

    // Get ACF hearing fields
    $hearing_date = get_field('hearing_date');
    $hearing_time = get_field('hearing_time');
    $hearing_body_text = get_field('hearing_body_text');
    $hearing_document = get_field('hearing_document');
    $hearing_link = get_field('hearing_link');

    ?>

    <div class="hearings flex-grid">

    <div class="col">
        <div class="hearing_date"><?php _e($hearing_date); ?></div>
        <div class="hearing_time"><?php _e($hearing_time); ?></div>
    </div>

    <div class="col grow-two">
        <h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
        <div class="hearing_bodytext"><?php _e($hearing_body_text); ?></div>
    </div>
    
    <div class="col">

        <?php
        
        // This is a check so if docs doesn't exist it removes div completely
        if ($hearing_document) : ?>
        <div class="hearing_document">
        
            <?php

            if (have_rows('hearing_document')) :
                _e('<h3>Documents</h3>');

                while (have_rows('hearing_document')) :
                    the_row();

                    $hearing_file_title = get_sub_field('hearing_file_title');
                    $hearing_file_url = get_sub_field('hearing_file_url');

                    _e('<a href="' . $hearing_file_url . '">' . $hearing_file_title . '</a><br>');
                endwhile;
            else :
            // no rows found
            endif;
        
            ?>
        
        </div>

        <?php endif; ?>

        <?php
        // This is a check so if link doesn't exist it removes div completely
        if ($hearing_link) : ?>
        <div class="hearing_link">
        
            <?php
        
            if (have_rows('hearing_link')) :
                echo '<h3>Hearing links</h3>';

                while (have_rows('hearing_link')) :
                    the_row();

                    $hearing_link_title = get_sub_field('hearing_link_title');
                    $hearing_link_url = get_sub_field('hearing_link_url');

                    _e('<a href="' . $hearing_link_url . '">' . $hearing_link_title . '</a><br>');
                endwhile;
            else :
            // no rows found
            endif;
        
            ?>

        </div>

        <?php endif; ?>
    </div>

    </div> <!-- #hearing flex grid -->

    <?php
endwhile;

wp_reset_query();

?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
