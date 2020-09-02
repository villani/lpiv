<?php

require 'html/Table.php';

use html\Table;
$erros = null;
try {
    $rotulos = ['#', 'Título', 'Resumo', 'Link'];
    $noticias = new Table($rotulos);
    $noticia1 = [1, 'Descoberta cura para o COVID-19', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae laudantium, repellat doloribus facilis cupiditate corporis quidem delectus saepe, iste temporibus quibusdam. Magni quod asperiores ducimus distinctio in dolor, corrupti velit.', 'https://www.google.com.br/covid'];
    $noticia2 = [2, 'Novo ministro assume ministério', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae laudantium, repellat doloribus facilis cupiditate corporis quidem delectus saepe, iste temporibus quibusdam. Magni quod asperiores ducimus distinctio in dolor, corrupti velit.', 'https://www.google.com.br/covid'];
    $noticia3 = [3, 'Palmeiras contrata Neymar para reforçar seu ataque', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae laudantium, repellat doloribus facilis cupiditate corporis quidem delectus saepe, iste temporibus quibusdam. Magni quod asperiores ducimus distinctio in dolor, corrupti velit.', 'https://www.google.com.br/covid'];
    $noticias->addLine($noticia1);
    $noticias->addLine($noticia2);
    $noticias->addLine($noticia3);

    $corona = new Table(['confirmados', 'recuperados', 'mortes']);
    $corona->addLine([314.769, 125.960, 20.267]);

    $clubes = new Table(['clube']);

    $noticias->render();
    $corona->render();
    $clubes->render();
    
} catch (Exception $e) {
    $erros = "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monta tabela 2</title>
</head>
<body>
    <h1>Monta tabela 2</h1>

    <h2>Objetos <strong>Table</strong> instanciados: <?=Table::getCount();?></h2>
    <?php if (is_null($erros)): ?>
    
    <?= Table::getTables();?>

    <?php else: ?>
    <p><strong><?=$erros;?></strong></p>    

    <?php endif; ?>
</body>
</html>
