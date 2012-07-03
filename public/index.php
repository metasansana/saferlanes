<?php

//Define constants, load class loader.
require_once 'saferlanes/scripts/settings.php';

$app = new saferlanes\controllers\Saferlanes();

$app->init()->run()->end();


?>