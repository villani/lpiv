<?php

$pagina = $_GET['pag'] ?? null;

switch ($pagina) {
    case 'sobre':
        include 'sobre.php';
        break;

    case 'servicos':
        include 'servicos.php';
        break;

    case 'contato':
        include 'contato.php';
        break;

    default:
        include 'default.php';
        break;
}
