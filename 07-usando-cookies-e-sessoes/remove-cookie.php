<?php

// Para remover cookies basta sobrescrevê-los com uma data do passado
// que o próprio navegador se encarrega de remover cookies com datas
// expiradas.
setcookie('login', '', time() - 3600);
setcookie('senha', '', time() - 3600);

include 'logout.php';