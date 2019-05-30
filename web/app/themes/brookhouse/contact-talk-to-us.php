<?php
/**
    Template Name: Contact-Talk-to-us
**/

get_header();
get_sidebar();
global $post;
$moj_the_slug = str_replace('-', '_', $post->post_name);
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main documents-main locale-updates" role="main">
        <h1><?= do_shortcode('[ttu_' . $moj_the_slug . '_title]') ?></h1>
        <p><?= do_shortcode('[ttu_' . $moj_the_slug . '_page_intro]') ?></p>

        <div class="flex-grid">
            <div class="col">
                <?= do_shortcode('[contact-form-7 id="122" title="Talk to Us Form"]') ?>
            </div>
            <div class="col grow-two">
                <div><?= do_shortcode('[ttu_' . $moj_the_slug . ']') ?></div>
            </div>
        </div>

    </main>
</section>

<?php
get_footer();
?>
