<?php

namespace proof\app;


/**
 * timestamp Jun 29, 2012 8:23:31 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package callow\app
 *
 *  Parent class of the main class of a web application.
 *
 */
abstract class App implements Application
{

    /**
     * The application's controller stack
     * @var proof\util\Stack
     * @access protected
     */
    protected $controllers;

    public function run()
    {
        $this->init()->start()->finish();

    }

}