<link rel="stylesheet" href="../assets/css/cadastro.css" />
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<link rel="stylesheet" href="../assets/css/lista.css">

<div method="POSt" class="container">
  <div class="text">
    <h2>Cadastro</h2>
    <h3>Pessoa</h3>
  </div>
  <form method="POST" id="cadastro">
    <div class="form-linha">
      <div class="input" id="nome-input">
        <label for="">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required />
      </div>
      <div class="input" id="data_nascimento-input">
        <label for="">Data de Nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" required />
      </div>
      <div class="input" id="telefone-input">
        <label for="">Telefone:</label>
        <input type="text" name="telefone" id="telefone" placeholder="(00)00000-0000" required />
      </div>
    </div>
    <div class="form-linha">
      <div class="input" id="cpf-input">
        <label for="">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required />
      </div>
      <div class="input" id="rg-input">
        <label for="">RG</label>
        <input type="text" name="rg" id="rg" placeholder="00.000.000-0" required />
      </div>
      <div class="input">
        <label for="">E-mail</label>
        <input type="email" name="email" id="email"  placeholder="email@host.com"/>
      </div>
    </div>
    <div class="form-linha">
      <div class="input" id="via-input">
        <label for="">Via</label>
        <input type="text" name="via" id="via" placeholder="Rua" required />
      </div>
      <div class="input" id="titulo-input">
        <label for="">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo"/>
      </div>
      <input type="hidden" name="logradouro_id" id="logradouro_id">
      <div class="input botao">
        <label for="">Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço" required />
        <div class="pesquisa-botao" id="botao-pesquisa"><i class="fa-solid fa-magnifying-glass"></i></div>
      </div>
      <div class="input" id="numero-input">
        <label for="">N°</label>
        <input type="number" name="numero" id="numero" step="1" min="0" placeholder="000" required />
      </div>
    </div>
    <div class="form-linha">
      <div class="input" id="cep-input">
        <label for="">CEP</label>
        <input type="text" name="cep" id="cep" placeholder="00000-000" required />
      </div>
      <div class="input" id="complemento-input">
        <label for="">Complemento</label>
        <input type="text" name="complemento" id="complemento" placeholder="Complemento"/>
      </div>
    </div>
    <div class="form-linha">
      <div class="input">
        <label for="">Bairro</label>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required />
      </div>
      <div class="input" id="cidade-input">
        <label for="">Cidade</label>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required />
      </div>
      <div class="input" id="estado-input">
        <label for="">Estado</label>
        <input type="text" name="estado" id="estado" placeholder="UF" required />
      </div>
    </div>
  </form>
  <button class="btn-padrao" onclick="realizarCadastro()"><span>Cadastrar</span></button>
</div>

<!-- Modal Pesquisa -->

<dialog class="modal">
  <div class="pesquisa-container">

    <!-- Campo de pesquisa -->

    <div class="input-pesquisa">
      <div class="pesquisa">
        <input type="text" placeholder="Pesquisa" name="pesquisa" id="pesquisa">
        <div class="icone-pesquisa">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
    </div>

    <!-- Lista -->

    <ul class="lista" id="listaDoModal">
    </ul>

  </div>
</dialog>

<!-- Notificações -->

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

<script src="../assets/js/modal-pesquisa-pessoa.js"></script>