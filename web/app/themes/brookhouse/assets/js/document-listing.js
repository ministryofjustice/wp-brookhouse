/**
 * jQuery; handles global functions
 */
jQuery(document).ready(function ($) {

    if ($('#doc-cat-filter').length) {
        $('#doc-cat-filter').change(function () {
            var category = $(this).val();

            if (category.length) {
                $('.document-list-by-category').hide();
                $('#doc-cat-' + category).show();

            } else {
                $('.document-list-by-category').show();
            }

        });
    }

});
