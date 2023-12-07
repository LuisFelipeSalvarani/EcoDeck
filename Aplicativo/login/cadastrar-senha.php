<?php

require_once('../classes/Pessoa.php');

$id = $_POST['pessoa_id'];

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$pessoa = new Pessoa($id);

$pessoa->senha = $senha;

$pessoa->atualizarSenha();

header('Location: ./login.html');