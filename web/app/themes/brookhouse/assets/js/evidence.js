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

jQuery(document).ready(function ($) {

  if ($('#evidence-cat-filter').length) {
    $('#evidence-cat-filter').change(function () {
      var category = $(this).val();
      console.log(category);

      if (category.length) {
        $('.evidence__item').hide();
        $('.evidence__item').data(category).show();
      } else {
        $('.evidence__item').show();
      }

    });
  }

});