function obterUrlAtual() {
    return window.location.hash.slice(1).replace(/%2F/g, '/'); // Remove o caractere '#' da frente e substitui %2F por /
  }

  function atualizarUrlComConteudo(href) {
    // Substitui caracteres especiais por hifens e remove extensões
    var rotaLimpa = href.replace(/\//g, '/').replace(/\..+$/, ''); // Remove a extensão do arquivo

    // Atualiza a URL no histórico sem recarregar a página
    window.history.replaceState({ path: rotaLimpa }, "", '#' + rotaLimpa);

    // Carrega o conteúdo sem recarregar a página
    carregarConteudo(href);
  }

  function carregarConteudo(href) {
    // Adiciona .php se não houver extensão na URL
    var rotaOriginal = href.includes('.') ? href : href + '.php';

    // Usa Fetch para buscar o conteúdo da página externa
    fetch(rotaOriginal)
      .then(response => response.text())
      .then(data => {
        // Atualiza o conteúdo da parte desejada da página
        document.getElementById("main-content").innerHTML = data;
      })
      .catch(error => console.error('Erro ao carregar conteúdo:', error));
  }

  document.addEventListener("DOMContentLoaded", function () {
    // Adiciona um listener de clique para todos os links dentro da classe "sidebar-interna"
    var linksSidebarInterna = document.querySelectorAll(".sidebar-interna a");
    linksSidebarInterna.forEach(function (link) {
      link.addEventListener("click", function (event) {
        event.preventDefault(); // Impede o comportamento padrão do clique no link

        var href = this.getAttribute("href"); // Obtém o valor do atributo href do link
        atualizarUrlComConteudo(href); // Atualiza a URL e carrega o conteúdo
      });
    });

    // Verifica se há uma rota no carregamento inicial
    var rotaInicial = obterUrlAtual();
    if (rotaInicial) {
      carregarConteudo(rotaInicial);
    }
  });

  // Adiciona um listener para eventos de mudança de hash
  window.addEventListener('hashchange', function () {
    var novaRota = obterUrlAtual();
    carregarConteudo(novaRota);
  });