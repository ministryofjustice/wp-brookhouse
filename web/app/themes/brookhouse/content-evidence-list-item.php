<?php
    $evidenceType = get_field( "evidence_type_to_upload" );
    $evidenceFormat = get_field( "evidence_format" );
    $witnessType = get_field( "evidence_witness_type" );
    $evidenceDate = get_field( "evidence_publish_date" );
    $timeStamp = date("Y-m-j", strtotime($evidenceDate));
    $evidenceUpload = get_field( "evidence_upload" );
    $evidenceUrl = $evidenceUpload['url'];
    $fileSize = $evidenceUpload['filesize'];
    $fileType = pathinfo($evidenceUrl, PATHINFO_EXTENSION);
?>

<li class="evidence__item js-evidence-item"
    data-evidence-type="<?php echo $evidenceType[0]->slug; ?>"
    data-evidence-format="<?php echo $evidenceFormat[0]->slug; ?>"
    data-witness-type="<?php echo $witnessType[0]->slug; ?>"
>
    <h2 class="evidence__item--heading"><?php the_title(); ?></h2>

    <dl>
        <?php if ($evidenceType) { ?>
            <div class="evidence__item--wrapper">
                <dt class="evidence__item--term">Type</dt>
                <dd class="evidence__item--definition"><?php echo $evidenceType[0]->name; ?></dd>
            </div>
        <?php } ?>

        <?php if ($evidenceFormat) { ?>
            <div class="evidence__item--wrapper">
                <dt class="evidence__item--term">Format</dt>
                <dd class="evidence__item--definition"><?php echo $evidenceFormat[0]->name; ?></dd>
            </div>
        <?php } ?>

        <?php if ($witnessType) { ?>
            <div class="evidence__item--wrapper">
                <dt class="evidence__item--term">Witness</dt>
                <dd class="evidence__item--definition"><?php echo $witnessType[0]->name; ?></dd>
            </div>
        <?php } ?>

        <?php if ($evidenceDate) { ?>
            <div class="evidence__item--wrapper">
                <dt class="evidence__item--term">Published</dt>
                <dd class="evidence__item--definition">
                    <time datetime="<?php echo $timeStamp; ?>">
                        <?php echo $evidenceDate ?>
                    </time>
                </dd>
            </div>
        <?php } ?>
    </dl>

     <?php if ($evidenceUpload) { ?>
       <a class="evidence__item--link" href="<?php echo $evidenceUrl; ?>"> View <?php the_title() ?> [<?php echo strtoupper($fileType); ?>, <?php echo round($fileSize/1000); ?>kb]</a>
    <?php } ?>

</li>
