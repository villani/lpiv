<?php

// Verificar se um parâmetro 'id' foi passado pela URL.
$id = $_GET['id'] ?? null;

// SE O PARÂMETRO FOR NULO - O formulário é para inserir.
if (is_null($id)) {
    
    // - Definir valores padrão como vazio para as variáveis do formulários.
    $nome = $email = $senha = $nivel = null;
    $destino = 'usuarios-inserir.php';

} else { // SE O PARÂMETRO 'NÃO' FOR NULO - O formulário é para alterar.

    // - Obter os valores do banco para as variáveis do formulários.
    // - Do objeto de conexão com o banco.
    include 'conexao.php';

    // - Definir a instrução de SELECT para obter o registro específico.
    $select = 'SELECT * FROM usuarios WHERE id=:id';

    // - Preparar a instrução para ser enviada ao banco.
    $comando = $conexao->prepare($select);

    // - Preencher parâmetros da instrução SQL.
    $comando->bindParam(':id', $id);

    // - Executar instrução.
    $sucesso = $comando->execute();

    // - Obter os dados da instrução executada.
    if ($sucesso === true) {
        $usuario = $comando->fetch(); // - Obter os dados da instrução executada.
        $nome = $usuario['nome'];
        $email = $usuario['email'];
        $senha = $usuario['senha'];
        $nivel = $usuario['nivel'];
        $destino = 'usuarios-alterar.php';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIÇÃO DE USUÁRIO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1>EDIÇÃO DE USUÁRIO</h1> 

                <form action="<?= $destino; ?>" method="post">
                    <p>
                        Nome: <br>
                        <input type="text" name="nome" value="<?= $nome; ?>" class="form-control">
                    </p>
                    <p>
                        E-mail: <br>
                        <input type="email" name="email" value="<?= $email; ?>" class="form-control">
                    </p>
                    <p>
                        Senha: <br>
                        <input type="password" name="senha" value="" class="form-control" required>
                    </p>
                    <p>
                        Nível: <br>
                        <input type="number" name="nivel" max="2" min="0" value="<?= $nivel; ?>" class="form-control">
                    </p>
                    <p>
                        <input type="submit" value="Gravar" class="btn btn-primary">
                        <input type="button" value="Cancelar" class="btn btn-danger" onclick="history.back();">
                    </p>
                </form>      
            
            </div>
        </div>
    </div>
</body>
</html>