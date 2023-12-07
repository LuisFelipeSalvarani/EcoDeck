<?php

require_once("../classes/Pessoa.php");

$pessoa = new Pessoa();

$lista = $pessoa->listar();

?>

<link rel="stylesheet" href="../assets/css/tabela.css">
<link rel="stylesheet" href="../assets/css/modal.css">
<link rel="stylesheet" href="../assets/css/notificacao.css" />
<link rel="stylesheet" href="../assets/css/lista.css">

<div class="container">
  <div class="tabela">

    <!-- Cabeçalho da tabela -->

    <div class="linha header">
      <div class="celula">Código Pessoa</div>
      <div class="celula">Nome</div>
      <div class="celula">Data de Nascimento</div>
      <div class="celula">E-mail</div>
      <div class="celula">CPF</div>
      <div class="celula">RG</div>
      <div class="celula">Telefone</div>
      <div class="celula">Código Logradouro</div>
      <div class="celula">Via</div>
      <div class="celula">Titulo</div>
      <div class="celula">Endereço</div>
      <div class="celula">Numero</div>
      <div class="celula">Complemento</div>
      <div class="celula">CEP</div>
      <div class="celula">Bairro</div>
      <div class="celula">Cidade</div>
      <div class="celula">Estado</div>
      <div class="celula">Inscrição</div>
      <div class="celula">Matricula</div>
      <div class="celula">Ligação de Água</div>
      <div class="celula">Ligação de Energia</div>
    </div>

    <!-- Linhas da tabela -->

    <?php foreach ($lista as $linha): ?>
      <div class="linha" id="linha">
        <div class="celula" data-title="Código Pessoa">
          <?= $linha['pessoa_id'] ?>
        </div>
        <div class="celula" data-title="Nome">
          <?= $linha['nome'] ?>
        </div>
        <div class="celula" data-title="Data de Nascimento">
          <?= $linha['data_nascimento'] ?>
        </div>
        <div class="celula" data-title="E-mail">
          <?= $linha['email'] ?>
        </div>
        <div class="celula" data-title="CPF">
          <?= $linha['cpf'] ?>
        </div>
        <div class="celula" data-title="RG">
          <?= $linha['rg'] ?>
        </div>
        <div class="celula" data-title="Telefone">
          <?= $linha['telefone'] ?>
        </div>
        <div class="celula" data-title="Código Logradouro">
          <?= $linha['logradouro_id'] ?>
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
        <div class="celula" data-title="Numero">
          <?= $linha['numero'] ?>
        </div>
        <div class="celula" data-title="Complemento">
          <?= $linha['complemento'] ?>
        </div>
        <div class="celula" data-title="CEP">
          <?= $linha['cep'] ?>
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
        <div class="celula" data-title="Inscrição">
          <?= $linha['inscricao'] ?>
        </div>
        <div class="celula" data-title="Matricula">
          <?= $linha['matricula'] ?>
        </div>
        <div class="celula" data-title="Ligação de Água">
          <?= $linha['lig_agua'] ?>
        </div>
        <div class="celula" data-title="Ligação de Energia">
          <?= $linha['lig_energia'] ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <dialog>
    <span class="fechar"><i class="fa-solid fa-circle-xmark"></i></span>
    <div class="container">
      <form action="" method="post" id="cadastro">
        <input type="hidden" name="pessoa_id" id="pessoa_id">
        <div class="form-linha">
          <div class="input" id="nome-input">
            <label for="">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome Completo" required disabled />
          </div>
          <div class="input" id="data_nascimento-input">
            <label for="">Data de Nascimento</label>
            <input type="text" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" required disabled />
          </div>
          <div class="input" id="telefone-input">
            <label for="">Telefone:</label>
            <input type="text" name="telefone" id="telefone" placeholder="(00)00000-0000" required disabled />
          </div>
        </div>
        <div class="form-linha">
          <div class="input" id="cpf-input">
            <label for="">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required disabled />
          </div>
          <div class="input" id="rg-input">
            <label for="">RG</label>
            <input type="text" name="rg" id="rg" placeholder="00.000.000-0" required disabled />
          </div>
          <div class="input">
            <label for="">E-mail</label>
            <input type="email" name="email" id="email" placeholder="email@host.com" disabled />
          </div>
        </div>
        <div class="form-linha">
          <div class="input" id="via-input">
            <label for="">Via</label>
            <input type="text" name="via" id="via" placeholder="Rua" required disabled />
          </div>
          <div class="input" id="titulo-input">
            <label for="">Titulo</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo" disabled />
          </div>
          <input type="hidden" name="logradouro_id" id="logradouro_id">
          <div class="input botao">
            <label for="">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Endereço" required disabled />
            <div class="pesquisa-botao" id="botao-pesquisa"><i class="fa-solid fa-magnifying-glass"></i></div>
          </div>
          <div class="input" id="numero-input">
            <label for="">N°</label>
            <input type="number" name="numero" id="numero" step="1" min="0" placeholder="000" required disabled />
          </div>
        </div>
        <div class="form-linha">
          <div class="input" id="cep-input">
            <label for="">CEP</label>
            <input type="text" name="cep" id="cep" placeholder="00000-000" required disabled />
          </div>
          <div class="input" id="complemento-input">
            <label for="">Complemento</label>
            <input type="text" name="complemento" id="complemento" placeholder="Complemento" disabled />
          </div>
        </div>
        <div class="form-linha">
          <div class="input">
            <label for="">Bairro</label>
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required disabled />
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
        <button class="btn-padrao" id="excluir"><a href="excluir/excluir-pessoa.php?id=<?= $linha['pessoa_id'] ?>">Excluir</a></button>
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

