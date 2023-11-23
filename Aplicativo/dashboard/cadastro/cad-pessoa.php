<link rel="stylesheet" href="../assets/css/cadastro.css" />
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<div method="POSt" class="container">
  <div class="text">
    <h2>Cadastro</h2>
    <h3>Pessoa</h3>
  </div>
  <form method="POST" id="cadastro">
    <div class="form-linha">
      <div class="input" id="nome-input">
        <input type="text" name="nome" id="nome" required />
        <div class="underline"></div>
        <label for="">Nome</label>
      </div>
      <div class="input" id="data_nascimento-input">
        <input type="text" name="data_nascimento" id="data_nascimento" required />
        <div class="underline"></div>
        <label for="">Data de Nascimento</label>
      </div>
      <div class="input" id="telefone-input">
        <input type="text" name="telefone" id="telefone" required />
        <div class="underline"></div>
        <label for="">Telefone:</label>
      </div>
    </div>
    <div class="form-linha">
      <div class="input" id="cpf-input">
        <input type="text" name="cpf" id="cpf" required />
        <div class="underline"></div>
        <label for="">CPF</label>
      </div>
      <div class="input" id="rg-input">
        <input type="text" name="rg" id="rg" required />
        <div class="underline"></div>
        <label for="">RG</label>
      </div>
      <div class="input">
        <input type="email" name="email" id="email" required />
        <div class="underline"></div>
        <label for="">E-mail</label>
      </div>
    </div>
    <div class="form-linha">
      <div class="input" id="cep-input">
        <input type="text" name="cep" id="cep" required />
        <div class="underline"></div>
        <label for="">CEP</label>
      </div>
      <div class="input">
        <input type="text" name="logradouro_id" id="logradouro" required />
        <div class="underline"></div>
        <label for="">Rua</label>
      </div>
      <div class="input" id="numero-input">
        <input type="number" name="numero" id="numero" step="1" min="0" required />
        <div class="underline"></div>
        <label for="">N°</label>
      </div>
      <div class="input" id="complemento-input">
        <input type="text" name="complemento" id="complemento" />
        <div class="underline"></div>
        <label for="">Complemento</label>
      </div>
    </div>
    <div class="form-linha">
      <div class="input">
        <input type="text" name="bairro" id="bairro" required />
        <div class="underline"></div>
        <label for="">Bairro</label>
      </div>
      <div class="input" id="cidade-input">
        <input type="text" name="cidade" id="cidade" required />
        <div class="underline"></div>
        <label for="">Cidade</label>
      </div>
      <div class="input" id="estado-input">
        <input type="text" name="Estado" id="Estado" required />
        <div class="underline"></div>
        <label for="">Estado</label>
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

    xhttp.open("POST", "./gravar/pessoa-gravar.php", true);
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

      // Adiciona validação de e-mail apenas se o campo estiver preenchido
      if (element.name === "email" && element.value.trim() !== "") {
        if (!validacaoEmail(element.value)) {
          alert("O campo E-mail não é válido!");
          camposValidos = false;
        }
      }
    }

    return camposValidos;
  }

  // Função de validação de e-mail com expressão regular simples
  function validacaoEmail(email) {
    // Esta expressão regular verifica um formato básico de e-mail, mas não garante que o e-mail é real.
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
</script>