const abrirModal = document.querySelectorAll("#botao-pesquisa");
let modal = document.querySelector("dialog.modal");
const fecharModal = document.querySelector("dialog .fechar");
const listaDoModal = document.getElementById("listaDoModal");
const formulario = document.getElementById("cadastro");
let dados;

abrirModal.forEach(function (elemento) {
  elemento.onclick = function () {
    // Chame uma função que carrega os dados do PHP e preenche a lista
    carregarDadosDoPHP();
    
    modal.showModal();
  };
});

// Adicione um evento de clique aos itens da lista no modal
listaDoModal.addEventListener("click", function (event) {
  // Verifique se o clique foi em um elemento <li>
  if (event.target.tagName === "LI") {
    // Obtenha o texto do item clicado
    const enderecoSelecionado = event.target.textContent;

    // Encontre o objeto correspondente no JSON
    const enderecoEncontrado = dados.find(item => item.endereco === enderecoSelecionado);

    // Se encontrar o bairro, preencha o formulário
    if (enderecoEncontrado) {
      preencherFormulario(enderecoEncontrado);
      // Feche o modal após preencher o formulário
      modal.close();
    } else {
      alert("Endereço não encontrado"); // Ou qualquer outra ação desejada
    }
  }
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
  xhr.open("GET", "./../dashboard/listar/listar-endereco-modal.php", true);
  xhr.send();
}

function popularLista(dados) {
  // Limpe a lista antes de popular
  listaDoModal.innerHTML = "";
  
  // Adicione os itens à lista
  dados.forEach(function (item) {
    const li = document.createElement("li");
    li.textContent = item.endereco;
    listaDoModal.appendChild(li);
  });
}

function preencherFormulario(enderecoEncontrado) {
  // Aqui você deve implementar a lógica para preencher o formulário
  // com base nos dados do bairro encontrado no JSON
  // Exemplo: Suponha que você tenha campos de input com os IDs "bairroInput" e "outrasInformacoesInput"
  document.getElementById("via").value = enderecoEncontrado.via;
  document.getElementById("titulo").value = enderecoEncontrado.titulo;
  document.getElementById("endereco").value = enderecoEncontrado.endereco;
  document.getElementById("cep").value = enderecoEncontrado.cep;
  document.getElementById("grupo").value = enderecoEncontrado.grupo;
  document.getElementById("bairro").value = enderecoEncontrado.bairro;
  document.getElementById("cidade").value = enderecoEncontrado.cidade;
  document.getElementById("estado").value = enderecoEncontrado.estado;
  document.getElementById("endereco_id").value = enderecoEncontrado.endereco_id;
  // ... adicione mais campos conforme necessário
}
