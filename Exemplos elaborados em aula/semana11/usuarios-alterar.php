<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo dados que serão alterados.
$usuario = [
    'nome' => 'Lula',
    'senha' => sha1('000')
];

// Definindo instrução de SQL UPDATE.
$update = 'UPDATE usuarios SET nome=:nome,senha=:senha WHERE nome=:criterio';

// Definindo comando para encapsular a instrução SQL.
$comando = $conexao->prepare($update);

// Preenchendo os parâmetros da instrução.
$comando->bindParam(':nome', $usuario['nome']);
$comando->bindParam(':senha', $usuario['senha']);
$comando->bindValue(':criterio', 'Bolsonaro');

// Executando a instrução e obtendo '1' se a instrução pôde ser executada.
$linhas = $comando->execute();
print "Linhas alteradas: $linhas<br>\n";
