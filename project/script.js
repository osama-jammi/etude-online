let navLinks = document.getElementById("navLinks");
function showMenu(){
    navLinks.style.top = '0';
}
function hideMenu(){
    navLinks.style.top = '-800px'
}


const scrollLeftBtn = document.getElementById('scrollLeftBtn');
const scrollRightBtn = document.getElementById('scrollRightBtn');
const slickList = document.querySelector('.slick-list');

scrollLeftBtn.addEventListener('click', () => {
  slickList.scrollLeft -= 1100; // Ajustez la valeur en fonction de la quantité de défilement souhaitée
});

scrollRightBtn.addEventListener('click', () => {
  slickList.scrollLeft += 1100; // Ajustez la valeur en fonction de la quantité de défilement souhaitée
});





