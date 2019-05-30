<?php

/**
 * Page titles
 *************************************/

/**
 * Get the translation for the residents page title
 * @return string
 */
function get_ttu_residents_title()
{
    return __('Residents', 'brookhouse');
}

add_shortcode('ttu_residents_title', 'get_ttu_residents_title');

/**
 * Get the translation for the member of staff page title
 * @return string
 */
function get_ttu_members_of_staff_title()
{
    return __('Members of Staff', 'brookhouse');
}

add_shortcode('ttu_members_of_staff_title', 'get_ttu_members_of_staff_title');

/**
 * Get the translation for the press and other page title
 * @return string
 */
function get_ttu_press_and_other_title()
{
    return __('Press and Other', 'brookhouse');
}

add_shortcode('ttu_press_and_other_title', 'get_ttu_press_and_other_title');


/**
 * Form encouragement
 *************************************/
function get_ttu_residents_page_intro()
{
    return __('This is the intro we can use to explain to our audience how to use the form and how to interact with the communication offerings', 'brookhouse');
}

add_shortcode('ttu_residents_page_intro', 'get_ttu_residents_page_intro');
function get_ttu_members_of_staff_page_intro()
{
    return __('This is the intro we can use to explain to our audience how to use the form and how to interact with the communication offerings', 'brookhouse');
}

add_shortcode('ttu_members_of_staff_page_intro', 'get_ttu_members_of_staff_page_intro');

function get_ttu_press_and_other_page_intro()
{
    return __('This is the intro we can use to explain to our audience how to use the form and how to interact with the communication offerings', 'brookhouse');
}

add_shortcode('ttu_press_and_other_page_intro', 'get_ttu_press_and_other_page_intro');


/**
 * Form labels
 *************************************/

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
