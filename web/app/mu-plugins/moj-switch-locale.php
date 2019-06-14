<?php
/*
Plugin Name: MoJ Switch Locale
Plugin URI: https://www.justice.gov.uk/
Description: Sets the locale from a post querystring value
Version: 1.0
Author: Damien Wilson
Author URI: https://www.justice.gov.uk/
Text Domain: brookhouse
*/


$moj_locale_storage = [
    'type' => '',
    'engine' => [],
    'set' => false
];


/**
 * Returns the locale found in our storage.
 *
 * First we check to see if we have a stored locale in the DB to use and, that the querystring
 * value passed (if any) is the same as the stored value. If so we return the stored value.
 *
 * If the stored locale was null or different to the new locale, we check if the new locale matches
 * any of the languages stored in our language directory. If we have a match the locale is returned.
 * Otherwise, we return the default WordPress locale or en_GB if for any reason the default was null.
 *
 * @param string $locale The default locale code used by WordPress
 * @return string A language code in the form a string
 */
function moj_switch_locale($locale)
{
    global $moj_locale_storage;
/*
    if ($locale !== $moj_locale_storage['engine']['moj_locale']) {
        echo '<pre>' . print_r(__FUNCTION__ . ': on line ' . __LINE__ . ' - default locale was NOT the same: ' . $locale . ' + ' . $moj_locale_storage['engine']['moj_locale'], true) . '</pre>';

    } else {
        echo '<pre>' . print_r(__FUNCTION__ . ': on line ' . __LINE__ . ' - default locale was the same: ' . $locale . ' + ' . $moj_locale_storage['engine']['moj_locale'], true) . '</pre>';
        return $locale;
    }*/

    if (in_array(
        $moj_locale_storage['engine']['moj_locale'],
        get_available_languages(get_template_directory() . '/languages')
    )) {
        return $moj_locale_storage['engine']['moj_locale'];
    }

    return $locale ?? 'en_GB';
}

function moj_switch_locale_start_storage()
{
    global $moj_locale_storage;

    if ($moj_locale_storage['set'] === false) {
        if (isset($_COOKIE)) {
            $moj_locale_storage['type'] = 'cookie';
            $moj_locale_storage['engine'] = $_COOKIE;
            echo '<pre>' . print_r(__FUNCTION__ . ': on line ' . __LINE__ . ' - storage is COOKIE', true) . '</pre>';
        }

        if ($moj_locale_storage['type'] === '') {
            if (session_status() !== 2) {
                session_start();
            }

            $moj_locale_storage['type'] = 'session';
            $moj_locale_storage['engine'] = $_SESSION;
            echo '<pre>' . print_r(__FUNCTION__ . ': on line ' . __LINE__ . ' - storage is SESSION', true) . '</pre>';
        }

        $moj_locale_storage['set'] = moj_switch_get_locale();
    }
}

function moj_switch_get_locale()
{
    global $moj_locale_storage;
    $get_global = $_GET;

    // is it already set?
    if (!isset($get_global['locale']) && isset($moj_locale_storage['engine']['moj_locale'])) {
        echo '<pre>' . print_r(__FUNCTION__ . ': on line ' . __LINE__ . ' - storage was already set to ' . $moj_locale_storage['engine']['moj_locale'], true) . '</pre>';
        return true;
    }

    $locale = (
        isset($get_global['locale'])
            ? $get_global['locale']
            : $moj_locale_storage['engine']['moj_locale'] ?? 'en_GB'
    );

    $moj_locale_storage['engine']['moj_locale'] = $locale;

    /*if ($moj_locale_storage['type'] === 'cookie') {
        return setcookie(
            'moj_locale',
            $locale,
            time() + 7200,
            '/',
            COOKIE_DOMAIN
        );
    }*/

    return true;
}

/**
 * Set the default locale
 */
add_action('registered_post_type', 'moj_switch_locale_start_storage', 99);

/**
 * Set the default locale
 */
add_filter('locale', 'moj_switch_locale', 1);
