<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package brookhouse
 */

// contact telephone number
$moj_bh_phone_number = get_field('telephone_number', 'option');
$moj_bh_phone_number_link = prepend_country_code_to_number($moj_bh_phone_number);

$moj_bh_header_link = get_field('header_link', 'option');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class('locale-' . get_locale()); ?>>

    <?php

/**
 * MoJ hook in our themes to allow content to be hooked and placed
 * at the top of the page but still within the body
 *  */
    do_action('after_body_open_tag'); ?>

    <div id="page" class="hfeed site">
        <?php do_action('before'); ?>
        <nav id="site-navigation" class="main-navigation">
            <button id="nav-icon" class="menu-toggle">
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <div style="display:none">Open navigation</div>
            </button>
            <a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to content', 'brookhouse'); ?></a>
        </nav><!-- #site-navigation -->
        <header id="masthead" class="site-header">
            <div class="site-branding flex-grid">
                <div class="col branding">
                    <a href="<?= esc_url(home_url('/')); ?>" rel="home" class="site-header__logo">
                        <img src="<?= get_template_directory_uri(); ?>/dist/img/brookhouse-logo.svg"
                            alt="<?php bloginfo('name'); ?>">
                    </a>

                    <div class="site-header__phone-number">
                        <a href="tel:<?= $moj_bh_phone_number_link ?>">
                            <img class="site-header__phone-number--image"
                                src="<?php echo get_template_directory_uri(); ?>/dist/img/call-for-info.svg"
                                alt="Call with information regarding the Brook House Investigation">
                            <span class="site-header__phone-number--text"><?= $moj_bh_phone_number ?></span>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <?php if(!empty($moj_bh_header_link)){ ?>
                        <div class="bh-languages">
                            <a href="<?php echo $moj_bh_header_link['url']; ?>"><?php echo $moj_bh_header_link['title']; ?></a>
                        </div>
                    <?php } ?>

                    <div class="site-header-search-form">
                        <?php get_search_form(); ?>
                    </div>

            </div>
        </header><!-- #masthead -->
        <?php if (is_front_page()) {

            $banner_text  = get_field('header_banner_text');

            if(!empty($banner_text)){
            ?>
                <section id="tagline">
                    <div class="site-branding tagline">
                        <?php echo $banner_text; ?>
                    </div>
                </section>
             <?php
                }
            }
            ?>
        <section id="breadcrumbs-wrapper">
            <div id="breadcrumbs">
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">Home</a>
                    </li>
                    <?php
                    if (!is_home() && $post != null) {

                        foreach (get_post_ancestors($post->ID) as $ancestor_id) {
                            echo "<li class='breadcrumb-child'><a href='" . get_permalink($ancestor_id) . "'>" . get_the_title($ancestor_id) . "</a></li>";
                        }
                    }
                    else if (is_archive()) {
                        echo "<li class='breadcrumb-child'><a href='" .
                            get_post_type_archive_link(
                                $wp_query->query['post_type']
                            ) . "'>" .
                            post_type_archive_title(
                                '',
                                false
                            ) . "</a></li> ";
                        if (is_post_type_archive('evidence') && get_query_var('witness')) {
                            $witness = get_term_by('slug', get_query_var("witness"), "witness");
                            echo "<li class='breadcrumb-child'><a href='" .
                                get_permalink(
                                    get_page_by_title(
                                        'evidence'
                                    )
                                ) . "?witness=" . get_query_var('witness') . "'> Witness: " . $witness->name . "</a></li>";
                        } elseif (is_post_type_archive('evidence') && get_query_var('hdate')) {
                            echo "<li class='breadcrumb-child'><a href='" .
                                get_permalink(
                                    get_page_by_title(
                                        'evidence'
                                    )
                                ) . "?hdate=" .
                                get_query_var(
                                    'hdate'
                                ) . "'> Date: " .
                                date(
                                    'l j F Y',
                                    strtotime($_GET['hdate'])
                                ) . "</a></li>";
                        }
                    } else {

                        if (is_search()) {
                            echo "<li class='breadcrumb-child'>Search Results for: " . get_search_query() . "</li>";
                        } else {
                            echo "<li class='breadcrumb-child'><a href='" . get_permalink() . "'>" . get_the_title() . "</a></li>";
                        }
                    }

                    ?>
                </ul>
            </div>
        </section>

        <div id="content" class="site-content">
