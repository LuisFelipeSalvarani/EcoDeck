const botaoUser = document.getElementById("user-button");
const menuUser = document.getElementById("menu-user");
const linkMenu = document.querySelectorAll(".menu-user li");

botaoUser.addEventListener("click", () => {
    menuUser.classList.toggle("open");
    menuUser.classList.toggle("close");
    linkMenu.forEach(link => {
        link.classList.toggle("fade");
    });
    
});