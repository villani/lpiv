<?php
require 'Banco.php';
require 'Tabela.php';
$tabela = new Tabela('empregados');
$empregados = $tabela->obterRegistros();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de empregados</h1>
        <p><a href="empregados-form.php">Adicionar empregado</a></p>
        <table border="1">
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td colspan="2">Ações</td>
            </tr>
            <?php foreach ($empregados as $empregado): ?>
            <tr>
                <td><?= $empregado['rowid']; ?></td>
                <td><?= $empregado['nome']; ?></td>
                <td>Editar</td>
                <td>
              <a href="empregados-excluir.php?rowid=<?=$empregado['rowid']?>">
                    Excluir</a></td>
            </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>
