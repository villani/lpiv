<?php

require 'classes/autoloader.php';

$id = $_GET['id'] ?? null;

if (!is_null($id) && $_SESSION['usuario']['id'] == $id) {
    $categorias = Categoria::obterDoUsuario($id);    
    $noticias = Noticia::obterDoUsuario($id);
    if (count($categorias) || count($noticias)) {
        $_SESSION['erro'] = 'Seu usuário não pode ser excluído enquanto houver <b>notícias</b> ou <b>categorias</b> associadas a ele.';
        $destino = 'LOCATION: conta-editar.php';
    } else {
        Usuario::excluir($id);
        unset($_SESSION['usuario']);
        $destino = 'LOCATION: index.php';
    }
    
}
header($destino);