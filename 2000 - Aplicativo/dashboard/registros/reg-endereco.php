<?php

require_once("../classes/Endereco.php");

$endereco = new Endereco();

$lista = $endereco->listar();

?>

<link rel="stylesheet" href="../assets/css/tabela.css">
<link rel="stylesheet" href="../assets/css/modal.css">
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<link rel="stylesheet" href="../assets/css/lista.css">

<div class="container">
  <div class="tabela">

    <!-- Cabeçalho da tabela -->

    <div class="linha header">
      <div class="celula">Código Endereço</div>
      <div class="celula">Grupo</div>
      <div class="celula">Via</div>
      <div class="celula">Titulo</div>
      <div class="celula">Endereço</div>
      <div class="celula">CEP</div>
      <div class="celula">Código Bairro</div>
      <div class="celula">Bairro</div>
      <div class="celula">Cidade</div>
      <div class="celula">Estado</div>
    </div>

    <!-- Linhas da tabela -->
    <?php foreach ($lista as $linha): ?>
      <div class="linha" id="linha">
        <div class="celula" data-title="Código Endereço">
          <?= $linha['endereco_id'] ?>
        </div>
        <div class="celula" data-title="Grupo">
          <?= $linha['grupo'] ?>
        </div>
        <div class="celula" data-title="Via">
          <?= $linha['via'] ?>
        </div>
        <div class="celula" data-title="Titulo">
          <?= $linha['titulo'] ?>
        </div>
        <div class="celula" data-title="Endereço">
          <?= $linha['endereco'] ?>
        </div>
        <div class="celula" data-title="CEP">
          <?= $linha['cep'] ?>
        </div>
        <div class="celula" data-title="Código Bairro">
          <?= $linha['bairro_id'] ?>
        </div>
        <div class="celula" data-title="Bairro">
          <?= $linha['bairro'] ?>
        </div>
        <div class="celula" data-title="Cidade">
          <?= $linha['cidade'] ?>
        </div>
        <div class="celula" data-title="Estado">
          <?= $linha['estado'] ?>
        </div>
      </div>
    <?php endforeach; ?>

  </div>

  <dialog>
    <span class="fechar"><i class="fa-solid fa-circle-xmark"></i></span>
    <div class="container">
      <form method="post" id="cadastro">
        <input type="hidden" name="endereco_id" id="endereco_id">
        <div class="form-linha">
          <div class="input" id="grupo-input">
            <label for="">Grupo</label>
            <input type="text" name="grupo" id="grupo" value="" placeholder="00" required disabled />
          </div>
          <div class="input" id="via-input">
            <label for="">Via</label>
            <input type="text" name="via" id="via" placeholder="Rua" required disabled />
          </div>
          <div class="input" id="titulo-input">
            <label for="">Titulo</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo" disabled />
          </div>
          <div class="input">
            <label for="">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Endereço" required disabled />
          </div>
        </div>
        <div class="form-linha">
          <input type="hidden" name="bairro_id" id="bairro_id">
          <div class="input" id="cep-input">
            <label for="">CEP</label>
            <input type="text" name="cep" id="cep" value="" placeholder="00000-000" required disabled />
          </div>
          <div class="input botao">
            <label for="">Bairro</label>
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required disabled />
            <div class="pesquisa-botao" id="botao-pesquisa"><i class="fa-solid fa-magnifying-glass"></i></div>
          </div>
          <div class="input" id="cidade-input">
            <label for="">Cidade</label>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade" required disabled />
          </div>
          <div class="input" id="estado-input">
            <label for="">Estado</label>
            <input type="text" name="estado" id="estado" placeholder="UF" required disabled />
          </div>
        </div>
      </form>
      <div class="botoes">
        <button class="btn-padrao" onclick="realizarCadastro()"><span>Salvar</span></button>
        <button class="btn-padrao" id="alterar"><span>Alterar</span></button>
      </div>
    </div>
  </dialog>
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

<!-- Noticações -->

<div class="notificacao sucesso" id="sucesso">
  <div class="notificacao-corpo">
    <i class="fa-regular fa-circle-check notificacao-icone"></i>
    Atualizado com sucesso
  </div>
  <div class="notificacao-progresso"></div>
</div>
<div class="notificacao erro" id="erro">
  <div class="notificacao-corpo">
    <i class="fa-regular fa-circle-xmark notificacao-icone"></i>
    Erro ao atualizar
  </div>
  <div class="notificacao-progresso"></div>
</div>

<!-- JavaScript -->

<script src="../assets/js/modal.js"></script>
<script src="../assets/js/alterar.js"></script>
<script src="../assets/js/modal-pesquisa.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Obtém todas as linhas da tabela
    var linhas = document.querySelectorAll(".linha");

    // Adiciona um ouvinte de evento de clique a cada linha
    linhas.forEach(function (linha) {
      linha.addEventListener("click", function () {
        // Obtém os dados da linha clicada
        var enderecoId = linha.querySelector("[data-title='Código Endereço']").innerText;
        var grupo = linha.querySelector("[data-title='Grupo']").innerText;
        var via = linha.querySelector("[data-title='Via']").innerText;
        var titulo = linha.querySelector("[data-title='Titulo']").innerText;
        var endereco = linha.querySelector("[data-title='Endereço']").innerText;
        var cep = linha.querySelector("[data-title='CEP']").innerText;
        var bairroId = linha.querySelector("[data-title='Código Bairro']").innerText;
        var bairro = linha.querySelector("[data-title='Bairro']").innerText;
        var cidade = linha.querySelector("[data-title='Cidade']").innerText;
        var estado = linha.querySelector("[data-title='Estado']").innerText;

        // Preenche o formulário no modal com os dados obtidos
        document.getElementById("endereco_id").value = enderecoId;
        document.getElementById("grupo").value = grupo;
        document.getElementById("via").value = via;
        document.getElementById("titulo").value = titulo;
        document.getElementById("endereco").value = endereco;
        document.getElementById("cep").value = cep;
        document.getElementById("bairro_id").value = bairroId;
        document.getElementById("bairro").value = bairro;
        document.getElementById("cidade").value = cidade;
        document.getElementById("estado").value = estado;
      });
    });
  });
</script>

<script>
  function realizarCadastro() {
    var formulario = document.getElementById("cadastro");

    // Adicionando a validação dos campos
    if (!validaCampos("cadastro")) {
      return; // Impede a execução do restante do código se a validação falhar
    }

    var dadosFormulario = new FormData(formulario);

    fetch("./gravar/endereco-atualizar.php", {
      method: "POST",
      body: dadosFormulario,
    })
      .then(response => response.text())
      .then(resposta => {
        if (resposta.trim() === "sucesso") {
          exibirMensagem("sucesso");

          // Fechar o modal
          var dialog = document.querySelector('dialog');
          dialog.close();

          // Recarregar a página depois de 3 segundos
          setTimeout(function () {
            location.reload();
          }, 3000);
        } else {

          exibirMensagem("erro");

          alert(resposta)

        }
      })
      .catch(() => {
        exibirMensagem("erro");
      });
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