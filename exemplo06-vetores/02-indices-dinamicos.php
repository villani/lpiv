<?php

$vetor[] = 'Bolsonaro';
$vetor[1] = 'Temer';
$vetor[] = 'Dilma';
$vetor[5] = 'Lula';
$vetor[] = 'FHC';
$vetor['teste'] = 'Itamar';
$vetor[] = 'Color';

foreach ($vetor as $i => $valor) {
    echo "<p>Índice $i: $valor</p>";
}

