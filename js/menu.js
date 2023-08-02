const menu = document.querySelector(".menu");
const openmenu = document.querySelector(".open-menu");
const closemenu = document.querySelector(".close-menu");

function togglemenu() {
menu.classList.toggle("menu_opened");
}
openmenu.addEventListener("click", togglemenu);
closemenu.addEventListener("click", togglemenu);

document.addEventListener('DOMContentLoaded', () => {
    const elementosCarousel = document.querySelectorAll('.carousel');
    M.Carousel.init(elementosCarousel, {
        duration: 150,
        dist: -80,
        shift:5,
        padding:5,
        numVisible: 3,
        indicators: true,
        noWrap: false,
    });
    });
$(document).ready(function() {
$(openmenu).click(function() {
$(".tit,section,footer,main").hide()   
});
})
$(document).ready(function() {
    $(closemenu).click(function() {
    $(".tit,section,footer,main").show()   
    });
    })
