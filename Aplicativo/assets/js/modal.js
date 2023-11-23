document.addEventListener("DOMContentLoaded", function () {
  const abrirModal = document.querySelectorAll("#linha");
  const modal = document.querySelector("dialog");
  const fecharModal = document.querySelector("dialog .fechar");

  abrirModal.forEach(function (elemento) {
    elemento.onclick = function () {
      modal.showModal();
    };
  });

  fecharModal.onclick = function () {
    modal.close();
  };
});