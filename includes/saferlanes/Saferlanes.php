<?php

/**
 * timestamp Jun 29, 2012 7:52:39 AM
 *
 *
 * @project saferlanes
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package saferlanes\controllers
 *
 *  The main class of the saferlanes application.
 *
 */

namespace saferlanes;

use callow\app\Application;
use saferlanes\controllers\SearchController;
use saferlanes\controllers\PostController;
use saferlanes\controllers\VoteController;
use saferlanes\models\WebPage;
use safelanes\models\ObserverFactory;


class Saferlanes extends Application
{

    protected function init()
    {

        require_once 'scripts/systemvars.php';

        require_once 'scripts/uservars.php';

        include_once 'scripts/settings.php';

        if(!defined(APP_NAME))
            header("Status: 500 Not Found", FALSE, 500);

        return $this;

    }

    protected function exec()
    {

        $controller = NULL;

        $flag = $this->params[0];

            switch ($flag)
            {
                case 'post': $controller = new PostController();
                    break;

                case 'vote': $controller = new VoteController();
                    break;

                default: $controller = new SearchController();
                    break;
            }

            $window = new models\WebPage();

            $stack = new ObserverFactory;

            $controller->setObserver($stack->generate())->main($this->params);

            $controller->setWindow($window);



        return $this;

    }

    protected function finish()
    {

        return $this;

    }

}

?>
