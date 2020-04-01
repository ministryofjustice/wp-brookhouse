<?php
    $evidenceType = get_field( "evidence_type_to_upload" );
    $evidenceFormat = get_field( "evidence_format" );
    $witnessType = get_field( "evidence_witness_type" );
    $evidenceDate = get_field( "evidence_publish_date" );
    $evidenceUpload = get_field( "evidence_upload" );
    $evidenceUrl = $evidenceUpload['url'];
    $fileSize = $evidenceUpload['filesize'];
    $fileType = pathinfo($evidenceUrl, PATHINFO_EXTENSION);
?>

<div class="entry">
    <h2 class="title"><?php the_title(); ?></h2>

    <?php if ($evidenceType) { ?>
        <p>Evidence type: <?php echo $evidenceType[0]->name; ?></p>
    <?php } ?>

    <?php if ($evidenceFormat) { ?>
        <p>Evidence format: <?php echo $evidenceFormat[0]->name; ?></p>
    <?php } ?>

    <?php if ($witnessType) { ?>
        <p>Witness type: <?php echo $witnessType[0]->name; ?></p>
    <?php } ?>

    <?php if ($evidenceDate) { ?>
        <p>Evidence publication date: <?php echo $evidenceDate ?></p>
    <?php } ?>

     <?php if ($evidenceUpload) { ?>
       <a href="<?php echo $evidenceUrl; ?>"> View <?php the_title() ?> [<?php echo strtoupper($fileType); ?>, <?php echo round($fileSize/1000); ?>kb]</a>
    <?php } ?>

</div>
