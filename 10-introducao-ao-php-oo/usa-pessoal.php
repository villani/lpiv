<?php

require './Pessoa.php';

$obj = new Pessoa();
$obj = new Pessoa('Obama');
$obj = new Pessoa('Bush', 82);

$obj->nome = 'Trump';
//$obj->fazerAniversario(78);
$obj->crescer(1.65);

print "O objeto $obj->nome tem $obj->idade anos!";

