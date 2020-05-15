<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = $class . '.php';
    if (is_file($file)) {
        require $file;
    }
});