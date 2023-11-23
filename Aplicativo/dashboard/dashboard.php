<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoDeck</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css" />
  <link rel="stylesheet" href="../assets/css/botoes.css" />
</head>

<body>
  <!-- Sidebar -->

  <aside class="sidebar">
    <header>EcoDeck</header>
    <nav class="sidebar-nav">
      <ul>
        <li>
          <a href="#">
            <i class="fa-regular fa-rectangle-list"></i> <span>Registros</span>
          </a>
          <ul class="sidebar-interna">
            <li>
              <a href="./dashboard.php?pagina=registros/reg-pessoa.php"><i class="fa-solid fa-user"></i>Pessoas</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=registros/reg-logradouro.php"><i class="fa-solid fa-house-chimney"></i>Logradouro</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=registros/reg-rua.php"><i class="fa-solid fa-road"></i>Rua</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=registros/reg-bairro.php"><i class="fa-solid fa-tree-city"></i>Bairro</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-pen-to-square"></i> <span>Cadastro</span>
          </a>
          <ul class="sidebar-interna">
            <li>
              <a id="link" href="./dashboard.php?pagina=cadastro/cad-pessoa.php"><i class="fa-solid fa-user"></i>Pessoas</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=cadastro/cad-logradouro.php"><i class="fa-solid fa-house-chimney"></i>Logradouro</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=cadastro/cad-rua.php"><i class="fa-solid fa-road"></i>Rua</a>
            </li>
            <li>
              <a href="./dashboard.php?pagina=cadastro/cad-bairro.php"><i class="fa-solid fa-tree-city"></i>Bairro</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-chart-line"></i> <span>Gráficos</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Main -->

  <main id="main-content">
    <?php
    if (isset($_GET['pagina'])) {
      $pagina = $_GET['pagina'];

      if (file_exists($pagina)) {
        include($pagina);
      } else {
        echo "<p>Página não encontrada.</p>";
      }
    } else {
      include("inicio.php");
    }
    ?>
  </main>

  <!-- Links JavaScript -->

  <script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../assets/js/fill.js"></script>
</body>

</html>