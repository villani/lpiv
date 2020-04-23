<?php

require 'classes/autoloader.php';

$id     = $_POST['id'] ?? null;

if (!is_null($id)) {
    Noticia::excluir($id);
}

header('LOCATION: noticia.php#existentes');