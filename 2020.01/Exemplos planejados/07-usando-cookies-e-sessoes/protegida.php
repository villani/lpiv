<?php
session_start();
if (!isset($_SESSION['login'])) { // se não houver usuário autenticado
    header('LOCATION: autentica.php'); // redireciona para autenticação
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página protegida</h1>
        <p>Olá <?= $_SESSION['login']; ?></p>
        <p>
            <a href="logout.php">Sair</a> | 
            <a href="remove-cookie.php">Excluir</a>
        </p>
    </body>
</html>
