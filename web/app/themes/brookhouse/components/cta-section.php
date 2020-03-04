<?php

/* Component: CTA Section */

$section_title = get_field('cta_section_title');
$section_desc = get_field('cta_section_description');

$cta1_title = get_field('first_cta_title');
$cta1_desc = get_field('first_cta_description');
$cta1_link = get_field('first_cta_link');
$cta1_link_aria = '';

$cta2_title = get_field('second_cta_title');
$cta2_desc = get_field('second_cta_description');
$cta2_link = get_field('second_cta_link');
$cta2_link_aria = '';
?>
<div class="cta-section">

    <?php if (!empty($section_title)) { ?>
        <h2><?php echo $section_title; ?></h2>
    <?php } ?>
    <?php if (!empty($section_desc)) { ?>
        <p><?php echo $section_desc; ?></p>
    <?php } ?>

    <div class="flex-grid">

        <div class="cta_block">
            <?php if (!empty($cta1_title)) {
                $cta1_link_aria = ' - ' . $cta1_title;
                ?>
                <h3><?php echo $cta1_title; ?></h3>
            <?php } ?>
            <?php if (!empty($cta1_desc)) { ?>
                <p><?php echo $cta1_desc; ?></p>
            <?php } ?>

            <?php if (!empty($cta1_link)) {
                ?>
                <a href="<?php echo $cta1_link['url']; ?>" class="cta_block_link"
                   target="<?php echo $cta1_link['target']; ?>"
                   aria-label="<?php echo $cta1_link['title'] . $cta1_link_aria; ?>">
                    <?php echo $cta1_link['title']; ?>
                </a>
            <?php } ?>
        </div>


        <div class="cta_block">
            <?php if (!empty($cta2_title)) {
                $cta2_link_aria = ' - ' . $cta2_title;
                ?>
                <h3><?php echo $cta2_title; ?></h3>
            <?php } ?>
            <?php if (!empty($cta2_desc)) { ?>
                <p><?php echo $cta2_desc; ?></p>
            <?php } ?>

            <?php if (!empty($cta2_link)) { ?>
                <a href="<?php echo $cta2_link['url']; ?>" class="cta_block_link"
                   target="<?php echo $cta2_link['target']; ?>"
                   aria-label="<?php echo $cta2_link['title'] . $cta2_link_aria; ?>">
                    <?php echo $cta2_link['title']; ?>
                </a>
            <?php } ?>
        </div>

    </div>
</div>
<?php

$bottom_content = get_field('bottom_content');
?>
<?php if (!empty($bottom_content)) { ?>
    <div class="bottom_content">
        <?php echo $bottom_content; ?>
    </div>
<?php } ?>
