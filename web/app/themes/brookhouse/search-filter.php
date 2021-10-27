<?php

/**
 * The template for displaying search forms in brookhouse
 *
 * @package brookhouse
 */

// Get the current selected category so the correct dropdown is selected
$cat = ( is_category() ) ? get_query_var('cat') : 0;

?>

<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">

  <div class="input-group" >

    <label class="sr-only" for="category-dropdown"><?php _e('Filter search results by topic:', 'brookhouse'); ?></label>

    <br><br>

    <div class="brookhouse-input-group-dropdown" id="category-dropdown">
        <?php
        wp_dropdown_categories(
            [
                'show_option_all' => 'All topics',
                'orderby'         => 'name',
                'echo'            => 1,
                'selected'        => $cat,
                'hierarchical'    => true,
                'query_var'       => true,
                'class'           => 'category-dropdown-menu',
                'id'              => 'custom-cat-drop',
                'value_field'     => 'term_id'
            ]
        );
        ?>

    </div>

    <label style="visibility:hidden; position:absolute;"
    for="search-box"><?php _e('Search:', 'brookhouse'); ?></label>

    <div class="brookhouse-search-filter">

    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />

    </div>
    <span class="input-group-btn">
      <button
      type="submit"
      class="search-submit btn btn-default"><?php _e('Search', 'brookhouse');  ?>
      </button>
    </span>

  </div>
</form>

<br>
