<?php

/** OPÇÕES DO MENU */

$categorias = Categoria::obterUsadas();

if (isset($_SESSION['usuario'])) {
    
    $opcoes = [ 
        ['href' => 'conta-visualizar.php', 'rotulo' => 'Dados pessoais'],
    ];

    if ($_SESSION['usuario']['nivel'] < 2) {
        $opcoes[] = ['href' => 'categoria.php', 'rotulo' => 'Categorias'];
        $opcoes[] = ['href' => 'noticia.php', 'rotulo' => 'Notícias'];
    }
    
    if ($_SESSION['usuario']['nivel'] < 1) {
        $opcoes[] = ['href' => 'usuario.php', 'rotulo' => 'Usuários'];
    }
        
} else {
    $opcoes = [
        ['href' => 'conta-entrar.php', 'rotulo' => 'Entrar'],
        ['href' => 'conta-verificar.php', 'rotulo' => 'Criar conta'],
    ];
}

/** FIM - OPÇÕES DO MENU */

?>

                <p>&nbsp;</p>
                <h3><b>.:: CATEGORIAS ::.</b></h3>
                <?php foreach($categorias as $categoria): ?>
                <p><a href="categoria-noticias.php?id=<?=$categoria['id']?>" class="text-dark"><?=$categoria['nome']?></a></p>            
                <?php endforeach; ?>
                
                <p>&nbsp;</p>    
                <h3><b>.:: MEU ESPAÇO ::.</b></h3>
                <?php if (isset($_SESSION['usuario'])): ?>
                <p>Olá <b><?=$_SESSION['usuario']['nome']?></b> (<a href="sair.php" class="text-dark">Sair</a>)</p>
                <?php endif; ?>
                <?php foreach ($opcoes as $opcao): ?>
                <p><a href="<?=$opcao['href']?>" class="text-dark"><?=$opcao['rotulo']?></a></p>
                <?php endforeach; ?>

                <p>&nbsp;</p>    
                <h3><b>.:: O PROJETO ::.</b></h3>
                <p><a href="sobre.html" class="text-dark">Sobre</a></p>
                <p><a href="mapa.html" class="text-dark">Mapa do site</a></p>
                <p><a href="wireframes.html" class="text-dark"><i>Wireframes</i></a></p>
                <p><a href="https://villani-lpiv.000webhostapp.com/prototipo/" class="text-dark"><i>Prototipo</i></a></p>