<?php

require 'classes/autoloader.php';

$id             = $_GET['id'] ?? null;
$noticia        = Noticia::obter($id);
$autor          = Usuario::obter($noticia['usuario_id']);
$categoria_n    = Categoria::obter($noticia['categoria_id']);
$data_hora      = date('d-m-Y', $noticia['data_hora']);
$data_hora      = explode('-', $data_hora);
$meses          = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

$marcadas = count(Avaliacao::obterDaNoticia($id));
if (isset($_SESSION['usuario'])) {
    $marcada = Avaliacao::obterDoUsuario($_SESSION['usuario']['id'], $id);
} else {
    $marcada = null;
}

$comentarios = Comentario::obterDaNoticia($id);
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
                        <div class="col-md-12 text-justify">
                            <h1><a href="index.php" class="text-dark"><b>PORTAL DE NOTÍCIAS</b></a></h1>
                            <h2><?=$categoria_n['nome']?></h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <div class="row">
                        <div class="col-md-12">
                            <h2><b id="titulo"><?=$noticia['titulo']?></b></h2>
                            <p>Publicado por <b><?=$autor['nome']?></b> em <?= $data_hora[0] . ' de ' . $meses[$data_hora[1] - 1] . ' de ' . $data_hora[2]?>.</p>
                            <figure>
                                <img src="<?=$noticia['figura']?>" alt="<?=$noticia['fonte']?>" class="img-fluid">
                                <figcaption><?=$noticia['fonte']?></figcaption>
                            </figure>
                            <?=$noticia['conteudo']?>
                            <p>&nbsp;</p>
                            <form action="noticia-marcar.php" id="marcar" method="post">
                                <input type="hidden" name="noticia" value="<?=$noticia['id']?>">
                            </form>
                            <p>Marcada como relevante por <b><?=$marcadas?></b> pessoas. <a href="#" onclick="document.all['marcar'].submit()"><?=($marcada)?'Desmarcar':'Marcar';?></a>?</p>
                            <p>&nbsp;</p>
                            <h3>Comentários</h3>
                            <p>&nbsp;</p>
                            <?php if (count($comentarios)): ?>
                            <?php foreach ($comentarios as $comentario): ?>
                            <p>
                                <b><?=$comentario['nome']?></b> 
                                em (<?=date('d/m/Y à\s H:i:s', $comentario['data_hora']);?>)
                                <?php if ($_SESSION['usuario']['nome'] == $comentario['nome']): ?>
                                 - <a href="comentario-excluir.php?id=<?=$comentario['id']?>">Excluir</a>
                                <?php endif; ?>
                            </p>
                            <p><?=$comentario['comentario']?></p>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <p class="alert alert-info">Essa notícia ainda não recebeu comentários.</p>
                            <?php endif; ?>                            
                            <p>&nbsp;</p>
                            <h3>Comentar</h3>
                            <form action="noticia-comentar.php" method="post">
                                <p>
                                    <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Deixe aqui seu comentário" class="form-control"></textarea>
                                </p>
                                <p>
                                    <input type="hidden" name="noticia" value="<?=$noticia['id']?>">
                                    <input type="submit" value="Comentar" class="btn btn-primary">
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