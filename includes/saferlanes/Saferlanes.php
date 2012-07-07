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


class Saferlanes extends Application
{

    protected function init()
    {

        require_once 'scripts/systemvars.php';

        require_once 'scripts/uservars.php';

        include_once 'settings.php';

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
                case 'post':
                    break;

                case 'vote':
                    break;

                default: $controller = new SearchController();
                    break;
            }

        $controller->main($this->params);

        return $this;

    }

    protected function finish()
    {

        return $this;

    }

}

?>
