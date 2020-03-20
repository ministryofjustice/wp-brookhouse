<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package brookhouse
 */
?>

</div><!-- #content -->

<h2 class="hidden">Languages</h2>
<?php wp_nav_menu(array('theme_location' => 'languages-menu')); ?>

<footer id="footer" class="site-footer">
    <div id="footer-nav" class="footer-columns-wrapper flex-grid">
        <div class="col">
            <?php

            $c1_title = get_field('column_one_title', 'option');

            if (!empty($c1_title)) { ?>
                <h2><?php echo $c1_title; ?></h2>
                <?php
            }

            $c1_type = get_field('column_one_type', 'option');

            if (!empty($c1_type) && $c1_type == 'content') {

                $c1_content = get_field('column_one_content', 'option');

                if (!empty($c1_content)) {
                    echo $c1_content;
                }
            }

            if (!empty($c1_type) && $c1_type == 'menu') {

                $c1_menu = get_field('column_one_menu', 'option');
                if (!empty($c1_menu)) {
                    wp_nav_menu(array(
                            'menu' => $c1_menu,
                            'container' => 'nav',
                            'container_class' => 'footer-menu-container',
                            'menu_class' => 'footer-menu',
                        )
                    );
                }
            }
            ?>
        </div>
        <div class="col">
            <?php

            $c2_title = get_field('column_two_title', 'option');

            if (!empty($c2_title)) { ?>
                <h2><?php echo $c2_title; ?></h2>
                <?php
            }

            $c2_type = get_field('column_two_type', 'option');

            if (!empty($c2_type) && $c2_type == 'content') {

                $c2_content = get_field('column_two_content', 'option');

                if (!empty($c2_content)) {
                    echo $c2_content;
                }
            }

            if (!empty($c2_type) && $c2_type == 'menu') {

                $c2_menu = get_field('column_two_menu', 'option');
                if (!empty($c2_menu)) {
                    wp_nav_menu(array(
                            'menu' => $c2_menu,
                            'container' => 'nav',
                            'container_class' => 'footer-menu-container',
                            'menu_class' => 'footer-menu',
                        )
                    );
                }
            }
            ?>
        </div>
        <div class="col">
            <?php

            $c3_title = get_field('column_three_title', 'option');

            if (!empty($c3_title)) { ?>
                <h2><?php echo $c3_title; ?></h2>
                <?php
            }

            $c3_type = get_field('column_three_type', 'option');

            if (!empty($c3_type) && $c3_type == 'content') {

                $c3_content = get_field('column_three_content', 'option');

                if (!empty($c3_content)) {
                    echo $c3_content;
                }
            }

            if (!empty($c3_type) && $c3_type == 'menu') {

                $c3_menu = get_field('column_three_menu', 'option');
                if (!empty($c3_menu)) {
                    wp_nav_menu(array(
                            'menu' => $c3_menu,
                            'container' => 'nav',
                            'container_class' => 'footer-menu-container',
                            'menu_class' => 'footer-menu',
                        )
                    );
                }
            }
            ?>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    $(document).bind('touchend', function (e) {
        $(e.target).trigger('click');
    });
</script>

</body>
</html>
