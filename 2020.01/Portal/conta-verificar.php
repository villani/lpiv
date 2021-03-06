<?php

require 'classes/autoloader.php';

$email = $_POST['email'] ?? null;

if (!is_null($email)) {
    if (!Usuario::verificarEmail($email)) {
        header("LOCATION: conta-criar.php?email=$email");
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
                        <div class="col-md-12 text-justify">
                            <h1><a href="index.php" class="text-dark"><b>PORTAL DE NOTÍCIAS</b></a></h1>
                            <h2>Verificar conta</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->

                    <div class="row">
                        <div class="col-md-12">

                            <?php if (is_null($email)): ?>
                            <form method="post">
                                <p>
                                    Verifique se seu e-mail já consta em nossa base: <br>
                                    <input type="email" name="email" id="email" class="form-control">
                                </p>
                                <p>
                                    <input type="submit" value="Verificar" class="btn btn-primary">
                                </p>
                            </form>
                            <?php else: ?>
                            <form method="post">
                                <p class="alert alert-success">
                                    O e-mail a seguir já consta em nossa base: <br>
                                    <b><?=$email?></b>
                                </p>
                                <p>
                                    Gostaria de enviar uma mensagem de recuperação de senha para esse endereço?
                                </p>
                                <p>
                                    <input type="hidden" name="recuperar" value="true">
                                    <input type="submit" value="Enviar mensagem" class="btn btn-primary"> 
                                    <input type="button" value="Voltar" onclick="history.back();" class="btn btn-secondary">
                                </p>
                            </form>
                            <?php endif; ?>

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