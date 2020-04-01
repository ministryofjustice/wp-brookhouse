<div class="entry">
    <h2 class="title"><?php the_title(); ?></h2>


    <p>Evidence type: <?php the_field( "evidence_type_to_upload" ) ?></p>
    <p>Evidence format: <?php the_field( "evidence_format" ); ?> </p>
    <p>Witness type: <?php the_field( "evidence_witness_type" ); ?></p>
    <p>Evidence publication date: <?php the_field( "evidence_publish_date" ); ?></p>
    <button>View file: <?php the_field( "evidence_upload" ); ?></button>
</div>