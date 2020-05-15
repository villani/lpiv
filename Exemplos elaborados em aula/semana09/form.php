<?php

require 'autoloader.php';

use html\Form;
use html\Select;
use html\Radio;

$form = new Form('presidentes');
$select = new Select('presidente');
$select->setOptions(['Bolsonaro', 'Temer', 'Dilma', 'Lula']);

$radio = new Radio('ministro');
$radio->setOptions(['Teich', 'Mandeta', 'Moro', '... Guedes?']);

$ministerios = new Radio('ministerio');
$ministerios->setOptions(['Saúde', 'Educação', 'Justição', 'Economia', 'Família']);

$form->addInput($select);
$form->addInput($radio);
$form->addInput($ministerios);

echo $form->render();