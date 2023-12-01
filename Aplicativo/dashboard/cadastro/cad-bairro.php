<link rel="stylesheet" href="../assets/css/cadastro.css" />
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<div class="container">
  <div class="text">
    <h2>Cadastro</h2>
    <h3>Bairro</h3>
  </div>
  <form method="post" id="cadastro">
    <div class="form-linha">
      <div class="input" id="grupo-input">
        <label for="grupo">Grupo</label>
        <input type="text" name="grupo" id="grupo" placeholder="00" required/>
      </div>
      <div class="input">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required />
      </div>
      <div class="input" id="cidade-input">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required />
      </div>
      <div class="input" id="estado-input">
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" placeholder="UF" required />
      </div>
    </div>
  </form>
  <button class="btn-padrao" onclick="realizarCadastro()"><span>Cadastrar</span></button>
</div>
<div class="notificacao sucesso" id="sucesso">
  <div class="notificacao-corpo">
    <i class="fa-regular fa-circle-check notificacao-icone"></i>
    Gravado com sucesso
  </div>
  <div class="notificacao-progresso"></div>
</div>
<div class="notificacao erro" id="erro">
  <div class="notificacao-corpo">
    <i class="fa-regular fa-circle-xmark notificacao-icone"></i>
    Erro ao gravar
  </div>
  <div class="notificacao-progresso"></div>
</div>

<!-- JavaScript -->

<script>
  function realizarCadastro() {
    var formulario = document.getElementById("cadastro");

    // Adicionando a validação dos campos
    if (!validaCampos("cadastro")) {
      return; // Impede a execução do restante do código se a validação falhar
    }

    var dadosFormulario = new FormData(formulario);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          var resposta = this.responseText.trim();
          if (resposta === "sucesso") {
            exibirMensagem("sucesso");

            // Resetar os campos após o envio bem-sucedido
            formulario.reset();

            // Remover a classe "preenchido" das divs com a classe "input"
            var divsInput = document.querySelectorAll('.input');
            divsInput.forEach(function (div) {
              div.classList.remove('preenchido');
            });
          } else {
            exibirMensagem("erro");
          }
        } else {
          exibirMensagem("erro");
        }
      }
    };

    xhttp.open("POST", "./gravar/bairro-gravar.php", true);
    xhttp.send(dadosFormulario);
  }

  function exibirMensagem(tipo) {
    var elemento = document.getElementById(tipo);
    elemento.classList.add("aparecer");
    setTimeout(function () {
      elemento.classList.remove("aparecer");
    }, 3000);
  }

  // Função de validação genérica
  function validaCampos(formName) {
    var form = document.forms[formName];
    var camposValidos = true; // Assume que todos os campos são válidos inicialmente

    for (var i = 0; i < form.elements.length; i++) {
      var element = form.elements[i];

      // Verifica se o campo é obrigatório e se está vazio
      if (element.hasAttribute("required") && element.value.trim() === "") {
        alert("O campo " + element.name + " é obrigatório!");
        camposValidos = false; // Define como falso se encontrar um campo inválido
      }
    }

    return camposValidos;
  }
</script>