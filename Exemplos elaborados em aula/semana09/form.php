<?php

require 'autoloader.php';

use html\Form;
use html\Select;

$form = new Form('presidentes');
$select = new Select('presidente');
$select->setOptions(['Bolsonaro', 'Temer', 'Dilma', 'Lula']);

$form->addInput($select);

echo $form->render();