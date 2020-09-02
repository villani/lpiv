<?php

echo "Olá " . $argv[1] . "\n";

echo "\n\n";

echo "Mostrando contéudo do \"argv\": \n";

for ($i = 0; $i < sizeof($argv); $i++) {
    echo "Posição " . $i . ": " . $argv[$i] . "\n";
}

$vetor[0] = "Leonardo";
$vetor[1] = "34 anos";
$vetor[2] = 1.77;
