const abrirModal = document.querySelectorAll("#botao-pesquisa");
let modal = document.querySelector("dialog.modal");
const listaDoModal = document.getElementById("listaDoModal");
const formulario = document.getElementById("cadastro");
let dados;

abrirModal.forEach(function (elemento) {
  elemento.onclick = function () {
    // Verifique se os inputs não têm o atributo 'disabled'
    const inputsDesabilitados = document.querySelectorAll("input[disabled]");

    if (inputsDesabilitados.length === 0) {
      // Chame uma função que carrega os dados do PHP e preenche a lista
      carregarDadosDoPHP();
      modal.showModal();
    }
  };
});

// Adicione um evento de clique aos itens da lista no modal
listaDoModal.addEventListener("click", function (event) {
  // Verifique se o clique foi em um elemento <li>
  if (event.target.tagName === "LI") {
    // Obtenha o texto do item clicado
    const logradouroSelecionado = event.target.textContent;

    // Encontre o objeto correspondente no JSON
    const logradouroEncontrado = dados.find(
      (item) => item.endereco_completo === logradouroSelecionado
    );

    // Se encontrar o logradouro, preencha o formulário
    if (logradouroEncontrado) {
      preencherFormulario(logradouroEncontrado);
      // Feche o modal após preencher o formulário
      modal.close();
    } else {
      alert("Endereço não encontrado"); // Ou qualquer outra ação desejada
    }
  }
});

// Adicione um evento de digitação ao campo de pesquisa
const campoPesquisa = document.getElementById("pesquisa");
campoPesquisa.addEventListener("keyup", function () {
  // Filtrar a lista com base no texto digitado
  const termoPesquisa = campoPesquisa.value.toLowerCase();
  const itensLista = listaDoModal.getElementsByTagName("li");

  Array.from(itensLista).forEach(function (item) {
    const textoItem = item.textContent.toLowerCase();
    // Ocultar ou exibir o item com base no termo de pesquisa
    item.style.display = textoItem.includes(termoPesquisa) ? "block" : "none";
  });
});


// Adicione um evento de clique ao botão "Fechar" no modal
// fecharModal.onclick = function () {
//   modal.close();
// };

function carregarDadosDoPHP() {
  // Use AJAX para chamar um script PHP que consulta o banco de dados
  // e retorna os dados para preencher a lista
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // A resposta do PHP contém os dados do banco de dados
      dados = JSON.parse(xhr.responseText);

      // Preencha a lista com os dados
      popularLista(dados);
    }
  };

  // Substitua 'seu_script_php.php' pelo caminho do seu script PHP
  xhr.open("GET", "./../dashboard/listar/listar-pessoa-modal.php", true);
  xhr.send();
}

function popularLista(dados) {
  // Limpe a lista antes de popular
  listaDoModal.innerHTML = "";

  // Adicione os itens à lista
  dados.forEach(function (item) {
    const li = document.createElement("li");
    li.textContent = item.endereco_completo;
    listaDoModal.appendChild(li);
  });
}

function preencherFormulario(logradouroEncontrado) {
  // Aqui você deve implementar a lógica para preencher o formulário
  // com base nos dados do bairro encontrado no JSON
  // Exemplo: Suponha que você tenha campos de input com os IDs "bairroInput" e "outrasInformacoesInput"
  document.getElementById("logradouro_id").value =
    logradouroEncontrado.logradouro_id;
  document.getElementById("numero").value = logradouroEncontrado.numero;
  document.getElementById("complemento").value =
    logradouroEncontrado.complemento;
  document.getElementById("via").value = logradouroEncontrado.via;
  document.getElementById("titulo").value = logradouroEncontrado.titulo;
  document.getElementById("endereco").value = logradouroEncontrado.endereco;
  document.getElementById("cep").value = logradouroEncontrado.cep;
  document.getElementById("bairro").value = logradouroEncontrado.bairro;
  document.getElementById("cidade").value = logradouroEncontrado.cidade;
  document.getElementById("estado").value = logradouroEncontrado.estado;
  // ... adicione mais campos conforme necessário
}
