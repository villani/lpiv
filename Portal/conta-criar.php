<?php

require 'classes/autoloader.php';

$email = $_POST['email'] ?? null;
$nome = $_POST['nome'] ?? null;
$senha = $_POST['senha'] ?? null;
$confirma = $_POST['confirma'] ?? null;

$erro = null;
if (!is_null($email)) {
    if ($senha == $confirma) {
        if (!Usuario::verificarEmail($email)) {
            $usuarios = Usuario::obterTodos();
            $ultimo = count($usuarios) - 1;
            $id_disponivel = $usuarios[$ultimo]['id'] + 1;
            Usuario::inserir([$id_disponivel, $nome, $email, $senha, 2]);
            $_SESSION['usuario'] = Usuario::obter($id_disponivel);
            header('LOCATION: index.php');
        } else {
            $erro = "O e-mail $email já consta em nossa base.";
        }
    } else {
        $erro = "Senha e confirmação não são iguais.";
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
                        <div class="col-md-12 text-left">
                            <h1><a href="index.php" class="text-dark"><b>PORTAL DE NOTÍCIAS</b></a></h1>
                            <h2>Criar conta</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <div class="row">
                        <div class="col-md-12">

                            <form method="post">
                                <p>
                                    E-mail: <br>
                                    <b><?=$_GET['email']?></b>
                                    <input type="hidden" name="email" value="<?=$_GET['email']?>">
                                </p>
                                <p>
                                    Nome: <br>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </p>
                                <p>
                                    Senha: <br>
                                    <input type="password" name="senha" id="senha" class="form-control">
                                </p>
                                <p>
                                    Confirme a senha: <br>
                                    <input type="password" name="confirma" id="confirma" class="form-control">
                                </p>
                                <p>
                                    <input type="submit" value="Criar conta" class="btn btn-primary"> 
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