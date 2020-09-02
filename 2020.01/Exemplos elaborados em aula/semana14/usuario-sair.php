<?php

// Habilitar o vetor SESSION na página.
session_start();

// Destruir a sessão.
session_destroy();

// Redirecionar o usuário para a página de login.
header('LOCATION: usuario-login.php');