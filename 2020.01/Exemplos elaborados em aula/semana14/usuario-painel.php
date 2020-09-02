<?php

// Habilitando o vetor SESSION na página.
session_start();

// Inserindo os controles de sessão
require 'usuario-sessao.php';

// Definindo as ações de autores.
if ($_SESSION['usuario']['nivel'] < 2) {
    $acoes[] = ['nome'=>'Gerenciar notícias', 'link'=>'noticia-gerenciar.php'];
    $acoes[] = ['nome'=>'Gerenciar categorias', 'link'=>'categoria-gerenciar.php'];
}

// Definindo as ações de administradores.
if ($_SESSION['usuario']['nivel'] < 1) {
    $acoes[] = ['nome'=>'Gerenciar usuários', 'link'=>'usuario-gerenciar.php'];
}

// Definindo as ações padrões dos usuários.
$acoes[] = ['nome'=>'Ver perfil', 'link'=>'usuario-editar.php'];
$acoes[] = ['nome'=>'Excluir conta', 'link'=>'usuario-excluir.php'];
$acoes[] = ['nome'=>'Sair', 'link'=>'usuario-sair.php'];

// Exibindo o painel de ações de acordo com o nível de restrição do usuário.
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Portal de Notícias</title>
</head>
<body>
    <h1>Painel do Portal de Notícias</h1>
    <p>Ações do painel</p>
    <ul>
        <?php foreach ($acoes as $acao): ?>
        <li>
            <a href="<?= $acao['link']; ?>"><?= $acao['nome']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>