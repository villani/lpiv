<?php

$clubes = ['Palmeiras', 'Santos', 'Corinthians', 'São Paulo'];

echo "<h1>Usando for para iterar vetores</h1>";

for ($i = 0; $i < sizeof($clubes); $i++) {
    echo "<p>" . $clubes[$i] . "</p>";
}

echo "<h1>Usando foreach para iterar vetores</h1>";

foreach ($clubes as $i => $clube) {
    $i++;
    echo "<p>$i - $clube</p>";
}
