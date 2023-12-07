function validaCampos(formName) {
  var form = document.forms[formName];

  for (var i = 0; i < form.elements.length; i++) {
    var element = form.elements[i];

    // Verifica se o campo é obrigatório e se está vazio
    if (element.hasAttribute("required") && element.value.trim() === "") {
      alert("O campo " + element.name + " é obrigatório!");
      return false;
    }
  }

  return true;
}
