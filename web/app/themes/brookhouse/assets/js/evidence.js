// JavaScript is enabled, so the no JS-warning is removed

jQuery(document).ready(function ($) {
  const evidencePage = $(".evidence-main");

  if (evidencePage.length) {

    document.getElementById('js-evidence-filter').style.display = "block";
    document.getElementById('js-turned-off').style.display = "none";


    /* This is based off of Heydon Pickering's Inclusive Components:
      https://inclusive-components.design/cards/
    */

    const cards = document.querySelectorAll('.js-evidence-item');
    Array.prototype.forEach.call(cards, card => {
      card.setAttribute("style", "cursor: pointer;");
      let down, up, link = card.querySelector('a');
      card.onmousedown = () => down = +new Date();
      card.onmouseup = () => {
        up = +new Date();
        if ((up - down) < 200) {
          link.click();
        }
      }
    });

    /* end code taken from Inclusive Components */


    var checkedValues = [];

    // Initial check to see if any are already checked on page load
    $('input[type=checkbox]').each(function () {
      if ($(this).prop("checked") == true) {
        var value = $(this).val();
        checkedValues.push(value);

        // Now the array is up to date, this toggles what's shown
        if (checkedValues.length) {
          $('.evidence__item').hide();
          checkedValues.forEach(function (entry) {
            $('.evidence__item[data-evidence-type="' + entry + '"]').show();
            $('.evidence__item[data-evidence-format="' + entry + '"]').show();
            $('.evidence__item[data-witness-type="' + entry + '"]').show();
          });
        }
      }
    })

    if ($('#js-evidence-filter').length) {
      $('input[type=checkbox]').change(function () {
        $('input[type=checkbox]').each(function () {
          // Checks if it's already there and if it is, removes it
          if ($(this).prop("checked")) {
            var value = $(this).val();
            var index = checkedValues.indexOf(value);
            if (index > -1) {
              checkedValues.splice(index, 1);
            }
            checkedValues.push(value);
          }
          // Otherwise, if it's not in the list of things checked anymore, it removes it
          else {
            var value = $(this).val();
            var index = checkedValues.indexOf(value);
            if (index > -1) {
              checkedValues.splice(index, 1);
            }
          }
        })

        // Now the array is up to date, this toggles what's shown
        if (checkedValues.length) {
          $('.evidence__item').hide();
          checkedValues.forEach(function (entry) {
            $('.evidence__item[data-evidence-type="' + entry + '"]').show();
            $('.evidence__item[data-evidence-format="' + entry + '"]').show();
            $('.evidence__item[data-witness-type="' + entry + '"]').show();
          });
        } else {
          $('.evidence__item').show();
        }
      });
    }
  }
});
