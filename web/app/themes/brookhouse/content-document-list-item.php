<?php
if(!empty($doc)) {
    $document_upload = get_field('document_upload', $doc->ID);
    $publish_date = get_field('publish_date', $doc->ID);
    $file_ext = pathinfo($document_upload['url'], PATHINFO_EXTENSION);

    if (!empty($document_upload)) { ?>
        <div class="documents-list-item">
            <a href="<?php echo $document_upload['url']; ?>"> <?php echo $doc->post_title; ?> [<?php echo strtoupper($file_ext); ?> <?php echo round($document_upload['filesize']/1000); ?>kb] Date: <?php echo $publish_date; ?></a>

        </div>
        <?php
    }
}
