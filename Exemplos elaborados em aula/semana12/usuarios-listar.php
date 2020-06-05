<?php

// Disponibilizando o objeto 'conexao' nesta página.
require 'conexao.php';

// Definindo instrução SQL SELECT.
$select = "SELECT * FROM usuarios";

// 'query' - Enviando instrução SQL ao banco. Retorna um 'PDOStatement'
$comando = $conexao->query($select);

// 'fetchAll' - Obtendo os registros da resposta fornecida. Retorna um 'array'
$usuarios = $comando->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTANDO USUÁRIOS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1>LISTANDO USUÁRIOS</h1> 

                <p><a href="usuarios-form.php">Inserir usuário</a></p>

                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th colspan="2" class="text-center">Ações</th>
                    </tr>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id']; ?></td>
                        <td><?= $usuario['nome']; ?></td>
                        <td style="text-align: center;">
                            <a href="usuarios-form.php?id=<?= $usuario['id']; ?>">Editar</a>
                        </td>
                        <td style="text-align: center;">Excluir</td>
                    </tr>
                    <?php endforeach; ?>
                </table>       
            
            </div>
        </div>
    </div>
</body>
</html>