<script src="../assets/js/modal.js"></script>
<script src="../assets/js/alterar.js"></script>
<script src="../assets/js/modal-pesquisa-pessoa.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Obtém todas as linhas da tabela
    var linhas = document.querySelectorAll(".linha");

    // Adiciona um ouvinte de evento de clique a cada linha
    linhas.forEach(function (linha) {
      linha.addEventListener("click", function () {
        // Obtém os dados da linha clicada
        var pessoaId = linha.querySelector("[data-title='Código Pessoa']").innerText;
        var nome = linha.querySelector("[data-title='Nome']").innerText;
        var dataNascimento = linha.querySelector("[data-title='Data de Nascimento']").innerText;
        var email = linha.querySelector("[data-title='E-mail']").innerText;
        var cpf = linha.querySelector("[data-title='CPF']").innerText;
        var rg = linha.querySelector("[data-title='RG']").innerText;
        var telefone = linha.querySelector("[data-title='Telefone']").innerText;
        var logradouroId = linha.querySelector("[data-title='Código Logradouro']").innerText;
        var via = linha.querySelector("[data-title='Via']").innerText;
        var titulo = linha.querySelector("[data-title='Titulo']").innerText;
        var endereco = linha.querySelector("[data-title='Endereço']").innerText;
        var numero = linha.querySelector("[data-title='Numero']").innerText;
        var complemento = linha.querySelector("[data-title='Complemento']").innerText;
        var cep = linha.querySelector("[data-title='CEP']").innerText;
        var bairro = linha.querySelector("[data-title='Bairro']").innerText;
        var cidade = linha.querySelector("[data-title='Cidade']").innerText;
        var estado = linha.querySelector("[data-title='Estado']").innerText;

        // Preenche o formulário no modal com os dados obtidos
        document.getElementById("pessoa_id").value = pessoaId;
        document.getElementById("nome").value = nome;
        document.getElementById("data_nascimento").value = dataNascimento;
        document.getElementById("email").value = email;
        document.getElementById("cpf").value = cpf;
        document.getElementById("rg").value = rg;
        document.getElementById("telefone").value = telefone;
        document.getElementById("logradouro_id").value = logradouroId;
        document.getElementById("via").value = via;
        document.getElementById("titulo").value = titulo;
        document.getElementById("endereco").value = endereco;
        document.getElementById("numero").value = numero;
        document.getElementById("complemento").value = complemento;
        document.getElementById("cep").value = cep;
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

    fetch("./gravar/pessoa-atualizar.php", {
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

          alert(resposta);

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