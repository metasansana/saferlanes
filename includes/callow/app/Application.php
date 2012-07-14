<?php

/**
 * timestamp Jun 29, 2012 8:23:31 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  The Application class is the parent class of all main classes of a callow application.
 *  Child classes must define three methods that can be called in sequence using the
 *  launch() method.
 *
 * NOTE: This class relies on method chaining, therefore the three methods must all return an
 * instance of $this.
 */

namespace callow\app;


abstract class Application
{

    /**
     * Parameters formed from the current url.
     * @var Options $params
     * @access protected
     */
    protected $params;

    final public function __construct()
    {

        $this->params = new Options();

    }

    /**
     * Contains code needed to initilize the application.
     */
    abstract protected function init();

    /**
     * Contains the logic of the application.
     */
    abstract protected function exec();

    /**
     * Contains logic for finishing cleaning up after the application.
     */
    abstract protected function finish();

    /**
     * Launches the application.
     *
     */
    public function launch()
    {
        return $this->init()->exec()->finish();

    }

}

?>
