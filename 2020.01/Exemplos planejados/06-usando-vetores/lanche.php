<?php

$lanchonetes = ['McDonalds', 'BurgerKing', 'Giraffas'];
$lanches = ['x-salada', 'x-burger', 'x-tudo'];
$precos = [
    [2.50, 2.00, 3.00],
    [3.00, 2.50, 3.50],
    [1.50, 1.00, 2.00]
];

$filtro = $_POST['filtro'] ?? null;

if (!is_null($filtro)) {
    
    echo "<h1>Lanches disponíveis</h1>";
    for ($i = 0; $i < count($lanchonetes); $i++) {
        for ($j = 0; $j < count($lanches); $j++) {
            
            if ($precos[$i][$j] <= $filtro) {
                echo "<p>Lanchonete: " . $lanchonetes[$i] . "</p>";
                echo "<p>Lanche: " . $lanches[$i] . "</p>";
                echo "<p>Preço: " . $precos[$i][$j] . "</p>";
                echo "<hr>";
            }
        }
    }
}
?>
<form method="post">
    Valor: <input type="number" name="filtro" value="<?=$filtro?>">
    <input type="submit" value="Verificar lanches">
</form>


