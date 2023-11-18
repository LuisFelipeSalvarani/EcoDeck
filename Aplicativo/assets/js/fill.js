// Obtém todos os elementos de input
const inputs = document.querySelectorAll('.input input');

// Adiciona um ouvinte de evento de input a cada input
inputs.forEach(input => {
  input.addEventListener('input', function () {
    // Adiciona a classe "preenchido" se o valor do input não estiver vazio
    if (this.value.trim() !== '') {
      this.parentElement.classList.add('preenchido');
    } else {
      // Remove a classe "preenchido" se o valor estiver vazio
      this.parentElement.classList.remove('preenchido');
    }
  });

  // Adiciona um ouvinte de evento para tratar a validação
  input.addEventListener('invalid', function () {
    // Adiciona a classe "invalido" quando o campo é inválido
    this.parentElement.classList.add('invalido');
  });
});