<?php

/**
 * timestamp Jul 7, 2012 12:24:50 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 * ResponseControllers are the type of controllers that repsond to some user submitted command with some form
 * of visual output.
 *
 *
 */

namespace callow\app;

abstract class AbstractController implements Controller
{

    /**
     * Reference to a controller for the screen.
     * @var Window $view
     * @access protected
     */
    protected $ui;



    public function setWindow(Window &$view)
    {
        $this->ui = $view;
        return $this;
    }

}

?>
