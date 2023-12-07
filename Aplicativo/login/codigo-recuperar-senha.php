<?php

$id = $_GET['id'];
$codigo = $_GET['codigo'];
(!empty($_GET['erro'])) ? $erro = $_GET['erro'] : $erro = 0;

if ($erro !== 0) {
    echo '<script>alert("código errado");</script>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecodeck</title>

    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/botoes.css">

  </head>
  <body>
    <main>
      <div class="container codigo">
        <form action="nova-senha-recuperar.php" method="post">
          <h1>Recuperar senha</h1>
          <p>Por favor, insira o código enviado para o email cadastrado.</p>
          <input type="hidden" name="pessoa_id" value="<?= $id ?>">
          <input type="hidden" name="codigo_valido" value="<?= $codigo ?>">
          <div class="form-grupo">
            <input
              class="form-input"
              type="text"
              name="codigo"
              id="codigo"
              placeholder="codigo"
              required
            />
            <label for="codigo" class="form-label">Código</label>
          </div>
          <a href="#" class="small">Reenviar</a>
          <button class="btn-padrao reverse">
            <a>Validar</a>
          </button>
        </form>
      </div>
    </main>
  </body>
</html>
