<?php
/**
 * Template Name: Contact-Talk-to-us
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
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=anonymous]') ?>
        </div>

        <div class="flex-grid">
            <div class="col">
                <div class="locale-updates">
                    <h2><?= do_shortcode('[ttu_use_our_form]') ?></h2>
                </div>
                <?= do_shortcode('[contact-form-7 id="122" title="Talk to Us Form"]') ?>
            </div>
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
                    <p><a href="mailto:brookhousespecialinvestigation@ppo.gov.uk">BrookHouseSpecialInvestigation@ppo.gov.uk</a></p>
                    <h2><?= do_shortcode('[ttu_call_us_on_text]') ?></h2>
                    <p><a href="tel:02076334149">020 7633 4149</a></p>
                    <h2><?= do_shortcode('[ttu_text_us_on_text]') ?></h2>
                    <p><a href="tel:02076334149">020 7633 4149</a></p>
                </div>
            </div>
        </div>
    <hr />
        <div class="locale-updates">
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-one]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-two]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-three]') ?>
            <?= do_shortcode('[ttu_' . $moj_the_slug . '_page_text section=footer-para-four]') ?>
        </div>
    </main>
</section>

<?php
get_footer();
?>
