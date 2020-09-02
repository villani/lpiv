<?php

$pagina = $_GET['pag'] ?? null;

switch ($pagina) {
    case 'contato':
        print "<h1>Página de contatos</h1>";
        break;

    case 'sobre':
        print "<h1>Página Sobre nós</h1>";
        break;

    case 'servicos':
        print "<h1>Página de Serviços</h1>";
        break;

    default:
        print "<h1>Página de inicial</h1>";
        break;
}
