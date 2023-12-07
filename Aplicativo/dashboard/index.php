<?php
if (isset($_GET['login_failed']) && $_GET['login_failed'] === 'true') {
    echo '<script>alert("Usuário ou senha incorretos. Tente novamente.");</script>';
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
            <form action="login-adm/adm-login.php" method="post">
                <h1>ADM</h1>
                <div class="form-grupo">
                    <input class="form-input" type="text" name="usuario" id="usuario" placeholder="usuario" required />
                    <label for="usuario" class="form-label">Usuario</label>
                </div>
                <div class="form-grupo">
                    <input class="form-input" type="password" name="senha" id="senha" placeholder="senha" required />
                    <label for="senha" class="form-label">Senha</label>
                </div>
                <button class="btn-padrao reverse">
                    <a href="">Entrar</a>
                </button>
            </form>
        </div>
    </main>
</body>

</html>