<?php

/**
 * brookhouse functions and definitions
 *
 * @package brookhouse
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 640;
} /* pixels */

if (!function_exists('brookhouse_setup')) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function brookhouse_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on brookhouse, use a find and replace
         * to change 'brookhouse' to the name of your theme in all the template files
         */
        load_theme_textdomain('brookhouse', get_template_directory() . '/languages');
        /*$locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";

        if (is_readable($locale_file)) {
            require_once($locale_file);
        }*/

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'brookhouse'),
            'languages-menu' =>  __('Languages Menu', 'brookhouse')
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('brookhouse_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
}

add_action('after_setup_theme', 'brookhouse_setup');

/**
 * This function uses Laravel Mix, in particular, the mix-manifest.json file.
 * The manifest file is converted to an array and distributed using keys described as $handles
 *
 * @param $handle
 * @return bool|string
 */
function moj_get_asset($handle)
{
    $dist_dir = get_template_directory() . '/dist/';
    $get_assets = file_get_contents($dist_dir . 'mix-manifest.json', true);
    $manifest = json_decode($get_assets, true);

    $assets = array(
        'main-css' => $manifest['/css/main.min.css'],
        'jquery-ui' => $manifest['/css/jquery-ui.min.css'],
        'js' => $manifest['/js/main.min.js'],
        'admin-js' => $manifest['/js/custom-admin.min.js'],
        'admin-css' => $manifest['/css/custom-admin.min.css'],
        'moment' => $manifest['/js/moment.min.js'],
        'combodate' => $manifest['/js/combodate.min.js'],
        'ie8' => $manifest['/js/ie8.js'],

        // always use non-protocol URL's
        'jquery' => 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js',
        'jquery-migrate' => 'https://code.jquery.com/jquery-migrate-3.0.1.min.js',
        'g-fonts' => 'https://fonts.googleapis.com/css?family=Comfortaa|Montserrat:400,700'
    );

    if (strpos($assets[$handle], 'https') === 0) {
        return $assets[$handle];
    }

    // create the file system path for the file requested.
    $file_system_path = $dist_dir . strstr($assets[$handle], '?', true);

    if (file_exists($file_system_path)) {
        return get_template_directory_uri() . '/dist' . $assets[$handle];
    }

    return false;
}

/**
 * Retrieves the URI of current theme, minified, stylesheet.
 *
 * The stylesheet file name is 'style.min.css' which is appended to the stylesheet directory URI path.
 * See get_stylesheet_directory_uri().
 *
 * @return string
 */
function get_min_stylesheet_uri()
{
    $stylesheet_dir_uri = get_stylesheet_directory_uri();
    return $stylesheet_dir_uri . '/dist/css/style.min.css';
}

// source the minified stylesheet instead
add_filter('stylesheet_uri', 'get_min_stylesheet_uri');

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function brookhouse_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'brookhouse'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'brookhouse_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function brookhouse_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', moj_get_asset('jquery'));
    wp_enqueue_script('jquery');

    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery-migrate', moj_get_asset('jquery-migrate'));
    wp_enqueue_script('jquery-migrate');

    wp_register_style('jquery-ui', moj_get_asset('jquery-ui'));

    wp_enqueue_style('g-fonts', moj_get_asset('g-fonts')); // Custom stylesheet

    wp_enqueue_style('main-styles', moj_get_asset('main-css')); // Default stylesheet

    wp_enqueue_script('js', moj_get_asset('js'), array('jquery'), null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'brookhouse_scripts');

/**
 * Enqueue the date picker
 */
