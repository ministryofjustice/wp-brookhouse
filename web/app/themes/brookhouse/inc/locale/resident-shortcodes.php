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
function get_ttu_residents_title()
{
    return __('Residents', 'brookhouse');
}

add_shortcode('ttu_residents_title', 'get_ttu_residents_title');

function get_ttu_resident_title()
{
    return __('Resident', 'brookhouse');
}

add_shortcode('ttu_resident_title', 'get_ttu_resident_title');

function get_ttu_residents_page_text($atts)
{
    $a = shortcode_atts(array(
        'section' => 'intro'
    ), $atts);

    if ($a['section'] === 'intro') {
        return __(
            '<p class="locale-section-intro">As part of our investigation, we want to hear from detainees who were at Brook House between 1 April and 31st August 2017.  If you or a family member were there during this period, we would like to hear from you about your experiences.  Please contact us in any of the following ways:</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'anonymous') {
        return __(
            '<p class="locale-section-anonymous">You can contact us anonymously but we ask that you consider providing your name and a contact number so that we can contact you if we have any questions.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-one') {
        return __(
            '<p class="locale-section-footer-para-one">If you are concerned that speaking to us will impact you or your family in a negative way, please be assured that we are wholly independent of the Home Office and any information provided will be kept confidential and used for the purpose of this investigation only.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-two') {
        return __(
            '<p class="locale-section-footer-para-two">All calls will be diverted to our voicemail and listened to by a member of the team as soon as possible.  If English is not your first language, please tell us and we can make arrangements to speak to you through our affiliated translation service. </p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-three') {
        return __(
            '<p class="locale-section-footer-para-three">Unfortunately, we are unable to provide assistance to detainees outside of the parameters of this investigation.  If you require any support relating to your immigrations status or have any welfare concerns, please contact the Samphire Project Helpline on 0800 9179397.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-four') {
        return __(
            '<p class="locale-section-footer-para-four">*All information provided to us will be kept confidential and held in line with GDPR regulations, data protection laws and the PPO’s internal retention policy.  For more information on this please contact us on or click the following link*</p>',
            'brookhouse'
        );
    }
}

add_shortcode('ttu_residents_page_text', 'get_ttu_residents_page_text');
