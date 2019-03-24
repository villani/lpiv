<?php
// USANDO if-else
/*
if (isset($_GET['nome'])) {
$nome = $_GET['nome'];
} else {
$nome = 'Vazio';
}
 */

// USANDO OPERADOR TERNÁRIO
//$nome = (isset($_GET['nome'])) ? $_GET['nome'] : 'Nulo';

// OPERADOR DE COALESCÊNCIA NULA "??"
$nome = $_GET['nome'] ?? 'Vazio de novo';

print "<h1>$nome</h1>";
