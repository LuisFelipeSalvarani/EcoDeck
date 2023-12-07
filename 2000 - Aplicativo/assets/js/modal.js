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

    // Obtém todos os inputs no formulário
    var inputs = document
      .getElementById("cadastro")
      .getElementsByTagName("input");

    // Adiciona o atributo disabled apenas se o input não tiver o atributo
    for (var i = 0; i < inputs.length; i++) {
      // SAdiciona o atributo disabled
      inputs[i].setAttribute("disabled", "true");
    }

    var alterarButton = document.getElementById("alterar");

    // Alterna entre "Alterar" e "Cancelar"
    if(alterarButton.innerHTML.trim() === "<span>Cancelar</span>") {

      alterarButton.innerHTML = "<span>Alterar</span>";

    }
  };
});
