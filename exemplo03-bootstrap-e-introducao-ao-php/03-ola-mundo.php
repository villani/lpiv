<?php

// Mostrando na tela o valor informado após o nome do arquivo.
echo "Olá " . $argv[1] . "\n";

// Pulando duas linhas no terminal.
echo "\n\n";

// Exibindo caracteres especiais com o auxílio da "\".
echo "Mostrando contéudo do \"argv\": \n";

// Usando uma estrutura de repetição para mostrar todos os elementos de um vetor.
for ($i = 0; $i < sizeof($argv); $i++) { // sizeof - retorna o tamanho do vetor
    echo "Posição " . $i . ": " . $argv[$i] . "\n";
}

// Criando um novo vetor e definindo os valores dos elementos.
$vetor[0] = "Leonardo"; // uma string
$vetor[1] = 34;         // um inteiro
$vetor[2] = 1.77;       // um double
