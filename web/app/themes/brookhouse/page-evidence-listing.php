<?php
/* Template Name: Evidence Listing Template */

get_header();

?>

<?php get_sidebar(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main documents-main">
        <?php while (have_posts()) : the_post(); ?>

            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <?php $query = new WP_Query( array( 'post_type' => 'evidence', 'paged' => $paged ) ); ?>

            <p id="js-turned-off"><?php _e('Please turn JavaScript on in your browser, to enable the filter functionality.', 'brookhouse'); ?></p>
            <div id="js-evidence-filter">
                <p><?php _e('Select the categories that you would like to see.', 'brookhouse'); ?></p>
                    <div class="evidence__filter">

                        <?php
                            $evidenceType = get_terms('evidence-type');
                            $evidenceFormat = get_terms('evidence-format');
                            $witnessType = get_terms('witness-type');
                        ?>

                        <fieldset class="govuk-fieldset evidence__fieldset">
                            <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                                <?php _e('Evidence type', 'brookhouse'); ?>
                            </legend>

                            <?php foreach ( $evidenceType as $term) { ?>
                                <div class="govuk-checkboxes govuk-checkboxes--small">
                                    <div class="govuk-checkboxes__item">
                                        <input class="govuk-checkboxes__input" id="<?php echo $term->slug; ?>" name="evidence-type" type="checkbox" value="<?php echo $term->slug; ?>">
                                        <label class="govuk-label govuk-checkboxes__label" for="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </fieldset>

                        <fieldset class="govuk-fieldset evidence__fieldset">
                            <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                                <?php _e('Evidence format', 'brookhouse'); ?>
                            </legend>

                            <?php foreach ( $evidenceFormat as $term) { ?>
                                <div class="govuk-checkboxes govuk-checkboxes--small">
                                    <div class="govuk-checkboxes__item">
                                        <input class="govuk-checkboxes__input" id="<?php echo $term->slug; ?>" name="evidence-format" type="checkbox" value="<?php echo $term->slug; ?>">
                                        <label class="govuk-label govuk-checkboxes__label" for="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </fieldset>

                        <fieldset class="govuk-fieldset evidence__fieldset evidence__fieldset--witness">
                            <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                                <?php _e('Witness type', 'brookhouse'); ?>
                            </legend>

                            <?php foreach ( $witnessType as $term) { ?>
                                <div class="govuk-checkboxes govuk-checkboxes--small">
                                    <div class="govuk-checkboxes__item">
                                        <input class="govuk-checkboxes__input" id="<?php echo $term->slug; ?>" name="witness-type" type="checkbox" value="<?php echo $term->slug; ?>">
                                        <label class="govuk-label govuk-checkboxes__label" for="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </fieldset>
                    </div>
                </div>

                <ul class="evidence__list" role="region" id="aria-evidence-updates" aria-live="polite">
                <?php
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            include(locate_template('content-evidence-list-item.php', false, false));
                        endwhile; wp_reset_postdata();
                        else :
                    endif;
                ?>
            </ul>
        <?php endwhile; // end of the loop. ?>
    </main>
</div>

<?php get_footer(); ?>



<ul>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $evidence_url = get_post_meta(get_the_ID(), 'evidence_url', true);
            $evidence_video = get_post_meta(get_the_ID(), 'evidence_video', true);
            if ($evidence_video) {
                echo "<li><a href='' class='popup-video' data-video-id='" . $evidence_video . "'>" . get_the_title() . " (video)</a></li>";
            } elseif ($evidence_url) {
                $evidence_id = get_attachment_id_from_src($evidence_url);
                $evidence_size = round(filesize(get_attached_file($evidence_id)) / 1024);
                echo "<li><a href='" . $evidence_url . "' target='_blank'>" . get_the_title() . " (" . substr($evidence_url, -3) . ", " . $evidence_size . "kb)</a></li>";
            }
        }
    } else {
        echo "<li>No evidence available for this hearing</li>";
    }
    ?>
</ul>
