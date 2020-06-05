<?php

// Obter da URL o ID do registro a ser removido.
$id = $_GET['id'] ?? null;

// Se houver ID, processar os comandos a seguir:
if (!is_null($id)) {

    // Objeto de conexão com base.
    require 'conexao.php';

    // Definir a instrução de SQL DELETE.
    $delete = 'DELETE FROM usuarios WHERE id=:id';

    // Preparar o comando para ser enviado.
    $comando = $conexao->prepare($delete);

    // - Preencher os parâmetros do comando SQL.
    $comando->bindParam(':id', $id);

    // - Executar o comando preparado.
    $sucesso = $comando->execute();

    // Se o comando tiver sido processado com sucesso, redirecionar para 'usuarios-listar.php'.
    if ($sucesso === true) {

        header('LOCATION: usuarios-listar.php');
    
    } else { // Senão, apresentar mensagem de erro.
        print 'Falha ao excluir registro.';
    }
}