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


$moj_storage = [
    'type' => '',
    'engine' => [],
    'set' => false
];


/**
 * Sets the locale from a post querystring value
 *
 * First we check to see if we have a stored locale in the DB to use and, that the querystring
 * value passed (if any) is the same as the stored value. If so we return the stored value.
 *
 * If the stored locale was null or different to the new locale, we check if the new locale matches
 * any of the languages stored in our language directory. If we have a match the locale is returned.
 * Otherwise, we return the default WordPress locale.
 *
 * @param string $locale The default locale code used by WordPress
 * @return string A language code in the form a string
 */
function moj_switch_locale($locale)
{
    global $moj_storage;

    if ($locale === $moj_storage['engine']['moj_locale']) {
        return $locale;
    }

    return $moj_storage['engine']['moj_locale'];
}

function moj_switch_locale_start_storage()
{
    global $moj_storage;

    if ($moj_storage['set'] === false) {
        if (isset($_COOKIE)) {
            $moj_storage['type'] = 'cookie';
            $moj_storage['engine'] = $_COOKIE;
        }

        if ($moj_storage['type'] === '') {
            if (session_status() !== 2) {
                session_start();
            }

            $moj_storage['type'] = 'session';
            $moj_storage['engine'] = $_SESSION;
        }

        // cookies on or off?
        if (count($moj_storage['engine']) === 0) {
            //header('Location: ' . WP_HOME . '/no-cookies');
            // too many redirects
        }

        $moj_storage['set'] = moj_switch_get_locale();
    }
}

function moj_switch_get_locale()
{
    global $moj_storage;
    $get_global = $_GET;

    // is it already set?
    if (!isset($get_global['locale']) && isset($moj_storage['engine']['moj_locale'])) {
        return true;
    }

    $locale = (isset($get_global['locale']) ? $get_global['locale'] : $moj_storage['engine']['moj_locale'] ?? 'en_GB');

    $moj_storage['engine']['moj_locale'] = $locale;

    if ($moj_storage['type'] === 'cookie') {
        return setcookie(
            'moj_locale',
            $locale,
            time() + 7200,
            COOKIEPATH,
            COOKIE_DOMAIN
        );
    }

    return true;
}

/**
 * Set the default locale
 */
add_action('registered_post_type', 'moj_switch_locale_start_storage', 99);

/**
 * Set the default locale
 */
add_filter('locale', 'moj_switch_locale', 99);
