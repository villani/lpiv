<?php

// RECEBENDO OS PARÂMETROS DO FORMULÁRIO
$nome = $_GET['nome'] ?? null;
$email = $_GET['email'] ?? null;
$foto = $_GET['foto'] ?? null;
$masculino = $_GET['masculino'] ?? null;
$feminino = $_GET['feminino'] ?? null;
$unidade = $_GET['unidade'] ?? null;
$revista = $_GET['revista'] ?? null;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo de Formulário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- INÍCIO DA GRADE -->
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-6">
                <img 
                    src="imagens/fatec.jpg" 
                    alt="Fatec Praia Grande"
                    title="Fatec Praia Grande"
                    class="img-fluid">
            </div>

            <div class="col-12 col-md-6">

                <!-- COLE AQUI TODO O CONTEÚDO DO BODY -->
                <h1>Modelo de Formulário</h1>

                <?php if(is_null($nome)): ?>

                <form>
                    <p>
                        <label for="nome">Nome:</label> <br>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome completo" required>
                    </p>
                    <p>
                        <label for="email">E-mail:</label> <br>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </p>
                    <p>
                        <label for="foto">Foto:</label> <br>
                        <input type="file" class="btn btn-info" name="foto" id="foto">
                    </p>
                    <p>
                        <label for="masculino">Gênero:</label> <br>
                        <input type="radio" name="genero" id="masculino" value="masculino"> Masculino <br>
                        <input type="radio" name="genero" id="feminino" value="feminino"> Feminino <br>
                    </p>
                    <p>
                        <label for="unidade">Qual das unidades você visitou:</label> <br>
                        <select name="unidade" id="unidade">
                            <option value="" selected>Selecione uma opção...</option>
                            <option value="praia-grande">Praia Grande</option>
                            <option value="santos">Santos</option>
                            <option value="sao-vicente">São Vicente</option>
                        </select>
                    </p>
                    <p class="destaque-azul">
                        <label for="revistas">Como conheceu o lugar:</label><br>
                        <input type="checkbox" name="conheceu[]" id="revistas"> Revistas <br>
                        <input type="checkbox" name="conheceu[]" id="site"> Site institucional <br>
                        <input type="checkbox" name="conheceu[]" id="social"> Redes sociais <br>
                    </p>
                    <p>
                        <label for="mais" class="destaque-azul">Conte um pouco mais sobre os pontos positivos:</label> <br>
                        <textarea name="mais" id="mais" cols="30" rows="10"></textarea>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-primary" value="Gravar">
                    </p>
                </form>

                <?php else: ?>

                    <p><strong>Nome: </strong> <?=$nome?></p>
                    <p><strong>E-mail: </strong> <?=$email?></p>
                    <p><strong>Foto: </strong> <?=$foto?></p>
                    <p><strong>Masculino: </strong> <?=$masculino?></p>
                    <p><strong>Feminino: </strong> <?=$feminino?></p>
                    <p><strong>Unidade: </strong> <?=$unidade?></p>
                    <p><strong>Revista: </strong> <?=$revista?></p>

                <?php endif; ?>
            </div>

        </div>

    </div>
    <!-- FIM DA GRADE -->

    
</body>
</html>