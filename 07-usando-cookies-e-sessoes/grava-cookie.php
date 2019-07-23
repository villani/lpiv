<?php

// OBTEM PARÂMETROS DA URL
$login = $_GET['login'] ?? null; // Deixa nulo se não houver parâmetros
$senha = $_GET['senha'] ?? null;

if ($login) { // Se login for diferente de nulo, então grava cookie.
    setcookie('login', $login, time() + (24*3600)); // duração de 1 dia
    setcookie('senha', $senha, time() + (24*3600));
    header('LOCATION: autentica.php'); // redireciona para autentica.php
} else {
    header('LOCATION: lista.php');
}

