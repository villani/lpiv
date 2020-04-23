<?php

require 'classes/autoloader.php';

$id         = $_GET['id'] ?? null;
$noticia    = null;

if (!is_null($id)) {
    $comentario = Comentario::obter($id);
    if ($comentario['usuario_id'] == $_SESSION['usuario']['id']) {
        $noticia = $comentario['noticia_id'];
        Comentario::excluir($comentario['id']);
    }
}

if (is_null($noticia)) {
    $destino = 'LOCATION: index.php';
} else {
    $destino = "LOCATION: noticia-ler.php?id=$noticia";
}

header($destino);