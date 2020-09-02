<?php

require 'classes/autoloader.php';

$email = $_POST['email'] ?? null;
$nome = $_POST['nome'] ?? null;
$senha = $_POST['senha'] ?? null;
$confirma = $_POST['confirma'] ?? null;
$id = $_SESSION['usuario']['id'];

if (isset($_SESSION['erro'])) {
    $erros[] = $_SESSION['erro'];
    unset($_SESSION['erro']);
} else {
    $erros = null;
}
if (!is_null($email)) {
    if ($email != $_SESSION['usuario']['email'] && Usuario::verificarEmail($email)) {
        $erros[] = "O e-mail <b>$email</b> já existe na base.";
    } 
    if ($senha != $confirma) {
        $erros[] = "A senha e confirmação não são iguais.";
    }
    if (is_null($erros)) {
        $dados = compact('email', 'nome', 'senha');
        Usuario::alterar($dados, $_SESSION['usuario']['id']);
        $_SESSION['usuario'] = Usuario::obter($id);
        header('LOCATION: conta-visualizar.php');
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
                            <h2>Editar conta</h2>
                            <hr>
                        </div>
                    </div>

                    
                    <!-- fim - TÍTULO DO CONTEÚDO -->

                    <!-- CONTEÚDO PRINCIPAL -->


                    <div class="row">
                        <div class="col-md-12">

                            <?php if ($erros): ?>
                            <?php foreach ($erros as $erro): ?>
                            <p class="alert alert-danger"><?=$erro?></p>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <form method="post">
                                <p>
                                    E-mail: <br>
                                    <input type="email" name="email" id="email" value="<?=$_SESSION['usuario']['email']?>" class="form-control">
                                </p>
                                <p>
                                    Nome: <br>
                                    <input type="text" name="nome" id="nome" value="<?=$_SESSION['usuario']['nome']?>" class="form-control">
                                </p>
                                <p>
                                    Senha: <br>
                                    <input type="password" name="senha" id="senha" value="<?=$_SESSION['usuario']['senha']?>" class="form-control">
                                </p>
                                <p>
                                    Confirme a senha: <br>
                                    <input type="password" name="confirma" id="confirma" value="<?=$_SESSION['usuario']['senha']?>" class="form-control">
                                </p>
                                <p>
                                    <input type="submit" value="Gravar" class="btn btn-primary"> 
                                    <input type="button" value="Voltar" onclick="history.back();" class="btn btn-secondary">
                                    <?php if($_SESSION['usuario']['id'] != 0): ?>
                                    <input type="button" value="Excluir conta" onclick="location='conta-excluir.php?id=<?=$_SESSION['usuario']['id']?>'" class="btn btn-danger float-right">
                                    <?php endif; ?>
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