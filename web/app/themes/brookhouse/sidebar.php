<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package brookhouse
 */
?>
<div id="secondary" class="widget-area" role="complementary">
    <div class="call-cta">
        <a href="tel:02076334149" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/call-for-info.svg" alt="Call with information regarding the Brook House Investigation">
        </a>
        <a href="tel:02076334149" target="_blank">
            020 7633 4149
        </a>
    </div>
    <?php wp_nav_menu(array('theme_location' => 'primary', 'depth' => 1)); ?>
</div><!-- #secondary -->
