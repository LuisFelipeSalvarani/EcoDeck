<?php

(!empty($_GET['erro'])) ? $erro = $_GET['erro'] : $erro = 0;

if ($erro !== 0) {
    echo '<script>alert("CPF não encontrado");</script>';
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
        <form action="./recuperar-senha-email.php" method="post">
          <h1>Recuperar Senha</h1>
          <p>Por favor, insira seu CPF.</p>
          <div class="form-grupo">
            <input
              class="form-input"
              type="text"
              name="cpf"
              id="cpf"
              placeholder="cpf"
              required
            />
            <label for="cpf" class="form-label">CPF</label>
          </div>
          <button class="btn-padrao reverse">
            <a>Validar</a>
          </button>
        </form>
      </div>
    </main>
  </body>
</html>
