<?php

spl_autoload_register(function ($classe) {
    $pasta = 'classes/';
    $arquivo = $pasta . $classe . '.php';
    if (file_exists($pasta)) {
        require $arquivo;
    }
});
