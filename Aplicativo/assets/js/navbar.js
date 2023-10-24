const hamburguer = document.getElementById('hamburguer');
const menuLinks = document.getElementById('menu-links');
const links = document.querySelectorAll('.menu-links li');

hamburguer.addEventListener("click", () => {
    menuLinks.classList.toggle("open");
    hamburguer.classList.toggle("close");
    links.forEach(link => {
        link.classList.toggle("fade");
    });
    
});