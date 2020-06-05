<?php

// Definindo o nome da origem dos dados.
$dsn = 'sqlite:portal.sqlite';

// Criando um objeto PHP que representa a 'conexão' com a base de dados.
$conexao = new PDO($dsn);

// Conferindo para quais bases há suporte habilitado.
//var_dump(PDO::getAvailableDrivers());