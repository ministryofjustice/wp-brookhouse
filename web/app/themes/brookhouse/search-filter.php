<?php
/**
 * The template for displaying search forms in brookhouse
 *
 * @package brookhouse
 */

// Get the current selected category so the correct dropdown is selected
$cat = ( is_category() ) ? get_query_var( 'cat' ) : 0;
?>

<form id="formfilter" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <div class="input-group" >

    <label class="sr-only"><?php _e( 'Filter results by topic:', 'brookhouse' ); ?></label>
    <br><br>
    <div class="input-group-dropdown">
		<?php
		wp_dropdown_categories(
			[
				'show_option_all' => 'All topics',
				'orderby'         => 'name',
				'echo'            => 1,
				'selected'        => $cat,
				'hierarchical'    => true,
				'query_var'       => true,
				'class'           => 'dropdown-menu',
				'id'              => 'custom-cat-drop',
				'value_field'     => 'term_id',
			]
		);
		?>

    <span class="input-group-btn">
	  <button type="submit" class="search-submit btn btn-default">
    <?php _e( 'Filter', 'brookhouse' ); ?></button>
	<br></span>
    </div>

  </div>
</form>

<br>
