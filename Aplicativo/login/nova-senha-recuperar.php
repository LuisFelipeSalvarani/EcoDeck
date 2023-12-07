<?php

$id = $_POST['pessoa_id'];
$codigo = $_POST['codigo'];
$codigo_valido = $_POST['codigo_valido'];

if ($codigo_valido !== $codigo) {
    header("Location: codigo-senha.php?id={$id}&codigo={$codigo_valido}&erro=1");
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
        <form action="cadastrar-senha.php" method="post">
          <h1>Nova Senha</h1>
          <p>Por favor, insira a nova senha e confirme.</p>
          <input type="hidden" name="pessoa_id" value="<?= $id ?>">
          <div class="form-grupo">
            <input
              class="form-input"
              type="password"
              name="senha"
              id="senha"
              placeholder="senha"
              required
            />
            <label for="codigo" class="form-label">Senha</label>
          </div>
          <div class="form-grupo">
            <input
              class="form-input"
              type="password"
              name="confirmar_senha"
              id="confirmar_senha"
              placeholder="Confirme a senha"
              required
            />
            <label for="codigo" class="form-label">Confirmar</label>
          </div>
          <button class="btn-padrao reverse">
            <a>Cadastrar</a>
          </button>
        </form>
      </div>
    </main>

    <script src="../assets/js/conferir-senha.js"></script>
  </body>
</html>
