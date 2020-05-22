<?php

require 'html/Table.php';

use html\Table;

$rotulos = ['#', 'Título', 'Resumo', 'Link'];
$noticias = new Table($rotulos);
$noticia1 = [1, 'Descoberta cura para o COVID-19', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae laudantium, repellat doloribus facilis cupiditate corporis quidem delectus saepe, iste temporibus quibusdam. Magni quod asperiores ducimus distinctio in dolor, corrupti velit.', 'https://www.google.com.br/covid'];
$noticias->addLine($noticia1);
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
    <?= $noticias->render(); ?>
</body>
</html>
