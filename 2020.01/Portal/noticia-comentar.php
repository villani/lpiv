<?php

require 'classes/autoloader.php';

$_SESSION['pagina']     = 'noticia-comentar.php';

if (!isset($_SESSION['noticia'])) {
    $_SESSION['noticia'] = $_POST['noticia'] ?? null;
    $_SESSION['comentario'] = $_POST['comentario'] ?? null;
}
    
if (isset($_SESSION['usuario'])) {

    if (!is_null($_SESSION['noticia'])) {

        $comentarios            = Comentario::obterTodos();
        $ultimo                 = count($comentarios) - 1;
        $id_disponivel          = $comentarios[$ultimo]['id'] + 1;
        $noticia                = $_SESSION['noticia'];
        $dados                  = [$id_disponivel, $_SESSION['usuario']['id'], $_SESSION['noticia'], $_SESSION['comentario'], time()];
        
        Comentario::inserir($dados);

        unset($_SESSION['pagina']);        
        unset($_SESSION['noticia']);
        unset($_SESSION['comentario']);
    }
     
    header("LOCATION: noticia-ler.php?id=$noticia");

} else {

    header('LOCATION: conta-entrar.php');
    
}
