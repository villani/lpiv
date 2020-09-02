<?php

// DEFINIÇÃO DOS CONTROLES DE SESSÃO

// Verificando se há usuário autenticado.
if (!isset($_SESSION['usuario'])) {

    // - Se não houver, redirecionar o usuário para a página de login.
    header('LOCATION: usuario-login.php');
}

// Verificando se o tempo da sessão do usuário expirou.
if ($_SESSION['duracao'] < time()) {
    session_destroy();
    header('LOCATION: usuario-login.php');
}