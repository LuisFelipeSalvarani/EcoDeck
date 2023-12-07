<?php

require_once('../../classes/Endereco.php');

$id = $_GET['id'];

$endereco = new Endereco($id);

$endereco->excluir();

header('Location: ../dashboard.php?pagina=registros/reg-endereco.php');