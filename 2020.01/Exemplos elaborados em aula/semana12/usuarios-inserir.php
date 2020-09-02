<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo os novos valores de um registro.
$usuario = [
    'nome'  => $_POST['nome'] ?? null,
    'email' => $_POST['email'] ?? null,
    'senha' => sha1($_POST['senha']) ?? null, // 'sha1' - criptografa a string informada.
    'nivel' => $_POST['nivel'] ?? null
];

if (!is_null($usuario['nome'])) {
    // Definindo a instrução de SQL INSERT.
    $insert = "INSERT INTO usuarios(nome,email,senha,nivel) VALUES (:nome,:email,:senha,:nivel)";

    // 'prepare' - Definido o comando que será enviado ao banco.
    $comando = $conexao->prepare($insert);

    // 'bindParam' - Preenchendo os parâmetros dessa instrução (Prevenção contra 'injeção de SQL').
    $comando->bindParam(':nome', $usuario['nome']);
    $comando->bindParam(':email', $usuario['email']);
    $comando->bindParam(':senha', $usuario['senha']);
    $comando->bindParam(':nivel', $usuario['nivel']);

    // 'execute' - Executando a instrução SQL e obtendo a quantidade de linha afetadas.
    $linhas = $comando->execute();

    if ($linhas === true) {

        // Redirecionar para a página 'usuarios-listar.php'
        header('LOCATION: usuarios-listar.php');
    } else {
        print 'Falha ao inserir registro.';
    }
}