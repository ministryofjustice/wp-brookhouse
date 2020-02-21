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

<footer id="colophon" class="site-footer">
    <?php wp_nav_menu( array( 'theme_location' => 'languages-menu' ) ); ?>
    <div id="footer-nav">
        <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
    </div>
    <div id="footer-nav" class="flex-grid">
        <div class="col">Column 1</div>
        <div class="col">Column 2</div>
        <div class="col">Column 3</div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    $(document).bind('touchend', function(e) {
        $(e.target).trigger('click');
    });
</script>

</body>
</html>
