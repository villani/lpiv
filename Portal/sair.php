<?php

require 'classes/autoloader.php';

unset($_SESSION['usuario']);

header('LOCATION: index.php');