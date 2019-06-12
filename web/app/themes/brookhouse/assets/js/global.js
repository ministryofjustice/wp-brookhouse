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

var moj = {
    setCookie: function (name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    },
    getCookie: function (name) {
        var value = "; " + document.cookie,
            parts = value.split("; " + name + "=");
        if (parts.length === 2) {
            return parts.pop().split(";").shift();
        }
    }
}

// set a test cookie - used by PHP
if (!moj.getCookie('moj_locale')) {
    moj.setCookie('moj_locale', 'active');
}



/**
 * Prevent the default execution of an event
 * @param event
 * @returns {boolean}
 * @private
 */
function _preventDefault(event) {
    event.preventDefault();
    return false;
}
