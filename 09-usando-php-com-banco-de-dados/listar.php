<?php
require 'conexao.php';

$sql = $conexao->query('SELECT rowid, * FROM candidatos');
$candidatos = $sql->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listando candidatos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <col-md-6>

                        <h1>Listando candidatos</h1>     
                        <table class="table table-striped">
                            <tr>
                                <td>#</td>
                                <td>Nome</td>
                                <td>Partido</td>
                                <td colspan="2">Ações</td>
                            </tr>
<?php foreach ($candidatos as $candidato): ?>
                                <tr>
                                    <td><?= $candidato['rowid']; ?></td>
                                    <td><?= $candidato['nome']; ?></td>
                                    <td><?= $candidato['partido']; ?></td>
                                    <td>
                                        <a class="btn btn-secondary"
                                            href="editar.php?id=<?= $candidato['rowid'] ?>">
                                            Editar</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="excluir.php?id=<?= $candidato['rowid'] ?>">
                                            Excluir</a>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </table>
                        <p><a class="btn btn-primary" href="editar.php">Adicionar candidato</a></p>

                    </col-md-6>
                </div>
            </div>
        </div>

    </body>
</html>
