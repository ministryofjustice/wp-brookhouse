/**
 * navigation.js
 *
 */

jQuery(document).ready(function ($) {
    // Slide out menu for mobile view
    // hack to fix double click registered on #nav-icon
    var theFirst = 1;
    $('#nav-icon').click(function (e) {
        var _that = $(this);
        if (theFirst === 1) {
            theFirst = 2;
            setTimeout(function () {
                e.preventDefault();

                _that.toggleClass('open');
                $('html').toggleClass('nav-open');
                $('#secondary').toggleClass('toggled');

                theFirst = 1;
                return false;
            }, 10);
        }
    });

    // submenu
    $('#menu-main-nav ul li ul.sub-menu li a').click(function (e) {
        if ($(this).attr('class') !== 'active') {
            $('#menu-main-nav ul li a').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('a').filter(function () {
        return this.href === document.location.href;
    }).addClass('active');

    $("ul.sub-menu > li > a").each(function () {
        var currentURL = document.location.href;
        var thisURL = $(this).attr("href");
        if (currentURL.indexOf(thisURL) != -1) {
            $(this).parents("ul.sub-menu").css('display', 'block');
        }
    });

    $('#menu-main-nav > ul > li > a').each(function () {
        var currURL = document.location.href;
        var myHref = $(this).attr('href');
        if (currURL.match(myHref)) {
            $(this).parent().find("ul.sub-menu").css('display', 'block');
        }
    });
});

// Popup for video - enabled site wide so can be used anywhere
$("a.popup-video").on("click", function (e) {
    e.preventDefault();

    if (!$(this).attr("data-video-id")) {
        return false;
    }

    $("body").append("<div id='blackout'></div>");
    $("#blackout").animate({opacity: 1}, 500).append('<div id="popup"><div class="close"><a href="#">Close</a></div><iframe width="512" height="288" src="//www.youtube.com/embed/' + $(this).attr("data-video-id") + '?wmode=transparent" frameborder="0" allowfullscreen></iframe></div>');
});

$(document).on("click", "#popup .close a, #blackout", function (e) {
    e.preventDefault();
    $("#blackout").fadeOut(function () {
        $(this).remove();
    });
});
