<?php
require 'Banco.php';
require 'Tabela.php';
$tabela = new Tabela('departamentos');
$tabela->inserir(['Almoxarifado']);
$tabela->inserir(['Sala dos Professores']);
$registros = $tabela->obterRegistros();

$tabela2 = new Tabela('empregados');
$tabela2->inserir(['Temer', 1]);
$tabela2->inserir(['Dilma', 1]);
$empregados = $tabela2->obterRegistros();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listando registros da tabela</title>
    </head>
    <body>
        <h1>Listando registros da tabela</h1>
        <h2>TABELA: <?=$tabela->nome;?></h2>
        <ul>
            <?php foreach ($registros as $departamento): ?>
         <li><?= $departamento['rowid']?> - <?= $departamento['nome']?></li>
            <?php endforeach; ?>
        </ul>
        
        <hr>
        
        <h2>TABELA: <?=$tabela2->nome;?></h2>
        <ul>
            <?php foreach ($empregados as $empregado): ?>
         <li><?= $empregado['rowid']?> - <?= $empregado['departamento_id']?> - <?= $empregado['nome']?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
