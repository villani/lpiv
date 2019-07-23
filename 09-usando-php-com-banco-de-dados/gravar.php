<?php

require 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$partido = $_POST['partido'];

if ($id == "") { // INSERÇÃO DE REGISTRO
    $sql = $conexao->prepare('INSERT INTO candidatos '
            . 'VALUES (:nome, :partido)');
} else { // ALTERAÇÃO DE REGISTRO
    $sql = $conexao->prepare('UPDATE candidatos '
            . 'SET nome=:nome, partido=:partido '
            . 'WHERE rowid=:id');
    $sql->bindParam(':id', $id);
}

$sql->bindParam(':nome', $nome);
$sql->bindParam(':partido', $partido);

if ($sql->execute()) {
    header('LOCATION: listar.php');
} else {
    echo 'Falha ao gravar os dados do candidato!';
}