<?php

require 'classes/autoloader.php';

$id = $_GET['id'] ?? null;

if (!is_null($id)) {
    if ($_SESSION['usuario']['nivel'] == 0) {
        $usuario = Usuario::obter($id);
        if ($usuario['nivel'] == 2) {
            Usuario::alterar(['nivel'=>1], $id);
        } else {
            Usuario::alterar(['nivel'=>2], $id);
        }
        $destino = 'LOCATION: usuario.php';
    }
} else {
    $destino = 'LOCATION: index.php';
}

header($destino);