<?php
require 'Banco.php';
require 'Tabela.php';
$tabela = new Tabela('departamentos');
$departamentos = $tabela->obterRegistros();

if (isset($_POST['nome'])) {
    $empregados = new Tabela('empregados');
    $empregados->inserir([$_POST['nome'], $_POST['departamento_id']]);
    header('LOCATION: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insere empregado</title>
    </head>
    <body>
        <h1>Insere empregado</h1>
        <form method="post">
            <p>
                Nome: <br>
                <input type="text" name="nome">
            </p>
            <p>
                Departamento: <br>
                <select name="departamento_id">
                    <?php foreach ($departamentos as $departamento): ?>
                        <option value="<?= $departamento['rowid'] ?>">
                            <?= $departamento['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <input type="submit" value="Gravar">
            </p>
        </form>
    </body>
</html>
