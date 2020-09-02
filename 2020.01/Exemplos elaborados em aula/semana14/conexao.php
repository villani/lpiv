<?php

// Definir a 'string' com o nome da origem de dados.
$dsn = 'sqlite:portal.sqlite';

// Criar o objeto PHP de conexão com a base.
$conexao = new PDO($dsn);