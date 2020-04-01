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

<li class="entry">
    <h2 class="title"><?php the_title(); ?></h2>

    <dl>
        <?php if ($evidenceType) { ?>
            <dt>Type: </dt> <dd><?php echo $evidenceType[0]->name; ?></dd>
        <?php } ?>

        <?php if ($evidenceFormat) { ?>
            <dt>Format: </dt> <dd><?php echo $evidenceFormat[0]->name; ?></dd>
        <?php } ?>

        <?php if ($witnessType) { ?>
            <dt>Witness: </dt> <dd><?php echo $witnessType[0]->name; ?></dd>
        <?php } ?>

        <?php if ($evidenceDate) { ?>
            <dt>Published: </dt> <dd><time datetime="<?php echo $timeStamp; ?>"><?php echo $evidenceDate ?></time></dd>
        <?php } ?>
    </dl>

     <?php if ($evidenceUpload) { ?>
       <a href="<?php echo $evidenceUrl; ?>"> View <?php the_title() ?> [<?php echo strtoupper($fileType); ?>, <?php echo round($fileSize/1000); ?>kb]</a>
    <?php } ?>

</li>
