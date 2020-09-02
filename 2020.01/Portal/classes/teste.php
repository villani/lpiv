<?php

require 'Conexao.php';
require 'Crud.php';
require 'RegistroInterface.php';
require 'Usuario.php';

/*
Usuario::inserir([4, 'Lula', 'lula@pt.com.br', '123', 2]);

Usuario::alterar(['email'=>'dilma@pt.com.br'], 3);

Usuario::excluir(2);

$registros = Usuario::obterTodos();

foreach ($registros as $registro) {
    foreach ($registro as $campo => $valor) {
        print strtoupper($campo) . ": $valor \n";
    }
    print "\n\n";
}
*/

$obj = new Conexao;
$obj->getPDO();


