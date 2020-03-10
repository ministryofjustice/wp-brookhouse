<?php

/* Component: Hearing link section */

// ACF hearing fields
$hearing_document = get_field('hearing_document');
$hearing_link = get_field('hearing_link');

// Documents - This is a check so if docs doesn't exist it removes div completely
if ($hearing_document) {
        _e('<div class="hearing_document">');

    if (have_rows('hearing_document')) :
        _e('<h3>Documents</h3>');

        while (have_rows('hearing_document')) :
                the_row();

                $hearing_file_title = get_sub_field('hearing_file_title');
                $hearing_file_url = get_sub_field('hearing_file_url');

                _e('<a href="' . $hearing_file_url . '">' . $hearing_file_title . '</a><br>');
        endwhile;
    else :
        // no rows found
    endif;

        _e('</div>');
}

// Links - This is a check so if link doesn't exist it removes div completely
if ($hearing_link) {
    _e('<div class="hearing_link">');

    if (have_rows('hearing_link')) :
        _e('<h3>Supporting links</h3>');

        while (have_rows('hearing_link')) :
            the_row();

            $hearing_link_title = get_sub_field('hearing_link_title');
            $hearing_link_url = get_sub_field('hearing_link_url');

            _e('<a href="' . $hearing_link_url . '">' . $hearing_link_title . '</a><br>');
        endwhile;
    else :
    // no rows found
    endif;

    _e('</div>');
}
