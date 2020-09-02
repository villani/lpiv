<?php

require 'classes/autoloader.php';

$id             = $_GET['id'] ?? null;
$usuario_id     = $_SESSION['usuario']['id'];
$categoria_id   = null;
$titulo         = $_GET['titulo'] ?? null;
$resumo         = null;
$figura         = null;
$fonte          = null;
$conteudo       = null;

if (!is_null($id)) {
    $noticia        = Noticia::obter($id);
    $categoria_id   = $noticia['categoria_id'];
    $titulo         = $noticia['titulo'];
    $resumo         = $noticia['resumo'];
    $figura         = $noticia['figura'];
    $fonte          = $noticia['fonte'];
    $conteudo       = $noticia['conteudo'];
}

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
                            <h2>Editar notícia</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <div class="row">
                        <div class="col-md-12">

                            <form action="noticia-gravar.php" method="post" enctype="multipart/form-data">
                                <p>
                                    Título: <br>
                                    <input type="text" name="titulo" id="titulo" value="<?=$titulo?>" class="form-control">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <input type="hidden" name="usuario_id" value="<?=$usuario_id?>">
                                </p>
                                <p>
                                    Categoria: <br>
                                    <select name="categoria_id" id="categoria_id" class="form-control">
                                        <option value="">[selecione uma categoria]</option>
                                        <?php if (count($t_categorias)): ?>
                                        <?php foreach ($t_categorias as $t_categoria): ?>
                                        <option value="<?=$t_categoria['id']?>"<?=($t_categoria['id'] == $categoria_id)?' selected':"";?>><?=$t_categoria['nome']?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </p>
                                <p>
                                    Resumo: <br>
                                    <textarea name="resumo" id="resumo" cols="30" rows="10" class="form-control"><?=$resumo?></textarea>
                                </p>
                                <p>
                                    Figura: <br>
                                    <input type="file" name="figura" id="figura" accept="image/png, image/jpeg" class="form-control"> <br>
                                    <?php if (!is_null($figura)): ?>
                                    <img src="<?=$figura?>" alt="Figura da notícia" class="img-fluid">
                                    <?php endif; ?>
                                </p>
                                <p>
                                    Fonte da figura: <br>
                                    <input type="text" name="fonte" id="fonte" value="<?=$fonte?>" class="form-control">
                                </p>
                                <p>
                                    Conteúdo: <br>
                                    <textarea name="conteudo" id="conteudo" cols="30" rows="10" class="form-control"><?=$conteudo?></textarea>
                                </p>
                                <p>
                                    <input type="submit" value="Gravar" class="btn btn-primary"> 
                                    <input type="button" value="Voltar" onclick="history.back();" class="btn btn-secondary">
                                </p>
                            </form>
                            
                        </div>
                    </div>

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