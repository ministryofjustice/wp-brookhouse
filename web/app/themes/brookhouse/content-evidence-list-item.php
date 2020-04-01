<?php
    $evidenceType = get_field( "evidence_type_to_upload" );
    $evidenceFormat = get_field( "evidence_format" );
    $witnessType = get_field( "evidence_witness_type" );
?>


<div class="entry">
    <h2 class="title"><?php the_title(); ?></h2>
    <p>Evidence type: <?php echo $evidenceType[0]->name; ?></p>
    <p>Evidence format: <?php echo $evidenceFormat[0]->name; ?> </p>
    <p>Witness type: <?php echo $witnessType[0]->name; ?></p>
    <p>Evidence publication date: <?php the_field( "evidence_publish_date" ); ?></p>
    <button>View file: <?php the_field( "evidence_upload" ); ?></button>
</div>