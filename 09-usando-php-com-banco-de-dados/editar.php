<?php
$id = $_GET['id'] ?? null;
$nome = $partido = null;
if (!is_null($id)) {
    require 'conexao.php';
    $sql = $conexao->prepare('SELECT rowid, * FROM candidatos '
            . 'WHERE rowid=:id');
    $sql->bindParam(':id', $id);
    if ($sql->execute()) {
        $candidato = $sql->fetch();
        $nome = $candidato['nome'];
        $partido = $candidato['partido'];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editando dados do candidato</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <col-md-6>
                        <h1>Editando dados do candidato</h1>
                        <form action="gravar.php" method="post">
                            <p>
                                Id: <br>
                                <input class="form-control" type="text" name="id" value="<?= $id ?>" readonly>
                            </p>
                            <p>
                                Nome: <br>
                                <input class="form-control" type="text" name="nome" value="<?= $nome ?>">
                            </p>
                            <p>
                                Partido: <br>
                                <input class="form-control" type="text" name="partido" value="<?= $partido ?>">
                            </p>
                            <p>
                                <input class="btn btn-primary" type="submit" value="Gravar">
                                <input class="btn btn-secondary" type="button" value="Voltar" onclick="window.location='listar.php';">
                            </p>
                        </form>
                    </col-md-6>
                </div>
            </div>
        </div>
    </body>
</html>
