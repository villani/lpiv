<?php

// Habilitando o vetor SESSION na página.
session_start();

// Armazenando valores na sessão
$_SESSION['cotacao'] = "R$ 5,32";
$_SESSION['duracao'] = time() + 20; // 20 segundos

// Link para outra página.
?>
<p><a href="sessao-usar.php">Usar sessão</a></p>