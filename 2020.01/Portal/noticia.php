<?php

require 'classes/autoloader.php';

$noticias = Noticia::obterDoUsuario($_SESSION['usuario']['id']);
$t_categorias = Categoria::obterTodos();

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
                            <h2>Notícias</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <h3>Criar notícia</h3>
                    <form action="noticia-editar.php">
                        <p>
                            Título:
                            <input type="text" name="titulo" id="titulo" value="Próxima notícia..." class="form-control">
                        </p>
                        <p>
                            <input type="submit" value="Criar" class="btn btn-primary">
                        </p>
                    </form>
                    <p>&nbsp;</p>

                    <h3><a id="existentes">Notícias existentes</a></h3>
                    <?php if (count($noticias)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoria</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($noticias as $noticia): ?>
                            <tr>
                                <td><?=$noticia['titulo']?></td>
                                <td><?=$t_categorias[array_search($noticia['categoria_id'], array_column($t_categorias, 'id'))]['nome']?></td>
                                <td>
                                    <button class="btn" onclick="location= 'noticia-editar.php?id=<?=$noticia['id']?>'">
                                        <img src="imagens/pencil-square.svg" alt="Editar" title="Editar">
                                    </button>
                                </td>
                                <td>
                                    <form action="noticia-excluir.php" method="post">
                                        <input type="hidden" name="id" value="<?=$noticia['id']?>">
                                        <button type="submit" class="btn">
                                            <img src="imagens/trash.svg" alt="Excluir" title="Excluir">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>                        
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p class="alert alert-info">Você ainda não possui notícias cadastradas!</p>
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