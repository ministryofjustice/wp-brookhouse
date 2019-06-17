<?php
get_header();
get_sidebar();
global $post;
$moj_the_slug = str_replace('-', '_', $post->post_name);
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main documents-main" role="main">
        <h1 class="locale-updates"><?= do_shortcode('[ttu__title]') ?></h1>
        <div class="locale-updates">
            <?= do_shortcode('[ttu__page_text]') ?>
            <?= do_shortcode('[ttu__page_text section=contact]') ?>
            <div class="flex-grid full-width-button the-form">
                <div class="col">
                    <div>
                        <a href="/talk-to-us/residents/"
                           class="button large"><?= do_shortcode('[ttu__button_resident]') ?></a>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <a href="talk-to-us/members-of-staff/"
                           class="button large"><?= do_shortcode('[ttu__button_staff_member]') ?></a>
                    </div>
                </div>
            </div>
            <br><br>

            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </div>
    </main>
</section>

<?php
get_footer();
?>
