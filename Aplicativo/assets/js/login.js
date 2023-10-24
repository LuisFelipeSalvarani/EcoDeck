document.addEventListener("DOMContentLoaded", function () {
    const cadastrarButton = document.getElementById('cadastrar');
    const entrarButton = document.getElementById('entrar');
    const container = document.getElementById('container');

    cadastrarButton.addEventListener('click', (e) => {
        e.preventDefault();
        container.classList.add("esquerda-painel-active");
    });

    entrarButton.addEventListener('click', (e) => {
        e.preventDefault();
        container.classList.remove("esquerda-painel-active");
    });
});