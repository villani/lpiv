<?php

$desordenado = [3, 6, 1, 5, 9, 11, 0];

sort($desordenado);

foreach ($desordenado as $num) {
    echo "$num - ";
}

$data = "15/03/2019";
$data = explode("/", $data);
echo "<p>Dia: " . $data[0] . "</p>";
echo "<p>Mês: " . $data[1] . "</p>";
echo "<p>Ano: " . $data[2] . "</p>";

$csv = 'bolsonaro,temer,dilma,lula';
$presidentes = str_getcsv($csv);
echo "<p>Presidente: " . $presidentes[1] . "</p>";

for ($i = 0; $i < count($presidentes); $i++) { // sizeof
    echo "<p>Candidatos: ". $presidentes[$i] . "</p>";
}

