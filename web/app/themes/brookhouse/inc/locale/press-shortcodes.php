<?php
/**
 * Created by PhpStorm.
 * User: damienwilson
 * Date: 2019-05-30
 * Time: 11:53
 */

/**
 * Get the translation for the press and other page title
 * @return string
 */
function get_ttu_press_and_other_title()
{
    return __('Press and Other', 'brookhouse');
}

add_shortcode('ttu_press_and_other_title', 'get_ttu_press_and_other_title');

function get_ttu_press_and_other_page_text($atts)
{
    $a = shortcode_atts(array(
        'section' => 'intro'
    ), $atts);

    if ($a['section'] === 'intro') {
        return __(
            '<p class="locale-section-intro">For all enquiries from the press, please contact our press officer John Steele either in writing or over the phone:</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'anonymous') {
        return __(
            '<p class="locale-section-anonymous">For enquiries from interested parties, including legal representatives we politely ask that you make your request in writing or leave a message on our voicemail.</p>',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-one') {
        return __(
            '',
            'brookhouse'
        );
    }

    if ($a['section'] === 'footer-para-two') {
        return __(
            '',
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

add_shortcode('ttu_press_and_other_page_text', 'get_ttu_press_and_other_page_text');
