<?php

/**
 * The template for displaying search forms in brookhouse
 *
 * @package brookhouse
 */

// Get the current selected category so the correct dropdown is selected
$cat = ( is_category() ) ? get_query_var('cat') : 0;
?>

<form id="formfilter" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">

  <div class="input-group" >

    <label class="sr-only"><?php _e('Filter search results by topic:', 'brookhouse'); ?></label>

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
                'value_field'     => 'term_id'
            ]
        );
        ?>

    </div>

    <label style="visibility:hidden; position:absolute;"><?php _e('Search:', 'brookhouse'); ?></label>

    <input type="search" value="<?php echo get_search_query(); ?>"
    name="s"
    class="search-field form-control input-group-dropdown"
    placeholder="<?php _e('Search by keyword', 'brookhouse'); ?>">

    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('Search', 'brookhouse'); ?></button>
    <br>
    </span>
  </div>
</form>

<br>
