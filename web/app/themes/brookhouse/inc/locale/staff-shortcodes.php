<?php
/**
 * Created by PhpStorm.
 * User: damienwilson
 * Date: 2019-05-30
 * Time: 11:53
 */

/**
 * Get the translation for the member of staff page title
 * @return string
 */
function get_ttu_members_of_staff_title()
{
    return __('Staff Members', 'brookhouse');
}

add_shortcode('ttu_members_of_staff_title', 'get_ttu_members_of_staff_title');

function get_ttu_member_of_staff_title()
{
    return __('Staff Member', 'brookhouse');
}

add_shortcode('ttu_member_of_staff_title', 'get_ttu_member_of_staff_title');

function get_ttu_members_of_staff_page_text($atts)
{
    $a = shortcode_atts(array(
        'section' => 'intro'
    ), $atts);

    if ($a['section'] === 'intro') {
        return __(
            '<p class="locale-section-intro">If you were employed at Brook House IRC, in any capacity, between 1 April 2017 and 31st August 2017, we would like to hear from you about your experiences.  Please contact us in one of the following ways:</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'anonymous') {
        return __(
            '',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-one') {
        return __(
            '<p class="locale-section-footer-para-one">Please be advised that all calls will be diverted to our voicemail and followed up by a member of the team as soon as possible. </p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-two') {
        return __(
            '<p class="locale-section-footer-para-two">*All information provided to us will be kept confidential and held in line with GDPR regulations, data protection laws and the PPO’s internal retention policy.  For more information on this please contact us on …or follow the link below*</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-three') {
        return __(
            '',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-four') {
        return __(
            '',
            'brookhouse'
        );
    }
}

add_shortcode('ttu_members_of_staff_page_text', 'get_ttu_members_of_staff_page_text');
