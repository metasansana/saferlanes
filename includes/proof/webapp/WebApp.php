<?php

namespace proof\webapp;
/**
 * timestamp Jun 29, 2012 8:23:31 AM
 *
 *
 * @author Lasana Murray  <lmurray@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\webapp
 *
 * Class used to run a web application. When this class is  sub- classed, the child classes must define
 * the init, start and finish methods. These methods must all return an '$this' which will allow the method run()
 * to call all three in sequence.
 *
 */
abstract class WebApp
{

    abstract public function init();

    abstract public function start();

    public function run()
    {
        $this->init()->start()->finish();

    }

}