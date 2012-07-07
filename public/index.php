<?php

require_once 'classloader.php';

$app = new saferlanes\controllers\Saferlanes();

$app->init()->run()->end();


?>