function enqueue_admin_jquery()
{
    wp_enqueue_script(
        'brookhouse-admin-js',
        moj_get_asset('admin-js'),
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-sortable'),
        time(),
        true
    );

    // make the ajaxurl var available to the above script
    wp_localize_script('brookhouse-admin-js', 'custom_sort', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_register_style('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    wp_enqueue_style('jquery-ui');
}

add_action('admin_enqueue_scripts', 'enqueue_admin_jquery');

/**
 * Extra admin CSS
 */
function enqueue_admin_stylesheets()
{
    wp_register_style('brookhouse-admin-style', moj_get_asset('admin-css'));
    wp_enqueue_style('brookhouse-admin-style');
}

add_action('admin_enqueue_scripts', 'enqueue_admin_stylesheets');

// add ie conditional html5 shim to header
function add_ie_workarounds()
{
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>';
    echo '<script src="' . moj_get_asset('ie8') . '"></script>';
    echo '<![endif]-->';
}

add_action('wp_head', 'add_ie_workarounds');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom taxonomies
 */
require get_template_directory() . '/inc/taxonomies.php';

/**
 * Template redirect rules (hooks to "template_redirect")
 */
require get_template_directory() . '/inc/template-redirects.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* Custom Post Type declarations */
require get_template_directory() . '/inc/cpt/cpt-document.php';

/* Taxonomy declarations */
require get_template_directory() . '/inc/tax/tax-witness.php';

// Get attachment ID from src(url)
function get_attachment_id_from_src($image_src)
{
    global $wpdb;
    $id = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'");
    return $id;
}

// Add new vars to possible query vars
add_filter('query_vars', 'brookhouse_query_vars');

function brookhouse_query_vars($q_vars)
{
    $q_vars[] = 'hdate';
    return $q_vars;
}

// Customise wp menu so that to make active menu items for archive and CPTs
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    // Access $post object
    global $post;
    // Add menu support for hearing CPT
    if (isset($post)) {
        if ($post->post_type == "hearing" && $item->title == 'Hearings') {
            $classes[] = 'current-menu-item';
        }
        // Add menu support for evidence CPT
        if (is_post_type_archive('evidence') && $item->title == 'Evidence') {
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}

// Allow editors access to theme options
$_the_roles = new WP_Roles();
$_the_roles->add_cap('editor', 'edit_theme_options');

//Page Slug Body Class
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

add_filter('body_class', 'add_slug_body_class');

function moj_get_page_uri()
{
    global $wp;
    return home_url($wp->request);
}

include('inc/acf-nav-menu-field.php');

add_action('init', 'homesettings_option_pages');
function homesettings_option_pages()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Header Settings'),
            'menu_title' => __('Header Settings'),
            'menu_slug' => 'header-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        acf_add_options_page(array(
            'page_title' => __('Footer Settings'),
            'menu_title' => __('Footer Settings'),
            'menu_slug' => 'footer-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }
}

// Adds user-input lang attribute to Language menu list items
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);
function new_nav_menu_items($items_list, $args)
{
    if ($args->theme_location == "languages-menu") {
        $nav_items = wp_get_nav_menu_items($args->menu);
        $items_list = "";

        foreach ($nav_items as $item) {
            $languages = get_field('language_character_code', $item);
            $items_list = $items_list
                . '<li class="menu-item">'
                . '<a lang="'.$languages.'" href="' . $item->url . '">'
                .  $item->post_title
                . '</a>'
                . '</li>';
        }
    }
    return $items_list;
}

add_filter('acf/load_field/name=publish_date', 'set_default_publish_date');
function set_default_publish_date($field)
{
    $field['default_value'] = date('Ymd');
    return $field;
}

/**
 * Convert a phone number to an international format. Used in tel: links
 * @param string $phone_number
 * @param string $code
 * @return String
 */
function prepend_country_code_to_number($phone_number, $code = '+44')
{
    // contact telephone number
    $number_link = $phone_number;
    if (strpos($phone_number, '0') === 0) {
        $number_link = $code . substr($phone_number, 1);
    }

    return $number_link;
}

/**
 * Adds a modification filter to CF7 that permits outside shortcode processing
 * @param $form
 * @return string
 */
function moj_wpcf7_form_elements($form)
{
    $form = do_shortcode($form);
    return $form;
}

add_filter('wpcf7_form_elements', 'moj_wpcf7_form_elements');