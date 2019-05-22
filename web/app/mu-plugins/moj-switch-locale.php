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
    if (session_status() !== 2) {
        session_start();
    }

    $get_global = $_GET;

    if (!isset($_SESSION['moj_locale'])) {
        $_SESSION['moj_locale'] = $locale;
    }

    $new_locale = $get_global['locale'] ?? $_SESSION['moj_locale'];

    if (in_array($new_locale, get_available_languages(get_template_directory() . '/languages'))) {
        $_SESSION['moj_locale'] = $new_locale;
        return $new_locale;
    }

    return $locale;
}

/**
 * Set the default locale
 */
add_filter('locale', 'moj_switch_locale');
