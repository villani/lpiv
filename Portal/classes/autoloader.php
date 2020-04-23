<?php

// Habilitando tipagem forte.
declare(strict_types=1);

/** 
 * Se existir arquivo no caminho informado, é feita a inclusão do arquivo requirido.
 */
spl_autoload_register( function ($classe) {
    $diretorio = __DIR__;
    $arquivo = $classe . ".php";
    $path = $diretorio . DIRECTORY_SEPARATOR . $arquivo;
    if (is_file($path)) require $path;
});

// Habilita o uso do vetor $_SESSION na aplicação.
session_start();