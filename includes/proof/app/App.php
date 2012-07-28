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
 * Class used to run a web application. When this class is  subclassed, the child classes must define
 * the init, start and finish methods. These methods must all return an '$this' which will allow the method run()
 * to call all three in sequence.
 *
 */
abstract class App
{

    abstract public function init();

    abstract public function start();

    public function run()
    {
        $this->init()->start()->finish();

    }

}