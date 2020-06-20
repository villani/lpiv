<?php

// Habilitando o vetor SESSION na página.
session_start();

// Removendo todos os dados da sessão.
//session_destroy();

// Removendo um valor específico da sessão.
unset($_SESSION['cotacao']);

// Link para a página Usar Sessão.
?>
<p><a href="sessao-usar.php">Usar sessão</a></p>