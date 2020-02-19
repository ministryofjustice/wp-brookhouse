<?php
if(!empty($doc)) {
    $document_upload = get_field('document_upload', $doc->ID);
    $publish_date = get_field('publish_date', $doc->ID);

    if (!empty($document_upload)) { ?>
        <div class="results-line">
            <a href="<?php echo $document_upload['url']; ?>"> <?php echo $doc->post_title; ?> [<?php echo strtoupper($document_upload['subtype']); ?> – <?php echo round($document_upload['filesize']/1000); ?>kb] Date: <?php echo $publish_date; ?></a>

        </div>
        <?php
    }
}
