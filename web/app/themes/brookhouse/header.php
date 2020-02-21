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

?><!DOCTYPE html>
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
<div id="page" class="hfeed site">
    <?php do_action('before'); ?>
    <nav id="site-navigation" class="main-navigation">
        <button id="nav-icon" class="menu-toggle">
            <span>&nbsp;</span>
            <span>&nbsp;</span>
            <span>&nbsp;</span>
            <div style="display:none">Open navigation</div>
        </button>
        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'brookhouse'); ?></a>
    </nav><!-- #site-navigation -->
    <header id="masthead" class="site-header">
        <div class="site-branding flex-grid">
            <div class="col">
                <a href="<?= esc_url(home_url('/')); ?>" rel="home"><img
                        src="<?= get_template_directory_uri(); ?>/dist/img/brookhouse-logo.svg"
                        alt="<?php bloginfo('name'); ?>" class="site-header__logo"></a>
                <div class="site-header__phone-number">
                    <a href="tel:<?= $moj_bh_phone_number_link ?>">
                        <img class="site-header__phone-number--image"
                             src="<?php echo get_template_directory_uri(); ?>/dist/img/call-for-info.svg"
                             alt="Call with information regarding the Brook House Investigation">
                        <span class="site-header__phone-number--text"><?= $moj_bh_phone_number ?></span>
                    </a>
                </div>
            </div>

            <div class="bh-languages col">
                <ul data-locale="<?= get_locale() ?>">
                    <li data-locale="en_GB"><a href="<?= moj_get_page_uri() ?>/?locale=en_GB">English (UK)</a></li>
                    <li data-locale="ar"><a href="<?= moj_get_page_uri() ?>/?locale=ar" lang="ar"
                                            class="locale-text-enlarge">عربى</a></li>
                    <li data-locale="ur"><a href="<?= moj_get_page_uri() ?>/?locale=ur" lang="ur"
                                            class="locale-text-enlarge">اردو</a></li>
                    <li data-locale="fa_IR"><a href="<?= moj_get_page_uri() ?>/?locale=fa_IR" lang="fa_IR"
                                               class="locale-text-enlarge">فارسی</a></li>
                    <li data-locale="sq"><a href="<?= moj_get_page_uri() ?>/?locale=sq" lang="sq">Shqiptar</a></li>
                </ul>
            </div>
        </div>
    </header><!-- #masthead -->
    <?php if (is_front_page()) { ?>
        <section id="tagline">
            <div class="site-branding tagline">
                <?php _e('An independent investigation into the potential mistreatment of detainees at Brook House IRC in 2017',
                    'brookhouse'); ?>
            </div>
        </section>
    <?php } ?>
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

                    if (is_archive()) {
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
                            if (is_singular('hearing')) {
                                echo "<li class='breadcrumb-child'><a href='" . get_permalink(get_page_by_title('hearings')) . "'>Hearings</a> </li>";
                            }
                            echo "<li class='breadcrumb-child'><a href='" . get_permalink() . "'>" . get_the_title() . "</a></li>";
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </section>

    <div id="content" class="site-content">
