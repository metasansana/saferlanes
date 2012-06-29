<?php

/**
 * timestamp Jun 29, 2012 8:23:31 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *
 */

namespace callow\app;


abstract class Application
{

    /**
     * Parameters formed from the current url.
     * @var Parameters $params
     * @access protected
     */
    protected $params;

    final public function __construct()
    {

        $this->params = new Parameters();

    }

    /**
     * Contains code needed to initilize the application.
     */
    abstract public function init();

    /**
     * Contains the logic of the application.
     */
    abstract public function run();

    /**
     * Optionally performs clean up actions after the application logic.
     */
    public function end(){}

}

?>
