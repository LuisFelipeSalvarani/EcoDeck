<?php

require_once('../../classes/Bairro.php');

$id = $_GET['id'];

$bairro = new Bairro($id);

$bairro->excluir();

header('Location: ../dashboard.php?pagina=registros/reg-bairro.php');