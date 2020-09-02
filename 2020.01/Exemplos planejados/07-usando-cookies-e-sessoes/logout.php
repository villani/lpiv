<?php

session_start(); // disponibiliza o vetor $_SESSION na página
session_destroy(); // destroi todos os dados do vetor $_SESSION

header('LOCATION: autentica.php'); // redireciona para autenticação


