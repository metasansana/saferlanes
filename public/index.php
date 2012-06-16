<?php

require_once 'callow/mvc/Application.php';

$saferlanes = new callow\mvc\Application();

$saferlanes->setStartUpScript('saferlanes/scripts/boot.php');

$saferlanes->setRuntimeScript('saferlanes/scripts/setup.php');

$saferlanes->run();


?>