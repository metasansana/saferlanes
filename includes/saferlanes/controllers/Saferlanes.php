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

namespace saferlanes\controllers;

use callow\app\Application;

class Saferlanes extends Application
{

    public function init()
    {

        return $this;

    }

    public function run()
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

    public function end()
    {

        return $this;

    }

}

?>
