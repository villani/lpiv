<?php

require 'classes/autoloader.php';

$id = $_POST['id'] ?? null;

if (!is_null($id)) {
    $categorias = Categoria::obterUsadas();
    $categoria = array_search($id, array_column($categorias, 'id'));
    if ($categoria === false) {
        Categoria::excluir($id);        
    } else {
        $_SESSION['erro'] = 'A categoria <b>' . $categorias[$categoria]['nome'] . '</b> está sendo usada por um notícia.';
    }
}
header('LOCATION: categoria.php');