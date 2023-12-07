<?php

require_once('../../classes/Pessoa.php');

$id = $_GET['id'];

$pessoa = new Pessoa($id);

$pessoa->excluir();

header('Location: ../dashboard.php?pagina=registros/reg-pessoa.php');