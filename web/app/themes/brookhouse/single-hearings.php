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

        <?php while (have_posts()) :
            the_post();
            
            // Get ACF hearing fields
            $hearing_date = get_field('hearing_date');
            $hearing_time = get_field('hearing_time');
            $hearing_body_text = get_field('hearing_body_text');
            $hearing_document = get_field('hearing_document');
            $hearing_link = get_field('hearing_link');
            ?>

        <h1><?php echo the_title(); ?></h1>
        <div class="hearing_date"><?php _e($hearing_date); ?></div>
        <div class="hearing_time"><?php _e($hearing_time); ?></div>
        <p class="hearing_bodytext"><?php _e($hearing_body_text); ?></p>

            <?php
            
            /**
             * Document listing
             */
            if ($hearing_document) {
                _e('<div class="hearing_document">');

                // Loop through the documents
                if (have_rows('hearing_document')) :
                    _e('<h2>Documents</h2>');

                    while (have_rows('hearing_document')) :
                            the_row();

                            $hearing_file_title = get_sub_field('hearing_file_title');
                            $hearing_file_url = get_sub_field('hearing_file_url');

                            _e('<a href="' . $hearing_file_url . '">' . $hearing_file_title . '</a><br>');
                    endwhile;
                else :
                    // no rows found
                endif;
                _e('</div>');
            }

            /**
             * Hearing link listing
             */
            if ($hearing_link) {
                    _e('<div class="hearing_link">');

                // Loop through and echo out the links
                if (have_rows('hearing_link')) :
                    _e('<h2>Hearing links</h2>');

                    while (have_rows('hearing_link')) :
                        the_row();

                        $hearing_link_title = get_sub_field('hearing_link_title');
                        $hearing_link_url = get_sub_field('hearing_link_url');

                        _e('<a href="' . $hearing_link_url . '">' . $hearing_link_title . '</a><br>');
                    endwhile;
                else :
                    // no rows found
                endif;
                    _e('</div>');
            }
        endwhile; // end of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();