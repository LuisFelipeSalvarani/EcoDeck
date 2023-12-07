<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoDesck</title>
</head>

<body>
    <?php
    if (isset($_GET['login_failed']) && $_GET['login_failed'] === 'true') {
        echo '<script>alert("Usuário ou senha incorretos. Tente novamente.");</script>';
    }
    ?>
    <form action="./login-adm/adm-login.php" method="post">
        <input type="text" name="usuario" id="usuario">
        <input type="password" name="senha" id="senha">
        <button type="submit">entrar</button>
    </form>
</body>

</html>