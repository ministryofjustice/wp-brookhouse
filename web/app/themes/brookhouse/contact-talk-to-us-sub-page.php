<?php
/**
 * Template Name: Contact-Talk-to-us-Sub-Page
 **/

get_header();
get_sidebar();
global $post;
$moj_the_slug = str_replace('-', '_', $post->post_name);
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main documents-main" role="main">
        <h1 class="locale-updates"><?= do_shortcode('[ttu_' . $moj_the_slug . '_title]') ?></h1>
        <div class="locale-updates">
            <?php
            echo do_shortcode('[ttu_' . $moj_the_slug . '_page_text]');
            if ($moj_the_slug === "press_and_other") {
                $press_phone = get_field('press_phone_number');
                $press_email = get_field('press_email_address');

                if (!empty($press_phone)) {
                    echo '<p><strong>Call:</strong> ' . $press_phone . '</p>';
                }
                if (!empty($press_email)) {
                    echo '<p><strong>Email:</strong> ' . $press_email . '</p>';
                }
            }
            echo do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=anonymous]')
            ?>
        </div>

        <div class="flex-grid">
            <?php
            $moj_the_form = get_field('form_shortcode', $post->ID);
            if (!empty($moj_the_form)) {
                ?>
                <div class="col the-form">
                    <div class="locale-updates">
                        <h2><?= do_shortcode('[ttu_use_our_form]') ?></h2>
                    </div>
                    <?= do_shortcode($moj_the_form) ?>
                </div>
                <?php
            } ?>
            <div class="col grow-two">
                <div class="locale-updates">
                    <h2><?= do_shortcode('[ttu_write_to_us_text]') ?></h2>
                    <address class="locale-text-normal">
                        Brook House Special Investigation Team<br>
                        Prisons and Probation Ombudsman<br>
                        Third Floor<br>
                        10 South Colonnade<br>
                        London<br>
                        E14 4PU
                    </address>
                    <h2><?= do_shortcode('[ttu_email_us_on_text]') ?></h2>
                    <p><a href="mailto:brookhousespecialinvestigation@ppo.gov.uk" class="locale-text-normal">BrookHouseSpecialInvestigation@ppo.gov.uk</a>
                    </p>
                    <h2><?= do_shortcode('[ttu_call_us_on_text]') ?></h2>
                    <p><a href="tel:02076334149">020 7633 4149</a></p>
                    <?php if ($moj_the_slug !== "press_and_other") { ?>
                        <h2><?= do_shortcode('[ttu_text_us_on_text]') ?></h2>
                        <p><a href="tel:02076334149">020 7633 4149</a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($moj_the_slug !== "press_and_other") {
            echo '<hr/>';
        } ?>
        <div class="locale-updates">
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-one]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-two]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-three]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-four]'); ?>
        </div>
    </main>
</section>

<?php
get_footer();
?>
