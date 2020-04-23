<?php

require 'classes/autoloader.php';

$id             = $_POST['id'] ?? null;
$usuario_id     = $_POST['usuario_id'] ?? null;
$categoria_id   = $_POST['categoria_id'] ?? null;
$titulo         = $_POST['titulo'] ?? null;
$resumo         = $_POST['resumo'] ?? null;
$figura         = (isset($_FILES['figura']['name']) && $_FILES['figura']['name'] != "")?'imagens/uploaded/' . time() . '-' . $_FILES['figura']['name']:null;
$fonte          = $_POST['fonte'] ?? null;
$conteudo       = $_POST['conteudo'] ?? null;

// UPLOAD DA FIGURA
if (!is_null($figura)) {
    $arquivo_tmp    = $_FILES['figura']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $figura);
}

if (Noticia::validarEdicao($id, $usuario_id, $categoria_id, $titulo, $resumo, $figura, $fonte, $conteudo)) {
    header('LOCATION: noticia.php#existentes');
}
    