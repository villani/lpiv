<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo instrução SQL SELECT.
$select = "SELECT * FROM usuarios";

// 'query' - Enviando instrução SQL ao banco. Retorna um 'PDOStatement'
$comando = $conexao->query($select);

// 'fetchAll' - Obtendo os registros da resposta fornecida. Retorna um 'array'
$usuarios = $comando->fetchAll();

// Exibindo o conteúdo do 'array' retornado.
//var_dump($usuarios);

// Exibindo todos os registros
print "ID;NOME;SENHA<br>\n";
foreach ($usuarios as $usuario) {
    print $usuario['id'] . ";" . $usuario['nome'] . ";" . $usuario['senha'] . "<br>\n";
}