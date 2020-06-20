<?php

// Obtém da URL o e-mail do usuário.
$email = $_POST['email'] ?? null;

// Obtém da URL a senha do usuário.
$senha = $_POST['senha'] ?? null;

// Definir o comando que seleciona o usuário do banco.
$select = 'SELECT * FROM usuarios WHERE email=:email AND senha=:senha';

// Usar o objeto de conexão para preparar o comando.
require 'conexao.php';
$comando = $conexao->prepare($select);

// Preencher os parâmetros do comando.
$comando->bindParam(':email', $email);
$comando->bindParam(':senha', sha1($senha));

// Executar o comando.
$sucesso = $comando->execute();

// Obter o resultado do comando executado no banco.
if ($sucesso) $usuario = $comando->fetch();

// Se um usuário foi obtido:
session_start(); // Habilitando o vetor SESSION na página
if ($usuario) { // - Então saudar usuário.

    $_SESSION['usuario'] = $usuario;
    $_SESSION['duracao'] = time() + 20; // Duração da sessão a ser renovada a cada 60 segundos.
    
    // Redirecionar usuário para outra página.
    header('LOCATION: usuario-painel.php');

} else { // - Senão informar os dados incorretos.

    $_SESSION['erro'] = 'Dados de acesso inválidos.';
    header('LOCATION: usuario-login.php');
    
}