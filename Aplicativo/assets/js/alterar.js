document.addEventListener("DOMContentLoaded", function () {
  var alterarButton = document.getElementById("alterar");
  
  alterarButton.onclick = function () {
    var inputs = document.getElementById("cadastro").getElementsByTagName("input");
  
    for (var i = 0; i < inputs.length; i++) {
      if (alterarButton.innerHTML.trim() === "<span>Alterar</span>") {
        // Se o texto do botão for "Alterar", remove o atributo disabled
        inputs[i].removeAttribute("disabled");
      } else {
        // Se o texto do botão for "Cancelar", adiciona o atributo disabled
        inputs[i].setAttribute("disabled", "true");
      }
    }
  
    // Alterna entre "Alterar" e "Cancelar"
    alterarButton.innerHTML = (alterarButton.innerHTML.trim() === "<span>Alterar</span>") ? "<span>Cancelar</span>" : "<span>Alterar</span>";
  };
});