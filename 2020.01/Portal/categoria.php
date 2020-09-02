<?php

require 'classes/autoloader.php';

$u_categorias = Categoria::obterDoUsuario($_SESSION['usuario']['id']);

$id_edit = $_GET['id'] ?? null;
$nome_edit = (!is_null($id_edit))?$u_categorias[array_search($id_edit, array_column($u_categorias, 'id'))]['nome']:null;

$nome = $_POST['nome'] ?? null;

if (isset($_SESSION['erro'])) {
    $erro = $_SESSION['erro'];
    unset($_SESSION['erro']);
} else {
    $erro = null;
}

if (!is_null($nome)) {
    try {
        Categoria::validarEdicao($id_edit, $_SESSION['usuario']['id'], $nome);
        header('LOCATION: categoria.php');
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Portal de Notícias</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center" style="background-color:rgb(200, 200, 200)">
                  
            <?php include 'menu.php';?>
                
            </div>
            <div class="col-md-8">
                <div class="container">

                    <!-- TÍTULO DO CONTEÚDO -->

                    <div class="row">
                        <div class="col-md-12">
                            <h1><a href="index.php" class="text-dark"><b>PORTAL DE NOTÍCIAS</b></a></h1>
                            <h2>Categorias</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <h3><?=(isset($id_edit))?'Editar categoria':'Criar categoria';?></h3>
                    <?php if (!is_null($erro)): ?>
                    <p class="alert alert-danger"><?=$erro?></p>
                    <?php endif; ?>
                    <form action="#existente" method="post">
                        <p>
                            Nome:
                            <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome_edit?>">
                        </p>
                        <p>
                            <input type="submit" value="Gravar" class="btn btn-primary">
                        </p>
                    </form>
                    <p>&nbsp;</p>

                    <h3><a id="existente">Categorias existentes</a></h3>
                    <?php if (count($u_categorias)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($u_categorias as $u_categoria): ?>
                            <tr>
                                <td><?=$u_categoria['nome']?></td>
                                <td>
                                    <button onclick="location= 'categoria.php?id=<?=$u_categoria['id']?>'">
                                        <img src="imagens/pencil-square.svg" alt="Editar" title="Editar">
                                    </button>
                                </td>
                                <td>
                                    <form action="categoria-excluir.php" method="post">
                                    <input type="hidden" name="id" value="<?=$u_categoria['id']?>">
                                        <button type="submit">
                                        <img src="imagens/trash.svg" alt="Excluir" title="Excluir">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else:?>
                    <p class="alert alert-info">Você ainda não possui categorias cadastradas!</p>
                    <?php endif; ?>
                    <!-- fim - CONTEÚDO PRINCIPAL -->
                </div>
                
            </div>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>