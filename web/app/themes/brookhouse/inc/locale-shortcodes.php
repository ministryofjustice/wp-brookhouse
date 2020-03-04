<?php

include_once('locale/resident-shortcodes.php');
include_once('locale/staff-shortcodes.php');
include_once('locale/press-shortcodes.php');

/**
 * Get the translation for the form input: Name
 * @return string
 */
function get_ttu_contact_name()
{
    return __('Name', 'brookhouse');
}

add_shortcode('ttu_contact_name', 'get_ttu_contact_name');

/**
 * Get the translation for the form input: number or email
 * @return string
 */
function get_ttu_contact_phone_email()
{
    return __('Contact number or email', 'brookhouse');
}

add_shortcode('ttu_contact_phone_email', 'get_ttu_contact_phone_email');

/**
 * Get the translation for the form input: email
 * @return string
 */
function get_ttu_contact_email()
{
    return __('Enter your email address', 'brookhouse');
}

add_shortcode('ttu_contact_email', 'get_ttu_contact_email');

/**
 * Get the translation for the form textarea: what can you tell us
 * @return string
 */
function get_ttu_contact_detail()
{
    return __('What can you tell us?', 'brookhouse');
}

add_shortcode('ttu_contact_detail', 'get_ttu_contact_detail');

/**
 * Get the translation for the form textarea: what can you tell us
 * @return string
 */
function get_ttu_contact_submit_text()
{
    return __('Send', 'brookhouse');
}

add_shortcode('ttu_contact_submit_text', 'get_ttu_contact_submit_text');




/**
 * Contact methods
 *************************************/

function get_ttu_use_our_form()
{
    return __('Complete our form', 'brookhouse');
}

add_shortcode('ttu_use_our_form', 'get_ttu_use_our_form');

function get_ttu_write_to_us_text()
{
    return __('Write to us', 'brookhouse');
}

add_shortcode('ttu_write_to_us_text', 'get_ttu_write_to_us_text');

function get_ttu_email_us_on_text()
{
    return __('Email us on', 'brookhouse');
}

add_shortcode('ttu_email_us_on_text', 'get_ttu_email_us_on_text');

function get_ttu_call_us_on_text()
{
    return __('Call us on', 'brookhouse');
}

add_shortcode('ttu_call_us_on_text', 'get_ttu_call_us_on_text');

function get_ttu_text_us_on_text()
{
    return __('Text us on', 'brookhouse');
}

add_shortcode('ttu_text_us_on_text', 'get_ttu_text_us_on_text');





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
