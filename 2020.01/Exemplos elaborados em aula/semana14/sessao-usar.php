<?php

// Habilitando o vetor SESSION na página.
session_start();

// Verificar duração
if (isset($_SESSION['duracao']) && $_SESSION['duracao'] < time()) session_destroy();


// Recuperando dados da sessão
if (isset($_SESSION['cotacao'])) {
    print "<p>A cotação do dólar é: " . $_SESSION['cotacao'] . "</p>";
    print "<p>O tempo limite é: " . $_SESSION['duracao'] . "</p>";
    print "<p>O tempo atual é: " . time() . "</p>";
}

// Link para a página de destruição da sessão.
?>
<p><a href="sessao-criar.php">Criar sessão</a></p>
<p><a href="sessao-destruir.php">Destruir sessão</a></p>