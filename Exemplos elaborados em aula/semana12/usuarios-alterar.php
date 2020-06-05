<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo dados que serão alterados.
$usuario = [
    'id'    => $_POST['id'] ?? null,
    'nome'  => $_POST['nome'] ?? null,
    'email' => $_POST['email'] ?? null,
    'senha' => sha1($_POST['senha']) ?? null,
    'nivel' => $_POST['nivel'] ?? null,
];

if (!is_null($usuario['nome'])) {

    // Definindo instrução de SQL UPDATE.
    $update = 'UPDATE usuarios SET nome=:nome,email=:email,senha=:senha,nivel=:nivel WHERE id=:id';

    // Definindo comando para encapsular a instrução SQL.
    $comando = $conexao->prepare($update);

    // Preenchendo os parâmetros da instrução.
    $comando->bindParam(':nome', $usuario['nome']);
    $comando->bindParam(':email', $usuario['email']);
    $comando->bindParam(':senha', $usuario['senha']);
    $comando->bindParam(':nivel', $usuario['nivel']);
    $comando->bindParam(':id', $usuario['id']);

    // Executando a instrução e obtendo 'true' se a instrução pôde ser executada.
    $linhas = $comando->execute();

    if ($linhas === true) {
        header('LOCATION: usuarios-listar.php');        
    } else {
        print 'Falha ao alterar registro.';
    }
}

