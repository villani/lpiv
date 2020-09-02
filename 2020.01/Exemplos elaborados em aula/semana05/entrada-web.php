<?php
// ENTRADA VIA WEB
$nome = $_GET["nome"] ?? "sem argumento";
// SAÍDA VIA WEB
print "Argumento: $nome <br>";

if ($nome != "sem argumento") {
    foreach ($_GET as $indice => $valor) {
        print "<p>Na posição \"$indice\": <b>$valor</b></p>";
    }
}