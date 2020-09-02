<?php

require 'Carro.php';
require 'Fiat.php';

$carro = new Carro('Opala');
$carro2 = new Carro('Diplomata', 4.1);
$carro = new Carro('Comodoro', 4.1, 1970);

$carro3 = new Fiat('Palio');

print "Criei um $carro3->modelo. <br>";

$carro->turbinar(0.3);

print "Um carro $carro->modelo foi criado! <br>";
print "Ele tem um motor $carro->motor.<br>";
print "Foram instanciados " . Carro::$qtdeCarros . " carros. <br>";
print "$carro->modelo: " . $carro::$qtdeCarros . " carros. <br>";
print "$carro2->modelo: " . $carro2::$qtdeCarros . " carros. <br>";

