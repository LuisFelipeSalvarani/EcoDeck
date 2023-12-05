<link rel="stylesheet" href="../assets/css/cadastro.css" />
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<link rel="stylesheet" href="../assets/css/lista.css">
<div class="container">
  <div class="text">
    <h2>Cadastro</h2>
    <h3>Logradouro</h3>
  </div>
  <form action="" method="post" id="cadastro">
    <div class="form-linha">
      <div class="input" id="grupo-input">
        <label for="">Grupo</label>
        <input type="text" name="grupo" id="grupo" value="" placeholder="00" required />
      </div>
      <div class="input" id="via-input">
        <label for="">Via</label>
        <input type="text" name="via " id="via" placeholder="Rua" required />
      </div>
      <div class="input" id="titulo-input">
        <label for="">Titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" />
      </div>
      <input type="hidden" name="endereco_id" id="endereco_id">
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
      <div class="input" id="complemento-input">
        <label for="">Complemento</label>
        <input type="text" name="complemento" id="complemento" placeholder="Complemento"/>
      </div>
      <div class="input" id="cep-input">
        <label for="">CEP</label>
        <input type="text" name="cep" id="cep" value="" placeholder="00000-000" required />
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
    <div class="form-linha">
      <div class="input">
        <label for="">Inscrição Municipal</label>
        <input type="text" name="inscricao" id="inscricao" placeholder="000.000.0000.000" required />
      </div>
      <div class="input">
        <label for="">Matricula</label>
        <input type="text" name="matricula" id="matricula" placeholder="00.000.000" required />
      </div>
    </div>
    <div class="form-linha">
      <div class="input">
        <label for="">Ligação de Água</label>
        <input type="text" name="lig_agua" id="lig_agua" placeholder="000000" required />
      </div>
      <div class="input">
        <label for="">Ligação de Energia</label>
        <input type="text" name="lig_energia" id="lig_energia" placeholder="00.000.000" required />
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

<!-- JavaScript -->

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
          } else {
            exibirMensagem("erro");
          }
        } else {
          exibirMensagem("erro");
        }
      }
    };

    xhttp.open("POST", "./gravar/logradouro-gravar.php", true);
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

<script src="../assets/js/modal-pesquisa-lougradouro.js"></script>