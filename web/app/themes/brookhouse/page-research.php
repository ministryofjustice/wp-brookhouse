<?php
/**
 * Template for Documents and Rulings page
 *
 * This template has been retained in case it is decided to switch to the alternative
 * format which lists documents and rulings automatically (as opposed to free text)
 *
 * @package brookhouse
 */
get_header();
?>
<?php get_sidebar(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main documents-main" role="main">

        <!--<h1><?php /*_e('Rulings', 'brookhouse') */ ?></h1>

        <h4>Ruling date</h4>
        <?php
        /*        $rulings = new WP_Query(
                    array(
                        'post_type' => 'document',
                        'orderby' => 'meta_value',
                        'meta_key' => 'document_date',
                        'meta_query' => array(
                            array(
                                'key' => 'document_type',
                                'value' => 'ruling'
                            )
                        )
                    )
                );
                while ($rulings->have_posts()) {
                    $rulings->the_post();
                    $document_url = get_post_meta($post->ID, 'document_url', true);
                    if ($document_url) {
                        $evidence_id = get_attachment_id_from_src($document_url);
                        $evidence_size = round(filesize(get_attached_file($evidence_id)) / 1024);
                        */ ?>
                <div class="results-line">
                    <div class="col-3">
                        <span class="long-date">
                            <?php /*echo($last_date != get_post_meta($post->ID, "document_date", true) ? date('l j F Y',
                                strtotime(get_post_meta($post->ID, "document_date", true))) : "&nbsp;"); */ ?>
                        </span>
                        <span class="short-date">
                            <?php /*echo($last_date != get_post_meta($post->ID, "document_date", true) ? date('D j M Y',
                                strtotime(get_post_meta($post->ID, "document_date", true))) : "&nbsp;"); */ ?>
                        </span>
                    </div>
                    <div><?php /*echo "<a href='" . $document_url . "' target='_blank'>" . get_the_title() . " (" . substr($document_url,
                                -3) . ", " . $evidence_size . "kb)</a>"; */ ?></div>
                </div>

                <?php /*$last_date = get_post_meta($post->ID, "document_date", true); */ ?>
                --><?php
        /*            }
                }
                */ ?>

        <h1><?php _e('Relevant Materials', 'brookhouse') ?></h1>

        <?= get_field('research_page_intro_text') ?>

        <h4><?php _e('Available publications', '') ?></h4>

        <?php
        $documents = new WP_Query(
            array(
                'post_type' => 'research'
            )
        );

        while ($documents->have_posts()) {
            $documents->the_post();
            $document_url = get_field('research_document_url', get_the_ID())
                ?? get_field('research_document_file', get_the_ID());

            if ($document_url) {
                $evidence_id = get_attachment_id_from_src($document_url);
                $evidence_size = round(filesize(get_attached_file($evidence_id)) / 1024);
                $last_date = "-";
                ?>
                <div class="results-line">
                    <div class="col col-1">
                        <?= get_field('research_document_description', get_the_ID()) ?>
                    </div>
                    <div class="col col-2">
                        <?php
                        $pdf_size = $ex_link = "";
                        if ($evidence_size > 0) {
                            $pdf_size = " (" . substr($document_url, -3) . ", " . $evidence_size . "kb)";
                        } else {
                            $ex_link = 'external-link';
                        }

                        echo "<a href='" . $document_url . "' target='_blank' class='" . $ex_link . "'>" . get_the_title() . $pdf_size . "</a>";
                        ?></div>
                </div>

                <?php $last_date = get_post_meta($post->ID, "document_date", true); ?>
                <?php
            }
        }
        ?>

    </main>
</div>

<?php get_footer(); ?>
