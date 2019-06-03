<?php
/**
 * Created by PhpStorm.
 * User: damienwilson
 * Date: 2019-05-30
 * Time: 11:52
 */
/**
 * Page titles
 *************************************/

/**
 * Get the translation for the residents page title
 * @return string
 */
function get_ttu__title()
{
    return __('Talk to us', 'brookhouse');
}

add_shortcode('ttu__title', 'get_ttu__title');

/**
 * Get the translation for the residents page title
 * @return string
 */
function get_ttu__button_resident()
{
    return __('I am a Resident', 'brookhouse');
}


add_shortcode('ttu__button_resident', 'get_ttu__button_resident');
/**
 * Get the translation for the residents page title
 * @return string
 */
function get_ttu__button_staff_member()
{
    return __('I am a Staff Member', 'brookhouse');
}

add_shortcode('ttu__button_staff_member', 'get_ttu__button_staff_member');

function get_ttu__page_text($atts)
{
    $a = shortcode_atts(array(
        'section' => 'intro'
    ), $atts);

    if ($a['section'] === 'intro') {
        return __(
            '<p class="locale-section-intro">Do you think you were a victim of mistreatment while at Brook House between 1 April and 31 August 2017, or do you know someone who might have been?  Maybe you witnessed some mistreatment whilst working there?  If so, we want to hear from you.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'contact') {
        return __(
            '<p class="locale-section-contact">If you would like to have your say please choose the link below that best applies to you while you were at Brook House.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'press') {
        return __(
            '<p class="locale-section-press">For press related queries or any other requests please <a href="/talk-to-us/press-and-other/">visit the Press page</a>.</p>',
            'brookhouse'
        );
    }
}

add_shortcode('ttu__page_text', 'get_ttu__page_text');
