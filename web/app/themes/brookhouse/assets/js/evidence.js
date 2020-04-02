const cards = document.querySelectorAll('.js-evidence-item');
Array.prototype.forEach.call(cards, card => {
    let down, up, link = card.querySelector('a');
    card.onmousedown = () => down = +new Date();
    card.onmouseup = () => {
        up = +new Date();
        if ((up - down) < 200) {
            link.click();
        }
    }
});
