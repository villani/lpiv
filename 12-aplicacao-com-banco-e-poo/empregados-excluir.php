<?php

require 'Banco.php';
require 'Tabela.php';

$rowid = $_GET['rowid'] ?? null;

if (!is_null($rowid)) {
    $empregados = new Tabela('empregados');
    $empregados->excluir($rowid);
}

header('LOCATION: index.php');

