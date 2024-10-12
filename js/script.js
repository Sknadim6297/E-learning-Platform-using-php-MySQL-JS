
const menuButton = document.getElementById('menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const closeButton = document.getElementById('close-button');

menuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('-translate-x-full');
    mobileMenu.classList.add('translate-x-0');
});

closeButton.addEventListener('click', () => {
    mobileMenu.classList.add('-translate-x-full');
    mobileMenu.classList.remove('translate-x-0');
});

document.getElementById('avatar').addEventListener('click', function() {
    console.log("Come Kar raha hai");
  });


  