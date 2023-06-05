window.addEventListener("load", (event) => {

  if (document.body.classList.contains('index')) {
    initIndex();
  }

  if (document.body.classList.contains('photos')) {
    initGallery();
    initRandomizer();
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
function initRandomizer()
{
  let link = document.querySelector('#randomize');
  link.addEventListener('click', function (event) {
    event.preventDefault();
    randomStartPoint();
  });
}

function randomStartPoint()
{
  let gallery = document.querySelector('#lightgallery');
  let photos = document.querySelectorAll('#lightgallery a');
  let start = Math.floor(Math.random() * photos.length);

  for (let i = 0; i< start; i++) {
    gallery.appendChild(document.querySelector('#lightgallery a'));
  }
}