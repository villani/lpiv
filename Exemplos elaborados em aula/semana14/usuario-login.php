<?php

// Habilitando o vetor SESSION na página.
session_start();

// Se houver mensagens de erro na sessão, obtém mensagem e 'limpa' o erro.
if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
} else {
    $erro = null;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
</head>
<body>
    <h1>Formulário de Login</h1>
    <?php if (isset($erro)): ?>
        <p><?=$erro;?></p>
    <?php endif; ?>
    <form action="usuario-entrar.php" method="post">
        <p>
            E-mail: <br>
            <input type="email" name="email" id="email">
        </p>
        <p>
            Senha: <br>
            <input type="password" name="senha" id="senha">
        </p>
        <p>
            <input type="submit" value="Entrar">
        </p>
    </form>
</body>
</html>