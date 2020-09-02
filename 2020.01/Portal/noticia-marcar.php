<?php

require 'classes/autoloader.php';

$_SESSION['pagina']     = 'noticia-marcar.php';

if (!isset($_SESSION['noticia'])) {
    $_SESSION['noticia'] = $_POST['noticia'] ?? null;
}
    
    
if (isset($_SESSION['usuario'])) {

    if (!is_null($_SESSION['noticia'])) {

        $marcada = Avaliacao::obterDoUsuario($_SESSION['usuario']['id'], $_SESSION['noticia']);

        if ($marcada) {
            var_dump($marcada);
            Avaliacao::excluir($marcada['id']);

        } else {

            $avaliacoes             = Avaliacao::obterTodos();
            $ultimo                 = count($avaliacoes) - 1;
            $id_disponivel          = $avaliacoes[$ultimo]['id'] + 1;

            Avaliacao::inserir([$id_disponivel, $_SESSION['usuario']['id'], $_SESSION['noticia'], 1]);

        }
        unset($_SESSION['pagina']);
        $noticia = $_SESSION['noticia'];
        unset($_SESSION['noticica']);
    }
     
    header("LOCATION: noticia-ler.php?id=$noticia");

} else {

    header('LOCATION: conta-entrar.php');
    
}
