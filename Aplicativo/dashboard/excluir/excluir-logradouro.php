<?php

require_once('../../classes/Logradouro.php');

$id = $_GET['id'];

$logradouro = new Logradouro($id);

$logradouro->excluir();

header('Location: ../dashboard.php?pagina=registros/reg-endereco.php');