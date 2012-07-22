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
use callow\app\Page;
use callow\app\Options;




class Saferlanes extends Application
{

    const SEARCH_TEMPLATE = "templates/search.php";
    const POST_TEMPLATE = "templates/post.php" ;
    const DISPLAY_TEMPLATE = "templates/display.php";


    protected function init()
    {

        return $this;
    }

    protected function exec()
    {

        $controller = NULL;

        $flag = $this->params[0];

            switch ($flag)
            {
                case 'post':
                    $controller = new PostController();
                    break;

                case 'vote':
                    $controller = new VoteController();
                    break;

                default:
                    $controller = new SearchController();

                    break;
            }

            $window = new Page('templates');

            $controller->setPage($window)->main($this->params);

        return $this;

    }

    protected function finish()
    {

        return $this;

    }

}