<?php

require 'Select.php';
try {
    
    $select = new Select('clube');
    
    $select->setOptions('Corinthians');
    $select->setOptions('Palmeiras');
    $select->setOptions('Santos');
    $select->setOptions('São Paulo');
    $select->setOptions('RB');
    $select->setOptions('Fluminense');
    $select->setOptions('Flamengo');
    $select->setOptions('Vasco');
    
} catch (Exception $e) {
    $erros = $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?= ($erros) ? "<p>$erros</p>" : null ;?>
        <?= $select->toHtml(); ?>
    </body>
</html>
