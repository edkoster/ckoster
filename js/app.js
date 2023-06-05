window.addEventListener("load", (event) => {

    if (document.body.classList.contains('index')) {
      initIndex();
    }

    if (document.body.classList.contains('photos')) {
      initGallery();
    }
});


function initIndex()
{
  let cardFront = document.getElementById('card-front');
  let cardContainer = document.getElementsByClassName('card-container');

  cardContainer[0].style.height = cardFront.height + 'px';
}

function initGallery()
{
  lightGallery(document.getElementById('lightgallery'), {
    plugins: [lgAutoplay, lgFullscreen, lgThumbnail],
    licenseKey: 'your_license_key',
    speed: 500,
    slideShowInterval: 4000,
  });
}