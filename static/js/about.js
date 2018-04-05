let tabs = Array.from(document.getElementsByClassName('nav-link'));

setAnims();

tabs.forEach((tab) => {
  tab.addEventListener('click', (e) => {
    setAnims()
  });
});

function setAnims() {
  let cards = Array.from(document.getElementsByClassName('card-img-overlay'));

  cards.forEach((card) => {
    card.children[0].style.left = `-${card.children[0].offsetWidth + 50}px`;
    card.addEventListener('mouseover', (e) => {
      card.children[1].style.bottom = `-${card.offsetHeight}px`;
      card.children[0].style.left = '10px'
      card.parentElement.children[0].classList.add('zoom-img');
    });
    card.addEventListener('mouseout', (e) => {
      card.children[1].style.bottom = '10px';
      card.children[0].style.left = `-${card.children[0].offsetWidth + 50}px`;
      card.parentElement.children[0].classList.remove('zoom-img');
    });
  });
}

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});
