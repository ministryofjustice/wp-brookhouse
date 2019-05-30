/**
 * jQuery; handles global functions
 */
jQuery(document).ready(function ($) {

    // manage language interactions
    var languages = $('.bh-languages ul'),
        locale = languages.data('locale');

    languages.find('li.active a').click(_preventDefault);

    // set the active language
    languages.find('li').each(function (key, list_item) {
        if ($(list_item).data('locale') === locale) {
            $(list_item).addClass('active').find('a').click(_preventDefault).prop('tabindex', '-1');
            return false;
        }
    });
});

/**
 * Prevent the default execution of an event
 * @param event
 * @returns {boolean}
 * @private
 */
function _preventDefault(event)
{
    event.preventDefault();
    return false;
}
