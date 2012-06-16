<?php

// @date May 26, 2012 11:07:07 PM
// @author Lasana Murray  <lmurray@trinistorm.org>
// @project roadtroll
// Copyright (C) 2012 Lasana Murray



/*Set up the controller factory*/
$table = array(
    'post'=>'saferlanes\controllers\PostController',
    'vote'=>'saferlanes\controllers\VoteController',
    'about'=>'saferlanes\controllers\AboutPage',
    'contact'=>'saferlanes\controllers\ContactPage'
    );

$controllers->setControllerTable($table);
$controllers->setIndex('saferlanes\controllers\SearchController');
$controllers->setDefaultController('saferlanes\controllers\DisplayController');

if(count($params) > 4)
    header('Location:/');

require_once 'settings.php';

require_once 'dbcreds.php';


?>
