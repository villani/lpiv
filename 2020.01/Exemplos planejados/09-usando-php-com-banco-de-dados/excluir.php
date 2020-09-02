<?php

require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!is_null($id)) {
    $sql = $conexao->prepare('DELETE FROM candidatos '
            . 'WHERE rowid=:id');
    $sql->bindParam(':id', $id);
    if ($sql->execute()) {
        header('LOCATION: listar.php');
    } else {
        echo 'Falha ao excluir registro!';
    }
}

