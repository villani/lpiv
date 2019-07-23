<?php
require 'autoloader.php';
$politico = new Politico();
$politico->nome = 'Bolsonaro';
$politico->partido = 'PSL';
$politico->anoInicio = 2019;
$politico->anoTermino = 2022;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SEMANA 16 - Página inicial</title>
    </head>
    <body>
        <h1>SEMANA 16 - Página inicial</h1>
        <h2>Mostrando dados do político</h2>
        <hr>
        <p>Nome: <?=$politico->nome ?></p>
        <p>Partido: <?=$politico->partido ?></p>
        <p>Início: <?=$politico->anoInicio ?></p>
        <p>Término: <?=$politico->anoTermino ?></p>
        <hr>
    </body>
</html>
