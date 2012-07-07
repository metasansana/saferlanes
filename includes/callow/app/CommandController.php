<?php

/**
 * timestamp Jul 7, 2012 12:24:50 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 * CommandController are the type of controllers that repsond to some user submitted command.
 *
 *
 */

namespace callow\app;

abstract class CommandController implements Controller
{

    /**
     * Reference to a controller for the screen.
     * @var Controller $view
     * @access protected
     */
    protected $view;



    public function setDisplayController(Controller $view)
    {
        $this->view = $view;
        return $this;
    }

}

?>
