<?php

require_once("../classes/Bairro.php");

$bairro = new Bairro();

$lista = $bairro->listar();

?>

<link rel="stylesheet" href="../assets/css/tabela.css">
<link rel="stylesheet" href="../assets/css/modal.css">
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<div class="container">
  <div class="tabela">

    <!-- Cabeçalho da tabela -->

    <div class="linha header">
      <div class="celula">ID</div>
      <div class="celula">Grupo</div>
      <div class="celula">Bairro</div>
      <div class="celula">Cidade</div>
      <div class="celula">Estado</div>
    </div>

    <!-- Linhas da tabela -->
    <?php foreach ($lista as $linha): ?>
      <div class="linha" id="linha">
        <div class="celula" data-title="ID">
          <?= $linha['bairro_id'] ?>
        </div>
        <div class="celula" data-title="Grupo">
          <?= $linha['grupo'] ?>
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
        <input type="hidden" name="bairro_id" id="bairro_id">
        <div class="form-linha">
          <div class="input" id="grupo-input">
            <label for="">Grupo</label>
            <input type="text" name="grupo" id="grupo" required disabled />
          </div>
          <div class="input">
            <label for="">Bairro</label>
            <input type="text" name="bairro" id="bairro" required disabled />
          </div>
          <div class="input" id="cidade-input">
            <label for="">Cidade</label>
            <input type="text" name="cidade" id="cidade" required disabled />
          </div>
          <div class="input" id="estado-input">
            <label for="">Estado</label>
            <input type="text" name="estado" id="estado" required disabled />
          </div>
        </div>
      </form>
      <div class="botoes">
        <button class="btn-padrao" onclick="realizarCadastro()"><span>Salvar</span></button>
        <button class="btn-padrao" id="alterar"><span>Alterar</span></button>
        <button class="btn-padrao" id="excluir"><a href="excluir/excluir-bairro.php?id=<?= $linha['bairro_id'] ?>">Excluir</a></button>
      </div>
    </div>
  </dialog>
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

<script src="../assets/js/modal.js"></script>
<script src="../assets/js/alterar.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Obtém todas as linhas da tabela
    var linhas = document.querySelectorAll(".linha");

    // Adiciona um ouvinte de evento de clique a cada linha
    linhas.forEach(function (linha) {
      linha.addEventListener("click", function () {
        // Obtém os dados da linha clicada
        var bairroId = linha.querySelector("[data-title='ID']").innerText;
        var grupo = linha.querySelector("[data-title='Grupo']").innerText;
        var bairro = linha.querySelector("[data-title='Bairro']").innerText;
        var cidade = linha.querySelector("[data-title='Cidade']").innerText;
        var estado = linha.querySelector("[data-title='Estado']").innerText;

        // Preenche o formulário no modal com os dados obtidos
        document.getElementById("bairro_id").value = bairroId;
        document.getElementById("grupo").value = grupo;
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

    fetch("./gravar/bairro-atualizar.php", {
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

          // Recarregar a página
          location.reload();
        } else {

          exibirMensagem("erro");

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