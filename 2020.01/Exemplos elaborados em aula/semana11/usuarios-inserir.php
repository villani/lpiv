<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo os novos valores de um registro.
$usuario = [
    'nome' => 'Bolsonaro',
    'email' => 'bolso@gmail.com',
    'senha' => sha1('123'), // 'sha1' - criptografa a string informada.
    'nivel' => 1
];

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

print "Linhas inseridas: $linhas <br>\n";